<?php /*a:2:{s:74:"/www/wwwroot/demo.sdwanyue.com/themes/admin_htcyltd/admin/slide/index.html";i:1608347804;s:70:"/www/wwwroot/demo.sdwanyue.com/themes/admin_htcyltd/public/header.html";i:1609814284;}*/ ?>
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
							幻灯片列表<span class="layui-badge-rim page-content">页面幻灯片图片上传及管理</span>
						</div>
					</div>
					<div class="layui-tab layui-tab-brief">
						<ul class="layui-nav layui-tab-title" id="tabHeader">
							<li class="layui-this layui-nav-item" >
								<a href="<?php echo url('slide/index'); ?>">幻灯片列表</a>
							</li>
							<li class="layui-nav-item">
								<a href="javascript:admin.openIframeLayer('<?php echo url('slide/add'); ?>','添加幻灯片',{btn: ['保存','关闭'],area:['640px','50%'],end:function(){}});">添加幻灯片</a>
							</li>
						</ul>
					</div>
				</div>
			</div>
		</div>
		<div class="layui-page-content">
			<div class="layui-card">
				<div class="layui-card-body">
					<table class="layui-table" lay-even lay-skin="nob" lay-size="lg">
						<thead>
						<tr>
							<th width="50">ID</th>
							<th width="200">幻灯片</th>
							<th>备注</th>
							<th width="212"><?php echo lang('ACTIONS'); ?></th>
						</tr>
						</thead>
						<tbody>
						<?php 

						 if(is_array($slides) || $slides instanceof \think\Collection || $slides instanceof \think\Paginator): if( count($slides)==0 ) : echo "" ;else: foreach($slides as $key=>$vo): ?>
							<tr>
								<td><?php echo $vo['id']; ?></td>
								<td><?php echo $vo['name']; ?></td>
								<td>
									<?php echo $vo['remark']; ?>
								</td>
								<td>
									<a class="layui-bo layui-bo-small layui-bo-succes" href="javascript:admin.openIframeLayer('<?php echo url('slideItem/index',array('slide_id'=>$vo['id'])); ?>','管理 <?php echo $vo['name']; ?> 页面',{area:['80%','70%'],end:function(){location.reload();}});">管理页面</a>
									<div class="new-divider new-divider-vertical"></div>
									<a class="layui-bo layui-bo-small layui-bo-checked" href="javascript:admin.openIframeLayer('<?php echo url('slide/edit',array('id'=>$vo['id'])); ?>','编辑幻灯片',{btn: ['保存','关闭'],area:['640px','50%'],end:function(){location.reload();}});"><?php echo lang('EDIT'); ?></a>
									<div class="new-divider new-divider-vertical"></div>
									<a class="layui-bo layui-bo-small layui-bo-close js-ajax-delete" href="<?php echo url('slide/delete',array('id'=>$vo['id'])); ?>"><?php echo lang('DELETE'); ?></a>
								</td>
							</tr>
						<?php endforeach; endif; else: echo "" ;endif; ?>
						</tbody>
					</table>
				</div>
			</div>
		</div>
	</div>
</div>
<script src="/static/js/admin.js"></script>

</body>
</html>