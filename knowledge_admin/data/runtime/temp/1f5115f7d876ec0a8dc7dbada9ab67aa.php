<?php /*a:2:{s:80:"/www/wwwroot/demo.sdwanyue.com/themes/admin_htcyltd/portal/admin_page/index.html";i:1609991812;s:70:"/www/wwwroot/demo.sdwanyue.com/themes/admin_htcyltd/public/header.html";i:1609814284;}*/ ?>
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
                            页面管理<span class="layui-badge-rim page-content">设置网站的数据参数及其它设置</span>
                        </div>
                    </div>
                    <div class="layui-tab layui-tab-brief">
                        <ul class="layui-tab-title layui-nav" id="tabHeader">
                            <li class="layui-this layui-nav-item"><a href="<?php echo url('AdminPage/index'); ?>">页面管理</a></li>
                            <li class="layui-nav-item"><a href="<?php echo url('AdminPage/add'); ?>">添加页面</a></li>
                        </ul>
                    </div>
                </div>
            </div>
        </div>
        <div class="layui-page-content js-check-wrap">
            <div class="layui-card">
                <div class="layui-card-body">
                    <form class="layui-form" method="post" action="<?php echo url('AdminPage/index'); ?>">
                        <div class="layui-form-item layuiadmin-card-text" style="margin-bottom: 0;">
                            <div class="layui-inline">
                                <label class="layui-form-label">标题</label>
                                <div class="layui-input-inline">
                                    <div class="layui-input-inline">
                                        <input type="text" class="layui-input" name="keyword" style="width: 200px;"
                                               value="<?php echo (isset($keyword) && ($keyword !== '')?$keyword:''); ?>" placeholder="请输入关键字">
                                    </div>
                                </div>
                            </div>
                            <div class="layui-inline">
                                <button class="layui-btn">搜索</button>
                            </div>
                        </div>
                    </form>
                </div>
            </div>
        </div>
        <div class="layui-page-content">
            <div class="layui-card">
                <div class="layui-card-body">
                    <form class="layui-form js-ajax-form" method="post">
                        <div class="layui-btn-container">
                            <button class="layui-btn layui-btn-sm js-ajax-submit" type="submit" data-action="<?php echo url('AdminPage/delete'); ?>"
                                    data-subcheck="true" data-msg="<?php echo lang('DELETE_CONFIRM_MESSAGE'); ?>"><?php echo lang('DELETE'); ?>
                            </button>
                        </div>
                        <table class="layui-table js-check-wrap" id="menus-table" lay-even lay-skin="nob" lay-size="lg">
                            <thead>
                            <tr>
                                <th width="16">
                                    <input lay-skin="primary" type="checkbox" class="js-check-all" lay-filter="js-check-all" data-direction="x" data-checklist="js-check-x">
                                </th>
                                <th width="50">ID</th>
                                <th>标题</th>
                                <th>作者</th>
                                <th width="160">发布时间</th>
                                <th width="100">状态</th>
                                <th width="112">操作</th>
                            </tr>
                            </thead>
                            <?php $status=array("1"=>'已发布',"0"=>'未发布'); if(is_array($pages) || $pages instanceof \think\Collection || $pages instanceof \think\Paginator): if( count($pages)==0 ) : echo "" ;else: foreach($pages as $key=>$vo): ?>
                                <tr>
                                    <td>
                                        <?php if($vo['id'] > 3): ?>
                                        <input lay-skin="primary" type="checkbox" class="js-check" lay-filter="js-check" data-yid="js-check-y" data-xid="js-check-x" name="ids[]" value="<?php echo $vo['id']; ?>">
                                        <?php endif; ?>
                                    </td>
                                    <td><?php echo $vo['id']; ?></td>
                                    <td>
                                        <?php echo $vo['post_title']; ?>
                                    </td>
                                    <td><?php echo $vo['user_nickname']; ?></td>
                                    <td>
                                        <?php if(empty($vo['published_time']) || (($vo['published_time'] instanceof \think\Collection || $vo['published_time'] instanceof \think\Paginator ) && $vo['published_time']->isEmpty())): ?>
                                            未发布
                                            <?php else: ?>
                                            <?php echo date('Y-m-d H:i',$vo['published_time']); ?>
                                        <?php endif; ?>
                                    </td>
                                    <td>
                                        <?php if(!(empty($vo['post_status']) || (($vo['post_status'] instanceof \think\Collection || $vo['post_status'] instanceof \think\Paginator ) && $vo['post_status']->isEmpty()))): ?>
                                            <a class="layui-badge layui-bg-correct">已发布</a>
                                            <?php else: ?>
                                            <a class="layui-badge layui-bg-warning">未发布</a>
                                        <?php endif; ?>
                                    </td>
                                    <td>
                                        <a class="layui-bo layui-bo-small layui-bo-checked" href="<?php echo url('AdminPage/edit',array('id'=>$vo['id'])); ?>"><?php echo lang('EDIT'); ?></a>

                                        <?php if($vo['id'] > 3): ?>
                                            <div class="new-divider new-divider-vertical"></div>
                                            <a class="layui-bo layui-bo-small layui-bo-close js-ajax-delete" href="<?php echo url('AdminPage/delete',array('id'=>$vo['id'])); ?>"><?php echo lang('DELETE'); ?></a>
                                        <?php endif; ?>
                                    </td>
                                </tr>
                            <?php endforeach; endif; else: echo "" ;endif; ?>
                        </table>
                        <div class="pagination"><?php echo $page; ?></div>
                    </form>
                </div>
            </div>
        </div>
    </div>
</div>
<script src="/static/js/admin.js"></script>
</body>
</html>