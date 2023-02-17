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

namespace PhalApi;

/**
 * PhalApi\Cache 缓存接口
 *
 * @package     PhalApi\Cache
 * @license     http://www.phalapi.net/license GPL 协议
 * @link        http://www.phalapi.net/
 * @author      dogstar <chanzonghuang@gmail.com> 2015-02-04
 */

interface Cache {

	/**
	 * 设置缓存
	 * 
	 * @param string $key 缓存key
	 * @param mixed $value 缓存的内容
	 * @param int $expire 缓存有效时间，单位秒，非时间戳
	 */
    public function set($key, $value, $expire = 600);

    /**
     * 读取缓存
     * 
     * @param string $key 缓存key
     * @return mixed 失败情况下返回NULL
     */
    public function get($key);

    /**
     * 删除缓存
     * 
     * @param string $key
     */
    public function delete($key);
}
