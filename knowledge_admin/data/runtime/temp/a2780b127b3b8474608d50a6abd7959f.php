<?php /*a:2:{s:85:"/www/wwwroot/demo.sdwanyue.com/themes/admin_htcyltd/portal/admin_category/select.html";i:1586174830;s:70:"/www/wwwroot/demo.sdwanyue.com/themes/admin_htcyltd/public/header.html";i:1609814284;}*/ ?>
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
</head>
<body>
<div class="js-check-wrap">
    <form method="post" class="layui-form js-ajax-form" action="<?php echo url('AdminCategory/listorders'); ?>">
        <table class="layui-table" id="menus-table" lay-even lay-skin="nob" lay-size="lg">
            <thead>
            <tr>
                <th width="16">
                    <input lay-skin="primary" lay-filter="js-check-all" type="checkbox" class="js-check-all" data-direction="x" data-checklist="js-check-x">
                </th>
                <th width="50">ID</th>
                <th>分类名称</th>
            </tr>
            </thead>
            <tbody>
            <?php echo $categories_tree; ?>
            </tbody>
        </table>
    </form>
</div>
<script src="/static/js/admin.js"></script>
<script>
    $('.data-item-tr').click(function (e) {

        console.log(e);
        var $input = $this.find('input');
        if ($input.is(':checked')) {
            $input.prop('checked', false);
        } else {
            $input.prop('checked', true);
        }
    });

    function confirm() {
        var selectedCategoriesId   = [];
        var selectedCategoriesName = [];
        var selectedCategories     = [];
        $('.js-check:checked').each(function () {
            var $this = $(this);
            selectedCategoriesId.push($this.val());
            selectedCategoriesName.push($this.data('name'));

            selectedCategories.push({
                id: $this.val(),
                name: $this.data('name')
            });
        });

        return {
            selectedCategories: selectedCategories,
            selectedCategoriesId: selectedCategoriesId,
            selectedCategoriesName: selectedCategoriesName
        };
    }
</script>
</body>
</html>