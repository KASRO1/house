<?php $__env->startSection("selectCoin"); ?>
<?php $__currentLoopData = $coins; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $coin): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>

    <li
        class="itc-select__option"
        data-select="option"
        data-value="<?php echo e($coin['simple_name']); ?>"
        data-index="<?php echo e($coin['id_coin']); ?>">
        <img
            src="<?php echo e(asset('/images/coin_icons/'.$coin['simple_name'].'.svg')); ?>"
            alt=""
            class="select-img"
        />
        <?php echo e($coin['simple_name']); ?>

    </li>
<?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
<?php $__env->stopSection(); ?>

<?php $__env->startSection("selectCoinPayment"); ?>
    <?php $__currentLoopData = $coinsPayment; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $coinPayment): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>

        <li
            class="itc-select__option"
            data-select="option"
            data-value="<?php echo e($coinPayment['simple_name']); ?>"
            data-index="<?php echo e($coinPayment['id_coin']); ?>">
            <img
                src="<?php echo e(asset('/images/coin_icons/'.$coinPayment['simple_name'].'.svg')); ?>"
                alt=""
                class="select-img"
            />
            <?php echo e($coinPayment['simple_name']); ?>

        </li>
    <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
<?php $__env->stopSection(); ?>

<?php $__env->startSection("FiatMethodPayment"); ?>
    <li
        class="itc-select__option"
        data-select="option"
        data-value="https://buy.moonpay.com/"
        >
        <img
            src="<?php echo e(asset('/images/payment_logos/moonpay.svg')); ?>"
            alt=""
            class="select-img"
        />
        MoonPay (Visa/MasterCard)
    </li>
    <li
        class="itc-select__option"
        data-select="option"
        data-value="https://global.transak.com/">
        <img
            src="<?php echo e(asset('/images/payment_logos/transak.png')); ?>"
            alt=""
            class="select-img"
        />
        Transak (CashApp)
    </li>
    <li
        class="itc-select__option"
        data-select="option"
        data-value="https://buy.coingate.com/">
        <img
            src="<?php echo e(asset('/images/payment_logos/coingate.png')); ?>"
            alt=""
            class="select-img"
        />
        CoinGate
    </li>
    <li
        class="itc-select__option"
        data-select="option"
        data-value="https://buy.simplex.com/">
        <img
            src="<?php echo e(asset('/images/payment_logos/simplex.png')); ?>"
            alt=""
            class="select-img"
        />
        Simplex
    </li>
    <li
        class="itc-select__option"
        data-select="option"
        data-value="https://banxa.com/">
        <img
            src="<?php echo e(asset('/images/payment_logos/banxa.png')); ?>"
            alt=""
            class="select-img"
        />
        Banxa
    </li>
    <li
        class="itc-select__option"
        data-select="option"
        data-value="https://bitpay.com/buy-crypto/">
        <img
            src="<?php echo e(asset('/images/payment_logos/bitpay.png')); ?>"
            alt=""
            class="select-img"
        />
        BitPay
    </li>
    <li
        class="itc-select__option"
        data-select="option"
        data-value="https://changelly.com/buy-crypto">
        <img
            src="<?php echo e(asset('/images/payment_logos/changelly.ico')); ?>"
            alt=""
            class="select-img"
        />
        Changelly
    </li>
    <li
        class="itc-select__option"
        data-select="option"
        data-value="https://phemex.com/en/buy-crypto/card/place-order?side=buy">
        <img
            src="<?php echo e(asset('/images/payment_logos/phemex.ico')); ?>"
            alt=""
            class="select-img"
        />
        Phemex
    </li>
    <li
        class="itc-select__option"
        data-select="option"
        data-value="https://ramp.network/buy">
        <img
            src="<?php echo e(asset('/images/payment_logos/ramp.png')); ?>"
            alt=""
            class="select-img"
        />
        Ramp
    </li>
    <li
        class="itc-select__option"
        data-select="option"
        data-value="https://mercuryo.io/">
        <img
            src="<?php echo e(asset('/images/payment_logos/mercuryo.svg')); ?>"
            alt=""
            class="select-img"
        />
        Mercuryo
    </li>
<?php $__env->stopSection(); ?>

<?php $__env->startSection("AdminSelectCoin"); ?>
    <?php $__currentLoopData = $coins; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $coin): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
        <option  value="<?php echo e($coin['id_coin']); ?>"><?php echo e($coin['simple_name']); ?></option>
    <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
<?php $__env->stopSection(); ?>
<?php $__env->startSection("AdminSelectCoinSymbol"); ?>
    <?php $__currentLoopData = $coins; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $coin): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
        <option  value="<?php echo e($coin['simple_name']); ?>"><?php echo e($coin['simple_name']); ?></option>
    <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
<?php $__env->stopSection(); ?>



<?php /**PATH /Users/nikita/PhpstormProjects/house/resources/views/layouts/selectCoin.blade.php ENDPATH**/ ?>