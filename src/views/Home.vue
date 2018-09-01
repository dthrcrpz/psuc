<template>
	<div class="home">
		<div class="container">
			<form @submit.prevent="submit()">
				<div class="form-group">
					<label>What are you?</label>
					<select v-model="way">
						<option value="none" disabled>Please select</option>
						<option>Student</option>
						<option>Staff</option>
						<option>Faculty</option>
						<option>Graduate</option>
					</select>
				</div>
				<div class="form-group">
					<label>What is this all about?</label>
					<select v-model="about">
						<option value="none" disabled>Please select</option>
						<option>Complaint</option>
						<option>Compliment</option>
						<option>Suggestion</option>
					</select>
				</div>
				<div class="form-group">
					<label>What/Who is the subject of your complaint?</label>
					<select v-model="target">
						<option value="none" disabled>Please select</option>
						<option>Facilities</option>
						<option>Instructor</option>
						<option>System</option>
						<option>Portal</option>
					</select>
				</div>
				<div class="form-group">
					<label>Your Complaint</label>
					<textarea rows="6" placeholder="Type your concern" v-model="message" v-validate="'required'" name="message"></textarea>
					{{ errors.any('message') }}
				</div>
				<div class="buttons-container">
					<button type="submit">Submit</button>
					<button type="reset" class="reset">Reset Form</button>
				</div>
			</form>
		</div>
	</div>
</template>

<script>
	export default{
		data(){
			return{
				way: 'none',
				about: 'none',
				target: 'none',
				message: '',
			}
		},
		methods: {
			submit(){
				alert(1)
			}
		}
	}
</script>