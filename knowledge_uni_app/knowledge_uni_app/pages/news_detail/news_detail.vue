<template>
	<view class="page">
		
		<!-- #ifndef H5 -->
		<!-- <uni-nav-bar :border="false" @clickLeft="back" left-icon="back" title="新闻">
			
		</uni-nav-bar> -->
		<!-- #endif -->
		
		
		<view class="video-wrap3">
			<image :src="newsInfo.thumb" class="video-wrap">
			</image>
		</view>

		<view class="cdetail-all-wrap">
			<view class="content-title">{{newsInfo.name}}</view>
			<view class="content-time">{{newsInfo.addtime}}</view>
			<view class="line"></view>
			<view class="content-wrap">
				<rich-text class="content" :nodes="newsInfo.content"></rich-text>
			</view>

		</view>
	</view>
</template>

<script>
	import imtAudio from '@/components/imt-audio/imt-audio.vue';
	import uniNavBar from '@/components/uni-ui/uni-nav-bar/uni-nav-bar.vue';
	const app = getApp();

	export default {
		components: {
			imtAudio,
			uniNavBar
		},
		data() {
			return {
				newsInfo: {},
				name: '',
				adddtime: '',
				content: '',
				des: '',
				url: '',
				type: '',
				thumb: '',
				duration: '',
				currentTime: 0,
				videoContext: '',
				buttonimage: '',
				status: 1,
				start: '',
				end: ''

			}
		},
		onLoad(option) {
			if(option.news_id != undefined) {
				this.getNewsInfo(option.news_id);
			} 
			if(app.globalData.userinfo == '') {
				uni.navigateTo({
					url: '../login/login',
				});
				return;
			}
			
		},
		methods: {
			back() {
				uni.navigateBack({
					delta: 1
				});
			},
			getNewsInfo(nid) {
				let gData = app.globalData;
				uni.request({
					url: gData.site_url + 'Course.GetNewsDetail',
					method: 'GET',
					data: {
						// uid token courseid
						'uid': gData.userinfo.id,
						'token': gData.userinfo.token,
						'newsid': nid
					},

					success: res => {
						if (res.data.data.code == 700) {
							uni.navigateTo({
								url: '../login/login',
								success: res => {},
								fail: () => {},
								complete: () => {}});
							return;
						} else if(res.data.data.code == 0) {
							let info = res.data.data.info;
							this.newsInfo = info;

						}

					},
				});


			}

		}
	}
</script>

<style>
	@import url('./news_detail.css');
</style>
