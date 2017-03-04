
import Vue from 'vue'
import $ from 'jquery'

window.Vue = Vue
window.jQuery = window.$ = $

import BookEntry from './components/BookEntry.vue'

new Vue({
	el: '#app',

	components: {
		BookEntry
	}
})

var x = 0
x++

