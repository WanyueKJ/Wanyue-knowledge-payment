
<template>
	
	<view>

	<view class="liveinfo-wrap">
		<!-- 直播课列表 -->
		<view @click="viewLiveInfo(item.id,item.sort)" class="live-list" v-for="(item, index) in course_info"  :key="index">
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
		
	</view>
	<template v-if="kongkong == true">
			<view :class="{xiangziwrap : (kongkong == true)}">
				<image class="xiangzi" src="../../static/images/xiangzi.png" mode="aspectFill"></image>
				<text class="xiangzi_txt">暂无已购买课程</text>
			</view>
		</template>
	</view>
</template>

<script>
	
	import uniNavBar from '@/components/uni-ui/uni-nav-bar/uni-nav-bar.vue';
	const app = getApp();
	
	export default {
		components:{
			uniNavBar
		},
		data() {
			return {
				course_info: {},
				course_cname: '',
				kongkong:true
			}
		},
		onLoad(option) {
			let gData = app.globalData;
			this.course_cname = option.course_cname;
			
			uni.setNavigationBarTitle({
				title:option.course_cname
			})
			
			setTimeout(() => {
			uni.request({
				url: gData.site_url + 'Course.GetMyBuy',
				method: 'GET',
				data: {
					'uid' : gData.userinfo.id,
					'token' : gData.userinfo.token
					
				},
				success: res => {
					
					let data = res.data.data;
					if(data.code == 0 && data.info.length > 0) {
						this.course_info = res.data.data.info;
						this.kongkong = false;
					}else{
						this.kongkong = true;
					}
					
				},
				fail: () => {
					uni.showToast({
						icon: 'none',
						title: '网络错误',
					});
					return;
				},
			});
			}, 0);
		},
		methods: {
			back(){
				uni.navigateBack({
					delta: 1
				});
			},
			viewLiveInfo(liveCourseId,sorttype){
				if(getApp().globalData.userinfo == '') {
					uni.navigateTo({
						url:'../login/login'
					})
					return;
				}
				//套餐
			if(sorttype == undefined){
				uni.navigateTo({
					url: '../../packageB/pages/taocaninfo/taocaninfo?courseid=' + liveCourseId
				});
			}
			//
			else if(sorttype == 0){
				uni.navigateTo({
					url: '../../packageB/pages/content-info/content-info?courseid=' + liveCourseId
				});
			}
			else if(sorttype == 1){
				uni.navigateTo({
					url: '../../packageB/pages/courseinfo/courseinfo?courseid=' + liveCourseId
				});
			}
			else
				uni.navigateTo({
					url: '../../packageB/pages/live_course_info/live_course_info?courseid=' + liveCourseId
				});
			},
			
		}
	}
</script>

<style>
	
	/* 大班课/内容列表公共样式 */
	@import url("/static/css/course_list.css");
	page{
		background-color: #F5F5F5;
	}
	/* 大班课单独样式 */
	.liveinfo-wrap {
		margin-top: 2rpx;
		padding-top: 2rpx;
		min-height: 1500rpx;
		background-color: #FFFFFF;
	}	
	
	.live-list {
		width: 90%;
		height: 190rpx;
		margin: 30rpx auto;
		/* padding-top: 5rpx; */
		/* box-shadow: 0rpx 0rpx 4rpx 2rpx rgba(0, 0, 0, 0.1); */
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
</style>
