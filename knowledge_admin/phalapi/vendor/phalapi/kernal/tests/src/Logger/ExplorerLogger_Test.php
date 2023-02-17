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

use PhalApi\Logger\ExplorerLogger;
use PhalApi\Logger;

/**
 * PhpUnderControl_PhalApiLoggerExplorer_Test
 *
 * 针对 ../test_file_for_loader.php PhalApi_Logger_Explorer 类的PHPUnit单元测试
 *
 * @author: dogstar 20150205
 */

class PhpUnderControl_PhalApiLoggerExplorer_Test extends \PHPUnit_Framework_TestCase
{
    public $explorerLogger;

    protected function setUp()
    {
        parent::setUp();

        $this->explorerLogger = new ExplorerLogger(
            Logger::LOG_LEVEL_DEBUG | Logger::LOG_LEVEL_INFO | Logger::LOG_LEVEL_ERROR);
    }

    protected function tearDown()
    {
    }


    /**
     * @group testLog
     */ 
    public function testLog()
    {
        $type = 'test';
        $msg = 'this is a test msg';
        $data = array('from' => 'testLog');

        $this->explorerLogger->log($type, $msg, $data);

        $this->expectOutputRegex('/TEST|this is a test msg|{"from":"testLog"}/');
    }

    public function testLogButNoShow()
    {
        $logger = new ExplorerLogger(0);

        $logger->info('no info');
        $logger->debug('no debug');
        $logger->error('no error');

        $this->expectOutputString('');
    }
}
