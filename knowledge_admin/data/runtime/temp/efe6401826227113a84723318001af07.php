<?php /*a:2:{s:86:"D:\My_project\Wanyue-knowledge-payment-admin/themes/admin_htcyltd/admin\users\add.html";i:1609930801;s:84:"D:\My_project\Wanyue-knowledge-payment-admin/themes/admin_htcyltd/public\header.html";i:1609814284;}*/ ?>
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
    <form method="post" class="layui-form js-ajax-form" action="<?php echo url('users/addPost'); ?>" style="margin-top: 20px;">

            <div class="layui-form-item">
				<label for="input-user_login"  class="layui-form-label"><span class="form-required">*</span>手机号</label>
				<div class="layui-input-block">
					<input type="text" class="layui-input" required lay-verify="required" id="input-user_login" name="user_login">
				</div>
			</div>
            
            <div class="layui-form-item">
				<label for="input-user_pass"  class="layui-form-label"><span class="form-required">*</span>密码</label>
				<div class="layui-input-block">
					<input type="password" required lay-verify="required" class="layui-input" id="input-user_pass" name="user_pass">6-12位字母数字组合
				</div>
			</div>
            
            <div class="layui-form-item">
				<label for="input-user_nickname"  class="layui-form-label"><span class="form-required">*</span>昵称</label>
				<div class="layui-input-block">
					<input type="text" class="layui-input" required lay-verify="required" id="input-user_nickname" name="user_nickname">
				</div>
			</div>
            
            
            <div class="layui-form-item">
				<label for="input-user_login" class="layui-form-label">头像</label>

				<div class="layui-input-block">
					<input type="hidden" name="avatar" id="thumbnail1" value="">
					<a href="javascript:uploadOneImage('图片上传','#thumbnail1');">
						<img src="/themes/admin_htcyltd/public/assets/images/default-thumbnail.png" id="thumbnail1-preview" style="cursor: pointer;max-width:150px;max-height:150px;"/>
					</a>
					<div class="layui-col-md12" style="margin-top: 10px">
						<input type="button" class="layui-btn layui-btn-sm layui-btn-normal"
							   onclick="$('#thumbnail1-preview').attr('src','/themes/admin_htcyltd/public/assets/images/default-thumbnail.png');$('#thumbnail1').val('');return false;"
							   value="取消图片">
					</div>
				</div>
			</div>
            
            <div class="layui-form-item">
				<label class="layui-form-label">头像小图</label>

				<div class="layui-input-block">
					<input type="hidden" name="avatar_thumb" id="thumbnail2" value="">
					<a href="javascript:uploadOneImage('图片上传','#thumbnail2');">
						<img src="/themes/admin_htcyltd/public/assets/images/default-thumbnail.png" id="thumbnail2-preview" style="cursor: pointer;max-width:150px;max-height:150px;"/>
					</a>
					<div class="layui-col-md12" style="margin-top: 10px">
						<input type="button" class="layui-btn layui-btn-sm layui-btn-normal"
							   onclick="$('#thumbnail1-preview').attr('src','/themes/admin_htcyltd/public/assets/images/default-thumbnail.png');$('#thumbnail2').val('');return false;"
							   value="取消图片">
					</div>
				</div>
			</div>
            
            <div class="layui-form-item">
                <label class="layui-form-label">性别</label>
                <div class="layui-input-block">
                    <select class="layui-input" name="sex">
                        <option value="1">男</option>
                        <option value="2">女</option>
                    </select>
                </div>
            </div>
            
            <!-- <div class="layui-form-item">
				<label for="input-swftime" class="layui-form-label">个性签名</label>
				<div class="layui-input-block">
					<textarea class="layui-input" id="input-signature" name="signature" ></textarea> 
				</div>
			</div> -->
            
            
			<div class="layui-form-item">
				<div class="layui-input-block">
					<button type="submit" id="js-ajax-submit" class="layui-btn js-ajax-submit js-close"><?php echo lang('ADD'); ?></button>
				</div>
			</div>
            
		</form>
</div>


<script type="text/javascript" src="/static/js/wind.js"></script>
<script src="/static/js/admin.js"></script>

</body>
</html>