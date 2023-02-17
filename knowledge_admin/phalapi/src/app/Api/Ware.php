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
use App\Domain\Ware as Domain_Ware;
/**
 * 课件
 */
class Ware extends Api {

	public function getRules() {
        return array(
            'getWare' => array(
                'liveuid' => array('name' => 'liveuid', 'type' => 'int', 'desc' => '讲师ID'),
                'courseid' => array('name' => 'courseid', 'type' => 'int', 'desc' => '课程ID'),
                'lessonid' => array('name' => 'lessonid', 'type' => 'int', 'desc' => '课时ID'),
            ),
        );
	}

    /**
     * 课件列表
     * @desc 用于获取课件列表
     * @return int code 操作码，0表示成功
     * @return array info 
     * @return string info[].id 
     * @return string info[].name 文件名
     * @return string info[].url 链接
     * @return string info[].size 大小
     * @return string msg 提示信息
     */
	public function getWare() {
        $rs = array('code' => 0, 'msg' => '', 'info' => array());

        $uid = \App\checkNull($this->uid);
        $token = \App\checkNull($this->token);
        $liveuid = \App\checkNull($this->liveuid);
        $courseid = \App\checkNull($this->courseid);
        $lessonid = \App\checkNull($this->lessonid);
        
        $checkToken=\App\checkToken($uid,$token);
		if($checkToken==700){
			$rs['code'] = $checkToken;
			$rs['msg'] = \PhalApi\T('您的登陆状态失效，请重新登陆！');
			return $rs;
		}
        
        if($liveuid<1  || $courseid<1 || $lessonid<1){
            $rs['code'] = 1001;
            $rs['msg'] = \PhalApi\T('信息错误');
            return $rs;
        }
        
        $data=[
            'uid'=>$uid,
            'liveuid'=>$liveuid,
            'courseid'=>$courseid,
            'lessonid'=>$lessonid,
        ];
        
        $domain = new Domain_Ware();
		$res = $domain->getWare($data);
		
        return $res;
	}    
    

}
