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

//获取流量和带宽数据
//参考文档：http://developer.qiniu.com/article/fusion/api/traffic-bandwidth.html

$domains = array(
    "javasdk.qiniudn.com",
    "phpsdk.qiniudn.com"
);

$startDate = "2017-08-20";
$endDate = "2017-08-21";

//5min or hour or day
$granularity = "day";

//获取带宽数据
list($bandwidthData, $getBandwidthErr) = $cdnManager->getBandwidthData(
    $domains,
    $startDate,
    $endDate,
    $granularity
);

if ($getBandwidthErr != null) {
    var_dump($getBandwidthErr);
} else {
    echo "get bandwidth data success\n";
    print_r($bandwidthData);
}
