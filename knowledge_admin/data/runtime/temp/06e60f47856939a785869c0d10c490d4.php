<?php /*a:2:{s:73:"/www/wwwroot/demo.sdwanyue.com/themes/admin_htcyltd/admin/rbac/index.html";i:1610334682;s:70:"/www/wwwroot/demo.sdwanyue.com/themes/admin_htcyltd/public/header.html";i:1609814284;}*/ ?>
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
							<?php echo lang('ADMIN_RBAC_INDEX'); ?><span class="layui-badge-rim page-content">网站管理员角色组管理</span>
						</div>
					</div>
					<div class="layui-tab layui-tab-brief">
						<ul class="layui-tab-title layui-nav" id="tabHeader">
							<li class="layui-this layui-nav-item"><a href="<?php echo url('rbac/index'); ?>"><?php echo lang('ADMIN_RBAC_INDEX'); ?></a></li>
							<li class="layui-nav-item"><a href="javascript:admin.openIframeLayer('<?php echo url('rbac/roleAdd'); ?>','<?php echo lang('ADMIN_RBAC_ROLEADD'); ?>',{btn: ['保存','关闭'],area:['640px','50%'],end:function(){}});"><?php echo lang('ADMIN_RBAC_ROLEADD'); ?></a></li>
						</ul>
					</div>
				</div>
			</div>
		</div>
		<div class="layui-page-content">
			<div class="layui-card">
				<div class="layui-card-body">
					<form action="<?php echo url('Rbac/listorders'); ?>" method="post" class="layui-form">
						<table class="layui-table" lay-even lay-skin="nob" lay-size="lg">
							<thead>
							<tr>
								<th width="40">ID</th>
								<th align="left"><?php echo lang('ROLE_NAME'); ?></th>
								<th align="left"><?php echo lang('ROLE_DESCRIPTION'); ?></th>
								<th width="60" align="left"><?php echo lang('STATUS'); ?></th>
								<th width="300"><?php echo lang('ACTIONS'); ?></th>
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
											<span class="layui-badge-dot layui-bg-function" style="margin-right: 6px;"></span>已启用
											<?php else: ?>
											<span class="layui-badge-dot layui-bg-abnormal" style="margin-right: 6px;"></span>已禁用
										<?php endif; ?>
									</td>
									<td>
										<?php if($vo['id'] == 1): ?>
											<span class="layui-bo layui-bo-small layui-bo-primary layui-btn-disabled"><?php echo lang('ROLE_SETTING'); ?></span>
											
											<div class="new-divider new-divider-vertical"></div>
											<span class="layui-bo layui-bo-small layui-bo-primary layui-btn-disabled"><?php echo lang('EDIT'); ?></span>
											<div class="new-divider new-divider-vertical"></div>
											<span class="layui-bo layui-bo-small layui-bo-primary layui-btn-disabled"><?php echo lang('DELETE'); ?></span>
											<?php else: ?>
											<a class="layui-bo layui-bo-small layui-bo-waring" href="javascript:admin.openIframeLayer('<?php echo url('rbac/authorize',array('id'=>$vo['id'])); ?>','权限管理',{btn: ['保存','关闭'],area:['640px','50%'],end:function(){location.reload();}});"><?php echo lang('ROLE_SETTING'); ?></a>
											
											<div class="new-divider new-divider-vertical"></div>
											<a class="layui-bo layui-bo-small layui-bo-checked" href="javascript:admin.openIframeLayer('<?php echo url('rbac/roleedit',array('id'=>$vo['id'])); ?>','编辑',{btn: ['保存','关闭'],area:['640px','50%'],end:function(){location.reload();}});"><?php echo lang('EDIT'); ?></a>
											<div class="new-divider new-divider-vertical"></div>
											<a class="layui-bo layui-bo-small layui-bo-close js-ajax-delete" href="<?php echo url('Rbac/roledelete',array('id'=>$vo['id'])); ?>"><?php echo lang('DELETE'); ?></a>
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