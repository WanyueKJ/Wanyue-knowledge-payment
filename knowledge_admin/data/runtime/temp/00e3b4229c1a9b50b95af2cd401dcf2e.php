<?php /*a:2:{s:77:"/www/wwwroot/demo.sdwanyue.com/themes/admin_htcyltd/admin/setting/upload.html";i:1585491092;s:70:"/www/wwwroot/demo.sdwanyue.com/themes/admin_htcyltd/public/header.html";i:1609814284;}*/ ?>
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
<link rel="stylesheet" type="text/css" href="/themes/admin_htcyltd/public/layuiadmin/tags/css/tags.css" />
</head>
<body>
<div class="layui-fluid wrap js-check-wrap">
    <div class="layui-row">
        <div class="layui-page-header">
            <div class="layui-card">
                <div class="layui-page-header-content">
                    <div class="layui-card-body">
                        <div class="layui-ui-page-header-title" >
                            <?php echo lang('ADMIN_SETTING_UPLOAD'); ?><span class="layui-badge-rim page-content">设置网站的上传文件的格式及内存大小</span>
                        </div>
                    </div>
                    <div class="layui-tab layui-tab-brief">
                        <ul class="layui-tab-title">
                            <li class="layui-this"><?php echo lang('ADMIN_SETTING_UPLOAD'); ?></a></li>
                        </ul>
                    </div>
                </div>
            </div>
        </div>
        <div class="layui-page-content">
            <div class="layui-card">
                <div class="layui-card-body">
                    <form method="post" class="layui-form js-ajax-form" role="form" action="<?php echo url('setting/uploadPost'); ?>" wid110>
                        <div class="layui-tab-content">
                            <div class="layui-form-item">
                                <label class="layui-form-label">最大同时上传文件数</label>
                                <div class="layui-input-inline">
                                    <input type="text" class="layui-input" name="max_files" title="最大同时上传文件数" placeholder="最大同时上传文件数"
                                           value="<?php echo (isset($upload_setting['max_files']) && ($upload_setting['max_files'] !== '')?$upload_setting['max_files']:20); ?>">
                                </div>
                                <div class="layui-form-mid layui-word-aux">多文件上传时,用户能最大同时上传文件数,默认20个</div>
                            </div>
                            <div class="layui-form-item">
                                <label class="layui-form-label">文件分块上传分块大小</label>
                                <div class="layui-input-inline">
                                    <input type="text" class="layui-input" name="chunk_size" title="文件分块上传分块大小KB,1M=1024KB"
                                           placeholder="文件分块上传分块大小KB,1M=1024KB" value="<?php echo (isset($upload_setting['chunk_size']) && ($upload_setting['chunk_size'] !== '')?$upload_setting['chunk_size']:512); ?>">
                                </div>
                                <div class="layui-form-item">
                                    <div class="layui-input-block">
                                        文件上传采用分块上传,文件分块大小默认512KB,可以根据服务器最大上传限制设置此数值
                                    </div>
                                </div>
                            </div>
                            <div class="layui-form-item">
                                <label class="layui-form-label">图片文件</label>
                                <div class="layui-input-block">
                                    <div class="layui-inline layui-col-md1">
                                        <input type="text" class="layui-input" name="file_types[image][upload_max_filesize]"
                                               title="允许上传大小KB,1M=1024KB" placeholder="允许上传大小KB,1M=1024KB"
                                               value="<?php echo (isset($upload_setting['file_types']['image']['upload_max_filesize']) && ($upload_setting['file_types']['image']['upload_max_filesize'] !== '')?$upload_setting['file_types']['image']['upload_max_filesize']:10240); ?>">
                                    </div>
                                    <div class="layui-inline layui-col-md9">
                                        <input type="text" class="layui-input js-tags-input"
                                               name="file_types[image][extensions]"
                                               title="扩展名,以英文逗号分隔"
                                               placeholder="扩展名,以英文逗号分隔"
                                               value="<?php echo (isset($upload_setting['file_types']['image']['extensions']) && ($upload_setting['file_types']['image']['extensions'] !== '')?$upload_setting['file_types']['image']['extensions']:'jpg,jpeg,png,gif,bmp'); ?>">
                                    </div>
                                </div>
                                <div class="layui-form-item">
                                    <div class="layui-input-block">
                                        允许上传大小默认为10240KB,1M=1024KB，允许上传格式默认为jpg,jpeg,png,gif,bmp
                                    </div>
                                </div>
                            </div>
                            <div class="layui-form-item">
                                <label class="layui-form-label">视频文件</label>
                                <div class="layui-input-block">
                                    <div class="layui-inline layui-col-md1">
                                        <input type="text" class="layui-input"
                                               name="file_types[video][upload_max_filesize]"
                                               title="允许上传大小KB,1M=1024KB"
                                               placeholder="允许上传大小KB,1M=1024KB"
                                               value="<?php echo (isset($upload_setting['file_types']['video']['upload_max_filesize']) && ($upload_setting['file_types']['video']['upload_max_filesize'] !== '')?$upload_setting['file_types']['video']['upload_max_filesize']:10240); ?>">
                                    </div>
                                    <div class="layui-inline layui-col-md9">
                                        <input type="text" class="layui-input js-tags-input"
                                               name="file_types[video][extensions]"
                                               title="扩展名,以英文逗号分隔"
                                               placeholder="扩展名,以英文逗号分隔"
                                               value="<?php echo (isset($upload_setting['file_types']['video']['extensions']) && ($upload_setting['file_types']['video']['extensions'] !== '')?$upload_setting['file_types']['video']['extensions']:'mp4,avi,wmv,rm,rmvb,mkv'); ?>">
                                    </div>
                                </div>
                                <div class="layui-form-item">
                                    <div class="layui-input-block">
                                        允许上传大小默认为102400KB,1M=1024KB，允许上传格式默认为mp4,avi,wmv,rm,rmvb,mkv
                                    </div>
                                </div>
                            </div>
                            <div class="layui-form-item">
                                <label class="layui-form-label">音频文件</label>
                                <div class="layui-input-block">
                                    <div class="layui-inline layui-col-md1">
                                        <input type="text" class="layui-input"
                                               name="file_types[audio][upload_max_filesize]"
                                               title="允许上传大小KB,1M=1024KB"
                                               placeholder="允许上传大小KB,1M=1024KB"
                                               value="<?php echo (isset($upload_setting['file_types']['audio']['upload_max_filesize']) && ($upload_setting['file_types']['audio']['upload_max_filesize'] !== '')?$upload_setting['file_types']['audio']['upload_max_filesize']:10240); ?>">
                                    </div>
                                    <div class="layui-inline layui-col-md9">
                                        <input type="text" class="layui-input js-tags-input"
                                               name="file_types[audio][extensions]"
                                               title="扩展名,以英文逗号分隔"
                                               placeholder="扩展名,以英文逗号分隔"
                                               value="<?php echo (isset($upload_setting['file_types']['audio']['extensions']) && ($upload_setting['file_types']['audio']['extensions'] !== '')?$upload_setting['file_types']['audio']['extensions']:'mp3,wma,wav'); ?>">
                                    </div>
                                </div>
                                <div class="layui-form-item">
                                    <div class="layui-input-block">
                                        允许上传大小默认为10240KB,1M=1024KB，允许上传格式默认为mp3,wma,wav
                                    </div>
                                </div>
                            </div>
                            <div class="layui-form-item">
                                <label class="layui-form-label">附件</label>
                                <div class="layui-input-block">
                                    <div class="layui-inline layui-col-md1">
                                        <input type="text" class="layui-input" name="file_types[file][upload_max_filesize]"
                                               title="允许上传大小KB,1M=1024KB" placeholder="允许上传大小KB,1M=1024KB"
                                               value="<?php echo (isset($upload_setting['file_types']['file']['upload_max_filesize']) && ($upload_setting['file_types']['file']['upload_max_filesize'] !== '')?$upload_setting['file_types']['file']['upload_max_filesize']:10240); ?>">
                                    </div>
                                    <div class="layui-inline layui-col-md9">
                                        <input type="text" class="layui-input js-tags-input"
                                               name="file_types[file][extensions]"
                                               title="扩展名,以英文逗号分隔"
                                               placeholder="扩展名,以英文逗号分隔"
                                               value="<?php echo (isset($upload_setting['file_types']['file']['extensions']) && ($upload_setting['file_types']['file']['extensions'] !== '')?$upload_setting['file_types']['file']['extensions']:'txt,pdf,doc,docx,xls,xlsx,ppt,pptx,zip,rar'); ?>">
                                    </div>
                                </div>
                                <div class="layui-form-item">
                                    <div class="layui-input-block">
                                        允许上传大小默认为10240KB,1M=1024KB，允许上传格式默认为除以上文档类型以外的其它常用文件,如：txt,pdf,doc,docx,xls,xlsx,ppt,pptx,zip,rar
                                    </div>
                                </div>
                            </div>
                            <div class="layui-form-item">
                                <div class="layui-input-block">
                                    <button type="submit" class="layui-btn js-ajax-submit"><?php echo lang('SAVE'); ?></button>
                                </div>
                            </div>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>
</div>
<script src="/static/js/admin.js"></script>
<script src="/themes/admin_htcyltd/public/layuiadmin/tags/js/tags.js"></script>
<script type="text/javascript">
    // 标签
    if($('.js-tags-input')[0]) {
        $('.js-tags-input').tagsInput({
            defaultText: '添加标签',
            removeWithBackspace: true,
            delimiter: [',']
        });
    }
</script>
</body>
</html>