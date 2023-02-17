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


global $__apcu_data;
$__apcu_data = array();

if (!function_exists('apcu_store')) {
    function apcu_store($key, $value, $expire) {
        global $__apcu_data;
        $__apcu_data[$key] = $value;
    }
}

if (!function_exists('apcu_fetch')) {
    function apcu_fetch($key) {
        global $__apcu_data;
        return isset($__apcu_data[$key]) ? $__apcu_data[$key] : NULL;
    }
}

if (!function_exists('apcu_delete')) {
    function apcu_delete($key) {
        global $__apcu_data;
        unset($__apcu_data[$key]);
        return TRUE;
    }
}
