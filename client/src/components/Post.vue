<template>
	<div class="post-template">
		<div class="col left">
			<div class="info-group">
				<p class="label">Posted by:</p>
				<p class="value">{{ data.alias }}</p>
			</div>
			<div class="info-group">
				<p class="label">Status:</p>
				<p class="value">{{ data.way }}</p>
			</div>
			<div class="info-group">
				<p class="label">Subject:</p>
				<p class="value">{{ data.about }}</p>
			</div>
			<div class="info-group">
				<p class="label">About:</p>
				<p class="value">{{ data.target }}</p>
			</div>
			<div class="info-group">
				<p class="label">Date Submitted:</p>
				<p class="value">{{ data.created_at | moment("MMM DD, YYYY | hh:mm a") }}</p>
			</div>
		</div>
		<div class="col right">
			<div class="info-group">
				<p class="value">{{ data.message }}</p>
			</div>
		</div>
	</div>
</template>

<script>
	export default{
		props: ['data']
	}
</script>