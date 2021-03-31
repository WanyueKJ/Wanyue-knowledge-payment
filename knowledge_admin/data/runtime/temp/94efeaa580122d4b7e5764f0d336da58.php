<?php /*a:2:{s:75:"/www/wwwroot/demo.sdwanyue.com/themes/admin_htcyltd/admin/hook/plugins.html";i:1586071368;s:70:"/www/wwwroot/demo.sdwanyue.com/themes/admin_htcyltd/public/header.html";i:1609814284;}*/ ?>
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
    html{background-color:#fff;}
</style>
</head>
<body>
<div class="layui-card-body js-check-wrap">
    <form action="<?php echo url('hook/pluginListOrder'); ?>" method="post" class="js-ajax-form">
        <?php 
            $types = ["1"=>'系统钩子','2'=>'应用钩子','3'=>'模板钩子','4'=>'后台模板钩子'];
            $status=array("1"=>'开启',"0"=>'禁用',"3"=>'未安装');
         ?>
        <div class="table-actions">
            <button type="submit" class="layui-btn layui-btn-sm js-ajax-submit"><?php echo lang('SORT'); ?></button>
        </div>
        <table class="layui-table" lay-even lay-skin="nob" lay-size="lg">
            <colgroup>
                <col width="100">
                <col>
                <col>
                <col>
                <col>
                <col>
                <col>
                <col width="150">
            </colgroup>
            <thead>
            <tr>
                <th>排序</th>
                <th>插件名称</th>
                <th>插件标识</th>
                <th>钩子</th>
                <th>描述</th>
                <th>作者</th>
                <th>状态</th>
                <th><?php echo lang('ACTIONS'); ?></th>
            </tr>
            </thead>
            <tbody>
            <?php if(is_array($plugins) || $plugins instanceof \think\Collection || $plugins instanceof \think\Paginator): if( count($plugins)==0 ) : echo "" ;else: foreach($plugins as $key=>$vo): ?>
                <tr>
                    <td><input name="list_orders[<?php echo $vo['hook_plugin_id']; ?>]" type="text" size="3" value="<?php echo $vo['list_order']; ?>"
                               class="input input-order"></td>
                    <td><?php echo $vo['title']; ?></td>
                    <td><?php echo $vo['name']; ?></td>
                    <td><?php echo (isset($vo['hooks']) && ($vo['hooks'] !== '')?$vo['hooks']:''); ?></td>
                    <td><?php echo $vo['description']; ?></td>
                    <td><?php echo $vo['author']; ?></td>
                    <td><?php echo $status[$vo['hook_plugin_status']]; ?></td>
                    <td>
                        <?php if($vo['status']==3): ?>
                            <a href="<?php echo url('plugin/install',array('name'=>$vo['name'])); ?>" class="nobtn js-ajax-dialog-btn"
                               data-msg="确定安装该插件吗？">安装</a>
                            <?php else: ?>
                            <div class="new-divider new-divider-vertical"></div>
                            <?php $config=json_decode($vo['config'],true); if(!empty($config)): ?>
                                <a class="nobtn" href="<?php echo url('plugin/setting',array('id'=>$vo['id'])); ?>">设置</a> |
                                <?php else: ?>
                                <a class="nobtn disabled" href="javascript:;">设置</a> |
                            <?php endif; ?>
                            <div class="new-divider new-divider-vertical"></div>
                            <?php if(!empty($vo['has_admin'])): ?>
                                <a class="nobtn" href="javascript:parent.openapp('<?php echo cmf_plugin_url($vo['name'].'://AdminIndex/index'); ?>','plugin_<?php echo $vo['name']; ?>','<?php echo $vo['title']; ?>')">管理</a>|
                                <?php else: ?>
                                <a class="nobtn disabled" href="javascript:;">管理</a>
                            <?php endif; ?>

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