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

use PhalApi\Request\Formatter\BooleanFormatter;

/**
 * PhpUnderControl_PhalApiRequestFormatterBoolean_Test
 *
 * 针对 ../../../PhalApi/Request/Formatter/Boolean.php PhalApi_Request_Formatter_Boolean 类的PHPUnit单元测试
 *
 * @author: dogstar 20151107
 */

class PhpUnderControl_PhalApiRequestFormatterBoolean_Test extends \PHPUnit_Framework_TestCase
{
    public $booleanFormatter;

    protected function setUp()
    {
        parent::setUp();

        $this->booleanFormatter = new BooleanFormatter();
    }

    protected function tearDown()
    {
    }


    /**
     * @group testParse
     */ 
    public function testParse()
    {
        $value = 'on';
        $rule = array();

        $rs = $this->booleanFormatter->parse($value, $rule);

        $this->assertTrue($rs);
    }

}
