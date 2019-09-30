@extends('layouts.app')
	<style type="text/css">
		#users {
		  border-collapse: collapse;
		  width: 100%;
		}

		#users td, #users th {
		  border: 1px solid #ddd;
		  padding: 8px;
		}

		#users tr:nth-child(even){background-color: #f2f2f2;}

		#users tr:hover {background-color: #ddd;}

		#users th {
		  padding-top: 12px;
		  padding-bottom: 12px;
		  text-align: left;
		  background-color: #000;
		  color: white;
		}
	</style>

@section('content')


	<h1>List of Users</h1>

	<!-- <h2><a href="/">Home</a></h2> -->

@auth
	<h2><a href="/create">Create User</a></h2>
@endauth

	<table id="users">
		<tr>
			<th>ID</th>
			<th>Name</th>
			<th>Email</th>
			@auth
			<th>Update/Delete</th>
			@endauth
			<!-- <th>Password</th> -->
		</tr>

		<tr @foreach($usernames as $username)>
			<td>{{ $username->id }}</td>
			<td>{{ $username->name }}</td>
			<td>{{ $username->email }}</td>
			<!-- <td>{{ $username->password }}</td> -->
			@auth
				<td><button type="submit"><a href="/show/{{ $username->id }}/edit">Edit</a></button></td>
			@endauth
		</tr @endforeach>


		
	</table>
	
@endsection