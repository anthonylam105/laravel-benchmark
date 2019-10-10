<template>
	<div>
		<div class="showLink">
		  	<h2><a v-if="loggedIn === true" href="/user/create">Create User</a></h2>
	  	</div>
		<div class="showUser">
			<div class="showTitle">
				<h1>{{user.name}}'s Information</h1>
			</div>
			<div class="showInfo">
				<h2>ID: {{user.id}}</h2>
				<h2>Name: {{user.name}}</h2>
				<h2>Email: {{user.email}}</h2>
			</div>
			<a :href="`/`"><button v-if="loggedIn === false" type="submit">Back</button></a>	
			<a :href="`/user/${user.id}/edit`"><button v-if="loggedIn === true" type="submit">Edit</button></a>
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
            console.log('Show Component mounted.')
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
    }
</script>