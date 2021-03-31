<?php /*a:2:{s:93:"D:\My_project\Wanyue-knowledge-payment-admin/themes/admin_htcyltd/portal\admin_page\edit.html";i:1613902824;s:84:"D:\My_project\Wanyue-knowledge-payment-admin/themes/admin_htcyltd/public\header.html";i:1609814284;}*/ ?>
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
<style>
    .layui-form-pane .layui-form-checkbox {
        margin: 0;
    }
</style>
<script type="text/html" id="photos-item-tpl">
    <li id="saved-image{id}" class="layui-col-md12" style="margin-bottom: 10px">
        <div class="layui-input-inline">
            <input id="photo-{id}" type="hidden" name="photo_urls[]" value="{filepath}">
            <input class="layui-input" id="photo-{id}-name" type="text" name="photo_names[]" value="{name}"
                   style="width: 200px;" title="图片名称">
        </div>
        <div class="layui-form-mid layui-word-aux" style="padding: 0 !important;">
            <img id="photo-{id}-preview" src="{url}" style="height:35px;width: 35px;padding-left: 10px;"
                 onclick="imagePreviewDialog(this.src);">
            <a class="nobtn"  href="javascript:uploadOneImage('图片上传','#photo-{id}');">替换</a>
            <a class="nobtn"  href="javascript:(function(){$('#saved-image{id}').remove();})();">移除</a>
        </div>
    </li>
</script>
<script type="text/html" id="files-item-tpl">
    <li id="saved-file{id}" class="layui-col-md12" style="margin-bottom: 10px">
        <div class="layui-input-inline">
            <input id="file-{id}" type="hidden" name="file_urls[]" value="{filepath}">
            <input class="layui-input" id="file-{id}-name" type="text" name="file_names[]" value="{name}"
                   style="width: 200px;" title="文件名称">
        </div>
        <div class="layui-form-mid layui-word-aux" style="margin-left: 10px;">
            <a class="nobtn"  id="file-{id}-preview" href="{preview_url}" target="_blank">下载</a>
            <a class="nobtn"  href="javascript:uploadOne('文件上传','#file-{id}','file');">替换</a>
            <a class="nobtn"  href="javascript:(function(){$('#saved-file{id}').remove();})();">移除</a>
        </div>
    </li>
</script>
</head>
<body>
<div class="layui-fluid">
    <form action="<?php echo url('AdminPage/editPost'); ?>" method="post" class="layui-form layui-form-pane layui-row layui-col-space15 js-ajax-form">
        <div class="layui-col-md9">
            <div class="layui-card">
                <div class="layui-tab layui-tab-brief">
                    <ul class="layui-tab-title">
                        <li><a href="<?php echo url('AdminPage/index'); ?>">所有页面</a></li>
                        <li><a href="<?php echo url('AdminPage/add'); ?>">添加页面</a></li>
                        <li class="layui-this">编辑页面</li>
                    </ul>
                </div>
                <div class="layui-card-body">

                    <div class="layui-form-item">
                        <label class="layui-form-label">
                            类型
                        </label>
                        <div class="layui-input-block">
                            <select class="layui-input" name="post[type]">
                                <option value="0" <?php if($post['type'] == 0): ?>selected<?php endif; ?>>单页面</option>
                                <option value="2" <?php if($post['type'] == 2): ?>selected<?php endif; ?>>关于我们</option>
                            </select>
                        </div>
                    </div>

                    <div class="layui-form-item">
                        <div class="layui-form-label">标题<span class="form-required">*</span></div>
                        <div class="layui-input-block">
                            <input type="hidden" name="post[id]" value="<?php echo $post['id']; ?>">
                            <input class="layui-input" type="text" style="width: 400px;" name="post[post_title]"
                                   required
                                   value="<?php echo $post['post_title']; ?>" placeholder="请输入标题"/>
                        </div>
                    </div>
                    <div class="layui-form-item" style="display: none;">
                        <div class="layui-form-label">别名</div>
                        <div class="layui-input-inline">
                            <input class="layui-input" type="text" name="post[post_alias]"
                                   value="<?php echo $post['post_alias']; ?>" placeholder="请输入别名"/>
                        </div>
                        <div class="layui-form-mid layui-word-aux">用于美化url链接</div>
                    </div>
                    <div class="layui-form-item" style="display: none;;">
                        <div class="layui-form-label">关键词</div>
                        <div class="layui-input-inline">
                            <input class="layui-input" type="text" name="post[post_keywords]"
                                   value="<?php echo $post['post_keywords']; ?>" placeholder="请输入关键字">
                        </div>
                        <div class="layui-form-mid layui-word-aux">多关键词之间用空格隔开</div>
                    </div>
                    <div class="layui-form-item layui-form-text" style="display: none;;">
                        <div class="layui-form-label">摘要</div>
                        <div class="layui-input-block">
                            <textarea class="layui-textarea" name="post[post_excerpt]" style="height: 50px;"><?php echo $post['post_excerpt']; ?></textarea>
                        </div>
                    </div>
                    <div class="layui-form-item layui-form-text" >
                        <div class="layui-form-label">内容</div>
                        <div class="layui-input-block">
                            <script type="text/plain" id="content" name="post[post_content]"><?php echo $post['post_content']; ?></script>
                        </div>
                    </div>
                    <div class="layui-form-item" style="display: none;;">
                        <div class="layui-form-label">相册</div>
                        <div class="layui-input-block">
                            <ul id="photos" class="pic-list list-unstyled form-inline layui-col-md4">
                                <?php if(!(empty($post['more']['photos']) || (($post['more']['photos'] instanceof \think\Collection || $post['more']['photos'] instanceof \think\Paginator ) && $post['more']['photos']->isEmpty()))): if(is_array($post['more']['photos']) || $post['more']['photos'] instanceof \think\Collection || $post['more']['photos'] instanceof \think\Paginator): if( count($post['more']['photos'])==0 ) : echo "" ;else: foreach($post['more']['photos'] as $key=>$vo): $img_url=cmf_get_image_preview_url($vo['url']); ?>
                                        <li id="saved-image<?php echo $key; ?>" class="layui-col-md12" style="margin-bottom: 10px">
                                            <div class="layui-input-inline">
                                                <input id="photo-<?php echo $key; ?>" type="hidden" name="photo_urls[]" value="<?php echo $vo['url']; ?>">
                                                <input class="layui-input" id="photo-<?php echo $key; ?>-name" type="text"
                                                       name="photo_names[]"
                                                       value="<?php echo (isset($vo['name']) && ($vo['name'] !== '')?$vo['name']:''); ?>" style="width: 200px;" title="图片名称">
                                            </div>
                                            <div class="layui-form-mid layui-word-aux" style="padding: 0 !important;">
                                                <img id="photo-<?php echo $key; ?>-preview"
                                                     src="<?php echo cmf_get_image_preview_url($vo['url']); ?>"
                                                     style="height:35px;width: 35px;padding-left: 10px;"
                                                     onclick="parent.imagePreviewDialog(this.src);">
                                                <a class="nobtn"  href="javascript:uploadOneImage('图片上传','#photo-<?php echo $key; ?>');">替换</a>
                                                <a class="nobtn"  href="javascript:(function(){$('#saved-image<?php echo $key; ?>').remove();})();">移除</a>
                                            </div>
                                        </li>
                                    <?php endforeach; endif; else: echo "" ;endif; ?>
                                <?php endif; ?>
                            </ul>
                            <div class="layui-col-md4" style="margin-left: 15px">
                                <a href="javascript:uploadMultiImage('图片上传','#photos','photos-item-tpl');"
                                   class="layui-btn layui-btn-primary" style="border: 1px dashed #e2e2e2;"><i class="layui-icon" style="color: #2d8cf0;"></i>选择图片</a>
                            </div>
                        </div>
                    </div>
                    <div class="layui-form-item" style="display: none;;">
                        <div class="layui-form-label">附件</div>
                        <div class="layui-input-block">
                            <ul id="files" class="pic-list list-unstyled form-inline layui-col-md4">
                                <?php if(!(empty($post['more']['files']) || (($post['more']['files'] instanceof \think\Collection || $post['more']['files'] instanceof \think\Paginator ) && $post['more']['files']->isEmpty()))): if(is_array($post['more']['files']) || $post['more']['files'] instanceof \think\Collection || $post['more']['files'] instanceof \think\Paginator): if( count($post['more']['files'])==0 ) : echo "" ;else: foreach($post['more']['files'] as $key=>$vo): $file_url=cmf_get_file_download_url($vo['url']); ?>
                                        <li id="saved-file<?php echo $key; ?>" class="layui-col-md12" style="margin-bottom: 10px">
                                            <div class="layui-input-inline">
                                                <input id="file-<?php echo $key; ?>" type="hidden" name="file_urls[]"
                                                       value="<?php echo $vo['url']; ?>">
                                                <input class="layui-input" id="file-<?php echo $key; ?>-name" type="text"
                                                       name="file_names[]"
                                                       value="<?php echo $vo['name']; ?>" style="width: 200px;" title="图片名称">
                                            </div>
                                            <div class="layui-form-mid layui-word-aux" style="margin-left: 10px;">
                                                <a class="nobtn" id="file-<?php echo $key; ?>-preview" href="<?php echo $file_url; ?>" target="_blank">下载</a>
                                                <a class="nobtn" href="javascript:uploadOne('文件上传','#file-<?php echo $key; ?>','file');">替换</a>
                                                <a class="nobtn" href="javascript:(function(){$('#saved-file<?php echo $key; ?>').remove();})();">移除</a>
                                            </div>
                                        </li>
                                    <?php endforeach; endif; else: echo "" ;endif; ?>
                                <?php endif; ?>
                            </ul>
                            <div class="layui-col-md4" style="margin-left: 15px">
                                <a href="javascript:uploadMultiFile('附件上传','#files','files-item-tpl','file');"
                                   class="layui-btn layui-btn-primary" style="border: 1px dashed #e2e2e2;"><i class="layui-icon" style="color: #2d8cf0;"></i>选择文件</a>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
        <div class="layui-col-md3" style="display: none;;">
            <div class="layui-card">
                <div class="layui-card-header">其它</div>
                <div class="layui-card-body">
                    <div class="layui-form-item">
                        <div class="layui-form-label">缩略图</div>
                        <div class="layui-input-block">
                            <div class="layui-col-md12">
                                <input type='hidden' name='post[more][thumbnail]' id='thumbnail'
                                       value="<?php echo (isset($post['more']['thumbnail']) && ($post['more']['thumbnail'] !== '')?$post['more']['thumbnail']:''); ?>">
                                <a href="javascript:uploadOneImage('图片上传','#thumbnail');">
                                    <?php if(empty($post['more']['thumbnail'])): ?>
                                        <img src="/themes/admin_htcyltd/public/assets/images/default-thumbnail.png"
                                             id='thumbnail-preview'
                                             width='135' height='135' style='cursor: pointer'/>
                                        <?php else: ?>
                                        <img src="<?php echo cmf_get_image_preview_url($post['more']['thumbnail']); ?>"
                                             id='thumbnail-preview'
                                             width='135' height='135' style='cursor: hand'/>
                                    <?php endif; ?>
                                </a>
                                <div class="layui-col-md12" style="margin-top: 10px">
                                    <input type="button" class="layui-btn layui-btn-sm layui-btn-normal"
                                           onclick="$('#thumbnail-preview').attr('src','/themes/admin_htcyltd/public/assets/images/default-thumbnail.png');$('#thumbnail').val('');return false;"
                                           value="取消图片">
                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="layui-form-item">
                        <div class="layui-form-label">发布时间</div>
                        <div class="layui-input-block">
                            <input class="layui-input js-bootstrap-datetime" type="text" name="post[published_time]"
                                   value="<?php echo date('Y-m-d H:i',$post['published_time']); ?>">
                        </div>
                    </div>
                    <div class="layui-form-item">
                        <div class="layui-form-label">摸板</div>
                        <div class="layui-input-block">
                            <select class="layui-input" name="post[more][template]" id="more-template-select">
                                <option value="">请选择模板</option>
                                <?php if(is_array($page_theme_files) || $page_theme_files instanceof \think\Collection || $page_theme_files instanceof \think\Paginator): if( count($page_theme_files)==0 ) : echo "" ;else: foreach($page_theme_files as $key=>$vo): $value=preg_replace('/^portal\//','',$vo['file']); ?>
                                    <option value="<?php echo $value; ?>"><?php echo $vo['name']; ?> <?php echo $vo['file']; ?>.html</option>
                                <?php endforeach; endif; else: echo "" ;endif; ?>
                            </select>
                        </div>
                    </div>
                </div>
            </div>
        </div>
        <div class="layui-col-md3" style="">
            <div class="layui-card">
                <div class="layui-card-header">状态</div>
                <div class="layui-card-body">
                    <?php 
                        $status_yes=$post['post_status']==1?"checked":"";
                     ?>
                    <input type="checkbox" name="post[post_status]" value="1" title="发布" lay-skin="primary" <?php echo $status_yes; ?>>
                </div>
            </div>
        </div>
        <div class="layui-form-item layui-layout-admin">
            <div class="layui-input-block">
                <div class="layui-footer" style="left: 0;">
                    <button type="submit" class="layui-btn js-ajax-submit"><?php echo lang('SAVE'); ?></button>
                    <a class="layui-btn layui-btn-primary" href="<?php echo url('AdminPage/index'); ?>"><?php echo lang('BACK'); ?></a>
                </div>
            </div>
        </div>
    </form>
</div>
<script type="text/javascript" src="/static/js/admin.js"></script>
<script type="text/javascript" src="/static/js/wind.js"></script>
<script type="text/javascript">
    //编辑器路径定义
    var editorURL = GV.WEB_ROOT;
</script>
<script type="text/javascript" src="/static/js/ueditor/ueditor.config.js"></script>
<script type="text/javascript" src="/static/js/ueditor/ueditor.all.min.js"></script>
<script type="text/javascript">
    $(function () {

        editorcontent = new baidu.editor.ui.Editor();
        editorcontent.render('content');
        try {
            editorcontent.sync();
        } catch (err) {
        }

        $('#more-template-select').val("<?php echo (isset($post['more']['template']) && ($post['more']['template'] !== '')?$post['more']['template']:''); ?>");
    });
</script>
</body>
</html>