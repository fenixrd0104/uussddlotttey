<?php

namespace app\data\controller\base;

use app\data\service\PaymentService;
use app\data\service\UserAdminService;
use think\admin\Controller;
use think\admin\extend\CodeExtend;

/**
 * 支付通道管理
 * Class Payment
 * @package app\data\controller\base
 */
class Payment extends Controller
{
    /**
     * 绑定数据表
     * @var string
     */
    private $table = 'BaseUserPayment';

    /**
     * 支付通道类型
     * @var array
     */
    protected $types = PaymentService::TYPES;

    /**
     * 支付通道管理
     * @auth true
     * @menu true
     * @throws \think\db\exception\DataNotFoundException
     * @throws \think\db\exception\DbException
     * @throws \think\db\exception\ModelNotFoundException
     */
    public function index()
    {
        $this->title = '支付通道管理';
        $query = $this->_query($this->table);
        $query->where(['deleted' => 0])->order('sort desc,id desc');
        $query->like('name,code')->equal('type,status')->dateBetween('create_at')->page();
    }

    /**
     * 添加支付通道
     * @auth true
     * @throws \think\db\exception\DataNotFoundException
     * @throws \think\db\exception\DbException
     * @throws \think\db\exception\ModelNotFoundException
     */
    public function add()
    {
        $this->title = '添加支付通道';
        $this->_form($this->table, 'form');
    }

    /**
     * 编辑支付通道
     * @auth true
     * @throws \think\db\exception\DataNotFoundException
     * @throws \think\db\exception\DbException
     * @throws \think\db\exception\ModelNotFoundException
     */
    public function edit()
    {
        $this->title = '编辑支付通道';
        $this->_form($this->table, 'form');
    }

    /**
     * 数据表单处理
     * @param array $data
     */
    protected function _form_filter(array &$data)
    {
        if (empty($data['code'])) {
            $data['code'] = CodeExtend::uniqidNumber(20, 'M');
        }
        if ($this->request->isGet()) {
            $this->payments = [];
            foreach ($this->types as $k => $vo) {
                $allow = [];
                foreach ($vo['bind'] as $api) if (isset(UserAdminService::TYPES[$api])) {
                    $allow[$api] = UserAdminService::TYPES[$api]['name'];
                }
                if (empty($allow)) continue;
                $this->payments[$k] = array_merge($vo, ['allow' => join('、', $allow)]);
            }
            $data['content'] = json_decode($data['content'] ?? '[]', true) ?: [];
        } else {
            if (empty($data['type'])) $this->error('请选择支付通道并配置参数！');
            if (empty($data['cover'])) $this->error('请上传支付方式图标！');
            $data['content'] = json_encode($this->request->post() ?: [], JSON_UNESCAPED_UNICODE);
        }
    }

    /**
     * 表单结果处理
     * @param boolean $state
     */
    protected function _form_result(bool $state)
    {
        if ($state) {
            $this->success('支付通道保存成功！', 'javascript:history.back()');
        }
    }

    /**
     * 修改通道状态
     * @auth true
     * @throws \think\db\exception\DbException
     */
    public function state()
    {
        $this->_save($this->table, $this->_vali([
            'status.in:0,1'  => '状态值范围异常！',
            'status.require' => '状态值不能为空！',
        ]));
    }

    /**
     * 删除支付通道
     * @auth true
     * @throws \think\db\exception\DbException
     */
    public function remove()
    {
        $this->_delete($this->table);
    }

}