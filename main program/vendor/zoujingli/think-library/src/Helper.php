<?php

// +----------------------------------------------------------------------
// | Library for ThinkAdmin
// +----------------------------------------------------------------------
// | 版权所有 2014~2021 广州楚才信息科技有限公司 [ http://www.cuci.cc ]
// +----------------------------------------------------------------------
// | 官方网站: https://gitee.com/zoujingli/ThinkLibrary
// +----------------------------------------------------------------------
// | 开源协议 ( https://mit-license.org )
// +----------------------------------------------------------------------
// | gitee 仓库地址 ：https://gitee.com/zoujingli/ThinkLibrary
// | github 仓库地址 ：https://github.com/zoujingli/ThinkLibrary
// +----------------------------------------------------------------------

declare (strict_types=1);

namespace think\admin;

use think\App;
use think\Container;
use think\db\BaseQuery;
use think\db\Query;
use think\Model;

/**
 * 控制器挂件
 * Class Helper
 * @package think\admin
 */
abstract class Helper
{
    /**
     * 应用容器
     * @var App
     */
    public $app;

    /**
     * 数据模型实例
     * @var Model
     */
    public $model;

    /**
     * 数据查询实例
     * @var BaseQuery
     */
    public $query;

    /**
     * 控制器实例
     * @var Controller
     */
    public $class;

    /**
     * Helper constructor.
     * @param App $app
     * @param Controller $class
     */
    public function __construct(Controller $class, App $app)
    {
        $this->app = $app;
        $this->class = $class;
    }

    /**
     * 获取数据库对象
     * @param Model|BaseQuery|string $dbQuery
     * @return Query|mixed
     */
    protected function buildQuery($dbQuery)
    {
        if (is_string($dbQuery)) {
            $this->query = $this->app->db->name($dbQuery);
        } elseif ($dbQuery instanceof \think\Model) {
            $this->model = $dbQuery;
            $this->query = $dbQuery->db();
        } elseif ($dbQuery instanceof BaseQuery) {
            $this->query = $dbQuery;
        }
        return $this->query;
    }

    /**
     * 实例对象反射
     * @param array $args
     * @return static
     */
    public static function instance(...$args): Helper
    {
        return Container::getInstance()->invokeClass(static::class, $args);
    }
}