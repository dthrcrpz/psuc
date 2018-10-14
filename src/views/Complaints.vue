<template>
	<div class="complaints">
		<div class="container">
			<div class="filter">
				<h3>Filter</h3>
				<select v-model="way">
					<option disabled selected value="0">Occupation</option>
				</select>

				<select v-model="target">
					<option disabled selected value="0">Subject</option>
				</select>

				<select v-model="about">
					<option disabled selected value="0">About</option>
				</select>
			</div>
			<post v-for="c in complaints" :key="c.id" :data="c" v-if="c.showToPublic"></post>
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
		data() {
			return{
				complaints: []
			}
		},
		mounted() {
			let me = this
			me.$parent.isLoading = 1
			me.$binding('complaints', db.collection('complaints').orderBy('created_at', 'desc'))
			.then(() => {
				me.$parent.isLoading = 0
			})
		}
	}
</script>