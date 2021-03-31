<?php /*a:2:{s:85:"/www/wwwroot/demo.sdwanyue.com/themes/admin_simpleboot3/admin/main/deal_analysis.html";i:1604305622;s:74:"/www/wwwroot/demo.sdwanyue.com/themes/admin_simpleboot3/public/header.html";i:1602491838;}*/ ?>
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

<META HTTP-EQUIV="pragma" CONTENT="no-cache">
<META HTTP-EQUIV="Cache-Control" CONTENT="no-cache, must-revalidate">
<META HTTP-EQUIV="expires" CONTENT="0">

<link rel="stylesheet" href="/static/css/iconfont.css">
<link rel="stylesheet" href="/static/css/main.css">

<style type="text/css">
    .bd_deal_echarts {
        width: 50%;
        float: left;
    }

    .wrapper-info:after {
        content: '';
        display: block;
        width: 0px;
        height: 0px;
        clear: left;
    }

    .right_table {
        width: 48%;
        float: left;
    }

    .right_table table {
        width: 100%;
    }

    .right_table table tr td,
    .right_table table tr th {
        color: #969696;
        text-align: right;
    }

    .right_table table tr th {
        color: #000000;
    }

    .right_table table tr td:nth-child(1) {
        text-align: left;
    }

</style>


</head>

<!--交易分析-->
<body>
<div class="wrap">
    <?php if(!extension_loaded('fileinfo')): ?>
        <div class="grid-item col-md-12">
            <div class="alert alert-danger alert-dismissible fade in" role="alert" style="margin-bottom: 0;">
                <button type="button" class="close" data-dismiss="alert" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                </button>
                <strong>提示!</strong> php_fileinfo扩展没有开启，无法正常上传文件！
            </div>
        </div>
    <?php endif; ?>

    <div class="statistics basic">
        <div class="bd">
            <div class="bd_title">
                <div class="dropdown">
                    <div class="dropdown_list">
                        <ul>
                            <li data-type="1">
                                <a href="<?php echo url('admin/main/dataview'); ?>">数据概况</a>
                            </li>
                            <li data-type="2" <?php if($focus_flag == 'deal_anal'): ?>class='focus_li'<?php endif; ?> >
                                <a href="<?php echo url('admin/main/dealanalysis'); ?>">交易分析</a>
                            </li>
                            <li data-type="3">
                                <a href="<?php echo url('admin/main/goodsanalysis'); ?>">商品分析</a>
                            </li>
                            <li data-type="4">
                                <a href="<?php echo url('admin/main/index'); ?>">用户分析</a>
                            </li>
                        </ul>
                    </div>
                </div>

                <div class="data_select">
                    <h4>交易构成</h4>
                    <div id="search-date">
                        <span class="iconfont icon-riqi"></span>
                        <input class="js-bootstrap-date" id="range-input" type="text" name="range"
                               value="<?php echo date('Y-m-d',time()); ?>">
                    </div>
                </div>
            </div>

            <div class="wrapper-info clear">

                <!--左上方echarts统计区域 交易构成-->
                <div class="bd_deal_echarts">
                    <div class="echarts-wrap">
                        <div id="echarts_basic" style="width:100%;height:300px;"></div>
                    </div>

                </div>

                <!--右上方统计表格(老付费用户 新付费用户)-->
                <div class="right_table clear">
                    <table class="table table-hover table-bordered pay-users">
                        <thead>
                        <tr>
                            <th align="center"></th>
                            <th align="center">结算金额(元)</th>
                            <th align="center">较前一月涨幅</th>
                            <th align="center">用户数</th>
                            <th align="center">较前一月涨幅</th>
                        </tr>
                        </thead>
                        <tbody>

                            <tr>
                                <td>老付费用户</td>
                                <td class="user-num-all">0</td>
                                <td><span class="ratio-all">0</span>%</td>
                                <td class="unit-price-all">0</td>
                                <td><span class="settlement-rate-all">0</span>%</td>
                            </tr>
                            <tr>
                                <td>新付费用户</td>
                                <td class="user-num-new">0</td>
                                <td><span class="ratio-new">0</span>%</td>
                                <td class="unit-price-new">0</td>
                                <td><span class="settlement-rate-new">0</span>%</td>
                            </tr>

                        </tbody>
                    </table>

                </div>

            </div>


            <!-- 订单金额分布echarts图-->
            <div class="target">
                <div class="data_select">
                    <h4>订单金额分布</h4>
                </div>
                <div id="echarts_trade_no" style="width:100%;height:300px;"></div>
            </div>

        </div>
    </div>

</div>


<script src="/static/js/admin.js"></script>
<script src="/static/js/echarts/echarts.min.js"></script>
<script src="/static/js/deal_analysis.js"></script>



</body>
</html>






