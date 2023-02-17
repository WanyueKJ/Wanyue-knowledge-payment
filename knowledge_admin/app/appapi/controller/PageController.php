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

namespace app\appapi\controller;

use cmf\controller\HomeBaseController;
use app\portal\service\PostService;
use think\Db;

/**
 * 内容管理
 * Class PageController
 * @package app\appapi\controller
 */
class PageController extends HomebaseController{

	public function lists() {

        $postService = new PostService();
        $pageId      = 4;
        $page        = $postService->publishedPage($pageId);

        if (empty($page)) {
            $this->assign('reason', lang('页面不存在'));
            return $this->fetch(':error');
        }

        $this->assign('uid', '');
        $this->assign('token', '');
        $this->assign('page', $page);


        return $this->fetch('detail');
	}	
    
    public function detail() {        
        $postService = new PostService();
        $pageId      = $this->request->param('id', 0, 'intval');
        $page        = $postService->publishedPage($pageId);

        if (empty($page)) {
            $this->assign('reason', lang('页面不存在'));
            return $this->fetch(':error');
        }
        
        $this->assign('uid', '');
        $this->assign('token', '');
        $this->assign('page', $page);


        return $this->fetch('detail');
	}	
	

}