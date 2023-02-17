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

use app\admin\model\RouteModel;
use cmf\controller\AdminBaseController;

use think\Db;

/**
 * Class SettingController
 * @package app\admin\controller
 * @adminMenuRoot(
 *     'name'   =>'设置',
 *     'action' =>'default',
 *     'parent' =>'',
 *     'display'=> true,
 *     'order'  => 0,
 *     'icon'   =>'cogs',
 *     'remark' =>'系统设置入口'
 * )
 */
class SettingController extends AdminBaseController
{

    /**
     * 网站信息
     * @adminMenu(
     *     'name'   => '网站信息',
     *     'parent' => 'default',
     *     'display'=> true,
     *     'hasView'=> true,
     *     'order'  => 0,
     *     'icon'   => '',
     *     'remark' => '网站信息',
     *     'param'  => ''
     * )
     */
    public function site()
    {
        $content = hook_one('admin_setting_site_view');

        if (!empty($content)) {
            return $content;
        }

        $noNeedDirs     = [".", "..", ".svn", 'fonts'];
        $adminThemesDir = WEB_ROOT . config('template.cmf_admin_theme_path') . config('template.cmf_admin_default_theme') . '/public/assets/themes/';
        $adminStyles    = cmf_scan_dir($adminThemesDir . '*', GLOB_ONLYDIR);
        $adminStyles    = array_diff($adminStyles, $noNeedDirs);
        $cdnSettings    = cmf_get_option('cdn_settings');
        $cmfSettings    = cmf_get_option('cmf_settings');
        $adminSettings  = cmf_get_option('admin_settings');

        $adminThemes = [];
        $themes      = cmf_scan_dir(WEB_ROOT . config('template.cmf_admin_theme_path') . '/*', GLOB_ONLYDIR);

        foreach ($themes as $theme) {
            if (strpos($theme, 'admin_') === 0) {
                array_push($adminThemes, $theme);
            }
        }

        if (APP_DEBUG && false) { // TODO 没确定要不要可以设置默认应用
            $apps = cmf_scan_dir(APP_PATH . '*', GLOB_ONLYDIR);
            $apps = array_diff($apps, $noNeedDirs);
            $this->assign('apps', $apps);
        }

        $this->assign('site_info', cmf_get_option('site_info'));
        $this->assign("admin_styles", $adminStyles);
        $this->assign("templates", []);
        $this->assign("admin_themes", $adminThemes);
        $this->assign("cdn_settings", $cdnSettings);
        $this->assign("admin_settings", $adminSettings);
        $this->assign("cmf_settings", $cmfSettings);

        return $this->fetch();
    }

    /**
     * 网站信息设置提交
     * @adminMenu(
     *     'name'   => '网站信息设置提交',
     *     'parent' => 'site',
     *     'display'=> false,
     *     'hasView'=> false,
     *     'order'  => 10000,
     *     'icon'   => '',
     *     'remark' => '网站信息设置提交',
     *     'param'  => ''
     * )
     */
    public function sitePost()
    {
        if ($this->request->isPost()) {
            $result = $this->validate($this->request->param(), 'SettingSite');
            if ($result !== true) {
                $this->error($result);
            }

            $options = $this->request->param('options/a');
			
            cmf_set_option('site_info', $options);
			
			$this->resetcache('getConfigPub',$options);

            $cmfSettings = $this->request->param('cmf_settings/a');

            $bannedUsernames                 = preg_replace("/[^0-9A-Za-z_\\x{4e00}-\\x{9fa5}-]/u", ",", $cmfSettings['banned_usernames']);
            $cmfSettings['banned_usernames'] = $bannedUsernames;
            cmf_set_option('cmf_settings', $cmfSettings);

            $cdnSettings = $this->request->param('cdn_settings/a');
            cmf_set_option('cdn_settings', $cdnSettings);

            $adminSettings = $this->request->param('admin_settings/a');

            $routeModel = new RouteModel();
            if (!empty($adminSettings['admin_password'])) {
                $routeModel->setRoute($adminSettings['admin_password'] . '$', 'admin/Index/index', [], 2, 5000);
            } else {
                $routeModel->deleteRoute('admin/Index/index', []);
            }

            $routeModel->getRoutes(true);

            if (!empty($adminSettings['admin_theme'])) {
                $result = cmf_set_dynamic_config([
                    'template' => [
                        'cmf_admin_default_theme' => $adminSettings['admin_theme']
                    ]
                ]);

                if ($result === false) {
                    $this->error('配置写入失败!');
                }
            }

            cmf_set_option('admin_settings', $adminSettings);

            $this->success("保存成功！", '');

        }
    }

    /**
     * 密码修改
     * @adminMenu(
     *     'name'   => '密码修改',
     *     'parent' => 'default',
     *     'display'=> false,
     *     'hasView'=> true,
     *     'order'  => 10000,
     *     'icon'   => '',
     *     'remark' => '密码修改',
     *     'param'  => ''
     * )
     */
    public function password()
    {
        return $this->fetch();
    }

    /**
     * 密码修改提交
     * @adminMenu(
     *     'name'   => '密码修改提交',
     *     'parent' => 'password',
     *     'display'=> false,
     *     'hasView'=> false,
     *     'order'  => 10000,
     *     'icon'   => '',
     *     'remark' => '密码修改提交',
     *     'param'  => ''
     * )
     */
    public function passwordPost()
    {
        if ($this->request->isPost()) {

            $data = $this->request->param();
            if (empty($data['old_password'])) {
                $this->error("原始密码不能为空！");
            }
            if (empty($data['password'])) {
                $this->error("新密码不能为空！");
            }

            $userId = cmf_get_current_admin_id();

            $admin = Db::name('user')->where("id", $userId)->find();

            $oldPassword = $data['old_password'];
            $password    = $data['password'];
            $rePassword  = $data['re_password'];

            if (cmf_compare_password($oldPassword, $admin['user_pass'])) {
                if ($password == $rePassword) {

                    if (cmf_compare_password($password, $admin['user_pass'])) {
                        $this->error("新密码不能和原始密码相同！");
                    } else {
                        Db::name('user')->where('id', $userId)->update(['user_pass' => cmf_password($password)]);
                        $this->success("密码修改成功！");
                    }
                } else {
                    $this->error("密码输入不一致！");
                }

            } else {
                $this->error("原始密码不正确！");
            }
        }
    }

    /**
     * 上传限制设置界面
     * @adminMenu(
     *     'name'   => '上传设置',
     *     'parent' => 'default',
     *     'display'=> true,
     *     'hasView'=> true,
     *     'order'  => 10000,
     *     'icon'   => '',
     *     'remark' => '上传设置',
     *     'param'  => ''
     * )
     */
    public function upload()
    {
        $uploadSetting = cmf_get_upload_setting();
        $this->assign('upload_setting', $uploadSetting);
        return $this->fetch();
    }

    /**
     * 上传限制设置界面提交
     * @adminMenu(
     *     'name'   => '上传设置提交',
     *     'parent' => 'upload',
     *     'display'=> false,
     *     'hasView'=> false,
     *     'order'  => 10000,
     *     'icon'   => '',
     *     'remark' => '上传设置提交',
     *     'param'  => ''
     * )
     */
    public function uploadPost()
    {
        if ($this->request->isPost()) {
            //TODO 非空验证
            $uploadSetting = $this->request->post();

            cmf_set_option('upload_setting', $uploadSetting);
            $this->success('保存成功！');
        }

    }

    /**
     * 清除缓存
     * @adminMenu(
     *     'name'   => '清除缓存',
     *     'parent' => 'default',
     *     'display'=> false,
     *     'hasView'=> true,
     *     'order'  => 10000,
     *     'icon'   => '',
     *     'remark' => '清除缓存',
     *     'param'  => ''
     * )
     */
    public function clearCache()
    {
        $content = hook_one('admin_setting_clear_cache_view');

        if (!empty($content)) {
            return $content;
        }

        cmf_clear_cache();
        return $this->fetch();
    }
	
    /**
     * 私密设置
     */
    public function configpri()
    {

        $this->assign('config', cmf_get_option('configpri'));

        return $this->fetch();
    }

    /**
     * 私密设置提交
     */
    public function configpriPost()
    {
        if ($this->request->isPost()) {
            
            $options = $this->request->param('options/a');
            
            
            $login_type=isset($_POST['login_type']) ? $_POST['login_type'] : '';
            $share_type=isset($_POST['share_type']) ? $_POST['share_type'] : '';
            
            $options['login_type']='';
            $options['share_type']='';
            
            if($login_type){
                $options['login_type']=implode(',',$login_type);
            }
            
            if($share_type){
                $options['share_type']=implode(',',$share_type);
            }

            cmf_set_option('configpri', $options);
            $this->resetcache('getConfigPri',$options);
            
            $this->success("保存成功！", '');

        }
    }

    protected function resetcache($key='',$info=[]){
        if($key!=''){
            setcaches($key,$info);
        }
    }


}