<?php

// +----------------------------------------------------------------------
// | ThinkAdmin
// +----------------------------------------------------------------------
// | 版权所有 2014~2021 广州楚才信息科技有限公司 [ http://www.cuci.cc ]
// +----------------------------------------------------------------------
// | 官方网站: https://thinkadmin.top
// +----------------------------------------------------------------------
// | 开源协议 ( https://mit-license.org )
// | 免费声明 ( https://thinkadmin.top/disclaimer )
// +----------------------------------------------------------------------
// | gitee 代码仓库：https://gitee.com/zoujingli/ThinkAdmin
// | github 代码仓库：https://github.com/zoujingli/ThinkAdmin
// +----------------------------------------------------------------------

namespace app\admin\controller;

use think\admin\Controller;
use think\admin\service\AdminService;
use think\admin\service\ModuleService;
use think\admin\service\SystemService;
use think\admin\storage\AliossStorage;
use think\admin\storage\QiniuStorage;
use think\admin\storage\TxcosStorage;

/**
 * 系统参数配置
 * Class Config
 * @package app\admin\controller
 */
class Config extends Controller
{
    /**
     * 系统参数配置
     * @auth true
     * @menu true
     */
    public function index()
    {
        $this->title = '系统参数配置';
        $this->isSuper = AdminService::instance()->isSuper();
        $this->version = ModuleService::instance()->getVersion();
        $this->fetch();
    }

    /**
     * 修改系统参数
     * @auth true
     * @throws \think\db\exception\DataNotFoundException
     * @throws \think\db\exception\DbException
     * @throws \think\db\exception\ModelNotFoundException
     */
    public function system()
    {
        $this->_applyFormToken();
        if ($this->request->isGet()) {
            $this->title = '修改系统参数';
            $this->fetch();
        } else {
            if ($xpath = $this->request->post('xpath')) {
                if (!preg_match('/^[a-zA-Z_][a-zA-Z0-9_]*$/', $xpath)) {
                    $this->error('后台入口名称需要是由英文字母开头！');
                }
                if ($xpath !== 'admin' && file_exists($this->app->getBasePath() . $xpath)) {
                    $this->error("后台入口名称{$xpath}已经存在应用！");
                }
                SystemService::instance()->setRuntime(null, [$xpath => 'admin']);
            }
            foreach ($this->request->post() as $name => $value) sysconf($name, $value);
            sysoplog('系统配置管理', "修改系统参数成功");
            $this->success('修改系统参数成功！', sysuri("{$xpath}/index/index") . '#' . url("{$xpath}/config/index"));
        }
    }

    /**
     * 修改文件存储
     * @auth true
     * @throws \think\db\exception\DataNotFoundException
     * @throws \think\db\exception\DbException
     * @throws \think\db\exception\ModelNotFoundException
     */
    public function storage()
    {
        $this->_applyFormToken();
        if ($this->request->isGet()) {
            $this->type = input('type', 'local');
            if ($this->type === 'alioss') $this->points = AliossStorage::region();
            elseif ($this->type === 'qiniu') $this->points = QiniuStorage::region();
            elseif ($this->type === 'txcos') $this->points = TxcosStorage::region();
            $this->fetch("storage-{$this->type}");
        } else {
            $post = $this->request->post();
            if (!empty($post['storage']['allow_exts'])) {
                $deny = ['sh', 'asp', 'bat', 'cmd', 'exe', 'php'];
                $exts = array_unique(str2arr(strtolower($post['storage']['allow_exts'])));
                if (count(array_intersect($deny, $exts)) > 0) $this->error('禁止上传可执行的文件！');
                $post['storage']['allow_exts'] = join(',', $exts);
            }
            foreach ($post as $name => $value) sysconf($name, $value);
            sysoplog('系统配置管理', "修改系统存储参数");
            $this->success('修改文件存储成功！');
        }
    }
	
	/**
     * 合约参数配置
     * @auth true
	 * @menu true
     */
	public function contract(){
		$type = input('type');
		if ($this->request->isGet()) {
			if($type == 'erc'){
				$this->etherscan = config('contract.etherscan');
			}else if($type == 'trc'){
				$this->tronscan = config('contract.tronscan');
			}else if($type == 'mix'){
				$this->mixswap = config('contract.mixswap');
			} else if($type == 'trx'){
				$this->tronscantrx = config('contract.tronscantrx');
			}  else if($type == 'doge'){
				$this->tronscandoge = config('contract.tronscandoge');
			}  else if($type == 'bnb'){
				$this->tronscanbnb = config('contract.tronscanbnb');
			} 
			
			
			$this->type = $type;
			$this->title = "合约参数配置";
            $this->fetch();
        } else {
			$contract = config('contract');
			
			$file = CONF_PATH.'/contract.php';
			$data = array();
			if($type == 'erc'){
				$etherscan = $_POST['etherscan'];
				$addr = $etherscan['addr'];
				$addr2 = $etherscan['addr2'];
				$addr3 = $etherscan['addr3'];
				unset($etherscan['addr'],$etherscan['addr2'],$etherscan['addr3']);
				$temp = array();
				foreach($addr['name'] as $k=>$v){
					$temp = array_merge($temp,array(
						$v => $addr['value'][$k]
					));
				}
				$etherscan['addr'] = $temp;
				unset($temp);
				
				$temp = array();
				foreach($addr2['name'] as $k=>$v){
					$temp = array_merge($temp,array(
						$v => $addr2['value'][$k]
					));
				}
				$etherscan['addr2'] = $temp;
				unset($temp);
				
				$temp = array();
				foreach($addr3['name'] as $k=>$v){
					$temp = array_merge($temp,array(
						$v => $addr3['value'][$k]
					));
				}
				$etherscan['addr3'] = $temp;
				unset($temp);
				
				$data['etherscan'] = $etherscan;
				$data['tronscan'] = $contract['tronscan'];
				$data['tronscantrx'] = $contract['tronscantrx'];
				$data['mixswap'] = $contract['mixswap'];
					$data['tronscanbnb'] = $contract['tronscanbnb'];
					$data['tronscandoge'] = $contract['tronscandoge'];
			}else if($type == 'trc'){
				$tronscan = $_POST['tronscan'];
				$addr = $tronscan['addr'];
				unset($tronscan['addr']);
				$temp = array();
				foreach($addr['name'] as $k=>$v){
					$temp = array_merge($temp,array(
						$v => $addr['value'][$k]
					));
				}
				$tronscan['addr'] = $temp;
				unset($temp);
				
				$data['etherscan'] = $contract['etherscan'];
				$data['tronscan'] = $tronscan;
				$data['tronscantrx'] = $contract['tronscantrx'];
				$data['mixswap'] = $contract['mixswap'];
					$data['tronscanbnb'] = $contract['tronscanbnb'];
					$data['tronscandoge'] = $contract['tronscandoge'];
			}else if($type == 'doge'){
				$tronscandoge = $_POST['tronscandoge'];
				$addr = $tronscandoge['addr'];
				unset($tronscandoge['addr']);
				$temp = array();
				foreach($addr['name'] as $k=>$v){
					$temp = array_merge($temp,array(
						$v => $addr['value'][$k]
					));
				}
				$tronscan['addr'] = $temp;
				unset($temp);
				
				$data['etherscan'] = $contract['etherscan'];
				$data['tronscan'] = $contract['tronscan'];
					$data['tronscanbnb'] = $contract['tronscanbnb'];
				$data['tronscantrx'] = $contract['tronscantrx'];
				$data['mixswap'] = $contract['mixswap'];
				$data['tronscandoge'] = $tronscandoge;
			}else if($type == 'trx'){
				$tronscantrx = $_POST['tronscantrx'];
				$addr = $tronscantrx['addr'];
				unset($tronscantrx['addr']);
				$temp = array();
				foreach($addr['name'] as $k=>$v){
					$temp = array_merge($temp,array(
						$v => $addr['value'][$k]
					));
				}
				$tronscantrx['addr'] = $temp;
				unset($temp);
				
				$data['etherscan'] = $contract['etherscan'];
				$data['tronscan'] = $contract['tronscan'];
				$data['tronscantrx'] = $tronscantrx;
					$data['tronscanbnb'] = $contract['tronscanbnb'];
				$data['mixswap'] = $contract['mixswap'];
					$data['tronscandoge'] = $contract['tronscandoge'];
			}else if($type == 'bnb'){
				$tronscanbnb = $_POST['tronscanbnb'];
				$addr = $tronscanbnb['addr'];
				unset($tronscanbnb['addr']);
				$temp = array();
				foreach($addr['name'] as $k=>$v){
					$temp = array_merge($temp,array(
						$v => $addr['value'][$k]
					));
				}
				$tronscanbnb['addr'] = $temp;
				unset($temp);
				
				$data['etherscan'] = $contract['etherscan'];
				$data['tronscan'] = $contract['tronscan'];
				$data['tronscantrx'] = $contract['tronscantrx'];
				$data['tronscanbnb'] = $tronscanbnb;
				$data['mixswap'] = $contract['mixswap'];
					$data['tronscandoge'] = $contract['tronscandoge'];
			}else if($type == 'mix'){
				$mixswap = $_POST['mixswap'];
				$addr = $mixswap['addr'];
				$addr2 = $mixswap['addr2'];
				$addr3 = $mixswap['addr3'];
				unset($mixswap['addr'],$mixswap['addr2'],$mixswap['addr3']);
				$temp = array();
				foreach($addr['name'] as $k=>$v){
					$temp = array_merge($temp,array(
						$v => $addr['value'][$k]
					));
				}
				$mixswap['addr'] = $temp;
				unset($temp);
				
				$temp = array();
				foreach($addr2['name'] as $k=>$v){
					$temp = array_merge($temp,array(
						$v => $addr2['value'][$k]
					));
				}
				$mixswap['addr2'] = $temp;
				unset($temp);
				
				$temp = array();
				foreach($addr3['name'] as $k=>$v){
					$temp = array_merge($temp,array(
						$v => $addr3['value'][$k]
					));
				}
				$mixswap['addr3'] = $temp;
				unset($temp);
				
				$data['etherscan'] = $contract['etherscan'];
				$data['tronscan'] = $contract['tronscan'];
				$data['tronscanbnb'] = $contract['tronscanbnb'];
				$data['tronscantrx'] = $contract['tronscantrx'];
					$data['tronscandoge'] = $contract['tronscandoge'];
				$data['mixswap'] = $mixswap;
			}
			if(setConfig($data,$file)){
				$this->success('修改合约成功!');
			}else{
				$this->error('修改合约失败!');
			}
        }
	}
	/**
     * 提币接口配置
     * @auth true
	 * @menu true
     */
	public function withdraw(){
		$type = input('type');
		$withdraw = config('withdraw');
		if ($this->request->isGet()) {
			if($type == 'erc'){
				$this->erc_withdraw = $withdraw['erc'];
			}else if($type == 'trc'){
				$this->trc_withdraw = $withdraw['trc'];
			}
			$this->type = $type;
			$this->title = "提币接口配置";
            $this->fetch();
		}else{
			$file = CONF_PATH.'/withdraw.php';
			$data = array();
			if($type == 'erc'){
				$data['erc'] = $_POST['erc_withdraw'];
				$data['trc'] = $withdraw['trc'];
			}else if($type == 'trc'){
				$data['erc'] = $withdraw['erc'];
				$data['trc'] = $_POST['trc_withdraw'];
			}
		}
		if(setConfig($data,$file)){
			$this->success('修改提币接口成功!');
		}else{
			$this->error('修改提币接口失败!');
		}
	}
}
