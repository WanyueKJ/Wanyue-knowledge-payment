<?php /*a:2:{s:84:"/www/wwwroot/demo.sdwanyue.com/themes/admin_simpleboot3/admin/setting/configpri.html";i:1609740614;s:74:"/www/wwwroot/demo.sdwanyue.com/themes/admin_simpleboot3/public/header.html";i:1602491838;}*/ ?>
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


    <link href="/themes/admin_simpleboot3/public/assets/themes/<?php echo cmf_get_admin_style(); ?>/bootstrap.min.css" rel="stylesheet">
    <link href="/themes/admin_simpleboot3/public/assets/simpleboot3/css/simplebootadmin.css" rel="stylesheet">
    <link href="/static/font-awesome/css/font-awesome.min.css" rel="stylesheet" type="text/css">
    <!--[if lt IE 9]>
    <script src="https://cdn.bootcss.com/respond.js/1.4.2/respond.min.js"></script>
    <![endif]-->
    <style>
        form .input-order {
            margin-bottom: 0px;
            padding: 0 2px;
            width: 42px;
            font-size: 12px;
        }

        form .input-order:focus {
            outline: none;
        }

        .table-actions {
            margin-top: 5px;
            margin-bottom: 5px;
            padding: 0px;
        }

        .table-list {
            margin-bottom: 0px;
        }

        .form-required {
            color: red;
        }
    </style>
    <script type="text/javascript">
        //全局变量
        var GV = {
            ROOT: "/",
            WEB_ROOT: "/",
            JS_ROOT: "static/js/",
            APP: '<?php echo app('request')->module(); ?>'/*当前应用名*/
        };
    </script>
    <script src="/themes/admin_simpleboot3/public/assets/js/jquery-1.10.2.min.js"></script>
    <script src="/static/js/wind.js"></script>
    <script src="/themes/admin_simpleboot3/public/assets/js/bootstrap.min.js"></script>
    <script>
        Wind.css('artDialog');
        Wind.css('layer');
        $(function () {
            $("[data-toggle='tooltip']").tooltip({
                container:'body',
                html:true,
            });
            $("li.dropdown").hover(function () {
                $(this).addClass("open");
            }, function () {
                $(this).removeClass("open");
            });
        });
    </script>
    <?php if(APP_DEBUG): ?>
        <style>
            #think_page_trace_open {
                z-index: 9999;
            }
        </style>
    <?php endif; ?>
</head>
<body>
<div class="wrap js-check-wrap">
    <ul class="nav nav-tabs">
        <li class="active"><a href="#A" data-toggle="tab">登录配置</a></li>
        <li><a href="#B" data-toggle="tab">支付配置</a></li>
        <li><a href="#C" data-toggle="tab">直播配置</a></li>
    </ul>
    <form class="form-horizontal js-ajax-form margin-top-20" role="form" action="" method="post">
        <fieldset>
            <div class="tabbable">
                <div class="tab-content">
                    <div class="tab-pane active" id="A">
                        <div class="form-group">
                            <label class="col-sm-2 control-label">登录方式</label>
                            <div class="col-md-6 col-sm-10">
                                <?php 
									$QQ='QQ';
									$wx='wx';
								 ?>
								<label class="checkbox-inline"><input type="checkbox" value="QQ" name="login_type[]" <?php if(in_array(($QQ), is_array($config['login_type'])?$config['login_type']:explode(',',$config['login_type']))): ?>checked="checked"<?php endif; ?>>QQ</label>
								<label class="checkbox-inline"><input type="checkbox" value="wx" name="login_type[]" <?php if(in_array(($wx), is_array($config['login_type'])?$config['login_type']:explode(',',$config['login_type']))): ?>checked="checked"<?php endif; ?>>微信</label>
								
                            </div>
                        </div>
                        
                        <div class="form-group" style="display:none;">
                            <label class="col-sm-2 control-label">分享方式</label>
                            <div class="col-md-6 col-sm-10">
                                <?php 
									$share_qq='qq';
									$share_qzone='qzone';
									$share_wx='wx';
									$share_wchat='wchat';
								 ?>
								<label class="checkbox-inline"><input type="checkbox" value="qq" name="share_type[]" <?php if(in_array(($share_qq), is_array($config['share_type'])?$config['share_type']:explode(',',$config['share_type']))): ?>checked="checked"<?php endif; ?>>QQ</label>
								<label class="checkbox-inline"><input type="checkbox" value="qzone" name="share_type[]" <?php if(in_array(($share_qzone), is_array($config['share_type'])?$config['share_type']:explode(',',$config['share_type']))): ?>checked="checked"<?php endif; ?>>QQ空间</label>
								<label class="checkbox-inline"><input type="checkbox" value="wx" name="share_type[]" <?php if(in_array(($share_wx), is_array($config['share_type'])?$config['share_type']:explode(',',$config['share_type']))): ?>checked="checked"<?php endif; ?>>微信</label>
								<label class="checkbox-inline"><input type="checkbox" value="wchat" name="share_type[]" <?php if(in_array(($share_wchat), is_array($config['share_type'])?$config['share_type']:explode(',',$config['share_type']))): ?>checked="checked"<?php endif; ?>>微信朋友圈</label>
								
                            </div>
                        </div>

                        <div class="form-group">
                            <label class="col-sm-2 control-label">验证码开关</label>
                            <div class="col-md-6 col-sm-10">
                                <select class="form-control" name="options[sendcode_switch]">
                                    <option value="0">关闭</option>
                                    <option value="1" <?php if($config['sendcode_switch'] == '1'): ?>selected<?php endif; ?>>开启</option>
                                </select>
                                验证码开关,关闭后不再发送真实验证码，采用默认验证码123456
                            </div>
                        </div>
                        
                          <div class="form-group">
                            <label for="input-tx_api_secretid" class="col-sm-2 control-label">腾讯云-API密钥-SecretId</label>
                            <div class="col-md-6 col-sm-10">
                                <input type="text" class="form-control" id="input-tx_api_secretid" name="options[tx_api_secretid]" value="<?php echo (isset($config['tx_api_secretid']) && ($config['tx_api_secretid'] !== '')?$config['tx_api_secretid']:''); ?>"> 腾讯云API密钥ID
                            </div>
                        </div>
                        
                        <div class="form-group">
                            <label for="input-tx_api_secretkey" class="col-sm-2 control-label">腾讯云-API密钥-SecretKey</label>
                            <div class="col-md-6 col-sm-10">
                                <input type="text" class="form-control" id="input-tx_api_secretkey" name="options[tx_api_secretkey]" value="<?php echo (isset($config['tx_api_secretkey']) && ($config['tx_api_secretkey'] !== '')?$config['tx_api_secretkey']:''); ?>"> 腾讯云API密钥
                            </div>
                        </div>
                        
                        <div class="form-group">
                            <label for="input-tx_sms_sdkappid" class="col-sm-2 control-label">腾讯云-短信应用SDKAppid</label>
                            <div class="col-md-6 col-sm-10">
                                <input type="text" class="form-control" id="input-tx_sms_sdkappid" name="options[tx_sms_sdkappid]" value="<?php echo (isset($config['tx_sms_sdkappid']) && ($config['tx_sms_sdkappid'] !== '')?$config['tx_sms_sdkappid']:''); ?>"> 腾讯云短信APPID
                            </div>
                        </div>
                        
                        <div class="form-group">
                            <label for="input-tx_sms_sign" class="col-sm-2 control-label">腾讯云-短信签名</label>
                            <div class="col-md-6 col-sm-10">
                                <input type="text" class="form-control" id="input-tx_sms_sign" name="options[tx_sms_sign]" value="<?php echo (isset($config['tx_sms_sign']) && ($config['tx_sms_sign'] !== '')?$config['tx_sms_sign']:''); ?>"> 腾讯云短信签名
                            </div>
                        </div>
                        
                        <div class="form-group">
                            <label for="input-tx_sms_tempid" class="col-sm-2 control-label">腾讯云-短信模板ID</label>
                            <div class="col-md-6 col-sm-10">
                                <input type="text" class="form-control" id="input-tx_sms_tempid" name="options[tx_sms_tempid]" value="<?php echo (isset($config['tx_sms_tempid']) && ($config['tx_sms_tempid'] !== '')?$config['tx_sms_tempid']:''); ?>"> 腾讯云短信模板ID
                            </div>
                        </div>
                        
                        <!-- <div class="form-group">
                            <label for="input-ccp_sid" class="col-sm-2 control-label">容联云ACCOUNT SID</label>
                            <div class="col-md-6 col-sm-10">
                                <input type="text" class="form-control" id="input-ccp_sid" name="options[ccp_sid]" value="<?php echo (isset($config['ccp_sid']) && ($config['ccp_sid'] !== '')?$config['ccp_sid']:''); ?>">  短信验证码 
                            </div>
                        </div>
                        <div class="form-group">
                            <label for="input-ccp_token" class="col-sm-2 control-label">容联云AUTH TOKEN</label>
                            <div class="col-md-6 col-sm-10">
                                <input type="text" class="form-control" id="input-ccp_token" name="options[ccp_token]" value="<?php echo (isset($config['ccp_token']) && ($config['ccp_token'] !== '')?$config['ccp_token']:''); ?>">  短信验证码 
                            </div>
                        </div>
                        <div class="form-group">
                            <label for="input-ccp_appid" class="col-sm-2 control-label">容联云应用APPID</label>
                            <div class="col-md-6 col-sm-10">
                                <input type="text" class="form-control" id="input-ccp_appid" name="options[ccp_appid]" value="<?php echo (isset($config['ccp_appid']) && ($config['ccp_appid'] !== '')?$config['ccp_appid']:''); ?>">  短信验证码 
                            </div>
                        </div>
                        <div class="form-group">
                            <label for="input-ccp_tempid" class="col-sm-2 control-label">容联云短信模板ID</label>
                            <div class="col-md-6 col-sm-10">
                                <input type="text" class="form-control" id="input-ccp_tempid" name="options[ccp_tempid]" value="<?php echo (isset($config['ccp_tempid']) && ($config['ccp_tempid'] !== '')?$config['ccp_tempid']:''); ?>">  短信验证码 
                            </div>
                        </div> -->
                        
                        <div class="form-group">
                            <label for="input-wx_appid_pc" class="col-sm-2 control-label">PC-微信登录appid</label>
                            <div class="col-md-6 col-sm-10">
                                <input type="text" class="form-control" id="input-wx_appid_pc" name="options[wx_appid_pc]" value="<?php echo (isset($config['wx_appid_pc']) && ($config['wx_appid_pc'] !== '')?$config['wx_appid_pc']:''); ?>">  PC 微信登录appid（微信开放平台网页应用 APPID）
                            </div>
                        </div>
                        
                        <div class="form-group">
                            <label for="input-wx_appsecret_pc" class="col-sm-2 control-label">PC-微信登录appsecret</label>
                            <div class="col-md-6 col-sm-10">
                                <input type="text" class="form-control" id="input-wx_appsecret_pc" name="options[wx_appsecret_pc]" value="<?php echo (isset($config['wx_appsecret_pc']) && ($config['wx_appsecret_pc'] !== '')?$config['wx_appsecret_pc']:''); ?>">  PC 微信登录appsecret（微信开放平台网页应用 AppSecret）
                            </div>
                        </div>
                        
                        
                        <div class="form-group">
                            <div class="col-sm-offset-2 col-sm-10">
                                <button type="submit" class="btn btn-primary js-ajax-submit" data-refresh="1">
                                    <?php echo lang('SAVE'); ?>
                                </button>
                            </div>
                        </div>
                    </div>
                    <div class="tab-pane" id="B">

                        <div class="form-group">
                            <label for="input-aliapp_partner" class="col-sm-2 control-label">支付宝合作者身份ID</label>
                            <div class="col-md-6 col-sm-10">
                                <input type="text" class="form-control" id="input-aliapp_partner" name="options[aliapp_partner]" value="<?php echo (isset($config['aliapp_partner']) && ($config['aliapp_partner'] !== '')?$config['aliapp_partner']:''); ?>">
                            </div>
                        </div>
                        
                        <div class="form-group">
                            <label for="input-aliapp_seller_id" class="col-sm-2 control-label">支付宝帐号</label>
                            <div class="col-md-6 col-sm-10">
                                <input type="text" class="form-control" id="input-aliapp_seller_id" name="options[aliapp_seller_id]" value="<?php echo (isset($config['aliapp_seller_id']) && ($config['aliapp_seller_id'] !== '')?$config['aliapp_seller_id']:''); ?>">
                            </div>
                        </div>
                        
                        <div class="form-group">
                            <label for="input-aliapp_key" class="col-sm-2 control-label">支付宝开发者密钥</label>
                            <div class="col-md-6 col-sm-10">
                                <textarea class="form-control" id="input-aliapp_key" name="options[aliapp_key]" ><?php echo (isset($config['aliapp_key']) && ($config['aliapp_key'] !== '')?$config['aliapp_key']:''); ?></textarea> 密钥使用PKCS8版本
                            </div>
                        </div>
                        
                        <div class="form-group">
                            <label for="input-wx_mchid" class="col-sm-2 control-label">微信商户号mchid</label>
                            <div class="col-md-6 col-sm-10">
                                <input type="text" class="form-control" id="input-wx_mchid" name="options[wx_mchid]" value="<?php echo (isset($config['wx_mchid']) && ($config['wx_mchid'] !== '')?$config['wx_mchid']:''); ?>"> 微信商户号mchid（微信开放平台移动应用 对应的微信商户 商户号mchid）
                            </div>
                        </div>
                        
                        <div class="form-group">
                            <label for="input-wx_key" class="col-sm-2 control-label">微信密钥key</label>
                            <div class="col-md-6 col-sm-10">
                                <input type="text" class="form-control" id="input-wx_key" name="options[wx_key]" value="<?php echo (isset($config['wx_key']) && ($config['wx_key'] !== '')?$config['wx_key']:''); ?>"> 微信密钥key（微信开放平台移动应用 对应的微信商户 密钥key）
                            </div>
                        </div>

                        <div class="form-group">
                            <label class="col-sm-2 control-label">PC-支付宝开关</label>
                            <div class="col-md-6 col-sm-10">
								<select class="form-control" name="options[alipc_switch]">
                                    <option value="0">关闭</option>
                                    <option value="1" <?php if($config['alipc_switch'] == '1'): ?>selected<?php endif; ?>>开启</option>
                                </select>
                            </div>
                        </div>
                        <div class="form-group">
                            <label for="input-aliapp_check" class="col-sm-2 control-label">PC-支付宝MD5秘钥</label>
                            <div class="col-md-6 col-sm-10">
                                <input type="text" class="form-control" id="input-aliapp_check" name="options[aliapp_check]" value="<?php echo (isset($config['aliapp_check']) && ($config['aliapp_check'] !== '')?$config['aliapp_check']:''); ?>">
                            </div>
                        </div>

                        <div class="form-group">
                            <label class="col-sm-2 control-label">PC-微信开关</label>
                            <div class="col-md-6 col-sm-10">
								<select class="form-control" name="options[wxpc_switch]">
                                    <option value="0">关闭</option>
                                    <option value="1" <?php if($config['wxpc_switch'] == '1'): ?>selected<?php endif; ?>>开启</option>
                                </select>
                            </div>
                        </div>
                        <div class="form-group">
                            <label for="input-pc_wx_appid" class="col-sm-2 control-label">PC-支付-微信公众平台AppID</label>
                            <div class="col-md-6 col-sm-10">
                                <input type="text" class="form-control" id="input-pc_wx_appid" name="options[pc_wx_appid]" value="<?php echo (isset($config['pc_wx_appid']) && ($config['pc_wx_appid'] !== '')?$config['pc_wx_appid']:''); ?>">
                            </div>
                        </div>
                        
                        <div class="form-group">
                            <label for="input-pc_wx_appsecret" class="col-sm-2 control-label">PC-支付-微信公众平台appsecret</label>
                            <div class="col-md-6 col-sm-10">
                                <input type="text" class="form-control" id="input-pc_wx_appsecret" name="options[pc_wx_appsecret]" value="<?php echo (isset($config['pc_wx_appsecret']) && ($config['pc_wx_appsecret'] !== '')?$config['pc_wx_appsecret']:''); ?>">
                            </div>
                        </div>
                        
                        <div class="form-group">
                            <label for="input-pc_wx_mchid" class="col-sm-2 control-label">PC-微信公众号-商户号mchid</label>
                            <div class="col-md-6 col-sm-10">
                                <input type="text" class="form-control" id="input-pc_wx_mchid" name="options[pc_wx_mchid]" value="<?php echo (isset($config['pc_wx_mchid']) && ($config['pc_wx_mchid'] !== '')?$config['pc_wx_mchid']:''); ?>"> 微信商户号mchid（微信公众号 对应的微信商户 商户号mchid）
                            </div>
                        </div>
                        
                        <div class="form-group">
                            <label for="input-pc_wx_key" class="col-sm-2 control-label">PC-微信公众号-微信商户号密钥key</label>
                            <div class="col-md-6 col-sm-10">
                                <input type="text" class="form-control" id="input-pc_wx_key" name="options[pc_wx_key]" value="<?php echo (isset($config['pc_wx_key']) && ($config['pc_wx_key'] !== '')?$config['pc_wx_key']:''); ?>"> 微信密钥key（微信公众号 对应的微信商户 密钥key）
                            </div>
                        </div>
                        
                        <div class="form-group">
                            <div class="col-sm-offset-2 col-sm-10">
                                <button type="submit" class="btn btn-primary js-ajax-submit" data-refresh="0">
                                    <?php echo lang('SAVE'); ?>
                                </button>
                            </div>
                        </div>
                    </div>
                    
                    <div class="tab-pane" id="C">
                        <div class="form-group">
                            <label for="input-chatserver" class="col-sm-2 control-label">聊天服务器带端口</label>
                            <div class="col-md-6 col-sm-10">
                                <input type="text" class="form-control" id="input-chatserver" name="options[chatserver]" value="http://域名:19967">  格式：http://域名(:端口) 或者 http://IP(:端口)
                            </div>
                        </div>
                        <div <?php if(config('type') != 0): ?>style="display:none;"<?php endif; ?> >
                            <div class="form-group">
                                <label for="input-sound_appid" class="col-sm-2 control-label">声网Appid</label>
                                <div class="col-md-6 col-sm-10">
                                    <input type="text" class="form-control" id="input-sound_appid" name="options[sound_appid]" value="">
                                </div>
                            </div>

                            <div class="form-group">
                                <label for="input-agora_api_id" class="col-sm-2 control-label">声网api 客户ID</label>
                                <div class="col-md-6 col-sm-10">
                                    <input type="text" class="form-control" id="input-agora_api_id" name="options[agora_api_id]" value="">声网后台 ->右上角->RESTful API
                                </div>
                            </div>

                            <div class="form-group">
                                <label for="input-agora_api_key" class="col-sm-2 control-label">声网api 客户证书</label>
                                <div class="col-md-6 col-sm-10">
                                    <input type="text" class="form-control" id="input-agora_api_key" name="options[agora_api_key]" value="">声网后台 ->右上角->RESTful API
                                </div>
                            </div>
                            <p style="width:1117px; margin: 10px auto; font-weight:bold;">
                                注: 此站为演示站, 请勿修改此直播配置. 若想自行修改, 可下载完整代码包搭建即可.
                            </p>
                        </div>

                        <div <?php if(config('type') != 1): ?>style="display:none;"<?php endif; ?> >
                            <div class="form-group">
                                <label class="col-sm-2 control-label">应用KEY</label>
                                <div class="col-md-6 col-sm-10">
                                    <input type="text" class="form-control" id="input-app-key" name="options[app_key]" value="<?php echo (isset($config['app_key']) && ($config['app_key'] !== '')?$config['app_key']:''); ?>">
                                </div>
                            </div>

                            <div class="form-group">
                                <label class="col-sm-2 control-label">应用SECRET</label>
                                <div class="col-md-6 col-sm-10">
                                    <input type="text" class="form-control" id="input-app-secret" name="options[app_secret]" value="<?php echo (isset($config['app_secret']) && ($config['app_secret'] !== '')?$config['app_secret']:''); ?>">

                                </div>
                            </div>
                        </div>
                        
                        <div class="form-group">
                            <div class="col-sm-offset-2 col-sm-10">
                                <button type="submit" class="btn btn-primary js-ajax-submit" data-refresh="0">
                                    <?php echo lang('SAVE'); ?>
                                </button>
                            </div>
                        </div>
                    </div>

                </div>
            </div>
        </fieldset>
    </form>

</div>
<script type="text/javascript" src="/static/js/admin.js"></script>
</body>
</html>
