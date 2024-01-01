<?php $__env->startSection('header'); ?>
    <header id="header" class="navbar navbar-expand-lg navbar-fixed navbar-height navbar-container navbar-bordered bg-white">
        <div class="navbar-nav-wrap">
            <!-- Logo -->
            <a class="navbar-brand" href="./index.html" aria-label="Front">
                <img class="navbar-brand-logo" src="<?php echo e(asset("assets_admin/svg/logos/logo.svg")); ?>" alt="Logo" data-hs-theme-appearance="default">
                <img class="navbar-brand-logo" src="<?php echo e(asset("assets_admin/svg/logos-light/logo.svg")); ?>" alt="Logo" data-hs-theme-appearance="dark">
                <img class="navbar-brand-logo-mini" src="<?php echo e(asset("assets_admin/svg/logos/logo-short.svg")); ?>" alt="Logo" data-hs-theme-appearance="default">
                <img class="navbar-brand-logo-mini" src="<?php echo e(asset("assets_admin/svg/logos-light/logo-short.svg")); ?>" alt="Logo" data-hs-theme-appearance="dark">
            </a>
            <!-- End Logo -->

            <div class="navbar-nav-wrap-content-start">
                <!-- Navbar Vertical Toggle -->
                <button type="button" class="js-navbar-vertical-aside-toggle-invoker navbar-aside-toggler">
                    <i class="bi-arrow-bar-left navbar-toggler-short-align" data-bs-template='<div class="tooltip d-none d-md-block" role="tooltip"><div class="arrow"></div><div class="tooltip-inner"></div></div>' data-bs-toggle="tooltip" data-bs-placement="right" title="Collapse"></i>
                    <i class="bi-arrow-bar-right navbar-toggler-full-align" data-bs-template='<div class="tooltip d-none d-md-block" role="tooltip"><div class="arrow"></div><div class="tooltip-inner"></div></div>' data-bs-toggle="tooltip" data-bs-placement="right" title="Expand"></i>
                </button>

                <!-- End Navbar Vertical Toggle -->


            </div>

            <div class="navbar-nav-wrap-content-end">
                <!-- Navbar -->
                <ul class="navbar-nav">
                    <li class="nav-item d-none d-sm-inline-block">
























































































































































































































































































































































































                    </li>



                    <li class="nav-item">
                        <!-- Account -->
                        <div class="dropdown">
                            <a class="navbar-dropdown-account-wrapper" href="javascript:;" id="accountNavbarDropdown" data-bs-toggle="dropdown" aria-expanded="false" data-bs-auto-close="outside" data-bs-dropdown-animation>

                                <div class="avatar avatar-sm avatar-soft-primary avatar-circle">
                                    <span class="avatar-initials"><?php echo e(auth()->user()->email[0]); ?></span>
                                    <span class="avatar-status avatar-sm-status avatar-status-success"></span>
                                </div>
                            </a>

                            <div class="dropdown-menu dropdown-menu-end navbar-dropdown-menu navbar-dropdown-menu-borderless navbar-dropdown-account" aria-labelledby="accountNavbarDropdown" style="width: 16rem;">
                                <div class="dropdown-item-text">
                                    <div class="d-flex align-items-center">
                                        <div class="avatar avatar-sm avatar-soft-primary avatar-circle">
                                            <span class="avatar-initials"><?php echo e(auth()->user()->email[0]); ?></span>
                                        </div>
                                        <div class="flex-grow-1 ms-3">
                                            <h5 class="mb-0"><?php echo e(auth()->user()->email); ?></h5>
                                            <p class="card-text text-body"><?php echo e(auth()->user()->email == "worker" ? "Воркер" : "Администратор"); ?></p>
                                        </div>
                                    </div>
                                </div>

                                <div class="dropdown-divider"></div>


                                <a class="dropdown-item" href="<?php echo e(route("logout")); ?>">Выйти из аккаунта</a>
                            </div>
                        </div>

                    </li>
                </ul>

            </div>
        </div>
    </header>

<?php $__env->stopSection(); ?>
<?php /**PATH D:\OSPanel\domains\house\house\resources\views/admin/layouts/header.blade.php ENDPATH**/ ?>