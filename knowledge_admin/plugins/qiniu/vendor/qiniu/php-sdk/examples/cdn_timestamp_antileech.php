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

//创建时间戳防盗链
//时间戳防盗链密钥，后台获取
$encryptKey = 'your_domain_timestamp_antileech_encryptkey';

//带访问协议的域名
$url1 = 'http://phpsdk.qiniuts.com/24.jpg?avinfo';
$url2 = 'http://phpsdk.qiniuts.com/24.jpg';

//有效期时间（单位秒）
$durationInSeconds = 3600;

$signedUrl = CdnManager::createTimestampAntiLeechUrl($url1, $encryptKey, $durationInSeconds);
print($signedUrl);
