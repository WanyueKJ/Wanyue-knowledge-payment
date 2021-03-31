<?php /*a:2:{s:80:"/www/wwwroot/demo.sdwanyue.com/themes/admin_htcyltd/admin/recycle_bin/index.html";i:1586072262;s:70:"/www/wwwroot/demo.sdwanyue.com/themes/admin_htcyltd/public/header.html";i:1609814284;}*/ ?>
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
                <li class="layui-this"><a href="javascript:void(0)">回收站列表</a></li>
            </ul>
            <div class="layui-tab-content">
                <div class="layui-tab-item layui-show">
                    <table class="layui-table" lay-even="" lay-skin="nob" lay-size="lg">
                        <thead>
                        <tr>
                            <th width="30">ID</th>
                            <th>内容名称</th>
                            <th>内容类型</th>
                            <th>删除时间</th>
                            <th>操作人</th>
                            <th width="112"><?php echo lang('ACTIONS'); ?></th>
                        </tr>
                        </thead>
                        <tbody>
                        <?php if(is_array($list) || $list instanceof \think\Collection || $list instanceof \think\Paginator): if( count($list)==0 ) : echo "" ;else: foreach($list as $key=>$vo): ?>
                            <tr>
                                <td><?php echo $vo['id']; ?></td>
                                <td><?php echo $vo['name']; ?></td>
                                <td>
                                    <?php echo lang('TABLE_'.strtoupper($vo['table_name'])); ?>
                                </td>
                                <td> <?php echo date('Y-m-d H:i:s',$vo['create_time']); ?></td>
                                <td> <?php echo $vo['user']['user_login']; ?></td>
                                <td>
                                    <a href="<?php echo url('RecycleBin/restore',array('id'=>$vo['id'])); ?>" class="layui-bo layui-bo-small layui-bo-succes js-ajax-dialog-btn" data-msg="确定要还原吗？">还原</a>
                                    <div class="new-divider new-divider-vertical"></div>
                                    <a href="<?php echo url('RecycleBin/delete',array('id'=>$vo['id'])); ?>" class="layui-bo layui-bo-small layui-bo-close js-ajax-delete"><?php echo lang('DELETE'); ?></a>
                                </td>
                            </tr>
                        <?php endforeach; endif; else: echo "" ;endif; ?>
                        </tbody>
                    </table>
                    <div class="pagination"><?php echo $page; ?></div>
                </div>
            </div>
        </div>
    </div>
</div>
<script src="/static/js/admin.js"></script>
</body>
</html>