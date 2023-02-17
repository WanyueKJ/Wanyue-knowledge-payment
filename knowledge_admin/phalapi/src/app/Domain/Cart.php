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

namespace App\Domain;

use App\Domain\Course as Domain_Course;
use App\Domain\Package as Domain_Package;
use App\Domain\User as Domain_User;
use App\Model\Cart as Model_Cart;
use App\Domain\Addr as Domain_Addr;

class Cart {

    /* 列表 */
    public function getList($where) {

        $rs = array('code' => 0, 'msg' => '', 'info' => array());

        $nowtime=time();
        $list2=[];
        $isaddr=0;
        $uid=$where['uid'] ?? 0;

        $model = new Model_Cart();
        $list= $model->getList($where);

        $Domain_Course = new Domain_Course();
        $Domain_Package = new Domain_Package();

        foreach($list as $k=>$v){

            $type=$v['type'];
            $typeid=$v['typeid'];
            if($type==1){
                /* 套餐 */
                $where2=['id'=>$typeid];
                $info=$Domain_Package->getList(1,$where2);
                if($info && isset($info[0]) ){
                    $pinfo=$info[0];

                    $pinfo['carttype']='1';
                    $pinfo['isselect']=$v['isselect'];
                    $pinfo['cartid']=$v['id'];

                    if($pinfo['ismaterial']==1){
                        $isaddr=1;
                    }

                    $money=$pinfo['price'];
                    $pinfo['money']=$money;

                    $list2[]=$pinfo;
                }
            }else{
                $where2=[
                    'status>=?'=>1,
                    'shelvestime<?'=>$nowtime,
                    'id'=>$typeid
                ];
                $info=$Domain_Course->getList(1,$where2);
                if($info && isset($info[0]) ){
                    $pinfo=$info[0];


                    $pinfo['carttype']='0';
                    $pinfo['isselect']=$v['isselect'];
                    $pinfo['cartid']=$v['id'];

                    if($pinfo['ismaterial']==1){
                        $isaddr=1;
                    }

                    $money=$pinfo['payval'];
                    $pinfo['money']=$money;

                    $list2[]=$pinfo;
                }
            }
        }

        $info=[
            'isaddr'=>(string)$isaddr,
            'list'=>$list2,
        ];

        $rs['info'][0]=$info;

        return $rs;
    }

    /* 添加 */
    public function add($data) {
        $rs = array('code' => 0, 'msg' => \PhalApi\T('添加成功'), 'info' => array());

        $model = new Model_Cart();

        $where2=[
            'uid'=>$data['uid'],
            'type'=>$data['type'],
            'typeid'=>$data['typeid'],
        ];
        $nums2=$model->getNums($where2);
        if(!$nums2){
            $res= $model->add($data);
            if(!$res){
                $rs['code'] = 1002;
                $rs['msg'] = \PhalApi\T('添加失败，请重试');
                return $rs;
            }
        }else{
            $data2=[
                'isselect'=>1,
            ];
            $model->update($where2,$data2);
        }

        $where=[
            'uid'=>$data['uid'],
        ];
        $nums=$model->getNums($where);

        $info['nums']=$nums;

        $rs['info'][0]=$info;

        return $rs;
    }

    /* 数量 */
    public function getNums($where) {


        $model = new Model_Cart();
        $nums= $model->getNums($where);

        return $nums;
    }

    /* 更新 */
    public function update($where,$data) {


        $model = new Model_Cart();
        $list= $model->update($where,$data);

        return $list;
    }

    /* 删除 */
    public function del($where) {


        $model = new Model_Cart();
        $list= $model->del($where);

        return $list;
    }

    /* 计算折扣 */
    public function getDeduct($uid,$goods){
        $rs = array('code' => 0, 'msg' => \PhalApi\T('操作成功'), 'info' => array());

        $goods_a=json_decode($goods,true);
        if(!$goods_a){
            $rs['code'] = 1003;
            $rs['msg'] = \PhalApi\T('信息错误');
            return $rs;
        }

        if(!is_array($goods_a)){
            $rs['code'] = 1004;
            $rs['msg'] = \PhalApi\T('信息错误');
            return $rs;
        }

        $info=[
            'deduct_integral'=>'0',
            'deduct_money'=>'0',
        ];

        $configpri=\App\getConfigPri();

        $integral_de=$configpri['integral_de'];
        if($integral_de<=0){
            $rs['info'][0]=$info;
            return $rs;
        }

        $Domain_User=new Domain_User();
        $where2=['id'=>$uid];
        $field='integral';
        $userinfo=$Domain_User->getUsersInfo($where2,$field);
        if(!$userinfo || $userinfo['integral']==0){
            $rs['info'][0]=$info;
            return $rs;
        }

        $integral=$userinfo['integral'];

        $deduct_money_all=0;
        $Domain_Course = new Domain_Course();
        $Domain_Package = new Domain_Package();
        $money = 0;

        foreach($goods_a as $k=>$v){
            $type = $v['type'] ?? 0;
            $typeid = $v['typeid'] ?? 0;

            if($typeid==0){
                $rs['code'] = 1008;
                $rs['msg'] = \PhalApi\T('信息错误');
                return $rs;
            }

            if($type==1){
                $where=[
                    'id'=>$typeid,
                ];
                $pinfo=$Domain_Package->getInfod($where);
                if(!$pinfo){
                    $rs['code'] = 1003;
                    $rs['msg'] = \PhalApi\T('含有已下架的套餐');
                    return $rs;
                }

                $deduct_money=$pinfo['deduct_money'];
                if($deduct_money>$pinfo['price']){
                    $deduct_money=$pinfo['price'];
                }

                $deduct_money_all+=$deduct_money;
                $money+=$pinfo['price'];

            }else{
                $where=[
                    'id'=>$typeid,
                ];
                $cinfo=$Domain_Course->getDetaild($where);
                if(!$cinfo){
                    $rs['code'] = 1005;
                    $rs['msg'] = \PhalApi\T('含有已下架课程');
                    return $rs;
                }

                $deduct_money=$cinfo['deduct_money'];
                if($deduct_money>$cinfo['payval']){
                    $deduct_money=$cinfo['payval'];
                }

                $deduct_money_all+=$deduct_money;

                $money+=$cinfo['payval'];
            }
        }

        $can_money=floor($integral*100/$integral_de)*0.01;
        if($can_money<$deduct_money_all){
            $deduct_integral=$integral;
            $deduct_money=$can_money;
        }else{
            $deduct_money=$deduct_money_all;
            $deduct_integral=floor($deduct_money_all*$integral_de*100)*0.01;
        }

        if($deduct_money==0){
            $deduct_integral='0';
        }

        $info['deduct_money']=number_format($deduct_money,2,'.','');
        $info['deduct_integral']=(string)$deduct_integral;

        $rs['info'][0]=$info;

        return $rs;
    }
    /* 付费 */
    public function buy($uid,$payid,$addrid,$method,$goods, $openid){

        $rs = array('code' => 0, 'msg' => \PhalApi\T('操作成功'), 'info' => array());

        $money='0';
        $isaddr='0';
        $goods_a=json_decode($goods,true);
        if(!$goods_a){
            $rs['code'] = 1003;
            $rs['msg'] = \PhalApi\T('信息错误');
            return $rs;
        }

        if(!is_array($goods_a)){
            $rs['code'] = 1004;
            $rs['msg'] = \PhalApi\T('信息错误');
            return $rs;
        }

        $Domain_Course = new Domain_Course();
        $Domain_Package = new Domain_Package();

        foreach($goods_a as $k=>$v){
            $type=isset($v['type'])?$v['type']:0;
            $typeid=isset($v['typeid'])?$v['typeid']:0;

            if($typeid==0){
                $rs['code'] = 1008;
                $rs['msg'] = \PhalApi\T('信息错误');
                return $rs;
            }

            if($type==1){
                $where=[
                    'id'=>$typeid,
                ];
                $info=$Domain_Package->getInfod($where);
                if(!$info){
                    $rs['code'] = 1003;
                    $rs['msg'] = \PhalApi\T('含有已下架的套餐');
                    return $rs;
                }

                $buy_status=$Domain_Package->checkPackage($uid,$typeid);
                if($buy_status==1){
                    $rs['code'] = 1004;
                    $rs['msg'] = \PhalApi\T('含有已购买的套餐');
                    return $rs;
                }

                if($info['ismaterial']==1){
                    $isaddr=1;
                }

                $money_one=$info['price'];

                $money+=$money_one;

            }else{
                $where=[
                    'id'=>$typeid,
                ];
                $info=$Domain_Course->getDetaild($where);
                if(!$info){
                    $rs['code'] = 1005;
                    $rs['msg'] = \PhalApi\T('含有已下架课程');
                    return $rs;
                }
                $buy_status=$Domain_Course->checkCourse($uid,$info['id'],$info['paytype']);
                if($buy_status==1){
                    $rs['code'] = 1006;
                    $rs['msg'] = \PhalApi\T('含有已购买的课程');
                    return $rs;
                }

                if($info['ismaterial']==1){
                    $isaddr=1;
                }

                $money_one=$info['payval'];

                $money+=$money_one;
            }
        }

        $nowtime=time();

        $orderid=$uid.'_'.date('ymdHis').rand(100,999);

        $order_data=[
            'uid'=>$uid,
            'type'=>$payid,
            'money'=>$money,
            'money_total'=>$money,
            'orderno'=>$orderid,
            'status'=>0,
            'addtime'=>$nowtime,
        ];

        if($isaddr==1){
            if($addrid<1){
                $rs['code'] = 1007;
                $rs['msg'] = \PhalApi\T('请选择收货地址');
                return $rs;
            }

            $Domain_Addr = new Domain_Addr();
            $where4=[
                'uid'=>$uid,
                'id'=>$addrid,
            ];
            $addr_info=$Domain_Addr->getInfo($where4);
            if(!$addr_info){
                $rs['code'] = 1008;
                $rs['msg'] = \PhalApi\T('收货地址错误');
                return $rs;
            }

            $order_data['issend']=0;
            $order_data['addr_name']=$addr_info['name'];
            $order_data['addr_mobile']=$addr_info['mobile'];
            $order_data['addr_province']=$addr_info['province'];
            $order_data['addr_city']=$addr_info['city'];
            $order_data['addr_area']=$addr_info['area'];
            $order_data['addr']=$addr_info['addr'];
        }

        \PhalApi\DI()->notorm->beginTransaction('db_master');

        if($money==0){
            $order_data['type']=1;
        }else{
            if($payid<1 || $payid > 4){
                \PhalApi\DI()->notorm->rollback('db_master');
                $rs['code'] = 1013;
                $rs['msg'] = \PhalApi\T('请选择正确的支付方式');
                return $rs;
            }
        }

        $model = new Model_Cart();
        $res=$model->addOrder($order_data);
        if($res===false){
            \PhalApi\DI()->notorm->rollback('db_master');
            $rs['code'] = 1006;
            $rs['msg'] = \PhalApi\T('下单失败，请重试');
            return $rs;
        }

        foreach($goods_a as $k=>$v){
            $type=isset($v['type'])?$v['type']:0;
            $typeid=isset($v['typeid'])?$v['typeid']:0;

            $data_good=[
                'uid'=>$uid,
                'orderno'=>$orderid,
                'type'=>$type,
                'typeid'=>$typeid,
            ];
            $model->addOrderGood($data_good);
        }

        $configpri = \App\getConfigPri();

        $ali=[
            'partner'=>'',
            'seller_id'=>'',
            'key'=>'',
        ];
        $wx=[
            'appid'=>'',
            'noncestr'=>'',
            'package'=>'',
            'partnerid'=>'',
            'prepayid'=>'',
            'timestamp'=>'',
        ];
        $small='';
        $h5='';

        if($money==0){
            \PhalApi\DI()->notorm->commit('db_master');

            $where=['orderno'=>$orderid];
            \App\handelPay($where);

            $rs['info'][0]['ali']=$ali;
            $rs['info'][0]['wx']=$wx;

            $rs['info'][0]['orderid']=$orderid;
            $rs['info'][0]['money']=(string)$money;
            return $rs;
        }

        if($payid==1){
            /* 支付宝 */
            $ali=[
                'partner'=>$configpri['aliapp_partner'],
                'seller_id'=>$configpri['aliapp_seller_id'],
                'key'=>$configpri['aliapp_key'],
            ];
        }
        if($payid==2){
            /* 微信 */
            $url=\App\get_upload_path('/appapi/cartpay/notify_wx');
            $res=\App\wxPay($orderid,$money,$url,'购买课程');
            if($res['code']!=0){
                \PhalApi\DI()->notorm->rollback('db_master');
                return $res;
            }
            $wx=$res['info'];
        }
        if ($payid == 3) {
            //UNIAPP端小程序支付
            $url=\App\get_upload_path('/appapi/cartpay/notify_small');
            $res=\App\smallPay($orderid,$money,$url,'购买课程', $openid);
            if($res['code']!=0){
                \PhalApi\DI()->notorm->rollback('db_master');
                return $res;
            }
            $small=$res['info'];

        }
        if ($payid == 4) {
            //UNIAPP端 H5支付
            $url=\App\get_upload_path('/appapi/cartpay/notify_hfive');
            $res=\App\hfivePay($orderid,$money,$url,'购买课程', $openid);
            if($res['code']!=0){
                \PhalApi\DI()->notorm->rollback('db_master');
                return $res;
            }
            $h5=$res['info'];
        }

        \PhalApi\DI()->notorm->commit('db_master');

        $rs['info'][0]['ali']=$ali;
        $rs['info'][0]['wx']=$wx;
        $rs['info'][0]['small']=$small;
        $rs['info'][0]['h5']=$h5;

        $rs['info'][0]['orderid']=$orderid;
        $rs['info'][0]['money']=(string)$money;
        return $rs;
    }
}
