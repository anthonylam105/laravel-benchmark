<template>
	<div>
	  	<h1>Create New User</h1>
		<form class="create" method="POST" action="/user">
			
			<slot></slot>

			<p>Please enter your information.</p>

			<div>
				<label>Username:</label>
				<input type="text" name="name" placeholder="Username..." required>
			</div>
			<div>
				<label>Email:</label>
				<input type="text" name="email" placeholder="Email..." required>
			</div>
			<div>
				<label>Password:</label>
				<input id="myInput" type="password" name="password" placeholder="Password..." required>
			</div>
			<div>
				<button type="submit">Create User</button>
			</div>

			
		</form>
	</div>
</template>

<script>
    export default {
    	data() {
        	return {
        		loggedIn: false,
        		users: []
        	}
        },

        mounted() {
            console.log('Create Component mounted.')
        },

        methods: {
	      	addPost() {
	        	axios.post('/api/user')
	        	.then((response) => {
		            this.users = response.data.data
		        })
	            .catch(function (error) {
			        console.log(error);
			    })
	    	}
    	}
    }
</script>