<?php /*a:8:{s:97:"D:\My_project\wanyue_education_web_local\education_web/themes/simpleboot3/student\detail\buy.html";i:1602491837;s:90:"D:\My_project\wanyue_education_web_local\education_web/themes/simpleboot3/public\head.html";i:1602491837;s:98:"D:\My_project\wanyue_education_web_local\education_web/themes/simpleboot3/student/public\head.html";i:1602491837;s:100:"D:\My_project\wanyue_education_web_local\education_web/themes/simpleboot3/student/public\header.html";i:1603447313;s:99:"D:\My_project\wanyue_education_web_local\education_web/themes/simpleboot3/student/public\grade.html";i:1602491837;s:99:"D:\My_project\wanyue_education_web_local\education_web/themes/simpleboot3/student/public\login.html";i:1602491837;s:100:"D:\My_project\wanyue_education_web_local\education_web/themes/simpleboot3/student/public\footer.html";i:1602666102;s:101:"D:\My_project\wanyue_education_web_local\education_web/themes/simpleboot3/student/public\scripts.html";i:1603268576;}*/ ?>
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
	
    <link href="/static/student/css/common.css" rel="stylesheet" type="text/css">
<link href="/static/swiper/swiper.min.css" rel="stylesheet" type="text/css">
<link href="/static/student/css/pick-pcc.min.1.0.1.css" rel="stylesheet" type="text/css">

    <link href="/static/student/css/detail.css" rel="stylesheet" type="text/css">
</head>
<body>
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


    <div class="detail_buy_top">
        <div class="detail_buy_top_name">
            课程名称：<?php echo $name; ?>
        </div>
        <div class="detail_buy_top_tip">支付金额:<text class="detail_buy_top_tip_m">￥<text class="detail_buy_top_tip_f"><?php echo $totalmoney; ?></text></text></div>
    </div>

    <div class="detail_buy_content">
        <ul>
            <?php if(is_array($paylist) || $paylist instanceof \think\Collection || $paylist instanceof \think\Paginator): $i = 0; $__LIST__ = $paylist;if( count($__LIST__)==0 ) : echo "" ;else: foreach($__LIST__ as $key=>$item): $mod = ($i % 2 );++$i;?>
                <li data-id="<?php echo $item['id']; ?>" data-name="<?php echo $item['name']; ?>">
                    <img class="detail_buy_content_img" src="<?php echo $item['thumb']; ?>">
                    <text class="detail_buy_content_text">
                        <?php echo $item['name']; ?>
                        <div class="detail_buy_content_text_heng none"></div>
                    </text>
                </li>
            <?php endforeach; endif; else: echo "" ;endif; ?>
        </ul>

        <div class="detail_buy_content_tips none">打开<text>微信</text>扫一扫，扫描下方二维码完成支付</div>
        <img class="detail_buy_content_tips_img none" style="display: block;margin: 0 auto;" src="">

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
        var courseid = "<?php echo $courseid; ?>"; //课程id
        var type = "<?php echo $type; ?>"; 
        var method = "<?php echo $method; ?>";
        var totalmoney = "<?php echo $totalmoney; ?>";
        var name = "<?php echo $name; ?>";
        var ismaterial =  "<?php echo $ismaterial; ?>";
    </script>
    <script src="/static/student/js/detail.js"></script>
</body>
</html>