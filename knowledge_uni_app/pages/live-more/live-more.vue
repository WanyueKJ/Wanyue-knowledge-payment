<template>
	<view class="liveinfo-wrap">
		<view class="mark-type-wrap">
			<view class="flex align-center font-weight-bold course-tab">
				<scroll-view class="scroll-view_H" scroll-x="true" scroll-left="10" :scroll-into-view="currentScrollId">
					<view class="courseclass-tab-item" :id="'scroll_item' + index" @click="changeTab(index,item.id)" v-for="(item, index) in tabBars" :key="index" :class="tabIndex === index ? 'courseclass-text-main' : 'courseclass-text-light-muted'">
					{{item.name}}
					</view>
				</scroll-view>
			</view>
		</view>	
	
		
	<!-- 直播课列表 -->
	<swiper :current="tabIndex" class="swiper-box" :style="{height:scrollH+'rpx'}" >
		<!-- 全部 -->
		<swiper-item @touchmove.stop v-for="(index) in tabBars">
			<scroll-view scroll-y :style="'height:' + scrollH+'rpx;'">
				<view @click="viewLiveInfo(item.id,item.paytype)" class="live-list" v-for="(item, index) in live_info"  :key="index">
					<view class="live-list-img-wrap">
						<image class="live-list-img" :src="item.thumb" mode="aspectFill"></image>
						<text class="course-title-icon">直播</text>
					</view>
					<view class="live-list-info">
						<view class="live-c-title">{{item.name}}</view>
						<view class="live-status living-status" v-if="item.islive == 1">
							{{item.lesson}}
						</view>
						<view class="live-status" v-else>
							{{item.lesson}}
						</view>
						<view class="live-teacher-price">
							<image class="live-teacher-avatar" :src="item.avatar" mode="aspectFill"></image>
							<text class="teacher-name">{{item.user_nickname}}</text>
								<view class="price-wrap">
								<text v-if="item.paytype == 0">免费</text>
								<text v-if="item.paytype == 2" class="pass">密码</text>
								<text v-if="item.paytype == 1" class="numPrice">
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
	
	const app = getApp();
	
	export default {
		data() {
			return {
				scrollH:0,
				live_info: {},
				tabIndex: 0,
				tabBars: [],
				kongkong: false,
				currentScrollId: '' //当前选中的标签id
			}
		},
		onReady() {
			var that = this;
			uni.getSystemInfo({
				success: function(res) {
					that.scrollH = res.windowHeight * 750 / res.windowWidth - 100;
				}
			});	
			this.getData();
		},
		onLoad() {
		},
		methods: {
			getData() {
				let that = this;
				//获取分类标签
				uni.request({
					url: app.globalData.site_url + 'Knowledge.GetKnowledgeClass',
					data: {
					},
					success: (res) => {
						let data = res.data.data;
						if (parseInt(res.data.data.code) !== 0) {
							return;
						}
						that.tabBars = data.info[0].courseclass;
						that.getLiveCourseList(that.tabBars[0].id, 0);
					},
					fail() {
						uni.showToast({
							icon: 'none',
							title: '网络错误, 请重试'
						});
					}
				});
				
			},
			getLiveCourseList(kid,subindex){
				let gData = app.globalData;
				uni.request({
					url: gData.site_url + 'Knowledge.GetList',
					method: 'GET',
					data: {
						'p' : 0,
						'knowledge_id':kid,
						'course_type': 2, //2代表所有大班课
						'type':subindex
					},
					success: res => {
						if(parseInt(res.data.data.code) !== 0) {
							uni.showToast({
								icon: 'none',
								title: '网络错误, 请重试'
							});
							return;
						}
						if(res.data.data.info.length < 1) {
							// 空空如也
							this.kongkong = true;
							this.live_info = [];
						} else {
							this.kongkong = false;
							this.live_info = res.data.data.info;
						}
					},
				});
			},
			// 查看大班课(语音、PPT、视频直播)内容详情
			viewLiveInfo(liveCourseId,livetype){
				
				uni.navigateTo({
					url: '../../packageB/pages/live_course_info/live_course_info?courseid=' + liveCourseId +'&paytype='+livetype
				});
			},
			//切换选项卡
			changeTab(index) {
				this.tabIndex = index;
				this.getLiveCourseList(this.tabBars[index].id, 0);
			},
			
		}
	}
</script>

<style>
	
	/* 大班课/内容列表公共样式 */
	@import url("/static/css/course_list.css");
	
	
	/* 大班课单独样式 */
	page{
		background-color: #F5F5F5;
		overflow: hidden;
	}
	.course-tab {
		margin-top: 10rpx;
		margin-bottom: 45rpx;
		height: 45rpx;
	}
	.mark-type-wrap {
		z-index: 999;
	}
	
	/* 子滑动标签 */
	.mark-sub-tab {
		margin-bottom: 36rpx;
		margin-left: 20rpx;
		width: 100%;
		overflow: hidden;
	}
	
	.scroll-view_H {
		width: 100%;
		white-space: nowrap;
	}
	
	/deep/.uni-scroll-view::-webkit-scrollbar {
		/* 隐藏滚动条，但依旧具备可以滚动的功能 */
		display: none
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
	.swiper-box {
		margin-top: 20rpx;
	}
	
	.liveinfo-wrap {
		margin-top: 2rpx;
		padding-top: 20rpx;
		background-color: #FFFFFF;
	}	
	
	.live-list {
		width: 90%;
		height: 190rpx;
		margin: 30rpx auto;
		padding-top: 5rpx;
		border-radius: 8rpx;
		background-color: #FFFFFF;
	}
	
	.live-c-title {
		line-height: 35rpx;
		height: 40%;
	}
	
	.live-teacher-price {
		margin-top: 10rpx;
	}
	
	.price-wrap {
		margin-left: 55% !important;
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
