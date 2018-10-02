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
					<li><router-link to="/admin-panel/complaints"><i class="fa fa-hand-paper-o" aria-hidden="true"></i> Complaints</router-link></li>
					<li><router-link to="/admin-panel/users"><i class="fa fa-users" aria-hidden="true"></i> Users</router-link></li>
					<li><router-link to="/admin-panel/logs"><i class="fa fa-list" aria-hidden="true"></i> Logs</router-link></li>
					<li><router-link to="/admin-panel/my-account"><i class="fa fa-user-circle" aria-hidden="true"></i> My Account</router-link></li>
				</ul>
			</div>
			<div class="main-wrapper">
				<complaints v-if="$route.params.target == 'complaints'"></complaints>
			</div>
		</div>
	</div>
</template>

<script>
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
				
			}
		}
	}
</script>