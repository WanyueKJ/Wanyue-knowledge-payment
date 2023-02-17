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

/**
 * MultiCache 组合模式下的多级缓存
 *
 * - 可以自定义添加多重缓存，注意优先添加高效缓存
 * - 最终将委托给各级缓存进行数据的读写，其中读取为短路读取
 *
 * @package     PhalApi\Cache
 * @license     http://www.phalapi.net/license GPL 协议
 * @link        http://www.phalapi.net/
 * @author      dogstar <chanzonghuang@gmail.com> 2015-02-22
 */

class MultiCache implements Cache {
    
    protected $caches = array();

    public function addCache(Cache $cache) {
		$this->caches[] = $cache;
    }

    public function set($key, $value, $expire = 600) {
        foreach ($this->caches as $cache) {
			$cache->set($key, $value, $expire);
		}
    }

    public function get($key) {
        foreach ($this->caches as $cache) {
			$value = $cache->get($key);
			if ($value !== NULL) {
				return $value;
			}
		}

		return NULL;
    }

    public function delete($key) {
		foreach ($this->caches as $cache) {
			$cache->delete($key);
		}
    }
}
