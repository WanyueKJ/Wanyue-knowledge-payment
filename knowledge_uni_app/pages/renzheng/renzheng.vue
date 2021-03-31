<template>
	<view>

		<view class="title">个人信息</view>
		<view class="shuru">
			<view v-for="(item,index) in inputs">
				<input :id="index" @input="inputing" class="input" :placeholder="item" />
				<view class="line"></view>
			</view>
		</view>
		<view class="all_photo">
			<view v-for="(item,index) in livephotos" class="sub_photo">
				<template v-if="imagegroup[index].length>0">
					<image @click="addimage(index)" :src="imagegroup[index]" class="photos" mode="aspectFit"></image>
				</template>
				<template v-else>
					<image @click="addimage(index)" src="../../static/photo.png" class="photos" mode="aspectFit"></image>
				</template>
				<view class="photo_title">{{item}}</view>
			</view>
		</view>
		<view @click="submit" class="submit">提交</view>
	</view>
</template>

<script>
	import qiniuUploader from '../../qiniuUploader.js';
	export default {
		data() {
			return {
				inputs: ['姓名', '手机号', '身份行号'],
				livephotos: ['身份证正面照', '身份证背面照', '手持身份证照'],
				imagegroup: [
					'', '', ''
				],
				name: '',
				phonenumber: '',
				IDNumber: '',
				uploadimageGroup: {}
			}
		},
		onLoad() {


		},
		methods: {
			inputing(event) {
				// console.log(event);
				var ID = event.currentTarget.id;
				if (ID == 0) {
					this.name = event.detail.value;
				}
				if (ID == 1) {
					this.phonenumber = event.detail.value;
				}
				if (ID == 2) {
					this.IDNumber = event.detail.value;
				}
			},
			addimage(index) {
				var that = this;
				uni.chooseImage({
					count: 1,
					success(res) {
						// console.log(res.tempFilePaths[0]);
						var path = res.tempFilePaths[0];
						that.imagegroup[index] = path;
						that.$set(that.imagegroup, index, path);
						console.log(that.imagegroup);
					}
				});
			},
			submit() {
				if (this.name.length == 0) {
					uni.showToast({
						title: '请输入姓名',
						icon: 'none'
					});
					return;
				}
				if (this.phonenumber.length == 0) {
					uni.showToast({
						title: '请输入手机号',
						icon: 'none'
					});
					return;
				}
				if (this.phonenumber.length != 11) {
					uni.showToast({
						title: '手机号格式不对',
						icon: 'none'
					});
					return;
				}
				if (this.IDNumber.length == 0) {
					uni.showToast({
						title: '请输入身份证号',
						icon: 'none'
					});
					return;
				}
				if (this.imagegroup.length != 3) {
					uni.showToast({
						title: '信息不完善',
						icon: 'none'
					});
					return;
				}
				uni.showLoading({
					title: '提交中...',
					mask: false
				});
				let gData = getApp().globalData;
				var that = this;
				uni.request({

					url: gData.site_url + 'Upload.GetQiniuToken',
					method: 'POST',
					data: {
						'uid': getApp().globalData.userinfo.id,
						'token': getApp().globalData.userinfo.token
					},
					success: res2 => {
						uni.hideLoading();
						if (res2.data.data.code == 0) {
							var QiNiutoken = that.decypt(res2.data.data.info[0].token);
							for (let i = 0; i < that.imagegroup.length; i++) {
								var name = ';'
								setTimeout(() => {
									qiniuUploader.upload(that.imagegroup[i], res => {

										if (i == 0) {
											name = 'UNIAPP_AUTH_front_view' + i + i+ i + that.getTime() + 'auth.png';
											that.uploadimageGroup.front_view = res.imageURL;
										}
										if (i == 1) {
											name = 'UNIAPP_AUTH_back_view' + i + i+ i + that.getTime() + 'auth.png';
											that.uploadimageGroup.back_view = res.imageURL;
										}
										if (i == 2) {
											name = 'UNIAPP_AUTH_handset_view' + i + i+ i + that.getTime() + 'auth.png';
											that.uploadimageGroup.handset_view = res.imageURL;
											console.log('三张图上传成功');
											that.SetAuth();
											
										}

									}, error => {
										
									}, {
										region: 'ECN',
										domain: getApp().globalData.qiniuimageurl,
										key: name,
										uptoken: QiNiutoken,
									});
								}, 500);
							}
						} else {
							uni.hideLoading();
						}
					},
					fail() {
						uni.hideLoading();
						uni.showToast({
							title: '提交失败',
							icon: 'none'
						});
					},
				});
			},
			SetAuth() {
		
				
				uni.showLoading({
					title: '提交中...',
					mask: false
				});
				let gData = getApp().globalData;
				var that = this;

				// this.uploadimageGroup.uid = getApp().globalData.userinfo.id;
				// this.uploadimageGroup.token = getApp().globalData.userinfo.token;
				// this.uploadimageGroup.name = this.name;
				// this.uploadimageGroup.mobile = this.phonenumber;
				// this.uploadimageGroup.cer_no = this.IDNumber;

				uni.request({

					url: gData.site_url + 'Auth.SetAuth',
					method: 'POST',
					data: {
						'uid': getApp().globalData.userinfo.id,
						'token': getApp().globalData.userinfo.token,
						'name': that.name,
						'mobile': that.phonenumber,
						'cer_no': that.IDNumber,
						'front_view': that.uploadimageGroup.front_view,
						'back_view': that.uploadimageGroup.back_view,
						'handset_view': that.uploadimageGroup.handset_view
					},
					success: res => {
						uni.hideLoading();
						if (res.data.data.code == 0) {
							console.log(res);
						} else {
							uni.hideLoading();
						}
						uni.showToast({
							title: res.data.data.msg,
							icon:'none'
						});
						setTimeout(()=>{
							uni.navigateBack({
								delta: 1
							});
						});
					},
					fail() {
						uni.hideLoading();
						uni.showToast({
							title: '提交失败',
							icon: 'none'
						});
					},
				});
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
			getTime() {
				let yy = new Date().getFullYear();
				let mm = new Date().getMonth() + 1;
				let dd = new Date().getDate();
				let hh = new Date().getHours();
				let mf = new Date().getMinutes() < 10 ? '0' + new Date().getMinutes() : new Date().getMinutes();
				let ss = new Date().getSeconds() < 10 ? '0' + new Date().getSeconds() : new Date().getSeconds();
				return yy + mm + dd + hh + mf + ss;
			}
		}
	}
</script>

<style>
	.submit {
		position: absolute;
		margin-top: 100rpx;
		background-color: #64D3AD;
		color: #FFFFFF;
		width: 70%;
		left: calc(15%);
		text-align: center;
		height: 60rpx;
		line-height: 60rpx;
		border-radius: 30rpx;
	}

	.sub_photo {
		width: 33%;
		background-color: #FFFFFF;
	}

	.all_photo {
		display: flex;
		flex-direction: row;
		margin-top: 40rpx;
		background-color: #FFFFFF;
		justify-content: space-between;
		flex-wrap: wrap;
	}

	.photo_title {
		height: 40rpx;
		text-align: center;
	}

	.photos {
		margin-top: 20rpx;

		width: 100%;
		height: 120rpx;
	}

	.line {
		height: 2rpx;
		width: 96%;
		margin-left: calc(2%);
		background-color: #E6E6E6;
	}

	.shuru {
		margin-top: 20rpx;
	}

	.title {
		margin-left: 20rpx;
		margin-top: 20rpx;

	}

	.input {
		margin-left: 20rpx;
		height: 80rpx;

	}
</style>
