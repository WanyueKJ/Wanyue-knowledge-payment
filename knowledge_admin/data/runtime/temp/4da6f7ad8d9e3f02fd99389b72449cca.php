<?php /*a:2:{s:75:"/www/wwwroot/demo.sdwanyue.com/themes/admin_htcyltd/admin/setting/site.html";i:1609992062;s:70:"/www/wwwroot/demo.sdwanyue.com/themes/admin_htcyltd/public/header.html";i:1609814284;}*/ ?>
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
<link rel="stylesheet" href="/themes/admin_htcyltd/public/assets/css/animation.css">
</head>
<body>
<div class="layui-fluid">
    <div class="layui-row">
        <div class="layui-page-header">
            <div class="layui-card">
                <div class="layui-page-header-content">
                    <div class="layui-card-body">
                        <div class="layui-ui-page-header-title">
                            <?php echo lang('ADMIN_SETTING_SITE'); ?><span
                                class="layui-badge-rim page-content">设置网站的数据参数及其它设置</span>
                        </div>
                    </div>
                    <div class="layui-tab layui-tab-brief">
                        <ul class="layui-nav layui-tab-title " id="tabHeader">
                            <li class="layui-this layui-nav-item" data-anim="layui-anim-fadein">
                                <?php echo lang('WEB_SITE_INFOS'); ?>
                            </li>
                            <li data-anim="layui-anim-fadein" class="layui-nav-item"><?php echo lang('SEO_SETTING'); ?></li>
                        </ul>
                    </div>
                </div>
            </div>
        </div>
        <div class="layui-page-content">
            <div class="layui-card">
                <div class="layui-card-body">
                    <form class="layui-form js-ajax-form" role="form" action="<?php echo url('setting/sitePost'); ?>" method="post"
                          wid110>
                        <div class="layui-tab-content" id="tabBody">

                            <div class="layui-tab-item layui-show">
                                <div class="layui-form-item">
                                    <label for="input-site-name" class="layui-form-label"><span
                                            class="form-required">*</span><?php echo lang('WEBSITE_NAME'); ?></label>
                                    <div class="layui-input-block">
                                        <input type="text" class="layui-input" id="input-site-name"
                                               name="options[site_name]"
                                               value="<?php echo (isset($site_info['site_name']) && ($site_info['site_name'] !== '')?$site_info['site_name']:''); ?>">
                                    </div>
                                </div>

                                <div class="layui-form-item">
                                    <label for="input-site_url" class="layui-form-label"><span
                                            class="form-required">*</span>站点域名</label>
                                    <div class="layui-input-block">
                                        <input type="text" class="layui-input" id="input-site_url"
                                               name="options[site_url]" value="<?php echo (isset($site_info['site_url']) && ($site_info['site_url'] !== '')?$site_info['site_url']:''); ?>">
                                        格式： http(s)://xxxx.com(:端口号)
                                    </div>
                                </div>
                                <div class="layui-form-item" style="display:none;">
                                    <label for="input-admin_url_password" class="layui-form-label">
                                        后台加密码
                                        <a href="http://www.thinkcmf.com/faq.html?url=https://www.kancloud.cn/thinkcmf/faq/493509"
                                           title="查看帮助手册"
                                           data-toggle="tooltip"
                                           target="_blank"><i class="fa fa-question-circle"></i></a>
                                    </label>
                                    <div class="layui-input-block">
                                        <input type="text" class="layui-input" id="input-admin_url_password"
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

                                <div class="layui-form-item" style="display:none;">
                                    <label for="input-site_admin_theme"  class="layui-form-label">后台模板</label>
                                    <div class="layui-input-block">
                                        <?php 
                                            $site_admin_theme=empty($admin_settings['admin_theme'])?'':$admin_settings['admin_theme'];
                                         ?>
                                        <select class="layui-input" name="admin_settings[admin_theme]"
                                                id="input-site_admin_theme">
                                            <?php if(is_array($admin_themes) || $admin_themes instanceof \think\Collection || $admin_themes instanceof \think\Paginator): if( count($admin_themes)==0 ) : echo "" ;else: foreach($admin_themes as $key=>$vo): $admin_theme_selected = $site_admin_theme == $vo ? "selected" :
                                                    "";
                                                 ?>
                                                <option value="<?php echo $vo; ?>" <?php echo $admin_theme_selected; ?>><?php echo $vo; ?></option>
                                            <?php endforeach; endif; else: echo "" ;endif; ?>
                                        </select>
                                    </div>
                                </div>
                                <div class="layui-form-item" style="display:none;">
                                    <label for="input-site_adminstyle" class="layui-form-label"><?php echo lang('WEBSITE_ADMIN_THEME'); ?></label>
                                    <div class="layui-input-block">
                                        <?php 
                                            $site_admin_style=empty($admin_settings['admin_style'])?cmf_get_admin_style():$admin_settings['admin_style'];
                                         ?>
                                        <select class="layui-input" name="admin_settings[admin_style]"
                                                id="input-site_adminstyle">
                                            <?php if(is_array($admin_styles) || $admin_styles instanceof \think\Collection || $admin_styles instanceof \think\Paginator): if( count($admin_styles)==0 ) : echo "" ;else: foreach($admin_styles as $key=>$vo): $admin_style_selected = $site_admin_style == $vo ? "selected" :
                                                    "";
                                                 ?>
                                                <option value="<?php echo $vo; ?>" <?php echo $admin_style_selected; ?>><?php echo $vo; ?></option>
                                            <?php endforeach; endif; else: echo "" ;endif; ?>
                                        </select>
                                    </div>
                                </div>
                                <?php if(APP_DEBUG && false): ?>
                                    <div class="layui-form-item">
                                        <label for="input-default_app" class="layui-form-label">默认应用</label>
                                        <div class="layui-input-block">
                                            <?php 
                                                $site_default_app=empty($cmf_settings['default_app'])?'demo':$cmf_settings['default_app'];
                                             ?>
                                            <select class="layui-input" name="cmf_settings[default_app]"
                                                    id="input-default_app">
                                                <?php if(is_array($apps) || $apps instanceof \think\Collection || $apps instanceof \think\Paginator): if( count($apps)==0 ) : echo "" ;else: foreach($apps as $key=>$vo): $default_app_selected = $site_default_app == $vo ? "selected" :
                                                        "";
                                                     ?>
                                                    <option value="<?php echo $vo; ?>" <?php echo $default_app_selected; ?>><?php echo $vo; ?></option>
                                                <?php endforeach; endif; else: echo "" ;endif; ?>
                                            </select>
                                        </div>
                                    </div>
                                <?php endif; ?>

                                <div class="layui-form-item layui-form-text">
                                    <label for="input-copyright" class="layui-form-label">版权信息</label>
                                    <div class="layui-input-block">
                                        <textarea class="layui-textarea" id="input-copyright" name="options[copyright]"
                                                  maxlength="200"><?php echo (isset($site_info['copyright']) && ($site_info['copyright'] !== '')?$site_info['copyright']:''); ?></textarea>
                                        版权信息（200字以内）
                                    </div>
                                </div>


                                <div class="layui-form-item">
                                    <label for="input-site_phone" class="layui-form-label">联系电话</label>
                                    <div class="layui-input-block">
                                        <input type="text" class="layui-input" id="input-site_phone"
                                               name="options[site_phone]"
                                               value="<?php echo (isset($site_info['site_phone']) && ($site_info['site_phone'] !== '')?$site_info['site_phone']:''); ?>">
                                    </div>
                                </div>

                                <div class="layui-form-item">
                                    <label class="layui-form-label">官方微信</label>
                                    <div class="layui-input-block">
                                        <input type="hidden" name="options[wx_url]" id="thumb" value="">
                                        <a href="javascript:uploadOneImage('图片上传','#thumb');">

                                            <?php if(empty($site_info['wx_url'])): ?>
                                                <img src="/themes/admin_htcyltd/public/assets/images/default-thumbnail.png"
                                                     id="thumb-preview"
                                                     style="cursor: pointer;max-width:150px;max-height:150px;"/>
                                                <?php else: ?>
                                                <img src="<?php echo cmf_get_image_preview_url($site_info['wx_url']); ?>"
                                                     id="thumb-preview" width="135" style="cursor: hand"/>
                                            <?php endif; ?>

                                        </a>
                                        <div class="layui-col-md12" style="margin-top: 10px">
                                            <input type="button" class="layui-btn layui-btn-sm layui-btn-normal"
                                                   onclick="$('#thumb-preview').attr('src','/themes/admin_htcyltd/public/assets/images/default-thumbnail.png');$('#thumb').val('');return false;"
                                                   value="取消图片">
                                        </div>
                                    </div>
                                </div>

                                <div class="layui-form-item">
                                    <div class="layui-input-block">
                                        <button type="submit" class="layui-btn js-ajax-submit" data-refresh="1">
                                            <?php echo lang('SAVE'); ?>
                                        </button>
                                    </div>
                                </div>
                            </div>

                            <div class="layui-tab-item">
                                <div class="layui-form-item">
                                    <label for="input-site_seo_title" class="layui-form-label"><?php echo lang('WEBSITE_SEO_TITLE'); ?></label>
                                    <div class="layui-input-block">
                                        <input type="text" class="layui-input" id="input-site_seo_title"
                                               name="options[site_seo_title]"
                                               value="<?php echo (isset($site_info['site_seo_title']) && ($site_info['site_seo_title'] !== '')?$site_info['site_seo_title']:''); ?>">
                                    </div>
                                </div>
                                <div class="layui-form-item">
                                    <label for="input-site_seo_keywords" class="layui-form-label"><?php echo lang('WEBSITE_SEO_KEYWORDS'); ?></label>
                                    <div class="layui-input-block">
                                        <input type="text" class="layui-input" id="input-site_seo_keywords"
                                               name="options[site_seo_keywords]"
                                               value="<?php echo (isset($site_info['site_seo_keywords']) && ($site_info['site_seo_keywords'] !== '')?$site_info['site_seo_keywords']:''); ?>">
                                    </div>
                                </div>
                                <div class="layui-form-item layui-form-text">
                                    <label for="input-site_seo_description" class="layui-form-label"><?php echo lang('WEBSITE_SEO_DESCRIPTION'); ?></label>
                                    <div class="layui-input-block">
                                <textarea class="layui-textarea" id="input-site_seo_description"
                                          name="options[site_seo_description]"><?php echo (isset($site_info['site_seo_description']) && ($site_info['site_seo_description'] !== '')?$site_info['site_seo_description']:''); ?></textarea>
                                    </div>
                                </div>
                                <div class="layui-form-item">
                                    <div class="layui-input-block">
                                        <button type="submit" class="layui-btn js-ajax-submit" data-refresh="0" id="icon-wenhao">
                                            <?php echo lang('SAVE'); ?>
                                        </button>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>
</div>
<script type="text/javascript" src="/static/js/wind.js"></script>
<script src="/static/js/admin.js"></script>

</body>
</html>
