<?php /*a:2:{s:88:"D:\My_project\Wanyue-knowledge-payment-admin/themes/admin_htcyltd/admin\users\index.html";i:1610347123;s:84:"D:\My_project\Wanyue-knowledge-payment-admin/themes/admin_htcyltd/public\header.html";i:1609814284;}*/ ?>
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
                            <?php if($type == 0): ?>
                                用户列表<span class="layui-badge-rim page-content">网站注册用户管理</span>
                            <?php else: ?>
                                教师列表<span class="layui-badge-rim page-content">网站教师</span>
                            <?php endif; ?>
                        </div>
                    </div>
                    <div class="layui-tab layui-tab-brief">
                        <ul class="layui-tab-title layui-nav" id="tabHeader">
                            <li class="layui-this layui-nav-item"><a href="<?php echo url('users/index',['type'=>$type]); ?>">列表</a></li>
                            <?php if($type == 0): ?>
                            <li class="layui-nav-item"><a href="javascript:admin.openIframeLayer('<?php echo url('users/add',['type'=>$type]); ?>','用户添加',{btn: ['保存','关闭'],area:['80%','80%'],end:function(){}});"><?php echo lang('ADD'); ?></a></li>
                            <?php endif; ?>
                        </ul>
                    </div>
                </div>
            </div>
        </div>

        <div class="layui-page-content">
            <div class="layui-card">
                <div class="layui-card-body">
                    <form class="layui-form" method="get" action="<?php echo url('users/index'); ?>">
                        <div class="layui-form-item layuiadmin-card-text" style="margin-bottom: 0;">
                            <div class="layui-inline">
                                <label class="layui-form-label">禁用</label>
                                <div class="layui-input-inline">
                                    <select class="layui-input" name="isban">
                                        <option value="">全部</option>
                                        <option value="1" <?php if(input('request.isban') != '' && input('request.isban') == 1): ?>selected<?php endif; ?>>是</option>
                                        <option value="0" <?php if(input('request.isban') != '' && input('request.isban') == 0): ?>selected<?php endif; ?>>否</option>
                                    </select>
                                </div>
                            </div>
                            <div class="layui-inline">
                                <label class="layui-form-label">注册时间</label>
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
                                    <a class="layui-btn layui-btn-danger btn-danger" href="<?php echo url('users/index',['type'=>$type]); ?>">清空</a>
                                </div>
                            </div>
                            用户数：<?php echo $nums; ?>  (根据条件统计)
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
                        <?php $user_statuses=array("0"=>lang('USER_STATUS_BLOCKED'),"1"=>lang('USER_STATUS_ACTIVATED'),"2"=>lang('USER_STATUS_UNVERIFIED')); if(is_array($list) || $list instanceof \think\Collection || $list instanceof \think\Paginator): if( count($list)==0 ) : echo "" ;else: foreach($list as $key=>$vo): ?>
                            <tr>

                                <td><?php echo $vo['id']; ?></td>
                                <td><?php echo !empty($vo['user_login']) ? $vo['user_login'] : ($vo['mobile']?$vo['mobile']:lang('THIRD_PARTY_USER')); ?>
                                </td>
                                <td><?php echo !empty($vo['user_nickname']) ? $vo['user_nickname'] :  '暂无'; ?></td>
                                <td><img src="<?php echo $vo['avatar']; ?>"/></td>
                                <td><?php echo $vo['mobile']; ?></td>
                                <td><?php echo $vo['coin']; ?></td>
                                <td><?php echo $vo['consumption']; ?></td>
                                <td><?php echo date('Y-m-d H:i:s',$vo['create_time']); ?></td>
                                <td>
                                    <?php switch($vo['user_status']): case "0": ?>
                                            <span class="layui-badge-dot layui-bg-abnormal" style="margin-right: 6px;"></span><?php echo $user_statuses[$vo['user_status']]; break; case "1": ?>
                                            <span class="layui-badge-dot layui-bg-function" style="margin-right: 6px;"></span><?php echo $user_statuses[$vo['user_status']]; break; ?>
                                    <?php endswitch; ?>
                                </td>
                                <td>
                                    <?php if(($vo['id'] != 27) && ($vo['id'] != 1)): if($vo['user_status'] == 1): ?>
                                            <a class="layui-bo layui-bo-small layui-bo-waring js-ajax-dialog-btn" href="<?php echo url('users/ban',array('id'=>$vo['id'])); ?>" data-msg="<?php echo lang('BLOCK_USER_CONFIRM_MESSAGE'); ?>"><?php echo lang('BLOCK_USER'); ?></a>
                                        <?php else: ?>
                                            <a class="layui-bo layui-bo-small layui-bo-succes js-ajax-dialog-btn" href="<?php echo url('users/cancelban',array('id'=>$vo['id'])); ?>" data-msg="<?php echo lang('ACTIVATE_USER_CONFIRM_MESSAGE'); ?>"><?php echo lang('ACTIVATE_USER'); ?></a>
                                        <?php endif; ?>
                                        <input type="hidden" name="id" id="id" value="<?php echo $vo['id']; ?>" />
                                        <div class="new-divider new-divider-vertical"></div>
                                        <?php if($vo['type'] == 1): ?>
                                            <a class="layui-bo layui-bo-small layui-bo-waring js-ajax-dialog-btn" href="<?php echo url('users/cancelTeacher',array('id'=>$vo['id'])); ?>" data-msg="确定取消讲师?">取消讲师</a>
                                        <?php else: ?>
                                            <a class="layui-bo layui-bo-small layui-bo-succes js-ajax-dialog-btn" href="<?php echo url('admin/users/setSignory', ['id' => $vo['id']]); ?>" data-msg="确定设置讲师?">设置为讲师</a>
                                        <?php endif; ?>

                                        <div class="new-divider new-divider-vertical"></div>
                                        <a class="layui-bo layui-bo-small layui-bo-checked" href="javascript:admin.openIframeLayer('<?php echo url("users/edit",array("id"=>$vo["id"])); ?>','编辑',{btn: ['保存','关闭'],area:['80%','80%'],end:function(){location.reload();}});"><?php echo lang('EDIT'); ?></a>
                                        <div class="new-divider new-divider-vertical"></div>
                                        <a class="layui-bo layui-bo-small layui-bo-close js-ajax-delete" href="<?php echo url('users/del',array('id'=>$vo['id'])); ?>"><?php echo lang('DELETE'); ?></a>
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