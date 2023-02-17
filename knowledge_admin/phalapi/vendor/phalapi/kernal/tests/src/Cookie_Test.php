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

use PhalApi\Cookie;

/**
 * PhpUnderControl_PhalApiCookie_Test
 *
 * 针对 ../../../PhalApi/PhalApi/Cookie.php PhalApi_Cookie 类的PHPUnit单元测试
 *
 * @author: dogstar 20150411
 */

class PhpUnderControl_PhalApiCookie_Test extends \PHPUnit_Framework_TestCase
{
    public $cookie;

    protected function setUp()
    {
        parent::setUp();

        $this->cookie = new Cookie();
    }

    protected function tearDown()
    {
    }


    /**
     * @group testGet
     */ 
    public function testGet()
    {
        $key = NULL;

        $rs = $this->cookie->get($key);

        $this->assertTrue(is_array($rs));

        $this->assertNull($this->cookie->get('noThisKey'));

        $_COOKIE['aKey'] = 'phalapi';
        $key = 'aKey';
        $this->assertEquals('phalapi', $this->cookie->get($key));
    }

    /**
     * @group testSet
     */ 
    public function testSet()
    {
        $key = 'bKey';
        $value = '2015';

        $rs = @$this->cookie->set($key, $value);

        //should not get in this time, but next time
        $this->assertNull($this->cookie->get($key));
    }

}
