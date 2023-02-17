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

use PhalApi\ApiFactory;
use PhalApi\Exception;

/**
 * PhalApi 应用类
 *
 * - 实现远程服务的响应、调用等操作
 * 
 * <br>使用示例：<br>
```
 * $api = new PhalApi();
 * $rs = $api->response();
 * $rs->output();
```
 *
 * @package     PhalApi\Response
 * @license     http://www.phalapi.net/license GPL 协议
 * @link        http://www.phalapi.net/
 * @author      dogstar <chanzonghuang@gmail.com> 2014-12-17
 */

class PhalApi {
    
    /**
     * 响应操作
     *
     * 通过工厂方法创建合适的控制器，然后调用指定的方法，最后返回格式化的数据。
     *
     * @return mixed 根据配置的或者手动设置的返回格式，将结果返回
     *  其结果包含以下元素：
```
     *  array(
     *      'ret'   => 200,	            //服务器响应状态
     *      'data'  => array(),	        //正常并成功响应后，返回给客户端的数据	
     *      'msg'   => '',		        //错误提示信息
     *  );
```
     */
    public function response() {
        $di = DI();

        // 开始响应接口请求
        $di->tracer->mark('PHALAPI_RESPONSE');

        $rs = $di->response;
        try {
            // 接口调度与响应
            $api    = ApiFactory::generateService(); 
            $action = $di->request->getServiceAction();
            $data   = call_user_func(array($api, $action));

            $rs->setData($data);
        } catch (Exception $ex) {
            // 框架或项目可控的异常
            $rs->setRet($ex->getCode());
            $rs->setMsg($ex->getMessage());
        } catch (\Exception $ex) {
            // 不可控的异常
            $di->logger->error(DI()->request->getService(), strval($ex));

            if ($di->debug) {
                $rs->setRet($ex->getCode());
                $rs->setMsg($ex->getMessage());
                $rs->setDebug('exception', $ex->getTrace());
            } else {
                throw $ex;
            }
        }

        // 结束接口调度
        $di->tracer->mark('PHALAPI_FINISH');

        $rs->setDebug('stack', $di->tracer->getStack());
        $rs->setDebug('sqls', $di->tracer->getSqls());
        $rs->setDebug('version', PHALAPI_VERSION);

        return $rs;
    }
    
}
