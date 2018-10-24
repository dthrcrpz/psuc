<template>
	<div class="comment-template">
		<div>
			<p class="user">
				{{ data.alias }}
			</p>
			<p class="date">
				{{ data.created_at | fromNow }}
			</p>

			<button class="delete" v-if="data.user_id == $parent.$parent.$parent.decodedClientToken.user_id" @click="deleteComment(postid, data['.key'])">Delete</button>
			
			<p class="comment">
				{{ data.comment }}
			</p>
		</div>
	</div>
</template>

<script>
	import moment from 'moment'
	import db from '../services/firebase'

	export default {
		props: ['data', 'postid'],
		filters: {
			fromNow(str) {
				return moment(str, 'YYYY-MM-DD HH:mm:ss').startOf(str, 'YYYY-MM-DD HH:mm:ss').fromNow()
			}
		},
		methods: {
			deleteComment(postid, commentid) {
				let me = this
				let deleteme = confirm('Are you sure you want to delete this comment?')
				me.$parent.$parent.$parent.isLoading = 1
				if(deleteme) {
					db.collection('complaints').doc(postid).collection('comments').doc(commentid).delete()
					.then(res => {
						console.log(res)
					})
					.catch(err => {
						console.log(err)
					})
					.then(() => {
						me.$parent.$parent.$parent.isLoading = 0
					})
				}
			}
		}
	}
</script>