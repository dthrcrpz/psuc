<template>
	<div class="comment-template">
		<div>
			<p class="user">
				{{ data.alias }}
			</p>
			<p class="date">
				{{ data.created_at | fromNow }}
			</p>
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
				return moment().startOf(str, 'YYYY-MM-DD HH:mm:ss').fromNow()
			}
		}
	}
</script>