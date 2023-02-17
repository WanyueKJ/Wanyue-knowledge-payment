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

use Qiniu\Processing\PersistentFop;

$pfop = new Qiniu\Processing\PersistentFop(null, null);

// 触发持久化处理后返回的 Id
$persistentId = 'z1.5b8a48e5856db843bc24cfc3';

// 通过persistentId查询该 触发持久化处理的状态
list($ret, $err) = $pfop->status($persistentId);

if ($err) {
    print_r($err);
} else {
    print_r($ret);
}
