<?php /*a:2:{s:73:"/www/wwwroot/demo.sdwanyue.com/themes/admin_htcyltd/admin/hook/index.html";i:1586073700;s:70:"/www/wwwroot/demo.sdwanyue.com/themes/admin_htcyltd/public/header.html";i:1609814284;}*/ ?>
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
                            钩子管理
                            <span class="layui-badge-rim page-content">ThinkCMF系统插件钩子管理</span>
                        </div>
                    </div>
                    <div class="layui-tab layui-tab-brief">
                        <ul class="layui-tab-title">
                            <li class="layui-this"><a>所有钩子</a></li>
                        </ul>
                    </div>
                </div>
            </div>
        </div>
        <div class="layui-page-content">
            <div class="layui-card">
                <div class="layui-card-body">
                    <div class="layui-bg-alert layui-bg-remind">
                        <i class="icon-icon layui-icon-md-information-circle"></i>
                        <span>新增插件后需要同步钩子后再进行操作</span><a href="javascript:admin.openIframeLayer('<?php echo url('Hook/sync'); ?>','同步钩子',{skin: 'layer-ext',area:['300px','100px'],end:function(){location.reload();}});">点击同步</a>
                    </div>
                    <form action="" method="post" class="layui-form">
                        <?php 
                            $types = ["1"=>'系统钩子','2'=>'应用钩子','3'=>'模板钩子','4'=>'后台模板钩子'];
                         ?>
                        <table class="layui-table" lay-even lay-skin="nob" lay-size="lg">
                            <thead>
                            <tr>
                                <th width="50">ID</th>
                                <th>名称</th>
                                <th>类型</th>
                                <th>描述</th>
                                <th width="50"><?php echo lang('ACTIONS'); ?></th>
                            </tr>
                            </thead>
                            <tbody>
                            <?php if(is_array($hooks) || $hooks instanceof \think\Collection || $hooks instanceof \think\Paginator): if( count($hooks)==0 ) : echo "" ;else: foreach($hooks as $key=>$vo): ?>
                                <tr>
                                    <td><?php echo $vo['id']; ?></td>
                                    <td><?php echo $vo['name']; ?>:<?php echo $vo['hook']; ?></td>
                                    <td>
                                        <?php if($vo['type']==1): ?>
                                            <a class="layui-badge layui-bg-remind"><?php echo $types[$vo['type']]; ?></a>
                                            <?php elseif($vo['type']==2): ?>
                                                <a class="layui-badge layui-bg-correct"><?php echo $types[$vo['type']]; ?></a>
                                            <?php elseif($vo['type']==3): ?>
                                                <a class="layui-badge layui-bg-error"><?php echo $types[$vo['type']]; ?></a>
                                            <?php else: ?>
                                                <a class="layui-badge layui-bg-warning"><?php echo $types[$vo['type']]; ?></a>
                                        <?php endif; ?>
                                    </td>
                                    <td><?php echo $vo['description']; ?></td>
                                    <td>
                                        <a class="nobtn" href="javascript:admin.openIframeLayer('<?php echo url('Hook/plugins',['hook'=>$vo['hook']]); ?>','钩子<?php echo $vo['name']; ?>插件管理',{area:['90%','500px']});">管理</a>
                                    </td>
                                </tr>
                            <?php endforeach; endif; else: echo "" ;endif; ?>
                            </tbody>
                        </table>
                    </form>
                </div>
            </div>
        </div>
    </div>
</div>
<script src="/static/js/admin.js"></script>
</body>
</html>