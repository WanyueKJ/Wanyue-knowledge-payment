<?php /*a:2:{s:102:"D:\My_project\wanyue_education_web_local\education_web/themes/admin_simpleboot3/admin\users\index.html";i:1603507063;s:98:"D:\My_project\wanyue_education_web_local\education_web/themes/admin_simpleboot3/public\header.html";i:1602491837;}*/ ?>
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
	width:25px;
	height:25px;
}

#pop{
    display:none; 
}
</style>
</head>
<body>
<div class="wrap js-check-wrap">
    <ul class="nav nav-tabs">
        <li class="active"><a>列表</a></li>
        <?php if($type == 0): ?>
        <li><a href="<?php echo url('users/add'); ?>"><?php echo lang('ADD'); ?></a></li>
        <?php endif; ?>
    </ul>
    <form class="well form-inline margin-top-20" method="post" action="<?php echo url('users/index'); ?>">
        禁用：
        <select class="form-control" name="isban">
            <option value="">全部</option>
                <option value="1" <?php if(input('request.isban') != '' && input('request.isban') == 1): ?>selected<?php endif; ?>>是</option>
                <option value="0" <?php if(input('request.isban') != '' && input('request.isban') == 0): ?>selected<?php endif; ?>>否</option>
        </select>

        注册时间：
        <input class="form-control js-bootstrap-date" name="start_time" id="start_time" value="<?php echo input('request.start_time'); ?>" aria-invalid="false" style="width: 110px;"> - 
        <input class="form-control js-bootstrap-date" name="end_time" id="end_time" value="<?php echo input('request.end_time'); ?>" aria-invalid="false" style="width: 110px;">
            
        用户ID：
        <input class="form-control" type="text" name="uid" style="width: 200px;" value="<?php echo input('request.uid'); ?>"
               placeholder="请输入用户ID">
        关键字：
        <input class="form-control" type="text" name="keyword" style="width: 200px;" value="<?php echo input('request.keyword'); ?>"
               placeholder="用户名/昵称">
        <input type="hidden" name="type" value="<?php echo $type; ?>"/>
        <input type="submit" class="btn btn-primary" value="搜索"/>
        <a class="btn btn-danger" href="<?php echo url('users/index',['type'=>$type]); ?>">清空</a>
        <br>
        <br>
        用户数：<?php echo $nums; ?>  (根据条件统计)
    </form>
    <form method="post" class="js-ajax-form" action="<?php echo url('users/listOrder'); ?>">

        <table class="table table-hover table-bordered">
            <thead>
            <tr>

                <th>ID</th>
                <th>用户名</th>
                <th>昵称</th>
                <th>头像</th>
                <th>手机</th>
                <th>余额</th>
                <th>累计消费</th>
                <th>注册时间</th>
                <th><?php echo lang('STATUS'); ?></th>
                <th><?php echo lang('ACTIONS'); ?></th>
            </tr>
            </thead>
            <tbody>
            <?php 
                $user_statuses=array("0"=>lang('USER_STATUS_BLOCKED'),"1"=>lang('USER_STATUS_ACTIVATED'),"2"=>lang('USER_STATUS_UNVERIFIED'));
             if(is_array($list) || $list instanceof \think\Collection || $list instanceof \think\Paginator): if( count($list)==0 ) : echo "" ;else: foreach($list as $key=>$vo): ?>
                <tr>

                    <td><?php echo $vo['id']; ?></td>
                    <td><?php echo !empty($vo['user_login']) ? $vo['user_login'] : ($vo['mobile']?$vo['mobile']:lang('THIRD_PARTY_USER')); ?>
                    </td>
                    <td><?php echo !empty($vo['user_nickname']) ? $vo['user_nickname'] : lang('NOT_FILLED'); ?></td>
                    <td><img src="<?php echo $vo['avatar']; ?>"/></td>
                    <td><?php echo $vo['mobile']; ?></td>
                    <td><?php echo $vo['coin']; ?></td>
                    <td><?php echo $vo['consumption']; ?></td>
                    <td><?php echo date('Y-m-d H:i:s',$vo['create_time']); ?></td>
                    <td>
                        
                        <?php if($vo['user_status'] == 0): ?>
                            <span class="label label-danger"><?php echo $user_statuses[0]; ?></span>
                        <?php else: ?>
                            <span class="label label-success"><?php echo $user_statuses[1]; ?></span>
                        <?php endif; ?>
                        
                    </td>
                    <td>
                        <?php if($vo['user_status'] == 0): ?>
                            <a class="btn btn-xs btn-success js-ajax-dialog-btn"
                                   href="<?php echo url('users/cancelban',array('id'=>$vo['id'])); ?>"
                                   data-msg="<?php echo lang('ACTIVATE_USER_CONFIRM_MESSAGE'); ?>"><?php echo lang('ACTIVATE_USER'); ?></a>
                        <?php else: ?>
                            
                            <a class="btn btn-xs btn-warning js-ajax-dialog-btn"
                                   href="<?php echo url('users/ban',array('id'=>$vo['id'])); ?>"
                                   data-msg="<?php echo lang('BLOCK_USER_CONFIRM_MESSAGE'); ?>">禁用</a>
                        <?php endif; ?>
                        <input type="hidden" name="id" id="id" value="<?php echo $vo['id']; ?>" />
                        <?php if($vo['type'] == 1): ?>
                            <a class="btn btn-xs btn-warning js-ajax-dialog-btn" href="<?php echo url('users/cancelTeacher',array('id'=>$vo['id'])); ?>">取消讲师</a>
                            
                        <?php else: ?>
                            <a class="btn btn-xs btn-info js-ajax-dialog-btn" href="<?php echo url('admin/users/setSignory', ['id' => $vo['id']]); ?>">设置为讲师</a>
                        <?php endif; ?>

                        <a class="btn btn-xs btn-primary" href='<?php echo url("users/edit",array("id"=>$vo["id"])); ?>'><?php echo lang('EDIT'); ?></a>
                        <a class="btn btn-xs btn-danger js-ajax-delete" href="<?php echo url('users/del',array('id'=>$vo['id'])); ?>"><?php echo lang('DELETE'); ?></a>
                        
                    </td>
                </tr>
            <?php endforeach; endif; else: echo "" ;endif; ?>
            </tbody>
        </table>

        <div class="pagination"><?php echo $page; ?></div>
    </form>
</div>

            
<script src="/static/js/admin.js"></script>

</body>
</html>