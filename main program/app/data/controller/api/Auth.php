<?php

namespace app\data\controller\api;

use app\data\service\UserAdminService;
use app\data\service\UserTokenService;
use think\admin\Controller;
use think\exception\HttpResponseException;

/**
 * 接口授权认证基类
 * Class Auth
 * @package app\data\controller\api
 */
abstract class Auth extends Controller
{
    /**
     * 当前接口请求终端类型
     * --- 手机浏览器访问 wap
     * --- 电脑浏览器访问 web
     * --- 微信小程序访问 wxapp
     * --- 微信服务号访问 wechat
     * --- 苹果应用接口访问 isoapp
     * --- 安卓应用接口访问 android
     * @var string
     */
    protected $type;

    /**
     * 当前用户编号
     * @var integer
     */
    protected $uuid;

    /**
     * 当前用户数据
     * @var array
     */
    protected $user;

    /**
     * 控制器初始化
     */
    protected function initialize()
    {
        // 接收接口类型
        $this->type = $this->request->request('api');
        $this->type = $this->type ?: $this->request->header('api-name');
        $this->type = $this->type ?: $this->request->header('api-type');
        // 检查接口类型
        if (empty($this->type)) {
            $this->error("未获取到接口类型字段！");
        }
        if (!isset(UserAdminService::TYPES[$this->type])) {
            $this->error("接口类型[{$this->type}]未定义！");
        }
        // 获取用户数据
        $this->user = $this->getUser();
        $this->uuid = $this->user['id'] ?? '';
        if (empty($this->uuid)) {
            $this->error('用户登录失败！', '{-null-}', 401);
        }
    }

    /**
     * 获取用户数据
     * @return array
     */
    protected function getUser(): array
    {
        try {
            if (empty($this->uuid)) {
                $token = input('token') ?: $this->request->header('api-token');
                if (empty($token)) $this->error('登录认证TOKEN不能为空！');
                [$state, $info, $this->uuid] = UserTokenService::instance()->check($this->type, $token);
                if (empty($state)) $this->error($info, '{-null-}', 401);
            }
            return UserAdminService::instance()->get($this->uuid, $this->type);
        } catch (HttpResponseException $exception) {
            throw $exception;
        } catch (\Exception $exception) {
            $this->error($exception->getMessage());
        }
    }

    /**
     * 显示用户禁用提示
     */
    protected function checkUserStatus()
    {
        if (empty($this->user['status'])) {
            $this->error('账户已被冻结！');
        }
    }

}
