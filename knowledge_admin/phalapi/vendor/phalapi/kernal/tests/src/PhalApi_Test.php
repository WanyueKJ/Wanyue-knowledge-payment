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

use PhalApi\PhalApi;
use PhalApi\Request;

include_once dirname(__FILE__) . '/pai.php';

/**
 * PhpUnderControl_PhalApi_Test
 *
 * 针对 ../PhalApi.php PhalApi 类的PHPUnit单元测试
 *
 * @author: dogstar 20150209
 */

class PhpUnderControl_PhalApi_Test extends \PHPUnit_Framework_TestCase
{
    public $phalApi;

    protected function setUp()
    {
        parent::setUp();

        $data = array(
            'service' => 'Tests.AnotherImpl.doSth',
        );

        \PhalApi\DI()->request = new Request($data);

        $this->phalApi = new PhalApi();
    }

    protected function tearDown()
    {
        \PhalApi\DI()->response = '\\PhalApi\\Response\\JsonResponse';
    }

    /**
     * @group testResponse
     */ 
    public function testResponseWithJsonMock()
    {
        \PhalApi\DI()->response = '\\PhalApi\\Tests\\JsonResponseMock';

        $rs = $this->phalApi->response();

        $rs->output();

        $this->expectOutputRegex('/"ret":200/');
    }

    /**
     * @group testResponse
     */ 
    public function testResponseWithJsonPMock()
    {
        \PhalApi\SL('zh_cn');
        \PhalApi\DI()->response = new JsonpResponseMock('test');

        $rs = $this->phalApi->response();

        $rs->output();

        $this->expectOutputRegex('/"ret":200/');
    }

    /**
     * @group testResponse
     */ 
    public function testResponseWithExplorer()
    {
        \PhalApi\DI()->response = '\\PhalApi\\Response\\ExplorerResponse';

        $rs = $this->phalApi->response();

        $rs->output();
        $res = $rs->getResult();

        $this->assertEquals(200, $res['ret']);
    }

    public function testResponseWithBadRequest() {
        $data = array(
            'service' => 'AnotherImpl',
        );

        \PhalApi\DI()->request = new Request($data);
        \PhalApi\DI()->response = '\\PhalApi\\Tests\\JsonResponseMock';

        $phalApi = new PhalApi();

        $rs = $phalApi->response();

        $rs->output();

        $this->expectOutputRegex('/"ret":400/');
    }

    public function testResponseWithException() {
        $data = array(
            'service' => 'Tests.AnotherImpl.MakeSomeTrouble',
        );

        \PhalApi\DI()->request = new Request($data);

        $phalApi = new PhalApi();

        $rs = $phalApi->response();
    }
}
