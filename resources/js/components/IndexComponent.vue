<template>
	<div>
	    <div class="content">
	        <div class="title m-b-md">
	            List of Users
	        </div>

	        <div class="list-table">
	            <table id="users">
	                <tr>
	                	<th>Name</th>
	                    <th>View User</th>
	                </tr>

	                <tr v-for="user in users">
	                    <td>{{ user.name }}</td>
	                    <td>
	                    	<a :href="`/user/${user.id}`"><button type="submit">View</button></a>
	                    	<a :href="`/user/${user.id}/edit`"><button v-if="loggedIn === true" type="submit">Edit</button></a>
	                    </td>
	                </tr>
	            </table>
	        </div>

	        <div class="links">
	            <a v-if="loggedIn === true" href="/user/create">Create User</a>
	        </div>
	    </div>
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
        	console.log('test')
        	axios.get('/api/logged-in').then((response) => {
        		console.log(response)
        		this.loggedIn = response.data.response
	            axios.get('/api/users')
		        .then((response) => {
		            this.users = response.data.data
		        })
		        .catch(function (error) {
			        console.log(error)
			    })
        	})
        }
    }
</script>
