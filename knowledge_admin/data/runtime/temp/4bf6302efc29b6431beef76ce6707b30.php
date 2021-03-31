<?php /*a:2:{s:76:"/www/wwwroot/demo.sdwanyue.com/themes/admin_htcyltd/admin/rbac/role_add.html";i:1586334604;s:70:"/www/wwwroot/demo.sdwanyue.com/themes/admin_htcyltd/public/header.html";i:1609814284;}*/ ?>
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
<form class="layui-form js-ajax-form" action="<?php echo url('rbac/roleAddPost'); ?>" method="post"  style="padding: 20px 30px 0 0;">
    <div class="layui-form-item">
        <label for="input-name" class="layui-form-label"><span class="form-required">*</span><?php echo lang('ROLE_NAME'); ?></label>
        <div class="layui-input-block">
            <input type="text" class="layui-input" id="input-name" required lay-verify="required" name="name">
        </div>
    </div>
    <div class="layui-form-item">
        <label for="input-remark" class="layui-form-label"><?php echo lang('ROLE_DESCRIPTION'); ?></label>
        <div class="layui-input-block">
            <textarea type="text" class="layui-textarea" id="input-remark" name="remark"></textarea>
        </div>
    </div>
    <div class="layui-form-item">
        <label class="layui-form-label"><?php echo lang('STATUS'); ?></label>
        <div class="layui-input-block">
            <div class="layui-input-inline">
                <input type="checkbox" name="status" lay-skin="switch" value="1"  lay-text="<?php echo lang('ENABLED'); ?>|<?php echo lang('DISABLED'); ?>" checked>
            </div>
        </div>
    </div>
    <div class="layui-form-item">
        <div class="layui-input-block">
            <button type="submit" class="layui-btn js-ajax-submit js-close" id="js-ajax-submit"><?php echo lang('ADD'); ?></button>
        </div>
    </div>
</form>
<script src="/static/js/admin.js"></script>
</body>
</html>