<?php /*a:2:{s:78:"/www/wwwroot/demo.sdwanyue.com/themes/admin_htcyltd/portal/admin_page/add.html";i:1609991812;s:70:"/www/wwwroot/demo.sdwanyue.com/themes/admin_htcyltd/public/header.html";i:1609814284;}*/ ?>
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
<style>
    .layui-form-pane .layui-form-checkbox {
        margin: 0;
    }
</style>
<script type="text/html" id="photos-item-tpl">
    <li id="saved-image{id}" class="layui-col-md12" style="margin-bottom: 10px">
        <div class="layui-input-inline">
            <input id="photo-{id}" type="hidden" name="photo_urls[]" value="{filepath}">
            <input class="layui-input" id="photo-{id}-name" type="text" name="photo_names[]" value="{name}"
                   style="width: 200px;" title="图片名称" >
        </div>
        <div class="layui-form-mid layui-word-aux" style="padding: 0 !important;">
            <img id="photo-{id}-preview" src="{url}" style="height:35px;width: 35px;padding-left: 10px;"
                 onclick="imagePreviewDialog(this.src);">
            <a class="nobtn" href="javascript:uploadOneImage('图片上传','#photo-{id}');">替换</a>
            <a class="nobtn" href="javascript:(function(){$('#saved-image{id}').remove();})();">移除</a>
        </div>
    </li>
</script>
<script type="text/html" id="files-item-tpl">
    <li id="saved-file{id}" class="layui-col-md12" style="margin-bottom: 10px">
        <div class="layui-input-inline">
            <input id="file-{id}" type="hidden" name="file_urls[]" value="{filepath}">
            <input class="layui-input" id="file-{id}-name" type="text" name="file_names[]" value="{name}"
                   style="width: 200px;" title="文件名称" >
        </div>
        <div class="layui-form-mid layui-word-aux" style="margin-left: 10px;">
            <a class="nobtn" id="file-{id}-preview" href="{preview_url}" target="_blank">下载</a>
            <a class="nobtn" href="javascript:uploadOne('文件上传','#file-{id}','file');">替换</a>
            <a class="nobtn" href="javascript:(function(){$('#saved-file{id}').remove();})();">移除</a>
        </div>
    </li>
</script>
</head>
<body>
<div class="layui-fluid">
    <form action="<?php echo url('AdminPage/addPost'); ?>" method="post" class="layui-form layui-form-pane layui-row layui-col-space15 js-ajax-form">
        <div class="layui-col-md9">
            <div class="layui-card">
                <div class="layui-tab layui-tab-brief">
                    <ul class="layui-tab-title">
                        <li><a href="<?php echo url('AdminPage/index'); ?>">所有页面</a></li>
                        <li class="layui-this"><a href="<?php echo url('AdminPage/add'); ?>">添加页面</a></li>
                    </ul>
                </div>
                <div class="layui-card-body">

                    <div class="layui-form-item">
                        <label class="layui-form-label">
                            类型
                        </label>
                        <div class="layui-input-block">
                            <select class="layui-input" name="post[type]">
                                <option value="0">单页面</option>
                                <option value="2">关于我们</option>
                            </select>
                        </div>
                    </div>

                    <div class="layui-form-item">
                        <div class="layui-form-label">标题<span class="form-required">*</span></div>
                        <div class="layui-input-block">
                            <input class="layui-input" type="text" style="width: 400px;" name="post[post_title]" required placeholder="请输入标题"/>
                        </div>
                    </div>
  
                    <div class="layui-form-item layui-form-text">
                        <div class="layui-form-label">内容</div>
                        <div class="layui-input-block">
                            <script type="text/plain" id="content" name="post[post_content]"></script>
                        </div>
                    </div>
                    
                </div>
            </div>
        </div>

        <div class="layui-form-item layui-layout-admin">
            <div class="layui-input-block">
                <div class="layui-footer" style="left: 0;">
                    <button type="submit" class="layui-btn js-ajax-submit"><?php echo lang('SAVE'); ?></button>
                    <a class="layui-btn layui-btn-primary" href="<?php echo url('AdminPage/index'); ?>"><?php echo lang('BACK'); ?></a>
                </div>
            </div>
        </div>
    </form>
</div>
<script type="text/javascript" src="/static/js/admin.js"></script>
<script type="text/javascript" src="/static/js/wind.js"></script>
<script type="text/javascript">
    //编辑器路径定义
    var editorURL = GV.WEB_ROOT;
</script>
<script type="text/javascript" src="/static/js/ueditor/ueditor.config.js"></script>
<script type="text/javascript" src="/static/js/ueditor/ueditor.all.min.js"></script>
<script type="text/javascript">
    $(function () {

        editorcontent = new baidu.editor.ui.Editor();
        editorcontent.render('content');
        try {
            editorcontent.sync();
        } catch (err) {
        }

        $('#more-template-select').val('page');
    });
</script>
</body>
</html>
