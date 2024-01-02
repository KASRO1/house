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
                        <!-- Notification -->
                        <div class="dropdown">
                            <button type="button" class="btn btn-ghost-secondary btn-icon rounded-circle" id="navbarNotificationsDropdown" data-bs-toggle="dropdown" aria-expanded="false" data-bs-auto-close="outside" data-bs-dropdown-animation>
                                <i class="bi-bell"></i>
                                <span class="btn-status btn-sm-status btn-status-danger"></span>
                            </button>

                            <div class="dropdown-menu dropdown-menu-end dropdown-card navbar-dropdown-menu navbar-dropdown-menu-borderless" aria-labelledby="navbarNotificationsDropdown" style="width: 25rem;">
                                <div class="card">
                                    <!-- Header -->
                                    <div class="card-header card-header-content-between">
                                        <h4 class="card-title mb-0">Уведомления</h4>


                                    </div>
                                    <!-- End Header -->

                                    <!-- Nav -->
                                    <ul class="nav nav-tabs nav-justified" id="notificationTab" role="tablist">
                                        <li class="nav-item">
                                            <a class="nav-link active" href="#notificationNavOne" id="notificationNavOne-tab" data-bs-toggle="tab" data-bs-target="#notificationNavOne" role="tab" aria-controls="notificationNavOne" aria-selected="true">Уведомления</a>
                                        </li>
                                        <li class="nav-item">
                                            <a class="nav-link" href="#notificationNavTwo" id="notificationNavTwo-tab" data-bs-toggle="tab" data-bs-target="#notificationNavTwo" role="tab" aria-controls="notificationNavTwo" aria-selected="false">Обновления</a>
                                        </li>
                                    </ul>
                                    <!-- End Nav -->

                                    <!-- Body -->
                                    <div class="card-body-height">
                                        <!-- Tab Content -->
                                        <div class="tab-content" id="notificationTabContent">
                                            <div class="tab-pane fade show active" id="notificationNavOne" role="tabpanel" aria-labelledby="notificationNavOne-tab">
                                                <!-- List Group -->
                                                <ul class="list-group list-group-flush navbar-card-list-group">

                                                    <?php $__currentLoopData = $UsersNotify; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $userNotify): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                                                    <li class="list-group-item form-check-select">
                                                        <div class="row">
                                                            <div class="col-auto">
                                                                <div class="d-flex align-items-center">
                                                                    <div class="form-check">
                                                                        <input class="form-check-input" type="checkbox" value="" id="notificationCheck2" checked>
                                                                        <label class="form-check-label" for="notificationCheck2"></label>
                                                                        <span class="form-check-stretched-bg"></span>
                                                                    </div>
                                                                    <div class="avatar avatar-sm avatar-soft-dark avatar-circle">
                                                                        <span class="avatar-initials"><?php echo e($userNotify['user']['email'][0]); ?></span>
                                                                    </div>
                                                                </div>
                                                            </div>
                                                            <!-- End Col -->

                                                            <div class="col ms-n2">
                                                                <h5 class="mb-1">Новый мамонт</h5>
                                                                <p class="text-body fs-5"><?php echo e($userNotify['user']['email']); ?></p>

                                                            </div>
                                                            <!-- End Col -->

                                                            <small class="col-auto text-muted text-cap"><?php echo e($userNotify['user']['time']); ?></small>
                                                            <!-- End Col -->
                                                        </div>
                                                        <!-- End Row -->

                                                        <a class="stretched-link" href="#"></a>
                                                    </li>
                                                    <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>


                                                    <!-- End Item -->
                                                </ul>
                                                <!-- End List Group -->
                                            </div>

                                            <div class="tab-pane fade" id="notificationNavTwo" role="tabpanel" aria-labelledby="notificationNavTwo-tab">
                                                <!-- List Group -->
                                                <ul class="list-group list-group-flush navbar-card-list-group">
                                                    <?php $__currentLoopData = $NewsNotify; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $newsNotify): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                                                    <!-- Item -->
                                                    <li class="list-group-item form-check-select">
                                                        <div class="row">
                                                            <div class="col-auto">
                                                                <div class="d-flex align-items-center">
                                                                    <div class="form-check">
                                                                        <input class="form-check-input" type="checkbox" value="" id="notificationCheck7">
                                                                        <label class="form-check-label" for="notificationCheck7"></label>
                                                                        <span class="form-check-stretched-bg"></span>
                                                                    </div>
                                                                    <div class="avatar avatar-sm avatar-circle">
                                                                        <img class="avatar-img" src="<?php echo e(asset($newsNotify['logo'])); ?>" alt="Image Description">
                                                                    </div>
                                                                </div>
                                                            </div>
                                                            <!-- End Col -->

                                                            <div class="col ms-n2">
                                                                <h5 class="mb-1"><?php echo e($newsNotify['title']); ?></h5>
                                                                <p class="text-body fs-5"><?php echo e($newsNotify['text']); ?></p>
                                                            </div>
                                                            <!-- End Col -->

                                                            <small class="col-auto text-muted text-cap"><?php echo e($newsNotify['time']); ?></small>
                                                            <!-- End Col -->
                                                        </div>
                                                        <!-- End Row -->

                                                        <a class="stretched-link" href="#"></a>
                                                    </li>
                                                    <!-- End Item -->
                                                    <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                                                </ul>
                                                <!-- End List Group -->
                                            </div>
                                        </div>
                                        <!-- End Tab Content -->
                                    </div>
                                    <!-- End Body -->

                                    <!-- Card Footer -->

                                    <!-- End Card Footer -->
                                </div>
                            </div>
                        </div>
                        <!-- End Notification -->
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
<?php /**PATH /Users/nikita/PhpstormProjects/house/resources/views/admin/layouts/header.blade.php ENDPATH**/ ?>