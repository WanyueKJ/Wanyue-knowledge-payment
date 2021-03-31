<?php /*a:2:{s:92:"D:\My_project\Wanyue-knowledge-payment-admin/themes/admin_htcyltd/admin\knowledge\index.html";i:1614679645;s:84:"D:\My_project\Wanyue-knowledge-payment-admin/themes/admin_htcyltd/public\header.html";i:1609814284;}*/ ?>
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

<style>
    .table img{
        width:50px;
    }
    .layui-table[lay-size=lg] td, .layui-table[lay-size=lg] th{
        padding: 10px 10px;
    }
</style>
</head>
<body>
<div class="layui-fluid">
    <div class="layui-row">

        <div class="layui-page-header">
            <div class="layui-card">
                <div class="layui-page-header-content">
                    <div class="layui-card-body">
                        <div class="layui-ui-page-header-title" >
                            <?php if(input('sort') == 0 && input('is_hot') != 1): ?>
                                精选内容<span class="layui-badge-rim page-content">精选内容信息</span>
                                <?php elseif(input('sort') == 2): ?>
                                语音大班课<span class="layui-badge-rim page-content">语音大班课</span>
                                <?php elseif(input('sort') == 3): ?>
                                视频大班课<span class="layui-badge-rim page-content">视频大班课</span>
                            <?php endif; if(input('is_hot') == 1): ?>
                                热门精选列表<span class="layui-badge-rim page-content">热门精选列表</span>
                            <?php endif; ?>

                        </div>
                    </div>
                    <div class="layui-tab layui-tab-brief">
                        <ul class="layui-tab-title layui-nav" id="tabHeader">
                            <?php if(isset($is_hot) && $is_hot == 1): ?>
                                <li class="layui-this layui-nav-item"><a href="<?php echo url('knowledge/index',['sort'=>$sort, 'is_hot' => $is_hot]); ?>">列表</a></li>
                                <?php else: ?>
                                    <li class="layui-this layui-nav-item"><a href="<?php echo url('knowledge/index',['sort'=>$sort]); ?>">列表</a></li>
                            <?php endif; if(input('is_hot') != 1): ?>
                                <li class="layui-nav-item"><a href="<?php echo url('knowledge/add',['sort'=>$sort]); ?>"><?php echo lang('ADD'); ?></a></li>
                            <?php endif; ?>

                        </ul>
                    </div>
                </div>
            </div>
        </div>

        <?php if(!isset($is_hot) || (isset($is_hot) && $is_hot != 1)): ?>
            <div class="layui-page-content">
                <div class="layui-card">
                    <div class="layui-card-body">
                        <form class="layui-form" method="post" action="<?php echo url('knowledge/index',['sort'=>$sort]); ?>">
                            <div class="layui-form-item layuiadmin-card-text" style="margin-bottom: 0;">
                                <div class="layui-inline">
                                    <label class="layui-form-label">上架状态</label>
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
                                    <label class="layui-form-label">年级</label>
                                    <div class="layui-input-inline">
                                        <select class="form-control" name="gradeid">
                                            <option value="">全部</option>
                                            <?php if(is_array($grade) || $grade instanceof \think\Collection || $grade instanceof \think\Paginator): $i = 0; $__LIST__ = $grade;if( count($__LIST__)==0 ) : echo "" ;else: foreach($__LIST__ as $key=>$v): $mod = ($i % 2 );++$i;?>
                                                <option value="<?php echo $v['id']; ?>" <?php if(input('request.gradeid') != '' && input('request.gradeid') == $v['id']): ?>selected<?php endif; ?>><?php echo $v['name']; ?></option>
                                            <?php endforeach; endif; else: echo "" ;endif; ?>
                                        </select>
                                    </div>
                                </div>
                                <div class="layui-inline">
                                    <label class="layui-form-label">获取方式</label>
                                    <div class="layui-input-inline">
                                        <select class="form-control" name="paytype">
                                            <option value="">全部</option>
                                            <?php if(is_array($paytypes) || $paytypes instanceof \think\Collection || $paytypes instanceof \think\Paginator): $i = 0; $__LIST__ = $paytypes;if( count($__LIST__)==0 ) : echo "" ;else: foreach($__LIST__ as $key=>$v): $mod = ($i % 2 );++$i;?>
                                                <option value="<?php echo $key; ?>" <?php if(input('request.paytype') != '' && input('request.paytype') == $key): ?>selected<?php endif; ?>><?php echo $v; ?></option>
                                            <?php endforeach; endif; else: echo "" ;endif; ?>
                                        </select>
                                    </div>
                                </div>
                                <?php if($sort != 1 && $sort != 3): ?>
                                    <div class="layui-inline">
                                        <label class="layui-form-label">内容形式</label>
                                        <div class="layui-input-inline">
                                            <select class="form-control" name="type">
                                                <option value="">全部</option>
                                                <?php if(is_array($types) || $types instanceof \think\Collection || $types instanceof \think\Paginator): $i = 0; $__LIST__ = $types;if( count($__LIST__)==0 ) : echo "" ;else: foreach($__LIST__ as $key=>$v): $mod = ($i % 2 );++$i;?>
                                                    <option value="<?php echo $key; ?>" <?php if(input('request.type') != '' && input('request.type') == $key): ?>selected<?php endif; ?>><?php echo $v; ?></option>
                                                <?php endforeach; endif; else: echo "" ;endif; ?>
                                            </select>
                                        </div>
                                    </div>
                                <?php endif; ?>
                                <div class="layui-inline">
                                    <label class="layui-form-label">发布时间</label>
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
                                        <?php if(isset($is_hot) && $is_hot == 1): ?>
                                            <a class="layui-btn layui-btn-danger btn-danger" href="<?php echo url('knowledge/index',['sort'=>$sort, 'is_hot' => $is_hot]); ?>">清空</a>
                                            <?php else: ?>
                                                <a class="layui-btn layui-btn-danger btn-danger" href="<?php echo url('knowledge/index',['sort'=>$sort]); ?>">清空</a>
                                        <?php endif; ?>
                                    </div>
                                </div>
                            </div>
                        </form>
                    </div>
                </div>
            </div>

        <?php endif; ?>


        <div class="layui-page-content">
            <div class="layui-card">
                <form method="post" class="layui-card-body js-ajax-form" action="<?php echo url('knowledge/listOrder'); ?>">
                    <button class="layui-btn js-ajax-submit" type="submit"><?php echo lang('SORT'); ?></button>
                    <table class="layui-table treeTable" id="menus-table" lay-even lay-skin="nob" lay-size="lg">
                        <thead>
                        <tr>

                            <th><?php echo lang('SORT'); ?></th>
                            <th>ID</th>
                            <th>讲师</th>
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
                                    <input name="list_orders[<?php echo $vo['id']; ?>]" class="layui-input" type="text" value="<?php echo $vo['list_order']; ?>">
                                </td>
                                <td><?php echo $vo['id']; ?></td>
                                <td><?php echo $vo['userinfo']['user_nickname']; ?> (<?php echo $vo['userinfo']['id']; ?>)</td>
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
                                        <a class="layui-bo layui-bo-small layui-bo-succes js-ajax-dialog-btn" href='<?php echo url("lesson/index",array("knowledgeid"=>$vo["id"])); ?>'>课时管理</a>
                                        <div class="new-divider new-divider-vertical"></div>
                                    <?php endif; ?>

                                    <a class="layui-bo layui-bo-small layui-bo-succes" href='<?php echo url("knowledgebuy/index",array("knowledgeid"=>$vo["id"])); ?>'>购买详情</a>
                                    <div class="new-divider new-divider-vertical"></div>

                                    <?php if($vo['status'] > 0): ?>
                                        <a class="layui-bo layui-bo-small layui-bo-waring js-ajax-dialog-btn" href="<?php echo url("knowledge/setstatus",array("id"=>$vo["id"],"status"=>"-2")); ?>">下架</a>
                                        <?php else: ?>
                                        <a class="layui-bo layui-bo-small layui-bo-succes js-ajax-dialog-btn" href="<?php echo url("knowledge/setstatus",array("id"=>$vo["id"],'status'=>'1')); ?>">上架</a>
                                    <?php endif; if($vo['is_hot'] == 0): ?>
                                        <a class="layui-bo layui-bo-small layui-bo-succes js-ajax-dialog-btn" href="<?php echo url('knowledge/setHot', ['id' => $vo['id'],'is_hot' => 1]); ?>">设置为热门</a>
                                        <?php else: ?>
                                        <a class="layui-bo layui-bo-small layui-bo-waring js-ajax-dialog-btn" href="<?php echo url('knowledge/setHot', ['id' => $vo['id'], 'is_hot' => 0]); ?>">取消热门</a>

                                    <?php endif; ?>

                                    <div class="new-divider new-divider-vertical"></div>

                                    <a class="layui-bo layui-bo-small layui-bo-checked" href="<?php echo url("knowledge/edit",array("id"=>$vo["id"], "is_hot" => $is_hot)); ?>"><?php echo lang('EDIT'); ?></a>
                                    <div class="new-divider new-divider-vertical"></div>
                                    <a class="layui-bo layui-bo-small layui-bo-close js-ajax-delete" href="<?php echo url('knowledge/del',array('id'=>$vo['id'])); ?>" <?php if($vo['views'] > 0): ?>data-msg="已有<?php echo $vo['views']; ?>人学习，确定要删除么？"<?php endif; ?>><?php echo lang('DELETE'); ?></a>
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

</div>
<script src="/static/js/admin.js"></script>
</body>
</html>