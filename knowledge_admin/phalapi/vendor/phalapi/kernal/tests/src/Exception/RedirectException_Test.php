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

if (!class_exists('PhalApi\\Exception\\RedirectException')) {
    require dirname(__FILE__) . '/./src/Exception/RedirectException.php';
}

/**
 * PhpUnderControl_PhalApi\Exception\RedirectException_Test
 *
 * 针对 ./src/Exception/RedirectException.php PhalApi\Exception\RedirectException 类的PHPUnit单元测试
 *
 * @author: dogstar 20170708
 */

class PhpUnderControl_PhalApiExceptionRedirectException_Test extends \PHPUnit_Framework_TestCase
{
    public $phalApiExceptionRedirectException;

    protected function setUp()
    {
        parent::setUp();

        $this->phalApiExceptionRedirectException = new PhalApi\Exception\RedirectException('test', 0);
    }

    protected function tearDown()
    {
        // 输出本次单元测试所执行的SQL语句
        // var_dump(DI()->tracer->getSqls());

        // 输出本次单元测试所涉及的追踪埋点
        // var_dump(DI()->tracer->getSqls());
    }

    public function testHere()
    {
        $this->assertEquals(300, $this->phalApiExceptionRedirectException->getCode());
    }

}
