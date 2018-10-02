<template>
	<div class="complaints">
		<div class="container">
			<post v-for="complaint in complaints" :key="complaint.id" :data="complaint"></post>
		</div>
	</div>
</template>

<script>
	import db from '../services/firebase'
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
				let me = this
				me.complaints = []
				db.collection('complaints').get()
				.then(res => {
					res.forEach(doc => {
						console.log(doc)
						// me.complaints.push(doc.data())
					})
				})
			}
		},
		mounted(){
			let me = this
			me.fetchComplaints()
		}
	}
</script>