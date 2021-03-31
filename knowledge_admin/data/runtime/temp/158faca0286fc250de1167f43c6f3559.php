<?php /*a:2:{s:87:"D:\My_project\Wanyue-knowledge-payment-admin/themes/admin_htcyltd/admin\course\add.html";i:1613726836;s:84:"D:\My_project\Wanyue-knowledge-payment-admin/themes/admin_htcyltd/public\header.html";i:1609814284;}*/ ?>
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
<style>
    .userlist {
        position: absolute;
        background: #fff;
        width: 200px;
        height: 400px;
        overflow-y: auto;
        border: 1px solid #eee;
        z-index: 99;
        display: none;
    }

    .userlist ul {
        padding: 0;
    }

    .userlist ul li {
        padding-left: 10px;
        list-style: none;
    }

    .userlist ul li:hover {
        background: #eee;
    }

    .layui-anim, .layui-anim-upbit {
        z-index: 9999 !important;
    }
</style>
</head>
<body>
<div class="layui-fluid">
    
    <form method="post" class="layui-form js-ajax-form" style="margin-top: 20px;" action="<?php echo url('course/addPost'); ?>">
        <div class="layui-col-md12">
            <div class="layui-card">
                <div class="layui-tab layui-tab-brief">
                    <ul class="layui-tab-title">
                        <li><a href="<?php echo url('course/index',['sort'=>$sort]); ?>">列表</a></li>
                        <li class="layui-this"><a href="<?php echo url('course/add',['sort'=>$sort]); ?>">添加</a></li>
                    </ul>
                    <div class="layui-card-body">
                        <div class="layui-form-item">
                            <label for="input-uid" class="layui-form-label"><span class="form-required">*</span>主讲老师ID</label>
                            <div class="layui-input-block">
                                <input type="text" class="layui-input getuid" id="input-uid" name="uid" autocomplete="off">
                                <div class="userlist">
                                    <ul>
                                    </ul>
                                </div>
                            </div>
                        </div>
                        <?php if($sort != 0): ?>
                            <div class="layui-form-item">
                                <label for="input-tutoruid" class="layui-form-label"><span class="form-required"></span>辅导老师ID</label>
                                <div class="layui-input-block">
                                    <input type="text" class="layui-input" id="input-tutoruid" name="tutoruid" autocomplete="off">
                                    <div class="userlist">
                                        <ul>
                                        </ul>
                                    </div>
                                </div>
                            </div>
                        <?php endif; ?>
                    
                        <div class="layui-form-item">
                            <label for="input-name" class="layui-form-label"><span class="form-required">*</span>学级分类</label>
                            <div class="layui-input-block">
                                <select class="layui-input" name="gradeid">
                                    <?php if(is_array($grade) || $grade instanceof \think\Collection || $grade instanceof \think\Paginator): $i = 0; $__LIST__ = $grade;if( count($__LIST__)==0 ) : echo "" ;else: foreach($__LIST__ as $key=>$v): $mod = ($i % 2 );++$i;?>
                                        <option value="<?php echo $v['id']; ?>"><?php echo $v['name']; ?></option>
                                    <?php endforeach; endif; else: echo "" ;endif; ?>
                                </select>
                            </div>
                        </div>

                        <div class="layui-form-item">
                            <label for="input-name" class="layui-form-label"><span class="form-required">*</span>科目分类</label>
                            <div class="layui-input-block">
                                <select class="layui-input" name="classid">
                                    <?php if(is_array($classs) || $classs instanceof \think\Collection || $classs instanceof \think\Paginator): $i = 0; $__LIST__ = $classs;if( count($__LIST__)==0 ) : echo "" ;else: foreach($__LIST__ as $key=>$v): $mod = ($i % 2 );++$i;?>
                                        <option value="<?php echo $v['id']; ?>"><?php echo $v['name']; ?></option>
                                    <?php endforeach; endif; else: echo "" ;endif; ?>
                                </select>
                            </div>
                        </div>
                    
                        <div class="layui-form-item">
                            <label for="input-name" class="layui-form-label"><span class="form-required">*</span>名称</label>
                            <div class="layui-input-block">
                                <input type="text" class="layui-input" id="input-name" name="name">
                            </div>
                        </div>
                    
                        <div class="layui-form-item">
                            <label class="layui-form-label"><span class="form-required">*</span>封面</label>
                            <div class="layui-input-block">
                                <input type="hidden" name="thumb" id="thumb" value="">
                                <a href="javascript:uploadOneImage('图片上传','#thumb');">
                                    <img src="/themes/admin_htcyltd/public/assets/images/default-thumbnail.png" id="thumb-preview"
                                         style="cursor: pointer;max-width:150px;max-height:150px;"/>
                                </a>
                                <div class="layui-col-md12" style="margin-top: 10px">
                                    <input type="button" class="layui-btn layui-btn-sm layui-btn-normal"
                                           onclick="$('#thumb-preview').attr('src','/themes/admin_htcyltd/public/assets/images/default-thumbnail.png');$('#thumb').val('');return false;"
                                           value="取消图片">
                                </div>
                            </div>
                        </div>
                    
                        <div class="layui-form-item">
                            <label class="layui-form-label"><span class="form-required"></span>简介</label>
                            <div class="layui-input-block">
                                <textarea class="layui-input" name="des" style="height: 50px;" maxlength="30"></textarea>最多30个字
                            </div>
                        </div>
                    
                        <?php if($sort != 1 && $sort != 3): ?>
                            <div class="layui-form-item">
                                <label for="input-name" class="layui-form-label"><span class="form-required">*</span>内容形式</label>
                                <div class="layui-input-block">
                                    <select class="layui-input" name="type" id="type" lay-filter="type">
                                        <?php if(is_array($types) || $types instanceof \think\Collection || $types instanceof \think\Paginator): $i = 0; $__LIST__ = $types;if( count($__LIST__)==0 ) : echo "" ;else: foreach($__LIST__ as $key=>$v): $mod = ($i % 2 );++$i;?>
                                            <option value="<?php echo $key; ?>"><?php echo $v; ?></option>
                                        <?php endforeach; endif; else: echo "" ;endif; ?>
                                    </select>
                                </div>
                            </div>
                    
                            <div class="layui-form-item type_bd type_2" style="display:none;">
                                <label class="layui-form-label"><span class="form-required">*</span>上传视频</label>
                                <div class="layui-input-block">
                                    <input class="layui-input" id="js-file-input3" type="text" name="type_video"
                                           style="width: 300px;display: inline-block;" title="文件名称">
                                    <a href="javascript:uploadOne('文件上传','#js-file-input3','video');">上传文件</a>MP4格式
                                </div>
                            </div>
                    
                            <div class="layui-form-item type_bd type_3" style="display:none;">
                                <label class="layui-form-label"><span class="form-required">*</span>上传语音</label>
                                <div class="layui-input-block">
                                    <input class="layui-input" id="js-file-input4" type="text" name="type_audio"
                                           style="width: 300px;display: inline-block;" title="文件名称">
                                    <a href="javascript:uploadOne('文件上传','#js-file-input4','audio');">上传文件</a>MP3格式 WAV格式
                                </div>
                            </div>
                    
                        <?php endif; ?>
                    
                        <div class="layui-form-item">
                            <label for="input-name" class="layui-form-label"><span class="form-required">*</span>获取方式</label>
                            <div class="layui-input-block">
                                <select class="layui-input" name="paytype" id="paytype" lay-filter="paytype">
                                    <?php if(is_array($paytypes) || $paytypes instanceof \think\Collection || $paytypes instanceof \think\Paginator): $i = 0; $__LIST__ = $paytypes;if( count($__LIST__)==0 ) : echo "" ;else: foreach($__LIST__ as $key=>$v): $mod = ($i % 2 );++$i;?>
                                        <option value="<?php echo $key; ?>"><?php echo $v; ?></option>
                                    <?php endforeach; endif; else: echo "" ;endif; ?>
                                </select>
                            </div>
                        </div>
                    
                        <div class="layui-form-item" id="paytype_val" style="display:none;">
                            <label for="input-payval" class="layui-form-label"><span class="form-required">*</span>价格/密码</label>
                            <div class="layui-input-block">
                                <input type="text" class="layui-input" id="input-payval" name="payval"> 添加价格时最多保留2位小数
                            </div>
                        </div>
                        <?php if($sort == 1): ?>
                            <div class="layui-form-item paytype_bd paytype_1" style="display:none;">
                                <label for="input-name" class="layui-form-label"><span class="form-required"></span>是否含有教材</label>
                                <div class="layui-input-block">
                                    <select class="layui-input" name="ismaterial" id="ismaterial">
                                        <option value="0">否</option>
                                        <option value="1">是</option>
                                    </select>
                                </div>
                            </div>
                            <div class="layui-form-item">
                                <label for="input-name" class="layui-form-label"><span class="form-required"></span>课程模式</label>
                                <div class="layui-input-block">
                                    <select class="layui-input" name="mode" id="mode">
                                        <?php if(is_array($modes) || $modes instanceof \think\Collection || $modes instanceof \think\Paginator): $i = 0; $__LIST__ = $modes;if( count($__LIST__)==0 ) : echo "" ;else: foreach($__LIST__ as $key=>$v): $mod = ($i % 2 );++$i;?>
                                            <option value="<?php echo $key; ?>"><?php echo $v; ?></option>
                                        <?php endforeach; endif; else: echo "" ;endif; ?>
                                    </select>
                                    自由模式可随时学习任意课时，解锁模式需按照课时顺序学习
                                </div>
                            </div>
                        <?php endif; if($sort == 0): ?>
                            <div id="paytype_bd" style="display:none;">
                                <div class="layui-form-item">
                                    <label for="input-name" class="layui-form-label"><span class="form-required"></span>试学</label>
                                    <div class="layui-input-block">
                                        <select class="layui-input" name="trialtype" id="trialtype" lay-filter="trialtype">
                                            <?php if(is_array($trialtypes) || $trialtypes instanceof \think\Collection || $trialtypes instanceof \think\Paginator): $i = 0; $__LIST__ = $trialtypes;if( count($__LIST__)==0 ) : echo "" ;else: foreach($__LIST__ as $key=>$v): $mod = ($i % 2 );++$i;?>
                                                <option value="<?php echo $key; ?>"><?php echo $v; ?></option>
                                            <?php endforeach; endif; else: echo "" ;endif; ?>
                                        </select>
                                    </div>
                                </div>
                    
                                <div class="layui-form-item trialtype_bd" id="trialval_2" style="display:none;">
                                    <label for="input-trialval_2" class="layui-form-label"><span class="form-required">*</span>时间进度</label>
                                    <div class="layui-input-block">
                                        <input type="text" class="layui-input" id="input-trialval_2" name="trialval_2">秒 开始的多少秒可看
                                    </div>
                                </div>
                                <div class="layui-form-item trialtype_bd" id="trialval_1" style="display:none;">
                                    <label for="input-trialval_1" class="layui-form-label"><span class="form-required">*</span>进度</label>
                                    <div class="layui-input-block">
                                        <input type="text" class="layui-input" id="input-trialval_1" name="trialval_1">% 范围：1-99
                                    </div>
                                </div>
                            </div>
                        <?php endif; ?>
                    
                        <div class="layui-form-item">
                            <label for="input-name" class="layui-form-label"><span class="form-required">*</span>状态</label>
                            <div class="layui-input-block">
                                <select class="layui-input" name="status" id="status" lay-filter="status">
                                    <option value="1">立即上架</option>
                                    <option value="-1">暂不上架</option>
                                    <option value="2">定时上架</option>
                                </select>
                            </div>
                        </div>
                    
                        <div class="layui-form-item status_bd">
                            <label for="input-shelvestime" class="layui-form-label"><span class="form-required">*</span>上架时间</label>
                            <div class="layui-input-block">
                                <input type="text" class="layui-input js-bootstrap-datetime" id="input-shelvestime" name="shelvestime"
                                       aria-invalid="false" autocomplete="off"> 格式：2020-01-01 00:00:00
                            </div>
                        </div>
                    
                        <?php if($sort == 2 || $sort == 3): ?>
                            <div class="layui-form-item">
                                <label for="input-starttime" class="layui-form-label"><span class="form-required">*</span>上课时间</label>
                                <div class="layui-input-block">
                                    <input type="text" class="layui-input js-bootstrap-datetime" id="input-starttime" name="starttime"
                                           aria-invalid="false" autocomplete="off"> 格式：2020-01-01 00:00:00
                                </div>
                            </div>
                    
                            <div class="layui-form-item">
                                <label for="input-endtime" class="layui-form-label"><span class="form-required">*</span>下课时间</label>
                                <div class="layui-input-block">
                                    <input type="text" class="layui-input js-bootstrap-datetime" id="input-endtime" name="endtime"
                                           aria-invalid="false" autocomplete="off"> 格式：2020-01-01 00:00:00
                                </div>
                            </div>
                            <div class="layui-form-item layui-text">
                                <label class="layui-form-label"><span class="form-required"></span>听课指南</label>
                                <div class="layui-input-block">
                                    <textarea class="layui-textarea" name="intr" style="height: 50px;" maxlength="200"></textarea> 留空为显示默认指南
                                    最多200字
                                </div>
                            </div>
                        <?php endif; ?>
                    
                    
                        <div class="layui-form-item">
                            <label for="input-name" class="layui-form-label"><span class="form-required">*</span>介绍</label>
                            <div class="layui-input-block">
                                <script type="text/plain" id="info" name="info"></script>
                                学员购买前可看
                            </div>
                        </div>
                    
                        <?php if($sort == 0): ?>
                            <div class="layui-form-item">
                                <label for="input-name" class="layui-form-label"><span class="form-required">*</span>详情</label>
                                <div class="layui-input-block">
                                    <script type="text/plain" id="content" name="content"></script>
                                </div>
                            </div>
                        <?php endif; ?>
                    
                    
                        <div class="layui-form-item">
                            <div class="layui-input-block">
                                <input type="hidden" name="sort" value="<?php echo $sort; ?>"/>
                                <button type="submit" class="layui-btn js-ajax-submit"><?php echo lang('ADD'); ?></button>
                            </div>
                        </div>
                    </div>
                    </div>
                </div>
            </div>
            
    </form>
</div>


<script src="/static/js/admin.js"></script>
<script src="/static/js/wind.js"></script>
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
            $('#thumbnail-preview').attr('src', '/themes/admin_htcyltd/public/assets/images/default-thumbnail.png');
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


        var sort = '<?php echo $sort; ?>';

        /* 内容方式处理 */
        function type_change() {
            var type = $('#type').val();
            $('.type_bd').hide();
            $('.type_' + type).show();

            $('.trialtype_bd').hide();
            if (type != 1) {
                type = 2;
            }

            $('#trialval_' + type).show();
        }

        // $("#type").on('change', function () {
        //     type_change();
        // })
        layui.use(['layer', 'jquery', 'form'], function () {
            var layer = layui.layer,
                $ = layui.jquery,
                form = layui.form;

            form.on('select(type)', function(data){
                type_change();
            });
        });

        type_change();

        /* 获取方式处理 */
        function paytype_change() {
            var paytype = $('#paytype').val();
            $('.paytype_bd').hide();
            $('.paytype_' + paytype).show();
            if (paytype == 0) {
                $('#paytype_val').hide();
                $('#input-payval').val('');
                $('#paytype_bd').hide();
            } else {
                $('#paytype_val').show();
                $('#paytype_bd').show();
            }
            if (paytype == 2 && sort == 0) {
                $('#paytype_bd').hide();
            }
        }

        // $("#paytype").on('change', function () {
        //     paytype_change();
        // })

        layui.use(['layer', 'jquery', 'form'], function () {
            var layer = layui.layer,
                $ = layui.jquery,
                form = layui.form;

            form.on('select(paytype)', function(data){
                paytype_change();
            });
        });

        paytype_change();

        /* 试学方式处理 */
        function trialtype_change() {
            var trialtype = $('#trialtype').val();
            var type = $('#type').val();
            if (trialtype == 0) {
                $('.trialtype_bd').hide();
            } else {
                $('.trialtype_bd').hide();
                if (type != 1) {
                    type = 2;
                }
                $('#trialval_' + type).show();
            }
        }

        // $("#trialtype").on('change', function () {
        //     trialtype_change();
        // })
        layui.use(['layer', 'jquery', 'form'], function () {
            var layer = layui.layer,
                $ = layui.jquery,
                form = layui.form;

            form.on('select(trialtype)', function(data){
                trialtype_change();
            });
        });

        trialtype_change();


        /* 上架处理 */
        function status_change() {
            var status = $('#status').val();
            if (status == 2) {
                $('.status_bd').show();
            } else {
                $('.status_bd').hide();
            }
        }

        // $("#status").on('change', function () {
        //     status_change();
        // })
        layui.use(['layer', 'jquery', 'form'], function () {
            var layer = layui.layer,
                $ = layui.jquery,
                form = layui.form;

            form.on('select(status)', function(data){
                status_change();
            });
        });

        status_change();

        function getUserList(_this, uid = 0) {
            $.ajax({
                url: '/admin/Course/getUserList',
                type: 'POST',
                data: {uid: uid},
                dataType: 'json',
                error: function (e) {
                    layer.msg('网络错误');
                },
                success: function (data) {
                    if (data.code == 0) {
                        layer.msg(data.msg);
                        return !1;
                    }

                    var html = '';
                    var list = data.data;
                    var nums = list.length;
                    for (var i = 0; i < nums; i++) {
                        var v = list[i];
                        html += '<li data-uid=' + v.id + '>' + v.user_nickname + '</li>'
                    }

                    _this.siblings('.userlist').find('ul').html(html);
                    _this.siblings('.userlist').show();
                }
            })
        }

        var rm = null;
        $(".getuid").bind('focus', function () {
            if (rm) {
                clearTimeout(rm);
                rm = null;
            }
            var _this = $(this);
            getUserList(_this);
        });

        $(".getuid").bind('blur', function () {
            var _this = $(this);
            setTimeout(function () {
                _this.siblings('.userlist').hide();
            }, 100)
        });

        $(".getuid").bind('input porpertychange', function () {
            if (rm) {
                clearTimeout(rm);
                rm = null;
            }
            var _this = $(this);
            var uid = $(this).val();
            getUserList(_this, uid);
        });

        $(".userlist").on('click', 'li', function () {
            var _this = $(this);
            var uid = _this.data('uid');
            var list = _this.parents('.userlist');
            list.siblings(".getuid").val(uid);
            list.hide();
        });

    });
</script>
</body>
</html>