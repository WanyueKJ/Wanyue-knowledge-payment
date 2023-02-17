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

namespace PhalApi\Crypt;

use PhalApi\Crypt;
use PhalApi\Crypt\McryptCrypt;

/**
 * MultiMcryptCrypt 多级mcrypt加密
 * 对底层的mcrypt进行简单的再封装，以便存储和保留类型
 *
 * - 依赖PhalApi_Crypt_Mcrypt进行加解密操作
 * - 支持任何数据类型的加解密
 * - 返回便于存储的字符串
 *
 * @package     PhalApi\Crypt
 * @license     http://www.phalapi.net/license GPL 协议
 * @link        http://www.phalapi.net/
 * @author      dogstar <chanzonghuang@gmail.com> 2014-12-11
 */

class MultiMcryptCrypt implements Crypt {

	/**
	 * @var PhalApi_Crypt_Mcrypt $mcrypt
	 */
    protected $mcrypt = NULL;

    public function __construct($iv) {
        $this->mcrypt = new McryptCrypt($iv);
    }

    /**
     * @param mixed $data 待加密的数据
     */
    public function encrypt($data, $key) {
        $encryptData = serialize($data);

        $encryptData = $this->mcrypt->encrypt($encryptData, $key);

        $encryptData = base64_encode($encryptData);

        return $encryptData;
    }

    /**
     * 忽略不能正常反序列化的操作，并且在不能预期解密的情况下返回原文
     */
    public function decrypt($data, $key) {
        $decryptData = base64_decode($data);

        if ($decryptData === FALSE || $decryptData === '') {
            return FALSE;
        }

        $decryptData = $this->mcrypt->decrypt($decryptData, $key);

        $decryptData = @unserialize($decryptData);
        if ($decryptData === FALSE) {
            return FALSE;
        }

        return $decryptData;
    }
}
