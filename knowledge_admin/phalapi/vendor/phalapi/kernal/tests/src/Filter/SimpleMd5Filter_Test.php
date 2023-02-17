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

use PhalApi\Filter\SimpleMD5Filter;
use PhalApi\Request;
use PhalApi\Exception\BadRequestException;

/**
 * PhpUnderControl_PhalApiFilterSimpleMD5_Test
 *
 * 针对 ../../PhalApi/Filter/SimpleMD5.php PhalApi_Filter_SimpleMD5 类的PHPUnit单元测试
 *
 * @author: dogstar 20151023
 */

class PhpUnderControl_PhalApiFilterSimpleMD5_Test extends \PHPUnit_Framework_TestCase
{
    public $simpleMD5Filter;

    protected function setUp()
    {
        parent::setUp();

        $this->simpleMD5Filter = new SimpleMD5Filter();
        \PhalApi\DI()->filter = '\\PhalApi\\Filter\\SimpleMD5Filter';
    }

    protected function tearDown()
    {
        \PhalApi\DI()->filter = NULL;
    }


    /**
     * @group testCheck
     */ 
    public function testCheck()
    {
        try {
            $rs = $this->simpleMD5Filter->check();
        } catch (BadRequestException $ex) {
        }
    }

    /**
     * @expectedException \PhalApi\Exception\BadRequestException
     */
    public function testCheckException()
    {
        $data = array(
            'service' => 'ImplApi.Add',
            'left' => 1,
            'right' => 1,
        );
        \PhalApi\DI()->request = new Request($data);

        $api = new ImplApi();
        $api->init();
    }

    public function testCheckWithRightSign()
    {
        $data = array(
            'service' => 'ImplApi.Add',
            'left' => 1,
            'right' => 1,
            'sign' => '6d35103bff93178d073b185f5e4c32fa',
        );
        \PhalApi\DI()->request = new Request($data);

        $api = new ImplApi();
        $api->init();
        $rs = $api->add();

        $this->assertEquals(2, $rs);
    }
}
