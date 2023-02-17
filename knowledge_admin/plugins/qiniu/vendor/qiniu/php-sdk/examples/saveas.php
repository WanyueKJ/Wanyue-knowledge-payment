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

// 后台来获取AK, SK
$accessKey = 'Access_Key';
$secretKey = 'Secret_Key';

//生成EncodedEntryURI的值
$entry = '<bucket>:<Key>';//<Key>为生成缩略图的文件名
//生成的值
$encodedEntryURI = \Qiniu\base64_urlSafeEncode($entry);

//使用SecretKey对新的下载URL进行HMAC1-SHA1签名
$newurl = "78re52.com1.z0.glb.clouddn.com/resource/Ship.jpg?imageView2/2/w/200/h/200|saveas/" . $encodedEntryURI;

$sign = hash_hmac("sha1", $newurl, $secretKey, true);

//对签名进行URL安全的Base64编码
$encodedSign = \Qiniu\base64_urlSafeEncode($sign);
//最终得到的完整下载URL
$finalURL = "http://" . $newurl . "/sign/" . $accessKey . ":" . $encodedSign;

$callbackBody = file_get_contents("$finalURL");

echo $callbackBody;
