<template>
	<div class="home">
		<div class="container">
			<form @submit.prevent="submit()">
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
	</div>
</template>

<script>
	import $ from 'jquery'
	import ComplaintServices from '../services/ComplaintServices'
	import publicip from 'public-ip'
	export default{
		data(){
			return{
				way: 'none',
				about: 'none',
				target: 'none',
				message: '',
				ip: '',
			}
		},
		methods: {
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

				// do not proceed if has errors
				if(errors.length > 0){
					alert('Please fill-out all required fields')
					die()
				}

				me.setLoading(true)
				ComplaintServices.addComplaint({
					way: me.way,
					about: me.about,
					target: me.target,
					message: me.message,
					ip: me.ip
				}).then((rp) => {
					if(rp.status == 201){
						setTimeout(function() {
							me.setLoading(false)
							alert('Thank you for submitting your concern. We will try our best to address this issue.')
							me.reset()
						}, 2000)
					}
				}).catch((error) => {
					console.log(error.response)
					if(error.response.status == 422){
						alert('You have already submitted a complaint in this device')
					}
					me.setLoading(false)
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
			},
			setIP(ip){
				this.ip = ip
			},
			setLoading(val){
				this.$parent.isLoading = val
			}
		},
		mounted(){
			let me = this 
			publicip.v4()
				.then((rp) => {
					this.setIP(rp)	
				})
		}
	}

	$('body').on('change', 'select', function(){
		$(this).removeClass('has-errors')
	})
	$('body').on('change', 'textarea', function(){
		$(this).removeClass('has-errors')
	})
</script>