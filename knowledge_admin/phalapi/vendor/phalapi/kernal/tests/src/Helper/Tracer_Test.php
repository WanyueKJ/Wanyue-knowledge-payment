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

use PhalApi\Helper\Tracer;

/**
 * PhpUnderControl_PhalApiHelperTracer_Test
 *
 * 针对 ../PhalApi/Helper/Tracer.php PhalApi_Helper_Tracer 类的PHPUnit单元测试
 *
 * @author: dogstar 20170415
 */

class PhpUnderControl_PhalApiHelperTracer_Test extends \PHPUnit_Framework_TestCase
{
    public $tracer;

    protected function setUp()
    {
        parent::setUp();

        $this->tracer = new Tracer();
    }

    protected function tearDown()
    {
        \PhalApi\DI()->debug = true;
    }


    /**
     * @group testMark
     */ 
    public function testMark()
    {
        $tag = '';

        $this->tracer->mark($tag);
        $this->tracer->mark('aHa~');
    }

    /**
     * @group testGetReport
     */ 
    public function testGetReport()
    {
        $rs = $this->tracer->getStack();

        $this->assertTrue(is_array($rs));
    }

    public function testMixed()
    {
        $this->tracer->mark('aHa~');
        $this->tracer->mark('BIU~');
        $this->tracer->mark('BlaBla~');

        doSthForTrace($this->tracer);

        $report = $this->tracer->getStack();
        //var_dump($report);
        $this->assertCount(4, $report);
    }

    public function testNoDebug()
    {
        \PhalApi\DI()->debug = false;

        $tracer = new Tracer();
        $tracer->mark('aHa~');

        $report = $tracer->getStack();
        $this->assertCount(0, $report);
    }

    public function testSql()
    {
        $this->tracer->sql('SELECT');
        $this->tracer->sql('DELETE');

        $this->assertCount(2, $this->tracer->getSqls());
    }
}

function doSthForTrace($tracer) {
    $tracer->mark('IN_FUNCTION');
}
