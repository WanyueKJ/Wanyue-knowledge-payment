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

namespace app\admin\controller;

use cmf\controller\AdminBaseController;
use think\Db;
use app\admin\model\AdminMenuModel;

/*
 * 后台首页
 * Class IndexController
 * @package app\admin\controller
 */
class IndexController extends AdminBaseController
{

    public function initialize()
    {
        $adminSettings = cmf_get_option('admin_settings');
        if (empty($adminSettings['admin_password']) || $this->request->path() == $adminSettings['admin_password']) {
            $adminId = cmf_get_current_admin_id();
            if (empty($adminId)) {
                session("__LOGIN_BY_CMF_ADMIN_PW__", 1);//设置后台登录加密码
            }
        }

        parent::initialize();
    }

    /**
     * 后台首页
     */
    public function index()
    {
        $content = hook_one('admin_index_index_view');

        if (!empty($content)) {
            return $content;
        }

        $adminMenuModel = new AdminMenuModel();
        $menus          = cache('admin_menus_' . cmf_get_current_admin_id(), '', null, 'admin_menus');

        if (empty($menus)) {
            $menus = $adminMenuModel->menuTree();
            cache('admin_menus_' . cmf_get_current_admin_id(), $menus, null, 'admin_menus');
        }

        $result = Db::name('AdminMenu')->order(["app" => "ASC", "controller" => "ASC", "action" => "ASC"])->select();
        $menusTmp = array();
        foreach ($result as $item){
            //去掉/ _ 全部小写。作为索引。
            $indexTmp = $item['app'].$item['controller'].$item['action'];
            $indexTmp = preg_replace("/[\\/|_]/","",$indexTmp);
            $indexTmp = strtolower($indexTmp);
            $menusTmp[$indexTmp] = $item;
        }

        $this->assign("menus", $menus);
        $this->assign("menus_js_var",json_encode($menusTmp));

        return $this->fetch();
    }
}
