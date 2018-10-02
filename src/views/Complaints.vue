<template>
	<div class="complaints">
		<div class="container">
			<post v-for="c in complaints" :key="c.id" :data="c"></post>
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
						var toPush = doc.data()
						toPush['id'] = doc.id
						me.complaints.push(toPush)
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