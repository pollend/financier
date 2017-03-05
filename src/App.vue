<template>
	<div id="app">
		<div id="app-navigation">
			<ul>
				<li><a>Summary</a></li>
				<!--Books-->
				<li><a>Book 1</a></li>
				<li><a>Book 2</a></li>
				<li><a>Book 3</a></li>
				<!--Add Book-->
				<li>
					<a v-if="!showBook" v-on:click="AddBook()">+ Add Book</a>
					<div v-if="showBook" class="app-navigation-entry-edit ng-scope">
						<add-book></add-book>
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

	export default {
		name: 'app',
		data: function(){
			return {
				showBook: false
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
				
			}
		}
	}
</script>