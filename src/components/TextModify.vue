<template>
	<div>
		<span v-if="!visible">{{value}}</span>
		<div v-if="!visible" class="action icon-rename transaction-action" v-on:click="showInput()"></div>
		<input v-if="visible" @keyup.enter="save" v-on:blur="visible = false"  v-model="formValue" type="text">
	</div>
</template>


<script>
	export default{
		prop: ['value'],
		data: function () {
			return {
				visible: false
			}
		},
		ready: function(){
		},
		components:{
		},
		methods: {
			save: function () {
				this.$emit('save',this.formValue)
			},
			showInput: function () {
				visible = true
				this.$emit('show')

			}
		}
	}
</script>

<style>
</style>