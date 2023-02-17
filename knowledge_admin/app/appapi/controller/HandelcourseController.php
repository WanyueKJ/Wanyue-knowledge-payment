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

namespace app\appapi\controller;

use cmf\controller\HomeBaseController;
use think\Db;

/*
 * 处理直播中课程
 * Class HandelcourseController
 * @package app\appapi\controller
 */

class HandelcourseController extends HomebaseController
{

    public function upCourseLive()
    {
        $notime = time();

        Db::name("course")->where([['sort', '>=', 2], ['islive', '=', 0], ['starttime', '<=', $notime]])->update(['islive' => 1]);

        $where   = [];
        $where[] = ['sort', '>=', '2'];
        $where[] = ['islive', '=', '1'];
        $where[] = ['endtime', '<', $notime];

        $list = Db::name("course")->where($where)->select();
        $list->each(function ($v, $k) {
            $islive = hGet('liveing', $v['uid']);
            $stream = $v['uid'] . '_' . $v['id'] . '_0';
            if (!$islive || $stream != $islive) {
                releaseTask($v['uid'], $v['id']);
                Db::name("course")->where(['id' => $v['id']])->update(['islive' => 2, 'endtime' => time()]);
            }

        });

        echo 'OK';
        exit;
    }


    public function upLessonLive()
    {
        $notime = time();

        Db::name("course_lesson")->where([['type', '>=', 4], ['islive', '=', 0], ['starttime', '<=', $notime]])->update(['islive' => 1]);

        $where   = [];
        $where[] = ['type', '>=', '4'];
        $where[] = ['islive', '=', '1'];
        $where[] = ['endtime', '<', $notime];

        $list = Db::name("course_lesson")->where($where)->select();
        $list->each(function ($v, $k) {
            $islive = hGet('liveing', $v['uid']);
            $stream = $v['uid'] . '_' . $v['courseid'] . '_' . $v['id'];

            if (!$islive || $stream != $islive) {
                $update = ['islive' => 2, 'endtime' => time()];
                if ($v['resourceid'] && $v['sid']) {
                    $rs_stop = agoraStopRe($stream, $v['uid'], $v['resourceid'], $v['sid']);
                    if ($rs_stop['code'] == 0) {

                    }

                    $url = "record/{$v['sid']}_{$stream}.m3u8";
                    $update['url'] = $url;
                }

                Db::name("course_lesson")->where(['id' => $v['id']])->update($update);
                releaseTask($v['uid'], $v['courseid'], $v['id']);
            }

        });

        echo 'OK';
        exit;
    }

    /* 新课程提醒 */
    public function sendCourse()
    {

        $notime = time();

        $list = Db::name("course")->where([['ispush', '=', 0], ['shelvestime', '<=', $notime]])->select()->toArray();
        foreach ($list as $k => $v) {
            Db::name("course")->where([['id', '=', $v['id']]])->update(['ispush' => 1]);

            $uid = $v['uid'];

            $touid = Db::name("users_attention")->where([['touid', '=', $uid]])->select()->toArray();
            if ($touid) {
                $touids = array_column($touid, 'uid');
                $touids = array_filter($touids);

                if ($touids) {
                    $userinfo = getUserInfo($uid);
                    $title    = '你关注的讲师' . $userinfo['user_nickname'] . '发布了新的课程～';

                    sendMessage(2, $touids, $title);
                }
            }
        }

        echo 'OK';
        exit;
    }
    /* 课时提醒 */


}