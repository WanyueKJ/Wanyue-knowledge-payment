<?php /*a:2:{s:77:"/www/wwwroot/demo.sdwanyue.com/themes/admin_htcyltd/admin/user/user_info.html";i:1584454510;s:70:"/www/wwwroot/demo.sdwanyue.com/themes/admin_htcyltd/public/header.html";i:1609814284;}*/ ?>
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
				<li class="layui-this"><a href="<?php echo url('user/userinfo'); ?>"><?php echo lang('ADMIN_USER_USERINFO'); ?></a></li>
				<li><a href="<?php echo url('setting/password'); ?>"><?php echo lang('ADMIN_SETTING_PASSWORD'); ?></a></li>
			</ul>
			<form class="form-horizontal js-ajax-form margin-top-20" role="form" method="post" action="<?php echo url('User/userinfoPost'); ?>">
				<div class="layui-tab-content">
					<div class="layui-form-item">
						<label for="input-user-nickname" class="layui-form-label"><?php echo lang('NICKNAME'); ?></label>
						<div class="layui-input-block">
							<input type="text" class="layui-input" id="input-user-nickname" name="user_nickname" value="<?php echo $user_nickname; ?>">
						</div>
					</div>
					<div class="layui-form-item">
						<label for="input-gender" class="layui-form-label"><?php echo lang('GENDER'); ?></label>
						<div class="layui-input-block">
							<select class="layui-input" name="sex" id="input-gender">
								<?php $sexs=array("0"=>lang('GENDER_SECRECY'),"1"=>lang('MALE'),"2"=>lang('FEMALE')); if(is_array($sexs) || $sexs instanceof \think\Collection || $sexs instanceof \think\Paginator): if( count($sexs)==0 ) : echo "" ;else: foreach($sexs as $key=>$vo): $sexselected=$key==$sex?"selected":""; ?>
									<option value="<?php echo $key; ?>" <?php echo $sexselected; ?>><?php echo $vo; ?></option>
								<?php endforeach; endif; else: echo "" ;endif; ?>
							</select>
						</div>
					</div>
					<div class="layui-form-item">
						<label for="input-birthday" class="layui-form-label"><?php echo lang('BIRTHDAY'); ?></label>
						<div class="layui-input-block">
							<input type="text" class="layui-input" id="input-birthday" name="birthday" value="<?php echo date('Y-m-d',$birthday); ?>" placeholder="2013-01-04">
						</div>
					</div>
					<div class="layui-form-item">
						<label for="input-user_url" class="layui-form-label"><?php echo lang('WEBSITE'); ?></label>
						<div class="layui-input-block">
							<input type="text" class="layui-input" id="input-user_url" name="user_url" value="<?php echo $user_url; ?>" placeholder="http://thinkcmf.com">
						</div>
					</div>
					<div class="layui-form-item">
						<label for="input-signature" class="layui-form-label"><?php echo lang('SIGNATURE'); ?></label>
						<div class="layui-input-block">
							<textarea class="layui-input" id="input-signature" name="signature" placeholder="<?php echo lang('SIGNATURE'); ?>"><?php echo $signature; ?></textarea>
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