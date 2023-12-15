<?php $__env->startSection("selectCoin"); ?>
<?php $__currentLoopData = $coins; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $coin): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>

    <li
        class="itc-select__option"
        data-select="option"
        data-value="<?php echo e($coin['simple_name']); ?>"
        data-index="0">
        <img
            src="<?php echo e(asset('/images/coin_icons/'.strtolower($coin['simple_name']).'.svg')); ?>"
            alt=""
            class="select-img"
        />
        <?php echo e($coin['simple_name']); ?>

    </li>
<?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
<?php $__env->stopSection(); ?>
<?php /**PATH /Users/nikita/PhpstormProjects/house/resources/views/layouts/selectCoin.blade.php ENDPATH**/ ?>