<?php /*a:2:{s:86:"/www/wwwroot/demo.sdwanyue.com/themes/admin_simpleboot3/portal/admin_category/add.html";i:1602491838;s:74:"/www/wwwroot/demo.sdwanyue.com/themes/admin_simpleboot3/public/header.html";i:1602491838;}*/ ?>
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
        <li><a href="<?php echo url('AdminCategory/index'); ?>">分类管理</a></li>
        <li class="active"><a href="<?php echo url('AdminCategory/add'); ?>">添加分类</a></li>
    </ul>
    <div class="row margin-top-20">
        <div class="col-md-2">
            <div class="list-group">
                <a class="list-group-item" href="#A" data-toggle="tab">基本属性</a>
                <!-- <a class="list-group-item" href="#B" data-toggle="tab">SEO设置</a>
                <a class="list-group-item" href="#C" data-toggle="tab">模板设置</a> -->
            </div>
        </div>
        <div class="col-md-6">
            <form class="js-ajax-form" action="<?php echo url('AdminCategory/addPost'); ?>" method="post">
                <div class="tab-content">
                    <div class="tab-pane active" id="A">
                        <div class="form-group">
                            <label for="input-parent"><span class="form-required">*</span>上级</label>
                            <div>
                                <select class="form-control" name="parent_id" id="input-parent">
                                    <option value="0">作为一级分类</option>
                                    <!-- <?php echo $categories_tree; ?> -->
                                </select>
                            </div>
                        </div>
                        <div class="form-group">
                            <label for="input-name"><span class="form-required">*</span>分类名称</label>
                            <div>
                                <input type="text" class="form-control" id="input-name" name="name">
                            </div>
                        </div>

                        <div class="form-group">
                            <label for="input-name">分类别名</label>
                            <div>
                                <input type="text" class="form-control" id="input-alias" name="alias">
                            </div>
                        </div>

                        <div class="form-group">
                            <label for="input-description">描述</label>
                            <div>
                                <textarea class="form-control" name="description" id="input-description"></textarea>
                            </div>
                        </div>
                        <div class="form-group">
                            <label for="input-description">缩略图</label>
                            <div>
                                <input type="hidden" name="more[thumbnail]" class="form-control"
                                       id="js-thumbnail-input">
                                <div>
                                    <a href="javascript:uploadOneImage('图片上传','#js-thumbnail-input');">
                                        <img src="/themes/admin_simpleboot3/public/assets/images/default-thumbnail.png"
                                             id="js-thumbnail-input-preview"
                                             width="135" style="cursor: pointer"/>
                                    </a>
                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="tab-pane" id="B">
                        <div class="form-group">
                            <label for="input-seo_title">SEO标题</label>
                            <div>
                                <input type="text" class="form-control" id="input-seo_title" name="seo_title">
                            </div>
                        </div>
                        <div class="form-group">
                            <label for="input-seo_keywords">SEO关键字</label>
                            <div>
                                <input type="text" class="form-control" id="input-seo_keywords" name="seo_keywords">
                            </div>
                        </div>
                        <div class="form-group">
                            <label for="input-seo_description">SEO描述</label>
                            <div>
                                <textarea class="form-control" name="seo_description"
                                          id="input-seo_description"></textarea>
                            </div>
                        </div>
                    </div>
                    <div class="tab-pane" id="C">
                        <div class="form-group">
                            <label for="input-list_tpl"><span class="form-required">*</span>列表模板</label>
                            <div>
                                <select class="form-control" name="list_tpl" id="input-list_tpl">
                                    <!--<option value="list">portal/list.html(默认)</option>-->
                                    <?php if(is_array($list_theme_files) || $list_theme_files instanceof \think\Collection || $list_theme_files instanceof \think\Paginator): if( count($list_theme_files)==0 ) : echo "" ;else: foreach($list_theme_files as $key=>$vo): $value=preg_replace('/^portal\//','',$vo['file']); ?>
                                        <option value="<?php echo $value; ?>"><?php echo $vo['name']; ?> <?php echo $vo['file']; ?>.html</option>
                                    <?php endforeach; endif; else: echo "" ;endif; ?>
                                </select>
                            </div>
                        </div>
                        <div class="form-group">
                            <label for="input-one_tpl"><span class="form-required">*</span>文章模板</label>
                            <div>
                                <select class="form-control" name="one_tpl" id="input-one_tpl">
                                    <!--<option value="article">portal/article.html(默认)</option>-->
                                    <?php if(is_array($article_theme_files) || $article_theme_files instanceof \think\Collection || $article_theme_files instanceof \think\Paginator): if( count($article_theme_files)==0 ) : echo "" ;else: foreach($article_theme_files as $key=>$vo): $value=preg_replace('/^portal\//','',$vo['file']); ?>
                                        <option value="<?php echo $value; ?>"><?php echo $vo['name']; ?> <?php echo $vo['file']; ?>.html</option>
                                    <?php endforeach; endif; else: echo "" ;endif; ?>
                                </select>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="form-group">
                    <button type="submit" class="btn btn-primary js-ajax-submit"><?php echo lang('ADD'); ?></button>
                    <a class="btn btn-default" href="<?php echo url('AdminCategory/index'); ?>"><?php echo lang('BACK'); ?></a>
                </div>
            </form>
        </div>
    </div>
</div>
<script type="text/javascript" src="/static/js/admin.js"></script>
</body>
</html>