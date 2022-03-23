<?php

namespace app\data\command;

use app\data\service\UserRebateService;
use think\admin\Command;
use think\admin\Exception;
use think\admin\storage\LocalStorage;
use think\console\Input;
use think\console\Output;
use think\db\exception\DataNotFoundException;
use think\db\exception\DbException;
use think\db\exception\ModelNotFoundException;
use WeChat\Exceptions\InvalidDecryptException;
use WeChat\Exceptions\InvalidResponseException;
use WeChat\Exceptions\LocalCacheException;
use WePay\Transfers;
use WePay\TransfersBank;

/**
 * 用户提现处理
 * Class UserTransfer
 * @package app\data\command
 */
class UserTransfer extends Command
{
    protected function configure()
    {
        $this->setName('xdata:UserTransfer');
        $this->setDescription('批量执行线上打款操作');
    }

    /**
     * 执行微信提现操作
     * @param Input $input
     * @param Output $output
     * @return void
     * @throws Exception
     * @throws DbException
     */
    protected function execute(Input $input, Output $output)
    {
        $map = [['type', 'in', ['wechat_banks', 'wechat_wallet']], ['status', 'in', [3, 4]]];
        [$total, $count, $error] = [$this->app->db->name('DataUserTransfer')->where($map)->count(), 0, 0];
        foreach ($this->app->db->name('DataUserTransfer')->where($map)->cursor() as $vo) try {
            $this->queue->message($total, ++$count, "开始处理订单 {$vo['code']} 提现");
            if ($vo['status'] === 3) {
                $this->queue->message($total, $count, "尝试处理订单 {$vo['code']} 打款", 1);
                if ($vo['type'] === 'wechat_banks') {
                    [$config, $result] = $this->createTransferBank($vo);
                } else {
                    [$config, $result] = $this->createTransferWallet($vo);
                }
                if ($result['return_code'] === 'SUCCESS' && $result['result_code'] === 'SUCCESS') {
                    $this->app->db->name('DataUserTransfer')->where(['code' => $vo['code']])->update([
                        'status'      => 4,
                        'appid'       => $config['appid'],
                        'openid'      => $config['openid'],
                        'trade_no'    => $result['partner_trade_no'],
                        'trade_time'  => $result['payment_time'] ?? date('Y-m-d H:i:s'),
                        'change_time' => date('Y-m-d H:i:s'),
                        'change_desc' => '创建微信提现成功',
                    ]);
                } else {
                    $this->app->db->name('DataUserTransfer')->where(['code' => $vo['code']])->update([
                        'change_time' => date('Y-m-d H:i:s'), 'change_desc' => $result['err_code_des'] ?? '线上提现失败',
                    ]);
                }
            } elseif ($vo['status'] === 4) {
                $this->queue->message($total, $count, "刷新提现订单 {$vo['code']} 状态", 1);
                if ($vo['type'] === 'wechat_banks') {
                    $this->queryTransferBank($vo);
                } else {
                    $this->queryTransferWallet($vo);
                }
            }
        } catch (\Exception $exception) {
            $error++;
            $this->queue->message($total, $count, "处理提现订单 {$vo['code']} 失败, {$exception->getMessage()}", 1);
            $this->app->db->name('DataUserTransfer')->where(['code' => $vo['code']])->update([
                'change_time' => date('Y-m-d H:i:s'), 'change_desc' => $exception->getMessage(),
            ]);
        }
        $this->setQueueSuccess("此次共处理 {$total} 笔提现操作, 其中有 {$error} 笔处理失败。");
    }

    /**
     * 尝试提现转账到银行卡
     * @param array $item
     * @return array [config, result]
     * @throws Exception
     * @throws InvalidDecryptException
     * @throws InvalidResponseException
     * @throws LocalCacheException
     * @throws DataNotFoundException
     * @throws DbException
     * @throws ModelNotFoundException
     */
    private function createTransferBank(array $item): array
    {
        $config = $this->getConfig($item['uuid']);
        return [$config, TransfersBank::instance($config)->create([
            'partner_trade_no' => $item['code'],
            'enc_bank_no'      => $item['bank_code'],
            'enc_true_name'    => $item['bank_user'],
            'bank_code'        => $item['bank_wseq'],
            'amount'           => intval($item['amount'] - $item['charge_amount']) * 100,
            'desc'             => '微信银行卡提现',
        ])];
    }

    /**
     * 获取微信提现参数
     * @param int $uuid
     * @return array
     * @throws Exception
     * @throws DataNotFoundException
     * @throws DbException
     * @throws ModelNotFoundException
     */
    private function getConfig(int $uuid): array
    {
        $data = sysdata('TransferWxpay');
        if (empty($data)) throw new Exception('未配置微信提现商户');
        // 商户证书文件处理
        $local = LocalStorage::instance();
        if (!$local->has($file1 = "{$data['wechat_mch_id']}_key.pem", true)) {
            $local->set($file1, $data['wechat_mch_key_text'], true);
        }
        if (!$local->has($file2 = "{$data['wechat_mch_id']}_cert.pem", true)) {
            $local->set($file2, $data['wechat_mch_cert_text'], true);
        }
        // 获取用户支付信息
        $result = $this->getWechatInfo($uuid, $data['wechat_type']);
        if (empty($result)) throw new Exception('无法读取打款数据');
        return [
            'appid'      => $result[0],
            'openid'     => $result[1],
            'mch_id'     => $data['wechat_mch_id'],
            'mch_key'    => $data['wechat_mch_key'],
            'ssl_key'    => $local->path($file1),
            'ssl_cer'    => $local->path($file2),
            'cache_path' => $this->app->getRootPath() . 'runtime' . DIRECTORY_SEPARATOR . 'wechat',
        ];
    }

    /**
     * 根据配置获取用户OPENID
     * @param int $uuid
     * @param string $type
     * @return mixed|null
     * @throws DataNotFoundException
     * @throws DbException
     * @throws ModelNotFoundException
     */
    private function getWechatInfo(int $uuid, string $type): ?array
    {
        $user = $this->app->db->name('DataUser')->where(['id' => $uuid])->find();
        if (empty($user)) return null;
        $appid1 = sysconf('data.wxapp_appid');
        if (strtolower(sysconf('wechat.type')) === 'api') {
            $appid2 = sysconf('wechat.appid');
        } else {
            $appid2 = sysconf('wechat.thr_appid');
        }
        if ($type === 'normal') {
            if (!empty($user['openid1'])) return [$appid1, $user['openid1']];
            if (!empty($user['openid2'])) return [$appid2, $user['openid2']];
        }
        if ($type === 'wxapp' && !empty($user['openid1'])) {
            return [$appid1, $user['openid1']];
        }
        if ($type === 'wechat' && !empty($user['openid2'])) {
            return [$appid2, $user['openid2']];
        }
        return null;
    }

    /**
     * 尝试提现转账到微信钱包
     * @param array $item
     * @return array [config, result]
     * @throws Exception
     * @throws InvalidResponseException
     * @throws LocalCacheException
     * @throws DataNotFoundException
     * @throws DbException
     * @throws ModelNotFoundException
     */
    private function createTransferWallet(array $item): array
    {
        $config = $this->getConfig($item['uuid']);
        return [$config, Transfers::instance($config)->create([
            'openid'           => $config['openid'],
            'amount'           => intval($item['amount'] - $item['charge_amount']) * 100,
            'partner_trade_no' => $item['code'],
            'spbill_create_ip' => '127.0.0.1',
            'check_name'       => 'NO_CHECK',
            'desc'             => '微信余额提现',
        ])];
    }

    /**
     * 查询更新提现打款状态
     * @param array $item
     * @throws Exception
     * @throws InvalidResponseException
     * @throws LocalCacheException
     * @throws DataNotFoundException
     * @throws DbException
     * @throws ModelNotFoundException
     */
    private function queryTransferBank(array $item)
    {
        $config = $this->getConfig($item['uuid']);
        [$config['appid'], $config['openid']] = [$item['appid'], $item['openid']];
        $result = TransfersBank::instance($config)->query($item['trade_no']);
        if ($result['return_code'] === 'SUCCESS' && $result['result_code'] === 'SUCCESS') {
            if ($result['status'] === 'SUCCESS') {
                $this->app->db->name('DataUserTransfer')->where(['code' => $item['code']])->update([
                    'status'      => 5,
                    'appid'       => $config['appid'],
                    'openid'      => $config['openid'],
                    'trade_time'  => $result['pay_succ_time'] ?: date('Y-m-d H:i:s'),
                    'change_time' => date('Y-m-d H:i:s'),
                    'change_desc' => '微信提现打款成功',
                ]);
            }
            if (in_array($result['status'], ['FAILED', 'BANK_FAIL'])) {
                $this->app->db->name('DataUserTransfer')->where(['code' => $item['code']])->update([
                    'status'      => 0,
                    'change_time' => date('Y-m-d H:i:s'),
                    'change_desc' => '微信提现打款失败',
                ]);
                // 刷新用户可提现余额
                UserRebateService::instance()->amount($item['uuid']);
            }
        }
    }

    /**
     * 查询更新提现打款状态
     * @param array $item
     * @throws Exception
     * @throws InvalidResponseException
     * @throws LocalCacheException
     * @throws DataNotFoundException
     * @throws DbException
     * @throws ModelNotFoundException
     */
    private function queryTransferWallet(array $item)
    {
        $config = $this->getConfig($item['uuid']);
        [$config['appid'], $config['openid']] = [$item['appid'], $item['openid']];
        $result = Transfers::instance($config)->query($item['trade_no']);
        if ($result['return_code'] === 'SUCCESS' && $result['result_code'] === 'SUCCESS') {
            $this->app->db->name('DataUserTransfer')->where(['code' => $item['code']])->update([
                'status'      => 5,
                'appid'       => $config['appid'],
                'openid'      => $config['openid'],
                'trade_time'  => $result['payment_time'],
                'change_time' => date('Y-m-d H:i:s'),
                'change_desc' => '微信提现打款成功',
            ]);
        }
    }
}