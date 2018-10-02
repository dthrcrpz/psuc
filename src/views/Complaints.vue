<template>
	<div class="complaints">
		<div class="container">
			<post v-for="complaint in complaints" :data="complaint"></post>
		</div>
	</div>
</template>

<script>
	import Post from '../components/Post'
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
				//
			}
		},
		mounted(){
			let me = this
			me.fetchComplaints()
		}
	}
</script>