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

namespace think\admin\helper;

use think\admin\Helper;
use think\db\BaseQuery;
use think\db\exception\DataNotFoundException;
use think\db\exception\DbException;
use think\db\exception\ModelNotFoundException;
use think\db\Query;
use think\Model;

/**
 * 搜索条件处理器
 * Class QueryHelper
 * @package think\admin\helper
 * @see \think\db\Query
 * @mixin Query
 */
class QueryHelper extends Helper
{
    /**
     * 初始化默认数据
     * @var array
     */
    protected $input;

    /**
     * 获取当前Db操作对象
     * @return BaseQuery
     */
    public function db(): BaseQuery
    {
        return $this->query;
    }

    /**
     * 逻辑器初始化
     * @param Model|BaseQuery|string $dbQuery
     * @param string|array|null $input 输入数据
     * @return $this
     */
    public function init($dbQuery, $input = null): QueryHelper
    {
        $this->query = $this->buildQuery($dbQuery);
        $this->input = $this->getInputData($input);
        return $this;
    }

    /**
     * 设置 Like 查询条件
     * @param string|array $fields 查询字段
     * @param string $split 前后分割符
     * @param string|array|null $input 输入数据
     * @param string $alias 别名分割符
     * @return $this
     */
    public function like($fields, string $split = '', $input = null, string $alias = '#'): QueryHelper
    {
        $data = $this->getInputData($input ?: $this->input);
        foreach (is_array($fields) ? $fields : explode(',', $fields) as $field) {
            [$dk, $qk] = [$field, $field];
            if (stripos($field, $alias) !== false) {
                [$dk, $qk] = explode($alias, $field);
            }
            if (isset($data[$qk]) && $data[$qk] !== '') {
                $this->query->whereLike($dk, "%{$split}{$data[$qk]}{$split}%");
            }
        }
        return $this;
    }

    /**
     * 设置 Equal 查询条件
     * @param string|array $fields 查询字段
     * @param string|array|null $input 输入类型
     * @param string $alias 别名分割符
     * @return $this
     */
    public function equal($fields, $input = null, string $alias = '#'): QueryHelper
    {
        $data = $this->getInputData($input ?: $this->input);
        foreach (is_array($fields) ? $fields : explode(',', $fields) as $field) {
            [$dk, $qk] = [$field, $field];
            if (stripos($field, $alias) !== false) {
                [$dk, $qk] = explode($alias, $field);
            }
            if (isset($data[$qk]) && $data[$qk] !== '') {
                $this->query->where($dk, "{$data[$qk]}");
            }
        }
        return $this;
    }

    /**
     * 设置 IN 区间查询
     * @param string|array $fields 查询字段
     * @param string $split 输入分隔符
     * @param string|array|null $input 输入数据
     * @param string $alias 别名分割符
     * @return $this
     */
    public function in($fields, string $split = ',', $input = null, string $alias = '#'): QueryHelper
    {
        $data = $this->getInputData($input ?: $this->input);
        foreach (is_array($fields) ? $fields : explode(',', $fields) as $field) {
            [$dk, $qk] = [$field, $field];
            if (stripos($field, $alias) !== false) {
                [$dk, $qk] = explode($alias, $field);
            }
            if (isset($data[$qk]) && $data[$qk] !== '') {
                $this->query->whereIn($dk, explode($split, $data[$qk]));
            }
        }
        return $this;
    }

    /**
     * 设置内容区间查询
     * @param string|array $fields 查询字段
     * @param string $split 输入分隔符
     * @param string|array|null $input 输入数据
     * @param string $alias 别名分割符
     * @return $this
     */
    public function valueBetween($fields, string $split = ' ', $input = null, string $alias = '#'): QueryHelper
    {
        return $this->_setBetweenWhere($fields, $split, $input, $alias);
    }

    /**
     * 设置日期时间区间查询
     * @param string|array $fields 查询字段
     * @param string $split 输入分隔符
     * @param string|array|null $input 输入数据
     * @param string $alias 别名分割符
     * @return $this
     */
    public function dateBetween($fields, string $split = ' - ', $input = null, string $alias = '#'): QueryHelper
    {
        return $this->_setBetweenWhere($fields, $split, $input, $alias, function ($value, $type) {
            if (preg_match('#^\d{4}(-\d\d){2}\s+\d\d(:\d\d){2}$#', $value)) return $value;
            else return $type === 'after' ? "{$value} 23:59:59" : "{$value} 00:00:00";
        });
    }

    /**
     * 设置时间戳区间查询
     * @param string|array $fields 查询字段
     * @param string $split 输入分隔符
     * @param string|array|null $input 输入数据
     * @param string $alias 别名分割符
     * @return $this
     */
    public function timeBetween($fields, string $split = ' - ', $input = null, string $alias = '#'): QueryHelper
    {
        return $this->_setBetweenWhere($fields, $split, $input, $alias, function ($value, $type) {
            if (preg_match('#^\d{4}(-\d\d){2}\s+\d\d(:\d\d){2}$#', $value)) return strtotime($value);
            else return $type === 'after' ? strtotime("{$value} 23:59:59") : strtotime("{$value} 00:00:00");
        });
    }

    /**
     * 实例化分页管理器
     * @param boolean $page 是否启用分页
     * @param boolean $display 是否渲染模板
     * @param boolean|integer $total 集合分页记录数
     * @param integer $limit 集合每页记录数
     * @param string $template 模板文件名称
     * @return array
     * @throws DataNotFoundException
     * @throws DbException
     * @throws ModelNotFoundException
     */
    public function page(bool $page = true, bool $display = true, $total = false, int $limit = 0, string $template = ''): array
    {
        return PageHelper::instance()->init($this->query, $page, $display, $total, $limit, $template);
    }

    /**
     * 清空数据并保留表结构
     * @return $this
     */
    public function empty(): QueryHelper
    {
        $table = $this->query->getTable();
        $this->app->db->execute("truncate table `{$table}`");
        return $this;
    }

    /**
     * QueryHelper call.
     * @param string $name 调用方法名称
     * @param array $args 调用参数内容
     * @return $this
     */
    public function __call(string $name, array $args): QueryHelper
    {
        if (is_callable($callable = [$this->query, $name])) {
            call_user_func_array($callable, $args);
        }
        return $this;
    }

    /**
     * 设置区域查询条件
     * @param string|array $fields 查询字段
     * @param string $split 输入分隔符
     * @param string|array|null $input 输入数据
     * @param string $alias 别名分割符
     * @param callable|null $callback 回调函数
     * @return $this
     */
    private function _setBetweenWhere($fields, string $split = ' ', $input = null, string $alias = '#', ?callable $callback = null): QueryHelper
    {
        $data = $this->getInputData($input ?: $this->input);
        foreach (is_array($fields) ? $fields : explode(',', $fields) as $field) {
            [$dk, $qk] = [$field, $field];
            if (stripos($field, $alias) !== false) {
                [$dk, $qk] = explode($alias, $field);
            }
            if (isset($data[$qk]) && $data[$qk] !== '') {
                [$begin, $after] = explode($split, $data[$qk]);
                if (is_callable($callback)) {
                    $after = call_user_func($callback, $after, 'after');
                    $begin = call_user_func($callback, $begin, 'begin');
                }
                $this->query->whereBetween($dk, [$begin, $after]);
            }
        }
        return $this;
    }

    /**
     * 获取输入数据
     * @param string|array|null $input
     * @return array
     */
    private function getInputData($input): array
    {
        if (is_array($input)) {
            return $input;
        } else {
            $input = $input ?: 'request';
            return $this->app->request->$input();
        }
    }
}
