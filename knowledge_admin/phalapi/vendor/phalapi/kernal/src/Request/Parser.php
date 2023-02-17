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

namespace PhalApi\Request;

use PhalApi\Request\Formatter;
use PhalApi\Exception\InternalServerErrorException;

/**
 * Parser 变量格式化类
 *
 * 针对设定的规则进行对品购模块中的变量进行格式化操作
 * 
 * - 1、根据字段与预定义变量对应关系，获取变量值
 * - 2、对变量进行类型转换
 * - 3、进行有效性判断过滤
 * - 4、按业务需求进行格式化 
 * 
 * <br>格式规则：<br>
```
 *  array('name' => '', 'type' => 'string', 'default' => '', 'min' => '', 'max' => '', 'regex' => '')
 *  array('name' => '', 'type' => 'int', 'default' => '', 'min' => '', 'max' => '',)
 *  array('name' => '', 'type' => 'float', 'default' => '', 'min' => '', 'max' => '',)
 *  array('name' => '', 'type' => 'boolean', 'default' => '',)
 *  array('name' => '', 'type' => 'date', 'default' => '',)
 *  array('name' => '', 'type' => 'array', 'default' => '', 'format' => 'json/explode', 'separator' => '')
 *  array('name' => '', 'type' => 'enum', 'default' => '', 'range' => array(...))
 *  array('name' => '', 'type' => 'file', 'default' => array(...), 'min' => '', 'max' => '', 'range' => array(...))
```
 *
 * @package     PhalApi\Request
 * @license     http://www.phalapi.net/license GPL 协议
 * @link        http://www.phalapi.net/
 * @author      dogstar <chanzonghuang@gmail.com> 2014-10-04
 */

class Parser {

    /** ------------------ 对外开放操作 ------------------ **/

    /**
     * 统一格式化操作
     * 扩展参数请参见各种类型格式化操作的参数说明
     *
     * @param string $varName 变量名
     * @param array $rule 格式规则：
     * array(
     *  'name' => '变量名', 
     *  'type' => '类型', 
     *  'default' => '默认值', 
     *  'format' => '格式化字符串'
     *  ...
     *  )
     * @param array $params 参数列表
     * @return miexd 格式后的变量
     */ 
    public static function format($varName, $rule, $params) {
        $value = isset($rule['default']) ? $rule['default'] : NULL;
        $type = !empty($rule['type']) ? strtolower($rule['type']) : 'string';

        $key = isset($rule['name']) ? $rule['name'] : $varName;
        $value = isset($params[$key]) ? $params[$key] : $value;

        if ($value === NULL && $type != 'file') { //排除文件类型
            return $value;
        }

        return static::formatAllType($type, $value, $rule);
    }

    /**
     * 统一分发处理
     * @param string $type 类型
     * @param string $value 值
     * @param array $rule 规则配置
     * @return mixed
     */
    protected static function formatAllType($type, $value, $rule) {
        $diKey = '_formatter' . ucfirst($type);
        $diDefault = '\\PhalApi\\Request\\Formatter\\' . ucfirst($type) . 'Formatter';

        $formatter = \PhalApi\DI()->get($diKey, $diDefault);

        if (!($formatter instanceof Formatter)) {
            throw new InternalServerErrorException(
                \PhalApi\T('invalid type: {type} for rule: {name}', array('type' => $type, 'name' => $rule['name']))
            );
        }

        $rs = $formatter->parse($value, $rule);

        // 根据配置，执行钩子回调函数 @dogstar 20191020
        if (!empty($rule['on_after_parse'])) {
            $rs = static::onAfterParse($rule['on_after_parse'], $rs);
        }

        return $rs;
    }

    /**
     * 参数解析后的钩子回调函数
     * @param mixed $onAfterParse 待执行的钩子回调函数，可以是字符串配置，多个函数名用竖线分割；或者是可执行的匿名函数。回调函数签名是：<T> func(<T>)，其中T类型是当前对应的参数类型
     * @param mixed $value 参数值
     * @return mixed 返回经过钩子回调函数处理后的结果
     */
    protected static function onAfterParse($onAfterParse, $value) {
        if (is_string($onAfterParse)) {
            $onAfterParseList = explode('|', $onAfterParse);
            foreach ($onAfterParseList as $func) {
                $func = trim($func);
                if (empty($func) || !is_callable($func)) {
                    continue;
                }
                $value = call_user_func($func, $value);
            }
        } else if (is_callable($onAfterParse)) {
            $value = call_user_func($onAfterParse, $value);
        }

        return $value;
    }
}
