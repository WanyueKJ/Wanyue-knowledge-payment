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

use PhalApi\Crypt\McryptCrypt;

/**
 * PhpUnderControl_PhalApiCryptMcrypt_Test
 *
 * 针对 ./../../PhalApi/Crypt/Mcrypt.php PhalApi_Crypt_Mcrypt 类的PHPUnit单元测试
 *
 * @author: dogstar 20141210
 */

class PhpUnderControl_PhalApiCryptMcrypt_Test extends \PHPUnit_Framework_TestCase
{
    public $mcryptcrypt;

    protected function setUp()
    {
        parent::setUp();

        if (!function_exists('mcrypt_module_open')) {
            throw new Exception('function mcrypt_module_open() not exists');
        }

        $this->mcryptcrypt = new McryptCrypt();
    }

    protected function tearDown()
    {
    }


    /**
     * @group testEncrypt
     */ 
    public function testEncrypt()
    {
        $data = 'dogstar test哈哈 ！！~~ ';
        $key = '2014';

        $rs = $this->mcryptcrypt->encrypt($data, $key);

        return array($data, $key, $rs);
    }

    /**
     * @depends testEncrypt
     * @group testDecrypt
     */ 
    public function testDecrypt($rsData)
    {
        list($data, $key, $encryptData) = $rsData;

        $rs = $this->mcryptcrypt->decrypt($encryptData, $key);

        $this->assertEquals($data, $rs);
    }

    /**
     * @dataProvider provideIv
     */
    public function testWithIV($iv)
    {
        $mcrypt = new McryptCrypt($iv);

        $data = 'dogstar';
        $key = 'phalapi';
        $this->assertEquals($mcrypt->decrypt($mcrypt->encrypt($data, $key), $key), $data);
    }

    public function provideIv()
    {
        return array(
            array(12),
            array('12'),
            array('12345678'),
            array('1234567890'),
            array('&632(jnD'),
            );
    }

    /**
     * @dataProvider provideComplicateData
     */
    public function testWorkWithMoreComplicateData($data)
    {
        $mcrypt = new McryptCrypt('12345678');
        $key = 'phalapi';

        $encryptData = $mcrypt->encrypt($data, $key);

        $decryptData = $mcrypt->decrypt($encryptData, $key);

        $this->assertEquals($data, $decryptData);
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
}
