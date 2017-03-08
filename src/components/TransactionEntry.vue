<template>
	<div class="transaction-entry row">

		<div class="col-md-2 transaction-date">
			10/10/0
		</div>
		<div class="col-md-2 transaction-tags">T1</div>
		<div class="col-md-5 transaction-descrption">
			<input type="text" v-model="description" value="this is some description">
		</div>
		<div class="col-md-2 transaction-cost">
			<input type="text"  v-model="cost" value="(100)">
		</div>
		<div v-if="change"  class="col-md-1">
			<button>Save</button>
		</div>
	</div>
</template>

<script>
	import TextModify from './TextModify.vue'

	export default{
		components:{
			TextModify
		},
		data : function () {
			return {
				change: false,
				cost : 100,
				description: 'this is some text'
			}
		},
		watch: {
			description: function(val, oldVal){
				this.change = true
			},
			cost: function(val, oldVal){
				this.change = true
			}
		},
		methods: {
		}
	}
</script>

<style>
	.transaction-tags, .transaction-date{
		line-height: 40px;
	}


</style>
