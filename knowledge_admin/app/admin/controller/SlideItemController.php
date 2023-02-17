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

namespace app\admin\controller;

use think\Db;
use cmf\controller\AdminBaseController;
use app\admin\model\SlideItemModel;

class SlideItemController extends AdminBaseController
{
    /**
     * 幻灯片页面列表
     * @adminMenu(
     *     'name'   => '幻灯片页面列表',
     *     'parent' => 'admin/Slide/index',
     *     'display'=> false,
     *     'hasView'=> true,
     *     'order'  => 10000,
     *     'icon'   => '',
     *     'remark' => '幻灯片页面列表',
     *     'param'  => ''
     * )
     * @return mixed
     * @throws \think\db\exception\DataNotFoundException
     * @throws \think\db\exception\ModelNotFoundException
     * @throws \think\exception\DbException
     */
    public function index()
    {
        $content = hook_one('admin_slide_item_index_view');

        if (!empty($content)) {
            return $content;
        }

        $id      = $this->request->param('slide_id', 0, 'intval');
        $slideId = !empty($id) ? $id : 1;
        $result  = Db::name('slideItem')->where('slide_id', $slideId)->select();

        $this->assign('slide_id', $id);
        $this->assign('result', $result);
        return $this->fetch();
    }

    /**
     * 幻灯片页面添加
     * @adminMenu(
     *     'name'   => '幻灯片页面添加',
     *     'parent' => 'index',
     *     'display'=> false,
     *     'hasView'=> true,
     *     'order'  => 10000,
     *     'icon'   => '',
     *     'remark' => '幻灯片页面添加',
     *     'param'  => ''
     * )
     */
    public function add()
    {
        $content = hook_one('admin_slide_item_add_view');

        if (!empty($content)) {
            return $content;
        }

        $slideId = $this->request->param('slide_id');
        $this->assign('slide_id', $slideId);
        return $this->fetch();
    }

    /**
     * 幻灯片页面添加提交
     * @adminMenu(
     *     'name'   => '幻灯片页面添加提交',
     *     'parent' => 'index',
     *     'display'=> false,
     *     'hasView'=> false,
     *     'order'  => 10000,
     *     'icon'   => '',
     *     'remark' => '幻灯片页面添加提交',
     *     'param'  => ''
     * )
     */
    public function addPost()
    {
        $data = $this->request->param();
        Db::name('slideItem')->insert($data['post']);
        
        $this->resetcache($data['post']['slide_id']);
		
        $this->success("添加成功！", url("slideItem/index", ['slide_id' => $data['post']['slide_id']]));
    }

    /**
     * 幻灯片页面编辑
     * @adminMenu(
     *     'name'   => '幻灯片页面编辑',
     *     'parent' => 'index',
     *     'display'=> false,
     *     'hasView'=> true,
     *     'order'  => 10000,
     *     'icon'   => '',
     *     'remark' => '幻灯片页面编辑',
     *     'param'  => ''
     * )
     */
    public function edit()
    {
        $content = hook_one('admin_slide_item_edit_view');

        if (!empty($content)) {
            return $content;
        }

        $id     = $this->request->param('id', 0, 'intval');
        $result = Db::name('slideItem')->where('id', $id)->find();

        $this->assign('result', $result);
        $this->assign('slide_id', $result['slide_id']);
        return $this->fetch();
    }

    /**
     * 幻灯片页面编辑
     * @adminMenu(
     *     'name'   => '幻灯片页面编辑提交',
     *     'parent' => 'index',
     *     'display'=> false,
     *     'hasView'=> false,
     *     'order'  => 10000,
     *     'icon'   => '',
     *     'remark' => '幻灯片页面编辑提交',
     *     'param'  => ''
     * )
     */
    public function editPost()
    {
        $data = $this->request->param();

        $data['post']['image'] = cmf_asset_relative_url($data['post']['image']);

        Db::name('slideItem')->update($data['post']);
        
        $this->resetcache($data['post']['slide_id']);

        $this->success("保存成功！", url("SlideItem/index", ['slide_id' => $data['post']['slide_id']]));

    }

    /**
     * 幻灯片页面删除
     * @adminMenu(
     *     'name'   => '幻灯片页面删除',
     *     'parent' => 'index',
     *     'display'=> false,
     *     'hasView'=> false,
     *     'order'  => 10000,
     *     'icon'   => '',
     *     'remark' => '幻灯片页面删除',
     *     'param'  => ''
     * )
     */
    public function delete()
    {
        $id = $this->request->param('id', 0, 'intval');

        $slideItem = Db::name('slideItem')->find($id);

        $result = Db::name('slideItem')->delete($id);
        if ($result) {
			$this->resetcache($slideItem['slide_id']);
            //删除图片。
//            if (file_exists("./upload/".$slideItem['image'])){
//            }
            $this->success("删除成功！", url("SlideItem/index", ["slide_id" => $slideItem['slide_id']]));
        } else {
            $this->error('删除失败！');
        }

    }

    /**
     * 幻灯片页面隐藏
     * @adminMenu(
     *     'name'   => '幻灯片页面隐藏',
     *     'parent' => 'index',
     *     'display'=> false,
     *     'hasView'=> false,
     *     'order'  => 10000,
     *     'icon'   => '',
     *     'remark' => '幻灯片页面隐藏',
     *     'param'  => ''
     * )
     */
    public function ban()
    {
        $id = $this->request->param('id', 0, 'intval');
        $slide_id = $this->request->param('slide_id', 0, 'intval');
        if ($id) {
            $rst = Db::name('slideItem')->where('id', $id)->update(['status' => 0]);
            if ($rst) {
				$this->resetcache($slide_id);
                $this->success("幻灯片隐藏成功！");
            } else {
                $this->error('幻灯片隐藏失败！');
            }
        } else {
            $this->error('数据传入失败！');
        }
    }

    /**
     * 幻灯片页面显示
     * @adminMenu(
     *     'name'   => '幻灯片页面显示',
     *     'parent' => 'index',
     *     'display'=> false,
     *     'hasView'=> false,
     *     'order'  => 10000,
     *     'icon'   => '',
     *     'remark' => '幻灯片页面显示',
     *     'param'  => ''
     * )
     */
    public function cancelBan()
    {
        $id = $this->request->param('id', 0, 'intval');
        $slide_id = $this->request->param('slide_id', 0, 'intval');
        if ($id) {
            $result = Db::name('slideItem')->where('id', $id)->update(['status' => 1]);
            if ($result) {
                $this->resetcache($slide_id);
                $this->success("幻灯片启用成功！");
            } else {
                $this->error('幻灯片启用失败！');
            }
        } else {
            $this->error('数据传入失败！');
        }
    }

    /**
     * 幻灯片页面排序
     * @adminMenu(
     *     'name'   => '幻灯片页面排序',
     *     'parent' => 'index',
     *     'display'=> false,
     *     'hasView'=> false,
     *     'order'  => 10000,
     *     'icon'   => '',
     *     'remark' => '幻灯片页面排序',
     *     'param'  => ''
     * )
     */
    public function listOrder()
    {
		$slide_id = $this->request->param('slide_id', 0, 'intval');
        $slideItemModel = new  SlideItemModel();
        parent::listOrders($slideItemModel);
        $this->resetcache($slide_id);
        $this->success("排序更新成功！");
    }
	
    private function resetcache($slide_id){
		if($slide_id<1){
			return !1;
		}
        $key='getSlide_'.$slide_id;
        //$rs=Db::name("slideItem")->field('id,title,image,url')->where("status='1' and slide_id={$slide_id} ")->order("list_order asc")->select()->toArray();
		$where=[
			['status','=','1'],
			['slide_id','=',$slide_id],

		];
        $rs=Db::name("slideItem")->field('id,title,image,url')->where($where)->order("list_order asc")->select()->toArray();
		if($rs){
			setcaches($key,$rs);
		}else{
			delcache($key);
		}
        return 1;
    }
}