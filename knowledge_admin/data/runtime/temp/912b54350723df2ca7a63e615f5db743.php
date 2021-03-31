<?php /*a:2:{s:83:"/www/wwwroot/demo.sdwanyue.com/themes/admin_simpleboot3/admin/slide_item/index.html";i:1602491838;s:74:"/www/wwwroot/demo.sdwanyue.com/themes/admin_simpleboot3/public/header.html";i:1602491838;}*/ ?>
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
        <li class="active"><a href="<?php echo url('SlideItem/index',['slide_id'=>$slide_id]); ?>">幻灯片页面列表</a></li>
        <li><a href="<?php echo url('SlideItem/add',['slide_id'=>$slide_id]); ?>">添加幻灯片页面</a></li>
    </ul>
    <form method="post" class="js-ajax-form margin-top-20" action="<?php echo url('SlideItem/listOrder',['slide_id'=>$slide_id]); ?>">
        <div class="table-actions">
            <button class="btn btn-primary btn-sm js-ajax-submit" type="submit"><?php echo lang('SORT'); ?></button>
        </div>
        <?php 
            $status = [
                '隐藏',
                '开启'
            ];
         ?>
        <table class="table table-hover table-bordered">
            <thead>
            <tr>
                <th width="50"><?php echo lang('SORT'); ?></th>
                <th width="50">ID</th>
                <th>幻灯片标题</th>
                <th>描述</th>
                <th>链接</th>
                <th>图片</th>
                <th>状态</th>
                <th width="160"><?php echo lang('ACTIONS'); ?></th>
            </tr>
            </thead>
            <tbody>
            <?php if(is_array($result) || $result instanceof \think\Collection || $result instanceof \think\Paginator): if( count($result)==0 ) : echo "" ;else: foreach($result as $key=>$vo): ?>
                <tr>
                    <td>
                        <input name="list_orders[<?php echo $vo['id']; ?>]" class="input-order" type="text" value="<?php echo $vo['list_order']; ?>">
                    </td>
                    <td><?php echo $vo['id']; ?></td>
                    <td><?php echo $vo['title']; ?></td>
                    <td><?php echo $description = mb_substr($vo['description'], 0, 48,'utf-8'); ?></td>
                    <td><?php echo $vo['url']; ?></td>
                    <td>
                        <?php if(!empty($vo['image'])): ?>
                            <a href="javascript:imagePreviewDialog('<?php echo cmf_get_image_preview_url($vo['image']); ?>');">
                                <i class="fa fa-photo fa-fw"></i>
                            </a>

                        <?php endif; ?>
                    </td>
                    <td><?php echo $status[$vo['status']]; ?></td>
                    <td>
                        <a class="btn btn-xs btn-primary" href="<?php echo url('SlideItem/edit',array('id'=>$vo['id'])); ?>"><?php echo lang('EDIT'); ?></a>
                        <a href="<?php echo url('SlideItem/delete',array('id'=>$vo['id'])); ?>"
                           class="btn btn-xs btn-danger js-ajax-delete"><?php echo lang('DELETE'); ?></a>
                        <?php if(empty($vo['status']) == 1): ?>
                            <a href="<?php echo url('SlideItem/cancelban',array('id'=>$vo['id'],'slide_id'=>$vo['slide_id'])); ?>" class="btn btn-xs btn-warning js-ajax-dialog-btn"
                               data-msg="确定显示此幻灯片吗？"><?php echo lang('DISPLAY'); ?></a>
                            <?php else: ?>
                            <a href="<?php echo url('SlideItem/ban',array('id'=>$vo['id'],'slide_id'=>$vo['slide_id'])); ?>" class="btn btn-xs btn-warning js-ajax-dialog-btn"
                               data-msg="确定隐藏此幻灯片吗？"><?php echo lang('HIDE'); ?></a>
                        <?php endif; ?>
                    </td>
                </tr>
            <?php endforeach; endif; else: echo "" ;endif; ?>
            </tbody>
        </table>
    </form>

</div>
<script src="/static/js/admin.js"></script>
</body>
</html>