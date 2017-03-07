<template>
	<li>

		<div class="book-navigation-entry">
			<a class="title" v-on:click="viewBook()">{{book.title}}</a>
			<button class="button icon-settings svg" title="Undo" v-on:click="openDropdown()"></button>
		</div>

		<div v-if="options" class="fileActionsMenu popovermenu bubble open menu"  v-on-clickaway="closeDropdown">
			<ul>
				<li>
					<a v-on:click="deleteBook()" href="#" class="menuitem action action-delete permanent" >
						<span class="icon icon-delete"></span>
						<span>Delete</span>
					</a>

				</li>
			</ul>
		</div>

	</li>
</template>

<script>

	import { mixin as clickaway } from 'vue-clickaway';
	import BookService from './../service/bookService'

	export default{
		mixins: [ clickaway ],
		props: ['book'],
		data:function() {
			return {
				path: "",
				options: false
			}
		},
		ready: function(){

		},
		methods: {
			viewBook : function () {
				this.$router.push({name : 'book', params: { bookId: this.book.id }})
			},
			closeDropdown: function () {
				this.options = false
			},
			openDropdown: function () {
				this.options = true;
			},
			deleteBook: function () {
				this.closeDropdown()
				let  temp = this
				BookService.deleteBook(this.book.id,function (response) {
					temp.$emit('delete')
				},function (error) {
					
				})

			}
		}
	}
</script>

<style>
	.book-navigation-entry{
		display: inline-block;
		height: 44px;
		width: 100%;
	}
	.book-navigation-entry>.title{
		padding-left: 12px;
		position: relative;
		white-space: nowrap;
		text-overflow: ellipsis;
		overflow: hidden;
		display: inline-block;
		width: calc(100% - 49px);
		line-height: 44px;
		float: left;

		color: black;
	}
	.book-navigation-entry>.title:hover{
		text-decoration: none;
	}

	.book-navigation-entry>.button{
		margin: 0;
		height: 44px;
		width: 44px;
		line-height: 44px;
		border: 0;
		display: inline-block;
		background-color: transparent;
		opacity: 0.5;
	}

</style>