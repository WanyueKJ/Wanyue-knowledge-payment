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

use Qiniu\Auth;
use Qiniu\Http\Client;

$accessKey = getenv('QINIU_ACCESS_KEY');
$secretKey = getenv('QINIU_SECRET_KEY');
$auth = new Auth($accessKey, $secretKey);
$config = new \Qiniu\Config();
$argusManager = new \Qiniu\Storage\ArgusManager($auth, $config);

$reqBody = array();
$reqBody['uri'] = "xxxx";

$ops = array();
$ops = array(
    array(
        'op' => 'pulp',
        'params' => array(
            'labels' => array(
                array(
                    'label' => "1",
                    'select' => 1,
                    'score' => 2,
                ),
            )
        )
    ),
);

$params = array();
$params = array(
    'async' => false,
    'vframe' => array(
        'mode' => 1,
        'interval' => 8,
    )
);

$req = array();
$req['data'] = $reqBody;
$req['ops'] = $ops;
$req['params'] = $params;
$body = json_encode($req);

$vid = "xxxx";
list($ret, $err) = $argusManager->pulpVideo($body, $vid);

if ($err !== null) {
    var_dump($err);
} else {
    var_dump($ret);
}
