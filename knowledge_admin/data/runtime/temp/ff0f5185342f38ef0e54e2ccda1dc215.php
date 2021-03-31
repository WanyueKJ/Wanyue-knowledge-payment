<?php /*a:3:{s:60:"/www/wwwroot/demo.sdwanyue.com/themes/simpleboot3/error.html";i:1602491838;s:66:"/www/wwwroot/demo.sdwanyue.com/themes/simpleboot3/public/head.html";i:1602491838;s:68:"/www/wwwroot/demo.sdwanyue.com/themes/simpleboot3/public/footer.html";i:1602491838;}*/ ?>
<!DOCTYPE html>
	<html lang="en">
	<head>
	<link type="text/css" rel="stylesheet" href="/static/home/css/common.css"/>
    <title>跳转提示</title>
    
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
	
    <style type="text/css">
        *{ padding: 0; margin: 0; }
        body{ background: #fff; font-family: '微软雅黑'; color: #333; font-size: 16px; }
        .error_bd{
            padding-top:150px;
            text-align:center;
        }
        .error_bd .error_img{}
        .error_bd .error_img img{}
        .error_bd .error_msg{
            color:#323232;
        }
    </style>
	</head>
<body class="body-white">
    <div class="error_bd">
        <div class="error_img">
            <img src="/static/images/error.png">
        </div>
        <div class="error_msg">
            <?php echo (isset($msg) && ($msg !== '')?$msg:''); ?>
        </div>
    </div>
    
	<script type="text/javascript">
	(function(){
        var wait = 3,href = '<?php echo (isset($jumpUrl) && ($jumpUrl !== '')?$jumpUrl:''); ?>';
        var interval = setInterval(function(){
            var time = --wait;
            if(time <= 0) {
                if(href==''){
                    href='/';
                }
                location.href = href;
                clearInterval(interval);
            
            };
        }, 1000);
        })();
	</script>

</body>
</html>