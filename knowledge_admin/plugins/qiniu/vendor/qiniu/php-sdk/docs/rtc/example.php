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

require_once("../../autoload.php");

use \Qiniu\Auth;

$ak = 'gwd_gV4gPKZZsmEOvAuNU1AcumicmuHooTfu64q5';
$sk = 'xxxx';

$auth = new Auth($ak, $sk);
$client = new Qiniu\Rtc\AppClient($auth);
$hub = 'lfxlive';
$title = 'lfxl';
try {
    //创建app
    $resp = $client->createApp($hub, $title, $maxUsers);
    print_r($resp);
    // 获取app状态
    $resp = $client->getApp('dgdl5ge8y');
    print_r($resp);
    //修改app状态
    $mergePublishRtmp = null;
    $mergePublishRtmp['enable'] = true;
    $resp = $client->updateApp('dgdl5ge8y', $hub, $title, $maxUsers, $mergePublishRtmp);
    print_r($resp);
    //删除app
    $resp = $client->deleteApp('dgdl5ge8y');
    print_r($resp);
    //获取房间连麦的成员
    $resp=$client->listUser("dgbfvvzid", 'lfxl');
    print_r($resp);
    //剔除房间的连麦成员
    $resp=$client->kickUser("dgbfvvzid", 'lfx', "qiniu-f6e07b78-4dc8-45fb-a701-a9e158abb8e6");
    print_r($resp);
    // 列举房间
    $resp=$client->listActiveRooms("dgbfvvzid", 'lfx', null, null);
    print_r($resp);
    //鉴权的有效时间: 1个小时.
    $resp = $client->appToken("dgd4vecde", "lfxl", '1111', (time()+3600), 'user');
    print_r($resp);
} catch (\Exception $e) {
    echo "Error:", $e, "\n";
}
