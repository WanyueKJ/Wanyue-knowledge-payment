<?php /*a:2:{s:103:"D:\My_project\wanyue_education_web_local\education_web/themes/admin_simpleboot3/admin\setting\site.html";i:1604306425;s:98:"D:\My_project\wanyue_education_web_local\education_web/themes/admin_simpleboot3/public\header.html";i:1602491837;}*/ ?>
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
        <li class="active"><a href="#A" data-toggle="tab"><?php echo lang('WEB_SITE_INFOS'); ?></a></li>
        <li><a href="#B" data-toggle="tab"><?php echo lang('SEO_SETTING'); ?></a></li>
        <!--<li><a href="#C" data-toggle="tab"><?php echo lang('URL_SETTING'); ?></a></li>-->
        <!--<li><a href="#E" data-toggle="tab"><?php echo lang('COMMENT_SETTING'); ?></a></li>-->
        <!-- <li><a href="#F" data-toggle="tab">用户注册设置</a></li> -->
        <!-- <li><a href="#G" data-toggle="tab">CDN设置</a></li> -->
    </ul>
    <form class="form-horizontal js-ajax-form margin-top-20" role="form" action="<?php echo url('setting/sitePost'); ?>"
          method="post">
        <fieldset>
            <div class="tabbable">
                <div class="tab-content">
                    <div class="tab-pane active" id="A">
                        <div class="form-group">
                            <label for="input-site-name" class="col-sm-2 control-label"><span
                                    class="form-required">*</span><?php echo lang('WEBSITE_NAME'); ?></label>
                            <div class="col-md-6 col-sm-10">
                                <input type="text" class="form-control" id="input-site-name" name="options[site_name]"
                                       value="<?php echo (isset($site_info['site_name']) && ($site_info['site_name'] !== '')?$site_info['site_name']:''); ?>">
                            </div>
                        </div>
						<div class="form-group">
                            <label for="input-site_url" class="col-sm-2 control-label"><span
                                    class="form-required">*</span>站点域名</label>
                            <div class="col-md-6 col-sm-10">
                                <input type="text" class="form-control" id="input-site_url" name="options[site_url]" value="<?php echo (isset($site_info['site_url']) && ($site_info['site_url'] !== '')?$site_info['site_url']:''); ?>">
                                格式： http(s)://xxxx.com(:端口号)
                            </div> 
                        </div>
                        <div class="form-group" style="display:none;">
                            <label for="input-admin_url_password" class="col-sm-2 control-label">
                                后台加密码
                                <a href="http://www.thinkcmf.com/faq.html?url=https://www.kancloud.cn/thinkcmf/faq/493509"
                                   title="查看帮助手册"
                                   data-toggle="tooltip"
                                   target="_blank"><i class="fa fa-question-circle"></i></a>
                            </label>
                            <div class="col-md-6 col-sm-10">
                                <input type="text" class="form-control" id="input-admin_url_password"
                                       name="admin_settings[admin_password]"
                                       value="<?php echo (isset($admin_settings['admin_password']) && ($admin_settings['admin_password'] !== '')?$admin_settings['admin_password']:''); ?>"
                                       id="js-site-admin-url-password">
                                <p class="help-block">英文字母数字，不能为纯数字</p>
                                <p class="help-block" style="color: red;">
                                    设置加密码后必须通过以下地址访问后台,请劳记此地址，为了安全，您也可以定期更换此加密码!</p>
                                <?php 
                                    $root=cmf_get_root();
                                    $root=empty($root)?'':'/'.$root;
                                    $site_domain = cmf_get_domain().$root;
                                 ?>
                                <p class="help-block">后台登录地址：<span id="js-site-admin-url"><?php echo $site_domain; ?>/<?php echo (isset($admin_settings['admin_password']) && ($admin_settings['admin_password'] !== '')?$admin_settings['admin_password']:'admin'); ?></span>
                                </p>
                            </div>
                        </div>
                        
                        <div class="form-group" style="display:none;">
                            <label for="input-site_admin_theme" class="col-sm-2 control-label">后台模板</label>
                            <div class="col-md-6 col-sm-10">
                                <?php 
                                    $site_admin_theme=empty($admin_settings['admin_theme'])?'':$admin_settings['admin_theme'];
                                 ?>
                                <select class="form-control" name="admin_settings[admin_theme]"
                                        id="input-site_admin_theme">
                                    <?php if(is_array($admin_themes) || $admin_themes instanceof \think\Collection || $admin_themes instanceof \think\Paginator): if( count($admin_themes)==0 ) : echo "" ;else: foreach($admin_themes as $key=>$vo): $admin_theme_selected = $site_admin_theme == $vo ? "selected" : ""; ?>
                                        <option value="<?php echo $vo; ?>" <?php echo $admin_theme_selected; ?>><?php echo $vo; ?></option>
                                    <?php endforeach; endif; else: echo "" ;endif; ?>
                                </select>
                            </div>
                        </div>
                        <div class="form-group" style="display:none;">
                            <label for="input-site_adminstyle" class="col-sm-2 control-label"><?php echo lang('WEBSITE_ADMIN_THEME'); ?></label>
                            <div class="col-md-6 col-sm-10">
                                <?php 
                                    $site_admin_style=empty($admin_settings['admin_style'])?cmf_get_admin_style():$admin_settings['admin_style'];
                                 ?>
                                <select class="form-control" name="admin_settings[admin_style]"
                                        id="input-site_adminstyle">
                                    <?php if(is_array($admin_styles) || $admin_styles instanceof \think\Collection || $admin_styles instanceof \think\Paginator): if( count($admin_styles)==0 ) : echo "" ;else: foreach($admin_styles as $key=>$vo): $admin_style_selected = $site_admin_style == $vo ? "selected" : ""; ?>
                                        <option value="<?php echo $vo; ?>" <?php echo $admin_style_selected; ?>><?php echo $vo; ?></option>
                                    <?php endforeach; endif; else: echo "" ;endif; ?>
                                </select>
                            </div>
                        </div>
                        <?php if(APP_DEBUG && false): ?>
                            <div class="form-group">
                                <label for="input-default_app" class="col-sm-2 control-label">默认应用</label>
                                <div class="col-md-6 col-sm-10">
                                    <?php 
                                        $site_default_app=empty($cmf_settings['default_app'])?'demo':$cmf_settings['default_app'];
                                     ?>
                                    <select class="form-control" name="cmf_settings[default_app]"
                                            id="input-default_app">
                                        <?php if(is_array($apps) || $apps instanceof \think\Collection || $apps instanceof \think\Paginator): if( count($apps)==0 ) : echo "" ;else: foreach($apps as $key=>$vo): $default_app_selected = $site_default_app == $vo ? "selected" : "";
                                             ?>
                                            <option value="<?php echo $vo; ?>" <?php echo $default_app_selected; ?>><?php echo $vo; ?></option>
                                        <?php endforeach; endif; else: echo "" ;endif; ?>
                                    </select>
                                </div>
                            </div>
                        <?php endif; ?>
                        
                        <div class="form-group">
                            <label for="input-copyright" class="col-sm-2 control-label">版权信息</label>
                            <div class="col-md-6 col-sm-10">
                                <textarea class="form-control" id="input-copyright" name="options[copyright]" maxlength="200"><?php echo (isset($site_info['copyright']) && ($site_info['copyright'] !== '')?$site_info['copyright']:''); ?></textarea> 版权信息（200字以内）
                            </div>
                        </div>
                        
                        
                        <div class="form-group">
                            <label for="input-site_phone" class="col-sm-2 control-label">联系电话</label>
                            <div class="col-md-6 col-sm-10">
                                <input type="text" class="form-control" id="input-site_phone" name="options[site_phone]"
                                       value="<?php echo (isset($site_info['site_phone']) && ($site_info['site_phone'] !== '')?$site_info['site_phone']:''); ?>">
                            </div>
                        </div>
                        
                        <div class="form-group">
                            <label for="input-wx_url" class="col-sm-2 control-label">官方微信</label>
                            <div class="col-md-6 col-sm-10">
                                <input type="hidden" name="options[wx_url]" id="thumbnail1" value="<?php echo (isset($site_info['wx_url']) && ($site_info['wx_url'] !== '')?$site_info['wx_url']:''); ?>">
                                <a href="javascript:uploadOneImage('图片上传','#thumbnail1');">
                                    <?php if(empty($site_info['wx_url'])): ?>
                                    <img src="/themes/admin_simpleboot3/public/assets/images/default-thumbnail.png"
                                             id="thumbnail1-preview"
                                             style="cursor: pointer;max-width:150px;max-height:150px;"/>
                                    <?php else: ?>
                                    <img src="<?php echo cmf_get_image_preview_url($site_info['wx_url']); ?>"
                                         id="thumbnail1-preview"
                                         style="cursor: pointer;max-width:150px;max-height:150px;"/>
                                    <?php endif; ?>
                                </a>
                                <input type="button" class="btn btn-sm btn-cancel-thumbnail1" onclick="$('#thumbnail1-preview').attr('src','/themes/admin_simpleboot3/public/assets/images/default-thumbnail.png');$('#thumbnail1').val('');return false;" value="取消图片"> 首页使用(官方微信二维码) 建议尺寸  200 X 200
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
                            <label for="input-site_seo_title" class="col-sm-2 control-label"><?php echo lang('WEBSITE_SEO_TITLE'); ?></label>
                            <div class="col-md-6 col-sm-10">
                                <input type="text" class="form-control" id="input-site_seo_title"
                                       name="options[site_seo_title]" value="<?php echo (isset($site_info['site_seo_title']) && ($site_info['site_seo_title'] !== '')?$site_info['site_seo_title']:''); ?>">
                            </div>
                        </div>
                        <div class="form-group">
                            <label for="input-site_seo_keywords" class="col-sm-2 control-label"><?php echo lang('WEBSITE_SEO_KEYWORDS'); ?></label>
                            <div class="col-md-6 col-sm-10">
                                <input type="text" class="form-control" id="input-site_seo_keywords"
                                       name="options[site_seo_keywords]"
                                       value="<?php echo (isset($site_info['site_seo_keywords']) && ($site_info['site_seo_keywords'] !== '')?$site_info['site_seo_keywords']:''); ?>">
                            </div>
                        </div>
                        <div class="form-group">
                            <label for="input-site_seo_description" class="col-sm-2 control-label"><?php echo lang('WEBSITE_SEO_DESCRIPTION'); ?></label>
                            <div class="col-md-6 col-sm-10">
                                <textarea class="form-control" id="input-site_seo_description"
                                          name="options[site_seo_description]"><?php echo (isset($site_info['site_seo_description']) && ($site_info['site_seo_description'] !== '')?$site_info['site_seo_description']:''); ?></textarea>
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

                    <div class="tab-pane" id="F">
                        <div class="form-group">
                            <label for="input-banned_usernames" class="col-sm-2 control-label">用户注册验证</label>
                            <div class="col-md-6 col-sm-10">
                                <select class="form-control" name="cmf_settings[open_registration]">
                                    <option value="0">是</option>
                                    <?php 
                                        $open_registration_selected = empty($cmf_settings['open_registration'])?'':'selected';
                                     ?>
                                    <option value="1" <?php echo $open_registration_selected; ?>>否</option>
                                </select>
                            </div>
                        </div>
                        <div class="form-group" style="display: none;">
                            <label for="input-banned_usernames" class="col-sm-2 control-label"><?php echo lang('SPECAIL_USERNAME'); ?></label>
                            <div class="col-md-6 col-sm-10">
                                <textarea class="form-control" id="input-banned_usernames"
                                          name="cmf_settings[banned_usernames]"><?php echo $cmf_settings['banned_usernames']; ?></textarea>
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
                    <div class="tab-pane" id="G">
                        <div class="form-group">
                            <label for="input-cdn_static_root" class="col-sm-2 control-label">静态资源cdn地址</label>
                            <div class="col-md-6 col-sm-10">
                                <input type="text" class="form-control" id="input-cdn_static_root"
                                       name="cdn_settings[cdn_static_root]"
                                       value="<?php echo (isset($cdn_settings['cdn_static_root']) && ($cdn_settings['cdn_static_root'] !== '')?$cdn_settings['cdn_static_root']:''); ?>">
                                <p class="help-block">
                                    不能以/结尾；设置这个地址后，请将ThinkCMF下的静态资源文件放在其下面；<br>
                                    ThinkCMF下的静态资源文件大致包含以下(如果你自定义后，请自行增加)：<br>
                                    themes/admin_simplebootx/public/assets<br>
                                    static<br>
                                    themes/simplebootx/public/assets<br>
                                    例如未设置cdn前：jquery的访问地址是/static/js/jquery.js, <br>
                                    设置cdn是后它的访问地址就是：静态资源cdn地址/static/js/jquery.js
                                </p>
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
