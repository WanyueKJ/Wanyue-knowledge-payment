<?php /*a:2:{s:75:"/www/wwwroot/demo.sdwanyue.com/themes/admin_htcyltd/admin/plugin/index.html";i:1608349650;s:70:"/www/wwwroot/demo.sdwanyue.com/themes/admin_htcyltd/public/header.html";i:1609814284;}*/ ?>
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
<link rel="stylesheet" href="/themes/admin_htcyltd/public/assets/css/animation.css">

</head>
<body>
<div class="layui-fluid">
    <div class="layui-row">
        <div class="layui-page-header">
            <div class="layui-card">
                <div class="layui-page-header-content">
                    <div class="layui-card-body">
                        <div class="layui-ui-page-header-title" >
                            <?php echo lang('ADMIN_PLUGIN_INDEX'); ?><span class="layui-badge-rim page-content">ThinkCMF系统插件安装及管理</span>
                        </div>
                    </div>
                    <div class="layui-tab layui-tab-brief">
                        <ul class="layui-tab-title layui-nav" id="tabHeader">
                            <li class="layui-this layui-nav-item"><a href="<?php echo url('Plugin/index'); ?>"><?php echo lang('ADMIN_PLUGIN_INDEX'); ?></a></li>
                            <li class="layui-nav-item"><a href="http://www.thinkcmf.com/appstore/plugin.html" target="_blank">插件市场</a></li>
                            <li class="layui-nav-item"><a href="http://www.thinkcmf.com/faq.html?url=https://www.kancloud.cn/thinkcmf/faq/493510" target="_blank">插件安装<i class="fa fa-question-circle"></i></a></li>
                            <li class="layui-nav-item"><a href="http://www.thinkcmf.com/topic/index/index/cat/9.html" target="_blank">插件交流</a></li>
                            <li class="layui-nav-item"><a href="https://www.kancloud.cn/thinkcmf/doc5_1/957872" target="_blank">插件文档</a></li>
                        </ul>
                    </div>
                </div>
            </div>
        </div>
        <div class="layui-page-content">
            <div class="layui-card">
                <div class="layui-card-body">
                    <form method="post" class="layui-form js-ajax-form">
                        <?php 
                            $status=array("1"=>'开启',"0"=>'禁用',"3"=>'未安装');
                         ?>
                        <table class="layui-table" lay-even lay-skin="nob" lay-size="lg">
                            <thead>
                            <tr style="border: none;">
                                <th>插件名称</th>
                                <th>插件标识</th>
                                <th>描述</th>
                                <th>作者</th>
                                <th>状态</th>
                                <th width="260">操作</th>
                            </tr>
                            </thead>
                            <tbody>
                            <?php if(is_array($plugins) || $plugins instanceof \think\Collection || $plugins instanceof \think\Paginator): if( count($plugins)==0 ) : echo "" ;else: foreach($plugins as $key=>$vo): ?>
                                <tr>
                                    <td><?php echo $vo['title']; ?></td>
                                    <td><?php echo $vo['name']; ?></td>
                                    <td><?php echo $vo['description']; ?></td>
                                    <td><?php echo $vo['author']; ?></td>
                                    <td>
                                        <?php if($vo['status']==1): ?>
                                        <span class="layui-badge-dot layui-bg-function" style="margin-right: 6px;"></span>    <?php echo $status[$vo['status']]; elseif($vo['status']==0): ?>
                                                <span  class="layui-badge-dot layui-bg-abnormal" style="margin-right: 6px;"></span >    <?php echo $status[$vo['status']]; else: ?>
                                                <span class="layui-badge-dot layui-bg-default" style="margin-right: 6px;"></span >    <?php echo $status[$vo['status']]; ?>
                                        <?php endif; ?>
                                    </td>
                                    <td>
                                        <?php if($vo['status']==3): ?>
                                            <a class="nobtn js-ajax-dialog-btn"
                                               href="<?php echo url('plugin/install',array('name'=>$vo['name'])); ?>"
                                               data-msg="确定安装该插件吗？"><i class="icon-icon layui-icon-md-download"></i>  安装</a>
                                            <?php else: $config=json_decode($vo['config'],true); if(!empty($config)): if(empty($config['custom_config']) || (($config['custom_config'] instanceof \think\Collection || $config['custom_config'] instanceof \think\Paginator ) && $config['custom_config']->isEmpty())): ?>
                                                    <a class="nobtn" href="javascript:admin.openIframeLayer('<?php echo url('plugin/setting',array('id'=>$vo['id'])); ?>','设置',{area:['640px','50%'],end:function(){location.reload();}});">设置</a>
                                                    <?php else: ?>
                                                    <a class="nobtn" href="<?php echo cmf_plugin_url($vo['name'].'://AdminIndex/setting'); ?>">设置</a>
                                                <?php endif; else: ?>
                                                <a class="nobtn disabled" href="javascript:;">设置</a>
                                            <?php endif; ?>
                                            <div class="new-divider new-divider-vertical"></div>
                                            <?php if(!empty($vo['has_admin'])): ?>
                                                <a class="nobtn"
                                                   href="javascript:admin.openIframeLayer('<?php echo cmf_plugin_url($vo['name'].'://AdminIndex/index'); ?>','<?php echo $vo['title']; ?>',{area:['640px','50%'],end:function(){location.reload();}});">管理</a>
                                                <?php else: ?>
                                                <a class="nobtn disabled" href="javascript:;">管理</a>
                                            <?php endif; ?>
                                            <div class="new-divider new-divider-vertical"></div>
                                            <a class="nobtn js-ajax-dialog-btn"
                                               href="<?php echo url('plugin/update',array('name'=>$vo['name'])); ?>"
                                               data-msg="确定更新该插件吗？">更新</a>
                                            <div class="new-divider new-divider-vertical"></div>
                                            <?php if($vo['status']==0): ?>
                                                <a class="nobtn js-ajax-dialog-btn"
                                                   href="<?php echo url('plugin/toggle',array('id'=>$vo['id'],'enable'=>1)); ?>"
                                                   data-msg="确定启用该插件吗？">启用</a>
                                                <?php else: ?>
                                                <a class="nobtn js-ajax-dialog-btn"
                                                   href="<?php echo url('plugin/toggle',array('id'=>$vo['id'],'disable'=>1)); ?>"
                                                   data-msg="确定禁用该插件吗？">禁用</a>
                                            <?php endif; ?>
                                            <div class="new-divider new-divider-vertical"></div>
                                            <a class="nobtn js-ajax-dialog-btn"
                                               href="<?php echo url('plugin/uninstall',array('id'=>$vo['id'])); ?>"
                                               data-msg="确定卸载该插件吗？">卸载</a>
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
    </div>
</div>
<script src="/static/js/admin.js"></script>
</body>
</html>