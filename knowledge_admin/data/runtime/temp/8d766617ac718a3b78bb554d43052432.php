<?php /*a:2:{s:89:"D:\My_project\Wanyue-knowledge-payment-admin/themes/admin_htcyltd/admin\orders\index.html";i:1610347694;s:84:"D:\My_project\Wanyue-knowledge-payment-admin/themes/admin_htcyltd/public\header.html";i:1609814284;}*/ ?>
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
</head>
<body>
<div class="layui-fluid">
	<div class="layui-row">
		<div class="layui-page-content">
			<div class="layui-card">
				<div class="layui-card-body">
					<form class="layui-form" method="post" action="<?php echo url('orders/index'); ?>">
						<div class="layui-form-item layuiadmin-card-text">
							<div class="layui-inline">
								<label class="layui-form-label">支付状态：</label>
								<div class="layui-input-inline">
									<select class="layui-input" name="status">
										<option value="">全部</option>
										<?php if(is_array($status) || $status instanceof \think\Collection || $status instanceof \think\Paginator): $i = 0; $__LIST__ = $status;if( count($__LIST__)==0 ) : echo "" ;else: foreach($__LIST__ as $key=>$v): $mod = ($i % 2 );++$i;?>
											<option value="<?php echo $key; ?>" <?php if(input('request.status') != '' && input('request.status') == $key): ?>selected<?php endif; ?>><?php echo $v; ?></option>
										<?php endforeach; endif; else: echo "" ;endif; ?>
									</select>
								</div>
							</div>
		
							<div class="layui-inline">
								<label class="layui-form-label">
									支付方式
								</label>
								<div class="layui-input-inline">
									<select class="layui-input" name="type">
										<option value="">全部</option>
										<?php if(is_array($type) || $type instanceof \think\Collection || $type instanceof \think\Paginator): $i = 0; $__LIST__ = $type;if( count($__LIST__)==0 ) : echo "" ;else: foreach($__LIST__ as $key=>$v): $mod = ($i % 2 );++$i;?>
											<option value="<?php echo $key; ?>" <?php if(input('request.type') != '' && input('request.type') == $key): ?>selected<?php endif; ?>><?php echo $v; ?></option>
										<?php endforeach; endif; else: echo "" ;endif; ?>
									</select>
								</div>
							</div>
		
							<div class="layui-inline">
								<label class="layui-form-label">提交时间</label>
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
								<label class="layui-form-label">用户ID</label>
								<div class="layui-input-inline">
									<input type="text" class="layui-input" name="uid" value="<?php echo input('request.uid'); ?>" placeholder="请输入用户ID">
								</div>
							</div>
		
							<div class="layui-inline">
								<label class="layui-form-label">关键字</label>
								<div class="layui-input-inline">
									<input type="text" class="layui-input" name="keyword" value="<?php echo input('request.keyword'); ?>" placeholder="请输入关键字">
								</div>
							</div>
		
							<div class="layui-inline">
								<div class="layui-input-inline">
									<input type="submit" class="layui-btn btn-primary" value="搜索" />
									<a class="layui-btn layui-btn-danger btn-danger" href="<?php echo url('orders/index'); ?>">清空</a>
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
							<th>ID</th>
							<th>会员</th>
							<th>价格</th>
							<th>订单号</th>
							<th>三方订单号</th>
							<th>收货信息</th>
							<th>支付方式</th>
							<th>状态</th>
							<th>提交时间</th>
							<th>支付时间</th>
							<th><?php echo lang('ACTIONS'); ?></th>
						</tr>
						</thead>
						<tbody>
						<?php if(is_array($lists) || $lists instanceof \think\Collection || $lists instanceof \think\Paginator): if( count($lists)==0 ) : echo "" ;else: foreach($lists as $key=>$vo): ?>
							<tr>
								<td><?php echo $vo['id']; ?></td>
								<td><?php echo $vo['userinfo']['user_nickname']; ?> (<?php echo $vo['uid']; ?>)</td>
								<td><?php echo $vo['money']; ?></td>
								<td><?php echo $vo['orderno']; ?></td>
								<td><?php echo $vo['trade_no']; ?></td>
	
								<td>
									<?php if($vo['issend'] != '-1'): ?>
										收货人：<?php echo $vo['addr_name']; ?><br>
										电话：<?php echo $vo['addr_mobile']; ?><br>
										地址：<?php echo $vo['addr_province']; ?> <?php echo $vo['addr_city']; ?> <?php echo $vo['addr_area']; ?>  <?php echo $vo['addr']; ?><br>
									<?php endif; ?>
								</td>
	
								<td><?php echo $type[$vo['type']]; ?></td>
								<td><?php echo $status[$vo['status']]; ?></td>
								<td><?php echo date('Y-m-d H:i:s',$vo['addtime']); ?></td>
								<td>
									<?php if($vo['status'] == '0'): ?>
										待支付
										<?php else: ?>
										<?php echo date('Y-m-d H:i:s',$vo['paytime']); ?>
									<?php endif; ?>
								</td>
	
								<td>
									<a class="layui-bo layui-bo-small layui-bo-succes" href='<?php echo url("orders/goods",array("orderno"=>$vo["orderno"])); ?>'>商品详情</a>
	
									<?php if($vo['issend'] == '0'): ?>
										<a class="layui-bo layui-bo-small layui-bo-waring" href="<?php echo url('orders/setSend',array('id'=>$vo['id'])); ?>" >标记发货</a>
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