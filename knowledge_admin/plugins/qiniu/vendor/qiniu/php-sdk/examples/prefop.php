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
use Qiniu\Processing\PersistentFop;

$accessKey = 'Access_Key';
$secretKey = 'Secret_Key';
$auth = new Auth($accessKey, $secretKey);

//要持久化处理的文件所在的空间和文件名。
$bucket = 'Bucket_Name';

//持久化处理使用的队列名称。 https://portal.qiniu.com/mps/pipeline
$pipeline = 'pipeline_name';

//持久化处理完成后通知到你的业务服务器。
$notifyUrl = 'http://375dec79.ngrok.com/notify.php';
$pfop = new PersistentFop($auth, $bucket, $pipeline, $notifyUrl);

$id = "z2.5955c739e3d0041bf80c9baa";
//查询持久化处理的进度和状态
list($ret, $err) = $pfop->status($id);
echo "\n====> pfop avthumb status: \n";
if ($err != null) {
    var_dump($err);
} else {
    var_dump($ret);
}
