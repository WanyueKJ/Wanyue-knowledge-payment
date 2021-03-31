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

    <link href="/static/swiper/swiper.min.css" rel="stylesheet" type="text/css">
    <link href="/static/student/css/liveing.css?t=1590716666" rel="stylesheet" type="text/css">
</head>
<body>
    <div class="liveing">
        <div class="liveing_top">
            <div class="l_top_l">
                <div class="live_tips">
                    <?php if($info['islive'] == 0): ?>
                        <div class="live_time">倒计时：<span class="js_time">0天00时00分00秒</span></div>
                    <?php endif; ?>
                    <div class="live_status">
                        <?php if($info['islive'] == 1): ?>
                            <text style="color: #3DD1A2;">直播中</text>
                        <?php elseif($info['islive'] == 2): ?>
                            直播已结束
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
                <div class="liveing_c_status">直播还未开始</div>
            <?php elseif($info['islive'] == 2): ?>
                <div class="liveing_c_status">直播已结束</div>
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
                                摄像头
                            </div>
                        </li>
                        
                        <li class="js_ware">
                            <div class="img">
                                <img src="/static/student/images/liveing/ware.png">
                            </div>
                            <div class="title">
                                课件
                            </div>
                        </li>
                        
                        <li class="js_share">
                            <div class="img">
                                <img src="/static/student/images/liveing/share.png">
                            </div>
                            <div class="title">
                                屏幕共享
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
                            课件直播中
                            <?php endif; if($info['livetype'] == 2): ?>
                            视频课件直播
                            <?php endif; if($info['livetype'] == 3): ?>
                            音频课件直播
                            <?php endif; if($info['livetype'] == 5): ?>
                            摄像头直播中
                            <?php endif; ?>
                            </li>
                        </ul>
                        <?php if($info['livetype'] == 1 || $info['livetype'] == 5): ?>
                            <div class="ppt_list_add ppt_add">
                                添加课件
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
                                        <div class="ppt_del" data-pptid="<?php echo $v['id']; ?>">删除</div>
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
                                        打开课件
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
                        <div class="ppt_tips"> 上传图片作为ppt使用，悬浮鼠标删除图片 </div>
                    <?php endif; ?>
                </div>
            </div>
            <div class="liveing_c_r">
                <?php if($info['livetype'] == 5): ?>
                <div id="liveing_play_bd_s"></div>
                <div class="shareing">
                    <div class="shareing_img"></div>
                    <div class="shareing_t">屏幕共享中</div>
                </div>
                <?php endif; ?>
                <!-- <if condition="$info['livetype'] neq 5"> -->
                <?php if($info['livetype'] == -1): ?>
                    <div class="liveing_audio">
                        <div class="audio_start">
                            <div class="js_audio_img"></div>
                            <div class="js_audio_title">单击开始录音</div>
                        </div>
                        
                        <div class="audio_ing hide">
                            <div class="js_audio_img">
                                <span class="audio_btn audio_cancel">取消</span>
                                <div class="js_audio_time">
                                    <span>00:00</span>
                                </div>
                                <span class="audio_btn audio_ok">完成</span>
                            </div>
                            
                            <div class="time_tip">最多录制10分钟</div>
                        </div>
                        
                        <div class="audio_end hide">
                            <div class="js_audio_img">
                                <span class="audio_btn audio_cancel">取消</span>
                                <div class="js_audio_time"></div>
                                <span class="audio_btn audio_send">发送</span>
                            </div>
                        </div>
                        
                        <div class="audio_error hide">
                            <div class="js_audio_img"></div>
                            <div class="js_audio_title">当前设备或浏览器不支持录音<br>请更换设备或浏览器后重试</div>
                        </div>
                        
                    </div>
                <?php endif; ?>
                <div class="liveing_c_r_tab">
                    <ul>
                        <li class="on" data-type="1">讲师区</li>
                        <li data-type="0">讨论区</li>
                        <li data-type="2">问答区</li>

                    </ul>
                </div>
                <div class="liveing_c_r_tab_b">
                    <div class="liveing_c_r_tab_bd">
                        <div class="msg" id="js_msg_explain">
                            <ul>
                                <!-- <li>
                                    <div class="msg_n"><img src="/logo.png"><span>昵称</span><span>讲师</span></div>
                                    <div class="msg_p">
                                        <div class="msg_audio">
                                            <div class="msg_c_audio">
                                                <i></i> <span>5”</span>
                                                <audio preload="auto" src=""></audio>
                                            </div>
                                        </div>
                                    </div>
                                </li> -->
                                <!-- <li>
                                    <div class="msg_n"><img src="/logo.png"><span>昵称</span><span>讲师</span></div>
                                    <div class="msg_p">
                                        <div class="msg_c">啊<img class="emoji" src="/static/emoji/img/666.png" ></div>
                                    </div>
                                </li> -->
                                <!-- <li class="msg_right qa on">
                                    <div class="msg_n"><img src="/logo.png"><span>昵称</span><span>讲师</span></div>
                                    <div class="msg_p">
                                        <div class="msg_c">啊</div>
                                    </div>
                                    <div class="qa_b" data-chatid="1" data-touid="1" data-toname="1" data-content="1">
                                        <button>回复</button>
                                    </div>
                                </li> -->
                                
                                <!-- <li class="msg_right">
                                    <div class="msg_n"><img src="/logo.png"><span>昵称</span><span>讲师</span></div>
                                    <div class="msg_p">
                                        <div class="msg_c">啊</div>
                                    </div>
                                </li> -->
                                <!-- <li>
                                    <div class="msg_n"><img src="/logo.png"><span>昵称</span><span>讲师</span></div>
                                    <div class="msg_p">
                                        <div class="msg_c">
                                            <div class="msg_c_r">
                                                <div class="msg_c_r_b"></div>
                                                <div class="msg_c_r_c">
                                                    <div class="msg_c_r_c_n">昵称</div>
                                                    <div class="msg_c_r_c_c">内容</div>
                                                </div>
                                            </div>
                                            @昵称 啊
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
                                    <div class="msg_n"><img src="/logo.png"><span>昵称</span><span>讲师</span></div>
                                    <div class="msg_p">
                                        <div class="msg_c">啊</div>
                                    </div>
                                    <div class="qa_b" data-chatid="1" data-touid="1" data-toname="1" data-content="啊">
                                        <button>回复</button>
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
                            <label for="stopspeak"> <span class="checkbox"></span>提问</label> -->
                            <input type="checkbox" id="putQuestions" class="test">
                            <label for="putQuestions"> <span class="checkbox"></span>提问</label>
                        </div>
                    </div>
                    <div class="send_area">
                        <textarea rows="3" placeholder="输入内容"></textarea>
                        <button type="button" id="js_send" data-type="0">发送</button>
                    </div>
                    
                </div>
            </div>
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


    <!-- 视频播放start -->
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
                        摄像头检测中
                    </div>
                </li>
                <li>
                    <div class="device_img">
                        <img src="/static/teacher/images/liveing/c_mic.png">
                    </div>
                    <div class="device_t">
                        麦克风
                    </div>
                </li>
                <li>
                    <div class="device_img">
                        <img src="/static/teacher/images/liveing/c_set.png">
                    </div>
                    <div class="device_t">
                        检测结果
                    </div>
                </li>
            </ul>
            <div class="device_line"></div>
        </div>
        
        <div class="device_bottom">
            <div class="device_bd ">
                <div class="device_bd_t">
                    您是否能看到自己的摄像头画面？
                </div>
                <div class="device_bd_s">
                    <span>摄像头</span>
                    <select name="videoinput"></select>
                </div>
                <div class="device_bd_v">
                    <div id="device_video">
                    </div>
                </div>
                <div class="device_bd_b">
                    <span class="device_btn device_btn_no js_check_camera">不可以看到</span>
                    <span class="device_btn device_btn_ok js_check_camera">可以看到</span>
                </div>
            </div>
            
            <div class="device_bd hide">
                <div class="device_bd_t">
                    对着麦克风讲话，您是否能看到音量波动条？？
                </div>
                <div class="device_bd_s">
                    <span>麦克风</span>
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
                    <span class="device_btn device_btn_no js_check_mic">不可以看到</span>
                    <span class="device_btn device_btn_ok js_check_mic">可以看到</span>
                </div>
            </div>
            
            <div class="device_bd hide">
                <div class="device_bd_table">
                    <table>
                        <thead>
                        <tr>
                            <td>检测项目</td>
                            <td>检测结果</td>
                        </tr>
                        </thead>
                        <tr>
                            <td>摄像头</td>
                            <td><span class="point js_point_camera"></span><span class="js_txt_camera">正常</span></td>
                        </tr>
                        <tr>
                            <td>麦克风</td>
                            <td><span class="point js_point_mic"></span><span class="js_txt_mic">正常</span></td>
                        </tr>
                        
                    </table>
                </div>
                <div class="device_bd_b">
                    <span class="device_btn device_btn_no js_check_reset">重新检测</span>
                    <span class="device_btn device_btn_ok js_check_ok">去上台</span>
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
            client: null, //上课房间初始化
            client_screen: null, //共享屏幕房间初始化
            joined: false, //是否进入上课房间
            joined_screen: false, //是否进入共享屏幕房间
            published: false, //是否推上课流
            published_screen: false, //是否推共享流
            localStream: null, //本地流
            localStream_screen: null, //共享流
            remoteStreams: [], //所有的上课异地流
            remoteStreams_screen: [], //所有的共享异地流
            params: {}, //上课用户信息
            params_screen: {}, //共享用户信息
        };

        //声网的一些信息
        var option = {
            appID: "<?php echo $info['sound_appid']; ?>", //声网appid
            channel: "<?php echo $info['stream']; ?>", //上课房间id，区分房间的唯一id
            channel_screen: 999999999, //共享房间id，区分房间的唯一id
            uid: "<?php echo $userinfo['id']; ?>", //上课房间uid，用于推流的streamID
            uid_screen: 0, //共享房间uid，用于推流的streamID
            token: null
        }
        
        var _DATA = {};
        _DATA.userinfo=<?php echo $userinfoj; ?>;//用户信息
        _DATA.roominfo=<?php echo $infoj; ?>;//房间信息
        _DATA.teacherinfo=<?php echo $teacherinfoj; ?>;//老师信息
        
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
