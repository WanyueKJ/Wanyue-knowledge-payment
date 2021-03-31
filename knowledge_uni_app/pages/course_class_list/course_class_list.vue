<template>

	<view>
		<view class="mark-type-wrap">
			<view class="flex align-center font-weight-bold mark-sub-tab">
				<scroll-view class="scroll-view_H" scroll-x="true" @scroll="scroll" scroll-left="120">
					<view class="mark-sub-item" @click="changeSubTab(index,item.id)" v-for="(item, index) in tabBarsCourse" :key="index" :class="subtabIndex === index ? 'text-main' : 'text-light-muted'">
						{{item.name}}
					</view>
				</scroll-view>
			</view>	
		</view>
		<swiper :current="subtabIndex" class="swiper-box":style="{height:scrollH+'rpx'}"  @change="onChangeTab">
			<!-- 全部 -->
			<swiper-item v-for="(index) in tabBarsCourse">
				<scroll-view scroll-y :style="'height:' + scrollH+'rpx;'"  @scrolltolower="loadmoreEvent">
					
						<!-- 直播课列表 -->
						<view @click="viewLiveInfo(item.id,item.sort)" class="live-list" v-for="(item, index) in course_info" :key="index">
							<view class="live-list-img-wrap">
								<image class="live-list-img" :src="item.thumb" mode="aspectFill"></image>
								<template v-if="item.sort == undefined">
									<text class="course-title-icon">套餐</text>
								</template>
								<template v-else-if="item.sort == 0">
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
	import uniNavBar from '@/components/uni-ui/uni-nav-bar/uni-nav-bar.vue';
	const app = getApp();

	export default {
		components: {
			uniNavBar
		},
		data() {
			return {
				scrollH:0,
				course_info: [],
				course_cname: '',
				kongkong: true,
				subtabIndex:0,
				course_ID:'',
				currentScrollId: '', //当前选中的标签id
				tabBarsCourse: [
					{
						name: "全部"
					}, {
						name: "直播"
					},
					{
						name: "图文"
					},{
						name: "视频"
					}, {
						name: "音频"
					}
				],
				index_course: 0, 
			}
		},
		onReady() {
			var that = this;
			uni.getSystemInfo({
				success: function(res) {
					that.scrollH = res.windowHeight * 750 / res.windowWidth - 170;
				}
			});	
		},
		onLoad(option) {
			
			this.course_cname = option.course_cname;
			this.course_ID = option.course_cid;
			uni.setNavigationBarTitle({
				title: option.course_cname
			});
			this.GetCourseList(this.course_ID,0);
			
		},
		methods: {
			back() {
				uni.navigateBack({
					delta: 1
				});
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
							that.course_info = res.data.data.info;
							
							if (that.course_info.length == 0) {
								that.kongkong = true;
							}
						} else {
							that.kongkong = true;
						}
			
					},
				});
				
			},
			
			//切换子类型选项卡
			changeSubTab(index) {
				this.subtabIndex = index;
				this.course_info.length = 0;
				this.GetCourseList(this.course_ID,this.subtabIndex);
			},
			//滑动
			onChangeTab(e) {
				//切换当前索引
				this.subtabIndex = e.detail.current;
				this.GetCourseList(this.course_ID,this.subtabIndex);
			},
		}
	}
</script>

<style>
	/* 大班课/内容列表公共样式 */
	@import url("/static/css/course_list.css");

	page {
		background-color: #FFFFFF;
	}
	.text-main {
		color: #FFFFFF !important;
		background: linear-gradient(to right,#3D98FF ,#7A76FA );
	} 
		
	/* 隐藏下划线 */
	.text-main::after {
		bottom: -9999rpx !important;
	}
	/*子标签样式*/
	.mark-type-wrap {
		margin-top: 20rpx;
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
		background-color: #F1F1F1;
		font-size: 20rpx;
	}
	.mark-sub-item:last-child {
		margin-right: 0;
	}
	.scroll-view_H {
		width: 100%;
		white-space: nowrap;
	}
	.swiper-box {
		margin-top: 10rpx;
	}
	/* 大班课单独样式 */
	.liveinfo-wrap {
		margin-top: 2rpx;
		padding-top: 2rpx;
		min-height: 1500rpx;
		background-color: orange;
	}

	.live-list {
		width: 90%;
		height: 190rpx;
		margin: 30rpx auto;
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
