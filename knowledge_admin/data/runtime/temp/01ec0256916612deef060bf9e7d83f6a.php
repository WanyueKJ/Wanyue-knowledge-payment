<?php /*a:3:{s:77:"/www/wwwroot/demo.sdwanyue.com/themes/admin_htcyltd/admin/plugin/setting.html";i:1586248496;s:79:"/www/wwwroot/demo.sdwanyue.com/themes/admin_htcyltd/admin/plugin/functions.html";i:1610001159;s:70:"/www/wwwroot/demo.sdwanyue.com/themes/admin_htcyltd/public/header.html";i:1609814284;}*/ ?>
<?php 
    if (!function_exists('_parse_plugin_config')) {
        function _parse_plugin_config($pluginConfig){

 if(is_array($pluginConfig) || $pluginConfig instanceof \think\Collection || $pluginConfig instanceof \think\Paginator): if( count($pluginConfig)==0 ) : echo "" ;else: foreach($pluginConfig as $key=>$form): switch($form['type']): case "explain": ?>
            <div class="layui-form-item">
                <label class="layui-form-label" for="<?php echo $key; ?>">
                <?php echo (isset($form['title']) && ($form['title'] !== '')?$form['title']:''); if(!(empty($form['rule']['require']) || (($form['rule']['require'] instanceof \think\Collection || $form['rule']['require'] instanceof \think\Paginator ) && $form['rule']['require']->isEmpty()))): ?>
                        <span class="form-required">*</span>
                    <?php endif; ?>
                </label>
                <div class="layui-input-block">
                    <p class="layui-input-static"><?php echo $form['value']; ?></p>
                    <?php if(isset($form['tip'])): ?>
                        <p class="help-block"><?php echo $form['tip']; ?></p>
                    <?php endif; ?>
                </div>
            </div>
        <?php break; case "text": ?>
            <div class="layui-form-item">
                <label class="layui-form-label" for="<?php echo $key; ?>">
                    <?php echo (isset($form['title']) && ($form['title'] !== '')?$form['title']:''); if(!(empty($form['rule']['require']) || (($form['rule']['require'] instanceof \think\Collection || $form['rule']['require'] instanceof \think\Paginator ) && $form['rule']['require']->isEmpty()))): ?>
                        <span class="form-required">*</span>
                    <?php endif; ?>
                </label>
                <div class="layui-input-block">
                    <input type="text" name="config[<?php echo $key; ?>]" class="layui-input" <?php echo !empty($form['disabled']) ? 'disabled' : ''; ?> value="<?php echo $form['value']; ?>" id="<?php echo $key; ?>">
                    <?php if(isset($form['tip'])): ?>
                        <p class="help-block"><?php echo $form['tip']; ?></p>
                    <?php endif; ?>
                </div>
            </div>
        <?php break; case "password": ?>
            <div class="layui-form-item">
                <label class="layui-form-label" for="<?php echo $key; ?>">
                    <?php echo (isset($form['title']) && ($form['title'] !== '')?$form['title']:''); if(!(empty($form['rule']['require']) || (($form['rule']['require'] instanceof \think\Collection || $form['rule']['require'] instanceof \think\Paginator ) && $form['rule']['require']->isEmpty()))): ?>
                        <span class="form-required">*</span>
                    <?php endif; ?>
                </label>
                <div class="layui-input-block">
                    <input type="password" name="config[<?php echo $key; ?>]" class="layui-input" value="<?php echo $form['value']; ?>"
                           id="<?php echo $key; ?>">
                    <?php if(isset($form['tip'])): ?>
                        <p class="help-block"><?php echo $form['tip']; ?></p>
                    <?php endif; ?>
                </div>
            </div>
        <?php break; case "number": ?>
            <div class="layui-form-item">
                <label class="layui-form-label" for="<?php echo $key; ?>">
                    <?php echo (isset($form['title']) && ($form['title'] !== '')?$form['title']:''); if(!(empty($form['rule']['require']) || (($form['rule']['require'] instanceof \think\Collection || $form['rule']['require'] instanceof \think\Paginator ) && $form['rule']['require']->isEmpty()))): ?>
                        <span class="form-required">*</span>
                    <?php endif; ?>
                </label>
                <div class="layui-input-block">
                    <input type="number" name="config[<?php echo $key; ?>]" class="layui-input" <?php echo !empty($form['disabled']) ? 'disabled' : ''; ?> value="<?php echo $form['value']; ?>"
                           id="<?php echo $key; ?>">
                    <?php if(isset($form['tip'])): ?>
                        <p class="help-block"><?php echo $form['tip']; ?></p>
                    <?php endif; ?>
                </div>
            </div>
        <?php break; case "hidden": ?>
            <input type="hidden" name="config[<?php echo $key; ?>]" value="<?php echo $form['value']; ?>">
        <?php break; case "radio": ?>
            <div class="layui-form-item">
                <label class="layui-form-label" for="<?php echo $key; ?>">
                    <?php echo (isset($form['title']) && ($form['title'] !== '')?$form['title']:''); if(!(empty($form['rule']['require']) || (($form['rule']['require'] instanceof \think\Collection || $form['rule']['require'] instanceof \think\Paginator ) && $form['rule']['require']->isEmpty()))): ?>
                        <span class="form-required">*</span>
                    <?php endif; ?>
                </label>
                <div class="layui-input-block">
                    <?php if(is_array($form['options']) || $form['options'] instanceof \think\Collection || $form['options'] instanceof \think\Paginator): if( count($form['options'])==0 ) : echo "" ;else: foreach($form['options'] as $opt_k=>$opt): ?>
                        <label class="radio-inline">
                            <?php $radio_checked=$opt_k==$form['value']?"checked":""; ?>
                            <input type="radio" name="config[<?php echo $key; ?>]" value="<?php echo $opt_k; ?>" <?php echo $radio_checked; ?>><?php echo $opt; ?>
                        </label>
                    <?php endforeach; endif; else: echo "" ;endif; if(isset($form['tip'])): ?>
                        <p class="help-block"><?php echo $form['tip']; ?></p>
                    <?php endif; ?>
                </div>
            </div>
        <?php break; case "checkbox": ?>
            <div class="layui-form-item">
                <label class="layui-form-label" for="<?php echo $key; ?>">
                    <?php echo (isset($form['title']) && ($form['title'] !== '')?$form['title']:''); if(!(empty($form['rule']['require']) || (($form['rule']['require'] instanceof \think\Collection || $form['rule']['require'] instanceof \think\Paginator ) && $form['rule']['require']->isEmpty()))): ?>
                        <span class="form-required">*</span>
                    <?php endif; ?>
                </label>
                <div class="layui-input-block">
                    <?php if(is_array($form['options']) || $form['options'] instanceof \think\Collection || $form['options'] instanceof \think\Paginator): if( count($form['options'])==0 ) : echo "" ;else: foreach($form['options'] as $opt_k=>$opt): ?>
                        <label class="checkbox-inline">
                            <?php 
                                is_null($form["value"]) && $form["value"] = array();
                             ?>
                            <input type="checkbox" name="config[<?php echo $key; ?>][]" value="<?php echo $opt_k; ?>"
                            <?php if(in_array(($opt_k), is_array($form['value'])?$form['value']:explode(',',$form['value']))): ?> checked<?php endif; ?>
                            ><?php echo $opt; ?>
                        </label>
                    <?php endforeach; endif; else: echo "" ;endif; if(isset($form['tip'])): ?>
                        <p class="help-block"><?php echo $form['tip']; ?></p>
                    <?php endif; ?>
                </div>
            </div>
        <?php break; case "select": ?>
            <div class="layui-form-item">
                <label class="layui-form-label" for="<?php echo $key; ?>">
                    <?php echo (isset($form['title']) && ($form['title'] !== '')?$form['title']:''); if(!(empty($form['rule']['require']) || (($form['rule']['require'] instanceof \think\Collection || $form['rule']['require'] instanceof \think\Paginator ) && $form['rule']['require']->isEmpty()))): ?>
                        <span class="form-required">*</span>
                    <?php endif; ?>
                </label>
                <div class="layui-input-block">
                    <select class="layui-input" name="config[<?php echo $key; ?>]" id="<?php echo $key; ?>">
                        <?php if(is_array($form['options']) || $form['options'] instanceof \think\Collection || $form['options'] instanceof \think\Paginator): if( count($form['options'])==0 ) : echo "" ;else: foreach($form['options'] as $opt_k=>$opt): ?>
                            <option value="<?php echo $opt_k; ?>"
                            <?php if($form['value'] == $opt_k): ?> selected<?php endif; ?>
                            ><?php echo $opt; ?></option>
                        <?php endforeach; endif; else: echo "" ;endif; ?>
                    </select>
                    <?php if(isset($form['tip'])): ?>
                        <p class="help-block"><?php echo $form['tip']; ?></p>
                    <?php endif; ?>
                </div>
            </div>
        <?php break; case "textarea": ?>
            <div class="layui-form-item">
                <label class="layui-form-label" for="<?php echo $key; ?>">
                    <?php echo (isset($form['title']) && ($form['title'] !== '')?$form['title']:''); if(!(empty($form['rule']['require']) || (($form['rule']['require'] instanceof \think\Collection || $form['rule']['require'] instanceof \think\Paginator ) && $form['rule']['require']->isEmpty()))): ?>
                        <span class="form-required">*</span>
                    <?php endif; ?>
                </label>
                <div class="layui-input-block">
                    <textarea class="layui-input" name="config[<?php echo $key; ?>]" <?php echo !empty($form['disabled']) ? 'disabled' : ''; ?> id="<?php echo $key; ?>"><?php echo $form['value']; ?></textarea>
                    <?php if(isset($form['tip'])): ?>
                        <p class="help-block"><?php echo $form['tip']; ?></p>
                    <?php endif; ?>
                </div>
            </div>
        <?php break; case "group": ?>
            <div>
                <ul class="nav nav-tabs" role="tablist">
                    <?php if(is_array($form['options']) || $form['options'] instanceof \think\Collection || $form['options'] instanceof \think\Paginator): if( count($form['options'])==0 ) : echo "" ;else: $groupIndex=0; foreach($form['options'] as $groupKey=>$groupItem): ++$groupIndex; ?>
                        <li role="presentation" class="<?php echo $groupIndex==1 ? 'active' : ''; ?>">
                            <a href="#tab-<?php echo $groupKey; ?>" role="tab" data-toggle="tab" aria-controls="home"
                               aria-expanded="true"><?php echo (isset($groupItem['title']) && ($groupItem['title'] !== '')?$groupItem['title']:''); ?></a>
                        </li>
                    <?php endforeach; endif; else: echo "" ;endif; ?>
                </ul>
                <div class="tab-content margin-top-20">
                    <?php if(is_array($form['options']) || $form['options'] instanceof \think\Collection || $form['options'] instanceof \think\Paginator): if( count($form['options'])==0 ) : echo "" ;else: $groupIndex=0; foreach($form['options'] as $groupKey=>$groupItem): ++$groupIndex; ?>
                        <div role="tabpanel" class="tab-pane fade in <?php echo $groupIndex==1 ? 'active' : ''; ?>" id="tab-<?php echo $groupKey; ?>"
                             aria-labelledby="home-tab">
                            <?php echo _parse_plugin_config($groupItem['options']); ?>
                        </div>
                    <?php endforeach; endif; else: echo "" ;endif; ?>
                </div>
            </div>
        <?php break; case "date": ?>
            <div class="layui-form-item">
                <label class="layui-form-label" for="<?php echo $key; ?>">
                    <?php echo (isset($form['title']) && ($form['title'] !== '')?$form['title']:''); if(!(empty($form['rule']['require']) || (($form['rule']['require'] instanceof \think\Collection || $form['rule']['require'] instanceof \think\Paginator ) && $form['rule']['require']->isEmpty()))): ?>
                        <span class="form-required">*</span>
                    <?php endif; ?>
                </label>
                <div class="layui-input-block">
                    <input class="layui-input js-bootstrap-date" name="config[<?php echo $key; ?>]" id="<?php echo $key; ?>"
                           value="<?php echo $form['value']; ?>">
                    <?php if(isset($form['tip'])): ?>
                        <p class="help-block"><?php echo $form['tip']; ?></p>
                    <?php endif; ?>
                </div>
            </div>
        <?php break; case "datetime": ?>
            <div class="layui-form-item">
                <label class="layui-form-label" for="<?php echo $key; ?>">
                    <?php echo (isset($form['title']) && ($form['title'] !== '')?$form['title']:''); if(!(empty($form['rule']['require']) || (($form['rule']['require'] instanceof \think\Collection || $form['rule']['require'] instanceof \think\Paginator ) && $form['rule']['require']->isEmpty()))): ?>
                        <span class="form-required">*</span>
                    <?php endif; ?>
                </label>
                <div class="layui-input-block">
                    <input class="layui-input js-bootstrap-datetime" name="config[<?php echo $key; ?>]" id="<?php echo $key; ?>"
                           value="<?php echo $form['value']; ?>">
                    <?php if(isset($form['tip'])): ?>
                        <p class="help-block"><?php echo $form['tip']; ?></p>
                    <?php endif; ?>
                </div>
            </div>
        <?php break; case "color": ?>
            <div class="layui-form-item">
                <label class="layui-form-label" for="<?php echo $key; ?>">
                    <?php echo (isset($form['title']) && ($form['title'] !== '')?$form['title']:''); if(!(empty($form['rule']['require']) || (($form['rule']['require'] instanceof \think\Collection || $form['rule']['require'] instanceof \think\Paginator ) && $form['rule']['require']->isEmpty()))): ?>
                        <span class="form-required">*</span>
                    <?php endif; ?>
                </label>
                <div class="layui-input-block">
                    <input class="layui-input js-color" name="config[<?php echo $key; ?>]" id="<?php echo $key; ?>"
                           value="<?php echo $form['value']; ?>">
                    <?php if(isset($form['tip'])): ?>
                        <p class="help-block"><?php echo $form['tip']; ?></p>
                    <?php endif; ?>
                </div>
            </div>
        <?php break; case "image": ?>
            <div class="layui-form-item">
                <label class="layui-form-label" for="<?php echo $key; ?>">
                    <?php echo (isset($form['title']) && ($form['title'] !== '')?$form['title']:''); if(!(empty($form['rule']['require']) || (($form['rule']['require'] instanceof \think\Collection || $form['rule']['require'] instanceof \think\Paginator ) && $form['rule']['require']->isEmpty()))): ?>
                        <span class="form-required">*</span>
                    <?php endif; ?>
                </label>
                <div class="layui-input-block">
                    <input type="hidden" name="config[<?php echo $key; ?>]" class="layui-input"
                           value="<?php echo $form['value']; ?>" id="js-<?php echo $key; ?>-input">
                    <div>
                        <a href="javascript:uploadOneImage('????????????','#js-<?php echo $key; ?>-input');">
                            <?php if(empty($form['value'])): ?>
                                <img src="/themes/admin_htcyltd/public/assets/images/default-thumbnail.png"
                                     id="js-<?php echo $key; ?>-input-preview"
                                     width="135" style="cursor: pointer"/>
                                <?php else: ?>
                                <img src="<?php echo cmf_get_image_preview_url($form['value']); ?>"
                                     id="js-<?php echo $key; ?>-input-preview"
                                     width="135" style="cursor: pointer"/>
                            <?php endif; ?>
                        </a>
                    </div>
                    <?php if(isset($form['tip'])): ?>
                        <p class="help-block"><?php echo $form['tip']; ?></p>
                    <?php endif; ?>
                </div>
            </div>
        <?php break; case "file": ?>
            <div class="layui-form-item">
                <label class="layui-form-label" for="<?php echo $key; ?>">
                    <?php echo (isset($form['title']) && ($form['title'] !== '')?$form['title']:''); if(!(empty($form['rule']['require']) || (($form['rule']['require'] instanceof \think\Collection || $form['rule']['require'] instanceof \think\Paginator ) && $form['rule']['require']->isEmpty()))): ?>
                        <span class="form-required">*</span>
                    <?php endif; ?>
                </label>
                <div class="layui-input-block">
                    <div>
                        <input class="layui-input" id="js-<?php echo $key; ?>-input" type="text" name="config[<?php echo $key; ?>]" value="<?php echo $form['value']; ?>"
                               style="width: 300px;display: inline-block;" title="????????????">
                        <a href="javascript:uploadOne('????????????','#js-<?php echo $key; ?>-input','file');">????????????</a>
                    </div>
                    <?php if(isset($form['tip'])): ?>
                        <p class="help-block"><?php echo $form['tip']; ?></p>
                    <?php endif; ?>
                </div>
            </div>
        <?php break; case "location": ?>
            <div class="layui-form-item">
                <label class="layui-form-label" for="<?php echo $key; ?>">
                    <?php echo (isset($form['title']) && ($form['title'] !== '')?$form['title']:''); if(!(empty($form['rule']['require']) || (($form['rule']['require'] instanceof \think\Collection || $form['rule']['require'] instanceof \think\Paginator ) && $form['rule']['require']->isEmpty()))): ?>
                        <span class="form-required">*</span>
                    <?php endif; ?>
                </label>
                <div class="layui-input-block">
                    <input class="layui-input" name="config[<?php echo $key; ?>]" id="<?php echo $key; ?>" value="<?php echo $form['value']; ?>"
                           onclick="doSelectLocation(this)"
                           data-title="?????????<?php echo (isset($form['title']) && ($form['title'] !== '')?$form['title']:''); ?>">
                    <?php if(isset($form['tip'])): ?>
                        <p class="help-block"><?php echo $form['tip']; ?></p>
                    <?php endif; ?>
                </div>
            </div>
        <?php break; ?>
    <?php endswitch; ?>
<?php endforeach; endif; else: echo "" ;endif; 
        }
    }
 ?>
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
        //????????????
        var GV = {
            ROOT: "/",
            WEB_ROOT: "/",
            JS_ROOT: "static/js/",
            APP: '<?php echo app('request')->module(); ?>'/*???????????????*/
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
    html{background-color: #fff}
</style>
</head>
<body>
<form method="post" class="layui-form js-ajax-form" action="<?php echo url('plugin/settingPost'); ?>" style="padding: 20px 30px 0 0;">
    <?php if(empty($custom_config) || (($custom_config instanceof \think\Collection || $custom_config instanceof \think\Paginator ) && $custom_config->isEmpty())): ?>
        <?php echo _parse_plugin_config($data['config']); else: if(isset($custom_config)): ?>
            <?php echo $custom_config; ?>
        <?php endif; ?>
    <?php endif; ?>
    <div class="layui-form-item">
        <div class="layui-input-block">
            <input type="hidden" name="id" value="<?php echo $id; ?>" readonly>
            <button type="submit" class="layui-btn js-ajax-submit">??????</button>
        </div>
    </div>
</form>
<script src="/static/js/admin.js"></script>
<script>

    Wind.use('colorpicker',function(){
        $('.js-color').each(function () {
            var $this=$(this);
            $this.ColorPicker({
                livePreview:true,
                onChange: function(hsb, hex, rgb) {
                    $this.val('#'+hex);
                },
                onBeforeShow: function () {
                    $(this).ColorPickerSetColor(this.value);
                }
            });
        });

    });

    function doSelectLocation(obj) {
        var $obj       = $(obj);
        var title      = $obj.data('title');
        var $realInput = $obj;
        var location   = $realInput.val();

        admin.openIframeLayer(
            "<?php echo url('dialog/map'); ?>?location=" + location,
            title,
            {
                area: ['700px', '90%'],
                btn: ['??????', '??????'],
                yes: function (index, layero) {
                    var iframeWin = parent.window[layero.find('iframe')[0]['name']];
                    var location  = iframeWin.confirm();
                    $realInput.val(location.lng + ',' + location.lat);
                    //$obj.val(location.address);
                    parent.layer.close(index); //???????????????yes??????????????????????????????
                }
            }
        );
    }
</script>
</body>
</html>