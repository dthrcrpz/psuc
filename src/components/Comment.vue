<template>
	<div class="comment-template">
		<div>
			<p class="user">
				{{ data.alias }}
			</p>
			<p class="date">
				{{ data.created_at | fromNow }}
			</p>
			<button class="delete">Delete</button>
			<p class="comment">
				{{ data.comment }}
			</p>
		</div>
	</div>
</template>

<script>
	import moment from 'moment'
	export default {
		props: ['data'],
		filters: {
			fromNow(str) {
				return moment(str, 'YYYY-MM-DD HH:mm:ss').startOf(str, 'YYYY-MM-DD HH:mm:ss').fromNow()
			}
		}
	}
</script>