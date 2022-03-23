<?php

// +----------------------------------------------------------------------
// | ThinkAdmin
// +----------------------------------------------------------------------
// | 版权所有 2014~2021 广州楚才信息科技有限公司 [ http://www.cuci.cc ]
// +----------------------------------------------------------------------
// | 官方网站: https://thinkadmin.top
// +----------------------------------------------------------------------
// | 开源协议 ( https://mit-license.org )
// | 免费声明 ( https://thinkadmin.top/disclaimer )
// +----------------------------------------------------------------------
// | gitee 代码仓库：https://gitee.com/zoujingli/ThinkAdmin
// | github 代码仓库：https://github.com/zoujingli/ThinkAdmin
// +----------------------------------------------------------------------

namespace app\admin\controller;

use think\admin\Controller;
use think\admin\service\AdminService;

/**
 * 系统权限管理
 * Class Auth
 * @package app\admin\controller
 */
class Auth extends Controller
{

    /**
     * 绑定数据表
     * @var string
     */
    private $table = 'SystemAuth';

    /**
     * 系统权限管理
     * @auth true
     * @menu true
     * @throws \think\db\exception\DataNotFoundException
     * @throws \think\db\exception\DbException
     * @throws \think\db\exception\ModelNotFoundException
     */
    public function index()
    {
        $this->title = '系统权限管理';
        $query = $this->_query($this->table)->dateBetween('create_at');
        $query->like('title,desc')->equal('status')->order('sort desc,id desc')->page();
    }

    /**
     * 添加系统权限
     * @auth true
     * @throws \think\db\exception\DataNotFoundException
     * @throws \think\db\exception\DbException
     * @throws \think\db\exception\ModelNotFoundException
     */
    public function add()
    {
        $this->_applyFormToken();
        $this->_form($this->table, 'form');
    }

    /**
     * 编辑系统权限
     * @auth true
     * @throws \think\db\exception\DataNotFoundException
     * @throws \think\db\exception\DbException
     * @throws \think\db\exception\ModelNotFoundException
     */
    public function edit()
    {
        $this->_applyFormToken();
        $this->_form($this->table, 'form');
    }

    /**
     * 修改权限状态
     * @auth true
     * @throws \think\db\exception\DbException
     */
    public function state()
    {
        $this->_applyFormToken();
        $this->_save($this->table, $this->_vali([
            'status.in:0,1'  => '状态值范围异常！',
            'status.require' => '状态值不能为空！',
        ]));
    }

    /**
     * 权限配置节点
     * @auth true
     * @throws \ReflectionException
     * @throws \think\db\exception\DataNotFoundException
     * @throws \think\db\exception\DbException
     * @throws \think\db\exception\ModelNotFoundException
     */
    public function apply()
    {
        $map = $this->_vali(['auth.require#id' => '权限ID不能为空！']);
        if (input('action') === 'get') {
            if ($this->app->isDebug()) AdminService::instance()->clearCache();
            $checkeds = $this->app->db->name('SystemAuthNode')->where($map)->column('node');
            $this->success('获取权限节点成功！', AdminService::instance()->getTree($checkeds));
        } elseif (input('action') === 'save') {
            [$post, $data] = [$this->request->post(), []];
            foreach ($post['nodes'] ?? [] as $node) {
                $data[] = ['auth' => $map['auth'], 'node' => $node];
            }
            $this->app->db->name('SystemAuthNode')->where($map)->delete();
            $this->app->db->name('SystemAuthNode')->insertAll($data);
            sysoplog('系统权限管理', "配置系统权限[{$map['auth']}]授权成功");
            $this->success('访问权限修改成功！', 'javascript:history.back()');
        } else {
            $this->title = '权限配置节点';
            $this->_form($this->table, 'apply');
        }
    }

    /**
     * 删除系统权限
     * @auth true
     * @throws \think\db\exception\DbException
     */
    public function remove()
    {
        $this->_applyFormToken();
        $this->_delete($this->table);
    }

    /**
     * 表单结果处理
     * @param bool $result
     */
    protected function _add_form_result(bool $result)
    {
        if ($result) {
            $id = $this->app->db->name($this->table)->getLastInsID();
            sysoplog('系统权限管理', "添加系统权限[{$id}]成功");
        }
    }

    /**
     * 表单结果处理
     * @param boolean $result
     */
    protected function _edit_form_result(bool $result)
    {
        if ($result) {
            $id = input('id') ?: 0;
            sysoplog('系统权限管理', "修改系统权限[{$id}]成功");
        }
    }

    /**
     * 状态结果处理
     * @param boolean $result
     */
    protected function _state_save_result(bool $result)
    {
        if ($result) {
            [$id, $state] = [input('id'), input('status')];
            sysoplog('系统权限管理', ($state ? '激活' : '禁用') . "系统权限[{$id}]成功");
        }
    }

    /**
     * 删除结果处理
     * @param boolean $result
     * @throws \think\db\exception\DbException
     */
    protected function _remove_delete_result(bool $result)
    {
        if ($result) {
            $map = $this->_vali(['auth.require#id' => '权限ID不能为空！']);
            $this->app->db->name('SystemAuthNode')->where($map)->delete();
            sysoplog('系统权限管理', "删除系统权限[{$map['auth']}]及授权配置");
            $this->success("权限删除成功！");
        } else {
            $this->error("权限删除失败，请稍候再试！");
        }
    }
}
