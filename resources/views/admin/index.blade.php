@include("admin.layouts.header")
@include("admin.layouts.aside")
@include("admin.layouts.head")
@include("admin.layouts.footer")
<!DOCTYPE html>
<html lang="en">
<head>

    @yield('head')
    <title>Cryptonix | Главная</title>
</head>

<body class="has-navbar-vertical-aside navbar-vertical-aside-show-xl   footer-offset">

<!-- ========== HEADER ========== -->

@yield("header");

<!-- ========== END HEADER ========== -->

<!-- ========== MAIN CONTENT ========== -->
<!-- Navbar Vertical -->

@yield("aside")
<!-- End Navbar Vertical -->

<main id="content" role="main" class="main">
    <!-- Content -->
    <div class="content container-fluid">
        <!-- Page Header -->
        <div class="page-header">
            <div class="row align-items-center">
                <div class="col">
                    <h1 class="page-header-title">Главная</h1>
                </div>
                <!-- End Col -->

                <div class="col-auto">
                    <a class="btn btn-primary" href="javascript:;" data-bs-toggle="modal" data-bs-target="#inviteUserModal">
                        <i class="bi-person-plus-fill me-1"></i> Привязать мамонта
                    </a>
                </div>
                <!-- End Col -->
            </div>
            <!-- End Row -->
        </div>
        <!-- End Page Header -->

        <!-- Stats -->
        <div class="row">
            <div class="col-sm-6 col-lg-3 mb-3 mb-lg-5">
                <!-- Card -->
                <a class="card card-hover-shadow h-100" href="#">
                    <div class="card-body">
                        <h6 class="card-subtitle">Всего мамонтов</h6>

                        <div class="row align-items-center gx-2 mb-1">
                            <div class="col-6">
                                <h2 class="card-title text-inherit">72,540</h2>
                            </div>
                            <!-- End Col -->

                            <div class="col-6">
                                <!-- Chart -->
                                <div class="chartjs-custom" style="height: 3rem;">
                                    <canvas class="js-chart" data-hs-chartjs-options='{
                              "type": "line",
                              "data": {
                                 "labels": ["1 May","2 May","3 May","4 May","5 May","6 May","7 May","8 May","9 May","10 May","11 May","12 May","13 May","14 May","15 May","16 May","17 May","18 May","19 May","20 May","21 May","22 May","23 May","24 May","25 May","26 May","27 May","28 May","29 May","30 May","31 May"],
                                 "datasets": [{
                                  "data": [21,20,24,20,18,17,15,17,18,30,31,30,30,35,25,35,35,40,60,90,90,90,85,70,75,70,30,30,30,50,72],
                                  "backgroundColor": ["rgba(55, 125, 255, 0)", "rgba(255, 255, 255, 0)"],
                                  "borderColor": "#377dff",
                                  "borderWidth": 2,
                                  "pointRadius": 0,
                                  "pointHoverRadius": 0
                                }]
                              },
                              "options": {
                                 "scales": {
                                   "y": {
                                     "display": false
                                   },
                                   "x": {
                                     "display": false
                                   }
                                 },
                                "hover": {
                                  "mode": "nearest",
                                  "intersect": false
                                },
                                "plugins": {
                                  "tooltip": {
                                    "postfix": "k",
                                    "hasIndicator": true,
                                    "intersect": false
                                  }
                                }
                              }
                            }'>
                                    </canvas>
                                </div>
                                <!-- End Chart -->
                            </div>
                            <!-- End Col -->
                        </div>
                        <!-- End Row -->

                        <span class="badge bg-soft-success text-success">
                <i class="bi-graph-up"></i> 12.5%
              </span>
                        <span class="text-body fs-6 ms-1">from 70,104</span>
                    </div>
                </a>
                <!-- End Card -->
            </div>

            <div class="col-sm-6 col-lg-3 mb-3 mb-lg-5">
                <!-- Card -->
                <a class="card card-hover-shadow h-100" href="#">
                    <div class="card-body">
                        <h6 class="card-subtitle">Верифицированные</h6>

                        <div class="row align-items-center gx-2 mb-1">
                            <div class="col-6">
                                <h2 class="card-title text-inherit">29.4%</h2>
                            </div>
                            <!-- End Col -->

                            <div class="col-6">
                                <!-- Chart -->
                                <div class="chartjs-custom" style="height: 3rem;">
                                    <canvas class="js-chart" data-hs-chartjs-options='{
                              "type": "line",
                              "data": {
                                 "labels": ["1 May","2 May","3 May","4 May","5 May","6 May","7 May","8 May","9 May","10 May","11 May","12 May","13 May","14 May","15 May","16 May","17 May","18 May","19 May","20 May","21 May","22 May","23 May","24 May","25 May","26 May","27 May","28 May","29 May","30 May","31 May"],
                                 "datasets": [{
                                  "data": [21,20,24,20,18,17,15,17,30,30,35,25,18,30,31,35,35,90,90,90,85,100,120,120,120,100,90,75,75,75,90],
                                  "backgroundColor": ["rgba(55, 125, 255, 0)", "rgba(255, 255, 255, 0)"],
                                  "borderColor": "#377dff",
                                  "borderWidth": 2,
                                  "pointRadius": 0,
                                  "pointHoverRadius": 0
                                }]
                              },
                              "options": {
                                 "scales": {
                                   "y": {
                                     "display": false
                                   },
                                   "x": {
                                     "display": false
                                   }
                                 },
                                "hover": {
                                  "mode": "nearest",
                                  "intersect": false
                                },
                                "plugins": {
                                  "tooltip": {
                                    "postfix": "k",
                                    "hasIndicator": true,
                                    "intersect": false
                                  }
                                }
                              }
                            }'>
                                    </canvas>
                                </div>
                                <!-- End Chart -->
                            </div>
                            <!-- End Col -->
                        </div>
                        <!-- End Row -->

                        <span class="badge bg-soft-success text-success">
                <i class="bi-graph-up"></i> 1.7%
              </span>
                        <span class="text-body fs-6 ms-1">from 29.1%</span>
                    </div>
                </a>
                <!-- End Card -->
            </div>

            <div class="col-sm-6 col-lg-3 mb-3 mb-lg-5">
                <!-- Card -->
                <a class="card card-hover-shadow h-100" href="#">
                    <div class="card-body">
                        <h6 class="card-subtitle">Депозитнувшие</h6>

                        <div class="row align-items-center gx-2 mb-1">
                            <div class="col-6">
                                <h2 class="card-title text-inherit">56.8%</h2>
                            </div>
                            <!-- End Col -->

                            <div class="col-6">
                                <!-- Chart -->
                                <div class="chartjs-custom" style="height: 3rem;">
                                    <canvas class="js-chart" data-hs-chartjs-options='{
                              "type": "line",
                              "data": {
                                 "labels": ["1 May","2 May","3 May","4 May","5 May","6 May","7 May","8 May","9 May","10 May","11 May","12 May","13 May","14 May","15 May","16 May","17 May","18 May","19 May","20 May","21 May","22 May","23 May","24 May","25 May","26 May","27 May","28 May","29 May","30 May","31 May"],
                                 "datasets": [{
                                  "data": [25,18,30,31,35,35,60,60,60,75,21,20,24,20,18,17,15,17,30,120,120,120,100,90,75,90,90,90,75,70,60],
                                  "backgroundColor": ["rgba(55, 125, 255, 0)", "rgba(255, 255, 255, 0)"],
                                  "borderColor": "#377dff",
                                  "borderWidth": 2,
                                  "pointRadius": 0,
                                  "pointHoverRadius": 0
                                }]
                              },
                              "options": {
                                 "scales": {
                                   "y": {
                                     "display": false
                                   },
                                   "x": {
                                     "display": false
                                   }
                                 },
                                "hover": {
                                  "mode": "nearest",
                                  "intersect": false
                                },
                                "plugins": {
                                  "tooltip": {
                                    "postfix": "k",
                                    "hasIndicator": true,
                                    "intersect": false
                                  }
                                }
                              }
                            }'>
                                    </canvas>
                                </div>
                                <!-- End Chart -->
                            </div>
                            <!-- End Col -->
                        </div>
                        <!-- End Row -->

                        <span class="badge bg-soft-danger text-danger">
                <i class="bi-graph-down"></i> 4.4%
              </span>
                        <span class="text-body fs-6 ms-1">from 61.2%</span>
                    </div>
                </a>
                <!-- End Card -->
            </div>

            <div class="col-sm-6 col-lg-3 mb-3 mb-lg-5">
                <!-- Card -->
                <a class="card card-hover-shadow h-100" href="#">
                    <div class="card-body">
                        <h6 class="card-subtitle">Заблокированные</h6>

                        <div class="row align-items-center gx-2 mb-1">
                            <div class="col-6">
                                <h2 class="card-title text-inherit">92,913</h2>
                            </div>
                            <!-- End Col -->

                            <div class="col-6">
                                <!-- Chart -->
                                <div class="chartjs-custom" style="height: 3rem;">
                                    <canvas class="js-chart" data-hs-chartjs-options='{
                              "type": "line",
                              "data": {
                                 "labels": ["1 May","2 May","3 May","4 May","5 May","6 May","7 May","8 May","9 May","10 May","11 May","12 May","13 May","14 May","15 May","16 May","17 May","18 May","19 May","20 May","21 May","22 May","23 May","24 May","25 May","26 May","27 May","28 May","29 May","30 May","31 May"],
                                 "datasets": [{
                                  "data": [21,20,24,15,17,30,30,35,35,35,40,60,12,90,90,85,70,75,43,75,90,22,120,120,90,85,100,92,92,92,92],
                                  "backgroundColor": ["rgba(55, 125, 255, 0)", "rgba(255, 255, 255, 0)"],
                                  "borderColor": "#377dff",
                                  "borderWidth": 2,
                                  "pointRadius": 0,
                                  "pointHoverRadius": 0
                                }]
                              },
                              "options": {
                                 "scales": {
                                   "y": {
                                     "display": false
                                   },
                                   "x": {
                                     "display": false
                                   }
                                 },
                                "hover": {
                                  "mode": "nearest",
                                  "intersect": false
                                },
                                "plugins": {
                                  "tooltip": {
                                    "postfix": "k",
                                    "hasIndicator": true,
                                    "intersect": false
                                  }
                                }
                              }
                            }'>
                                    </canvas>
                                </div>
                                <!-- End Chart -->
                            </div>
                            <!-- End Col -->
                        </div>
                        <!-- End Row -->

                        <span class="badge bg-soft-secondary text-body">0.0%</span>
                        <span class="text-body fs-6 ms-1">from 2,913</span>
                    </div>
                </a>
                <!-- End Card -->
            </div>
        </div>
        <!-- End Stats -->


        <!-- End Row -->

        <!-- Card -->
        <div class="card mb-3 mb-lg-5">
            <!-- Header -->
            <div class="card-header">
                <div class="row justify-content-between align-items-center flex-grow-1">
                    <div class="col-md">
                        <div class="d-flex justify-content-between align-items-center">
                            <h4 class="card-header-title">Мамонты</h4>

                            <!-- Datatable Info -->
                            <div id="datatableCounterInfo" style="display: none;">
                                <div class="d-flex align-items-center">
                    <span class="fs-6 me-3">
                      <span id="datatableCounter">0</span>
                      Выбанно
                    </span>
                                    <a class="btn btn-outline-danger btn-sm" href="javascript:;">
                                        <i class="tio-delete-outlined"></i> Отвязать
                                    </a>
                                </div>
                            </div>
                            <!-- End Datatable Info -->
                        </div>
                    </div>
                    <!-- End Col -->

                    <div class="col-auto">
                        <!-- Filter -->
                        <div class="row align-items-sm-center">
                            <div class="col-sm-auto">
                                <div class="row align-items-center gx-0">
                                    <div class="col">
                                        <span class="text-secondary me-2">Статус:</span>
                                    </div>
                                    <!-- End Col -->

                                    <div class="col-auto">
                                        <!-- Select -->
                                        <div class="tom-select-custom tom-select-custom-end">
                                            <select class="js-select js-datatable-filter form-select form-select-sm form-select-borderless" data-target-column-index="2" data-target-table="datatable" autocomplete="off" data-hs-tom-select-options='{
                                  "searchInDropdown": false,
                                  "hideSearch": true,
                                  "dropdownWidth": "10rem"
                                }'>
                                                <option value="null" selected>Все</option>
                                                <option value="successful">Верифицированные</option>
                                                <option value="overdue">Заблокированные</option>
                                                <option value="pending">Новичок</option>
                                            </select>
                                        </div>
                                        <!-- End Select -->
                                    </div>
                                    <!-- End Col -->
                                </div>
                                <!-- End Row -->
                            </div>
                            <!-- End Col -->

                            <div class="col-sm-auto">
                                <div class="row align-items-center gx-0">
                                    <div class="col">
                                        <span class="text-secondary me-2">Дата регистрации:</span>
                                    </div>
                                    <!-- End Col -->

                                    <div class="col-auto">
                                        <!-- Select -->
                                        <div class="tom-select-custom tom-select-custom-end">
                                            <select class="js-select js-datatable-filter form-select form-select-sm form-select-borderless" data-target-column-index="5" data-target-table="datatable" autocomplete="off" data-hs-tom-select-options='{
                                  "searchInDropdown": false,
                                  "hideSearch": true,
                                  "dropdownWidth": "10rem"
                                }'>
                                                <option value="null" selected>Все</option>
                                                <option value="1 year ago">1 год назад</option>
                                                <option value="6 months ago">6 месяцев назад</option>
                                            </select>
                                        </div>
                                        <!-- End Select -->
                                    </div>
                                    <!-- End Col -->
                                </div>
                                <!-- End Row -->
                            </div>
                            <!-- End Col -->

                            <div class="col-md">
                                <form>
                                    <!-- Search -->
                                    <div class="input-group input-group-merge input-group-flush">
                                        <div class="input-group-prepend input-group-text">
                                            <i class="bi-search"></i>
                                        </div>
                                        <input id="datatableSearch" type="search" class="form-control" placeholder="Поиск юзера" aria-label="Поиск юзера">
                                    </div>
                                    <!-- End Search -->
                                </form>
                            </div>
                            <!-- End Col -->
                        </div>
                        <!-- End Filter -->
                    </div>
                    <!-- End Col -->
                </div>
                <!-- End Row -->
            </div>
            <!-- End Header -->

            <!-- Table -->
            <div class="table-responsive datatable-custom">
                <table id="datatable" class="table table-borderless table-thead-bordered table-nowrap table-align-middle card-table" data-hs-datatables-options='{
                   "columnDefs": [{
                      "targets": [0, 1, 4],
                      "orderable": false
                    }],
                   "order": [],
                   "info": {
                     "totalQty": "#datatableWithPaginationInfoTotalQty"
                   },
                   "search": "#datatableSearch",
                   "entries": "#datatableEntries",
                   "pageLength": 8,
                   "isResponsive": false,
                   "isShowPaging": false,
                   "paginationPrevLinkMarkup": "<span aria-hidden=\"true\">Назад</span>",
                   "paginationNextLinkMarkup": "<span aria-hidden=\"true\">Вперед</span>",
                   "pagination": "datatablePagination"
                 }'>
                    <thead class="thead-light">
                    <tr>
                        <th scope="col" class="table-column-pe-0">
                            <div class="form-check">
                                <input class="form-check-input" type="checkbox" value="" id="datatableCheckAll">
                                <label class="form-check-label" for="datatableCheckAll"></label>
                            </div>
                        </th>
                        <th class="table-column-ps-0">Почта</th>
                        <th>Статус</th>
                        <th>Тип</th>
                        <th>Последний онлайн</th>
                        <th>Дата регистрации</th>
                        <th>Общий баланс</th>
                    </tr>
                    </thead>

                    <tbody>
                    <tr>
                        <td class="table-column-pe-0">
                            <div class="form-check">
                                <input class="form-check-input" type="checkbox" value="" id="usersDataCheck2">
                                <label class="form-check-label" for="usersDataCheck2"></label>
                            </div>
                        </td>
                        <td class="table-column-ps-0">
                            <a class="d-flex align-items-center" href="./user-profile.html">
                                <div class="flex-shrink-0">
                                    <div class="avatar avatar-sm avatar-circle">
                                        <img class="avatar-img" src="./assets_admin/img/160x160/img10.jpg" alt="Image Description">
                                    </div>
                                </div>
                                <div class="flex-grow-1 ms-3">
                                    <h5 class="text-inherit mb-0">Amanda Harvey <i class="bi-patch-check-fill text-primary" data-bs-toggle="tooltip" data-bs-placement="top" title="Top endorsed"></i></h5>
                                </div>
                            </a>
                        </td>
                        <td>
                            <span class="legend-indicator bg-success"></span>Successful
                        </td>
                        <td>Unassigned</td>
                        <td>amanda@site.com</td>
                        <td>1 year ago</td>
                        <td>67989</td>
                    </tr>

                    <tr>
                        <td class="table-column-pe-0">
                            <div class="form-check">
                                <input class="form-check-input" type="checkbox" value="" id="usersDataCheck3">
                                <label class="form-check-label" for="usersDataCheck3"></label>
                            </div>
                        </td>
                        <td class="table-column-ps-0">
                            <a class="d-flex align-items-center" href="./user-profile.html">
                                <div class="flex-shrink-0">
                                    <div class="avatar avatar-sm avatar-soft-primary avatar-circle">
                                        <span class="avatar-initials">A</span>
                                    </div>
                                </div>
                                <div class="flex-grow-1 ms-3">
                                    <h5 class="text-inherit mb-0">Anne Richard</h5>
                                </div>
                            </a>
                        </td>
                        <td>
                            <span class="legend-indicator bg-success"></span>Successful
                        </td>
                        <td>Subscription</td>
                        <td>anne@site.com</td>
                        <td>6 months ago</td>
                        <td>67326</td>
                    </tr>

                    <tr>
                        <td class="table-column-pe-0">
                            <div class="form-check">
                                <input class="form-check-input" type="checkbox" value="" id="usersDataCheck4">
                                <label class="form-check-label" for="usersDataCheck4"></label>
                            </div>
                        </td>
                        <td class="table-column-ps-0">
                            <a class="d-flex align-items-center" href="./user-profile.html">
                                <div class="flex-shrink-0">
                                    <div class="avatar avatar-sm avatar-circle">
                                        <img class="avatar-img" src="./assets_admin/img/160x160/img3.jpg" alt="Image Description">
                                    </div>
                                </div>
                                <div class="flex-grow-1 ms-3">
                                    <h5 class="text-inherit mb-0">David Harrison</h5>
                                </div>
                            </a>
                        </td>
                        <td>
                            <span class="legend-indicator bg-danger"></span>Overdue
                        </td>
                        <td>Non-subscription</td>
                        <td>david@site.com</td>
                        <td>6 months ago</td>
                        <td>55821</td>
                    </tr>

                    <tr>
                        <td class="table-column-pe-0">
                            <div class="form-check">
                                <input class="form-check-input" type="checkbox" value="" id="usersDataCheck5">
                                <label class="form-check-label" for="usersDataCheck5"></label>
                            </div>
                        </td>
                        <td class="table-column-ps-0">
                            <a class="d-flex align-items-center" href="./user-profile.html">
                                <div class="flex-shrink-0">
                                    <div class="avatar avatar-sm avatar-circle">
                                        <img class="avatar-img" src="./assets_admin/img/160x160/img5.jpg" alt="Image Description">
                                    </div>
                                </div>
                                <div class="flex-grow-1 ms-3">
                                    <h5 class="text-inherit mb-0">Finch Hoot</h5>
                                </div>
                            </a>
                        </td>
                        <td>
                            <span class="legend-indicator bg-warning"></span>Pending
                        </td>
                        <td>Subscription</td>
                        <td>finch@site.com</td>
                        <td>1 year ago</td>
                        <td>85214</td>
                    </tr>

                    <tr>
                        <td class="table-column-pe-0">
                            <div class="form-check">
                                <input class="form-check-input" type="checkbox" value="" id="usersDataCheck6">
                                <label class="form-check-label" for="usersDataCheck6"></label>
                            </div>
                        </td>
                        <td class="table-column-ps-0">
                            <a class="d-flex align-items-center" href="./user-profile.html">
                                <div class="flex-shrink-0">
                                    <div class="avatar avatar-sm avatar-soft-dark avatar-circle">
                                        <span class="avatar-initials">B</span>
                                    </div>
                                </div>
                                <div class="flex-grow-1 ms-3">
                                    <h5 class="text-inherit mb-0">Bob Dean</h5>
                                </div>
                            </a>
                        </td>
                        <td>
                            <span class="legend-indicator bg-success"></span>Successful
                        </td>
                        <td>Subscription</td>
                        <td>bob@site.com</td>
                        <td>6 months ago</td>
                        <td>75470</td>
                    </tr>

                    <tr>
                        <td class="table-column-pe-0">
                            <div class="form-check">
                                <input class="form-check-input" type="checkbox" value="" id="usersDataCheck7">
                                <label class="form-check-label" for="usersDataCheck7"></label>
                            </div>
                        </td>
                        <td class="table-column-ps-0">
                            <a class="d-flex align-items-center" href="./user-profile.html">
                                <div class="flex-shrink-0">
                                    <div class="avatar avatar-sm avatar-circle">
                                        <img class="avatar-img" src="./assets_admin/img/160x160/img9.jpg" alt="Image Description">
                                    </div>
                                </div>
                                <div class="flex-grow-1 ms-3">
                                    <h5 class="text-inherit mb-0">Ella Lauda <i class="bi-patch-check-fill text-primary" data-bs-toggle="tooltip" data-bs-placement="top" title="Top endorsed"></i></h5>
                                </div>
                            </a>
                        </td>
                        <td>
                            <span class="legend-indicator bg-warning"></span>Pending
                        </td>
                        <td>Subscription</td>
                        <td>Ella@site.com</td>
                        <td>1 year ago</td>
                        <td>37534</td>
                    </tr>

                    <tr>
                        <td class="table-column-pe-0">
                            <div class="form-check">
                                <input class="form-check-input" type="checkbox" value="" id="usersDataCheck8">
                                <label class="form-check-label" for="usersDataCheck8"></label>
                            </div>
                        </td>
                        <td class="table-column-ps-0">
                            <a class="d-flex align-items-center" href="./user-profile.html">
                                <div class="flex-shrink-0">
                                    <div class="avatar avatar-sm avatar-circle">
                                        <img class="avatar-img" src="./assets_admin/img/160x160/img4.jpg" alt="Image Description">
                                    </div>
                                </div>
                                <div class="flex-grow-1 ms-3">
                                    <h5 class="text-inherit mb-0">Sam Kart</h5>
                                </div>
                            </a>
                        </td>
                        <td>
                            <span class="legend-indicator bg-success"></span>Successful
                        </td>
                        <td>Non-subscription</td>
                        <td>sam@site.com</td>
                        <td>1 year ago</td>
                        <td>57300</td>
                    </tr>

                    <tr>
                        <td class="table-column-pe-0">
                            <div class="form-check">
                                <input class="form-check-input" type="checkbox" value="" id="usersDataCheck9">
                                <label class="form-check-label" for="usersDataCheck9"></label>
                            </div>
                        </td>
                        <td class="table-column-ps-0">
                            <a class="d-flex align-items-center" href="./user-profile.html">
                                <div class="flex-shrink-0">
                                    <div class="avatar avatar-sm avatar-circle">
                                        <img class="avatar-img" src="./assets_admin/img/160x160/img6.jpg" alt="Image Description">
                                    </div>
                                </div>
                                <div class="flex-grow-1 ms-3">
                                    <h5 class="text-inherit mb-0">Costa Quinn</h5>
                                </div>
                            </a>
                        </td>
                        <td>
                            <span class="legend-indicator bg-danger"></span>Overdue
                        </td>
                        <td>Unassigned</td>
                        <td>costa@site.com</td>
                        <td>1 year ago</td>
                        <td>71288</td>
                    </tr>

                    <tr>
                        <td class="table-column-pe-0">
                            <div class="form-check">
                                <input class="form-check-input" type="checkbox" value="" id="usersDataCheck10">
                                <label class="form-check-label" for="usersDataCheck10"></label>
                            </div>
                        </td>
                        <td class="table-column-ps-0">
                            <a class="d-flex align-items-center" href="./user-profile.html">
                                <div class="flex-shrink-0">
                                    <div class="avatar avatar-sm avatar-soft-primary avatar-circle">
                                        <span class="avatar-initials">R</span>
                                    </div>
                                </div>
                                <div class="flex-grow-1 ms-3">
                                    <h5 class="text-inherit mb-0">Rachel Doe</h5>
                                </div>
                            </a>
                        </td>
                        <td>
                            <span class="legend-indicator bg-warning"></span>Pending
                        </td>
                        <td>Unassigned</td>
                        <td>rachel@site.com</td>
                        <td>6 months ago</td>
                        <td>95211</td>
                    </tr>

                    <tr>
                        <td class="table-column-pe-0">
                            <div class="form-check">
                                <input class="form-check-input" type="checkbox" value="" id="usersDataCheck11">
                                <label class="form-check-label" for="usersDataCheck11"></label>
                            </div>
                        </td>
                        <td class="table-column-ps-0">
                            <a class="d-flex align-items-center" href="./user-profile.html">
                                <div class="flex-shrink-0">
                                    <div class="avatar avatar-sm avatar-soft-dark avatar-circle">
                                        <span class="avatar-initials">B</span>
                                    </div>
                                </div>
                                <div class="flex-grow-1 ms-3">
                                    <h5 class="text-inherit mb-0">Brian Halligan</h5>
                                </div>
                            </a>
                        </td>
                        <td>
                            <span class="legend-indicator bg-warning"></span>Pending
                        </td>
                        <td>Subscription</td>
                        <td>brian@site.com</td>
                        <td>1 year ago</td>
                        <td>58643</td>
                    </tr>

                    <tr>
                        <td class="table-column-pe-0">
                            <div class="form-check">
                                <input class="form-check-input" type="checkbox" value="" id="usersDataCheck12">
                                <label class="form-check-label" for="usersDataCheck12"></label>
                            </div>
                        </td>
                        <td class="table-column-ps-0">
                            <a class="d-flex align-items-center" href="./user-profile.html">
                                <div class="flex-shrink-0">
                                    <div class="avatar avatar-sm avatar-circle">
                                        <img class="avatar-img" src="./assets_admin/img/160x160/img8.jpg" alt="Image Description">
                                    </div>
                                </div>
                                <div class="flex-grow-1 ms-3">
                                    <h5 class="text-inherit mb-0">Linda Bates</h5>
                                </div>
                            </a>
                        </td>
                        <td>
                            <span class="legend-indicator bg-warning"></span>Pending
                        </td>
                        <td>Subscription</td>
                        <td>linda@site.com</td>
                        <td>1 year ago</td>
                        <td>44414</td>
                    </tr>

                    <tr>
                        <td class="table-column-pe-0">
                            <div class="form-check">
                                <input class="form-check-input" type="checkbox" value="" id="usersDataCheck13">
                                <label class="form-check-label" for="usersDataCheck13"></label>
                            </div>
                        </td>
                        <td class="table-column-ps-0">
                            <a class="d-flex align-items-center" href="./user-profile.html">
                                <div class="flex-shrink-0">
                                    <div class="avatar avatar-sm avatar-soft-info avatar-circle">
                                        <span class="avatar-initials">C</span>
                                    </div>
                                </div>
                                <div class="flex-grow-1 ms-3">
                                    <h5 class="text-inherit mb-0">Chris Mathew <i class="bi-patch-check-fill text-primary" data-bs-toggle="tooltip" data-bs-placement="top" title="Top endorsed"></i></h5>
                                </div>
                            </a>
                        </td>
                        <td>
                            <span class="legend-indicator bg-success"></span>Successful
                        </td>
                        <td>Non-subscription</td>
                        <td>chris@site.com</td>
                        <td>1 year ago</td>
                        <td>12569</td>
                    </tr>

                    <tr>
                        <td class="table-column-pe-0">
                            <div class="form-check">
                                <input class="form-check-input" type="checkbox" value="" id="usersDataCheck14">
                                <label class="form-check-label" for="usersDataCheck14"></label>
                            </div>
                        </td>
                        <td class="table-column-ps-0">
                            <a class="d-flex align-items-center" href="./user-profile.html">
                                <div class="flex-shrink-0">
                                    <div class="avatar avatar-sm avatar-soft-dark avatar-circle">
                                        <span class="avatar-initials">L</span>
                                    </div>
                                </div>
                                <div class="flex-grow-1 ms-3">
                                    <h5 class="text-inherit mb-0">Lewis Clarke</h5>
                                </div>
                            </a>
                        </td>
                        <td>
                            <span class="legend-indicator bg-danger"></span>Overdue
                        </td>
                        <td>Non-subscription</td>
                        <td>lewis@site.com</td>
                        <td>1 year ago</td>
                        <td>54621</td>
                    </tr>

                    <tr>
                        <td class="table-column-pe-0">
                            <div class="form-check">
                                <input class="form-check-input" type="checkbox" value="" id="usersDataCheck15">
                                <label class="form-check-label" for="usersDataCheck15"></label>
                            </div>
                        </td>
                        <td class="table-column-ps-0">
                            <a class="d-flex align-items-center" href="./user-profile.html">
                                <div class="flex-shrink-0">
                                    <div class="avatar avatar-sm avatar-circle">
                                        <img class="avatar-img" src="./assets_admin/img/160x160/img7.jpg" alt="Image Description">
                                    </div>
                                </div>
                                <div class="flex-grow-1 ms-3">
                                    <h5 class="text-inherit mb-0">Clarice Boone <i class="bi-patch-check-fill text-primary" data-bs-toggle="tooltip" data-bs-placement="top" title="Top endorsed"></i></h5>
                                </div>
                            </a>
                        </td>
                        <td>
                            <span class="legend-indicator bg-success"></span>Successful
                        </td>
                        <td>Non-subscription</td>
                        <td>clarice@site.com</td>
                        <td>6 months ago</td>
                        <td>23485</td>
                    </tr>

                    <tr>
                        <td class="table-column-pe-0">
                            <div class="form-check">
                                <input class="form-check-input" type="checkbox" value="" id="usersDataCheck16">
                                <label class="form-check-label" for="usersDataCheck16"></label>
                            </div>
                        </td>
                        <td class="table-column-ps-0">
                            <a class="d-flex align-items-center" href="./user-profile.html">
                                <div class="flex-shrink-0">
                                    <div class="avatar avatar-sm avatar-soft-danger avatar-circle">
                                        <span class="avatar-initials">M</span>
                                    </div>
                                </div>
                                <div class="flex-grow-1 ms-3">
                                    <h5 class="text-inherit mb-0">Mark Colbert</h5>
                                </div>
                            </a>
                        </td>
                        <td>
                            <span class="legend-indicator bg-success"></span>Successful
                        </td>
                        <td>Subscription</td>
                        <td>mark@site.com</td>
                        <td>6 months ago</td>
                        <td>78463</td>
                    </tr>

                    <tr>
                        <td class="table-column-pe-0">
                            <div class="form-check">
                                <input class="form-check-input" type="checkbox" value="" id="usersDataCheck17">
                                <label class="form-check-label" for="usersDataCheck17"></label>
                            </div>
                        </td>
                        <td class="table-column-ps-0">
                            <a class="d-flex align-items-center" href="./user-profile.html">
                                <div class="flex-shrink-0">
                                    <div class="avatar avatar-sm avatar-soft-info avatar-circle">
                                        <span class="avatar-initials">J</span>
                                    </div>
                                </div>
                                <div class="flex-grow-1 ms-3">
                                    <h5 class="text-inherit mb-0">Johnny Appleseed</h5>
                                </div>
                            </a>
                        </td>
                        <td>
                            <span class="legend-indicator bg-warning"></span>Pending
                        </td>
                        <td>Subscription</td>
                        <td>johnny@site.com</td>
                        <td>1 year ago</td>
                        <td>23564</td>
                    </tr>

                    <tr>
                        <td class="table-column-pe-0">
                            <div class="form-check">
                                <input class="form-check-input" type="checkbox" value="" id="usersDataCheck18">
                                <label class="form-check-label" for="usersDataCheck18"></label>
                            </div>
                        </td>
                        <td class="table-column-ps-0">
                            <a class="d-flex align-items-center" href="./user-profile.html">
                                <div class="flex-shrink-0">
                                    <div class="avatar avatar-sm avatar-soft-primary avatar-circle">
                                        <span class="avatar-initials">P</span>
                                    </div>
                                </div>
                                <div class="flex-grow-1 ms-3">
                                    <h5 class="text-inherit mb-0">Phileas Fogg</h5>
                                </div>
                            </a>
                        </td>
                        <td>
                            <span class="legend-indicator bg-warning"></span>Pending
                        </td>
                        <td>Subscription</td>
                        <td>phileas@site.com</td>
                        <td>6 months ago</td>
                        <td>39199</td>
                    </tr>
                    </tbody>
                </table>
            </div>
            <!-- End Table -->

            <!-- Footer -->
            <div class="card-footer">
                <!-- Pagination -->
                <div class="row justify-content-center justify-content-sm-between align-items-sm-center">
                    <div class="col-sm mb-2 mb-sm-0">
                        <div class="d-flex justify-content-center justify-content-sm-start align-items-center">
                            <span class="me-2">Показать записей:</span>

                            <!-- Select -->
                            <div class="tom-select-custom">
                                <select id="datatableEntries" class="js-select form-select form-select-borderless w-auto" autocomplete="off" data-hs-tom-select-options='{
                            "searchInDropdown": false,
                            "hideSearch": true
                          }'>
                                    <option value="4">4</option>
                                    <option value="6">6</option>
                                    <option value="8" selected>8</option>
                                    <option value="12">12</option>
                                </select>
                            </div>
                            <!-- End Select -->

                            <span class="text-secondary me-2">из</span>

                            <!-- Pagination Quantity -->
                            <span id="datatableWithPaginationInfoTotalQty"></span>
                        </div>
                    </div>
                    <!-- End Col -->

                    <div class="col-sm-auto">
                        <div class="d-flex justify-content-center justify-content-sm-end">
                            <!-- Pagination -->
                            <nav id="datatablePagination" aria-label="Activity pagination"></nav>
                        </div>
                    </div>
                    <!-- End Col -->
                </div>
                <!-- End Pagination -->
            </div>
            <!-- End Footer -->
        </div>
        <!-- End Card -->

        <div class="row">

            <div class="col-lg-6">
                <!-- Card -->
                <div class="card h-100">
                    <!-- Header -->
                    <div class="card-header card-header-content-between">
                        <h4 class="card-header-title">Сумма до повышения процента</h4>

                        <!-- Dropdown -->

                        <!-- End Dropdown -->
                    </div>
                    <!-- End Header -->

                    <!-- Body -->
                    <div class="card-body">
                        <span class="h1 d-block mb-4">$7,431.14 USD</span>

                        <!-- Progress -->
                        <div class="progress rounded-pill mb-2">
                            <div class="progress-bar" role="progressbar" style="width: 25%" aria-valuenow="25" aria-valuemin="0" aria-valuemax="100" data-bs-toggle="tooltip" data-bs-placement="top" title="Gross value"></div>
                            <div class="progress-bar opacity-50" role="progressbar" style="width: 33%" aria-valuenow="33" aria-valuemin="0" aria-valuemax="100" data-bs-toggle="tooltip" data-bs-placement="top" title="Net volume from sales"></div>
                            <div class="progress-bar opacity-25" role="progressbar" style="width: 9%" aria-valuenow="9" aria-valuemin="0" aria-valuemax="100" data-bs-toggle="tooltip" data-bs-placement="top" title="New volume from sales"></div>
                        </div>

                        <div class="d-flex justify-content-between mb-4">
                            <span>0%</span>
                            <span>100%</span>
                        </div>
                        <!-- End Progress -->


                        <!-- End Table -->
                    </div>
                    <!-- End Body -->
                </div>
                <!-- End Card -->
            </div>
        </div>
    </div>
    <!-- End Content -->

    <!-- Footer -->

    @yield("footer")

    <!-- End Footer -->
</main>






<div class="modal fade" id="inviteUserModal" tabindex="-1" aria-labelledby="inviteUserModalLabel" aria-hidden="true">
    <div class="modal-dialog modal-dialog-centered">
        <div class="modal-content">
            <div class="modal-header">
                <h4 class="modal-title" id="inviteUserModalLabel">Привязать пользователя</h4>
                <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
            </div>

            <div class="modal-body">
                <div class="mb-4">
                    <div class="input-group mb-2 mb-sm-0">
                        <input type="text" class="form-control" name="fullName" placeholder="Найти пользователя по почте/id" aria-label="Найти пользователя по почте/id">

                        <div class="input-group-append input-group-append-last-sm-down-none">

                            <a class="btn btn-primary d-none d-sm-inline-block" href="javascript:;">Привязать</a>
                        </div>
                    </div>


                </div>




            </div>



        </div>
    </div>
</div>
<div class="modal fade" id="ManualUserModal" tabindex="-1" aria-labelledby="ManualUserModalLabel" aria-hidden="true">
    <div class="modal-dialog modal-dialog-centered">
        <div class="modal-content">
            <div class="modal-header">
                <h4 class="modal-title" id="inviteUserModalLabel">Ознакомление</h4>

            </div>

            <div class="modal-body">
                <div class="modal-step" id="step1">
                    <!-- Контент для первого шага -->
                    <p>Дорогой и уважаемый новый член нашей команды!</p>
                    <p>С наилучшими пожеланиями приветствуем тебя в нашей команде! Это важное событие, и мы готовы поделиться с тобой радостью приобщения к нашему проекту.</p>
                    <p>Мы не хотим занимать много времени, но для того чтобы ты мог начать свою работу, давай первым делом настроим твой профиль. Этот небольшой этап займет всего лишь несколько минут, но он обеспечит нам общую платформу для продуктивного взаимодействия.</p>

                    <div class="modal-footer">
                        <button class="btn btn-primary" onclick="nextStep()">Далее</button>

                    </div>
                </div>

                <div class="modal-step" id="step2" style="display: none;">
                    <p>Для выплат нам потребуется адрес твоего кошелька USDT TRC20. Позже ты сможешь изменить этот кошелек в своих настройках</p>

                    <div class="input-group input-group-merge">
                        <div class="input-group-prepend input-group-text" id="inputGroupMergeFullNameAddOn">
                            <i class="bi-wallet2"></i>
                        </div>
                        <input type="text" class="form-control" id="inputGroupMergeFullName" placeholder="TWy1jRfdT7ov..." aria-label="TWy1jRfdT7ov..." aria-describedby="inputGroupMergeFullNameAddOn">
                    </div>

                    <div class="modal-footer">
                        <button class="btn btn-white" onclick="prevStep()">Назад</button>
                        <button class="btn btn-primary" onclick="nextStep()">Далее</button>
                    </div>
                </div>

                <div class="modal-step" id="step3" style="display: none;">
                    <p>Отлично! Теперь настало время добавить немного коммуникации в наш процесс.
                    Пожалуйста, предоставь свой Telegram для уведомлений.
                    Для этого активируй нашего <a href="#" class="link link-primary">бота</a> и вставь свой ChatID
                    в предоставленное поле ниже.</p>


                    <div class="input-group input-group-merge">
                        <div class="input-group-prepend input-group-text" id="inputGroupMergeFullNameAddOn">
                            <i class="bi-telegram"></i>
                        </div>
                        <input type="text" class="form-control" id="inputGroupMergeFullName" placeholder="184927581" aria-label="184927581" aria-describedby="inputGroupMergeFullNameAddOn">
                    </div>

                    <div class="modal-footer">
                        <button class="btn btn-white" onclick="prevStep()">Назад</button>
                        <button class="btn btn-primary" onclick="nextStep()">Далее</button>
                    </div>
                </div>

                <div class="modal-step" id="step4" style="display: none;">
                    <p>Готово! Теперь ты полностью настроен и готов к старту!
                        Подробные инструкции доступны в нашем чате и в административном разделе в подвале.
                        Рекомендуем ознакомиться с ними! Если у тебя возникнут вопросы,
                        не стесняйся обращаться к администрации — мы всегда готовы помочь.
                        Теперь, не смею удерживать тебя, удачи!</p>



                    <div class="modal-footer">
                        <button class="btn btn-white" onclick="prevStep()">Назад</button>
                        <button class="btn btn-primary" onclick="nextStep()">Далее</button>
                    </div>
                </div>




            </div>



        </div>
    </div>
</div>


<!-- JS Global Compulsory  -->
<script src="{{asset("assets_admin/vendor/jquery/dist/jquery.min.js")}}"></script>
<script src="{{asset("assets_admin/vendor/jquery-migrate/dist/jquery-migrate.min.js")}}"></script>
<script src="{{asset("assets_admin/vendor/bootstrap/dist/js/bootstrap.bundle.min.js")}}"></script>

<!-- JS Implementing Plugins -->
<script src="{{asset("assets_admin/vendor/hs-navbar-vertical-aside/dist/hs-navbar-vertical-aside.min.js")}}"></script>
<script src="{{asset("assets_admin/vendor/hs-form-search/dist/hs-form-search.min.js")}}"></script>

<script src="{{asset("assets_admin/vendor/chart.js/dist/Chart.min.js")}}"></script>
<script src="{{asset("assets_admin/vendor/chartjs-chart-matrix/dist/chartjs-chart-matrix.min.js")}}"></script>
<script src="{{asset("assets_admin/vendor/chartjs-plugin-datalabels/dist/chartjs-plugin-datalabels.min.js")}}"></script>
<script src="{{asset("assets_admin/vendor/daterangepicker/moment.min.js")}}"></script>
<script src="{{asset("assets_admin/vendor/daterangepicker/daterangepicker.js")}}"></script>
<script src="{{asset("assets_admin/vendor/tom-select/dist/js/tom-select.complete.min.js")}}"></script>
<script src="{{asset("assets_admin/vendor/clipboard/dist/clipboard.min.js")}}"></script>
<script src="{{asset("assets_admin/vendor/datatables/media/js/jquery.dataTables.min.js")}}"></script>
<script src="{{asset("assets_admin/vendor/datatables.net.extensions/select/select.min.js")}}"></script>

<!-- JS Front -->
<script src="{{asset("assets_admin/js/theme.min.js")}}"></script>
<script src="{{asset("assets_admin/js/hs.theme-appearance-charts.js")}}"></script>

<!-- JS Plugins Init. -->
<script>
    $(document).on('ready', function () {
        // INITIALIZATION OF DATERANGEPICKER
        // =======================================================
        $('.js-daterangepicker').daterangepicker();

        $('.js-daterangepicker-times').daterangepicker({
            timePicker: true,
            startDate: moment().startOf('hour'),
            endDate: moment().startOf('hour').add(32, 'hour'),
            locale: {
                format: 'M/DD hh:mm A'
            }
        });

        var start = moment();
        var end = moment();

        function cb(start, end) {
            $('#js-daterangepicker-predefined .js-daterangepicker-predefined-preview').html(start.format('MMM D') + ' - ' + end.format('MMM D, YYYY'));
        }

        $('#js-daterangepicker-predefined').daterangepicker({
            startDate: start,
            endDate: end,
            ranges: {
                'Today': [moment(), moment()],
                'Yesterday': [moment().subtract(1, 'days'), moment().subtract(1, 'days')],
                'Last 7 Days': [moment().subtract(6, 'days'), moment()],
                'Last 30 Days': [moment().subtract(29, 'days'), moment()],
                'This Month': [moment().startOf('month'), moment().endOf('month')],
                'Last Month': [moment().subtract(1, 'month').startOf('month'), moment().subtract(1, 'month').endOf('month')]
            }
        }, cb);

        cb(start, end);
    });


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
              <img class="mb-3" src="./assets_admin/svg/illustrations/oc-error.svg" alt="Image Description" style="width: 10rem;" data-hs-theme-appearance="default">
              <img class="mb-3" src="./assets_admin/svg/illustrations-light/oc-error.svg" alt="Image Description" style="width: 10rem;" data-hs-theme-appearance="dark">
            <p class="mb-0">Пользователи не найдены</p>
            </div>`
        }
    });

    const datatable = HSCore.components.HSDatatables.getItem(0)

    document.querySelectorAll('.js-datatable-filter').forEach(function (item) {
        item.addEventListener('change',function(e) {
            const elVal = e.target.value,
                targetColumnIndex = e.target.getAttribute('data-target-column-index'),
                targetTable = e.target.getAttribute('data-target-table');

            HSCore.components.HSDatatables.getItem(targetTable).column(targetColumnIndex).search(elVal !== 'null' ? elVal : '').draw()
        })
    })
</script>

<!-- JS Plugins Init. -->
<script>
    (function() {
        localStorage.removeItem('hs_theme')

        window.onload = function () {


            // INITIALIZATION OF NAVBAR VERTICAL ASIDE
            // =======================================================
            new HSSideNav('.js-navbar-vertical-aside').init()


            // INITIALIZATION OF FORM SEARCH
            // =======================================================
            const HSFormSearchInstance = new HSFormSearch('.js-form-search')

            if (HSFormSearchInstance.collection.length) {
                HSFormSearchInstance.getItem(1).on('close', function (el) {
                    el.classList.remove('top-0')
                })

                document.querySelector('.js-form-search-mobile-toggle').addEventListener('click', e => {
                    let dataOptions = JSON.parse(e.currentTarget.getAttribute('data-hs-form-search-options')),
                        $menu = document.querySelector(dataOptions.dropMenuElement)

                    $menu.classList.add('top-0')
                    $menu.style.left = 0
                })
            }


            // INITIALIZATION OF BOOTSTRAP DROPDOWN
            // =======================================================
            HSBsDropdown.init()


            // INITIALIZATION OF CHARTJS
            // =======================================================
            HSCore.components.HSChartJS.init('.js-chart')


            // INITIALIZATION OF CHARTJS
            // =======================================================
            HSCore.components.HSChartJS.init('#updatingBarChart')
            const updatingBarChart = HSCore.components.HSChartJS.getItem('updatingBarChart')

            // Call when tab is clicked
            document.querySelectorAll('[data-bs-toggle="chart-bar"]').forEach(item => {
                item.addEventListener('click', e => {
                    let keyDataset = e.currentTarget.getAttribute('data-datasets')

                    const styles = HSCore.components.HSChartJS.getTheme('updatingBarChart', HSThemeAppearance.getAppearance())

                    if (keyDataset === 'lastWeek') {
                        updatingBarChart.data.labels = ["Apr 22", "Apr 23", "Apr 24", "Apr 25", "Apr 26", "Apr 27", "Apr 28", "Apr 29", "Apr 30", "Apr 31"];
                        updatingBarChart.data.datasets = [
                            {
                                "data": [120, 250, 300, 200, 300, 290, 350, 100, 125, 320],
                                "backgroundColor": styles.data.datasets[0].backgroundColor,
                                "hoverBackgroundColor": styles.data.datasets[0].hoverBackgroundColor,
                                "borderColor": styles.data.datasets[0].borderColor,
                                "maxBarThickness": 10
                            },
                            {
                                "data": [250, 130, 322, 144, 129, 300, 260, 120, 260, 245, 110],
                                "backgroundColor": styles.data.datasets[1].backgroundColor,
                                "borderColor": styles.data.datasets[1].borderColor,
                                "maxBarThickness": 10
                            }
                        ];
                        updatingBarChart.update();
                    } else {
                        updatingBarChart.data.labels = ["May 1", "May 2", "May 3", "May 4", "May 5", "May 6", "May 7", "May 8", "May 9", "May 10"];
                        updatingBarChart.data.datasets = [
                            {
                                "data": [200, 300, 290, 350, 150, 350, 300, 100, 125, 220],
                                "backgroundColor": styles.data.datasets[0].backgroundColor,
                                "hoverBackgroundColor": styles.data.datasets[0].hoverBackgroundColor,
                                "borderColor": styles.data.datasets[0].borderColor,
                                "maxBarThickness": 10
                            },
                            {
                                "data": [150, 230, 382, 204, 169, 290, 300, 100, 300, 225, 120],
                                "backgroundColor": styles.data.datasets[1].backgroundColor,
                                "borderColor": styles.data.datasets[1].borderColor,
                                "maxBarThickness": 10
                            }
                        ]
                        updatingBarChart.update();
                    }
                })
            })


            // INITIALIZATION OF CHARTJS
            // =======================================================
            HSCore.components.HSChartJS.init('.js-chart-datalabels', {
                plugins: [ChartDataLabels],
                options: {
                    plugins: {
                        datalabels: {
                            anchor: function (context) {
                                var value = context.dataset.data[context.dataIndex];
                                return value.r < 20 ? 'end' : 'center';
                            },
                            align: function (context) {
                                var value = context.dataset.data[context.dataIndex];
                                return value.r < 20 ? 'end' : 'center';
                            },
                            color: function (context) {
                                var value = context.dataset.data[context.dataIndex];
                                return value.r < 20 ? context.dataset.backgroundColor : context.dataset.color;
                            },
                            font: function (context) {
                                var value = context.dataset.data[context.dataIndex],
                                    fontSize = 25;

                                if (value.r > 50) {
                                    fontSize = 35;
                                }

                                if (value.r > 70) {
                                    fontSize = 55;
                                }

                                return {
                                    weight: 'lighter',
                                    size: fontSize
                                };
                            },
                            formatter: function (value) {
                                return value.r
                            },
                            offset: 2,
                            padding: 0
                        }
                    },
                }
            })

            // INITIALIZATION OF SELECT
            // =======================================================
            HSCore.components.HSTomSelect.init('.js-select')


            // INITIALIZATION OF CLIPBOARD
            // =======================================================
            HSCore.components.HSClipboard.init('.js-clipboard')
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
                console.log(localStorage.getItem("hs_theme"))
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
    var ManualUserModal = new bootstrap.Modal(document.getElementById('ManualUserModal'), {
        keyboard: false,
        backdrop: 'static',
        focus: true
    })
    // ManualUserModal.show();
    var currentStep = 1;

    function nextStep() {
        var currentStepElement = document.getElementById('step' + currentStep);
        currentStepElement.style.display = 'none';

        currentStep++;
        var nextStepElement = document.getElementById('step' + currentStep);
        if (nextStepElement) {
            nextStepElement.style.display = 'block';
        } else {
            // Здесь вы можете добавить логику для завершения процесса (например, отправка формы)
            alert('Шаги завершены!');
            // Закрытие модального окна
            ManualUserModal.hide();
        }
    }

    function prevStep() {
        var currentStepElement = document.getElementById('step' + currentStep);
        currentStepElement.style.display = 'none';

        currentStep--;
        var prevStepElement = document.getElementById('step' + currentStep);
        prevStepElement.style.display = 'block';
    }

    function submitForm() {
        // Здесь вы можете добавить логику для обработки данных на последнем шаге
        console.log('Форма подтверждена!');
        // Закрытие модального окна
        ManualUserModal.hide();
    }

</script>
<!-- End Style Switcher JS -->
</body>
</html>
