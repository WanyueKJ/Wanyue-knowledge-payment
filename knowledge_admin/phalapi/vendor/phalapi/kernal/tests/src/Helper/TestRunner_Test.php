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

use PhalApi\Helper\TestRunner;

include_once dirname(__FILE__) . '/runner.php';

/**
 * PhpUnderControl_PhalApiHelperTestRunner_Test
 *
 * 针对 ../PhalApi/Helper/TestRunner.php PhalApi_Helper_TestRunner 类的PHPUnit单元测试
 *
 * @author: dogstar 20170415
 */

class PhpUnderControl_PhalApiHelperTestRunner_Test extends \PHPUnit_Framework_TestCase
{
    public $testRunner;

    protected function setUp()
    {
        parent::setUp();

        $this->testRunner = new TestRunner();
    }

    protected function tearDown()
    {
    }


    /**
     * @group testGo
     */ 
    public function testGo()
    {
        $url = 'demo.phalapi.net';
        $params = array (
            'service' => 'Tests.InnerRunner.Go',
        );

        $rs = TestRunner::go($url, $params);

        $this->assertTrue(is_array($rs));
    }

    /**
     * @expectedException \PhalApi\Exception
     */
    public function testGoWrong()
    {
        TestRunner::go('', array());
    }
}

