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
use Qiniu\Storage\BucketManager;

// http://developer.qiniu.com/docs/v6/api/reference/rs/list.html#list-description

$accessKey = getenv('QINIU_ACCESS_KEY');
$secretKey = getenv('QINIU_SECRET_KEY');
$bucket = getenv('QINIU_TEST_BUCKET');
$auth = new Auth($accessKey, $secretKey);
$bucketManager = new BucketManager($auth);


// 要列取文件的公共前缀
$prefix = '';

// 上次列举返回的位置标记，作为本次列举的起点信息。
$marker = '';

// 本次列举的条目数
$limit = 100;

$delimiter = '/';

// 列举文件
list($ret, $err) = $bucketManager->listFiles($bucket, $prefix, $marker, $limit, $delimiter);
if ($err !== null) {
    echo "\n====> list file err: \n";
    var_dump($err);
} else {
    if (array_key_exists('marker', $ret)) {
        echo "Marker:" . $ret["marker"] . "\n";
    }
    echo "\nList Iterms====>\n";
    //var_dump($ret['items']);
}
