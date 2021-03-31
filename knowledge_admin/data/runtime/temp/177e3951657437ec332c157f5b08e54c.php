<?php /*a:2:{s:91:"D:\My_project\Wanyue-knowledge-payment-admin/themes/admin_htcyltd/admin\rbac\authorize.html";i:1610334311;s:84:"D:\My_project\Wanyue-knowledge-payment-admin/themes/admin_htcyltd/public\header.html";i:1609814284;}*/ ?>
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
<style>html {background-color: #ffffff;}.expander{margin-left: -20px;}.layui-table[lay-skin="nob"] td{border: none;}.layui-unselect{
		margin-top: 0px !important;
	}</style>
</head>
<body>
<div class="js-check-wrap">
	<form class="layui-form js-ajax-form"  action="<?php echo url('rbac/authorizePost'); ?>" method="post" style="">
		<div class="layui-form-item">
			<table class="layui-table" lay-size="sm" lay-skin="nob" lay-even id="authrule-tree">
				<tbody><?php echo $category; ?></tbody>
			</table>
		</div>
		<div class="layui-form-item">
			<div class="layui-input-block">
				<input type="hidden" name="roleId" value="<?php echo $roleId; ?>" />
				<button class="layui-btn js-ajax-submit js-close" id="js-ajax-submit" type="submit"><?php echo lang('SAVE'); ?></button>
			</div>
		</div>
	</form>
</div>
<script src="/static/js/admin.js"></script>
<script src="/static/js/wind.js"></script>
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