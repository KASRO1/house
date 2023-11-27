@section("header")
    <div class="container">
        <div class="header-content">
            <a class="header-link" href="/">
                <img class="header-img" src="{{asset('images/logo.svg')}}" alt="" />
            </a>
            <nav class="navbar">
                <ul class="nav-list">
                    <li class="list-item">
                        <a class="item-link" href="/trade">Trade</a>
                    </li>
                    <li class="list-item active">
                        <a class="item-link" href="/assets">Staking</a>
                    </li>
                    <li class="list-item">
                        <a class="item-link" href="/about">About</a>
                    </li>
                    <li class="list-item">
                        <a class="item-link" href="/faq">FAQ</a>
                    </li>
                </ul>
            </nav>
            @if(!\Illuminate\Support\Facades\Auth::check())
            <div class="header-buttons not-authed">

                <a href="/login" class="link_15">Log in</a>
                <a href="/signup" class="btn btn_sign link_15">Sign up</a>
            </div>
            @else
            <div class="header-buttons authed ">
                <a href="/assets" class="link_15">Assets</a>
                <div class="dropdown-container">
                    <a href="/account" class="link_15 account">
                        Account
                        <svg
                            width="4"
                            height="2"
                            viewBox="0 0 4 2"
                            fill="none"
                            xmlns="http://www.w3.org/2000/svg"
                        >
                            <path
                                d="M1.78787 0.212132C1.90503 0.0949744 2.09497 0.0949747 2.21213 0.212132L3.48787 1.48787C3.67686 1.67686 3.54301 2 3.27574 2L0.724264 2C0.456993 2 0.323143 1.67686 0.512132 1.48787L1.78787 0.212132Z"
                                fill="white"
                            />
                        </svg>
                    </a>
                    <div class="dropdown">
                        <a href="/account" class="link_12 settings">Settings</a>
                        <a href="/logout" class="link_12">Log out</a>
                    </div>
                </div>
            </div>
            @endif
        </div>
        <a class="header-link header_mobile" href="/">
            <img class="header-img" src="{{asset('images/logo.svg')}}" alt="" />
        </a>
        <div class="burger">
            <span></span>
        </div>
    </div>


@endsection
