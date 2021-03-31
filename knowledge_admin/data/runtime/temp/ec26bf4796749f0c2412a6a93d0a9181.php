<?php /*a:2:{s:81:"/www/wwwroot/demo.sdwanyue.com/themes/admin_simpleboot3/admin/rbac/authorize.html";i:1602491838;s:74:"/www/wwwroot/demo.sdwanyue.com/themes/admin_simpleboot3/public/header.html";i:1602491838;}*/ ?>
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
<style>.expander{margin-left: -20px;}</style>
</head>
<body>
	<div class="wrap js-check-wrap">
		<ul class="nav nav-tabs">
			<li><a href="<?php echo url('rbac/index'); ?>"><?php echo lang('ADMIN_RBAC_INDEX'); ?></a></li>
			<li><a href="<?php echo url('rbac/roleAdd'); ?>"><?php echo lang('ADMIN_RBAC_ROLEADD'); ?></a></li>
			<li class="active"><a href="javascript:;"><?php echo lang('ADMIN_RBAC_AUTHORIZE'); ?></a></li>
		</ul>
		<form class="js-ajax-form margin-top-20"  action="<?php echo url('rbac/authorizePost'); ?>" method="post">
			<div class="table_full">
				<table class="table table-bordered" id="authrule-tree">
					<tbody>
						<?php echo $category; ?>
					</tbody>
				</table>
			</div>
			<div class="form-actions">
				<input type="hidden" name="roleId" value="<?php echo $roleId; ?>" />
				<button class="btn btn-primary js-ajax-submit" type="submit"><?php echo lang('SAVE'); ?></button>
				<a class="btn btn-default" href="<?php echo url('admin/rbac/index'); ?>"><?php echo lang('BACK'); ?></a>
			</div>
		</form>
	</div>
	<script src="/static/js/admin.js"></script>
	<script type="text/javascript">
	$(document).ready(function () {
		Wind.css('treeTable');
	    Wind.use('treeTable', function () {
	        $("#authrule-tree").treeTable({
	            indent: 20
	        });
	    });
	});

    function checknode(obj) {
        var chk = $("input[type='checkbox']");
        var count = chk.length;

        var num = chk.index(obj);
        var level_top = level_bottom = chk.eq(num).attr('level');
        for (var i = num; i >= 0; i--) {
            var le = chk.eq(i).attr('level');
            if (le <level_top) {
                chk.eq(i).prop("checked", true);
                var level_top = level_top - 1;
            }
        }
        for (var j = num + 1; j < count; j++) {
            var le = chk.eq(j).attr('level');
            if (chk.eq(num).prop("checked")) {

                if (le > level_bottom){
                    chk.eq(j).prop("checked", true);
                }
                else if (le == level_bottom){
                    break;
                }
            } else {
                if (le >level_bottom){
                    chk.eq(j).prop("checked", false);
                }else if(le == level_bottom){
                    break;
                }
            }
        }
    }
	</script>
</body>
</html>