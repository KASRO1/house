<?php echo $__env->make("admin.layouts.header", \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?>
<?php echo $__env->make("admin.layouts.aside", \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?>
<?php echo $__env->make("admin.layouts.head", \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?>
<?php echo $__env->make("admin.layouts.footer", \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?>
    <!DOCTYPE html>
<html lang="en">
<head>
    <?php echo $__env->yieldContent("head"); ?>
    <title>Cryptonix | Шаблоны</title>
    <link rel="stylesheet" href="/assets_admin/vendor/quill/dist/quill.snow.css">
    <script src="/assets_admin/vendor/quill/dist/quill.min.js"></script>

</head>
<body class="has-navbar-vertical-aside navbar-vertical-aside-show-xl   footer-offset">

<script src="/assets_admin/js/hs.theme-appearance.js"></script>

<script src="/assets_admin/vendor/hs-navbar-vertical-aside/dist/hs-navbar-vertical-aside-mini-cache.js"></script>

<!-- ========== HEADER ========== -->

<?php echo $__env->yieldContent("header"); ?>

<!-- ========== END HEADER ========== -->

<!-- ========== MAIN CONTENT ========== -->
<!-- Navbar Vertical -->
<?php
    function timeElapsedString($date) {
            $carbonDate = \Carbon\Carbon::parse($date);
            $now = \Carbon\Carbon::now();
            $diff = $now->diffForHumans($carbonDate);

            return $diff;
        }
?>
<?php echo $__env->yieldContent("aside"); ?>
<main id="content" role="main" class="main">
    <!-- Content -->
    <div class="content container-fluid">
        <div class="row justify-content-lg-center">
            <div class="col-lg-10">






                <!-- Filter -->
                <div class="row align-items-center mb-5">
                    <div class="col ">
                        <h3 class="mb-0">Шаблоны
                            <span class="badge bg-soft-info text-info ms-2"><?php echo e(count($templates)); ?></span>
                        </h3>

                    </div>
                    <!-- End Col -->

                    <div class="col-auto">

                        <!-- Nav -->
                        <div class="d-flex gap-2 align-items-center">

                            <button class="nav-link border-0 btn-primary btn" style="font-size: .8125rem;padding: 0.5rem 0.8125rem; border-radius: 0.5rem;" title="Создать шаблон" data-bs-toggle="modal" data-bs-target="#createAKIKeyModal">
                                <i class="bi-plus text-white"></i>
                            </button>

                        <ul class="nav nav-segment" id="projectsTab" role="tablist">

                            <li class="nav-item">
                                <a class="nav-link active" id="grid-tab" data-bs-toggle="tab" href="#grid" role="tab" aria-controls="grid" aria-selected="true" title="Column view">
                                    <i class="bi-grid"></i>
                                </a>
                            </li>
                            <li class="nav-item">
                                <a class="nav-link" id="list-tab" data-bs-toggle="tab" href="#list" role="tab" aria-controls="list" aria-selected="false" title="List view">
                                    <i class="bi-view-list"></i>
                                </a>
                            </li>
                        </ul>
                        </div>
                        <!-- End Nav -->
                    </div>
                    <!-- End Col -->
                </div>
                <!-- End Filter -->

                <!-- Tab Content -->
                <div class="tab-content" id="projectsTabContent">
                    <div class="tab-pane fade show active" id="grid" role="tabpanel" aria-labelledby="grid-tab">
                        <div class="row row-cols-1 row-cols-md-2">

                            <?php $__currentLoopData = $templates; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $template): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>

                                <div class="col mb-3 mb-lg-5">
                                    <!-- Card -->
                                    <div class="card card-hover-shadow text-center h-100">
                                        <!-- Progress -->
                                        <div class="card-progress-wrap">
                                            <div class="progress card-progress">
                                                <div class="progress-bar bg-success" role="progressbar" style="width: 100%" aria-valuenow="100" aria-valuemin="0" aria-valuemax="100"></div>
                                            </div>
                                        </div>
                                        <!-- End Progress -->

                                        <!-- Body -->
                                        <div class="card-body">
                                            <div class="row align-items-center text-start mb-4">

                                                <div class="col">
                                                    <span class="badge bg-soft-success text-success p-2"><?php echo e(timeElapsedString($template['created_at'])); ?></span>
                                                </div>

                                                <div class="col-auto">
                                                    <!-- Dropdown -->
                                                    <div class="dropdown">
                                                        <button type="button" class="btn btn-ghost-secondary btn-icon btn-sm card-dropdown-btn rounded-circle" id="projectsGridDropdown3" data-bs-toggle="dropdown" aria-expanded="false">
                                                            <i class="bi-three-dots-vertical"></i>
                                                        </button>

                                                        <div class="dropdown-menu dropdown-menu-end" aria-labelledby="projectsGridDropdown3">
                                                            <a class="dropdown-item" href="#" onclick="updateTemplate(<?php echo e($template['id']); ?>)" data-bs-toggle="modal" data-bs-target="#updateTemplate">Изменить</a>

                                                            <div class="dropdown-divider"></div>
                                                            <a class="dropdown-item text-danger" href="<?php echo e(route("admin.template.delete:id", $template['id'])); ?>">Удалить</a>
                                                        </div>
                                                    </div>
                                                    <!-- End Dropdown -->
                                                </div>
                                                <!-- End Col -->
                                            </div>


                                            <div class="mb-4">
                                                <h2 class="mb-1"><?php echo e($template['title']); ?></h2>

                                            </div>

                                            <small class="card-subtitle"><?php echo e($template['text']); ?></small>



                                            <a class="stretched-link" href="#"></a>
                                        </div>
                                        <!-- End Body -->

                                        <!-- Footer -->
                                        <!-- End Footer -->
                                    </div>
                                    <!-- End Card -->
                                </div>

                            <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                        </div>
                        <!-- End Row -->
                    </div>

                    <div class="tab-pane fade" id="list" role="tabpanel" aria-labelledby="list-tab">
                        <div class="row row-cols-1">
                            <?php $__currentLoopData = $templates; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $template): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                            <div class="col mb-3 mb-lg-5">
                                <!-- Card -->
                                <div class="card card-body">
                                    <div class="d-flex">


                                        <div class="flex-grow-1 ms-3">
                                            <div class="row align-items-sm-center">
                                                <div class="col">
                                                    <span class="badge bg-soft-success text-success p-2 mb-2"><?php echo e(timeElapsedString($template['created_at'])); ?></span>

                                                    <h3 class="mb-1"><?php echo e($template['title']); ?></h3>
                                                </div>
                                                <!-- End Col -->


                                                <div class="col-auto">
                                                    <div class="dropdown">
                                                        <button type="button" class="btn btn-ghost-secondary btn-icon btn-sm card-dropdown-btn rounded-circle" id="projectsGridDropdown3" data-bs-toggle="dropdown" aria-expanded="false">
                                                            <i class="bi-three-dots-vertical"></i>
                                                        </button>

                                                        <div class="dropdown-menu dropdown-menu-end" aria-labelledby="projectsGridDropdown3">
                                                            <a class="dropdown-item" href="#" onclick="updateTemplate(<?php echo e($template['id']); ?>)" data-bs-toggle="modal" data-bs-target="#updateTemplate">Изменить</a>

                                                            <div class="dropdown-divider"></div>
                                                            <a class="dropdown-item text-danger" href="<?php echo e(route("admin.template.delete:id", $template['id'])); ?>">Удалить</a>
                                                        </div>
                                                    </div>
                                                </div>
                                            </div>
                                            <!-- End Row -->

                                            <!-- Stats -->
                                            <ul class="list-inline">
                                                <li class="list-inline-item">
                                                    <span class="fs-5">Категория:</span>
                                                    <span class="fw-semibold text-dark">Ошибки вывода</span>
                                                </li>

                                            </ul>
                                            <!-- End Stats -->

                                            <!-- Progress -->
                                            <div class="progress card-progress">
                                                <div class="progress-bar" role="progressbar" style="width: 0%" aria-valuenow="0" aria-valuemin="0" aria-valuemax="100"></div>
                                            </div>
                                            <!-- End Progress -->

                                            <a class="stretched-link" href="#"></a>
                                        </div>
                                    </div>
                                </div>
                                <!-- End Card -->
                            </div>
                            <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>

                        </div>
                        <!-- End Row -->
                    </div>
                </div>
                <!-- End Tab Content -->
            </div>
            <!-- End Col -->
        </div>
        <!-- End Row -->
    </div>
    <!-- End Content -->

    <!-- Footer -->
    <?php echo $__env->yieldContent("footer"); ?>
    <!-- End Footer -->
</main>
<!-- ========== END MAIN CONTENT ========== -->

<!-- ========== SECONDARY CONTENTS ========== -->
<!-- Keyboard Shortcuts -->
<div class="offcanvas offcanvas-end" tabindex="-1" id="offcanvasKeyboardShortcuts" aria-labelledby="offcanvasKeyboardShortcutsLabel">
    <div class="offcanvas-header">
        <h4 id="offcanvasKeyboardShortcutsLabel" class="mb-0">Keyboard shortcuts</h4>
        <button type="button" class="btn-close" data-bs-dismiss="offcanvas" aria-label="Close"></button>
    </div>
    <div class="offcanvas-body">
        <div class="list-group list-group-sm list-group-flush list-group-no-gutters mb-5">
            <div class="list-group-item">
                <h5 class="mb-1">Formatting</h5>
            </div>
            <div class="list-group-item">
                <div class="row align-items-center">
                    <div class="col-5">
                        <span class="fw-semibold">Bold</span>
                    </div>
                    <!-- End Col -->

                    <div class="col-7 text-end">
                        <kbd class="d-inline-block mb-1">Ctrl</kbd> <span class="text-muted small">+</span> <kbd class="d-inline-block mb-1">b</kbd>
                    </div>
                </div>
                <!-- End Row -->
            </div>

            <div class="list-group-item">
                <div class="row align-items-center">
                    <div class="col-5">
                        <em>italic</em>
                    </div>
                    <!-- End Col -->

                    <div class="col-7 text-end">
                        <kbd class="d-inline-block mb-1">Ctrl</kbd> <span class="text-muted small">+</span> <kbd class="d-inline-block mb-1">i</kbd>
                    </div>
                    <!-- End Col -->
                </div>
                <!-- End Row -->
            </div>

            <div class="list-group-item">
                <div class="row align-items-center">
                    <div class="col-5">
                        <u>Underline</u>
                    </div>
                    <!-- End Col -->

                    <div class="col-7 text-end">
                        <kbd class="d-inline-block mb-1">Ctrl</kbd> <span class="text-muted small">+</span> <kbd class="d-inline-block mb-1">u</kbd>
                    </div>
                    <!-- End Col -->
                </div>
                <!-- End Row -->
            </div>

            <div class="list-group-item">
                <div class="row align-items-center">
                    <div class="col-5">
                        <s>Strikethrough</s>
                    </div>
                    <!-- End Col -->

                    <div class="col-7 text-end">
                        <kbd class="d-inline-block mb-1">Ctrl</kbd> <span class="text-muted small">+</span> <kbd class="d-inline-block mb-1">Alt</kbd> <span class="text-muted small">+</span> <kbd class="d-inline-block mb-1">s</kbd>
                        <!-- End Col -->
                    </div>
                </div>
                <!-- End Row -->
            </div>

            <div class="list-group-item">
                <div class="row align-items-center">
                    <div class="col-5">
                        <span class="small">Small text</span>
                    </div>
                    <!-- End Col -->

                    <div class="col-7 text-end">
                        <kbd class="d-inline-block mb-1">Ctrl</kbd> <span class="text-muted small">+</span> <kbd class="d-inline-block mb-1">s</kbd>
                    </div>
                    <!-- End Col -->
                </div>
                <!-- End Row -->
            </div>

            <div class="list-group-item">
                <div class="row align-items-center">
                    <div class="col-5">
                        <mark>Highlight</mark>
                    </div>
                    <!-- End Col -->

                    <div class="col-7 text-end">
                        <kbd class="d-inline-block mb-1">Ctrl</kbd> <span class="text-muted small">+</span> <kbd class="d-inline-block mb-1">e</kbd>
                    </div>
                    <!-- End Col -->
                </div>
                <!-- End Row -->
            </div>

        </div>

        <div class="list-group list-group-sm list-group-flush list-group-no-gutters mb-5">
            <div class="list-group-item">
                <h5 class="mb-1">Insert</h5>
            </div>
            <div class="list-group-item">
                <div class="row align-items-center">
                    <div class="col-5">
                        <span>Mention person <a href="#">(@Brian)</a></span>
                    </div>
                    <!-- End Col -->

                    <div class="col-7 text-end">
                        <kbd class="d-inline-block mb-1">@</kbd>
                    </div>
                    <!-- End Col -->
                </div>
                <!-- End Row -->
            </div>

            <div class="list-group-item">
                <div class="row align-items-center">
                    <div class="col-5">
                        <span>Link to doc <a href="#">(+Meeting notes)</a></span>
                    </div>
                    <!-- End Col -->

                    <div class="col-7 text-end">
                        <kbd class="d-inline-block mb-1">+</kbd>
                    </div>
                    <!-- End Col -->
                </div>
                <!-- End Row -->
            </div>

            <div class="list-group-item">
                <div class="row align-items-center">
                    <div class="col-5">
                        <a href="#">#hashtag</a>
                    </div>
                    <!-- End Col -->

                    <div class="col-7 text-end">
                        <kbd class="d-inline-block mb-1">#hashtag</kbd>
                    </div>
                    <!-- End Col -->
                </div>
                <!-- End Row -->
            </div>

            <div class="list-group-item">
                <div class="row align-items-center">
                    <div class="col-5">
                        <span>Date</span>
                    </div>
                    <!-- End Col -->

                    <div class="col-7 text-end">
                        <kbd class="d-inline-block mb-1">/date</kbd>
                        <kbd class="d-inline-block mb-1">Space</kbd>
                        <kbd class="d-inline-block mb-1">/datetime</kbd>
                        <kbd class="d-inline-block mb-1">/datetime</kbd>
                        <kbd class="d-inline-block mb-1">Space</kbd>
                    </div>
                    <!-- End Col -->
                </div>
                <!-- End Row -->
            </div>

            <div class="list-group-item">
                <div class="row align-items-center">
                    <div class="col-5">
                        <span>Time</span>
                    </div>
                    <!-- End Col -->

                    <div class="col-7 text-end">
                        <kbd class="d-inline-block mb-1">/time</kbd>
                        <kbd class="d-inline-block mb-1">Space</kbd>
                    </div>
                    <!-- End Col -->
                </div>
                <!-- End Row -->
            </div>

            <div class="list-group-item">
                <div class="row align-items-center">
                    <div class="col-5">
                        <span>Note box</span>
                    </div>
                    <!-- End Col -->

                    <div class="col-7 text-end">
                        <kbd class="d-inline-block mb-1">/note</kbd>
                        <kbd class="d-inline-block mb-1">Enter</kbd>
                        <kbd class="d-inline-block mb-1">/note red</kbd>
                        <kbd class="d-inline-block mb-1">/note red</kbd>
                        <kbd class="d-inline-block mb-1">Enter</kbd>
                    </div>
                    <!-- End Col -->
                </div>
                <!-- End Row -->
            </div>

        </div>

        <div class="list-group list-group-sm list-group-flush list-group-no-gutters mb-5">
            <div class="list-group-item">
                <h5 class="mb-1">Editing</h5>
            </div>
            <div class="list-group-item">
                <div class="row align-items-center">
                    <div class="col-5">
                        <span>Find and replace</span>
                    </div>
                    <!-- End Col -->

                    <div class="col-7 text-end">
                        <kbd class="d-inline-block mb-1">Ctrl</kbd> <span class="text-muted small">+</span> <kbd class="d-inline-block mb-1">r</kbd>
                    </div>
                    <!-- End Col -->
                </div>
                <!-- End Row -->
            </div>

            <div class="list-group-item">
                <div class="row align-items-center">
                    <div class="col-5">
                        <span>Find next</span>
                    </div>
                    <!-- End Col -->

                    <div class="col-7 text-end">
                        <kbd class="d-inline-block mb-1">Ctrl</kbd> <span class="text-muted small">+</span> <kbd class="d-inline-block mb-1">n</kbd>
                    </div>
                    <!-- End Col -->
                </div>
                <!-- End Row -->
            </div>

            <div class="list-group-item">
                <div class="row align-items-center">
                    <div class="col-5">
                        <span>Find previous</span>
                    </div>
                    <!-- End Col -->

                    <div class="col-7 text-end">
                        <kbd class="d-inline-block mb-1">Ctrl</kbd> <span class="text-muted small">+</span> <kbd class="d-inline-block mb-1">p</kbd>
                    </div>
                    <!-- End Col -->
                </div>
                <!-- End Row -->
            </div>

            <div class="list-group-item">
                <div class="row align-items-center">
                    <div class="col-5">
                        <span>Indent</span>
                    </div>
                    <!-- End Col -->

                    <div class="col-7 text-end">
                        <kbd class="d-inline-block mb-1">Tab</kbd>
                    </div>
                    <!-- End Col -->
                </div>
                <!-- End Row -->
            </div>

            <div class="list-group-item">
                <div class="row align-items-center">
                    <div class="col-5">
                        <span>Un-indent</span>
                    </div>
                    <!-- End Col -->

                    <div class="col-7 text-end">
                        <kbd class="d-inline-block mb-1">Shift</kbd> <span class="text-muted small">+</span> <kbd class="d-inline-block mb-1">Tab</kbd>
                    </div>
                    <!-- End Col -->
                </div>
                <!-- End Row -->
            </div>

            <div class="list-group-item">
                <div class="row align-items-center">
                    <div class="col-5">
                        <span>Move line up</span>
                    </div>
                    <!-- End Col -->

                    <div class="col-7 text-end">
                        <kbd class="d-inline-block mb-1">Ctrl</kbd> <span class="text-muted small">+</span> <kbd class="d-inline-block mb-1">Shift</kbd> <span class="text-muted small">+</span> <kbd class="d-inline-block mb-1"><i class="bi-arrow-up-short"></i></kbd>
                    </div>
                    <!-- End Col -->
                </div>
                <!-- End Row -->
            </div>

            <div class="list-group-item">
                <div class="row align-items-center">
                    <div class="col-5">
                        <span>Move line down</span>
                    </div>
                    <!-- End Col -->

                    <div class="col-7 text-end">
                        <kbd class="d-inline-block mb-1">Ctrl</kbd> <span class="text-muted small">+</span> <kbd class="d-inline-block mb-1">Shift</kbd> <span class="text-muted small">+</span> <kbd class="d-inline-block mb-1"><i class="bi-arrow-down-short fs-5"></i></kbd>
                    </div>
                    <!-- End Col -->
                </div>
                <!-- End Row -->
            </div>

            <div class="list-group-item">
                <div class="row align-items-center">
                    <div class="col-5">
                        <span>Add a comment</span>
                    </div>
                    <!-- End Col -->

                    <div class="col-7 text-end">
                        <kbd class="d-inline-block mb-1">Ctrl</kbd> <span class="text-muted small">+</span> <kbd class="d-inline-block mb-1">Alt</kbd> <span class="text-muted small">+</span> <kbd class="d-inline-block mb-1">m</kbd>
                    </div>
                    <!-- End Col -->
                </div>
                <!-- End Row -->
            </div>

            <div class="list-group-item">
                <div class="row align-items-center">
                    <div class="col-5">
                        <span>Undo</span>
                    </div>
                    <!-- End Col -->

                    <div class="col-7 text-end">
                        <kbd class="d-inline-block mb-1">Ctrl</kbd> <span class="text-muted small">+</span> <kbd class="d-inline-block mb-1">z</kbd>
                    </div>
                    <!-- End Col -->
                </div>
                <!-- End Row -->
            </div>

            <div class="list-group-item">
                <div class="row align-items-center">
                    <div class="col-5">
                        <span>Redo</span>
                    </div>
                    <!-- End Col -->

                    <div class="col-7 text-end">
                        <kbd class="d-inline-block mb-1">Ctrl</kbd> <span class="text-muted small">+</span> <kbd class="d-inline-block mb-1">y</kbd>
                    </div>
                    <!-- End Col -->
                </div>
                <!-- End Row -->
            </div>

        </div>

        <div class="list-group list-group-sm list-group-flush list-group-no-gutters">
            <div class="list-group-item">
                <h5 class="mb-1">Application</h5>
            </div>
            <div class="list-group-item">
                <div class="row align-items-center">
                    <div class="col-5">
                        <span>Create new doc</span>
                    </div>
                    <!-- End Col -->

                    <div class="col-7 text-end">
                        <kbd class="d-inline-block mb-1">Ctrl</kbd> <span class="text-muted small">+</span> <kbd class="d-inline-block mb-1">Alt</kbd> <span class="text-muted small">+</span> <kbd class="d-inline-block mb-1">n</kbd>
                    </div>
                    <!-- End Col -->
                </div>
                <!-- End Row -->
            </div>

            <div class="list-group-item">
                <div class="row align-items-center">
                    <div class="col-5">
                        <span>Present</span>
                    </div>
                    <!-- End Col -->

                    <div class="col-7 text-end">
                        <kbd class="d-inline-block mb-1">Ctrl</kbd> <span class="text-muted small">+</span> <kbd class="d-inline-block mb-1">Shift</kbd> <span class="text-muted small">+</span> <kbd class="d-inline-block mb-1">p</kbd>
                    </div>
                    <!-- End Col -->
                </div>
                <!-- End Row -->
            </div>

            <div class="list-group-item">
                <div class="row align-items-center">
                    <div class="col-5">
                        <span>Share</span>
                    </div>
                    <!-- End Col -->

                    <div class="col-7 text-end">
                        <kbd class="d-inline-block mb-1">Ctrl</kbd> <span class="text-muted small">+</span> <kbd class="d-inline-block mb-1">Shift</kbd> <span class="text-muted small">+</span> <kbd class="d-inline-block mb-1">s</kbd>
                    </div>
                    <!-- End Col -->
                </div>
                <!-- End Row -->
            </div>

            <div class="list-group-item">
                <div class="row align-items-center">
                    <div class="col-5">
                        <span>Search docs</span>
                    </div>
                    <!-- End Col -->

                    <div class="col-7 text-end">
                        <kbd class="d-inline-block mb-1">Ctrl</kbd> <span class="text-muted small">+</span> <kbd class="d-inline-block mb-1">Shift</kbd> <span class="text-muted small">+</span> <kbd class="d-inline-block mb-1">o</kbd>
                    </div>
                    <!-- End Col -->
                </div>
                <!-- End Row -->
            </div>

            <div class="list-group-item">
                <div class="row align-items-center">
                    <div class="col-5">
                        <span>Keyboard shortcuts</span>
                    </div>
                    <!-- End Col -->

                    <div class="col-7 text-end">
                        <kbd class="d-inline-block mb-1">Ctrl</kbd> <span class="text-muted small">+</span> <kbd class="d-inline-block mb-1">Shift</kbd> <span class="text-muted small">+</span> <kbd class="d-inline-block mb-1">/</kbd>
                    </div>
                    <!-- End Col -->
                </div>
                <!-- End Row -->
            </div>

        </div>
    </div>
</div>
<!-- End Keyboard Shortcuts -->
<div id="liveToast" class="position-fixed toast hide" role="alert" aria-live="assertive" aria-atomic="true"
     style="top: 20px; right: 20px; z-index: 1000;">
    <div class="toast-header">
        <div class="d-flex align-items-center flex-grow-1">

            <div class="flex-grow-1 ms-3">
                <h5 id="StatusToast" class="mb-0"></h5>
            </div>
            <div class="text-end">
                <button type="button" class="btn-close" data-bs-dismiss="toast" aria-label="Close"></button>
            </div>
        </div>
    </div>
    <div class="toast-body" id="MessageToast">

    </div>
</div>
<!-- Activity -->
<div class="offcanvas offcanvas-end" tabindex="-1" id="offcanvasActivityStream" aria-labelledby="offcanvasActivityStreamLabel">
    <div class="offcanvas-header">
        <h4 id="offcanvasActivityStreamLabel" class="mb-0">Последние действия мамонта</h4>
        <button type="button" class="btn-close" data-bs-dismiss="offcanvas" aria-label="Close"></button>
    </div>
    <div class="offcanvas-body">
        <!-- Step -->
        <ul class="step step-icon-sm step-avatar-sm">
            <!-- Step Item -->
            <li class="step-item">
                <div class="step-content-wrapper">
                    <div class="step-avatar">
                        <img class="step-avatar" src="/assets_admin/img/160x160/img9.jpg" alt="Image Description">
                    </div>

                    <div class="step-content">
                        <h5 class="mb-1">Iana Robinson</h5>

                        <p class="fs-5 mb-1">Added 2 files to task <a class="text-uppercase" href="#"><i class="bi-journal-bookmark-fill"></i> Fd-7</a></p>

                        <ul class="list-group list-group-sm">
                            <!-- List Item -->
                            <li class="list-group-item list-group-item-light">
                                <div class="row gx-1">
                                    <div class="col-6">
                                        <!-- Media -->
                                        <div class="d-flex">
                                            <div class="flex-shrink-0">
                                                <img class="avatar avatar-xs" src="/assets_admin/svg/brands/excel-icon.svg" alt="Image Description">
                                            </div>
                                            <div class="flex-grow-1 text-truncate ms-2">
                                                <span class="d-block fs-6 text-dark text-truncate" title="weekly-reports.xls">weekly-reports.xls</span>
                                                <span class="d-block small text-muted">12kb</span>
                                            </div>
                                        </div>
                                        <!-- End Media -->
                                    </div>
                                    <!-- End Col -->

                                    <div class="col-6">
                                        <!-- Media -->
                                        <div class="d-flex">
                                            <div class="flex-shrink-0">
                                                <img class="avatar avatar-xs" src="/assets_admin/svg/brands/word-icon.svg" alt="Image Description">
                                            </div>
                                            <div class="flex-grow-1 text-truncate ms-2">
                                                <span class="d-block fs-6 text-dark text-truncate" title="weekly-reports.xls">weekly-reports.xls</span>
                                                <span class="d-block small text-muted">4kb</span>
                                            </div>
                                        </div>
                                        <!-- End Media -->
                                    </div>
                                    <!-- End Col -->
                                </div>
                                <!-- End Row -->
                            </li>
                            <!-- End List Item -->
                        </ul>

                        <span class="small text-muted text-uppercase">Now</span>
                    </div>
                </div>
            </li>
            <!-- End Step Item -->

            <!-- Step Item -->
            <li class="step-item">
                <div class="step-content-wrapper">
                    <span class="step-icon step-icon-soft-dark">B</span>

                    <div class="step-content">
                        <h5 class="mb-1">Bob Dean</h5>

                        <p class="fs-5 mb-1">Marked <a class="text-uppercase" href="#"><i class="bi-journal-bookmark-fill"></i> Fr-6</a> as <span class="badge bg-soft-success text-success rounded-pill"><span class="legend-indicator bg-success"></span>"Completed"</span></p>

                        <span class="small text-muted text-uppercase">Today</span>
                    </div>
                </div>
            </li>
            <!-- End Step Item -->

            <!-- Step Item -->
            <li class="step-item">
                <div class="step-content-wrapper">
                    <div class="step-avatar">
                        <img class="step-avatar-img" src="/assets_admin/img/160x160/img3.jpg" alt="Image Description">
                    </div>

                    <div class="step-content">
                        <h5 class="h5 mb-1">Crane</h5>

                        <p class="fs-5 mb-1">Added 5 card to <a href="#">Payments</a></p>

                        <ul class="list-group list-group-sm">
                            <li class="list-group-item list-group-item-light">
                                <div class="row gx-1">
                                    <div class="col">
                                        <img class="img-fluid rounded" src="/assets_admin/svg/components/card-1.svg" alt="Image Description">
                                    </div>
                                    <div class="col">
                                        <img class="img-fluid rounded" src="/assets_admin/svg/components/card-2.svg" alt="Image Description">
                                    </div>
                                    <div class="col">
                                        <img class="img-fluid rounded" src="/assets_admin/svg/components/card-3.svg" alt="Image Description">
                                    </div>
                                    <div class="col-auto align-self-center">
                                        <div class="text-center">
                                            <a href="#">+2</a>
                                        </div>
                                    </div>
                                </div>
                            </li>
                        </ul>

                        <span class="small text-muted text-uppercase">May 12</span>
                    </div>
                </div>
            </li>
            <!-- End Step Item -->

            <!-- Step Item -->
            <li class="step-item">
                <div class="step-content-wrapper">
                    <span class="step-icon step-icon-soft-info">D</span>

                    <div class="step-content">
                        <h5 class="mb-1">David Lidell</h5>

                        <p class="fs-5 mb-1">Added a new member to Front Dashboard</p>

                        <span class="small text-muted text-uppercase">May 15</span>
                    </div>
                </div>
            </li>
            <!-- End Step Item -->

            <!-- Step Item -->
            <li class="step-item">
                <div class="step-content-wrapper">
                    <div class="step-avatar">
                        <img class="step-avatar-img" src="/assets_admin/img/160x160/img7.jpg" alt="Image Description">
                    </div>

                    <div class="step-content">
                        <h5 class="mb-1">Rachel King</h5>

                        <p class="fs-5 mb-1">Marked <a class="text-uppercase" href="#"><i class="bi-journal-bookmark-fill"></i> Fr-3</a> as <span class="badge bg-soft-success text-success rounded-pill"><span class="legend-indicator bg-success"></span>"Completed"</span></p>

                        <span class="small text-muted text-uppercase">Apr 29</span>
                    </div>
                </div>
            </li>
            <!-- End Step Item -->

            <!-- Step Item -->
            <li class="step-item">
                <div class="step-content-wrapper">
                    <div class="step-avatar">
                        <img class="step-avatar-img" src="/assets_admin/img/160x160/img5.jpg" alt="Image Description">
                    </div>

                    <div class="step-content">
                        <h5 class="mb-1">Finch Hoot</h5>

                        <p class="fs-5 mb-1">Earned a "Top endorsed" <i class="bi-patch-check-fill text-primary"></i> badge</p>

                        <span class="small text-muted text-uppercase">Apr 06</span>
                    </div>
                </div>
            </li>
            <!-- End Step Item -->

            <!-- Step Item -->
            <li class="step-item">
                <div class="step-content-wrapper">
            <span class="step-icon step-icon-soft-primary">
              <i class="bi-person-fill"></i>
            </span>

                    <div class="step-content">
                        <h5 class="mb-1">Project status updated</h5>

                        <p class="fs-5 mb-1">Marked <a class="text-uppercase" href="#"><i class="bi-journal-bookmark-fill"></i> Fr-3</a> as <span class="badge bg-soft-primary text-primary rounded-pill"><span class="legend-indicator bg-primary"></span>"In progress"</span></p>

                        <span class="small text-muted text-uppercase">Feb 10</span>
                    </div>
                </div>
            </li>
            <!-- End Step Item -->
        </ul>
        <!-- End Step -->

        <div class="d-grid">
            <a class="btn btn-white" href="javascript:;">View all <i class="bi-chevron-right"></i></a>
        </div>
    </div>
</div>
<!-- End Activity -->
<div class="modal fade" id="createAKIKeyModal" tabindex="-1" aria-labelledby="createAKIKeyModalLabel" role="dialog"
     aria-hidden="true">
    <div class="modal-dialog modal-dialog-centered" role="document">
        <div class="modal-content">
            <!-- Header -->
            <div class="modal-header">
                <h4 class="modal-title" id="createAKIKeyModalLabel">Создать шаблон</h4>
                <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
            </div>
            <!-- End Header -->
            <form id="template_modal">
                <!-- Body -->
                <div class="modal-body">
                    <!-- Form -->

                    <div class="d-flex flex-column gap-2">
                        <?php echo csrf_field(); ?>


                        <input class="form-control" type="text" name="title" placeholder="Заголовок шаблона">
                        <textarea rows="6" class="form-control" type="text" name="text" placeholder="HTML код шаблона"></textarea>













                    </div>


                    <!-- End Form -->
                </div>
                <!-- End Body -->

                <!-- Footer -->
                <div class="modal-footer">
                    <div class="row align-items-sm-center flex-grow-1 mx-n2">
                        <div class="col-sm mb-2 mb-sm-0">

                        </div>
                        <!-- End Col -->

                        <div class="col-sm-auto">
                            <div class="d-flex gap-3">
                                <button type="button" class="btn btn-white" data-bs-dismiss="modal" aria-label="Close">
                                    Закрыть
                                </button>
                                <button type="submit" class="btn btn-primary">Создать</button>
                            </div>
                        </div>
                        <!-- End Col -->
                    </div>
                    <!-- End Row -->
                </div>
            </form>
            <!-- End Footer -->
        </div>
    </div>
</div>
<div class="modal fade" id="updateTemplate" tabindex="-1" aria-labelledby="updateTemplate" role="dialog"
     aria-hidden="true">
    <div class="modal-dialog modal-dialog-centered" role="document">
        <div class="modal-content">
            <!-- Header -->
            <div class="modal-header">
                <h4 class="modal-title" id="createAKIKeyModalLabel">Изменить шаблон</h4>
                <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
            </div>
            <!-- End Header -->
            <form id="UpdateTemplate_modal">
                <!-- Body -->
                <div class="modal-body">
                    <!-- Form -->

                    <div class="d-flex flex-column gap-2">
                        <?php echo csrf_field(); ?>
                        <input hidden="" name="id" id="id">
                        <label>Заголовок шаблона</label>
                        <input class="form-control" type="text" id="title" name="title" placeholder="Заголовок шаблона">
                        <label>HTML код шаблона</label>
                        <textarea rows="6" class="form-control" id="text" type="text" name="text" placeholder="HTML код шаблона"></textarea>













                    </div>


                    <!-- End Form -->
                </div>
                <!-- End Body -->

                <!-- Footer -->
                <div class="modal-footer">
                    <div class="row align-items-sm-center flex-grow-1 mx-n2">
                        <div class="col-sm mb-2 mb-sm-0">

                        </div>
                        <!-- End Col -->

                        <div class="col-sm-auto">
                            <div class="d-flex gap-3">
                                <button type="button" class="btn btn-white" data-bs-dismiss="modal" aria-label="Close">
                                    Закрыть
                                </button>
                                <button type="submit" class="btn btn-primary">Создать</button>
                            </div>
                        </div>
                        <!-- End Col -->
                    </div>
                    <!-- End Row -->
                </div>
            </form>
            <!-- End Footer -->
        </div>
    </div>
</div>
<!-- ========== END SECONDARY CONTENTS ========== -->

<!-- JS Global Compulsory  -->
<script src="/assets_admin/vendor/jquery/dist/jquery.min.js"></script>
<script src="/assets_admin/vendor/jquery-migrate/dist/jquery-migrate.min.js"></script>
<script src="/assets_admin/vendor/bootstrap/dist/js/bootstrap.bundle.min.js"></script>

<!-- JS Implementing Plugins -->
<script src="/assets_admin/vendor/hs-navbar-vertical-aside/dist/hs-navbar-vertical-aside.min.js"></script>
<script src="/assets_admin/vendor/hs-form-search/dist/hs-form-search.min.js"></script>

<script src="/assets_admin/vendor/hs-nav-scroller/dist/hs-nav-scroller.min.js"></script>
<script src="/assets_admin/vendor/hs-sticky-block/dist/hs-sticky-block.min.js"></script>

<!-- JS Front -->
<script src="/assets_admin/js/theme.min.js"></script>

<!-- JS Plugins Init. -->
<script>
    (function() {
        window.onload = function () {


            // INITIALIZATION OF NAVBAR VERTICAL ASIDE
            // =======================================================
            new HSSideNav('.js-navbar-vertical-aside').init()


            // INITIALIZATION OF FORM SEARCH
            // =======================================================
            new HSFormSearch('.js-form-search')


            // INITIALIZATION OF BOOTSTRAP DROPDOWN
            // =======================================================
            HSBsDropdown.init()


            // INITIALIZATION OF NAV SCROLLER
            // =======================================================
            new HsNavScroller('.js-nav-scroller')


            // INITIALIZATION OF STICKY BLOCKS
            // =======================================================
            new HSStickyBlock('.js-sticky-block', {
                targetSelector: document.getElementById('header').classList.contains('navbar-fixed') ? '#header' : null
            })
            // let quil = HSCore.components.HSQuill.init('.js-quill')
            // var quill = new Quill('.js-quill', {
            //     // theme: 'snow'
            // });
            // console.log(quil)
            // setInterval(function () {
            //
            // }, 4000)
        }
    })()
</script>

<!-- Style Switcher JS -->

<script>
    (function () {
        // STYLE SWITCHER
        // =======================================================
        const $dropdownBtn = document.getElementById('selectThemeDropdown') // Dropdowon trigger
        const $variants = document.querySelectorAll(`[aria-labelledby="selectThemeDropdown"] [data-icon]`) // All items of the dropdown

        // Function to set active style in the dorpdown menu and set icon for dropdown trigger
        const setActiveStyle = function () {
            $variants.forEach($item => {
                if ($item.getAttribute('data-value') === HSThemeAppearance.getOriginalAppearance()) {
                    $dropdownBtn.innerHTML = `<i class="${$item.getAttribute('data-icon')}" />`
                    return $item.classList.add('active')
                }

                $item.classList.remove('active')
            })
        }

        // Add a click event to all items of the dropdown to set the style
        $variants.forEach(function ($item) {
            $item.addEventListener('click', function () {
                HSThemeAppearance.setAppearance($item.getAttribute('data-value'))
            })
        })

        // Call the setActiveStyle on load page
        setActiveStyle()

        // Add event listener on change style to call the setActiveStyle function
        window.addEventListener('on-hs-appearance-change', function () {
            setActiveStyle()
        })
    })()
</script>
<script>
    const template_modal = document.getElementById("template_modal");
    template_modal.addEventListener("submit", function (e) {
        e.preventDefault();
        let formData = new FormData(template_modal);
        $.ajax({
            url: "<?php echo e(route("admin.template.create")); ?>",
            type: "POST",
            data: formData,
            processData: false,
            contentType: false,
            success: function (data) {
                $('#createAKIKeyModal').modal('hide');
                $('#StatusToast').text('Успешно');
                $('#MessageToast').text('Шаблон успешно создан');
                var toast = new bootstrap.Toast(document.getElementById('liveToast'))
                toast.show()
                setTimeout(function () {
                    location.reload();
                }, 1000)
            },
            error: function (data) {
                $('#createAKIKeyModal').modal('hide');
                $('#StatusToast').text('Ошибка');
                $('#MessageToast').text('Произошла ошибка при создании шаблона. Проверьте правильность данных');
                var toast = new bootstrap.Toast(document.getElementById('liveToast'))
                toast.show()

            }
        });
    });
</script>
<script>
    function updateTemplate(id){
        const updateTemplate = document.getElementById("updateTemplate");
        const text = document.getElementById("text");
        const title = document.getElementById("title");
        const id_el = document.getElementById("id");

        $.ajax({
            url: "/admin/template/get/"+id,
            type: "GET",

            success: function (data) {
                console.log(data)
                text.value = data.template.text;
                title.value = data.template.title;
                id_el.value = data.template.id;

            },
            error: function (data) {


            }
        });
    }
</script>
<script>
    const UpdateTemplate_modal = document.getElementById("UpdateTemplate_modal");
    UpdateTemplate_modal.addEventListener("submit", function (e) {
        e.preventDefault();
        let formData = new FormData(UpdateTemplate_modal);

        $.ajax({
            url: "<?php echo e(route("admin.template.update")); ?>",
            type: "POST",
            data: formData,
            processData: false,
            contentType: false,
            success: function (data) {
                $('#updateTemplate').modal('hide');
                $('#StatusToast').text('Успешно');
                $('#MessageToast').text('Шаблон успешно изменен');
                var toast = new bootstrap.Toast(document.getElementById('liveToast'))
                toast.show()
                setTimeout(function () {
                    location.reload();
                }, 1000)
            },
            error: function (data) {
                $('#updateTemplate').modal('hide');
                $('#StatusToast').text('Ошибка');
                $('#MessageToast').text('Произошла ошибка при изменении шаблона. Проверьте правильность данных');
                var toast = new bootstrap.Toast(document.getElementById('liveToast'))
                toast.show()

            }
        });
    });
</script>
<!-- End Style Switcher JS -->


</body>
</html>
<?php /**PATH /Users/nikita/PhpstormProjects/house/resources/views/admin/templates.blade.php ENDPATH**/ ?>