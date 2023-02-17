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
 * Config 配置接口
 *
 * 获取系统所需要的参数配置
 * 
 * <br>使用示例：<br>
```
 * //假设有这样的app.php配置：
 * return array(
 *  'version' => '1.1.1',
 * 
 *  'email' => array(
 *      'address' => 'chanzonghuang@gmail.com',
 *   );
 * );
 *
 * //我们就可以分别这样根据需要获取配置：
 * //app.php里面的全部配置
 * DI()->config->get('app');
 * 
 * //app.php里面的单个配置
 * DI()->config->get('app.version');  //返回：1.1.1
 * 
 * //app.php里面的多级配置
 * DI()->config->get('app.version.address');  //返回：chanzonghuang@gmail.com
```
 *
 * @package PhalApi\Config
 * @license http://www.phalapi.net/license GPL 协议
 * @link http://www.phalapi.net/
 * @author dogstar <chanzonghuang@gmail.com> 2014-10-02
 */

interface Config {

	/**
     * 获取配置
     * 
     * @param $key string 配置键值
     * @param mixed $default 缺省值
     * @return mixed 需要获取的配置值，不存在时统一返回$default
     */
	public function get($key, $default = NULL);
}
