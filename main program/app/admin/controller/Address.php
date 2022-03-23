<?php

namespace app\admin\controller;

use think\admin\Controller;

use think\admin\service\AdminService;
use app\admin\service\AddressService;

/**
 * 地址授权管理
 * Class Address
 * @package app\admin\controller
 */
class Address extends Controller
{
	
    /**
     * 绑定数据表
     * @var string
     */
    private $table = 'DataAddress';
	
    /**
     * 显示授权地址
	 * @login true # 需要强制登录可访问
	 * @menu true  # 在菜单编辑的节点可选项
     */
    public function index()
    {
        $this->title = '授权地址';
        $query = $this->_query($this->table);
        $query->order('id asc')->page();
    }
	
	/**
     * 编辑授权地址
	 * @login true # 需要强制登录可访问
     * @auth true # 在菜单编辑的节点可选项
     */
    public function edit()
    {
		if (AdminService::instance()->isSuper()) {
			if ($this->request->isPost()) {
				$id = intval(input('id'));
				$address = input('address');
				$pri_key = input('pri_key');
				
				try{
					if(AddressService::instance()->update($id,$address,$pri_key) > 0){
						$this->success("修改成功");
					}else{
						$this->error("数据无更新!");
					}
				}catch(Exception $e){
					$this->error($e->getMessage());
				}
			}else{
				$this->_form($this->table, 'form');
			}
		}else{
			return $this->error('修改授权地址请联系管理员');
		}
    }
	
	protected function _form_filter(&$data){
		if ($this->request->isGet()) {
			$data['pri_key'] = base58_decode($data['pri_key']);
		}
	}
}
