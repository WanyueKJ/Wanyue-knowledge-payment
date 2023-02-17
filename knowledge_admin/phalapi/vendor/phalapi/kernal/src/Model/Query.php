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

namespace PhalApi\Model;

/**
 * Query 查询对象(值对象)
 *
 * - 我们强烈建议应将此继承类的实例当作值对象处理，虽然我们提供了便利的结构化获取
 * - 如需要拷贝值对象，可以结合使用构造函数和toArray()
 * 
 * @package     PhalApi\Model
 * @license     http://www.phalapi.net/license GPL 协议
 * @link        http://www.phalapi.net/
 * @author      dogstar <chanzonghuang@gmail.com> 2015-02-22
 */

class Query {

    /**
     * @var boolean $readCache 是否读取缓存
     */
    public $readCache = true;

    /**
     * @var boolean $writeCache 是否写入缓存
     */
    public $writeCache = true;

    /**
     * @var string/int ID
     */
    public $id;

    /**
     * @var int $timestamp 时间戳
     */
    public $timestamp;

    public function __construct($queryArr = array()) {
        $this->timestamp = $_SERVER['REQUEST_TIME'];

        if (\PhalApi\DI()->debug) {
            $this->readCache = FALSE;
            $this->writeCache = FALSE;
        }

        foreach ($queryArr as $key => $value) {
            $this->$key = $value;
        }
    }

    public function __set($name, $value) {
        $this->$name = $value;
    }

    public function __get($name) {
        if (isset($this->$name)) {
            return $this->$name;
        }

        return NULL;
    }

    public function toArray() {
        return get_object_vars($this);
    }
}
