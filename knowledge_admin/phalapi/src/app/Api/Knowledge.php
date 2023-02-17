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
use App\Domain\Course as Domain_Course;
use App\Domain\Knowledge as Domain_Knowledge;

/**
 * 知识付费课程
 */
class Knowledge extends Api
{

    public function getRules()
    {
        return array(
            'getClassCourse' => array(
                'knowledge_id' => array('name' => 'knowledge_id', 'type' => 'int', 'desc' => '知识付费分类ID'),
                'sort' => array('name' => 'sort', 'type' => 'int', 'desc' => '类别 0内容1课程2语音直播3视频直播'),
                'type' => array('name' => 'type', 'type' => 'int', 'desc' => '内容形式，1图文2视频3音频；\r\n语音直播形式，1语音ppt2语音视频3语音音频\r\n视频直播形式，5视频直播'),
                'p'       => array('name' => 'p', 'type' => 'int', 'desc' => '页码'),
            ),

            'getList' => array(
                'knowledge_id' => array('name' => 'knowledge_id', 'type' => 'int', 'desc' => '知识付费分类ID'),
                'course_type' => array('name' => 'course_type', 'type' => 'int', 'desc' => '课程类型, 1内容 2大班课'),
                'type'    => array('name' => 'type', 'type' => 'int', 'desc' => '内容形式，1图文2视频3音频；\r\n语音直播形式，1语音ppt2语音视频3语音音频\r\n视频直播形式，5视频直播'),
                'p'       => array('name' => 'p', 'type' => 'int', 'desc' => '页码'),
            ),

            'search' => array(
                'gradeid' => array('name' => 'gradeid', 'type' => 'int', 'desc' => '学级分类ID'),
                'keyword' => array('name' => 'keyword', 'type' => 'string', 'desc' => '关键词'),
                'p'       => array('name' => 'p', 'type' => 'int', 'desc' => '页码'),
            ),

            'getDetail' => array(
                'courseid' => array('name' => 'courseid', 'type' => 'int', 'desc' => '课程ID'),
            ),

            'checkPass' => array(
                'courseid' => array('name' => 'courseid', 'type' => 'int', 'desc' => '课程ID'),
                'pass'     => array('name' => 'pass', 'type' => 'string', 'desc' => '密码'),
            ),

            'buy' => array(
                'courseid' => array('name' => 'courseid', 'type' => 'int', 'desc' => '课程ID'),
                'payid'    => array('name' => 'payid', 'type' => 'int', 'desc' => '支付方式ID'),
            ),

            'getLessonList' => array(
                'courseid' => array('name' => 'courseid', 'type' => 'int', 'desc' => '课程ID'),
            ),

            'getMyCourse' => array(
                'cid'    => array('name' => 'cid', 'type' => 'int', 'desc' => '分类id'),
                'keyword' => array('name' => 'keyword', 'type' => 'string', 'desc' => '关键词'),
                'p'       => array('name' => 'p', 'type' => 'int', 'desc' => '页码'),
                'know_sort' => array('name' => 'know_sort', 'type' => 'int', 'desc' => '课程类型, 0全部, 1直播, 2视频内容, 3音频内容, 4图文内容')
            ),

            'getTeacherCourse' => array(
                'gradeid' => array('name' => 'gradeid', 'type' => 'int', 'desc' => '学级分类ID'),
                'touid'   => array('name' => 'touid', 'type' => 'int', 'desc' => '讲师ID'),
                'p'       => array('name' => 'p', 'type' => 'int', 'desc' => '页码'),
            ),

            'getMyBuy' => array(
                'sort' => array('name' => 'sort', 'type' => 'int', 'desc' => '0内容 2直播'),
                'p'    => array('name' => 'p', 'type' => 'int', 'desc' => '页码'),
            ),

            'setGrade' => array(
                'gradeid' => array('name' => 'gradeid', 'type' => 'int', 'desc' => '学级分类ID'),
            ),

            'setMycourse' => array(
                'courseid' => array('name' => 'courseid', 'type' => 'int', 'desc' => '课程id'),
            ),
            'getNewsDetail' => array(
                'newsid' => array('name' => 'newsid', 'type' => 'int', 'desc' => '新闻id'),
            ),
        );
    }

    /**
     * 科目分类
     * @desc 用于获取科目分类
     * @return int code 操作码，0表示成功
     * @return array info 列表
     * @return string info[].id
     * @return string info[].name 名称
     * @return string info[].thumb  图标
     * @return string msg 提示信息
     */
    public function getClass()
    {
        $rs = array('code' => 0, 'msg' => '', 'info' => array());

        $domain = new Domain_Course();
        $list   = $domain->getClass();

        $rs['info'] = $list;

        return $rs;
    }

    /**
     * 科目分类下课程
     * @desc 用于获取某科目分类下课程
     * @return int code 操作码，0表示成功
     * @return array info 列表
     * @return string info[].id 课程ID
     * @return string info[].uid 教师ID
     * @return string info[].user_nickname 教师昵称
     * @return string info[].avatar 教师头像
     * @return string info[].sort 类别，0内容1课程2直播
     * @return string info[].type 形式，1图文2视频3音频
     * @return string info[].name 名称
     * @return string info[].thumb 封面
     * @return string info[].paytype 获取形式，0免费1收费2密码
     * @return string info[].payval 价格位置显示内容，根据paytype区分颜色
     * @return string info[].lesson 课时位置显示内容
     * @return string info[].islive 是否在直播，0否1是
     * @return string msg 提示信息
     */
    public function getClassCourse()
    {
        $rs = array('code' => 0, 'msg' => '', 'info' => array());

        $knowledge_id = \App\checkNull($this->knowledge_id);
        $sort = \App\checkNull($this->sort);
        $type = \App\checkNull($this->type);
        $p       = \App\checkNull($this->p);

        $nowtime = time();

        $where = [
            'status>=?'     => 1,
            'shelvestime<?' => $nowtime,
            'knowledgeid'       => $knowledge_id,
        ];

        switch ($sort)
        {
            case 0:
                $where['sort'] = 0; //内容
                break;
            case 2:
                $where['sort>?'] = 1; //大班课
                break;
            case 3:
                $where['sort!=?'] = 1; //除了小班课都有
                break;
        }

        if($sort == 0 && $type > 1) { //内容子分类
            $where['type'] = (int)$type - 1;
        }

        $domain = new Domain_Course();
        $list   = $domain->getList($p, $where);

        $rs['info'] = $list;

        return $rs;
    }

    /**
     * 课程列表
     * @desc 用于课程列表
     * @return int code 操作码，0表示成功
     * @return array info 列表
     * @return string info[].id 昵称
     * @return string info[].user_nickname 昵称
     * @return string info[].avatar 头像
     * @return string info[].sex 性别
     * @return string info[].age 年龄
     * @return string msg 提示信息
     */
    public function getList()
    {
        $rs = array('code' => 0, 'msg' => '', 'info' => array());

        $type    = \App\checkNull($this->type);
        $kid = \App\checkNull($this->knowledge_id);
        $course_type = \App\checkNull($this->course_type);
        $p       = \App\checkNull($this->p);

        $nowtime = time();

        $where = [
            'knowledgeid'   => $kid,
            'status>=?'     => 1,
            'shelvestime<?' => $nowtime,
        ];

        if ($course_type == 1) { //内容
            $where['sort'] = 0;
            if($type != 0) {
                $where['type'] = $type;
            }
        } else if ($course_type == 2) { //大班课
            $where['sort>?'] = 1;
        }

        $domain = new Domain_Knowledge();
        $list   = $domain->getList($p, $where);

        $rs['info'] = $list;

        return $rs;
    }

    /**
     * 搜索课程
     * @desc 用于首页搜索课程
     * @return int code 操作码，0表示成功
     * @return array info 列表
     * @return string info[].id 昵称
     * @return string info[].user_nickname 昵称
     * @return string info[].avatar 头像
     * @return string info[].sex 性别
     * @return string info[].age 年龄
     * @return string msg 提示信息
     */
    public function search()
    {
        $rs = array('code' => 0, 'msg' => '', 'info' => array());

        $uid     = \App\checkNull($this->uid);
        $gradeid = \App\checkNull($this->gradeid);
        $keyword = \App\checkNull($this->keyword);
        $p       = \App\checkNull($this->p);

        if ($keyword == '') {
            $rs['code'] = 1001;
            $rs['msg']  = \PhalApi\T('请输入关键词');
            return $rs;
        }

        $nowtime = time();

        $where = [
            'gradeid'       => $gradeid,
            'status>=?'     => 1,
            'shelvestime<?' => $nowtime,
            'uid!=?'        => $uid,
            'name like ?'   => '%' . $keyword . '%',
        ];

        $domain = new Domain_Course();
        $list   = $domain->getList($p, $where);

        $rs['info'] = $list;

        return $rs;
    }

    /**
     * 课程详情
     * @desc 用于课程详情
     * @return int code 操作码，0表示成功
     * @return array info 列表
     * @return string info[].paytype 获取形式，0免费1收费2密码
     * @return string info[].ifbuy 是否购买，0否1是
     * @return string info[].views 学习人数
     * @return string info[].des 简介
     * @return string info[].trialtype 试学方式，0无1链接2时间进度
     * @return string info[].trialval  trialtype=1是链接，trialtype=2是时间秒数
     * @return string info[].url 视频/语音链接
     * @return string info[].add_time 时间日期
     * @return string info[].star 课程评级星级
     * @return string info[].islive 是否直播0否1是
     * @return string info[].intr 听课指南
     * @return object info[].userinfo 讲师信息
     * @return string info[].ispack 是否有套餐0否1是
     * @return string info[].iscart 是否加入购物车0否1是
     * @return array  info[].tutor 辅导老师列表
     * @return string info[].tutor[] 老师信息
     * @return string msg 提示信息
     */
    public function getDetail()
    {
        $rs = array('code' => 0, 'msg' => '', 'info' => array());

        $uid      = \App\checkNull($this->uid);
        $token    = \App\checkNull($this->token);
        $courseid = \App\checkNull($this->courseid);

        $checkToken = \App\checkToken($uid, $token);
        if ($checkToken == 700) {
            $rs['code'] = $checkToken;
            $rs['msg']  = \PhalApi\T('您的登陆状态失效，请重新登陆！');
            return $rs;
        }

        if ($courseid < 1) {
            $rs['code'] = 1001;
            $rs['msg']  = \PhalApi\T('信息错误');
            return $rs;
        }

        $nowtime = time();
        $where   = [
            'status>?'      => 0,
            'shelvestime<?' => $nowtime,
            'id'            => $courseid
        ];

        $domain = new Domain_Course();
        $res    = $domain->getDetail($uid, $where);

        return $res;
    }

    /**
     * 确认密码
     * @desc 用于输入密码后进行确认
     * @return int code 操作码，0表示成功
     * @return array info 列表
     * @return string msg 提示信息
     */
    public function checkPass()
    {
        $rs = array('code' => 0, 'msg' => '', 'info' => array());

        $uid      = \App\checkNull($this->uid);
        $token    = \App\checkNull($this->token);
        $courseid = \App\checkNull($this->courseid);
        $pass     = \App\checkNull($this->pass);

        $checkToken = \App\checkToken($uid, $token);
        if ($checkToken == 700) {
            $rs['code'] = $checkToken;
            $rs['msg']  = \PhalApi\T('您的登陆状态失效，请重新登陆！');
            return $rs;
        }

        if ($courseid < 1) {
            $rs['code'] = 1001;
            $rs['msg']  = \PhalApi\T('信息错误');
            return $rs;
        }

        if ($pass == '') {
            $rs['code'] = 1001;
            $rs['msg']  = \PhalApi\T('请输入密码');
            return $rs;
        }


        $domain = new Domain_Course();
        $res    = $domain->checkPass($uid, $pass, $courseid);

        return $res;
    }

    /**
     * 课时列表
     * @desc 用于获取课时列表
     * @return int code 操作码，0表示成功
     * @return array info
     * @return string info[].name 名称
     * @return array  info[].list 课时列表
     * @return string info[].list[].name 名称
     * @return string info[].list[].type 形式，1图文2视频3音频4ppt直播5视频直播6音频直播7授课直播（白板）
     * @return string info[].list[].istrial 是否试学，0否1是
     * @return string info[].list[].url 音频链接/视频链接/ 当type=4 url!=''  为回访
     * @return string info[].list[].status 状态 0正常 1试学2已学完3正在直播4锁
     * @return string info[].list[].islive 是否在直播 0否1是2已结束
     * @return string info[].list[].isenter 是否可看 0否1是
     * @return string info[].list[].islast 是否上次学到 0否1是
     * @return string info[].list[].time_date 开播时间
     * @return string info[].list[].uid 讲师ID
     * @return string info[].list[].courseid 课程ID
     * @return string msg 提示信息
     */
    public function getLessonList()
    {
        $rs = array('code' => 0, 'msg' => '', 'info' => array());

        $uid      = \App\checkNull($this->uid);
        $token    = \App\checkNull($this->token);
        $courseid = \App\checkNull($this->courseid);

        if ($uid < 1 || $courseid < 1) {
            $rs['code'] = 1001;
            $rs['msg']  = \PhalApi\T('信息错误');
            return $rs;
        }

        $checkToken = \App\checkToken($uid, $token);
        if ($checkToken == 700) {
            $rs['code'] = $checkToken;
            $rs['msg']  = \PhalApi\T('您的登陆状态失效，请重新登陆！');
            return $rs;
        }


        $domain = new Domain_Course();
        $list   = $domain->getLessonList($uid, $courseid);

        $rs['info'] = $list;

        return $rs;
    }


    /**
     * 已购买的课程
     * @desc 用于个人中心获取已购买的课程
     * @return int code 操作码，0表示成功
     * @return array info 同其他课程列表
     * @return string info[].payval
     * @return string msg 提示信息
     */
    public function getMyBuy()
    {
        $rs = array('code' => 0, 'msg' => '', 'info' => array());

        $uid   = \App\checkNull($this->uid);
        $token = \App\checkNull($this->token);
        $sort  = $this->sort;
        $p     = \App\checkNull($this->p);

        $checkToken = \App\checkToken($uid, $token);
        if ($checkToken == 700) {
            $rs['code'] = $checkToken;
            $rs['msg']  = \PhalApi\T('您的登陆状态失效，请重新登陆！');
            return $rs;
        }

        $domain = new Domain_Course();
        $list   = $domain->getMyBuy($uid, $sort, $p);

        $rs['info'] = $list;

        return $rs;
    }

    /**
     * 某讲师课程
     * @desc 用于获取某讲师课程列表
     * @return int code 操作码，0表示成功
     * @return array info 同其他课程列表
     * @return string msg 提示信息
     */
    public function getTeacherCourse()
    {
        $rs = array('code' => 0, 'msg' => '', 'info' => array());

        $uid     = \App\checkNull($this->uid);
        $token   = \App\checkNull($this->token);
        $gradeid = \App\checkNull($this->gradeid);
        $touid   = \App\checkNull($this->touid);
        $p       = \App\checkNull($this->p);

        $checkToken = \App\checkToken($uid, $token);
        if ($checkToken == 700) {
            $rs['code'] = $checkToken;
            $rs['msg']  = \PhalApi\T('您的登陆状态失效，请重新登陆！');
            return $rs;
        }

        $nowtime = time();
        $where   = [
            'status>=?'     => 1,
            'shelvestime<?' => $nowtime,
            'uid'           => $touid,
        ];

        $domain = new Domain_Course();
        $list   = $domain->getList($p, $where);

        $rs['info'] = $list;

        return $rs;
    }

    /**
     * 获取默认学级分类
     * @desc 用于游客模式获取默认学级分类
     * @return int code 操作码，0表示成功
     * @return array  info
     * @return string info[0].id
     * @return string info[0].name 名称
     * @return string msg 提示信息
     */
    public function getGradeDef()
    {
        $rs = array('code' => 0, 'msg' => '', 'info' => array());

        $domain = new Domain_Course();
        $res    = $domain->getGradeDef();

        return $res;
    }

    /**
     * 学级分类
     * @desc 用于获取课程学级分类
     * @return int code 操作码，0表示成功
     * @return array  info 列表
     * @return string info[].id
     * @return string info[].name 名称
     * @return array  info[].list 二级分类
     * @return string info[].list[].id 二级分类ID
     * @return string info[].list[].name 二级分类名称
     * @return string msg 提示信息
     */
    public function getGrade()
    {
        $rs = array('code' => 0, 'msg' => '', 'info' => array());

        $domain = new Domain_Course();
        $list   = $domain->getGrade();

        $rs['info'] = $list;

        return $rs;
    }


    /**
     * 设置学级分类
     * @desc 用于设置学级分类
     * @return int code 操作码，0表示成功
     * @return string msg 提示信息
     */
    public function setGrade()
    {
        $rs = array('code' => 0, 'msg' => '', 'info' => array());

        $uid     = \App\checkNull($this->uid);
        $token   = \App\checkNull($this->token);
        $gradeid = \App\checkNull($this->gradeid);

        $checkToken = \App\checkToken($uid, $token);
        if ($checkToken == 700) {
            $rs['code'] = $checkToken;
            $rs['msg']  = \PhalApi\T('您的登陆状态失效，请重新登陆！');
            return $rs;
        }

        $domain = new Domain_Course();
        $res    = $domain->setGrade($uid, $gradeid);

        return $res;
    }

    /**
     * 我的课程
     * @desc 用于获取我的课程
     * @return int code 操作码，0表示成功
     * @return array info 同其他课程列表
     * @return string info[].payval
     * @return string msg 提示信息
     */
    public function getMyCourse() {
        $rs = array('code' => 0, 'msg' => '', 'info' => array());

        $uid=\App\checkNull($this->uid);
        $token=\App\checkNull($this->token);
        $cid = \App\checkNull($this->cid);
        $keyword=\App\checkNull($this->keyword);
        $p=\App\checkNull($this->p);
        $know_sort = \App\checkNull($this->know_sort);

        $checkToken=\App\checkToken($uid,$token);
        if($checkToken==700){
            $rs['code'] = $checkToken;
            $rs['msg'] = \PhalApi\T('您的登陆状态失效，请重新登陆！');
            return $rs;
        }

        $domain = new Domain_Knowledge();
        $list = $domain->getMyCourse($uid, $keyword, $p, $cid, $know_sort);

        $rs['info']=$list;

        return $rs;
    }


    /**
     * 添加到我的课程
     * @desc 用于添加课程到我的课程 查看大班课/内容详情时自动触发(只处理免费的)
     * @return int code 操作码 0 表示成功
     * @return string msg 提示信息
     */
    public function setMycourse() {
        $rs = array('code' => 0, 'msg' => '', 'info' => array());

        $uid=\App\checkNull($this->uid);
        $token=\App\checkNull($this->token);
        $courseid=\App\checkNull($this->courseid);

        $checkToken=\App\checkToken($uid,$token);
        if($checkToken==700){
            $rs['code'] = $checkToken;
            $rs['msg'] = \PhalApi\T('您的登陆状态失效，请重新登陆！');
            return $rs;
        }

        $domain = new Domain_Knowledge();
        $res = $domain->setMycourse($uid, $courseid);

        return $res;

    }


    /*
    * 获取新闻列表
    * @desc 用于获取新闻列表
    * @return int code 操作码 0 表示成功
    * @return array 新闻列表
    */
    public function getNews() {
        $rs = array('code' => 0, 'msg' => '', 'info' => array());
        $domain = new Domain_Knowledge();
        $list   = $domain->getNews();

        $rs['info'] = $list;

        return $rs;

    }


    /**
     * 获取新闻详情
     * @desc 用于获取新闻详情
     * @return int code 操作码 0 表示成功
     * @return array 新闻详情
     */
    public function getNewsDetail() {

        $rs = array('code' => 0, 'msg' => '', 'info' => array());

        $uid      = \App\checkNull($this->uid);
        $token    = \App\checkNull($this->token);
        $newsid = \App\checkNull($this->newsid);

        $checkToken = \App\checkToken($uid, $token);
        if ($checkToken == 700) {
            $rs['code'] = $checkToken;
            $rs['msg']  = \PhalApi\T('您的登陆状态失效，请重新登陆！');
            return $rs;
        }

        $domain = new Domain_Knowledge();
        $rs['info']    = $domain->getNewsDetail($newsid);

        return $rs;

    }




}
