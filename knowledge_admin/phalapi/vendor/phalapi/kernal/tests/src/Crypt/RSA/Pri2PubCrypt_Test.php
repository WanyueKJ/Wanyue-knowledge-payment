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

namespace PhalApi\Tests;

use PhalApi\Crypt\RSA\KeyGenerator;
use PhalApi\Crypt\RSA\Pri2PubCrypt;

/**
 * PhpUnderControl_PhalApiCryptRSAPri2Pub_Test
 *
 * 针对 ../../../PhalApi/Crypt/RSA/Pri2Pub.php PhalApi_Crypt_RSA_Pri2Pub 类的PHPUnit单元测试
 *
 * @author: dogstar 20150315
 */

class PhpUnderControl_PhalApiCryptRSAPri2Pub_Test extends \PHPUnit_Framework_TestCase
{
    public $phalApiCryptRSAPri2Pub;

    protected function setUp()
    {
        parent::setUp();

        $this->phalApiCryptRSAPri2Pub = new Pri2PubCrypt();
    }

    protected function tearDown()
    {
    }


    public function testHere()
    {
        $keyG = new KeyGenerator();
        $prikey = $keyG->getPriKey();
        $pubkey = $keyG->getPubkey();

        $data = 'something important here ...';

        $encryptData = $this->phalApiCryptRSAPri2Pub->encrypt($data, $prikey);

        $decryptData = $this->phalApiCryptRSAPri2Pub->decrypt($encryptData, $pubkey);

        $this->assertEquals($data, $decryptData);
    }
}
