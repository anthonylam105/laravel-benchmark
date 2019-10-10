<template>
	<div>
		<div class="tableEdit">
	  		<h1>Updating {{user.name}}'s Information</h1>
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

		<br>
        <div class="userForm">
				<label for="name">Update Name:</label>
				<input type="text" name="name" placeholder="Change Name" v-model="user.name">

				<label for="career">Update Email:</label>
				<input type="text" name="email" placeholder="Change Email" v-model="user.email">
		</div>

		<div class="edit-btns">
			<div class="update-btn">
				<button type="submit" v-on:click="updatePost()">Update User</button>
			</div>
			<div class="delete-btn">
				<button type="submit" v-on:click="deletePost()">Delete User</button>
			</div>
		</div>

	</div>
</template>

<script>
    export default {
    	props: ['user_id'],
    	data() {
        	return {
        		loggedIn: false,
        		user: []
        	}
        },
        mounted() {
            console.log('Edit Component mounted.')
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
        },

	    methods: {
	        updatePost() {
	        	axios.patch('/api/users/' + this.user_id, this.user)
	        	.then((response) => {
	        		window.location.href = '/user/' + this.user_id
	        	})
	        	.catch(function (error) {
			        console.log(error);
			    });
	        },

	        deletePost() {
		        axios.delete('/api/users/' + this.user_id)
		        .then(response => {
		        	this.users = response.data.data
		        	window.location.href = '/user/'
		        })
		        .catch(function (error) {
			        console.log(error);
			    });
      		}
	    }
    }
</script>