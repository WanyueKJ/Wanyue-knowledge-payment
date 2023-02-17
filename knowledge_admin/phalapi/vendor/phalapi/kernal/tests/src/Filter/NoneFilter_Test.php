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

use PhalApi\Filter\NoneFilter;
use PhalApi\Api;
use PhalApi\Filter;
use PhalApi\Request;

/**
 * PhpUnderControl_PhalApiFilterNone_Test
 *
 * 针对 ../../PhalApi/Filter/None.php PhalApi_Filter_None 类的PHPUnit单元测试
 *
 * @author: dogstar 20151023
 */

class PhpUnderControl_PhalApiFilterNone_Test extends \PHPUnit_Framework_TestCase
{
    public $noneFilter;

    protected function setUp()
    {
        parent::setUp();

        $this->noneFilter = new NoneFilter();
    }

    protected function tearDown()
    {
    }


    /**
     * @group testCheck
     */ 
    public function testCheck()
    {
        $rs = $this->noneFilter->check();
    }

    /**
     * @expectedException \Exception
     */
    public function testApiWithCheckException()
    {
        \PhalApi\DI()->request = new Request(array('service' => 'AlwaysExceptionFilter.Go'));

        \PhalApi\DI()->filter = '\\PhalApi\\Tests\\AlwaysExceptionFilter';
        $api = new AlwaysExceptionApi();
        $api->init();
    }
}


class AlwaysExceptionApi extends Api
{
    public function go()
    {
        return 'go to BeiJing';
    }
}

class AlwaysExceptionFilter implements Filter
{
    public function check()
    {
        throw new \Exception('just for test');
    }
}
