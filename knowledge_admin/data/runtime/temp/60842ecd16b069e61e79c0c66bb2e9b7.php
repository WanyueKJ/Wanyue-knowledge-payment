<?php /*a:2:{s:78:"/www/wwwroot/demo.sdwanyue.com/themes/admin_htcyltd/admin/coursebuy/index.html";i:1608191614;s:70:"/www/wwwroot/demo.sdwanyue.com/themes/admin_htcyltd/public/header.html";i:1609814284;}*/ ?>
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
.table img{
    width:50px;
}
</style>
</head>
<body>
	<div class="layui-fluid">
        <div class="layui-row">
            <div class="layui-page-content">
                <div class="layui-card">
                    <div class="layui-card-body">
                        <form class="well form-inline margin-top-20">
                            课程名称：<?php echo $courseinfo['name']; ?>
                            <br>
                            <br>
                            购买人数： <?php echo $nums; if($courseinfo['paytype'] == 1): ?>&nbsp;&nbsp;&nbsp;&nbsp;总价格：<?php echo $total; ?><?php endif; ?>
                        </form>
                    </div>
                </div>
            </div>

            <div class="layui-page-content">
                <div class="layui-card">
                    <div class="layui-card-body">
                        <form class="layui-form" method="post" action="<?php echo url('Coursebuy/index'); ?>">

                            <div class="layui-inline">
                                <label class="layui-form-label">注册时间</label>
                                <div class="layui-input-inline">
                                    <input type="text" class="layui-input js-bootstrap-datetime" name="start_time"
                                           value="<?php echo input('request.start_time'); ?>"
                                           autocomplete="off" placeholder="开始日期">
                                </div>
                                -
                                <div class="layui-input-inline">
                                    <input type="text" class="layui-input js-bootstrap-datetime" name="end_time"
                                           value="<?php echo input('request.end_time'); ?>"
                                           autocomplete="off" placeholder="结束日期">
                                </div>
                            </div>


                            <div class="layui-inline">
                                <label class="layui-form-label">用户ID</label>
                                <div class="layui-input-inline">
                                    <input type="text" class="layui-input" name="uid" value="<?php echo input('request.uid'); ?>" placeholder="请输入<?php echo lang('EMAIL'); ?>">
                                </div>
                            </div>

                            <input type="hidden" name="courseid" value="<?php echo $courseinfo['id']; ?>"/>

                            <div class="layui-inline">
                                <div class="layui-input-inline">
                                    <input type="submit" class="layui-btn btn-primary" value="搜索"/>
                                    <a class="layui-btn layui-btn-danger btn-danger" href="<?php echo url('Coursebuy/index',['courseid'=>$courseinfo['id']]); ?>">清空</a>
                                </div>
                            </div>

                        </form>
                    </div>
                </div>
            </div>

            <div class="layui-page-content">
                <div class="layui-card">
                    <form method="post" class="layui-card-body js-ajax-form" action="" method="post">
                        <table class="layui-table treeTable">
                            <thead>
                            <tr>
                                <th>用户</th>
                                <th>价格</th>
                                <?php if($courseinfo['sort'] == 1): ?>
                                    <th>学习进度</th>
                                <?php endif; ?>
                                <th>时间</th>
                            </tr>
                            </thead>
                            <tbody>
                            <?php if(is_array($list) || $list instanceof \think\Collection || $list instanceof \think\Paginator): if( count($list)==0 ) : echo "" ;else: foreach($list as $key=>$vo): ?>
                                <tr>
                                    <td><?php echo $vo['userinfo']['user_nickname']; ?> (<?php echo $vo['userinfo']['id']; ?>)</td>
                                    <td><?php if($vo['money'] > 0): ?><?php echo $vo['money']; ?><?php endif; ?></td>
                                    <?php if($courseinfo['sort'] == 1): ?>
                                        <td><?php echo $vo['lessons']; ?>/<?php echo $courseinfo['lessons']; ?></td>
                                    <?php endif; ?>
                                    <td><?php echo $vo['paytime']; ?></td>
                                </tr>
                            <?php endforeach; endif; else: echo "" ;endif; ?>
                            </tbody>
                        </table>

                    </form>
                </div>
            </div>
        </div>

	</div>
	<script src="/static/js/admin.js"></script>
</body>
</html>