<?php /*a:2:{s:87:"/www/wwwroot/demo.sdwanyue.com/themes/admin_simpleboot3/portal/admin_article/index.html";i:1603263536;s:74:"/www/wwwroot/demo.sdwanyue.com/themes/admin_simpleboot3/public/header.html";i:1602491838;}*/ ?>
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
        <li class="active"><a href="javascript:;">所有文章</a></li>
        <li><a href="<?php echo url('AdminArticle/add'); ?>">添加文章</a></li>
    </ul>
    <form class="well form-inline margin-top-20" method="post" action="<?php echo url('AdminArticle/index'); ?>">
        分类:
        <select class="form-control" name="category" style="width: 140px;">
            <option value='0'>全部</option>
            <?php echo (isset($category_tree) && ($category_tree !== '')?$category_tree:''); ?>
        </select> &nbsp;&nbsp;
        时间:
        <input type="text" class="form-control js-bootstrap-datetime" name="start_time"
               value="<?php echo (isset($start_time) && ($start_time !== '')?$start_time:''); ?>"
               style="width: 140px;" autocomplete="off">-
        <input type="text" class="form-control js-bootstrap-datetime" name="end_time"
               value="<?php echo (isset($end_time) && ($end_time !== '')?$end_time:''); ?>"
               style="width: 140px;" autocomplete="off"> &nbsp; &nbsp;
        关键字:
        <input type="text" class="form-control" name="keyword" style="width: 200px;"
               value="<?php echo (isset($keyword) && ($keyword !== '')?$keyword:''); ?>" placeholder="请输入关键字...">
        <input type="submit" class="btn btn-primary" value="搜索"/>
        <a class="btn btn-danger" href="<?php echo url('AdminArticle/index'); ?>">清空</a>
    </form>
    <form class="js-ajax-form" action="" method="post">
        <div class="table-actions">
            <?php if(!(empty($category) || (($category instanceof \think\Collection || $category instanceof \think\Paginator ) && $category->isEmpty()))): ?>
                <button class="btn btn-primary btn-sm js-ajax-submit" type="submit"
                        data-action="<?php echo url('AdminArticle/listOrder'); ?>"><?php echo lang('SORT'); ?>
                </button>
            <?php endif; ?>
            <button class="btn btn-primary btn-sm js-ajax-submit" type="submit"
                    data-action="<?php echo url('AdminArticle/publish',array('yes'=>1)); ?>" data-subcheck="true">发布
            </button>
            <button class="btn btn-primary btn-sm js-ajax-submit" type="submit"
                    data-action="<?php echo url('AdminArticle/publish',array('no'=>1)); ?>" data-subcheck="true">取消发布
            </button>
            <!-- <button class="btn btn-primary btn-sm js-ajax-submit" type="submit"
                    data-action="<?php echo url('AdminArticle/top',array('yes'=>1)); ?>" data-subcheck="true">置顶
            </button>
            <button class="btn btn-primary btn-sm js-ajax-submit" type="submit"
                    data-action="<?php echo url('AdminArticle/top',array('no'=>1)); ?>" data-subcheck="true">取消置顶
            </button>
            <button class="btn btn-primary btn-sm js-ajax-submit" type="submit"
                    data-action="<?php echo url('AdminArticle/recommend',array('yes'=>1)); ?>" data-subcheck="true">推荐
            </button>
            <button class="btn btn-primary btn-sm js-ajax-submit" type="submit"
                    data-action="<?php echo url('AdminArticle/recommend',array('no'=>1)); ?>" data-subcheck="true">取消推荐
            </button> -->
            <!--
            <?php if(!(empty($category) || (($category instanceof \think\Collection || $category instanceof \think\Paginator ) && $category->isEmpty()))): ?>
                <button class="btn btn-primary btn-sm js-articles-move" type="button">批量移动</button>
            <?php endif; ?>
            <button class="btn btn-primary btn-sm js-articles-copy" type="button">批量复制</button>
            -->
            <button class="btn btn-danger btn-sm js-ajax-submit" type="submit"
                    data-action="<?php echo url('AdminArticle/delete'); ?>" data-subcheck="true" data-msg="您确定删除吗？">
                <?php echo lang('DELETE'); ?>
            </button>
        </div>
        <table class="table table-hover table-bordered table-list">
            <thead>
            <tr>
                <th width="15">
                    <label>
                        <input type="checkbox" class="js-check-all" data-direction="x" data-checklist="js-check-x">
                    </label>
                </th>
                <?php if(!(empty($category) || (($category instanceof \think\Collection || $category instanceof \think\Paginator ) && $category->isEmpty()))): ?>
                    <th width="50"><?php echo lang('SORT'); ?></th>
                <?php endif; ?>
                <th width="50">ID</th>
                <th>标题</th>
                <th>分类</th>
                <th width="50">作者</th>
                <!-- <th width="65">点击量</th>
                <th width="65">评论量</th> -->
                <th width="160">关键字/来源<br>摘要<!-- /缩略图 --></th>
                <th width="160">更新时间</th>
                <th width="160">发布时间</th>
                <th width="70">状态</th>
                <th width="95">操作</th>
            </tr>
            </thead>
            <?php if(is_array($articles) || $articles instanceof \think\Collection || $articles instanceof \think\Paginator): if( count($articles)==0 ) : echo "" ;else: foreach($articles as $key=>$vo): ?>
                <tr>
                    <td>
                        <input type="checkbox" class="js-check" data-yid="js-check-y" data-xid="js-check-x" name="ids[]"
                               value="<?php echo $vo['id']; ?>" title="ID:<?php echo $vo['id']; ?>">
                    </td>
                    <?php if(!(empty($category) || (($category instanceof \think\Collection || $category instanceof \think\Paginator ) && $category->isEmpty()))): ?>
                        <td>
                            <input name="list_orders[<?php echo $vo['post_category_id']; ?>]" class="input-order" type="text"
                                   value="<?php echo $vo['list_order']; ?>">
                        </td>
                    <?php endif; ?>
                    <td><b><?php echo $vo['id']; ?></b></td>
                    <td>
                        <?php if(!(empty($category) || (($category instanceof \think\Collection || $category instanceof \think\Paginator ) && $category->isEmpty()))): ?>
                            <?php echo $vo['post_title']; ?>
                           <!-- <a href="<?php echo cmf_url('portal/Article/index',array('id'=>$vo['id'],'cid'=>$vo['category_id'])); ?>"
                               target="_blank"><?php echo $vo['post_title']; ?></a> -->
                            <?php else: ?>
                            <?php echo $vo['post_title']; ?>
                            <!-- <a href="<?php echo cmf_url('portal/Article/index',array('id'=>$vo['id'])); ?>"
                               target="_blank"><?php echo $vo['post_title']; ?></a> -->
                        <?php endif; ?>
                    </td>
                    <td>
                        <?php if(is_array($vo['categories']) || $vo['categories'] instanceof \think\Collection || $vo['categories'] instanceof \think\Paginator): if( count($vo['categories'])==0 ) : echo "" ;else: foreach($vo['categories'] as $key=>$voo): ?>
                                <!-- <a class="label label-default" -->
                                   <!-- href="<?php echo cmf_url('portal/List/index',array('id'=>$voo['id'])); ?>" -->
                                   <!-- target="_blank" -->
                                <!-- ><?php echo $voo['name']; ?></a> -->
                                <?php echo $voo['name']; ?>
                        <?php endforeach; endif; else: echo "" ;endif; ?>
                    </td>
                    <td><?php echo $vo['user_nickname']; ?></td>
                    <!-- <td><?php echo (isset($vo['post_hits']) && ($vo['post_hits'] !== '')?$vo['post_hits']:0); ?></td> -->
                    <!-- <td>
                        <?php if(!(empty($vo['comment_count']) || (($vo['comment_count'] instanceof \think\Collection || $vo['comment_count'] instanceof \think\Paginator ) && $vo['comment_count']->isEmpty()))): ?>
                            <?php echo (isset($vo['comment_count']) && ($vo['comment_count'] !== '')?$vo['comment_count']:'0'); ?>
                                <a href="javascript:parent.openIframeDialog('<?php echo url('comment/commentadmin/index',array('post_id'=>$vo['id'])); ?>','评论列表')"><?php echo $vo['comment_count']; ?></a>
                            <?php else: ?>
                            <?php echo (isset($vo['comment_count']) && ($vo['comment_count'] !== '')?$vo['comment_count']:'0'); ?>
                        <?php endif; ?>
                    </td> -->
                    <td>
                        <?php if(!(empty($vo['post_keywords']) || (($vo['post_keywords'] instanceof \think\Collection || $vo['post_keywords'] instanceof \think\Paginator ) && $vo['post_keywords']->isEmpty()))): ?>
                            <i class="fa fa-check fa-fw"></i>
                            <?php else: ?>
                            <i class="fa fa-close fa-fw"></i>
                        <?php endif; if(!(empty($vo['post_source']) || (($vo['post_source'] instanceof \think\Collection || $vo['post_source'] instanceof \think\Paginator ) && $vo['post_source']->isEmpty()))): ?>
                            <i class="fa fa-check fa-fw"></i>
                            <?php else: ?>
                            <i class="fa fa-close fa-fw"></i>
                        <?php endif; if(!(empty($vo['post_excerpt']) || (($vo['post_excerpt'] instanceof \think\Collection || $vo['post_excerpt'] instanceof \think\Paginator ) && $vo['post_excerpt']->isEmpty()))): ?>
                            <i class="fa fa-check fa-fw"></i>
                            <?php else: ?>
                            <i class="fa fa-close fa-fw"></i>
                        <?php endif; ?>

                        <!-- <?php if(!(empty($vo['more']['thumbnail']) || (($vo['more']['thumbnail'] instanceof \think\Collection || $vo['more']['thumbnail'] instanceof \think\Paginator ) && $vo['more']['thumbnail']->isEmpty()))): ?>
                            <a href="javascript:parent.imagePreviewDialog('<?php echo cmf_get_image_preview_url($vo['more']['thumbnail']); ?>');">
                                <i class="fa fa-photo fa-fw"></i>
                            </a>
                            <?php else: ?>
                            <i class="fa fa-close fa-fw"></i>
                        <?php endif; ?> -->
                    </td>
                    <td>
                        <?php if(!(empty($vo['update_time']) || (($vo['update_time'] instanceof \think\Collection || $vo['update_time'] instanceof \think\Paginator ) && $vo['update_time']->isEmpty()))): ?>
                            <?php echo date('Y-m-d H:i',$vo['update_time']); ?>
                        <?php endif; ?>

                    </td>
                    <td>
                        <?php if(empty($vo['published_time']) || (($vo['published_time'] instanceof \think\Collection || $vo['published_time'] instanceof \think\Paginator ) && $vo['published_time']->isEmpty())): ?>
                            未发布
                            <?php else: ?>
                            <?php echo date('Y-m-d H:i',$vo['published_time']); ?>
                        <?php endif; ?>

                    </td>
                    <td>
                        <?php if(!(empty($vo['post_status']) || (($vo['post_status'] instanceof \think\Collection || $vo['post_status'] instanceof \think\Paginator ) && $vo['post_status']->isEmpty()))): ?>
                            <a data-toggle="tooltip" title="已发布"><i class="fa fa-check"></i></a>
                            <?php else: ?>
                            <a data-toggle="tooltip" title="未发布"><i class="fa fa-close"></i></a>
                        <?php endif; ?>
                        <!-- <?php if(!(empty($vo['is_top']) || (($vo['is_top'] instanceof \think\Collection || $vo['is_top'] instanceof \think\Paginator ) && $vo['is_top']->isEmpty()))): ?>
                            <a data-toggle="tooltip" title="已置顶"><i class="fa fa-arrow-up"></i></a>
                            <?php else: ?>
                            <a data-toggle="tooltip" title="未置顶"><i class="fa fa-arrow-down"></i></a>
                        <?php endif; if(!(empty($vo['recommended']) || (($vo['recommended'] instanceof \think\Collection || $vo['recommended'] instanceof \think\Paginator ) && $vo['recommended']->isEmpty()))): ?>
                            <a data-toggle="tooltip" title="已推荐"><i class="fa fa-thumbs-up"></i></a>
                            <?php else: ?>
                            <a data-toggle="tooltip" title="未推荐"><i class="fa fa-thumbs-down"></i></a>
                        <?php endif; ?> -->
                    </td>
                    <td>
                        <a class="btn btn-xs btn-primary" href="<?php echo url('AdminArticle/edit',array('id'=>$vo['id'])); ?>"><?php echo lang('EDIT'); ?></a>
                        <a class="btn btn-xs btn-danger js-ajax-delete"
                           href="<?php echo url('AdminArticle/delete',array('id'=>$vo['id'])); ?>"><?php echo lang('DELETE'); ?></a>
                    </td>
                </tr>
            <?php endforeach; endif; else: echo "" ;endif; ?>

        </table>

        <ul class="pagination"><?php echo (isset($page) && ($page !== '')?$page:''); ?></ul>
    </form>
</div>
<script src="/static/js/admin.js"></script>
<script>

    function reloadPage(win) {
        win.location.reload();
    }

    $(function () {
        setCookie("refersh_time", 0);
        Wind.use('ajaxForm', 'artDialog', 'iframeTools', function () {
            //批量复制
            $('.js-articles-copy').click(function (e) {
                var ids = [];
                $("input[name='ids[]']").each(function () {
                    if ($(this).is(':checked')) {
                        ids.push($(this).val());
                    }
                });

                if (ids.length == 0) {
                    art.dialog.through({
                        id: 'error',
                        icon: 'error',
                        content: '您没有勾选信息，无法进行操作！',
                        cancelVal: '关闭',
                        cancel: true
                    });
                    return false;
                }

                ids = ids.join(',');
                art.dialog.open("/index.php?g=portal&m=AdminArticle&a=copy&ids=" + ids, {
                    title: "批量复制",
                    width: "300px"
                });
            });
            //批量移动
            $('.js-articles-move').click(function (e) {
                var ids = [];
                $("input[name='ids[]']").each(function () {
                    if ($(this).is(':checked')) {
                        ids.push($(this).val());
                    }
                });

                if (ids.length == 0) {
                    art.dialog.through({
                        id: 'error',
                        icon: 'error',
                        content: '您没有勾选信息，无法进行操作！',
                        cancelVal: '关闭',
                        cancel: true
                    });
                    return false;
                }

                ids = ids.join(',');
                art.dialog.open("/index.php?g=portal&m=AdminArticle&a=move&old_term_id=<?php echo (isset($term['term_id']) && ($term['term_id'] !== '')?$term['term_id']:0); ?>&ids=" + ids, {
                    title: "批量移动",
                    width: "300px"
                });
            });
        });
    });
</script>
</body>
</html>