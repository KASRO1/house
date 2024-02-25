<?php $__env->startSection("selectUser"); ?>
<?php $__currentLoopData = $Users; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $user): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>

    <option
        value="<?php echo e($user['id']); ?>"
    >
        <?php echo e($user['email']); ?>

    </option>
<?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
<?php $__env->stopSection(); ?>
<?php /**PATH /Users/nikita/PhpstormProjects/house/resources/views/layouts/selectUser.blade.php ENDPATH**/ ?>