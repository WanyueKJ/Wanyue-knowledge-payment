<?php /*a:2:{s:73:"/www/wwwroot/demo.sdwanyue.com/themes/admin_htcyltd/admin/push/index.html";i:1610347765;s:70:"/www/wwwroot/demo.sdwanyue.com/themes/admin_htcyltd/public/header.html";i:1609814284;}*/ ?>
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
							记录<span class="layui-badge-rim page-content">推送记录</span>
						</div>
					</div>
					<div class="layui-tab layui-tab-brief">
						<ul class="layui-tab-title layui-nav" id="tabHeader">
							<li class="layui-this layui-nav-item"><a href="<?php echo url('Push/index'); ?>">记录</a></li>
							<li class="layui-nav-item"><a href="javascript:admin.openIframeLayer('<?php echo url('Push/add'); ?>','<?php echo lang('ADMIN_USER_ADD'); ?>',{btn: ['保存','关闭'],area:['640px','50%'],end:function(){}});">推送</a></li>
						</ul>
					</div>
				</div>
			</div>
		</div>

		<div class="layui-page-content">
			<div class="layui-card">
				<div class="layui-card-body">
					<form class="layui-form" name="form1" method="post" action="">
						<div class="layui-form-item layuiadmin-card-text" style="margin-bottom: 0;">

							<div class="layui-inline">
								<label class="layui-form-label">时间</label>
								<div class="layui-input-inline">
									<input type="text" class="layui-input js-bootstrap-date" name="start_time"
										   value="<?php echo input('request.start_time'); ?>"
										   autocomplete="off" placeholder="开始日期">
								</div>
								<div class="layui-form-mid">-</div>
								<div class="layui-input-inline">
									<input type="text" class="layui-input js-bootstrap-date" name="end_time"
										   value="<?php echo input('request.end_time'); ?>"
										   autocomplete="off" placeholder="结束日期">
								</div>
							</div>

							<div class="layui-inline">
								<label class="layui-form-label">关键字</label>
								<div class="layui-input-inline">
									<input type="text" class="layui-input" name="keyword" value="<?php echo input('request.keyword'); ?>" placeholder="请输入会员ID、管理员ID">
								</div>
							</div>

							<div class="layui-inline">
								<div class="layui-input-inline">
									<input type="submit" class="layui-btn btn-primary" value="搜索" />
									<a class="layui-btn layui-btn-danger btn-danger" href="<?php echo url('Push/index'); ?>">清空</a>
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
					<table class="layui-table">
						<thead>
						<tr>
							<th>ID</th>
							<th>管理员</th>
							<th>IP</th>
							<th>推送对象</th>
							<th width="60%">推送内容</th>
							<th>时间</th>
							<!-- <th><?php echo lang('ACTIONS'); ?></th> -->
						</tr>
						</thead>
						<tbody>
						<?php if(is_array($lists) || $lists instanceof \think\Collection || $lists instanceof \think\Paginator): if( count($lists)==0 ) : echo "" ;else: foreach($lists as $key=>$vo): ?>
							<tr>
								<td align="center"><?php echo $vo['id']; ?></td>
								<td><?php echo $vo['name']; ?> (<?php echo $vo['adminid']; ?>)</td>
								<td><?php echo $vo['ip']; ?></td>
								<td><?php if($vo['touid'] == ''): ?>全部会员<?php else: ?><?php echo $vo['touid']; ?><?php endif; ?></td>
								<td><?php echo $vo['content']; ?></td>
								<td><?php echo date('Y-m-d H:i:s',$vo['addtime']); ?></td>
								<!-- <td>	 -->
								<!-- <a class="btn btn-xs btn-primary" href='<?php echo url("push/edit",array("id"=>$vo["id"])); ?>'><?php echo lang('EDIT'); ?></a>
								<a class="btn btn-xs btn-danger js-ajax-delete" href="<?php echo url('push/del',array('id'=>$vo['id'])); ?>"><?php echo lang('DELETE'); ?></a> -->
								<!-- </td> -->
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