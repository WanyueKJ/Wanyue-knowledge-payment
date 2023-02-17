<template>
	<view>

		<view v-for="(item,index) in info" class="page">
			<text class="time">{{item.addtime}}</text>
			<view class="neirong">
				<image class="tubiao" :src="icon"></image>
				<view class="content">{{item.content}}</view>
			</view>
		</view>
		<template v-if="kongkong == true">
			<view :class="{xiangziwrap : (kongkong == true)}">
				<image class="xiangzi" src="../../static/images/xiangzi.png" mode="aspectFill"></image>
				<text class="xiangzi_txt">{{message_text}}</text>
			</view>
		</template>
	</view>
</template>

<script>
	export default {
		data() {
			return {
				type: 0,
				icon: '',
				info: [],
				kongkong: false,
				message_text: ''
			}
		},
		onLoad(option) {
			console.log(option);
			this.type = option.type;
			uni.setNavigationBarTitle({
				title: option.title
			});
			if (option.type == '0') {
				this.icon = '../../static/images/system.png';
				this.message_text = '暂无系统消息';
			} else if (option.type == '1') {
				this.icon = '../../static/images/class.png';
				this.message_text = '暂无课程动态';
			} else {
				this.icon = '../../static/jiangshidongtai.png';
				this.message_text = '暂无讲师动态';
			}
			this.MessageGetNew(option.type);
		},
		methods: {
			MessageGetNew(type) {
				let gData = getApp().globalData;
				uni.request({
					url: gData.site_url + 'Message.GetList',
					method: 'GET',
					data: {
						'uid': gData.userinfo.id,
						'token': gData.userinfo.token,
						'type': type,
						'lastid': 0
					},
					success: res => {
						if (res.data.data.code == 700) {
							uni.navigateTo({
								url: '../login/login'
							})
							return;
						}
						if (res.data.data.code == 0) {
							this.info = res.data.data.info;
							if (this.info.length == 0) {
								this.kongkong = true;
							} else {
								this.kongkong = false;
							}
						} else {
							this.kongkong = true;
						}
						console.log(JSON.parse(JSON.stringify(res)));

					},

				});

			}
		}
	}
</script>

<style>
	.page {
		display: flex;
		flex-direction: column;
	}

	.time {
		color: #999999;
		font-size: smaller;
		/* left: calc(50% - 10px); */
		text-align: center;
		width: 100%;
		margin-top: 10rpx;
	}

	.neirong {
		margin-top: 20rpx;
		display: flex;
		flex-direction: row;
		margin-left: 20rpx;
		margin-bottom: 20rpx;
	}

	.tubiao {
		width: 70rpx;
		height: 70rpx;

	}

	.content {
		margin-left: 20rpx;
		max-width: 400rpx;
		background-color: #F2F6FC;
		padding-top: 10rpx;
		padding-bottom: 10rpx;
		padding-left: 10rpx;
		padding-right: 10rpx;
		border: 2rpx solid #D3D3D3;
		border-radius: 10rpx;
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
