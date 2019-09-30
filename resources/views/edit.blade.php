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
	.update {
		margin-top: 20px;
		margin-left: 20px;
	}
	.update div {
		border-radius: 5px;
		background-color: #f2f2f2;
		padding: 20px;
	}
	input[type=text] {
		width: 100%;
		padding: 12px 20px;
	}
	.update button {
		color: black;
		background-color: white;
	}
	.update button:hover {
		color: white;
		background-color: black;
	}
	.delete {
		margin-top: 20px;
		margin-left: 20px;
	}
	.delete div {
		border-radius: 5px;
		background-color: #f2f2f2;
		padding: 20px;
	}
	.delete button {
		color: black;
		background-color: white;
	}
	.delete button:hover {
		color: white;
		background-color: red;
	}
	.danger ul {
		list-style: none;
		color: red;
	}
</style>

@section('content')

	<h1>Edit Users</h1>
		
	<!-- <a href="/">Home</a> -->
	<h2><a href="/show">List of Users</a></h2>

	</div>
	<table id="users">
		<tr>
			<th>Name</th>
			<th>Email</th>
			<!-- <th>Password</th> -->
		</tr>
		<tr>
			<td>{{ $user->name }}</td>
			<td>{{ $user->email }}</td>
			<!-- <td>{{ $user->password }}</td> -->
		</tr>
	</table>
	
	<br>

	<form class="update" method="POST" action="/show/{{ $user->id }}">

		@method('PATCH')
		@csrf

		<div>
			<label for="name">Update Name:</label>
			<input type="text" name="name" placeholder="Change Name">
		</div>

		<div>
			<label for="career">Update Email:</label>
			<input type="text" name="email" placeholder="Change Email">
		</div>

		<!-- <div class="field">
			<label for="password" class="label">Password</label>
			<div class="control">
				<input type="text" name="password" placeholder="Change Password" value="{{ $user->password }}">
			</div>
		</div> -->

		<div>
			<button type="submit">Update User</button>
		</div>


	</form>
	<form class="delete" method="POST" action="/show/{{ $user->id }}">

		@method('DELETE')
		@csrf

		<div>
			<button type="submit">Delete User</button>
		</div>

	</form>

	@if ($errors->any())
		<div class="danger">

			<ul>
				@foreach ($errors->all() as $error)
					<li>{{ $error }}</li>
				@endforeach
			</ul>

		</div>
	@endif

@endsection