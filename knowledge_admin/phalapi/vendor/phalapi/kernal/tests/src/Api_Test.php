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

use PhalApi\Api;
use PhalApi\Request;
use PhalApi\Filter;
use PhalApi\Exception\InternalServerErrorException;

/**
 * PhpUnderControl_PhalApiApi_Test
 *
 * 针对 \PhalApi\Api 类的PHPUnit单元测试
 *
 * @author: dogstar 20170702
 */

class PhpUnderControl_PhalApiApi_Test extends \PHPUnit_Framework_TestCase
{
    public $api;

    protected function setUp()
    {
        parent::setUp();

        $this->api = new Api();
    }

    protected function tearDown()
    {
        \PhalApi\DI()->filter = NULL;
    }

    /**
     * @group testInitialize
     */ 
    public function testInitialize()
    {
        \PhalApi\DI()->request = new Request(array('service' => 'Default.Index'));
        $rs = $this->api->init();
    }


    public function testInitializeWithWrongSign()
    {
        $data = array();
        $data['service'] = 'Default.Index';

        \PhalApi\DI()->request = new Request($data);
        $rs = $this->api->init();
    }

    public function testInitializeWithRightSign()
    {
        $data = array();
        $data['service'] = 'Default.Index';

        \PhalApi\DI()->request = new Request($data);
        $rs = $this->api->init();

    }

    public function testSetterAndGetter()
    {
        $this->api->username = 'phalapi';
        $this->assertEquals('phalapi', $this->api->username);
    }

    /**
     * @expectedException \PhalApi\Exception\InternalServerErrorException
     */
    public function testGetUndefinedProperty()
    {
        $this->api->name = 'PhalApi';
        $rs = $this->api->noThisKey;
    }

    public function testApiImpl()
    {
        $data = array();
        $data['service'] = 'PhalApi.ImplApi.Add';
        $data['version'] = '1.1.0';
        $data['left'] = '6';
        $data['right'] = '1';

        \PhalApi\DI()->request = new Request($data);
        \PhalApi\DI()->filter = '\\PhalApi\\Tests\\ImplFilter';

        $impl = new ImplApi();
        $impl->init();

        $rs = $impl->add();
        $this->assertEquals(7, $rs);
    }

    /**
     * @expectedException \PhalApi\Exception\InternalServerErrorException
     */
    public function testIllegalFilter()
    {
        \PhalApi\DI()->filter = '\\PhalApi\\ImplNotFoundFilter';

        $impl = new ImplApi();
        $impl->init();
    }
}
