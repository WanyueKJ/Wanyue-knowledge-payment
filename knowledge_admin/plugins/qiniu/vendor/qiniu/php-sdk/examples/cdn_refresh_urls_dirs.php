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

//待刷新的文件列表和目录，文件列表最多一次100个，目录最多一次10个
//参考文档：http://developer.qiniu.com/article/fusion/api/refresh.html
$urls = array(
    "http://phpsdk.qiniudn.com/qiniu.jpg",
    "http://phpsdk.qiniudn.com/qiniu2.jpg",
);

//刷新目录需要联系七牛技术支持开通账户权限
$dirs = array(
    "http://phpsdk.qiniudn.com/test/"
);

$cdnManager = new CdnManager($auth);

// 目前客户默认没有目录刷新权限，刷新会有400038报错，参考：https://developer.qiniu.com/fusion/api/1229/cache-refresh
// 需要刷新目录请工单联系技术支持 https://support.qiniu.com/tickets/category
list($refreshResult, $refreshErr) = $cdnManager->refreshUrlsAndDirs($urls, $dirs);
if ($refreshErr != null) {
    var_dump($refreshErr);
} else {
    echo "refresh request sent\n";
    print_r($refreshResult);
}

//如果只有刷新链接或者目录的需求，可以分布使用

list($refreshResult, $refreshErr) = $cdnManager->refreshUrls($urls);
if ($refreshErr != null) {
    var_dump($refreshErr);
} else {
    echo "refresh request sent\n";
    print_r($refreshResult);
}

list($refreshResult, $refreshErr) = $cdnManager->refreshDirs($dirs);
if ($refreshErr != null) {
    var_dump($refreshErr);
} else {
    echo "refresh request sent\n";
    print_r($refreshResult);
}
