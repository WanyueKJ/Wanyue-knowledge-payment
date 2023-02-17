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

use app\admin\model\CourseModel;
use app\admin\model\IpGardeModel;
use cmf\controller\StudentBaseController;
use think\Db;

/**
 * 选课中心
 */
class LessionlistController extends StudentBaseController
{

    /**
     * 首页
     * @return mixed
     */
    public function index()
    {

        $data = $this->request->param();

        //查找学段
        $xdlist = Db::name('course_grade')->field('id,name')->where(['pid' => 0])->order('list_order asc')->select();

        $xdid = 0; //第一个学段的id
        if ($xdlist) {
            $xdid = $xdlist[0]['id'];
        }

        //查找第一个学段的年级
        $njlist = array();
        $njid   = 0;
        if ($xdid != 0) {
            $njlist = Db::name('course_grade')->field('id,name')->where(['pid' => $xdid])->order('list_order asc')->select();
            if ($njlist) {
                $njid = $njlist[0]['id'];
            }
        }

        $nowtime = time();
        if (isset($data['keywords'])) {
            $keywords = $data['keywords'];

            $userinfo = session('student');

            if ($userinfo) {
                $gradeid = $userinfo['gradeid'];
            } else {

                $ip = get_client_ip();

                $info    = IpGardeModel::where(['ip' => $ip])->find();
                $gradeid = $info['gardeid'];
            }


            //." and name like '%".$keywords."%'"
        //    $where = "gradeid=" . $gradeid . " and status>=1 and shelvestime<" . $nowtime;
			$where = [
				['gradeid','=',$gradeid],
				['status','>=',1],
				['shelvestime','<',$nowtime],
			];
			
            $list  = CourseModel::where($where)->order('list_order asc,id desc')->select()->toArray();

            foreach ($list as $k => $v) {

                $isN     = strpos($v['name'], $keywords);
                $teacher = getUserInfo($v['uid']);
                $isT     = strpos($teacher['user_nickname'], $keywords);
                if ($isN === false && $isT === false) { //不包含

                    unset($list[$k]);
                    continue;
                }

                $v = handelInfo($v);

                $userinfo           = getUserInfo($v['uid']);
                $v['user_nickname'] = $userinfo['user_nickname'];
                $v['avatar']        = $userinfo['avatar'];

                $list[$k] = $v;
            }

            $list = array_values($list);

            $isMore = 0;
        } else {
            $keywords = '';

        //    $list = CourseModel::where('sort = 1 and gradeid = ' . $njid . ' and status >= 1 and shelvestime <' . $nowtime)
            $list = CourseModel::where([
				['sort','=',1],
				['gradeid','=',$njid],
				['status','>=',1],
				['shelvestime','<',$nowtime],
			])
                ->order('list_order asc,id desc')
                ->limit(0, 20)
                ->select();

            foreach ($list as $k => $v) {
                $v = handelInfo($v);

                $userinfo           = getUserInfo($v['uid']);
                $v['user_nickname'] = $userinfo['user_nickname'];
                $v['avatar']        = $userinfo['avatar'];

                $list[$k] = $v;
            }

            $isMore = 0;
            if (count($list) >= 20) {
                $isMore = 1;
            }

        }

        $this->assign([
            'xdlist'   => $xdlist,
            'xdid'     => $xdid,
            'njlist'   => $njlist,
            'njid'     => $njid,
            'lesslist' => $list,
            'isMore'   => $isMore,
            'navid'    => 1,
            'keywords' => $keywords
        ]);

        return $this->fetch();
    }

    //选择学段
    public function GetGrade()
    {
        $data = $this->request->param();

        $xdid = $data['xdid'] ?? 0; //学段id
        $kmid = $data['kmid'] ?? 0; //科目id
        $lbid = $data['lbid'] ?? 0; //类别id

        $info      = array();
        $gradeinfo = Db::name('course_grade')->field('id,name')->where(['pid' => $xdid])->order('list_order asc')->select()->toArray();

        $info['njlist'] = $gradeinfo;
        $gradeid        = 0;
        if ($gradeinfo) {
            $gradeid = $gradeinfo[0]['id'];
        }

        $nowtime = time();
        $where = '';
        $where = [];
        switch ($lbid) {
            case 4:
            //    $where .= 'sort = 0';
                $where[] = ['sort','=',0];
                break;
            case 1:
             //   $where .= 'sort = 1';
			 $where[] = ['sort','=',1];
                break;
            case 3:
            //    $where .= 'sort >= 2';
			$where[] = ['sort','>=',2];
                break;
            case 99:
                //$where .= 'sort != 1';
				$where[] = ['sort','<>',1];
                break;
        }

    //    $where .= ' and gradeid=' . $gradeid . ' and status>=1 and shelvestime<' . $nowtime;
		$where[]=['gradeid','=',$gradeid];
		$where[]=['status','>=',1];
		$where[]=['shelvestime','<',$nowtime];
        $list  = CourseModel::where($where)->order('list_order asc,id desc')->limit(0, 20)->select();

        foreach ($list as $k => $v) {
            $v = handelInfo($v);

            $userinfo           = getUserInfo($v['uid']);
            $v['user_nickname'] = $userinfo['user_nickname'];
            $v['avatar']        = $userinfo['avatar'];
            $list[$k] = $v;
        }

        $info['lesslist'] = $list;
        $info['gradeid']  = $gradeid;

        $this->success('', '', $info);
    }


    /**
     * 选择年级
     */
    public function ChooseNj()
    {
        $data = $this->request->param();

        $njid = $data['njid'] ?? 0; //学级id
        $kmid = $data['kmid'] ?? 0; //科目id
        $lbid = $data['lbid'] ?? 0; //类别id  默认是直播 3

        $info    = array();
        $gradeid = $njid;

        if ($lbid == 98) {
            $lbid = 4;
        }

        if ($lbid == 2) { //套餐
            $list = array();

            $nowtime = time();

            $list = Db::name('course_package')
                ->field('id,name,thumb,price,courseids,nums,des')
            //    ->where('gradeid =' . $gradeid)
				->where(['gradeid'=>$gradeid])
                ->order('list_order asc,id desc')
                ->select()
                ->toArray();

            foreach ($list as $k => $v) {

                $courseid_a = $this->handelCourseids($v['courseids']);
                $isT        = false;
                foreach ($courseid_a as $ks => $vs) {

                    //$where = 'id = ' . $vs;
					$where[]=['id','=',$vs];
                    if ($kmid != 0) {
                     //   $where .= ' and classid =' . $kmid;
						$where[]=['classid','=',$kmid];
                    }

                    $lkd = CourseModel::field('id')->where($where)->find();
                    if ($lkd) {
                        $isT = true;
                    }
                }

                if ($isT === false) {
                    unset($list[$k]);
                    continue;
                }

                $v['sort']  = -1;
                $v['thumb'] = get_upload_path($v['thumb']);
                $ismaterial = '0';
                $teacher    = [];
                $courses    = $this->getCourseids($v['courseids']);
                foreach ($courses as $k1 => $v1) {
                    $ishas = 0;
                    foreach ($teacher as $k2 => $v2) {
                        if ($v2['id'] == $v1['uid']) {
                            $ishas = 1;
                            break;
                        }
                    }
                    if ($ishas == 0) {
                        $t_a = [
                            'id'            => $v1['uid'],
                            'user_nickname' => $v1['user_nickname'],
                            'avatar'        => $v1['avatar'],
                        ];

                        $teacher[] = $t_a;
                    }

                    if ($v1['ismaterial'] == 1) {
                        $ismaterial = '1';
                    }

                }

                $v['teacher']    = $teacher;
                $v['ismaterial'] = $ismaterial;

                unset($v['courseids']);

                $list[$k] = $v;
            }

            $list = array_values($list);
            $list = array_slice($list, 0, 20);

        } else {  //除了套餐的其他

            $nowtime = time();

            $where = [];
            switch ($lbid) {
                case 4:
                //    $where .= 'sort = 0';
					$where[]=['sort','=',0];
                    break;
                case 1:
                //    $where .= 'sort = 1';
					$where[]=['sort','=',1];
                    break;
                case 3:
                //    $where .= 'sort >= 2';
					$where[]=['sort','=',2];
                    break;
                case 99:
                //    $where .= 'sort != 1'; //全部(内容和大班课)
					$where[]=['sort','<>',1];
                    break;
            }

            if ($kmid != 0) {
                //$where .= ' and classid =' . $kmid;
				$where[]=['classid','=',$kmid];
            }
            //$where .= ' and gradeid=' . $gradeid . ' and status>=1 and shelvestime<' . $nowtime;
			$where[]=['gradeid','=',$gradeid];
			$where[]=['status','>=',1];
			$where[]=['shelvestime','<',$nowtime];
            $list  = CourseModel::where($where)
                ->order('list_order asc,id desc')
                ->limit(0, 20)
                ->select();

            foreach ($list as $k => $v) {
                $v = handelInfo($v);

                $userinfo           = getUserInfo($v['uid']);
                $v['user_nickname'] = $userinfo['user_nickname'];
                $v['avatar']        = $userinfo['avatar'];

                $list[$k] = $v;
            }
        }

        $info['lesslist'] = $list;
        $this->success('', '', $info);
    }


    /**
     * 翻页操作
     */
    public function getNextList()
    {
        $data = $this->request->param();

        $njid = $data['njid'] ?? 0; //学级id
        $kmid = $data['kmid'] ?? 0; //科目id
        $lbid = $data['lbid'] ?? 0; //类别id

        $p = $data['p']; //类别id

        $nums  = 20;
        $start = ($p - 1) * $nums;

        $info    = array();
        $gradeid = $njid;

        if ($lbid == 2) { //套餐
            $list = array();

            $nowtime = time();

            $list = Db::name('course_package')
                ->field('id,name,thumb,price,courseids,nums,des')
                ->where('gradeid',$gradeid)
                ->order('list_order asc,id desc')
                ->select()
                ->toArray();



            foreach ($list as $k => $v) {

                $courseid_a = $this->handelCourseids($v['courseids']);
                $isT        = false;
                foreach ($courseid_a as $ks => $vs) {

                //    $where = 'id = ' . $vs;
					$where[]=[
						'id','=',$vs
					];
                    if ($kmid != 0) {
                        //$where .= ' and classid =' . $kmid;
						$where[]=[
							'classid','=',$kmid
						];		
                    }

                    $lkd = CourseModel::field('id')->where($where)->find();
                    if ($lkd) {
                        $isT = true;
                    }
                }

                if ($isT === false) {
                    unset($list[$k]);
                    continue;
                }

                $v['sort']  = -1;
                $v['thumb'] = get_upload_path($v['thumb']);
                $ismaterial = '0';
                $teacher    = [];
                $courses    = $this->getCourseids($v['courseids']);
                foreach ($courses as $k1 => $v1) {
                    $ishas = 0;
                    foreach ($teacher as $k2 => $v2) {
                        if ($v2['id'] == $v1['uid']) {
                            $ishas = 1;
                            break;
                        }
                    }
                    if ($ishas == 0) {
                        $t_a = [
                            'id'            => $v1['uid'],
                            'user_nickname' => $v1['user_nickname'],
                            'avatar'        => $v1['avatar'],
                        ];

                        $teacher[] = $t_a;
                    }

                    if ($v1['ismaterial'] == 1) {
                        $ismaterial = '1';
                    }

                }

                $v['teacher']    = $teacher;
                $v['ismaterial'] = $ismaterial;

                unset($v['courseids']);

                $list[$k] = $v;
            }

            $list = array_values($list);
            $list = array_slice($list, $start, $nums);

        } else {  //除了套餐的其他

            $nowtime = time();

            //$where = '';
			$where = [];
            switch ($lbid) {
                case 4:
                    //$where .= 'sort = 0';
					$where[]=['sort','=','0'];
                    break;
                case 1:
                    //$where .= 'sort = 1';
					$where[]=['sort','=','1'];
                    break;
                case 3:
                    //$where .= 'sort >= 2';
					$where[]=['sort','>=','2'];
                    break;
            }

            if ($kmid != 0) {
                //$where .= ' and classid =' . $kmid;
				$where[]=['classid','=',$kmid];
            }
            //$where .= ' and gradeid=' . $gradeid . ' and status>=1 and shelvestime<' . $nowtime;
			$where[]=['gradeid','=',$gradeid];
			$where[]=['status','>=',1];
			$where[]=['shelvestime','<',$nowtime];
            $list  = CourseModel::where($where)->order('list_order asc,id desc')
                ->limit($start, $nums)
                ->select();

            foreach ($list as $k => $v) {
                $v = handelInfo($v);

                $userinfo           = getUserInfo($v['uid']);
                $v['user_nickname'] = $userinfo['user_nickname'];
                $v['avatar']        = $userinfo['avatar'];

                $list[$k] = $v;
            }
        }

        $info['lesslist'] = $list;
        $this->success('', '', $info);
    }


    /* 更具课程ID 获取 课程信息 */
    protected function getCourseids($courseid_s)
    {
        $course = [];

        $courseid_a = $this->handelCourseids($courseid_s);

        if (!$courseid_a) {
            return $course;
        }

        $courseid_s = implode(',', $courseid_a);
        //$where      = "id in ($courseid_s)";
		$where=[
			['id','in',$courseid_s]
		];
        $nowtime = time();

        $list = CourseModel::where($where)->order('list_order asc,id desc')->select();

        foreach ($list as $k => $v) {
            $v = handelInfo($v);

            $userinfo           = getUserInfo($v['uid']);
            $v['user_nickname'] = $userinfo['user_nickname'];
            $v['avatar']        = $userinfo['avatar'];

            $list[$k] = $v;
        }

        $course = $list;
        return $course;
    }


    /* 处理套餐课程ID */
    protected function handelCourseids($courseid_s)
    {
        $courseid_a  = [];
        $courseids_a = explode(',', $courseid_s);
        foreach ($courseids_a as $k => $v) {
            $courseid_a[] = preg_replace('/\[|\]/', '', $v);
        }

        return $courseid_a;
    }
}


