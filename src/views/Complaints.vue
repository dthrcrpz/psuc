<template>
	<div class="complaints">
		<div class="container">

			<form @submit.prevent="startSort()">
				<div class="filter">
					<h3>Filter</h3>
					<select v-model="sort.way">
						<option disabled selected value="0">Occupation</option>
					</select>

					<select v-model="sort.target">
						<option disabled selected value="0">Subject</option>
					</select>

					<select v-model="sort.about">
						<option disabled selected value="0">About</option>
					</select>

					<button>Go</button>
				</div>
			</form>

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
				complaints: [],
				sort: {
					way: 0,
					target: 0,
					about: 0,
				}
			}
		},
		methods: {
			startSort() {
				alert(1)
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