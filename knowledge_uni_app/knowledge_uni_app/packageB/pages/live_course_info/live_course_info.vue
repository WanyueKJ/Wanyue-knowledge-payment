<template>
	<view class="app">
		<!-- <uni-nav-bar @clickLeft="backCourseList" left-icon="back" :border="false" title="直播详情" statusBar>
			
		</uni-nav-bar> -->
		<!-- 直播背景 -->
		<view class="live_course_bg_wrap">
			<image class="live_course_img" :src="live_course_bg" mode="aspectFill"></image>
			<template v-if="islive == '1'">
				<template v-if="paytype == 2">
					<image @click="enterpasslive" class="play_tu" src="../../static/images/play_tu.png" mode="aspectFill"></image>
				</template>
				<template v-else-if="paytype == 0">
					<image @click="enterlive" class="play_tu" src="../../static/images/play_tu.png" mode="aspectFill"></image>
				</template>
				<template v-else-if="paytype == 1">
					<image @click="enterpaylive" class="play_tu" src="../../static/images/play_tu.png" mode="aspectFill"></image>
				</template>
				<view class="play_tu2">{{lesson}}</view>
			</template>
			<template v-else-if="islive == '2'">
				<view class="play_tu3">
					直播已结束
				</view>
			</template>

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
						<!-- 直播介绍 -->
						<view class="about-live-wrap">
							<text class="about-title alive-title">直播介绍</text>
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
								<text v-for="(item, index) in stararr" :key = "index" v-if="index < Math.floor(parseInt(com_data.star))" class="pingjia-star iconfont icon-pingfenxingxing checkstar"></text>
								<text class="score checkstar">{{com_data.star}}</text>
							</view>
							<view class="pingjia-title" @click="openpinglun">写评价</view>
						</view>
						<view v-if="kongkong == false">

							<!-- 评论列表区域 -->
							<view class="com-list-wrap">
								<view v-for="(item, index) in com_data.list" :key = "index" class="com-item-wrap">
									<view class="com-user-star">
										<image class="com-user-avatar" :src="item.avatar" mode="aspectFill"></image>
										<view class="new1">
											<view class="new2">
												<text class="com-user-nickname">{{item.user_nickname}}</text>
												<text class="com-user-des">{{item.des}}</text>
											</view>
											<view class="list-star-wrap star-wrap">
												<text v-for="(it, idx) in stararr" :key = "idx" v-if="idx < Math.floor(parseInt(item.star))" class="pingjia-star iconfont icon-pingfenxingxing checkstar"></text>
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
				<view @click="enterlive" class="inlive-btn">
					进入直播
				</view>
			</template>
			<template v-if="paytype == 2">
				<template v-if="ifbuy == 0">
					<view @click="enterpasslive" class="inlive-btn">
						输入密码获得
					</view>
				</template>
			</template>
			<template v-if="paytype == 1">
				<template v-if="ifbuy == 0">

					<view @click="enterpaylive" class="inlive-btn">
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
				<template v-else>
					<view @click="enterlive" class="inlive-btn">
						进入直播
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

				scrollH: 0,
				tabIndex: 0,
				tabBars: [{
					name: "详情"
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
				courseid: '', //课程id
				pingjia_content: '', //评价内容
				stararr: [1, 2, 3, 4, 5],
				com_data: {}, //评论数据
				kongkong: true, //空空如也
				INFO: [],
				lesson: '',
				islive: '0',
				sort: '',
				type: 5,
				sorttype: '视频讲解',
				ifbuy: 0,
				animationData: [],
				isHidden: 1
			}
		},
		
		onShow: function() {
			//获取评价内容
			setTimeout(() => {
				this.getPingjia(this.courseid);
				this.getCourseInfo(this.getcourseid);
				this.getnums();
			}, 500);
				this.isHidden = 1;	
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
		onLoad(option) {
			// courseid
			this.getCourseInfo(option.courseid);
			this.getcourseid = option.courseid;
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
				let gData = app.globalData;
				uni.request({
					url: gData.site_url + 'Cart.GetNums',
					header: {
						"Content-Type": "application/x-www-form-urlencoded;text/html;charset=utf-8"
					},
					method: 'POST',
					data: {
						'uid': gData.userinfo.id,
						'token': gData.userinfo.token,
					},
					success: res => {
						if(res.data.data.info[0] != undefined) {
							this.nums = res.data.data.info[0].nums;
						}
					},
				});
			},
			// 评价内容
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
				this.tabIndex = index;
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
			enterpasslive() {
				let isLogin = this.setLogin();
				if(!isLogin) {
					return;
				}
				console.log(this.ifbuy);
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
							
							this.enterlive();
						} else {

						}
					},
					fail: () => {
						uni.hideLoading();
					},
					complete: () => {}
				});


			},
			// 获取大班课详情
			getCourseInfo(courseid) {
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
						if (res.data.data.code != 0) {
							uni.navigateTo({
								url: '../../../pages/login/login',
								success: res => {},
								fail: () => {},
								complete: () => {}
							});

							return;
						}
						this.sort = res.data.data.info[0].sort;
						
						this.type = parseInt(res.data.data.info[0].type);
						// console.log(JSON.parse(JSON.stringify(res.data.data.info[0])));
						 
						///// 类别，0内容1课程2直播3摄像头直播
						//type /// 形式，1图文2视频3音频4ppt直播 5视频直播6音频直播7授课直播（白板）
						// if (this.sort == 2 || this.sort == 3) {
						
						
						if (this.type == 4 || this.type == 1) {
							this.sorttype = 'ppt讲解';
						} else if (this.type == 5) {
							this.sorttype = '普通直播';
						} else if (this.type == 6 || this.type == 3) {
							this.sorttype = '音频讲解';
						}else if (this.type == 7) {
							this.sorttype = '白班互动';
						}else if (this.type == 8) {
							this.sorttype = '普通直播';
						}
						// }
						this.INFO = res.data.data.info;
		
						// if (this.INFO[0].content){
						// }else{
							// for (let i=0;i<this.INFO.length;i++){
							// 	 var item = this.INFO[i];
							// 	 item.content = '1';
							// 	 item.info = '1';
							// 	 item.userinfo = '1';
							// 	 this.INFO[i] = item;
							// }
						// }
					
						let info = res.data.data.info[0] || [];
						this.lesson = res.data.data.info[0].lesson;
						this.islive = res.data.data.info[0].islive;
						this.live_course_bg = info.thumb;
						this.liveInfo = info;
						this.teacherInfo = info.userinfo;
						this.paytype = res.data.data.info[0].paytype;
						this.ifbuy = res.data.data.info[0].ifbuy;
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
			//显示错误提示
			showError(title) {
				uni.showToast({
					icon: 'none',
					title: title,
					duration: 3000,
				});
			},
			enterpaylive() {
				let isLogin = this.setLogin();
				if(!isLogin) {
					return;
				}
				
				if (this.liveInfo.ifbuy == 1) {
					this.enterlive();
				}
			},
			// 进入直播
			enterlive() {
				let isLogin = this.setLogin();
				if(!isLogin) {
					return;
				}
				
				let liveInfo = this.liveInfo;
				if (liveInfo.type == 7) {
					uni.showToast({
						title: '白板直播暂未接入',
						icon: 'none'
					});
				} else {
					uni.navigateTo({
						url: '../live-info/live-infoplay?liveuid=' + liveInfo.uid +
							'&courseid=' + liveInfo.id + '&lessonid=' + '0' + '&thumb=' + this.live_course_bg,
					});
				}
			},
			submitCancle() {
				
				this.userpasswordkHidden = true;
			},
			//加入购物车
			doAddCar() {
				let gData = app.globalData;

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
						
						this.getCourseInfo(this.getcourseid);
						this.getnums();
						uni.showToast({
							title: res.data.data.msg
						})

					},
				});
			},
			shopcar() {
				uni.navigateTo({
					url: '../../../pages/shop-car/shop-car',
				});
			},
			//立即购买
			buy() {
				
				uni.navigateTo({
					url: '../../../pages/pay/pay?info=' + encodeURIComponent(JSON.stringify(this.INFO)),
				});
			}
		}
	}
</script>

<style>
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


	.pinglun-icon2 {
		width: 30rpx;
		height: 30rpx;

	}

	.app {
		/* #ifdef MP-WEIXIN */
		top: 80rpx;
		/* #endif */
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
