<?php /*a:2:{s:92:"D:\My_project\wanyue_education_web_local\education_web/themes/simpleboot3/portal\\index.html";i:1602491837;s:90:"D:\My_project\wanyue_education_web_local\education_web/themes/simpleboot3/public\head.html";i:1602491837;}*/ ?>
<!DOCTYPE html>
<html>
<head>
    <title><?php echo (isset($site_info['site_name']) && ($site_info['site_name'] !== '')?$site_info['site_name']:''); ?></title>
    <meta name="keywords" content="<?php echo (isset($site_info['site_seo_keywords']) && ($site_info['site_seo_keywords'] !== '')?$site_info['site_seo_keywords']:''); ?>"/>
    <meta name="description" content="<?php echo (isset($site_info['site_seo_description']) && ($site_info['site_seo_description'] !== '')?$site_info['site_seo_description']:''); ?>">
    
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
	
    <link rel="stylesheet" type="text/css" href="/static/index/css/index.css?t=1587343942">
</head>
<body class="body-white">
    <div class="content pr">
        <img src="/static/index/images/logo.png" class="logo">
        <img src="/static/index/images/shouji.png" class="shouji">
        <img src="/static/index/images/text.png" class="text">
        <a href="<?php echo $site_info['ipa_url']; ?>" class="ios"><img src="/static/index/images/appstore.png" class="c-2 ios"></a>
        <a href="<?php echo $site_info['apk_url']; ?>" class="android"><img src="/static/index/images/android.png" class="c-2"></a>
        <div class="c-text">
            <img src="<?php echo cmf_get_image_preview_url($site_info['qr_url']); ?>" class="c-5"/>
        </div>
        <p class="footer-copy"><?php echo nl2br($site_info['copyright']); ?></p>
    </div>
</body>
</html>
