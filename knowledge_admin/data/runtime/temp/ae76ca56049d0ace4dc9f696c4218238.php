<?php /*a:3:{s:98:"D:\My_project\wanyue_education_web_local\education_web/themes/simpleboot3/home\article\detail.html";i:1602491837;s:88:"D:\My_project\wanyue_education_web_local\education_web/themes/simpleboot3/home\head.html";i:1602491837;s:91:"D:\My_project\wanyue_education_web_local\education_web/themes/simpleboot3/home\scripts.html";i:1602491837;}*/ ?>
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

	
    <title><?php echo (isset($page['post_title']) && ($page['post_title'] !== '')?$page['post_title']:''); ?></title>
    <link href="/static/home/css/article.css?t=1556176544" rel="stylesheet" type="text/css">
</head>
<body>
    <div class="article">
        <div class="article_left">
            <ul>
                <?php if(is_array($list) || $list instanceof \think\Collection || $list instanceof \think\Paginator): $i = 0; $__LIST__ = $list;if( count($__LIST__)==0 ) : echo "" ;else: foreach($__LIST__ as $key=>$v): $mod = ($i % 2 );++$i;?>
                <li <?php if($v['ison'] == 1): ?>class="on"<?php endif; ?> ><a href="/home/article/detail?id=<?php echo $v['id']; ?>"><?php echo $v['post_title']; ?></a></li>
                <?php endforeach; endif; else: echo "" ;endif; ?>
            </ul>
        </div>
        <div class="article_right">
            <div class="article_bd">
                <div class="title">
                    <?php echo (isset($page['post_title']) && ($page['post_title'] !== '')?$page['post_title']:''); ?>
                </div>

                <div class="content">
                    <?php echo (isset($page['post_content']) && ($page['post_content'] !== '')?$page['post_content']:''); ?>
                </div>
            </div>
        </div>
    </div>
    
    
<script src="/static/js/jquery.js"></script>
<script src="/static/js/layer/layer.js"></script>



</body>
</html>
