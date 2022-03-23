<?php

namespace app\index\service;

use think\admin\Service;

/**
 * 授权地址数据服务
 * Class AddressService
 * @package app\index\service
 */
class AddressService extends Service
{
	/**
	 * 根据ID获取授权地址信息
     */
	public function get_address_by_id($id){
		return $this->app->db->name('DataAddress')->where('id',$id)->find();
	}
}