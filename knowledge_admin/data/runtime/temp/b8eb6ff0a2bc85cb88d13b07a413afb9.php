<?php /*a:2:{s:93:"D:\My_project\Wanyue-knowledge-payment-admin/themes/admin_htcyltd/admin\slide_item\index.html";i:1586107858;s:84:"D:\My_project\Wanyue-knowledge-payment-admin/themes/admin_htcyltd/public\header.html";i:1609814284;}*/ ?>
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
<style>html{background-color: #ffffff}</style>
</head>
<body>
<div class="layui-row js-check-wrap">
    <div class="layui-side" style="background: #f5f7f9;">
        <ul class="layui-if-menu">
            <li class="layui-this"><i class="icon-icon layui-icon-md-filing"></i><a href="<?php echo url('SlideItem/index',['slide_id'=>$slide_id]); ?>">幻灯片列表</a></li>
            <li><i class="icon-icon layui-icon-md-add-circle"></i><a href="<?php echo url('SlideItem/add',['slide_id'=>$slide_id]); ?>">添加幻灯片</a></li>
        </ul>
    </div>
    <div class="layui-body" style="padding: 15px 25px 0 15px;">
        <div class="layui-tab-item layui-show">
            <form method="post" class="layui-form js-ajax-form" action="<?php echo url('SlideItem/listOrder'); ?>">
                <div class="layui-btn-container">
                    <button class="layui-btn layui-btn-sm js-ajax-submit" type="submit"><?php echo lang('SORT'); ?></button>
                </div>
                <?php 
                    $status = [
                    '隐藏',
                    '开启'
                    ];
                 ?>
                <table class="layui-table" lay-even lay-skin="nob" lay-size="lg">
                    <thead>
                    <tr>
                        <th width="50"><?php echo lang('SORT'); ?></th>
                        <th width="50">ID</th>
                        <th>幻灯片标题</th>
                        <th>描述</th>
                        <th>链接</th>
                        <th>图片</th>
                        <th>状态</th>
                        <th width="176"><?php echo lang('ACTIONS'); ?></th>
                    </tr>
                    </thead>
                    <tbody>
                    <?php if(is_array($result) || $result instanceof \think\Collection || $result instanceof \think\Paginator): if( count($result)==0 ) : echo "" ;else: foreach($result as $key=>$vo): ?>
                        <tr>
                            <td>
                                <input name="list_orders[<?php echo $vo['id']; ?>]" class="input-order" type="text" value="<?php echo $vo['list_order']; ?>" style="width: 50px">
                            </td>
                            <td><?php echo $vo['id']; ?></td>
                            <td><?php echo $vo['title']; ?></td>
                            <td><?php echo $description = mb_substr($vo['description'], 0, 48,'utf-8'); ?></td>
                            <td><?php echo $vo['url']; ?></td>
                            <td>
                                <?php if(!empty($vo['image'])): ?>
                                    <a href="javascript:admin.imagePreviewDialog('<?php echo cmf_get_image_preview_url($vo['image']); ?>');">
                                        <i class="icon-icon layui-icon-md-images"></i>
                                    </a>

                                <?php endif; ?>
                            </td>
                            <td>
                                <?php if(empty($vo['status']) || (($vo['status'] instanceof \think\Collection || $vo['status'] instanceof \think\Paginator ) && $vo['status']->isEmpty())): ?>
                                    <span class="layui-badge-dot layui-bg-abnormal" style="margin-right: 6px;"></span><?php echo $status[$vo['status']]; else: ?>
                                    <span class="layui-badge-dot layui-bg-function" style="margin-right: 6px;"></span><?php echo $status[$vo['status']]; ?>
                                <?php endif; ?>
                            </td>
                            <td>
                                <a class="layui-bo layui-bo-small layui-bo-checked" href="<?php echo url('SlideItem/edit',array('id'=>$vo['id'])); ?>"><?php echo lang('EDIT'); ?></a>
                                <div class="new-divider new-divider-vertical"></div>
                                <a href="<?php echo url('SlideItem/delete',array('id'=>$vo['id'])); ?>"
                                   class="layui-bo layui-bo-small layui-bo-close js-ajax-delete"><?php echo lang('DELETE'); ?></a>
                                <div class="new-divider new-divider-vertical"></div>
                                <?php if(empty($vo['status']) == 1): ?>
                                    <a href="<?php echo url('SlideItem/cancelban',array('id'=>$vo['id'])); ?>" class="layui-bo layui-bo-small layui-bo-succes js-ajax-dialog-btn"
                                       data-msg="确定显示此幻灯片吗？"><?php echo lang('DISPLAY'); ?></a>
                                    <?php else: ?>
                                    <a href="<?php echo url('SlideItem/ban',array('id'=>$vo['id'])); ?>" class="layui-bo layui-bo-small layui-bo-waring js-ajax-dialog-btn"
                                       data-msg="确定隐藏此幻灯片吗？"><?php echo lang('HIDE'); ?></a>
                                <?php endif; ?>
                            </td>
                        </tr>
                    <?php endforeach; endif; else: echo "" ;endif; ?>
                    </tbody>
                </table>
            </form>
        </div>
    </div>
</div>
<script src="/static/js/admin.js"></script>
</body>
</html>