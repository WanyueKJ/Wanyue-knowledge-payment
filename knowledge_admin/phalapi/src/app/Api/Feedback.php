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

use App\Domain\Feedback as Domain_Feedback;
use PhalApi\Api;

header("Access-Control-Allow-Origin: *");

/**
 * 反馈
 */

class Feedback extends Api {

	public function getRules() {
        return array(
            'add' => array(
                'thumb' => array('name' => 'thumb', 'type' => 'string', 'desc' => '图片'),
                'content' => array('name' => 'content', 'type' => 'string', 'desc' => '内容'),
            ),
        );
	}

    /**
     * 意见反馈
     * @desc 用于提交反馈意见
     * @return int code 操作码，0表示成功
     * @return array info 
     * @return string msg 提示信息
     */
	public function add() {
        $rs = array('code' => 0, 'msg' => \PhalApi\T('提交成功'), 'info' => array());

        $uid = \App\checkNull($this->uid);
        $token = \App\checkNull($this->token);
        $thumb = \App\checkNull($this->thumb);
        $content = \App\checkNull($this->content);
        $model = \App\checkNull($this->model);
        $system = \App\checkNull($this->system);
        $version = \App\checkNull($this->version);
        
        $checkToken=\App\checkToken($uid,$token);
		if($checkToken==700){
			$rs['code'] = $checkToken;
			$rs['msg'] = \PhalApi\T('您的登陆状态失效，请重新登陆！');
			return $rs;
		}
        
        if($thumb=='' && $content==''){
            $rs['code'] = 1001;
            $rs['msg'] = \PhalApi\T('请上传图片或填写反馈内容');
            return $rs;
        }
        
        $data=[
            'uid'=>$uid,
            'thumb'=>$thumb,
            'content'=>$content,
            'model'=>$model,
            'system'=>$system,
            'version'=>$version,
            'addtime'=>time(),
        ];
        
        $domain = new Domain_Feedback();
		$res = $domain->add($data);
        if(!$res){
            $rs['code'] = 1002;
			$rs['msg'] = \PhalApi\T('提交失败，请重试');
			return $rs;
        }
		
        return $rs;
	}    
    

}
