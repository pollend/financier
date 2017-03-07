import './bootstrap'
import App from './App.vue'


import SummaryPage from './pages/SummaryPage.vue'
import TransactionPage from './pages/TransactionPage.vue'

import BookPage from './pages/BookPage.vue'
import BookSummaryPage from './pages/BookSummaryPage.vue'



const router = new VueRouter({
	routes: [
		{ name: 'summary', path: '', component: SummaryPage },
		{ name: 'book' , path: '/book/:bookId' , component: BookPage,
			children: [
				{
					name: 'book-summary',
					path: 'summary',
					component: BookSummaryPage
				},
				{
					name: 'book-transaction',
					path: 'transaction',
					component: TransactionPage
				}
			]
		}
	]
})



window.onload = function() {

	// router.push({name : "summary"})
	new Vue({
		router,
		render: h => h(App)
	}).$mount('#app')
}