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
		<div class="transaction-container container-fluid">
			<div class="transaction-header row">

				<div class="col-md-2">
					Date
				</div>
				<div class="col-md-2">Tags</div>
				<div class="col-md-5">
					Message
				</div>
				<div class="col-md-2">
					Amount
				</div>
				<div  class="col-md-1"></div>
			</div>

			<transaction-entry></transaction-entry>
			<div class="transaction-seperator"></div>
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
			TransactionEntry,
		}

	}
</script>

<style>
.transaction-seperator{
	height: 1px;
	width: 100%;
	background: rgba(0, 0, 0, 0.22);
	margin: 0 0 10px 0;
}


</style>