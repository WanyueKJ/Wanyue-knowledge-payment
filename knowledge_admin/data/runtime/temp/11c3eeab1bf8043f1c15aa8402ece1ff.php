<?php /*a:2:{s:79:"/www/wwwroot/demo.sdwanyue.com/themes/admin_htcyltd/user/admin_asset/index.html";i:1586072692;s:70:"/www/wwwroot/demo.sdwanyue.com/themes/admin_htcyltd/public/header.html";i:1609814284;}*/ ?>
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
<div class="layui-fluid js-check-wrap">
    <div class="layui-card">
        <div class="layui-tab layui-tab-brief">
            <ul class="layui-tab-title">
                <li class="layui-this"><a href="<?php echo url('AdminAsset/index'); ?>">资源列表</a></li>
            </ul>
            <div class="layui-tab-content">
                <?php $status=['不可用', '可用']; ?>
                <table class="layui-table" lay-even="" lay-skin="nob" lay-size="lg">
                    <thead>
                    <tr>
                        <th width="50">ID</th>
                        <th>用户</th>
                        <th width="60">文件大小</th>
                        <th>文件名</th>
                        <th width="30">图像</th>
                        <th>文件路径</th>
                        <th width="100">状态</th>
                        <th width="50"><?php echo lang('ACTIONS'); ?></th>
                    </tr>
                    </thead>
                    <tbody>
                    <?php 
                        $asset_img_suffixes=['bmp','jpg','jpeg','png','gif','tiff'];/*TODO ADD MORE*/
                     if(is_array($assets) || $assets instanceof \think\Collection || $assets instanceof \think\Paginator): if( count($assets)==0 ) : echo "" ;else: foreach($assets as $key=>$vo): ?>
                        <tr>
                            <td><?php echo $vo['id']; ?></td>
                            <td>
                                用户ID:<?php echo $vo['user_id']; ?> <?php echo $vo['user_login']; ?> <?php echo $vo['user_nickname']; ?>
                            </td>
                            <td><?php echo round($vo['file_size']/1024); ?>KB</td>
                            <td><?php echo $vo['filename']; ?></td>
                            <td>
                                <?php if(in_array(strtolower($vo['suffix']),$asset_img_suffixes)): ?>
                                    <a href="javascript:admin.imagePreviewDialog('<?php echo cmf_get_image_preview_url($vo['file_path']); ?>');">
                                        <i class="icon-icon layui-icon-md-images"></i>
                                    </a>
                                <?php endif; ?>
                            </td>
                            <td>
                                <i class="icon-icon layui-icon-ios-albums"></i> <?php echo $vo['file_path']; if(!file_exists('upload/'.$vo['file_path'])): ?>
                                    <i class="icon-icon layui-icon-md-warning" style="color: #8b132c"> 文件丢失</i>
                                <?php endif; ?>
                            </td>
                            <td><?php echo $status[$vo['status']]; ?></td>
                            <td>
                                <a class="layui-bo layui-bo-small layui-bo-close js-ajax-delete" href="<?php echo url('AdminAsset/delete',array('id'=>$vo['id'])); ?>"><?php echo lang('DELETE'); ?></a>
                            </td>
                        </tr>
                    <?php endforeach; endif; else: echo "" ;endif; ?>
                    </tbody>
                </table>
                <div class="pagination"><?php echo (isset($page) && ($page !== '')?$page:''); ?></div>
            </div>
        </div>
    </div>
</div>
<script src="/static/js/admin.js"></script>
</body>
</html>
