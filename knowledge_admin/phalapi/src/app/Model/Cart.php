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

class Cart extends NotORM {
	/* 列表 */
	public function getList($where) {
		
		$list=\PhalApi\DI()->notorm->cart
                ->select('*')
                ->where($where)
                ->order('id desc')
				->fetchAll();

		return $list;
	}
    
    /* 数量 */
    public function getNums($where) {
		
		$nums=\PhalApi\DI()->notorm->cart
                ->where($where)
				->count();

		return $nums;
	}
    
    /* 新增 */
	public function add($data) {
		
		$list=\PhalApi\DI()->notorm->cart
				->insert($data);

		return $list;
	}
    
    /* 更新 */
	public function update($where,$data) {
		
		$list=\PhalApi\DI()->notorm->cart
                ->where($where)
				->update($data);

		return $list;
	}
    
    /* 删除 */
	public function del($where) {
		
		$list=\PhalApi\DI()->notorm->cart
                ->where($where)
				->delete();

		return $list;
	}
    
    /* 添加订单 */
    public function addOrder($data) {
		
		$rs=\PhalApi\DI()->notorm->orders
				->insert($data);

		return $rs;
	}
    
    /* 添加订单商品 */
	public function addOrderGood($data) {
		
		$rs=\PhalApi\DI()->notorm->orders_good
				->insert($data);

		return $rs;
	}
	
}
