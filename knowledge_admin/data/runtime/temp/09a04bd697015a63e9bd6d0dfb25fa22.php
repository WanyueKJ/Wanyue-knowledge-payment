<?php /*a:2:{s:83:"/www/wwwroot/demo.sdwanyue.com/themes/admin_htcyltd/portal/admin_category/edit.html";i:1609988708;s:70:"/www/wwwroot/demo.sdwanyue.com/themes/admin_htcyltd/public/header.html";i:1609814284;}*/ ?>
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
<style>html{background-color: #ffffff}</style>
</head>
<body>
<div class="layui-row layui-tab">
    <div class="layui-side" style="background: #f5f7f9;">
        <ul class="layui-if-menu" id="tabHeader">
            <li class="layui-this"><i class="icon-icon layui-icon-md-settings"></i>基本属性</li>
        </ul>
    </div>
    <div class="layui-body" style="padding: 15px 25px 0 15px;">
        <div class="layui-tab-item layui-show">
	        <form class="layui-form js-ajax-form" action="<?php echo url('AdminCategory/editPost'); ?>" method="post">
	            <div id="tabBody">
	                <div class="layui-tab-item layui-show">
	                    <div class="layui-form-item">
	                        <label class="layui-form-label" for="input-parent"><span class="form-required">*</span>上级</label>
	                        <div class="layui-input-block">
	                            <select class="layui-input" name="parent_id" id="input-parent">
	                                <option value="0">作为一级分类</option>
	                                <?php echo $categories_tree; ?>
	                            </select>
	                        </div>
	                    </div>
	                    <div class="layui-form-item">
	                        <label class="layui-form-label" for="input-name"><span class="form-required">*</span>分类名称</label>
	                        <div class="layui-input-block">
	                            <input type="text" class="layui-input" id="input-name" name="name" value="<?php echo $name; ?>">
	                        </div>
	                    </div>
	                    <div class="layui-form-item">
	                        <label class="layui-form-label" for="input-name">分类别名</label>
	                        <div class="layui-input-block">
	                            <input type="text" class="layui-input" id="input-alias" name="alias"
	                                   value="<?php echo (isset($alias) && ($alias !== '')?$alias:''); ?>">
	                        </div>
	                    </div>
	                    <div class="layui-form-item">
	                        <label class="layui-form-label" for="input-description">描述</label>
	                        <div class="layui-input-block">
	                                <textarea class="layui-textarea" name="description"
	                                          id="input-description"><?php echo $description; ?></textarea>
	                        </div>
	                    </div>
	                    <div class="layui-form-item">
	                        <label class="layui-form-label" for="input-description">缩略图</label>
	                        <div class="layui-input-block">
	                            <input type="hidden" name="more[thumbnail]" class="form-control"
	                                   value="<?php echo (isset($more['thumbnail']) && ($more['thumbnail'] !== '')?$more['thumbnail']:''); ?>" id="js-thumbnail-input">
	                            <div>
	                                <a href="javascript:uploadOneImage('图片上传','#js-thumbnail-input');">
	                                    <?php if(empty($more['thumbnail'])): ?>
	                                        <img src="/themes/admin_htcyltd/public/assets/images/default-thumbnail.png"
	                                             id="js-thumbnail-input-preview"
	                                             width="135" style="cursor: pointer"/>
	                                        <?php else: ?>
	                                        <img src="<?php echo cmf_get_image_preview_url($more['thumbnail']); ?>"
	                                             id="js-thumbnail-input-preview"
	                                             width="135" style="cursor: pointer"/>
	                                    <?php endif; ?>
	                                </a>
	                            </div>
	                        </div>
	                    </div>
	                </div>
	                <div class="layui-tab-item">
	                    <div class="layui-form-item">
	                        <label class="layui-form-label" for="input-seo_title">SEO标题</label>
	                        <div class="layui-input-block">
	                            <input type="text" class="layui-input" id="input-seo_title" name="seo_title"
	                                   value="<?php echo $seo_title; ?>">
	                        </div>
	                    </div>
	                    <div class="layui-form-item">
	                        <label class="layui-form-label" for="input-seo_keywords">SEO关键字</label>
	                        <div class="layui-input-block">
	                            <input type="text" class="layui-input" id="input-seo_keywords" name="seo_keywords"
	                                   value="<?php echo $seo_keywords; ?>">
	                        </div>
	                    </div>
	                    <div class="layui-form-item">
	                        <label class="layui-form-label" for="input-seo_description">SEO描述</label>
	                        <div class="layui-input-block">
	                            <textarea class="layui-textarea" name="seo_description" id="input-seo_description"><?php echo $seo_description; ?></textarea>
	                        </div>
	                    </div>
	                </div>
	                <div class="layui-tab-item">
	                    <div class="layui-form-item">
	                        <label class="layui-form-label" for="input-list_tpl"><span class="form-required">*</span>列表模板</label>
	                        <div class="layui-input-block">
	                            <select class="layui-input" name="list_tpl" id="input-list_tpl">
	                                <!--<option value="list">portal/list.html(默认)</option>-->
	                                <?php if(is_array($list_theme_files) || $list_theme_files instanceof \think\Collection || $list_theme_files instanceof \think\Paginator): if( count($list_theme_files)==0 ) : echo "" ;else: foreach($list_theme_files as $key=>$vo): $value=preg_replace('/^portal\//','',$vo['file']); ?>
	                                    <option value="<?php echo $value; ?>"><?php echo $vo['name']; ?> <?php echo $vo['file']; ?>.html</option>
	                                <?php endforeach; endif; else: echo "" ;endif; ?>
	                            </select>
	                        </div>
	                    </div>
	                    <div class="layui-form-item">
	                        <label class="layui-form-label" for="input-one_tpl"><span class="form-required">*</span>文章模板</label>
	                        <div class="layui-input-block">
	                            <select class="layui-input" name="one_tpl" id="input-one_tpl">
	                                <!--<option value="article">portal/article.html(默认)</option>-->
	                                <?php if(is_array($article_theme_files) || $article_theme_files instanceof \think\Collection || $article_theme_files instanceof \think\Paginator): if( count($article_theme_files)==0 ) : echo "" ;else: foreach($article_theme_files as $key=>$vo): $value=preg_replace('/^portal\//','',$vo['file']); ?>
	                                    <option value="<?php echo $value; ?>"><?php echo $vo['name']; ?> <?php echo $vo['file']; ?>.html</option>
	                                <?php endforeach; endif; else: echo "" ;endif; ?>
	                            </select>
	                        </div>
	                    </div>
	                </div>
	                <div class="layui-form-item">
	                    <div class="layui-input-block">
	                        <input type="hidden" name="id" value="<?php echo $id; ?>">
	                        <button type="submit" class="layui-btn js-ajax-submit" data-refresh="0"><?php echo lang('SAVE'); ?></button>
	                    </div>
	                </div>
	            </div>
	        </form>
		</div>
	</div>
</div>
<script type="text/javascript" src="/static/js/admin.js"></script>
<script type="text/javascript" src="/static/js/wind.js"></script>
<script>
    $('#input-list_tpl').val("<?php echo (isset($list_tpl) && ($list_tpl !== '')?$list_tpl:''); ?>");
    $('#input-one_tpl').val("<?php echo (isset($one_tpl) && ($one_tpl !== '')?$one_tpl:''); ?>");
</script>
<script>
    //注意：选项卡 依赖 element 模块，否则无法进行功能性操作
    layui.use('element', function(){
        var element = layui.element;

        //JavaScript
        element.tab({
            headerElem: '#tabHeader>li' //指定tab头元素项
            ,bodyElem: '#tabBody>.layui-tab-item' //指定tab主体元素项
        });
    });
</script>
</body>
</html>