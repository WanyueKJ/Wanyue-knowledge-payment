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
 * 推送管理
 */
namespace app\admin\controller;

use cmf\controller\AdminBaseController;
use think\Db;


class PushController extends AdminbaseController {

    /*
     * 推送列表
     * @return mixed
     */
    function index(){
        $data = $this->request->param();
        $map=[];
        $map[]=['type','=','0'];
		
        $start_time=isset($data['start_time']) ? $data['start_time']: '';
        $end_time=isset($data['end_time']) ? $data['end_time']: '';
        
        if($start_time!=""){
           $map[]=['addtime','>=',strtotime($start_time)];
        }

        if($end_time!=""){
           $map[]=['addtime','<=',strtotime($end_time) + 60*60*24];
        }
        
        $keyword=isset($data['keyword']) ? $data['keyword']: '';
        if($keyword!=''){
            $map[]=['touid|adminid','like',"%".$keyword."%"];
        }
        
    	$lists = DB::name("message")
            ->where($map)
            ->order('id desc')
            ->paginate(20, false, ['query' => input()]);
        
        $lists->each(function($v,$k){
            if($v['ip']>0){
                $v['ip']=long2ip($v['ip']);
            }else{
                $v['ip']='';
            }
            
            return $v;
        });
        
        $lists->appends($data);
        $page = $lists->render();
        
        $this->assign('lists', $lists);
    	$this->assign("page", $page);
    	
    	return $this->fetch();
    }


    /*
     * 删除
     */
    function del(){
        $id = $this->request->param('id', 0, 'intval');
        if($id){
            $result=DB::name("message")->delete($id);				
            if($result){
                
                $this->success('删除成功');
             }else{
                $this->error('删除失败');
             }
        }else{				
            $this->error('数据传入失败！');
        }				
    }

    /*
     * 推送添加
     * @return mixed
     */
	function add(){
        return $this->fetch();			
	}

    /*
     * 推送添加提交
     */
	function addPost(){
        if ($this->request->isPost()) {
            
            $data      = $this->request->param();
            
			$content=$data['content'];
			$touid=$data['touid'];
            
            $content=str_replace("\r","", $content);
            $content=str_replace("\n","", $content);
            
            $touid=str_replace("\r","", $touid);
            $touid=str_replace("\n","", $touid);
            $touid=preg_replace("/,|，/",",", $touid);
            
            if($content==''){
                $this->error('推送内容不能为空');
            }
            $touid_a=[];
            if($touid){
                $touid_a=explode(',',$touid);
                
            }
            
            $rs=sendMessage(0,$touid_a,$content);
            if($rs==0){
                $this->error("推送失败,请重试");
            }
            
            if($rs!=1){
                $this->error("推送配置错误，请检查设置");
            }

            $this->success("推送成功！");
		}
        
	}		
    
}
