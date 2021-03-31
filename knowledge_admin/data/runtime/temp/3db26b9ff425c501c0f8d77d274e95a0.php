<?php /*a:7:{s:97:"D:\My_project\wanyue_education_web_local\education_web/themes/simpleboot3/teacher\live\index.html";i:1603447003;s:90:"D:\My_project\wanyue_education_web_local\education_web/themes/simpleboot3/public\head.html";i:1602491837;s:98:"D:\My_project\wanyue_education_web_local\education_web/themes/simpleboot3/teacher/public\head.html";i:1602491837;s:100:"D:\My_project\wanyue_education_web_local\education_web/themes/simpleboot3/teacher/public\header.html";i:1602491837;s:103:"D:\My_project\wanyue_education_web_local\education_web/themes/simpleboot3/teacher/public\left_menu.html";i:1602734309;s:100:"D:\My_project\wanyue_education_web_local\education_web/themes/simpleboot3/teacher/public\footer.html";i:1602491837;s:101:"D:\My_project\wanyue_education_web_local\education_web/themes/simpleboot3/teacher/public\scripts.html";i:1602491837;}*/ ?>
<!DOCTYPE html>
<html>
<head>
    <title>我的大班课 <?php echo (isset($site_info['site_name']) && ($site_info['site_name'] !== '')?$site_info['site_name']:''); ?></title>
    
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
    <link href="/static/teacher/css/live.css" rel="stylesheet" type="text/css">
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
            <div class="t_right clearfix">
                <div class="l_bd">
                    <div class="l_bd_t">我的大班课</div>
                    <div class="l_bd_f">
                        <form class="well form-inline margin-top-20" method="post" action="<?php echo url('live/index'); ?>">
                        <select name="type" id="type" class="select">
                            <option value="">全部类型</option>
                            <?php if(is_array($type) || $type instanceof \think\Collection || $type instanceof \think\Paginator): $i = 0; $__LIST__ = $type;if( count($__LIST__)==0 ) : echo "" ;else: foreach($__LIST__ as $key=>$v): $mod = ($i % 2 );++$i;?>
                            <option value="<?php echo $key; ?>" <?php if(input('request.type') != '' && input('request.type') == $key): ?>selected<?php endif; ?>><?php echo $v; ?></option>
                            <?php endforeach; endif; else: echo "" ;endif; ?>
                        </select>
                        
                        <select name="islive" id="islive" class="select">
                            <option value="">全部状态</option>
                            <?php if(is_array($islive) || $islive instanceof \think\Collection || $islive instanceof \think\Paginator): $i = 0; $__LIST__ = $islive;if( count($__LIST__)==0 ) : echo "" ;else: foreach($__LIST__ as $key=>$v): $mod = ($i % 2 );++$i;?>
                            <option value="<?php echo $key; ?>" <?php if(input('request.islive') != '' && input('request.islive') == $key): ?>selected<?php endif; ?>><?php echo $v; ?></option>
                            <?php endforeach; endif; else: echo "" ;endif; ?>
                        </select>
                        
                       <input class="form-control js-date" name="starttime" id="starttime" value="<?php echo input('request.starttime'); ?>" aria-invalid="false" style="width: 140px;" placeholder="开播时间">
                       
                       <input class="form-control" type="text" name="keyword" style="width: 120px;" value="<?php echo input('request.keyword'); ?>" placeholder="搜索">
                       
                        <input type="submit" class="btn" id="f_sub" value="筛选">
                        </form>
                    </div>
                    <div class="l_bd_l">
                        <div class="l_bd_l_l">
                            <ul>
                                <li class="l_bd_l_l_f">
                                    <div class="l_bd_l_l_n">名称</div>
                                    <div class="l_bd_l_l_t">学级</div>
                                    <div class="l_bd_l_l_t">直播类型</div>
                                    <div class="l_bd_l_l_t">内容类型</div>
                                    <div class="l_bd_l_l_s">状态</div>
                                    <div class="l_bd_l_l_time">开播时间</div>
                                    <div class="l_bd_l_l_t">我的身份</div>
                                    <div class="l_bd_l_l_c">操作</div>
                                </li>
                                <?php if(is_array($list) || $list instanceof \think\Collection || $list instanceof \think\Paginator): $i = 0; $__LIST__ = $list;if( count($__LIST__)==0 ) : echo "" ;else: foreach($__LIST__ as $key=>$v): $mod = ($i % 2 );++$i;?>
                                <li>
                                    <div class="l_bd_l_l_n">
                                        <div class="l_bd_l_l_n_i">
                                            <img src="<?php echo $v['thumb']; ?>">
                                        </div>
                                        <div class="l_bd_l_l_n_f">
                                            <div class="l_bd_l_l_n_f_n"><?php echo $v['name']; ?></div>
                                            <div class="l_bd_l_l_n_f_m l_bd_l_l_n_f_m_<?php echo $v['paytype']; ?>"><?php echo $v['pay_val']; ?></div>
                                        </div>
                                    </div>
                                    <div class="l_bd_l_l_t"><?php echo $grade[$v['gradeid']]['name']; ?></div>
                                    <div class="l_bd_l_l_t"><?php echo !empty($classs[$v['classid']]['name']) ? $classs[$v['classid']]['name'] : ''; ?></div>
                                    <div class="l_bd_l_l_t"><?php echo $v['type_s']; ?></div>
                                    <div class="l_bd_l_l_s l_bd_l_l_s_<?php echo $v['islive']; ?>"><span></span><?php echo $v['live_s']; ?></div>
                                    <div class="l_bd_l_l_time"><?php echo $v['live_time']; ?></div>
                                    <div class="l_bd_l_l_t"><?php echo $v['user_type']; ?></div>
                                    <div class="l_bd_l_l_c">
                                        <!-- <a class="btn_a" href=''>详情</a>
                                        -  -->
                                        <?php if($v['islive'] != 2): ?>
                                        <a class="btn_a" target="_blank" href='<?php echo url("liveing/index",array("courseid"=>$v["id"])); ?>'>进入授课</a>
                                        <?php endif; ?>
                                    </div>
                                </li>
                                <?php endforeach; endif; else: echo "" ;endif; ?>
                            </ul>
                        </div>
                        <div class="l_bd_list_p">
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
    
    <script src="/static/teacher/js/common.js?t=1587004493"></script>

</body>
</html>
