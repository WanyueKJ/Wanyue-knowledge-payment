<template>
	<view class="page">
		<!-- 头部 -->
		<view class="p-3 border-bottom avatar-wrap">
 			<!-- 老师名字ID区域	 -->
			<view class="title-wrap">
				<template v-if="userInfo.avatar">
				<image mode="aspectFill" :src="userInfo.avatar.length >0? userInfo.avatar:default_avatar" style="width: 120rpx; height: 120rpx;" class="rounded-circle title-avatar">
				</image>
				</template>
				<template v-else>
					<image :src="default_avatar" style="width: 120rpx; height: 120rpx;" class="rounded-circle title-avatar">
					</image>
				</template>
					
				<view v-if="userInfo.id != undefined" class="forteacher">
					<view class="name-id-wrap">
						<text>{{userInfo.user_nickname}}</text>
						<text class="id-wrap">ID:{{userInfo.id}}</text>
					</view>
					<view class="guan-wrap" @click="attenteacher">
						<text class="guanzhu-title">关注讲师</text>
						<text class="guanzhu-num"> {{follows}}</text>
					</view>
					<image @click="editmeans(userInfo.id)" class='right' src="../../static/mine_right.png"></image>
					<view class="dier">
						<view v-if="isTeacherInfo == '1'" class="teacherhome" @click="showTeacherInfo">讲师主页</view>
					</view>
				</view>
				<view v-else class="forteacher">
					<view @click="openLoginReg" class="name-id-wrap name-id-wrap-loginreg">
						<text>登录/注册</text>
					</view>
					<image @click="editmeans(userInfo.id)" class='right' src="../../static/mine_right.png"></image>
				</view>
				
			</view>
		</view>
		
		<!-- 点击列表页 -->
		<view class="animated fast fadeIn userinfo-list">
			<view class="p-3">
				<view v-for="(item,index) in list" class="my-item" @click="mylist(item.id,item.href)">
					<image class="userinfo-icon-img" :src="item.thumb" mode="aspectFill"></image>
					<view class="userinfo-title-txt">{{item.name}}</view>
					<view class="content" v-if="item.id == 10">{{integral}}</view>
					<view class="content" v-if="item.id == 11 && praisenums > 0">{{praisenums + '次'}}</view>
					<uni-icons :size="20" class="uni-icon-wrapper" color="#bbb" type="arrowright" />
					<view class="itemline"></view>
				</view>
			</view>
		</view>
	</view>
</template>
<script>
	import uniIcons from '@/components/uni-ui/uni-icons/uni-icons.vue';

	const app = getApp();

	export default {
		components: {
			uniIcons
		},
		data() {
			return {
				userInfo: {},
				isTeacherInfo: '',
				list: [],
				favnums: 0,
				follows: 0,
				examnums: 0,
				wrongnums: 0,
				praisenums: 0,
				integral: 0,
				kongkong: false,
				default_avatar: '../../static/images/default_avatar.png', //默认头像	
			}
		},

		onLoad() {
			this.getinfo();
		},
		onShow() {

			this.getinfo();
		},
		computed: {
			getAvatar() {
				if(this.userInfo.length > 0 && this.userInfo.avatar != '') {
					return this.userInfo.avatar;
				} else {
					return this.default_avatar;
				}
				
			}
		},
		methods: {
			openLoginReg() {
					uni.navigateTo({
						url: '../login/login'
					})
					return;
				
			},
			getinfo() {
				let gData = app.globalData;
				uni.request({
					url: gData.site_url + 'User.GetBaseInfoUniapp',
					method: 'GET',
					data: {
						'uid': gData.userinfo.id,
						'token': gData.userinfo.token
					},
					success: res => {

						if (parseInt(res.data.data.code) !== 0) {
							return;
						}
						this.favnums = res.data.data.info[0].favnums;
						this.follows = res.data.data.info[0].follows;
						this.examnums = parseInt(res.data.data.info[0].examnums);

						this.wrongnums = res.data.data.info[0].wrongnums;
						this.praisenums = res.data.data.info[0].praisenums;
						this.integral = res.data.data.info[0].integral;
						this.list = res.data.data.info[0].list;
						this.userInfo = res.data.data.info[0];
						if (res.data.data.info[0].type == '1') {
							//讲师
							this.isTeacherInfo = '1'
						}
						
					}
				});
			},
			mylist(ID, href) {
				var url = href + '&uid=' + app.globalData.userinfo.id + '&token=' + app.globalData.userinfo.token;
				if (ID == 1) {
					//已购买
					uni.navigateTo({
						url: '../hasbuy/hasbuy'
					});
				} else if (ID == 3) {
					//意见反馈
					uni.navigateTo({
						url: '../yijian-fankui/yijian-fankui',
					});
				} else if (ID == 4) {
					var urls =  getApp().globalData.site_h5url +'appapi/page/detail?id=1&lang=zh-cn';
					console.log(urls);
					//关于我们
					uni.navigateTo({
						
						url: '../about/about?url=' + encodeURIComponent(JSON.stringify(urls)) + '&title=' + '关于我们',
					});
				} else if (ID == 6) {
					//设置
					uni.navigateTo({
						url: '../setting/setting',
					});
				}  
			},
			attenteacher() {
				uni.navigateTo({
					url: '../attenteacher/attenteacher',
				});
			},

			// 编辑资料
			editmeans(uid) {
				uni.navigateTo({
					url: '../edit_user/edit_user?id=' + uid + '&avatar=' + this.userInfo.avatar +
						'&user_nickname=' + this.userInfo.user_nickname,
				});
			},
			//讲师主页
			showTeacherInfo(touid) {
				//跳转教师详情页并传入基本信息
				uni.navigateTo({
					url: '../teacherinfo/teacherinfo?touid=' + getApp().globalData.userinfo.id,
				});

			},
			wrong() {
				uni.navigateTo({
					url: '../../packageA/pages/wrongbooks/wrongbooks',
				});
			}
		}
	}
</script>

<style>
	
	.wechat {
		width: 100%;
		height: 120rpx;
		/* background-image: url('https://edu-qiniu.sdwanyue.com/knowledge_myheader.png'); */
	}
	
	.content {
		position: absolute;
		right: 100rpx;
	}

	.page {
		width: 100%;
		height: 100%;
	}

	.dier {
		display: flex;
		flex-direction: column;
		position: absolute;
		right: 40rpx;
		margin-top: 40rpx;
	}

	.right {
		margin-left: 70rpx;
		width: 30rpx;
		height: 30rpx;
	}

	.forteacher {
		display: flex;
		width: 75%;
		flex-direction: row;
		align-items: center;
	}

	.teacherhome {
		/* 	position: absolute;
		right: 80rpx; */
		text-align: center;
		margin-top: 35rpx;
		width: 100rpx;
		height: 30rpx;
		padding-bottom: 5rpx;
		color: #FFFFFF;
		font-size: 20rpx;
		border: 2rpx solid #FFFFFF;
		border-radius: 20rpx;
	}

	.userinfo-list {
		/* position: absolute; */
		margin-top: -30rpx;
	}

	.title-wrap {
		display: flex;
		align-items: center;
		width: 100%;
		height: 61%;
		margin: 0 auto;
		font-size: medium;
		font-weight: bold;
	}
	.avatar-wrap {
		height: 180rpx;
		padding-top: 80rpx;
		background-image: url('https://edu-qiniu.sdwanyue.com/knowledge_myheader.png');	
		/* #ifdef MP-WEIXIN */
		height: 200rpx;
		background-size:100% 100%;
		/* #endif */
	}
	
	.title-avatar {
		float: left;
		margin-left: 20rpx;
	}

	.name-id-wrap {
		width: 79%;
		height: 100%;
		float: left;
		position: relative;
		color: #FFFFFF;
		margin-left: 20rpx;
		font-size: medium;
	}

	.name-id-wrap text:first-child {
		display: block;
		font-size: medium;
		font-weight: bold;
	}

	.name-id-wrap text:nth-child(2) {
		display: block;
		margin-top: 10rpx;
		font-weight: bold;
	}

	.name-id-wrap text:nth-child(3) {
		position: absolute;
		right: 0rpx;
		top: 30%;
		color: #FFFFFF;
		font-weight: bold;
	}
	
	/* 登录注册按钮 */
	.name-id-wrap-loginreg {
		padding-left: 10rpx;
	}

	.id-wrap {
		font-size: small;
	}
	.guanzhu-title{
		font-size: small;
	}
	/* 关注教师 */
	.guan-wrap {
		width: 100%;
		height: 50rpx;
		float: left;
		margin-top: 90rpx;
		color: #FFFFFF;
		position: absolute;
		margin-left: 20rpx;
	}
	.guanzhu-title{
		font-size: small;
	}
	.guanzhu-num{
		font-size: medium;
		padding-left: 20rpx;
		padding-top: 2rpx;
	}
	
	
	.teacher-info-btn {
		display: inline-block;
		width: 130rpx;
		height: 36rpx;
		line-height: 36rpx;
		text-align: center;
		background-color: transparent;
		color: #FFFFFF;
		border: 2rpx solid #FFFFFF;
		border-radius: 40rpx 40rpx;
		font-size: 20rpx;
	}

	/****** 统计区域******/
	.tongji-wrap {
		background-color: #FFFFFF;
		height: 300rpx;
		width: 90%;
		margin: 0 auto;
		position: relative;
		top: -60rpx;
		padding-top: 42rpx;
		border-radius: 18rpx;
		border: 2rpx solid #DEE2E6;

	}

	.tongji-item {
		float: left;
		height: 150rpx;
		width: 50%;
		display: flex;
		align-items: center;

	}

	.tongji-img {
		width: 100rpx;
		height: 100rpx;

	}

	.tongji-title {
		font-size: 28rpx;
		font-weight: bold;
		color: #323232;
	}

	.tongji-it-left-wrap {
		width: 40%;
		height: 90%;
		padding: 10rpx 0 0 60rpx;
		float: left;

	}

	.tongji-it-left-wrap text {
		display: block;
	}

	.tongji-it-left-wrap .tongji-num {
		font-size: large;
		font-weight: bold;
		display: inline-block;
		color: #38DAA6;
	}

	.tongji-it-left-wrap .tongji-zi {
		display: inline-block;
		font-size: small;
		color: #38DAA6;
		margin-left: 10rpx;
	}

	.tongji-img {
		width: 52rpx;
		height: 50rpx;
		margin-left: 60rpx;
	}

	/* 个人中心下半部分文字标题 */
	.userinfo-icon-img {
		width: 40rpx;
		height: 40rpx;
		display: inline-block;
	}

	.user-bottom-icon-left {
		display: inline-block;
		width: 7%;
	}

	.user-bottom-title {
		display: inline-block;
		width: 18%;
	}

	.user-bottom-icon {
		display: inline-block;
		text-align: right;
		width: 69%;
	}

	.my-item {
		color: #323232;
		padding-left: 30rpx;
		display: flex;
		flex-direction: row;
		flex: 1;
		align-items: center;
		height: 104rpx;
		font-size: medium;

	}

	.itemline {
		position: absolute;
		/* width: 100%; */
		right: 70rpx;
		left: 100rpx;
		height: 2rpx;
		margin-top: 50rpx;
		background-color: #F5F5F5
	}

	.userinfo-title-txt {
		width: 82%;
		padding-left: 20rpx;

		font-size: medium;
	}
</style>
