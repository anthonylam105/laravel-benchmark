<template>
	<div>
		<div class="showUser">

			<h1>{{user.name}}'s Information</h1>

			<table id="users">
				<tr>
					<th>ID</th>
					<th>Name</th>
					<th>Email</th>
					<th class="show-btns" v-if="loggedIn === false">Back to List</th>
					<th class="show-btns" v-if="loggedIn === true">Edit</th>
				</tr>
				<tr>
					<td>{{user.id}}</td>
					<td>{{user.name}}</td>
					<td>{{user.email}}</td>
					<td class="show-btns" v-if="loggedIn === false"><a :href="`/`"><button type="submit">Back</button></a></td>
					<td class="show-btns" v-if="loggedIn === true"><a :href="`/user/${user.id}/edit`"><button type="submit">Edit</button></a></td>
				</tr>
			</table>
		</div>

		<div class="showLink">
		  	<a v-if="loggedIn === true" href="/user/create">Create User</a>
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