<?php /*a:9:{s:103:"D:\My_project\wanyue_education_web_local\education_web/themes/simpleboot3/student\detail\substance.html";i:1604285577;s:90:"D:\My_project\wanyue_education_web_local\education_web/themes/simpleboot3/public\head.html";i:1602491837;s:98:"D:\My_project\wanyue_education_web_local\education_web/themes/simpleboot3/student/public\head.html";i:1602491837;s:100:"D:\My_project\wanyue_education_web_local\education_web/themes/simpleboot3/student/public\header.html";i:1603447313;s:99:"D:\My_project\wanyue_education_web_local\education_web/themes/simpleboot3/student/public\grade.html";i:1602491837;s:99:"D:\My_project\wanyue_education_web_local\education_web/themes/simpleboot3/student/public\login.html";i:1602491837;s:98:"D:\My_project\wanyue_education_web_local\education_web/themes/simpleboot3/student/public\addr.html";i:1602491837;s:100:"D:\My_project\wanyue_education_web_local\education_web/themes/simpleboot3/student/public\footer.html";i:1602666102;s:101:"D:\My_project\wanyue_education_web_local\education_web/themes/simpleboot3/student/public\scripts.html";i:1603268576;}*/ ?>
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
    //ćšć±ćé
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
                        éŠéĄ”
                        <div class="none <?php if($navid == 0): ?>block<?php endif; ?>"></div>
                    </a>
                </li>
                <li>
                    <a href="/student/lessionlist/index" class="olda <?php if($navid == 1): ?>on<?php endif; ?>">
                        éèŻŸäž­ćż
                        <div class="none <?php if($navid == 1): ?>block<?php endif; ?>"></div>
                    </a>
                </li>
            </ul>
        </div>
        <div class="right">
            <div class="search">
                <input id="searchval" type="text" value="<?php echo $keywords; ?>" placeholder="èŻŸçšăèźČćž" />
                <button id="search">æçŽą</button>
            </div>

            <div class="login">
                <?php if($isLog == 0): ?>
                    <div class="log_or_reg">ç»ćœ/æłšć</div>
                <?php endif; if($isLog == 1): ?>

                    <div class="login_info">
                        <img class="avatar" src="<?php echo $userinfo['avatar']; ?>">

                        <div class="drop_down none">
                            <div class="gard"><a id="gard" href="javacript:void(0);"><?php echo $userinfo['gradename']; ?></a></div>
                            <div class="li1"><a href="/student/mine/index">æçèŻŸçš</a></div>
                            <div class="li2"><a id="logout" href="javacript:void(0);">éćșç»ćœ</a></div>
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
            <div class="text1">èŻ·éæ©äœ æłççć­Šäč é¶æź”</div>
            <div class="text2">éæ¶ćŻä»„æŽæčïŒèŻ·æŸćżéæ©</div>
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
        <!--ç»ćœéĄ”éą-->
    <div class="common_login none">
        <div class="content">
            <div class="close">
                <img class="imgx" src="/static/student/images/common/login_cha.png">
            </div>
            
            <div class="sitename">ç»ćœ<?php echo $site_info['site_name']; ?>èŻŸć </div>

            <div class="info">
                <div class="type">
                    
                    <div class="logintype">
                        <a href="javacript:void(0);">
                            <text class="c969696 black">ćŻç ç»ćœ</text>
                            <div class="heng"></div>
                        </a>
                    </div>
                    <div class="logintype">
                        <a href="javacript:void(0);">
                            <text class="c969696">éȘèŻç ç»ćœ</text>
                            <div class="heng none"></div>
                        </a>
                    </div>
                </div>

                <div class="inputs">
                    <input type="text" class="input1" value="" placeholder="èŻ·èŸć„ææșć·" />
                    <input type="password" class="input2" value="" placeholder="èŻ·èŸć„ćŻç " />
                    <div class="forget">ćżèź°ćŻç </div>
                </div>

                <div class="inputs1 none">
                    <input class="input3" value="" placeholder="èŻ·èŸć„ææșć·" />
                    <div>
                        <input class="input4" value="" placeholder="èŻ·èŸć„éȘèŻç " />
                        <div class="getLoginCode"><a href="javacript:void(0);" class="on">è·ćéȘèŻç </a></div>
                    </div>
                    <div class="forget">ćżèź°ćŻç </div>
                </div>


                <button class="login">ç»ćœ</button>

                <div class="tips">èżæČĄæèŽŠć·ïŒ<text class="goreg"><a href="javacript:void(0);" class="on">ç«ćłæłšć</a></text></div>

                <div class="third">
                    <?php if(in_array('wx',$configpri['login_type'])): ?>
                        <div class="li">
                            <img class="wx_img" src="/static/student/images/common/login_wx.png">
                            <div class="text">ćŸźäżĄç»ćœ</div>
                        </div>
                    <?php endif; if(in_array('QQ',$configpri['login_type'])): ?>
                        <div class="li">
                            <img class="qq_img" src="/static/student/images/common/login_qq.png">
                            <div class="text">QQç»ćœ</div>
                        </div>
                    <?php endif; ?>
                </div>

            </div>
        </div>
        <div class="content none">
            <div class="close">
                <img class="imgfan" src="/static/student/images/common/login_fan.png">
            </div>
            
            <div class="sitename">ćżèź°ćŻç </div>

            <div class="info">

                <div class="inputs3">
                    <input type="text" class="input8" value="" placeholder="èŻ·èŸć„ææșć·" />
                    <div>
                        <input type="text" class="input9" value="" placeholder="èŻ·èŸć„éȘèŻç " />
                        <div class="getForgetCode"><a href="javacript:void(0);" class="on">è·ćéȘèŻç </a></div>
                    </div>

                    <input type="password" class="input10" value="" placeholder="èŻ·èźŸçœźćŻç " />
                </div>

                <button class="fortrue">çĄźćź</button>


                <div class="third" style="margin-top: 45px;">
                    <?php if(in_array('wx',$configpri['login_type'])): ?>
                        <div class="li">
                            <img class="wx_img" src="/static/student/images/common/login_wx.png">
                            <div class="text">ćŸźäżĄç»ćœ</div>
                        </div>
                    <?php endif; if(in_array('QQ',$configpri['login_type'])): ?>
                        <div class="li">
                            <img class="qq_img" src="/static/student/images/common/login_qq.png">
                            <div class="text">QQç»ćœ</div>
                        </div>
                    <?php endif; ?>

                </div>

            </div>
        </div>
        <div class="content none">
            <div class="close">
                <img class="imgx" src="/static/student/images/common/login_cha.png">
            </div>
            

            <div class="sitename">æŹąèżæłšć<?php echo $site_info['site_name']; ?>èŻŸć </div>



            <div class="info">

                <div class="inputs2">
                    <input type="text" class="input5" value="" placeholder="èŻ·èŸć„ææșć·" />
                    <div>
                        <input type="text" class="input6" value="" placeholder="èŻ·èŸć„éȘèŻç " />
                        <div class="getRegCode"><a href="javacript:void(0);" class="on">è·ćéȘèŻç </a></div>
                    </div>

                    <input type="password" class="input7" value="" placeholder="èŻ·èźŸçœźćŻç " />
                </div>

                <button class="reg">ç«ćłæłšć</button>

                <div class="tips">ć·ČæèŽŠć·ïŒ<text class="gologin"><a href="javacript:void(0);" class="on">é©Źäžç»é</a></text></div>

                <div class="third">
                    <?php if(in_array('wx',$configpri['login_type'])): ?>
                        <div class="li">
                            <img class="wx_img" src="/static/student/images/common/login_wx.png">
                            <div class="text">ćŸźäżĄç»ćœ</div>
                        </div>
                    <?php endif; if(in_array('QQ',$configpri['login_type'])): ?>
                        <div class="li">
                            <img class="qq_img" src="/static/student/images/common/login_qq.png">
                            <div class="text">QQç»ćœ</div>
                        </div>
                    <?php endif; ?>
                </div>

            </div>
        </div>
    </div>
    <div class="common_addr none">
    <div class="common_addr_content">
        <div class="common_addr_content_top">
            <text>æ¶èŽ§ć°ć</text>
            <text class="common_addr_content_top_tips">ïŒèŻ·ćŠćźćĄ«ćïŒèŻŸçšææć°ä»„æ­€ć°ćéźćŻïŒ</text>
            <img class="common_addr_content_top_img" src="/static/student/images/common/black_cha.png">
        </div>
        <div>
            <form id="addr">
                <div class="common_addr_content_li" style="margin-top: 30px;">
                    <text class="common_addr_content_li_xing" style="position: relative;bottom: 14px;">*</text>
                    <text class="common_addr_content_li_text" style="position: relative;bottom: 14px;">ć°ćäżĄæŻïŒ</text>

                    <a href="javascript:void(0)" style="display: inline-block;font-size: 15px;" class="pick-area pick-area1" name="ç/ćž/ćș"></a>

                    <!-- <input class="common_addr_content_li_input" readonly type="text" placeholder="éæ©ç/ćž/ćș"> -->
                </div>
                <div class="common_addr_content_li">
                    <text class="common_addr_content_li_xing" style="position: relative;bottom: 55px;">*</text>
                    <text class="common_addr_content_li_text" style="position: relative;bottom: 55px;">èŻŠç»ć°ćïŒ</text>
                    <textarea class="common_addr_content_li_textarea" name="textarea" placeholder="èŻ·èŸć„èŻŠç»ć°ćïŒćŠéè·Żăéšçć·ăć°ćșăæ„Œæ ć·ăććç­äżĄæŻ"></textarea>
                </div>
                <div class="common_addr_content_li">
                    <text class="common_addr_content_li_xing" style="margin-left: 35px;">*</text>
                    <text class="common_addr_content_li_text">æ¶èŽ§äșșć§ćïŒ</text>
                    <input class="common_addr_content_li_input" type="text" name="name" placeholder="èŻ·ćĄ«ćć§ć" value="">
                </div>
                <div class="common_addr_content_li">
                    <text class="common_addr_content_li_xing">*</text>
                    <text class="common_addr_content_li_text">ææșć·ç ïŒ</text>
                    <input class="common_addr_content_li_input" type="text" name="phone" placeholder="èŻ·ćĄ«ćææșć·ç " value="">
                </div>

                <button class="common_addr_content_sub" type="button">çĄźèź€ć°ć</button>
            </form>
            
        </div>
    </div>
</div>


    <div class="detail_substance">
        <div class="top">
            <div class="content">
                <img class="thumb" src="<?php echo $info['thumb']; ?>">
                <div class="msg">
                    <div class="des">
                        <?php echo $info['name']; ?> 
                        <text><?php echo $info['lesson']; ?></text>
                    </div>
                    <div class="msgnum">
                        <text><?php echo $info['views']; ?>äșșćšć­Š</text>
                    </div>
                    <div class="tmsg">
                        
                        <span class="msg0">
                            <img src="<?php echo $info['userinfo']['avatar']; ?>">
                            <span>
                                <div class="avatar"><?php echo $info['userinfo']['user_nickname']; ?></div>
                                <div class="tip">äž»èźČèćž</div>
                            </span>
                            
                        </span>
                        <?php if($info['tutor'] != []): ?>
                            <span class="msg1">
                                <img src="<?php echo $info['tutor'][0]['avatar']; ?>">
                                <span>
                                    <div class="avatar"><?php echo $info['tutor'][0]['user_nickname']; ?></div>
                                    <div class="tip">èŸćŻŒèćž</div>
                                </span>
                            </span>
                        <?php endif; ?>
                    </div>
                    <?php if($info['ifbuy'] == 1): ?>
                        <div class="money">ć·Čä»èŽč</div>

                        <button class="enterlive"><a class="white" href="/student/detail/substancestudy?courseid=<?php echo $info['id']; ?>">æ„çèŻŠæ</a></button>
                    <?php else: if($info['paytype'] == 0): ?>
                            <div class="mian"><?php echo $info['payval']; ?></div>
                        <?php elseif($info['paytype'] == 1): ?>
                            <div class="money">ïż„<text><?php echo $info['payval']; ?></text></div>
                        <?php else: ?>
                            <div class="mi"><?php echo $info['payval']; ?></div>
                        <?php endif; if($info['paytype'] == 1 && $info['ifbuy'] == 0 && $info['trialtype'] == 0): ?>

                            <button class="goBuy">ç«ćłèŽ­äč°</button>
                        <?php endif; if(($info['paytype'] == 1 && $info['ifbuy'] == 1) || $info['paytype'] == 0 || $info['paytype'] == 2 || $info['trialtype'] != 0): if($info['paytype'] == 2): ?>
                                <button class="enterlive tanWp">æ„çèŻŠæ</button>
                            <?php else: ?>
                                <button class="enterlive"><a class="white" href="/student/detail/substancestudy?courseid=<?php echo $info['id']; ?>">æ„çèŻŠæ</a></button>
                            <?php endif; ?>

                        <?php endif; ?>
                        
                    <?php endif; ?>

                </div>
            </div>
        </div>
        <div class="bcontent">
            <div class="nav">
                <a class="text js b_fff" href="javascript:void(0);">ä»ç»</a>
            </div>
            <div class="area1">
                <div class="tip">
                    <text>ććźčä»ç»</text>
                </div>
                <div class="detail">
                    <?php echo $info['info']; ?>
                </div>
                <div class="tip">
                    <text>èźČćžä»ç»</text>
                </div>
                <div class="teacherinfo">
                    <a href="/student/teachers/detail?touid=<?php echo $info['userinfo']['id']; ?>"><img class="avatar" src="<?php echo $info['userinfo']['avatar']; ?>"></a>
                    <div class="info">
                        <div class="name">
                            <text><?php echo $info['userinfo']['user_nickname']; ?></text>
                            <text class="text1">äž»èźČèćž</text>
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
                                <text class="text1">èŸćŻŒèćž</text>
                            </div>
                            <div class="textarea1">
                                <?php echo $info['tutor'][0]['experience']; ?>
                            </div>
                        </div>
                    </div>
                <?php endif; ?>
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
            <div class="text">APPäžèœœ</div>
            <img src="<?php echo $site_info['qr_url']; ?>">
        </div>
        <div class="middle">
            <div class="text">ćźæčćŸźäżĄ</div>
            <img src="<?php echo $site_info['wx_url']; ?>">
        </div>
        <div class="right">
            <img src="/static/student/images/common/footer_phone.png">
            <div class="text1"><?php echo $site_info['site_phone']; ?></div>
            <div class="text2">ćšäžèłćšæ„ 9:00-20:00</div>
        </div>
    </div>

    <div class="you_url">
        <div class="li"><text>ćæéŸæ„</text></div>
        <div class="li"><text>ćæéŸæ„</text></div>
        <div class="li"><text>ćæéŸæ„</text></div>
        <div class="li"><text>ćæéŸæ„</text></div>
        <div class="li"><text>ćæéŸæ„</text></div>
        <div class="li"><text>ćæéŸæ„</text></div>
        <div class="li"><text>ćæéŸæ„</text></div>
        <div class="li" style="border: 0;"><text>ćæéŸæ„</text></div>

    </div>
    <div class="copyright">
        çæäżĄæŻ <?php echo $site_info['copyright']; ?>
    </div>
</div>
    <script>
    var __SITEURL__ = "<?php echo $site_info['site_url']; ?>";
    var __SITEINFO__ = <?php echo $site_infoj; ?>;
    var userinfoj = <?php echo $userinfoj; ?>; //çšæ·äżĄæŻ

</script>
<script src="/static/js/layer/layer.js"></script>
<script src="/static/student/js/common.js"></script>
<script src="/static/swiper/swiper.min.js"></script>


    <script src="/static/student/js/pick-pcc.min.1.0.1.js"></script>
    <script>
        $(".pick-area1").pickArea();
    </script>
    <script>
        var courseid = "<?php echo $info['id']; ?>"; //èŻŸçšid
        var star = 0;//æçș§
        var page = 1;//éĄ”ç 
        var type = 0;//0èŻŸçš 1ć„é€
        var method = 0;//0çŽæ„èŽ­äč° 1èŽ­ç©èœŠ
        var totalmoney = "<?php echo $info['payval']; ?>";//ä»·æ Œ
        var name = "<?php echo $info['name']; ?>";//ćç§°
        var ismaterial =  "<?php echo $info['ismaterial']; ?>"; //æŻćŠć«æææ
    </script>
    <script src="/static/student/js/detail.js"></script>
</body>
</html>
