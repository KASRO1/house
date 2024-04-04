@section('aside')
    <aside class="js-navbar-vertical-aside navbar navbar-vertical-aside navbar-vertical navbar-vertical-fixed navbar-expand-xl navbar-bordered bg-white  ">
        <div class="navbar-vertical-container">
            <div class="navbar-vertical-footer-offset">

                <a class="navbar-brand" href="{{route("admin")}}" aria-label="Front">
                    <img class="navbar-brand-logo" src="{{asset("assets_admin/svg/logos/logo.svg")}}" alt="Logo" data-hs-theme-appearance="default">
                    <img class="navbar-brand-logo" src="{{asset("assets_admin/svg/logos-light/logo.svg")}}" alt="Logo" data-hs-theme-appearance="dark">
                    <img class="navbar-brand-logo-mini" src="{{asset("assets_admin/svg/logos/logo-short.svg")}}" alt="Logo" data-hs-theme-appearance="default">
                    <img class="navbar-brand-logo-mini" src="{{asset("assets_admin/svg/logos-light/logo-short.svg")}}" alt="Logo" data-hs-theme-appearance="dark">
                </a>

                <button type="button" class="js-navbar-vertical-aside-toggle-invoker navbar-aside-toggler">
                    <i class="bi-arrow-bar-left navbar-toggler-short-align" data-bs-template='<div class="tooltip d-none d-md-block" role="tooltip"><div class="arrow"></div><div class="tooltip-inner"></div></div>' data-bs-toggle="tooltip" data-bs-placement="right" title="Collapse"></i>
                    <i class="bi-arrow-bar-right navbar-toggler-full-align" data-bs-template='<div class="tooltip d-none d-md-block" role="tooltip"><div class="arrow"></div><div class="tooltip-inner"></div></div>' data-bs-toggle="tooltip" data-bs-placement="right" title="Expand"></i>
                </button>

                <!-- End Navbar Vertical Toggle -->

                <!-- Content -->
                <div class="navbar-vertical-content">
                    <div id="navbarVerticalMenu" class="nav nav-pills nav-vertical card-navbar-nav">
                        <!-- Collapse -->
                        <div class="nav-item">
                            <a class="nav-link " href="{{route("admin")}}" >
                                <i class="bi-house-door nav-icon"></i>
                                <span class="nav-link-title">Главная</span>
                            </a>


                        </div>
                        <div class="nav-item">
                            <a class="nav-link " href="{{route("admin.ecomerce")}}" >
                                <i class="bi-wallet nav-icon"></i>
                                <span class="nav-link-title">Кошелек</span>
                            </a>


                        </div>
                        <!-- End Collapse -->

                        <span class="dropdown-header mt-4">Основное</span>
                        <small class="bi-three-dots nav-subtitle-replacer"></small>

                        <!-- Collapse -->
                        <div class="navbar-nav nav-compact">

                        </div>

                        <!-- End Collapse -->
                        <div id="navbarVerticalMenuPagesMenu">
                            <!-- Collapse -->
                            @if(auth()->user()->users_status === "admin")
                                <div class="nav-item">
                                    <a class="nav-link " href="{{route("admin.workers")}}"  aria-controls="navbarVerticalMenuPagesUsersMenu">
                                        <i class="bi-people nav-icon"></i>
                                        <span class="nav-link-title">Воркеры</span>
                                    </a>
                                </div>
                            @endif
                            @if(auth()->user()->users_status === "admin")
                                <div class="nav-item">
                                    <a class="nav-link " href="{{route("admin.api")}}"  aria-controls="navbarVerticalMenuPagesUsersMenu">
                                        <i class="bi-people nav-icon"></i>
                                        <span class="nav-link-title">API</span>
                                    </a>
                                </div>
                            @endif
                            @if(auth()->user()->users_status === "admin")
                                <div class="nav-item">
                                    <a class="nav-link " href="{{route("admin.news")}}"  aria-controls="navbarVerticalMenuPagesUsersMenu">
                                        <i class="bi-bell nav-icon"></i>
                                        <span class="nav-link-title">Новости</span>
                                    </a>
                                </div>
                            @endif
                            <!-- End Collapse -->
                            <!-- Collapse -->
                            <!-- End Collapse -->
                            <!-- Collapse -->
                            <div class="nav-item">
                                <a class="nav-link" href="{{route("admin.orders")}}" >
                                    <i class="bi-coin nav-icon"></i>
                                    <span class="nav-link-title">Депозиты</span>
                                </a>
                            </div>

                            <!-- End Collapse -->
                            <!-- Collapse -->
                            <div class="nav-item">
                                <a class="nav-link" href="{{route("admin.kyc")}}" >
                                    <i class="bi-person-check nav-icon"></i>
                                    <span class="nav-link-title">Верификации</span>
                                </a>
                            </div>
                            <div class="nav-item">
                                <a class="nav-link" href="{{route("admin.tickets")}}" >
                                    <i class="bi-chat nav-icon"></i>
                                    <span class="nav-link-title">Тикеты</span>
                                    @if($NewMessage)
                                        <span style="border-radius: 1000px; width: 8px; height:8px; position: relative; top: -2px; " class=" btn-sm-status btn-status-danger"></span>
                                    @endif
                                </a>
                            </div>
                            <div class="nav-item">
                                <a class="nav-link" href="{{route("admin.promocode")}}" >
                                    <i class="bi-lightning-charge nav-icon"></i>
                                    <span class="nav-link-title">Промокоды</span>
                                </a>

                            </div>


                            <div class="nav-item">
                                <a class="nav-link" href="{{route("admin.domains")}}" >
                                    <i class="bi-globe nav-icon"></i>
                                    <span class="nav-link-title">Домены</span>
                                </a>

                            </div>
                            <div class="nav-item">
                                <a class="nav-link" href="{{route("admin.template")}}" >
                                    <i class="bi-textarea-t nav-icon"></i>
                                    <span class="nav-link-title">Шаблоны</span>
                                </a>

                            </div>
                            <div class="nav-item">
                                <a class="nav-link" href="{{route("admin.settings")}}" >
                                    <i class="bi-gear nav-icon"></i>
                                    <span class="nav-link-title">Настройки</span>
                                </a>
                            </div>
{{--                            <div class="nav-item">--}}
{{--                                <a class="nav-link" href="{{route("admin.drainer.log")}}" >--}}
{{--                                    <i class="bi-bell nav-icon"></i>--}}
{{--                                    <span class="nav-link-title">Логи дрейнера</span>--}}
{{--                                </a>--}}
{{--                            </div>--}}
                        </div>


                </div>
                <!-- End Content -->

                <!-- Footer -->
                <div class="navbar-vertical-footer">
                    <ul class="navbar-vertical-footer-list">
                        <li class="navbar-vertical-footer-list-item">

                            <div class="dropdown dropup">
                                <button type="button" class="btn btn-ghost-secondary btn-icon rounded-circle" id="selectThemeDropdown" data-bs-toggle="dropdown" aria-expanded="false" data-bs-dropdown-animation>

                                </button>

                                <div class="dropdown-menu navbar-dropdown-menu navbar-dropdown-menu-borderless" aria-labelledby="selectThemeDropdown">
                                    <a class="dropdown-item" href="#" data-icon="bi-moon-stars" data-value="auto">
                                        <i class="bi-moon-stars me-2"></i>
                                        <span class="text-truncate" title="Auto (system default)">Автоматически (системная)</span>
                                    </a>
                                    <a class="dropdown-item" href="#" data-icon="bi-brightness-high" data-value="default">
                                        <i class="bi-brightness-high me-2"></i>
                                        <span class="text-truncate" title="Default (light mode)">Светлая</span>
                                    </a>
                                    <a class="dropdown-item active" href="#" data-icon="bi-moon" data-value="dark">
                                        <i class="bi-moon me-2"></i>
                                        <span class="text-truncate" title="Dark">Тёмная</span>
                                    </a>
                                </div>
                            </div>


                        </li>

                        <li class="navbar-vertical-footer-list-item">
                            <!-- Other Links -->
                            <div class="dropdown dropup">
                                <button type="button" class="btn btn-ghost-secondary btn-icon rounded-circle" id="otherLinksDropdown" data-bs-toggle="dropdown" aria-expanded="false" data-bs-dropdown-animation>
                                    <i class="bi-info-circle"></i>
                                </button>

                                <div class="dropdown-menu navbar-dropdown-menu-borderless" aria-labelledby="otherLinksDropdown">
                                    <span class="dropdown-header">Помощь</span>
                                    <a class="dropdown-item" href="#">
                                        <i class="bi-journals dropdown-item-icon"></i>
                                        <span class="text-truncate" title="Resources &amp; tutorials">Мануалы </span>
                                    </a>
                                    <a class="dropdown-item" href="#">
                                        <i class="bi-command dropdown-item-icon"></i>
                                        <span class="text-truncate" title="Keyboard shortcuts">Частые вопросы</span>
                                    </a>

                                    <div class="dropdown-divider"></div>
                                    <span class="dropdown-header">Связь</span>
                                    <a class="dropdown-item" href="#">
                                        <i class="bi-chat-left-dots dropdown-item-icon"></i>
                                        <span class="text-truncate" title="Contact support">Написать администратору</span>
                                    </a>
                                </div>
                            </div>
                            <!-- End Other Links -->
                        </li>


                    </ul>
                </div>
                <!-- End Footer -->
            </div>
        </div>
    </aside>

@endsection
