<?php /*a:2:{s:79:"/www/wwwroot/demo.sdwanyue.com/themes/admin_simpleboot3/admin/course/index.html";i:1609739633;s:74:"/www/wwwroot/demo.sdwanyue.com/themes/admin_simpleboot3/public/header.html";i:1602491838;}*/ ?>
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
	<div class="wrap">
		<ul class="nav nav-tabs">
			<li class="active"><a >列表</a></li>
			<li><a href="<?php echo url('course/add',['sort'=>$sort]); ?>">添加</a></li>
		</ul>
        <form class="well form-inline margin-top-20" method="post" action="<?php echo url('course/index'); ?>">
            上架状态：
            <select class="form-control" name="status">
                <option value="">全部</option>
                <?php if(is_array($status) || $status instanceof \think\Collection || $status instanceof \think\Paginator): $i = 0; $__LIST__ = $status;if( count($__LIST__)==0 ) : echo "" ;else: foreach($__LIST__ as $key=>$v): $mod = ($i % 2 );++$i;?>
                <option value="<?php echo $key; ?>" <?php if(input('request.status') != '' && input('request.status') == $key): ?>selected<?php endif; ?>><?php echo $v; ?></option>
                <?php endforeach; endif; else: echo "" ;endif; ?>
            </select>
            
            年级：
            <select class="form-control" name="gradeid">
                <option value="">全部</option>
                <?php if(is_array($grade) || $grade instanceof \think\Collection || $grade instanceof \think\Paginator): $i = 0; $__LIST__ = $grade;if( count($__LIST__)==0 ) : echo "" ;else: foreach($__LIST__ as $key=>$v): $mod = ($i % 2 );++$i;?>
                <option value="<?php echo $v['id']; ?>" <?php if(input('request.gradeid') != '' && input('request.gradeid') == $v['id']): ?>selected<?php endif; ?>><?php echo $v['name']; ?></option>
                <?php endforeach; endif; else: echo "" ;endif; ?>
            </select>

            获取方式：
            <select class="form-control" name="paytype">
                <option value="">全部</option>
                <?php if(is_array($paytypes) || $paytypes instanceof \think\Collection || $paytypes instanceof \think\Paginator): $i = 0; $__LIST__ = $paytypes;if( count($__LIST__)==0 ) : echo "" ;else: foreach($__LIST__ as $key=>$v): $mod = ($i % 2 );++$i;?>
                <option value="<?php echo $key; ?>" <?php if(input('request.paytype') != '' && input('request.paytype') == $key): ?>selected<?php endif; ?>><?php echo $v; ?></option>
                <?php endforeach; endif; else: echo "" ;endif; ?>
            </select>
            <?php if($sort != 1 && $sort != 3): ?>
            内容形式：
            <select class="form-control" name="type">
                <option value="">全部</option>
                <?php if(is_array($types) || $types instanceof \think\Collection || $types instanceof \think\Paginator): $i = 0; $__LIST__ = $types;if( count($__LIST__)==0 ) : echo "" ;else: foreach($__LIST__ as $key=>$v): $mod = ($i % 2 );++$i;?>
                <option value="<?php echo $key; ?>" <?php if(input('request.type') != '' && input('request.type') == $key): ?>selected<?php endif; ?>><?php echo $v; ?></option>
                <?php endforeach; endif; else: echo "" ;endif; ?>
            </select>
            <?php endif; ?>
            发布时间：
            <input class="form-control js-bootstrap-date" name="start_time" id="start_time" value="<?php echo input('request.start_time'); ?>" aria-invalid="false" style="width: 110px;"> - 
            <input class="form-control js-bootstrap-date" name="end_time" id="end_time" value="<?php echo input('request.end_time'); ?>" aria-invalid="false" style="width: 110px;">
                
            用户ID：
            <input class="form-control" type="text" name="uid" style="width: 200px;" value="<?php echo input('request.uid'); ?>"
                   placeholder="请输入用户ID">
            关键字：
            <input class="form-control" type="text" name="keyword" style="width: 200px;" value="<?php echo input('request.keyword'); ?>"
                   placeholder="标题">
            <input type="hidden" name="sort" value="<?php echo $sort; ?>"/>
            <input type="submit" class="btn btn-primary" value="搜索"/>
            <a class="btn btn-danger" href="<?php echo url('course/index',['sort'=>$sort]); ?>">清空</a>
        </form>
		<form method="post" class="js-ajax-form" action="<?php echo url('course/listOrder'); ?>">
            <div class="table-actions">
                <button class="btn btn-primary btn-sm js-ajax-submit" type="submit"><?php echo lang('SORT'); ?></button>
            </div>
			<table class="table table-hover table-bordered">
				<thead>
					<tr>
                        
                        <th width="50"><?php echo lang('SORT'); ?></th>
						<th>ID</th>
						<th>讲师</th>
						<th>学级</th>
						<th>科目</th>
                        <?php if($sort != 1 && $sort != 3): ?>
                        <th>内容形式</th>
                        <?php endif; ?>
						<th>标题</th>
						<th>封面</th>
						<th>获取</th>
                        <?php if($sort == 1): ?>
                        <th>课时数</th>
                        <?php endif; ?>
						<th>学习人数</th>
						<th>状态</th>
						<th>上架时间</th>
                        <?php if($sort == 2 || $sort == 3): ?>
                        <th>开播时间</th>
                        <th>结束时间</th>
                        <?php endif; ?>
						<th>时间</th>
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
						<td><?php echo $vo['userinfo']['user_nickname']; ?> (<?php echo $vo['userinfo']['id']; ?>)</td>
						<td><?php echo (isset($grade[$vo['gradeid']]['name']) && ($grade[$vo['gradeid']]['name'] !== '')?$grade[$vo['gradeid']]['name']:''); ?></td>
						<td><?php echo (isset($classs[$vo['classid']]['name']) && ($classs[$vo['classid']]['name'] !== '')?$classs[$vo['classid']]['name']:''); ?></td>
                        <?php if($sort != 1 && $sort != 3): ?>
						<td><?php echo (isset($types[$vo['type']]) && ($types[$vo['type']] !== '')?$types[$vo['type']]:''); ?></td>
                        <?php endif; ?>
						<td><?php echo $vo['name']; ?></td>
						<td><?php if($vo['thumb']): ?><img src="<?php echo $vo['thumb']; ?>"><?php endif; ?></td>
                        <td>
                            <?php if($vo['paytype'] == 0): ?>
                                免费
                            <?php else: ?>
                                <?php echo $paytypes[$vo['paytype']]; ?> / <?php echo $vo['payval']; ?>
                            <?php endif; ?>
                        </td>
                        <?php if($sort == 1): ?>
                        <td><?php echo $vo['lessons']; ?></td>
                        <?php endif; ?>
                        <td><?php echo $vo['views']; ?></td>
                        <td><?php echo $status[$vo['status']]; ?></td>
                        <td>
                            <?php echo date('Y-m-d H:i:s',$vo['shelvestime']); ?>
                        </td>
                        
                        <?php if($sort == 2 || $sort == 3): ?>
                        <td><?php echo date('Y-m-d H:i:s',$vo['starttime']); ?></td>
                        <td><?php echo date('Y-m-d H:i:s',$vo['endtime']); ?></td>
                        <?php endif; ?>
                        <td><?php echo date('Y-m-d H:i:s',$vo['addtime']); ?></td>
						<td>
                            <?php if($vo['sort'] == 1): ?>
                            <a class="btn btn-xs btn-info" href='<?php echo url("lesson/index",array("courseid"=>$vo["id"])); ?>'>课时管理</a>
                            <?php endif; ?>
                            
                            <a class="btn btn-xs btn-info" href='<?php echo url("coursebuy/index",array("courseid"=>$vo["id"])); ?>'>购买详情</a>
                            
                            <?php if($vo['status'] > 0): ?>
                            <a class="btn btn-xs btn-warning js-ajax-dialog-btn" href="<?php echo url("course/setstatus",array("id"=>$vo["id"],"status"=>"-2")); ?>">下架</a>
                            <?php else: ?>
                            <a class="btn btn-xs btn-warning js-ajax-dialog-btn" href="<?php echo url("course/setstatus",array("id"=>$vo["id"],'status'=>'1')); ?>">上架</a>
                            <?php endif; ?>
                            <a class="btn btn-xs btn-primary" href='<?php echo url("course/edit",array("id"=>$vo["id"])); ?>'><?php echo lang('EDIT'); ?></a>
							<a class="btn btn-xs btn-danger js-ajax-delete" href="<?php echo url('course/del',array('id'=>$vo['id'])); ?>" <?php if($vo['views'] > 0): ?>data-msg="已有<?php echo $vo['views']; ?>人学习，确定要删除么？"<?php endif; ?>><?php echo lang('DELETE'); ?></a>
						</td>
					</tr>
					<?php endforeach; endif; else: echo "" ;endif; ?>
				</tbody>
			</table>
            <div class="table-actions">
                <button class="btn btn-primary btn-sm js-ajax-submit" type="submit"><?php echo lang('SORT'); ?></button>
            </div>
			<div class="pagination"><?php echo $page; ?></div>

		</form>
	</div>
	<script src="/static/js/admin.js"></script>
</body>
</html>