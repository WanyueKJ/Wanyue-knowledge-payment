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

use PhalApi\Helper\ApiOnline;
use PhalApi\ApiFactory;
use PhalApi\Exception;

/**
 * ApiDesc - 在线接口描述查看 - 辅助类
 *
 * @package     PhalApi\Helper
 * @license     http://www.phalapi.net/license GPL 协议
 * @link        http://www.phalapi.net/
 * @author      dogstar <chanzonghuang@gmail.com> 2015-05-30
 */

class ApiDesc extends ApiOnline {

    public function render($tplPath = NULL) {
        parent::render($tplPath);

        $service    = \PhalApi\DI()->request->getService();
        $namespace  = \PhalApi\DI()->request->getNamespace();
        $api        = \PhalApi\DI()->request->getServiceApi();
        $action     = \PhalApi\DI()->request->getServiceAction();

        $namespace  = str_replace('_', '\\', $namespace); // 支持多级命名空间，扩展类库接口需要用到 @dogstar 20200114
        $className  = '\\' . $namespace . '\\Api\\' . str_replace('_', '\\', ucfirst($api));

        $rules = array();
        $returns = array();
        $description = '';
        $descComment = '//请使用@desc 注释';
        $exceptions = array();

        $projectName = $this->projectName;

        try {
            $pai = ApiFactory::generateService(FALSE);
            $rules = $pai->getApiRules();
        } catch (Exception $ex){
            $service .= ' - ' . $ex->getMessage();
            include dirname(__FILE__) . '/api_desc_tpl.php';
            return;
        }


        // 整合需要的类注释，包括父类注释
        $rClass = new \ReflectionClass($className);
        $classDocComment = $rClass->getDocComment();
        while ($parent = $rClass->getParentClass()) {
            if ($parent->getName() == '\\PhalApi\\Api') {
                break;
            }
            $classDocComment = $parent->getDocComment() . "\n" . $classDocComment;
            $rClass = $parent;
        }
        $needClassDocComment = '';
        foreach (explode("\n", $classDocComment) as $comment) {
            if (stripos($comment, '@exception') !== FALSE 
                || stripos($comment, '@return') !== FALSE) {
                $needClassDocComment .=  "\n" . $comment;
            }
        }

        // 方法注释
        $rMethod = new \ReflectionMethod($className, $action);
        $docCommentArr = explode("\n", $needClassDocComment . "\n" . $rMethod->getDocComment());

        foreach ($docCommentArr as $comment) {
            $comment = trim($comment);

            //标题描述
            if (empty($description) && strpos($comment, '@') === FALSE && strpos($comment, '/') === FALSE) {
                $description = substr($comment, strpos($comment, '*') + 1);
                continue;
            }

            //@desc注释
            $pos = stripos($comment, '@desc');
            if ($pos !== FALSE) {
                $descComment = substr($comment, $pos + 5);
                continue;
            }

            //@exception注释
            $pos = stripos($comment, '@exception');
            if ($pos !== FALSE) {
                $exArr = explode(' ', trim(substr($comment, $pos + 10)));
                $exceptions[$exArr[0]] = $exArr;
                continue;
            }

            //@return注释
            $pos = stripos($comment, '@return');
            if ($pos === FALSE) {
                continue;
            }

            $returnCommentArr = explode(' ', substr($comment, $pos + 8));
            //将数组中的空值过滤掉，同时将需要展示的值返回
            $returnCommentArr = array_values(array_filter($returnCommentArr));
            if (count($returnCommentArr) < 2) {
                continue;
            }
            if (!isset($returnCommentArr[2])) {
                $returnCommentArr[2] = '';	//可选的字段说明
            } else {
                //兼容处理有空格的注释
                $returnCommentArr[2] = implode(' ', array_slice($returnCommentArr, 2));
            }

            //以返回字段为key，保证覆盖
            $returns[$returnCommentArr[1]] = $returnCommentArr; 
        }

        $tplPath = !empty($tplPath) ? $tplPath : dirname(__FILE__) . '/api_desc_tpl.php';
        include $tplPath;
    }
}
