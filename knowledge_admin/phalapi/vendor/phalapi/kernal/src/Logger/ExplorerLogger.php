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

namespace PhalApi\Logger;

use PhalApi\Logger;

/**
 * ExploerLogger 直接输出日记到控制台的日记类 
 * 
 * - 测试环境下使用
 * 
 * @package     PhalApi\Logger
 * @license     http://www.phalapi.net/license GPL 协议
 * @link        http://www.phalapi.net/
 * @author      dogstar <chanzonghuang@gmail.com> 2015-02-09 
 */

class ExplorerLogger extends Logger {

	public function log($type, $msg, $data) {
        $msgArr = array();
        $msgArr[] = date('Y-m-d H:i:s', $_SERVER['REQUEST_TIME']);
        $msgArr[] = strtoupper($type);
        $msgArr[] = str_replace(PHP_EOL, '\n', $msg);
        if ($data !== NULL) {
            $msgArr[] = is_array($data) ? json_encode($data) : $data;
        }

        $content = implode('|', $msgArr) . PHP_EOL;

        echo "\n", $content, "\n";
	}
}
