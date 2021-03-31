<?php /*a:2:{s:82:"/www/wwwroot/demo.sdwanyue.com/themes/admin_simpleboot3/admin/coursebuy/index.html";i:1602491838;s:74:"/www/wwwroot/demo.sdwanyue.com/themes/admin_simpleboot3/public/header.html";i:1602491838;}*/ ?>
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
<style>
.table img{
    width:50px;
}
</style>
</head>
<body>
	<div class="wrap js-check-wrap">
		<ul class="nav nav-tabs">
			<li><a href="<?php echo url('course/index',['sort'=>$courseinfo['sort']]); ?>">课程列表</a></li>
			<li class="active"><a >列表</a></li>
		</ul>
        <form class="well form-inline margin-top-20">
            课程名称：<?php echo $courseinfo['name']; ?>
            <br>
            <br>
             购买人数： <?php echo $nums; if($courseinfo['paytype'] == 1): ?>&nbsp;&nbsp;&nbsp;&nbsp;总价格：<?php echo $total; ?><?php endif; ?>
        </form>
        
        <form class="well form-inline margin-top-20" method="post" action="<?php echo url('Coursebuy/index'); ?>">

            付费时间：
            <input class="form-control js-bootstrap-date" name="start_time" id="start_time" value="<?php echo input('request.start_time'); ?>" aria-invalid="false" style="width: 110px;"> - 
            <input class="form-control js-bootstrap-date" name="end_time" id="end_time" value="<?php echo input('request.end_time'); ?>" aria-invalid="false" style="width: 110px;">
                
            用户ID：
            <input class="form-control" type="text" name="uid" style="width: 200px;" value="<?php echo input('request.uid'); ?>"
                   placeholder="请输入用户ID">
                   
            <input type="hidden" name="courseid" value="<?php echo $courseinfo['id']; ?>"/>
            <input type="submit" class="btn btn-primary" value="搜索"/>
            <a class="btn btn-danger" href="<?php echo url('Coursebuy/index',['courseid'=>$courseinfo['id']]); ?>">清空</a>
        </form>
        
		<form method="post" class="js-ajax-form" action="" method="post">
			<table class="table table-hover table-bordered table-list">
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
	<script src="/static/js/admin.js"></script>
</body>
</html>