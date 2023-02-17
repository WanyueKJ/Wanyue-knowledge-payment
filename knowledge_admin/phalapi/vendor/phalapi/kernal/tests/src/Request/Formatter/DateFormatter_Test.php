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

use PhalApi\Request\Formatter\DateFormatter;

/**
 * PhpUnderControl_PhalApiRequestFormatterDate_Test
 *
 * 针对 ../../../PhalApi/Request/Formatter/Date.php PhalApi_Request_Formatter_Date 类的PHPUnit单元测试
 *
 * @author: dogstar 20151107
 */

class PhpUnderControl_PhalApiRequestFormatterDate_Test extends \PHPUnit_Framework_TestCase
{
    public $dateFormatter;

    protected function setUp()
    {
        parent::setUp();

        $this->dateFormatter = new DateFormatter();
    }

    protected function tearDown()
    {
    }


    /**
     * @group testParse
     */ 
    public function testParse()
    {
        $value = '2014-10-01 12:00:00';
        $rule = array('name' => 'testKey', 'type' => 'date', 'format' => 'timestamp');

        $rs = $this->dateFormatter->parse($value, $rule);

        $this->assertTrue(is_numeric($rs));
        $this->assertSame(1412136000, $rs);
    }

    public function testParseWithMinAndMax()
    {
        $value = '2014-10-01 12:00:00';
        $rule = array('name' => 'testKey', 'type' => 'date', 'format' => 'timestamp', 'min' => strtotime('2014-10-01 00:00:00'), 'max' => strtotime('2014-10-01 23:59:59'));

        $rs = $this->dateFormatter->parse($value, $rule);

        $this->assertTrue(is_numeric($rs));
        $this->assertSame(1412136000, $rs);
    }

    public function testParseWithMinAndMaxForString()
    {
        $value = '2014-10-01 12:00:00';
        $rule = array('name' => 'testKey', 'type' => 'date', 'format' => 'timestamp', 'min' => '2014-10-01 00:00:00', 'max' => '2014-10-01 23:59:59');

        $rs = $this->dateFormatter->parse($value, $rule);

        $this->assertTrue(is_numeric($rs));
        $this->assertSame(1412136000, $rs);
    }
}
