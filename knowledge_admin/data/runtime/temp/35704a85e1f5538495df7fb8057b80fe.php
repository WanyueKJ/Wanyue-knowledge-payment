<?php /*a:2:{s:82:"/www/wwwroot/demo.sdwanyue.com/themes/admin_htcyltd/admin/main/goods_analysis.html";i:1609917058;s:70:"/www/wwwroot/demo.sdwanyue.com/themes/admin_htcyltd/public/header.html";i:1609814284;}*/ ?>
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
<link rel="stylesheet" href="/static/css/iconfont.css">
<link rel="stylesheet" href="/static/css/main.css">
<link rel="stylesheet" href="/themes/admin_htcyltd/public/assets/css/animation.css">

<style type="text/css">
    .layui-table td {
        padding: 9px 20px !important;
    }

    .statistics-goods:after {
        content: '';
        display: block;
        width: 0px;
        height: 0px;
        clear: left;
    }

    .goods-table {
        border: none;
        width: 100%;
        margin: 0 !important;
    }

    .goods-table tbody tr {
        height: 81px;
        border: none
    }

    .goods-table tbody tr td {
        height: 60px;
        border: none;
    }

    .goods-table tbody tr td:first-child {
        vertical-align: middle;
    }

    .goods-table tbody tr td img {
        width: 40px;
        height: 40px;
        border-radius: 100%;
        float: left;
    }

    .goods-table .title-info {
        float: left;
        margin-left: 10px;
    }

    .goods-table .title-info span {
        display: block;
        margin-bottom: 4px;
    }


    .pay-user-wrap::after {
        content: '';
        display: block;
        width: 0px;
        height: 0px;
        clear: left;
    }


    /*商品排行表格*/
    .wrapper-table {
        width: calc(50% - 30px);
        float: left;
    }

    .goods-order-table {
        width: 100%;
        margin: 0;
        padding: 0;
    }

    .goods-title-left {
        padding-left: 33px;
        color: #323232;
        font-weight: bold;
        font-size: 15px;
        height: 30px;
        line-height: 30px;
    }

    .goods-title-right {
        padding-left: 10px;
        color: #323232;
        font-weight: bold;
        font-size: 15px;
        height: 30px;
        line-height: 30px;
    }
</style>


</head>
<body>

<!--商品分析-->

<div class="wrap">
    <div class="statistics statistics-goods basic">
        <div class="bd">
            <div class="bd_title">
                <div class="dropdown">
                    <div class="dropdown_list">
                        <ul class="layui-nav" id="tabHeader">
                            <li data-type="1" class="layui-nav-item">
                                <a href="<?php echo url('admin/main/dataview'); ?>">数据概况</a>
                            </li>
                            <li data-type="2" class="layui-nav-item">
                                <a href="<?php echo url('admin/main/dealanalysis'); ?>">交易分析</a>
                            </li>
                            <li data-type="3" class="layui-nav-item <?php if($focus_flag==
                            'goods_anal'): ?>focus_li<?php endif; ?>" >
                            <a href="<?php echo url('admin/main/goodsanalysis'); ?>">商品分析</a>
                            </li>
                            <li class="layui-nav-item" data-type="4">
                                <a href="<?php echo url('admin/main/index'); ?>">用户分析</a>
                            </li>
                        </ul>
                    </div>
                </div>

                <div class="data_select">
                    <h4>商品总览</h4>
                </div>
            </div>

            <!-- 商品概览区域 -->
            <div class="basic_list clear">

                <table class="layui-table table-hover table-bordered goods-table">
                    <tbody>
                    <tr>
                        <td>在售商品</td>
                        <td>
                            <img src="/static/images/online_good.png" alt="">
                            <div class="title-info">
                                <span>在售商品</span>
                                <span><?php echo !empty($on_sale_count) ? $on_sale_count : 0; ?></span>
                            </div>

                        </td>
                    </tr>
                    <tr>
                        <td>内容</td>
                        <td>
                            <img src="/static/images/tu_wen.png" alt="">
                            <div class="title-info">
                                <span>图文</span>
                                <span><?php echo !empty($tu_wen) ? $tu_wen : 0; ?></span>
                            </div>

                        </td>
                        <td>
                            <img src="/static/images/voice.png" alt="">
                            <div class="title-info">
                                <span>音频</span>
                                <span><?php echo !empty($voice_count) ? $voice_count : 0; ?></span>
                            </div>

                        </td>
                        <td>
                            <img src="/static/images/video.png" alt="">
                            <div class="title-info">
                                <span>视频</span>
                                <span><?php echo !empty($video_count) ? $video_count : 0; ?></span>
                            </div>

                        </td>
                    </tr>
                    <tr>
                        <td>大班课</td>
                        <td>
                            <img src="/static/images/ppt.png" alt="">
                            <div class="title-info">
                                <span>语音+ppt</span>
                                <span><?php echo !empty($yu_ppt) ? $yu_ppt : 0; ?></span>
                            </div>

                        </td>
                        <td>
                            <img src="/static/images/yinpin.png" alt="">
                            <div class="title-info">
                                <span>语音+音频</span>
                                <span><?php echo !empty($yu_voice) ? $yu_voice : 0; ?></span>
                            </div>

                        </td>
                        <td>
                            <img src="/static/images/shipin.png" alt="">
                            <div class="title-info">
                                <span>语音+视频</span>
                                <span><?php echo !empty($yu_video) ? $yu_video : 0; ?></span>
                            </div>

                        </td>
                        <td>
                            <img src="/static/images/live.png" alt="">
                            <div class="title-info">
                                <span>视频直播</span>
                                <span><?php echo !empty($live) ? $live : 0; ?></span>
                            </div>

                        </td>
                    </tr>
                    </tbody>

                </table>

            </div>


            <!--商品排行-->
            <div class="pay-user-wrap">
                <div class="data_select">
                    <h4>商品排行</h4>
                    <div id="search-pay-date">
                        <span class="iconfont icon-riqi"></span>
                        <input  id="range-good-input" type="text" name="range"
                               value="<?php echo date('Y-m-d',time()); ?>">
                    </div>
                </div>

                <div class="wrapper-table wrapper-view" style="margin-left: 20px;">
                    <!--商品浏览排行TOP5-->
                    <h5 class="goods-title-left">商品浏览排行TOP5 <span class="iconfont icon-wenhao" id="icon-wenhao_1"></span></h5>
                    <table class="layui-table table-hover table-bordered pay-users goods-order-table">
                        <thead>
                        <tr>
                            <th align="center">排名</th>
                            <th align="center">名称</th>
                            <th align="center">浏览用户数</th>
                            <th align="center">转化率</th>

                        </tr>
                        </thead>
                        <tbody class="view-tbody">

                        </tbody>
                    </table>

                </div>


                <!--商品销量排行TOP5-->
                <div class="wrapper-table wrapper-sale" style="margin-left: 20px;">
                    <h5 class="goods-title-right">商品销量排行TOP5 <span class="iconfont icon-wenhao" id="icon-wenhao_2"></span></h5>
                    <table class="layui-table table-hover table-bordered pay-users goods-order-table">
                        <thead>
                        <tr>
                            <th align="center">排名</th>
                            <th align="center">名称</th>
                            <th align="center">付费用户数</th>
                            <th align="center">结算金额</th>
                        </tr>
                        </thead>
                        <tbody class="sale-tbody">

                        </tbody>

                    </table>
                </div>


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

<script type="text/javascript">


    $(function () {
        var current_range = $("#range-good-input").val();
        getGoodsOrder(current_range);

    });


    // $("#range-good-input").change(function () {
    //     var range = this.value;
    //     getGoodsOrder(range);

    // });

    layui.use(['layer', 'laydate'], function() {
        var laydate = layui.laydate;
        laydate.render({
            elem: '#range-good-input'
            ,done: function(value, date, endDate){
                var range = value;
                $('.view-tbody tr').remove();
                $('.sale-tbody tr').remove();

                getGoodsOrder(range);
            }
          });
    })


    function getGoodsOrder(range) {

        $.ajax({
            url: '/admin/Main/getGoodsOrder',
            type: 'POST',
            data: {range: range},
            dataType: 'json',
            success: function (data) {
                //填充数据
                var view = data['view_order'];
                for (let i = 0; i < view.length; i++) {
                    //浏览排行
                    $(".view-tbody").append("<tr>\n" +
                        "<td>" + (i + 1) + "</td>\n" +
                        "<td>" + view[i]['course_name'] + "</td>\n" +
                        "<td class=\"user-num-all\">" + view[i]['view'] + "</td>\n" +
                        "<td><span class=\"ratio-all\">" + view[i]['zhuan_ratio'] +
                        "</span>%</td>\n" + "\n" +
                        "</tr>");
                }


                // 销量排行
                var sale = data['sale_order'];

                for (let i = 0; i < sale.length; i++) {
                    //浏览排行
                    $(".sale-tbody").append("<tr>\n" +
                        "<td>" + (i + 1) + "</td>\n" +
                        "<td>" + sale[i]['course_name'] + "</td>\n" +
                        "<td class=\"user-num-all\">" + sale[i]['pay_num'] + "</td>\n" +
                        "<td><span class=\"ratio-all\">" + sale[i]['moneys'] +
                        "</span></td>\n" + "\n" +
                        "</tr>");
                }

            },
            error: function () {

            }
        });

    }

</script>
<script>
    $(function(){
        layui.use(['layer'], function(){
        var layer = layui.layer
        
        $('#icon-wenhao_1').mouseover(function(){
            var that = this;
            layer.tips('商品浏览量前五', that,{tips: 1,time:100*1000});
        })
        $('#icon-wenhao_2').mouseover(function(){
            var that = this;
            layer.tips('商品销量前五', that,{tips: 1,time:100*1000});
        })

        $('.icon-wenhao').mouseout(function(){
            var that = this;
            layer.close(layer.index)
        })
            
        });
    })
</script>

</body>
</html>






