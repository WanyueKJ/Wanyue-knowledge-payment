<?php /*a:2:{s:84:"/www/wwwroot/demo.sdwanyue.com/themes/admin_htcyltd/portal/admin_category/index.html";i:1609988708;s:70:"/www/wwwroot/demo.sdwanyue.com/themes/admin_htcyltd/public/header.html";i:1609814284;}*/ ?>
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
                            文章分类<span class="layui-badge-rim page-content">设置网站的数据参数及其它设置</span>
                        </div>
                    </div>
                    <div class="layui-tab layui-tab-brief">
                        <ul class="layui-tab-title layui-nav" id="tabHeader">
                            <li class="layui-this layui-nav-item"><a href="<?php echo url('AdminCategory/index'); ?>">分类管理</a></li>
                            <li class="layui-nav-item"><a href="<?php echo url('AdminCategory/add'); ?>">添加分类</a></li>
                        </ul>
                    </div>
                </div>
            </div>
        </div>
        <div class="layui-page-content">
            <div class="layui-card">
                <div class="layui-card-body">
                    <form class="well form-inline margin-top-20" method="post" action="<?php echo url('AdminCategory/index'); ?>">
                        <div class="layui-form-item layuiadmin-card-text" style="margin-bottom: 0;">
                            <div class="layui-inline">
                                <label class="layui-form-label">分类名称</label>
                                <div class="layui-inline">
                                    <div class="layui-input-inline">
                                        <input type="text" class="layui-input" name="keyword"
                                               value="<?php echo (isset($keyword) && ($keyword !== '')?$keyword:''); ?>" placeholder="请输入分类名称">
                                    </div>
                                    <div class="layui-input-inline">
                                        <input type="submit" class="layui-btn btn-primary" value="搜索"/>
                                        <a class="layui-btn layui-btn-danger" href="<?php echo url('AdminCategory/index'); ?>">清空</a>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </form>
                </div>
            </div>
        </div>
        <div class="layui-page-content js-check-wrap">
            <div class="layui-card">
                <div class="layui-card-body">
                    <form method="post" class="layui-form js-ajax-form" action="<?php echo url('AdminCategory/listOrder'); ?>">
                        <div class="layui-btn-container">
                            <button type="submit" class="layui-btn layui-btn-sm js-ajax-submit"><?php echo lang('SORT'); ?></button>
                        </div>
                        <?php if(empty($keyword) || (($keyword instanceof \think\Collection || $keyword instanceof \think\Paginator ) && $keyword->isEmpty())): ?>
                            <table class="layui-table" id="menus-table" lay-even lay-skin="nob" lay-size="lg">
                                <thead>
                                <tr>
                                    <th width="16" style="padding-left:40px;">
                                        <input lay-skin="primary" lay-filter="js-check-all" type="checkbox" class="js-check-all" data-direction="x" data-checklist="js-check-x">
                                    </th>
                                    <th width="50">排序</th>
                                    <th width="50">ID</th>
                                    <th>分类名称</th>
                                    <th>描述</th>
                                    <th>状态</th>
                                    <th width="280">操作</th>
                                </tr>
                                </thead>
                                <?php echo $category_tree; ?>
                            </table>
                            <?php else: ?>
                            <table class="layui-table" id="menus-table" lay-even lay-skin="nob" lay-size="lg">
                                <thead>
                                <tr>
                                    <th width="16">
                                            <input lay-skin="primary" type="checkbox" lay-filter="js-check-all" class="js-check-all" data-direction="x" data-checklist="js-check-x">
                                    </th>
                                    <th width="50">排序</th>
                                    <th width="50">ID</th>
                                    <th>分类名称</th>
                                    <th>描述</th>
                                    <th>状态</th>
                                    <th width="240">操作</th>
                                </tr>
                                </thead>
                                <tbody>
                                <?php if(is_array($categories) || $categories instanceof \think\Collection || $categories instanceof \think\Paginator): if( count($categories)==0 ) : echo "" ;else: foreach($categories as $key=>$vo): ?>
                                    <tr>
                                        <td >
                                            <input lay-skin="primary" type="checkbox" lay-filter="js-check-all" class="js-check-all" data-direction="x" data-checklist="js-check-x" name="ids[]" value="<?php echo $vo['id']; ?>">
                                        </td>
                                        <td>
                                            <input name="list_orders[<?php echo $vo['id']; ?>]" type="text" size="3" value="<?php echo $vo['list_order']; ?>"
                                                   class="input-order">
                                        </td>
                                        <td><?php echo $vo['id']; ?></td>
                                        <td><?php echo $vo['name']; ?>
                                        </td>
                                        <td><?php echo $vo['description']; ?></td>
                                        <td><?php echo !empty($vo['status']) ? '显示' : '隐藏'; ?></td>
                                        <td>

                                            <a class="layui-bo layui-bo-small layui-bo-checked str" href="<?php echo url('AdminCategory/edit',['id'=>$vo['id']]); ?>">编辑</a>

                                            <div class="new-divider new-divider-vertical"></div>
                                            <?php if($vo['id'] > 1): ?>
                                                <a class="layui-bo layui-bo-small layui-bo-close js-ajax-delete" href="<?php echo url('AdminCategory/delete',['id'=>$vo['id']]); ?>">删除</a>
                                            <?php endif; ?>
                                        </td>
                                    </tr>
                                <?php endforeach; endif; else: echo "" ;endif; ?>
                                </tbody>
                            </table>
                        <?php endif; ?>
                    </form>
                </div>
            </div>
        </div>
    </div>
</div>
<script src="/static/js/admin.js"></script>
<script src="/static/js/wind.js"></script>
<script type="text/javascript">
    layui.use('layer', function(){
        var layer = layui.layer;
        $(document).ready(function(){
            $('.str').on('click',function(){
                //获取id
                var id = $(this).attr('data');
                var title = $(this).attr('data-title');
                //iframe层
                layer.open({
                    type: 2,
                    title: title,
                    area: ['80%', '70%'],
                    btn: ['取消'],
                    content: 'edit/id/'+id, //iframe的url
                    end: function () {
                        location.reload();
                    }
                });
            })
        })
    });
</script>
<script>
    $(document).ready(function () {
        Wind.css('treeTable');
        Wind.use('treeTable', function () {
            $("#menus-table").treeTable({
                indent: 20,
                initialState: 'expanded'
            });
        });
    });


    // $(' #menus-table .js-check').change(function () {
    //     console.log('change');
    //     checkNode(this);
    // });
    //
    // function checkNode(obj) {
    //     var $obj   = $(obj);
    //     var $table = $obj.parents('table');
    //
    //     var id       = $obj.data('id');
    //     var parentId = $obj.data('parent_id');
    //
    //     function checkParent(id, parentId, checked) {
    //         console.log('checkParent:' + id);
    //         var $parent = $("tr [data-id='" + parentId + "']", $table);
    //         if ($parent.length > 0) {
    //             $parent.prop("checked", checked);
    //             checkParent($parent.data('id'), $parent.data('parent_id'), checked);
    //         }
    //     }
    //
    //     function checkChild(id, parentId, checked) {
    //         console.log('checkChild:' + id);
    //         var $child = $("tr [data-parent_id='" + id + "']", $table);
    //
    //         if ($child.length > 0) {
    //             $child.prop("checked", checked);
    //             checkChild($child.data('id'), $child.data('parent_id'), checked);
    //         }
    //     }
    //
    //     if ($obj.is(':checked')) {
    //         checkParent(id, parentId, true);
    //         checkChild(id, parentId, true);
    //     } else {
    //         checkParent(id, parentId, false);
    //         checkChild(id, parentId, false);
    //     }
    //     return;
    //     var chk   = $("input[type='checkbox']");
    //     var count = chk.length;
    //
    //     var num       = chk.index(obj);
    //     var level_top = level_bottom = chk.eq(num).attr('level');
    //     for (var i = num; i >= 0; i--) {
    //         var le = chk.eq(i).attr('level');
    //         if (le < level_top) {
    //             chk.eq(i).prop("checked", true);
    //             var level_top = level_top - 1;
    //         }
    //     }
    //     for (var j = num + 1; j < count; j++) {
    //         var le = chk.eq(j).attr('level');
    //         if (chk.eq(num).prop("checked")) {
    //
    //             if (le > level_bottom) {
    //                 chk.eq(j).prop("checked", true);
    //             }
    //             else if (le == level_bottom) {
    //                 break;
    //             }
    //         } else {
    //             if (le > level_bottom) {
    //                 chk.eq(j).prop("checked", false);
    //             } else if (le == level_bottom) {
    //                 break;
    //             }
    //         }
    //     }
    // }
</script>
</body>
</html>