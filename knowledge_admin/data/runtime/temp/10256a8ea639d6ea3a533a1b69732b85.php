<?php /*a:8:{s:84:"/www/wwwroot/demo.sdwanyue.com/themes/simpleboot3/student/detail/substancestudy.html";i:1602491838;s:66:"/www/wwwroot/demo.sdwanyue.com/themes/simpleboot3/public/head.html";i:1602491838;s:74:"/www/wwwroot/demo.sdwanyue.com/themes/simpleboot3/student/public/head.html";i:1602491838;s:76:"/www/wwwroot/demo.sdwanyue.com/themes/simpleboot3/student/public/header.html";i:1607591807;s:75:"/www/wwwroot/demo.sdwanyue.com/themes/simpleboot3/student/public/grade.html";i:1602491838;s:75:"/www/wwwroot/demo.sdwanyue.com/themes/simpleboot3/student/public/login.html";i:1607590724;s:76:"/www/wwwroot/demo.sdwanyue.com/themes/simpleboot3/student/public/footer.html";i:1607503774;s:77:"/www/wwwroot/demo.sdwanyue.com/themes/simpleboot3/student/public/scripts.html";i:1603268578;}*/ ?>
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
            <img src="/static/images/logo.png">

            <text><?php echo $site_info['site_name']; ?></text>
        </div>
        <div class="middle">
            <ul>
                <li>
                    <a href="/" class="olda <?php if($navid == 0): ?>on<?php endif; ?>">
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

                <li>
                    <a href="/student/index/appdownload" class="olda <?php if($navid == 2): ?>on<?php endif; ?>">
                        APPäžèœœ
                        <div class="none <?php if($navid == 2): ?>block<?php endif; ?>"></div>
                    </a>
                </li>

            </ul>
        </div>
        <div class="right">
            <div class="search">
                <input type="password" hidden autocomplete=ânew-passwordâ>
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
                    <input type="text" class="input1" value="" placeholder="èŻ·èŸć„ææșć·" value="13800000000" />
                    <input type="password" class="input2" value="" placeholder="èŻ·èŸć„ćŻç " value="123456" />
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

    <div class="substancestudy_top">
        <?php if($info['type'] == 1): ?> <!--ćŸæ-->
            <img class="thumb" src="<?php echo $info['thumb']; ?>">
        <?php elseif($info['type'] == 2): ?><!--è§éą-->
            <video height="375" width="800"   id="myVideo"  controls="controls"  preload="auto">
                <source src="<?php echo $info['url']; ?>" type="video/mp4">
            </video>
        <?php else: ?><!--éłéą-->
            <audio id="myAudio" controls="controls">
                <source src="<?php echo $info['url']; ?>" type="audio/mpeg" />
            </audio>
        <?php endif; ?>
    </div>


    <div class="substancestudy_content <?php if($info['type'] == 1 && $info['paytype']==1 && $info['ifbuy']==0 && $info['trialtype']!=0): ?>opacity_yes<?php endif; ?>">
        <?php echo $info['content']; ?>
    </div>

    <?php if($info['type'] == 1 && $info['paytype']==1 && $info['ifbuy']==0 && $info['trialtype']!=0): ?>
        <div class="lock_title">
            <a style="color: #FF1B20;" href="javascript:void(0)">èŽ­äč°ććŻæ„çćźæŽććźč</a>
        </div>
    <?php endif; ?>

    <div class="common_footer">
    <div class="content">
        <div class="left">
            <img src="/static/images/logo.png">
            <div class="text"><?php echo $site_info['site_name']; ?></div>
        </div>
        <div class="next">
            <div class="text">ćźæčQQçŸ€</div>
                <img src="/static/images/qq_qun.png">
        </div>
        <div class="middle">
            <div class="text">ćźæčćŸźäżĄ</div>
            <?php if(isset($site_info['wx_url']) && $site_info['wx_url'] != ''): ?>
                <img src="<?php echo $site_info['wx_url']; ?>">
            <?php endif; ?>

        </div>
        <div class="right">
            <div class="right_guanyu_title">ćłäșæä»Ź</div>
            <div class="text1"><a href="<?php echo url('student/index/liaojie', ['flag' => 1]); ?>">äșè§ŁäžćČł</a></div>
            <div class="text2"><a href="<?php echo url('student/index/liaojie', ['flag' => 2]); ?>">èçł»æä»Ź</a></div>
            <div class="text3"><a href="<?php echo url('student/index/liaojie', ['flag' => 3]); ?>">ćŠäœèŽ­äč°</a></div>
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


    <script>
        var courseid = "<?php echo $info['id']; ?>"; //èŻŸçšid
        var star = 0;//æçș§
        var page = 1;//éĄ”ç 
        var type = "<?php echo $info['type']; ?>";//ç±»ć

        var paytype = "<?php echo $info['paytype']; ?>";//æŻćŠä»èŽč  0ćèŽč 1æ¶èŽč  2ćŻç 
        var ifbuy = "<?php echo $info['ifbuy']; ?>";//æŻćŠæŻä»äș
        var trialtype = "<?php echo $info['trialtype']; ?>";//æŻćŠćŻä»„èŻć­Š
        var trialval = "<?php echo $info['trialval']; ?>";//èŻć­ŠćŒ

        var totalmoney = "<?php echo $info['payval']; ?>";//ä»·æ Œ
        var name_t = "<?php echo $info['name']; ?>";//ćć­

        //æŁæ”èŻçćèœ
        if(type == 2 && paytype==1 && ifbuy==0 && trialtype!=0){
            var isTanc = false;
            //è·ćè§éąDOMćçŽ 
            var myVideo = document.getElementById("myVideo");

            //äœżçšäșä»¶çćŹæčćŒææäșä»¶ïŒ æ­€äșä»¶ćŻäœäžșćźæ¶çæ”video æ­æŸç¶æ
            myVideo.addEventListener("timeupdate",function(){
                var timeDisplay;
                //çšç§æ°æ„æŸç€șćœćæ­æŸèżćșŠ
                timeDisplay = Math.floor(myVideo.currentTime);
                //ćœè§éąæ­æŸć° 4sçæ¶ććć€ç
                if(timeDisplay >= trialval){
                        //ć€çä»Łç 
                        myVideo.currentTime=trialval;//ç§»ćšć°ć€§äș10ç§èȘćšèżć
                        myVideo.pause();
                        if(isTanc == false){
                            confirms('èŻçç»æ');
                            isTanc = true;
                        }
                }else{
                    isTanc = false;
                }
            },false);  
            
            //èżćșŠæĄç§»ćšäșä»¶
            myVideo.addEventListener('seeking', function(e) {
				//ç§»ćšć°ć€§äș10ç§èȘćšèżć
				if(Math.floor(myVideo.currentTime)>=trialval){
                    myVideo.currentTime=trialval;
                    if(isTanc == false){
                        confirms('èŻçç»æ');
                        isTanc = true;
                    }
				}else{
                    isTanc = false;
                }
            })
            

        }else if(type == 1 && paytype==1 && ifbuy==0 && trialtype!=0){
            var h=$('.substancestudy_content').height();
            var h_n=h*trialval*0.01;
            $('.substancestudy_content').height(h_n);
            $('.substancestudy_content').removeClass('opacity_yes');
        }


        $('.lock_title').click(function(){
            confirms('æŻćŠć»èŽ­äč°ïŒ');
        })






        function confirms(title){
            //èŻąéźæĄ
            layer.confirm(title, {
                btn: ['ć»èŽ­äč°','ćæ¶'] //æéź
            }, function(){
                window.open("/student/detail/buy?courseid="+courseid+"&type=0&method=0&totalmoney="+totalmoney+"&name="+name_t+"&ismaterial=0");  
            }, function(){
          
            });
        }

    </script>
    <script src="/static/student/js/detail.js"></script>
</body>
</html>
