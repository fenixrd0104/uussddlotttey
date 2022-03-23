<?php

namespace app\admin\controller;

use think\admin\Controller;
use think\admin\service\AdminService;

/**
 * 转账管理
 * Class Withdraw
 * @package app\admin\controller
 */
class Withdraw extends Controller
{
	/**
     * 绑定数据表
     * @var string
     */
    private $table = 'DataWithdraw';
	
    /**
     * 显示转账列表
	 * @login true # 需要强制登录可访问
	 * @menu true  # 在菜单编辑的节点可选项
     */
    public function index()
    {
        $this->title = '转账记录';
        $query = $this->_query($this->table);
        $query->order('id desc')->page();
    }
	
	/**
     * 删除转账记录
	 * @login true # 需要强制登录可访问
     * @auth true
     */
    public function remove()
    {
        $this->_delete($this->table);
    }
}
