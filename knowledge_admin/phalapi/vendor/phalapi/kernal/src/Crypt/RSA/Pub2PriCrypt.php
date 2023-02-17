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

namespace PhalApi\Crypt\RSA;

use PhalApi\Crypt;

/**
 * Pub2PriCrypt 原始RSA加密
 * 
 * RSA - 公钥加密，私钥解密
 *
 * @package     PhalApi\Crypt\RSA
 * @license     http://www.phalapi.net/license GPL 协议
 * @link        http://www.phalapi.net/
 * @author      dogstar <chanzonghuang@gmail.com> 2015-03-15
 */

class Pub2PriCrypt implements Crypt {

    public function encrypt($data, $pubkey) {
        $rs = '';

        if (@openssl_public_encrypt($data, $rs, $pubkey) === FALSE) {
            return NULL;
        }

        return $rs;
    }
    
    public function decrypt($data, $prikey) {
        $rs = '';

        if (@openssl_private_decrypt($data, $rs, $prikey) === FALSE) {
            return NULL;
        }

        return $rs;
    }
}
