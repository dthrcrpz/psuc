<template>
	<div class="my-account">
		<h2>Account Settings</h2>
		<form @submit.prevent="submit()">
			<div class="form-group">
				<label>Enter Old Password</label>
				<input type="password" name="old_password" v-validate="'required'">
				<span class="validation-errors">{{ errors.first('old_password') }}</span>
			</div>
			<div class="form-group">
				<label>Enter New Password</label>
				<input type="password" name="new_password" v-validate="'required|min:8'" ref="new_password">
				<span class="validation-errors">{{ errors.first('new_password') }}</span>
			</div>
			<div class="form-group">
				<label>Confirm New Password</label>
				<input type="password" name="new_password2" v-validate="'required|confirmed:new_password'">
				<span class="validation-errors">{{ errors.first('new_password2') }}</span>
			</div>
			<div class="form-group">
				<button>Save Changes</button>
			</div>
		</form>
	</div>
</template>

<script>
	export default {
		data() {
			return {
				old_password: '',
				new_password: '',
				new_password2: '',
			}
		},
		methods: {
			submit() {

			}
		}
	}
</script>