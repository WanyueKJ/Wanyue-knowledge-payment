<?php

// +----------------------------------------------------------------------
// |万岳科技开源系统 [山东万岳信息科技有限公司]
// +----------------------------------------------------------------------
// | Copyright (c) 2020~2022 https://www.sdwanyue.com All rights reserved.
// +----------------------------------------------------------------------
// | 万岳科技相关开源系统代码并不是自由软件，未经授权许可不能去掉wanyue【万岳科技】相关版权并商用
// +----------------------------------------------------------------------
// | Author: 万岳科技开源官方 < wanyuekj2020@163.com >
// +----------------------------------------------------------------------


// 搜索关键字
$keyword = isset($_GET['keyword']) ? $_GET['keyword'] : '';
$url = (isset($_SERVER['HTTPS']) && $_SERVER['HTTPS']) ? 'https://' : 'http://';
$url = $url . (isset($_SERVER['HTTP_HOST']) ? $_SERVER['HTTP_HOST'] : 'localhost');
$url .= trim(substr($_SERVER['SCRIPT_NAME'], 0, strrpos($_SERVER['SCRIPT_NAME'], '/') + 1), '.');
$semanticPath = 'https://cdn.bootcss.com/semantic-ui/2.2.2/'; // CDN
// $semanticPath = '/semantic/'; // 本地


echo <<<EOT
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="utf-8">
    <title>{$description} - {$service} - {$projectName} - 在线接口文档</title>

    <link rel="stylesheet" href="{$semanticPath}semantic.min.css">
    <link rel="stylesheet" href="{$semanticPath}components/table.min.css">
    <link rel="stylesheet" href="{$semanticPath}components/container.min.css">
    <link rel="stylesheet" href="{$semanticPath}components/message.min.css">
    <link rel="stylesheet" href="{$semanticPath}components/label.min.css">
    <link rel="icon" href="/favicon.ico" type="image/x-icon" />

    <script src="https://libs.baidu.com/jquery/1.11.3/jquery.min.js"></script>
    <script src="https://apps.bdimg.com/libs/jquery.cookie/1.4.1/jquery.cookie.min.js"></script>
</head>

<body>

<div class="row" style="margin-top: 60px;" ></div>

    <div class="ui text container" style="max-width: none !important;">
        <div class="ui floating message">

    <h2 class="ui header">
      <i class="settings icon"></i>
      <div class="content">
        {$service}
        <div class="sub header">{$description}</div>
      </div>
    </h2>

            <h4><i class="linkify in alternate icon"></i>接口地址：{$url}?s={$service}</h4>

EOT;

/**
 * 接口说明 & 接口参数
 */
echo <<<EOT
            <div class="ui raised segment">
                <span class="ui red ribbon label">接口文档</span>
                <div class="ui message">
                <p>{$descComment}</p>
                </div>
            </div>

            <h3><i class="sign in alternate icon"></i>接口参数</h3>
            <table class="ui red celled striped table" >
                <thead>
                    <tr><th>参数名字</th><th>类型</th><th>是否必须</th><th>默认值</th><th>其他</th><th>说明</th></tr>
                </thead>
                <tbody>
EOT;

$typeMaps = array(
    'string' => '字符串',
    'int' => '整型',
    'float' => '浮点型',
    'boolean' => '布尔型',
    'date' => '日期',
    'array' => '数组', // 转换成客户端看到的参数类型
    'fixed' => '固定值',
    'enum' => '枚举类型',
    'object' => '对象',
);

foreach ($rules as $key => $rule) {
    // 接口文档不显示
    if (!empty($rule['is_doc_hide'])) {
        continue;
    }

    $name = $rule['name'];
    if (!isset($rule['type'])) {
        $rule['type'] = 'string';
    }
    $type = isset($typeMaps[$rule['type']]) ? $typeMaps[$rule['type']] : $rule['type'];
    $require = isset($rule['require']) && $rule['require'] ? '<font color="red">必须</font>' : '可选';
    $default = isset($rule['default']) ? $rule['default'] : '';
    if ($default === NULL) {
        $default = 'NULL';
    } else if (is_array($default)) {
        // @dogstar 20190120 默认值，反序列
        $ruleFormat = !empty($rule['format']) ? strtolower($rule['format']) : '';
        if ($ruleFormat == 'explode') {
            $default = implode(isset($rule['separator']) ? $rule['separator'] : ',', $default);
        } else {
            $default = json_encode($default);
        }
    } else if (!is_string($default)) {
        $default = var_export($default, true);
    }

    // 数组类型的格式说明
    if ($rule['type'] == 'array' && in_array($rule['format'], array('json', 'explode'))) {
        $type .= sprintf(
            '<span class="ui label blue small">%s</span>',
            $rule['format'] == 'json'
            ? 'JSON格式'
            : sprintf('用%s分割', isset($rule['separator']) ? $rule['separator'] : ',')
        );
    }

    $other = array();
    if (isset($rule['min'])) {
        $other[] = '最小：' . $rule['min'];
    }
    if (isset($rule['max'])) {
        $other[] = '最大：' . $rule['max'];
    }
    if (isset($rule['range'])) {
        $other[] = '范围：' . implode('/', $rule['range']);
    }
    if (isset($rule['source'])) {
        $other[] = '数据源：' . strtoupper($rule['source']);
    }
    $other = implode('；', $other);

    $desc = isset($rule['desc']) ? trim($rule['desc']) : '';

    echo "<tr><td>$name</td><td>$type</td><td>$require</td><td>$default</td><td>$other</td><td>$desc</td></tr>\n";
}

/**
 * 返回结果
 */
echo <<<EOT
                </tbody>
            </table>
            <h3><i class="sign out alternate icon"></i>返回结果</h3>
            <table class="ui red celled striped table" >
                <thead>
                    <tr><th>返回字段</th><th>类型</th><th>说明</th></tr>
                </thead>
                <tbody>
EOT;

foreach ($returns as $item) {
    $name = $item[1];
    $type = isset($typeMaps[$item[0]]) ? $typeMaps[$item[0]] : $item[0];
    $detail = $item[2];

    echo "<tr><td>$name</td><td>$type</td><td>$detail</td></tr>";
}

echo <<<EOT
            </tbody>
        </table>
EOT;

/**
 * 异常情况
 */
if (!empty($exceptions)) {
    echo <<<EOT
            <h3><i class="bell icon"></i>异常情况</h3>
            <table class="ui red celled striped table" >
                <thead>
                    <tr><th>错误码</th><th>错误描述信息</th>
                </thead>
                <tbody>
EOT;

    foreach ($exceptions as $exItem) {
        $exCode = $exItem[0];
        $exMsg = isset($exItem[1]) ? $exItem[1] : '';
        echo "<tr><td>$exCode</td><td>$exMsg</td></tr>";
    }

    echo <<<EOT
            </tbody>
        </table>
EOT;
}

/**
 * 返回结果
 */
echo <<<EOT
<h3>
    <i class="bug icon"></i>在线测试 &nbsp;&nbsp;
</h3>
EOT;


echo <<<EOT
<table class="ui red celled striped table" >
    <thead>
        <tr><th width="25%">参数</th><th width="10%">是否必填</th><th width="65%">值</th></tr>
    </thead>
    <tbody id="params">
        <tr>
            <td>service</td>
            <td><font color="red">必须</font></td>
            <td><div class="ui fluid input disabled"><input name="service" data-source="get" value="{$service}" style="width:100%;" class="C_input" /></div></td>
        </tr>
EOT;
foreach ($rules as $key => $rule){
    // 接口文档不显示
    if (!empty($rule['is_doc_hide'])) {
        continue;
    }

    $source = isset($rule['source']) ? $rule['source'] : '';
    //数据源为server和header时该参数不需要提供
    if ($source == 'server' || $source == 'header') {
        continue;
    }
    $name = $rule['name'];
    $require = isset($rule['require']) && $rule['require'] ? '<font color="red">必须</font>' : '可选';
    // 提供给表单的默认值
    $default = isset($rule['default'])
        ? (is_array($rule['default']) // 针对数组，进行反序列化
            ? (!empty($rule['format']) && $rule['format'] == 'explode' 
                ? implode(isset($rule['separator']) ? $rule['separator'] : ',', $rule['default']) 
                : json_encode($rule['default'])) 
            : $rule['default'])
        : '';
    $default = htmlspecialchars($default);
    $desc = isset($rule['desc']) ? htmlspecialchars(trim($rule['desc'])) : '';
    $inputType = (isset($rule['type']) && $rule['type'] == 'file') ? 'file' : 'text';

    $multiple = '';
    if ($inputType == 'file') {
        $multiple = 'multiple="multiple"';
    }
    echo <<<EOT
        <tr>
            <td>{$name}</td>
            <td>{$require}</td>
            <td><div class="ui fluid input"><input name="{$name}" value="{$default}" data-source="{$source}" placeholder="{$desc}" style="width:100%;" class="C_input" type="$inputType" $multiple/></div></td>
        </tr>
EOT;
}
echo <<<EOT
    </tbody>
</table>
<div style="display: flex;align-items:center;">
    <!--<select name="request_type" style="font-size: 14px; padding: 2px;">
        <option value="POST">POST</option>
        <option value="GET">GET</option>
    </select>-->
EOT;
echo <<<EOT
<!--
接口链接：&nbsp;<input name="request_url" value="{$url}" style="width:500px; height:24px; line-height:18px; font-size:13px;position:relative; padding-left:5px;margin-left: 10px"/>
    <input type="submit" name="submit" value="发送" id="submit" style="font-size:14px;line-height: 20px;margin-left: 10px " class="ui green button" />
-->

</div>

<div class="ui fluid action input">
      <input placeholder="请求的接口链接" type="text" name="request_url" value="{$url}" >
      <button class="ui button blue" id="submit" >请求当前接口</button>
</div>
EOT;

/**
 * JSON结果
 */
echo <<<EOT
<div class="ui blue message" id="json_output" style="overflow: auto;">
</div>
EOT;

/**
 * 动态生成客户端代码示例
 */
// echo <<<EOT
// <h3><i class="code icon"></i>接口返回示例</h3>
// EOT;

// $demoCodes = '';
// $codeFile = API_ROOT . '/src/view/docs/demos/' . $service . '.json';
// if (file_exists($codeFile)) {
    // $demoCodes = htmlspecialchars(file_get_contents($codeFile));
// } else {
    // $demoCodes = '// 暂时无返回示例，可添加示例文件：' . (\PhalApi\DI()->debug ? $codeFile : $service . '.json');
// }

// echo <<<EOT
// <!-- 代码高亮 -->
// <link rel="stylesheet" href="//cdnjs.cloudflare.com/ajax/libs/highlight.js/9.13.1/styles/default.min.css">
// <script src="//cdnjs.cloudflare.com/ajax/libs/highlight.js/9.13.1/highlight.min.js"></script>
// <script>hljs.initHighlightingOnLoad();</script>
// <div class="ui text">
    // <pre><code>{$demoCodes}</code></pre>
// </div>
// EOT;


/**
 * 底部
 */
$version = PHALAPI_VERSION;
$thisYear = date('Y');
echo <<<EOT
        <div class="ui blue message">
          <strong>温馨提示：</strong> 此接口文档根据接口代码和注释实时自动生成，帮助文档请见<a href="http://docs.phalapi.net/#/v2.0/api-docs" target="_blank">PhalApi 2.x 开发文档</a>。
        </div>
        </div>

    </div>

    <script type="text/javascript">
        function getData() {
            var data = new FormData();
            var param = [];
            $("td input").each(function(index,e) {
                if ($.trim(e.value)){
                    if (e.type != 'file'){
                        if ($(e).data('source') == 'get') {
                            param.push(e.name + '=' + e.value);
                        } else {
                            data.append(e.name, e.value);
                        }

                        if (e.name != "service") $.cookie(e.name, e.value, {expires: 30});
                    } else{
                        var files = e.files;
                        if (files.length == 1){
                            data.append(e.name, files[0]);
                        } else{
                            for (var i = 0; i < files.length; i++) {
                                data.append(e.name + '[]', files[i]);
                            }
                        }
                    }
                }
            });
            param = param.join('&');
            return {param:param, data:data};
        }
        
        $(function(){
            $("#json_output").hide();
            $("#submit").on("click",function(){
                $("#json_output").html('<div class="ui active inverted dimmer"><div class="ui text loader">接口请求中……</div></div>');
                $("#json_output").show();

                var data = getData();
                var url_arr = $("input[name=request_url]").val().split('?');
                var url = url_arr.shift();
                var param = url_arr.join('?');
                param = param.length > 0 ? param + '&' + data.param : data.param;
                url = url + '?' + param;
                $.ajax({
                    url: url,
                    type:'post',
                    data:data.data,
                    cache: false,
                    processData: false,
                    contentType: false,
                    success:function(res,status,xhr){
                        var statu = xhr.status + ' ' + xhr.statusText;
                        var header = xhr.getAllResponseHeaders();
                        var json_text = JSON.stringify(res, null, 4);    // 缩进4个空格
                        $("#json_output").html('<pre>' + statu + '<br/>' + header + '<br/>' + json_text + '</pre>');
                        $("#json_output").show();
                    },
                    error:function(error){
                        $("#json_output").html('接口请求失败：' + error);
                    }
                })
            })

            fillHistoryData();

            checkLastestVersion();
        })

        // 填充历史数据
        function fillHistoryData() {
            $("td input").each(function(index,e) {
                var cookie_value = $.cookie(e.name);
                if (e.name != "service" && cookie_value != "" && cookie_value !== undefined) {
                    e.value = cookie_value;
                }
            });
        }

        // 检测最新版本
        function checkLastestVersion() {
                $.ajax({
                    url:'https://www.phalapi.net/check_lastest_version.php',
                    type:'get',
                    data:{version : '$version'},
                    success:function(res,status,xhr){
                        if (!res.ret || res.ret != 200) {
                            return;
                        }
                        if (res.data.need_upgrade >= 0) {
                            return;
                        }          

                        $('#version_update').html('&nbsp; | &nbsp; <a target="_blank" href=" ' + res.data.url + ' "><strong>免费升级到 PhalApi ' + res.data.version + '</strong></a>');              
                    },
                    error:function(error){
                        console.log(error)
                    }
                })

        }
    </script>
</body>
</html>
EOT;


