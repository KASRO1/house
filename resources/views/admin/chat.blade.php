@include("admin.layouts.header")
@include("admin.layouts.aside")
@include("admin.layouts.head")
@include("admin.layouts.footer")
    <!DOCTYPE html>
<html lang="en">
<head>
    @yield("head")
    <title>Настройки | Cryptonix</title>
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
        <div class="row">
            <div class="col-lg-9 mb-5 mb-lg-0">
                <!-- Card -->
                <div class="card card-lg">
                    <!-- Body -->
                    <div class="card-body">
                        <!-- End Row -->
                        <div class="d-flex justify-content-start  align-items-center gap-1">
                            <h2>
                                {{$ticket['subject']}}

                            </h2>
                        </div>
                        <hr class="my-1">

                        <div class="d-flex w-100 flex-column-reverse  h-100 p-3 rounded-2  overflow-auto">

                            <div id="message-container" class="d-flex flex-column-reverse gap-3 " style="height: 400px">
                                {{--                                <div class="w-100 d-flex justify-content-end">--}}
                                {{--                                    <div class="p-2 bg-light w-75 rounded-2 justify-content-end d-flex">--}}
                                {{--                                        messagetext--}}
                                {{--                                        <div class="d-flex align-items-end h-100">16:12</div>--}}
                                {{--                                    </div>--}}
                                {{--                                </div>--}}


                            </div>
                        </div>
                        <form id="sendMessageForm">
                            <div class="d-flex w-100 gap-2 p-2 bg-light  rounded-2" style="height: 50px">
                                @csrf
                                <input type="hidden" name="ticket_id" value="{{$ticket['id']}}">
                                <input id="sendMessageInput" name="message"  type="text" style="outline: none" placeholder="Введите сообщение"
                                       class="flex-grow-1 bg-transparent  border-0">
                                <button class="btn btn-primary d-flex align-items-center gap-1 ">
                                    <i class="icon-sm bi-send"></i>
                                    Отправить
                                </button>
                            </div>
                        </form>

                    </div>
                    <!-- End Body -->
                </div>
                <!-- End Card -->

                <!-- Sticky Block End Point -->
                <div id="stickyBlockEndPoint"></div>
            </div>

            <div class="col-lg-3">
                <div id="stickyBlockStartPoint">
                    <div class="js-sticky-block" data-hs-sticky-block-options='{
                   "parentSelector": "#stickyBlockStartPoint",
                   "breakpoint": "lg",
                   "startPoint": "#stickyBlockStartPoint",
                   "endPoint": "#stickyBlockEndPoint",
                   "stickyOffsetTop": 20
                 }'>
                        <div class="d-grid gap-2 gap-sm-3 mb-2 mb-sm-3">
                            <a href="{{route("admin.user:id", $ticket['user_id'])}}" class="btn btn-primary" >
                                <i class="bi-person me-1"></i> Профиль пользователя
                            </a>


                        </div>


                        <!-- End Row -->

                        <hr class="my-4">
                        <div class="d-flex flex-column">
                            <div class="d-flex justify-content-between align-items-center mb-3">
                                <span class="mb-0">Пользователь</span>
                                <a style="max-width: 100px; white-space: nowrap; overflow: hidden; text-overflow: ellipsis;" href="{{route("admin.user:id", $user['id'])}}" class="mb-0">{{$user['email']}}</a>
                            </div>
                            <div class="d-flex justify-content-between align-items-center mb-3">
                                <span class="mb-0">Последний онлайн</span>
                                <span class="mb-0">{{\Carbon\Carbon::parse($user['updated_at'])->format("H:i d/m/y ")}}</span>
                            </div>
                            <div class="d-flex justify-content-between align-items-center mb-3">
                                <span class="mb-0">Категория тикета</span>
                                <span class="mb-0">{{$ticket['category']}}</span>
                            </div>
                            <div class="d-flex justify-content-between align-items-center mb-3">
                                <span class="mb-0">Дата создания тикета</span>
                                <span class="mb-0">{{\Carbon\Carbon::parse($ticket['created_at'])->format("H:i d/m/y ")}}</span>
                            </div>

                        </div>
                        <hr class="my-4">

                        {{--                        <!-- Form -->--}}
                        {{--                        <div class="mb-4">--}}
                        {{--                            <label for="currencyLabel" class="form-label">Currency</label>--}}

                        {{--                            <!-- Select -->--}}
                        {{--                            <div class="tom-select-custom">--}}
                        {{--                                <select class="js-select form-select" id="currencyLabel" autocomplete="off"--}}
                        {{--                                        data-hs-tom-select-options='{--}}
                        {{--                            "searchInDropdown": false,--}}
                        {{--                            "hideSearch": true--}}
                        {{--                          }'>--}}
                        {{--                                    <option label="empty"></option>--}}
                        {{--                                    <option value="currency1" selected--}}
                        {{--                                            data-option-template='<span class="d-flex align-items-center text-truncate"><img class="avatar avatar-xss avatar-circle me-2" src="/assets_admin/vendor/flag-icon-css/flags/1x1/us.svg" alt="Image description" width="16"/><span>USD (United States Dollar)</span></span>'>--}}
                        {{--                                        USD (United States Dollar)--}}
                        {{--                                    </option>--}}
                        {{--                                    <option value="currency2"--}}
                        {{--                                            data-option-template='<span class="d-flex align-items-center text-truncate"><img class="avatar avatar-xss avatar-circle me-2" src="/assets_admin/vendor/flag-icon-css/flags/1x1/gb.svg" alt="Image description" width="16"/><span>GBP (United Kingdom Pound)</span></span>'>--}}
                        {{--                                        GBP (United Kingdom Pound)--}}
                        {{--                                    </option>--}}
                        {{--                                    <option value="currency3"--}}
                        {{--                                            data-option-template='<span class="d-flex align-items-center text-truncate"><img class="avatar avatar-xss avatar-circle me-2" src="/assets_admin/vendor/flag-icon-css/flags/1x1/eu.svg" alt="Image description" width="16"/><span>Euro (Euro Member Countries)</span></span>'>--}}
                        {{--                                        Euro (Euro Member Countries)--}}
                        {{--                                    </option>--}}
                        {{--                                </select>--}}
                        {{--                            </div>--}}
                        {{--                            <!-- End Select -->--}}
                        {{--                        </div>--}}
                        {{--                        <!-- End Form -->--}}

                        <div class="d-grid gap-3">
                            <!-- Form Switch -->
                            <label class="row form-check form-switch" for="invoicePaymentTermsSwitch">
                                <span class="col-8 col-sm-9 ms-0">Тикет открыт <i class="bi-question-circle text-body ms-1" data-bs-toggle="tooltip" data-bs-placement="top" title="Закрыв тикет у мамонта закроется чат, прежде чем закрыть тикет спроси у мамонта не осталось ли у него вопросов. Если открыть тикет повторно, он отобразится у мамонта, если он не создал новый"></i></span>
                                <span class="col-4 col-sm-3 text-end">
                    <input type="checkbox" onchange="changeStatusTicket(this)"  class="form-check-input" id="invoicePaymentTermsSwitch" {{$ticket['status'] == "open" ? "checked" : "" }}>
                  </span>
                            </label>
                            <!-- End Form Switch -->

                            {{--                            <!-- Form Switch -->--}}
                            {{--                            <label class="row form-check form-switch" for="invoiceClientNotesSwitch">--}}
                            {{--                                <span class="col-8 col-sm-9 ms-0">Client notes</span>--}}
                            {{--                                <span class="col-4 col-sm-3 text-end">--}}
                            {{--                    <input type="checkbox" class="form-check-input" id="invoiceClientNotesSwitch" checked>--}}
                            {{--                  </span>--}}
                            {{--                            </label>--}}
                            {{--                            <!-- End Form Switch -->--}}

                            {{--                            <!-- Form Switch -->--}}
                            {{--                            <label class="row form-check form-switch" for="invoiceAttachPDFSwitch">--}}
                            {{--                                <span class="col-8 col-sm-9 ms-0">Attach PDF in mail</span>--}}
                            {{--                                <span class="col-4 col-sm-3 text-end">--}}
                            {{--                    <input type="checkbox" class="form-check-input" id="invoiceAttachPDFSwitch">--}}
                            {{--                  </span>--}}
                            {{--                            </label>--}}
                            {{--                            <!-- End Form Switch -->--}}
                        </div>
                    </div>
                </div>
            </div>
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
                        <img class="step-avatar" src="/assets_admin/img/160x160/img9.jpg" alt="Image Description">
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
                        <img class="step-avatar-img" src="/assets_admin/img/160x160/img3.jpg" alt="Image Description">
                    </div>

                    <div class="step-content">
                        <h5 class="h5 mb-1">Crane</h5>

                        <p class="fs-5 mb-1">Added 5 card to <a href="#">Payments</a></p>

                        <ul class="list-group list-group-sm">
                            <li class="list-group-item list-group-item-light">
                                <div class="row gx-1">
                                    <div class="col">
                                        <img class="img-fluid rounded" src="/assets_admin/svg/components/card-1.svg"
                                             alt="Image Description">
                                    </div>
                                    <div class="col">
                                        <img class="img-fluid rounded" src="/assets_admin/svg/components/card-2.svg"
                                             alt="Image Description">
                                    </div>
                                    <div class="col">
                                        <img class="img-fluid rounded" src="/assets_admin/svg/components/card-3.svg"
                                             alt="Image Description">
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
                        <img class="step-avatar-img" src="/assets_admin/img/160x160/img5.jpg" alt="Image Description">
                    </div>

                    <div class="step-content">
                        <h5 class="mb-1">Finch Hoot</h5>

                        <p class="fs-5 mb-1">Earned a "Top endorsed" <i class="bi-patch-check-fill text-primary"></i>
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


            // INITIALIZATION OF FILE ATTACHMENT
            // =======================================================
            new HSFileAttach('.js-file-attach')


            // INITIALIZATION OF STICKY BLOCKS
            // =======================================================
            new HSStickyBlock('.js-sticky-block', {
                targetSelector: document.getElementById('header').classList.contains('navbar-fixed') ? '#header' : null
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
    let lastData = "";

    function renderMessage(audioBoolean) {
        const message_container = document.getElementById("message-container");

        ticketId = {{$ticket['id']}};

        $.ajax({
            url: '{{route("chat.message.get")}}',
            type: 'GET',
            data: {
                ticket_id: ticketId,
            },
            success: function (data) {

                if (lastData.length == data.messages.length) {
                    return;
                }
                if (!lastData) {
                    lastData = data.messages;
                }

                if(audioBoolean){
                    var audio = new Audio('/audio/notify.mp3');
                    audio.play();

                }

                message_container.innerHTML = "";


                data.messages.forEach(function (item, index) {
                    var container = document.createElement("div");


                    var innerContainer = document.createElement("div");
                    if (item.user_id == {{\Illuminate\Support\Facades\Auth::user()->id}}) {
                        container.classList.add("d-flex", "justify-content-end", "w-fit-content", );
                        innerContainer.classList.add("p-2","text-white", "w-fit","bg-primary", "rounded-2", "gap-2", "justify-content-end", "d-flex");
                        var messageText = document.createTextNode(item.message);

                        // var timestamp = document.createElement("div");
                        // timestamp.classList.add("d-flex", "align-items-end", "h-100");
                        // timestamp.textContent = "16:12";
                        innerContainer.appendChild(messageText);
                        container.appendChild(innerContainer);
                    } else {
                        container.classList.add("d-flex", "justify-content-start", "w-fit-content",);
                        innerContainer.classList.add("p-2", "bg-light", "w-fit", "rounded-2", "gap-2", "justify-content-end", "d-flex");

                        var messageText = document.createTextNode(item.message);

                        // var timestamp = document.createElement("div");
                        // timestamp.classList.add("d-flex", "align-items-end", "h-100");
                        // timestamp.textContent = "16:12";
                        // container.appendChild(timestamp);
                        innerContainer.appendChild(messageText);
                        container.appendChild(innerContainer);
                    }


                    message_container.appendChild(container);
                });

                lastData = data.messages;

            },
            error: function (data) {
                console.log(data);
            }
        });
    }

    renderMessage(true);
    setInterval(()=>{
        renderMessage(true)

        }, 5000);
    function readMessage(){
        $.ajax({
            url: '{{route("chat.ticket.status.read")}}',
            type: 'POST',
            data: {
                ticket_id: {{$ticket['id']}},
                _token: '{{csrf_token()}}'
            },
            success: function (data) {
                console.log(data);
            },
            error: function (data) {
                console.log(data);
            }
        });

    }
    readMessage()

    const sendMessageForm = document.getElementById("sendMessageForm");
    sendMessageForm.addEventListener("submit", (e) => {
        e.preventDefault();
        const formData = new FormData(sendMessageForm);
        $.ajax({
            url: '{{route("chat.message.send")}}',
            type: 'POST',
            data: formData,
            processData: false,
            contentType: false,
            success: function (data) {
                const message = document.getElementById("sendMessageInput");
                message.value = '';
                renderMessage(false);
                readMessage()

            },
            error: function (data) {
                console.log(data);
            }
        });
    })
</script>

<script>
    function changeStatusTicket(el){
        const status = el.checked ? "open" : "close";
        const ticketID = {{$ticket['id']}};
        $.ajax({
            url: '{{route("chat.ticket.status.change")}}',
            type: 'POST',
            data: {
                status: status,
                ticket_id: ticketID,
                _token: '{{csrf_token()}}'
            },
            success: function (data) {
                console.log(data);
            },
            error: function (data) {
                console.log(data);
            }
        });
    }
</script>
<!-- End Style Switcher JS -->
</body>
</html>
