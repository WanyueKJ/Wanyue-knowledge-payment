<?php /*a:2:{s:74:"/www/wwwroot/demo.sdwanyue.com/themes/simpleboot3/teacher/login/index.html";i:1607590466;s:66:"/www/wwwroot/demo.sdwanyue.com/themes/simpleboot3/public/head.html";i:1602491838;}*/ ?>
<!DOCTYPE html>
<html>
<head>
    <title>讲师登录 <?php echo (isset($site_info['site_name']) && ($site_info['site_name'] !== '')?$site_info['site_name']:''); ?></title>
    
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
	
    <link href="/static/teacher/css/login.css" rel="stylesheet" type="text/css">
</head>
<body>
    <div class="t_logo">
        <img src='/static/teacher/images/logo.png'> <?php echo (isset($site_info['site_name']) && ($site_info['site_name'] !== '')?$site_info['site_name']:''); ?>
    </div>
    <div class="t_login clearfix">
        <div class="t_login_l">
            <div class="title"><?php echo (isset($site_info['site_name']) && ($site_info['site_name'] !== '')?$site_info['site_name']:''); ?></div>
            <div class="des">在线教育，我们更专业！</div>
        </div>
        <div class="t_login_r">
            <div class="t_login_b t_login_b_l">
                <div class="t_login_tab">
                    <ul>
                        <li class="on">密码登录</li>
                        <li>验证码登录</li>
                    </ul>
                </div>
                <div class="t_login_tab_bd">
                    <div class="t_login_input">
                        <input type="text" id="js_l_name" placeholder="请输入手机号" value="13866666666">
                    </div>
                    
                    <div class="t_login_input">
                        <input type="password" id="js_l_pass" placeholder="请输入密码" value="123456">
                    </div>
                    
                    <div class="t_login_tip">
                        <span class="js_l_forget">忘记密码</span>
                    </div>
                    
                    <div class="t_login_btn js_login_l">
                        登录
                    </div>
                    
                </div>
                
                <div class="t_login_tab_bd hide">
                    <div class="t_login_input">
                        <input type="text" id="js_m_name" placeholder="请输入手机号">
                    </div>
                    
                    <div class="t_login_input t_login_c">
                        <input type="text" id="js_m_code" placeholder="请输入验证码">
                        <span id="js_m_getcode">获取验证码</span>
                    </div>
                    
                    <div class="t_login_tip">
                        <span class="js_l_forget">忘记密码</span>
                    </div>
                    
                    <div class="t_login_btn js_login_m">
                        登录
                    </div>
                    
                </div>
            </div>
            <div class="t_login_b t_login_b_f hide">
                <div class="t_login_tab">
                    <ul>
                        <li>重置密码</li>
                    </ul>
                </div>
                <div class="t_login_tab_bd">
                    <div class="t_login_input">
                        <input type="text" id="js_f_name" placeholder="请输入手机号">
                    </div>
                    
                    <div class="t_login_input t_login_c">
                        <input type="text" id="js_f_code" placeholder="请输入验证码">
                        <span id="js_f_getcode">获取验证码</span>
                    </div>
                    
                    <div class="t_login_input">
                        <input type="password" id="js_f_pass" placeholder="请设置密码">
                    </div>
                    
                    <div class="t_login_tip">
                        <span class="js_l_login">立刻登录</span>
                    </div>
                    
                    <div class="t_login_btn js_login_f">
                        确定
                    </div>
                    
                </div>
            </div>
            <div class="t_login_t">
                <ul>
                    <?php if(in_array('wx',$configpri['login_type'])): ?>
                    <li>
                        <a href="/teacher/login/weixin">
                            <div class="td_i">
                                <img src="/static/teacher/images/wx.png">
                            </div>
                            <div class="td_t">
                                微信登录
                            </div>
                        </a>
                    </li>
                    <?php endif; if(in_array('QQ',$configpri['login_type'])): ?>
                    <li>
                        <a href="/teacher/login/qq">
                            <div class="td_i">
                                <img src="/static/teacher/images/qq.png">
                            </div>
                            <div class="td_t">
                                QQ登录
                            </div>
                        </a>
                    </li>
                    <?php endif; ?>
                </ul>
            </div>
        </div>
    </div>
    <div class="t_copyright">
        <?php echo nl2br($site_info['copyright']); ?>
    </div>
    <script src="/static/teacher/js/login.js"></script>
</body>
</html>
