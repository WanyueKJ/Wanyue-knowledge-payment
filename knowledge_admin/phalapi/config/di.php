<?php

// +----------------------------------------------------------------------
// |万岳科技开源系统 [山东万岳信息科技有限公司]
// +----------------------------------------------------------------------
// | Copyright (c) 2020~2022 https://www.sdwanyue.com All rights reserved.
// +----------------------------------------------------------------------
// | 万岳科技相关开源系统，需标注"代码来源于万岳科技开源项目"后即可免费自用运营，前端运营时展示的内容不得使用万岳科技相关信息
// +----------------------------------------------------------------------
// | Author: 万岳科技开源官方 < wanyuekj2020@163.com >
// +----------------------------------------------------------------------
/**
 * DI依赖注入配置文件
 * 
 * @license     http://www.phalapi.net/license GPL 协议
 * @link        http://www.phalapi.net/
 * @author      dogstar <chanzonghuang@gmail.com> 2017-07-13
 */

use PhalApi\Config\FileConfig;
use PhalApi\Logger;
use PhalApi\Logger\FileLogger;
use PhalApi\Database\NotORMDatabase;


// error_reporting(E_ALL);
// ini_set('display_errors','On');

/** ---------------- PhalApi 基本注册 必要服务组件 ---------------- **/

$di = \PhalApi\DI();

// 配置
$di->config = new FileConfig(API_ROOT . DIRECTORY_SEPARATOR . 'config');

// 调试模式，$_GET['__debug__']可自行改名
// $di->debug = !empty($_GET['__debug__']) ? true : $di->config->get('sys.debug');
$di->debug = false;
// $di->debug = true;

// 日记纪录
$di->logger = FileLogger::create($di->config->get('sys.file_logger'));

// 数据操作 - 基于NotORM
$di->notorm = new NotORMDatabase($di->config->get('dbs'), $di->config->get('sys.notorm_debug'));

// JSON中文输出
// $di->response = new \PhalApi\Response\JsonResponse(JSON_UNESCAPED_UNICODE);

\App\connectionRedis();

/** ---------------- 第三应用 服务注册 ---------------- **/

// 加载plugins目录下的第三方应用初始化文件
foreach (glob(API_ROOT . DIRECTORY_SEPARATOR . 'plugins' . DIRECTORY_SEPARATOR . '*.php') as $pluginFile) {
    include_once $pluginFile;
}

/** ---------------- 当前项目 定制注册 可选服务组件 ---------------- **/

// 签名验证服务
// $di->filter = new \PhalApi\Filter\SimpleMD5Filter();

// 缓存 - Memcache/Memcached
// $di->cache = function () {
//     return new \PhalApi\Cache\MemcacheCache(\PhalApi\DI()->config->get('sys.mc'));
// };

// 支持JsonP的返回
// if (!empty($_GET['callback'])) {
//     $di->response = new \PhalApi\Response\JsonpResponse($_GET['callback']);
// }

// 生成二维码扩展，参考示例：?s=App.Examples_QrCode.Png
// $di->qrcode = function() {
//     return new \PhalApi\QrCode\Lite();
// };

// 注册扩展的追踪器，将SQL写入日志文件
// $di->tracer = function() {
//     return new \App\Common\Tracer();
// };

$di->qiniu = function() {
        return new \PhalApi\Qiniu\Lite();
};