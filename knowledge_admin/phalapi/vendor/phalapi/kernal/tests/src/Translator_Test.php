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

use PhalApi\Translator;

/**
 * PhpUnderControl_PhalApiTranslator_Test
 *
 * 针对 \PhalApi\Translator 类的PHPUnit单元测试
 *
 * @author: dogstar 20150201
 */

class PhpUnderControl_PhalApiTranslator_Test extends \PHPUnit_Framework_TestCase
{
    public $translator;

    protected function setUp()
    {
        parent::setUp();

        $this->translator = new Translator();
    }

    protected function tearDown()
    {
    }


    /**
     * @group testGet
     */ 
    public function testGet()
    {
        Translator::setLanguage('zh_cn');

        $this->assertEquals('用户不存在', Translator::get('user not exists'));

        $this->assertEquals('PHPUnit您好，欢迎使用PhalApi！', Translator::get('Hello {name}, Welcome to use PhalApi!', array('name' => 'PHPUnit')));

        $this->assertEquals('PhalApi 我爱你', \PhalApi\T('{0} I love you', array('PhalApi')));
        $this->assertEquals('PhalApi 我爱你因为no reasons', \PhalApi\T('{0} I love you because {1}', array('PhalApi', 'no reasons')));
    }

    /**
     * @group testSetLanguage
     */ 
    public function testSetLanguage()
    {
        $language = 'en';

        $rs = Translator::setLanguage($language);
    }

    /**
     * @group testFormatVar
     */ 
    public function testFormatVar()
    {
        $name = 'abc';

        $rs = Translator::formatVar($name);

        $this->assertEquals('{abc}', $rs);
    }

    public function testAddMessage() 
    {
        Translator::setLanguage('zh_cn');
        Translator::addMessage(dirname(__FILE__) . '/../test_data');

        $this->assertEquals('this is a good way', Translator::get('test'));
    }

    public function testGetWithNoLanguageSet()
    {
        MockTranslator::setLanguageNameSimple(null);

        $rs = \PhalApi\T('test');

        Translator::setLanguage('zh_cn');
    }
}

class MockTranslator extends Translator {

    public static function setLanguageNameSimple($lan) {
        Translator::$message = null;
    }
}
