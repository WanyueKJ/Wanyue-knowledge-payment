<?php /*a:7:{s:88:"D:\My_project\Wanyue-knowledge-payment-admin/themes/simpleboot3/teacher\index\index.html";i:1602638546;s:80:"D:\My_project\Wanyue-knowledge-payment-admin/themes/simpleboot3/public\head.html";i:1602491838;s:88:"D:\My_project\Wanyue-knowledge-payment-admin/themes/simpleboot3/teacher/public\head.html";i:1602491838;s:90:"D:\My_project\Wanyue-knowledge-payment-admin/themes/simpleboot3/teacher/public\header.html";i:1602491838;s:93:"D:\My_project\Wanyue-knowledge-payment-admin/themes/simpleboot3/teacher/public\left_menu.html";i:1602734310;s:90:"D:\My_project\Wanyue-knowledge-payment-admin/themes/simpleboot3/teacher/public\footer.html";i:1602491838;s:91:"D:\My_project\Wanyue-knowledge-payment-admin/themes/simpleboot3/teacher/public\scripts.html";i:1602491838;}*/ ?>
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
	
    <link href="/static/teacher/css/common.css?t=1597803906" rel="stylesheet" type="text/css">
    <link href="/static/teacher/css/index.css" rel="stylesheet" type="text/css">
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
                <li><a href="/teacher/index/index">ćć°éŠéĄ”</a></li>
                <li><a href="javascript:void()" class="js_logout">éćșç»ćœ</a></li>
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
                <span class="span1"></span> éŠéĄ”
            </a>
        </li>
        <li <?php if($cur == 'live'): ?>class="on"<?php endif; ?>>
            <a href="/teacher/live/index">
            <span class="span2"></span> çŽæ­èŻŸć 
            </a>
        </li>

        <!-- <li>
            <a href="">
                <span class="span4"></span> ććźč
            </a>
        </li> -->
        <li <?php if($cur == 'account'): ?>class="on"<?php endif; ?>>
            <a href="/teacher/account/index">
                <span class="span6"></span> èŽŠć·
            </a>
        </li>
    </ul>
</div>
            <div class="t_right clearfix">
                <div class="index_top">
                    <div class="t_bd">
                        <div class="t_bd_t">æçć€§ç­èŻŸ</div>
                        <div class="t_bd_d"><?php echo $live_nums; ?></div>
                    </div>
                </div>
                <div class="index_bottom">
                    <div class="index_left">
                        <div class="i_l_t">ćžžçšćèœ</div>
                        <div class="i_l_bd">
                            <ul>
                                <li>
                                    <a href="/teacher/live/index">
                                    <div class="li_img">
                                        <img src="/static/teacher/images/index/live.png">
                                    </div>
                                    <div class="li_t">
                                        æçć€§ç­èŻŸ
                                    </div>
                                    </a>
                                </li>

                                <li>
                                    <a href="/home/article/detail">
                                    <div class="li_img">
                                        <img src="/static/teacher/images/index/help.png">
                                    </div>
                                    <div class="li_t">
                                        ćžźć©äž­ćż
                                    </div>
                                    </a>
                                </li>
                            </ul>
                        </div>
                    </div>
                    <div class="index_right">
                        <div class="i_r_t">ćžžè§éźéą</div>
                        <div class="i_r_list">
                            <ul>
                                <?php if(is_array($list) || $list instanceof \think\Collection || $list instanceof \think\Paginator): $i = 0; $__LIST__ = $list;if( count($__LIST__)==0 ) : echo "" ;else: foreach($__LIST__ as $key=>$v): $mod = ($i % 2 );++$i;?>
                                <li><a href="/home/article/detail?id=<?php echo $v['id']; ?>" target="_blank"><?php echo $v['post_title']; ?></a></li>
                                <?php endforeach; endif; else: echo "" ;endif; ?>
                            </ul>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
    
    <script src="/static/teacher/js/common.js?t=1587004493"></script>
</body>
</html>
