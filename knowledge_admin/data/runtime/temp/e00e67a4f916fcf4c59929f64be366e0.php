<?php /*a:2:{s:81:"/www/wwwroot/demo.sdwanyue.com/themes/admin_simpleboot3/admin/main/data_view.html";i:1604461396;s:74:"/www/wwwroot/demo.sdwanyue.com/themes/admin_simpleboot3/public/header.html";i:1602491838;}*/ ?>
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
<link rel="stylesheet" href="/static/css/iconfont.css">
<link rel="stylesheet" href="/static/css/main.css">
<link rel="stylesheet" href="/static/css/data_view.css">

<style>
    .right-list-ul {
        width: 90%;
        margin-left: 110px;
    }
</style>

</head>

<!--数据概况-->
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
                            <li data-type="1" <?php if($focus_flag == 'data_view'): ?>class='focus_li'<?php endif; ?>>
                            <a href="<?php echo url('admin/main/dataview'); ?>">数据概况</a>

                            </li>
                            <li data-type="2">
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
                    <h4>实时概况</h4>
                </div>
            </div>

            <div class="wrapper-info">

                <!--收入数字和echarts统计区域-->
                <div class="bd_income_echarts">
                    <div class="income">
                        <div class="today-income">
                            <div class="today-income-title">今日收入(元)</div>
                            <div class="today-price"><?php echo $today_income; ?></div>
                        </div>
                        <div class="yesterday-income">
                            <div class="yesterday-income-title">昨日全天收入(元)</div>
                            <div class="yesterday-price"><?php echo $ye_income; ?></div>
                        </div>
                    </div>
                    <div class="echarts-wrap">
                        <div id="echarts_basic" style="width:100%;height:300px;"></div>
                    </div>

                </div>

                <!--右上方4个统计框-->
                <div class="right_list clear">
                    <ul class="right-list-ul">
                        <li class="active on" data-type="1">
                            <div class="basic_list_t"><span class="icon-title">访客数</span> <span class="iconfont icon-wenhao"></span></div>
                            <div class="basic_list_n"><span class="new-reg"><?php echo $today_visit; ?></span></div>
                            <div class="basic_list_c">
                                昨日全天
                                <span>
                                <span class="ratio new-ratio"><?php echo $ye_visit; ?></span>
                            </span>
                            </div>
                        </li>

                        <li class="active" data-type="2">
                            <div class="basic_list_t"><span class="icon-title">付费用户数</span> <span class="iconfont icon-wenhao"></span></div>
                            <div class="basic_list_n"><span class="new-active"><?php echo $today_pay_num; ?></span></div>
                            <div class="basic_list_c">
                                昨日全天
                                <span>
                                <span class="ratio new-active-ratio"><?php echo $ye_pay_num; ?></span>
                            </span>
                            </div>
                        </li>

                        <li class="active" data-type="4">
                            <div class="basic_list_t"><span class="icon-title">浏览量</span> <span class="iconfont icon-wenhao"></span></div>
                            <div class="basic_list_n"><span class="new-all"><?php echo $today_view; ?></span></div>
                            <div class="basic_list_c">
                                昨日全天
                                <span>
                                <span class="ratio new-all-ratio"><?php echo $ye_view; ?></span>
                            </span>
                            </div>
                        </li>

                        <li class="active" data-type="3">
                            <div class="basic_list_t"><span class="icon-title">支付订单数</span> <span class="iconfont icon-wenhao"></span></div>
                            <div class="basic_list_n"><span class="new-pay"><?php echo $today_trade_no; ?></span></div>
                            <div class="basic_list_c">
                                昨日全天
                                <span>
                                <span class="ratio new-pay-ratio"><?php echo $ye_trade_no; ?></span>
                            </span>
                            </div>
                        </li>
                    </ul>
                </div>

            </div>



            <!--运营概况区域-->
            <div class="pay-user-wrap">
                <div class="data_select">
                    <h4>运营概况</h4>
                    <div id="search-pay-date">
                        <span class="iconfont icon-riqi"></span>
                        <input class="js-bootstrap-date" id="range-yun-input" type="text" name="range"
                               value="<?php echo date('Y-m-d',time()); ?>">
                    </div>
                </div>

                <!-- 统计框区域 -->
                <div class="basic_list basic_list_yunying clear">
                    <ul>
                        <li class="active on" data-type="1">
                            <div class="basic_list_t"><span class="icon-title">结算金额(元)</span> <span class="iconfont icon-wenhao"></span></div>
                            <div class="basic_list_n"><span class="settle-money">0.00</span></div>
                            <div class="basic_list_c basic_list_c_data">
                                日环比
                                <span>
                                    <i class="settle-day-ratio-icon iconfont"></i>
                                    <span class="settle-day-new-ratio">0</span>
                                    <span>%</span>
                                </span>
                            </div>
                            <div class="basic_list_w">
                                周环比
                                <span>
                                    <i class="settle-week-ratio-icon iconfont"></i>
                                    <span class="settle-week-new-ratio">0</span>
                                    <span>%</span>
                                </span>
                            </div>

                        </li>

                        <li class="active" data-type="2">
                            <div class="basic_list_t"><span class="icon-title">访客数</span> <span class="iconfont icon-wenhao"></span></div>
                            <div class="basic_list_n"><span class="new-visit">0</span></div>
                            <div class="basic_list_c basic_list_c_data">
                                日环比
                                <span>
                                    <i class="visit-day-icon iconfont"></i>
                                    <span class="new-visit-day-num">0</span>
                                    <span>%</span>
                                </span>
                            </div>
                            <div class="basic_list_w">
                                周环比
                                <span>
                                    <i class="visit-week-icon iconfont"></i>
                                    <span class="new-visit-week-num">0</span>
                                    <span>%</span>
                                </span>
                            </div>

                        </li>

                        <li class="active" data-type="4">
                            <div class="basic_list_t"><span class="icon-title">支付转化率</span> <span class="iconfont icon-wenhao"></span></div>
                            <div class="basic_list_n">
                                <span class="new-zhuan-ratio">0%</span>
                            </div>
                            <div class="basic_list_c basic_list_c_data">
                                日环比
                                <span>
                                    <i class="new-ratio-icon-all iconfont"></i>
                                    <span class="new-zhuan-day-ratio">0%</span>
                                </span>
                            </div>
                            <div class="basic_list_w">
                                周环比
                                <span>
                                    <i class="new-ratio-icon iconfont"></i>
                                    <span class="new-zhuan-week-ratio">0%</span>
                                </span>
                            </div>

                        </li>

                        <li class="active" data-type="3">
                            <div class="basic_list_t"><span class="icon-title">客单价</span> <span class="iconfont icon-wenhao"></span></div>
                            <div class="basic_list_n"><span class="unit-price">0</span></div>
                            <div class="basic_list_c basic_list_c_data">
                                日环比
                                <span>
                                    <i class="unit-day-icon iconfont"></i>
                                    <span class="unit-day-ratio">0</span>
                                    <span>%</span>
                                </span>
                            </div>
                            <div class="basic_list_w">
                                周环比
                                <span>
                                    <i class="unit-week-icon iconfont"></i>
                                    <span class="unit-week-ratio">0</span>
                                    <span>%</span>
                                </span>
                            </div>

                        </li>

                        <li>
                            <div class="basic_list_t"><span class="icon-title">付费用户数</span> <span class="iconfont icon-wenhao"></span></div>
                            <div class="basic_list_n"><span class="new-pay-all">0</span></div>
                            <div class="basic_list_c basic_list_c_data">
                                日环比
                                <span>
                                    <i class="new-pay-icon iconfont"></i>
                                    <span class="new-pay-day-ratio">0</span>
                                    <span>%</span>
                                </span>
                            </div>
                            <div class="basic_list_w">
                                周环比
                                <span>
                                    <i class="new-pay-week-icon iconfont"></i>
                                    <span class="new-pay-week-ratio">0</span>
                                    <span>%</span>
                                </span>
                            </div>
                        </li>
                    </ul>
                </div>
            </div>


            <!-- 指标趋势echarts图-->
            <div class="target">
                <h4>指标趋势</h4>
                <div id="echarts_target" style="width:100%;height:300px;"></div>
            </div>


        </div>
    </div>

</div>

<script type="text/javascript">
    var today_pay_num = '<?php echo $today_pay_add; ?>'; //今日收入
    var ye_pay_num   = '<?php echo $ye_pay_add; ?>'; //昨日收入

</script>
<script src="/static/js/admin.js"></script>
<script src="/static/js/echarts/echarts.min.js"></script>
<script src="/static/js/admin_data_view.js"></script>



</body>
</html>






