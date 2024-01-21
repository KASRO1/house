@include("admin.layouts.header")
@include("admin.layouts.aside")
@include("admin.layouts.head")
@include("admin.layouts.footer")
@include("layouts.selectCoin")
<!DOCTYPE html>
<html lang="en">
<head>
    @yield("head")
    <title>Cryptonix | Пользователь {{$user['email']}}</title>

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
      <div class="row justify-content-lg-center">
        <div class="col-lg-10">
          <!-- Profile Cover -->

          <!-- End Profile Cover -->

          <!-- Profile Header -->
          <div class="text-center mb-5">
            <!-- Avatar -->

            <!-- End Avatar -->

            <h1 class="page-header-title">{{$user['email']}} <i class="bi-patch-check-fill fs-2 {{$user['kyc_step'] == 0 ? "text-secondary" : "text-primary"}}" data-bs-toggle="tooltip" data-bs-placement="top" title="{{$user['kyc_step'] == 0 ? "Пользователь не верифицирован" : "Пользователь верифицирован"}}"></i></h1>

            <!-- List -->
            <ul class="list-inline list-px-2">
              <li class="list-inline-item">
                <i class="bi-geo me-1"></i>
                <span>{{$sessions ? $sessions[0]['ip'] : "unSigned"}}</span>
              </li>

{{--              <li class="list-inline-item">--}}
{{--                <i class="bi-geo-alt me-1"></i>--}}
{{--                <a href="#">Москва,</a>--}}
{{--                <a href="#">Россия</a>--}}
{{--              </li>--}}

              <li class="list-inline-item">
                <i class="bi-calendar-week me-1"></i>
                <span>Зарегистрован {{\Carbon\Carbon::parse($user['created_at'])->format("d/m/y")}}</span>
              </li>
            </ul>
            <!-- End List -->
          </div>
          <!-- End Profile Header -->

          <!-- Nav -->
          <div class="js-nav-scroller hs-nav-scroller-horizontal mb-5">
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

            <ul class="nav nav-tabs align-items-center">
              <li class="nav-item">
                <a class="nav-link active" href="{{route("admin.user:id", $user['id'])}}">Профиль</a>
              </li>
{{--              <li class="nav-item">--}}
{{--                <a class="nav-link " href="./user-profile-teams.html">Кошельки</a>--}}
{{--              </li>--}}
{{--              <li class="nav-item">--}}
{{--                <a class="nav-link " href="./user-profile-projects.html">Projects <span class="badge bg-soft-dark text-dark rounded-circle ms-1">3</span></a>--}}
{{--              </li>--}}
{{--              <li class="nav-item">--}}
{{--                <a class="nav-link " href="./user-profile-connections.html">Connections</a>--}}
{{--              </li>--}}

              <li class="nav-item ms-auto">
                <div class="d-flex gap-2">
                  <!-- Form Check -->
                  <div class="form-check form-check-switch">
                      <a href="{{route("admin.user.auth:id", $user['id'])}}" class="form-check-default btn btn-sm btn-primary ">
                        <i class="bi-person-plus-fill"></i> Войти под этим аккаунтом
                      </a>
                  </div>
                  <!-- End Form Check -->


                  <!-- Dropdown -->
                    @if(\Illuminate\Support\Facades\Auth::user()->users_status == "admin")
                  <div class="dropdown nav-scroller-dropdown">
                    <button type="button" class="btn btn-white btn-icon btn-sm" id="profileDropdown" data-bs-toggle="dropdown" aria-expanded="false">
                      <i class="bi-three-dots-vertical"></i>
                    </button>

                    <div class="dropdown-menu dropdown-menu-end mt-1" aria-labelledby="profileDropdown">
                      <span class="dropdown-header">Настройки пользователя</span>

{{--                      <a class="dropdown-item" data-bs-toggle="modal"--}}
{{--                         data-bs-target="#addBalanceUser">--}}
{{--                        <i class="bi-plus-circle dropdown-item-icon"></i> Добавить баланс--}}
{{--                      </a>--}}
{{--                        <a class="dropdown-item" data-bs-toggle="modal"--}}
{{--                           data-bs-target="#removeBalanceUser">--}}
{{--                        <i class="bi-dash-circle dropdown-item-icon"></i> Отнять баланс--}}
{{--                      </a>--}}
{{--                      <a class="dropdown-item" href="">--}}
{{--                        <i class="bi-slash-circle dropdown-item-icon"></i>Заблокировать на бирже--}}
{{--                      </a>--}}


                      <div class="dropdown-divider"></div>

                        @if(\Illuminate\Support\Facades\Auth::user()->users_status == "admin")
                            <span class="dropdown-header">Настройки админа</span>

                            @if($user['users_status'] == "worker")
                                <a class="dropdown-item" href="{{route("admin.user.change.status:id", $user['id'])}}">
                                    <i class="bi-flag dropdown-item-icon"></i> Снять админку
                                </a>
                            @else
                                <a class="dropdown-item" href="{{route("admin.user.change.status:id", $user['id'])}}">
                                    <i class="bi-flag dropdown-item-icon"></i> Выдать админку
                                </a>
                            @endif

                        @endif
                    </div>

                  </div>
                    @endif
                  <!-- End Dropdown -->
                </div>
              </li>
            </ul>
          </div>
          <!-- End Nav -->

          <div class="row">
            <div class="col-lg-4">
              <!-- Card -->

              <!-- End Card -->
{{--        <div class="card card-body mb-3 mb-lg-5">
                <h5>Complete your profile</h5>

                <!-- Progress -->
                <div class="d-flex justify-content-between align-items-center">
                  <div class="progress flex-grow-1">
                    <div class="progress-bar bg-primary" role="progressbar" style="width: 82%" aria-valuenow="82" aria-valuemin="0" aria-valuemax="100"></div>
                  </div>
                  <span class="ms-4">82%</span>
                </div>
                <!-- End Progress -->
              </div>        --}}

              <!-- Sticky Block Start Point -->
              <div id="accountSidebarNav"></div>

              <!-- Card -->
              <div class="js-sticky-block card mb-3 mb-lg-5" data-hs-sticky-block-options='{
                     "parentSelector": "#accountSidebarNav",
                     "breakpoint": "lg",
                     "startPoint": "#accountSidebarNav",
                     "endPoint": "#stickyBlockEndPoint",
                     "stickyOffsetTop": 20
                   }'>
                <!-- Header -->
                <div class="card-header">
                  <h4 class="card-header-title">Профиль</h4>
                </div>
                <!-- End Header -->

                <!-- Body -->
                <div class="card-body">
                  <ul class="list-unstyled list-py-2 text-dark mb-0">
                    <li class="pb-0"><span class="card-subtitle">О пользователе</span></li>
                    <li><i class="bi-person dropdown-item-icon"></i> {{$kyc['first_name'] ." ". $kyc['last_name']}}</li>
                    <li><i class="bi-currency-dollar dropdown-item-icon"></i> {{$totalBalance}}</li>

                    <li class="pt-4 pb-0"><span class="card-subtitle">Контакты</span></li>
                    <li><i class="bi-at dropdown-item-icon"></i> {{$user['email']}}</li>
                    <li><i class="bi-phone dropdown-item-icon"></i> {{$kyc['phone']}}</li>

{{--                    <li class="pt-4 pb-0"><span class="card-subtitle">Teams</span></li>--}}
{{--                    <li><i class="bi-people dropdown-item-icon"></i> Member of 7 teams</li>--}}
{{--                    <li><i class="bi-stickies dropdown-item-icon"></i> Working on 8 projects</li>--}}
                  </ul>
                </div>
                <!-- End Body -->
              </div>
              <!-- End Card -->
            </div>

            <div class="col-lg-8">
              <div class="d-grid gap-3 gap-lg-5">
                <!-- Card -->
                <div class="card">
                  <!-- Header -->
                  <div class="card-header card-header-content-between">
                    <h4 class="card-header-title">Транзакции мамонта</h4>

                    <!-- Dropdown -->
                    <div class="dropdown">

                      <div class="dropdown-menu dropdown-menu-end mt-1" aria-labelledby="contentActivityStreamDropdown">
                        <span class="dropdown-header">Settings</span>

                        <a class="dropdown-item" href="#">
                          <i class="bi-share-fill dropdown-item-icon"></i> Share connections
                        </a>
                        <a class="dropdown-item" href="#">
                          <i class="bi-info-circle dropdown-item-icon"></i> Suggest edits
                        </a>

                        <div class="dropdown-divider"></div>

                        <span class="dropdown-header">Feedback</span>

                        <a class="dropdown-item" href="#">
                          <i class="bi-chat-left-dots dropdown-item-icon"></i> Report
                        </a>
                      </div>
                    </div>
                    <!-- End Dropdown -->
                  </div>
                  <!-- End Header -->

                  <!-- Body -->
                  <div class="card-body card-body-height" style="height: 30rem;">
                    <!-- Step -->
                    <ul class="step step-icon-xs mb-0">


                      @foreach($transactions as $transaction)
                            <li class="step-item">
                                <div class="step-content-wrapper">
                                    <span class="step-icon step-icon-pseudo step-icon-soft-dark"></span>

                                    <div class="step-content">
                                        <h5 class="step-title">
                                            <a class="text-dark" >{{$transaction['type']}}</a>
                                        </h5>


                                        <span class="text-muted small text-uppercase">{{$transaction['created_at']}}</span>
                                    </div>
                                </div>
                            </li>

                      @endforeach
                        @if(count($transactions) === 0)
                            <h1 style="text-align: center; width: 100%;">
                                Not found
                            </h1>
                        @endif


                      <!-- Step Item -->

                      <!-- End Step Item -->
                    </ul>
                    <!-- End Step -->
                  </div>
                  <!-- End Body -->

                  <!-- End Footer -->
                </div>
                <!-- End Card -->

                <div class="row">
                  <div class="col-sm-6 mb-3 mb-sm-0">
                    <!-- Card -->
                    <div class="card h-100">
                      <!-- Header -->
                      <div class="card-header d-flex justify-content-between align-items-center">
                        <h4 class="card-header-title">Балансы монет</h4>
                          <!-- Dropdown -->
                          <div class="dropdown nav-scroller-dropdown">
                              <button type="button" class="btn btn-white btn-icon btn-sm" id="profileDropdown" data-bs-toggle="dropdown" aria-expanded="false">
                                  <i class="bi-three-dots-vertical"></i>
                              </button>

                              <div class="dropdown-menu dropdown-menu-end mt-1" aria-labelledby="profileDropdown">
                                  <span class="dropdown-header">Настройки пользователя</span>

                                  <a class="dropdown-item" data-bs-toggle="modal"
                                     data-bs-target="#addBalanceUser">
                                      <i class="bi-plus-circle dropdown-item-icon"></i> Добавить баланс
                                  </a>
                                  <a class="dropdown-item" data-bs-toggle="modal"
                                     data-bs-target="#removeBalanceUser">
                                      <i class="bi-dash-circle dropdown-item-icon"></i> Отнять баланс
                                  </a>



                              </div>
                          </div>
                          <!-- End Dropdown -->
                      </div>
                      <!-- End Header -->

                      <!-- Body -->
                      <div class="card-body">
                        <ul class="list-unstyled list-py-3 mb-0">
                          <!-- Item -->

                            @foreach($balances as $balance)

                            @php
                                $coin_name = $coinFunction->getCoinInfo($balance['coin_id'])['simple_name'];
                            @endphp

                            <li>
                            <div class="d-flex align-items-center">
                              <a class="d-flex align-items-center me-2" >
                                <div class="flex-shrink-0">
                                  <div class="avatar avatar-sm avatar-soft-primary avatar-circle">
                                      <img src="{{asset("/images/coin_icons/" . $coin_name . ".svg")}}">
                                  </div>
                                </div>
                                <div class="flex-grow-1 ms-1">
                                  <h5 class="text-hover-primary mb-0">{{$coin_name}}</h5>

                                </div>
                              </a>
                              <div class="ms-auto">
                                <!-- Form Check -->
                                <div class="form-check form-check-switch d-flex align-items-center">
                                    <h5 class="align-items-center ">{{$balance['quantity']}}</h5>

                                </div>
                                <!-- End Form Check -->
                              </div>
                            </div>
                          </li>
                            @endforeach

                          <!-- End Item -->
                        </ul>
                      </div>
                      <!-- End Body -->

                      <!-- Footer -->

                      <!-- End Footer -->
                    </div>
                    <!-- End Card -->
                  </div>

                  <div class="col-sm-6">
                    <!-- Card -->
                    <div class="card h-100">
                      <!-- Header -->
                      <div class="card-header">
                        <h4 class="card-header-title">Сессии</h4>
                      </div>
                      <!-- End Header -->

                      <!-- Body -->
                      <div class="card-body">
                        <ul class="nav nav-pills card-nav card-nav-vertical nav-pills">
                          <!-- Item -->
                          <li>
                            <a class="nav-link" >
                              <div class="d-flex">
                                <div class="flex-shrink-0">
                                  <i class="bi-people-fill nav-icon text-dark"></i>
                                </div>
                                <div class="flex-grow-1 ms-3">

                                    @foreach($sessions as $session)
                                        <span class="d-block text-dark">{{$session['ip']}}</span>
                                        <small class="d-block text-muted">{{\Carbon\Carbon::parse($session['created_at'])->format("d/m/y H:i")}}</small>
                                    @endforeach
                                </div>
                              </div>
                            </a>
                          </li>
                          <!-- End Item -->


                          <!-- End Item -->
                        </ul>
                      </div>
                      <!-- End Body -->

                      <!-- Footer -->

                      <!-- End Footer -->
                    </div>
                    <!-- End Card -->
                  </div>
                </div>
                <!-- End Row -->

                <!-- Card -->

                  <!-- Card -->
                  <div id="emailSection" class="card">
                      <div class="card-header">
                          <h4 class="card-title">Ошибки</h4>
                      </div>

                      <!-- Body -->
                      <div class="card-body">
                          <p>Ошибка при выводе средств</p>
                          <form id="error_withdraw">
                              <!-- Form -->
                              <input hidden="" value="{{$user->id}}" name="user_id">
                              @csrf
                              <div class="row mb-4">


                                  <div class="input-group mb-3">
                                      <textarea   id="withdraw_error_input" rows="5" placeholder="Введите ошибку при выводе средств" name="text" type="text" class="form-control"  aria-describedby="basic-addon2">{{$user->personal_withdraw_error}}</textarea>
                                      <button type="submit" class="input-group-text btn btn-primary" id="basic-addon2">Сохранить</button>
                                  </div>

                                  <div class="d-flex gap-1">
                                      @foreach($templates as $template)
                                          <span onclick="writeTemplate({{$template['id']}}, 'withdraw_error_input')" style="cursor: pointer" class=" badge bg-primary rounded-pill">{{$template['title']}}</span>
                                      @endforeach
                                  </div>
                              </div>
                              <!-- End Form -->


                          </form>

                      </div>
                      <!-- End Body -->
                  </div>
                  <!-- End Card -->



                  <!-- Card -->
                  <div id="preferencesSection" class="card">
                      <div class="card-header">
                          <h4 class="card-title">Настройки</h4>
                      </div>

                      <!-- Body -->
                      <div class="card-body">
                          <!-- Form -->
                          <form id="UserSettingsCheckboxes">
                              <!-- Form -->
                              @csrf
                              <input hidden="" value="{{$user->id}}" name="user_id">
                              <!-- End Form -->

                              <!-- Form -->

                              <!-- End Form -->

                              <!-- Form Switch -->
                              {{--                  <label class="row form-check form-switch mb-4" for="accounrSettingsPreferencesSwitch1">--}}
                              {{--                    <span class="col-8 col-sm-9 ms-0">--}}
                              {{--                      <span class="d-block text-dark">Оповещения</span>--}}
                              {{--                        <span class="d-block fs-5 text-muted">Получать оповещения в телеграм</span>--}}
                              {{--                    </span>--}}
                              {{--                    <span class="col-4 col-sm-3 text-end">--}}
                              {{--                      <input type="checkbox" class="form-check-input" name="notification" id="accounrSettingsPreferencesSwitch1">--}}
                              {{--                    </span>--}}
                              {{--                  </label>--}}
                              <label class="row form-check form-switch mb-4" for="accounrSettingsPreferencesSwitch1">
                    <span class="col-8 col-sm-9 ms-0">
                      <span class="d-block text-dark"> Включить "Успешный вывод"</span>
                        <span class="d-block fs-5 text-muted">Если включено, то при выводе будет выдавать "успешную табличку".
</span>
                    </span>
                                  <span class="col-4 col-sm-3 text-end">
                      <input type="checkbox" {{$user->withdraw_funds ? "checked" : "" }} class="form-check-input" name="withdrawFunds" id="accounrSettingsPreferencesSwitch1">
                    </span>
                              </label>
                              <label class="row form-check form-switch mb-4" for="accounrSettingsPreferencesSwitch2">
                    <span class="col-8 col-sm-9 ms-0">
                      <span class="d-block text-dark">Статус "Премиум"</span>
                        <span class="d-block fs-5 text-muted">Меняет статус аккаунта на "Премиум".</span>
                    </span>
                                  <span class="col-4 col-sm-3 text-end">
                      <input type="checkbox" {{$user->premium ? "checked" : "" }} class="form-check-input" name="premium" id="accounrSettingsPreferencesSwitch2">
                    </span>
                              </label>
                              <label class="row form-check form-switch mb-4" for="accounrSettingsPreferencesSwitch3">
                    <span class="col-8 col-sm-9 ms-0">
                      <span class="d-block text-dark">Статус "Верифицирован"</span>
                        <span class="d-block fs-5 text-muted">Меняет статус аккаунта на "Верифицирован". Не забывайте чтобы у Вас он отображался на бирже отключите премиум аккаунт, и добавьте минимальный депозит к себе на баланс</span>
                    </span>
                                  <span class="col-4 col-sm-3 text-end">
                      <input type="checkbox" {{$user->kyc_step ? "checked" : "" }} class="form-check-input" name="kyc" id="accounrSettingsPreferencesSwitch3">
                    </span>
                              </label>
                              <!-- End Form Switch -->
                              <!-- Form Switch -->




                              <div class="d-flex justify-content-end">
                                  <button type="submit" class="btn btn-primary">Сохранить</button>
                              </div>
                          </form>
                          <!-- End Form -->
                      </div>
                      <!-- End Body -->
                  </div>
                  <!-- End Card -->



                <div class="card">
                  <!-- Header -->
                  <div class="card-header card-header-content-between">
                    <h4 class="card-header-title">Кошельки</h4>


                  </div>
                  <!-- End Header -->

                  <!-- Table -->
                  <div class="table-responsive">
                    <table class="table table-borderless table-thead-bordered table-nowrap table-align-middle card-table">
                      <thead class="thead-light">
                        <tr>
                          <th>Адрес</th>
                        </tr>
                      </thead>

                      <tbody>
                        @foreach($wallets as $key => $wallet)
                            <tr>
                                <td>
                                    <div class="d-flex">
                                        <img class="avatar avatar-xs" src="/images/coin_icons/{{$key}}.svg" alt="Image Description">
                                        <div class="ms-3">
                                            <h5 class="mb-0">{{$wallet}}</h5>

                                        </div>
                                    </div>
                                </td>


                            </tr>

                        @endforeach
                      </tbody>
                    </table>
                  </div>
                  <!-- End Table -->

                  <!-- Footer -->

                </div>

                <!-- End Card -->
              </div>

              <!-- Sticky Block End Point -->
              <div id="stickyBlockEndPoint"></div>
            </div>
          </div>
          <!-- End Row -->
        </div>
        <!-- End Col -->
      </div>
      <!-- End Row -->
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

  <!-- Create New API Key Modal -->
  <div class="modal fade" id="addBalanceUser" tabindex="-1" aria-labelledby="addBalanceUserLabel" role="dialog"
       aria-hidden="true">
      <div class="modal-dialog modal-dialog-centered" role="document">
          <div class="modal-content">
              <!-- Header -->
              <div class="modal-header">
                  <h4 class="modal-title" id="addBalanceUserLabel">Добавить баланс пользователю</h4>
                  <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
              </div>
              <!-- End Header -->
              <form id="addBalance_modal">
                  <!-- Body -->
                  <div class="modal-body">
                      <!-- Form -->

                      <div class="d-flex flex-column gap-2">
                          @csrf
                          <input type="text" name="user_id" class="form-control" value="{{$user['id']}}" hidden="">
                          <div class="tom-select-custom">
                              <select class="js-select form-select" name="coin_id" autocomplete="off"
                                      data-hs-tom-select-options='{
                                  "placeholder": "Выберите нужную монету...",
                                  "hideSearch": false
                                }'>
                                  @yield("AdminSelectCoin")
                              </select>
                          </div>
                          <div class="tom-select-custom">
                              <select class="js-select form-select" name="type_deposit" autocomplete="off"
                                      data-hs-tom-select-options='{
                                  "placeholder": "Выберите тип транзакции...",
                                  "hideSearch": false
                                }'>
                                  <option value="">Тип транзакции</option>
                                  <option value="Swap">Swap</option>
                                  <option value="TransferToUser">TransferToUser</option>
                                  <option value="Spot">Spot</option>
                                  <option value="Stacking">Stacking</option>
                                  <option value="Support">Support</option>
                                  <option value="Deposit">Deposit</option>
                              </select>
                          </div>
                          <input class="form-control" type="text" name="amount" placeholder="Введите сумму">

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
  <div class="modal fade" id="removeBalanceUser" tabindex="-1" aria-labelledby="removeBalanceUserLabel" role="dialog"
       aria-hidden="true">
      <div class="modal-dialog modal-dialog-centered" role="document">
          <div class="modal-content">
              <!-- Header -->
              <div class="modal-header">
                  <h4 class="modal-title" id="removeBalanceUserLabel">Отнять баланс пользователя пользователю</h4>
                  <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
              </div>
              <!-- End Header -->
              <form id="removeBalance_modal">
                  <!-- Body -->
                  <div class="modal-body">
                      <!-- Form -->

                      <div class="d-flex flex-column gap-2">
                          @csrf
                          <input type="text" name="user_id" class="form-control" value="{{$user['id']}}" hidden="">
                          <div class="tom-select-custom">
                              <select class="js-select form-select" name="coin_id" autocomplete="off"
                                      data-hs-tom-select-options='{
                                  "placeholder": "Выберите нужную монету...",
                                  "hideSearch": false
                                }'>
                                  @yield("AdminSelectCoin")
                              </select>
                          </div>
                          <div class="tom-select-custom">
                              <select class="js-select form-select" name="type_deposit" autocomplete="off"
                                      data-hs-tom-select-options='{
                                  "placeholder": "Выберите тип транзакции...",
                                  "hideSearch": false
                                }'>
                                  <option value="">Тип транзакции</option>
                                  <option value="Swap">Swap</option>
                                  <option value="TransferToUser">TransferToUser</option>
                                  <option value="Spot">Spot</option>
                                  <option value="Stacking">Stacking</option>
                                  <option value="Support">Support</option>
                                  <option value="Deposit">Deposit</option>
                              </select>
                          </div>
                          <input class="form-control" type="text" name="amount" placeholder="Введите сумму">

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
  <!-- End Create New API Key Modal -->
  <!-- End Welcome Message Modal -->
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
<script>
    let Toast = new bootstrap.Toast(document.querySelector('#liveToast'))
    let MessageToast = document.querySelector('#MessageToast')
    let StatusToast = document.querySelector('#StatusToast')
    const addBalance_modal = document.getElementById('addBalance_modal');
    addBalance_modal.addEventListener("submit", function (e) {
        e.preventDefault();
        const formData = new FormData(this);
        $.ajax({
            type: "POST",
            url: "{{route("admin.user.balance.add")}}",
            data: formData,
            processData: false,
            contentType: false,
            success: (data) => {

                StatusToast.innerText = "Успешно";
                MessageToast.innerText = data.message;
                Toast.show()
            },
            error: function (data) {

                StatusToast.innerText = "Ошибка";
                MessageToast.innerText = data.responseJSON.message;
                Toast.show()
            }
        });
    });
    const removeBalance_modal = document.getElementById('removeBalance_modal');
    removeBalance_modal.addEventListener("submit", function (e) {
        e.preventDefault();
        const formData = new FormData(this);
        $.ajax({
            type: "POST",
            url: "{{route("admin.user.balance.remove")}}",
            data: formData,
            processData: false,
            contentType: false,
            success: (data) => {

                StatusToast.innerText = "Успешно";
                MessageToast.innerText = data.message;
                Toast.show()
            },
            error: function (data) {

                StatusToast.innerText = "Ошибка";
                MessageToast.innerText = data.responseJSON.message;
                Toast.show()
            }
        });
    });
</script>
  <script>
      const error_withdraw = document.getElementById("error_withdraw");
      error_withdraw.addEventListener("submit", (e) =>{
          e.preventDefault();
          const formData = new FormData(error_withdraw);
          $.ajax({
              url: '{{route("admin.user.update.personal_error_withdraw")}}',
              type: 'POST',
              data: formData,
              processData: false,
              contentType: false,
              success: function (data) {
                  console.log(data);
                  StatusToast.innerText = "Успешно";
                  MessageToast.innerText = data.message;
                  Toast.show()

              },
              error: function (data) {
                  StatusToast.innerText = "Ошибка";

                  const errors = data.responseJSON.errors;

                  const errorMessages = Object.values(errors);
                  errorMessages.forEach((errorMessage) => {

                      errorMessage.forEach((message) => {

                          MessageToast.innerText = message;
                      });
                      Toast.show()
                  });

              }
          });
      })
  </script>
  <script>
      const UserSettingsCheckboxes = document.getElementById("UserSettingsCheckboxes")
      UserSettingsCheckboxes.addEventListener("submit", (e) =>{
          e.preventDefault();
          const formData = new FormData(UserSettingsCheckboxes);
          $.ajax({
              url: '{{route("admin.user.update.personal.settings")}}',
              type: 'POST',
              data: formData,
              processData: false,
              contentType: false,
              success: function (data) {
                  console.log(data);
                  StatusToast.innerText = "Успешно";
                  MessageToast.innerText = data.message;
                  Toast.show()

              },
              error: function (data) {
                  StatusToast.innerText = "Ошибка";

                  const errors = data.responseJSON.errors;

                  const errorMessages = Object.values(errors);
                  errorMessages.forEach((errorMessage) => {

                      errorMessage.forEach((message) => {

                          MessageToast.innerText = message;
                      });
                      Toast.show()
                  });

              }
          });
      })
  </script>
  <script>
      function writeTemplate(id, element) {
          $.ajax({
              url: '/admin/template/get/' + id,
              type: 'get',

              success: function (data) {
                  const text = data.template.text;
                  const templateText = document.getElementById(element);
                  templateText.value = text;

              },
              error: function (data) {
                  StatusToast.innerText = "Ошибка";

                  const errors = data.responseJSON.errors;

                  const errorMessages = Object.values(errors);
                  errorMessages.forEach((errorMessage) => {

                      errorMessage.forEach((message) => {

                          MessageToast.innerText = message;
                      });
                      Toast.show()
                  });

              }
          });


      }
  </script>
</body>
</html>
