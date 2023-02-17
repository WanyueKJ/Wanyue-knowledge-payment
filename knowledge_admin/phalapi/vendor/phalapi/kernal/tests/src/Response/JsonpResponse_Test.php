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

if (!class_exists('PhalApi\\Response\\JsonpResponse')) {
    require dirname(__FILE__) . '/./src/Response/JsonpResponse.php';
}

/**
 * PhpUnderControl_PhalApi\Response\JsonpResponse_Test
 *
 * 针对 ./src/Response/JsonpResponse.php PhalApi\Response\JsonpResponse 类的PHPUnit单元测试
 *
 * @author: dogstar 20170708
 */

class PhpUnderControl_PhalApiResponseJsonpResponse_Test extends \PHPUnit_Framework_TestCase
{
    public $phalApiResponseJsonpResponse;

    protected function setUp()
    {
        parent::setUp();

        $this->phalApiResponseJsonpResponse = new PhalApi\Response\JsonpResponse('foo');
        if (version_compare(PHP_VERSION, '5.4', '>=')) {
            $this->phalApiResponseJsonpResponse = new PhalApi\Response\JsonpResponse('foo', JSON_UNESCAPED_UNICODE | JSON_FORCE_OBJECT);
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
        $this->phalApiResponseJsonpResponse->setData(array('我爱中国'));
        $this->phalApiResponseJsonpResponse->output();
        $this->expectOutputRegex('/foo/');
    } 

}
