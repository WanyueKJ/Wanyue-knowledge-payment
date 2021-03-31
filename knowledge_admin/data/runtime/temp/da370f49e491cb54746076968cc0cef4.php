<?php /*a:2:{s:72:"/www/wwwroot/demo.sdwanyue.com/themes/admin_htcyltd/admin/user/edit.html";i:1586334830;s:70:"/www/wwwroot/demo.sdwanyue.com/themes/admin_htcyltd/public/header.html";i:1609814284;}*/ ?>
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
<form method="post" class="layui-form js-ajax-form" action="<?php echo url('User/editPost'); ?>" style="padding: 20px 30px 0 0;">
	<div class="layui-form-item">
		<label for="input-user_login" class="layui-form-label"><span class="form-required">*</span><?php echo lang('USERNAME'); ?></label>
		<div class="layui-input-block">
			<input type="text" class="layui-input" required lay-verify="required" id="input-user_login" name="user_login" value="<?php echo $user_login; ?>">
		</div>
	</div>
	<div class="layui-form-item">
		<label for="input-user_pass" class="layui-form-label"><span class="form-required">*</span><?php echo lang('PASSWORD'); ?></label>
		<div class="layui-input-block">
			<input type="text" class="layui-input" required lay-verify="required" id="input-user_pass" name="user_pass" value="" placeholder="******">
		</div>
	</div>
	<div class="layui-form-item">
		<label for="input-user_email" class="layui-form-label"><span class="form-required">*</span><?php echo lang('EMAIL'); ?></label>
		<div class="layui-input-block">
			<input type="text" class="layui-input" required lay-verify="required" id="input-user_email" name="user_email" value="<?php echo $user_email; ?>">
		</div>
	</div>
	<div class="layui-form-item">
		<label for="input-user_email" class="layui-form-label"><span class="form-required">*</span><?php echo lang('ROLE'); ?></label>
		<div class="layui-input-block">
			<?php if(is_array($roles) || $roles instanceof \think\Collection || $roles instanceof \think\Paginator): if( count($roles)==0 ) : echo "" ;else: foreach($roles as $key=>$vo): $role_id_checked=in_array($vo['id'],$role_ids)?"checked":""; ?>
				<input value="<?php echo $vo['id']; ?>" type="checkbox" name="role_id[]" title="<?php echo $vo['name']; ?>" <?php echo $role_id_checked; if(cmf_get_current_admin_id() != 1 && $vo['id'] == 1): ?>disabled="true"<?php endif; ?>>
			<?php endforeach; endif; else: echo "" ;endif; ?>
		</div>
	</div>
	<div class="layui-form-item">
		<div class="layui-input-block">
			<input type="hidden" name="id" value="<?php echo $id; ?>" />
			<button type="submit" class="layui-btn js-ajax-submit js-close" id="js-ajax-submit"><?php echo lang('SAVE'); ?></button>
		</div>
	</div>
</form>

<script src="/static/js/admin.js"></script>
</body>
</html>