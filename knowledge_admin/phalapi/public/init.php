<?php
    // +----------------------------------------------------------------------
    // |万岳科技开源系统 [山东万岳信息科技有限公司]
    // +----------------------------------------------------------------------
    // | Copyright (c) 2020~2022 https://www.sdwanyue.com All rights reserved.
    // +----------------------------------------------------------------------
    // | 万岳科技相关开源系统代码并不是自由软件，未经授权许可不能去掉wanyue【万岳科技】相关版权并商用
    // +----------------------------------------------------------------------
    // | Author: 万岳科技开源官方 < wanyuekj2020@163.com >
    // +----------------------------------------------------------------------
/**
 * 统一初始化
 */

// 定义项目路径
defined('API_ROOT') || define('API_ROOT', dirname(__FILE__) . DIRECTORY_SEPARATOR . '..');

// 运行模式，可以是：dev, test, prod
defined('API_MODE') || define('API_MODE', 'prod');

// 引入composer
require_once API_ROOT . '/vendor/autoload.php';

// 时区设置
date_default_timezone_set('Asia/Shanghai');

// 引入DI服务
include API_ROOT . '/config/di.php';

// 调试模式
if (\PhalApi\DI()->debug) {
    // 启动追踪器
    \PhalApi\DI()->tracer->mark('PHALAPI_INIT');

    error_reporting(E_ALL);
    ini_set('display_errors', 'On'); 
}

// 翻译语言包设定
\PhalApi\SL('zh_cn');
