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
namespace PhalApi\Qiniu;

/**
 * 七牛接口调用
 * 1、图片文件上传
 *
 * 参考：http://developer.qiniu.com/docs/v6/sdk/php-sdk.html
 *
 * @author: dogstar 2015-03-17
 */

class Lite {

    protected $config;

    protected $client;

    protected $preffix;

    /**
     * @param string $config['accessKey']  统一的key
     * @param string $config['secretKey']
     * @param string $config['space_bucket']  自定义配置的空间
     * @param string $config['space_host']  
     */
    public function __construct($config = NULL) {
        $this->config = $config;

        if ($this->config === NULL) {
            $this->config = \PhalApi\DI()->config->get('app.Qiniu');
        }

        // 动态追回更多配置
        $cfg = array(
            'access_key' => $this->config['access_key'],
            'secret_key' => $this->config['secret_key'],
            'bucket'     => $this->config['space_bucket'],
        );
        $cfg = array_merge($cfg, $this->config);
        $this->client = \Qiniu\Qiniu::create($cfg);

        if (!empty($config['preffix'])) {
            $this->preffix = $config['preffix'];
        }
    }

    public function getClient() {
        return $this->client;
    }

    /**
     * 文件上传
     * @param string $filePath 待上传文件的绝对路径
     * @return string 上传成功后的URL，失败时返回空
     */
    public function uploadFile($filePath, $fileExt = '', &$errMsg = '')
    {
        $fileUrl = '';

        if (!file_exists($filePath)) {
            return $fileUrl;
        }

        $fileExt = !empty($fileExt) ? '.' . ltrim($fileExt, '.') : ''; // 支持扩展名

        $fileName = $this->preffix
            . date('YmdHis_', $_SERVER['REQUEST_TIME'])
            . md5(\PhalApi\Tool::createRandStr(8) . microtime(true)) . $fileExt;

        $res = $this->client->uploadFile($filePath, $fileName);

        if (!is_object($res) || empty($res->data) || empty($res->data['url'])) {
	    $errMsg = $res->error;
            \PhalApi\DI()->logger->debug('failed to upload file to qiniu', $res->error);
        } else {
            $fileUrl = empty($this->config['space_host'])
                ? $res->data['url'] : rtrim($this->config['space_host'], '/') . '/' . $fileName;
            \PhalApi\DI()->logger->debug('succeed to upload file to qiniu', $res->data);
        }

        return $fileUrl;
    }
	
    public function delete($key) {
        $res = $this->client->delete($key);
        return $res;
    }
    
    /**
     * 获取七牛Token
     */
    public function getToken()
    {
        
        $mac = new \Qiniu\Mac($this->config['access_key'], $this->config['secret_key']);
        
        $policy = array(
                'scope'        => $this->config['space_bucket'],
                'deadline'     => time() + 3600
        );

        $token = $mac->signWithData(json_encode($policy));

        return $token;
    }
}
