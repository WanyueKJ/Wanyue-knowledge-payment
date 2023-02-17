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

namespace App\Api;

use PhalApi\Api;
use App\Domain\Cart as Domain_Cart;
/**
 * 购物车
 */

class Cart extends Api {

    public function getRules() {
        return array(
            'add' => array(
                'type' => array('name' => 'type', 'type' => 'int', 'desc' => '类型，0课程1套餐'),
                'typeid' => array('name' => 'typeid', 'type' => 'int', 'desc' => '课程/套餐ID'),
            ),

            'update' => array(
                'cartid' => array('name' => 'cartid', 'type' => 'string', 'desc' => '购物车ID,多个,拼接'),
                'isselect' => array('name' => 'isselect', 'type' => 'int', 'desc' => '是否选择，0否1是'),
            ),

            'del' => array(
                'cartid' => array('name' => 'cartid', 'type' => 'string', 'desc' => '购物车ID,多个,拼接'),
            ),

            'getDeduct' => array(
                'goods' => array('name' => 'goods', 'type' => 'string', 'desc' => '商品信息 json串 格式：[{"type":"类型，0课程1套餐","typeid":"课程/套餐ID"}]'),
            ),

            'buy' => array(
                'payid' => array('name' => 'payid', 'type' => 'int', 'desc' => '支付方式ID'),
                'addrid' => array('name' => 'addrid', 'type' => 'int', 'desc' => '地址ID'),
                'method' => array('name' => 'method', 'type' => 'int', 'desc' => '下单方式，0直接购买，1购物车'),
                'goods' => array('name' => 'goods', 'type' => 'string', 'desc' => '商品信息 json串 格式：[{"type":"类型，0课程1套餐","typeid":"课程/套餐ID"}]'),
                'openid'  => array('name' => 'openid', 'type' => 'string', 'desc' => 'openid'),
            ),
        );
    }


    /**
     * 列表
     * @desc 用于获取购物车列表
     * @return int code 操作码，0表示成功
     * @return array  info
     * @return string info[0].isaddr 是否显示地址0否1是
     * @return array  info[0].list  列表
     * @return string info[0].list[].carttype  类型，0课程1套餐
     * @return string info[0].list[].isselect  是否选择0否1是
     * @return string info[0].list[].cartid  购物车ID
     * @return string info[0].list[].ifvip  是否显示vip价格
     * @return string info[0].list[].money_vip  VIP价格
     * @return string info[0].list[].money  支付价格
     * @return string msg 提示信息
     */
    public function getList() {
        $rs = array('code' => 0, 'msg' => '', 'info' => array());

        $uid = \App\checkNull($this->uid);
        $token = \App\checkNull($this->token);

        $checkToken=\App\checkToken($uid,$token);
        if($checkToken==700){
            $rs['code'] = $checkToken;
            $rs['msg'] = \PhalApi\T('您的登陆状态失效，请重新登陆！');
            return $rs;
        }
        $where=[
            'uid'=>$uid,
        ];
        $domain = new Domain_Cart();
        $res = $domain->getList($where);

        return $res;
    }

    /**
     * 购物车数量
     * @desc 用于获取购物车数量
     * @return int code 操作码，0表示成功
     * @return array  info
     * @return string info[0].nums 数量
     * @return string msg 提示信息
     */
    public function getNums() {
        $rs = array('code' => 0, 'msg' => '', 'info' => array());

        $uid = \App\checkNull($this->uid);
        $token = \App\checkNull($this->token);

        $checkToken=\App\checkToken($uid,$token);
        if($checkToken==700){
            $rs['code'] = $checkToken;
            $rs['msg'] = \PhalApi\T('您的登陆状态失效，请重新登陆！');
            return $rs;
        }

        $where=[
            'uid'=>$uid,
        ];
        $domain = new Domain_Cart();
        $nums = $domain->getNums($where);

        $info['nums']=$nums;

        $rs['info'][0]=$info;

        return $rs;
    }

    /**
     * 添加
     * @desc 用于购物车添加课程
     * @return int code 操作码，0表示成功
     * @return array info
     * @return string info[0].nums 购物车数量
     * @return string msg 提示信息
     */
    public function add() {
        $rs = array('code' => 0, 'msg' => \PhalApi\T('添加成功'), 'info' => array());

        $uid = \App\checkNull($this->uid);
        $token = \App\checkNull($this->token);
        $type = \App\checkNull($this->type);
        $typeid = \App\checkNull($this->typeid);

        $checkToken=\App\checkToken($uid,$token);
        if($checkToken==700){
            $rs['code'] = $checkToken;
            $rs['msg'] = \PhalApi\T('您的登陆状态失效，请重新登陆！');
            return $rs;
        }

        if($type<0 || $type>1 || $typeid<1){
            $rs['code'] = 1001;
            $rs['msg'] = \PhalApi\T('信息错误');
            return $rs;
        }

        $data=[
            'uid'=>$uid,
            'type'=>$type,
            'typeid'=>$typeid,
            'isselect'=>1,
            'addtime'=>time(),
        ];

        $domain = new Domain_Cart();
        $res = $domain->add($data);

        return $res;
    }

    /**
     * 更新选中状态
     * @desc 用于购物车添加课程
     * @return int code 操作码，0表示成功
     * @return array info
     * @return string msg 提示信息
     */
    public function update() {
        $rs = array('code' => 0, 'msg' => \PhalApi\T('操作成功'), 'info' => array());

        $uid = \App\checkNull($this->uid);
        $token = \App\checkNull($this->token);
        $cartid = \App\checkNull($this->cartid);
        $isselect = \App\checkNull($this->isselect);

        $checkToken=\App\checkToken($uid,$token);
        if($checkToken==700){
            $rs['code'] = $checkToken;
            $rs['msg'] = \PhalApi\T('您的登陆状态失效，请重新登陆！');
            return $rs;
        }

        if($cartid==''){
            $rs['code'] = 1001;
            $rs['msg'] = \PhalApi\T('信息错误');
            return $rs;
        }

        $cartids_a=explode(',',$cartid);
        foreach($cartids_a as $k=>$v){
            $cartids_a[$k]=(int)$v;
        }

        $cartids_s=implode(',',$cartids_a);

        $where="uid={$uid} and id in ({$cartids_s})";

        if($isselect==1){
            $isselect=1;
        }else{
            $isselect=0;
        }

        $data=[
            'isselect'=>$isselect,
        ];

        $domain = new Domain_Cart();
        $res = $domain->update($where,$data);


        return $rs;
    }

    /**
     * 删除
     * @desc 用于购物车删除课程
     * @return int code 操作码，0表示成功
     * @return array info
     * @return string msg 提示信息
     */
    public function del() {
        $rs = array('code' => 0, 'msg' => \PhalApi\T('删除成功'), 'info' => array());

        $uid = \App\checkNull($this->uid);
        $token = \App\checkNull($this->token);
        $cartid = \App\checkNull($this->cartid);

        $checkToken=\App\checkToken($uid,$token);
        if($checkToken==700){
            $rs['code'] = $checkToken;
            $rs['msg'] = \PhalApi\T('您的登陆状态失效，请重新登陆！');
            return $rs;
        }

        if($cartid==''){
            $rs['code'] = 1001;
            $rs['msg'] = \PhalApi\T('信息错误');
            return $rs;
        }

        $cartids_a=explode(',',$cartid);
        foreach($cartids_a as $k=>$v){
            $cartids_a[$k]=(int)$v;
        }

        $cartids_s=implode(',',$cartids_a);

        $where="uid={$uid} and id in ({$cartids_s})";

        $domain = new Domain_Cart();
        $res = $domain->del($where);

        return $rs;
    }

    /**
     * 支付方式
     * @desc 用于获取支付方式列表
     * @return int code 操作码，0表示成功
     * @return array info 支付方式
     * @return string info[].id 1支付宝2微信
     * @return string info[].name 名称
     * @return string info[].thumb 图标
     * @return string msg 提示信息
     */
    public function getPayList() {
        $rs = array('code' => 0, 'msg' => '', 'info' => array());

        $configpri=\App\getConfigPri();
        $aliapp_switch=$configpri['aliapp_switch'];
        $wx_switch=$configpri['wx_switch'];

        $paylist=[];

        if($aliapp_switch==1){
            $paylist[]=[
                'id'=>'1',
                'name'=>\PhalApi\T('支付宝支付'),
                'thumb'=>\App\get_upload_path("/static/app/pay/ali.png"),
            ];
        }

        if($wx_switch==1){
            $paylist[]=[
                'id'=>'2',
                'name'=>\PhalApi\T('微信支付'),
                'thumb'=>\App\get_upload_path("/static/app/pay/wx.png"),
            ];
        }

        $rs['info']=$paylist;
        return $rs;
    }

    /**
     * 积分抵扣
     * @desc 用于下单前获取积分抵扣信息
     * @return int code 操作码，0表示成功
     * @return array info
     * @return string info[0].deduct_integral 抵扣积分
     * @return string info[0].deduct_money 抵扣金额
     * @return string msg 提示信息
     */
    public function getDeduct() {
        $rs = array('code' => 0, 'msg' => '', 'info' => array());

        $uid=\App\checkNull($this->uid);
        $token=\App\checkNull($this->token);
        $goods=\App\checkNull($this->goods);

        if($uid<1 || $goods==''){
            $rs['code']=1001;
            $rs['msg']=\PhalApi\T('信息错误');
            return $rs;
        }

        $checkToken=\App\checkToken($uid,$token);
        if($checkToken==700){
            $rs['code'] = $checkToken;
            $rs['msg'] = \PhalApi\T('您的登陆状态失效，请重新登陆！');
            return $rs;
        }


        $domain = new Domain_Cart();
        $res = $domain->getDeduct($uid,$goods);

        return $res;
    }


    /**
     * 下单
     * @desc 用于下单购买
     * @return int code 操作码，0表示成功
     * @return array info
     * @return string info[0].orderid 订单号
     * @return string info[0].money 金额
     * @return object info[0].ali 支付宝信息
     * @return string info[0].ali.partner 合作者ID
     * @return string info[0].ali.seller_id  账号
     * @return string info[0].ali.key  PKCS8密钥
     * @return object info[0].wx 微信信息
     * @return string info[0].wx.appid 微信Appid
     * @return string info[0].wx.noncestr 随机数
     * @return string info[0].wx.package 固定数据
     * @return string info[0].wx.partnerid 商户ID
     * @return string info[0].wx.prepayid 支付ID
     * @return string info[0].wx.timestamp 时间戳
     * @return string msg 提示信息
     */
    public function buy() {
        $rs = array('code' => 0, 'msg' => '', 'info' => array());

        $uid=\App\checkNull($this->uid);
        $token=\App\checkNull($this->token);
        $payid=\App\checkNull($this->payid);
        $addrid=\App\checkNull($this->addrid);
        $method=\App\checkNull($this->method);
        $goods=\App\checkNull($this->goods);
        $openid = \App\checkNull($this->openid);

        if($uid<1 || $goods==''){
            $rs['code']=1001;
            $rs['msg']=\PhalApi\T('信息错误');
            return $rs;
        }

        $checkToken=\App\checkToken($uid,$token);
        if($checkToken==700){
            $rs['code'] = $checkToken;
            $rs['msg'] = \PhalApi\T('您的登陆状态失效，请重新登陆！');
            return $rs;
        }


        $domain = new Domain_Cart();
        $res = $domain->buy($uid,$payid,$addrid,$method,$goods, $openid);

        return $res;
    }
}
