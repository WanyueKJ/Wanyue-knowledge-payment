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

require_once __DIR__ . '/../autoload.php';

use \Qiniu\Cdn\CdnManager;

$accessKey = getenv('QINIU_ACCESS_KEY');
$secretKey = getenv('QINIU_SECRET_KEY');

$auth = new Qiniu\Auth($accessKey, $secretKey);
$cdnManager = new CdnManager($auth);

$domains = array(
    "javasdk.qiniudn.com",
    "phpsdk.qiniudn.com"
);

$logDate = '2017-08-20';

//获取日志下载链接
//参考文档：http://developer.qiniu.com/article/fusion/api/log.html

list($logListData, $getLogErr) = $cdnManager->getCdnLogList($domains, $logDate);
if ($getLogErr != null) {
    var_dump($getLogErr);
} else {
    echo "get cdn log list success\n";
    print_r($logListData);
}
