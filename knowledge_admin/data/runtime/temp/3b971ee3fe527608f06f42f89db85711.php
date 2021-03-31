<?php /*a:2:{s:88:"/www/wwwroot/demo.sdwanyue.com/themes/admin_simpleboot3/portal/admin_category/index.html";i:1602491838;s:74:"/www/wwwroot/demo.sdwanyue.com/themes/admin_simpleboot3/public/header.html";i:1602491838;}*/ ?>
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
</head>
<body>
<div class="wrap js-check-wrap">
    <ul class="nav nav-tabs">
        <li class="active"><a href="<?php echo url('AdminCategory/index'); ?>">分类管理</a></li>
        <li><a href="<?php echo url('AdminCategory/add'); ?>">添加分类</a></li>
    </ul>
    <form class="well form-inline margin-top-20" method="post" action="<?php echo url('AdminCategory/index'); ?>">
        分类名称:
        <input type="text" class="form-control" name="keyword" style="width: 200px;"
               value="<?php echo (isset($keyword) && ($keyword !== '')?$keyword:''); ?>" placeholder="请输入分类名称">
        <input type="submit" class="btn btn-primary" value="搜索"/>
        <a class="btn btn-danger" href="<?php echo url('AdminCategory/index'); ?>">清空</a>
    </form>

    <form method="post" class="js-ajax-form" action="<?php echo url('AdminCategory/listOrder'); ?>">
        <div class="table-actions">
            <button type="submit" class="btn btn-primary btn-sm js-ajax-submit"><?php echo lang('SORT'); ?></button>
            <!-- <button class="btn btn-primary btn-sm js-ajax-submit" type="submit"
                    data-action="<?php echo url('AdminCategory/toggle',array('display'=>'1')); ?>" data-subcheck="true">
                <?php echo lang('DISPLAY'); ?>
            </button>
            <button class="btn btn-primary btn-sm js-ajax-submit" type="submit"
                    data-action="<?php echo url('AdminCategory/toggle',array('hide'=>1)); ?>" data-subcheck="true"><?php echo lang('HIDE'); ?>
            </button> -->
        </div>
        <?php if(empty($keyword) || (($keyword instanceof \think\Collection || $keyword instanceof \think\Paginator ) && $keyword->isEmpty())): ?>
            <table class="table table-hover table-bordered table-list" id="menus-table">
                <thead>
                <tr>
                    <th width="16" style="padding-left:20px;">
                        <label>
                            <input type="checkbox" class="js-check-all" data-direction="x" data-checklist="js-check-x">
                        </label>
                    </th>
                    <th width="50">排序</th>
                    <th width="50">ID</th>
                    <th>分类名称</th>
                    <th>描述</th>
                    <th>状态</th>
                    <th width="210">操作</th>
                </tr>
                </thead>
                <?php echo $category_tree; ?>
                <tfoot>
                <tr>
                    <th width="16" style="padding-left:20px;">
                        <label>
                            <input type="checkbox" class="js-check-all" data-direction="x" data-checklist="js-check-x">
                        </label>
                    </th>
                    <th width="50">排序</th>
                    <th width="50">ID</th>
                    <th>分类名称</th>
                    <th>描述</th>
                    <th>状态</th>
                    <th width="200">操作</th>
                </tr>
                </tfoot>
            </table>
            <?php else: ?>
            <table class="table table-hover table-bordered table-list">
                <thead>
                <tr>
                    <th width="16">
                        <label>
                            <input type="checkbox" class="js-check-all" data-direction="x" data-checklist="js-check-x">
                        </label>
                    </th>
                    <th width="50">排序</th>
                    <th width="50">ID</th>
                    <th>分类名称</th>
                    <th>描述</th>
                    <th>状态</th>
                    <th width="200">操作</th>
                </tr>
                </thead>
                <tbody>
                <?php if(is_array($categories) || $categories instanceof \think\Collection || $categories instanceof \think\Paginator): if( count($categories)==0 ) : echo "" ;else: foreach($categories as $key=>$vo): ?>
                    <tr>
                        <td>
                            <input type="checkbox" class="js-check" data-yid="js-check-y" data-xid="js-check-x"
                                   name="ids[]" value="<?php echo $vo['id']; ?>">
                        </td>
                        <td>
                            <input name="list_orders[<?php echo $vo['id']; ?>]" type="text" size="3" value="<?php echo $vo['list_order']; ?>"
                                   class="input-order">
                        </td>
                        <td><?php echo $vo['id']; ?></td>
                        <!-- <td><a href="{cmf_url('portal/List/index', ['id' => $vo['id']])}" target="_blank"><?php echo $vo['name']; ?></a> -->
                        <td><?php echo $vo['name']; ?>
                        </td>
                        <td><?php echo $vo['description']; ?></td>
                        <td><?php echo !empty($vo['status']) ? '显示' : '隐藏'; ?></td>
                        <td>
                            <!-- <a href="<?php echo url('AdminCategory/add', ['parent' => $vo['id']]); ?>">添加子分类</a> -->
                            <a href="<?php echo url('AdminCategory/edit',['id'=>$vo['id']]); ?>">编辑</a>
                            <?php if($vo['id'] > 1): ?>
                            <a class="js-ajax-delete" href="<?php echo url('AdminCategory/delete',['id'=>$vo['id']]); ?>">删除</a>
                            <?php endif; ?>
                            <!-- <?php if(empty($vo['status']) || (($vo['status'] instanceof \think\Collection || $vo['status'] instanceof \think\Paginator ) && $vo['status']->isEmpty())): ?>
                                <a class="js-ajax-dialog-btn" data-msg="您确定显示此分类吗"
                                   href="<?php echo url('AdminCategory/toggle',['ids'=>$vo['id'],'display'=>1]); ?>">显示</a>
                                <?php else: ?>
                                <a class="js-ajax-dialog-btn" data-msg="您确定隐藏此分类吗"
                                   href="<?php echo url('AdminCategory/toggle',['ids'=>$vo['id'],'hide'=>1]); ?>">隐藏</a>
                            <?php endif; ?> -->
                        </td>
                    </tr>
                <?php endforeach; endif; else: echo "" ;endif; ?>
                </tbody>
                <tfoot>
                <tr>
                    <th width="16">
                        <label>
                            <input type="checkbox" class="js-check-all" data-direction="x" data-checklist="js-check-x">
                        </label>
                    </th>
                    <th width="50">排序</th>
                    <th width="50">ID</th>
                    <th>分类名称</th>
                    <th>描述</th>
                    <th>状态</th>
                    <th width="200">操作</th>
                </tr>
                </tfoot>
            </table>
        <?php endif; ?>
        <div class="table-actions">
            <button type="submit" class="btn btn-primary btn-sm js-ajax-submit"><?php echo lang('SORT'); ?></button>
            <!-- <button class="btn btn-primary btn-sm js-ajax-submit" type="submit"
                    data-action="<?php echo url('AdminCategory/toggle',array('display'=>'1')); ?>" data-subcheck="true">
                <?php echo lang('DISPLAY'); ?>
            </button>
            <button class="btn btn-primary btn-sm js-ajax-submit" type="submit"
                    data-action="<?php echo url('AdminCategory/toggle',array('hide'=>1)); ?>" data-subcheck="true"><?php echo lang('HIDE'); ?>
            </button> -->
        </div>
    </form>
</div>
<script src="/static/js/admin.js"></script>
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