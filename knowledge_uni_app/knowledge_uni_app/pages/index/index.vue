
<template>
	<!-- 外层包装 -->
	<view class="page">
		<uni-nav-bar status-bar="true" :border="false">
				<view slot="left">
					<view class="check_class">
						<text>万岳知识付费</text>
					</view>
				</view>

				<view class="search-all-wrap">
					<view class="search-wrap" @click="search">
						<text class="iconfont icon-faxianchaxun"></text>
						<input disabled="true" class="uni-input" placeholder="搜索课程, 老师" placeholder-style="color:#C7C7C7; font-size:20rpx;" />
					</view>
				</view>
				<view @click="shopcar" slot="right" style="position: relative; right: -30rpx;">
					<view class="new_gouwuche">
						<image class="gowucheimage" src="../../static/gouwuche.png" mode="aspectFit">
						</image>
						<template v-if="nums != 0">
							<view class="gouwunums">
								<view class="carnums">{{nums}}</view>
							</view>
						</template>
					</view>
				</view>

			</uni-nav-bar>

			<scroll-view class="index-all-wrap" scroll-y="true" :style="'height:' + scrollH+'rpx;'" >
				<!-- 轮播图 -->
				

				<view class="index-banner-wrap">
					<swiper class="index-banner swiper" circular="false" :indicator-dots="indicatorDots" :autoplay="autoplay" :interval="interval"
					 :duration="duration">
						<swiper-item @click="bannerTo(item)" v-for="(item, index) in bannerList" :key="item.id">
							<image class="index-banner-img"  src="https://demo.sdwanyue.com/upload/admin/20220905/d21c4b1e38739f731f32f2669f2d1eb6.png" mode="aspectFill"></image>
						</swiper-item>
					</swiper>
				</view>
				

				<!-- 课程分类 -->

				<view class="index-course-wrap">
					<view @click="getCourseByClass(item.id, item.name)" class="know-item course-item scroll-view-item_H" v-for="(item, index) in course_class"
					 :key="item.id">
						<image :src="item.thumb" mode="aspectFit"></image>
						<text>{{item.name}}</text>
					</view>
				</view>

				<!-- 新闻资讯 -->
				<view @click="openQidai" class="news-wrap">
					<image class="news-wrap-title-img" src="../../static/images/news_he.png" mode="aspectFit"></image>
					<text class="news-shu">|</text>
					<swiper class="swiper-wrap" :vertical="true" :autoplay="true" :interval="3000" :duration="1000">
						<swiper-item  v-for="(item, index) in news" :key="index" class="swiper-item">
							<text class="news-title">{{item.name}}</text>
						</swiper-item>
					</swiper>
					<text class="news-arow iconfont icon-jinrujiantou"></text>
				</view>
				
				<!-- 广告位图片 -->

				<view @click="guanggao" class="index-banner-wrap2">
					
					<image class="index-banner-img2"  src="../../static/images/huodong.png" mode="aspectFill"></image>
			
				</view>

				<!-- 课程列表区 -->
				<view class="course-list-wrap">
					<!-- 热门精选-->
					<view class="hot-all-wrap">
						<view class="hot-title-wrap">
							<!-- 标题  -->
							<view class="icon-title-wrap">
								<image class="hot-title-img" mode="aspectFit" src="../../static/images/hot_huo.png"></image>
								<text class="hot-title">热门精选</text>
							</view>
						</view>
						<view class="hot-img-wrap">
							<block v-if="hotlist != undefined">
								<image v-if="hotlist.length > 0" class="hot-left-img" :src="hotlist[0].thumb" mode="aspectFill" @click="viewContentInfo(hotlist[0].id,hotlist[0].paytype)"></image>
								<image v-if="hotlist.length >= 2" class="hot-right-top-img" :src="hotlist[1].thumb" mode="aspectFill" @click="viewContentInfo(hotlist[1].id,hotlist[1].paytype)"></image>
								<image v-if="hotlist.length >= 3" class="hot-right-bottom-img" :src="hotlist[2].thumb" mode="aspectFill" @click="viewContentInfo(hotlist[2].id,hotlist[2].paytype)"></image>
							</block>
						</view>

					</view>

					<!-- 直播课堂 -->
					<view class="course-list-wrap">
						<view class="live-title-wrap live-ketang-title-wrap">
							<!-- 标题 更多 -->
							<view class="icon-title-wrap">
								<image class="hot-title-img" mode="aspectFit" src="../../static/images/lve_ketang_icon.png"></image>
								<text class="live-title live-ketang-title">推荐内容</text>
							</view>
							<text @click="coursemore" class="live-more live-ketang-more">更多&nbsp;&nbsp;<text class="iconfont icon-jinrujiantou c-more-btn-icon"></text></text>
						</view>

						<!-- 直播课堂列表 -->
						<view class="live-ketang-wrap">
							<scroll-view class="scroll-view_H" scroll-x="true" @scroll="scroll" scroll-left="120">
								<view @click="viewLiveInfo(item.id,item.paytype)" class="live-ketang-item scroll-view-item_H" v-for="(item, index) in live_info"
								 :key="item.id">
									<image class="live-ketang-img" :src="item.thumb" mode="aspectFill"></image>
									<view class="live-ketang-name">{{item.name}}</view>

									<view class="live-status living-status" v-if="item.islive == 1">
										{{item.lesson}}
									</view>
									<view class="live-status" v-else>
										{{item.lesson}}
									</view>
									<view class="live-teacher-price live-ketang-t-price">
										<image class="live-ketang-teacher-avatar" :src="item.avatar" mode="aspectFill"></image>
										<text class="teacher-ketang-name">{{item.user_nickname}}</text>
										<view class="live-ketang-price-wrap">
											<text v-if="item.paytype == 0" class="free-ketang live-ketang-price">免费</text>
											<text v-if="item.paytype == 2" class="pass live-ketang-price">密码</text>
											<text v-if="item.paytype ==1" class="numPrice live-ketang-price">
												{{'¥' + item.payval}}
											</text>
										</view>
									</view>

								</view>
							</scroll-view>
						</view>

					</view>


				<view class="course-list-wrap content-list-wrap">
					<!-- 精选内容 -->
					<view class="la-wrap">
						<view class="live-title-wrap live-content-title-wrap">
							<!-- 标题 更多 -->
							<view class="icon-title-wrap">
								<image class="hot-title-img" mode="aspectFit" src="../../static/images/jingxuan_content.png"></image>
								<text class="live-title live-content-title">精选内容</text>
							</view>
							<text @click="contentmore" class="live-more content-more-btn">更多&nbsp;&nbsp;<text class="iconfont icon-jinrujiantou c-more-btn-icon"></text></text>
						</view>
					</view>

					<view class="course-wrap">
						<view @click="viewContentInfo(item.id,item.paytype)" class="live-list live-list-know" v-for="(item, index) in list_info" :key="index">
							<view class="live-list-img-wrap">
								<image class="live-list-img" :src="item.thumb" mode="aspectFill"></image>
								<text class="course-title-icon">内容</text>
							</view>
							<view class="live-list-info">
								<view class="live-c-title">{{item.name}}</view>
								<view class="live-status-tuwen">
									{{item.lesson}}
								</view>
								<view class="live-teacher-price">
									<image class="live-teacher-avatar" :src="item.avatar" mode="aspectFill"></image>
									<text class="teacher-name">{{item.user_nickname}}</text>
									<view class="price-wrap">
										<text v-if="item.paytype == 0" class="free">免费</text>
										<text v-if="item.paytype == 2" class="pass">密码</text>
										<text v-if="item.paytype ==1" class="numPrice">
											{{'¥' + item.payval}}
										</text>
									</view>
								</view>
							</view>
						</view>
					</view>
					<template v-if="kongkong4 == true">
						<view :class="{xiangziwrap : (kongkong4 == true)}">
							<image class="xiangzi" src="../../static/images/xiangzi.png" mode="aspectFill"></image>

							<text :class="{xiangzi_txt : (kongkong4 == true)}">暂无数据</text>
						</view>
						<view class="xiangzispace"></view>
					</template>
				</view>
			</view>

			</scroll-view>


  </view>
</template>

<script>
	// 引入模板
	import swiperTabHead from "@/components/common/swiper-tab-head.vue";
	import uniPopup from '@/components/uni-ui/uni-popup/uni-popup.vue';
	import uniNavBar from '@/components/uni-ui/uni-nav-bar/uni-nav-bar.vue';
	const app = getApp();

	export default {
		components: {
			swiperTabHead,
			uniPopup,
			uniNavBar,
		},
		data() {
			return {
				onReview: '',
				//顶部选项卡
				tabIndex: 0,
				scrollH: 0,
				swiperheight: 0, //高度
				bannerList: {},
				// 轮播图数据
				background: ['color1', 'color2', 'color3'],
				indicatorDots: true,
				autoplay: true,
				interval: 2000,
				duration: 500,
				live_demo: [],
				currentGradeClass: "",
				currentGradeClassId: "",
				scrollTop: 0,
				old: {
					scrollTop: 0
				},
				course_class: {},
				packs: {},
				course: {},
				live_info: {}, //直播课堂列表
				list_info: {}, //内容列表
				hotlist:[],//热门精选
				nums: '',
				promptType: '',
				kongkong1: false,
				kongkong2: false,
				kongkong3: false,
				kongkong4: false,
				news: {}
			}
		},
		// 监听导航按钮点击事件
		onNavigationBarButtonTap() {
			this.navigateTo({
				url: '../add-input/add-input'
			})
		},
		onShow: function() {
			// #ifdef APP-PLUS
			plus.screen.unlockOrientation(); //解除屏幕方向的锁定，但是不一定是竖屏；
			plus.screen.lockOrientation('portrait-primary'); //锁死屏幕方向为竖屏
			// #endif
			this.getnums();
		},
		onReady() {
			this.getnums();
			let that = this;
			uni.getSystemInfo({
				success: function(res) {
					that.scrollH = res.windowHeight * 750 / res.windowWidth;
					// #ifdef MP-WEIXIN
					that.scrollH = res.windowHeight * 750 / res.windowWidth - parseInt(res.safeArea.top) - 30;
					// #endif
				}
			});
		},
		onLoad() {

			var that = this;
			that.getData();
			that.getNews();

			uni.getSystemInfo({
				success: (res) => {
					let height = res.windowHeight - uni.upx2px(100);
					this.swiperheight = height;
				}
			});
		},
		methods: {
			checktoken(successFun) {
				if (app.globalData.userinfo.token == undefined) {
					successFun(0);
				} else {
					uni.request({
						url: app.globalData.site_url + 'User.Iftoken',
						method: 'POST',
						data: {
							'uid': app.globalData.userinfo.id,
							'token': app.globalData.userinfo.token
						},
						success: res => {
							if (res.data.data.code == 700) {
								uni.showModal({
									title: res.data.data.msg,
									content: '',
									showCancel: true,
									cancelText: '取消',
									confirmText: '去登录',
									confirmColor: '#38DAA6',
									success: res => {
										if (res.confirm) {
											uni.navigateTo({
												url: '../login/login',
											});

										}
									},
									fail: () => {

									},
								});
							}
							successFun(res.data.data.code);
						},
						fail: () => {

						},
					});
				}
			},
			openQidai() {
				uni.navigateTo({
					url: '../news/news',
				});
			},
			guanggao() {
				uni.navigateTo({
					url: '../news/news',
				});
			},
			prompt(type) {
				this.promptType = type;
			},
			onConfirm: function(e) {

				let _cost = e;
				if (_cost == '') {
					uni.showToast({
						title: '请输入验证码',
						icon: 'none'
					});

					return;
				} else {
					uni.request({
						url: app.globalData.site_url + "Agent.SetAgent",
						method: 'POST',
						data: {
							'uid': app.globalData.userinfo.uid,
							'token': app.globalData.userinfo.token,
							'code': this.cost,
						},
						success: (res) => {

							if (res.data.data.code == 0) {
								this.prompt('');
							}
							uni.showToast({
								title: res.data.data.msg,
								icon: 'none'
							});
						}

					});

				}
			},
			onCancel: function(e) {
				this.prompt('');
			},
			getnums() {
				if (app.globalData.userinfo == '') {
					return;
				}
				let gData = app.globalData;
				uni.request({
					url: gData.site_url + 'Cart.GetNums',
					method: 'POST',
					data: {
						'uid': gData.userinfo.id,
						'token': gData.userinfo.token,
					},
					success: res => {
						if (res.data.data.code == 0) {
							this.nums = res.data.data.info[0].nums;
						}
					},
				});
			},
			// 根据分类查看课程列表
			getCourseByClass(courseCid, courseCname) {

				uni.navigateTo({
					url: '../course_class_list/course_class_list?course_cid=' + courseCid + '&course_cname=' + courseCname,
				});

			},
			//获取新闻列表
			getNews() {
				let that = this;
				let gData = app.globalData;
				uni.request({
					url: gData.site_url + 'Knowledge.getNews',
					method: 'GET',
					success: res => {
						let data = res.data.data;
						if(data.code == 0 && data.info.length > 0) {
							that.news = res.data.data.info;
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

			},
			//获取数据
			getData() {
				//获取分类
				uni.request({
					url: app.globalData.site_url + 'Homeknowledge.GetIndex',
					data: {
						'gradeid': app.globalData.grade_class.id,
					},
					success: (res) => {
						// live是直播, list是内容
						let data = res.data.data;
						if (parseInt(data.code) !== 0 || data.info.length < 1) {
							this.kongkong1 = true;
							this.kongkong2 = true;
							this.kongkong3 = true;
							this.kongkong4 = true;
							return;
						}
						this.course_class = data.info[0].courseclass;
						app.globalData.course_class = data.info[0].courseclass;
						//填充banner和分类图标
						this.bannerList = data.info[0].silide;
						//填充直播和内容
						this.course = data.info[0].course;
						this.live_info = data.info[0].live;
						this.list_info = data.info[0].list;
						this.hotlist = data.info[0].hotlist;

						if (this.course != undefined && this.course.length == 0) {
							this.kongkong2 = true;
						}
						if (this.live_info != undefined && this.live_info.length == 0) {
							this.kongkong3 = true;
						}
						if (this.list_info != undefined && this.list_info.length == 0) {
							this.kongkong4 = true;
						}
					},
					fail() {
						this.kongkong1 = true;
						this.kongkong2 = true;
						this.kongkong3 = true;
						this.kongkong4 = true;
					}
				});

			},
			//点击切换导航
			tabtap(index) {
				this.tabIndex = index;
			},
			tabChange(e) {
				this.tabIndex = e.detail.current;
			},
			//官方滚动方法
			scroll: function(e) {
				this.old.scrollTop = e.detail.scrollTop
			},
			goTop: function(e) {
				this.scrollTop = this.old.scrollTop
				this.$nextTick(function() {
					this.scrollTop = 0
				});
				uni.showToast({
					icon: "none",
					title: "纵向滚动 scrollTop 值已被修改为 0"
				})
			},
			bannerTo(item) {

				uni.navigateTo({
					url: '../about/banner?url=' + encodeURIComponent(JSON.stringify(item.url)) + '&title=' + item.title,
				});
			},
			search() {
				uni.navigateTo({
					url: "../search/search"
				})
			},
			shopcar() {
				if (app.globalData.userinfo == '') {
					uni.navigateTo({
						url: '../login/login'
					})
					return;
				}

				uni.navigateTo({
					url: '../shop-car/shop-car',
				});
			},
			// 查看大班课(语音、PPT、视频直播)内容详情
			viewLiveInfo(liveCourseId, liveCoursetype) {
				uni.navigateTo({
					url: '../../packageB/pages/live_course_info/live_course_info?courseid=' + liveCourseId + '&paytype=' +
						liveCoursetype,
				});
			},

			viewContentInfo(contentCourseId, contentCoursetype) {
				uni.navigateTo({
					url: '../../packageB/pages/content-info/content-info?courseid=' + contentCourseId + '&paytype=' +
						contentCoursetype,
				});
			},

			viewCourseInfo(contentCourseId, contentCoursetype) {
				uni.navigateTo({
					url: '../../packageB/pages/courseinfo/courseinfo?courseid=' + contentCourseId + '&paytype=' + contentCoursetype,

				});
			},

			viewFeaturedInfo(contentCourseId) {
				uni.navigateTo({
					url: '../../packageB/pages/tancaninfo/taocaninfo?courseid=' + contentCourseId,

				});
			},
			// 更多大班课
			livemore() {

				uni.navigateTo({
					url: '../live-more/live-more',
				});
			},
			// 更多内容
			contentmore() {
				uni.navigateTo({
					url: '../content-more/content-more',
				});
			},

			//好课推荐
			coursemore() {

				uni.navigateTo({
					url: '../live-more/live-more',
				});
			}
		}
	}
</script>

<style>
	@import url("/static/css/review.css");
	@import url("/static/css/index.css");
	@import url("/static/css/course_list.css");

	.check_class {
		color: #2C62EF !important;
		font-size: 34rpx;
		font-weight: bold;
		display: inline-block;
		width: 230rpx;
	}
	/deep/ .uni-navbar--fixed {
		width: 96%;
		height: 100rpx;
		padding-top: 30rpx;
		/* #ifdef MP-WEIXIN*/
		padding-top: 140rpx;
		/* #endif */
		position: fixed;
		top: 0;
		left: 6rpx;
		z-index: 999;
	}

	.index-banner-wrap {
		overflow: hidden;
		transform: translateY(0);
		/* margin-top: 55rpx; */
	}
	.index-banner-wrap2 {
		overflow: overlay;
		transform: translateY(0);
		margin-top: 20rpx;
		height: 240rpx;
		
		

	}
	.index-banner-wrap2 .index-banner-img2  {
	
		height: 90%;
		display: unset;
		
	
	}

	.s-all-wrap {
		position: relative;
	}

	.search-all-wrap {
		position: absolute;
		margin-top: 0rpx;
		right: 130rpx;
		left: 220rpx;
		width: 400rpx;
		height: 48rpx;
	}

	.search-wrap {
		width: 100%;
		height: 100%;
		line-height: 48rpx;
		border-radius: 30rpx;
		margin-left: 20rpx;
		padding-left: 20rpx;
		background-color: #F5F5F5;
		float: left;
	}

	.search-wrap text,
	.search-wrap input {
		float: left;
		background-color: #F5F5F5;
		height: 100%;
		padding: 0;
	}

	.search-wrap text {
		margin-right: 20rpx;
		color: #C7C7C7;
	}

	.search-wrap input {
		width: 70%;
	}

	.new_gouwuche {
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
		margin-top: 15rpx;
	}

	.carnums {
		width: 26rpx;
		height: 26rpx;
		font-size: 20rpx;
		color: #FFFFFF;
		text-align: center;
		line-height: 26rpx;
	}

	.index-course-wrap .know-item {
		width: 118rpx;
		margin-right: 27rpx;
	}

	.index-course-wrap .know-item:nth-child(5n) {
		margin-right: 0 !important;
	}

	.live-ketang-img {
		display: inline-block;
		width: 295rpx;
		height: 214rpx;
		background-color: green;
	}

	/deep/.uni-scroll-view ::-webkit-scrollbar {
		 /* 隐藏滚动条，但依旧具备可以滚动的功能 */
		 display: none;
		 width: 0;
		 height: 0;
		 color: transparent;
		 background: transparent;
	}

	/deep/::-webkit-scrollbar {
		 display: none;
		 width: 0;
		 height: 0;
		 color: transparent;
		 background: transparent;
	}

	.price-wrap {
		right: 10rpx !important;
	}

	.live-list-know {
		padding-left: 0 !important;
	}


	.live-ketang-name {
		padding-left: 0 !important;
		overflow: hidden;
		text-overflow: ellipsis;
		white-space: nowrap;
	}

	.live-c-title {
		line-height: 38rpx;
	}

	.news-wrap {
		display: flex;
		align-items: center;
	}

	.news-title {
		display: inline-block;
		width: 100%;
		overflow: hidden;
		text-overflow: ellipsis;
	    white-space: nowrap;
	}

	.swiper-wrap {
		width: 68%;
		height: 70rpx;
		line-height: 70rpx;
	}

	.news-arow {
		position: absolute !important;
		right: 22rpx !important;
	}



</style>
