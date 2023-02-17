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


/* 课程分类 */
namespace app\admin\controller;

use cmf\controller\AdminBaseController;
use think\Db;

class CourseclassController extends AdminBaseController
{

    public function index()
    {
        
        $list = Db::name('course_class')->order("list_order asc")->paginate(20);
        
		$list->each(function($v,$k){
            $v['thumb']=get_upload_path($v['thumb']);
            return $v;
        });
		
        $page = $list->render();
        $this->assign("page", $page);
            
        $this->assign('list', $list);

        return $this->fetch();
    }


    public function add()
    {
        return $this->fetch();
    }

    public function addPost()
    {
        if ($this->request->isPost()) {
            $data      = $this->request->param();
            
            $name=$data['name'];
            
            if($name == ''){
                $this->error('请填写名称');
            }
            
            $map[]=['name','=',$name];
            $isexist = DB::name('course_class')->where($map)->find();
            if($isexist){
                $this->error('同名分类已存在');
            }
			
			$thumb=$data['thumb'];
            if($thumb==''){
                $this->error('请上传图标');
            }

            $id = DB::name('course_class')->insertGetId($data);
            if(!$id){
                $this->error("添加失败！");
            }
            $this->resetcache();
            $this->success("添加成功！");
        }
    }

    public function edit()
    {
        $id   = $this->request->param('id', 0, 'intval');
        
        $data=Db::name('course_class')
        //    ->where("id={$id}")
            ->where('id',$id)
            ->find();
        if(!$data){
            $this->error("信息错误");
        }
        
        $this->assign('data', $data);
        return $this->fetch();
    }

    public function editPost()
    {
        if ($this->request->isPost()) {
            $data      = $this->request->param();

            $id=$data['id'];
            $name=$data['name'];
            
            if($name == ''){
                $this->error('请填写名称');
            }
            
            $map[]=['name','=',$name];
            $map[]=['id','<>',$id];
            $isexist = DB::name('course_class')->where($map)->find();
            if($isexist){
                $this->error('同名分类已存在');
            }
			
			$thumb=$data['thumb'];
            if($thumb==''){
                $this->error('请上传图标');
            }

            $rs = DB::name('course_class')->update($data);

            if($rs === false){
                $this->error("保存失败！");
            }
            $this->resetcache();
            $this->success("保存成功！");
        }
    }
    
    public function listOrder()
    {
        $model = DB::name('course_class');
        parent::listOrders($model);
        $this->resetcache();
        $this->success("排序更新成功！");
    }

    public function del()
    {
        $id = $this->request->param('id', 0, 'intval');
        
        $isok=DB::name('course')->where("classid",$id)->find();
        if($isok){
            $this->error("该分类下已有课程，不能删除");
        }
        
        $rs = DB::name('course_class')->where('id',$id)->delete();
        if(!$rs){
            $this->error("删除失败！");
        }
        $this->resetcache();
        $this->success("删除成功！");
    }


    protected function resetcache(){
        $key='getcourseclass';

        $list=DB::name('course_class')
                ->order("list_order asc")
                ->select();
        if($list){
            setcaches($key,$list);
        }else{
			delcache($key);
		}
    }
}