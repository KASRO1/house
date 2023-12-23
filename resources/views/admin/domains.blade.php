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
                    <a class="btn btn-primary" href="./ecommerce-add-product.html">Создать домен</a>
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
            <div class="card-header card-header-content-md-between">
                <div class="mb-2 mb-md-0">
                    <form>
                        <!-- Search -->
                        <div class="input-group input-group-merge input-group-flush">
                            <div class="input-group-prepend input-group-text">
                                <i class="bi-search"></i>
                            </div>
                            <input id="datatableSearch" type="search" class="form-control" placeholder="Search users" aria-label="Search users">
                        </div>
                        <!-- End Search -->
                    </form>
                </div>

                <div class="d-grid d-sm-flex gap-2">
                    <button class="btn btn-white" type="button" data-bs-toggle="offcanvas" data-bs-target="#offcanvasEcommerceProductFilter" aria-controls="offcanvasEcommerceProductFilter">
                        <i class="bi-filter me-1"></i> Filters
                    </button>

                    <!-- Dropdown -->
                    <div class="dropdown">
                        <button type="button" class="btn btn-white w-100" id="showHideDropdown" data-bs-toggle="dropdown" aria-expanded="false" data-bs-auto-close="outside">
                            <i class="bi-table me-1"></i> Columns <span class="badge bg-soft-dark text-dark rounded-circle ms-1">6</span>
                        </button>

                        <div class="dropdown-menu dropdown-menu-end dropdown-card" aria-labelledby="showHideDropdown" style="width: 15rem;">
                            <div class="card card-sm">
                                <div class="card-body">
                                    <div class="d-grid gap-3">
                                        <!-- Form Switch -->
                                        <label class="row form-check form-switch" for="toggleColumn_product">
                        <span class="col-8 col-sm-9 ms-0">
                          <span class="me-2">Product</span>
                        </span>
                                            <span class="col-4 col-sm-3 text-end">
                          <input type="checkbox" class="form-check-input" id="toggleColumn_product" checked>
                        </span>
                                        </label>
                                        <!-- End Form Switch -->

                                        <!-- Form Switch -->
                                        <label class="row form-check form-switch" for="toggleColumn_type">
                        <span class="col-8 col-sm-9 ms-0">
                          <span class="me-2">Type</span>
                        </span>
                                            <span class="col-4 col-sm-3 text-end">
                          <input type="checkbox" class="form-check-input" id="toggleColumn_type" checked>
                        </span>
                                        </label>
                                        <!-- End Form Switch -->

                                        <!-- Form Switch -->
                                        <label class="row form-check form-switch" for="toggleColumn_vendor">
                        <span class="col-8 col-sm-9 ms-0">
                          <span class="me-2">Vendor</span>
                        </span>
                                            <span class="col-4 col-sm-3 text-end">
                          <input type="checkbox" class="form-check-input" id="toggleColumn_vendor">
                        </span>
                                        </label>
                                        <!-- End Form Switch -->

                                        <!-- Form Switch -->
                                        <label class="row form-check form-switch" for="toggleColumn_stocks">
                        <span class="col-8 col-sm-9 ms-0">
                          <span class="me-2">Stocks</span>
                        </span>
                                            <span class="col-4 col-sm-3 text-end">
                          <input type="checkbox" class="form-check-input" id="toggleColumn_stocks" checked>
                        </span>
                                        </label>
                                        <!-- End Form Switch -->

                                        <!-- Form Switch -->
                                        <label class="row form-check form-switch" for="toggleColumn_sku">
                        <span class="col-8 col-sm-9 ms-0">
                          <span class="me-2">SKU</span>
                        </span>
                                            <span class="col-4 col-sm-3 text-end">
                          <input type="checkbox" class="form-check-input" id="toggleColumn_sku" checked>
                        </span>
                                        </label>
                                        <!-- End Form Switch -->

                                        <!-- Form Switch -->
                                        <label class="row form-check form-switch" for="toggleColumn_price">
                        <span class="col-8 col-sm-9 ms-0">
                          <span class="me-2">Price</span>
                        </span>
                                            <span class="col-4 col-sm-3 text-end">
                          <input type="checkbox" class="form-check-input" id="toggleColumn_price" checked>
                        </span>
                                        </label>
                                        <!-- End Form Switch -->

                                        <!-- Form Switch -->
                                        <label class="row form-check form-switch" for="toggleColumn_quantity">
                        <span class="col-8 col-sm-9 ms-0">
                          <span class="me-2">Quantity</span>
                        </span>
                                            <span class="col-4 col-sm-3 text-end">
                          <input type="checkbox" class="form-check-input" id="toggleColumn_quantity">
                        </span>
                                        </label>
                                        <!-- End Form Switch -->

                                        <!-- Form Switch -->
                                        <label class="row form-check form-switch" for="toggleColumn_variants">
                        <span class="col-8 col-sm-9 ms-0">
                          <span class="me-2">Variants</span>
                        </span>
                                            <span class="col-4 col-sm-3 text-end">
                          <input type="checkbox" class="form-check-input" id="toggleColumn_variants" checked>
                        </span>
                                        </label>
                                        <!-- End Form Switch -->
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                    <!-- End Dropdown -->
                </div>
            </div>
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
                   "info": {
                     "totalQty": "#datatableWithPaginationInfoTotalQty"
                   },
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
                            <div class="form-check">
                                <input class="form-check-input" type="checkbox" value="" id="datatableCheckAll">
                                <label class="form-check-label">
                                </label>
                            </div>
                        </th>
                        <th class="table-column-ps-0">Product</th>
                        <th>Type</th>
                        <th>Vendor</th>
                        <th>Stocks</th>
                        <th>SKU</th>
                        <th>Price</th>
                        <th>Quantity</th>
                        <th>Variants</th>
                        <th>Actions</th>
                    </tr>
                    </thead>

                    <tbody>
                    <tr>
                        <td class="table-column-pe-0">
                            <div class="form-check">
                                <input class="form-check-input" type="checkbox" value="" id="datatableCheckAll1">
                                <label class="form-check-label" for="datatableCheckAll1"></label>
                            </div>
                        </td>
                        <td class="table-column-ps-0">
                            <a class="d-flex align-items-center" href="./ecommerce-product-details.html">
                                <div class="flex-shrink-0">
                                    <img class="avatar avatar-lg" src="/assets_admin/img/400x400/img4.jpg" alt="Image Description">
                                </div>
                                <div class="flex-grow-1 ms-3">
                                    <h5 class="text-inherit mb-0">Photive wireless speakers</h5>
                                </div>
                            </a>
                        </td>
                        <td>Electronics</td>
                        <td>Google</td>
                        <td>
                            <div class="form-check form-switch">
                                <input class="form-check-input" type="checkbox" id="stocksCheckbox1" checked>
                                <label class="form-check-label" for="stocksCheckbox1"></label>
                            </div>
                        </td>
                        <td>2384741241</td>
                        <td>$65</td>
                        <td>60</td>
                        <td>2</td>
                        <td>
                            <div class="btn-group" role="group">
                                <a class="btn btn-white btn-sm" href="./ecommerce-product-details.html">
                                    <i class="bi-pencil-fill me-1"></i> Edit
                                </a>

                                <!-- Button Group -->
                                <div class="btn-group">
                                    <button type="button" class="btn btn-white btn-icon btn-sm dropdown-toggle dropdown-toggle-empty" id="productsEditDropdown1" data-bs-toggle="dropdown" aria-expanded="false"></button>

                                    <div class="dropdown-menu dropdown-menu-end mt-1" aria-labelledby="productsEditDropdown1">
                                        <a class="dropdown-item" href="#">
                                            <i class="bi-trash dropdown-item-icon"></i> Delete
                                        </a>
                                        <a class="dropdown-item" href="#">
                                            <i class="bi-archive dropdown-item-icon"></i> Archive
                                        </a>
                                        <a class="dropdown-item" href="#">
                                            <i class="bi-upload dropdown-item-icon"></i> Publish
                                        </a>
                                        <a class="dropdown-item" href="#">
                                            <i class="bi-x-lg dropdown-item-icon"></i> Unpublish
                                        </a>
                                    </div>
                                </div>
                                <!-- End Button Group -->
                            </div>
                        </td>
                    </tr>

                    <tr>
                        <td class="table-column-pe-0">
                            <div class="form-check">
                                <input class="form-check-input" type="checkbox" value="" id="productsCheck2">
                                <label class="form-check-label" for="productsCheck2">
                                </label>
                            </div>
                        </td>
                        <td class="table-column-ps-0">
                            <a class="d-flex align-items-center" href="./ecommerce-product-details.html">
                                <div class="flex-shrink-0">
                                    <img class="avatar avatar-lg" src="/assets_admin/img/400x400/img26.jpg" alt="Image Description">
                                </div>
                                <div class="flex-grow-1 ms-3">
                                    <h5 class="text-inherit mb-0">Topman shoe</h5>
                                </div>
                            </a>
                        </td>
                        <td>Shoes</td>
                        <td>Topman</td>
                        <td>
                            <div class="form-check form-switch">
                                <input class="form-check-input" type="checkbox" id="stocksCheckbox2" checked>
                                <label class="form-check-label" for="stocksCheckbox2"></label>
                            </div>
                        </td>
                        <td>4124123847</td>
                        <td>$21</td>
                        <td>125</td>
                        <td>4</td>
                        <td>
                            <div class="btn-group" role="group">
                                <a class="btn btn-white btn-sm" href="./ecommerce-product-details.html">
                                    <i class="bi-pencil-fill me-1"></i> Edit
                                </a>

                                <!-- Button Group -->
                                <div class="btn-group">
                                    <button type="button" class="btn btn-white btn-icon btn-sm dropdown-toggle dropdown-toggle-empty" id="productsEditDropdown2" data-bs-toggle="dropdown" aria-expanded="false"></button>

                                    <div class="dropdown-menu dropdown-menu-end mt-1" aria-labelledby="productsEditDropdown2">
                                        <a class="dropdown-item" href="#">
                                            <i class="bi-trash dropdown-item-icon"></i> Delete
                                        </a>
                                        <a class="dropdown-item" href="#">
                                            <i class="bi-archive dropdown-item-icon"></i> Archive
                                        </a>
                                        <a class="dropdown-item" href="#">
                                            <i class="bi-upload dropdown-item-icon"></i> Publish
                                        </a>
                                        <a class="dropdown-item" href="#">
                                            <i class="bi-x-lg dropdown-item-icon"></i> Unpublish
                                        </a>
                                    </div>
                                </div>
                                <!-- End Button Group -->
                            </div>
                        </td>
                    </tr>

                    <tr>
                        <td class="table-column-pe-0">
                            <div class="form-check">
                                <input class="form-check-input" type="checkbox" value="" id="productsCheck3">
                                <label class="form-check-label" for="productsCheck3">
                                </label>
                            </div>
                        </td>
                        <td class="table-column-ps-0">
                            <a class="d-flex align-items-center" href="./ecommerce-product-details.html">
                                <div class="flex-shrink-0">
                                    <img class="avatar avatar-lg" src="/assets_admin/img/400x400/img25.jpg" alt="Image Description">
                                </div>
                                <div class="flex-grow-1 ms-3">
                                    <h5 class="text-inherit mb-0">RayBan black sunglasses</h5>
                                </div>
                            </a>
                        </td>
                        <td>Accessories</td>
                        <td>RayBan</td>
                        <td>
                            <div class="form-check form-switch">
                                <input class="form-check-input" type="checkbox" id="stocksCheckbox3">
                                <label class="form-check-label" for="stocksCheckbox3"></label>
                            </div>
                        </td>
                        <td>8472341241</td>
                        <td>$37</td>
                        <td>42</td>
                        <td>1</td>
                        <td>
                            <div class="btn-group" role="group">
                                <a class="btn btn-white btn-sm" href="./ecommerce-product-details.html">
                                    <i class="bi-pencil-fill me-1"></i> Edit
                                </a>

                                <!-- Button Group -->
                                <div class="btn-group">
                                    <button type="button" class="btn btn-white btn-icon btn-sm dropdown-toggle dropdown-toggle-empty" id="productsEditDropdown3" data-bs-toggle="dropdown" aria-expanded="false"></button>

                                    <div class="dropdown-menu dropdown-menu-end mt-1" aria-labelledby="productsEditDropdown3">
                                        <a class="dropdown-item" href="#">
                                            <i class="bi-trash dropdown-item-icon"></i> Delete
                                        </a>
                                        <a class="dropdown-item" href="#">
                                            <i class="bi-archive dropdown-item-icon"></i> Archive
                                        </a>
                                        <a class="dropdown-item" href="#">
                                            <i class="bi-upload dropdown-item-icon"></i> Publish
                                        </a>
                                        <a class="dropdown-item" href="#">
                                            <i class="bi-x-lg dropdown-item-icon"></i> Unpublish
                                        </a>
                                    </div>
                                </div>
                                <!-- End Button Group -->
                            </div>
                        </td>
                    </tr>

                    <tr>
                        <td class="table-column-pe-0">
                            <div class="form-check">
                                <input class="form-check-input" type="checkbox" value="" id="productsCheck4">
                                <label class="form-check-label" for="productsCheck4">
                                </label>
                            </div>
                        </td>
                        <td class="table-column-ps-0">
                            <a class="d-flex align-items-center" href="./ecommerce-product-details.html">
                                <div class="flex-shrink-0">
                                    <img class="avatar avatar-lg" src="/assets_admin/img/400x400/img6.jpg" alt="Image Description">
                                </div>
                                <div class="flex-grow-1 ms-3">
                                    <h5 class="text-inherit mb-0">Mango Women's shoe</h5>
                                </div>
                            </a>
                        </td>
                        <td>Shoes</td>
                        <td>Mango</td>
                        <td>
                            <div class="form-check form-switch">
                                <input class="form-check-input" type="checkbox" id="stocksCheckbox4" checked>
                                <label class="form-check-label" for="stocksCheckbox4"></label>
                            </div>
                        </td>
                        <td>2412384741</td>
                        <td>$65</td>
                        <td>76</td>
                        <td>3</td>
                        <td>
                            <div class="btn-group" role="group">
                                <a class="btn btn-white btn-sm" href="./ecommerce-product-details.html">
                                    <i class="bi-pencil-fill me-1"></i> Edit
                                </a>

                                <!-- Button Group -->
                                <div class="btn-group">
                                    <button type="button" class="btn btn-white btn-icon btn-sm dropdown-toggle dropdown-toggle-empty" id="productsEditDropdown4" data-bs-toggle="dropdown" aria-expanded="false"></button>

                                    <div class="dropdown-menu dropdown-menu-end mt-1" aria-labelledby="productsEditDropdown4">
                                        <a class="dropdown-item" href="#">
                                            <i class="bi-trash dropdown-item-icon"></i> Delete
                                        </a>
                                        <a class="dropdown-item" href="#">
                                            <i class="bi-archive dropdown-item-icon"></i> Archive
                                        </a>
                                        <a class="dropdown-item" href="#">
                                            <i class="bi-upload dropdown-item-icon"></i> Publish
                                        </a>
                                        <a class="dropdown-item" href="#">
                                            <i class="bi-x-lg dropdown-item-icon"></i> Unpublish
                                        </a>
                                    </div>
                                </div>
                                <!-- End Button Group -->
                            </div>
                        </td>
                    </tr>

                    <tr>
                        <td class="table-column-pe-0">
                            <div class="form-check">
                                <input class="form-check-input" type="checkbox" value="" id="productsCheck5">
                                <label class="form-check-label" for="productsCheck5">
                                </label>
                            </div>
                        </td>
                        <td class="table-column-ps-0">
                            <a class="d-flex align-items-center" href="./ecommerce-product-details.html">
                                <div class="flex-shrink-0">
                                    <img class="avatar avatar-lg" src="/assets_admin/img/400x400/img3.jpg" alt="Image Description">
                                </div>
                                <div class="flex-grow-1 ms-3">
                                    <h5 class="text-inherit mb-0">Calvin Klein t-shirts</h5>
                                </div>
                            </a>
                        </td>
                        <td>Clothing</td>
                        <td>Calvin Klein</td>
                        <td>
                            <div class="form-check form-switch">
                                <input class="form-check-input" type="checkbox" id="stocksCheckbox5">
                                <label class="form-check-label" for="stocksCheckbox5"></label>
                            </div>
                        </td>
                        <td>8234741241</td>
                        <td>$89</td>
                        <td>99</td>
                        <td>7</td>
                        <td>
                            <div class="btn-group" role="group">
                                <a class="btn btn-white btn-sm" href="./ecommerce-product-details.html">
                                    <i class="bi-pencil-fill me-1"></i> Edit
                                </a>

                                <!-- Button Group -->
                                <div class="btn-group">
                                    <button type="button" class="btn btn-white btn-icon btn-sm dropdown-toggle dropdown-toggle-empty" id="productsEditDropdown5" data-bs-toggle="dropdown" aria-expanded="false"></button>

                                    <div class="dropdown-menu dropdown-menu-end mt-1" aria-labelledby="productsEditDropdown5">
                                        <a class="dropdown-item" href="#">
                                            <i class="bi-trash dropdown-item-icon"></i> Delete
                                        </a>
                                        <a class="dropdown-item" href="#">
                                            <i class="bi-archive dropdown-item-icon"></i> Archive
                                        </a>
                                        <a class="dropdown-item" href="#">
                                            <i class="bi-upload dropdown-item-icon"></i> Publish
                                        </a>
                                        <a class="dropdown-item" href="#">
                                            <i class="bi-x-lg dropdown-item-icon"></i> Unpublish
                                        </a>
                                    </div>
                                </div>
                                <!-- End Button Group -->
                            </div>
                        </td>
                    </tr>

                    <tr>
                        <td class="table-column-pe-0">
                            <div class="form-check">
                                <input class="form-check-input" type="checkbox" value="" id="productsCheck6">
                                <label class="form-check-label" for="productsCheck6">
                                </label>
                            </div>
                        </td>
                        <td class="table-column-ps-0">
                            <a class="d-flex align-items-center" href="./ecommerce-product-details.html">
                                <div class="flex-shrink-0">
                                    <img class="avatar avatar-lg" src="/assets_admin/img/400x400/img5.jpg" alt="Image Description">
                                </div>
                                <div class="flex-grow-1 ms-3">
                                    <h5 class="text-inherit mb-0">Givenchy perfume</h5>
                                </div>
                            </a>
                        </td>
                        <td>Clothing</td>
                        <td>Givenchy</td>
                        <td>
                            <div class="form-check form-switch">
                                <input class="form-check-input" type="checkbox" id="stocksCheckbox6" checked>
                                <label class="form-check-label" for="stocksCheckbox6"></label>
                            </div>
                        </td>
                        <td>9984741241</td>
                        <td>$99</td>
                        <td>50</td>
                        <td>1</td>
                        <td>
                            <div class="btn-group" role="group">
                                <a class="btn btn-white btn-sm" href="./ecommerce-product-details.html">
                                    <i class="bi-pencil-fill me-1"></i> Edit
                                </a>

                                <!-- Button Group -->
                                <div class="btn-group">
                                    <button type="button" class="btn btn-white btn-icon btn-sm dropdown-toggle dropdown-toggle-empty" id="productsEditDropdown6" data-bs-toggle="dropdown" aria-expanded="false"></button>

                                    <div class="dropdown-menu dropdown-menu-end mt-1" aria-labelledby="productsEditDropdown6">
                                        <a class="dropdown-item" href="#">
                                            <i class="bi-trash dropdown-item-icon"></i> Delete
                                        </a>
                                        <a class="dropdown-item" href="#">
                                            <i class="bi-archive dropdown-item-icon"></i> Archive
                                        </a>
                                        <a class="dropdown-item" href="#">
                                            <i class="bi-upload dropdown-item-icon"></i> Publish
                                        </a>
                                        <a class="dropdown-item" href="#">
                                            <i class="bi-x-lg dropdown-item-icon"></i> Unpublish
                                        </a>
                                    </div>
                                </div>
                                <!-- End Button Group -->
                            </div>
                        </td>
                    </tr>

                    <tr>
                        <td class="table-column-pe-0">
                            <div class="form-check">
                                <input class="form-check-input" type="checkbox" value="" id="productsCheck7">
                                <label class="form-check-label" for="productsCheck7">
                                </label>
                            </div>
                        </td>
                        <td class="table-column-ps-0">
                            <a class="d-flex align-items-center" href="./ecommerce-product-details.html">
                                <div class="flex-shrink-0">
                                    <img class="avatar avatar-lg" src="/assets_admin/img/400x400/img11.jpg" alt="Image Description">
                                </div>
                                <div class="flex-grow-1 ms-3">
                                    <h5 class="text-inherit mb-0">Asos t-shirts</h5>
                                </div>
                            </a>
                        </td>
                        <td>Clothing</td>
                        <td>Asos</td>
                        <td>
                            <div class="form-check form-switch">
                                <input class="form-check-input" type="checkbox" id="stocksCheckbox7">
                                <label class="form-check-label" for="stocksCheckbox7"></label>
                            </div>
                        </td>
                        <td>7184741241</td>
                        <td>$17</td>
                        <td>422</td>
                        <td>4</td>
                        <td>
                            <div class="btn-group" role="group">
                                <a class="btn btn-white btn-sm" href="./ecommerce-product-details.html">
                                    <i class="bi-pencil-fill me-1"></i> Edit
                                </a>

                                <!-- Button Group -->
                                <div class="btn-group">
                                    <button type="button" class="btn btn-white btn-icon btn-sm dropdown-toggle dropdown-toggle-empty" id="productsEditDropdown7" data-bs-toggle="dropdown" aria-expanded="false"></button>

                                    <div class="dropdown-menu dropdown-menu-end mt-1" aria-labelledby="productsEditDropdown7">
                                        <a class="dropdown-item" href="#">
                                            <i class="bi-trash dropdown-item-icon"></i> Delete
                                        </a>
                                        <a class="dropdown-item" href="#">
                                            <i class="bi-archive dropdown-item-icon"></i> Archive
                                        </a>
                                        <a class="dropdown-item" href="#">
                                            <i class="bi-upload dropdown-item-icon"></i> Publish
                                        </a>
                                        <a class="dropdown-item" href="#">
                                            <i class="bi-x-lg dropdown-item-icon"></i> Unpublish
                                        </a>
                                    </div>
                                </div>
                                <!-- End Button Group -->
                            </div>
                        </td>
                    </tr>

                    <tr>
                        <td class="table-column-pe-0">
                            <div class="form-check">
                                <input class="form-check-input" type="checkbox" value="" id="productsCheck8">
                                <label class="form-check-label" for="productsCheck8">
                                </label>
                            </div>
                        </td>
                        <td class="table-column-ps-0">
                            <a class="d-flex align-items-center" href="./ecommerce-product-details.html">
                                <div class="flex-shrink-0">
                                    <img class="avatar avatar-lg" src="/assets_admin/img/400x400/img12.jpg" alt="Image Description">
                                </div>
                                <div class="flex-grow-1 ms-3">
                                    <h5 class="text-inherit mb-0">Apple AirPods 2</h5>
                                </div>
                            </a>
                        </td>
                        <td>Electronics</td>
                        <td>Apple</td>
                        <td>
                            <div class="form-check form-switch">
                                <input class="form-check-input" type="checkbox" id="stocksCheckbox8">
                                <label class="form-check-label" for="stocksCheckbox8"></label>
                            </div>
                        </td>
                        <td>1084741241</td>
                        <td>$249</td>
                        <td>1000</td>
                        <td>1</td>
                        <td>
                            <div class="btn-group" role="group">
                                <a class="btn btn-white btn-sm" href="./ecommerce-product-details.html">
                                    <i class="bi-pencil-fill me-1"></i> Edit
                                </a>

                                <!-- Button Group -->
                                <div class="btn-group">
                                    <button type="button" class="btn btn-white btn-icon btn-sm dropdown-toggle dropdown-toggle-empty" id="productsEditDropdown8" data-bs-toggle="dropdown" aria-expanded="false"></button>

                                    <div class="dropdown-menu dropdown-menu-end mt-1" aria-labelledby="productsEditDropdown8">
                                        <a class="dropdown-item" href="#">
                                            <i class="bi-trash dropdown-item-icon"></i> Delete
                                        </a>
                                        <a class="dropdown-item" href="#">
                                            <i class="bi-archive dropdown-item-icon"></i> Archive
                                        </a>
                                        <a class="dropdown-item" href="#">
                                            <i class="bi-upload dropdown-item-icon"></i> Publish
                                        </a>
                                        <a class="dropdown-item" href="#">
                                            <i class="bi-x-lg dropdown-item-icon"></i> Unpublish
                                        </a>
                                    </div>
                                </div>
                                <!-- End Button Group -->
                            </div>
                        </td>
                    </tr>

                    <tr>
                        <td class="table-column-pe-0">
                            <div class="form-check">
                                <input class="form-check-input" type="checkbox" value="" id="productsCheck9">
                                <label class="form-check-label" for="productsCheck9">
                                </label>
                            </div>
                        </td>
                        <td class="table-column-ps-0">
                            <a class="d-flex align-items-center" href="./ecommerce-product-details.html">
                                <div class="flex-shrink-0">
                                    <img class="avatar avatar-lg" src="/assets_admin/img/400x400/img13.jpg" alt="Image Description">
                                </div>
                                <div class="flex-grow-1 ms-3">
                                    <h5 class="text-inherit mb-0">Timex Watch</h5>
                                </div>
                            </a>
                        </td>
                        <td>Accessories</td>
                        <td>Timex</td>
                        <td>
                            <div class="form-check form-switch">
                                <input class="form-check-input" type="checkbox" id="stocksCheckbox9">
                                <label class="form-check-label" for="stocksCheckbox9"></label>
                            </div>
                        </td>
                        <td>4831441241</td>
                        <td>$68</td>
                        <td>15</td>
                        <td>2</td>
                        <td>
                            <div class="btn-group" role="group">
                                <a class="btn btn-white btn-sm" href="./ecommerce-product-details.html">
                                    <i class="bi-pencil-fill me-1"></i> Edit
                                </a>

                                <!-- Button Group -->
                                <div class="btn-group">
                                    <button type="button" class="btn btn-white btn-icon btn-sm dropdown-toggle dropdown-toggle-empty" id="productsEditDropdown9" data-bs-toggle="dropdown" aria-expanded="false"></button>

                                    <div class="dropdown-menu dropdown-menu-end mt-1" aria-labelledby="productsEditDropdown9">
                                        <a class="dropdown-item" href="#">
                                            <i class="bi-trash dropdown-item-icon"></i> Delete
                                        </a>
                                        <a class="dropdown-item" href="#">
                                            <i class="bi-archive dropdown-item-icon"></i> Archive
                                        </a>
                                        <a class="dropdown-item" href="#">
                                            <i class="bi-upload dropdown-item-icon"></i> Publish
                                        </a>
                                        <a class="dropdown-item" href="#">
                                            <i class="bi-x-lg dropdown-item-icon"></i> Unpublish
                                        </a>
                                    </div>
                                </div>
                                <!-- End Button Group -->
                            </div>
                        </td>
                    </tr>

                    <tr>
                        <td class="table-column-pe-0">
                            <div class="form-check">
                                <input class="form-check-input" type="checkbox" value="" id="productsCheck10">
                                <label class="form-check-label" for="productsCheck10">
                                </label>
                            </div>
                        </td>
                        <td class="table-column-ps-0">
                            <a class="d-flex align-items-center" href="./ecommerce-product-details.html">
                                <div class="flex-shrink-0">
                                    <img class="avatar avatar-lg" src="/assets_admin/img/400x400/img14.jpg" alt="Image Description">
                                </div>
                                <div class="flex-grow-1 ms-3">
                                    <h5 class="text-inherit mb-0">Air Jordan 1</h5>
                                </div>
                            </a>
                        </td>
                        <td>Shoes</td>
                        <td>Nike Jordan</td>
                        <td>
                            <div class="form-check form-switch">
                                <input class="form-check-input" type="checkbox" id="stocksCheckbox10" checked>
                                <label class="form-check-label" for="stocksCheckbox10"></label>
                            </div>
                        </td>
                        <td>1223847441</td>
                        <td>$139</td>
                        <td>456</td>
                        <td>9</td>
                        <td>
                            <div class="btn-group" role="group">
                                <a class="btn btn-white btn-sm" href="./ecommerce-product-details.html">
                                    <i class="bi-pencil-fill me-1"></i> Edit
                                </a>

                                <!-- Button Group -->
                                <div class="btn-group">
                                    <button type="button" class="btn btn-white btn-icon btn-sm dropdown-toggle dropdown-toggle-empty" id="productsEditDropdown10" data-bs-toggle="dropdown" aria-expanded="false"></button>

                                    <div class="dropdown-menu dropdown-end-end mt-1" aria-labelledby="productsEditDropdown10">
                                        <a class="dropdown-item" href="#">
                                            <i class="bi-trash dropdown-item-icon"></i> Delete
                                        </a>
                                        <a class="dropdown-item" href="#">
                                            <i class="bi-archive dropdown-item-icon"></i> Archive
                                        </a>
                                        <a class="dropdown-item" href="#">
                                            <i class="bi-upload dropdown-item-icon"></i> Publish
                                        </a>
                                        <a class="dropdown-item" href="#">
                                            <i class="bi-x-lg dropdown-item-icon"></i> Unpublish
                                        </a>
                                    </div>
                                </div>
                                <!-- End Button Group -->
                            </div>
                        </td>
                    </tr>

                    <tr>
                        <td class="table-column-pe-0">
                            <div class="form-check">
                                <input class="form-check-input" type="checkbox" value="" id="productsCheck11">
                                <label class="form-check-label" for="productsCheck11">
                                </label>
                            </div>
                        </td>
                        <td class="table-column-ps-0">
                            <a class="d-flex align-items-center" href="./ecommerce-product-details.html">
                                <div class="flex-shrink-0">
                                    <img class="avatar avatar-lg" src="/assets_admin/img/400x400/img15.jpg" alt="Image Description">
                                </div>
                                <div class="flex-grow-1 ms-3">
                                    <h5 class="text-inherit mb-0">RayBan sunglasses</h5>
                                </div>
                            </a>
                        </td>
                        <td>Accessories</td>
                        <td>RayBan</td>
                        <td>
                            <div class="form-check form-switch">
                                <input class="form-check-input" type="checkbox" id="stocksCheckbox11">
                                <label class="form-check-label" for="stocksCheckbox11"></label>
                            </div>
                        </td>
                        <td>1242384741</td>
                        <td>$14</td>
                        <td>83</td>
                        <td>1</td>
                        <td>
                            <div class="btn-group" role="group">
                                <a class="btn btn-white btn-sm" href="./ecommerce-product-details.html">
                                    <i class="bi-pencil-fill me-1"></i> Edit
                                </a>

                                <!-- Button Group -->
                                <div class="btn-group">
                                    <button type="button" class="btn btn-white btn-icon btn-sm dropdown-toggle dropdown-toggle-empty" id="productsEditDropdown11" data-bs-toggle="dropdown" aria-expanded="false"></button>

                                    <div class="dropdown-menu dropdown-end-end mt-1" aria-labelledby="productsEditDropdown11">
                                        <a class="dropdown-item" href="#">
                                            <i class="bi-trash dropdown-item-icon"></i> Delete
                                        </a>
                                        <a class="dropdown-item" href="#">
                                            <i class="bi-archive dropdown-item-icon"></i> Archive
                                        </a>
                                        <a class="dropdown-item" href="#">
                                            <i class="bi-upload dropdown-item-icon"></i> Publish
                                        </a>
                                        <a class="dropdown-item" href="#">
                                            <i class="bi-x-lg dropdown-item-icon"></i> Unpublish
                                        </a>
                                    </div>
                                </div>
                                <!-- End Button Group -->
                            </div>
                        </td>
                    </tr>

                    <tr>
                        <td class="table-column-pe-0">
                            <div class="form-check">
                                <input class="form-check-input" type="checkbox" value="" id="productsCheck12">
                                <label class="form-check-label" for="productsCheck12">
                                </label>
                            </div>
                        </td>
                        <td class="table-column-ps-0">
                            <a class="d-flex align-items-center" href="./ecommerce-product-details.html">
                                <div class="flex-shrink-0">
                                    <img class="avatar avatar-lg" src="/assets_admin/img/400x400/img17.jpg" alt="Image Description">
                                </div>
                                <div class="flex-grow-1 ms-3">
                                    <h5 class="text-inherit mb-0">Gray and yellow cap</h5>
                                </div>
                            </a>
                        </td>
                        <td>Accessories</td>
                        <td>VA RVCA</td>
                        <td>
                            <div class="form-check form-switch">
                                <input class="form-check-input" type="checkbox" id="stocksCheckbox12">
                                <label class="form-check-label" for="stocksCheckbox12"></label>
                            </div>
                        </td>
                        <td>8311741241</td>
                        <td>$9</td>
                        <td>522</td>
                        <td>1</td>
                        <td>
                            <div class="btn-group" role="group">
                                <a class="btn btn-white btn-sm" href="./ecommerce-product-details.html">
                                    <i class="bi-pencil-fill me-1"></i> Edit
                                </a>

                                <!-- Button Group -->
                                <div class="btn-group">
                                    <button type="button" class="btn btn-white btn-icon btn-sm dropdown-toggle dropdown-toggle-empty" id="productsEditDropdown12" data-bs-toggle="dropdown" aria-expanded="false"></button>

                                    <div class="dropdown-menu dropdown-end-end mt-1" aria-labelledby="productsEditDropdown12">
                                        <a class="dropdown-item" href="#">
                                            <i class="bi-trash dropdown-item-icon"></i> Delete
                                        </a>
                                        <a class="dropdown-item" href="#">
                                            <i class="bi-archive dropdown-item-icon"></i> Archive
                                        </a>
                                        <a class="dropdown-item" href="#">
                                            <i class="bi-upload dropdown-item-icon"></i> Publish
                                        </a>
                                        <a class="dropdown-item" href="#">
                                            <i class="bi-x-lg dropdown-item-icon"></i> Unpublish
                                        </a>
                                    </div>
                                </div>
                                <!-- End Button Group -->
                            </div>
                        </td>
                    </tr>

                    <tr>
                        <td class="table-column-pe-0">
                            <div class="form-check">
                                <input class="form-check-input" type="checkbox" value="" id="productsCheck13">
                                <label class="form-check-label" for="productsCheck13">
                                </label>
                            </div>
                        </td>
                        <td class="table-column-ps-0">
                            <a class="d-flex align-items-center" href="./ecommerce-product-details.html">
                                <div class="flex-shrink-0">
                                    <img class="avatar avatar-lg" src="/assets_admin/img/400x400/img16.jpg" alt="Image Description">
                                </div>
                                <div class="flex-grow-1 ms-3">
                                    <h5 class="text-inherit mb-0">Apple iPad Pro 2020</h5>
                                </div>
                            </a>
                        </td>
                        <td>Electronics</td>
                        <td>Apple</td>
                        <td>
                            <div class="form-check form-switch">
                                <input class="form-check-input" type="checkbox" id="stocksCheckbox13" checked>
                                <label class="form-check-label" for="stocksCheckbox13"></label>
                            </div>
                        </td>
                        <td>2459741241</td>
                        <td>$799</td>
                        <td>450</td>
                        <td>8</td>
                        <td>
                            <div class="btn-group" role="group">
                                <a class="btn btn-white btn-sm" href="./ecommerce-product-details.html">
                                    <i class="bi-pencil-fill me-1"></i> Edit
                                </a>

                                <!-- Button Group -->
                                <div class="btn-group">
                                    <button type="button" class="btn btn-white btn-icon btn-sm dropdown-toggle dropdown-toggle-empty" id="productsEditDropdown13" data-bs-toggle="dropdown" aria-expanded="false"></button>

                                    <div class="dropdown-menu dropdown-end-end mt-1" aria-labelledby="productsEditDropdown13">
                                        <a class="dropdown-item" href="#">
                                            <i class="bi-trash dropdown-item-icon"></i> Delete
                                        </a>
                                        <a class="dropdown-item" href="#">
                                            <i class="bi-archive dropdown-item-icon"></i> Archive
                                        </a>
                                        <a class="dropdown-item" href="#">
                                            <i class="bi-upload dropdown-item-icon"></i> Publish
                                        </a>
                                        <a class="dropdown-item" href="#">
                                            <i class="bi-x-lg dropdown-item-icon"></i> Unpublish
                                        </a>
                                    </div>
                                </div>
                                <!-- End Button Group -->
                            </div>
                        </td>
                    </tr>

                    <tr>
                        <td class="table-column-pe-0">
                            <div class="form-check">
                                <input class="form-check-input" type="checkbox" value="" id="productsCheck14">
                                <label class="form-check-label" for="productsCheck14">
                                </label>
                            </div>
                        </td>
                        <td class="table-column-ps-0">
                            <a class="d-flex align-items-center" href="./ecommerce-product-details.html">
                                <div class="flex-shrink-0">
                                    <img class="avatar avatar-lg" src="/assets_admin/img/400x400/img18.jpg" alt="Image Description">
                                </div>
                                <div class="flex-grow-1 ms-3">
                                    <h5 class="text-inherit mb-0">Brown Hat</h5>
                                </div>
                            </a>
                        </td>
                        <td>Accessories</td>
                        <td>Mango</td>
                        <td>
                            <div class="form-check form-switch">
                                <input class="form-check-input" type="checkbox" id="stocksCheckbox14" checked>
                                <label class="form-check-label" for="stocksCheckbox14"></label>
                            </div>
                        </td>
                        <td>2384994241</td>
                        <td>$67</td>
                        <td>32</td>
                        <td>7</td>
                        <td>
                            <div class="btn-group" role="group">
                                <a class="btn btn-white btn-sm" href="./ecommerce-product-details.html">
                                    <i class="bi-pencil-fill me-1"></i> Edit
                                </a>

                                <!-- Button Group -->
                                <div class="btn-group">
                                    <button type="button" class="btn btn-white btn-icon btn-sm dropdown-toggle dropdown-toggle-empty" id="productsEditDropdown14" data-bs-toggle="dropdown" aria-expanded="false"></button>

                                    <div class="dropdown-menu dropdown-end-end mt-1" aria-labelledby="productsEditDropdown14">
                                        <a class="dropdown-item" href="#">
                                            <i class="bi-trash dropdown-item-icon"></i> Delete
                                        </a>
                                        <a class="dropdown-item" href="#">
                                            <i class="bi-archive dropdown-item-icon"></i> Archive
                                        </a>
                                        <a class="dropdown-item" href="#">
                                            <i class="bi-upload dropdown-item-icon"></i> Publish
                                        </a>
                                        <a class="dropdown-item" href="#">
                                            <i class="bi-x-lg dropdown-item-icon"></i> Unpublish
                                        </a>
                                    </div>
                                </div>
                                <!-- End Button Group -->
                            </div>
                        </td>
                    </tr>

                    <tr>
                        <td class="table-column-pe-0">
                            <div class="form-check">
                                <input class="form-check-input" type="checkbox" value="" id="productsCheck15">
                                <label class="form-check-label" for="productsCheck15">
                                </label>
                            </div>
                        </td>
                        <td class="table-column-ps-0">
                            <a class="d-flex align-items-center" href="./ecommerce-product-details.html">
                                <div class="flex-shrink-0">
                                    <img class="avatar avatar-lg" src="/assets_admin/img/400x400/img19.jpg" alt="Image Description">
                                </div>
                                <div class="flex-grow-1 ms-3">
                                    <h5 class="text-inherit mb-0">Levis women's jeans</h5>
                                </div>
                            </a>
                        </td>
                        <td>Clothing</td>
                        <td>Levis</td>
                        <td>
                            <div class="form-check form-switch">
                                <input class="form-check-input" type="checkbox" id="stocksCheckbox15">
                                <label class="form-check-label" for="stocksCheckbox15"></label>
                            </div>
                        </td>
                        <td>1344761241</td>
                        <td>$74</td>
                        <td>121</td>
                        <td>3</td>
                        <td>
                            <div class="btn-group" role="group">
                                <a class="btn btn-white btn-sm" href="./ecommerce-product-details.html">
                                    <i class="bi-pencil-fill me-1"></i> Edit
                                </a>

                                <!-- Button Group -->
                                <div class="btn-group">
                                    <button type="button" class="btn btn-white btn-icon btn-sm dropdown-toggle dropdown-toggle-empty" id="productsEditDropdown15" data-bs-toggle="dropdown" aria-expanded="false"></button>

                                    <div class="dropdown-menu dropdown-end-end mt-1" aria-labelledby="productsEditDropdown15">
                                        <a class="dropdown-item" href="#">
                                            <i class="bi-trash dropdown-item-icon"></i> Delete
                                        </a>
                                        <a class="dropdown-item" href="#">
                                            <i class="bi-archive dropdown-item-icon"></i> Archive
                                        </a>
                                        <a class="dropdown-item" href="#">
                                            <i class="bi-upload dropdown-item-icon"></i> Publish
                                        </a>
                                        <a class="dropdown-item" href="#">
                                            <i class="bi-x-lg dropdown-item-icon"></i> Unpublish
                                        </a>
                                    </div>
                                </div>
                                <!-- End Button Group -->
                            </div>
                        </td>
                    </tr>

                    <tr>
                        <td class="table-column-pe-0">
                            <div class="form-check">
                                <input class="form-check-input" type="checkbox" value="" id="productsCheck16">
                                <label class="form-check-label" for="productsCheck16">
                                </label>
                            </div>
                        </td>
                        <td class="table-column-ps-0">
                            <a class="d-flex align-items-center" href="./ecommerce-product-details.html">
                                <div class="flex-shrink-0">
                                    <img class="avatar avatar-lg" src="/assets_admin/img/400x400/img20.jpg" alt="Image Description">
                                </div>
                                <div class="flex-grow-1 ms-3">
                                    <h5 class="text-inherit mb-0">Levis men's jeans jacket</h5>
                                </div>
                            </a>
                        </td>
                        <td>Clothing</td>
                        <td>Levis</td>
                        <td>
                            <div class="form-check form-switch">
                                <input class="form-check-input" type="checkbox" id="stocksCheckbox16">
                                <label class="form-check-label" for="stocksCheckbox16"></label>
                            </div>
                        </td>
                        <td>9904741241</td>
                        <td>$61</td>
                        <td>357</td>
                        <td>1</td>
                        <td>
                            <div class="btn-group" role="group">
                                <a class="btn btn-white btn-sm" href="./ecommerce-product-details.html">
                                    <i class="bi-pencil-fill me-1"></i> Edit
                                </a>

                                <!-- Button Group -->
                                <div class="btn-group">
                                    <button type="button" class="btn btn-white btn-icon btn-sm dropdown-toggle dropdown-toggle-empty" id="productsEditDropdown16" data-bs-toggle="dropdown" aria-expanded="false"></button>

                                    <div class="dropdown-menu dropdown-end-end mt-1" aria-labelledby="productsEditDropdown16">
                                        <a class="dropdown-item" href="#">
                                            <i class="bi-trash dropdown-item-icon"></i> Delete
                                        </a>
                                        <a class="dropdown-item" href="#">
                                            <i class="bi-archive dropdown-item-icon"></i> Archive
                                        </a>
                                        <a class="dropdown-item" href="#">
                                            <i class="bi-upload dropdown-item-icon"></i> Publish
                                        </a>
                                        <a class="dropdown-item" href="#">
                                            <i class="bi-x-lg dropdown-item-icon"></i> Unpublish
                                        </a>
                                    </div>
                                </div>
                                <!-- End Button Group -->
                            </div>
                        </td>
                    </tr>

                    <tr>
                        <td class="table-column-pe-0">
                            <div class="form-check">
                                <input class="form-check-input" type="checkbox" value="" id="productsCheck17">
                                <label class="form-check-label" for="productsCheck17">
                                </label>
                            </div>
                        </td>
                        <td class="table-column-ps-0">
                            <a class="d-flex align-items-center" href="./ecommerce-product-details.html">
                                <div class="flex-shrink-0">
                                    <img class="avatar avatar-lg" src="/assets_admin/img/400x400/img21.jpg" alt="Image Description">
                                </div>
                                <div class="flex-grow-1 ms-3">
                                    <h5 class="text-inherit mb-0">Beats Headphones</h5>
                                </div>
                            </a>
                        </td>
                        <td>Electronics</td>
                        <td>Beats</td>
                        <td>
                            <div class="form-check form-switch">
                                <input class="form-check-input" type="checkbox" id="stocksCheckbox17">
                                <label class="form-check-label" for="stocksCheckbox17"></label>
                            </div>
                        </td>
                        <td>8812384741</td>
                        <td>$499</td>
                        <td>50</td>
                        <td>4</td>
                        <td>
                            <div class="btn-group" role="group">
                                <a class="btn btn-white btn-sm" href="./ecommerce-product-details.html">
                                    <i class="bi-pencil-fill me-1"></i> Edit
                                </a>

                                <!-- Button Group -->
                                <div class="btn-group">
                                    <button type="button" class="btn btn-white btn-icon btn-sm dropdown-toggle dropdown-toggle-empty" id="productsEditDropdown17" data-bs-toggle="dropdown" aria-expanded="false"></button>

                                    <div class="dropdown-menu dropdown-end-end mt-1" aria-labelledby="productsEditDropdown17">
                                        <a class="dropdown-item" href="#">
                                            <i class="bi-trash dropdown-item-icon"></i> Delete
                                        </a>
                                        <a class="dropdown-item" href="#">
                                            <i class="bi-archive dropdown-item-icon"></i> Archive
                                        </a>
                                        <a class="dropdown-item" href="#">
                                            <i class="bi-upload dropdown-item-icon"></i> Publish
                                        </a>
                                        <a class="dropdown-item" href="#">
                                            <i class="bi-x-lg dropdown-item-icon"></i> Unpublish
                                        </a>
                                    </div>
                                </div>
                                <!-- End Button Group -->
                            </div>
                        </td>
                    </tr>

                    <tr>
                        <td class="table-column-pe-0">
                            <div class="form-check">
                                <input class="form-check-input" type="checkbox" value="" id="productsCheck18">
                                <label class="form-check-label" for="productsCheck18">
                                </label>
                            </div>
                        </td>
                        <td class="table-column-ps-0">
                            <a class="d-flex align-items-center" href="./ecommerce-product-details.html">
                                <div class="flex-shrink-0">
                                    <img class="avatar avatar-lg" src="/assets_admin/img/400x400/img22.jpg" alt="Image Description">
                                </div>
                                <div class="flex-grow-1 ms-3">
                                    <h5 class="text-inherit mb-0">Office Notebook</h5>
                                </div>
                            </a>
                        </td>
                        <td>Accessories</td>
                        <td>-</td>
                        <td>
                            <div class="form-check form-switch">
                                <input class="form-check-input" type="checkbox" id="stocksCheckbox18">
                                <label class="form-check-label" for="stocksCheckbox18"></label>
                            </div>
                        </td>
                        <td>7134741241</td>
                        <td>$9</td>
                        <td>750</td>
                        <td>1</td>
                        <td>
                            <div class="btn-group" role="group">
                                <a class="btn btn-white btn-sm" href="./ecommerce-product-details.html">
                                    <i class="bi-pencil-fill me-1"></i> Edit
                                </a>

                                <!-- Button Group -->
                                <div class="btn-group">
                                    <button type="button" class="btn btn-white btn-icon btn-sm dropdown-toggle dropdown-toggle-empty" id="productsEditDropdown18" data-bs-toggle="dropdown" aria-expanded="false"></button>

                                    <div class="dropdown-menu dropdown-end-end mt-1" aria-labelledby="productsEditDropdown18">
                                        <a class="dropdown-item" href="#">
                                            <i class="bi-trash dropdown-item-icon"></i> Delete
                                        </a>
                                        <a class="dropdown-item" href="#">
                                            <i class="bi-archive dropdown-item-icon"></i> Archive
                                        </a>
                                        <a class="dropdown-item" href="#">
                                            <i class="bi-upload dropdown-item-icon"></i> Publish
                                        </a>
                                        <a class="dropdown-item" href="#">
                                            <i class="bi-x-lg dropdown-item-icon"></i> Unpublish
                                        </a>
                                    </div>
                                </div>
                                <!-- End Button Group -->
                            </div>
                        </td>
                    </tr>

                    <tr>
                        <td class="table-column-pe-0">
                            <div class="form-check">
                                <input class="form-check-input" type="checkbox" value="" id="productsCheck19">
                                <label class="form-check-label" for="productsCheck19">
                                </label>
                            </div>
                        </td>
                        <td class="table-column-ps-0">
                            <a class="d-flex align-items-center" href="./ecommerce-product-details.html">
                                <div class="flex-shrink-0">
                                    <img class="avatar avatar-lg" src="/assets_admin/img/400x400/img23.jpg" alt="Image Description">
                                </div>
                                <div class="flex-grow-1 ms-3">
                                    <h5 class="text-inherit mb-0">Colorful pens</h5>
                                </div>
                            </a>
                        </td>
                        <td>Accessories</td>
                        <td>-</td>
                        <td>
                            <div class="form-check form-switch">
                                <input class="form-check-input" type="checkbox" id="stocksCheckbox19" checked>
                                <label class="form-check-label" for="stocksCheckbox19"></label>
                            </div>
                        </td>
                        <td>2224741241</td>
                        <td>$6</td>
                        <td>750</td>
                        <td>3</td>
                        <td>
                            <div class="btn-group" role="group">
                                <a class="btn btn-white btn-sm" href="./ecommerce-product-details.html">
                                    <i class="bi-pencil-fill me-1"></i> Edit
                                </a>

                                <!-- Button Group -->
                                <div class="btn-group">
                                    <button type="button" class="btn btn-white btn-icon btn-sm dropdown-toggle dropdown-toggle-empty" id="productsEditDropdown19" data-bs-toggle="dropdown" aria-expanded="false"></button>

                                    <div class="dropdown-menu dropdown-end-end mt-1" aria-labelledby="productsEditDropdown19">
                                        <a class="dropdown-item" href="#">
                                            <i class="bi-trash dropdown-item-icon"></i> Delete
                                        </a>
                                        <a class="dropdown-item" href="#">
                                            <i class="bi-archive dropdown-item-icon"></i> Archive
                                        </a>
                                        <a class="dropdown-item" href="#">
                                            <i class="bi-upload dropdown-item-icon"></i> Publish
                                        </a>
                                        <a class="dropdown-item" href="#">
                                            <i class="bi-x-lg dropdown-item-icon"></i> Unpublish
                                        </a>
                                    </div>
                                </div>
                                <!-- End Button Group -->
                            </div>
                        </td>
                    </tr>

                    <tr>
                        <td class="table-column-pe-0">
                            <div class="form-check">
                                <input class="form-check-input" type="checkbox" value="" id="productsCheck20">
                                <label class="form-check-label" for="productsCheck20">
                                </label>
                            </div>
                        </td>
                        <td class="table-column-ps-0">
                            <a class="d-flex align-items-center" href="./ecommerce-product-details.html">
                                <div class="flex-shrink-0">
                                    <img class="avatar avatar-lg" src="/assets_admin/img/400x400/img24.jpg" alt="Image Description">
                                </div>
                                <div class="flex-grow-1 ms-3">
                                    <h5 class="text-inherit mb-0">Clarks shoes</h5>
                                </div>
                            </a>
                        </td>
                        <td>Shoes</td>
                        <td>Clarks</td>
                        <td>
                            <div class="form-check form-switch">
                                <input class="form-check-input" type="checkbox" id="stocksCheckbox20" checked>
                                <label class="form-check-label" for="stocksCheckbox20"></label>
                            </div>
                        </td>
                        <td>2614741241</td>
                        <td>$66</td>
                        <td>982</td>
                        <td>10</td>
                        <td>
                            <div class="btn-group" role="group">
                                <a class="btn btn-white btn-sm" href="./ecommerce-product-details.html">
                                    <i class="bi-pencil-fill me-1"></i> Edit
                                </a>

                                <!-- Button Group -->
                                <div class="btn-group">
                                    <button type="button" class="btn btn-white btn-icon btn-sm dropdown-toggle dropdown-toggle-empty" id="productsEditDropdown20" data-bs-toggle="dropdown" aria-expanded="false"></button>

                                    <div class="dropdown-menu dropdown-end-end mt-1" aria-labelledby="productsEditDropdown20">
                                        <a class="dropdown-item" href="#">
                                            <i class="bi-trash dropdown-item-icon"></i> Delete
                                        </a>
                                        <a class="dropdown-item" href="#">
                                            <i class="bi-archive dropdown-item-icon"></i> Archive
                                        </a>
                                        <a class="dropdown-item" href="#">
                                            <i class="bi-upload dropdown-item-icon"></i> Publish
                                        </a>
                                        <a class="dropdown-item" href="#">
                                            <i class="bi-x-lg dropdown-item-icon"></i> Unpublish
                                        </a>
                                    </div>
                                </div>
                                <!-- End Button Group -->
                            </div>
                        </td>
                    </tr>
                    </tbody>
                </table>
            </div>
            <!-- End Table -->

            <!-- Footer -->
            <div class="card-footer">
                <div class="row justify-content-center justify-content-sm-between align-items-sm-center">
                    <div class="col-sm mb-2 mb-sm-0">
                        <div class="d-flex justify-content-center justify-content-sm-start align-items-center">
                            <span class="me-2">Showing:</span>

                            <!-- Select -->
                            <div class="tom-select-custom">
                                <select id="datatableEntries" class="js-select form-select form-select-borderless w-auto" autocomplete="off" data-hs-tom-select-options='{
                            "searchInDropdown": false,
                            "hideSearch": true
                          }'>
                                    <option value="12">12</option>
                                    <option value="14" selected>14</option>
                                    <option value="16">16</option>
                                    <option value="18">18</option>
                                </select>
                            </div>
                            <!-- End Select -->

                            <span class="text-secondary me-2">of</span>

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
                <!-- End Row -->
            </div>
            <!-- End Footer -->
        </div>
        <!-- End Card -->
    </div>
    <!-- End Content -->

    <!-- Footer -->

    <div class="footer">
        <div class="row justify-content-between align-items-center">
            <div class="col">
                <p class="fs-6 mb-0">&copy; Front. <span class="d-none d-sm-inline-block">2022 Htmlstream.</span></p>
            </div>
            <!-- End Col -->

            <div class="col-auto">
                <div class="d-flex justify-content-end">
                    <!-- List Separator -->
                    <ul class="list-inline list-separator">
                        <li class="list-inline-item">
                            <a class="list-separator-link" href="#">FAQ</a>
                        </li>

                        <li class="list-inline-item">
                            <a class="list-separator-link" href="#">License</a>
                        </li>

                        <li class="list-inline-item">
                            <!-- Keyboard Shortcuts Toggle -->
                            <button class="btn btn-ghost-secondary btn btn-icon btn-ghost-secondary rounded-circle" type="button" data-bs-toggle="offcanvas" data-bs-target="#offcanvasKeyboardShortcuts" aria-controls="offcanvasKeyboardShortcuts">
                                <i class="bi-command"></i>
                            </button>
                            <!-- End Keyboard Shortcuts Toggle -->
                        </li>
                    </ul>
                    <!-- End List Separator -->
                </div>
            </div>
            <!-- End Col -->
        </div>
        <!-- End Row -->
    </div>

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

<!-- End Import Products Modal -->

<!-- Product Filter Modal -->
<div class="offcanvas offcanvas-end" tabindex="-1" id="offcanvasEcommerceProductFilter" aria-labelledby="offcanvasEcommerceProductFilterLabel">
    <div class="offcanvas-header">
        <h4 id="offcanvasEcommerceProductFilterLabel" class="mb-0">Filters</h4>
        <button type="button" class="btn-close" data-bs-dismiss="offcanvas" aria-label="Close"></button>
    </div>
    <div class="offcanvas-body">
        <span class="text-cap small">Product vendor</span>

        <div class="row">
            <div class="col-6">
                <div class="d-grid gap-2 mb-2">
                    <!-- Form Check -->
                    <div class="form-check">
                        <input class="form-check-input" type="radio" name="productAvailabilityFilterRadio" value="" id="productVendorFilterRadio1">
                        <label class="form-check-label" for="productVendorFilterRadio1">Google</label>
                    </div>
                    <!-- End Form Check -->

                    <!-- Form Check -->
                    <div class="form-check">
                        <input class="form-check-input" type="radio" name="productAvailabilityFilterRadio" value="" id="productVendorFilterRadio2">
                        <label class="form-check-label" for="productVendorFilterRadio2">Topman</label>
                    </div>
                    <!-- End Form Check -->

                    <!-- Form Check -->
                    <div class="form-check">
                        <input class="form-check-input" type="radio" name="productAvailabilityFilterRadio" value="" id="productVendorFilterRadio3">
                        <label class="form-check-label" for="productVendorFilterRadio3">RayBan</label>
                    </div>
                    <!-- End Form Check -->

                    <!-- Form Check -->
                    <div class="form-check">
                        <input class="form-check-input" type="radio" name="productAvailabilityFilterRadio" value="" id="productVendorFilterRadio4">
                        <label class="form-check-label" for="productVendorFilterRadio4">Mango</label>
                    </div>
                    <!-- End Form Check -->

                    <!-- Form Check -->
                    <div class="form-check">
                        <input class="form-check-input" type="radio" name="productAvailabilityFilterRadio" value="" id="productVendorFilterRadio5">
                        <label class="form-check-label" for="productVendorFilterRadio5">Calvin Klein</label>
                    </div>
                    <!-- End Form Check -->

                    <!-- Form Check -->
                    <div class="form-check">
                        <input class="form-check-input" type="radio" name="productAvailabilityFilterRadio" value="" id="productVendorFilterRadio6">
                        <label class="form-check-label" for="productVendorFilterRadio6">Givenchy</label>
                    </div>
                    <!-- End Form Check -->

                    <!-- Form Check -->
                    <div class="form-check">
                        <input class="form-check-input" type="radio" name="productAvailabilityFilterRadio" value="" id="productVendorFilterRadio7">
                        <label class="form-check-label" for="productVendorFilterRadio7">Asos</label>
                    </div>
                    <!-- End Form Check -->

                    <!-- Form Check -->
                    <div class="form-check">
                        <input class="form-check-input" type="radio" name="productAvailabilityFilterRadio" value="" id="productVendorFilterRadio8">
                        <label class="form-check-label" for="productVendorFilterRadio8">Apple</label>
                    </div>
                    <!-- End Form Check -->
                </div>
            </div>

            <div class="col-6">
                <div class="d-grid gap-2 mb-2">
                    <!-- Form Check -->
                    <div class="form-check">
                        <input class="form-check-input" type="radio" name="productAvailabilityFilterRadio" value="" id="productVendorFilterRadio9">
                        <label class="form-check-label" for="productVendorFilterRadio9">Times</label>
                    </div>
                    <!-- End Form Check -->

                    <!-- Form Check -->
                    <div class="form-check">
                        <input class="form-check-input" type="radio" name="productAvailabilityFilterRadio" value="" id="productVendorFilterRadio10">
                        <label class="form-check-label" for="productVendorFilterRadio10">Asos</label>
                    </div>
                    <!-- End Form Check -->

                    <!-- Form Check -->
                    <div class="form-check">
                        <input class="form-check-input" type="radio" name="productAvailabilityFilterRadio" value="" id="productVendorFilterRadio11">
                        <label class="form-check-label" for="productVendorFilterRadio11">Nike Jordan</label>
                    </div>
                    <!-- End Form Check -->

                    <!-- Form Check -->
                    <div class="form-check">
                        <input class="form-check-input" type="radio" name="productAvailabilityFilterRadio" value="" id="productVendorFilterRadio12">
                        <label class="form-check-label" for="productVendorFilterRadio12">VA RVCA</label>
                    </div>
                    <!-- End Form Check -->

                    <!-- Form Check -->
                    <div class="form-check">
                        <input class="form-check-input" type="radio" name="productAvailabilityFilterRadio" value="" id="productVendorFilterRadio13">
                        <label class="form-check-label" for="productVendorFilterRadio13">Levis</label>
                    </div>
                    <!-- End Form Check -->

                    <!-- Form Check -->
                    <div class="form-check">
                        <input class="form-check-input" type="radio" name="productAvailabilityFilterRadio" value="" id="productVendorFilterRadio14">
                        <label class="form-check-label" for="productVendorFilterRadio14">Beats</label>
                    </div>
                    <!-- End Form Check -->

                    <!-- Form Check -->
                    <div class="form-check">
                        <input class="form-check-input" type="radio" name="productAvailabilityFilterRadio" value="" id="productVendorFilterRadio15">
                        <label class="form-check-label" for="productVendorFilterRadio15">Clarks</label>
                    </div>
                    <!-- End Form Check -->
                </div>
            </div>
        </div>
        <!-- End Row -->

        <a class="link mt-2" href="javascript:;">
            <i class="bi-x"></i> Clear
        </a>

        <hr>

        <span class="text-cap small">Availability</span>

        <div class="d-grid gap-2 mb-2">
            <!-- Form Check -->
            <div class="form-check">
                <input class="form-check-input" type="radio" name="productAvailabilityFilterRadio" value="" id="productAvailabilityFilterRadio1">
                <label class="form-check-label" for="productAvailabilityFilterRadio1">Available on Online Store</label>
            </div>
            <!-- End Form Check -->

            <!-- Form Check -->
            <div class="form-check">
                <input class="form-check-input" type="radio" name="productAvailabilityFilterRadio" value="" id="productAvailabilityFilterRadio2">
                <label class="form-check-label" for="productAvailabilityFilterRadio2">Unavailable on Online Store</label>
            </div>
            <!-- End Form Check -->
        </div>

        <a class="link mt-2" href="javascript:;">
            <i class="bi-x"></i> Clear
        </a>

        <hr>

        <span class="text-cap small">Tagged with</span>

        <div class="mb-2">
            <input type="text" class="form-control" name="tagsName" id="tagsLabel" placeholder="Enter tags here" aria-label="Enter tags here">
        </div>

        <a class="link mt-2" href="javascript:;">
            <i class="bi-x"></i> Clear
        </a>

        <hr>

        <span class="text-cap small">Product type</span>

        <div class="d-grid gap-2 mb-2">
            <!-- Form Check -->
            <div class="form-check">
                <input class="form-check-input" type="radio" name="productTypeFilterRadio" value="" id="productTypeFilterRadio1">
                <label class="form-check-label" for="productTypeFilterRadio1">Shoes</label>
            </div>
            <!-- End Form Check -->

            <!-- Form Check -->
            <div class="form-check">
                <input class="form-check-input" type="radio" name="productTypeFilterRadio" value="" id="productTypeFilterRadio2">
                <label class="form-check-label" for="productTypeFilterRadio2">Accessories</label>
            </div>
            <!-- End Form Check -->

            <!-- Form Check -->
            <div class="form-check">
                <input class="form-check-input" type="radio" name="productTypeFilterRadio" value="" id="productTypeFilterRadio3">
                <label class="form-check-label" for="productTypeFilterRadio3">Clothing</label>
            </div>
            <!-- End Form Check -->

            <!-- Form Check -->
            <div class="form-check">
                <input class="form-check-input" type="radio" name="productTypeFilterRadio" value="" id="productTypeFilterRadio4">
                <label class="form-check-label" for="productTypeFilterRadio4">Electronics</label>
            </div>
            <!-- End Form Check -->
        </div>

        <a class="link mt-2" href="javascript:;">
            <i class="bi-x"></i> Clear
        </a>

        <hr>

        <span class="text-cap small">Collection</span>

        <!-- Input Group -->
        <div class="input-group input-group-merge mb-2">
            <div class="input-group-prepend input-group-text">
                <i class="bi-search"></i>
            </div>

            <input type="search" class="form-control" placeholder="Search for collections" aria-label="Search for collections">
        </div>
        <!-- End Input Group -->

        <!-- Form Check -->
        <div class="form-check mb-2">
            <input class="form-check-input" type="radio" value="" id="productCollectionFilterRadio1">
            <label class="form-check-label" for="productCollectionFilterRadio1">Home page</label>
        </div>
        <!-- End Form Check -->

        <a class="link mt-2" href="javascript:;">
            <i class="bi-x"></i> Clear
        </a>
    </div>
    <!-- End Body -->

    <!-- Footer -->
    <div class="offcanvas-footer">
        <div class="row gx-2">
            <div class="col">
                <div class="d-grid">
                    <button type="button" class="btn btn-white">Clear all filters</button>
                </div>
            </div>
            <!-- End Col -->

            <div class="col">
                <div class="d-grid">
                    <button type="button" class="btn btn-primary">Save</button>
                </div>
            </div>
            <!-- End Col -->
        </div>
        <!-- End Row -->
    </div>
    <!-- End Footer -->
</div>
<!-- End Product Filter Modal -->
<!-- ========== END SECONDARY CONTENTS ========== -->

<!-- JS Global Compulsory  -->
<script src="/assets_admin/vendor/jquery/dist/jquery.min.js"></script>
<script src="/assets_admin/vendor/jquery-migrate/dist/jquery-migrate.min.js"></script>
<script src="/assets_admin/vendor/bootstrap/dist/js/bootstrap.bundle.min.js"></script>

<!-- JS Implementing Plugins -->
<script src="/assets_admin/vendor/hs-navbar-vertical-aside/dist/hs-navbar-vertical-aside.min.js"></script>
<script src="/assets_admin/vendor/hs-form-search/dist/hs-form-search.min.js"></script>

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

<!-- End Style Switcher JS -->
</body>
</html>
