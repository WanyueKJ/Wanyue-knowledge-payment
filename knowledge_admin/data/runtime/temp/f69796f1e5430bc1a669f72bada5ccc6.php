<?php /*a:9:{s:100:"D:\My_project\wanyue_education_web_local\education_web/themes/simpleboot3/student\mine\contlist.html";i:1602656588;s:90:"D:\My_project\wanyue_education_web_local\education_web/themes/simpleboot3/public\head.html";i:1602491837;s:98:"D:\My_project\wanyue_education_web_local\education_web/themes/simpleboot3/student/public\head.html";i:1602491837;s:100:"D:\My_project\wanyue_education_web_local\education_web/themes/simpleboot3/student/public\header.html";i:1603447313;s:99:"D:\My_project\wanyue_education_web_local\education_web/themes/simpleboot3/student/public\grade.html";i:1602491837;s:99:"D:\My_project\wanyue_education_web_local\education_web/themes/simpleboot3/student/public\login.html";i:1602491837;s:103:"D:\My_project\wanyue_education_web_local\education_web/themes/simpleboot3/student/mine/public\left.html";i:1602744930;s:100:"D:\My_project\wanyue_education_web_local\education_web/themes/simpleboot3/student/public\footer.html";i:1602666102;s:101:"D:\My_project\wanyue_education_web_local\education_web/themes/simpleboot3/student/public\scripts.html";i:1603268576;}*/ ?>
<!DOCTYPE html>
<html lang="en" class="my_html">
<head>
    <meta charset="UTF-8">
    <title><?php echo (isset($site_info['site_name']) && ($site_info['site_name'] !== '')?$site_info['site_name']:''); ?></title>

    <link rel="stylesheet" href="/static/font-awesome/css/font-awesome.min.css">
    <link rel="stylesheet" href="/static/student/css/mine/index.css">
    
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
	
    <link href="/static/student/css/common.css" rel="stylesheet" type="text/css">
<link href="/static/swiper/swiper.min.css" rel="stylesheet" type="text/css">
<link href="/static/student/css/pick-pcc.min.1.0.1.css" rel="stylesheet" type="text/css">


</head>
<body class="my_body">

<div class="common_header_nav">
    <div class="content">
        <div class="left">
            <img src="/logo.png">

            <text><?php echo $site_info['site_name']; ?></text>
        </div>
        <div class="middle">
            <ul>
                <li>
                    <a href="/student" class="olda <?php if($navid == 0): ?>on<?php endif; ?>">
                        首页
                        <div class="none <?php if($navid == 0): ?>block<?php endif; ?>"></div>
                    </a>
                </li>
                <li>
                    <a href="/student/lessionlist/index" class="olda <?php if($navid == 1): ?>on<?php endif; ?>">
                        选课中心
                        <div class="none <?php if($navid == 1): ?>block<?php endif; ?>"></div>
                    </a>
                </li>
            </ul>
        </div>
        <div class="right">
            <div class="search">
                <input id="searchval" type="text" value="<?php echo $keywords; ?>" placeholder="课程、讲师" />
                <button id="search">搜索</button>
            </div>

            <div class="login">
                <?php if($isLog == 0): ?>
                    <div class="log_or_reg">登录/注册</div>
                <?php endif; if($isLog == 1): ?>

                    <div class="login_info">
                        <img class="avatar" src="<?php echo $userinfo['avatar']; ?>">

                        <div class="drop_down none">
                            <div class="gard"><a id="gard" href="javacript:void(0);"><?php echo $userinfo['gradename']; ?></a></div>
                            <div class="li1"><a href="/student/mine/index">我的课程</a></div>
                            <div class="li2"><a id="logout" href="javacript:void(0);">退出登录</a></div>
                        </div>
                    </div>
                <?php endif; ?>

            </div>
        </div>
    </div>


</div>
<div class="common_garde <?php if($isIp == 0): ?>block<?php endif; ?>">
    <div class="content">
        <div class="tips">
            <div class="text1">请选择你想看的学习阶段</div>
            <div class="text2">随时可以更改，请放心选择</div>
        </div>
        <div class="grade">
            <div class="list">
                <?php if(is_array($list) || $list instanceof \think\Collection || $list instanceof \think\Paginator): $keyid = 0; $__LIST__ = $list;if( count($__LIST__)==0 ) : echo "" ;else: foreach($__LIST__ as $key=>$item): $mod = ($keyid % 2 );++$keyid;?>
                    <div class="left"><?php echo $item['name']; ?></div>
                    <div class="right">
                        <?php if(is_array($item['list']) || $item['list'] instanceof \think\Collection || $item['list'] instanceof \think\Paginator): $i = 0; $__LIST__ = $item['list'];if( count($__LIST__)==0 ) : echo "" ;else: foreach($__LIST__ as $key=>$item1): $mod = ($i % 2 );++$i;?>
                            <div data-id="<?php echo $item1['id']; ?>" style="cursor:pointer;" class="li <?php if($gradeid == $item1['id'] || ($gradeid == 0 && $keyid == 1 && $key == 0 && $gradeid != $item1['id'])): ?>on<?php endif; ?>"><?php echo $item1['name']; ?></div>
                        <?php endforeach; endif; else: echo "" ;endif; ?>
                    </div>
                <?php endforeach; endif; else: echo "" ;endif; ?>
            </div>
        </div>
    </div>
</div>
    <!--登录页面-->
    <div class="common_login none">
        <div class="content">
            <div class="close">
                <img class="imgx" src="/static/student/images/common/login_cha.png">
            </div>
            
            <div class="sitename">登录<?php echo $site_info['site_name']; ?>课堂</div>

            <div class="info">
                <div class="type">
                    
                    <div class="logintype">
                        <a href="javacript:void(0);">
                            <text class="c969696 black">密码登录</text>
                            <div class="heng"></div>
                        </a>
                    </div>
                    <div class="logintype">
                        <a href="javacript:void(0);">
                            <text class="c969696">验证码登录</text>
                            <div class="heng none"></div>
                        </a>
                    </div>
                </div>

                <div class="inputs">
                    <input type="text" class="input1" value="" placeholder="请输入手机号" />
                    <input type="password" class="input2" value="" placeholder="请输入密码" />
                    <div class="forget">忘记密码</div>
                </div>

                <div class="inputs1 none">
                    <input class="input3" value="" placeholder="请输入手机号" />
                    <div>
                        <input class="input4" value="" placeholder="请输入验证码" />
                        <div class="getLoginCode"><a href="javacript:void(0);" class="on">获取验证码</a></div>
                    </div>
                    <div class="forget">忘记密码</div>
                </div>


                <button class="login">登录</button>

                <div class="tips">还没有账号？<text class="goreg"><a href="javacript:void(0);" class="on">立即注册</a></text></div>

                <div class="third">
                    <?php if(in_array('wx',$configpri['login_type'])): ?>
                        <div class="li">
                            <img class="wx_img" src="/static/student/images/common/login_wx.png">
                            <div class="text">微信登录</div>
                        </div>
                    <?php endif; if(in_array('QQ',$configpri['login_type'])): ?>
                        <div class="li">
                            <img class="qq_img" src="/static/student/images/common/login_qq.png">
                            <div class="text">QQ登录</div>
                        </div>
                    <?php endif; ?>
                </div>

            </div>
        </div>
        <div class="content none">
            <div class="close">
                <img class="imgfan" src="/static/student/images/common/login_fan.png">
            </div>
            
            <div class="sitename">忘记密码</div>

            <div class="info">

                <div class="inputs3">
                    <input type="text" class="input8" value="" placeholder="请输入手机号" />
                    <div>
                        <input type="text" class="input9" value="" placeholder="请输入验证码" />
                        <div class="getForgetCode"><a href="javacript:void(0);" class="on">获取验证码</a></div>
                    </div>

                    <input type="password" class="input10" value="" placeholder="请设置密码" />
                </div>

                <button class="fortrue">确定</button>


                <div class="third" style="margin-top: 45px;">
                    <?php if(in_array('wx',$configpri['login_type'])): ?>
                        <div class="li">
                            <img class="wx_img" src="/static/student/images/common/login_wx.png">
                            <div class="text">微信登录</div>
                        </div>
                    <?php endif; if(in_array('QQ',$configpri['login_type'])): ?>
                        <div class="li">
                            <img class="qq_img" src="/static/student/images/common/login_qq.png">
                            <div class="text">QQ登录</div>
                        </div>
                    <?php endif; ?>

                </div>

            </div>
        </div>
        <div class="content none">
            <div class="close">
                <img class="imgx" src="/static/student/images/common/login_cha.png">
            </div>
            

            <div class="sitename">欢迎注册<?php echo $site_info['site_name']; ?>课堂</div>



            <div class="info">

                <div class="inputs2">
                    <input type="text" class="input5" value="" placeholder="请输入手机号" />
                    <div>
                        <input type="text" class="input6" value="" placeholder="请输入验证码" />
                        <div class="getRegCode"><a href="javacript:void(0);" class="on">获取验证码</a></div>
                    </div>

                    <input type="password" class="input7" value="" placeholder="请设置密码" />
                </div>

                <button class="reg">立即注册</button>

                <div class="tips">已有账号？<text class="gologin"><a href="javacript:void(0);" class="on">马上登陆</a></text></div>

                <div class="third">
                    <?php if(in_array('wx',$configpri['login_type'])): ?>
                        <div class="li">
                            <img class="wx_img" src="/static/student/images/common/login_wx.png">
                            <div class="text">微信登录</div>
                        </div>
                    <?php endif; if(in_array('QQ',$configpri['login_type'])): ?>
                        <div class="li">
                            <img class="qq_img" src="/static/student/images/common/login_qq.png">
                            <div class="text">QQ登录</div>
                        </div>
                    <?php endif; ?>
                </div>

            </div>
        </div>
    </div>

<div class="my_container">
    
    <div class="my_left">
        <div class="my_left_top">

            <div class="my_user">
                <img class="my_header_img"
                     src="<?php echo !empty($baseinfo['avatar']) ? $baseinfo['avatar'] : ''; ?>"
                     alt="">
                <div class="my_userinfo">
                    <p class="my_p1 line_one"><?php echo !empty($baseinfo['user_nickname']) ? $baseinfo['user_nickname'] : ''; ?></p>
                    <p class="my_p2">ID: <?php echo !empty($baseinfo['id']) ? $baseinfo['id'] : 0; ?></p>
                </div>
            </div>

            <a href="/student/mine/follows" class="attention">关注讲师 <text class="on"><?php echo !empty($baseinfo['follows']) ? $baseinfo['follows'] : ''; ?></text></a>
        </div>
        <div class="my_left_button">
            <!-- <p>
                <i aria-hidden="true">
                    <img class="mine_left_img" src="/static/student/images/mine/ifbuy.png">
                </i>
                已购买
            </p>
            <div class="<?php if($mynavid == 13): ?>my_active<?php endif; ?>"><a class="<?php if($mynavid == 13): ?>on<?php endif; ?>" href="/student/mine/mybuy?mynavid=13">全部</a></div> -->
            <p>
                <i class="fa fa-briefcase" aria-hidden="true"></i>
                我的课程
            </p>
            <div class="<?php if($mynavid == 2): ?>my_active<?php endif; ?>"><a class="<?php if($mynavid == 2): ?>on<?php endif; ?>" href="/student/mine/livelist">直播</a></div>
            <div class="<?php if($mynavid == 3): ?>my_active<?php endif; ?>"><a class="<?php if($mynavid == 3): ?>on<?php endif; ?>" href="/student/mine/contlist">内容</a></div>

            <p>
                <i class="fa fa-user" aria-hidden="true"></i>
                个人中心
            </p>
            <div class="my_geren <?php if($mynavid == 5): ?>my_active<?php endif; ?>"><a class="<?php if($mynavid == 5): ?>on<?php endif; ?>" href="/student/mine/mybase">账号设置</a></div>
            <div class="my_geren <?php if($mynavid == 6): ?>my_active<?php endif; ?>"><a class="<?php if($mynavid == 6): ?>on<?php endif; ?>" href="/student/mine/message">我的消息</a></div>

        </div>
    </div>


    <div class="my_right">
        <div class="my_right_top">
            <div class="my_right_title">我的课程</div>
        </div>
        <div class="my_right_button">
            <div class="my_content cont">
                <div class="packs">
                    <ul>
                        <?php if(is_array($bothlist) || $bothlist instanceof \think\Collection || $bothlist instanceof \think\Paginator): $i = 0; $__LIST__ = $bothlist;if( count($__LIST__)==0 ) : echo "" ;else: foreach($__LIST__ as $key=>$item): $mod = ($i % 2 );++$i;?>
                            <li>
                                <a href="/student/detail/substance?id=<?php echo $item['id']; ?>">
                                    <div class="content">
                                        <div class="top"
                                            style="background: url(<?php echo $item['thumb']; ?>) no-repeat;background-size: cover;">
                                            <div class="tip">内容</div>
                                        </div>
                                        <div class="title"><?php echo $item['name']; ?></div>
                                        <div class="information">
                                            <text class="text1"><?php echo $item['lesson']; ?></text>
                                        </div>
                                        <div class="bottom">
                                            <img class="img1" src="<?php echo !empty($item['avatar']) ? $item['avatar'] : ''; ?>">
                                            <span><?php echo $item['user_nickname']; ?></span>
                                            <?php if($item['paytype'] == 0): ?>
                                                <text class="mian">免费</text>
                                            <?php endif; if($item['paytype'] == 1): ?>
                                                <text class="money">已付费</text>
                                            <?php endif; if($item['paytype'] == 2): ?>
                                                <text class="mi">密码</text>
                                            <?php endif; ?>  
                                        </div>
                                    </div>
                                </a>
                            </li>
                        <?php endforeach; endif; else: echo "" ;endif; ?>
                    </ul>

                    <?php if($isMore0 == 1): ?>
                        <div class="look_more"><a style="color:#9e9a9a" href="javacript:void(0);">查看更多...</a></div>
                    <?php endif; ?>

                </div>
            </div>
        </div>
    </div>
</div>

<div class="common_footer">
    <div class="content">
        <div class="left">
            <img src="/logo.png">
            <div class="text"><?php echo $site_info['site_name']; ?></div>
        </div>
        <div class="next">
            <div class="text">APP下载</div>
            <img src="<?php echo $site_info['qr_url']; ?>">
        </div>
        <div class="middle">
            <div class="text">官方微信</div>
            <img src="<?php echo $site_info['wx_url']; ?>">
        </div>
        <div class="right">
            <img src="/static/student/images/common/footer_phone.png">
            <div class="text1"><?php echo $site_info['site_phone']; ?></div>
            <div class="text2">周一至周日 9:00-20:00</div>
        </div>
    </div>

    <div class="you_url">
        <div class="li"><text>友情链接</text></div>
        <div class="li"><text>友情链接</text></div>
        <div class="li"><text>友情链接</text></div>
        <div class="li"><text>友情链接</text></div>
        <div class="li"><text>友情链接</text></div>
        <div class="li"><text>友情链接</text></div>
        <div class="li"><text>友情链接</text></div>
        <div class="li" style="border: 0;"><text>友情链接</text></div>

    </div>
    <div class="copyright">
        版权信息 <?php echo $site_info['copyright']; ?>
    </div>
</div>
<script>
    var __SITEURL__ = "<?php echo $site_info['site_url']; ?>";
    var __SITEINFO__ = <?php echo $site_infoj; ?>;
    var userinfoj = <?php echo $userinfoj; ?>; //用户信息

</script>
<script src="/static/js/layer/layer.js"></script>
<script src="/static/student/js/common.js"></script>
<script src="/static/swiper/swiper.min.js"></script>



<script>
    var page = 1;//页码
</script>

<script src="/static/student/js/mine/index.js"></script>

</body>
</html>