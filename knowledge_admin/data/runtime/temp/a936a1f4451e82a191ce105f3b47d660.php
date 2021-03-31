<?php /*a:2:{s:77:"/www/wwwroot/demo.sdwanyue.com/themes/admin_simpleboot3/admin/main/index.html";i:1604280458;s:74:"/www/wwwroot/demo.sdwanyue.com/themes/admin_simpleboot3/public/header.html";i:1602491838;}*/ ?>
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



</head>

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
                            <li data-type="2" class="">
                                <a href="<?php echo url('admin/main/dealanalysis'); ?>">交易分析</a>
                            </li>
                            <li data-type="3" class="">
                                <a href="<?php echo url('admin/main/goodsanalysis'); ?>">商品分析</a>
                            </li>

<!--                            <?php if($focus_flag == 'index'): ?>-->
<!--                                <li data-type="4" class="focus_li">-->
<!--                                    <a href="<?php echo url('admin/main/index'); ?>">用户分析</a>-->
<!--                                </li>-->
<!--                            <?php else: ?>-->
<!--                                <li data-type="4" class="">-->
<!--                                    <a href="<?php echo url('admin/main/index'); ?>">用户分析</a>-->
<!--                                </li>-->
<!--                            <?php endif; ?>-->

                            <li data-type="4" <?php if($focus_flag == 'index'): ?>class='focus_li'<?php endif; ?> >
                                <a href="<?php echo url('admin/main/index'); ?>">用户分析</a>
                            </li>



                        </ul>
                    </div>
                </div>

                <div class="data_select">
                    <h4>用户概况及趋势</h4>
                    <div id="search-date">
                        <span class="iconfont icon-riqi"></span>
                        <input class="js-bootstrap-date" id="range-input" type="text" name="range"
                               value="<?php echo date('Y-m-d',time()); ?>">
                    </div>
                </div>
            </div>

            <!-- 统计框区域 -->
            <div class="basic_list clear">
                <ul>
                    <li class="active on" data-type="1">
                        <div class="basic_list_t">新增用户 <span class="iconfont icon-wenhao"></span></div>
                        <div class="basic_list_n"><span class="new-reg">0</span></div>
                        <div class="basic_list_c">
                            较前一天
                            <span>
                                <i class="new-ratio-icon iconfont"></i>
                                <span class="new-ratio">0</span>
                                <span>%</span>
                            </span>
                        </div>
                    </li>

                    <li class="active" data-type="2">
                        <div class="basic_list_t">活跃用户 <span class="iconfont icon-wenhao"></span></div>
                        <div class="basic_list_n"><span class="new-active">0</span></div>
                        <div class="basic_list_c">较前一天
                            <span>
                                <i class="new-ratio-icon-active iconfont"></i>
                                <span class="new-active-ratio">0</span>
                                <span>%</span>
                            </span>
                        </div>
                    </li>

                    <li class="active" data-type="4">
                        <div class="basic_list_t">累计用户 <span class="iconfont icon-wenhao"></span></div>
                        <div class="basic_list_n"><span class="new-all">0</span></div>
                        <div class="basic_list_c">较前一天
                            <span>
                                <i class="new-ratio-icon-all iconfont"></i>
                                <span class="new-all-ratio">0</span>
                                <span>%</span>
                            </span>
                        </div>
                    </li>

                    <li class="active" data-type="3">
                        <div class="basic_list_t">付费用户 <span class="iconfont icon-wenhao"></span></div>
                        <div class="basic_list_n"><span class="new-pay">0</span></div>
                        <div class="basic_list_c">较前一天
                            <span>
                                <i class="new-ratio-icon-pay iconfont"></i>
                                <span class="new-pay-ratio">0</span>
                                <span>%</span>
                            </span>
                        </div>
                    </li>

                    <li>
                        <div class="basic_list_t">累计付费用户 <span class="iconfont icon-wenhao"></span></div>
                        <div class="basic_list_n"><span class="new-pay-all">0</span></div>
                        <div class="basic_list_c">较前一天
                            <span>
                                <i class="new-ratio-icon-pay-all iconfont"></i>
                                <span class="new-pay-all-ratio">0</span>
                                <span>%</span>
                            </span>
                        </div>
                    </li>

                </ul>
            </div>

            <div id="echarts_basic" style="width:100%;height:300px;"></div>


            <!--付费用户区域-->
            <div class="pay-user-wrap">
                <div class="data_select">
                    <h4>付费用户</h4>
                    <div id="search-pay-date">
                        <span class="iconfont icon-riqi"></span>
                        <input class="js-bootstrap-date" id="range-pay-input" type="text" name="range"
                               value="<?php echo date('Y-m-d',time()); ?>">
                    </div>
                </div>

                <!--用户表-->
                <table class="table table-hover table-bordered pay-users">
                    <thead>
                    <tr>
                        <th align="center">客户类型</th>
                        <th align="center">用户数 <span class="iconfont icon-wenhao"></span></th>
                        <th align="center">用户数占比 <span class="iconfont icon-wenhao"></span></th>
                        <th align="center">客单价 <span class="iconfont icon-wenhao"></span></th>
                        <th align="center">结算金额(元) <span class="iconfont icon-wenhao"></span></th>
                        <th align="center">结算转化率 <span class="iconfont icon-wenhao"></span></th>
                    </tr>
                    </thead>
                    <tbody>
                        <tr>
                            <td>全部成交用户</td>
                            <td class="user-num-all">0</td>
                            <td><span class="ratio-all">0</span>%</td>
                            <td class="unit-price-all">0</td>
                            <td class="settlement-all">0.00</td>
                            <td><span class="settlement-rate-all">0</span>%</td>
                        </tr>
                        <tr>
                            <td>新付费用户</td>
                            <td class="user-num-new">0</td>
                            <td><span class="ratio-new">0</span>%</td>
                            <td class="unit-price-new">0</td>
                            <td class="settlement-new">0.00</td>
                            <td><span class="settlement-rate-new">0</span>%</td>
                        </tr>
                        <tr>
                            <td>老付费用户</td>
                            <td class="user-num-old">0</td>
                            <td><span class="ratio-old">0</span>%</td>
                            <td class="unit-price-old">0</td>
                            <td class="settlement-old">0.00</td>
                            <td><span class="settlement-rate-old">0</span>%</td>
                        </tr>

                    </tbody>
                </table>

            </div>

        </div>
    </div>

</div>
<script src="/static/js/admin.js"></script>
<script src="/static/js/echarts/echarts.min.js"></script>
<?php 
    $lang_set=defined('LANG_SET')?LANG_SET:'';
    $thinkcmf_version=cmf_version();
 
    \think\facade\Hook::listen('admin_before_body_end',null,false);
 ?>

<script src="/static/js/admin_index.js"></script>

<script type="text/javascript">
</script>


</body>
</html>






