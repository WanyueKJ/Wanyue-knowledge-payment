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

use PhalApi\Crypt\MultiMcryptCrypt;

/**
 * PhpUnderControl_PhalApiMultiCryptMcrypt_Test
 *
 * 针对 ../../PhalApi/Crypt/MultiMcrypt.php PhalApi_Crypt_MultiMcrypt 类的PHPUnit单元测试
 *
 * @author: dogstar 20141211
 */

class PhpUnderControl_PhalApiMultiCryptMcrypt_Test extends \PHPUnit_Framework_TestCase
{
    public $multiMcryptCrypt;

    protected function setUp()
    {
        parent::setUp();

        if (!function_exists('mcrypt_module_open')) {
            throw new Exception('function mcrypt_module_open() not exists');
        }

        $this->multiMcryptCrypt = new MultiMcryptCrypt('12345678');
    }

    protected function tearDown()
    {
    }


    /**
     * @group testEncrypt
     */ 
    public function testEncrypt()
    {
        $data = 'haha~';
        $key = '123';

        $rs = $this->multiMcryptCrypt->encrypt($data, $key);
    }

    /**
     * @group testDecrypt
     */ 
    public function testDecrypt()
    {
        $data = 'haha~';
        $key = '123';

        $rs = $this->multiMcryptCrypt->decrypt($data, $key);
    }

    public function testMixed()
    {
        $data = 'haha!哈哈！';
        $key = md5('123');

        $encryptData = $this->multiMcryptCrypt->encrypt($data, $key);

        $decryptData = $this->multiMcryptCrypt->decrypt($encryptData, $key);

        $this->assertEquals($data, $decryptData);
    }

    /**
     * @dataProvider provideComplicateData
     */
    public function testWorkWithMoreComplicateData($data)
    {
        $key = 'phalapi';

        $encryptData = $this->multiMcryptCrypt->encrypt($data, $key);

        $decryptData = $this->multiMcryptCrypt->decrypt($encryptData, $key);

        $this->assertSame($data, $decryptData);
    }

    public function provideComplicateData()
    {
        return array(
            array(''),
            array(' '),
            array('0'),
            array(0),
            array(1),
            array('12#d_'),
            array(12345678),
            array('来点中文行不行？'),
            array('843435Jhe*&混合'),
            );
    }

    /**
     * 当无法对称解密时，返回false（1.x 版本 返回原数据）
     */
    public function testIllegalData()
    {
        $encryptData = 'xxx';

        $decryptData = $this->multiMcryptCrypt->decrypt($encryptData, 'whatever');

        //$this->assertEquals($encryptData, $decryptData);
        $this->assertFalse($decryptData);
    }
}
