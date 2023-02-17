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

/**
 * Created by PhpStorm.
 * User: niebangheng
 * Date: 2019/1/26
 * Time: 14:53
 */

namespace PhalApi\Helper;


class ApiStaticCreate extends ApiList
{

    protected $webRoot = '';
    protected $theme = '';
    protected $detailTplPath = NULL;

    public function __construct($projectName, $theme = 'fold', $detailTplPath = NULL) {
        parent::__construct($projectName);
        $this->theme = $theme;
        if (!empty($detailTplPath)) {
            $this->detailTplPath = $detailTplPath;
        }
    }


    public function render($tplPath = NULL) {
        $theme = $this->theme;
        $trace = debug_backtrace();
        $listFilePath = $trace[0]['file'];
        $this->webRoot = substr($listFilePath, 0, strrpos($listFilePath, D_S));
        ob_start();
        // 运行模式
        parent::render($tplPath);
        $string = ob_get_clean();
        \PhalApi\Helper\saveHtml($this->webRoot, 'index', $string);
        $str = "
脚本执行完毕！离线文档保存路径为：
";
        $str .= $this->webRoot;
        echo $str . D_S . 'docs', PHP_EOL, PHP_EOL;

    }

    public function makeApiServiceLink($service, $theme = '') {
        ob_start();
        // 换一种更优雅的方式
        \PhalApi\DI()->request = new \PhalApi\Request(array('service' => $service));
        $apiDesc = new \PhalApi\Helper\ApiDesc($this->projectName);
        $apiDesc->render($this->detailTplPath);

        $string = ob_get_clean();
        \PhalApi\Helper\saveHtml($this->webRoot, $service, $string);
        $link = $service . '.html';
        return $link;
    }

    public function getUri() {
        return '';
    }

    public function makeThemeButton($theme) {
        return '';
    }
}
