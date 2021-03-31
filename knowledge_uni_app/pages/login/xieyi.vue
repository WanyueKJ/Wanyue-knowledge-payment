<template>
	<view>
		
	<web-view :src="url"></web-view>
		
	</view>
</template>

<script>
	export default{
		data(){
			return{
				url:''
				
			}
		},
		onLoad(option) {
			// console.log(option);
			this.url = getApp().globalData.site_h5url + 'appapi/page/detail?id=' + option.type;
		}
	}
</script>

<style>
	
</style>
