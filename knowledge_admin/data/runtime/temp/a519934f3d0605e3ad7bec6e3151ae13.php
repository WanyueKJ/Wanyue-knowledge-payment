<?php /*a:2:{s:101:"D:\My_project\wanyue_education_web_local\education_web/themes/admin_simpleboot3/admin\course\add.html";i:1603447486;s:98:"D:\My_project\wanyue_education_web_local\education_web/themes/admin_simpleboot3/public\header.html";i:1602491837;}*/ ?>
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
<style>
.userlist{
    position:absolute;
    background:#fff;
    width:200px;
    height:400px;
    overflow-y:auto;
    border:1px solid #eee;
    z-index:99;
    display:none;
}
.userlist ul{
    padding:0;
}
.userlist ul li{
    padding-left:10px;
    list-style:none;
}
.userlist ul li:hover{
    background:#eee;
}
</style>
</head>
<body>
	<div class="wrap">
		<ul class="nav nav-tabs">
			<li ><a href="<?php echo url('course/index',['sort'=>$sort]); ?>">列表</a></li>
			<li class="active"><a ><?php echo lang('ADD'); ?></a></li>
		</ul>
		<form method="post" class="form-horizontal js-ajax-form margin-top-20" action="<?php echo url('course/addPost'); ?>">
			<div class="form-group">
				<label for="input-uid" class="col-sm-2 control-label"><span class="form-required">*</span>主讲老师ID</label>
				<div class="col-md-6 col-sm-10">
					<input type="text" class="form-control getuid" id="input-uid" name="uid"  autocomplete="off">
                    <div class="userlist">
                        <ul>
                        </ul>
                    </div>
				</div>
			</div>
            <?php if($sort != 0): ?>
            <div class="form-group">
				<label for="input-tutoruid" class="col-sm-2 control-label"><span class="form-required"></span>辅导老师ID</label>
				<div class="col-md-6 col-sm-10">
					<input type="text" class="form-control getuid" id="input-tutoruid" name="tutoruid"  autocomplete="off">
                    <div class="userlist">
                        <ul>
                        </ul>
                    </div>
				</div>
			</div>
            <?php endif; ?>
            
            <div class="form-group">
				<label for="input-name" class="col-sm-2 control-label"><span class="form-required">*</span>学级分类</label>
				<div class="col-md-6 col-sm-10">
					<select class="form-control" name="gradeid">
                        <?php if(is_array($grade) || $grade instanceof \think\Collection || $grade instanceof \think\Paginator): $i = 0; $__LIST__ = $grade;if( count($__LIST__)==0 ) : echo "" ;else: foreach($__LIST__ as $key=>$v): $mod = ($i % 2 );++$i;?>
                        <option value="<?php echo $v['id']; ?>"><?php echo $v['name']; ?></option>
                        <?php endforeach; endif; else: echo "" ;endif; ?>
                    </select>
				</div>
			</div>

            <div class="form-group">
				<label for="input-name" class="col-sm-2 control-label"><span class="form-required">*</span>名称</label>
				<div class="col-md-6 col-sm-10">
					<input type="text" class="form-control" id="input-name" name="name">
				</div>
			</div>
            
            <div class="form-group">
				<label for="input-user_login" class="col-sm-2 control-label"><span class="form-required">*</span>封面</label>
				<div class="col-md-6 col-sm-10">
					<input type="hidden" name="thumb" id="thumbnail" value="">
                    <a href="javascript:uploadOneImage('图片上传','#thumbnail');">
                        <img src="/themes/admin_simpleboot3/public/assets/images/default-thumbnail.png"
                                 id="thumbnail-preview"
                                 style="cursor: pointer;max-width:100px;max-height:100px;"/>
                    </a>
                    <input type="button" class="btn btn-sm btn-cancel-thumbnail" value="取消图片"> 比例：4:3  建议尺寸：200 X 150
				</div>
			</div>
            
            <div class="form-group">
				<label for="input-des" class="col-sm-2 control-label"><span class="form-required"></span>简介</label>
				<div class="col-md-6 col-sm-10">
					<textarea class="form-control" name="des" style="height: 50px;" maxlength="30"></textarea>最多30个字
				</div>
			</div>
            
            <?php if($sort != 1 && $sort != 3): ?>
            <div class="form-group">
				<label for="input-name" class="col-sm-2 control-label"><span class="form-required">*</span>内容形式</label>
				<div class="col-md-6 col-sm-10">
					<select class="form-control" name="type" id="type">
                        <?php if(is_array($types) || $types instanceof \think\Collection || $types instanceof \think\Paginator): $i = 0; $__LIST__ = $types;if( count($__LIST__)==0 ) : echo "" ;else: foreach($__LIST__ as $key=>$v): $mod = ($i % 2 );++$i;?>
                        <option value="<?php echo $key; ?>"><?php echo $v; ?></option>
                        <?php endforeach; endif; else: echo "" ;endif; ?>
                    </select>
				</div>
			</div>
            
            <div class="form-group type_bd type_2" style="display:none;">
				<label for="input-url" class="col-sm-2 control-label"><span class="form-required">*</span>上传视频</label>
				<div class="col-md-6 col-sm-10">
					<input class="form-control" id="js-file-input3" type="text" name="type_video" style="width: 300px;display: inline-block;" title="文件名称">
                    <a href="javascript:uploadOne('文件上传','#js-file-input3','video');">上传文件</a>MP4格式
				</div>
			</div>
            
            <div class="form-group type_bd type_3" style="display:none;">
				<label for="input-url" class="col-sm-2 control-label"><span class="form-required">*</span>上传语音</label>
				<div class="col-md-6 col-sm-10">
					<input class="form-control" id="js-file-input4" type="text" name="type_audio" style="width: 300px;display: inline-block;" title="文件名称">
                    <a href="javascript:uploadOne('文件上传','#js-file-input4','audio');">上传文件</a>MP3格式 WAV格式
				</div>
			</div>
            
            <?php endif; ?>
            
            <div class="form-group">
				<label for="input-name" class="col-sm-2 control-label"><span class="form-required">*</span>获取方式</label>
				<div class="col-md-6 col-sm-10">
					<select class="form-control" name="paytype" id="paytype">
                        <?php if(is_array($paytypes) || $paytypes instanceof \think\Collection || $paytypes instanceof \think\Paginator): $i = 0; $__LIST__ = $paytypes;if( count($__LIST__)==0 ) : echo "" ;else: foreach($__LIST__ as $key=>$v): $mod = ($i % 2 );++$i;?>
                        <option value="<?php echo $key; ?>"><?php echo $v; ?></option>
                        <?php endforeach; endif; else: echo "" ;endif; ?>
                    </select>
				</div>
			</div>
            
            <div class="form-group" id="paytype_val" style="display:none;">
				<label for="input-payval" class="col-sm-2 control-label"><span class="form-required">*</span>价格/密码</label>
				<div class="col-md-6 col-sm-10">
					<input type="text" class="form-control" id="input-payval" name="payval"> 添加价格时最多保留2位小数
				</div>
			</div>
            <?php if($sort == 1): ?>
            <div class="form-group paytype_bd paytype_1" style="display:none;">
				<label for="input-name" class="col-sm-2 control-label"><span class="form-required"></span>是否含有教材</label>
				<div class="col-md-6 col-sm-10">
					<select class="form-control" name="ismaterial" id="ismaterial">
                        <option value="0">否</option>
                        <option value="1">是</option>
                    </select>
				</div>
			</div>
            <div class="form-group">
				<label for="input-name" class="col-sm-2 control-label"><span class="form-required"></span>课程模式</label>
				<div class="col-md-6 col-sm-10">
					<select class="form-control" name="mode" id="mode">
                        <?php if(is_array($modes) || $modes instanceof \think\Collection || $modes instanceof \think\Paginator): $i = 0; $__LIST__ = $modes;if( count($__LIST__)==0 ) : echo "" ;else: foreach($__LIST__ as $key=>$v): $mod = ($i % 2 );++$i;?>
                        <option value="<?php echo $key; ?>"><?php echo $v; ?></option>
                        <?php endforeach; endif; else: echo "" ;endif; ?>
                    </select>  
                    自由模式可随时学习任意课时，解锁模式需按照课时顺序学习
				</div>
			</div>
            <?php endif; if($sort == 0): ?>
            <div id="paytype_bd" style="display:none;">
                <div class="form-group">
                    <label for="input-name" class="col-sm-2 control-label"><span class="form-required"></span>试学</label>
                    <div class="col-md-6 col-sm-10">
                        <select class="form-control" name="trialtype" id="trialtype">
                            <?php if(is_array($trialtypes) || $trialtypes instanceof \think\Collection || $trialtypes instanceof \think\Paginator): $i = 0; $__LIST__ = $trialtypes;if( count($__LIST__)==0 ) : echo "" ;else: foreach($__LIST__ as $key=>$v): $mod = ($i % 2 );++$i;?>
                            <option value="<?php echo $key; ?>"><?php echo $v; ?></option>
                            <?php endforeach; endif; else: echo "" ;endif; ?>
                        </select>
                    </div>
                </div>
                
                <div class="form-group trialtype_bd" id="trialval_2" style="display:none;">
                    <label for="input-trialval_2" class="col-sm-2 control-label"><span class="form-required">*</span>时间进度</label>
                    <div class="col-md-6 col-sm-10">
                        <input type="text" class="form-control" id="input-trialval_2" name="trialval_2">秒 开始的多少秒可看
                    </div>
                </div>
                <div class="form-group trialtype_bd" id="trialval_1" style="display:none;">
                    <label for="input-trialval_1" class="col-sm-2 control-label"><span class="form-required">*</span>进度</label>
                    <div class="col-md-6 col-sm-10">
                        <input type="text" class="form-control" id="input-trialval_1" name="trialval_1">%  范围：1-99
                    </div>
                </div>
            </div>
            <?php endif; ?>
            
            <div class="form-group">
				<label for="input-name" class="col-sm-2 control-label"><span class="form-required">*</span>状态</label>
				<div class="col-md-6 col-sm-10">
					<select class="form-control" name="status" id="status">
                        <option value="1">立即上架</option>
                        <option value="-1">暂不上架</option>
                        <option value="2">定时上架</option>
                    </select>
				</div>
			</div>
            
            <div class="form-group status_bd">
				<label for="input-shelvestime" class="col-sm-2 control-label"><span class="form-required">*</span>上架时间</label>
				<div class="col-md-6 col-sm-10">
					<input type="text" class="form-control js-bootstrap-datetime" id="input-shelvestime" name="shelvestime"  aria-invalid="false" autocomplete="off" > 格式：2020-01-01 00:00:00
				</div>
			</div>
            
            <?php if($sort == 2 || $sort == 3): ?>
            <div class="form-group">
				<label for="input-starttime" class="col-sm-2 control-label"><span class="form-required">*</span>上课时间</label>
				<div class="col-md-6 col-sm-10">
					<input type="text" class="form-control js-bootstrap-datetime" id="input-starttime" name="starttime"  aria-invalid="false" autocomplete="off" > 格式：2020-01-01 00:00:00
				</div>
			</div>
            
            <div class="form-group">
				<label for="input-endtime" class="col-sm-2 control-label"><span class="form-required">*</span>下课时间</label>
				<div class="col-md-6 col-sm-10">
					<input type="text" class="form-control js-bootstrap-datetime" id="input-endtime" name="endtime"  aria-invalid="false" autocomplete="off" > 格式：2020-01-01 00:00:00
				</div>
			</div>
            <div class="form-group">
				<label for="input-intr" class="col-sm-2 control-label"><span class="form-required"></span>听课指南</label>
				<div class="col-md-6 col-sm-10">
					<textarea class="form-control" name="intr" style="height: 50px;" maxlength="200"></textarea> 留空为显示默认指南 最多200字
				</div>
			</div>
            <?php endif; ?>
            
            
            
            <div class="form-group">
				<label for="input-name" class="col-sm-2 control-label"><span class="form-required">*</span>介绍</label>
				<div class="col-md-6 col-sm-10">
					<script type="text/plain" id="info" name="info"></script>  学员购买前可看
				</div>
			</div>
            
            <?php if($sort == 0): ?>
            <div class="form-group">
				<label for="input-name" class="col-sm-2 control-label"><span class="form-required">*</span>详情</label>
				<div class="col-md-6 col-sm-10">
					<script type="text/plain" id="content" name="content"></script>
				</div>
			</div>
            <?php endif; ?>
            
            
			<div class="form-group">
				<div class="col-sm-offset-2 col-sm-10">
                    <input type="hidden" name="sort" value="<?php echo $sort; ?>" />
					<button type="submit" class="btn btn-primary js-ajax-submit"><?php echo lang('ADD'); ?></button>
					<a class="btn btn-default" href="javascript:history.back(-1);"><?php echo lang('BACK'); ?></a>
				</div>
			</div>
            
		</form>
	</div>
	<script src="/static/js/admin.js"></script>
    <script type="text/javascript">
        //编辑器路径定义
        var editorURL = GV.WEB_ROOT;
    </script>
    <script type="text/javascript" src="/static/js/ueditor/ueditor.config.js"></script>
    <script type="text/javascript" src="/static/js/ueditor/ueditor.all.min.js"></script>
    <script type="text/javascript">
        $(function () {
            Wind.use('layer');
            
            $('.btn-cancel-thumbnail').click(function () {
                $('#thumbnail-preview').attr('src', '/themes/admin_simpleboot3/public/assets/images/default-thumbnail.png');
                $('#thumbnail').val('');
            });
            editorcontent = new baidu.editor.ui.Editor();
            editorcontent.render('content');
            try {
                editorcontent.sync();
            } catch (err) {
            }
            
            editorcontent2 = new baidu.editor.ui.Editor();
            editorcontent2.render('info');
            try {
                editorcontent2.sync();
            } catch (err) {
            }
            
            
            var sort='<?php echo $sort; ?>';
            /* 内容方式处理 */
            function type_change(){
                var type=$('#type').val();
                $('.type_bd').hide();
                $('.type_'+type).show();
                
                $('.trialtype_bd').hide();
                if(type!=1){
                    type=2;
                }

                $('#trialval_'+type).show();
            }
            $("#type").on('change',function(){
                type_change();
            })
            type_change();
            
            /* 获取方式处理 */
            function paytype_change(){
                var paytype=$('#paytype').val();
                $('.paytype_bd').hide();
                $('.paytype_'+paytype).show();
                if(paytype==0){
                    $('#paytype_val').hide();
                    $('#input-payval').val('');
                    $('#paytype_bd').hide();
                }else{
                    $('#paytype_val').show();
                    $('#paytype_bd').show();
                }
                if(paytype==2 && sort==0){
                    $('#paytype_bd').hide();
                }
            }
            $("#paytype").on('change',function(){
                paytype_change();
            })
            paytype_change();
            
            /* 试学方式处理 */
            function trialtype_change(){
                var trialtype=$('#trialtype').val();
                var type=$('#type').val();
                if(trialtype==0){
                    $('.trialtype_bd').hide();
                }else{
                    $('.trialtype_bd').hide();
                    if(type!=1){
                        type=2;
                    }
                    $('#trialval_'+type).show();
                }
            }
            $("#trialtype").on('change',function(){
                trialtype_change();
            })
            trialtype_change();
            
            
            /* 上架处理 */
            function status_change(){
                var status=$('#status').val();
                if(status==2){
                    $('.status_bd').show();
                }else{
                    $('.status_bd').hide();
                }
            }
            $("#status").on('change',function(){
                status_change();
            })
            status_change();
            
            function getUserList(_this,uid=0){
                $.ajax({
                    url:'/admin/Course/getUserList',
                    type:'POST',
                    data:{uid:uid},
                    dataType:'json',
                    error:function(e){
                        layer.msg('网络错误');
                    },
                    success:function(data){
                        if(data.code==0){
                            layer.msg(data.msg);
                            return !1;
                        }
                        
                        var html='';
                        var list=data.data;
                        var nums=list.length;
                        for(var i=0;i<nums;i++){
                            var v=list[i];
                            html+='<li data-uid='+v.id+'>'+v.user_nickname+'</li>'
                        }
                        
                        _this.siblings('.userlist').find('ul').html(html);
                        _this.siblings('.userlist').show();
                    }
                })
            }
            
            var rm=null;
            $(".getuid").bind('focus',function(){
                if(rm){
                    clearTimeout(rm);
                    rm=null;
                }
                var _this=$(this);
                getUserList(_this);
    　　　　});
    
            $(".getuid").bind('blur',function(){
                var _this=$(this);
                setTimeout(function(){
                    _this.siblings('.userlist').hide();
                },100)
    　　　　});
            
            $(".getuid").bind('input porpertychange',function(){
                if(rm){
                    clearTimeout(rm);
                    rm=null;
                }
                var _this=$(this);
                var uid=$(this).val();
                getUserList(_this,uid);
    　　　　});
    
            $(".userlist").on('click','li',function(){
                var _this=$(this);
                var uid=_this.data('uid');
                var list=_this.parents('.userlist');
                list.siblings(".getuid").val(uid);
                list.hide();
    　　　　});
            
        });
    </script>
</body>
</html>