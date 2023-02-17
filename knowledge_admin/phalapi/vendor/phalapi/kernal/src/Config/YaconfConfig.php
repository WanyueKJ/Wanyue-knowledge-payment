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

namespace PhalApi\Config;

use PhalApi\Config;

/**
 * YaconfConfig Yaconf扩展配置类
 *
 * - 通过Yaconf扩展快速获取配置
 *
 * 使用示例：
```
 * <code>
 * $config = new YaconfConfig();
 *
 * var_dump($config->get('foo')); //相当于var_dump(Yaconf::get("foo"));
 *
 * var_dump($config->has('foo')); //相当于var_dump(Yaconf::has("foo"));
 * </code>
```
 *
 * @package     PhalApi\Config
 * @see         \PhalApi\Config::get()
 * @license     http://www.phalapi.net/license GPL 协议
 * @link        http://www.phalapi.net/
 * @link        https://github.com/laruence/yaconf
 * @author      dogstar <chanzonghuang@gmail.com> 2014-10-02
 */

class YaconfConfig implements Config {

    public function get($key, $default = NULL) {
        return \Yaconf::get($key, $default);
    }

    public function has($key) {
        return \Yaconf::has($key);
    }
}
