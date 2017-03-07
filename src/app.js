import './bootstrap'
import BookEntry from './components/BookEntry.vue'


import App from './App.vue'


import SummaryPage from './components/Pages/SummaryPage.vue'
import TransactionPage from './components/Pages/TransactionPage.vue'


const router = new VueRouter({
	routes: [
		{ name: 'summary',path: '', component: SummaryPage },
		{name: 'book' ,path: '/book/:bookId' , component: TransactionPage}
	]
})



window.onload = function() {

	new Vue({
		router,
		render: h => h(App)
	}).$mount('#app')
}