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

namespace PhalApi\Helper;

/**
 * ApiOnline - 在线接口文档
 *     
 * @package     PhalApi\Helper
 * @license     http://www.phalapi.net/license GPL 协议
 * @link        http://www.phalapi.net/
 * @author      dogstar <chanzonghuang@gmail.com> 2017-11-22
 */

class ApiOnline {

    protected $projectName;

    public function __construct($projectName) {
        $this->projectName = $projectName;
    }

    /**
     * @param string $tplPath 模板绝对路径
     */
    public function render($tplPath = NULL) {
        header('Content-Type:text/html;charset=utf-8');
    }
}
