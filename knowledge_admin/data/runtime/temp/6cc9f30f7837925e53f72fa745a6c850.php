<?php /*a:2:{s:101:"D:\My_project\wanyue_education_web_local\education_web/themes/admin_simpleboot3/admin\rbac\index.html";i:1602491837;s:98:"D:\My_project\wanyue_education_web_local\education_web/themes/admin_simpleboot3/public\header.html";i:1602491837;}*/ ?>
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
			<li class="active"><a href="<?php echo url('rbac/index'); ?>"><?php echo lang('ADMIN_RBAC_INDEX'); ?></a></li>
			<li><a href="<?php echo url('rbac/roleAdd'); ?>"><?php echo lang('ADMIN_RBAC_ROLEADD'); ?></a></li>
		</ul>
		<form action="<?php echo url('Rbac/listorders'); ?>" method="post" class="margin-top-20">
			<table class="table table-hover table-bordered">
				<thead>
					<tr>
						<th width="40">ID</th>
						<th align="left"><?php echo lang('ROLE_NAME'); ?></th>
						<th align="left"><?php echo lang('ROLE_DESCRIPTION'); ?></th>
						<th width="60" align="left"><?php echo lang('STATUS'); ?></th>
						<th width="160"><?php echo lang('ACTIONS'); ?></th>
					</tr>
				</thead>
				<tbody>
					<?php if(is_array($roles) || $roles instanceof \think\Collection || $roles instanceof \think\Paginator): if( count($roles)==0 ) : echo "" ;else: foreach($roles as $key=>$vo): ?>
					<tr>
						<td><?php echo $vo['id']; ?></td>
						<td><?php echo $vo['name']; ?></td>
						<td><?php echo $vo['remark']; ?></td>
						<td>
							<?php if($vo['status'] == 1): ?>
								<span class="label label-success">已启用</span>
							<?php else: ?>
								<span class="label label-danger">已禁用</span>
							<?php endif; ?>
						</td>
						<td>
							<?php if($vo['id'] == 1): ?>
								<span class="btn btn-xs btn-primary disabled"><?php echo lang('ROLE_SETTING'); ?></span>
								<!-- <a href="javascript:openIframeDialog('<?php echo url('rbac/member',array('id'=>$vo['id'])); ?>','成员管理');">成员管理</a> | -->
								<span class="btn btn-xs btn-primary disabled"><?php echo lang('EDIT'); ?></span>
								<span class="btn btn-xs btn-danger disabled"><?php echo lang('DELETE'); ?></span>
							<?php else: ?>
								<a class="btn btn-xs btn-primary" href="<?php echo url('Rbac/authorize',array('id'=>$vo['id'])); ?>"><?php echo lang('ROLE_SETTING'); ?></a>
								<!-- <a href="javascript:openIframeDialog('<?php echo url('rbac/member',array('id'=>$vo['id'])); ?>','成员管理');">成员管理</a>| -->
								<a class="btn btn-xs btn-primary" href="<?php echo url('Rbac/roleedit',array('id'=>$vo['id'])); ?>"><?php echo lang('EDIT'); ?></a>
								<a class="btn btn-xs btn-danger js-ajax-delete" class="" href="<?php echo url('Rbac/roledelete',array('id'=>$vo['id'])); ?>"><?php echo lang('DELETE'); ?></a>
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