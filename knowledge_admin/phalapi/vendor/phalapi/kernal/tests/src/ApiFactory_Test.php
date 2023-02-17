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

use PhalApi\ApiFactory;
use PhalApi\Exception\BadRequestException;
use PhalApi\Exception\InternalServerErrorException;
use PhalApi\Request;

include_once dirname(__FILE__) . '/app.php';

/**
 * PhpUnderControl_PhalApiApiFactory_Test
 *
 * 针对 ../../PhalApi/ApiFactory.php ApiFactory 类的PHPUnit单元测试
 *
 * @author: dogstar 20141002
 */

class PhpUnderControl_PhalApiApiFactory_Test extends \PHPUnit_Framework_TestCase
{
    public $coreApiFactory;

    protected function setUp()
    {
        parent::setUp();
    }

    protected function tearDown()
    {
        \PhalApi\DI()->filter = NULL;
    }


    /**
     * @group testGenerateService
     */ 
    public function testGenerateService()
    {
        $rs = ApiFactory::generateService();

        $this->assertNotNull($rs);
        $this->assertInstanceOf('\\PhalApi\\Api', $rs);
    }

    public function testGenerateNormalClientService()
    {
        $data['service'] = 'Site.Index';
        $data['sign'] = '1ec92737c7c287c7249e0adef566544a';

        \PhalApi\DI()->request = new Request($data);
        $rs = ApiFactory::generateService();

        $this->assertNotNull($rs);
        $this->assertInstanceOf('\\PhalApi\\Api', $rs);
        $this->assertInstanceOf('\\App\\Api\\Site', $rs);
    }

    /**
     * @expectedException \PhalApi\Exception\BadRequestException
     */
    public function testGenerateIllegalApiService()
    {
        $data['service'] = 'NoThisService.Index';
        \PhalApi\DI()->request = new Request($data);
        $rs = ApiFactory::generateService();
    }

    /**
     * @expectedException \PhalApi\Exception\BadRequestException
     */
    public function testGenerateIllegalActionService()
    {
        $data['service'] = 'Default.noThisFunction';
        \PhalApi\DI()->request = new Request($data);
        $rs = ApiFactory::generateService();
    }

    /**
     * @expectedException \PhalApi\Exception\BadRequestException 
     */
    public function testIllegalServiceName()
    {
        $data['service'] = 'Default';
        \PhalApi\DI()->request = new Request($data);
        $rs = ApiFactory::generateService();
    }

    /**
     * @expectedException \PhalApi\Exception\InternalServerErrorException
     */
    public function testNotPhalApiSubclass()
    {
        $data['service'] = 'Crazy.What';
        \PhalApi\DI()->request = new Request($data);
        $rs = ApiFactory::generateService();
    }

    /**
     * @expectedException \PhalApi\Exception\BadRequestException
     */
    public function testServiceWhitelistNOTInclude()
    {
        \PhalApi\DI()->filter = new ImplExceptionFilter();

        $data['service'] = 'ServiceWhitelist.GetTime';
        \PhalApi\DI()->request = new Request($data);
        $rs = ApiFactory::generateService();
    }

    /**
     * @dataProvider provideDataForWhilelist
     */
    public function testServiceWhitelistInclude($service)
    {
        \PhalApi\DI()->filter = new ImplExceptionFilter();

        $data['service'] = $service;
        \PhalApi\DI()->request = new Request($data);
        $rs = ApiFactory::generateService();

        $this->assertInstanceOf('\\PhalApi\\Api', $rs);
    }

    public function provideDataForWhilelist()
    {
        return array(
            array('App.ServiceWhitelist.Index'),
            array('App.ServiceWhitelist.PoPo'),
            array('App.Site.Index'),
        );
    }

    /**
     * @expectedException PhalApi\Exception\BadRequestException
     */
    public function testWrongAction()
    {
        $data = array();
        $data['service'] = 'ServiceWhitelist.NoThisMethod';
        \PhalApi\DI()->request = new Request($data);
        $rs = ApiFactory::generateService();
    }
}
