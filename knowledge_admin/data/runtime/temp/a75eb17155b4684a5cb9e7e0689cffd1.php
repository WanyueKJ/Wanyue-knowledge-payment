<?php /*a:6:{s:76:"/www/wwwroot/demo.sdwanyue.com/themes/simpleboot3/student/liveing/index.html";i:1602668008;s:66:"/www/wwwroot/demo.sdwanyue.com/themes/simpleboot3/public/head.html";i:1602491838;s:74:"/www/wwwroot/demo.sdwanyue.com/themes/simpleboot3/student/public/head.html";i:1602491838;s:77:"/www/wwwroot/demo.sdwanyue.com/themes/simpleboot3/student/public/scripts.html";i:1603268578;s:66:"/www/wwwroot/demo.sdwanyue.com/themes/simpleboot3/public/xgjs.html";i:1602491838;s:79:"/www/wwwroot/demo.sdwanyue.com/themes/simpleboot3/student/public/equipment.html";i:1602491838;}*/ ?>
<!DOCTYPE html>
<html>
<head>
    <title><?php echo $info['name']; ?> <?php echo (isset($site_info['site_name']) && ($site_info['site_name'] !== '')?$site_info['site_name']:''); ?></title>
    
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

    <link href="/static/swiper/swiper.min.css" rel="stylesheet" type="text/css">
    <link href="/static/student/css/liveing.css?t=1590716666" rel="stylesheet" type="text/css">
</head>
<body>
    <div class="liveing">
        <div class="liveing_top">
            <div class="l_top_l">
                <div class="live_tips">
                    <?php if($info['islive'] == 0): ?>
                        <div class="live_time">ćèźĄæ¶ïŒ<span class="js_time">0ć€©00æ¶00ć00ç§</span></div>
                    <?php endif; ?>
                    <div class="live_status">
                        <?php if($info['islive'] == 1): ?>
                            <text style="color: #3DD1A2;">çŽæ­äž­</text>
                        <?php elseif($info['islive'] == 2): ?>
                            çŽæ­ć·Čç»æ
                        <?php endif; ?>
                    </div>
                </div>
            </div>
            <div class="l_top_c">
                <?php echo $info['name']; ?>
            </div>
            <div class="l_top_r">
                <div class="live_nums"><span class="img"></span><span id="js_usernums"><?php echo $info['nums']; ?></span></div>
                <img src="<?php echo (isset($userinfo['avatar']) && ($userinfo['avatar'] !== '')?$userinfo['avatar']:''); ?>" class="l_top_r_a">
                <p class="l_top_s"><?php echo (isset($userinfo['user_nickname']) && ($userinfo['user_nickname'] !== '')?$userinfo['user_nickname']:''); ?></p>
            </div>
        </div>
        <div class="liveing_c clearfix">
            <?php if($info['islive'] == 0): ?>
                <div class="liveing_c_status">çŽæ­èżæȘćŒć§</div>
            <?php elseif($info['islive'] == 2): ?>
                <div class="liveing_c_status">çŽæ­ć·Čç»æ</div>
            <?php endif; ?>

            <div class="liveing_c_l">
                <?php if($info['livetype'] == 5 && $info['user_type'] == 1): ?>
                <div class="live_control_list">
                    <ul>
                        <li class="on js_camera">
                            <div class="img">
                                <img src="/static/student/images/liveing/camera.png">
                            </div>
                            <div class="title">
                                æćć€Ž
                            </div>
                        </li>
                        
                        <li class="js_ware">
                            <div class="img">
                                <img src="/static/student/images/liveing/ware.png">
                            </div>
                            <div class="title">
                                èŻŸä»¶
                            </div>
                        </li>
                        
                        <li class="js_share">
                            <div class="img">
                                <img src="/static/student/images/liveing/share.png">
                            </div>
                            <div class="title">
                                ć±ćčć±äș«
                            </div>
                        </li>
                    </ul>
                </div>
                <?php endif; ?>
            </div>
            <div class="liveing_c_c">
                <div class="liveing_play">
                    <?php if($info['livetype'] == 1 || $info['livetype'] == 5): ?>
                    <div id="ppt_show" class="hide">
                        <div class="swiper-container gallery-top">
                            <div class="swiper-wrapper">
                                <?php if(is_array($info['ppts']) || $info['ppts'] instanceof \think\Collection || $info['ppts'] instanceof \think\Paginator): $i = 0; $__LIST__ = $info['ppts'];if( count($__LIST__)==0 ) : echo "" ;else: foreach($__LIST__ as $key=>$v): $mod = ($i % 2 );++$i;?>
                                <div class="swiper-slide ppt_<?php echo $v['id']; ?>" style="background-image:url(<?php echo $v['thumb']; ?>)"></div>
                                <?php endforeach; endif; else: echo "" ;endif; ?>
                            </div>
                            <div class="swiper-button-next swiper-button-white"></div>
                            <div class="swiper-button-prev swiper-button-white"></div>
                        </div>
                    </div>
                    <?php endif; if($info['livetype'] != 1): ?>
                        <img class="live_play" src="/static/student/images/liveing/live_play.png">
                        <div id="liveing_play_bd"></div>
                    <?php endif; if($info['livetype'] == 5): ?>
                        <div id="screen"></div>
                    <?php endif; ?>
                </div>
                
                <div class="liveing_c_c_b">
                    <div class="ppt_list_title">
                        <ul>
                            <li class="on js_ppt_title">
                            <?php if($info['livetype'] == 1): ?>
                            èŻŸä»¶çŽæ­äž­
                            <?php endif; if($info['livetype'] == 2): ?>
                            è§éąèŻŸä»¶çŽæ­
                            <?php endif; if($info['livetype'] == 3): ?>
                            éłéąèŻŸä»¶çŽæ­
                            <?php endif; if($info['livetype'] == 5): ?>
                            æćć€ŽçŽæ­äž­
                            <?php endif; ?>
                            </li>
                        </ul>
                        <?php if($info['livetype'] == 1 || $info['livetype'] == 5): ?>
                            <div class="ppt_list_add ppt_add">
                                æ·»ć èŻŸä»¶
                            </div>
                        <?php endif; ?>
                    </div>
                    <div class="ppt_list">
                        <div class="swiper-container gallery-thumbs">
                            <div class="swiper-wrapper  ">
                                <?php if(is_array($info['ppts']) || $info['ppts'] instanceof \think\Collection || $info['ppts'] instanceof \think\Paginator): $i = 0; $__LIST__ = $info['ppts'];if( count($__LIST__)==0 ) : echo "" ;else: foreach($__LIST__ as $key=>$v): $mod = ($i % 2 );++$i;?>
                                <div class="swiper-slide ppt_<?php echo $v['id']; ?>" >
                                    <div class="ppt_list_u" style="background-image:url(<?php echo $v['thumb']; ?>)">
                                    <?php if($info['user_type'] == 1): ?>
                                        <div class="ppt_del" data-pptid="<?php echo $v['id']; ?>">ć é€</div>
                                    <?php endif; ?>
                                    </div>
                                    <div class="ppt_list_t">
                                        <?php echo $i; ?>
                                    </div>
                                </div>
                                <?php endforeach; endif; else: echo "" ;endif; if($info['user_type'] == 1 && ($info['livetype'] == 1 || $info['livetype'] == 5) && !$info['ppts']): ?>
                                <div class="swiper-slide" >
                                    <div class="ppt_list_add ppt_add">
                                        <div class="ppt_list_add_img add_ppt"></div>
                                        <div class="ppt_list_add_t">
                                        æćŒèŻŸä»¶
                                        </div>
                                    </div>
                                </div>
                                <?php endif; if($info['user_type'] == 1 && $info['livetype'] == 3): ?>
                                <div class="swiper-slide" >
                                    <div class="ppt_list_add">
                                        <div class="ppt_list_add_img add_audio"></div>
                                    </div>
                                </div>
                                <?php endif; if($info['user_type'] == 1  && $info['livetype'] == 2): ?>
                                <div class="swiper-slide" >
                                    <div class="ppt_list_add">
                                        <div class="ppt_list_add_img add_video"></div>
                                    </div>
                                </div>
                                <?php endif; ?>
                            </div>
                        </div>
                        <?php if($info['livetype'] == 1 || $info['livetype'] == 5): ?>
                        <div class="swiper-button-next swiper-button-white"></div>
                        <div class="swiper-button-prev swiper-button-white"></div>
                        <?php endif; ?>
                    </div>
                    <div style="display:none;" id="upload"></div>
                    <?php if($info['livetype'] == 1 && $info['user_type'] == 1): ?>
                        <div class="ppt_tips"> äžäŒ ćŸçäœäžșpptäœżçšïŒæŹæ”źéŒ æ ć é€ćŸç </div>
                    <?php endif; ?>
                </div>
            </div>
            <div class="liveing_c_r">
                <?php if($info['livetype'] == 5): ?>
                <div id="liveing_play_bd_s"></div>
                <div class="shareing">
                    <div class="shareing_img"></div>
                    <div class="shareing_t">ć±ćčć±äș«äž­</div>
                </div>
                <?php endif; ?>
                <!-- <if condition="$info['livetype'] neq 5"> -->
                <?php if($info['livetype'] == -1): ?>
                    <div class="liveing_audio">
                        <div class="audio_start">
                            <div class="js_audio_img"></div>
                            <div class="js_audio_title">ćć»ćŒć§ćœéł</div>
                        </div>
                        
                        <div class="audio_ing hide">
                            <div class="js_audio_img">
                                <span class="audio_btn audio_cancel">ćæ¶</span>
                                <div class="js_audio_time">
                                    <span>00:00</span>
                                </div>
                                <span class="audio_btn audio_ok">ćźæ</span>
                            </div>
                            
                            <div class="time_tip">æć€ćœć¶10ćé</div>
                        </div>
                        
                        <div class="audio_end hide">
                            <div class="js_audio_img">
                                <span class="audio_btn audio_cancel">ćæ¶</span>
                                <div class="js_audio_time"></div>
                                <span class="audio_btn audio_send">ćé</span>
                            </div>
                        </div>
                        
                        <div class="audio_error hide">
                            <div class="js_audio_img"></div>
                            <div class="js_audio_title">ćœćèźŸć€ææ”è§ćšäžæŻæćœéł<br>èŻ·æŽæąèźŸć€ææ”è§ćšćéèŻ</div>
                        </div>
                        
                    </div>
                <?php endif; ?>
                <div class="liveing_c_r_tab">
                    <ul>
                        <li class="on" data-type="1">èźČćžćș</li>
                        <li data-type="0">èźšèźșćș</li>
                        <li data-type="2">éźç­ćș</li>

                    </ul>
                </div>
                <div class="liveing_c_r_tab_b">
                    <div class="liveing_c_r_tab_bd">
                        <div class="msg" id="js_msg_explain">
                            <ul>
                                <!-- <li>
                                    <div class="msg_n"><img src="/logo.png"><span>æ”ç§°</span><span>èźČćž</span></div>
                                    <div class="msg_p">
                                        <div class="msg_audio">
                                            <div class="msg_c_audio">
                                                <i></i> <span>5â</span>
                                                <audio preload="auto" src=""></audio>
                                            </div>
                                        </div>
                                    </div>
                                </li> -->
                                <!-- <li>
                                    <div class="msg_n"><img src="/logo.png"><span>æ”ç§°</span><span>èźČćž</span></div>
                                    <div class="msg_p">
                                        <div class="msg_c">ć<img class="emoji" src="/static/emoji/img/666.png" ></div>
                                    </div>
                                </li> -->
                                <!-- <li class="msg_right qa on">
                                    <div class="msg_n"><img src="/logo.png"><span>æ”ç§°</span><span>èźČćž</span></div>
                                    <div class="msg_p">
                                        <div class="msg_c">ć</div>
                                    </div>
                                    <div class="qa_b" data-chatid="1" data-touid="1" data-toname="1" data-content="1">
                                        <button>ćć€</button>
                                    </div>
                                </li> -->
                                
                                <!-- <li class="msg_right">
                                    <div class="msg_n"><img src="/logo.png"><span>æ”ç§°</span><span>èźČćž</span></div>
                                    <div class="msg_p">
                                        <div class="msg_c">ć</div>
                                    </div>
                                </li> -->
                                <!-- <li>
                                    <div class="msg_n"><img src="/logo.png"><span>æ”ç§°</span><span>èźČćž</span></div>
                                    <div class="msg_p">
                                        <div class="msg_c">
                                            <div class="msg_c_r">
                                                <div class="msg_c_r_b"></div>
                                                <div class="msg_c_r_c">
                                                    <div class="msg_c_r_c_n">æ”ç§°</div>
                                                    <div class="msg_c_r_c_c">ććźč</div>
                                                </div>
                                            </div>
                                            @æ”ç§° ć
                                        </div>
                                    </div>
                                </li> -->
                            </ul>
                        </div>
                    </div>
                    <div class="liveing_c_r_tab_bd" style="display:none;">
                        <div class="msg" id="js_msg_talk">
                            <ul>
                            </ul>
                        </div>
                    </div>
                    <div class="liveing_c_r_tab_bd " style="display:none;">
                        <div class="msg" id="js_msg_qa">
                            <ul>
                                <!-- <li class="qa">
                                    <div class="msg_n"><img src="/logo.png"><span>æ”ç§°</span><span>èźČćž</span></div>
                                    <div class="msg_p">
                                        <div class="msg_c">ć</div>
                                    </div>
                                    <div class="qa_b" data-chatid="1" data-touid="1" data-toname="1" data-content="ć">
                                        <button>ćć€</button>
                                    </div>
                                </li> -->
                            </ul>
                        </div>
                    </div>

                </div>
                <div class="liveing_send">
                    <div class="msg_area">
                        <div class="shut_area">
                            <!-- <input type="checkbox" id="stopspeak" class="test">
                            <label for="stopspeak"> <span class="checkbox"></span>æéź</label> -->
                            <input type="checkbox" id="putQuestions" class="test">
                            <label for="putQuestions"> <span class="checkbox"></span>æéź</label>
                        </div>
                    </div>
                    <div class="send_area">
                        <textarea rows="3" placeholder="èŸć„ććźč"></textarea>
                        <button type="button" id="js_send" data-type="0">ćé</button>
                    </div>
                    
                </div>
            </div>
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


    <!-- è§éąæ­æŸstart -->
<script src="/static/xigua/xgplayer.js" type="text/javascript"></script>
<script src="/static/xigua/xgplayer-flv.js.js" type="text/javascript"></script>
<script src="/static/xigua/xgplayer-hls.js.js" type="text/javascript"></script>
<script src="/static/xigua/player.js?=1587346624" type="text/javascript"></script>
    <link href="/static/teacher/css/equipment.css" rel="stylesheet" type="text/css">

<div class="checkDevices">
        <div class="device_top">
            <ul>
                <li class="on">
                    <div class="device_img">
                        <img src="/static/teacher/images/liveing/c_camera.png">
                    </div>
                    <div class="device_t">
                        æćć€ŽæŁæ”äž­
                    </div>
                </li>
                <li>
                    <div class="device_img">
                        <img src="/static/teacher/images/liveing/c_mic.png">
                    </div>
                    <div class="device_t">
                        éșŠćéŁ
                    </div>
                </li>
                <li>
                    <div class="device_img">
                        <img src="/static/teacher/images/liveing/c_set.png">
                    </div>
                    <div class="device_t">
                        æŁæ”ç»æ
                    </div>
                </li>
            </ul>
            <div class="device_line"></div>
        </div>
        
        <div class="device_bottom">
            <div class="device_bd ">
                <div class="device_bd_t">
                    æšæŻćŠèœçć°èȘć·±çæćć€Žç»éąïŒ
                </div>
                <div class="device_bd_s">
                    <span>æćć€Ž</span>
                    <select name="videoinput"></select>
                </div>
                <div class="device_bd_v">
                    <div id="device_video">
                    </div>
                </div>
                <div class="device_bd_b">
                    <span class="device_btn device_btn_no js_check_camera">äžćŻä»„çć°</span>
                    <span class="device_btn device_btn_ok js_check_camera">ćŻä»„çć°</span>
                </div>
            </div>
            
            <div class="device_bd hide">
                <div class="device_bd_t">
                    ćŻčçéșŠćéŁèźČèŻïŒæšæŻćŠèœçć°éłéæłąćšæĄïŒïŒ
                </div>
                <div class="device_bd_s">
                    <span>éșŠćéŁ</span>
                    <select name="audioinput"></select>
                </div>
                <div class="device_bd_v">
                    <div id="device_audio">
                        <ul>
                            <li></li>
                            <li></li>
                            <li></li>
                            <li></li>
                            <li></li>
                            <li></li>
                            <li></li>
                            <li></li>
                            <li></li>
                            <li></li>
                            <li></li>
                            <li></li>
                        </ul>
                    </div>
                </div>
                <div class="device_bd_b">
                    <span class="device_btn device_btn_no js_check_mic">äžćŻä»„çć°</span>
                    <span class="device_btn device_btn_ok js_check_mic">ćŻä»„çć°</span>
                </div>
            </div>
            
            <div class="device_bd hide">
                <div class="device_bd_table">
                    <table>
                        <thead>
                        <tr>
                            <td>æŁæ”éĄčçź</td>
                            <td>æŁæ”ç»æ</td>
                        </tr>
                        </thead>
                        <tr>
                            <td>æćć€Ž</td>
                            <td><span class="point js_point_camera"></span><span class="js_txt_camera">æ­Łćžž</span></td>
                        </tr>
                        <tr>
                            <td>éșŠćéŁ</td>
                            <td><span class="point js_point_mic"></span><span class="js_txt_mic">æ­Łćžž</span></td>
                        </tr>
                        
                    </table>
                </div>
                <div class="device_bd_b">
                    <span class="device_btn device_btn_no js_check_reset">éæ°æŁæ”</span>
                    <span class="device_btn device_btn_ok js_check_ok">ć»äžć°</span>
                </div>
            </div>
        </div>
    </div>
<script src="/static/teacher/js/equipment.js"></script>
    <script type="text/javascript" src="/static/agora/AgoraRTCSDK-3.0.1.js"></script>
    <script src="/static/swiper/swiper.min.js"></script>
    <script src="/static/js/socket.io.js"></script>
    <script src="/static/js/ajaxfileupload.js"></script>
    <script src="/static/emoji/emoji.js?t=1587286398"></script>
    <script src="/static/recorder/recorder.js"></script>
    <script>
        var rtc = {
            client: null, //äžèŻŸæżéŽćć§ć
            client_screen: null, //ć±äș«ć±ćčæżéŽćć§ć
            joined: false, //æŻćŠèżć„äžèŻŸæżéŽ
            joined_screen: false, //æŻćŠèżć„ć±äș«ć±ćčæżéŽ
            published: false, //æŻćŠæšäžèŻŸæ”
            published_screen: false, //æŻćŠæšć±äș«æ”
            localStream: null, //æŹć°æ”
            localStream_screen: null, //ć±äș«æ”
            remoteStreams: [], //ææçäžèŻŸćŒć°æ”
            remoteStreams_screen: [], //ææçć±äș«ćŒć°æ”
            params: {}, //äžèŻŸçšæ·äżĄæŻ
            params_screen: {}, //ć±äș«çšæ·äżĄæŻ
        };

        //ćŁ°çœçäžäșäżĄæŻ
        var option = {
            appID: "<?php echo $info['sound_appid']; ?>", //ćŁ°çœappid
            channel: "<?php echo $info['stream']; ?>", //äžèŻŸæżéŽidïŒćșćæżéŽçćŻäžid
            channel_screen: 999999999, //ć±äș«æżéŽidïŒćșćæżéŽçćŻäžid
            uid: "<?php echo $userinfo['id']; ?>", //äžèŻŸæżéŽuidïŒçšäșæšæ”çstreamID
            uid_screen: 0, //ć±äș«æżéŽuidïŒçšäșæšæ”çstreamID
            token: null
        }
        
        var _DATA = {};
        _DATA.userinfo=<?php echo $userinfoj; ?>;//çšæ·äżĄæŻ
        _DATA.roominfo=<?php echo $infoj; ?>;//æżéŽäżĄæŻ
        _DATA.teacherinfo=<?php echo $teacherinfoj; ?>;//èćžäżĄæŻ
        
        var courseid='<?php echo $info['courseid']; ?>';
        var lessonid='<?php echo $info['lessonid']; ?>';
        var stream='<?php echo $info['stream']; ?>';
        var ppts=<?php echo $info['pptsj']; ?>;
        var shutup_room = <?php echo $info['shutup_room']; ?>;
        var socket = new io("<?php echo $info['chatserver']; ?>");
    </script>
    <script src="/static/student/js/event_liveing.js?t=1590716666"></script>
    <script src="/static/student/js/eventListen.js"></script>
    <script src="/static/student/js/liveing.js?t=1591079583"></script>
    
    
</body>
</html>
