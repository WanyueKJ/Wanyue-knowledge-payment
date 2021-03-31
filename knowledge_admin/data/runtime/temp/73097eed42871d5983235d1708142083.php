<?php /*a:2:{s:101:"D:\My_project\wanyue_education_web_local\education_web/themes/admin_simpleboot3/admin\menu\index.html";i:1602491837;s:98:"D:\My_project\wanyue_education_web_local\education_web/themes/admin_simpleboot3/public\header.html";i:1602491837;}*/ ?>
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
        <li class="active"><a href="<?php echo url('Menu/index'); ?>">后台菜单</a></li>
        <li><a href="<?php echo url('Menu/add'); ?>">添加菜单</a></li>
        <li><a href="<?php echo url('Menu/lists'); ?>">所有菜单</a></li>
    </ul>
    <form class="js-ajax-form" action="<?php echo url('Menu/listOrder'); ?>" method="post">
        <div class="table-actions">
            <button class="btn btn-primary btn-sm js-ajax-submit" type="submit"><?php echo lang('SORT'); ?></button>
        </div>
        <table class="table table-hover table-bordered table-list" id="menus-table">
            <thead>
            <tr>
                <th width="80"><?php echo lang('SORT'); ?></th>
                <th width="50">ID</th>
                <th><?php echo lang('NAME'); ?></th>
                <th>操作</th>
                <th width="80"><?php echo lang('STATUS'); ?></th>
                <th width="180"><?php echo lang('ACTIONS'); ?></th>
            </tr>
            </thead>
            <tbody>
            <?php echo $category; ?>
            </tbody>
            <tfoot>
            <tr>
                <th width="80"><?php echo lang('SORT'); ?></th>
                <th width="50">ID</th>
                <th><?php echo lang('NAME'); ?></th>
                <th>操作</th>
                <th width="80"><?php echo lang('STATUS'); ?></th>
                <th width="180"><?php echo lang('ACTIONS'); ?></th>
            </tr>
            </tfoot>
        </table>
        <div class="table-actions">
            <button class="btn btn-primary btn-sm js-ajax-submit" type="submit"><?php echo lang('SORT'); ?></button>
        </div>
    </form>
</div>
<script src="/static/js/admin.js"></script>
<script>
    $(document).ready(function() {
        Wind.css('treeTable');
        Wind.use('treeTable', function() {
            $("#menus-table").treeTable({
                indent : 20
            });
        });
    });
</script>
</body>
</html>