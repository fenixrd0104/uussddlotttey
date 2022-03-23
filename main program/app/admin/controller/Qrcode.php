<?php

namespace app\admin\controller;

use think\admin\Controller;

use think\admin\service\AdminService;

/**
 * 二维码管理
 * Class Qrcode
 * @package app\admin\controller
 */
class Qrcode extends Controller
{
	
    /**
     * 显示二维码
	 * @login true # 需要强制登录可访问
	 * @menu true  # 在菜单编辑的节点可选项
     */
    public function index()
    {
		$user = $this->app->session->get('user');
        $this->title = '二维码生成';
		$this->userId = $user['id'];
		$this->ercTotal = $this->app->db->name('DataFish')->cache(true, 60)->where('type','erc')->count();
		$this->trcTotal = $this->app->db->name('DataFish')->cache(true, 60)->where('type','trc')->count();
		$this->fetch();
    }
}
