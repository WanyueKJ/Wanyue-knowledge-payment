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

class Teacher extends NotORM {

    /**
     * 教师列表
     * @param $p
     * @param $where
     * @param $order
     * @param $nums
     * @return mixed
     */
	public function getTeachers($p,$where,$order,$nums) {
        
        if($p<1){
            $p=1;
        }
        if($nums==0){
            $nums=20;
        }
        
        $start=($p-1) * $nums;

		$list=\PhalApi\DI()->notorm->users
				->select('id,user_nickname,avatar,avatar_thumb,sex,signature,birthday,type,signoryid,identity')
                ->where('type=1 and user_status!=0 ')
                ->where($where)
				->order($order)
                ->limit($start,$nums)
				->fetchAll();

		return $list;
	}

    /**
     * 讲师信息
     * @param $uid
     * @return mixed
     */
	public function getInfo($uid) {
		$info=\PhalApi\DI()->notorm->users
				->select("id,user_nickname,avatar,avatar_thumb,sex,signature,birthday,type,signoryid,identity,school,experience,feature")
				->where('id=?',$uid)
				->fetchOne();
		return $info;
	}

}
