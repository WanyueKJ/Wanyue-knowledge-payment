<template>
	<view>
		
	<web-view :src="url"></web-view>
		
	</view>
</template>

<script>
	const app = getApp();

	export default{
		data(){
			return{
				url:''
				
			}
		},
		onLoad(option) {
			if(option != undefined) {
				this.url = app.globalData.site_h5url + 'appapi/page/detail?id=' + option.type;
			}
		}
	}
</script>

<style>
	
</style>
