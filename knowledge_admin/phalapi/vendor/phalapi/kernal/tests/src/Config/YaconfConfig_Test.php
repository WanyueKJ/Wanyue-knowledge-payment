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

use PhalApi\Config\YaconfConfig;

include_once dirname(__FILE__) . '/yaconf.php';

/**
 * PhpUnderControl_PhalApiConfigYaconf_Test
 *
 * 针对 ../../PhalApi/Config/Yaconf.php PhalApi_Config_Yaconf 类的PHPUnit单元测试
 *
 * @author: dogstar 20151109
 */

class PhpUnderControl_PhalApiConfigYaconf_Test extends \PHPUnit_Framework_TestCase
{
    public $phalApiConfigYaconf;

    protected function setUp()
    {
        parent::setUp();

        /**
         * vim ./test.ini
         *
         * name="PhalApi"
         * version="1.3.1"
         */

        $this->phalApiConfigYaconf = new YaconfConfig();
    }

    protected function tearDown()
    {
    }


    /**
     * @group testGet
     */ 
    public function testGet()
    {
        $key = 'test.name';
        $default = NULL;

        $rs = $this->phalApiConfigYaconf->get($key, $default);

        $this->assertEquals('PhalApi', $rs);
    }

    /**
     * @group testHas
     */ 
    public function testHas()
    {
        $key = 'test.version';

        $rs = $this->phalApiConfigYaconf->has($key);

        $this->assertTrue($rs);
    }

}
