<template>
	<div>
		<div class="tableEdit" v-if="user_id != null">
	  		<h1>Update Information</h1>
			<table id="users">
				<tr>
					<th>Name</th>
					<th>Email</th>
				</tr>
				<tr>
					<td>{{ user.name }}</td>
					<td>{{ user.email }}</td>
				</tr>
			</table>
		</div>

		<div class="create" v-if="user_id == null">
			<h1>Create New User</h1>
		</div>

		<br>

        <div class="userForm">

    	    <div class="update-info">
				<label>Name:</label>
				<input type="text" placeholder="Enter Name" v-model="user.name">
				<label class="errorMsg" v-if="errors.name">Error: {{errors.name[0]}}</label>
			</div>

			<div class="update-info">
				<label>Email:</label>
				<input type="text" placeholder="Enter Email" v-model="user.email">
				<label class="errorMsg" v-if="errors.email">Error: {{errors.email[0]}}</label>
			</div>

			<div class="update-info" v-if="user_id == null">
				<label>Password:</label>
				<input type="password" placeholder="Enter Password" v-model="user.password">
				<label class="errorMsg" v-if="errors.password">Error: {{errors.password[0]}}</label>
			</div>

			<div class="edit-btns">
				<div class="update-btn">
					<button type="submit" v-on:click="submit()">{{ user_id != null ? 'Update' : 'Create' }} User</button>
				</div>
				<div class="delete-btn" v-if="user_id != null">
					<button type="submit" v-on:click="deletePost()">Delete User</button>
				</div>
			</div>
		</div>
	</div>
</template>

<script>

	import Validation from '@midwestern/react-native-validation'

    export default {
    	props: ['user_id'],
    	data() {
        	return {
        		loggedIn: false,

        		user: {
        			name: '',
        			email: '',
        			password: ''
        		},

        		errors: {
        			//
        		}
        	}
        },
        
        mounted() {
            if (this.user_id) {
	            axios.get('/api/logged-in').then((response) => {
	        		console.log(response)
	        		this.loggedIn = response.data.response
		            axios.get('/api/users/' + this.user_id)
			        .then((response) => {
			            this.user = response.data.data
			        })
			        .catch(function (error) {
				        console.log(error)
				    })
	        	})
            }
        },

	    methods: {
	        submit() {

	        	const Validator = new Validation({
				  name: 'required|alpha|max:255',
				  email: 'required|string|email',
				  password: this.user_id === undefined ? 'required|string|min:7' : ''
				})

				Validator.validate(this.user)
				  .then(() => {
				    // success
				    const formData = {
		        		...this.user,
		        		...{
		        			'_method': this.user_id != null ? 'PATCH' : 'POST'
		        		}
		        	}

		        	axios.post('/api/users/' + (this.user_id || ''), formData)
			        	.then((response) => {
			        		window.location.href = '/user/' + response.data.data.id
			        	})
			        	.catch(function (error) {
					        console.log(error)
					    })
					  })
				  .catch(errors => {
				      this.errors = errors
				      console.log(errors)
				  })
	        },

	        deletePost() {
		        axios.delete('/api/users/' + this.user_id)
			        .then(response => {
			        	this.users = response.data.data
			        	window.location.href = '/user/'
			        })
			        .catch(function (error) {
				        console.log(error)
				    })
      		}
	    }
    }
</script>