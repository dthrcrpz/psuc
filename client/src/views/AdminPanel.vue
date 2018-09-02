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
	import UserServices from '../services/UserServices'
	import jwt from 'jsonwebtoken'
	import Cookie from 'js-cookie'
	export default{
		data(){
			return{
				username: 'superadmin',
				password: 'admin'
			}
		},
		methods: {
			login(){
				let me = this
				UserServices.login({
					username: me.username,
					password: me.password,
				}).then((response) => {
					var token = response.data.token
					Cookie.set('token', token, {
						expires: 1
					})
					me.$parent.isLoggedIn = true
				}).catch((error) => {
					console.log(error)
				})
			}
		}
	}
</script>