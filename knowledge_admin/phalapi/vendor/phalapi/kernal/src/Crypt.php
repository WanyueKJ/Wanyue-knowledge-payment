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
 * Crypt对称加密接口
 *
 * @package     PhalApi\Crypt
 * @license     http://www.phalapi.net/license GPL 协议
 * @link        http://www.phalapi.net/
 * @author      dogstar <chanzonghuang@gmail.com> 2014-12-10
 */

interface Crypt {

	/**
	 * 对称加密
	 * 
	 * @param mixed $data 等加密的数据
	 * @param string $key 加密的key
	 * @return mixed 加密后的数据
	 */
    public function encrypt($data, $key);
    
    /**
     * 对称解密
     * 
     * @see Crypt::encrypt()
     * @param mixed $data 对称加密后的内容
     * @param string $key 加密的key
     * @return mixed 解密后的数据
     */
    public function decrypt($data, $key);
}
