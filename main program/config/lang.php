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

return [
    // 默认语言
    'default_lang'    => 'zh-cn',
    // 允许的语言列表
    'allow_lang_list' => ['zh-cn'],
    // 转义为对应语言包名称
    'accept_language' => [
        'zh-hans-cn' => 'zh-cn',
    ],
    // 多语言自动侦测变量名
    'detect_var'      => 'lang',
    // 多语言 Cookie 变量
    'cookie_var'      => 'lang',
    // 多语言 Header 变量
    'header_var'      => 'lang',
    // 使用 Cookie 记录
    'use_cookie'      => true,
    // 是否支持语言分组
    'allow_group'     => false,
    // 扩展语言包
    'extend_list'     => [],
];