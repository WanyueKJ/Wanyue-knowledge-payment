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

class Comment extends NotORM {
	/* 新增 */
	public function add($data) {
		
		$list=\PhalApi\DI()->notorm->course_com
				->insert($data);

		return $list;
	}
	
	/* 评论列表 */
    public function getList($where,$order,$p) {
		
        if($p<1){
            $p=1;
        }
        $nums=20;
        $start=($p-1) * $nums;

        $list=\PhalApi\DI()->notorm->course_com
				->select('id,uid,sort,content,star,lessons,addtime')
                ->where($where)
                ->order($order)
                ->limit($start,$nums)
				->fetchAll();
        
        return $list;
	}
}
