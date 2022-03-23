<?php

namespace app\data\controller\base\postage;

use app\data\service\ExpressService;
use think\admin\Controller;
use think\admin\extend\CodeExtend;

/**
 * 邮费模板管理
 * Class Template
 * @package app\data\controller\base\postage
 */
class Template extends Controller
{
    /**
     * 绑定数据表
     * @var string
     */
    private $table = 'BasePostageTemplate';

    /**
     * 快递邮费模板
     * @auth true
     * @menu true
     * @throws \think\db\exception\DataNotFoundException
     * @throws \think\db\exception\DbException
     * @throws \think\db\exception\ModelNotFoundException
     */
    public function index()
    {
        $this->title = '快递邮费模板';
        $query = $this->_query($this->table);
        $query->like('code,name')->equal('status')->dateBetween('create_at');
        $query->where(['deleted' => 0])->order('sort desc,id desc')->page();
    }

    /**
     * 配送区域管理
     * @auth true
     * @throws \think\db\exception\DbException
     */
    public function region()
    {
        if ($this->request->isGet()) {
            $this->title = '配送区域管理';
            $this->citys = ExpressService::instance()->region(3, null);
            $this->fetch('form_region');
        } else {
            $data = $this->_vali(['nos.default' => '', 'oks.default' => '']);
            if ($data['nos']) $this->app->db->name('BasePostageRegion')->whereIn('id', str2arr($data['nos']))->update(['status' => 0]);
            if ($data['oks']) $this->app->db->name('BasePostageRegion')->whereIn('id', str2arr($data['oks']))->update(['status' => 1]);
            $this->success('修改配送区域成功！', 'javascript:history.back()');
        }
    }

    /**
     * 添加配送邮费模板
     * @auth true
     * @throws \think\db\exception\DataNotFoundException
     * @throws \think\db\exception\DbException
     * @throws \think\db\exception\ModelNotFoundException
     */
    public function add()
    {
        $this->title = '添加配送邮费模板';
        $this->_form($this->table, 'form', 'code');
    }

    /**
     * 编辑配送邮费模板
     * @auth true
     * @throws \think\db\exception\DataNotFoundException
     * @throws \think\db\exception\DbException
     * @throws \think\db\exception\ModelNotFoundException
     */
    public function edit()
    {
        $this->title = '编辑配送邮费模板';
        $this->_form($this->table, 'form', 'code');
    }

    /**
     * 表单数据处理
     * @param array $data
     */
    protected function _form_filter(array &$data)
    {
        if (empty($data['code'])) {
            $data['code'] = CodeExtend::uniqidDate(12, 'T');
        }
        if ($this->request->isGet()) {
            $this->citys = ExpressService::instance()->region(2, 1);
        }
    }

    /**
     * 表单结果处理
     * @param boolean $result
     */
    protected function _form_result(bool $result)
    {
        if ($result && $this->request->isPost()) {
            $this->success('邮费模板保存成功！', 'javascript:history.back()');
        }
    }

    /**
     * 启用或禁用邮费模板
     * @auth true
     * @throws \think\db\exception\DbException
     */
    public function state()
    {
        $this->_save($this->table, $this->_vali([
            'status.in:0,1'  => '状态值范围异常！',
            'status.require' => '状态值不能为空！',
        ]), 'code');
    }

    /**
     * 删除邮费模板
     * @auth true
     * @throws \think\db\exception\DbException
     */
    public function remove()
    {
        $this->_delete($this->table, 'code');
    }

}