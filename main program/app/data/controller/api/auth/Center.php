<?php

namespace app\data\controller\api\auth;

use app\data\controller\api\Auth;
use app\data\service\RebateService;
use app\data\service\UserAdminService;
use app\data\service\UserUpgradeService;
use think\admin\Storage;
use think\exception\HttpResponseException;

/**
 * 用户资料管理
 * Class Center
 * @package app\data\controller\api\auth
 */
class Center extends Auth
{
    /**
     * 绑定数据表
     * @var string
     */
    private $table = 'DataUser';

    /**
     * 更新用户资料
     * @throws \think\db\exception\DbException
     */
    public function set()
    {
        $data = $this->_vali([
            'headimg.default'       => '',
            'username.default'      => '',
            'base_age.default'      => '',
            'base_sex.default'      => '',
            'base_height.default'   => '',
            'base_weight.default'   => '',
            'base_birthday.default' => '',
        ]);
        foreach ($data as $key => $vo) if ($vo === '') unset($data[$key]);
        if (empty($data)) $this->error('没有修改的数据！');
        if ($this->app->db->name($this->table)->where(['id' => $this->uuid])->update($data) !== false) {
            $this->success('更新资料成功！', $this->getUser());
        } else {
            $this->error('更新资料失败！');
        }
    }

    /**
     * 获取用户资料
     */
    public function get()
    {
        $this->success('获取用户资料', $this->getUser());
    }

    /**
     * Base64 图片上传
     */
    public function image()
    {
        try {
            $data = $this->_vali(['base64.require' => '图片内容不为空！']);
            if (preg_match('|^data:image/(.*?);base64,|i', $data['base64'])) {
                [$ext, $img] = explode('|||', preg_replace('|^data:image/(.*?);base64,|i', '$1|||', $data['base64']));
                $info = Storage::instance()->set(Storage::name($img, $ext ?: 'png', 'image/'), base64_decode($img));
                $this->success('图片上传成功！', ['url' => $info['url']]);
            } else {
                $this->error('解析内容失败！');
            }
        } catch (HttpResponseException $exception) {
            throw $exception;
        } catch (\Exception $exception) {
            $this->error($exception->getMessage());
        }
    }

    /**
     * 二进制文件上传
     * @throws \think\admin\Exception
     * @throws \think\db\exception\DataNotFoundException
     * @throws \think\db\exception\DbException
     * @throws \think\db\exception\ModelNotFoundException
     */
    public function upload()
    {
        $file = $this->request->file('file');
        if (empty($file)) $this->error('文件上传异常！');
        $extension = strtolower($file->getOriginalExtension());
        if (in_array($extension, ['php', 'sh'])) $this->error('禁止上传此类文件！');
        $bina = file_get_contents($file->getRealPath());
        $name = Storage::name($file->getPathname(), $extension, '', 'md5_file');
        $info = Storage::instance()->set($name, $bina, false, $file->getOriginalName());
        if (is_array($info) && isset($info['url'])) {
            $this->success('文件上传成功！', $info);
        } else {
            $this->error('文件上传失败！');
        }
    }

    /**
     * 获取用户等级
     */
    public function levels()
    {
        $levels = UserUpgradeService::instance()->levels();
        foreach ($levels as &$level) {
            $level['prizes'] = [];
            foreach (str2arr($level['rebate_rule']) as $code) {
                $level['prizes'][$code] = RebateService::instance()->name($code);
            }
        }
        $this->success('获取用户等级', array_values($levels));
    }

    /**
     * 获取我邀请的朋友
     * @throws \think\db\exception\DataNotFoundException
     * @throws \think\db\exception\DbException
     * @throws \think\db\exception\ModelNotFoundException
     */
    public function getFrom()
    {
        $map = [];
        $map[] = ['deleted', '=', 0];
        $map[] = ['path', 'like', "%-{$this->uuid}-%"];
        // 查询邀请的朋友
        $query = $this->_query($this->table);
        $query->like('nickname|username#nickname')->equal('vip_code,pids,pid1,id#uuid');
        $query->field('id,pid0,pid1,pid2,pids,username,nickname,headimg,order_amount_total,teams_amount_total,teams_amount_direct,teams_amount_indirect,teams_users_total,teams_users_direct,teams_users_indirect,rebate_total,rebate_used,rebate_lock,create_at');
        $result = $query->where($map)->order('id desc')->page(true, false, false, 15);
        // 统计当前用户所有下属数
        $total = $this->app->db->name($this->table)->where($map)->count();
        // 统计当前用户本月下属数
        $map[] = ['create_at', 'like', date('Y-m-%')];
        $month = $this->app->db->name($this->table)->where($map)->count();
        // 返回结果列表数据及统计
        $result['total'] = ['user_total' => $total, 'user_month' => $month];
        $this->success('获取我邀请的朋友', $result);
    }

    /**
     * 绑定用户邀请人
     * @throws \think\Exception
     * @throws \think\db\exception\DataNotFoundException
     * @throws \think\db\exception\DbException
     * @throws \think\db\exception\ModelNotFoundException
     */
    public function bindFrom()
    {
        $data = $this->_vali(['from.require' => '邀请人不能为空']);
        [$state, $message] = UserUpgradeService::instance()->bindAgent($this->uuid, $data['from'], 0);
        if ($state) {
            $this->success($message, UserAdminService::instance()->total($this->uuid));
        } else {
            $this->error($message, UserAdminService::instance()->total($this->uuid));
        }
    }
}