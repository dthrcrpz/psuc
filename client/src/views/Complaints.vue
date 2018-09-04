<template>
	<div class="complaints">
		<div class="container">
			<post v-for="complaint in complaints" :data="complaint"></post>
		</div>
	</div>
</template>

<script>
	import Post from '../components/Post'
	import ComplaintServices from '../services/ComplaintServices'
	export default{
		data(){
			return{
				complaints: []
			}
		},
		components: {
			Post
		},
		methods: {
			fetchComplaints(){
				let me = this
				ComplaintServices.fetchComplaints()
				.then((response) => {
					me.complaints = response.data
					console.log(me.complaints)
				}).catch((error) => {
					console.log(error)
				})
			}
		},
		mounted(){
			let me = this
			me.fetchComplaints()
		}
	}
</script>