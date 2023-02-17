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

use PhalApi\Crypt\RSA\MultiBase;
use PhalApi\Crypt\RSA\Pri2PubCrypt;

/**
 * MultiPri2PubCrypt 超长RSA加密
 * 
 * RSA - 私钥加密，公钥解密 - 超长字符串的应对方案
 *
 * @package     PhalApi\Crypt\RSA
 * @license     http://www.phalapi.net/license GPL 协议
 * @link        http://www.phalapi.net/
 * @author      dogstar <chanzonghuang@gmail.com> 2015-03-14
 */

class MultiPri2PubCrypt extends MultiBase {

    protected $pri2pub;

    public function __construct() {
        $this->pri2pub = new Pri2PubCrypt();

        parent::__construct();
    }

    protected function doEncrypt($toCryptPie, $prikey) {
        return $this->pri2pub->encrypt($toCryptPie, $prikey);
    }

    protected function doDecrypt($encryptPie, $prikey) {
        return $this->pri2pub->decrypt($encryptPie, $prikey);
    }
}
