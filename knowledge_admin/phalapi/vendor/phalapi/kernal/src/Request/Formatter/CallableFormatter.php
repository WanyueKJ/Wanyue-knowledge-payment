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

namespace PhalApi\Request\Formatter;

use PhalApi\Request\Formatter;
use PhalApi\Request\Formatter\BaseFormatter;
use PhalApi\Exception\InternalServerErrorException;

/**
 * CallableFormatter 格式化回调类型
 *
 * @package     PhalApi\Request
 * @license     http://www.phalapi.net/license GPL 协议
 * @link        http://www.phalapi.net/
 * @author      dogstar <chanzonghuang@gmail.com> 2015-11-07
 */


class CallableFormatter extends BaseFormatter implements Formatter {

    /**
     * 对回调类型进行格式化
     *
     * @param mixed $value 变量值
     * @param array $rule array('callback' => '回调函数', 'params' => '第三个参数')
     * @return boolean/string 格式化后的变量
     *
     */
    public function parse($value, $rule) {
        $callback = isset($rule['callback']) 
            ? $rule['callback'] 
            : (isset($rule['callable']) ? $rule['callable'] : NULL);

        // 提前触发回调类的加载，以便能正常回调
        if (is_array($callback) && count($callback) >= 2 && is_string($callback[0])) {
            // Type 2：静态类方法，如：array('MyClass', 'myCallbackMethod')
            class_exists($callback[0]);
        } else if (is_string($callback) && preg_match('/(.*)\:\:/', $callback, $macthes)) {
            // Type 4：静态类方法，如：'MyClass::myCallbackMethod'
            class_exists($macthes[1]);
        }

        if (empty($callback) || !is_callable($callback)) {
            throw new InternalServerErrorException(
                \PhalApi\T('invalid callback for rule: {name}', array('name' => $rule['name']))
            );
        }

        if (isset($rule['params'])) {
            return call_user_func($callback, $value, $rule, $rule['params']);
        } else {
            return call_user_func($callback, $value, $rule);
        }
    }
}
