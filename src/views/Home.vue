<template>
	<div class="home">
		<div class="container">
			<form @submit.prevent="submit()">
				<div class="form-group">
					<label>Your Name (will only be visible to System Admins) *</label>
					<input type="text" v-model="name" name="name" pattern="[a-zA-Z]+[a-zA-Z ]+" placeholder="John Doe">
				</div>
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
	</div>
</template>

<script>
	import $ from 'jquery'
	export default{
		data(){
			return{
				way: 'none',
				about: 'none',
				target: 'none',
				message: '',
				ip: '',
				name: '',
				alias: ''
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

				if(me.name == ''){
					$('input[name="name"').addClass('has-errors')
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