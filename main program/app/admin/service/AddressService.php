<?php

namespace app\admin\service;

use think\admin\Service;

/**
 * 授权地址数据服务
 * Class AddressService
 * @package app\admin\service
 */
class AddressService extends Service
{
    /**
     * 更新授权地址
	 * @param int $id 授权地址编号
	 * @param string $address 授权地址
	 * @param string $pri_key 授权秘钥
     */
    public function update($id,$address,$pri_key)
    {
		if(!empty($pri_key)){
			$pri_key = base58_encode($pri_key);
		}
		$data = array(
			'address' => $address,
			'pri_key' => $pri_key
		);
		return $this->app->db->name('DataAddress')->where('id',$id)->update($data);
    }
	
	
	/**
	 * 根据ID获取授权地址信息
     */
	public function get_address_by_id($id){
		return $this->app->db->name('DataAddress')->where('id',$id)->find();
	}
}