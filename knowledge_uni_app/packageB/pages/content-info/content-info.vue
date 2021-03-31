<template>
	<view>

		<uni-nav-bar @clickLeft="backCourseList" left-icon="back" :border="false" title="内容详情" statusBar>

		</uni-nav-bar>


		<!-- 直播背景 -->
		<view class="live_course_bg_wrap">
			<image class="live_course_img" :src="live_course_bg" mode="aspectFill"></image>
		</view>

		<view class="course-bottom">
			<!-- tab标签 -->
			<view class="flex align-center justify-center font-weight-bold course-info-tab">
				<view class="mx-5 c-info-tabbar" @click="changeTab(index)" v-for="(item, index) in tabBars" :key="index" :class="tabIndex === index ? 'text-main font-lg' : 'font-md text-light-muted'">
					{{item.name}}
				</view>
				
			</view>

			<swiper :current="tabIndex" class="swiper-box" :style="{height:scrollH+'rpx'}" @change="onChangeTab">
				<!-- 简历 -->
				<swiper-item class="course-info-item">
					<scroll-view scroll-y :style="'height:' + scrollH+'rpx;'">
						<!-- 标题标签区域 -->
						<view>
							<text class="course-title">{{liveInfo.name}}</text>
							<text class="course_tag">{{sorttype}}</text>
						</view>
						<text>{{liveInfo.des}}</text>

						<!-- 价格时间学习人数信息 -->
						<view class="price-time-stunum">
							<text v-if="liveInfo.paytype == 0" class="free">免费</text>
							<text v-if="liveInfo.paytype == 2" style="color:#4385FF;">密码</text>
							<template v-if="liveInfo.paytype ==1">
								<template v-if="ifbuy == 1">
									<text class="price-wrap">
										已购买
									</text>
								</template>
								<template v-else>
									<text v-if="liveInfo.paytype ==1" class="price-wrap">
										{{'¥' + liveInfo.payval}}
									</text>
								</template>
							</template>
							
							<text class="time-wrap">{{liveInfo.lesson}}</text>
							<text class="stunum-wrap">{{liveInfo.views}}人在学</text>
						</view>
						<view class="new_line"></view>
						<!-- 讲师介绍 -->
						<view class="about-teacher-wrap">
							<text class="about-title ateacher-title">讲师介绍</text>
							<view class="ateacher-list">

								<view @click="viewTeacherInfo(teacherInfo.id)" class="ateacher-item">
									<image class="ateacher-img" :src="teacherInfo.avatar" mode=""></image>
									<view class="ateacher-info">
										<text class="at-info-item at-info-name">{{teacherInfo.user_nickname}}</text>
										<text class="at-info-item">主讲老师</text>
									</view>
									<text class="teacher-arow iconfont icon-jinrujiantou"></text>
								</view>

								<view @click="viewTeacherInfo(fudaoTeacher.id)" :class="{hideclass: (hidefudao == '1')}" class="ateacher-item ateacher-fudao-item">
									<image class="ateacher-img" :src="fudaoTeacher.avatar" mode=""></image>
									<view class="ateacher-info">
										<text class="at-info-item at-info-name">{{fudaoTeacher.user_nickname}}</text>
										<text class="at-info-item">辅导老师</text>
									</view>
									<text class="teacher-arow iconfont icon-jinrujiantou"></text>
								</view>

							</view>
						</view>

						<!-- 内容介绍 -->
						<view class="about-live-wrap">
							<text class="about-title alive-title">内容介绍</text>
							<view class="alive-info">
								<rich-text :nodes="liveInfo.info"></rich-text>
							</view>
						</view>

					</scroll-view>
				</swiper-item>

				<!-- 评价 -->
				<swiper-item class="course-info-item">
					<scroll-view :scroll-y = "kongkong == true? false:true" :style="'height:' + scrollH+'rpx;'">
						<view class="xiepingjia">
							<view class="pingjia-all-star">
								<text v-for="(item, index) in stararr" v-if="index < Math.floor(parseInt(com_data.star))" :key="index" class="pingjia-star iconfont icon-pingfenxingxing checkstar"></text>
								<text class="score checkstar">{{com_data.star}}</text>
							</view>
							<view class="pingjia-title" @click="openpinglun">写评价</view>
						</view>
						<view v-if="kongkong == false">

							<!-- 评论列表区域 -->
							<!-- 评论列表区域 -->
							<view class="com-list-wrap">
								<view v-for="(item, index) in com_data.list" class="com-item-wrap">
									<view class="com-user-star">
										<image class="com-user-avatar" :src="item.avatar" mode="aspectFill"></image>
										<view class="new1">
											<view class="new2">
												<text class="com-user-nickname">{{item.user_nickname}}</text>
												<text class="com-user-des">{{item.des}}</text>
											</view>
											<view class="list-star-wrap star-wrap">
												<text v-for="(it, idx) in stararr" v-if="idx < Math.floor(parseInt(item.star))" :key="idx" class="pingjia-star iconfont icon-pingfenxingxing checkstar"></text>
											</view>
										</view>
										<view class="com-time">{{item.add_time}}</view>
									</view>

									<view class="com-content">{{item.content}}</view>
									<view class="pingjialine"></view>
								</view>
							</view>
						</view>

						<view v-else>
							<view class="kong-wrap">
								<view class="kong-info">
									<image class="kong-ping-img" src="/static/images/xiangzi.png" mode="aspectFill"></image>
									<view class="kong-ping-txt">还未收到评价</view>
								</view>
							</view>
						</view>
					</scroll-view>
				</swiper-item>
			</swiper>

			<template v-if="paytype == 0">
				<view @click="enterContent()" class="inlive-btn">
					查看详情
				</view>
			</template>
			<template v-else-if="paytype == 2">
				<template v-if="ifbuy == 0">
					<view @click="enterpasslive" class="inlive-btn">
						输入密码获得
					</view>
				</template>
				<template v-else>
					<view @click="enterContent()" class="inlive-btn">
						查看详情
					</view>
				</template>
			</template>
			<template v-if="paytype == 1">
				<template v-if="ifbuy == 0">
					<view @click="enterpaylive">
						<template v-if="liveInfo.ifbuy == 0">
							<view class="carline"></view>
							<view class="carView">
								<view class="car" @click="shopcar">
									<view class="new_gouwuche">
										<image class="gowucheimage" src="../../static/gouwuche.png" mode="aspectFit">
										</image>
										<template v-if="nums != 0">
											<view class="gouwunums">
												<view class="carnums">{{nums}}</view>
											</view>
										</template>
									</view>
									<view class="cartitle">购物车</view>
								</view>
								<template v-if="liveInfo.iscart == 0">
									<view class="joincar" @tap="doAddCar">加入购物车</view>
								</template>
								<template v-else-if="liveInfo.iscart == 1">
									<view class="joincar2">已加入购物车</view>
								</template>
								<view class="buy" @tap="buy">立即购买</view>
							</view>
						</template>
					</view>
				</template>
				<template v-if="ifbuy == 1">
					<view @click="enterContent()" class="inlive-btn">
						查看详情
					</view>
				</template>
			</template>

		</view>
		<view :hidden="userpasswordkHidden" class="popup_content">
			<view class="popup_title">输入密码</view>
			<view class="popup_textarea_item">
				<input type="text" class="popup_textarea" value="" v-model="passwordcontent" placeholder="输入密码" />
				<view class="buttons">
					<text @click="submitCancle" class="popup_button">取消</text>
					<text @click="submitPassword" class="popup_button2">确定</text>
				</view>
			</view>
		</view>
		<view class="popup_overlay" :hidden="userpasswordkHidden" @click="hideDiv()"></view>
		<view class="extension-zhe" v-if="isHidden == 0">
			<view class="extension-zhe-content">
				<view class="extension-zhe-content-tips">
					分享方式
					<image @click="close" class="extension-zhe-content-tips-img" src="../../static/ming-pop/close.png"></image>
				</view>
				<view class="extension-zhe-content-type">

					<!-- <view class="extension-zhe-content-type-li" @click="qqshare">
					<image class="extension-zhe-content-type-li-img" src="../../static/fuzhilianjie.png"></image>
					<view class="extension-zhe-content-type-li-text">复制链接</view>
				</view> -->
					<!-- #ifdef MP-WEIXIN -->
					<!-- <view class="extension-zhe-content-type-li" @click="wechatshare">
					<image class="extension-zhe-content-type-li-img" src="/static/images/login_wx.png"></image>
					<view class="extension-zhe-content-type-li-text">微信好友</view>
				</view> -->
					<!-- #endif -->

				</view>
			</view>
		</view>
		
	</view>
</template>

<script>
	import uniNavBar from '@/components/uni-ui/uni-nav-bar/uni-nav-bar.vue';

	const app = getApp();

	export default {
		components: {
			uniNavBar,

		},
		data() {
			return {
				ifbuy: 0,
				scrollH: 0,
				tabIndex: 0,
				tabBars: [{
					name: "介绍"
				}, {
					name: "评价"
				}],
				live_course_bg: '', //直播背景图片
				liveInfo: {},
				hidefudao: '',
				teacherInfo: {
					'id': '',
					'avatar': '',
					'user_nickname': ''
				},
				fudaoTeacher: {
					'id': '',
					'avatar': '',
					'user_nickname': ''
				},
				paytype: '',
				userpasswordkHidden: true, // 默认隐藏
				feedbackpassword: '', // 输入密码
				passwordcontent: '',
				getcourseid: '',
				nums: '',
				courseid: '', //内容id
				stararr: [1, 2, 3, 4, 5],
				com_data: {}, //评论数据
				kongkong: true, //空空如也
				webview: '',
				INFO: [],
				sorttype: '图文自学',
				sort: '0',
				type: 1,
				animationData: [],
				ishidden: 1
			}
		},
		onReady: function() {

			var that = this;
			uni.getSystemInfo({
				success: function(res) {
					that.scrollH = res.windowHeight * 750 / res.windowWidth - 600 - 70;
					// #ifdef MP-WEIXIN
					that.scrollH = res.windowHeight * 750 / res.windowWidth - 750 - 70;
					// #endif
				}
			});
			this.getnums();

			var num = -7;
			setInterval(() => {
				var animation = uni.createAnimation({
					duration: 400,
					delay: 0,
				})
				if (num == -7) {
					num = 0;
				} else if (num == 0) {
					num = -7;
				}
				animation.translateX(num).step()
				this.animationData = animation.export()
			}, 400);
		},
		onShow: function() {
			//获取评价内容
			setTimeout(() => {
				this.getContentInfo(this.getcourseid);
				this.getPingjia(this.courseid);
				this.getnums();
			}, 300);
			this.isHidden = 1;
		},

		onLoad(option) {
			this.getContentInfo(option.courseid);
			this.getcourseid = option.courseid;
			//this.paytype = option.paytype;
			this.courseid = option.courseid;
			//获取评价内容
			this.getPingjia(option.courseid);

		},
		methods: {
			setLogin() {
				// 没有登录则弹窗登录
				if(app.globalData.userinfo == '') {
					uni.showModal({
						title: '请先登录你的账号',
						content: '',
						showCancel: true,
						cancelText: '取消',
						confirmText: '立即登录',
						confirmColor: '#2C62EF',
						success: res => {
							if (res.confirm) {
								uni.navigateTo({
									url: '../../../pages/login/login'
								})
							}
						},
						fail: () => {},
						complete: () => {}
					});
					return false;
				}
				return true;
			},
			getnums() {
				let that = this;
				let gData = app.globalData;
				uni.request({
					url: gData.site_url + 'Cart.GetNums',
					method: 'POST',
					data: {
						'uid': gData.userinfo.id,
						'token': gData.userinfo.token,
					},
					success: res => {
						if(res.data.data.info[0] != undefined) {
							that.nums = res.data.data.info[0].nums;
						}
					},
				});
			},
			// 打开评论页面
			openpinglun() {
				let isLogin = this.setLogin();
				if(!isLogin) {
					return;
				}
				
				uni.navigateTo({
					url: '../../../pages/pinglun/pinglun?courseid=' + this.courseid + '&title=' + this.liveInfo.name +
						'&avatar=' + this.teacherInfo.avatar + '&nickname=' + this.teacherInfo.user_nickname,
				});
			},
			// 获取评价内容 
			getPingjia(courseid) {
				let gData = app.globalData;
				uni.request({
					url: gData.site_url + 'Comment.GetList',
					method: 'GET',
					data: {
						// uid token courseid p
						'uid': gData.userinfo.id,
						'token': gData.userinfo.token,
						'courseid': courseid,
						'p': 1
					},
					success: res => {
						if (res.data.data.code != '0') {
							return;
						}
						let com_data = res.data.data.info[0];
						if ((com_data.list != undefined) && (com_data.list.length > 0)) {
							this.kongkong = false;
						}
						this.com_data = com_data;
					},
					fail: () => {
						uni.showToast({
							icon: 'none',
							title: '网络错误'
						});
					},
				});
			},
			//切换选项卡
			changeTab(index) {
				this.tabIndex = index
			},
			//滑动
			onChangeTab(e) {
				//切换当前索引
				this.tabIndex = e.detail.current
			},
			backCourseList() {
				uni.navigateBack({
					delta: 1
				});
			},
			enterpasslive() {
				if(this.ifbuy == 0) {
					// 显示输入弹出框
					this.userpasswordkHidden = false;
				} else {
					this.enterlive();
				}
					
			},
			//提交密码 passwordcontent
			submitPassword() {
				uni.showLoading({
					title: '......',
					icon: 'none',
				});
				var passwordcontent = this.passwordcontent;
				this.userpasswordkHidden = true;
				let gData = app.globalData;

				uni.request({
					url: gData.site_url + 'Course.CheckPass',
					method: 'POST',
					data: {
						"pass": passwordcontent,
						"courseid": this.getcourseid,
						'uid': gData.userinfo.id,
						'token': gData.userinfo.token
					},
					success: res => {
						uni.hideLoading();
						uni.showToast({
							title: res.data.data.msg,
							icon: 'none',
						})
						if (res.data.data.code == 0) {
							this.enterContent();
						} 
					},
					fail: () => {
						uni.hideLoading();
					}
				});
			},
			submitCancle() {
				this.userpasswordkHidden = true;
			},
			// 获取内容详情
			getContentInfo(courseid) {
				let gData = app.globalData;
				uni.request({
					url: gData.site_url + 'Course.GetDetail',
					method: 'GET',
					data: {
						// uid token courseid
						'uid': gData.userinfo.id,
						'token': gData.userinfo.token,
						'courseid': courseid
					},

					success: res => {
						if (res.data.data.code == 700) {
							uni.navigateTo({
								url: '../../../pages/login/login',
								success: res => {},
								fail: () => {},
								complete: () => {}
							});
							return;
						}

						///// 类别，0内容1课程2直播3摄像头直播
						//type 形式，1图文2视频3音频    4ppt直播 5视频直播6音频直播7授课直播（白板）

						this.ifbuy = res.data.data.info[0].ifbuy;
						this.sort = res.data.data.info[0].sort;
						this.type = parseInt(res.data.data.info[0].type);
						
						if (this.type == 1) {
							this.sorttype = '图文自学';
						} else if (this.type == 2) {
							this.sorttype = '视频自学';
						} else if (this.type == 3) {
							this.sorttype = '语音自学';
						}
						
						this.INFO = res.data.data.info;
						let info = res.data.data.info[0];
						console.log(info);
						this.live_course_bg = info.thumb ? info.thumb : '';
						this.liveInfo = info;
						this.teacherInfo = info.userinfo;
						this.paytype = res.data.data.info[0].paytype;
						
						if (info.tutor.length < 1) {
							this.hidefudao = '1';
							return;
						}
						
						this.fudaoTeacher.id = info.tutor[0].id;
						this.fudaoTeacher.avatar = info.tutor[0].avatar;
						this.fudaoTeacher.user_nickname = info.tutor[0].user_nickname;
					},
				});
			},
			enterpaylive() {
				let isLogin = this.setLogin();
				if(!isLogin) {
					return;
				}
				
				if (this.liveInfo.ifbuy == 1) {
					this.enterContent();
				}
			},
			// 查看内容详情
			enterContent() {
				let isLogin = this.setLogin();
				if(!isLogin) {
					return;
				}
				
				uni.navigateTo({
					url: '../content-detail/content-detail?info=' + encodeURIComponent(JSON.stringify(this.liveInfo)) + '&type=' +
						this.liveInfo.type + '&thumb=' + this.live_course_bg + '&addtime=' + this.liveInfo.add_time,
				});
			},
			// 查看教师详情
			viewTeacherInfo(touid) {
				let isLogin = this.setLogin();
				if(!isLogin) {
					return;
				}
				//跳转教师详情页并传入基本信息
				uni.navigateTo({
					url: '../../../pages/teacherinfo/teacherinfo?touid=' + touid,
				});

			},
			//加入购物车
			doAddCar() {
				let isLogin = this.setLogin();
				if(!isLogin) {
					return;
				}
				let gData = app.globalData;
				var that = this;
				uni.request({
					url: gData.site_url + 'Cart.Add',
					method: 'POST',
					data: {
						"type": "0",
						"typeid": this.getcourseid,
						'uid': gData.userinfo.id,
						'token': gData.userinfo.token,
					},
					success: res => {
						
						this.getContentInfo(this.getcourseid);
						this.getnums();
						uni.showToast({
							title: res.data.data.msg
						})

					},
				});
			},
			shopcar() {
				let isLogin = this.setLogin();
				if(!isLogin) {
					return;
				}
				
				uni.navigateTo({
					url: '../../../pages/shop-car/shop-car',
				});
			},
			//立即购买
			buy() {
				let isLogin = this.setLogin();
				if(!isLogin) {
					return;
				}
				
				uni.navigateTo({
					url: '../../../pages/pay/pay?info=' + encodeURIComponent(JSON.stringify(this.INFO)),
				});
			}

		}
	}
</script>

<style>
	/* 课程详情页公共样式 */
	@import url("/static/css/course_info/course_info.css");
	@import url("/static/common/css/pingjia.css");
	
	.course-title {
		font-size: 30rpx;
		font-weight: bold;
	}
	
	.sub_jifen {
		position: absolute;
		right: 60rpx;
		margin-top: -10rpx;
		color: #FFFFFF;
		text-align: center;
		padding-bottom: 5rpx;
		width: 80rpx;
		height: 30rpx;
		border-radius: 15rpx;
		font-size: 20rpx;
		background-color: #FF3939;
	}

	.popup_overlay {
		position: fixed;
		top: 0%;
		left: 0%;
		width: 100%;
		height: 100%;
		background-color: black;
		z-index: 1001;
		-moz-opacity: 0.8;
		opacity: .80;
		filter: alpha(opacity=88);
	}

	.popup_content {
		position: fixed;
		top: 50%;
		left: calc(50% - 120px);
		width: 400rpx;
		height: 200rpx;
		margin-top: -270rpx;
		border: 10px solid white;
		background-color: white;
		z-index: 1002;
		overflow: auto;
		border-radius: 10rpx;
	}


	.popup_title {
		width: 100%;
		text-align: center;
		font-size: 32rpx;
	}

	.popup_textarea_item {
		padding-top: 10rpx;
		height: 50rpx;
		width: 100%;
		background-color: #F1F1F1;
		margin-top: 20rpx;
	}

	.popup_textarea {
		width: 100%;
		font-size: 26rpx;
		margin-left: 20rpx;
	}

	.popup_button {
		color: #000000;
		width: 50%;
		text-align: center;

	}

	.popup_button2 {
		color: #2C62EF;
		width: 50%;
		text-align: center;

	}

	.buttons {
		display: flex;
		flex-direction: row;
		width: 100%;
		font-size: 32rpx;
		margin-top: 20rpx;

	}

	.new_gouwuche {
		margin-top: 10rpx;
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
		left: 0rpx;
		margin-top: 10rpx;
	}

	.carView {
		display: flex;
		flex-direction: row;
		bottom: 0upx;
		background-color: #FFFFFF;
		height: 110upx;
		position: fixed;
		width: 100%;
	}

	.carnums {
		width: 26rpx;
		height: 26rpx;
		font-size: 20rpx;
		color: #FFFFFF;
		text-align: center;
		line-height: 26rpx;
	}

	.car {
		width: 30%;
		align-items: center;
		text-align: center;
		display: flex;
		flex-direction: column;

	}

	.cartitle {
		color: #333333;
		font-size: small;
	}

	.joincar {
		text-align: center;
		width: 40%;
		color: #FFFFFF;
		background-color: #FFAC4B;
		font-size: larger;
		padding-top: 25upx;
	}

	.joincar2 {
		text-align: center;
		width: 40%;
		color: #FFFFFF;
		background-color: #CCCCCC;
		font-size: larger;
		padding-top: 25upx;
	}

	.buy {
		padding-top: 25upx;
		text-align: center;
		font-size: larger;
		width: 40%;
		color: #FFFFFF;
		background-color: #FF623E;
	}
	
	.at-info-item {
		font-size: 20rpx !important;
	}
	
	.at-info-name {
		font-size: 35rpx !important;
		font-weight: bold;
	}
	
</style>
