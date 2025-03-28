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

use PhalApi\Loader;

/**
 * PhpUnderControl_PhalApiLoader_Test
 *
 * 针对 ../PhalApi/Loader.php PhalApi_Loader 类的PHPUnit单元测试
 *
 * @author: dogstar 20141004
 */

class PhpUnderControl_PhalApiLoader_Test extends \PHPUnit_Framework_TestCase
{
    public $loader;

    protected function setUp()
    {
        parent::setUp();

        $this->loader = new Loader(dirname(__FILE__));
    }

    protected function tearDown()
    {
    }


    /**
     * @group testAddDirs
     */ 
    public function testAddDirs()
    {
        $dirs = array('FirstDir', 'SecondDir');

        $this->loader->addDirs($dirs);
    }

    /**
     * @group testSetBasePath
     */ 
    public function testSetBasePath()
    {
        $rs = $this->loader->setBasePath('/path/to/phalapi');
    }

    /**
     * @group testLoadFile
     */ 
    public function testLoadFile()
    {
        $filePath = dirname(__FILE__) . '/test_file_for_loader.php';

        $this->loader->loadFile($filePath);
    }

    /**
     * @group testLoad
     */ 
    public function testLoad()
    {
        $className = '\\PhalApi\\Api';

        $rs = $this->loader->load($className);
    }

    public function testConstructAndAdd()
    {
        $loader = new Loader('./', array('./Config'));
        $loader->addDirs('./Data');
        $loader->addDirs(array('./Crypt'));
    }
}
