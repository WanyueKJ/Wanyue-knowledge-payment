<template>
	<view>
		<view class="line"></view>
		<view class="yijian-wrap">
			<textarea class="yijian-txt" v-model="yijian" placeholder="请输入您的反馈内容(最多500字)" placeholder-style="padding-top: 10rpx; font-size: 26rpx; color:#969696;" />
			<image @click="photo" class="img-wrap" :src="imgPath" mode="aspectFill"></image>
			<view :enabled="false" :class="{ opatity: enabled}" class="submit-wrap" @click="subyijian">
				提交
			</view>	
		</view>
	</view>
</template>

<script>
	const app = getApp();
	import qiniuUploader from '../../qiniuUploader.js';
	export default {
		data() {
			return {
				imgPath: '', //意见图片路径
				isUpload: false, //是否上传
				yijian: '',
				QiNiutoken:''
			}
		},
		computed:{
			enabled: function(){
				if(this.yijian == ''){
					return true;
				}
				return false;
			},
			
		},
		onLoad() {
		   this.imgPath = '../../static/creatRoomThumb.png';
		   
		},
		methods: {
			
			//上传
			photo(){
				uni.chooseImage({
				    count: 1, //默认9
				    sizeType: ['original', 'compressed'], //可以指定是原图还是压缩图，默认二者都有
				    sourceType: ['album', 'camera'], //从相机/相册选择
				    success: function (res) {

						if(app.globalData.qiniuimageurl == '') {
							uni.showToast({
								title: '请配置七牛云上传地址',
								icon:'none'
							});
							return;
						}

						uni.request({
							url: getApp().globalData.site_url + 'Upload.GetQiniuToken',
							method: 'POST',
							data: {
								'uid': getApp().globalData.userinfo.id,
								'token': getApp().globalData.userinfo.token
							},
							success: res => {
								uni.hideLoading();
								if (res.data.data.code == 0) {
									this.QiNiutoken = this.decypt(res.data.data.info[0].token);
								uni.showLoading({
									title: '',
									mask: false
								});
		
								var path = res.tempFilePaths[0];
								var name = 'UNIAPP' + this.getTime() + 'userHeader.png';
								
										qiniuUploader.upload(path, res => {
											uni.hideLoading();
											this.imgPath = res.imageURL;
										}, error => {
									uni.hideLoading();
									uni.showToast({
										title: '上传失败，请重试',
										icon:'none'
									});
										}, {
											region: 'ECN',
											domain: app.globalData.qiniuimageurl,
											key: name,
											uptoken: this.QiNiutoken,
										});					
								}
							}
						});		
					  }
				    });											 
			},
			
			getTime() {
				let yy = new Date().getFullYear();
				let mm = new Date().getMonth() + 1;
				let dd = new Date().getDate();
				let hh = new Date().getHours();
				let mf = new Date().getMinutes() < 10 ? '0' + new Date().getMinutes() : new Date().getMinutes();
				let ss = new Date().getSeconds() < 10 ? '0' + new Date().getSeconds() : new Date().getSeconds();
				return yy + mm + dd + hh + mf + ss;
			},
			decypt(code) {
				var newcode = '';
				var str = '1ecxXyLRB.COdrAi:q09Z62ash-QGn8VFNIlb=fM/D74WjS_EUzYuw?HmTPvkJ3otK5gp&';
				for (var i = 0; i < code.length; i++) {
					var codeIteam = code[i];
					for (var j = 0; j < str.length; j++) {
						var stringIteam = str[j];
						if (codeIteam == stringIteam) {
							if (j == 0) {
								newcode += str[str.length - 1];
							} else {
								newcode += str[j - 1];
							}
						}
					}
				}
				return newcode;
			},
			
			subyijian(){
				if(this.yijian == '') {
					return;
				}
				let gData = app.globalData;
				uni.request({
					url:  gData.site_url + 'Feedback.Add',
					method: 'GET',
					data: {
						'uid': gData.userinfo.id,
						'token': gData.userinfo.token,
						'thumb': this.imgPath,
					    'content': this.yijian,
					},
					success: res => {
						uni.showToast({
							icon: 'none',
							title: res.data.data.msg
						});
						
						if(parseInt(res.data.data.code) === 0) {
							setTimeout(function(){
							uni.navigateBack({
								delta: 1
							});
							}, 500);
						}
					},
					fail: () => {
						uni.showToast({
							icon: 'none',
							title: '网络错误'
						});
					},
				});
			}
		}
	}
</script>

<style>
	.line{
		width: 100%;
		height: 1rpx;
		background-color: #F0F0F0;
	}
	.yijian-wrap {
		width: 92%;
		height: 400rpx;
		margin: 0 auto;
		background-color: #F0F0F0;
		
	}
	
	.yijian-txt {
       
		margin-top: 20rpx;
		padding-top: 20rpx;
        margin-left: calc(2%);
		width: 96%;
		height: 100%;
	}
	
	/* 相册 */
	.img-wrap {
		margin-top: 45rpx;
		width: 150rpx;
		height: 150rpx;
		line-height: 150rpx;
		text-align: center;
		background-color: #F2F6FC;
		position: relative;
	}
	
	
	.gai {
		left: 0;
		top: 0;
	}
	
	.jiahao-txt {
		font-size: 60rpx;
		color: #969696;
	}
	
	/* 提交 */
	.submit-wrap {
		height: 80rpx;
		line-height: 80rpx;
		width: 90%;
		color: #FFFFFF;
		font-size: 30rpx;
		text-align: center;
		border-radius: 37rpx;
		position: fixed;
		left: calc(4.8%);
		bottom: 50rpx;
		background: linear-gradient(to right, #3D98FF, #7A76FA);	
	}
	
	.opatity {
		opacity: 0.5; 
	}
	
	
</style>
