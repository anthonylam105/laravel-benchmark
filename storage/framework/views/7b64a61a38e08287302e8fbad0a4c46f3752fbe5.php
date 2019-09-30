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

<?php $__env->startSection('content'); ?>

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
			<td><?php echo e($user->name); ?></td>
			<td><?php echo e($user->email); ?></td>
			<!-- <td><?php echo e($user->password); ?></td> -->
		</tr>
	</table>
	
	<br>

	<form class="update" method="POST" action="/show/<?php echo e($user->id); ?>">

		<?php echo method_field('PATCH'); ?>
		<?php echo csrf_field(); ?>

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
				<input type="text" name="password" placeholder="Change Password" value="<?php echo e($user->password); ?>">
			</div>
		</div> -->

		<div>
			<button type="submit">Update User</button>
		</div>


	</form>
	<form class="delete" method="POST" action="/show/<?php echo e($user->id); ?>">

		<?php echo method_field('DELETE'); ?>
		<?php echo csrf_field(); ?>

		<div>
			<button type="submit">Delete User</button>
		</div>

	</form>

	<?php if($errors->any()): ?>
		<div class="danger">

			<ul>
				<?php $__currentLoopData = $errors->all(); $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $error): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
					<li><?php echo e($error); ?></li>
				<?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
			</ul>

		</div>
	<?php endif; ?>

<?php $__env->stopSection(); ?>
<?php echo $__env->make('layouts.app', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?><?php /**PATH /Users/anthony/Documents/Laravel/benchmark/resources/views/edit.blade.php ENDPATH**/ ?>