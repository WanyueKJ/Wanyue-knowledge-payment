<?php /*a:2:{s:89:"/www/wwwroot/demo.sdwanyue.com/themes/admin_simpleboot3/portal/admin_category/select.html";i:1602491838;s:74:"/www/wwwroot/demo.sdwanyue.com/themes/admin_simpleboot3/public/header.html";i:1602491838;}*/ ?>
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
</head>
<body>
<div class="wrap js-check-wrap">
    <form method="post" class="js-ajax-form" action="<?php echo url('AdminCategory/listorders'); ?>">
        <table class="table table-hover table-bordered table-list">
            <thead>
            <tr>
                <th width="16">
                    <label>
                        <input type="checkbox" class="js-check-all" data-direction="x" data-checklist="js-check-x">
                    </label>
                </th>
                <th width="50">ID</th>
                <th>分类名称</th>
            </tr>
            </thead>
            <tbody>
            <!--
            <?php if(is_array($categories) || $categories instanceof \think\Collection || $categories instanceof \think\Paginator): if( count($categories)==0 ) : echo "" ;else: foreach($categories as $key=>$vo): ?>
                <tr>
                    <td>
                        <?php $checked = in_array($vo['id'],$selectedIds)?'checked':''; ?>
                        <input type="checkbox" class="js-check" data-yid="js-check-y" data-xid="js-check-x" name="ids[]"
                               value="<?php echo $vo['id']; ?>" data-name="<?php echo $vo['name']; ?>" <?php echo $checked; ?>>
                    </td>
                    <td><?php echo $vo['id']; ?></td>
                    <td><?php echo $vo['name']; ?></td>
                    <td><?php echo $vo['description']; ?></td>
                </tr>
            <?php endforeach; endif; else: echo "" ;endif; ?>
            -->
            <?php echo $categories_tree; ?>
            </tbody>
        </table>
    </form>
</div>
<script src="/static/js/admin.js"></script>
<script>
    $('.data-item-tr').click(function (e) {

        console.log(e);
        var $this = $(this);
        if ($(e.target).is('input')) {
            return;
        }

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