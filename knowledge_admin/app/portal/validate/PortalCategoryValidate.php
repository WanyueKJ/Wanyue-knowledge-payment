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

namespace app\portal\validate;

use app\admin\model\RouteModel;
use think\Validate;

class PortalCategoryValidate extends Validate
{
    protected $rule = [
        'name'  => 'require',
        'alias' => 'checkAlias',
    ];
    protected $message = [
        'name.require' => '分类名称不能为空',
    ];

    protected $scene = [
//        'add'  => ['user_login,user_pass,user_email'],
//        'edit' => ['user_login,user_email'],
    ];

    // 自定义验证规则
    protected function checkAlias($value, $rule, $data)
    {
        if (empty($value)) {
            return true;
        }

        if (preg_match("/^\d+$/", $value)) {
            return "别名不能为纯数字!";
        }

        $routeModel = new RouteModel();
        if (isset($data['id']) && $data['id'] > 0) {
            $fullUrl = $routeModel->buildFullUrl('portal/List/index', ['id' => $data['id']]);
        } else {
            $fullUrl = $routeModel->getFullUrlByUrl($data['alias']);
        }
        if (!$routeModel->existsRoute($value, $fullUrl)) {
            return true;
        } else {
            return "别名已经存在!";
        }

    }
}