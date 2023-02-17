<template>
	<view class="page">
		<view class="msg-lt-wrap" :style="'margin-top:' + system_top + 'rpx'">
			<text class="msg-lt-title">消息</text>
		</view>

		<block v-if="userInfo != ''">
			<view class="line2"></view>
				<!-- 系统通知 -->
				<view @click="msgdetail('0','系统通知')" class="msg-md-main">
					<image src="../../static/images/system.png" mode="aspectFill" class="msg-img"></image>
					<view class="msg-md-wrap">
						<text class="msg-title">系统通知</text>
						<template v-if="sys.length > 0">
						<text class="msg-info">{{sys[0].content}}</text>
						</template>
						<template v-else>
							<text class="msg-info">暂无系统消息</text>
						</template>
					</view>

				</view>
				<view class="line"></view>
				<!-- 课程动态 -->
				<view @click="msgdetail('1','课程动态')" class="msg-md-main">
					<image src="../../static/images/class.png" mode="aspectFill" class="msg-img"></image>
					<view class="msg-md-wrap">
						<text class="msg-title">课程动态</text>
						<template v-if="course.length > 0">
						<text class="msg-info">{{course[0].content}}</text>
						</template>
						<template v-else>
							<text class="msg-info">暂无相关动态</text>
						</template>
					</view>

				</view>
				<view class="line"></view>
				<!-- 讲师动态 -->
		</block>
		<block v-else>
			<view class="no-login-wrap">
				<text class="no-login-txt">登录后可查看详细内容</text>
				<text @click="openLogin" class="no-login-btn">立即登录</text>
			</view>
		</block>

	</view>
</template>

<script>
	const demo = [];

	import noThing from '@/components/common/no-thing.vue';
	import uniPopup from '@/components/uni-ui/uni-popup/uni-popup.vue';
	const app = getApp();

	export default {
		components:{
			noThing,
			uniPopup
		},
		data() {
			return {
				info:{},
				course:[],
				sys:[],
				teacher:[],
				system_top:0,
				userInfo: '',
			}
		},
		//页面加载
		onLoad() {

			const res = uni.getSystemInfoSync();

			// #ifdef MP-WEIXIN
			this.system_top = parseInt(res.safeArea.top) + 100;
			// #endif

			// #ifdef H5
			this.system_top = 10;
			// #endif

			// #ifdef APP-PLUS
			this.system_top = parseInt(res.safeArea.top) + 20;
			// #endif
			if(app.globalData.userinfo != '') {
				this.userInfo = app.globalData.userinfo;
			}
			this.MessageGetNew();
		},
		// 监听下拉刷新
		onPullDownRefresh() {
			this.refresh()
		},
		onShow() {
			if (app.globalData.userinfo != '') {
				this.userInfo = app.globalData.userinfo;
			}

		},
		methods: {
			openLogin() {
				uni.navigateTo({
					url: '../login/login'
				})
			},
			msgdetail(type,title){

				uni.navigateTo({
					url: '../msg/msglist?type=' + type + '&title=' +title,
				});
			},
			MessageGetNew(){
				let gData = app.globalData;
				uni.request({
					url: gData.site_url + 'Message.GetNew',
					method: 'GET',
					data: {
						'uid': gData.userinfo.id,
						'token': gData.userinfo.token
					},
					success: res => {

						if(res.data.data.info[0] == undefined) {
							return;
						}
						this.info = res.data.data.info[0];
						this.course = this.info.course;
						this.sys = this.info.sys;
						this.teacher = this.info.teacher;
					},
				});
			},
			//下拉刷新
			refresh(){
				setTimeout(()=>{
					this.list = demo;
					//停止下拉刷新
					uni.stopPullDownRefresh();
				},2000);
			},
			// 弹出层选项点击事件
			popupEvent(e){
				switch(e){
					case 'friend':
					uni.navigateTo({
						url: '../search/search?type=user',
					});
						break;
					case 'clear':
						break;

				}
				// 关闭弹出层
				this.$refs.popup.close();
			}
		}
	}
</script>

<style>
	.page{
		width: 100%;
		height: 100%;
	}
	.line{
		width: 100%;
		height: 2rpx;
		background-color: #EBEEF5;
		margin-top: 20rpx;
		margin-bottom: 20rpx;
	}
	.line2{
		width: 100%;
		height: 2rpx;
		background-color: #EBEEF5;
		margin-top: -30rpx;
		margin-bottom: 20rpx;
	}
	.msg-lt-wrap {
		margin-top: 80rpx;
		margin-bottom: 40rpx;
		padding-left: 30rpx;
	}
	.msg-lt-title {
		font-size: medium;
		font-weight: bold;
	}

	/* 主内容部分 */
	.msg-md-main::after {
		display:block;
		clear:both;
		height:0;
		content: "";
		visibility: hidden;
		overflow:hidden;
	}

	.msg-md-main {
		/* margin-bottom: 40rpx; */
		padding-left: 30rpx;

	}
	/* 图片 */
	.msg-img {
		width: 84rpx;
		height: 84rpx;
		float: left;
		border-radius: 20rpx;
	}

	.msg-md-wrap {
		float: left;
		margin-left: 38rpx;
	}

	.msg-md-wrap text {
		display: block;
	}

	.msg-title {
		font-size: small;
		font-weight: bold;
	}

	.msg-info {
		color: #969696;
		font-size: smaller;
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


</style>
