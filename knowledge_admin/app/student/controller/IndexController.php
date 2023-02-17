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

namespace app\student\controller;

use app\admin\model\IpGardeModel;
use app\admin\model\UsersModel;
use cmf\controller\StudentBaseController;
use think\Db;

/**
 * 首页
 */
class IndexController extends StudentBaseController
{


    public function initialize()
    {
        parent::initialize();
    }

    /*
     * 首页
     * @return mixed
     */
    public function index()
    {
        $data = $this->request->param();

        $isBackLog = 0;
        if (isset($data['isBackLog'])) {
            $isBackLog = $data['isBackLog'];
        }

        $ip = get_client_ip();

        $info = IpGardeModel::where(['ip' => $ip])->find();

        if ($info) {
            $gradeid = $info['gardeid'];
        } else {
            $gradeid = 0;
        }

        $url        = $this->siteUrl . '/api/?s=Home.GetIndex&gradeid=' . $gradeid;
        $index_info = curl_get($url);

        $list = Db::name('slide_item')->field('id,title,image,url')->where('status=1 and slide_id=5')
            ->order('list_order asc')->select()->toArray();

        foreach ($list as $k => $v) {
            $v['image'] = get_upload_path($v['image']);
            $list[$k]   = $v;
        }
        $index_info['data']['info']['0']['silide'] = $list;

        $this->assign([
            'index_info' => $index_info['data']['info']['0'],
            'isBackLog'  => $isBackLog,
            'navid'      => 0,
        ]);

        return $this->fetch();
    }


    /**
     * 选择学级
     */
    public function SetGrade()
    {
        $data = $this->request->param();

        $rs = array('code' => 0, 'msg' => '设置成功', 'info' => array());

        $id = $data['id'] ?? '';
        $id = checkNull($id);
        $ip = get_client_ip();

        $userId = session('student.id');

        $data = array(
            'ip'      => $ip,
            'gardeid' => $id
        );

        $info = IpGardeModel::where(['ip' => $ip])->find();
        if ($info) {
            $result = IpGardeModel::where(['ip' => $ip])->update($data);
        } else {
            $result = IpGardeModel::create($data, true);
        }
        if ($userId) {
            $data   = array(
                'gradeid' => $id
            );
            $result = UsersModel::where(['id' => $userId])->update($data);

            $gradeinfo = Db::name('course_grade')->where(['id' => $id])->find();

            if ($gradeinfo) {
                $gradename = $gradeinfo['name'];
            } else {
                $gradename = '';
            }

            $userinfo              = session('student');
            $userinfo['gradename'] = $gradename;
            $userinfo['gradeid']   = $id;
            session('student', $userinfo);

        }
        if ($result) {
            $rs['msg'] = '设置成功';
        } else {
            $rs['code'] = 1001;
            $rs['msg']  = '设置失败';
        }

        echo json_encode($rs);
        exit;
    }


    /**
     * APP下载中心页面
     * @return mixed
     */
    public function appdownload()
    {
        $data = $this->request->param();

        $isBackLog = 0;
        if (isset($data['isBackLog'])) {
            $isBackLog = $data['isBackLog'];
        }

        $this->assign([
            'navid'     => 2,
            'isBackLog' => $isBackLog
        ]);
        return $this->fetch('app_download');
    }


    /**
     * 了解万岳
     * @return mixed
     */
    public function liaojie()
    {
        $data = $this->request->param();

        $isBackLog = 0;
        if (isset($data['isBackLog'])) {
            $isBackLog = $data['isBackLog'];
        }

        $this->assign([
            'navid'     => 3,
            'isBackLog' => $isBackLog
        ]);

        return $this->fetch('liaojie');
    }




}


