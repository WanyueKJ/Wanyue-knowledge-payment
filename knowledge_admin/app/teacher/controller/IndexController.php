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

namespace app\teacher\controller;

use app\admin\model\CourseModel;
use cmf\controller\TeacherBaseController;
use think\Db;
/**
 * 首页
 */
class IndexController extends TeacherBaseController {
    
	public function index() {
        $cur='index';
        $this->assign('cur',$cur);
        
        $uid=session('teacher.id');
        if (!$uid) {
            $uid = $_SESSION['teacher']['id'] ?? 0;
        }
        
        $live_nums=CourseModel::where([['uid|tutoruid','=',$uid],['sort','>=',2]])->count();
        
        $this->assign('live_nums',$live_nums);
        
        $list=Db::name('portal_category_post c')
                ->leftJoin('portal_post p','c.post_id=p.id')
                ->field('p.id,p.post_title')
                ->where([['c.status','=',1],['c.category_id','=',1],['p.post_status','=',1]])
                ->order('id desc')
                ->limit(0,10)
                ->select();
                
        $this->assign('list',$list);
        
        return $this->fetch();
    }
}


