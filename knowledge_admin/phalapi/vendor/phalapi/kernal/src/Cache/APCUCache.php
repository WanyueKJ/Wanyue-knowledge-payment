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

namespace PhalApi\Cache;

use PhalApi\Cache;
use PhalApi\Exception\InternalServerErrorException;

/**
 * APCUCache    APC User Cache 
 *
 * @package     PhalApi\Cache
 * @license     http://www.phalapi.net/license GPL 协议
 * @link        http://www.phalapi.net/
 * @author      dogstar <chanzonghuang@gmail.com> 2017-04-14
 */

class APCUCache {

    public function __construct() {
        if (!extension_loaded('apcu')) {
            throw new InternalServerErrorException(
                \PhalApi\T('missing {name} extension', array('name' => 'apcu'))
            );
        }
    }

    public function set($key, $value, $expire = 600) {
        return apcu_store($key, $value, $expire);
    }

    public function get($key) {
        $value = apcu_fetch($key);
        return $value !== FALSE ? $value : NULL;
    }

    public function delete($key) {
        return apcu_delete($key);
    }
}
