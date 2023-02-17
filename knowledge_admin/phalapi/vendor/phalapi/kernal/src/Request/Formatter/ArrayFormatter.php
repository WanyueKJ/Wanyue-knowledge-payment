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
 * Formatter_Array 格式化数组
 *
 * @package     PhalApi\Request
 * @license     http://www.phalapi.net/license GPL 协议
 * @link        http://www.phalapi.net/
 * @author      dogstar <chanzonghuang@gmail.com> 2015-11-07
 */


class ArrayFormatter extends BaseFormatter implements Formatter {

    /**
     * 对数组格式化/数组转换
     * @param string $value 变量值
     * @param array $rule array('name' => '', 'type' => 'array', 'default' => '', 'format' => 'json/explode', 'separator' => '', 'min' => '', 'max' => '')
     * @return array
     */
    public function parse($value, $rule) {
        $rs = $value;

        if (!is_array($rs)) {
            $ruleFormat = !empty($rule['format']) ? strtolower($rule['format']) : '';
            if ($ruleFormat == 'explode') {
                // @dogstar 20191020 当传递参数为空字符串时，解析为空数组array()，而不是包含一个空字符串的数组array('')
                $rs = $rs !== '' ? explode(isset($rule['separator']) ? $rule['separator'] : ',', $rs) : array();
            } else if ($ruleFormat == 'json') {
                $rs = json_decode($rs, TRUE);

                if (!empty($value) && $rs === NULL) {
                    $message = isset($rule['message']) 
                        ? \PhalApi\T($rule['message']) 
                        : \PhalApi\T('{name} illegal json data', array('name' => $rule['name']));
                    throw new BadRequestException($message);
                }
            } else {
                $rs = array($rs);
            }
        }

        $this->filterByRange(count($rs), $rule);

        return $rs;
    }
}
