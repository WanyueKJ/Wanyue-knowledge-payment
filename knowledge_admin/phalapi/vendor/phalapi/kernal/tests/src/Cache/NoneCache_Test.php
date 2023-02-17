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

use PhalApi\Cache\NoneCache;

/**
 * PhpUnderControl_PhalApiCacheNone_Test
 *
 * 针对 ../../PhalApi/Cache/None.php PhalApi_Cache_None 类的PHPUnit单元测试
 *
 * @author: dogstar 20150226
 */

class PhpUnderControl_PhalApiCacheNone_Test extends \PHPUnit_Framework_TestCase
{
    public $noneCache;

    protected function setUp()
    {
        parent::setUp();

        $this->noneCache = new NoneCache();
    }

    protected function tearDown()
    {
    }


    /**
     * @group testSet
     */ 
    public function testSet()
    {
        $key = 'aKey';
        $value = 'aValue';
        $expire = '100';

        $rs = $this->noneCache->set($key, $value, $expire);
    }

    /**
     * @group testGet
     */ 
    public function testGet()
    {
        $key = 'aKey';

        $rs = $this->noneCache->get($key);

        $this->assertNull($rs);
    }

    /**
     * @group testDelete
     */ 
    public function testDelete()
    {
        $key = 'aKey';

        $rs = $this->noneCache->delete($key);
    }

}
