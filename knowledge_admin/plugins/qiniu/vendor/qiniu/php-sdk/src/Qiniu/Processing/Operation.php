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


namespace Qiniu\Processing;

use Qiniu\Http\Client;
use Qiniu\Http\Error;

final class Operation
{

    private $auth;
    private $token_expire;
    private $domain;

    public function __construct($domain, $auth = null, $token_expire = 3600)
    {
        $this->auth = $auth;
        $this->domain = $domain;
        $this->token_expire = $token_expire;
    }


    /**
     * 对资源文件进行处理
     *
     * @param $key   待处理的资源文件名
     * @param $fops   string|array  fop操作，多次fop操作以array的形式传入。
     *                eg. imageView2/1/w/200/h/200, imageMogr2/thumbnail/!75px
     *
     * @return array 文件处理后的结果及错误。
     *
     * @link http://developer.qiniu.com/docs/v6/api/reference/fop/
     */
    public function execute($key, $fops)
    {
        $url = $this->buildUrl($key, $fops);
        $resp = Client::get($url);
        if (!$resp->ok()) {
            return array(null, new Error($url, $resp));
        }
        if ($resp->json() !== null) {
            return array($resp->json(), null);
        }
        return array($resp->body, null);
    }

    public function buildUrl($key, $fops, $protocol = 'http')
    {
        if (is_array($fops)) {
            $fops = implode('|', $fops);
        }

        $url = $protocol . "://$this->domain/$key?$fops";
        if ($this->auth !== null) {
            $url = $this->auth->privateDownloadUrl($url, $this->token_expire);
        }

        return $url;
    }
}
