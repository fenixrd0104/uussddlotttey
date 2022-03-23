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

use app\wechat\command\Auto;
use app\wechat\command\Fans;
use app\wechat\service\AutoService;
use think\Console;

if (app()->request->isCli()) {
    Console::starting(function (Console $console) {
        $console->addCommands([Fans::class, Auto::class]);
    });
} else {
    app()->event->listen('WechatFansSubscribe', function ($openid) {
        AutoService::instance()->register($openid);
    });
}
