<template>
	<view>
		<!-- 时间 -->
		<view v-if="shortTime" class="py-2 flex align-center justify-center font-sm text-light-muted">
			{{shortTime}}
		</view>
		<!-- 消息气泡 -->
		<view class="flex align-start px-2 my-1" :style="isSelf ? 'flex-direction: row-reverse;' : ''">
			<image :src="item.avatar" style="width: 80rpx; height: 80rpx;"
			class="rounded-circle"></image>
			<!-- <template v-if="isuid == 0">
			<view class="p-2 rounded mx-2" style="max-width:400rpx;background-color: #f8f9fa;">
				{{item.content}}
			</view>
			</template>
			<template v-else> -->
			<view class="p-2 rounded mx-2" style="max-width:400rpx; background-color: #34D695; color: #FFFFFF;">
				{{item.content}}
			</view>
			<!-- </template> -->
		</view>
	</view>
</template>

<script>

	const app = getApp();
	// 当前登录用户的userid
	
	import timeT from '@/common/time.js'
	export default {
		props:{
			item:Object,
			index: Number,
			pretime: [Number,String],
			isuid:0
		},
	
		computed:{
			// 是否是登录用户本人
			isSelf(){
			    
				let uid = app.globalData.userinfo.id;
				// if (uid == this.item.uid){
				// 	this.isuid = 1;
				// }else{
				// 	this.isuid = 0;
				// }
				return uid == this.item.uid;
			},
			// 转化时间
			shortTime(){
				return timeT.getChatTime(this.item.create_time, this.pretime);
			}
		}
	}
</script>

<style>
	.short-time {		text-align: center;	}
</style>
