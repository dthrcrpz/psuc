<template>
	<div class="complaints">
		<div class="container">
			<post></post>
			<post></post>
			<post></post>
		</div>
	</div>
</template>

<script>
	import Post from '../components/Post'
	import ComplaintServices from '../services/ComplaintServices'
	export default{
		components: {
			Post
		},
		methods: {
			fetchPosts(){
				ComplaintServices.fetchComplaints()
				.then((response) => {
					console.log(response)
				}).catch((error) => {
					console.log(error)
				})
			}
		},
		mounted(){

		}
	}
</script>