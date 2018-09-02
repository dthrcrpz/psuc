<template>
	<div class="admin-panel">
		<div class="container login-container">
			<img src="/logo.png" class="logo">
			<p class="h3">Admin Panel</p>
			<form @submit.prevent="login()">
				<div class="form-group">
					<input type="text" placeholder="Username" v-model="username">
				</div>
				<div class="form-group">
					<input type="password" placeholder="Password" v-model="password">
				</div>
				<div class="form-group">
					<button type="submit">Login</button>
					<div class="not">
						Not admin? <router-link to="/">Go back to home</router-link>
					</div>
				</div>
			</form>
		</div>
	</div>
</template>

<script>
	export default{
		data(){
			return{
				username: '',
				password: ''
			}
		},
		methods: {
			login(){
				alert(1)
			}
		}
	}
</script>