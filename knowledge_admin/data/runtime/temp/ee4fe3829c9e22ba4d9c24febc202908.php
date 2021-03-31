<?php /*a:2:{s:97:"D:\My_project\Wanyue-knowledge-payment-admin/themes/admin_htcyltd/portal\admin_article\index.html";i:1610347150;s:84:"D:\My_project\Wanyue-knowledge-payment-admin/themes/admin_htcyltd/public\header.html";i:1609814284;}*/ ?>
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
    .layui-table[lay-size="lg"] td, .layui-table[lay-size="lg"] th {
        padding: 15px 15px;
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
                            文章管理<span class="layui-badge-rim page-content">设置网站的数据参数及其它设置</span>
                        </div>
                    </div>
                    <div class="layui-tab layui-tab-brief">
                        <ul class="layui-tab-title layui-nav" id="tabHeader">
                            <li class="layui-this layui-nav-item"><a href="javascript:;">所有文章</a></li>
                            <li class="layui-nav-item"><a href="<?php echo url('AdminArticle/add'); ?>">添加文章</a></li>
                        </ul>
                    </div>
                </div>
            </div>
        </div>
        <div class="layui-page-content">
            <div class="layui-card">
                <div class="layui-card-body">
                    <form class="layui-form js-ajax-form" method="post" action="<?php echo url('AdminArticle/index'); ?>">
                        <div class="layui-form-item layuiadmin-card-text" style="margin-bottom: 0;">
                            <div class="layui-inline">
                                <label class="layui-form-label">分类</label>
                                <div class="layui-input-inline">
                                    <select class="form-control layui-input" name="category">
                                        <option value='0'>全部</option>
                                        <?php echo (isset($category_tree) && ($category_tree !== '')?$category_tree:''); ?>
                                    </select>
                                </div>
                            </div>
                            <div class="layui-inline">
                                <label class="layui-form-label">时间</label>
                                <div class="layui-input-inline">
                                    <input type="text" class="layui-input js-bootstrap-date" name="start_time"
                                           value="<?php echo (isset($start_time) && ($start_time !== '')?$start_time:''); ?>"
                                           autocomplete="off" placeholder="开始日期">
                                </div>
                                <div class="layui-form-mid">-</div>
                                <div class="layui-input-inline">
                                    <input type="text" class="layui-input js-bootstrap-date" name="end_time"
                                           value="<?php echo (isset($end_time) && ($end_time !== '')?$end_time:''); ?>"
                                           autocomplete="off" placeholder="结束日期">
                                </div>
                            </div>
                            <div class="layui-inline">
                                <label class="layui-form-label">关键字</label>
                                <div class="layui-input-inline">
                                    <input type="text" class="layui-input" name="keyword"
                                           value="<?php echo (isset($keyword) && ($keyword !== '')?$keyword:''); ?>" placeholder="请输入关键字...">
                                </div>
                            </div>
                            <div class="layui-inline">
                                <div class="layui-input-inline">
                                    <input type="submit" class="layui-btn btn-primary" value="搜索"/>
                                    <a class="layui-btn layui-btn-danger btn-danger" href="<?php echo url('AdminArticle/index'); ?>">清空</a>
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
                    <form class="layui-form js-ajax-form" action="" method="post">
                        <div class="layui-btn-container">
                            <?php if(!(empty($category) || (($category instanceof \think\Collection || $category instanceof \think\Paginator ) && $category->isEmpty()))): ?>
                                <button class="layui-btn layui-btn-sm js-ajax-submit" type="submit"
                                        data-action="<?php echo url('AdminArticle/listOrder'); ?>"><?php echo lang('SORT'); ?>
                                </button>
                            <?php endif; ?>
                            <button class="layui-btn layui-btn-sm js-ajax-submit" type="submit"
                                    data-action="<?php echo url('AdminArticle/publish',array('yes'=>1)); ?>" data-subcheck="true">发布
                            </button>
                            <button class="layui-btn layui-btn-sm js-ajax-submit" type="submit"
                                    data-action="<?php echo url('AdminArticle/publish',array('no'=>1)); ?>" data-subcheck="true">取消发布
                            </button>

                            <button class="layui-btn layui-btn-sm layui-btn-danger js-ajax-submit" type="submit"
                                    data-action="<?php echo url('AdminArticle/delete'); ?>" data-subcheck="true" data-msg="您确定删除吗？">
                                <?php echo lang('DELETE'); ?>
                            </button>
                        </div>
                        <table class="layui-table" lay-even lay-skin="nob" lay-size="lg">
                            <thead>
                            <tr>
                                <th width="16">
                                    <input lay-skin="primary" lay-filter="js-check-all" type="checkbox" class="js-check-all" data-direction="x" data-checklist="js-check-x">
                                </th>
                                <?php if(!(empty($category) || (($category instanceof \think\Collection || $category instanceof \think\Paginator ) && $category->isEmpty()))): ?>
                                    <th width="50"><?php echo lang('SORT'); ?></th>
                                <?php endif; ?>
                                <th width="50">ID</th>
                                <th>标题</th>
                                <th>分类</th>
                                <th width="40">作者</th>
                                <th width="45">点击量</th>
                                <th width="45">评论量</th>
                                <th width="90">关键字/来源<br>摘要/缩略图</th>
                                <th width="120">更新时间</th>
                                <th width="120">发布时间</th>
                                <th width="70">状态</th>
                                <th width="112">操作</th>
                            </tr>
                            </thead>
                            <?php if(is_array($articles) || $articles instanceof \think\Collection || $articles instanceof \think\Paginator): if( count($articles)==0 ) : echo "" ;else: foreach($articles as $key=>$vo): ?>
                                <tr>
                                    <td>
                                        <input lay-skin="primary" type="checkbox" lay-filter="js-check" class="js-check" data-yid="js-check-y" data-xid="js-check-x" name="ids[]"
                                               value="<?php echo $vo['id']; ?>" >
                                    </td>
                                    <?php if(!(empty($category) || (($category instanceof \think\Collection || $category instanceof \think\Paginator ) && $category->isEmpty()))): ?>
                                        <td>
                                            <input name="list_orders[<?php echo $vo['post_category_id']; ?>]" class="input-order" type="text"
                                                   value="<?php echo $vo['list_order']; ?>"  lay-skin="primary">
                                        </td>
                                    <?php endif; ?>
                                    <td><b><?php echo $vo['id']; ?></b></td>
                                    <td>
                                        <?php echo $vo['post_title']; ?>
                                    </td>
                                    <td>
                                        <?php if(is_array($vo['categories']) || $vo['categories'] instanceof \think\Collection || $vo['categories'] instanceof \think\Paginator): if( count($vo['categories'])==0 ) : echo "" ;else: foreach($vo['categories'] as $key=>$voo): ?>
                                            <?php echo $voo['name']; ?>
                                        <?php endforeach; endif; else: echo "" ;endif; ?>
                                    </td>
                                    <td><?php echo $vo['user_nickname']; ?></td>
                                    <td><?php echo (isset($vo['post_hits']) && ($vo['post_hits'] !== '')?$vo['post_hits']:0); ?></td>
                                    <td>
                                        <?php if(!(empty($vo['comment_count']) || (($vo['comment_count'] instanceof \think\Collection || $vo['comment_count'] instanceof \think\Paginator ) && $vo['comment_count']->isEmpty()))): ?>
                                            <?php echo (isset($vo['comment_count']) && ($vo['comment_count'] !== '')?$vo['comment_count']:'0'); ?>
                                            <!--<a href="javascript:parent.openIframeDialog('<?php echo url('comment/commentadmin/index',array('post_id'=>$vo['id'])); ?>','评论列表')"><?php echo $vo['comment_count']; ?></a>-->
                                            <?php else: ?>
                                            <?php echo (isset($vo['comment_count']) && ($vo['comment_count'] !== '')?$vo['comment_count']:'0'); ?>
                                        <?php endif; ?>
                                    </td>
                                    <td>
                                        <?php if(!(empty($vo['post_keywords']) || (($vo['post_keywords'] instanceof \think\Collection || $vo['post_keywords'] instanceof \think\Paginator ) && $vo['post_keywords']->isEmpty()))): ?>
                                            <a><i class="icon-icon layui-icon-md-checkmark"></i></a>
                                            <?php else: ?>
                                            <a><i class="icon-icon layui-icon-md-close"></i></a>
                                        <?php endif; if(!(empty($vo['post_source']) || (($vo['post_source'] instanceof \think\Collection || $vo['post_source'] instanceof \think\Paginator ) && $vo['post_source']->isEmpty()))): ?>
                                            <a><i class="icon-icon layui-icon-md-checkmark"></i></a>
                                            <?php else: ?>
                                            <a><i class="icon-icon layui-icon-md-close"></i></a>
                                        <?php endif; if(!(empty($vo['post_excerpt']) || (($vo['post_excerpt'] instanceof \think\Collection || $vo['post_excerpt'] instanceof \think\Paginator ) && $vo['post_excerpt']->isEmpty()))): ?>
                                            <a><i class="icon-icon layui-icon-md-checkmark"></i></a>
                                            <?php else: ?>
                                            <a><i class="icon-icon layui-icon-md-close"></i></a>
                                        <?php endif; if(!(empty($vo['more']['thumbnail']) || (($vo['more']['thumbnail'] instanceof \think\Collection || $vo['more']['thumbnail'] instanceof \think\Paginator ) && $vo['more']['thumbnail']->isEmpty()))): ?>
                                            <a href="javascript:admin.imagePreviewDialog('<?php echo cmf_get_image_preview_url($vo['more']['thumbnail']); ?>');">
                                                <i class="icon-icon layui-icon-md-images"></i>
                                            </a>
                                            <?php else: ?>
                                            <a><i class="icon-icon layui-icon-md-close"></i></a>
                                        <?php endif; ?>
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
                                            <a data-toggle="tooltip" title="已发布"><i class="icon-icon layui-icon-md-checkmark"></i></a>
                                            <?php else: ?>
                                            <a data-toggle="tooltip" title="未发布"><i class="icon-icon layui-icon-md-close"></i></a>
                                        <?php endif; ?>
                                    </td>
                                    <td>
                                        <a class="layui-bo layui-bo-small layui-bo-checked" href="<?php echo url('AdminArticle/edit',array('id'=>$vo['id'])); ?>"><?php echo lang('EDIT'); ?></a>
                                        <div class="new-divider new-divider-vertical"></div>
                                        <a class="layui-bo layui-bo-small layui-bo-close js-ajax-delete"
                                           href="<?php echo url('AdminArticle/delete',array('id'=>$vo['id'])); ?>"><?php echo lang('DELETE'); ?></a>
                                    </td>
                                </tr>
                            <?php endforeach; endif; else: echo "" ;endif; ?>
                        </table>
                    </form>
                    <div class="pagination"><?php echo $page; ?></div>
                </div>
            </div>
        </div>
    </div>
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