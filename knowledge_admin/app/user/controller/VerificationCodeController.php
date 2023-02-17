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

namespace app\user\controller;

use cmf\controller\HomeBaseController;
use think\facade\Validate;

class VerificationCodeController extends HomeBaseController
{
    public function send()
    {
        $validate = new \think\Validate([
            'username' => 'require',
            'captcha'  => 'require',
        ]);

        $validate->message([
            'username.require' => '请输入手机号或邮箱!',
            'captcha.require'  => '图片验证码不能为空',
        ]);

        $data = $this->request->param();
        if (!$validate->check($data)) {
            $this->error($validate->getError());
        }

        $captchaId = empty($data['captcha_id']) ? '' : $data['captcha_id'];
        if (!cmf_captcha_check($data['captcha'], $captchaId, false)) {
            $this->error('图片验证码错误!');
        }

        $registerCaptcha = session('register_captcha');

        session('register_captcha', $data['captcha']);

        if ($registerCaptcha == $data['captcha']) {
            cmf_captcha_check($data['captcha'], $captchaId, true);
            $this->error('请输入新图片验证码!');
        }

        $accountType = '';

        if (Validate::is($data['username'], 'email')) {
            $accountType = 'email';
        } else if (cmf_check_mobile($data['username'])) {
            $accountType = 'mobile';
        } else {
            $this->error("请输入正确的手机或者邮箱格式!");
        }

        if (isset($data['type']) && $data['type'] == 'register') {
            if ($accountType == 'email') {
                $findUserCount = db('user')->where('user_email', $data['username'])->count();
            } else if ($accountType == 'mobile') {
                $findUserCount = db('user')->where('mobile', $data['username'])->count();
            }

            if ($findUserCount > 0) {
                $this->error('账号已注册！');
            }
        }

        //TODO 限制 每个ip 的发送次数

        $code = cmf_get_verification_code($data['username']);
        if (empty($code)) {
            $this->error("验证码发送过多,请明天再试!");
        }

        if ($accountType == 'email') {

            $emailTemplate = cmf_get_option('email_template_verification_code');

            $user     = cmf_get_current_user();
            $username = empty($user['user_nickname']) ? $user['user_login'] : $user['user_nickname'];

            $message = htmlspecialchars_decode($emailTemplate['template']);
            $message = $this->view->display($message, ['code' => $code, 'username' => $username]);
            $subject = empty($emailTemplate['subject']) ? 'ThinkCMF验证码' : $emailTemplate['subject'];
            $result  = cmf_send_email($data['username'], $subject, $message);

            if (empty($result['error'])) {
                cmf_verification_code_log($data['username'], $code);
                $this->success("验证码已经发送成功!");
            } else {
                $this->error("邮箱验证码发送失败:" . $result['message']);
            }

        } else if ($accountType == 'mobile') {

            $param  = ['mobile' => $data['username'], 'code' => $code];
            $result = hook_one("send_mobile_verification_code", $param);

            if ($result !== false && !empty($result['error'])) {
                $this->error($result['message']);
            }

            if ($result === false) {
                $this->error('未安装验证码发送插件,请联系管理员!');
            }

            $expireTime = empty($result['expire_time']) ? 0 : $result['expire_time'];

            cmf_verification_code_log($data['username'], $code, $expireTime);

            if (!empty($result['message'])) {
                $this->success($result['message']);
            } else {
                $this->success('验证码已经发送成功!');
            }

        }


    }

}
