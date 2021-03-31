<?php /*a:2:{s:73:"/www/wwwroot/demo.sdwanyue.com/themes/admin_htcyltd/admin/menu/index.html";i:1608263796;s:70:"/www/wwwroot/demo.sdwanyue.com/themes/admin_htcyltd/public/header.html";i:1609814284;}*/ ?>
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
<style>.layui-table tr td{padding-left: 40px;}</style>
</head>
<body>
<div class="layui-fluid">
    <div class="layui-row">
        <div class="layui-page-header">
            <div class="layui-card">
                <div class="layui-page-header-content">
                    <div class="layui-card-body">
                        <div class="layui-ui-page-header-title" >
                            后台菜单<span class="layui-badge-rim page-content">后台管理网站菜单管理及设置</span>
                        </div>
                    </div>
                    <div class="layui-tab layui-tab-brief">
                        <ul class="layui-tab-title">
                            <li class="layui-this"><a href="<?php echo url('Menu/index'); ?>">后台菜单</a></li>
                            <li><a href="javascript:admin.openIframeLayer('<?php echo url('Menu/add'); ?>','添加菜单',{btn: ['添加','关闭'],area:['720px', '600px'],end:function(){}});">添加菜单</a></li>
                            <li><a href="<?php echo url('Menu/lists'); ?>">所有菜单</a></li>
                        </ul>
                    </div>
                </div>
            </div>
        </div>
        <div class="layui-page-content">
            <div class="layui-card">
                <div class="layui-card-body js-check-wrap">
                    <form class="layui-form js-ajax-form" action="<?php echo url('Menu/listOrder'); ?>" method="post">
                        <div class="layui-btn-container">
                            <button type="submit" class="layui-btn layui-btn-sm js-ajax-submit"><?php echo lang('SORT'); ?></button>
                        </div>
                        <table class="layui-table" lay-even lay-skin="nob" lay-size="lg" id="menus-table">
                            <thead>
                            <tr>
                                <th width="50"><?php echo lang('SORT'); ?></th>
                                <th width="50">ID</th>
                                <th><?php echo lang('NAME'); ?></th>
                                <th>操作</th>
                                <th width="80"><?php echo lang('STATUS'); ?></th>
                                <th width="220"><?php echo lang('ACTIONS'); ?></th>
                            </tr>
                            </thead>
                            <tbody>
                            <?php echo $category; ?>
                            </tbody>
                        </table>
                    </form>
                </div>
            </div>
        </div>
    </div>
</div>
<script src="/static/js/admin.js"></script>
<script src="/static/js/wind.js"></script>
<script type="text/javascript">
    layui.use('layer', function(){
        var layer = layui.layer;
        $(document).ready(function(){
            $('.str').on('click',function(){
                //获取id
                var id = $(this).attr('data');
                var title = $(this).attr('data-title');
                //iframe层
                layer.open({
                    type: 2,
                    title: title,
                    area: ['720px', '600px'],
                    btn: ['添加','关闭'],
                    content: 'add/parent_id/'+id, //iframe的url
                    yes: function(index, layero) {
                        // do something
                        // 获取iframe层的body
                        var body = layer.getChildFrame('body', index);
                        // 找到隐藏的提交按钮模拟点击提交
                        body.find('#js-ajax-submit').click();
                    },
                    btn2: function(index, layero) {
                        layer.close(index)
                        return false;
                    }
                });
            })
            $('.bjr').on('click',function(){
                //获取id
                var id = $(this).attr('data');
                var title = $(this).attr('data-title');
                //iframe层
                layer.open({
                    type: 2,
                    title: title,
                    area: ['720px', '600px'],
                    btn: ['保存','关闭'],
                    content: 'edit/id/'+id, //iframe的url
                    yes: function(index, layero) {
                        // do something
                        // 获取iframe层的body
                        var body = layer.getChildFrame('body', index);
                        // 找到隐藏的提交按钮模拟点击提交
                        body.find('#js-ajax-submit').click();
                    },
                    btn2: function(index, layero) {
                        layer.close(index)
                        return false;
                    }
                });
            })
        })
    });
</script>
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