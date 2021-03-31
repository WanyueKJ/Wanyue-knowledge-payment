<?php /*a:2:{s:78:"/www/wwwroot/demo.sdwanyue.com/themes/admin_htcyltd/admin/slide_item/edit.html";i:1586107684;s:70:"/www/wwwroot/demo.sdwanyue.com/themes/admin_htcyltd/public/header.html";i:1609814284;}*/ ?>
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
<div class="layui-row js-check-wrap">
    <div class="layui-side" style="background: #f5f7f9;">
        <ul class="layui-if-menu">
            <li><i class="icon-icon layui-icon-md-filing"></i><a href="<?php echo url('SlideItem/index',['slide_id'=>$slide_id]); ?>">幻灯片列表</a></li>
            <li><i class="icon-icon layui-icon-md-add-circle"></i><a href="<?php echo url('SlideItem/add',['slide_id'=>$slide_id]); ?>">添加幻灯片</a></li>
            <li class="layui-this"><i class="icon-icon layui-icon-ios-create"></i><a>编辑幻灯片</a></li>
        </ul>
    </div>
    <div class="layui-body" style="padding: 15px 25px 0 15px;">
        <div class="layui-tab-item layui-show">
            <form action="<?php echo url('SlideItem/editPost'); ?>" method="post" class="layui-form js-ajax-form">
                <div class="layui-form-item">
                    <label class="layui-form-label"><span class="form-required">*</span>标题</label>
                    <div class="layui-input-block">
                        <input class="layui-input" type="text"  name="post[title]" id="title"
                               required value="<?php echo $result['title']; ?>" placeholder="请输入标题"/>
                    </div>
                </div>
                <div class="layui-form-item">
                    <label class="layui-form-label"><span class="form-required">*</span>链接</label>
                    <div class="layui-input-block">
                        <input class="layui-input" type="text" name="post[url]" id="keywords" value="<?php echo $result['url']; ?>"
                               style="width: 400px" placeholder="请输入链接">
                    </div>
                </div>
                <div class="layui-form-item">
                    <label class="layui-form-label">描述</label>
                    <div class="layui-input-block">
                        <input class="layui-input" type="text" name="post[description]" id="source"
                               value="<?php echo $result['description']; ?>" placeholder="请输入描述">
                    </div>
                </div>
                <div class="layui-form-item">
                    <label class="layui-form-label">幻灯片内容</label>
                    <div class="layui-input-block">
                            <textarea class="layui-textarea" name="post[content]" id="description"
                                      placeholder="请填写幻灯片内容"><?php echo $result['content']; ?></textarea>
                    </div>
                </div>
                <div class="layui-form-item">
                    <label class="layui-form-label">缩略图</label>
                    <div class="layui-input-block">
                        <input type="hidden" name="post[image]" id="thumb" value="<?php echo (isset($result['image']) && ($result['image'] !== '')?$result['image']:''); ?>">
                        <a href="javascript:uploadOneImage('图片上传','#thumb');">
                            <?php if(empty($result['image'])): ?>
                                <img src="/themes/admin_htcyltd/public/assets/images/default-thumbnail.png"
                                     id="thumb-preview" width="135" style="cursor: hand"/>
                                <?php else: ?>
                                <img src="<?php echo cmf_get_image_preview_url($result['image']); ?>" id="thumb-preview"
                                     width="135" style="cursor: hand"/>
                            <?php endif; ?>
                        </a>
                        <div class="layui-col-md12" style="margin-top: 10px">
                            <input type="button" class="layui-btn layui-btn-sm layui-btn-normal"
                                   onclick="$('#thumb-preview').attr('src','/themes/admin_htcyltd/public/assets/images/default-thumbnail.png');$('#thumb').val('');return false;"
                                   value="取消图片">
                        </div>
                    </div>
                </div>
                <div class="layui-form-item">
                    <div class="layui-input-block">
                        <input type="hidden" name="post[id]" value="<?php echo $result['id']; ?>"/>
                        <input type="hidden" name="post[slide_id]" value="<?php echo $slide_id; ?>">
                        <button type="submit" class="layui-btn js-ajax-submit js-ajax-submit"><?php echo lang('SAVE'); ?></button>
                        <a class="layui-btn layui-btn-primary" href="<?php echo url('SlideItem/index',['slide_id'=>$slide_id]); ?>"><?php echo lang('BACK'); ?></a>
                    </div>
                </div>
            </form>
        </div>
    </div>
</div>
<script type="text/javascript" src="/static/js/admin.js"></script>
<script type="text/javascript" src="/static/js/wind.js"></script>
</body>
</html>