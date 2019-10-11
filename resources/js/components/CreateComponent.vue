<template>
	<div>
		<div class="create">
	  		<h1>Create New User</h1>
			
			

			<p>Please enter your information.</p>

			<div>
				<label>Username:</label>
				<input type="text" name="name" placeholder="Username..." v-model="name" required>
			</div>
			<div>
				<label>Email:</label>
				<input type="text" name="email" placeholder="Email..." v-model="email" required>
			</div>
			<div>
				<label>Password:</label>
				<input id="myInput" type="password" name="password" placeholder="Password..." v-model="password" required>
			</div>
			<div>
				<button type="submit" v-on:click="addPost()">Create User</button>
			</div>

			
		</div>
	</div>
</template>

<script>
    export default {
    	data() {
        	return {
        		loggedIn: false,

        		name: '',
        		email: '',
        		password: ''
        	}
        },

        mounted() {
            console.log('Create Component mounted.')
        },

        methods: {
	      	addPost() {
	        	axios.post('/api/users', {
	        		name: this.name,
	        		email: this.email,
	        		password: this.password
	        	})
	        	.then((response) => {
		            window.location.href = '/user/' + response.data.data.id
		        })
	            .catch(function (error) {
			        console.log(error);
			    })
	    	}
    	}
    }
</script>