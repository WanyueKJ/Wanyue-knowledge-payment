<?php /*a:2:{s:73:"/www/wwwroot/demo.sdwanyue.com/themes/admin_htcyltd/admin/users/edit.html";i:1609933053;s:70:"/www/wwwroot/demo.sdwanyue.com/themes/admin_htcyltd/public/header.html";i:1609814284;}*/ ?>
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
<style>html {background-color: #ffffff;}</style>

</head>
<body>

<div class="layui-fluid">
    <form method="post" class="layui-form js-ajax-form" action="<?php echo url('users/editPost'); ?>" style="margin-top: 20px;">
        <div class="layui-form-item">
            <label class="layui-form-label"><span class="form-required">*</span>用户名</label>
            <div class="layui-input-block" style="padding-top:7px;">
                <?php echo $data['user_login']; ?>
            </div>
        </div>
    
        <div class="layui-form-item">
            <label for="input-user_pass" class="layui-form-label"><span class="form-required">*</span>密码</label>
            <div class="layui-input-block">
                <input type="password" required lay-verify="required" class="layui-input" id="input-user_pass"
                       name="user_pass" value=""> 不修改留空 6-12位字母数字组合
            </div>
        </div>
    
        <div class="layui-form-item">
            <label for="input-user_nickname" class="layui-form-label"><span class="form-required">*</span>昵称</label>
            <div class="layui-input-block">
                <input type="text" class="layui-input" required lay-verify="required" id="input-user_nickname"
                       name="user_nickname" value="<?php echo $data['user_nickname']; ?>">
            </div>
        </div>
    
        <!-- <div class="layui-form-item">
            <label class="layui-form-label"><span class="form-required">*</span>头像</label>
            <div class="layui-input-block">
                <input type="hidden" name="avatar" id="thumbnail" value="<?php echo $data['avatar']; ?>">
                <a href="javascript:uploadOneImage('图片上传','#thumbnail');">
                    <?php if(empty($data['avatar'])): ?>
                        <img src="/themes/admin_htcyltd/public/assets/images/default-thumbnail.png"
                             id="thumbnail-preview"
                             style="cursor: pointer;max-width:100px;max-height:100px;"/>
                        <?php else: ?>
                        <img src="<?php echo cmf_get_image_preview_url($data['avatar']); ?>"
                             id="thumbnail-preview"
                             style="cursor: pointer;max-width:100px;max-height:100px;"/>
                    <?php endif; ?>
                </a>
                <input type="button" class="btn btn-sm btn-cancel-thumbnail" value="取消图片"> 建议尺寸： 600 X 600
            </div>
        </div> -->

        <div class="layui-form-item">
			<label for="input-user_login" class="layui-form-label">头像</label>

			<div class="layui-input-block">
				<input type="hidden" name="avatar" id="thumbnail1" value="">
				<a href="javascript:uploadOneImage('图片上传','#thumbnail1');">
                    <?php if(empty($data['avatar'])): ?>
                        <img src="/themes/admin_htcyltd/public/assets/images/default-thumbnail.png" id="thumbnail1-preview" style="cursor: pointer;max-width:150px;max-height:150px;"/>
                    <?php else: ?>
                        <img src="<?php echo cmf_get_image_preview_url($data['avatar']); ?>" id="thumbnail1-preview" style="cursor: pointer;max-width:150px;max-height:150px;"/>
                    <?php endif; ?>
				</a>
				<div class="layui-col-md12" style="margin-top: 10px">
					<input type="button" class="layui-btn layui-btn-sm layui-btn-normal"
						   onclick="$('#thumbnail1-preview').attr('src','/themes/admin_htcyltd/public/assets/images/default-thumbnail.png');$('#thumbnail1').val('');return false;"
						   value="取消图片">
				</div>
			</div>
		</div>

    
        <!-- <div class="layui-form-item" id="">
            <label class="layui-form-label"><span class="form-required">*</span>头像小图</label>
            <div class="layui-input-block">
                <input type="hidden" name="avatar_thumb" id="thumbnail2" value="<?php echo $data['avatar_thumb']; ?>">
                <a href="javascript:uploadOneImage('图片上传','#thumbnail2');">
                    <?php if(empty($data['avatar_thumb'])): ?>
                        <img src="/themes/admin_htcyltd/public/assets/images/default-thumbnail.png"
                             id="thumbnail2-preview"
                             style="cursor: pointer;max-width:100px;max-height:100px;"/>
                        <?php else: ?>
                        <img src="<?php echo cmf_get_image_preview_url($data['avatar_thumb']); ?>"
                             id="thumbnail2-preview"
                             style="cursor: pointer;max-width:100px;max-height:100px;"/>
                    <?php endif; ?>
                </a>
                <input type="button" class="btn btn-sm btn-cancel-thumbnail2" value="取消图片"> 分享用 建议尺寸： 100 X 100 必须小于 200 X
                200
            </div>
        </div> -->

        <div class="layui-form-item">
			<label class="layui-form-label">头像小图</label>

			<div class="layui-input-block">
				<input type="hidden" name="avatar_thumb" id="thumbnail2" value="">
				<a href="javascript:uploadOneImage('图片上传','#thumbnail2');">
                    
                    <?php if(empty($data['avatar_thumb'])): ?>
                        <img src="/themes/admin_htcyltd/public/assets/images/default-thumbnail.png" id="thumbnail2-preview" style="cursor: pointer;max-width:150px;max-height:150px;"/>
                    <?php else: ?>
                        <img src="<?php echo cmf_get_image_preview_url($data['avatar_thumb']); ?>" id="thumbnail2-preview" style="cursor: pointer;max-width:150px;max-height:150px;"/>
                    <?php endif; ?>

				</a>
				<div class="layui-col-md12" style="margin-top: 10px">
					<input type="button" class="layui-btn layui-btn-sm layui-btn-normal"
						   onclick="$('#thumbnail2-preview').attr('src','/themes/admin_htcyltd/public/assets/images/default-thumbnail.png');$('#thumbnail2').val('');return false;"
						   value="取消图片">
				</div>
			</div>
		</div>
    
        <div class="layui-form-item">
            <label class="layui-form-label">性别</label>
            <div class="layui-input-block">
                <select class="layui-input" name="sex">
                    <option value="1">男</option>
                    <option value="2"
                    <?php if($data['sex'] == '2'): ?>selected<?php endif; ?>
                    >女</option>
                </select>
            </div>
        </div>
    
        <div class="layui-form-item">
            <label for="input-mobile" class="layui-form-label"><span class="form-required">*</span>手机号</label>
            <div class="layui-input-block">
                <input type="text" required lay-verify="required" class="layui-input" id="input-mobile" name="mobile"
                       value="<?php echo $data['mobile']; ?>">
            </div>
        </div>
    
        <?php if($data['type'] == 1): ?>
            <div class="layui-form-item layui-text">
                <label for="input-school" class="layui-form-label">学校</label>
                <div class="layui-input-block">
                    <textarea class="layui-textarea" id="input-school" name="school"><?php echo $data['school']; ?></textarea>
                </div>
            </div>
    
            <div class="layui-form-item layui-text">
                <label for="input-experience" class="layui-form-label">教育经历</label>
                <div class="layui-input-block">
                    <textarea class="layui-textarea" id="input-experience"
                              name="experience"><?php echo $data['experience']; ?></textarea>
                </div>
            </div>
    
            <div class="layui-form-item layui-text">
                <label for="input-feature" class="layui-form-label">教育特点</label>
                <div class="layui-input-block">
                    <textarea class="layui-textarea" id="input-feature" name="feature"><?php echo $data['feature']; ?></textarea>
                </div>
            </div>
        <?php endif; ?>
    
        <div class="layui-form-item">
            <div class="layui-input-block">
                					<input type="hidden" name="id" value="<?php echo $data['id']; ?>" />

                <button type="submit" id="js-ajax-submit" class="layui-btn js-ajax-submit js-close"><?php echo lang('ADD'); ?></button>
            </div>
        </div>
    
    </form>
</div>

<script type="text/javascript" src="/static/js/wind.js"></script>

<script src="/static/js/admin.js"></script>

</body>
</html>