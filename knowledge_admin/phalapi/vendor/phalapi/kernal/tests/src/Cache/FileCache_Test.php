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

use PhalApi\Cache\FileCache;

/**
 * PhpUnderControl_PhalApiCacheFile_Test
 *
 * 针对 ../../PhalApi/Cache/File.php PhalApi_Cache_File 类的PHPUnit单元测试
 *
 * @author: dogstar 20150226
 */

class PhpUnderControl_PhalApiCacheFile_Test extends \PHPUnit_Framework_TestCase
{
    public $phalApiCacheFile;

    protected function setUp()
    {
        parent::setUp();

        @unlink(dirname(__FILE__) . '/cache');

        $config['path'] = dirname(__FILE__);
        $config['prefix'] = 'test';
        $this->phalApiCacheFile = new FileCache($config);
    }

    protected function tearDown()
    {
    }


    /**
     * @group testSet
     */ 
    public function testSet()
    {
        $key = 'aYearKey';
        $value = 2015;
        $expire = '200';

        $rs = $this->phalApiCacheFile->set($key, $value, $expire);
    }

    /**
     * @group testGet
     * @depends testSet
     */ 
    public function testGet()
    {
        $key = 'aYearKey';

        $rs = $this->phalApiCacheFile->get($key);

        $this->assertSame(2015, $rs);
    }

    /**
     * @group testDelete
     * @depends testSet
     */ 
    public function testDelete()
    {
        $key = 'aYearKey';

        $this->phalApiCacheFile->delete($key);

        $rs = $this->phalApiCacheFile->get($key);

        $this->assertSame(NULL, $rs);
    }

    public function testGetAfterSet()
    {
        $key = 'anotherKey';

        $value = array('name' => 'dogstar');

        $this->phalApiCacheFile->set($key, $value);

        $this->assertSame($value, $this->phalApiCacheFile->get($key));
    }

    public function testExpire() 
    {
        $key = 'tmpKey';
        $value = 'somethinghere~';
        $expire = 2;

        $this->phalApiCacheFile->set($key, $value, $expire);

        $this->assertSame($value, $this->phalApiCacheFile->get($key));

        sleep(3);

        $this->assertSame(NULL, $this->phalApiCacheFile->get($key));
    }

    public function testEnableFileNameFormatNOT()
    {
        $config = array();
        $config['path'] = dirname(__FILE__);
        $config['prefix'] = 'test_format';
        $config['enable_file_name_format'] = false;
        $phalApiCacheFile = new FileCache($config);

        $phalApiCacheFile->set('orinal_cache_key', 2019);
    }
}
