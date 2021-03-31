<?php /*a:2:{s:80:"/www/wwwroot/demo.sdwanyue.com/themes/admin_htcyltd/admin/courseclass/index.html";i:1610326886;s:70:"/www/wwwroot/demo.sdwanyue.com/themes/admin_htcyltd/public/header.html";i:1609814284;}*/ ?>
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

	<div class="layui-page-header">
		<div class="layui-card">
			<div class="layui-page-header-content">
				<div class="layui-card-body">
					<div class="layui-ui-page-header-title">
						科目分类<span class="layui-badge-rim page-content">科目分类</span>
					</div>
				</div>
				<div class="layui-tab layui-tab-brief">
					<ul class="layui-tab-title layui-nav" id="tabHeader">
						<li class="layui-this layui-nav-item"><a href="<?php echo url('courseclass/index'); ?>">列表</a></li>
						<li class="layui-nav-item">
							<a href="<?php echo url('courseclass/add'); ?>"><?php echo lang('ADD'); ?></a>
						</li>
					</ul>
				</div>
			</div>
		</div>
	</div>

	<div class="layui-page-content">
		<div class="layui-card">
			<form method="post" class="layui-card-body js-ajax-form" action="<?php echo url('courseclass/listOrder'); ?>">
				<div class="table-actions">
					<button class="layui-btn js-ajax-submit" type="submit"><?php echo lang('SORT'); ?></button>
				</div>
				<table class="layui-table treeTable" lay-even lay-skin="nob" lay-size="lg">
					<thead>
					<tr>
						<th width="50"><?php echo lang('SORT'); ?></th>
						<th>ID</th>
						<th>名称</th>
						<th>图标</th>
						<th align="center"><?php echo lang('ACTIONS'); ?></th>
					</tr>
					</thead>
					<tbody>
					<?php if(is_array($list) || $list instanceof \think\Collection || $list instanceof \think\Paginator): if( count($list)==0 ) : echo "" ;else: foreach($list as $key=>$vo): ?>
						<tr>
							<td>
								<input name="list_orders[<?php echo $vo['id']; ?>]" class="input-order" type="text" value="<?php echo $vo['list_order']; ?>">
							</td>
							<td><?php echo $vo['id']; ?></td>
							<td><?php echo $vo['name']; ?></td>
							<td><?php if($vo['thumb']): ?><img class="imgtip" src="<?php echo $vo['thumb']; ?>" style="max-width:30px;"><?php endif; ?></td>
							<td>
								<a class="layui-bo layui-bo-small layui-bo-checked" href='<?php echo url("courseclass/edit",array("id"=>$vo["id"])); ?>'><?php echo lang('EDIT'); ?></a>
								<a class="layui-bo layui-bo-small layui-bo-close js-ajax-delete" href="<?php echo url('courseclass/del',array('id'=>$vo['id'])); ?>"><?php echo lang('DELETE'); ?></a>
							</td>
						</tr>
					<?php endforeach; endif; else: echo "" ;endif; ?>
					</tbody>
				</table>
				<div class="pagination"><?php echo $page; ?></div>

			</form>

		</div>
	</div>



</div>

<script src="/static/js/wind.js"></script>
<script src="/static/js/admin.js"></script>
<script>
	$(document).ready(function () {
		Wind.css('treeTable');
		Wind.use('treeTable', function () {
			$("#menus-table").treeTable({
				indent: 20
			});
		});
	});
</script>

</body>
</html>