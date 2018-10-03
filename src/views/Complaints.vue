<template>
	<div class="complaints">
		<div class="container">
			<post v-for="c in complaints" :key="c.id" :data="c"></post>
		</div>
	</div>
</template>

<script>
	import db from '../services/firebase'
	import VueFirestore from 'vue-firestore'
	import Post from '../components/Post'
	
	export default{
		components: {
			Post
		},
		firestore(){
			return{
				complaints: db.collection('complaints')
			}
		},
	}
</script>