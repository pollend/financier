<template>
	<div>
		<div id="app-navigation">
			<ul>
				<li><router-link :to="{ name: 'summary'}">< Back</router-link></li>
				<li><router-link :to="{ name: 'book-summary'}">Summary</router-link></li>
				<li><router-link :to="{ name: 'book-transaction'}">Transactions</router-link></li>
			</ul>
		</div>

		<div id="app-content">
			<router-view></router-view>
		</div>
	</div>
</template>

<script>
	export default{

	}
</script>
