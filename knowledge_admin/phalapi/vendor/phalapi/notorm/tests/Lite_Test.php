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

require_once dirname(__FILE__) . '/../src/Lite.php';

class PHPUnderControll_Lite_Test extends PHPUnit_FrameWork_TestCase {

    public function testHere() {
        $pdo = new PDO('mysql:dbname=phalapi;host=localhost;port=3306', 'root', '123'); 

        $lite = new PhalApi\NotORM\Lite($pdo);

        $structure = new NotORM_Structure_Convention('key', '%s_id', '%s', 'prefix');
        $lite->setStructure($structure);

    }
}
