@include("admin.layouts.header")
@include("admin.layouts.aside")
@include("admin.layouts.head")
@include("admin.layouts.footer")
    <!DOCTYPE html>
<html lang="en">
<head>
    @yield("head")
    <title>Cryptonix | Тикеты</title>
</head>
<body class="has-navbar-vertical-aside navbar-vertical-aside-show-xl   footer-offset">


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
        <div class="page-header">
            <div class="row align-items-end">
                <div class="col-sm mb-2 mb-sm-0">


                    <h1 class="page-header-title">Тикеты</h1>
                </div>
                <!-- End Col -->


                <!-- End Col -->
            </div>
            <!-- End Row -->
        </div>
        <!-- End Page Header -->

        <!-- Stats -->
        {{--        <div class="row">--}}
        {{--            <div class="col-sm-6 col-lg-3 mb-3 mb-lg-5">--}}
        {{--                <!-- Card -->--}}
        {{--                <div class="card h-100">--}}
        {{--                    <div class="card-body">--}}
        {{--                        <h6 class="card-subtitle mb-2">Всего воркеров</h6>--}}

        {{--                        <div class="row align-items-center gx-2">--}}
        {{--                            <div class="col">--}}
        {{--                                <span class="js-counter display-4 text-dark">24</span>--}}
        {{--                                <span class="text-body fs-5 ms-1">from 22</span>--}}
        {{--                            </div>--}}
        {{--                            <!-- End Col -->--}}

        {{--                            <div class="col-auto">--}}
        {{--                  <span class="badge bg-soft-success text-success p-1">--}}
        {{--                    <i class="bi-graph-up"></i> 5.0%--}}
        {{--                  </span>--}}
        {{--                            </div>--}}
        {{--                            <!-- End Col -->--}}
        {{--                        </div>--}}
        {{--                        <!-- End Row -->--}}
        {{--                    </div>--}}
        {{--                </div>--}}
        {{--                <!-- End Card -->--}}
        {{--            </div>--}}

        {{--            <div class="col-sm-6 col-lg-3 mb-3 mb-lg-5">--}}
        {{--                <!-- Card -->--}}
        {{--                <div class="card h-100">--}}
        {{--                    <div class="card-body">--}}
        {{--                        <h6 class="card-subtitle mb-2">Верифецированных</h6>--}}

        {{--                        <div class="row align-items-center gx-2">--}}
        {{--                            <div class="col">--}}
        {{--                                <span class="js-counter display-4 text-dark">12</span>--}}
        {{--                                <span class="text-body fs-5 ms-1">from 11</span>--}}
        {{--                            </div>--}}

        {{--                            <div class="col-auto">--}}
        {{--                  <span class="badge bg-soft-success text-success p-1">--}}
        {{--                    <i class="bi-graph-up"></i> 1.2%--}}
        {{--                  </span>--}}
        {{--                            </div>--}}
        {{--                        </div>--}}
        {{--                        <!-- End Row -->--}}
        {{--                    </div>--}}
        {{--                </div>--}}
        {{--                <!-- End Card -->--}}
        {{--            </div>--}}

        {{--            <div class="col-sm-6 col-lg-3 mb-3 mb-lg-5">--}}
        {{--                <!-- Card -->--}}
        {{--                <div class="card h-100">--}}
        {{--                    <div class="card-body">--}}
        {{--                        <h6 class="card-subtitle mb-2">В онлайне</h6>--}}

        {{--                        <div class="row align-items-center gx-2">--}}
        {{--                            <div class="col">--}}
        {{--                                <span class="js-counter display-4 text-dark">56</span>--}}
        {{--                                <span class="display-4 text-dark">%</span>--}}
        {{--                                <span class="text-body fs-5 ms-1">from 48.7</span>--}}
        {{--                            </div>--}}

        {{--                            <div class="col-auto">--}}
        {{--                  <span class="badge bg-soft-danger text-danger p-1">--}}
        {{--                    <i class="bi-graph-down"></i> 2.8%--}}
        {{--                  </span>--}}
        {{--                            </div>--}}
        {{--                        </div>--}}
        {{--                        <!-- End Row -->--}}
        {{--                    </div>--}}
        {{--                </div>--}}
        {{--                <!-- End Card -->--}}
        {{--            </div>--}}

        {{--            <div class="col-sm-6 col-lg-3 mb-3 mb-lg-5">--}}
        {{--                <!-- Card -->--}}
        {{--                <div class="card h-100">--}}
        {{--                    <div class="card-body">--}}
        {{--                        <h6 class="card-subtitle mb-2">Заблокированные</h6>--}}

        {{--                        <div class="row align-items-center gx-2">--}}
        {{--                            <div class="col">--}}
        {{--                                <span class="js-counter display-4 text-dark">28.6</span>--}}
        {{--                                <span class="display-4 text-dark">%</span>--}}
        {{--                                <span class="text-body fs-5 ms-1">from 28.6%</span>--}}
        {{--                            </div>--}}

        {{--                            <div class="col-auto">--}}
        {{--                                <span class="badge bg-soft-secondary text-secondary p-1">0.0%</span>--}}
        {{--                            </div>--}}
        {{--                        </div>--}}
        {{--                        <!-- End Row -->--}}
        {{--                    </div>--}}
        {{--                </div>--}}
        {{--                <!-- End Card -->--}}
        {{--            </div>--}}
        {{--        </div>--}}
        <!-- End Stats -->

        <!-- Card -->
        <div class="card">
            <!-- Header -->
            <div class="card-header card-header-content-md-between">
                <div class="mb-2 mb-md-0">
                    <form>
                        <!-- Search -->
                        <div class="input-group input-group-merge input-group-flush">
                            <div class="input-group-prepend input-group-text">
                                <i class="bi-search"></i>
                            </div>
                            <input id="datatableSearch" type="search" class="form-control" placeholder="Найти заявку"
                                   aria-label="Search users">
                        </div>
                        <!-- End Search -->
                    </form>
                </div>

            </div>
            <!-- End Header -->

            <!-- Table -->
            <div class="table-responsive datatable-custom">
                <div id="datatable_wrapper" class="dataTables_wrapper no-footer">
                    <div class="dataTables_length" id="datatable_length"><label>Show <select name="datatable_length"
                                                                                             aria-controls="datatable"
                                                                                             class="">
                                <option value="10">10</option>
                                <option value="25">25</option>
                                <option value="50">50</option>
                                <option value="100">100</option>
                            </select> entries</label></div>
                    <div id="datatable_filter" class="dataTables_filter"><label>Search:<input type="search" class=""
                                                                                              placeholder=""
                                                                                              aria-controls="datatable"></label>
                    </div>
                    <table id="datatable"
                           class="table table-hover table-borderless table-thead-bordered table-nowrap table-align-middle card-table dataTable no-footer"
                           style="width: 100%;" data-hs-datatables-options="{
                   &quot;columnDefs&quot;: [{
                      &quot;targets&quot;: [0],
                      &quot;orderable&quot;: false
                    }],
                   &quot;order&quot;: [],
                   &quot;info&quot;: {
                     &quot;totalQty&quot;: &quot;#datatableWithPaginationInfoTotalQty&quot;
                   },
                   &quot;search&quot;: &quot;#datatableSearch&quot;,
                   &quot;entries&quot;: &quot;#datatableEntries&quot;,
                   &quot;pageLength&quot;: 12,
                   &quot;isResponsive&quot;: false,
                   &quot;isShowPaging&quot;: false,
                   &quot;pagination&quot;: &quot;datatablePagination&quot;
                 }" role="grid" aria-describedby="datatable_info">
                        <thead class="thead-light">
                        <tr role="row">
                            <th class="table-column-pe-0 sorting_disabled" rowspan="1" colspan="1" aria-label=""
                                style="width: 24px;">

                            </th>
                            <th class="table-column-ps-0 sorting" tabindex="0" aria-controls="datatable" rowspan="1"
                                colspan="1" aria-label="Order: activate to sort column ascending" style="width: 70px;">
                                ID заявки
                            </th>
                            <th class="sorting" tabindex="0" aria-controls="datatable" rowspan="1" colspan="1"
                                aria-label="Date: activate to sort column ascending" style="width: 161px;">Дата
                            </th>
                            <th class="sorting" tabindex="0" aria-controls="datatable" rowspan="1" colspan="1"
                                aria-label="Customer: activate to sort column ascending" style="width: 130px;">
                                Пользователь
                            </th>
                            <th class="sorting" tabindex="0" aria-controls="datatable" rowspan="1" colspan="1"
                                aria-label="Payment status: activate to sort column ascending" style="width: 124px;">
                                Статус
                            </th>
                            <th class="sorting" tabindex="0" aria-controls="datatable" rowspan="1" colspan="1"
                                aria-label="Actions: activate to sort column ascending" style="width: 119px;">Действия
                            </th>
                        </tr>
                        </thead>

                        <tbody>
                        @foreach($tickets as $ticket)
                            <tr role="row" class="odd">
                                <td class="table-column-pe-0">

                                </td>
                                <td class="table-column-ps-0">
                                    <span>#{{$ticket['id']}}

                                </td>
                                <td>{{\Carbon\Carbon::parse($ticket['created_at'])->format("d/m/y H:i")}}</td>
                                <td>
                                    <a class="text-body"
                                       href="{{route("admin.user:id", $ticket['user_id'])}}">{{$ticket['user_id']}}</a>
                                </td>
                                <td>
                                    @if($ticket['status'] == "open")
                                        <span class="badge bg-soft-success text-success  p-1">
                                    <span class="legend-indicator bg-success"></span>
                                    Открыт</span>
                                        </span>
                                    @else
                                        <span class="badge bg-soft-danger text-danger  p-1">
                                    <span class="legend-indicator bg-danger"></span>
                                    Закрыт</span>
                                        </span>
                                    @endif

                                    @if(!$ticket['messageIsRead'])
                                        <span class="badge bg-soft-success text-success  p-1">
                                        <span class="legend-indicator bg-success"></span>
                                        Новое сообщение</span>
                                        </span>
                                    @endif
                                </td>


                                <td>
                                    <div class="btn-group" role="group">
                                        <a class="btn btn-white btn-sm" href="{{route("admin.ticket:id", $ticket['id'])}}" onclick="" >
                                            <i class="bi-chat"></i> Открыть
                                        </a>


                                    </div>
                                </td>
                            </tr>
                        @endforeach

                        </tbody>
                    </table>
                    <div class="dataTables_info" id="datatable_info" role="status" aria-live="polite">Показаны с 1 по 12
                        из 20 записей
                    </div>
                </div>
            </div>
            <!-- End Table -->

            <!-- Footer -->
            <div class="card-footer">
                <div class="row justify-content-center justify-content-sm-between align-items-sm-center">
                    <div class="col-sm mb-2 mb-sm-0">
                        <div class="d-flex justify-content-center justify-content-sm-start align-items-center">
                            <span class="me-2">Показать:</span>

                            <!-- Select -->
                            <div class="tom-select-custom">
                                <select id="datatableEntries"
                                        class="js-select form-select form-select-borderless w-auto tomselected ts-hidden-accessible"
                                        autocomplete="off" data-hs-tom-select-options="{
                            &quot;searchInDropdown&quot;: false,
                            &quot;hideSearch&quot;: true
                          }" tabindex="-1">

                                    <option value="14">14</option>
                                    <option value="16">16</option>
                                    <option value="18">18</option>
                                    <option value="12" selected="">12</option>
                                </select>
                                <div
                                    class="ts-wrapper js-select form-select form-select-borderless w-auto single plugin-change_listener plugin-hs_smart_position input-hidden full has-items">
                                    <div class="ts-control">
                                        <div data-value="12" class="item" data-ts-item="">12</div>
                                    </div>
                                    <div class="tom-select-custom">
                                        <div class="ts-dropdown single plugin-change_listener plugin-hs_smart_position"
                                             style="display: none;">
                                            <div role="listbox" tabindex="-1" class="ts-dropdown-content"
                                                 id="datatableEntries-ts-dropdown"></div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                            <!-- End Select -->

                            <span class="text-secondary me-2">из</span>

                            <!-- Pagination Quantity -->
                            <span id="datatableWithPaginationInfoTotalQty">20</span>
                        </div>
                    </div>
                    <!-- End Col -->

                    <div class="col-sm-auto">
                        <div class="d-flex justify-content-center justify-content-sm-end">
                            <!-- Pagination -->
                            <nav id="datatablePagination" aria-label="Activity pagination">
                                <div class="dataTables_paginate paging_simple_numbers" id="datatable_paginate">
                                    <ul id="datatable_pagination" class="pagination datatable-custom-pagination">
                                        <li class="paginate_item page-item disabled"><a
                                                class="paginate_button previous page-link" aria-controls="datatable"
                                                data-dt-idx="0" tabindex="0" id="datatable_previous"><span
                                                    aria-hidden="true">Prev</span></a></li>
                                        <li class="paginate_item page-item active"><a class="paginate_button page-link"
                                                                                      aria-controls="datatable"
                                                                                      data-dt-idx="1" tabindex="0">1</a>
                                        </li>
                                        <li class="paginate_item page-item"><a class="paginate_button page-link"
                                                                               aria-controls="datatable" data-dt-idx="2"
                                                                               tabindex="0">2</a></li>
                                        <li class="paginate_item page-item"><a class="paginate_button next page-link"
                                                                               aria-controls="datatable" data-dt-idx="3"
                                                                               tabindex="0" id="datatable_next"><span
                                                    aria-hidden="true">Next</span></a></li>
                                    </ul>
                                </div>
                            </nav>
                        </div>
                    </div>
                    <!-- End Col -->
                </div>
                <!-- End Row -->
            </div>
            <!-- End Footer -->
        </div>
        <!-- End Card -->
    </div>
    <!-- End Content -->

    @yield("footer")
</main>

<!-- End Export Products Modal -->
<!-- Import Products Modal -->
<!-- ========== END SECONDARY CONTENTS ========== -->

<!-- JS Global Compulsory  -->
<script src="/assets_admin/vendor/jquery/dist/jquery.min.js"></script>
<script src="/assets_admin/vendor/jquery-migrate/dist/jquery-migrate.min.js"></script>
<script src="/assets_admin/vendor/bootstrap/dist/js/bootstrap.bundle.min.js"></script>

<!-- JS Implementing Plugins -->
<script src="/assets_admin/vendor/hs-navbar-vertical-aside/dist/hs-navbar-vertical-aside.min.js"></script>
<script src="/assets_admin/vendor/hs-form-search/dist/hs-form-search.min.js"></script>

<script src="/assets_admin/vendor/hs-toggle-password/dist/js/hs-toggle-password.js"></script>
<script src="/assets_admin/vendor/hs-file-attach/dist/hs-file-attach.min.js"></script>
<script src="/assets_admin/vendor/hs-nav-scroller/dist/hs-nav-scroller.min.js"></script>
<script src="/assets_admin/vendor/hs-step-form/dist/hs-step-form.min.js"></script>
<script src="/assets_admin/vendor/hs-counter/dist/hs-counter.min.js"></script>
<script src="/assets_admin/vendor/appear/dist/appear.min.js"></script>
<script src="/assets_admin/vendor/imask/dist/imask.min.js"></script>
<script src="/assets_admin/vendor/tom-select/dist/js/tom-select.complete.min.js"></script>
<script src="/assets_admin/vendor/datatables/media/js/jquery.dataTables.min.js"></script>
<script src="/assets_admin/vendor/datatables.net.extensions/select/select.min.js"></script>
<script src="/assets_admin/vendor/datatables.net-buttons/js/dataTables.buttons.min.js"></script>
<script src="/assets_admin/vendor/datatables.net-buttons/js/buttons.flash.min.js"></script>
<script src="/assets_admin/vendor/jszip/dist/jszip.min.js"></script>
<script src="/assets_admin/vendor/pdfmake/build/pdfmake.min.js"></script>
<script src="/assets_admin/vendor/pdfmake/build/vfs_fonts.js"></script>
<script src="/assets_admin/vendor/datatables.net-buttons/js/buttons.html5.min.js"></script>
<script src="/assets_admin/vendor/datatables.net-buttons/js/buttons.print.min.js"></script>
<script src="/assets_admin/vendor/datatables.net-buttons/js/buttons.colVis.min.js"></script>

<!-- JS Front -->
<script src="/assets_admin/js/theme.min.js"></script>

<!-- JS Plugins Init. -->
<script>
    $(document).on('ready', function () {
        // INITIALIZATION OF DATATABLES
        // =======================================================
        HSCore.components.HSDatatables.init($('#datatable'), {
            dom: 'Bfrtip',
            buttons: [
                {
                    extend: 'copy',
                    className: 'd-none'
                },
                {
                    extend: 'excel',
                    className: 'd-none'
                },
                {
                    extend: 'csv',
                    className: 'd-none'
                },
                {
                    extend: 'pdf',
                    className: 'd-none'
                },
                {
                    extend: 'print',
                    className: 'd-none'
                },
            ],
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
            <p class="mb-0">Тикеты не найдены</p>
            </div>`
            }
        })

        const datatable = HSCore.components.HSDatatables.getItem(0)

        $('#export-copy').click(function () {
            datatable.button('.buttons-copy').trigger()
        });

        $('#export-excel').click(function () {
            datatable.button('.buttons-excel').trigger()
        });

        $('#export-csv').click(function () {
            datatable.button('.buttons-csv').trigger()
        });

        $('#export-pdf').click(function () {
            datatable.button('.buttons-pdf').trigger()
        });

        $('#export-print').click(function () {
            datatable.button('.buttons-print').trigger()
        });

        $('.js-datatable-filter').on('change', function () {
            var $this = $(this),
                elVal = $this.val(),
                targetColumnIndex = $this.data('target-column-index');

            if (elVal === 'null') elVal = ''

            datatable.column(targetColumnIndex).search(elVal).draw();
        });
    });
</script>

<!-- JS Plugins Init. -->
<script>
    (function () {
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


            // INITIALIZATION OF SELECT
            // =======================================================
            HSCore.components.HSTomSelect.init('.js-select')


            // INITIALIZATION OF INPUT MASK
            // =======================================================
            HSCore.components.HSMask.init('.js-input-mask')


            // INITIALIZATION OF NAV SCROLLER
            // =======================================================
            new HsNavScroller('.js-nav-scroller')


            // INITIALIZATION OF COUNTER
            // =======================================================
            new HSCounter('.js-counter')


            // INITIALIZATION OF TOGGLE PASSWORD
            // =======================================================
            new HSTogglePassword('.js-toggle-password')


            // INITIALIZATION OF FILE ATTACHMENT
            // =======================================================
            new HSFileAttach('.js-file-attach')
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
<!-- End Style Switcher JS -->
</body>
</html>
