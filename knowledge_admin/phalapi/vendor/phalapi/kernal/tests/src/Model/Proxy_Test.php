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

use PhalApi\Model\Query;
use PhalApi\Model\Proxy;

/**
 * PhpUnderControl_PhalApiModelProxy_Test
 *
 * 针对 ../PhalApi/ModelProxy.php PhalApi_ModelProxy 类的PHPUnit单元测试
 *
 * @author: dogstar 20150226
 */

class PhpUnderControl_PhalApiModelProxy_Test extends \PHPUnit_Framework_TestCase
{
    public $proxy;

    protected function setUp()
    {
        parent::setUp();

        $this->proxy = new ProxyMock();
    }

    protected function tearDown()
    {
    }


    /**
     * @group testGetData
     */ 
    public function testGetData()
    {
        $query = new Query();
        $query->id = 1;

        $rs = $this->proxy->getData($query);
    }

    public function testGetDataWithNoCache()
    {
        $query = new Query();
        $query->id = 1;
        $query->readCache = false;
        $query->writeCache = false;

        $rs = $this->proxy->getData($query);
        $this->assertEquals('heavy data', $rs);
    }

    public function testGetDataWithCache()
    {
        $query = new Query();
        $query->id = 1;
        $query->readCache = true;
        $query->writeCache = true;

        $rs = $this->proxy->getData($query);
        $this->assertEquals('heavy data', $rs);
    }

    public function testNewWithNull()
    {
        $proxy = new ProxyMock(NULL);
        $proxy->getData();
    }
}

class ProxyMock extends Proxy {

    protected function doGetData($query) {
        return 'heavy data';
    }

    protected function getKey($query) {
        return 'heavy_data_' . $query->id;
    }

    protected function getExpire($query) {
        return 10;
    }
}
