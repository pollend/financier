import './bootstrap'
import BookEntry from './components/BookEntry.vue'


import App from './App.vue'


import SummaryPage from './components/SummaryPage.vue'

const router = new VueRouter({
	routes: [
		{ path: '', component: SummaryPage }
	]
})



window.onload = function() {

	new Vue({
		router,
		render: h => h(App)
	}).$mount('#app')
}