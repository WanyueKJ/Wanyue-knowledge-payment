<?php /*a:7:{s:76:"/www/wwwroot/demo.sdwanyue.com/themes/simpleboot3/teacher/account/index.html";i:1602491838;s:66:"/www/wwwroot/demo.sdwanyue.com/themes/simpleboot3/public/head.html";i:1602491838;s:74:"/www/wwwroot/demo.sdwanyue.com/themes/simpleboot3/teacher/public/head.html";i:1602491838;s:76:"/www/wwwroot/demo.sdwanyue.com/themes/simpleboot3/teacher/public/header.html";i:1602491838;s:79:"/www/wwwroot/demo.sdwanyue.com/themes/simpleboot3/teacher/public/left_menu.html";i:1602734310;s:76:"/www/wwwroot/demo.sdwanyue.com/themes/simpleboot3/teacher/public/footer.html";i:1602491838;s:77:"/www/wwwroot/demo.sdwanyue.com/themes/simpleboot3/teacher/public/scripts.html";i:1602491838;}*/ ?>
<!DOCTYPE html>
<html>
<head>
    <title><?php echo (isset($site_info['site_name']) && ($site_info['site_name'] !== '')?$site_info['site_name']:''); ?></title>
    
<meta charset="utf-8">
<meta http-equiv="X-UA-Compatible" content="IE=edge">
<meta name="viewport" content="width=device-width, initial-scale=1, maximum-scale=1, user-scalable=no">

<!-- Set render engine for 360 browser -->
<meta name="renderer" content="webkit">

<!-- No Baidu Siteapp-->
<meta http-equiv="Cache-Control" content="no-siteapp"/>

<!-- HTML5 shim for IE8 support of HTML5 elements -->
<!--[if lt IE 9]>
<script src="https://oss.maxcdn.com/libs/html5shiv/3.7.0/html5shiv.js"></script>
<![endif]-->
<link rel="icon" href="/favicon.png" type="image/png">
<link rel="shortcut icon" href="/favicon.png" type="image/png">
<link href="/static/home/css/common.css" rel="stylesheet" type="text/css">
<script type="text/javascript">
    //全局变量
    var GV = {
        ROOT: "/",
        WEB_ROOT: "/",
        JS_ROOT: "static/js/"
    };
</script>
<script src="/static/js/jquery.js"></script>
<script src="/static/js/wind.js"></script>
	
    <link href="/static/teacher/css/common.css?t=1597803906" rel="stylesheet" type="text/css">
    <link href="/static/teacher/css/account.css?t=1587548987" rel="stylesheet" type="text/css">
</head>
<body>
    <div class="t_contain">
        
<div class="t_header">
    <div class="t_header_logo">
        <img src="/logo.png"> <?php echo (isset($site_info['site_name']) && ($site_info['site_name'] !== '')?$site_info['site_name']:''); ?>
    </div>
    <div class="t_header_c">
        <span class="t_header_c_img"></span>
        <div class="t_header_c_bd">
            <ul>
                <li><a href="/teacher/index/index">回到首页</a></li>
                <li><a href="javascript:void()" class="js_logout">退出登录</a></li>
            </ul>
        </div>
    </div>
    <div class="t_header_u">
        <img src="<?php echo $userinfo['avatar']; ?>"> <?php echo $userinfo['user_nickname']; ?>
    </div>
</div>
        <div class="t_contain_bd">
            <div class="t_left">
    <ul>
        <li <?php if($cur == 'index'): ?>class="on"<?php endif; ?>>
            <a href="/teacher/index/index">
                <span class="span1"></span> 首页
            </a>
        </li>
        <li <?php if($cur == 'live'): ?>class="on"<?php endif; ?>>
            <a href="/teacher/live/index">
            <span class="span2"></span> 直播课堂
            </a>
        </li>

        <!-- <li>
            <a href="">
                <span class="span4"></span> 内容
            </a>
        </li> -->
        <li <?php if($cur == 'account'): ?>class="on"<?php endif; ?>>
            <a href="/teacher/account/index">
                <span class="span6"></span> 账号
            </a>
        </li>
    </ul>
</div>
            <div class="t_right">
                <div class="a_bd">
                    <div class="a_bd_t">账号详情</div>
                    <div class="a_bd_c">
                        <div class="a_bd_c_t">个人信息</div>
                        <div class="a_bd_c_line">
                            <div class="a_bd_c_line_l">头像</div>
                            <div class="a_bd_c_line_c"><img src="<?php echo $userinfo['avatar']; ?>" id="js_avatar"></div>
                            <div class="a_bd_c_line_r"><span id="js_m_avatar">更换</span></div>
                        </div>
                        <div class="a_bd_c_line">
                            <div class="a_bd_c_line_l">昵称</div>
                            <div class="a_bd_c_line_c"><?php echo $userinfo['user_nickname']; ?></div>
                            <div class="a_bd_c_line_r"><span id="js_m_name">修改</span></div>
                        </div>
                        <!-- <div class="a_bd_c_line">
                            <div class="a_bd_c_line_l">手机号</div>
                            <div class="a_bd_c_line_c"><?php echo $userinfo['mobile']; ?></div>
                            <div class="a_bd_c_line_r"><span id="js_m_mobile">修改</span></div>
                        </div>
                        <div class="a_bd_c_line">
                            <div class="a_bd_c_line_l">密码</div>
                            <div class="a_bd_c_line_c">************</div>
                            <div class="a_bd_c_line_r"><span id="js_m_pass">修改密码</span></div>
                        </div> -->
                    </div>
                </div>
            </div>
        </div>
        <div id="upload" style="display:none;"></div>
    </div>
    
    <script src="/static/teacher/js/common.js?t=1587004493"></script>
    <script src="/static/teacher/js/account.js?t=1587548987"></script>
</body>
</html>
