<?php $__env->startSection('content'); ?>

	<!-- <h1>Create New User</h1> -->
	<!-- <h2><a href="/">Home</a></h2> -->


	<!-- <form class="create" method="POST" action="/user">
		
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
	</form> -->

	<div id="app">
        <create-component><?php echo e(csrf_field()); ?></create-component>
    </div>


<?php $__env->stopSection(); ?>
<?php echo $__env->make('layouts.app', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?><?php /**PATH /Users/anthonylam/Documents/Laravel/benchmark/resources/views/create.blade.php ENDPATH**/ ?>