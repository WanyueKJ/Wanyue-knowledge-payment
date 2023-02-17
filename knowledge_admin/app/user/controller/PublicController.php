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

use app\user\model\UserModel;
use cmf\controller\HomeBaseController;

class PublicController extends HomeBaseController
{

    // 用户头像api
    public function avatar()
    {
        $id   = $this->request->param("id", 0, "intval");
        $user = UserModel::get($id);

        $avatar = '';
        if (!empty($user)) {
            $avatar = cmf_get_user_avatar_url($user['avatar']);
            if (strpos($avatar, "/") === 0) {
                $avatar = $this->request->domain() . $avatar;
            }
        }

        if (empty($avatar)) {
            $cdnSettings = cmf_get_option('cdn_settings');
            if (empty($cdnSettings['cdn_static_root'])) {
                $avatar = $this->request->domain() . "/static/images/headicon.png";
            } else {
                $cdnStaticRoot = rtrim($cdnSettings['cdn_static_root'], '/');
                $avatar        = $cdnStaticRoot . "/static/images/headicon.png";
            }

        }

        return redirect($avatar);
    }

}
