<?php

// +----------------------------------------------------------------------
// | ThinkAdmin
// +----------------------------------------------------------------------
// | 版权所有 2014~2021 广州楚才信息科技有限公司 [ http://www.cuci.cc ]
// +----------------------------------------------------------------------
// | 官方网站: https://gitee.com/zoujingli/ThinkLibrary
// +----------------------------------------------------------------------
// | 开源协议 ( https://mit-license.org )
// +----------------------------------------------------------------------
// | gitee 代码仓库：https://gitee.com/zoujingli/ThinkLibrary
// | github 代码仓库：https://github.com/zoujingli/ThinkLibrary
// +----------------------------------------------------------------------

declare (strict_types=1);

namespace think\admin\service;

use Exception;
use think\admin\Service;
use think\App;
use think\db\exception\DataNotFoundException;
use think\db\exception\DbException;
use think\db\exception\ModelNotFoundException;
use think\db\Query;
use think\helper\Str;
use think\Model;

/**
 * 系统参数管理服务
 * Class SystemService
 * @package think\admin\service
 */
class SystemService extends Service
{

    /**
     * 配置数据缓存
     * @var array
     */
    protected $data = [];

    /**
     * 绑定配置数据表
     * @var string
     */
    protected $table = 'SystemConfig';

    /**
     * 设置配置数据
     * @param string $name 配置名称
     * @param mixed $value 配置内容
     * @return integer|string
     * @throws DataNotFoundException
     * @throws DbException
     * @throws ModelNotFoundException
     */
    public function set(string $name, $value = '')
    {
        $this->data = [];
        [$type, $field] = $this->_parse($name);
        if (is_array($value)) {
            $count = 0;
            foreach ($value as $kk => $vv) {
                $count += $this->set("{$field}.{$kk}", $vv);
            }
            return $count;
        } else {
            $this->app->cache->delete($this->table);
            $map = ['type' => $type, 'name' => $field];
            $data = array_merge($map, ['value' => $value]);
            $query = $this->app->db->name($this->table)->master(true)->where($map);
            return (clone $query)->count() > 0 ? $query->update($data) : $query->insert($data);
        }
    }

    /**
     * 读取配置数据
     * @param string $name
     * @param string $default
     * @return array|mixed|string
     * @throws DataNotFoundException
     * @throws DbException
     * @throws ModelNotFoundException
     */
    public function get(string $name = '', string $default = '')
    {
        if (empty($this->data)) {
            $this->app->db->name($this->table)->cache($this->table)->select()->map(function ($item) {
                $this->data[$item['type']][$item['name']] = $item['value'];
            });
        }
        [$type, $field, $outer] = $this->_parse($name);
        if (empty($name)) {
            return $this->data;
        } elseif (isset($this->data[$type])) {
            $group = $this->data[$type];
            if ($outer !== 'raw') foreach ($group as $kk => $vo) {
                $group[$kk] = htmlspecialchars($vo);
            }
            return $field ? ($group[$field] ?? $default) : $group;
        } else {
            return $default;
        }
    }

    /**
     * 数据增量保存
     * @param Model|Query|string $query 数据查询对象
     * @param array $data 需要保存的数据
     * @param string $key 更新条件查询主键
     * @param array $map 额外更新查询条件
     * @return boolean|integer 失败返回 false, 成功返回主键值或 true
     * @throws DataNotFoundException
     * @throws DbException
     * @throws ModelNotFoundException
     */
    public function save($query, array $data, string $key = 'id', array $map = [])
    {
        $query = is_string($query) ? $this->app->db->name($query) : ($query instanceof Model ? $query->db() : $query);
        if (!$query instanceof Query) throw new ModelNotFoundException('数据库操作对象异常！');
        [$value] = [$data[$key] ?? null, $query->master()->strict(false)->where($map)];
        if (empty($map[$key])) if (is_string($value) && strpos($value, ',') !== false) {
            $query->whereIn($key, str2arr($value));
        } else {
            $query->where([$key => $value]);
        }
        if (($info = (clone $query)->find()) && !empty($info)) {
            if ($info instanceof Model) $info = $info->toArray();
            $query->update($data);
            return $info[$key] ?? true;
        } else {
            return $query->insertGetId($data);
        }
    }

    /**
     * 解析缓存名称
     * @param string $rule 配置名称
     * @return array
     */
    private function _parse(string $rule): array
    {
        $type = 'base';
        if (stripos($rule, '.') !== false) {
            [$type, $rule] = explode('.', $rule, 2);
        }
        [$field, $outer] = explode('|', "{$rule}|");
        return [$type, $field, strtolower($outer)];
    }

    /**
     * 生成最短URL地址
     * @param string $url 路由地址
     * @param array $vars PATH 变量
     * @param boolean|string $suffix 后缀
     * @param boolean|string $domain 域名
     * @return string
     */
    public function sysuri(string $url = '', array $vars = [], $suffix = true, $domain = false): string
    {
        $ext = $this->app->config->get('route.url_html_suffix', 'html');
        $pre = $this->app->route->buildUrl('@')->suffix(false)->domain($domain)->build();
        $uri = $this->app->route->buildUrl($url, $vars)->suffix($suffix)->domain($domain)->build();
        // 默认节点配置数据
        $app = $this->app->config->get('app.default_app');
        $act = Str::lower($this->app->config->get('route.default_action'));
        $ctr = Str::snake($this->app->config->get('route.default_controller'));
        // 替换省略链接路径
        return preg_replace([
            "#^({$pre}){$app}/{$ctr}/{$act}(\.{$ext}|^\w|\?|$)?#i",
            "#^({$pre}[\w\.]+)/{$ctr}/{$act}(\.{$ext}|^\w|\?|$)#i",
            "#^({$pre}[\w\.]+)(/[\w\.]+)/{$act}(\.{$ext}|^\w|\?|$)#i",
        ], ['$1$2', '$1$2', '$1$2$3'], $uri);
    }

    /**
     * 保存数据内容
     * @param string $name
     * @param mixed $value
     * @return boolean
     * @throws DataNotFoundException
     * @throws DbException
     * @throws ModelNotFoundException
     */
    public function setData(string $name, $value)
    {
        return $this->save('SystemData', ['name' => $name, 'value' => serialize($value)], 'name');
    }

    /**
     * 获取数据库所有数据表
     * @return array [table, total, count]
     */
    public function getTables(): array
    {
        $tables = [];
        foreach ($this->app->db->query("show tables") as $item) {
            $tables = array_merge($tables, array_values($item));
        }
        return [$tables, count($tables), 0];
    }

    /**
     * 读取数据内容
     * @param string $name
     * @param mixed $default
     * @return mixed
     */
    public function getData(string $name, $default = [])
    {
        try {
            $value = $this->app->db->name('SystemData')->where(['name' => $name])->value('value');
            return is_null($value) ? $default : unserialize($value);
        } catch (Exception $exception) {
            return $default;
        }
    }

    /**
     * 写入系统日志内容
     * @param string $action
     * @param string $content
     * @return boolean
     */
    public function setOplog(string $action, string $content): bool
    {
        $oplog = $this->getOplog($action, $content);
        return $this->app->db->name('SystemOplog')->insert($oplog) !== false;
    }

    /**
     * 获取系统日志内容
     * @param string $action
     * @param string $content
     * @return array
     */
    public function getOplog(string $action, string $content): array
    {
        return [
            'node'     => NodeService::instance()->getCurrent(),
            'action'   => $action, 'content' => $content,
            'geoip'    => $this->app->request->ip() ?: '127.0.0.1',
            'username' => AdminService::instance()->getUserName() ?: '-',
        ];
    }

    /**
     * 打印输出数据到文件
     * @param mixed $data 输出的数据
     * @param boolean $new 强制替换文件
     * @param string|null $file 文件名称
     * @return false|int
     */
    public function putDebug($data, bool $new = false, ?string $file = null)
    {
        if (is_null($file)) $file = $this->app->getRootPath() . 'runtime' . DIRECTORY_SEPARATOR . date('Ymd') . '.log';
        $str = (is_string($data) ? $data : ((is_array($data) || is_object($data)) ? print_r($data, true) : var_export($data, true))) . PHP_EOL;
        return $new ? file_put_contents($file, $str) : file_put_contents($file, $str, FILE_APPEND);
    }

    /**
     * 判断运行环境
     * @param string $type 运行模式（dev|demo|local）
     * @return boolean
     */
    public function checkRunMode(string $type = 'dev'): bool
    {
        $domain = $this->app->request->host(true);
        $isDemo = is_numeric(stripos($domain, 'thinkadmin.top'));
        $isLocal = in_array($domain, ['127.0.0.1', 'localhost']);
        if ($type === 'dev') return $isLocal || $isDemo;
        if ($type === 'demo') return $isDemo;
        if ($type === 'local') return $isLocal;
        return true;
    }

    /**
     * 压缩发布项目
     */
    public function pushRuntime(): void
    {
        $connection = $this->app->db->getConfig('default');
        $this->app->console->call("optimize:schema", ["--connection={$connection}"]);
        foreach (NodeService::instance()->getModules() as $module) {
            $path = $this->app->getRootPath() . 'runtime' . DIRECTORY_SEPARATOR . $module;
            file_exists($path) && is_dir($path) || mkdir($path, 0755, true);
            $this->app->console->call("optimize:route", [$module]);
        }
    }

    /**
     * 清理运行缓存
     */
    public function clearRuntime(): void
    {
        $data = $this->getRuntime();
        $this->app->console->call('clear', ['--dir']);
        $this->setRuntime($data['mode'], $data['appmap'], $data['domain']);
    }

    /**
     * 判断实时运行模式
     * @return boolean
     */
    public function isDebug(): bool
    {
        return $this->getRuntime('mode') !== 'product';
    }

    /**
     * 设置实时运行配置
     * @param null|mixed $mode 支持模式
     * @param null|array $appmap 应用映射
     * @param null|array $domain 域名映射
     * @return boolean 是否调试模式
     */
    public function setRuntime(?string $mode = null, ?array $appmap = [], ?array $domain = []): bool
    {
        $data = $this->getRuntime();
        $data['mode'] = $mode ?: $data['mode'];
        $data['appmap'] = $this->uniqueArray($data['appmap'], $appmap);
        $data['domain'] = $this->uniqueArray($data['domain'], $domain);
        // 组装配置文件格式
        $rows[] = "mode = {$data['mode']}";
        foreach ($data['appmap'] as $key => $item) $rows[] = "appmap[{$key}] = {$item}";
        foreach ($data['domain'] as $key => $item) $rows[] = "domain[{$key}] = {$item}";
        // 数据配置保存文件
        $env = $this->app->getRootPath() . 'runtime/.env';
        file_put_contents($env, "[RUNTIME]\n" . join("\n", $rows));
        return $this->bindRuntime($data);
    }

    /**
     * 获取实时运行配置
     * @param null|string $name 配置名称
     * @param array $default 配置内容
     * @return array|string
     */
    public function getRuntime(?string $name = null, array $default = [])
    {
        $env = $this->app->getRootPath() . 'runtime/.env';
        if (file_exists($env)) $this->app->env->load($env);
        $data = [
            'mode'   => $this->app->env->get('RUNTIME_MODE') ?: 'debug',
            'appmap' => $this->app->env->get('RUNTIME_APPMAP') ?: [],
            'domain' => $this->app->env->get('RUNTIME_DOMAIN') ?: [],
        ];
        return is_null($name) ? $data : ($data[$name] ?? $default);
    }

    /**
     * 绑定应用实时配置
     * @param array $data 配置数据
     * @return boolean 是否调试模式
     */
    public function bindRuntime(array $data = []): bool
    {
        if (empty($data)) $data = $this->getRuntime();
        $bind['app_map'] = $this->uniqueArray($this->app->config->get('app.app_map', []), $data['appmap']);
        $bind['domain_bind'] = $this->uniqueArray($this->app->config->get('app.domain_bind', []), $data['domain']);
        $this->app->config->set($bind, 'app');
        return $this->app->debug($data['mode'] !== 'product')->isDebug();
    }

    /**
     * 初始化并运行主程序
     * @param null|App $app
     */
    public function doInit(?App $app = null): void
    {
        $this->app = $app ?: $this->app;
        $this->app->debug($this->isDebug());
        ($response = $this->app->http->run())->send();
        $this->app->http->end($response);
    }

    /**
     * 获取唯一数组参数
     * @param array ...$args
     * @return array
     */
    private function uniqueArray(...$args): array
    {
        return array_unique(array_reverse(array_merge(...$args)));
    }
}