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

namespace App\Model;

use PhalApi\Model\NotORMModel as NotORM;

class Home extends NotORM {
	/* 轮播 */
	public function getSilide($id) {
		
		$list=\PhalApi\DI()->notorm->slide_item
				->select('id,title,image,url')
                ->where('status=1 and slide_id=?',$id)
				->order('list_order asc')
				->fetchAll();

		return $list;
	}
	
	
}
