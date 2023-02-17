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

use app\admin\model\RecycleBinModel;
use app\admin\model\RouteModel;
use cmf\controller\AdminBaseController;
use think\Db;

class RecycleBinController extends AdminBaseController
{
    /**
     * 回收站
     * @adminMenu(
     *     'name'   => '回收站',
     *     'parent' => '',
     *     'display'=> false,
     *     'hasView'=> true,
     *     'order'  => 10000,
     *     'icon'   => '',
     *     'remark' => '回收站',
     *     'param'  => ''
     * )
     */
    public function index()
    {
        $content = hook_one('admin_recycle_bin_index_view');

        if (!empty($content)) {
            return $content;
        }

        $recycleBinModel = new RecycleBinModel();
        $list            = $recycleBinModel->order('create_time desc')->paginate(10);
        // 获取分页显示
        $page = $list->render();
        $this->assign('page', $page);
        $this->assign('list', $list);
        return $this->fetch();
    }

    /**
     * 回收站还原
     * @adminMenu(
     *     'name'   => '回收站还原',
     *     'parent' => 'index',
     *     'display'=> false,
     *     'hasView'=> false,
     *     'order'  => 10000,
     *     'icon'   => '',
     *     'remark' => '回收站还原',
     *     'param'  => ''
     * )
     */
    public function restore()
    {

        $id     = $this->request->param('id', 0, 'intval');
        $result = Db::name('recycleBin')->where('id', $id)->find();

        $tableName = explode('#', $result['table_name']);
        $tableName = $tableName[0];
        //还原资源
        if ($result) {
            $res = Db::name($tableName)
                ->where('id', $result['object_id'])
                ->update(['delete_time' => '0']);
            if ($tableName == 'portal_post') {
                Db::name('portal_category_post')->where('post_id', $result['object_id'])->update(['status' => 1]);
                Db::name('portal_tag_post')->where('post_id', $result['object_id'])->update(['status' => 1]);
            }

            if ($res) {
                $re = Db::name('recycleBin')->where('id', $id)->delete();
                if ($re) {
                    $this->success("还原成功！");
                }
            }
        }
    }

    /**
     * 回收站彻底删除
     * @adminMenu(
     *     'name'   => '回收站彻底删除',
     *     'parent' => 'index',
     *     'display'=> false,
     *     'hasView'=> false,
     *     'order'  => 10000,
     *     'icon'   => '',
     *     'remark' => '回收站彻底删除',
     *     'param'  => ''
     * )
     */
    public function delete()
    {
        $id     = $this->request->param('id');
        $result = Db::name('recycleBin')->where('id', $id)->find();
        //删除资源
        if ($result) {

            //页面没有单独的表.
            if ($result['table_name'] === 'portal_post#page') {
                $re = Db::name('portal_post')->where('id', $result['object_id'])->delete();
                //消除路由
                $routeModel = new RouteModel();
                $routeModel->setRoute('', 'portal/Page/index', ['id' => $result['object_id']], 2, 5000);
                $routeModel->getRoutes(true);
            } else {
                $re = Db::name($result['table_name'])->where('id', $result['object_id'])->delete();
            }

            if ($re) {
                $res = Db::name('recycleBin')->where('id', $id)->delete();
                if ($result['table_name'] === 'portal_post') {
                    Db::name('portal_category_post')->where('post_id', $result['object_id'])->delete();
                    Db::name('portal_tag_post')->where('post_id', $result['object_id'])->delete();
                }
                if ($res) {
                    $this->success("删除成功！");
                }

            }
        }
    }
}