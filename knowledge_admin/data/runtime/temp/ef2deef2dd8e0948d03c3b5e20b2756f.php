<?php /*a:2:{s:82:"/www/wwwroot/demo.sdwanyue.com/themes/admin_htcyltd/admin/knowledgeclass/edit.html";i:1612835094;s:70:"/www/wwwroot/demo.sdwanyue.com/themes/admin_htcyltd/public/header.html";i:1609814284;}*/ ?>
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
    <form method="post" class="layui-form js-ajax-form margin-top-20" action="<?php echo url('knowledgeclass/editPost'); ?>">
        <div class="layui-form-item">
            <label for="input-name" class="layui-form-label"><span class="form-required">*</span>名称</label>
            <div class="layui-input-block">
                <input type="text" class="layui-input" id="input-name" name="name" value="<?php echo $data['name']; ?>">
            </div>
        </div>

        <div class="layui-form-item">
            <label class="layui-form-label"><span class="form-required">*</span>图标</label>
            <div class="layui-input-block">
                <input type="hidden" name="thumb" id="thumbnail" value="<?php echo $data['thumb']; ?>">
                <a href="javascript:uploadOneImage('图片上传','#thumbnail');">
                    <?php if(empty($data['thumb'])): ?>
                        <img src="/themes/admin_htcyltd/public/assets/images/default-thumbnail.png"
                             id="thumbnail-preview"
                             style="cursor: pointer;max-width:100px;max-height:100px;"/>
                        <?php else: ?>
                        <img src="<?php echo cmf_get_image_preview_url($data['thumb']); ?>"
                             id="thumbnail-preview"
                             style="cursor: pointer;max-width:100px;max-height:100px;"/>
                    <?php endif; ?>
                </a>
                <div class="layui-col-md12" style="margin-top: 10px">
                    <input type="button" class="layui-btn layui-btn-sm layui-btn-normal"
                           onclick="$('#thumbnail-preview').attr('src','/themes/admin_htcyltd/public/assets/images/default-thumbnail.png');$('#thumbnail').val('');return false;"
                           value="取消图片"> 建议尺寸： 100 X 100
                </div>
            </div>
        </div>


        <div class="layui-form-item">
            <div class="layui-input-block">
                <input type="hidden" name="id" value="<?php echo $data['id']; ?>" />
                <button type="submit" class="layui-btn js-ajax-submit"><?php echo lang('EDIT'); ?></button>
                <a class="btn btn-default" href="javascript:history.back(-1);"><?php echo lang('BACK'); ?></a>
            </div>
        </div>

    </form>
</div>



<script src="/static/js/admin.js"></script>
<script src="/static/js/wind.js"></script>

<script>
    (function(){
        $('.btn-cancel-thumbnail').click(function () {
            $('#thumbnail-preview').attr('src', '/themes/admin_htcyltd/public/assets/images/default-thumbnail.png');
            $('#thumbnail').val('');
        });
    })()
</script>
</body>
</html>