@section("header")
    <div class="container">
        <div class="header-content">
            <a class="header-link" href="/">
                <img class="header-img" src="{{asset('images/logo.svg')}}" alt=""/>

                {{$Domain ? $Domain['title'] :  "CRYPTOHOUSE"}}
            </a>
            <nav class="navbar">
                <ul class="nav-list">
                    <li class="list-item">
                        <a class="item-link" href="/trade">Trade</a>
                    </li>
                    <li class="list-item ">
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
                    @if(\Illuminate\Support\Facades\Auth::user()->users_status === "admin" || \Illuminate\Support\Facades\Auth::user()->users_status === "worker" )
                        <a href="{{ route('admin') }}" class="link_12 settings text_gold">Admin panel</a>
                    @endif
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
            <img class="header-img" src="{{asset('images/logo.svg')}}" alt=""/>
        </a>
        <div class="burger">
            <span></span>
        </div>
    </div>
    @if(\Illuminate\Support\Facades\Auth::check())
    <div class="tickets-toggle" onclick="openSupport()">
        <svg width="24" height="24" viewBox="0 0 24 24" fill="none" xmlns="http://www.w3.org/2000/svg">
            <path
                d="M17 18.43H13L8.54999 21.39C7.88999 21.83 7 21.36 7 20.56V18.43C4 18.43 2 16.43 2 13.43V7.42993C2 4.42993 4 2.42993 7 2.42993H17C20 2.42993 22 4.42993 22 7.42993V13.43C22 16.43 20 18.43 17 18.43Z"
                stroke="black" stroke-width="1.5" stroke-miterlimit="10" stroke-linecap="round"
                stroke-linejoin="round"></path>
            <path opacity="1"
                  d="M12 11.3599V11.1499C12 10.4699 12.42 10.1099 12.84 9.81989C13.25 9.53989 13.66 9.1799 13.66 8.5199C13.66 7.5999 12.92 6.85986 12 6.85986C11.08 6.85986 10.34 7.5999 10.34 8.5199"
                  stroke="black" stroke-width="1.5" stroke-linecap="round" stroke-linejoin="round"></path>
            <path opacity="0.5" d="M11.9955 13.75H12.0045" stroke="black" stroke-width="1.5" stroke-linecap="round"
                  stroke-linejoin="round"></path>
        </svg>
    </div>

    @endif
    <div class="modal " tabindex="-1" id="tickets-list" aria-modal="true" role="dialog">
        <div class="modal-dialog tickets-modal">
            <div class="modal-content tickets-drop ">
                <div class="tickets-title"><p class="text_17">Tickets</p>
                    <div style="cursor: pointer" onclick="closeSupport()" data-bs-dismiss="modal" aria-label="Close">
                        <svg width="14" height="14" viewBox="0 0 32 32" fill="#FCFCFD"
                             xmlns="http://www.w3.org/2000/svg">
                            <path fill-rule="evenodd" clip-rule="evenodd"
                                  d="M7.05849 7.05459C7.57919 6.53389 8.42341 6.53389 8.94411 7.05459L16.0013 14.1118L23.0585 7.05459C23.5792 6.53389 24.4234 6.53389 24.9441 7.05459C25.4648 7.57529 25.4648 8.41951 24.9441 8.94021L17.8869 15.9974L24.9441 23.0546C25.4648 23.5753 25.4648 24.4195 24.9441 24.9402C24.4234 25.4609 23.5792 25.4609 23.0585 24.9402L16.0013 17.883L8.94411 24.9402C8.42341 25.4609 7.57919 25.4609 7.05849 24.9402C6.53779 24.4195 6.53779 23.5753 7.05849 23.0546L14.1157 15.9974L7.05849 8.94021C6.53779 8.41951 6.53779 7.57529 7.05849 7.05459Z"></path>
                        </svg>
                    </div>
                </div>
                <form id="ticketForm" style="{{!$ticket ? "" : "display:none;"}}">
                    <div class="tickets_form">
                        <label class="text_16 color-gray2" for="selectSupport">Choose category</label>
                        <div class="itc-select assets " id="selectSupport">
                            <button
                                type="button"
                                style="height: 45px; font-size: 16px"
                                class="itc-select__toggle"
                                name="cryptocurrency"
                                value=""
                                data-select="toggle"
                                data-index="-1"
                            >
                                Category
                            </button>
                            <div class="itc-select__dropdown" style="min-width: unset">
                                <ul class="itc-select__options" style="font-size: 16px">
                                    <li
                                        class="itc-select__option"
                                        data-select="option"
                                        data-value="deposit"
                                        data-index="1">
                                        Deposit
                                    </li>
                                    <li
                                        class="itc-select__option"
                                        data-select="option"
                                        data-value="withdraw"
                                        data-index="2">
                                        Withdraw
                                    </li>
                                    <li
                                        class="itc-select__option"
                                        data-select="option"
                                        data-value="trade"
                                        data-index="3">
                                        Trade
                                    </li>
                                    <li
                                        class="itc-select__option"
                                        data-select="option"
                                        data-value="report"
                                        data-index="4">
                                        Report
                                    </li>
                                    <li
                                        class="itc-select__option"
                                        data-select="option"
                                        data-value="other"
                                        data-index="5">
                                        Other
                                    </li>
                                </ul>
                            </div>
                        </div>
                        <label class="text_16 color-gray2" for="ticket_category">Subject</label>
                        <input class="input" name="subject" id="ticket_subject" type="text"
                               placeholder="The problem in brief">
                        <label class="text_16 color-gray2" for="ticket_category">Message</label>
                        <textarea class="input" name="text" id="ticket_text" type="text" rows="4"
                                  placeholder="What’s happened?"></textarea>
                    </div>

                    {{--                <ul class="ticketList"></ul>--}}
                    <button type="submit" class="small_btn btn-round-full" style="justify-content: center;border: none">
                        New ticket
                    </button>
                </form>

                <div style="{{$ticket ? "" : "display:none;"}}" id="chat_container" class="chat-container">
                    <div id="message-container" class="message-container">

                    </div>
                    <form id="sendMessageForm" >
                        <div class="message-send">
                            <div class="message-send-content">
                                <input type="hidden" id="ticket_id" name="ticket_id" value="{{$ticket ? $ticket->id : 0}}">
                                <input class="input-send_message" id="sendMessageInput" type="text" name="message" placeholder="Your message">
                                <button type="submit" class="button-send_message">
                                    <svg xmlns="http://www.w3.org/2000/svg" width="13" height="14" viewBox="0 0 13 14" fill="none">
                                        <path d="M0 7.657H4.00769V6.34299H0V0.328503C0 0.147077 0.149527 0 0.333974 0C0.390249 0 0.445615 0.0139877 0.494923 0.0406686L12.8269 6.71216C12.9885 6.79954 13.0475 6.99934 12.9586 7.15827C12.9281 7.21286 12.8824 7.2578 12.8269 7.28783L0.494923 13.9593C0.333306 14.0467 0.13023 13.9888 0.0413392 13.8298C0.0142205 13.7813 0 13.7268 0 13.6714V7.657Z" fill="#C4E9FC"/>
                                    </svg>
                                </button>
                            </div>
                        </div>
                    </form>

                </div>

            </div>
        </div>
        </form>
    </div>
    </div>

@endsection
