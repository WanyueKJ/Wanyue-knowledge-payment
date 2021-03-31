<?php /*a:2:{s:79:"/www/wwwroot/demo.sdwanyue.com/themes/admin_htcyltd/admin/setting/password.html";i:1584454906;s:70:"/www/wwwroot/demo.sdwanyue.com/themes/admin_htcyltd/public/header.html";i:1609814284;}*/ ?>
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
</head>
<body>
<div class="layui-fluid">
	<div class="layui-card">
		<div class="layui-tab layui-tab-brief">
			<ul class="layui-tab-title">
				<li><a href="<?php echo url('user/userinfo'); ?>"><?php echo lang('ADMIN_USER_USERINFO'); ?></a></li>
				<li class="layui-this"><a href="<?php echo url('setting/password'); ?>"><?php echo lang('ADMIN_SETTING_PASSWORD'); ?></a></li>
			</ul>
			<form class="js-ajax-form" method="post" action="<?php echo url('setting/passwordPost'); ?>">
				<div class="layui-tab-content">
					<div class="layui-form-item">
						<label for="input-old-password" class="layui-form-label"><?php echo lang('OLD_PASSWORD'); ?></label>
						<div class="layui-input-block">
							<input type="password" class="layui-input" id="input-old-password" name="old_password">
						</div>
					</div>
					<div class="layui-form-item">
						<label for="input-password" class="layui-form-label"><?php echo lang('NEW_PASSWORD'); ?></label>
						<div class="layui-input-block">
							<input type="password" class="layui-input" id="input-password" name="password">
						</div>
					</div>
					<div class="layui-form-item">
						<label for="input-repassword" class="layui-form-label"><?php echo lang('CONFIRM_PASSWORD'); ?></label>
						<div class="layui-input-block">
							<input type="password" class="layui-input" id="input-repassword" name="re_password">
						</div>
					</div>
					<div class="layui-form-item">
						<div class="layui-input-block">
							<button type="submit" class="layui-btn js-ajax-submit"><?php echo lang('SAVE'); ?></button>
						</div>
					</div>
				</div>
			</form>
		</div>
	</div>
</div>
<script src="/static/js/admin.js"></script>
</body>
</html>