<template>
	<div class="home admin-panel">
		<div class="container" v-if="$parent.isClientLoggedIn">
			<form @submit.prevent="submit()">
				<div class="form-group">
					<label>Your Alias (to be shown on "<router-link to="/complaints">View Complaints</router-link>" section)*</label>
					<input type="text" v-model="alias" name="alias" placeholder="anon623">
				</div>
				<div class="form-group">
					<label>What are you? *</label>
					<select v-model="way">
						<option value="none" style="display: none">Please select</option>
						<option>Student</option>
						<option>Staff</option>
						<option>Faculty</option>
						<option>Graduate</option>
					</select>
				</div>
				<div class="form-group">
					<label>What is this all about? *</label>
					<select v-model="about">
						<option value="none" style="display: none">Please select</option>
						<option>Complaint</option>
						<option>Compliment</option>
						<option>Suggestion</option>
					</select>
				</div>
				<div class="form-group">
					<label>What/Who is the subject of your concern? *</label>
					<select name="target" v-model="target">
						<option value="none" style="display: none">Please select</option>
						<option>Facilities</option>
						<option>Instructor</option>
						<option>System</option>
						<option>Portal</option>
					</select>
				</div>
				<div class="form-group">
					<label>Your Complaint *</label>
					<textarea rows="6" placeholder="Type your concern" v-model="message" name="message"></textarea>
				</div>
				<div class="buttons-container">
					<button type="submit">Submit</button>
					<button class="reset" type="button" @click="reset()">Reset Form</button>
				</div>
			</form>
		</div>
		<div class="container login-container" v-if="this.$parent.isAdminLoggedIn == false && authState == 1">
			<img src="/logo.png" class="logo">
			<p class="h3">User Login</p>
			<form @submit.prevent="clientLogin()">
				<div class="form-group">
					<input type="text" placeholder="Username" v-model="username" autofocus>
				</div>
				<div class="form-group">
					<input type="password" placeholder="Password" v-model="password">
				</div>
				<div class="form-group">
					<button type="submit">Login</button>
					<div class="not">
						Don't have an account? <a href="javascript:void()" @click="authState = 2">Click here to register</a>
					</div>
				</div>
			</form>
		</div>
		<div class="container login-container" v-if="this.$parent.isAdminLoggedIn == false && authState == 2">
			<img src="/logo.png" class="logo">
			<p class="h3">Register</p>
			<form @submit.prevent="clientRegister()">
				<div class="form-group">
					<input type="text" placeholder="Your ID Number (to be verified by admin)" v-model="reg.idnumber" autofocus>
				</div>
				<div class="form-group">
					<input type="text" placeholder="Username" v-model="reg.username" autofocus>
				</div>
				<div class="form-group">
					<input type="text" placeholder="Fullname" v-model="reg.fullname" autofocus>
				</div>
				<div class="form-group">
					<input type="text" placeholder="Email" v-model="reg.email" autofocus>
				</div>
				<div class="form-group">
					<input type="password" placeholder="Password" v-model="reg.password">
				</div>
				<div class="form-group">
					<input type="password" placeholder="Re-enter Password" v-model="reg.password2">
				</div>
				<div class="form-group">
					<button type="submit">Submit</button>
					<div class="not">
						Already have an account? <a href="javascript:void()">Click here to login</a>
					</div>
				</div>
			</form>
		</div>
	</div>
</template>

<script>
	import db from '../services/firebase'
	import $ from 'jquery'
	export default{
		data(){
			return{
				// data to submit
				way: 'none',
				about: 'none',
				target: 'none',
				message: '',
				ip: '',
				name: '',
				alias: '',

				// others
				authState: 2,

				// for login

				// for registration
				reg: {
					idnumber: '',
					username: '',
					fullname: '',
					email: '',
					password: '',
					password2: '',
				}
			}
		},
		methods: {
			clientLogin(){
				alert(1)
			},
			clientRegister(){
				let me = this

				// validation here

				// end

				me.$parent.isLoading = true
				db.collection('users').doc().set({
					idnumber: me.reg.idnumber,
					username: me.reg.username,
					fullname: me.reg.fullname,
					email: me.reg.email,
					password: me.reg.password,
					role: 0
				}).then(() => {
					alert('Thank you for registering. The admin will approve your account within 24 hours.')
					me.reg.idnumber = ''
					me.reg.username = ''
					me.reg.fullname = ''
					me.reg.email = ''
					me.reg.password = ''
					me.reg.password2 = ''
				}).catch(err => {
					console.log('Error: '+err)
				}).then(() => {
					me.$parent.isLoading = false
				})
			},
			submit(){
				let me = this
				var errors = []
				// validate
				$.each($('.home').find('select'), function(){
					if($(this).find(':selected').val() == 'none'){
						$(this).addClass('has-errors')
						errors.push(1)
					}
				})
				if(me.message == ''){
					$('textarea[name="message"').addClass('has-errors')
					errors.push(1)
				}

				if(me.alias == ''){
					$('input[name="alias"').addClass('has-errors')
					errors.push(1)
				}

				// do not proceed if has errors
				if(errors.length > 0){
					alert('Please fill-out all required fields')
					die()
				}

				me.setLoading(true)

				// saving here
				db.collection('complaints').doc().set({
					message: me.message
				}).then(() => {
					console.log('Success')
				}).catch(err => {
					console.log('Error: '+err)
				}).then(() => {
					me.setLoading(false)
					me.reset()
				})
			},
			reset(){
				let me = this
				$('body select').removeClass('has-errors')
				$('body textarea').removeClass('has-errors')
				me.way = 'none'
				me.about = 'none'
				me.target = 'none'
				me.message = ''
				me.name = ''
				me.alias = ''
			},
			setLoading(val){
				this.$parent.isLoading = val
			}
		},
		mounted(){
			let me = this 
		}
	}

	$('body').on('change', 'select', function(){
		$(this).removeClass('has-errors')
	})
	$('body').on('change', 'input', function(){
		$(this).removeClass('has-errors')
	})
	$('body').on('change', 'textarea', function(){
		$(this).removeClass('has-errors')
	})
</script>