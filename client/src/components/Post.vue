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
				<p class="value">11/11/11</p>
			</div>
		</div>
		<div class="col right">
			<div class="info-group">
				<p class="value">Lorem ipsum dolor sit amet, consectetur adipisicing elit, sed do eiusmod
				tempor incididunt ut labore et dolore magna aliqua. Ut enim ad minim veniam,
				quis nostrud exercitation ullamco laboris nisi ut aliquip ex ea commodo
				consequat. Duis aute irure dolor in reprehenderit in voluptate velit esse
				cillum dolore eu fugiat nulla pariatur. Excepteur sint occaecat cupidatat non
				proident, sunt in culpa qui officia deserunt mollit anim id est laborum.</p>
				{{ data }}
			</div>
		</div>
	</div>
</template>

<script>
	export default{
		props: ['data']
	}
</script>