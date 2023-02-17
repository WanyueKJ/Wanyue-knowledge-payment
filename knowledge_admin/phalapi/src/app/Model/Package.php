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

class Package extends NotORM {
	
    /* 列表 */
	public function getList($where,$order,$p,$nums) {
        
        if($p<1){
            $p=1;
        }
        
        if($nums==0){
            $nums=20;
        }
        $start=($p-1) * $nums;

        $list=\PhalApi\DI()->notorm->course_package
				->select('id,name,thumb,price,courseids,nums')
                ->where($where)
                ->order($order)
                ->limit($start,$nums)
				->fetchAll();
        
        return $list;
    }
    
    /* 单个信息 */
	public function getInfo($where) {

        $info=\PhalApi\DI()->notorm->course_package
				->select('*')
                ->where($where)
				->fetchOne();
        
        return $info;
    }
	
    /* 获取购买信息 */
    public function getBuy($where) {

        $info=\PhalApi\DI()->notorm->course_package_users
                ->select('*')
                ->where($where)
				->fetchOne();
        
        return $info;
    }
    
}
