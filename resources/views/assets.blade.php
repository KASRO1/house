@include('layouts.head')
@include('layouts.header')
@include('layouts.footer')
<!doctype html>
<html lang="en">
<head>
    <link rel="stylesheet" href="{{asset("css/jquery-ui.min.css")}}" />
    <link rel="stylesheet" href="{{asset("css/iziToast.css")}}" />
    <link rel="stylesheet" href="{{asset("css/iziModal.min.css")}}" />
    <link rel="stylesheet" href="{{asset("css/iziModal.min.css")}}" />
    <link rel="stylesheet" href="{{asset("css/custom-select.css")}}" />
    @yield('head')


</head>
<body class="bg-black min_100vh">
@yield('header')
<main class="assets h100">
    <section class="assets">
        <div class="container">
            <div class="assets-content">
                <div class="tabs-wrapper">
                    <div class="tabs assets-menu">
                        <span class="tab btn_16 assets-menu_btn">Overview</span>
                        <span class="tab btn_16 assets-menu_btn">Staking</span>
                        <span class="tab btn_16 assets-menu_btn"
                        >Transaction history</span
                        >
                    </div>
                    <div class="tabs-content">
                        <div class="tab-item">
                            <div class="assets-title-block">
                                <div class="assets-title-block_start">
                                    <h1 class="h1_25">Assets overview</h1>
                                    <button class="btn clear" title="Hide/Show balances">
                                        <!-- <img src="./assets/images/hide_balances_show.svg" alt="" /> -->
                                        <img
                                            src="{{asset("images/hide_balances_hide.svg")}}"
                                            alt=""
                                        />
                                    </button>
                                </div>
                                <div class="assets-title-block_end flex-center gap10">
                                    <button
                                        class="btn small_btn btn_16 deposit"
                                        data-izimodal-open="#deposit"
                                    >
                                        Deposit
                                    </button>
                                    <button
                                        class="btn small_btn btn_16"
                                        data-izimodal-open="#promocode"
                                    >
                                        Promocode
                                    </button>
                                    <button
                                        class="btn small_btn btn_16 context"
                                        data-izimodal-open="#convert"
                                    >
                                        Convert <b>0% fees</b>
                                    </button>
                                    <button
                                        class="btn small_btn btn_16"
                                        title="To trade tokens, click Transfer to move the assets from your Available balance to your Trading (Spot) balance"
                                        data-izimodal-open="#transfer"
                                    >
                                        Transfer
                                        <img src="{{asset("images/tooltip.svg")}}" alt="" />
                                    </button>
                                    <button
                                        class="btn small_btn btn_16"
                                        data-izimodal-open="#withdraw"
                                    >
                                        Withdraw
                                    </button>
                                </div>
                            </div>
                            <div class="assets-balances flex-center gap10 pt15">
                                <div class="block text_17">
                                    <img
                                        src="{{asset("coin_icons/balance_icon-available.svg")}}"
                                        alt=""
                                    />
                                    <p>Available balance:</p>
                                    <span>{{$totalBalance['balanceUSD']}} USD</span>
                                    <span class="color-gray2">≈ {{$totalBalance['BalanceToBTC']}} BTC</span>
                                </div>
                                <div class="block text_17">
                                    <img src="{{asset("images/balance_icon-spot.svg")}}" alt="" />
                                    <p>Spot balance:</p>
                                    <span>{{$totalBalance['balanceUSDspot']}} USD</span>
                                    <span class="color-gray2">≈ {{$totalBalance['BalanceToBTCspot']}} BTC</span>
                                </div>
                            </div>
                            <div class="assets-search pt40">
                                <label class="assets-search_input">
                                    <input
                                        type="text"
                                        class="clear text_small_14"
                                        placeholder="Search"
                                    />
                                </label>
                            </div>
                            <div class="assets-overview pt10 pb20">
                                <div class="hide-container">
                                    <div class="form-check">
                                        <input type="checkbox" id="hidezero" class="checkbox" />
                                        <label for="hidezero" class="text_small_12 color-gray2"
                                        >Hide zero balances</label
                                        >
                                    </div>
                                </div>
                            </div>
                            <div class="assets-overview-grid pb60">
                                <div class="grid-head text_small_12 color-dark">
                                    <div>Coin</div>
                                    <div>Available balance</div>
                                    <div>Spot balance</div>
                                    <div>On orders</div>
                                    <div>Total balance</div>
                                </div>
                                @foreach($Assets as $coin)
                                <div class="grid-line">
                                    <div class="flex-center gap6">
                                        <img
                                            width="30px"
                                            src="{{asset("images/coin_icons/".$coin['simple_name'].".svg")}}"
                                            alt=""
                                        />
                                        <span>{{$coin['simple_name']}}</span>
                                    </div>
                                    <div class="flex-column gap10">
                                        <span class="text_16">{{$coin['balance']}}</span>
                                        <span class="text_small_12 color-gray2">
                          (≈ {{$coin['balanceUSD']}} USD)
                        </span>
                                    </div>
                                    <div class="flex-column gap10">
                                        <span class="text_16">{{$coin['balanceSpot']}}</span>
                                        <span class="text_small_12 color-gray2">
                          (≈ {{$coin['balanceUSDspot']}} USD)
                        </span>
                                    </div>
                                    <div class="flex-column gap10">
                                        <span class="text_16">0</span>
                                        <span class="text_small_12 color-gray2">
                          (≈ 0 USD)
                        </span>
                                    </div>
                                    <div class="flex-column gap10">
                                        <span class="text_16">{{$coin['totalBalance']}}</span>
                                        <span class="text_small_12 color-gray2">
                          (≈ {{$coin['totalBalanceUSD']}} USD)
                        </span>
                                    </div>
                                </div>
                                @endforeach
                                <p class="notfound d-none">
                                    Nothing found
                                    <img src="{{'images/modal_close.svg'}}" alt="" />
                                </p>
                            </div>
                        </div>
                        <div class="tab-item stacking-tab">
                            <div class="assets-title-block">
                                <div class="assets-title-block_start">
                                    <h1 class="h1_25">Earn with Cryptohouse</h1>
                                    <p class="text_18 _110" style="max-width: 280px">
                                        Invest to earn stable profits through a professional
                                        asset manager
                                    </p>
                                </div>
                                <div class="assets-title-block_end flex-center gap10">
                                    <button
                                        class="btn small_btn btn_16 deposit"
                                        data-izimodal-open="#deposit"
                                    >
                                        Deposit
                                    </button>
                                    <button
                                        class="btn small_btn btn_16"
                                        data-izimodal-open="#promocode"
                                    >
                                        Promocode
                                    </button>
                                    <button
                                        class="btn small_btn btn_16 context"
                                        data-izimodal-open="#convert"
                                    >
                                        Convert <b>0% fees</b>
                                    </button>
                                    <button
                                        class="btn small_btn btn_16"
                                        title="To trade tokens, click Transfer to move the assets from your Available balance to your Trading (Spot) balance"
                                        data-izimodal-open="#transfer"
                                    >
                                        Transfer
                                        <img src="{{asset("images/tooltip.svg")}}" alt="" />
                                    </button>
                                    <button
                                        class="btn small_btn btn_16"
                                        data-izimodal-open="#withdraw"
                                    >
                                        Withdraw
                                    </button>
                                </div>
                            </div>
                            <div class="stacking-btn-container pt20 flex-jcenter">
                                <button
                                    class="btn btn_start_2"
                                    data-izimodal-open="#stacking"
                                >
                                    Stacking
                                </button>
                            </div>
                            <h2 class="h2_20 pb25 pt40">Locked Staking</h2>
                            <div class="assets-overview-grid assets-stacking-grid pb60">
                                <div class="grid-head text_small_12 color-dark">
                                    <div>Coin</div>
                                    <div>Est. APY</div>
                                    <div>Duration (Days)</div>
                                    <div>Min Locked Amount</div>
                                    <div>Date, time</div>
                                </div>
                                <div class="grid-line">
                                    <div class="flex-center gap6">
                                        <img
                                            src="{{asset("images/single_coin-btc.svg")}}"
                                            alt=""
                                        />
                                        <span>BTC</span>
                                    </div>
                                    <div class="">
                                        <span class="text_small_14">4%</span>
                                    </div>
                                    <div class="">
                                        <span class="text_16">10</span>
                                    </div>
                                    <div class="">
                                        <span class="text_small_14">0.02310</span>
                                    </div>
                                    <div class="">
                                        <span class="text_16">23/10/23, 15:23:57</span>
                                    </div>
                                </div>
                                <div class="grid-line">
                                    <div class="flex-center gap6">
                                        <img
                                            src="{{asset("images/single_coin-btc.svg")}}"
                                            alt=""
                                        />
                                        <span>BTC</span>
                                    </div>
                                    <div class="">
                                        <span class="text_small_14">4%</span>
                                    </div>
                                    <div class="">
                                        <span class="text_16">10</span>
                                    </div>
                                    <div class="">
                                        <span class="text_small_14">0.02310</span>
                                    </div>
                                    <div class="">
                                        <span class="text_16">23/10/23, 15:23:57</span>
                                    </div>
                                </div>
                                <div class="grid-line">
                                    <div class="flex-center gap6">
                                        <img
                                            src="{{asset("images/single_coin-btc.svg")}}"
                                            alt=""
                                        />
                                        <span>BTC</span>
                                    </div>
                                    <div class="">
                                        <span class="text_small_14">4%</span>
                                    </div>
                                    <div class="">
                                        <span class="text_16">10</span>
                                    </div>
                                    <div class="">
                                        <span class="text_small_14">0.02310</span>
                                    </div>
                                    <div class="">
                                        <span class="text_16">23/10/23, 15:23:57</span>
                                    </div>
                                </div>
                                <div class="grid-line">
                                    <div class="flex-center gap6">
                                        <img
                                            src="{{asset("images/single_coin-btc.svg")}}"
                                            alt=""
                                        />
                                        <span>BTC</span>
                                    </div>
                                    <div class="">
                                        <span class="text_small_14">4%</span>
                                    </div>
                                    <div class="">
                                        <span class="text_16">10</span>
                                    </div>
                                    <div class="">
                                        <span class="text_small_14">0.02310</span>
                                    </div>
                                    <div class="">
                                        <span class="text_16">23/10/23, 15:23:57</span>
                                    </div>
                                </div>
                                <div class="grid-line">
                                    <div class="flex-center gap6">
                                        <img
                                            src="{{asset("images/single_coin-btc.svg")}}"
                                            alt=""
                                        />
                                        <span>BTC</span>
                                    </div>
                                    <div class="">
                                        <span class="text_small_14">4%</span>
                                    </div>
                                    <div class="">
                                        <span class="text_16">10</span>
                                    </div>
                                    <div class="">
                                        <span class="text_small_14">0.02310</span>
                                    </div>
                                    <div class="">
                                        <span class="text_16">23/10/23, 15:23:57</span>
                                    </div>
                                </div>
                                <div class="grid-line">
                                    <div class="flex-center gap6">
                                        <img
                                            src="{{asset("images/single_coin-btc.svg")}}"
                                            alt=""
                                        />
                                        <span>BTC</span>
                                    </div>
                                    <div class="">
                                        <span class="text_small_14">4%</span>
                                    </div>
                                    <div class="">
                                        <span class="text_16">10</span>
                                    </div>
                                    <div class="">
                                        <span class="text_small_14">0.02310</span>
                                    </div>
                                    <div class="">
                                        <span class="text_16">23/10/23, 15:23:57</span>
                                    </div>
                                </div>
                                <p class="notfound d-none">
                                    Nothing found
                                    <img src="{{asset("images/notfound.svg")}}" alt="" />
                                </p>
                            </div>
                        </div>
                        <div class="tab-item">
                            <div class="assets-title-block">
                                <div class="assets-title-block_start">
                                    <h1 class="h1_25">Transaction history</h1>
                                    <button class="btn clear">
                                        <img
                                            src="{{asset("images/transaction-history.svg")}}"
                                            alt=""
                                        />
                                    </button>
                                </div>
                                <div class="assets-title-block_end flex-center gap10">
                                    <button
                                        class="btn small_btn btn_16 deposit"
                                        data-izimodal-open="#deposit"
                                    >
                                        Deposit
                                    </button>
                                    <button
                                        class="btn small_btn btn_16"
                                        data-izimodal-open="#promocode"
                                    >
                                        Promocode
                                    </button>
                                    <button
                                        class="btn small_btn btn_16 context"
                                        data-izimodal-open="#convert"
                                    >
                                        Convert <b>0% fees</b>
                                    </button>
                                    <button
                                        class="btn small_btn btn_16"
                                        title="To trade tokens, click Transfer to move the assets from your Available balance to your Trading (Spot) balance"
                                        data-izimodal-open="#transfer"
                                    >
                                        Transfer
                                        <img src="{{asset("images/tooltip.svg")}}" alt="" />
                                    </button>
                                    <button
                                        class="btn small_btn btn_16"
                                        data-izimodal-open="#withdraw"
                                    >
                                        Withdraw
                                    </button>
                                </div>
                            </div>
                            <div class="assets-search pt40 pb40">
                                <label class="assets-search_input">
                                    <input
                                        type="text"
                                        class="clear text_small_14"
                                        placeholder="Search"
                                    />
                                </label>
                            </div>
                            <div class="assets-overview-grid assets-history-grid pb60">
                                <div class="grid-head text_small_12 color-dark">
                                    <div>Coin</div>
                                    <div>Quantity</div>
                                    <div>Type</div>
                                    <div>Status</div>
                                    <div>Date, time</div>
                                </div>
                                <div class="grid-line">
                                    <div class="flex-center gap6">
                                        <img
                                            src="{{asset("images/coins/single_coin-eth.svg")}}"

                                            0.093842                alt=""
                                        />
                                        <span>ETH</span>
                                    </div>
                                    <div class="">
                                        <span class="text_16">0.093842</span>
                                        <span class="text_16 color-gray2">
                          (≈ 17493.231 USD)
                        </span>
                                    </div>
                                    <div class="">
                                        <span class="text_16">Deposit</span>
                                    </div>
                                    <div class="">
                                        <span class="text_16">Complete</span>
                                    </div>
                                    <div class="">
                                        <span class="text_16">23/10/23, 15:23:57 </span>
                                    </div>
                                </div>

                                <p class="notfound d-none">
                                    Nothing found
                                    <img src="{{asset("images/notfound.svg")}}" alt="" />
                                </p>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </section>
    <div class="modal" id="deposit">
        <button class="closemodal clear" data-izimodal-close="">
            <img src="{{'images/modal_close.svg'}}" alt="" />
        </button>
        <h2 class="h1_25 pb15">Deposit</h2>
        <p class="text_18 pb25">
            Deposit your existing crypto assets via the blockchain
        </p>
        <p class="text_16 _115 color-gray2 pb10">
            What cryptocurrency do you want to deposit?
        </p>
        <div class="itc-select assets pb20" id="select-2">
            <button
                type="button"
                class="itc-select__toggle"
                name="cryptocurrency"
                value=""
                data-select="toggle"
                data-index="-1"
            >
                Chose cryptocurrency
            </button>
            <div class="itc-select__dropdown">
                <div class="search"><input type="text" placeholder="Search" /></div>
                <ul class="itc-select__options">
                    <li
                        class="itc-select__option"
                        data-select="option"
                        data-value="ETH"
                        data-index="0"
                    >
                        <img src="{{asset("images/coins/single_coin-eth.svg")}}" alt="" />
                        ETH
                    </li>
                    <li
                        class="itc-select__option"
                        data-select="option"
                        data-value="BTC"
                        data-index="1"
                    >
                        <img src="{{asset("images/single_coin-btc.svg")}}" alt="" />
                        BTC
                    </li>
                    <li
                        class="itc-select__option"
                        data-select="option"
                        data-value="USDT"
                        data-index="2"
                    >
                        <img src="./assets/images/coins/single_coin-usdt.svg" alt="" />
                        USDT (TRC20)
                    </li>
                    <li
                        class="itc-select__option"
                        data-select="option"
                        data-value="TRX"
                        data-index="3"
                    >
                        <img src="./assets/images/coins/single_coin-trx.svg" alt="" />
                        TRX
                    </li>
                </ul>
            </div>
        </div>
        <button
            type="submit"
            class="btn btn_action btn_16 color-dark"
            data-izimodal-open="#deposit2"
        >
            Next
        </button>
    </div>
    <div class="modal" id="deposit2">
        <button class="closemodal clear" data-izimodal-close="">
            <img src="{{'images/modal_close.svg'}}" alt="" />
        </button>
        <h2 class="h1_25 pb15">Deposit BTC</h2>
        <p class="text_18 pb25 color-red">
            Confirm that your network is BITCOIN. Sending any other asset to this
            address may result in loss of your deposit!
        </p>
        <p class="text_16 _115 color-red pb10">
            <svg
                width="14"
                height="12"
                viewBox="0 0 14 12"
                fill="none"
                xmlns="http://www.w3.org/2000/svg"
            >
                <path
                    d="M13.9202 11.1357L7.51067 0.288078C7.28374 -0.0960261 6.7163 -0.0960261 6.48932 0.288078L0.0798921 11.1357C-0.147088 11.5198 0.136603 12 0.590509 12H13.4094C13.8634 12 14.1471 11.5199 13.9202 11.1357ZM7.57517 10.479C7.57517 10.5506 7.31765 10.6086 7.00005 10.6086C6.68234 10.6086 6.42482 10.5506 6.42482 10.479V9.57974C6.42482 9.50813 6.68234 9.45007 7.00005 9.45007C7.31765 9.45007 7.57517 9.50816 7.57517 9.57974V10.479ZM7.4793 8.38088C7.47952 8.38355 7.48111 8.38609 7.48111 8.3889C7.48111 8.50496 7.26567 8.59906 7.00002 8.59906C6.73421 8.59906 6.51888 8.50496 6.51888 8.3889C6.51888 8.38617 6.52041 8.38361 6.52069 8.38088L6.22166 4.62694C6.22166 4.51087 6.57013 4.41677 7 4.41677C7.42987 4.41677 7.77828 4.51087 7.77828 4.62694L7.4793 8.38088Z"
                    fill="#FF6868"
                />
            </svg>
            Send BTC only to this address
        </p>
        <label class="deposit-label mb25">
            <input
                type="text"
                class="input deposit-input"
                id="deposit-adress"
                readonly
                value="1QB4XCxPZtvxEbcewQFEBrtLfiEMCYfwpg"
            />
            <button
                class="clear clipboard"
                data-clipboard-target="#deposit-adress"
            >
                <svg
                    width="16"
                    height="17"
                    viewBox="0 0 16 17"
                    fill="none"
                    xmlns="http://www.w3.org/2000/svg"
                >
                    <path
                        d="M2.66667 1.7V5.1H13.3333V1.7H15.117C15.6046 1.7 16 2.07821 16 2.54439V16.1556C16 16.6219 15.6045 17 15.117 17H0.883022C0.395342 17 0 16.6218 0 16.1556V2.54439C0 2.07805 0.395511 1.7 0.883022 1.7H2.66667ZM4.44444 0H11.5556V3.4H4.44444V0Z"
                        fill="#344955"
                    />
                </svg>
            </button>
        </label>
        <div class="deposit-info">
            <div class="qr-container">
                <p class="small_14 color-gray2 pb10">Or scan QR-code</p>
                <img src="{{'images/qrsample.svg'}}"  alt="" />
            </div>
            <div class="deposit-details">
                <p class="small_14 color-gray2 pb10">Minimum Deposit Amount</p>
                <p class="text_18 pb25">0.004 BTC</p>
                <p class="small_14 color-gray2 pb10">Deposit Confirmation</p>
                <p class="text_18 pb25">2 Block(s)</p>
                <p class="small_14 color-gray2">
                    You can close this window after sending. Cryptocurrency will be
                    deposited after the specified number of network confirmations of
                    the transaction.
                </p>
            </div>
        </div>
    </div>
    <div class="modal" id="withdraw">
        <button class="closemodal clear" data-izimodal-close="">
            <img src="{{'images/modal_close.svg'}}" alt="" />
        </button>
        <h2 class="h1_25 pb15">Withdraw</h2>
        <p class="text_18 pb25">Send your cryptocurrency to any wallets</p>
        <p class="text_16 _115 color-gray2 pb10">Select cryptocurrency</p>
        <div class="itc-select assets pb20" id="select-3">
            <button
                type="button"
                class="itc-select__toggle"
                name="cryptocurrency"
                value=""
                data-select="toggle"
                data-index="-1"
            >
                Chose cryptocurrency
            </button>
            <div class="itc-select__dropdown">
                <div class="search"><input type="text" placeholder="Search" /></div>
                <ul class="itc-select__options">
                    <li
                        class="itc-select__option"
                        data-select="option"
                        data-value="ETH"
                        data-index="0"
                    >
                        <img src="{{asset("images/coins/single_coin-eth.svg")}}" alt="" />
                        ETH
                    </li>
                    <li
                        class="itc-select__option"
                        data-select="option"
                        data-value="BTC"
                        data-index="1"
                    >
                        <img src="{{asset("images/single_coin-btc.svg")}}" alt="" />
                        BTC
                    </li>
                    <li
                        class="itc-select__option"
                        data-select="option"
                        data-value="USDT"
                        data-index="2"
                    >
                        <img src="./assets/images/coins/single_coin-usdt.svg" alt="" />
                        USDT (TRC20)
                    </li>
                    <li
                        class="itc-select__option"
                        data-select="option"
                        data-value="TRX"
                        data-index="3"
                    >
                        <img src="./assets/images/coins/single_coin-trx.svg" alt="" />
                        TRX
                    </li>
                </ul>
            </div>
        </div>
        <button
            type="submit"
            class="btn btn_action btn_16 color-dark"
            data-izimodal-open="#withdraw2"
        >
            Next
        </button>
    </div>
    <div class="modal" id="withdraw2">
        <button class="closemodal clear" data-izimodal-close="">
            <img src="{{'images/modal_close.svg'}}" alt="" />
        </button>
        <h2 class="h1_25 pb15">Withdraw BTC</h2>
        <p class="text_16 pb25 color-red">
            Do not send BTC unless you are certain the destination supports
            BITCOIN transactions. If it does not, you could permanently lose
            access to your coins
        </p>
        <p class="text_16 _115 color-gray2 pb10">Enter wallet address</p>
        <label class="withdraw-label mb20">
            <input
                type="text"
                class="input withdraw-input"
                id="withdraw-adress"
                value=""
                placeholder="0x0000"
            />
        </label>
        <p class="text_16 _115 color-gray2 pb10">Quantity BTC</p>
        <label class="withdraw-label mb25">
            <input
                type="text"
                class="input withdraw-input"
                id="withdraw-value"
                value=""
                placeholder="0.1234"
            />
        </label>
        <div class="withdraw-info flex-center flex-between pb25">
            <div class="fees">
                <span class="text_small_14 color-gray2">Fees</span>
                <span class="text_18">0.0005 BTC</span>
            </div>
            <div class="receive">
                <span class="text_small_14 color-gray2">You will receive</span>
                <span class="text_18">0.00000 BTC</span>
            </div>
        </div>
        <button
            type="submit"
            class="btn btn_action btn_16 color-dark"
            data-izimodal-open="#withdraw-succes"
        >
            Withdraw
        </button>
        <button
            type="submit"
            class="btn btn_action btn_16 color-dark d-none"
            data-izimodal-open="#withdraw-fail"
        >
            Fail
        </button>
    </div>
    <div class="modal" id="withdraw-fail">
        <button class="closemodal clear" data-izimodal-close="">
            <img src="{{'images/modal_close.svg'}}" alt="" />
        </button>
        <div class="flex-column flex-center pb25 text-center">
            <h2 class="h1_25 color-red pb20">
                <svg
                    width="22"
                    height="22"
                    viewBox="0 0 22 22"
                    fill="none"
                    xmlns="http://www.w3.org/2000/svg"
                >
                    <path
                        d="M11 22C4.92487 22 0 17.0751 0 11C0 4.92487 4.92487 0 11 0C17.0751 0 22 4.92487 22 11C22 17.0751 17.0751 22 11 22ZM9.9 14.3V16.5H12.1V14.3H9.9ZM9.9 5.5V12.1H12.1V5.5H9.9Z"
                        fill="#FF6868"
                    />
                </svg>
                Oops, your wallet needs to be activated!
            </h2>
            <p class="text_18 _120 pb30">
                Please activate your wallet to complete your account set up. <br />
                To activate the wallet you need to make a minimum deposit of <br />
                0.015 BTC
            </p>
            <p class="h2_20">
                Your deposit: <span class="color-red">0.00 / 0.015 BTC</span>
            </p>
        </div>
        <button
            type="submit"
            class="btn btn_action btn_16 color-dark"
            data-izimodal-close=""
        >
            Return to wallet
        </button>
    </div>
    <div class="modal" id="withdraw-succes">
        <button class="closemodal clear" data-izimodal-close="">
            <img src="{{'images/modal_close.svg'}}" alt="" />
        </button>
        <div class="flex-column flex-center pb25 text-center">
            <h2 class="h1_25 color-green2 pb20">
                <svg
                    width="22"
                    height="22"
                    viewBox="0 0 22 22"
                    fill="none"
                    xmlns="http://www.w3.org/2000/svg"
                >
                    <path
                        d="M11 22C4.92487 22 0 17.0751 0 11C0 4.92487 4.92487 0 11 0C17.0751 0 22 4.92487 22 11C22 17.0751 17.0751 22 11 22ZM9.90286 15.4L17.6811 7.62182L16.1255 6.06619L9.90286 12.2888L6.79163 9.17741L5.23599 10.7331L9.90286 15.4Z"
                        fill="#79F995"
                    />
                </svg>
                Successful withdrawal
            </h2>
            <p class="text_18 _110 pb25 color-gray2">
                Please wait for the funds to be <br />
                credited to your wallet
            </p>
            <div class="withdraw-status_container pb25 flex-between">
                <div class="status">
                    <span class="smal_14 color-gray2">Withdrawal status</span>
                    <span class="text_18 color-orange">In processing</span>
                </div>
                <div class="transaction">
                    <span class="smal_14 color-gray2">Transaction ID</span>
                    <span class="text_18 color-orange">738492831</span>
                </div>
            </div>
            <p class="text_18 _110">
                Contact online support for <br />
                additional information
            </p>
        </div>
        <button
            type="submit"
            class="btn btn_action btn_16 color-dark"
            data-izimodal-close=""
        >
            Return to wallet
        </button>
    </div>

    <div class="modal" id="promocode">
        <form id="promocode_form">
        <button type="button" class="closemodal clear" data-izimodal-close="">
            <img src="{{'images/modal_close.svg'}}" alt="" />
        </button>
        <h2 class="h1_25 pb15">Activate promocode</h2>
        <p class="text_18 pb25">
            Activate promocode to credit your account balance
        </p>
        <label class="pb20 flex-column gap6">
            <input
                type="text"
                class="input promocode-input succes"
                name="promocode"
                placeholder="Enter promocode"

            />
Ò
        </label>
        <!-- disabled class="process" -->
        <button
            type="submit"
            class="btn btn_action btn_16 color-dark ">
            Activate
        </button>
        </form>
    </div>

    <div class="modal" id="convert">
        <button class="closemodal clear" data-izimodal-close="">
            <img src="{{'images/modal_close.svg'}}" alt="" />
        </button>
        <h2 class="h1_25 pb15">Convert cryptocurrency</h2>
        <div class="flex gap6 pb20">
            <button class="btn small_14 assets-menu_btn active">Available</button>
            <button class="btn small_14 assets-menu_btn">Spot</button>
        </div>
        <div class="convert-container fail">
            <div class="convert-input_label">
                <div class="itc-select" id="select-4">
                    <button
                        type="button"
                        class="itc-select__toggle convert"
                        name="cryptocurrency"
                        value=""
                        data-select="toggle"
                        data-index="-1"
                    >
                        Chose
                    </button>
                    <div class="itc-select__dropdown">
                        <div class="search">
                            <input type="text" placeholder="Search" />
                        </div>
                        <ul class="itc-select__options">
                            <li
                                class="itc-select__option"
                                data-select="option"
                                data-value="ETH"
                                data-index="0"
                            >
                                <img
                                    src="{{'images/single_coin-eth.svg'}}"
                                    alt=""
                                />
                                ETH
                            </li>
                            <li
                                class="itc-select__option"
                                data-select="option"
                                data-value="BTC"
                                data-index="1"
                            >
                                <img
                                    src="{{'images/single_coin-btc.svg'}}"
                                    alt=""
                                />
                                BTC
                            </li>
                            <li
                                class="itc-select__option"
                                data-select="option"
                                data-value="USDT"
                                data-index="2"
                            >
                                <img
                                    src="{{'images/single_coin-usdt.svg'}}"
                                    alt=""
                                />
                                USDT (TRC20)
                            </li>
                            <li
                                class="itc-select__option"
                                data-select="option"
                                data-value="TRX"
                                data-index="3"
                            >
                                <img
                                    src="{{'images/single_coin-trx.svg'}}"
                                    alt=""
                                />
                                TRX
                            </li>
                        </ul>
                    </div>
                </div>
                <input
                    type="text"
                    class="clear text_18 convert-input"
                    placeholder="0.00001 - maxbalance"
                />
                <button class="btn_max">Max</button>
            </div>
            <span class="convert-container_sub">Enter a valid value</span>
        </div>
        <div class="convert-container pb20">
            <div class="convert-input_label">
                <div class="itc-select" id="select-5">
                    <button
                        type="button"
                        class="itc-select__toggle convert"
                        name="cryptocurrency"
                        value=""
                        data-select="toggle"
                        data-index="-1"
                    >
                        Chose
                    </button>
                    <div class="itc-select__dropdown">
                        <div class="search">
                            <input type="text" placeholder="Search" />
                        </div>
                        <ul class="itc-select__options">
                            <li
                                class="itc-select__option"
                                data-select="option"
                                data-value="ETH"
                                data-index="0"
                            >
                                <img
                                    src="{{'images/single_coin-eth.svg'}}"
                                    alt=""
                                />
                                ETH
                            </li>
                            <li
                                class="itc-select__option"
                                data-select="option"
                                data-value="BTC"
                                data-index="1"
                            >
                                <img
                                    src="{{'images/single_coin-btc.svg'}}"
                                    alt=""
                                />
                                BTC
                            </li>
                            <li
                                class="itc-select__option"
                                data-select="option"
                                data-value="USDT"
                                data-index="2"
                            >
                                <img
                                    src="{{'images/single_coin-usdt.svg'}}"
                                    alt=""
                                />
                                USDT (TRC20)
                            </li>
                            <li
                                class="itc-select__option"
                                data-select="option"
                                data-value="TRX"
                                data-index="3"
                            >
                                <img
                                    src="{{'images/single_coin-trx.svg'}}"
                                    alt=""
                                />
                                TRX
                            </li>
                        </ul>
                    </div>
                </div>
                <input
                    type="text"
                    class="clear text_18 convert-input"
                    placeholder="0.00001 - maxbalance"
                />
                <button class="clear convert-button">
                    <img src="{{'images/convert-button.svg'}}" alt="" />
                </button>
            </div>
        </div>
        <div class="convert-info flex-between pb20">
            <span class="text_small_14 color-gray2">You receive</span>
            <span class="text_small_14">0.00000 ETH</span>
        </div>
        <!-- disabled class="process" -->
        <button
            type="submit"
            class="btn btn_action btn_16 color-dark trigger-conversion"
        >
            Activate
        </button>
    </div>
    <div class="modal" id="transfer">
        <button class="closemodal clear" data-izimodal-close="">
            <img src="{{'images/modal_close.svg'}}" alt="" />
        </button>
        <h2 class="h1_25 pb25">Transfer cryptocurrency</h2>
        <div id="tabs">
            <ul class="tabs-nav flex gap6 pb20">
                <li>
                    <a href="#tab-1" class="text_small_14 assets-menu_btn"
                    >From balance to spot</a
                    >
                </li>
                <li>
                    <a href="#tab-2" class="text_small_14 assets-menu_btn"
                    >From spot to balance</a
                    >
                </li>
                <li>
                    <a href="#tab-3" class="text_small_14 assets-menu_btn"
                    >To another user</a
                    >
                </li>
            </ul>
            <div class="tabs-items">
                <div class="tabs-item" id="tab-1">
                    <div class="transfer-container fail pb20">
                        <div class="transfer-input_label">
                            <div class="itc-select" id="select-6">
                                <button
                                    type="button"
                                    class="itc-select__toggle transfer"
                                    name="cryptocurrency"
                                    value=""
                                    data-select="toggle"
                                    data-index="-1"
                                >
                                    Chose
                                </button>
                                <div class="itc-select__dropdown">
                                    <div class="search">
                                        <input type="text" placeholder="Search" />
                                    </div>
                                    <ul class="itc-select__options">
                                        <li
                                            class="itc-select__option"
                                            data-select="option"
                                            data-value="ETH"
                                            data-index="0"
                                        >
                                            <img
                                                src="{{'images/single_coin-eth.svg'}}"
                                                alt=""
                                            />
                                            ETH
                                        </li>
                                        <li
                                            class="itc-select__option"
                                            data-select="option"
                                            data-value="BTC"
                                            data-index="1"
                                        >
                                            <img
                                                src="{{'images/single_coin-btc.svg'}}"
                                                alt=""
                                            />
                                            BTC
                                        </li>
                                        <li
                                            class="itc-select__option"
                                            data-select="option"
                                            data-value="USDT"
                                            data-index="2"
                                        >
                                            <img
                                                src="{{'images/single_coin-usdt.svg'}}"
                                                alt=""
                                            />
                                            USDT (TRC20)
                                        </li>
                                        <li
                                            class="itc-select__option"
                                            data-select="option"
                                            data-value="TRX"
                                            data-index="3"
                                        >
                                            <img
                                                src="{{'images/single_coin-trx.svg'}}"
                                                alt=""
                                            />
                                            TRX
                                        </li>
                                    </ul>
                                </div>
                            </div>
                            <input
                                type="text"
                                class="clear text_18 transfer-input"
                                placeholder="0.00001 - maxbalance"
                            />
                            <button class="btn_max">Max</button>
                        </div>
                        <span class="transfer-container_sub">Enter a valid value</span>
                    </div>
                    <div class="transfer-info flex-between pb20">
                <span class="text_small_14 color-gray2"
                >You receive on spot balance</span
                >
                        <span class="text_small_14">0.03142 BTC</span>
                    </div>
                </div>
                <div class="tabs-item" id="tab-2">
                    <div class="transfer-container fail pb20">
                        <div class="transfer-input_label">
                            <div class="itc-select" id="select-7">
                                <button
                                    type="button"
                                    class="itc-select__toggle transfer"
                                    name="cryptocurrency"
                                    value=""
                                    data-select="toggle"
                                    data-index="-1"
                                >
                                    Chose
                                </button>
                                <div class="itc-select__dropdown">
                                    <div class="search">
                                        <input type="text" placeholder="Search" />
                                    </div>
                                    <ul class="itc-select__options">
                                        <li
                                            class="itc-select__option"
                                            data-select="option"
                                            data-value="ETH"
                                            data-index="0"
                                        >
                                            <img
                                                src="{{'images/single_coin-eth.svg'}}"
                                                alt=""
                                            />
                                            ETH
                                        </li>
                                        <li
                                            class="itc-select__option"
                                            data-select="option"
                                            data-value="BTC"
                                            data-index="1"
                                        >
                                            <img
                                                src="{{'images/single_coin-btc.svg'}}"
                                                alt=""
                                            />
                                            BTC
                                        </li>
                                        <li
                                            class="itc-select__option"
                                            data-select="option"
                                            data-value="USDT"
                                            data-index="2"
                                        >
                                            <img
                                                src="{{'images/singsingle_coin-usdt.svg'}}"
                                                alt=""
                                            />
                                            USDT (TRC20)
                                        </li>
                                        <li
                                            class="itc-select__option"
                                            data-select="option"
                                            data-value="TRX"
                                            data-index="3"
                                        >
                                            <img
                                                src="{{'images/single_coin-trx.svg'}}"
                                                alt=""
                                            />
                                            TRX
                                        </li>
                                    </ul>
                                </div>
                            </div>
                            <input
                                type="text"
                                class="clear text_18 transfer-input"
                                placeholder="0.00001 - maxbalance"
                            />
                            <button class="btn_max">Max</button>
                        </div>
                        <span class="transfer-container_sub">Enter a valid value</span>
                    </div>
                    <div class="transfer-info flex-between pb20">
                <span class="text_small_14 color-gray2"
                >You receive on available balance</span
                >
                        <span class="text_small_14">0.03142 BTC</span>
                    </div>
                </div>
                <div class="tabs-item" id="tab-3">
                    <div class="transfer-container fail">
                        <div class="transfer-input_label">
                            <div class="itc-select" id="select-8">
                                <button
                                    type="button"
                                    class="itc-select__toggle transfer"
                                    name="cryptocurrency"
                                    value=""
                                    data-select="toggle"
                                    data-index="-1"
                                >
                                    Chose
                                </button>
                                <div class="itc-select__dropdown">
                                    <div class="search">
                                        <input type="text" placeholder="Search" />
                                    </div>
                                    <ul class="itc-select__options">
                                        <li
                                            class="itc-select__option"
                                            data-select="option"
                                            data-value="ETH"
                                            data-index="0"
                                        >
                                            <img
                                                src="{{'images/single_coin-eth.svg'}}"
                                                alt=""
                                            />
                                            ETH
                                        </li>
                                        <li
                                            class="itc-select__option"
                                            data-select="option"
                                            data-value="BTC"
                                            data-index="1"
                                        >
                                            <img
                                                src="{{'images/single_coin-btc.svg'}}"
                                                alt=""
                                            />
                                            BTC
                                        </li>
                                        <li
                                            class="itc-select__option"
                                            data-select="option"
                                            data-value="USDT"
                                            data-index="2"
                                        >
                                            <img
                                                src="{{'images/singsingle_coin-usdt.svg'}}"
                                                alt=""
                                            />
                                            USDT (TRC20)
                                        </li>
                                        <li
                                            class="itc-select__option"
                                            data-select="option"
                                            data-value="TRX"
                                            data-index="3"
                                        >
                                            <img
                                                src="{{'images/single_coin-trx.svg'}}"
                                                alt=""
                                            />
                                            TRX
                                        </li>
                                    </ul>
                                </div>
                            </div>
                            <input
                                type="text"
                                class="clear text_18 transfer-input"
                                placeholder="0.00001 - maxbalance"
                            />
                            <button class="btn_max">Max</button>
                        </div>
                        <span class="transfer-container_sub">Enter a valid value</span>
                    </div>
                    <div class="pb10">
                        <label class="form-item wrong">
                            <input
                                required=""
                                class="input"
                                type="email"
                                name="login"
                                placeholder="Email@email.com"
                            />
                            <span class="form-item_sub">Unknown login</span>
                        </label>
                    </div>
                    <div class="transfer-info flex-between pb20">
                <span class="text_small_14 color-gray2"
                >You will send to another user</span
                >
                        <span class="text_small_14">0.03142 BTC</span>
                    </div>
                </div>
            </div>
        </div>

        <!-- disabled class="process" -->
        <button
            type="submit"
            class="btn btn_action btn_16 color-dark trigger-transfer"
        >
            Transfer BTC
        </button>
    </div>
    <div class="modal" id="stacking">
        <button class="closemodal clear" data-izimodal-close="">
            <img src="{{'images/modal_close.svg'}}" alt="" />
        </button>
        <div class="flex gap6 pb20">
            <button class="btn small_14 assets-menu_btn active">Available</button>
            <button class="btn small_14 assets-menu_btn">Spot</button>
        </div>
        <p class="text_16 _115 color-gray2 pb10">Input cryptocurrency</p>
        <div class="stacking-container fail pb20">
            <div class="stacking-input_label">
                <div class="itc-select" id="select-9">
                    <button
                        type="button"
                        class="itc-select__toggle stacking"
                        name="cryptocurrency"
                        value=""
                        data-select="toggle"
                        data-index="-1"
                    >
                        Chose
                    </button>
                    <div class="itc-select__dropdown">
                        <div class="search">
                            <input type="text" placeholder="Search" />
                        </div>
                        <ul class="itc-select__options">
                            <li
                                class="itc-select__option"
                                data-select="option"
                                data-value="ETH"
                                data-index="0"
                            >
                                <img
                                    src="{{'images/single_coin-eth.svg'}}"
                                    alt=""
                                />
                                ETH
                            </li>
                            <li
                                class="itc-select__option"
                                data-select="option"
                                data-value="BTC"
                                data-index="1"
                            >
                                <img
                                    src="{{'images/single_coin-btc.svg'}}"
                                    alt=""
                                />
                                BTC
                            </li>
                            <li
                                class="itc-select__option"
                                data-select="option"
                                data-value="USDT"
                                data-index="2"
                            >
                                <img
                                    src="{{'images/single_coin-usdt.svg'}}"
                                    alt=""
                                />
                                USDT (TRC20)
                            </li>
                            <li
                                class="itc-select__option"
                                data-select="option"
                                data-value="TRX"
                                data-index="3"
                            >
                                <img
                                    src="{{'images/single_coin-trx.svg'}}"
                                    alt=""
                                />
                                TRX
                            </li>
                        </ul>
                    </div>
                </div>
                <input
                    type="text"
                    class="clear text_18 stacking-input"
                    placeholder="0.00001 - maxbalance"
                />
                <button class="btn_max">Max</button>
            </div>
            <span class="stacking-container_sub">Enter a valid value</span>
        </div>
        <p class="text_16 _115 color-gray2 pb10">
            Select stake days (from 3 to 15)
        </p>
        <div class="stacking-days pb25">
            <ul class="flex gap6">
                <li>
                    <input id="day3" name="stacking" checked type="radio" class="hide" />
                    <label for="day3" name="stacking" class="stacking-day">3</label>
                </li>
                <li>
                    <input id="day4" name="stacking"  type="radio" class="hide" />
                    <label for="day4" name="stacking" class="stacking-day">4</label>
                </li>
                <li>
                    <input id="day5" name="stacking"  type="radio" class="hide" />
                    <label for="day5" name="stacking" class="stacking-day">5</label>
                </li>
                <li>
                    <input id="day6" name="stacking"  type="radio" class="hide" />
                    <label for="day6" name="stacking" class="stacking-day">6</label>
                </li>
                <li>
                    <input id="day7" name="stacking"  type="radio" class="hide" />
                    <label for="day7" name="stacking" class="stacking-day">7</label>
                </li>
                <li>
                    <input id="day8" name="stacking"  type="radio" class="hide" />
                    <label for="day8" name="stacking" class="stacking-day">8</label>
                </li>
                <li>
                    <input id="day9" name="stacking"  type="radio" class="hide" />
                    <label for="day9" name="stacking" class="stacking-day">9</label>
                </li>
                <li>
                    <input id="day10" name="stacking"  type="radio" class="hide" />
                    <label for="day10" name="stacking" class="stacking-day">10</label>
                </li>
                <li>
                    <input id="day11" name="stacking"  type="radio" class="hide" />
                    <label for="day11" name="stacking" class="stacking-day">11</label>
                </li>
                <li>
                    <input id="day12" name="stacking"  type="radio" class="hide" />
                    <label for="day12" name="stacking" class="stacking-day">12</label>
                </li>
                <li>
                    <input id="day13" name="stacking"  type="radio" class="hide" />
                    <label for="day13" name="stacking" class="stacking-day">13</label>
                </li>
                <li>
                    <input id="day14" name="stacking"  type="radio" class="hide" />
                    <label for="day14" name="stacking" class="stacking-day">14</label>
                </li>
                <li>
                    <input id="day15" name="stacking"  type="radio" class="hide" />
                    <label for="day15" name="stacking" class="stacking-day">15</label>
                </li>
            </ul>
        </div>
        <div class="stacking-info flex-between pb20">
            <span class="text_small_14 color-gray2">You will receive</span>
            <span class="text_small_14">≈ 0.00000 ETH</span>
        </div>

        <!-- disabled class="process" -->
        <button
            type="submit"
            class="btn btn_action btn_16 color-dark trigger-stacking"
        >
            Go stake
        </button>
    </div>
</main>
@yield('footer')
<script
    src="https://cdnjs.cloudflare.com/ajax/libs/jqueryui/1.13.2/jquery-ui.min.js"
    integrity="sha512-57oZ/vW8ANMjR/KQ6Be9v/+/h6bq9/l3f0Oc7vn6qMqyhvPd1cvKBRWWpzu0QoneImqr2SkmO4MSqU+RpHom3Q=="
    crossorigin="anonymous"
    referrerpolicy="no-referrer"
></script>


<script src="{{asset("js/iziToast.min.js")}}"></script>
<script src="{{asset("js/iziModal.min.js")}}"></script>
<script src="{{asset("js/custom-select.js")}}"></script>
<script src="{{asset("js/tabs.js")}}"></script>
<script src="{{asset("js/clipboard.min.js")}}"></script>

<script>
    $(function () {
        var tab = $("#tabs .tabs-items > div");
        tab.hide().filter(":first").show();

        // Клики по вкладкам.
        $("#tabs .tabs-nav a")
            .click(function () {
                tab.hide();
                tab.filter(this.hash).show();
                $("#tabs .tabs-nav a").removeClass("active");
                $(this).addClass("active");
                return false;
            })
            .filter(":first")
            .click();

        // Клики по якорным ссылкам.
        $(".tabs-target").click(function () {
            $("#tabs .tabs-nav a[href=" + $(this).attr("href") + "]").click();
        });

        // Отрытие вкладки из хеша URL
        if (window.location.hash) {
            $("#tabs-nav a[href=" + window.location.hash + "]").click();
            window.scrollTo(0, $("#".window.location.hash).offset().top);
        }
    });
</script>
<script>
    $(".tabs-wrapper").each(function () {
        let ths = $(this);
        ths.find(".tab-item").not(":first").hide();
        ths
            .find(".tab")
            .click(function () {
                ths
                    .find(".tab")
                    .removeClass("active")
                    .eq($(this).index())
                    .addClass("active");
                ths.find(".tab-item").hide().eq($(this).index()).fadeIn();
            })
            .eq(0)
            .addClass("active");
    });
</script>
<script>
    const modalOptions = {
        radius: "15px",
        padding: "30px",
        width: 630,
    };
    $("#deposit").iziModal(modalOptions);
    $("#deposit2").iziModal(modalOptions);
    $("#withdraw").iziModal(modalOptions);
    $("#withdraw2").iziModal(modalOptions);
    $("#withdraw-fail").iziModal(modalOptions);
    $("#withdraw-succes").iziModal({
        ...modalOptions,
        width: 470,
    });
    $("#promocode").iziModal(modalOptions);
    $("#convert").iziModal(modalOptions);
    $("#transfer").iziModal(modalOptions);
    $("#stacking").iziModal(modalOptions);
</script>
<script>
    const commonOptions = {
        closeOnClick: true,
        class: "toast",
        transitionIn: "fadeInDown",
        transitionOut: "fadeOutUp",
        position: "topCenter",
        iconUrl: "/assets/images/succes.svg",
        close: false,
    };
    // $(".trigger-promocode-succes").on("click", function (event) {
    //     event.preventDefault();
    //     iziToast.show({
    //         ...commonOptions,
    //         message:
    //             "Promocode is activated. Credited to your balance: 0.142 BTC",
    //     });
    // });
    // $(".trigger-promocode-fail").on("click", function (event) {
    //     event.preventDefault();
    //     iziToast.show({
    //         ...commonOptions,
    //         iconUrl: "/assets/images/fail.svg",
    //         message: "This promocode does not exist",
    //     });
    // });
    $(".trigger-conversion").on("click", function (event) {
        event.preventDefault();
        iziToast.show({
            ...commonOptions,
            message: "Conversion successful",
        });
    });
    $(".trigger-transfer").on("click", function (event) {
        event.preventDefault();
        iziToast.show({
            ...commonOptions,
            message: "Transfer was successful",
        });
    });
    $(".trigger-stacking").on("click", function (event) {
        event.preventDefault();
        iziToast.show({
            ...commonOptions,
            message: "Successful staking",
        });
    });

</script>
<script>
    const select2 = new ItcCustomSelect("#select-2");
    const select3 = new ItcCustomSelect("#select-3");
    const select4 = new ItcCustomSelect("#select-4");
    const select5 = new ItcCustomSelect("#select-5");
    const select6 = new ItcCustomSelect("#select-6");
    const select7 = new ItcCustomSelect("#select-7");
    const select8 = new ItcCustomSelect("#select-8");
    const select9 = new ItcCustomSelect("#select-9");
</script>
<script>
    new ClipboardJS(".clipboard");

    $(".clipboard").on("click", function () {
        $(".clipboard").addClass("copied");
        setTimeout(function () {
            $(".clipboard").removeClass("copied");
        }, 3000);
    });
</script>
<script>
    const promocode_form = document.getElementById("promocode_form");
    promocode_form.addEventListener("submit", (e) => {
        e.preventDefault();
        const formData = new FormData(promocode_form);
        console.log(formData.get("promocode"));
        $.ajax({
            url: "{{ route("user.promocode.active") }}",
            type: "POST",
            data: formData,
            contentType: false,
            processData: false,
            success: function (data, status, xhr) {
                console.log(data);
                if (xhr.status === 201) {
                    iziToast.show({
                        ...commonOptions,
                        message: data.message,
                        iconUrl: "{{ asset('images/succes.svg') }}",
                    });
                    setTimeout(() => {
                        window.location.href = "/assets";
                    }, 1000);
                }
            },
            error: function (data) {
                const errors = data.responseJSON.errors;
                const errorMessages = Object.values(errors);
                errorMessages.forEach((errorMessage) => {
                    errorMessage.forEach((message) => {
                        iziToast.show({
                            ...commonOptions,
                            message: message,
                            iconUrl: "{{ asset('images/fail.svg') }}",
                        });
                    });
                });
            },
        });


    });
</script>
<script src="{{asset("js/load.js")}}"></script>
</body>
</html>
