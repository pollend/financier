<template>
	<div id="app">
		<div id="app-navigation">
			<ul>
				<li><a>Summary</a></li>
				<!--Books-->
				<book-entry  v-for="(book, index) in books" :book="book"></book-entry>

				<!--Add Book-->
				<li>
					<a v-if="!showBook" v-on:click="AddBook()">+ Add Book</a>
					<div v-else class="app-navigation-entry-edit ng-scope">
						<add-book v-on:save="UpdateBookList()"></add-book>
					</div>

				</li>
			</ul>
		</div>

		<router-view></router-view>
	</div>
</template>

<script>
	import VueRouter from 'vue-router'
	import AddBook from './components/AddBook.vue'
	import BookEntry from './components/BookEntry.vue'
	import  axios from 'axios'

	export default {
		name: 'app',
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
				axios.get(OC.generateUrl(FConfig.base_url + '/book')).then((response)=>{
					temp.books =  response.data;
					console.log(temp.books)
				});
				
			}
		}
	}
</script>