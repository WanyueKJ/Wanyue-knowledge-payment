<?php /*a:9:{s:98:"D:\My_project\wanyue_education_web_local\education_web/themes/simpleboot3/student\detail\live.html";i:1603270524;s:90:"D:\My_project\wanyue_education_web_local\education_web/themes/simpleboot3/public\head.html";i:1602491837;s:98:"D:\My_project\wanyue_education_web_local\education_web/themes/simpleboot3/student/public\head.html";i:1602491837;s:100:"D:\My_project\wanyue_education_web_local\education_web/themes/simpleboot3/student/public\header.html";i:1603447313;s:99:"D:\My_project\wanyue_education_web_local\education_web/themes/simpleboot3/student/public\grade.html";i:1602491837;s:99:"D:\My_project\wanyue_education_web_local\education_web/themes/simpleboot3/student/public\login.html";i:1602491837;s:98:"D:\My_project\wanyue_education_web_local\education_web/themes/simpleboot3/student/public\addr.html";i:1602491837;s:100:"D:\My_project\wanyue_education_web_local\education_web/themes/simpleboot3/student/public\footer.html";i:1602666102;s:101:"D:\My_project\wanyue_education_web_local\education_web/themes/simpleboot3/student/public\scripts.html";i:1603268576;}*/ ?>
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
    <div class="common_addr none">
    <div class="common_addr_content">
        <div class="common_addr_content_top">
            <text>收货地址</text>
            <text class="common_addr_content_top_tips">（请如实填写，课程教材将以此地址邮寄）</text>
            <img class="common_addr_content_top_img" src="/static/student/images/common/black_cha.png">
        </div>
        <div>
            <form id="addr">
                <div class="common_addr_content_li" style="margin-top: 30px;">
                    <text class="common_addr_content_li_xing" style="position: relative;bottom: 14px;">*</text>
                    <text class="common_addr_content_li_text" style="position: relative;bottom: 14px;">地址信息：</text>

                    <a href="javascript:void(0)" style="display: inline-block;font-size: 15px;" class="pick-area pick-area1" name="省/市/区"></a>

                    <!-- <input class="common_addr_content_li_input" readonly type="text" placeholder="选择省/市/区"> -->
                </div>
                <div class="common_addr_content_li">
                    <text class="common_addr_content_li_xing" style="position: relative;bottom: 55px;">*</text>
                    <text class="common_addr_content_li_text" style="position: relative;bottom: 55px;">详细地址：</text>
                    <textarea class="common_addr_content_li_textarea" name="textarea" placeholder="请输入详细地址，如道路、门牌号、小区、楼栋号、单元等信息"></textarea>
                </div>
                <div class="common_addr_content_li">
                    <text class="common_addr_content_li_xing" style="margin-left: 35px;">*</text>
                    <text class="common_addr_content_li_text">收货人姓名：</text>
                    <input class="common_addr_content_li_input" type="text" name="name" placeholder="请填写姓名" value="">
                </div>
                <div class="common_addr_content_li">
                    <text class="common_addr_content_li_xing">*</text>
                    <text class="common_addr_content_li_text">手机号码：</text>
                    <input class="common_addr_content_li_input" type="text" name="phone" placeholder="请填写手机号码" value="">
                </div>

                <button class="common_addr_content_sub" type="button">确认地址</button>
            </form>
            
        </div>
    </div>
</div>


    <div class="detail_live">
        <div class="top">
            <div class="content">
                <div class="thumb" style="background: url(<?php echo $info['thumb']; ?>) no-repeat;background-size: cover;">
                    <div class="zhe">

                        <?php if($info['islive'] == 0): ?>
                            <button>直播还未开始</button>
                        <?php elseif($info['islive'] == 1): ?>
                            <button>正在直播</button>
                        <?php else: if($info['sort'] == 1): ?>
                                <button>观看回放</button>
                            <?php else: ?>
                                <button>直播结束</button>
                            <?php endif; ?>
                        <?php endif; ?>
                        
                    </div>
                </div>
                <div class="msg">
                    <div class="des"><?php echo $info['name']; ?></div>
                    <div class="msgnum">
                        <text><?php echo $info['lesson']; ?></text>
                        <text> | </text>
                        <text><?php echo $info['views']; ?>人在学</text>
                    </div>
                    <div class="tmsg">
                        
                        <span class="msg0">
                            <img src="<?php echo $info['userinfo']['avatar']; ?>">
                            <span>
                                <div class="avatar"><?php echo $info['userinfo']['user_nickname']; ?></div>
                                <div class="tip">主讲老师</div>
                            </span>
                            
                        </span>
                        <?php if($info['tutor'] != []): ?>
                            <span class="msg1">
                                <img src="<?php echo $info['tutor'][0]['avatar']; ?>">
                                <span>
                                    <div class="avatar"><?php echo $info['tutor'][0]['user_nickname']; ?></div>
                                    <div class="tip">辅导老师</div>
                                </span>
                            </span>
                        <?php endif; ?>
                    </div>
                    <?php if($info['ifbuy'] == 1): ?>
                        <div class="money">已付费</div>

                        <!-- <?php if($info['islive'] == 1 || ($info['sort'] == 1 && $info['islive'] == 2)): ?>
                            <button class="enterlive">进入直播间</button>
                        <?php endif; ?> -->
                        <button class="enterlive">进入直播间</button>
                    <?php else: if($info['paytype'] == 0): ?>
                            <div class="mian"><?php echo $info['payval']; ?></div>
                        <?php elseif($info['paytype'] == 1): ?>
                            <div class="money">￥<text><?php echo $info['payval']; ?></text></div>
                        <?php else: ?>
                            <div class="mi"><?php echo $info['payval']; ?></div>
                        <?php endif; if($info['paytype'] == 1 && $info['ifbuy'] == 0): ?>
                            <button class="goBuy">立即购买</button>
                        <?php endif; if(($info['paytype'] == 1 && $info['ifbuy'] == 1) || $info['paytype'] == 0 || $info['paytype'] == 2): ?>

                            <button class="enterlive">进入直播间</button>
                           
                        <?php endif; ?>
                        
                    <?php endif; ?>

                </div>
            </div>
        </div>
        <div class="bcontent">
            <div class="nav">
                <a class="text js b_fff" href="javascript:void(0);">介绍</a>
            </div>
            <div class="area1">
                <div class="tip">
                    <text>直播介绍</text>
                </div>
                <div class="detail">
                    <?php echo $info['info']; ?>
                </div>
                <div class="tip">
                    <text>讲师介绍</text>
                </div>
                <div class="teacherinfo">
                    <a href="/student/teachers/detail?touid=<?php echo $info['userinfo']['id']; ?>"><img class="avatar" src="<?php echo $info['userinfo']['avatar']; ?>"></a>
                    <div class="info">
                        <div class="name">
                            <text><?php echo $info['userinfo']['user_nickname']; ?></text>
                            <text class="text1">主讲老师</text>
                        </div>
                        <div class="textarea1">
                            <?php echo $info['userinfo']['experience']; ?>
                        </div>
                    </div>
                </div>
                    <?php if($info['tutor'] != []): ?>
                    <div class="teacherinfo">
                        <a href="/student/teachers/detail?touid=<?php echo $info['tutor'][0]['id']; ?>"><img class="avatar" src="<?php echo $info['tutor'][0]['avatar']; ?>"></a>
                        <div class="info">
                            <div class="name">
                                <text><?php echo $info['tutor'][0]['user_nickname']; ?></text>
                                <text class="text1">辅导老师</text>
                            </div>
                            <div class="textarea1">
                                <?php echo $info['tutor'][0]['experience']; ?>
                            </div>
                        </div>
                    </div>
                <?php endif; ?>
            </div>
            <div class="area3 none">

            </div>

        </div>
    </div>

    
    <div class="common_zhe none">

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


    <script src="/static/student/js/pick-pcc.min.1.0.1.js"></script>
    <script>
        $(".pick-area1").pickArea();
    </script>
    <script type="text/javascript">
        var courseid = "<?php echo $info['id']; ?>"; //课程id
        var liveuid = "<?php echo $info['uid']; ?>";//老师id
        var star = 0;//星级
        var page = 1;//分页
        var type = 0;//0课程 1套餐
        var method = 0;//0直接购买 1购物车
        var totalmoney = "<?php echo $info['payval']; ?>";//价格
        var name = "<?php echo $info['name']; ?>";//名称
        var ismaterial =  "<?php echo $info['ismaterial']; ?>"; //是否含有教材
        var paytype =  "<?php echo $info['paytype']; ?>"; //
        var ifbuy =  "<?php echo $info['ifbuy']; ?>"; //

    </script>
    <script src="/static/student/js/detail.js"></script>
</body>
</html>
