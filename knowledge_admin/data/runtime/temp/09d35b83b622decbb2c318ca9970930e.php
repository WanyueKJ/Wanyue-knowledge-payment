<?php /*a:2:{s:71:"/www/wwwroot/demo.sdwanyue.com/themes/admin_htcyltd/admin/push/add.html";i:1609931725;s:70:"/www/wwwroot/demo.sdwanyue.com/themes/admin_htcyltd/public/header.html";i:1609814284;}*/ ?>
<!DOCTYPE html>
<html>
<head>
    <meta charset="utf-8">
    <!-- Set render engine for 360 browser -->
    <meta name="renderer" content="webkit">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <!-- HTML5 shim for IE8 support of HTML5 elements -->
    <!--[if lt IE 9]>
    <script src="https://oss.maxcdn.com/libs/html5shiv/3.7.0/html5shiv.js"></script>
    <![endif]-->
    <link rel="stylesheet" href="/themes/admin_htcyltd/public/layuiadmin/layui/css/layui.css" media="all">
    <link rel="stylesheet" href="/themes/admin_htcyltd/public/layuiadmin/style/admin.css" media="all">
    <link rel="stylesheet" href="/themes/admin_htcyltd/public/layuiadmin/layui/css/icon.css">
    <!--[if lt IE 9]>
    <script src="https://cdn.bootcss.com/respond.js/1.4.2/respond.min.js"></script>
    <![endif]-->
    <script type="text/javascript">
        //全局变量
        var GV = {
            ROOT: "/",
            WEB_ROOT: "/",
            JS_ROOT: "static/js/",
            APP: '<?php echo app('request')->module(); ?>'/*当前应用名*/
        };
    </script>
    <script src="/themes/admin_htcyltd/public/assets/js/jquery-1.10.2.min.js"></script>
    <script src="/themes/admin_htcyltd/public/assets/js/bootstrap.min.js"></script>
    <script src="/static/js/jquery.validate/jquery.validate.js"></script>
    <script src="/static/js/ajaxForm.js"></script>
    <script src="/themes/admin_htcyltd/public/layuiadmin/layui/layui.js"></script>
    <script src="/themes/admin_htcyltd/public/assets/js/animation.js"></script>
    
    <?php if(APP_DEBUG): ?>
        <style>
            #think_page_trace_open {
                z-index: 9999;
            }
        </style>
    <?php endif; ?>
<style>html {background-color: #ffffff;}</style>

</head>
<body>
<div class="layui-fluid">
    <form method="post" class="layui-form js-ajax-form" style="margin-top: 20px;" action="<?php echo url('Push/addPost'); ?>">

	<div class="layui-form-item layui-text">
		<label for="input-touid" class="layui-form-label"><span class="form-required">*</span>推送对象</label>
		<div class="layui-input-block">
			<textarea class="layui-textarea" id="input-touid" name="touid" ></textarea>留空为推送所有会员，多个会员用 , 分隔
		</div>
	</div>

	<div class="layui-form-item layui-text">
		<label for="input-content" class="layui-form-label"><span class="form-required">*</span>推送内容</label>
		<div class="layui-input-block">
			<textarea class="layui-textarea" id="input-content" name="content" maxlength="50"></textarea>推送的消息仅支持文字，不支持图片及视频文件
		</div>
	</div>


	<div class="layui-form-item">
		<div class="layui-input-block">
			<button type="submit" class="layui-btn js-ajax-submit" id="js-ajax-submit"><?php echo lang('ADD'); ?></button>
		</div>
	</div>

</form>
</div>


	<script src="/static/js/admin.js"></script>
</body>
</html>