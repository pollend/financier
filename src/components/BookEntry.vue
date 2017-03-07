<template>
	<li>

		<div class="app-navigation-entry-deleted">
			<div class="app-navigation-entry-deleted-description">{{book.title}}</div>
			<button class="app-navigation-entry-deleted-button icon-settings svg" title="Undo" v-on:click="openDropdown()"></button>
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