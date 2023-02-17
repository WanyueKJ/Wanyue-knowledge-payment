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
use PhalApi\Exception\BadRequestException;

/**
 * StringFormatter  格式化字符串
 * @package     PhalApi\Request
 * @license     http://www.phalapi.net/license GPL 协议
 * @link        http://www.phalapi.net/
 * @author      dogstar <chanzonghuang@gmail.com> 2015-11-07
 */
class StringFormatter extends BaseFormatter implements Formatter {

    /**
     * 对字符串进行格式化
     *
     * @param mixed $value 变量值
     * @param array $rule array('len' => ‘最长长度’)
     *
     * @return string 格式化后的变量
     */
    public function parse($value, $rule) {
        $rs = strval($this->filterByStrLen(strval($value), $rule));

        $this->filterByRegex($rs, $rule);

        return $rs;
    }

    /**
     * 根据字符串长度进行截取
     */
    protected function filterByStrLen($value, $rule) {
        $lenRule         = $rule;
        $lenRule['name'] = $lenRule['name'] . '.len';
        $lenValue        = !empty($lenRule['format']) ? mb_strlen($value, $lenRule['format']) : strlen($value);
        $this->filterByRange($lenValue, $lenRule);
        return $value;
    }

    /**
     * 进行正则匹配
     */
    protected function filterByRegex($value, $rule) {
        if (!isset($rule['regex']) || empty($rule['regex'])) {
            return;
        }

        // 非必须，且没有传递任何参数时，不作检测 #pr 58
        if (empty($rule['require']) && ($value === NULL || $value === '')) {
            return;
        }

        // 为安全起见，仅在调试模式下，才显示正则表达式
        if (preg_match($rule['regex'], $value) <= 0) {
            $message = isset($rule['message'])
                ? \PhalApi\T($rule['message'])
                : \PhalApi\T('{name} can not match {regex}', 
                    array('name'  => $rule['name'], 'regex' => \PhalApi\DI()->debug ? $rule['regex'] : '#regex'));

            throw new BadRequestException($message);
        }
    }

}
