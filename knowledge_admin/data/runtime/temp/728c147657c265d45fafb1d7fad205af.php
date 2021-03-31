<?php /*a:2:{s:90:"D:\My_project\Wanyue-knowledge-payment-admin/themes/admin_htcyltd/admin\storage\index.html";i:1585643460;s:84:"D:\My_project\Wanyue-knowledge-payment-admin/themes/admin_htcyltd/public\header.html";i:1609814284;}*/ ?>
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
    <div class="layui-row">
        <div class="layui-page-header">
            <div class="layui-card">
                <div class="layui-page-header-content">
                    <div class="layui-card-body">
                        <div class="layui-ui-page-header-title" >
                            <?php echo lang('ADMIN_STORAGE_INDEX'); ?><span class="layui-badge-rim page-content">设置网站上传文件的存储空间</span>
                        </div>
                    </div>
                    <div class="layui-tab layui-tab-brief">
                        <ul class="layui-tab-title" id="tabHeader">
                            <li class="layui-this"><a href="<?php echo url('storage/index'); ?>"><?php echo lang('ADMIN_STORAGE_INDEX'); ?></a></li>
                        </ul>
                    </div>
                </div>
            </div>
        </div>
        <div class="layui-page-content">
            <div class="layui-card">
                <div class="layui-card-body">
                    <form method="post" class="layui-form js-ajax-form" action="<?php echo url('storage/settingPost'); ?>">
                        <div class="layui-tab-content">
                            <div class="layui-form-item">
                                <label for="input-type" class="layui-form-label">存储类型</label>
                                <div class="layui-input-inline">
                                    <select class="form-control" name="type" id="input-type">
                                        <?php if(is_array($storages) || $storages instanceof \think\Collection || $storages instanceof \think\Paginator): if( count($storages)==0 ) : echo "" ;else: foreach($storages as $key=>$vo): $type_selected=isset($type)&&$type==$key?"selected":""; ?>
                                            <option value="<?php echo $key; ?>" <?php echo $type_selected; ?>><?php echo $vo['name']; ?></option>
                                        <?php endforeach; endif; else: echo "" ;endif; ?>
                                    </select>
                                </div>
                            </div>
                            <div class="layui-form-item">
                                <div class="layui-input-block">
                                    <button type="submit" class="layui-btn js-ajax-submit" data-refresh="0"><?php echo lang('SAVE'); ?></button>
                                </div>
                            </div>
                    </form>
                </div>
            </div>
        </div>
    </div>
</div>
<script src="/static/js/admin.js"></script>
</body>
</html>