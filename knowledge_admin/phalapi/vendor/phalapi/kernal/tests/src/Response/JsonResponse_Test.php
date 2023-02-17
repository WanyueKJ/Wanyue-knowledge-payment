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


//require_once dirname(__FILE__) . '/bootstrap.php';

if (!class_exists('PhalApi\\Response\\JsonResponse')) {
    require dirname(__FILE__) . '/./src/Response/JsonResponse.php';
}

/**
 * PhpUnderControl_PhalApi\Response\JsonResponse_Test
 *
 * 针对 ./src/Response/JsonResponse.php PhalApi\Response\JsonResponse 类的PHPUnit单元测试
 *
 * @author: dogstar 20170708
 */

class PhpUnderControl_PhalApiResponseJsonResponse_Test extends \PHPUnit_Framework_TestCase
{
    public $phalApiResponseJsonResponse;

    protected function setUp()
    {
        parent::setUp();

        $this->phalApiResponseJsonResponse = new PhalApi\Response\JsonResponse();

        if (version_compare(PHP_VERSION, '5.4', '>=')) {
            $this->phalApiResponseJsonResponse = new PhalApi\Response\JsonResponse(JSON_UNESCAPED_UNICODE);
        }
    }

    protected function tearDown()
    {
        // 输出本次单元测试所执行的SQL语句
        // var_dump(DI()->tracer->getSqls());

        // 输出本次单元测试所涉及的追踪埋点
        // var_dump(DI()->tracer->getSqls());
    }

    public function testOutput()
    {
        $this->phalApiResponseJsonResponse->setData(array('我爱中国'));
        $this->phalApiResponseJsonResponse->output();
        $this->expectOutputRegex('/200/');
    } 
}
