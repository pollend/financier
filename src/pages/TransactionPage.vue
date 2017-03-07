<template>
	<div>

		<div class="container-fluid">
			<div class="row">
				<div class="col-md-4">
					<div class="well well-sm">
						+200
					</div>
				</div>
				<div class="col-md-4">

				</div>
				<div class="col-md-4">

				</div>
			</div>
		</div>

		<div>
			<transaction-entry></transaction-entry>
			<transaction-entry></transaction-entry>
			<transaction-entry></transaction-entry>
			<transaction-entry></transaction-entry>
			<transaction-entry></transaction-entry>
			<transaction-entry></transaction-entry>
			<transaction-entry></transaction-entry>
			<transaction-entry></transaction-entry>
			<transaction-entry></transaction-entry>

		</div>
	</div>
</template>

<script>
	import TransactionEntry from './../components/TransactionEntry.vue'

	export default{
		components: {
			TransactionEntry
		}

	}
</script>

<style>

</style>