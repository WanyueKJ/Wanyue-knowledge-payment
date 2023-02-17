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

/**
 * Created by PhpStorm.
 * User: niebangheng
 * Date: 2019/1/26
 * Time: 15:39
 */

namespace PhalApi\Tests;

use PhalApi\Helper\ApiList;
use PhalApi\Helper\ApiStaticCreate;
use PhalApi\Request;
use PhalApi\Api;
use PHPUnit\Framework\TestCase;

include_once dirname(__FILE__) . '/../app.php';

/**
 * PhpUnderControl_PhalApiHelperApiDesc_Test
 *
 * 针对 ../../PhalApi/Helper/ApiDesc.php PhalApi_Helper_ApiDesc 类的PHPUnit单元测试
 *
 */
class PhpUnderControl_PhalApiHelperApiList_Test extends TestCase
{
    public $api;

    protected function setUp() {
        parent::setUp();
        $this->api = new ApiList('PhalApi Test');
        $this->apiCreate = new ApiStaticCreate('PhalApi Test');
    }

    protected function tearDown() {
    }


    /**
     * @group testRender
     */
    public function testRenderDefault() {
        \PhalApi\DI()->request = new Request(array());
        $rs = @$this->api->render();
        $this->expectOutputRegex("/PhalApi Test/");
    }

    public function testStaticOutPut() {
        \PhalApi\DI()->request = new Request(array());
        $rs = @$this->apiCreate->render();
        $this->expectOutputRegex("/Usage/");
    }


}

class UserMockForList extends Api
{

    /**
     * @param int user_id ID
     * @return int code sth...
     */
    public function getBaseInfo() {
    }
}
