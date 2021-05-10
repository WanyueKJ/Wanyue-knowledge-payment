<template>
	<view class="conetentinfo-wrap">
		<view class="flex align-center font-weight-bold course-tab">
			<scroll-view class="scroll-view_H" scroll-x="true" scroll-left="10" :scroll-into-view="currentScrollId">
				<view class="courseclass-tab-item" :id="'scroll_item' + index" @click="changeTab(index,item.id)" v-for="(item, index) in tabBars" :key="index" :class="tabIndex === index ? 'courseclass-text-main' : 'courseclass-text-light-muted'">
					{{item.name}}
				</view>
			</scroll-view>
		</view>
		<!-- 类型标签 -->
		<view class="mark-type-wrap">
			<view class="flex align-center font-weight-bold mark-sub-tab">
				<scroll-view class="scroll-view_H" scroll-x="true" @scroll="scroll" scroll-left="120">
					<view class="mark-sub-item" @click="changeSubTab(index,item.id)" v-for="(item, index) in tabBarsCourse" :key="index" :class="subTabIndex === index ? 'text-main' : 'text-light-muted'">
						{{item.name}}
					</view>
				</scroll-view>
			</view>	
		 </view>
				
		<swiper :current="subTabIndex" class="swiper-box" :style="{height:scrollH+'rpx'}" @change="onChangeTab">
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
				<text class="xiangzi_txt">暂无相关课程</text>
			</view>
		</template>

	</view>
</template>

<script>
	import courseList from '@/components/common/course-list.vue';
	const app = getApp();

	export default {
		components: {
			courseList,
		},
		data() {
			return {
				scrollH: 0,
				tabIndex: 0,
				subTabIndex:0,
				tabBars: [],
				list: [],
				loadmore: "上拉加载更多",
				kongkong: false,
				system_top:0,
				
				tabBarsCourse: [
					{
						name: "全部"
					},{
						name: "图文"
					}
					, {
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

		},
		onReady() {
			let that = this;
			uni.getSystemInfo({
				success: function(res) {
					that.scrollH = res.windowHeight * 750 / res.windowWidth - 130;
				}
			});	
		
		},
		onLoad() {
			this.getData();	
		},
		methods: {
			getData() {
				//获取分类
				uni.request({
					url: getApp().globalData.site_url + 'Knowledge.GetKnowledgeClass',
					data: {
					},
					success: (res) => {
						let data = res.data.data;
						if (parseInt(res.data.data.code) !== 0) {
							return;
						}
						this.tabBars = data.info[0].courseclass;
						this.getContentCourseList(this.tabBars[0].id,0);
					},
					fail() {
					}
				});
			},
			/**
			 * @param {Object} kid 大分类id
			 * @param {Object} subIndex 小索引
			 */
			getContentCourseList(kid, subIndex){
				let gData = app.globalData;
				let that = this;
				// 1全部 2视频 3音频 4图文
				uni.request({
					url: gData.site_url + 'Knowledge.GetList',
					method: 'GET',
					data: {
						'p' : 1,
						'knowledge_id':kid,
						'course_type': 1, //1代表内容
						'type':subIndex
					},
					success: res => {
						if(parseInt(res.data.data.code) !== 0) {
							uni.showToast({
								icon: 'none',
								title: '网络错误'
							});
							return;
						}			
						if(res.data.data.info.length < 1) {
							// 空空如也
							that.kongkong = true;
							that.list = [];
						} else {
							that.kongkong = false;
							that.list = res.data.data.info;		
						}
								
					},
				});
			},
			
			//切换选项卡
			changeTab(index) {
				this.tabIndex = index;
				this.subTabIndex = 0;
				this.getContentCourseList(this.tabBars[this.tabIndex].id,this.subTabIndex);
			},
			//滑动
			onChangeTab(e) {
				//切换当前子索引
				this.subTabIndex = e.detail.current;
				this.getContentCourseList(this.tabBars[this.tabIndex].id,this.subTabIndex);
			},
			//切换子类型选项卡
			changeSubTab(index) {
				this.subTabIndex = index;
				this.getContentCourseList(this.tabBars[this.tabIndex].id,this.subTabIndex);
			},
			
			loadmoreEvent() {
				//验证当前是否处于可加载状态
				if (this.loadmore !== '上拉加载更多') return;
				//设置加载状态
				this.loadmore = '加载中...';
			},
			
			viewLiveInfo(liveCourseId, sorttype) {
				if (app.globalData.userinfo == '') {
					uni.navigateTo({
						url: '../login/login'
					})
					return;
				}
				
				if (sorttype == 0) {
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
			
		}
	}
</script>

<style>
	@import url("/static/css/course_list.css");
	
	page{
		background-color: #F5F5F5;
		height: 100%;
		width: 100%;
		overflow: hidden;
	}
	.conetentinfo-wrap {
		margin-top: 2rpx;
		padding-top: 20rpx;
		height: 100%;
		overflow-y: hidden;
		overflow: hidden;
		background-color: #FFFFFF;
	}
	
	.swiper-box {
		width: 100%;
	}

	.course-tab {
		margin-top: 5rpx;
		height: 40rpx;
		margin-bottom: 5rpx;
	}
	
	.search-all-wrap {
		position: absolute;
		margin-top: 0rpx;
		right: 130rpx;
		left: 220rpx;
		width: 400rpx;
		height: 38rpx;
		line-height: 38rpx;
		display: flex;
		align-items: center;
	}
	.search-wrap {
		width: 100%;
		height: 100%;
		line-height: 38rpx;
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
		margin-top: 30rpx;
		height: 60rpx;
		z-index: 999;
	}
	/* 子滑动标签 */
	.mark-sub-tab {
		margin-bottom: 36rpx;
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
		
		
	.xiangziwrap {
		position: absolute;
		left: calc(50% - 50px);
		top: calc(50% - 170px);
		width: 200rpx;
		height: 100rpx;
	}
	
	.xiangzi {
		margin-left: 50rpx;
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
	
	
</style>
