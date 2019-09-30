<style type="text/css">
	.create {
		margin-top: 20px;
		margin-left: 20px;
	}
	.create div {
		border-radius: 5px;
		background-color: #f2f2f2;
		padding: 20px;
	}
	input[type=text] {
		width: 100%;
	}
	input[type=password] {
		width: 100%;
	}
	.create button {
		color: black;
		background-color: white;
	}
	.create button:hover {
		color: white;
		background-color: black;
	}
	.danger ul {
		list-style: none;
		color: red;
	}
</style>

<?php $__env->startSection('content'); ?>

	<h1>Create New User</h1>

	<!-- <h2><a href="/">Home</a></h2> -->

	<h2><a href="/show">List of Users</a></h2>

	<form class="create" method="POST" action="/show">
		
		<?php echo csrf_field(); ?>

		<p>Please enter your information.</p>

		<div>
			<label>Username:</label>
			<input type="text" name="name" placeholder="Username..." required value="<?php echo e(old('name')); ?>">
		</div>
		<div>
			<label>Email:</label>
			<input type="text" name="email" placeholder="Email..." required value="<?php echo e(old('email')); ?>">
		</div>
		<div>
			<label>Password:</label>
			<input id="myInput" type="password" name="password" placeholder="Password..." required>
		</div>
		<div>
			<button type="submit">Create User</button>
		</div>

		<?php if($errors->any()): ?>
			<div class="danger">

				<ul>
					<?php $__currentLoopData = $errors->all(); $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $error): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
						<li><?php echo e($error); ?></li>
					<?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
				</ul>

			</div>
		<?php endif; ?>
	</form>

<script>
function myFunction() {
  var x = document.getElementById("myInput");
  if (x.type === "password") {
    x.type = "text";
  } else {
    x.type = "password";
  }
}
</script>

<?php $__env->stopSection(); ?>
<?php echo $__env->make('layouts.app', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?><?php /**PATH /Users/anthony/Documents/Laravel/benchmark/resources/views/create.blade.php ENDPATH**/ ?>