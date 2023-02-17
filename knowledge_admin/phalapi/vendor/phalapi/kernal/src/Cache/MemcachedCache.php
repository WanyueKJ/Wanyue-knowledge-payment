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

use PhalApi\Cache\MemcacheCache;

/**
 * MemcachedCache MC缓存
 *
 * - 使用序列化对需要存储的值进行转换，以提高速度
 *
 * @package     PhalApi\Cache
 * @license     http://www.phalapi.net/license GPL 协议
 * @link        http://www.phalapi.net/
 * @author      dogstar <chanzonghuang@gmail.com> 2014-11-14
 */

class MemcachedCache extends MemcacheCache {

    /**
     * 注意参数的微妙区别
     */
    public function set($key, $value, $expire = 600) {
        $this->memcache->set($this->formatKey($key), @serialize($value), $expire);
    }

    /**
     * 返回更高版本的MC实例
	 * @return Memcached
     */
    protected function createMemcache() {
        return new \Memcached();
    }
}
