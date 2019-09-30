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

<?php $__env->startSection('content'); ?>


	<h1>List of Users</h1>

	<!-- <h2><a href="/">Home</a></h2> -->

<?php if(auth()->guard()->check()): ?>
	<h2><a href="/create">Create User</a></h2>
<?php endif; ?>

	<table id="users">
		<tr>
			<th>ID</th>
			<th>Name</th>
			<th>Email</th>
			<?php if(auth()->guard()->check()): ?>
			<th>Update/Delete</th>
			<?php endif; ?>
			<!-- <th>Password</th> -->
		</tr>

		<tr <?php $__currentLoopData = $usernames; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $username): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>>
			<td><?php echo e($username->id); ?></td>
			<td><?php echo e($username->name); ?></td>
			<td><?php echo e($username->email); ?></td>
			<!-- <td><?php echo e($username->password); ?></td> -->
			<?php if(auth()->guard()->check()): ?>
				<td><button type="submit"><a href="/show/<?php echo e($username->id); ?>/edit">Edit</a></button></td>
			<?php endif; ?>
		</tr <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>>


		
	</table>
	
<?php $__env->stopSection(); ?>
<?php echo $__env->make('layouts.app', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?><?php /**PATH /Users/anthony/Documents/Laravel/benchmark/resources/views/show.blade.php ENDPATH**/ ?>