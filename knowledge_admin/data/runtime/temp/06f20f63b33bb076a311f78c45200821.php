<?php /*a:4:{s:67:"/www/wwwroot/demo.sdwanyue.com/themes/simpleboot3/appapi/error.html";i:1602491838;s:66:"/www/wwwroot/demo.sdwanyue.com/themes/simpleboot3/appapi/head.html";i:1602491838;s:68:"/www/wwwroot/demo.sdwanyue.com/themes/simpleboot3/appapi/footer.html";i:1602491838;s:69:"/www/wwwroot/demo.sdwanyue.com/themes/simpleboot3/appapi/scripts.html";i:1612947959;}*/ ?>
<!DOCTYPE html>
<html>
<head>
        <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1, maximum-scale=1, user-scalable=no">
    <meta content="telephone=no" name="format-detection" />
    <!-- Set render engine for 360 browser -->
    <meta name="renderer" content="webkit">

    <!-- No Baidu Siteapp-->
    <meta http-equiv="Cache-Control" content="no-siteapp"/>

    <!-- HTML5 shim for IE8 support of HTML5 elements -->
    <!--[if lt IE 9]>
    <script src="https://oss.maxcdn.com/libs/html5shiv/3.7.0/html5shiv.js"></script>
    <![endif]-->
    <link rel="icon" href="/favicon.ico" >
    <link rel="shortcut icon" href="/favicon.ico">
    <link href='/static/appapi/css/common.css?t=1573550405' rel="stylesheet" type="text/css" >

	
    <title><?php echo (isset($site_info['site_name']) && ($site_info['site_name'] !== '')?$site_info['site_name']:''); ?></title>
    <style type="text/css">
        body{text-align:center}
        img{width: 1.4rem;margin: 1.2rem auto 0.3rem;}
        .title2{padding:0 0.4rem;color: #323232;font-size: 0.3em;text-align: center;}
    </style>
</head>
<body>
     <img src="/static/appapi/images/error.jpg">
     <div class="title2"><?php echo $reason; ?></div>
     
     

     
<script type="text/javascript">
    var uid='<?php echo $uid; ?>';
    var token='<?php echo $token; ?>';
    var baseSize = 100;
    function setRem () {
        var scale = document.documentElement.clientWidth / 750;
        document.documentElement.style.fontSize = (baseSize * Math.min(scale, 3)) + 'px';
    }
    setRem();
    window.onresize = function () {
        setRem();
    }
</script>
<script src="/static/js/jquery.js"></script>
<script src="/static/js/layer/layer.js"></script>



</body>
</html>
