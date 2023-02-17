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

namespace App\Api;

use PhalApi\Api;

/**
 * 上传
 */
class Upload extends Api {

	public function getRules() {
		return array(
		);
	}
    
    /**
	 * 获取七牛Token
	 * @desc 用于获取充值规则
	 * @return int code 操作码，0表示成功，
	 * @return array  info 
	 * @return string info[0].token 七牛Token
	 * @return string msg 提示信息
	 */
	public function getQiniuToken() {
		$rs = array('code' => 0, 'msg' => '', 'info' => array());
        
        $uid=\App\checkNull($this->uid);
        $token=\App\checkNull($this->token);	
        
		$checkToken=\App\checkToken($uid,$token);
		if($checkToken==700){
			$rs['code'] = $checkToken;
			$rs['msg'] = \PhalApi\T('您的登陆状态失效，请重新登陆！');
			return $rs;
		}

		$token = \PhalApi\DI()->qiniu->getToken();
        
        $token2=\App\encryption($token);
        $info['token']=$token2;
        $rs['info'][0] =$info;
        
		return $rs;
	}
    
}
