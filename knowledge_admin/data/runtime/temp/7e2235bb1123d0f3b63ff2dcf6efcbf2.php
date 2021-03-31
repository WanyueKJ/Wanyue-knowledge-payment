<?php /*a:2:{s:103:"D:\My_project\wanyue_education_web_local\education_web/themes/admin_simpleboot3/admin\question\add.html";i:1602491837;s:98:"D:\My_project\wanyue_education_web_local\education_web/themes/admin_simpleboot3/public\header.html";i:1602491837;}*/ ?>
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
	.hide2{
		display: none;
	}
	.item_select{}
	.item_select .form-control{
		display: inline-block;
		margin-left: 10px;
		margin-bottom: 10px;
		width: 80%;
	}

	.item_span input[type='checkbox'],.item_span input[type='radio']{
		display: none;
		visibility: hidden;
	}

	.item_span input+label{
		display: inline-block;
		margin: 5px;
		width: 34px;
		height: 34px;
		line-height: 34px;
		text-align: center;
		color: #969696;
		font-size: 16px;
		border: 1px solid #DCDCDC;
		border-radius: 50%;
		cursor: pointer;
	}
	.item_span[data-type='0'] input+label{
		width: 40px;
		border-radius: unset;
	}
	.item_span input:checked +label{
		color: #ffffff;
		border: 1px solid #38DAA6;
		background: #38DAA6;
	}

	.span_add{
		display: inline-block;
		margin-bottom: 5px;
		width: 74px;
		height: 34px;
		line-height: 34px;
		text-align: center;
		color: #38DAA6;
		font-size: 14px;
		border: 1px solid #38DAA6;
		border-radius: 4px;
		cursor: pointer;
	}

	.span_add.no{
		color: #C8C8C8;
		border: 1px solid #C8C8C8;
	}
	.checkbd{
		display: inline-block;
	}
	textarea.form-control{
		margin-bottom: 10px;
	}
</style>
</head>
<body>
	<div class="wrap">
		<ul class="nav nav-tabs">
			<li ><a href="<?php echo url('question/index'); ?>">列表</a></li>
			<li class="active"><a ><?php echo lang('ADD'); ?></a></li>
		</ul>
		<form method="post" class="form-horizontal js-ajax-form margin-top-20" action="<?php echo url('question/addPost'); ?>">

			<div class="form-group">
				<label for="classid" class="col-sm-2 control-label"><span class="form-required">*</span>分类</label>
				<div class="col-md-6 col-sm-10">
					<select class="form-control" name="classid" id="classid">
						<?php if(is_array($class) || $class instanceof \think\Collection || $class instanceof \think\Paginator): $i = 0; $__LIST__ = $class;if( count($__LIST__)==0 ) : echo "" ;else: foreach($__LIST__ as $key=>$v): $mod = ($i % 2 );++$i;?>
							<option value="<?php echo $v['id']; ?>"><?php echo $v['name']; ?></option>
						<?php endforeach; endif; else: echo "" ;endif; ?>
					</select>
				</div>
			</div>

			<div class="form-group">
				<label for="type" class="col-sm-2 control-label"><span class="form-required">*</span>类型</label>
				<div class="col-md-6 col-sm-10">
					<select class="form-control" name="type" id="type">
						<?php if(is_array($type) || $type instanceof \think\Collection || $type instanceof \think\Paginator): $i = 0; $__LIST__ = $type;if( count($__LIST__)==0 ) : echo "" ;else: foreach($__LIST__ as $key=>$v): $mod = ($i % 2 );++$i;?>
							<option value="<?php echo $key; ?>"><?php echo $v; ?></option>
						<?php endforeach; endif; else: echo "" ;endif; ?>
					</select>
				</div>
			</div>
			<div class="form-group">
				<label for="input-title" class="col-sm-2 control-label"><span class="form-required">*</span>题目</label>
				<div class="col-md-6 col-sm-10">
					<input type="text" class="form-control" id="input-title" name="title">
				</div>
			</div>

			<div class="form-group hide2" id="item_select_1">
				<label for="input-title" class="col-sm-2 control-label"><span class="form-required">*</span>选项</label>
				<div class="col-md-6 col-sm-10">
					<div class="item_select"> A. <input type="text" class="form-control" name="item_select[]"></div>
					<div class="item_select"> B. <input type="text" class="form-control" name="item_select[]"></div>
					<div class="item_select"> C. <input type="text" class="form-control" name="item_select[]"></div>
					<div class="item_select"> D. <input type="text" class="form-control" name="item_select[]"></div>
					<div class="add_bd">
						<div class="span_add add_1_1">添加选项</div>
						<div class="span_add no add_1_0">减少选项</div>
					</div>

				</div>
			</div>

			<div class="form-group hide2" id="item_select_3">
				<label for="input-title" class="col-sm-2 control-label"><span class="form-required">*</span>补充图片</label>
				<div class="col-md-6 col-sm-10">
					<input type="hidden" name="img" id="thumbnail" value="">
					<a href="javascript:uploadOneImage('图片上传','#thumbnail');">
						<img src="/themes/admin_simpleboot3/public/assets/images/default-thumbnail.png"
							 id="thumbnail-preview"
							 style="cursor: pointer;max-width:100px;max-height:100px;"/>
					</a>
					<input type="button" class="btn btn-sm btn-cancel-thumbnail" value="取消图片">
				</div>
			</div>

			<div class="form-group">
				<label for="input-title" class="col-sm-2 control-label"><span class="form-required">*</span>答案</label>
				<div class="col-md-6 col-sm-10">
					<div class="item_span" id="item_select_a_0" data-type="0">
						<input type="radio" id="ans_0_1" class="test" name="ans_0" value="1">
						<label for="ans_0_1">对</label>
						<input type="radio" id="ans_0_0" class="test" name="ans_0" value="0">
						<label for="ans_0_0">错</label>
					</div>
					<div class="item_span hide2" id="item_select_a_1" data-type="1">
						<div class="checkbd">
							<input type="radio" id="ans_1_0" name="ans_1" value="0">
							<label for="ans_1_0">A</label>
						</div>
						<div class="checkbd">
							<input type="radio" id="ans_1_1" name="ans_1" value="1">
							<label for="ans_1_1">B</label>
						</div>
						<div class="checkbd">
							<input type="radio" id="ans_1_2" name="ans_1" value="2">
							<label for="ans_1_2">C</label>
						</div>
						<div class="checkbd">
							<input type="radio" id="ans_1_3" name="ans_1" value="3">
							<label for="ans_1_3">D</label>
						</div>

					</div>
					<div class="item_span hide2" id="item_select_a_2" data-type="2">
						<div class="checkbd">
							<input type="checkbox" id="ans_2_0" name="ans_2[]" value="0">
							<label for="ans_2_0">A</label>
						</div>
						<div class="checkbd">
							<input type="checkbox" id="ans_2_1" name="ans_2[]" value="1">
							<label for="ans_2_1">B</label>
						</div>
						<div class="checkbd">
							<input type="checkbox" id="ans_2_2" name="ans_2[]" value="2">
							<label for="ans_2_2">C</label>
						</div>
						<div class="checkbd">
							<input type="checkbox" id="ans_2_3" name="ans_2[]" value="3">
							<label for="ans_2_3">D</label>
						</div>
					</div>
					<div class="item_span hide2" id="item_select_a_5" data-type="5">
						<div class="checkbd">
							<input type="checkbox" id="ans_5_0" name="ans_5[]" value="0">
							<label for="ans_5_0">A</label>
						</div>
						<div class="checkbd">
							<input type="checkbox" id="ans_5_1" name="ans_5[]" value="1">
							<label for="ans_5_1">B</label>
						</div>
						<div class="checkbd">
							<input type="checkbox" id="ans_5_2" name="ans_5[]" value="2">
							<label for="ans_5_2">C</label>
						</div>
						<div class="checkbd">
							<input type="checkbox" id="ans_5_3" name="ans_5[]" value="3">
							<label for="ans_5_3">D</label>
						</div>
					</div>
					<div class="item_input hide2" id="item_select_a_4" data-type="4">
						<textarea class="form-control" name="ans_4[]"></textarea>
						<div class="add_bd">
							<div class="span_add add_4_1">添加填空</div>
							<div class="span_add add_4_2 no" style="display: none">减少填空</div>
						</div>

					</div>

					<div class="item_text hide2" id="item_select_a_3" data-type="3">
						<textarea class="form-control" name="ans_3" maxlength="200"></textarea>
						<br>
						<input type="hidden" name="img_a" id="thumbnail2" value="">
						<a href="javascript:uploadOneImage('图片上传','#thumbnail2');">
							<img src="/themes/admin_simpleboot3/public/assets/images/default-thumbnail.png"
								 id="thumbnail2-preview"
								 style="cursor: pointer;max-width:100px;max-height:100px;"/>
						</a>
						<input type="button" class="btn btn-sm btn-cancel-thumbnail2" value="取消图片">
					</div>
				</div>
			</div>

			<div class="form-group" id="score1">
				<label for="input-score" class="col-sm-2 control-label"><span class="form-required">*</span>分数</label>
				<div class="col-md-6 col-sm-10">
					<input type="text" class="form-control" id="input-score" name="score">
				</div>
			</div>

			<div class="form-group hide2" id="score2">
				<label for="input-score2" class="col-sm-2 control-label"><span class="form-required">*</span>每空分数</label>
				<div class="col-md-6 col-sm-10">
					<input type="text" class="form-control" id="input-score2" name="score2">
				</div>
			</div>

			<div class="form-group hide2" id="score3">
				<label for="input-score3" class="col-sm-2 control-label"><span class="form-required">*</span>漏选分数</label>
				<div class="col-md-6 col-sm-10">
					<input type="text" class="form-control" id="input-score3" name="score3">
				</div>
			</div>

			<div class="form-group">
				<div class="col-sm-offset-2 col-sm-10">
					<button type="submit" class="btn btn-primary js-ajax-submit"><?php echo lang('ADD'); ?></button>
					<a class="btn btn-default" href="javascript:history.back(-1);"><?php echo lang('BACK'); ?></a>
				</div>
			</div>
            
		</form>
	</div>
	<script src="/static/js/admin.js"></script>
	<script>
		(function (){

			$('.btn-cancel-thumbnail').click(function () {
				$('#thumbnail-preview').attr('src', '/themes/admin_simpleboot3/public/assets/images/default-thumbnail.png');
				$('#thumbnail').val('');
			});

			$('.btn-cancel-thumbnail2').click(function () {
				$('#thumbnail2-preview').attr('src', '/themes/admin_simpleboot3/public/assets/images/default-thumbnail.png');
				$('#thumbnail2').val('');
			});

			$('#type').on('change',function (){
				let _that=$(this);
				let type=_that.val();
				let obj=$('#item_select_a_'+type);
				obj.siblings().hide();
				obj.show();

				if(type==1 || type==2 || type==5){
					$('#item_select_1').show();
				}else{
					$('#item_select_1').hide();
				}

				if(type==3){
					$('#item_select_3').show();
				}else{
					$('#item_select_3').hide();
				}
				if(type==1 || type==2 || type==0 || type==3){
					$('#score1').show();
					$('#score2').hide();
					$('#score3').hide();
				}

				if(type==4){
					$('#score1').hide();
					$('#score2').show();
					$('#score3').hide();
				}

				if(type==5){
					$('#score1').show();
					$('#score2').hide();
					$('#score3').show();
				}

			})

			const select_list=['A','B','C','D','E','F','G','H','I','J','K','L','M','N'];

			function checkSelects(){
				let list=$('#item_select_1').find('.item_select');
				if(list.length>1){
					$('.add_1_0').show();
				}else{
					$('.add_1_0').hide();
				}

				if(list.length>13){
					$('.add_1_1').hide();
				}else{
					$('.add_1_1').show();
				}
			}
			$('.add_1_1').on('click',function (){
				let _that=$(this);
				let list=$('#item_select_1').find('.item_select');
				let nums=list.length;
				if(nums>13){
					return !1;
				}
				let select=select_list[nums];
				let html='<div class="item_select"> '+select+'. <input type="text" class="form-control" name="item_select[]"></div>';
				_that.parent().before(html);
				checkSelects();

				let html1='<div class="checkbd"><input type="radio" id="ans_1_'+nums+'" name="ans_1" value="'+nums+'"><label for="ans_1_'+nums+'">'+select+'</label></div>';
				let html2='<div class="checkbd"><input type="checkbox" id="ans_1_'+nums+'" name="ans_2[]" value="'+nums+'"><label for="ans_1_'+nums+'">'+select+'</label></div>';
				let html5='<div class="checkbd"><input type="checkbox" id="ans_5_'+nums+'" name="ans_5[]" value="'+nums+'"><label for="ans_5_'+nums+'">'+select+'</label></div>';

				$('#item_select_a_1').append(html1);
				$('#item_select_a_2').append(html2);
				$('#item_select_a_5').append(html5);
			})

			$('.add_1_0').on('click',function (){
				let list=$('#item_select_1').find('.item_select');
				let nums=list.length;
				if(nums==1){
					checkSelects();
					return !1;
				}
				list.eq(nums-1).remove();
				checkSelects();

				$('#item_select_a_1').find('.checkbd:last-child').remove();
				$('#item_select_a_2').find('.checkbd:last-child').remove();
				$('#item_select_a_5').find('.checkbd:last-child').remove();
			})

			function checkInputs(){
				let list=$('#item_select_a_4').find('textarea');
				if(list.length>1){
					$('.add_4_2').show();
				}else{
					$('.add_4_2').hide();
				}
			}
			$('.add_4_1').on('click',function (){
				let _that=$(this);
				let html='<textarea class="form-control" name="ans_4[]"></textarea>';
				_that.parent().before(html);
				checkInputs();
			})

			$('.add_4_2').on('click',function (){
				let _that=$(this);
				let list=$('#item_select_a_4').find('textarea');
				let nums=list.length;
				if(nums==1){
					checkInputs();
					return !1;
				}
				list.eq(nums-1).remove();
				checkInputs();
			})
		})()
    </script>
</body>
</html>