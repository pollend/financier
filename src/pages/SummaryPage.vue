<template>
	<div>
		<div id="app-navigation">
			<ul>
				<li><a>Summary</a></li>
				<!--Books-->
				<book-entry v-on:delete="UpdateBookList()"  v-for="(book, index) in books" :book="book"></book-entry>
				<!--Add Book-->
				<li>
					<a v-if="!showBook" v-on:click="AddBook()">+ Add Book</a>
					<div v-else class="app-navigation-entry-edit ng-scope">
						<add-book v-on:save="UpdateBookList()"></add-book>
					</div>
				</li>
			</ul>
		</div>

		<div id="app-content">
			<router-view></router-view>
		</div>
	</div>

</template>

<script>
	import VueRouter from 'vue-router'
	import AddBook from './../components/AddBook.vue'
	import BookEntry from './../components/BookEntry.vue'
	import axios from 'axios'

	import BookService from  './../service/bookService'

	export default {
		data: function(){
			return {
				showBook: false,
				books :[]
			}
		},
		components: {
			AddBook,
			BookEntry
		},
		created: function(){
			this.UpdateBookList()
		},
		methods: {
			AddBook: function () {
				this.showBook = true
			},
			UpdateBookList: function () {
				this.showBook = false;

				let temp = this;
				BookService.findBooks(function (response) {
					temp.books =  response.data
				},function (error) {

				})

			}
		}
	}
</script>