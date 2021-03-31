<?php /*a:2:{s:87:"D:\My_project\Wanyue-knowledge-payment-admin/themes/admin_htcyltd/admin\user\index.html";i:1608348484;s:84:"D:\My_project\Wanyue-knowledge-payment-admin/themes/admin_htcyltd/public\header.html";i:1609814284;}*/ ?>
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
							<?php echo lang('ADMIN_USER_INDEX'); ?><span class="layui-badge-rim page-content">网站管理员添加及管理</span>
						</div>
					</div>
					<div class="layui-tab layui-tab-brief">
						<ul class="layui-tab-title layui-nav">
							<li class="layui-this layui-nav-item"><a href="<?php echo url('user/index'); ?>"><?php echo lang('ADMIN_USER_INDEX'); ?></a></li>
							<li class="layui-nav-item"><a href="javascript:admin.openIframeLayer('<?php echo url('user/Add'); ?>','<?php echo lang('ADMIN_USER_ADD'); ?>',{btn: ['保存','关闭'],area:['640px','50%'],end:function(){}});"><?php echo lang('ADMIN_USER_ADD'); ?></a></li>
						</ul>
					</div>
				</div>
			</div>
		</div>

		<div class="layui-page-content">
			<div class="layui-card">
				<div class="layui-card-body">
					<form class="layui-form" method="get" action="<?php echo url('User/index'); ?>">
						<div class="layui-form-item layuiadmin-card-text" style="margin-bottom: 0;">
							<div class="layui-inline">
								<label class="layui-form-label">用户名</label>
								<div class="layui-input-inline">
									<input type="text" class="layui-input" name="user_login" value="<?php echo input('request.user_login/s',''); ?>" placeholder="请输入<?php echo lang('USERNAME'); ?>">
								</div>
							</div>
							<div class="layui-inline">
								<label class="layui-form-label">邮箱</label>
								<div class="layui-input-inline">
									<input type="text" class="layui-input" name="user_email" value="<?php echo input('request.user_email/s',''); ?>" placeholder="请输入<?php echo lang('EMAIL'); ?>">
								</div>
							</div>
							<div class="layui-inline">
								<div class="layui-input-inline">
									<input type="submit" class="layui-btn btn-primary" value="搜索" />
									<a class="layui-btn layui-btn-danger btn-danger" href="<?php echo url('User/index'); ?>">清空</a>
								</div>
							</div>
						</div>
					</form>
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
							<th><?php echo lang('USERNAME'); ?></th>
							<th><?php echo lang('LAST_LOGIN_IP'); ?></th>
							<th><?php echo lang('LAST_LOGIN_TIME'); ?></th>
							<th><?php echo lang('EMAIL'); ?></th>
							<th><?php echo lang('STATUS'); ?></th>
							<th width="180"><?php echo lang('ACTIONS'); ?></th>
						</tr>
						</thead>
						<tbody>
						<?php $user_statuses=array("0"=>lang('USER_STATUS_BLOCKED'),"1"=>lang('USER_STATUS_ACTIVATED'),"2"=>lang('USER_STATUS_UNVERIFIED')); if(is_array($users) || $users instanceof \think\Collection || $users instanceof \think\Paginator): if( count($users)==0 ) : echo "" ;else: foreach($users as $key=>$vo): ?>
							<tr>
								<td><?php echo $vo['id']; ?></td>
								<td><?php if($vo['user_url']): ?><a href="<?php echo $vo['user_url']; ?>" target="_blank" title="<?php echo $vo['signature']; ?>"><?php echo $vo['user_login']; ?></a><?php else: ?><?php echo $vo['user_login']; ?><?php endif; ?></td>
								<td><?php echo $vo['last_login_ip']; ?></td>
								<td>
									<?php if($vo['last_login_time'] == 0): ?>
										<?php echo lang('USER_HAVE_NOT_LOGIN'); else: ?>
										<?php echo date('Y-m-d H:i:s',$vo['last_login_time']); ?>
									<?php endif; ?>
								</td>
								<td><?php echo $vo['user_email']; ?></td>
								<td>
									<?php switch($vo['user_status']): case "0": ?>
											<span class="layui-badge-dot layui-bg-abnormal" style="margin-right: 6px;"></span><?php echo $user_statuses[$vo['user_status']]; break; case "1": ?>
											<span class="layui-badge-dot layui-bg-function" style="margin-right: 6px;"></span><?php echo $user_statuses[$vo['user_status']]; break; case "2": ?>
											<span class="layui-badge-dot layui-bg-default" style="margin-right: 6px;"></span><?php echo $user_statuses[$vo['user_status']]; break; ?>
									<?php endswitch; ?>
								</td>
								<td>
									<?php if($vo['id'] == 1 || $vo['id'] == cmf_get_current_admin_id()): if($vo['user_status'] == 1): ?>
											<span class="layui-bo layui-bo-small layui-bo-primary layui-btn-disabled"><?php echo lang('BLOCK_USER'); ?></span>
											<?php else: ?>
											<span class="layui-bo layui-bo-small layui-bo-primary layui-btn-disabled"><?php echo lang('ACTIVATE_USER'); ?></span>
										<?php endif; ?>
										<div class="new-divider new-divider-vertical"></div>
										<span class="layui-bo layui-bo-small layui-bo-primary layui-btn-disabled"><?php echo lang('EDIT'); ?></span>
										<div class="new-divider new-divider-vertical"></div>
										<span class="layui-bo layui-bo-small layui-bo-primary layui-btn-disabled"><?php echo lang('DELETE'); ?></span>
										<?php else: if($vo['user_status'] == 1): ?>
											<a class="layui-bo layui-bo-small layui-bo-waring js-ajax-dialog-btn" href="<?php echo url('user/ban',array('id'=>$vo['id'])); ?>" data-msg="<?php echo lang('BLOCK_USER_CONFIRM_MESSAGE'); ?>"><?php echo lang('BLOCK_USER'); ?></a>
											<?php else: ?>
											<a class="layui-bo layui-bo-small layui-bo-succes js-ajax-dialog-btn" href="<?php echo url('user/cancelban',array('id'=>$vo['id'])); ?>" data-msg="<?php echo lang('ACTIVATE_USER_CONFIRM_MESSAGE'); ?>"><?php echo lang('ACTIVATE_USER'); ?></a>
										<?php endif; ?>
										<div class="new-divider new-divider-vertical"></div>
										<a class="layui-bo layui-bo-small layui-bo-checked" href="javascript:admin.openIframeLayer('<?php echo url('user/edit',array('id'=>$vo['id'])); ?>','编辑',{btn: ['保存','关闭'],area:['640px','50%'],end:function(){location.reload();}});"><?php echo lang('EDIT'); ?></a>
										<div class="new-divider new-divider-vertical"></div>
										<a class="layui-bo layui-bo-small layui-bo-close js-ajax-delete" href="<?php echo url('user/delete',array('id'=>$vo['id'])); ?>"><?php echo lang('DELETE'); ?></a>
									<?php endif; ?>
								</td>
							</tr>
						<?php endforeach; endif; else: echo "" ;endif; ?>
						</tbody>
					</table>
					<div class="pagination"><?php echo $page; ?></div>
				</div>
			</div>
		</div>
	</div>
</div>
<script src="/static/js/admin.js"></script>
</body>
</html>