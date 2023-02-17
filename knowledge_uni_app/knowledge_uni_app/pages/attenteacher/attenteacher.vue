<template>
	<view class="famous-all-wrap">
		<view v-for="(item,index) in course_info">
			<view class="famous-item">
				<image @click="viewTeacherInfo(item.id)" class="ft-avatar" :src="item.avatar" mode="aspectFill"></image>
				<view class="t-data-wrap">
					<view @click="viewTeacherInfo(item.id)" class="t-title">
						<template v-if="item.identitys.length >0">
							<view v-for="(item2,index2) in item.identitys">
								{{item.user_nickname}}<text class="colour font-sm" :style="'background-color:' + item2.colour">{{item2.name}}</text>
							</view>
						</template>
						<template v-else>
							<view>
								{{item.user_nickname}}
							</view>
						</template>
					</view>
					<view @click="viewTeacherInfo(item.id)" class="coushu"></view>
				</view>
				<image src="../../static/arrow2.png" class="jiantou" mode="aspectFill"></image>
			</view>
			<view class="itemline"></view>

		</view>
		<template v-if="kongkong == true">
			<view :class="{xiangziwrap : (kongkong == true)}">
				<image class="xiangzi" src="../../static/images/xiangzi.png" mode="aspectFill"></image>
				<text class="xiangzi_txt">还未关注讲师</text>
			</view>
		</template>
	</view>
</template>

<script>
	export default {
		data() {
			return {
				course_info: [],
				kongkong: false
			}
		},
		onShow() {
			this.getteacher();
		},
		onLoad() {
			this.getteacher();
		},
		methods: {
			getteacher() {
				setTimeout(() => {
					uni.request({
						url: getApp().globalData.site_url + 'User.GetFollow',
						method: 'GET',
						data: {
							'uid': getApp().globalData.userinfo.id,
							'token': getApp().globalData.userinfo.token,
							'p': 1
						},
						success: res => {

							if (res.data.data.code == 0) {
								this.course_info = res.data.data.info;
								// console.log(JSON.parse(JSON.stringify(this.course_info)));
								this.kongkong = false;
								if (this.course_info.length == 0) {
									this.kongkong = true;
								}
							} else {
								this.kongkong = true;
							}

						}

					});
				}, 0);
			},
			// 查看教师详情
			viewTeacherInfo(touid) {
				//跳转教师详情页并传入基本信息
				uni.navigateTo({
					url: '../teacherinfo/teacherinfo?touid=' + touid,
				});

			},
		}
	}
</script>

<style>
	.coushu {
		display: block;
		position: absolute;
		right: 100rpx;
		left: 200rpx;
		height: 100rpx;
	}

	.itemline {
		position: absolute;
		left: 20rpx;
		right: 20rpx;
		height: 2rpx;
		background-color: #EBEEF5;
		margin-top: -30rpx;
	}

	.colour {
		color: #FFFFFF;
		width: 100rpx;
		height: 30rpx;

		display: inline-block;
		width: 110rpx;
		height: 32rpx;
		line-height: 32rpx;
		text-align: center;
		margin-left: 10rpx;
		background-color: #07C160;
		color: #FFFFFF;
		border-radius: 6rpx;
		font-size: 20rpx;
	}

	.famous-all-wrap {
		border-top: 3rpx solid #F5F5F5;
		padding: 15rpx 23rpx 0;
	}

	.famous-item {
		height: 84rpx;
		margin-bottom: 50rpx;
	}

	.ft-avatar {
		height: 100%;
		width: 90rpx;
		float: left;
		border-radius: 50%;
	}

	.t-data-wrap {
		display: flex;
		flex-direction: row;
		height: 40rpx;
		width: 85%;
		float: left;
		font-size: 28rpx;
		color: #000000;
	}

	.t-title {
		margin-left: 20rpx;
	}

	.t-zhicheng-wrap {
		width: 64%;
		float: left;
		padding-left: 8rpx;
	}

	.jiantou {
		position: absolute;
		right: 20rpx;
		width: 40rpx;
		height: 40rpx;
		margin-top: 20rpx;
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
