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

use PhalApi\Request\Formatter\EnumFormatter;

/**
 * PhpUnderControl_PhalApiRequestFormatterEnum_Test
 *
 * 针对 ../../../PhalApi/Request/Formatter/Enum.php PhalApi_Request_Formatter_Enum 类的PHPUnit单元测试
 *
 * @author: dogstar 20151107
 */

class PhpUnderControl_PhalApiRequestFormatterEnum_Test extends \PHPUnit_Framework_TestCase
{
    public $enumFomatter;

    protected function setUp()
    {
        parent::setUp();

        $this->enumFomatter = new EnumFormatter();
    }

    protected function tearDown()
    {
    }


    /**
     * @group testParse
     */ 
    public function testParse()
    {
        $value = 'ios';
        $rule = array('range' => array('ios', 'android'));

        $rs = $this->enumFomatter->parse($value, $rule);

        $this->assertEquals('ios', $rs);
    }

}
