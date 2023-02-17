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

namespace PhalApi;

/**
 * Filter 拦截器接口
 *  
 * 为应用实现接口请求拦截提供统一处理接口
 * 
 * <br>实现和使用示例：</br>
```
 * 	class MyFilter implements Filter {
 * 
 * 		public function check() {
 * 			//TODO
 * 		}
 * 	}
 *
 * //$ vim ./Public/init.php
 * //注册签名验证服务 
 * DI()->filter = 'MyFilter';
```
 *
 * @package     PhalApi\Filter
 * @license     http://www.phalapi.net/license GPL 协议
 * @link        http://www.phalapi.net/
 * @author      dogstar <chanzonghuang@gmail.com> 2014-10-25
 */

interface Filter {

    public function check();
}
