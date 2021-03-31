<?php /*a:1:{s:97:"D:\My_project\wanyue_education_web_local\education_web/themes/admin_simpleboot3/admin\\login.html";i:1602491837;}*/ ?>
<!DOCTYPE html>
<html>
<head>
    <meta charset="UTF-8"/>
    <title><?php echo $configpub['site_name']; ?></title>
    <meta http-equiv="X-UA-Compatible" content="chrome=1,IE=edge"/>
    <meta name="renderer" content="webkit|ie-comp|ie-stand">
    <meta name="robots" content="noindex,nofollow">
    <!-- HTML5 shim for IE8 support of HTML5 elements -->
    <!--[if lt IE 9]>
    <script src="https://oss.maxcdn.com/libs/html5shiv/3.7.0/html5shiv.js"></script>
    <![endif]-->
    <link href="/themes/admin_simpleboot3/public/assets/themes/<?php echo cmf_get_admin_style(); ?>/bootstrap.min.css" rel="stylesheet">
    <link href="/static/font-awesome/css/font-awesome.min.css" rel="stylesheet" type="text/css">
    <link href="/themes/admin_simpleboot3/public/assets/themes/<?php echo cmf_get_admin_style(); ?>/login.css" rel="stylesheet">
    <!--[if lt IE 9]>
    <script src="https://cdn.bootcss.com/respond.js/1.4.2/respond.min.js"></script>
    <![endif]-->
    <script>
        if (window.parent !== window.self) {
            document.write              = '';
            window.parent.location.href = window.self.location.href;
            setTimeout(function () {
                document.body.innerHTML = '';
            }, 0);
        }
    </script>
</head>
<body>
<div class="wrap">
    <div class="container">
        <div class="row">
            <div class="col-md-4 col-md-offset-4">
                <h1 class="text-center"><?php echo $configpub['site_name']; ?></h1>
                <form class="js-ajax-form" action="<?php echo url('public/doLogin'); ?>" method="post">
                    <div class="form-group">
                        <input type="text" id="input_username" class="form-control" name="username"
                               placeholder="<?php echo lang('USERNAME_OR_EMAIL'); ?>" title="<?php echo lang('USERNAME_OR_EMAIL'); ?>"
                               value="<?php echo cookie('admin_username'); ?>" data-rule-required="true" data-msg-required="">
                    </div>

                    <div class="form-group">
                        <input type="password" id="input_password" class="form-control" name="password"
                               placeholder="<?php echo lang('PASSWORD'); ?>" title="<?php echo lang('PASSWORD'); ?>" data-rule-required="true"
                               data-msg-required="">
                    </div>

                    <div class="form-group">
                        <div style="position: relative;">
                            <input type="text" name="captcha" placeholder="验证码" class="form-control captcha">
                            <?php $__CAPTCHA_SRC=url('/new_captcha').'?height=32&width=150&font_size=18'; ?>
<img src="<?php echo $__CAPTCHA_SRC; ?>" onclick="this.src='<?php echo $__CAPTCHA_SRC; ?>&time='+Math.random();" title="换一张" class="captcha captcha-img verify_img" style="cursor: pointer;position:absolute;right:1px;top:1px;"/>
<input type="hidden" name="_captcha_id" value="">
                        </div>
                    </div>

                    <div class="form-group">
                        <input type="hidden" name="redirect" value="">
                        <button class="btn btn-primary btn-block js-ajax-submit" type="submit" style="margin-left: 0px"
                                data-loadingmsg="<?php echo lang('LOADING'); ?>">
                            <?php echo lang('LOGIN'); ?>
                        </button>
                    </div>

                </form>
            </div>
        </div>

    </div>
</div>
<script type="text/javascript">
    //全局变量
    var GV = {
        ROOT: "/",
        WEB_ROOT: "/",
        JS_ROOT: "static/js/",
        APP: ''/*当前应用名*/
    };
</script>
<script src="/themes/admin_simpleboot3/public/assets/js/jquery-1.10.2.min.js"></script>
<script src="/static/js/wind.js"></script>
<script src="/static/js/admin.js"></script>
<script>
    (function () {
        document.getElementById('input_username').focus();
    })();
</script>
</body>
</html>
