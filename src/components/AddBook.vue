<template>
		<form v-on:submit="save()">
			<input class="edit" v-model="title" type="text" placeholder="Book title">
			<input type="submit" value="" class="action icon-checkmark svg">
			<textarea rows="3" v-model="description" cols="40"></textarea>
			<div class="color-select">
				<div  v-for="(color, index) in colors" v-bind:class="{ active: index == colorIndex }" v-on:click="selectedColor(index)" class="color" :style="{ 'background-color': color }" ></div>
			</div>
		</form>
</template>

<script>

	import  axios from 'axios'
	import BookService from './../service/bookService'

	export default{
		props: ['bookId'],
		data: function () {
			return {
				colors : ['#0079BF','#61BD4F','#F2D600','#FFAB4A','#EB5A46','#C377E0','#9ef442','#41f4e8'],
				colorIndex : 0
			};
		},
		methods: {
			save: function () {
				let temp = this
				BookService.addBook(this.title,this.description,function (result) {
					temp.$emit('save')
				},function (error) {

				})
			},
			selectedColor: function (index) {
				this.colorIndex = index;
			}
		}
	}
</script>

<style>

	textarea{
		max-width: 100%;
		width:100%;
	}
	.color-select .color{
		width: 27px;
		height: 27px;
		float:left;
		margin-right:2px;
	}
	.color.active{
		border-width: 1px;
		border-style: solid;
		border-color: black;
	}

</style>