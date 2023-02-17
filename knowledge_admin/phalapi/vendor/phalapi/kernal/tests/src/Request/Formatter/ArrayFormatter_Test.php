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

use PhalApi\Request\Formatter\ArrayFormatter;

/**
 * PhpUnderControl_PhalApiRequestFormatterArray_Test
 *
 * 针对 ../../../PhalApi/Request/Formatter/Array.php PhalApi_Request_Formatter_Array 类的PHPUnit单元测试
 *
 * @author: dogstar 20151107
 */

class PhpUnderControl_PhalApiRequestFormatterArray_Test extends \PHPUnit_Framework_TestCase
{
    public $arrayFormatter;

    protected function setUp()
    {
        parent::setUp();

        $this->arrayFormatter = new ArrayFormatter();
    }

    protected function tearDown()
    {
    }


    /**
     * @group testParse
     */ 
    public function testParse()
    {
        $value = '1|2|3|4|5';
        $rule = array('name' => 'testKey', 'type' => 'array', 'format' => 'explode', 'separator' => '|');

        $rs = $this->arrayFormatter->parse($value, $rule);

        $this->assertTrue(is_array($rs));
        $this->assertEquals(array(1, 2, 3, 4, 5), $rs);
    }

    public function testParseJson()
    {
        $value = array('a' => 1);
        $rule = array('name' => 'testKey', 'type' => 'array', 'format' => 'json');

        $rs = $this->arrayFormatter->parse(json_encode($value), $rule);

        $this->assertTrue(is_array($rs));
        $this->assertEquals($value, $rs);
    }

    /**
     * 针对接收含加号参数的测试
     */
    public function testParseJsonForPlus()
    {
        $rule = array('name' => 'testKey', 'type' => 'array', 'format' => 'json');

        $rs = $this->arrayFormatter->parse('{"a":"+86 10000"}', $rule);

        $this->assertTrue(is_array($rs));
        $this->assertEquals('+86 10000', $rs['a']);
    }

    /**
     * @expectedException PhalApi\Exception\BadRequestException
     */
    public function testParseWrongJson()
    {
        $rule = array('name' => 'testKey', 'type' => 'array', 'format' => 'json');

        $rs = $this->arrayFormatter->parse('{"a":1', $rule);
    }

    /**
     * @expectedException PhalApi\Exception\BadRequestException
     * @expectedExceptionMessage 显示指定的错误信息
     */
    public function testParseWrongJsonWithMessage()
    {
        $rule = array('name' => 'testKey', 'type' => 'array', 'format' => 'json', 'message' => '显示指定的错误信息');

        $rs = $this->arrayFormatter->parse('{"a":1', $rule);
    }

    /**
     * 空字符串转为空数组
     */
    public function testParseEmptyStringToArray()
    {
        $rule = array('name' => 'testKey', 'type' => 'array', 'format' => 'explode', 'message' => '显示指定的错误信息');

        $rs = $this->arrayFormatter->parse('', $rule);

        $this->assertEmpty($rs);
        $this->assertSame(array(), $rs);
    }
}
