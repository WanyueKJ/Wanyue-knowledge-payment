<template>
	<view class="page">
		<uni-nav-bar status-bar="true" :border="false">
			<view slot="left">
				<view class="check_class">
					<text>万岳知识付费</text>
				</view>
			</view>
			<view class="search-all-wrap">
				<view class="search-wrap" @click="search">
					<text class="iconfont icon-faxianchaxun"></text>
					<input disabled="true" class="uni-input" placeholder="搜索课程, 老师" placeholder-style="color:#C7C7C7; font-size:20rpx;" />
				</view>
			</view>
			<view @click="shopcar" slot="right" style="position: relative; right: -30rpx;">
				<view class="new_gouwuche">
					<image class="gowucheimage" src="../../static/gouwuche.png" mode="aspectFit">
					</image>
					<template v-if="nums != 0">
						<view class="gouwunums">
							<view class="carnums">{{nums}}</view>
						</view>
					</template>
				</view>
			</view>
			</uni-nav-bar>
		
		<view style="background-color: #FFFFFF;height: 130rpx; " class="course-abs-wrap">
			<!-- 全部标签 -->
			<view class="flex align-center font-weight-bold course-tab">
				<scroll-view class="scroll-view_H" scroll-x="true" scroll-left="10" :scroll-into-view="currentScrollId">
					<view class="courseclass-tab-item" :id="'scroll_item' + index" @click="changeTab(index, item.id)" v-for="(item, index) in tabBars" :key="index" :class="tabIndex === index ? 'courseclass-text-main' : 'courseclass-text-light-muted'">
						{{item.name}}
					</view>
				</scroll-view>
			</view>
			<!-- 类型标签 -->
			<view class="mark-type-wrap">
				<view class="flex align-center font-weight-bold mark-sub-tab">
					<scroll-view class="scroll-view_H" scroll-x="true" @scroll="scroll" scroll-left="120">
						<view class="mark-sub-item" @click="changeSubTab(index)" v-for="(item, index) in tabBarsCourse" :key="index" :class="subTabIndex === index ? 'text-main' : 'text-light-muted'">
							{{item.name}}
						</view>
					</scroll-view>
				</view>	
			 </view>
		</view>
		
	<scroll-view class="index-all-wrap">			
	
	  <block v-if="userInfo != ''">
				
		<swiper scroll-y="true" :current="subTabIndex" class="swiper-box" :style="{height:scrollH+'rpx'}" @change="onChangeTab">
			<!-- 全部 -->
			<swiper-item v-for="(index) in tabBarsCourse">
				<scroll-view scroll-y :style="'height:' + scrollH+'rpx;'" @scrolltolower="loadmoreEvent">

					<view @click="viewLiveInfo(item.id,item.sort)" class="live-list" v-for="(item, index) in list" :key="index">
						<view class="live-list-img-wrap">
							<image class="live-list-img" :src="item.thumb" mode="aspectFill"></image>
							<template v-if="item.sort == 0">
								<text class="course-title-icon">内容</text>
							</template>
							<template v-else-if="item.sort == 1">
								<text class="course-title-icon">课程</text>
							</template>
							<template v-else>
								<text class="course-title-icon">直播</text>
							</template>
						</view> 
					
						<view class="live-list-info">

							<view class="live-c-title">{{item.name}}</view>
							<template v-if="item.sort == 0">
								<view class="live-status living-status" v-if="item.islive == 1">
									{{item.lesson}}
								</view>
								<view class="live-status-tuwen" v-else>
									{{item.lesson}}
								</view>
							</template>
							<template v-else>
								<view class="live-status living-status" v-if="item.islive == 1">
									{{item.lesson}}
								</view>
								<view class="live-status" v-else>
									{{item.lesson}}
								</view>
							</template>
							<view class="live-teacher-price">
								<image class="live-teacher-avatar" :src="item.avatar" mode="aspectFill"></image>
								<text class="teacher-name">{{item.user_nickname}}</text>
								<view class="price-wrap">
									<text v-if="item.paytype == 0">免费</text>
									<text v-if="item.paytype == 2" class="pass">密码</text>
									<text v-if="item.paytype ==1" class="numPrice">
										{{'¥' + item.payval}}
									</text>
								</view>
							</view>
						</view> 
					 </view>
				</scroll-view>
			</swiper-item>
		</swiper>
		
		<template v-if="kongkong == true">
			<view :class="{xiangziwrap : (kongkong == true)}">
				<image class="xiangzi" src="../../static/images/xiangzi.png" mode="aspectFill"></image>
				<text class="xiangzi_txt">暂无课程，快去选课吧~</text>
			</view>
		</template>
		
	</block>			
	<block v-else>
		<view class="no-login-wrap">
			<text class="no-login-txt">登录后可查看详细内容</text>
			<text @click="openLogin" class="no-login-btn">立即登录</text>
		</view>
	</block>
	
		
		</scroll-view>	
	</view>
</template>

<script>
	import courseList from '@/components/common/course-list.vue';
	import uniNavBar from '@/components/uni-ui/uni-nav-bar/uni-nav-bar.vue'
	const app = getApp();

	export default {
		components: {
			courseList,
			uniNavBar
		},
		data() {
			return {
				scrollH: 0,
				tabIndex: 0,
				subTabIndex:0,
				course_ID:'',
				tabBars: [],
				list: [],
				loadmore: "上拉加载更多",
				hotCate: [],
				topicList: [],
				keyword: '',
				kongkong: false,
				sdata: '',
				nums: '',//购物车个数
				system_top:0,
				userInfo: '', //用户信息
				tiListByTab: [], //试题列表, 分标签
				tabBarsCourse: [
					{
						name: "全部"
					}, {
						name: "直播"
					}, {
						name: "图文"
					}, {
						name: "视频"
					}, {
						name: "音频"
					}
				],
				scroll_left: 10, //横向滚动条位置
				currentScrollId: '', //当前选中的标签id
			}
		},
		onShow() {
			if (app.globalData.userinfo != '') {
				this.userInfo = app.globalData.userinfo;
			}
			
		},
		onReady() {
		
			var that = this;
			uni.getSystemInfo({
				success: function(res) {
					that.scrollH = res.windowHeight * 750 / res.windowWidth - 140;
					
				}
			});	
			this.getnums();
		},
		onLoad() {
						
			if (app.globalData.userinfo != '') {
				this.userInfo = app.globalData.userinfo;
			}
			this.getnums();
			uni.getSystemInfo({
				success: (res) => {
					this.scrollH = res.windowHeight - res.statusBarHeight - 44;
				}
			});
			
			this.getData();
			
		},
		methods: {
			
			openLogin() {
				uni.navigateTo({
					url: '../login/login'
				})
			},
			onInput(e){
				
				this.keyword = e.detail.value;
				// 搜索方法
				this.GetMyCourse(this.tabIndex, this.keyword);
			},
			getData() {
				let that = this;
				//获取分类
				uni.request({
					url: app.globalData.site_url + 'Homeknowledge.GetIndex',
					// 此处代表分类id 没有年级id
					data: {
						'gradeid': app.globalData.grade_class.id
					},
					success: (res) => {
						let data = res.data.data;
						if (parseInt(res.data.data.code) !== 0) {
							return;
						}
						that.tabBars = data.info[0].courseclass;
						that.course_ID = that.tabBars[0].id; //默认第一个id
						that.GetCourseList(that.tabBars[0].id,0);
					}
				});
			},
			
			GetCourseList(kid,subIndex) {
				let gData = app.globalData;
				let sort = 0;
				if(subIndex == 1) { //大班课
					sort = 2;
				} else if(subIndex < 1) {
					sort = 3; //全部
				}
				
				let that = this;
				uni.request({
					url: gData.site_url + 'Knowledge.GetClassCourse',
					method: 'GET',
					data: {
						'p' : 1,
						'knowledge_id':kid,
						'sort': sort,
						'type':subIndex
					},
					success: res => {
						if (res.data.data.code == 0) {
							that.kongkong = false;
							that.list = res.data.data.info;
							
							if (that.list.length == 0) {
								that.kongkong = true;
							}
						} else {
							that.kongkong = true;
						}
			
					},
				});
				
			},
			//切换父选项卡
			changeTab(index, classid) {
				this.tabIndex = index;
				this.subTabIndex = 0; //子标签置0
				this.course_ID = classid;
				this.GetCourseList(classid, 0);
			},
			//切换子类型选项卡
			changeSubTab(index) {
				this.subTabIndex = index;
				this.list.length = 0;
				this.GetCourseList(this.course_ID,this.subTabIndex);
			},
			//滑动
			onChangeTab(e) {
				//切换当前索引
				this.subTabIndex = e.detail.current;
				this.GetCourseList(this.course_ID,this.subTabIndex);
			},
			//顶踩操作
			doSupport(e) {

				//拿到当前对象
				let item = this.list[e.index];
				let msg = e.type === 'support' ? '顶' : '踩';

				//判断之前是否已经顶踩
				if (item.support.type === '') {
					item.support[e.type + '_count']++;
				} else if (item.support.type === 'support' && e.type === 'unsupport') {
					//顶 -1
					item.support.support_count--;
					//踩 +1
					item.support.unsupport_count++;
				} else if (item.support.type === 'unsupport' && e.type === 'support') {
					//之前踩了
					// 顶+1
					item.support.support_count++;
					// 踩-1
					item.support.unsupport_count--;
				}

				item.support.type = e.type;
				uni.showToast({
					title: msg + '成功'
				});
			},
			loadmoreEvent() {
				//验证当前是否处于可加载状态
				if (this.loadmore !== '上拉加载更多') return;
				//设置加载状态
				this.loadmore = '加载中...';
				//模拟请求数据
				setTimeout(() => {
					//加载数据
					this.list = [...this.list, ...this.list];
					//设置加载状态
					this.loadmore = '上拉加载更多';
				}, 2000)
			},
			viewLiveInfo(liveCourseId, sorttype) {
				if (getApp().globalData.userinfo == '') {
					uni.navigateTo({
						url: '../login/login'
					})
					return;
				}
				//套餐
				if (sorttype == undefined) {
					uni.navigateTo({
						url: '../../packageB/pages/taocaninfo/taocaninfo?courseid=' + liveCourseId
					});
				}
				//
				else if (sorttype == 0) {
					uni.navigateTo({
						url: '../../packageB/pages/content-info/content-info?courseid=' + liveCourseId
					});
				} else if (sorttype == 1) {
					uni.navigateTo({
						url: '../../packageB/pages/courseinfo/courseinfo?courseid=' + liveCourseId
					});
				} else
					uni.navigateTo({
						url: '../../packageB/pages/live_course_info/live_course_info?courseid=' + liveCourseId
					});
			},
			//获取购物车的数量
			getnums() {
				if (getApp().globalData.userinfo == '') {
					return;
				}
				let gData = app.globalData;
				uni.request({
					url: gData.site_url + 'Cart.GetNums',
					method: 'POST',
					data: {
						'uid': gData.userinfo.id,
						'token': gData.userinfo.token,
					},
					success: res => {
						if (res.data.data.code == 0) {
							this.nums = res.data.data.info[0].nums;
						}
					},
				});
			},
			search() {
				uni.navigateTo({
					url: "../search/search"
				})
			},
			shopcar() {
				if (getApp().globalData.userinfo == '') {
					uni.navigateTo({
						url: '../login/login'
					})
					return;
				}
			
				uni.navigateTo({
					url: '../shop-car/shop-car',
				});
			},
		}
	}
</script>

<style>
	@import url("/static/css/course_list.css");
	page {
		overflow: hidden;
	}
	.page{
		/* width: 100%;
		height: 100%; */
		width: 100%;
		margin: 0 auto;
	}
	.check_class {
		color: #2C62EF !important;
		font-size: 34rpx;
		font-weight: bold;
		display: inline-block;
		width: 230rpx;
	}
	
	/deep/ .uni-navbar--fixed {
		width: 96%;
		height: 100rpx;
		padding-top: 30rpx;
		/* #ifdef MP-WEIXIN*/
		padding-top: 130rpx;
		/* #endif */
		position: fixed;
		top: 0;
		left: 6rpx;
		z-index: 999;
	}
	
	.swiper-box {
		margin-top: 20rpx;
	}

	.course-tab {
		margin-top: 25rpx;
		height: 45rpx;
		margin-bottom: 30rpx;
	}

	.s-all-wrap {
		position: relative;
	}

	.search-all-wrap {
		position: absolute;
		margin-top: 0rpx;
		right: 130rpx;
		left: 220rpx;
		width: 400rpx;
		height: 48rpx;
	}
	
	.search-wrap {
		width: 100%;
		height: 100%;
		line-height: 48rpx;
		border-radius: 30rpx;
		margin-left: 20rpx;
		padding-left: 20rpx;
		background-color: #F5F5F5;
		float: left;
	}
	
	.search-wrap text,
	.search-wrap input {
		float: left;
		background-color: #F5F5F5;
		height: 100%;
		padding: 0;
	}
	
	.search-wrap text {
		margin-right: 20rpx;
		color: #C7C7C7;
	}
	
	.search-wrap input {
		width: 70%;
	}
	
	.new_gouwuche {
		position: relative;
		width: 80rpx;
		height: 80rpx;
	}
	
	.gouwunums {
		position: absolute;
		background-color: #DC2929;
		width: 26rpx;
		height: 26rpx;
		border-radius: 13rpx;
		margin-left: 40rpx;
		margin-top: 10rpx;
	}
	
	.gowucheimage {
		position: absolute;
		width: 70upx;
		height: 50upx;
		margin-top: 15rpx;
	}
	
	.carnums {
		width: 26rpx;
		height: 26rpx;
		font-size: 20rpx;
		color: #FFFFFF;
		text-align: center;
		line-height: 26rpx;
	}
	/*子标签样式*/
	.mark-type-wrap {
		height: 45rpx;
	}
	/* 子滑动标签 */
	.mark-sub-tab {
		margin-bottom: 35rpx;
		margin-left: 20rpx;
		width: 100%;
		overflow: hidden;
	}
	.mark-sub-item {
		width: 120rpx;
		height: 54rpx;
		line-height: 54rpx;
		margin-right: 20rpx;
		display: inline-block;
		border-radius: 30rpx;
		text-align: center;
		background-color: #F5F5F5;
		font-size: 20rpx;
	}
	.mark-sub-item:last-child {
		margin-right: 0;
	}
	.scroll-view_H {
		width: 100%;
		white-space: nowrap;
	}
	
	/* 大班课单独样式 */
	.liveinfo-wrap {
		/* padding-top: 2rpx; */
		min-height: 1500rpx;
		background-color: #FFFFFF;
	}

	.live-list {
		width: 90%;
		height: 190rpx;
		margin: 10rpx auto;
		border-radius: 8rpx;
		background-color: #FFFFFF;
	}
	.xiangziwrap {
		position: absolute;
		left: calc(50% - 80px);
		top: calc(50% - 100px);
		width: 300rpx;
		height: 100rpx;
		
	}
	
	.xiangzi {
		margin-left: 100rpx;
		width: 100rpx;
		height: 100rpx;
	}

	.xiangzi_txt {
		width: 100%;
		display: block;
		text-align: center;
		font-size: 18rpx;
		color: #C7C7C7;
	}
	
	/* 未登录提示 */
	.no-login-wrap {
		text-align: center;
		background-color: #fff;
		border-radius: 20px;
		width: 350rpx;
		height: 200rpx;
		position: absolute;
		left: 50%;
		top: 50%;
		transform: translate(-50%,-50%);
	}
	
	.no-login-txt {
		display: block;
		font-size: 26rpx;
		color: #646464;
	}
	
	.no-login-btn {
		display: block;
		width: 180rpx;
		height: 60rpx;
		line-height: 60rpx;
		margin: 20rpx auto;
		font-size: 24rpx;
		color: #2C62EF;
		border: 2rpx solid #2C62EF;
		border-radius: 10rpx;
	}
	
	/deep/.uni-scroll-view::-webkit-scrollbar {
		/* 隐藏滚动条，但依旧具备可以滚动的功能 */
		display: none
	}
	
	.text-main {
		color: #FFFFFF !important;
		background: linear-gradient(to right,#3D98FF ,#7A76FA );
	} 
		
	/* 隐藏下划线 */
	.text-main::after {
		bottom: -9999rpx !important;
	}
		
	.courseclass-tab-item {
			width: 140rpx;
			height: 54rpx;
			line-height: 54rpx;
			margin-right: 48rpx;
			display: inline-block;
			text-align: center;
			font-size: 30rpx;
			color: #333333;
	}
		
	/* 课程分类标签样式 */
	.courseclass-text-main {
			color: #2C62EF;
			font-weight: bold;
			position: relative;
	}
		
	.courseclass-text-main::after {
		content: "";
		width: 35rpx;
		height: 4rpx;
		background: linear-gradient(to top right, #3D98FF, #7A76FA);
		position: absolute;
		top: 50rpx;
		left: 55rpx;
		line-height: 0;
		display: inline-block;
	}
		
		
		
	
	
</style>
