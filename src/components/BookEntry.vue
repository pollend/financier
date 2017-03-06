<template>
	<li><a v-on:click="viewBook()">{{book.title}}</a></li>
</template>

<script>
	export default{
		props: ['book'],
		data:{
			path:""
		},
		methods: {
			viewBook : function () {
				this.$router.push({name : 'book', params: { bookId: this.book.id }})
			}
			
		}
	}
</script>