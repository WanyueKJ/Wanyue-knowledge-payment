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

use PhalApi\Cache\MultiCache;
use PhalApi\Cache\FileCache;
use PhalApi\Cache\NoneCache;

/**
 * PhpUnderControl_PhalApiCacheMulti_Test
 *
 * 针对 ../../PhalApi/Cache/Multi.php PhalApi_Cache_Multi 类的PHPUnit单元测试
 *
 * @author: dogstar 20150226
 */

class PhpUnderControl_PhalApiCacheMulti_Test extends \PHPUnit_Framework_TestCase
{
    public $multiCache;

    protected function setUp()
    {
        parent::setUp();

        $this->multiCache = new MultiCache();

        $fileCache = new FileCache(array('path' => dirname(__FILE__)));

        $this->multiCache->addCache($fileCache);
    }

    protected function tearDown()
    {
    }


    /**
     * @group testAddCache
     */ 
    public function testAddCache()
    {
        $cache = new NoneCache();

        $rs = $this->multiCache->addCache($cache);
    }

    /**
     * @group testSet
     */ 
    public function testSet()
    {
        $key = 'multiKey';
        $value = 'haha~';
        $expire = '100';

        $rs = $this->multiCache->set($key, $value, $expire);
    }

    /**
     * @group testGet
     * @depends testSet
     */ 
    public function testGet()
    {
        $key = 'multiKey';

        $rs = $this->multiCache->get($key);

        $this->assertSame('haha~', $rs);
    }

    public function testGetNull()
    {
        $this->assertNull($this->multiCache->get('whatever'));
    }

    /**
     * @group testDelete
     */ 
    public function testDelete()
    {
        $key = 'multiKey';

        $rs = $this->multiCache->delete($key);
    }

}
