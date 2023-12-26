@include("admin.layouts.header")
@include("admin.layouts.aside")
@include("admin.layouts.head")
@include("admin.layouts.footer")
    <!DOCTYPE html>
<html lang="en">
<head>
    @yield("head")
    <title>Домены</title>
</head>

<body class="has-navbar-vertical-aside navbar-vertical-aside-show-xl   footer-offset">

<script src="/assets_admin/js/hs.theme-appearance.js"></script>

<script src="/assets_admin/vendor/hs-navbar-vertical-aside/dist/hs-navbar-vertical-aside-mini-cache.js"></script>

<!-- ========== HEADER ========== -->

@yield("header")
<!-- ========== END HEADER ========== -->

<!-- ========== MAIN CONTENT ========== -->
<!-- Navbar Vertical -->

@yield("aside")

<main id="content" role="main" class="main">
    <!-- Content -->
    <div class="content container-fluid">
        <!-- Page Header -->
        <div >
            <div class="row align-items-center mb-3">
                <div class="col-sm mb-2 mb-sm-0">
                    <h1 class="page-header-title">Домены <span class="badge bg-soft-dark text-dark ms-2">0</span></h1>


                </div>
                <!-- End Col -->

                <div class="col-sm-auto">
                    <a class="btn btn-primary" data-bs-toggle="modal" data-bs-target="#addDomainModal">Привязать домен</a>
                </div>
                <!-- End Col -->
            </div>
            <!-- End Row -->

            <!-- Nav Scroller -->
            <div class="js-nav-scroller hs-nav-scroller-horizontal">
          <span class="hs-nav-scroller-arrow-prev" style="display: none;">
            <a class="hs-nav-scroller-arrow-link" href="javascript:;">
              <i class="bi-chevron-left"></i>
            </a>
          </span>

                <span class="hs-nav-scroller-arrow-next" style="display: none;">
            <a class="hs-nav-scroller-arrow-link" href="javascript:;">
              <i class="bi-chevron-right"></i>
            </a>
          </span>

                <!-- Nav -->

                <!-- End Nav -->
            </div>
            <!-- End Nav Scroller -->
        </div>
        <!-- End Page Header -->

        <div class="row justify-content-end mb-3">
            <div class="col-lg">
                <!-- Datatable Info -->
                <div id="datatableCounterInfo" style="display: none;">
                    <div class="d-sm-flex justify-content-lg-end align-items-sm-center">
              <span class="d-block d-sm-inline-block fs-5 me-3 mb-2 mb-sm-0">
                <span id="datatableCounter">0</span>
                Selected
              </span>
                        <a class="btn btn-outline-danger btn-sm mb-2 mb-sm-0 me-2" href="javascript:;">
                            <i class="bi-trash"></i> Delete
                        </a>
                        <a class="btn btn-white btn-sm mb-2 mb-sm-0 me-2" href="javascript:;">
                            <i class="bi-archive"></i> Archive
                        </a>
                        <a class="btn btn-white btn-sm mb-2 mb-sm-0 me-2" href="javascript:;">
                            <i class="bi-upload"></i> Publish
                        </a>
                        <a class="btn btn-white btn-sm mb-2 mb-sm-0" href="javascript:;">
                            <i class="bi-x-lg"></i> Unpublish
                        </a>
                    </div>
                </div>
                <!-- End Datatable Info -->
            </div>
        </div>
        <!-- End Row -->

        <!-- Card -->
        <div class="card">
            <!-- Header -->

            <!-- End Header -->

            <!-- Table -->
            <div class="table-responsive datatable-custom">
                <table id="datatable" class="table table-borderless table-thead-bordered table-nowrap table-align-middle card-table" data-hs-datatables-options='{
                   "columnDefs": [{
                      "targets": [0, 4, 9],
                      "width": "5%",
                      "orderable": false
                    }],
                   "order": [],

                   "search": "#datatableSearch",
                   "entries": "#datatableEntries",
                   "pageLength": 12,
                   "isResponsive": false,
                   "isShowPaging": false,
                   "pagination": "datatablePagination"
                 }'>
                    <thead class="thead-light">
                    <tr>
                        <th scope="col" class="table-column-pe-0">
                        </th>
                        <th class="table-column-ps-0">Домен</th>
                        <th>Заголовок</th>
                        <th>Статус</th>
                        <th>Ns записи</th>
                        <th>Сумма депозитов</th>
                        <th>STMP данные</th>
                        <th>Статус cloudflare</th>

                        <th>Действия</th>
                    </tr>
                    </thead>

                    <tbody>
                    @foreach($domains as $domain)
                        <tr class="" id="domainID{{$domain['id']}}">
                            <td class="table-column-pe-0">

                            </td>
                            <td class="table-column-ps-0">
                                <a class="d-flex align-items-center" href="./ecommerce-product-details.html">
                                    <div class="flex-shrink-0">
                                        <img class="avatar avatar-lg" src="{{asset($domain['logo'])}}" alt="Image Description">
                                    </div>
                                    <div class="flex-grow-1 ms-3">
                                        <h5 class="text-inherit mb-0">{{$domain['domain']}}</h5>
                                    </div>
                                </a>
                            </td>
                            <td>{{$domain['title']}}</td>

                            <td>
                                <div class="form-check form-switch">
                                    <input class="form-check-input" type="checkbox" id="stocksCheckbox1" checked>
                                    <label class="form-check-label" for="stocksCheckbox1"></label>
                                </div>
                            </td>
                            <td>{{$domain['ns']}}</td>
                            <td>$65</td>
                            <td>{{$domain['stmp_host'] . " - " . $domain['stmp_email'] . " - " . $domain['stmp_password']}}</td>
                            <td class="transition " id="CfStatus{{$domain['id']}}">
                                @if($domain['status'])

                                    <span class="bi-clock"></span>
                                    Pending
                                @else
                                    <span class="legend-indicator bg-success"></span>
                                    Active
                                @endif
                            </td>
                            <td>
                                <div class="btn-group" role="group">
                                    <a class="btn btn-white btn-sm" href="./ecommerce-product-details.html">
                                        <i class="bi-pencil-fill me-1"></i> Изменить
                                    </a>

                                    <!-- Button Group -->
                                    <div class="btn-group">
                                        <button type="button" class="btn btn-white btn-icon btn-sm dropdown-toggle dropdown-toggle-empty" id="productsEditDropdown1" data-bs-toggle="dropdown" aria-expanded="false"></button>

                                        <div class="dropdown-menu dropdown-menu-end mt-1" aria-labelledby="productsEditDropdown1">
                                            <a onclick="deleteDomain({{$domain['id']}})" class="dropdown-item" >
                                                <i class="bi-trash dropdown-item-icon"></i> Удалить
                                            </a>
                                            <a id="updateStatusBlock{{$domain['id']}}" onclick="updateStatusCloudFlare({{$domain['id']}})" class="dropdown-item" href="#">
                                                <i class="bi-arrow-clockwise dropdown-item-icon"></i> Обновить статус Cloudflare
                                            </a>

                                        </div>
                                    </div>
                                    <!-- End Button Group -->
                                </div>
                            </td>
                        </tr>

                    @endforeach



                    </tbody>
                </table>
            </div>
            <!-- End Table -->


        </div>
        <!-- End Card -->
    </div>
    <!-- End Content -->

    <!-- Footer -->
    @yield("footer")
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

<!-- Activity -->
<div class="offcanvas offcanvas-end" tabindex="-1" id="offcanvasActivityStream" aria-labelledby="offcanvasActivityStreamLabel">
    <div class="offcanvas-header">
        <h4 id="offcanvasActivityStreamLabel" class="mb-0">Activity stream</h4>
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

<!-- Welcome Message Modal -->
<div class="modal fade" id="welcomeMessageModal" tabindex="-1" aria-hidden="true">
    <div class="modal-dialog modal-dialog-centered">
        <div class="modal-content">
            <!-- Header -->
            <div class="modal-close">
                <button type="button" class="btn btn-ghost-secondary btn-icon btn-sm" data-bs-dismiss="modal" aria-label="Close">
                    <i class="bi-x-lg"></i>
                </button>
            </div>
            <!-- End Header -->

            <!-- Body -->
            <div class="modal-body p-sm-5">
                <div class="text-center">
                    <div class="w-75 w-sm-50 mx-auto mb-4">
                        <img class="img-fluid" src="/assets_admin/svg/illustrations/oc-collaboration.svg" alt="Image Description" data-hs-theme-appearance="default">
                        <img class="img-fluid" src="/assets_admin/svg/illustrations-light/oc-collaboration.svg" alt="Image Description" data-hs-theme-appearance="dark">
                    </div>

                    <h4 class="h1">Welcome to Front</h4>

                    <p>We're happy to see you in our community.</p>
                </div>
            </div>
            <!-- End Body -->

            <!-- Footer -->
            <div class="modal-footer d-block text-center py-sm-5">
                <small class="text-cap text-muted">Trusted by the world's best teams</small>

                <div class="w-85 mx-auto">
                    <div class="row justify-content-between">
                        <div class="col">
                            <img class="img-fluid" src="/assets_admin/svg/brands/gitlab-gray.svg" alt="Image Description">
                        </div>
                        <div class="col">
                            <img class="img-fluid" src="/assets_admin/svg/brands/fitbit-gray.svg" alt="Image Description">
                        </div>
                        <div class="col">
                            <img class="img-fluid" src="/assets_admin/svg/brands/flow-xo-gray.svg" alt="Image Description">
                        </div>
                        <div class="col">
                            <img class="img-fluid" src="/assets_admin/svg/brands/layar-gray.svg" alt="Image Description">
                        </div>
                    </div>
                </div>
            </div>
            <!-- End Footer -->
        </div>
    </div>
</div>

<!-- End Welcome Message Modal -->

<!-- Export Products Modal -->
<div class="modal fade" id="exportProductsModal" tabindex="-1" aria-labelledby="exportProductsModalLabel" aria-hidden="true">
    <div class="modal-dialog modal-dialog-centered">
        <div class="modal-content">
            <!-- Header -->
            <div class="modal-header">
                <h4 class="modal-title" id="exportProductsModalLabel">Export products</h4>
                <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
            </div>
            <!-- End Header -->

            <!-- Body -->
            <div class="modal-body">
                <p>This CSV file can update all product information. To update just inventory quantites use the <a class="link" href="#">CSV file for inventory.</a></p>

                <div class="mb-4">
                    <label class="form-label">Export</label>

                    <div class="d-grid gap-2">
                        <!-- Form Check -->
                        <div class="form-check">
                            <input class="form-check-input" type="radio" name="exportProductsRadio" id="exportProductsRadio1" checked>
                            <label class="form-check-label" for="exportProductsRadio1">
                                Current page
                            </label>
                        </div>
                        <!-- End Form Check -->

                        <!-- Form Check -->
                        <div class="form-check">
                            <input class="form-check-input" type="radio" name="exportProductsRadio" id="exportProductsRadio2">
                            <label class="form-check-label" for="exportProductsRadio2">
                                All products
                            </label>
                        </div>
                        <!-- End Form Check -->

                        <!-- Form Check -->
                        <div class="form-check">
                            <input class="form-check-input" type="radio" name="exportProductsRadio" id="exportProductsRadio3">
                            <label class="form-check-label" for="exportProductsRadio3">
                                Selected: 20 products
                            </label>
                        </div>
                        <!-- End Form Check -->
                    </div>
                </div>

                <label class="form-label">Export as</label>

                <!-- Form Check -->
                <div class="form-check">
                    <input class="form-check-input" type="radio" name="exportProductsAsRadio" id="exportProductsAsRadio1" checked>
                    <label class="form-check-label" for="exportProductsAsRadio1">
                        CSV for Excel, Numbers, or other spreadsheet programs
                    </label>
                </div>
                <!-- End Form Check -->

                <!-- Form Check -->
                <div class="form-check">
                    <input class="form-check-input" type="radio" name="exportProductsAsRadio" id="exportProductsAsRadio2">
                    <label class="form-check-label" for="exportProductsAsRadio2">
                        Plain CSV file
                    </label>
                </div>
                <!-- End Form Check -->
            </div>
            <!-- End Body -->

            <!-- Footer -->
            <div class="modal-footer gap-3">
                <button type="button" class="btn btn-white" data-bs-dismiss="modal" aria-label="Close">Cancel</button>
                <button type="button" class="btn btn-primary">Export products</button>
            </div>
            <!-- End Footer -->
        </div>
    </div>
</div>
<!-- End Export Products Modal -->
<div class="modal fade" id="addDomainModal" tabindex="-1" aria-labelledby="addDomainModalLabel" role="dialog"
     aria-hidden="true">
    <div class="modal-dialog modal-dialog-centered" role="document">
        <div class="modal-content">
            <!-- Header -->
            <div class="modal-header">
                                <h4 class="modal-title" id="addDomainModalLabel">Привязать домен</h4>
                <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
            </div>
            <!-- End Header -->
            <form id="addDomain">
                <!-- Body -->
                <div class="modal-body">
                    <!-- Form -->

                    <div class="d-flex flex-column gap-2">
                        @csrf
                        <input type="text" name="domain" class="form-control" placeholder="Введите домен">
                        <input class="form-control" type="text" name="stmp_host" placeholder="Введите STMP Host">
                        <input class="form-control" type="text" name="stmp_email" placeholder="Введите STMP Email">
                        <input class="form-control" type="text" name="stmp_password" placeholder="Введите STMP пароль">
                        <input class="form-control" type="text" name="title" placeholder="Введите заголовок биржи">
                        <div class="form-attachment-btn btn btn-sm btn-primary">Загрузите логотип
                            <input type="file" class="form-attachment-btn-label" accept="image/*" name="logo" id="fileUploader">
                        </div>


                        <div id="nsBlock1" class="d-none transition input-group input-group-sm input-group-merge table-input-group">
                            <input id="nsCode1" type="text" class="form-control" readonly
                                   value="12312">
                            <a class="js-clipboard input-group-append input-group-text" href="javascript:;"
                               data-bs-toggle="tooltip" title="Скопировать NS-запись" data-hs-clipboard-options='{
                        "type": "tooltip",
                        "successText": "NS запись скопирована!",
                        "contentTarget": "#nsCode1",
                        "classChangeTarget": "#nsCodeIcon1",
                        "defaultClass": "bi-clipboard",
                        "successClass": "bi-check"
                       }'>
                                <i id="nsCodeIcon1" class="bi-clipboard"></i>
                            </a>
                        </div>
                        <div id="nsBlock2" class="d-none transition input-group  input-group-sm input-group-merge table-input-group">
                            <input id="nsCode2" type="text" class="form-control" readonly
                                   value="12312">
                            <a class="js-clipboard input-group-append input-group-text" href="javascript:;"
                               data-bs-toggle="tooltip" title="Скопировать NS-запись" data-hs-clipboard-options='{
                        "type": "tooltip",
                        "successText": "NS запись скопирована!",
                        "contentTarget": "#nsCode2",
                        "classChangeTarget": "#nsCodeIcon2",
                        "defaultClass": "bi-clipboard",
                        "successClass": "bi-check"
                       }'>
                                <i id="nsCodeIcon2" class="bi-clipboard"></i>
                            </a>
                        </div>
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
                                <button type="submit" class="btn btn-primary d-flex gap-1 align-items-center" id="submitAddDomain">
                                    Привязать
                                </button>
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
<!-- Import Products Modal -->
<div class="modal fade" id="importProductsModal" tabindex="-1" aria-labelledby="importProductsModalLabel" aria-hidden="true">
    <div class="modal-dialog modal-dialog-centered">
        <div class="modal-content">
            <!-- Header -->
            <div class="modal-header">
                <h4 class="modal-title" id="importProductsModalLabel">Import products by CSV</h4>
                <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
            </div>
            <!-- End Header -->

            <!-- Body -->
            <div class="modal-body">
                <p><a class="link" href="#">Download a sample CSV template</a> to see an example of the format required.</p>

                <!-- Dropzone -->
                <div id="attachFilesNewProjectLabel" class="js-dropzone dz-dropzone dz-dropzone-card mb-4">
                    <div class="dz-message">
                        <img class="avatar avatar-xl avatar-4x3 mb-3" src="/assets_admin/svg/illustrations/oc-browse.svg" alt="Image Description" data-hs-theme-appearance="default">
                        <img class="avatar avatar-xl avatar-4x3 mb-3" src="/assets_admin/svg/illustrations-light/oc-browse.svg" alt="Image Description" data-hs-theme-appearance="dark">

                        <h5>Drag and drop your file here</h5>

                        <p class="mb-2">or</p>

                        <span class="btn btn-white btn-sm">Browse files</span>
                    </div>
                </div>
                <!-- End Dropzone -->

                <!-- Form Check -->
                <div class="form-check">
                    <input class="form-check-input" type="checkbox" value="" id="overwriteCurrentProductsCheckbox">
                    <label class="form-check-label" for="overwriteCurrentProductsCheckbox">
                        Overwrite any current products that have the same handle. Existing values will be used for any missing columns. <a href="#">Learn more</a>
                    </label>
                </div>
                <!-- End Form Check -->
            </div>
            <!-- End Body -->

            <!-- Footer -->
            <div class="modal-footer">
                <button type="button" class="btn btn-white" data-bs-dismiss="modal" aria-label="Close">Cancel</button>
                <button type="button" class="btn btn-primary">Upload and continue</button>
            </div>
            <!-- End Footer -->
        </div>
    </div>
</div>
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
<!-- End Import Products Modal -->


<!-- Create New API Key Modal -->

<!-- End Create New API Key Modal -->
<!-- End Product Filter Modal -->
<!-- ========== END SECONDARY CONTENTS ========== -->

<!-- JS Global Compulsory  -->
<script src="/assets_admin/vendor/jquery/dist/jquery.min.js"></script>
<script src="/assets_admin/vendor/jquery-migrate/dist/jquery-migrate.min.js"></script>
<script src="/assets_admin/vendor/bootstrap/dist/js/bootstrap.bundle.min.js"></script>

<!-- JS Implementing Plugins -->
<script src="/assets_admin/vendor/hs-navbar-vertical-aside/dist/hs-navbar-vertical-aside.min.js"></script>
<script src="/assets_admin/vendor/hs-form-search/dist/hs-form-search.min.js"></script>

<script src="/assets_admin/vendor/clipboard/dist/clipboard.min.js"></script>
<script src="/assets_admin/vendor/hs-nav-scroller/dist/hs-nav-scroller.min.js"></script>
<script src="/assets_admin/vendor/tom-select/dist/js/tom-select.complete.min.js"></script>
<script src="/assets_admin/vendor/datatables/media/js/jquery.dataTables.min.js"></script>
<script src="/assets_admin/vendor/datatables.net.extensions/select/select.min.js"></script>
<script src="/assets_admin/vendor/dropzone/dist/min/dropzone.min.js"></script>

<!-- JS Front -->
<script src="/assets_admin/js/theme.min.js"></script>

<!-- JS Plugins Init. -->
<script>
    $(document).on('ready', function () {
        // INITIALIZATION OF DATATABLES
        // =======================================================
        HSCore.components.HSDatatables.init($('#datatable'), {
            select: {
                style: 'multi',
                selector: 'td:first-child input[type="checkbox"]',
                classMap: {
                    checkAll: '#datatableCheckAll',
                    counter: '#datatableCounter',
                    counterInfo: '#datatableCounterInfo'
                }
            },
            language: {
                zeroRecords: `<div class="text-center p-4">
              <img class="mb-3" src="/assets_admin/svg/illustrations/oc-error.svg" alt="Image Description" style="width: 10rem;" data-hs-theme-appearance="default">
              <img class="mb-3" src="/assets_admin/svg/illustrations-light/oc-error.svg" alt="Image Description" style="width: 10rem;" data-hs-theme-appearance="dark">
            <p class="mb-0">No data to show</p>
            </div>`
            }
        });

        const datatable = HSCore.components.HSDatatables.getItem('datatable')

        $('.js-datatable-filter').on('change', function() {
            var $this = $(this),
                elVal = $this.val(),
                targetColumnIndex = $this.data('target-column-index');

            datatable.column(targetColumnIndex).search(elVal).draw();
        });

        $('#datatableSearch').on('mouseup', function (e) {
            var $input = $(this),
                oldValue = $input.val();

            if (oldValue == "") return;

            setTimeout(function(){
                var newValue = $input.val();

                if (newValue == ""){
                    // Gotcha
                    datatable.search('').draw();
                }
            }, 1);
        });

        $('#toggleColumn_product').change(function (e) {
            datatable.columns(1).visible(e.target.checked)
        })

        $('#toggleColumn_type').change(function (e) {
            datatable.columns(2).visible(e.target.checked)
        })

        datatable.columns(3).visible(false)

        $('#toggleColumn_vendor').change(function (e) {
            datatable.columns(3).visible(e.target.checked)
        })

        $('#toggleColumn_stocks').change(function (e) {
            datatable.columns(4).visible(e.target.checked)
        })

        $('#toggleColumn_sku').change(function (e) {
            datatable.columns(5).visible(e.target.checked)
        })

        $('#toggleColumn_price').change(function (e) {
            datatable.columns(6).visible(e.target.checked)
        })

        datatable.columns(7).visible(false)

        $('#toggleColumn_quantity').change(function (e) {
            datatable.columns(7).visible(e.target.checked)
        })

        $('#toggleColumn_variants').change(function (e) {
            datatable.columns(8).visible(e.target.checked)
        })
    });
</script>

<!-- JS Plugins Init. -->
<script>
    (function() {
        window.onload = function () {

            HSCore.components.HSClipboard.init('.js-clipboard')

            // INITIALIZATION OF NAVBAR VERTICAL ASIDE
            // =======================================================
            new HSSideNav('.js-navbar-vertical-aside').init()


            // INITIALIZATION OF FORM SEARCH
            // =======================================================
            new HSFormSearch('.js-form-search')


            // INITIALIZATION OF BOOTSTRAP DROPDOWN
            // =======================================================
            HSBsDropdown.init()


            // INITIALIZATION OF SELECT
            // =======================================================
            HSCore.components.HSTomSelect.init('.js-select')


            // INITIALIZATION OF NAV SCROLLER
            // =======================================================
            new HsNavScroller('.js-nav-scroller')


            // INITIALIZATION OF DROPZONE
            // =======================================================
            HSCore.components.HSDropzone.init('.js-dropzone')

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
    let Toast = new bootstrap.Toast(document.querySelector('#liveToast'))
    let MessageToast = document.querySelector('#MessageToast')
    let StatusToast = document.querySelector('#StatusToast')
    const addDomain = document.getElementById('addDomain');
    const submitAddDomain = document.getElementById('submitAddDomain');
    addDomain.addEventListener('submit', function (e) {
        e.preventDefault();
        submitAddDomain.disabled = true;
        submitAddDomain.innerHTML = '<span class="spinner-border spinner-border-sm"> </span>Привязываем к cloudflare';
        const formData = new FormData(addDomain);
        $.ajax({
            url: '{{route("backend.admin.domain.add")}}',
            type: 'POST',
            data: formData,
            processData: false,
            contentType: false,
            success: function (data, status, xhr) {
                console.log(data)
                submitAddDomain.disabled = false;
                submitAddDomain.innerHTML = 'Привязать';
                StatusToast.innerText = "Успешно";
                MessageToast.innerText = data.message;
                Toast.show()
                const ns_list = data.ns_list;
                const nsBlock1 = document.getElementById("nsBlock1");
                const nsBlock2 = document.getElementById('nsBlock2');
                const nsCode1 = document.getElementById('nsCode1');
                const nsCode2 = document.getElementById('nsCode2');
                nsCode1.value = ns_list[0]
                nsCode2.value = ns_list[1];
                nsBlock1.classList.remove("d-none");
                nsBlock2.classList.remove("d-none");

            },
            error: function (data) {
                console.log(data);
                StatusToast.innerText = "Ошибка";
                submitAddDomain.disabled = false;
                submitAddDomain.innerHTML = 'Привязать';
                try {

                    const errors = data.responseJSON.errors;

                    const errorMessages = Object.values(errors);
                    errorMessages.forEach((errorMessage) => {

                            errorMessage.forEach((message) => {

                                MessageToast.innerText = message;
                            });
                            Toast.show()
                        }
                    )
                } catch (e) {
                    MessageToast.innerText = data.responseJSON.message;
                    Toast.show()
                }



            },

        });
    });
</script>
<script>
    function updateStatusCloudFlare(id){
        const updateStatusBlock = document.getElementById('updateStatusBlock'+id);
        updateStatusBlock.innerHTML = '<span class="spinner-border spinner-border-sm me-2"> </span>Проверяем статус в cloudflare'
        const CfStatus = document.getElementById('CfStatus'+id);
        CfStatus.innerHTML = '<span class="spinner-border spinner-border-sm me-2"> </span>Проверяем статус в cloudflare';
        $.ajax({
            url: '/admin/domain/update/status/'+id,
            data: {
                _token: '{{csrf_token()}}'
            },
            type: 'POST',
            success: function (data, status, xhr) {
                console.log(data);
                const dataStatus = data.status;
                if(dataStatus === 'active') {
                    CfStatus.innerHTML = '<span class="badge bg-success"></span> Active'
                }
                else{
                    CfStatus.innerHTML = '<span class="bi bi-clock"></span> Pending'
                }
                updateStatusBlock.innerHTML = '<i class="bi-arrow-clockwise dropdown-item-icon"></i> Обновить статус Cloudflare'


            },
            error: function (data) {
                console.log(data);
            },

        });
    }

    function deleteDomain(id){
        const domainID = document.getElementById('domainID'+id);

        domainID.classList.add("pulse");
        domainID.classList.add("transition");

        $.ajax({
            url: '/admin/domain/delete/'+id,
            data: {
                _token: '{{csrf_token()}}'
            },
            type: 'POST',
            success: function (data, status, xhr) {
                StatusToast.innerText = "Успешно";
                MessageToast.innerText = data.message;
                Toast.show()
                domainID.remove();
            }

        })
    }
</script>
<!-- End Style Switcher JS -->
</body>
</html>
