<template>
	<view class="app">

		<!-- <uni-nav-bar @clickLeft="backCourseList" left-icon="back" :border="false" title="课程详情" statusBar>

		</uni-nav-bar> -->
		<!-- 直播背景 -->
		<view class="live_course_bg_wrap">
			<image class="live_course_img" :src="live_course_bg" mode="aspectFit"></image>
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
						<view class="title_des">
							<text>{{liveInfo.name}}</text>
							<text>{{liveInfo.des}}</text>
							<!-- <text class="course_tag">视频</text> -->
						</view>

						<!-- 价格时间学习人数信息 -->
						<view class="price-time-stunum">
							<template v-if="ifbuy == 1">
								<text v-if="liveInfo.paytype == 1" class="price-wrap">已付费</text>
							</template>
							<template v-else>
								<text v-if="liveInfo.paytype == 0" class="free">免费</text>
								<text v-if="liveInfo.paytype == 2" style="color:#4385FF;">密码</text>
								<text v-if="liveInfo.paytype ==1" class="price-wrap">
									{{'¥' + liveInfo.payval}}
								</text>
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
									<text class="teacher-arow">></text>
								</view>

								<view @click="viewTeacherInfo(fudaoTeacher.id)" :class="{hideclass: (hidefudao == '1')}" class="ateacher-item ateacher-fudao-item">
									<image class="ateacher-img" :src="fudaoTeacher.avatar" mode=""></image>
									<view class="ateacher-info">
										<text class="at-info-item at-info-name">{{fudaoTeacher.user_nickname}}</text>
										<text class="at-info-item">辅导老师</text>
									</view>
									<text class="teacher-arow">></text>
								</view>

							</view>
						</view>


						<!-- 课程介绍 -->
						<view class="about-live-wrap">
							<text class="about-title alive-title">课程介绍</text>
							<view class="alive-info">
								<rich-text :nodes="liveInfo.info"></rich-text>

							</view>
						</view>

					</scroll-view>
				</swiper-item>
				<swiper-item class="course-info-item">
					<!-- 目录-->
					<scroll-view scroll-y class="mulu" :style="{height : scrollH + 'rpx'}">
						<view v-for="(item,index) in mululist" :key="index">
							<view class="muluitem" @click="showdetail(item,index)">
								<text class="mulutext">{{item.name}}</text>
								<template v-if="item.show == true">
									<image class="muluimage" src="../../static/down_blue2.png"></image>
								</template>
								<template v-else>
									<image class="muluimage" src="../../static/down_blue.png"></image>
								</template>
								<view class="line"></view>
							</view>
							<!-- v-show="current == index" -->
							<view class="listdetail" v-show="item.show == true" v-for="(item2,index2) in item.list " :key="index2" @click="entermululive(item2)">

								<view class="display_row">
									<template v-if="item2.type == 1">
										<image class="course_t_d" src="../../static/mulu-tuwen.png"></image>

									</template>
									<template v-else-if="item2.type == 2">
										<image class="course_t_d" src="../../static/mulu-shipin.png"></image>
									</template>
									<template v-else-if="item2.type == 3">
										<image class="course_t_d" src="../../static/mulu-yuyin.png"></image>
									</template>
									<template v-else-if="item2.type == 4 ||item2.type == 5 ||item2.type == 6">
										<image class="course_t" src="../../static/mulu-jiangjie.png"></image>
									</template>
									<template v-else-if="item2.type == 7">
										<image class="course_t" src="../../static/mulu-baiban.png"></image>
									</template>
									<template v-else>
										<image class="course_t" src="../../static/mulu-zhibo.png"></image>
									</template>
									<template v-if="item2.type == 1 || item2.type == 2 || item2.type == 3">
										<text class="course_tt">{{item2.name}}</text>
										<text class="islast_tt" v-if="item2.islast == 1">上次学到</text>
									</template>
									<template v-else>
										<text class="course_ttt">{{item2.name}}</text>
										<text class="islast" v-if="item2.islast == 1">上次学到</text>
									</template>									
									<text v-if="item2.status == 0" class="livein"></text>
									<text v-if="item2.status == 1" class="livein">试学</text>
									<text v-if="item2.status == 2" class="livein" style="color: #969696; font-size: 20rpx; margin-top: 40rpx;">已学完</text>
									<text v-if="item2.status == 3" class="livein">进入直播</text>
									<text v-if="item2.status == 4" class="livein">锁</text>
								</view>
								<!-- <view v-if="item2.type == 1" class="liveintime">{{item2.time_date +' 图文自学'}}</view> -->
								<!-- <view v-if="item2.type == 2" class="liveintime">{{item2.time_date +' 视频自学'}}</view> -->
								<!-- <view v-if="item2.type == 3" class="liveintime">{{item2.time_date +' 音频自学'}}</view> -->
								<view v-if="item2.type == 4" class="liveintime">{{item2.time_date +' ppt讲解'}}</view>
								<view v-if="item2.type == 5" class="liveintime">{{item2.time_date +' 视频讲解'}}</view>
								<view v-if="item2.type == 6" class="liveintime">{{item2.time_date +' 音频讲解'}}</view>
								<view v-if="item2.type == 7" class="liveintime">{{item2.time_date +' 白板互动'}}</view>
								<view v-if="item2.type == 8" class="liveintime">{{item2.time_date +' 普通直播'}}</view>
								<template v-if="item2.type == 1 || item2.type == 2 || item2.type == 3">
									<view class="mululine_d"></view>
								</template>
								<template v-else>
									<view class="mululine"></view>
								</template>
							</view>
						</view>
					</scroll-view>

				</swiper-item>
				<!-- 评价 -->
				<swiper-item class="course-info-item">
					<scroll-view :scroll-y = "kongkong == true? false:true" :style="'height:' + scrollH +'rpx;'">
						<view class="xiepingjia">
							<view class="pingjia-all-star">
								<text v-for="(item, index) in stararr" v-if="index < Math.floor(parseInt(com_data.star))" :key="index" class="pingjia-star iconfont icon-pingfenxingxing checkstar"></text>
								<text class="score checkstar">{{com_data.star}}</text>
							</view>
							<view class="pingjia-title" @click="openpinglun">写评价</view>
						</view>
						<view v-if="kongkong == false">
							<!-- 评论列表区域 -->
							<view class="com-list-wrap">
								<view v-for="(item, index) in com_data.list" :key="index" class="com-item-wrap">
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

			<template v-if="paytype == 2">
				<template v-if="ifbuy == 0">
					<view v-show="showpass == 1" @click="enterpasslive" class="inlive-btn">
						输入密码获得
					</view>
				</template>
			</template>
			<template v-if="paytype == 1">
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
							<template v-else>
								<view class="joincar2">已加入购物车</view>
							</template>
							<view class="buy" @tap="buy">立即购买</view>
						</view>
					</template>
				</view>
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
		<view class="extension-zhe" v-if="hashidden == 0">
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
					<!-- 			<view class="extension-zhe-content-type-li" @click="wechatshare">
						<image class="extension-zhe-content-type-li-img" src="/static/images/login_wx.png"></image>
						<view class="extension-zhe-content-type-li-text">微信好友</view>
					</view> -->
					<!-- #endif -->
					<view class="extension-zhe-content-type-li" @click="haibaoshare">
						<image class="extension-zhe-content-type-li-img" src="../../static/tuiguang_haibao.png"></image>
						<view class="extension-zhe-content-type-li-text">海报分享</view>
					</view>

				</view>
			</view>
		</view>

		<view v-if="ispack == true" class="add_packages">
			<scroll-view class="packages" scroll-y="true">
				<view class="dangqian_title">当前课程</view>
				<view class="top_item" @click="dangqian">
					<view class="top_item_price">
						<view class="top_name">{{liveInfo.name}}</view>
						<view class="top_price">{{'¥' +' '+liveInfo.payval}}</view>
					</view>
					<image class="item_sele2" :src="dangqianselected == true? car_yes:car_no"></image>

					<view class="top_lession">{{'共' +liveInfo.lesson}}</view>
					<view class="top_lession">{{'老师：' +teacherInfo.user_nickname}}</view>
				</view>
				<view class="lianbao_title">联报课程</view>
				<view v-for="(item,index) in  Package_course" :key="index" class="lianbao_item">
					<view class="lianbao_item_top" @click="xuanze(item,index)">
						<image class="relate_image1" src="../../static/relate_back.png" mode="aspectFill"></image>
						<image class="relate_image2" src="../../static/relate_sanjiao.png" mode="aspectFit"></image>
						<view class="item_top_name">{{item.name}}</view>
						<view class="item_top_price">{{'¥' +' '+item.price}}</view>
						<image class="item_sele" :src="item.selected == true? car_yes:car_no"></image>
					</view>

					<view v-for="(item2,index2) in item.courses" :key="index2" class="item2">
						<view class="top_item_price">
							<view class="item2_num">{{index2 + 1}}</view>
							<view class="item2_name">{{item2.name}}</view>
						</view>
						<view class="item2_lession">{{'共' +item2.lesson}}</view>
						<view class="top_item_price">
							<view class="item2_lession">{{'老师：' +item2.user_nickname}}</view>
							<template v-if="item2.isbuy == 0">
								<view class="item2_price">{{'¥' +' '+item2.payval}}</view>
							</template>
							<template v-else>
								<view class="item2_price">已付费</view>
							</template>
						</view>
						<template v-if="item.courses.length >1">
							<view class="item2_line"></view>
						</template>

					</view>
				</view>

			</scroll-view>
			<!-- <view class="packages_sure"> -->
			<view @click="packages_sub_sure" class="packages_sub_sure">确定</view>
			<!-- </view> -->
		</view>
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
				tabIndex: 0,
				tabBars: [{
					name: "介绍"
				}, {
					name: "目录"
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
				mululist: {}, //目录
				index: 0,
				current: 0,
				lastindex: 0,
				ispack: false,
				INFO: [],
				passwordok: true,
				showpass: 1,
				scrollH: 0,
				ifbuy: 0,
				hashidden: 1,
				animationData: [],
				isGouwuChe: false,
				Package_course: [],
				car_yes: '../../static/car_yes.png',
				car_no: '../../static/car_no.png',
				dangqianselected: true,
				selecteditem: {}
			}
		},
		onShow: function() {
			//获取评价内容
			setTimeout(() => {
				this.getPingjia(this.getcourseid);
				this.getCourseInfo(this.getcourseid);
				this.getnums();
			}, 300);
			this.hashidden = 1;
		},

		onReady: function() {
			this.getnums();
			// uni.getSystemInfo({
			// 	success: (res) => {
			// 		this.scrollH = res.screenHeight - 400;
			// 	}
			// });
			
			var that = this;
			uni.getSystemInfo({
				success: function(res) {
					console.log(res);
					console.log(res.screenHeight); //屏幕高度  注意这里获得的高度宽度都是px 需要转换rpx
					console.log(res.windowHeight); //可使用窗口高度
					that.scrollH = res.windowHeight * 750 / res.windowWidth - 600;
					// #ifdef MP-WEIXIN
					that.scrollH = res.windowHeight * 750 / res.windowWidth - 750;
					// #endif
				}
			});
			
			this.getmulu(this.getcourseid);

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
		onShow() {
			this.showpass = 0;
		},
		onLoad(option) {
			// courseid
			this.getCourseInfo(option.courseid);
			this.getcourseid = option.courseid;
			this.courseid = option.courseid;
			//获取评价内容

			this.getPingjia(option.courseid);
			this.getPackage_Course();
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
						confirmColor: '#38DAA6',
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
			packages_sub_sure() {
				this.ispack = false;
				if (this.isGouwuChe == true) {
					if (this.dangqianselected == true) {
						this.CartAdd(this.getcourseid);
					} else {
						this.CartAdd(this.selecteditem.id);
					}
				} else {
					if (this.dangqianselected == true) {
						

						uni.navigateTo({
							url: '../../../pages/pay/pay?info=' + encodeURIComponent(JSON.stringify(this.INFO)),
						});
					} else {
						var array = [];
						array.push(this.selecteditem);
						
						uni.navigateTo({
							url: '../../../pages/pay/pay?info=' + encodeURIComponent(JSON.stringify(array)),
						});

					}
				}

			},
			dangqian() {
				this.dangqianselected = true;
				for (let i = 0; i < this.Package_course.length; i++) {
					var item2 = this.Package_course[i];
					item2.selected = false;
				}
			},
			xuanze(item, index) {
			
				this.selecteditem = item;
				for (let i = 0; i < this.Package_course.length; i++) {
					var item2 = this.Package_course[i];
					item2.selected = false;
				}
				if (item.selected == true) {
					item.selected = false;
				} else {
					item.selected = true;
				}
				this.dangqianselected = false;
				this.Package_course[index] = item;
				this.$set(this.Package_course, index, item);


			},
			//加入购物车
			doAddCar() {
				let isLogin = this.setLogin();
				if(!isLogin) {
					return;
				}
				
				this.isGouwuChe = true;
				if (this.liveInfo.ispack == 1) {
					this.ispack = true;
				} else {
					this.CartAdd(this.getcourseid);
				}
			},
			//立即购买
			buy() {
				let isLogin = this.setLogin();
				if(!isLogin) {
					return;
				}
				
				this.isGouwuChe = false;
				if (this.liveInfo.ispack == 1) {
					this.ispack = true;
				} else {

					uni.navigateTo({
						url: '../../../pages/pay/pay?info=' + encodeURIComponent(JSON.stringify(this.INFO)),
					});
				}

			},
			CartAdd(ID) {
				let isLogin = this.setLogin();
				if(!isLogin) {
					return;
				}
				let type = 0;
				if (ID == this.getcourseid) {
					type = 0;
				} else {
					type = 1;
				}
				let gData = app.globalData;

				uni.request({
					url: gData.site_url + 'Cart.Add',
					method: 'POST',
					data: {
						"type": type,
						"typeid": ID,
						'uid': gData.userinfo.id,
						'token': gData.userinfo.token,
					},
					success: res => {

						this.getCourseInfo(this.getcourseid);
						this.getnums();
						uni.showToast({
							title: res.data.data.msg,
							icon: 'none'
						})
					},
				});
			},
			getPackage_Course() {

				let gData = app.globalData;
				uni.request({
					url: gData.site_url + 'Package.GetListByCourse',
					method: 'GET',
					data: {
						'uid': gData.userinfo.id,
						'token': gData.userinfo.token,
						'courseid': this.getcourseid,

					},
					success: res => {

						if (res.data.data.code != '0') {
							return;
						}
						this.Package_course = res.data.data.info;

						for (let i = 0; i < this.Package_course.length; i++) {
							var item = this.Package_course[i];
							item['selected'] = false;
							this.Package_course[i] = item;
						}
					},
				});
			},
			getnums() {
				let gData = app.globalData;
				uni.request({
					url: gData.site_url + 'Cart.GetNums',
					method: 'POST',
					data: {
						'uid': gData.userinfo.id,
						'token': gData.userinfo.token,
					},
					success: res => {
						if (res.data.data.code == 0){
							this.nums = res.data.data.info[0].nums;
						}
						
						
					},
				});
			},
			//目录
			getmulu(courseid) {

				let gData = app.globalData;
				uni.request({
					url: gData.site_url + 'Course.GetLessonList',
					method: 'GET',
					data: {
						'uid': gData.userinfo.id,
						'token': gData.userinfo.token,
						'courseid': courseid,
						'p': 1
					},
					success: res => {

						if (res.data.data.code != '0') {
							return;
						}
						this.mululist = res.data.data.info;
					
						 console.log(JSON.parse(JSON.stringify(this.mululist)));
						
						for (let i = 0; i < this.mululist.length; i++) {
							var item = this.mululist[i];
							if (i == 0) {
								item['show'] = true;
							} else {
								item['show'] = false;
							}
							this.mululist[i] = item;
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
				// 显示输入弹出框
				this.userpasswordkHidden = false;

			},
			submitCancle() {

				this.userpasswordkHidden = true;
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

							this.passwordok = true;
							this.showpass = 0;
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
						'uid': gData.userinfo.id,
						'token': gData.userinfo.token,
						'courseid': courseid
					},
					success: res => {

						if (res.data.data.code == 700) {
							uni.navigateTo({
								url: '../../../pages/login/login',
							});
							return;
						}

						this.INFO = res.data.data.info;
						if (this.INFO[0].content) {


						} else {
						
							// for (let i=0;i<this.INFO.length;i++){
							// 	 var item = this.INFO[i];
							// 	  item.content = '1';
							// 	 item.info = '1';
							// 	 item.userinfo = '1';
							// 	 this.INFO[i] = item;
							// }

						}
						let info = res.data.data.info[0];
						this.ifbuy = res.data.data.info[0].ifbuy;
						this.live_course_bg = info.thumb;

						this.liveInfo = info;
						
						this.teacherInfo = info.userinfo;
						this.paytype = res.data.data.info[0].paytype;
						if (this.paytype == 2) {
							this.passwordok = false;
							this.showpass = 1;
							if (this.ifbuy == 1) {
								this.showpass = 0;
							}
						}
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

				if (this.liveInfo.ifbuy == 1) {
					this.enterlive();
				}
			},
			// 进入直播
			enterlive() {


			},
			entermululive(items) {
				var item = JSON.parse(JSON.stringify(items));
				if (this.showpass != 0) {
					return;
				}

				var newarray = [];
				item['thumb'] = this.live_course_bg;
				newarray.push(item);
				let type = parseInt(item.type);
// 
				if (type < 3 || type == 3) {
					
					
					let gData = app.globalData;
					uni.request({
						url: gData.site_url + 'App.Course.SetLesson',
						method: 'POST',
						data: {
							'uid': gData.userinfo.id,
							'token': gData.userinfo.token,
							'courseid': item.courseid,
							'lessonid': item.id
						},
						success: res => {
					
							// sort unde 套餐 0 内容 1课程2直播
							//1图文2视频3音频 4ppt直播 5视频直播6音频直播 7授课直播（白板）
							if (res.data.data.code == 0) {
								uni.navigateTo({
									url: '../content-detail/content-detail?info=' + encodeURIComponent(JSON.stringify(item)) + '&type=' +
										item.type + '&thumb=' + this.live_course_bg + '&addtime=' + this.liveInfo.add_time,
								});
					
							
							} else {
								uni.showToast({
									title: res.data.data.msg,
									icon: 'none'
								});
							}
						}
					});
					
				
				} else {
					let gData = app.globalData;
					uni.request({
						url: gData.site_url + 'Live.CheckLive',
						method: 'POST',
						data: {
							'uid': gData.userinfo.id,
							'token': gData.userinfo.token,
							'courseid': item.courseid,
							'lessonid': item.id,
							'liveuid': this.liveInfo.uid
						},
						success: res => {

							// sort unde 套餐 0 内容 1课程2直播
							//1图文2视频3音频 4ppt直播 5视频直播6音频直播 7授课直播（白板）
							if (res.data.data.code == 0) {

								if (type == 4 || type == 5 || type == 6 || type == 8) {
									uni.navigateTo({
										url: '../live-info/live-infoplay?liveuid=' + this.liveInfo.uid +
											'&courseid=' + item.courseid + '&lessonid=' + item.id + '&thumb=' + this.live_course_bg,
									});
								} else if (type == 7) {
									if (res.data.data.info[0].islive == 1) {
										uni.showToast({
											title: '白板直播暂未接入',
											icon: 'none'
										});
									} else if (res.data.data.info[0].islive == 2) {
										uni.showToast({
											title: '白板直播暂未接入',
											icon: 'none'
										});
									} else {
										uni.showToast({
											title: '直播未开始',
											icon: 'none'
										})
									}

								}

							} else {
								uni.showToast({
									title: res.data.data.msg,
									icon: 'none'
								});
							}
						},
					});
				}
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
			showdetail(item, index) {
				let isLogin = this.setLogin();
				if(!isLogin) {
					return;
				}
				
				this.lastindex = this.current;
				this.current = index;
				if (item.show == false) {
					item.show = true;
				} else {
					item.show = false;
				}
				this.mululist[index] = item;
				this.$set(this.mululist, index, item);
			},
		}
	}
</script>

<style>
	@import url("/static/css/course_info/course_info.css");
	@import url("/static/common/css/pingjia.css");
page{
	width: 100%;
	height: 100%;
	overflow: hidden;
}
	.packages_sub_sure {
		position: absolute;
		bottom: 20rpx;
		left: 30rpx;
		right: 40rpx;
		text-align: center;
		color: #FFFFFF;
		height: 60rpx;
		line-height: 60rpx;
		border-radius: 30rpx;
		background-color: #FF623E;
	}

	.item2_line {
		left: 20rpx;
		right: 20rpx;
		position: absolute;
		height: 1rpx;
		margin-top: 16rpx;
		background-color: #DCDCDC;
	}

	.item2_num {
		position: absolute;
		color: #969696;
		font-size: medium;
		margin-left: 40rpx;
		margin-top: 15rpx;
	}

	.item2_price {
		position: absolute;
		right: 20rpx;
		margin-top: 5rpx;
		color: #323232;
		font-weight: bold;
	}

	.item2_lession {
		color: #969696;
		margin-left: 80rpx;
		font-size: 22rpx;
		margin-top: 5rpx;
	}

	.item2_name {
		font-weight: bold;
		overflow: hidden;
		height: 60rpx;
		line-height: 1.2em;
		-webkit-line-clamp: 2;
		text-overflow: ellipsis;
		display: -webkit-box;
		-webkit-box-orient: vertical;
		margin-top: 20rpx;
		margin-left: 80rpx;
		width: 70%;

	}

	.item2 {
		height: 160rpx;

	}

	.lianbao_item {
		border: 2rpx solid #F5F5F5;
		position: relative;
		margin-right: 40rpx;
		margin-left: 20rpx;
		border-radius: 16rpx;
		margin-top: 20rpx;

	}

	.lianbao_item_top {
		position: relative;
		height: 140rpx;
		margin-top: 20rpx;
	}

	.item_top_name {
		position: absolute;
		font-weight: bold;
		overflow: hidden;
		height: auto;
		line-height: 1.2em;
		-webkit-line-clamp: 2;
		text-overflow: ellipsis;
		display: -webkit-box;
		-webkit-box-orient: vertical;
		margin-top: 0rpx;
		margin-left: 20rpx;
		width: 70%;
	}

	.item_top_price {
		position: absolute;
		left: 20rpx;
		margin-top: 70rpx;
		color: #FF1B20;
		font-weight: bold;
		/* margin-left: 20rpx; */
	}

	.item_sele2 {
		width: 40rpx;
		height: 40rpx;
		position: absolute;
		right: 20rpx;
		margin-top: 30rpx;
	}

	.item_sele {
		width: 40rpx;
		height: 40rpx;
		position: absolute;
		right: 20rpx;
		margin-top: 40rpx;
	}

	.relate_image1 {
		position: absolute;
		width: 100%;
		height: 140rpx;
		z-index: -1;
		border-radius: 16rpx;
		margin-top: -20rpx;

	}

	.title_des {
		display: flex;
		flex-direction: column;
	}

	.relate_image2 {

		width: 40rpx;
		height: 40rpx;
		position: absolute;
		margin-top: 110rpx;
		z-index: -1;
		left: calc(50%);
	}

	.top_item_price {
		display: flex;
		flex-direction: row;
		font-size: small;
	}

	.top_price {
		position: absolute;
		right: 20rpx;
		margin-top: 15rpx;
		color: #FF1B20;
		font-weight: bold;
	}

	.top_lession {
		color: #969696;
		margin-left: 20rpx;
		font-size: 22rpx;
		margin-top: 5rpx;
	}

	.top_name {
		font-weight: bold;
		overflow: hidden;
		height: auto;
		line-height: 1.2em;
		-webkit-line-clamp: 2;
		text-overflow: ellipsis;
		display: -webkit-box;
		-webkit-box-orient: vertical;
		margin-top: 20rpx;
		margin-left: 20rpx;
		width: 70%;

	}

	.top_item {
		position: absolute;
		border: 2rpx solid #FF623E;
		height: auto;
		left: 20rpx;
		right: 40rpx;
		border-radius: 10rpx;
		margin-top: 20rpx;
	}

	.lianbao_title {

		color: #969696;
		margin-top: 200rpx;
		margin-left: 20rpx;
	}

	.dangqian_title {
		color: #969696;
		margin-top: 40rpx;
		margin-left: 20rpx;
	}

	.add_packages {
		position: fixed;
		width: 100%;
		bottom: 0rpx;
		background-color: #FFFFFF;
		height: 70%;
		border-radius: 40rpx;
	}

	.packages {
		position: absolute;
		width: 100%;
		top: 0rpx;
		bottom: 100rpx;
		background-color: #FFFFFF;
		border-radius: 40rpx;
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
		color: #64D3AD;
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

	.muluimage {
		width: 20px;
		height: 20px;
		position: absolute;
		right: 30upx;
		margin-top: 20upx;

	}

	.mulutext {
		position: absolute;
		font-size: medium;
		left: 20upx;
		color: #000000;
		text-align: center;
		line-height: 2.0em;
	}

	.muluitem {
		height: 60rpx;
		background-color: #F7F9FC;
	}

	.mululine_d {
		position: absolute;
		width: 100%;
		background-color: #F5F5F5;
		height: 1rpx;
		margin-top: 30rpx;
	}

	.mululine {
		width: 100%;
		background-color: #F5F5F5;
		height: 1rpx;
		margin-top: 40rpx;
	}

	.line {
		width: 100%;
		height: 1rpx;
		background-color: #F5F5F5;
	}

	.listdetail {
		margin-top: 0rpx;
		background-color: #FFFFFF;
		height: 100rpx;
	}

	.liveintime {
		position: absolute;
		color: #646464;
		margin-left: 80upx;
		font-size: smaller;
	}

	.livein {
		position: absolute;
		font-size: smaller;
		right: 30rpx;
		margin-top: 20upx;
		color: #64D3AD;
	}

	.course_t {
		margin-left: 20rpx;
		margin-top: 10rpx;
		width: 30rpx;
		height: 30rpx;
	}

	.course_t_d {
		margin-left: 20rpx;
		margin-top: 40rpx;
		width: 30rpx;
		height: 30rpx;
	}

	.display_row {
		display: flex;
		flex-direction: row;
	}

	.course_tt {
		margin-top: 35rpx;
		padding-left: 20rpx;
		height: 40rpx;
		line-height: 40rpx;
		text-align: left;
	}

	.course_ttt {
		margin-top: 15rpx;
		padding-left: 20rpx;
		height: 40rpx;
		line-height: 40rpx;
		text-align: left;
	}
.islast_tt {
		color: #64D3AD;
		font-size: 18rpx;
		border: 2rpx solid #64D3AD;
		height: 30rpx;
		width: 80rpx;
		text-align: center;
		border-radius: 7rpx;
		margin-top: 37rpx;
		margin-left: 15rpx;
	}
	.islast {
		color: #64D3AD;
		font-size: 18rpx;
		border: 2rpx solid #64D3AD;
		height: 30rpx;
		width: 80rpx;
		text-align: center;
		border-radius: 7rpx;
		margin-top: 17rpx;
		margin-left: 15rpx;
	}
</style>
