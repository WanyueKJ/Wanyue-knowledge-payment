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

/** SQL literal value
*/
class NotORM_Literal {
	protected $value = '';
	
	/** @var array */
	public $parameters = array();
	
	/** Create literal value
	* @param string
	* @param mixed parameter
	* @param mixed ...
	*/
	function __construct($value) {
		$this->value = $value;
		$this->parameters = func_get_args();
		array_shift($this->parameters);
	}
	
	/** Get literal value
	* @return string
	*/
	function __toString() {
		return $this->value;
	}
	
}
