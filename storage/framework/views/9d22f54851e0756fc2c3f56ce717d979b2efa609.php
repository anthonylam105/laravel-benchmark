<?php $__env->startSection('content'); ?>

	<div id="app">
        <user-form user_id="<?php echo e($id); ?>"><?php echo e(csrf_field()); ?></user-form>
    </div>

<?php $__env->stopSection(); ?>
<?php echo $__env->make('layouts.app', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?><?php /**PATH /Users/anthonylam/Documents/Laravel/benchmark/resources/views/edit.blade.php ENDPATH**/ ?>