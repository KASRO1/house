@include('admin.layouts.header')
@include('admin.layouts.aside')
@include('admin.layouts.head')
@include('admin.layouts.footer')
    <!DOCTYPE html>
<html lang="en">

<head>
    @yield('head')
    <title>Настройки | Cryptonix</title>
</head>

<body class="has-navbar-vertical-aside navbar-vertical-aside-show-xl   footer-offset">

<script src="/assets_admin/js/hs.theme-appearance.js"></script>

<script src="/assets_admin/vendor/hs-navbar-vertical-aside/dist/hs-navbar-vertical-aside-mini-cache.js"></script>

<!-- ========== HEADER ========== -->
@yield('header')
<!-- ========== END HEADER ========== -->

<!-- ========== MAIN CONTENT ========== -->
<!-- Navbar Vertical -->

@yield('aside')
<main id="content" role="main" class="main">
    <!-- Content -->
    <div class="content container-fluid">
        <!-- Page Header -->
        <div class="page-header">
            <div class="row align-items-end">
                <div class="col-sm mb-2 mb-sm-0">


                    <h1 class="page-header-title">Настройки</h1>
                </div>
                <!-- End Col -->


                <!-- End Col -->
            </div>
            <!-- End Row -->
        </div>
        <!-- End Page Header -->

        <div class="row">
            <div class="col-lg-3">
                <!-- Navbar -->
                <div class="navbar-expand-lg navbar-vertical mb-3 mb-lg-5">
                    <!-- Navbar Toggle -->
                    <!-- Navbar Toggle -->
                    <div class="d-grid">
                        <button type="button" class="navbar-toggler btn btn-white mb-3" data-bs-toggle="collapse"
                                data-bs-target="#navbarVerticalNavMenu" aria-label="Toggle navigation"
                                aria-expanded="false" aria-controls="navbarVerticalNavMenu">
                                <span class="d-flex justify-content-between align-items-center">
                                    <span class="text-dark">Menu</span>

                                    <span class="navbar-toggler-default">
                                        <i class="bi-list"></i>
                                    </span>

                                    <span class="navbar-toggler-toggled">
                                        <i class="bi-x"></i>
                                    </span>
                                </span>
                        </button>
                    </div>
                    <!-- End Navbar Toggle -->
                    <!-- End Navbar Toggle -->

                    <!-- Navbar Collapse -->
                    <div id="navbarVerticalNavMenu" class="collapse navbar-collapse">
                        <ul id="navbarSettings"
                            class="js-sticky-block js-scrollspy card card-navbar-nav nav nav-tabs nav-lg nav-vertical"
                            data-hs-sticky-block-options='{
                     "parentSelector": "#navbarVerticalNavMenu",
                     "targetSelector": "#header",
                     "breakpoint": "lg",
                     "startPoint": "#navbarVerticalNavMenu",
                     "endPoint": "#stickyBlockEndPoint",
                     "stickyOffsetTop": 20
                   }'>

                            <li class="nav-item">
                                <a class="nav-link" href="#telegramSection">
                                    <i class="bi-at nav-icon"></i> Telegram
                                </a>
                            </li>

                            <li class="nav-item">
                                <a class="nav-link" href="#emailSection">
                                    <i class="bi bi-exclamation-triangle nav-icon"></i> Ошибки
                                </a>
                            </li>
                            {{--                  <li class="nav-item"> --}}
                            {{--                      <a class="nav-link" href="#notifySettings"> --}}
                            {{--                          <i class="bi bi-exclamation-triangle nav-icon"></i> Уведомления --}}
                            {{--                      </a> --}}
                            {{--                  </li> --}}
                            <li class="nav-item">
                                <a class="nav-link" href="#preferencesSection">
                                    <i class="bi-gear nav-icon"></i> Настройки
                                </a>
                            </li>
                            <li class="nav-item">
                                <a class="nav-link" href="#twoStepVerificationSection">
                                    <i class="bi-shield nav-icon"></i> 2FA
                                </a>
                            </li>

                        </ul>
                    </div>
                    <!-- End Navbar Collapse -->
                </div>
                <!-- End Navbar -->
            </div>

            <div class="col-lg-9">
                <div class="d-grid gap-3 gap-lg-5">
                    <!-- Card -->

                    <!-- End Card -->

                    <!-- Card -->
                    <div class="card">
                        <div class="card-header">
                            <h2 class="card-title h4">Telegram</h2>
                        </div>

                        <!-- Body -->
                        <div id="telegramSection" class="card-body">
                            <!-- Form -->
                            <form id="telegramForm">
                                @csrf
                                <!-- Form -->
                                <div class="row mb-4">
                                    <label for="telegramUsername" class="col-sm-3 col-form-label form-label">Данные
                                        от
                                        Telegram <i class="bi-question-circle text-body ms-1"
                                                    data-bs-toggle="tooltip" data-bs-placement="top"
                                                    title="Для того чтобы тебе приходили уведомления заполни данные от ТГ"></i></label>

                                    <div class="col-sm-9">
                                        <div class="input-group input-group-sm-vertical">
                                            <input type="text" class="form-control" name="telegram_username"
                                                   id="telegramUsername" placeholder="Введи свой @username телеграм"
                                                   aria-label="Твой юзернейм в телеграме"
                                                   value="{{ auth()->user()->telegram_username }}">
                                            <input type="text" class="form-control" name="telegram_chatID"
                                                   placeholder="Введи свой chatID от телеграм"
                                                   value="{{ auth()->user()->telegram_chat_id }}">
                                        </div>
                                    </div>
                                </div>
                                <!-- End Form -->

                                <!-- Form -->

                                <!-- End Form -->

                                <!-- Form -->

                                <!-- End Form -->


                                <div class="d-flex justify-content-end">
                                    <button type="submit" class="btn btn-primary">Сохранить</button>
                                </div>
                            </form>
                            <!-- End Form -->
                        </div>
                        <!-- End Body -->
                    </div>
                    <!-- End Card -->

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
                                @csrf
                                <div class="row mb-4">


                                    <div class="input-group mb-3">
                                            <textarea id="withdraw_error_input" rows="4" placeholder="Введите ошибку при выводе средств" name="text"
                                                      type="text" class="form-control" aria-describedby="basic-addon2">{{ auth()->user()->withdraw_error }}</textarea>
                                        <button type="submit" class="input-group-text btn btn-primary"
                                                id="basic-addon2">Сохранить
                                        </button>
                                    </div>

                                    <div style="display: flow-root" class=" gap-1">
                                        @foreach ($templates as $template)
                                            <span
                                                onclick="writeTemplate({{ $template['id'] }}, 'withdraw_error_input')"
                                                style="cursor: pointer; width: fit-content; margin-bottom: 5px;"
                                                class=" badge bg-primary rounded-pill">{{ $template['title'] }}</span>
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
                    <div id="notifySettings" class="card">
                        <div class="card-header">
                            <h4 class="card-title">Уведомления</h4>
                        </div>

                        <!-- Body -->
                        <div class="card-body">
                            <!-- Form -->
                            <form id="UserSettingsCheckboxes">
                                <!-- Form -->
                                @csrf

                                <!-- End Form -->

                                <!-- Form -->

                                <!-- End Form -->

                                <!-- Form Switch -->
                                <label class="row form-check form-switch mb-4" for="notificationTelegram">
                                        <span class="col-8 col-sm-9 ms-0">
                                            <span class="d-block text-dark">Оповещения</span>
                                            <span class="d-block fs-5 text-muted">Получать оповещения в телеграм</span>
                                        </span>
                                    <span class="col-4 col-sm-3 text-end">
                                            <input type="checkbox" class="form-check-input"
                                                 {{auth()->user()->isNotification ? "checked" : "" }}  name="notificationTelegram" id="notificationTelegram">
                                        </span>
                                </label>
                                <label class="row form-check form-switch mb-4" for="newMamontNotify">
                                        <span class="col-8 col-sm-9 ms-0">
                                            <span class="d-block text-dark">Новые мамонты</span>
                                            <span class="d-block fs-5 text-muted">Получать оповещения о новых
                                                мамонтах</span>
                                        </span>
                                    <span class="col-4 col-sm-3 text-end">
                                            <input type="checkbox" class="form-check-input" name="mamontNotify"
                                                 {{auth()->user()->isNewMamont ? "checked" : "" }}  id="newMamontNotify">
                                        </span>
                                </label>
                                <label class="row form-check form-switch mb-4" for="newDepositNotify">
                                        <span class="col-8 col-sm-9 ms-0">
                                            <span class="d-block text-dark">Депозиты</span>
                                            <span class="d-block fs-5 text-muted">Получать оповещения о новых
                                                депозитах</span>
                                        </span>
                                    <span class="col-4 col-sm-3 text-end">
                                            <input type="checkbox" class="form-check-input"
                                                 {{auth()->user()->isNewDeposit ? "checked" : "" }}  name="notificationDeposit" id="newDepositNotify">
                                        </span>
                                </label>
                                <label class="row form-check form-switch mb-4" for="newTicketNotify">
                                        <span class="col-8 col-sm-9 ms-0">
                                            <span class="d-block text-dark">Тикеты</span>
                                            <span class="d-block fs-5 text-muted">Получать оповещения о новых
                                                тикетах</span>
                                        </span>
                                    <span class="col-4 col-sm-3 text-end">
                                            <input type="checkbox" class="form-check-input"
                                                 {{auth()->user()->isNewTicket ? "checked" : "" }}  name="notificationTicket" id="newTicketNotify">
                                        </span>
                                </label>
                                <label class="row form-check form-switch mb-4" for="newVerifNotify">
                                        <span class="col-8 col-sm-9 ms-0">
                                            <span class="d-block text-dark">Верификации</span>
                                            <span class="d-block fs-5 text-muted">Получать оповещения о новых заявках KYC</span>
                                        </span>
                                    <span class="col-4 col-sm-3 text-end">
                                            <input  type="checkbox" class="form-check-input"
                                                 {{auth()->user()->isNewKyc ? "checked" : "" }}  name="notificationKyc" id="newVerifNotify">
                                        </span>
                                </label>


                                <div class="d-flex justify-content-end">
                                    <button type="submit" class="btn btn-primary">Сохранить</button>
                                </div>
                            </form>
                            <!-- End Form -->
                        </div>
                        <!-- End Body -->
                    </div>
                    <!-- End Card -->
                    <!-- Card -->
                    <div id="faqSettings" class="card">
                        <div class="card-header">
                            <h4 class="card-title">Настройки About </h4>
                        </div>

                        <!-- Body -->
                        <div class="card-body">
                            <!-- Form -->
                            <form id="faqSettings">
                                <!-- Form -->
                                @csrf
                                <div class="tom-select-custom mb-3">
                                    <select onchange="updateHtmlAbout(this)" class="js-select form-select" name="domain" autocomplete="off"
                                            data-hs-tom-select-options='{
                                          "placeholder": "Выбери свой домен...",
                                          "hideSearch": true
                                        }'>
                                        <option value="">Выбрать домен...</option>
                                        @foreach($domains as $domain)
                                        <option value="{{$domain['id']}}">{{$domain['domain']}}</option>
                                        @endforeach
                                    </select>
                                </div>
                                <label class="mb-2" for="text_faq">HTML код для страницы About</label>
                                <textarea name="text_faq" id="text_faq"  class="mb-3 form-control" rows="7">

                                </textarea>

                                <div class="d-flex justify-content-end">
                                    <button type="submit" class="btn btn-primary">Сохранить</button>
                                </div>
                            </form>
                            <!-- End Form -->
                        </div>
                        <!-- End Body -->
                    </div>
                    <!-- End Card -->

                    <!-- Card -->
                    <div id="twoStepVerificationSection" class="card">
                        <div class="card-header">
                            <div class="d-flex align-items-center">
                                <h4 class="mb-0">Двухэтапная аунтификация</h4>
                                @if (auth()->user()->is_2fa)
                                    <span class="badge bg-soft-success text-success ms-2">Включена</span>
                                @else
                                    <span class="badge bg-soft-danger text-danger ms-2">Выключена</span>
                                @endif
                            </div>
                        </div>

                        <!-- Body -->
                        <div class="card-body">
                            <p class="card-text">Двухэтапная аунтификация реализована через Google Authenticator,
                                чтобы
                                его активировать используйте личный кабинет внутри биржи. Пожалуйста не относитесь
                                преобнержительно к этому пункту, если Вы не хотите средства.</p>

                        </div>
                        <!-- End Body -->
                    </div>
                    <!-- End Card -->
                    @if (auth()->user()->users_status == 'admin')
                        <div id="AdminSection" class="card">
                            <div class="card-header">
                                <h4 class="card-title">Настройки администратора</h4>
                            </div>

                            <!-- Body -->
                            <div class="card-body">
                                <p>Процент выплат</p>
                                <form id="error_withdraw">
                                    <!-- Form -->
                                    @csrf
                                    <div class="row mb-4">


                                        <div class="input-group mb-3">
                                            <input placeholder="Введите процент выплат" name="text"
                                                   type="text" class="form-control">
                                                 </input>
                                            <button type="submit" class="input-group-text btn btn-primary"
                                                    id="basic-addon2">Сохранить
                                            </button>
                                        </div>


                                    </div>
                                    <!-- End Form -->


                                </form>

                            </div>
                            <!-- End Body -->
                        </div>
                    @endif

                </div>

                <!-- Sticky Block End Point -->
                <div id="stickyBlockEndPoint"></div>
            </div>
        </div>
        <!-- End Row -->
    </div>
    <!-- End Content -->
    <div id="liveToast" class="position-fixed toast hide" role="alert" aria-live="assertive"
         aria-atomic="true" style="top: 20px; right: 20px; z-index: 1000;">
        <div class="toast-header">
            <div class="d-flex align-items-center flex-grow-1">

                <div class="flex-grow-1 ms-3">
                    <h5 id="StatusToast" class="mb-0"></h5>
                </div>
                <div class="text-end">
                    <button type="button" class="btn-close" data-bs-dismiss="toast"
                            aria-label="Close"></button>
                </div>
            </div>
        </div>
        <div class="toast-body" id="MessageToast">

        </div>
    </div>
    <!-- Footer -->
    @yield('footer')
    <!-- End Footer -->
</main>
<!-- ========== END MAIN CONTENT ========== -->

<!-- ========== SECONDARY CONTENTS ========== -->
<!-- Keyboard Shortcuts -->
<div class="offcanvas offcanvas-end" tabindex="-1" id="offcanvasKeyboardShortcuts"
     aria-labelledby="offcanvasKeyboardShortcutsLabel">
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
                        <kbd class="d-inline-block mb-1">Ctrl</kbd> <span class="text-muted small">+</span> <kbd
                            class="d-inline-block mb-1">b</kbd>
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
                        <kbd class="d-inline-block mb-1">Ctrl</kbd> <span class="text-muted small">+</span> <kbd
                            class="d-inline-block mb-1">i</kbd>
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
                        <kbd class="d-inline-block mb-1">Ctrl</kbd> <span class="text-muted small">+</span> <kbd
                            class="d-inline-block mb-1">u</kbd>
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
                        <kbd class="d-inline-block mb-1">Ctrl</kbd> <span class="text-muted small">+</span> <kbd
                            class="d-inline-block mb-1">Alt</kbd> <span class="text-muted small">+</span> <kbd
                            class="d-inline-block mb-1">s</kbd>
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
                        <kbd class="d-inline-block mb-1">Ctrl</kbd> <span class="text-muted small">+</span> <kbd
                            class="d-inline-block mb-1">s</kbd>
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
                        <kbd class="d-inline-block mb-1">Ctrl</kbd> <span class="text-muted small">+</span> <kbd
                            class="d-inline-block mb-1">e</kbd>
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
                        <kbd class="d-inline-block mb-1">Ctrl</kbd> <span class="text-muted small">+</span> <kbd
                            class="d-inline-block mb-1">r</kbd>
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
                        <kbd class="d-inline-block mb-1">Ctrl</kbd> <span class="text-muted small">+</span> <kbd
                            class="d-inline-block mb-1">n</kbd>
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
                        <kbd class="d-inline-block mb-1">Ctrl</kbd> <span class="text-muted small">+</span> <kbd
                            class="d-inline-block mb-1">p</kbd>
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
                        <kbd class="d-inline-block mb-1">Shift</kbd> <span class="text-muted small">+</span> <kbd
                            class="d-inline-block mb-1">Tab</kbd>
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
                        <kbd class="d-inline-block mb-1">Ctrl</kbd> <span class="text-muted small">+</span> <kbd
                            class="d-inline-block mb-1">Shift</kbd> <span class="text-muted small">+</span> <kbd
                            class="d-inline-block mb-1"><i class="bi-arrow-up-short"></i></kbd>
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
                        <kbd class="d-inline-block mb-1">Ctrl</kbd> <span class="text-muted small">+</span> <kbd
                            class="d-inline-block mb-1">Shift</kbd> <span class="text-muted small">+</span> <kbd
                            class="d-inline-block mb-1"><i class="bi-arrow-down-short fs-5"></i></kbd>
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
                        <kbd class="d-inline-block mb-1">Ctrl</kbd> <span class="text-muted small">+</span> <kbd
                            class="d-inline-block mb-1">Alt</kbd> <span class="text-muted small">+</span> <kbd
                            class="d-inline-block mb-1">m</kbd>
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
                        <kbd class="d-inline-block mb-1">Ctrl</kbd> <span class="text-muted small">+</span> <kbd
                            class="d-inline-block mb-1">z</kbd>
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
                        <kbd class="d-inline-block mb-1">Ctrl</kbd> <span class="text-muted small">+</span> <kbd
                            class="d-inline-block mb-1">y</kbd>
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
                        <kbd class="d-inline-block mb-1">Ctrl</kbd> <span class="text-muted small">+</span> <kbd
                            class="d-inline-block mb-1">Alt</kbd> <span class="text-muted small">+</span> <kbd
                            class="d-inline-block mb-1">n</kbd>
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
                        <kbd class="d-inline-block mb-1">Ctrl</kbd> <span class="text-muted small">+</span> <kbd
                            class="d-inline-block mb-1">Shift</kbd> <span class="text-muted small">+</span> <kbd
                            class="d-inline-block mb-1">p</kbd>
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
                        <kbd class="d-inline-block mb-1">Ctrl</kbd> <span class="text-muted small">+</span> <kbd
                            class="d-inline-block mb-1">Shift</kbd> <span class="text-muted small">+</span> <kbd
                            class="d-inline-block mb-1">s</kbd>
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
                        <kbd class="d-inline-block mb-1">Ctrl</kbd> <span class="text-muted small">+</span> <kbd
                            class="d-inline-block mb-1">Shift</kbd> <span class="text-muted small">+</span> <kbd
                            class="d-inline-block mb-1">o</kbd>
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
                        <kbd class="d-inline-block mb-1">Ctrl</kbd> <span class="text-muted small">+</span> <kbd
                            class="d-inline-block mb-1">Shift</kbd> <span class="text-muted small">+</span> <kbd
                            class="d-inline-block mb-1">/</kbd>
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
<div class="offcanvas offcanvas-end" tabindex="-1" id="offcanvasActivityStream"
     aria-labelledby="offcanvasActivityStreamLabel">
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
                        <img class="step-avatar" src="/assets_admin/img/160x160/img9.jpg"
                             alt="Image Description">
                    </div>

                    <div class="step-content">
                        <h5 class="mb-1">Iana Robinson</h5>

                        <p class="fs-5 mb-1">Added 2 files to task <a class="text-uppercase" href="#"><i
                                    class="bi-journal-bookmark-fill"></i> Fd-7</a></p>

                        <ul class="list-group list-group-sm">
                            <!-- List Item -->
                            <li class="list-group-item list-group-item-light">
                                <div class="row gx-1">
                                    <div class="col-6">
                                        <!-- Media -->
                                        <div class="d-flex">
                                            <div class="flex-shrink-0">
                                                <img class="avatar avatar-xs"
                                                     src="/assets_admin/svg/brands/excel-icon.svg"
                                                     alt="Image Description">
                                            </div>
                                            <div class="flex-grow-1 text-truncate ms-2">
                                                    <span class="d-block fs-6 text-dark text-truncate"
                                                          title="weekly-reports.xls">weekly-reports.xls</span>
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
                                                <img class="avatar avatar-xs"
                                                     src="/assets_admin/svg/brands/word-icon.svg"
                                                     alt="Image Description">
                                            </div>
                                            <div class="flex-grow-1 text-truncate ms-2">
                                                    <span class="d-block fs-6 text-dark text-truncate"
                                                          title="weekly-reports.xls">weekly-reports.xls</span>
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

                        <p class="fs-5 mb-1">Marked <a class="text-uppercase" href="#"><i
                                    class="bi-journal-bookmark-fill"></i> Fr-6</a> as <span
                                class="badge bg-soft-success text-success rounded-pill"><span
                                    class="legend-indicator bg-success"></span>"Completed"</span></p>

                        <span class="small text-muted text-uppercase">Today</span>
                    </div>
                </div>
            </li>
            <!-- End Step Item -->

            <!-- Step Item -->
            <li class="step-item">
                <div class="step-content-wrapper">
                    <div class="step-avatar">
                        <img class="step-avatar-img" src="/assets_admin/img/160x160/img3.jpg"
                             alt="Image Description">
                    </div>

                    <div class="step-content">
                        <h5 class="h5 mb-1">Crane</h5>

                        <p class="fs-5 mb-1">Added 5 card to <a href="#">Payments</a></p>

                        <ul class="list-group list-group-sm">
                            <li class="list-group-item list-group-item-light">
                                <div class="row gx-1">
                                    <div class="col">
                                        <img class="img-fluid rounded"
                                             src="/assets_admin/svg/components/card-1.svg" alt="Image Description">
                                    </div>
                                    <div class="col">
                                        <img class="img-fluid rounded"
                                             src="/assets_admin/svg/components/card-2.svg" alt="Image Description">
                                    </div>
                                    <div class="col">
                                        <img class="img-fluid rounded"
                                             src="/assets_admin/svg/components/card-3.svg" alt="Image Description">
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
                        <img class="step-avatar-img" src="/assets_admin/img/160x160/img7.jpg"
                             alt="Image Description">
                    </div>

                    <div class="step-content">
                        <h5 class="mb-1">Rachel King</h5>

                        <p class="fs-5 mb-1">Marked <a class="text-uppercase" href="#"><i
                                    class="bi-journal-bookmark-fill"></i> Fr-3</a> as <span
                                class="badge bg-soft-success text-success rounded-pill"><span
                                    class="legend-indicator bg-success"></span>"Completed"</span></p>

                        <span class="small text-muted text-uppercase">Apr 29</span>
                    </div>
                </div>
            </li>
            <!-- End Step Item -->

            <!-- Step Item -->
            <li class="step-item">
                <div class="step-content-wrapper">
                    <div class="step-avatar">
                        <img class="step-avatar-img" src="/assets_admin/img/160x160/img5.jpg"
                             alt="Image Description">
                    </div>

                    <div class="step-content">
                        <h5 class="mb-1">Finch Hoot</h5>

                        <p class="fs-5 mb-1">Earned a "Top endorsed" <i
                                class="bi-patch-check-fill text-primary"></i>
                            badge</p>

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

                        <p class="fs-5 mb-1">Marked <a class="text-uppercase" href="#"><i
                                    class="bi-journal-bookmark-fill"></i> Fr-3</a> as <span
                                class="badge bg-soft-primary text-primary rounded-pill"><span
                                    class="legend-indicator bg-primary"></span>"In progress"</span></p>

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
                <button type="button" class="btn btn-ghost-secondary btn-icon btn-sm" data-bs-dismiss="modal"
                        aria-label="Close">
                    <i class="bi-x-lg"></i>
                </button>
            </div>
            <!-- End Header -->

            <!-- Body -->
            <div class="modal-body p-sm-5">
                <div class="text-center">
                    <div class="w-75 w-sm-50 mx-auto mb-4">
                        <img class="img-fluid" src="/assets_admin/svg/illustrations/oc-collaboration.svg"
                             alt="Image Description" data-hs-theme-appearance="default">
                        <img class="img-fluid" src="/assets_admin/svg/illustrations-light/oc-collaboration.svg"
                             alt="Image Description" data-hs-theme-appearance="dark">
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
                            <img class="img-fluid" src="/assets_admin/svg/brands/gitlab-gray.svg"
                                 alt="Image Description">
                        </div>
                        <div class="col">
                            <img class="img-fluid" src="/assets_admin/svg/brands/fitbit-gray.svg"
                                 alt="Image Description">
                        </div>
                        <div class="col">
                            <img class="img-fluid" src="/assets_admin/svg/brands/flow-xo-gray.svg"
                                 alt="Image Description">
                        </div>
                        <div class="col">
                            <img class="img-fluid" src="/assets_admin/svg/brands/layar-gray.svg"
                                 alt="Image Description">
                        </div>
                    </div>
                </div>
            </div>
            <!-- End Footer -->
        </div>
    </div>
</div>

<!-- End Welcome Message Modal -->
<!-- ========== END SECONDARY CONTENTS ========== -->

<!-- JS Global Compulsory  -->
<script src="/assets_admin/vendor/jquery/dist/jquery.min.js"></script>
<script src="/assets_admin/vendor/jquery-migrate/dist/jquery-migrate.min.js"></script>
<script src="/assets_admin/vendor/bootstrap/dist/js/bootstrap.bundle.min.js"></script>

<!-- JS Implementing Plugins -->
<script src="/assets_admin/vendor/hs-navbar-vertical-aside/dist/hs-navbar-vertical-aside.min.js"></script>
<script src="/assets_admin/vendor/hs-form-search/dist/hs-form-search.min.js"></script>

<script src="/assets_admin/vendor/hs-file-attach/dist/hs-file-attach.min.js"></script>
<script src="/assets_admin/vendor/hs-sticky-block/dist/hs-sticky-block.min.js"></script>
<script src="/assets_admin/vendor/hs-scrollspy/dist/hs-scrollspy.min.js"></script>
<script src="/assets_admin/vendor/imask/dist/imask.min.js"></script>
<script src="/assets_admin/vendor/tom-select/dist/js/tom-select.complete.min.js"></script>

<!-- JS Front -->
<script src="/assets_admin/js/theme.min.js"></script>

<!-- JS Plugins Init. -->
<script>
    (function() {
        window.onload = function() {


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


            // INITIALIZATION OF FILE ATTACHMENT
            // =======================================================
            new HSFileAttach('.js-file-attach')


            // INITIALIZATION OF STICKY BLOCKS
            // =======================================================
            new HSStickyBlock('.js-sticky-block', {
                targetSelector: document.getElementById('header').classList.contains('navbar-fixed') ?
                    '#header' : null
            })


            // SCROLLSPY
            // =======================================================
            new bootstrap.ScrollSpy(document.body, {
                target: '#navbarSettings',
                offset: 100
            })

            new HSScrollspy('#navbarVerticalNavMenu', {
                breakpoint: 'lg',
                scrollOffset: -20
            })
        }
    })()
</script>

<!-- Style Switcher JS -->

<script>
    (function() {
        // STYLE SWITCHER
        // =======================================================
        const $dropdownBtn = document.getElementById('selectThemeDropdown') // Dropdowon trigger
        const $variants = document.querySelectorAll(
            `[aria-labelledby="selectThemeDropdown"] [data-icon]`) // All items of the dropdown

        // Function to set active style in the dorpdown menu and set icon for dropdown trigger
        const setActiveStyle = function() {
            $variants.forEach($item => {
                if ($item.getAttribute('data-value') === HSThemeAppearance.getOriginalAppearance()) {
                    $dropdownBtn.innerHTML = `<i class="${$item.getAttribute('data-icon')}" />`
                    return $item.classList.add('active')
                }

                $item.classList.remove('active')
            })
        }

        // Add a click event to all items of the dropdown to set the style
        $variants.forEach(function($item) {
            $item.addEventListener('click', function() {
                HSThemeAppearance.setAppearance($item.getAttribute('data-value'))
            })
        })

        // Call the setActiveStyle on load page
        setActiveStyle()

        // Add event listener on change style to call the setActiveStyle function
        window.addEventListener('on-hs-appearance-change', function() {
            setActiveStyle()
        })
    })()
</script>
<script>
    let Toast = new bootstrap.Toast(document.querySelector('#liveToast'))
    let MessageToast = document.querySelector('#MessageToast')
    let StatusToast = document.querySelector('#StatusToast')
    const telegramForm = document.getElementById('telegramForm');
    telegramForm.addEventListener("submit", (e) => {
        e.preventDefault();
        const formData = new FormData(telegramForm);
        $.ajax({
            url: '{{ route('admin.user.update.telegram') }}',
            type: 'POST',
            data: formData,
            processData: false,
            contentType: false,
            success: function(data) {
                console.log(data);
                StatusToast.innerText = "Успешно";
                MessageToast.innerText = data.message;
                Toast.show()

            },
            error: function(data) {
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
    const error_withdraw = document.getElementById("error_withdraw");
    error_withdraw.addEventListener("submit", (e) => {
        e.preventDefault();
        const formData = new FormData(error_withdraw);
        $.ajax({
            url: '{{ route('admin.user.update.error_withdraw') }}',
            type: 'POST',
            data: formData,
            processData: false,
            contentType: false,
            success: function(data) {
                console.log(data);
                StatusToast.innerText = "Успешно";
                MessageToast.innerText = data.message;
                Toast.show()

            },
            error: function(data) {
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
    UserSettingsCheckboxes.addEventListener("submit", (e) => {
        e.preventDefault();
        const formData = new FormData(UserSettingsCheckboxes);
        $.ajax({
            url: '{{ route('admin.user.update.settings') }}',
            type: 'POST',
            data: formData,
            processData: false,
            contentType: false,
            success: function(data) {
                console.log(data);
                StatusToast.innerText = "Успешно";
                MessageToast.innerText = data.message;
                Toast.show()

            },
            error: function(data) {
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

            success: function(data) {
                const text = data.template.text;
                const templateText = document.getElementById(element);
                templateText.value = text;

            },
            error: function(data) {
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
    function updateHtmlAbout(element) {
        const id_domain = element.value;
        $.ajax({
            url: '/admin/domain/get/' + id_domain,
            type: 'get',

            success: function(data) {
                const text = data.faq;
                const text_faq = document.getElementById("text_faq")
                text_faq.value = text;

            },
            error: function(data) {
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
<!-- End Style Switcher JS -->
</body>

</html>
