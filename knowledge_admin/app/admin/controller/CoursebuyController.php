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

use app\admin\model\CourseModel;
use cmf\controller\AdminBaseController;
use think\Db;

/**
 * 课程购买记录
 * @package app\admin\controller
 */
class CoursebuyController extends AdminBaseController
{

    public function index()
    {
        $data = $this->request->param();
        $map  = [];

        $map[] = ['status', '=', 1];

        $courseid = $data['courseid'] ?? '0';
        $map[]    = ['courseid', '=', $courseid];


        $courseinfo = CourseModel::where(['id' => $courseid])->find();
        $this->assign('courseinfo', $courseinfo);

        $start_time = $data['start_time'] ?? '';
        $end_time   = $data['end_time'] ?? '';

        if ($start_time != "") {
            $map[] = ['paytime', '>=', strtotime($start_time)];
        }

        if ($end_time != "") {
            $map[] = ['paytime', '<=', strtotime($end_time) + 60 * 60 * 24];
        }

        $uid = $data['uid'] ?? '';
        if ($uid != '') {
            $map[] = ['uid', '=', $uid];
        }

        $nums  = Db::name('course_users')->where($map)->count();
        $total = Db::name('course_users')->where($map)->sum('money');
        if (!$total) {
            $total = 0;
        }

        $list = Db::name('course_users')->where($map)->order("id desc")->paginate(20);

        $list->each(function ($v, $k) {
            $v['userinfo'] = getUserInfo($v['uid']);
            $v['paytime']  = date('Y-m-d H:i:s', $v['paytime']);
            return $v;
        });

        $page = $list->render();

        $this->assign([
            'page'  => $page,
            'list'  => $list,
            'nums'  => $nums,
            'total' => $total
        ]);

        return $this->fetch();
    }

}