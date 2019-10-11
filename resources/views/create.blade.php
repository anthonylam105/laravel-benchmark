@extends('layouts.app')



@section('content')

	<!-- <h1>Create New User</h1> -->
	<!-- <h2><a href="/">Home</a></h2> -->


	<!-- <form class="create" method="POST" action="/user">
		
		@csrf

		<p>Please enter your information.</p>

		<div>
			<label>Username:</label>
			<input type="text" name="name" placeholder="Username..." required value="{{ old('name') }}">
		</div>
		<div>
			<label>Email:</label>
			<input type="text" name="email" placeholder="Email..." required value="{{ old('email') }}">
		</div>
		<div>
			<label>Password:</label>
			<input id="myInput" type="password" name="password" placeholder="Password..." required>
		</div>
		<div>
			<button type="submit">Create User</button>
		</div>

		@if ($errors->any())
			<div class="danger">

				<ul>
					@foreach ($errors->all() as $error)
						<li>{{ $error }}</li>
					@endforeach
				</ul>

			</div>
		@endif
	</form> -->

	<div id="app">
        <user-form>{{ csrf_field() }}</user-form>
    </div>


@endsection