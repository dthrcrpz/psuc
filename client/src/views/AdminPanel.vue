<template>
	<div class="admin-panel">
		<div class="container login-container" v-if="this.$parent.isLoggedIn == false">
			<img src="/logo.png" class="logo">
			<p class="h3">Admin Panel</p>
			<form @submit.prevent="login()">
				<div class="form-group">
					<input type="text" placeholder="Username" v-model="username" autofocus>
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
		<div class="container admin-container" v-if="this.$parent.isLoggedIn">
			<div class="left-nav">
				<ul>
					<li><router-link to="/admin-panel/complaints">Complaints</router-link></li>
					<li><router-link to="/admin-panel/users">Users</router-link></li>
					<li><router-link to="/admin-panel/logs">Logs</router-link></li>
					<li><router-link to="/admin-panel/my-account">My Account</router-link></li>
				</ul>
			</div>
			<div class="main-wrapper">
				<complaints v-if="$route.params.target == 'complaints'"></complaints>
			</div>
		</div>
	</div>
</template>

<script>
	import UserServices from '../services/UserServices'
	import Complaints from '../components/adminpanel/Complaints'
	import jwt from 'jsonwebtoken'
	import Cookie from 'js-cookie'
	export default{
		data(){
			return{
				username: 'superadmin',
				password: 'admin'
			}
		},
		components: {
			Complaints
		},
		methods: {
			login(){
				let me = this
				me.$parent.isLoading = true
				UserServices.login({
					username: me.username,
					password: me.password,
				}).then((response) => {
					var token = response.data.token
					// verify token
					jwt.verify(token, process.env.VUE_APP_JWT_SECRET, (err, decoded) => {
						if(!err){
							Cookie.set('token', token, {
								expires: 1
							})
							setTimeout(function() {
								me.$parent.isLoading = false
								me.$parent.isLoggedIn = true
							}, 1000)
						}
					})
				}).catch((error) => {
					console.log(error)
				})
			}
		}
	}
</script>