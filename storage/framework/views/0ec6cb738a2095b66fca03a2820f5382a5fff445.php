<?php $__env->startSection('content'); ?>

	<div id="app">
        <show-component user_id="<?php echo e($id); ?>"></show-component>
    </div>
	
<?php $__env->stopSection(); ?>
<?php echo $__env->make('layouts.app', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?><?php /**PATH /Users/anthonylam/Documents/Laravel/benchmark/resources/views/show.blade.php ENDPATH**/ ?>