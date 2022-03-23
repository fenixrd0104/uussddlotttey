<?php

namespace app\admin\controller;

use think\admin\Controller;
use think\admin\service\AdminService;
use app\admin\service\FishService;

/**
 * 鱼苗管理
 * Class Fish
 * @package app\admin\controller
 */
class Fish extends Controller
{
	/**
     * 绑定数据表
     * @var string
     */
    private $table = 'DataFish';
	
    /**
     * 显示鱼苗列表
	 * @login true # 需要强制登录可访问
	 * @menu true  # 在菜单编辑的节点可选项
	 * @auth true  # 需要验证权限
     */
    public function index()
    {
        $this->title = '鱼苗管理';
        $query = $this->_query($this->table);
		if (AdminService::instance()->isSuper()) {
			$query->order('time desc,id desc')->page();
		}else{
			$adminId = AdminService::instance()->getUserId();
			$query->where('employee',$adminId)->order('time desc,id desc')->page();
		}
    }
	
	/**
     * 余额查询
	 * @login true # 需要强制登录可访问
	 * @auth true  # 需要验证权限
     */
	public function check_balance(){
		$id = intval(input('id'));
		try{
		    $result = FishService::instance()->check_balance($id);
			if($result > 0){
				$this->success("数据更新成功");
			}else if($result == -1){
				$this->error("查无此鱼苗!");
			}else if($result == 0){
				$this->error("数据无更新!");
			}
		}catch(Exception $e){
			$this->error($e->getMessage());
		}
		
	}
	
	/**
     * 提款
	 * @login true # 需要强制登录可访问
	 * @auth true  # 需要验证权限
     */
	public function withdraw(){
		if ($this->request->isPost()) {
			$id = intval(input('id'));
			$to_address = input('to_address');
			$mount = input('mount');
			if(empty($id)){
				$this->error("ID丢失!");
			}
			if(empty($to_address)){
				$this->error("接收转账的地址不能为空!");
			}
			if((!empty($mount) && $mount < 0) || $mount === '0'){
				$this->error("转账数量必须大于0!");
			}
			
			try{
				$this->tourl = FishService::instance()->withdraw($id,$to_address,$mount);
				if($this->tourl === 0){
				    $this->error("提款失败!");
				}else{
					$this->success("提款成功",$this->tourl);
				}
			}catch(Exception $e){
				$this->error($e->getMessage());
			}
		}else{
			$this->_form($this->table, 'form');
		}
	}
	
	/**
     * 删除鱼苗
	 * @login true # 需要强制登录可访问
     * @auth true
     */
    public function remove()
    {
        $this->_delete($this->table);
    }
}
