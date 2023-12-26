<?php echo $__env->make('layouts.head', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?>
<?php echo $__env->make('layouts.header', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?>
<?php echo $__env->make('layouts.footer', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?>
<?php echo $__env->make('layouts.selectCoin', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?>
    <!doctype html>

<html lang="en">
<head>
    <link rel="stylesheet" href="<?php echo e(asset("css/jquery-ui.min.css")); ?>"/>
    <link rel="stylesheet" href="<?php echo e(asset("css/iziToast.css")); ?>"/>
    <link rel="stylesheet" href="<?php echo e(asset("css/iziModal.min.css")); ?>"/>
    <link rel="stylesheet" href="<?php echo e(asset("css/iziModal.min.css")); ?>"/>
    <link rel="stylesheet" href="<?php echo e(asset("css/custom-select.css")); ?>"/>
    <?php echo $__env->yieldContent('head'); ?>


</head>
<body class="bg-black min_100vh">
<?php echo $__env->yieldContent('header'); ?>
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
                                            src="<?php echo e(asset("images/hide_balances_hide.svg")); ?>"
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
                                        <img src="<?php echo e(asset("images/tooltip.svg")); ?>" alt=""/>
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
                                        src="<?php echo e(asset("coin_icons/balance_icon-available.svg")); ?>"
                                        alt=""
                                    />
                                    <p>Available balance:</p>
                                    <span><?php echo e($totalBalance['balanceUSD']); ?> USD</span>
                                    <span class="color-gray2">≈ <?php echo e($totalBalance['BalanceToBTC']); ?> BTC</span>
                                </div>
                                <div class="block text_17">
                                    <img src="<?php echo e(asset("images/balance_icon-spot.svg")); ?>" alt=""/>
                                    <p>Spot balance:</p>
                                    <span><?php echo e($totalBalance['balanceUSDspot']); ?> USD</span>
                                    <span class="color-gray2">≈ <?php echo e($totalBalance['BalanceToBTCspot']); ?> BTC</span>
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
                                        <input type="checkbox" onchange="toggleZeroBalance(this)" id="hidezero" class="checkbox"/>
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
                                <?php $__currentLoopData = $Assets; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $coin): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                                    <div class="grid-line" data-balance_coin = "<?php echo e($coin['balanceUSD']); ?>">
                                        <div class="flex-center gap6">
                                            <img
                                                width="30px"
                                                src="<?php echo e(asset("images/coin_icons/".$coin['simple_name'].".svg")); ?>"
                                                alt=""
                                            />
                                            <span><?php echo e($coin['simple_name']); ?></span>
                                        </div>
                                        <div class="flex-column gap10">
                                            <span class="text_16"><?php echo e($coin['balance']); ?></span>
                                            <span class="text_small_12 color-gray2">
                                          (≈ <?php echo e($coin['balanceUSD']); ?> USD)
                                        </span>
                                        </div>
                                        <div class="flex-column gap10">
                                            <span class="text_16"><?php echo e($coin['balanceSpot']); ?></span>
                                            <span class="text_small_12 color-gray2">
                                          (≈ <?php echo e($coin['balanceUSDspot']); ?> USD)
                                        </span>
                                        </div>
                                        <div class="flex-column gap10">
                                            <span class="text_16">0</span>
                                            <span class="text_small_12 color-gray2">
                                          (≈ 0 USD)
                                        </span>
                                        </div>
                                        <div class="flex-column gap10">
                                            <span class="text_16"><?php echo e($coin['totalBalance']); ?></span>
                                            <span class="text_small_12 color-gray2">
                                          (≈ <?php echo e($coin['totalBalanceUSD']); ?> USD)
                                        </span>
                                        </div>
                                    </div>
                                <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                                <p class="notfound " id="assetsZero" style="display: none">
                                    Nothing found
                                    <img src="<?php echo e('images/modal_close.svg'); ?>" alt=""/>
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
                                        <img src="<?php echo e(asset("images/tooltip.svg")); ?>" alt=""/>
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
                                    <div>Final Amount</div>
                                    <div>Date, time</div>
                                </div>
                                <?php $__currentLoopData = $stakingOrders; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $stakingOrder): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                                    <div class="grid-line">
                                        <div class="flex-center gap6">
                                            <img
                                                width="30px"
                                                src="<?php echo e(asset("images/coin_icons/".$stakingOrder['coin_symbol'].".svg")); ?>"
                                                alt=""/>
                                            <span><?php echo e($stakingOrder['coin_symbol']); ?></span>
                                        </div>
                                        <div class="">
                                            <span class="text_small_14"><?php echo e($stakingOrder['percent']); ?> %</span>
                                        </div>
                                        <div class="">
                                            <span class="text_16"><?php echo e($stakingOrder['days']); ?></span>
                                        </div>
                                        <div class="">
                                            <span class="text_small_14"><?php echo e($stakingOrder['final_amount']); ?></span>
                                        </div>
                                        <div class="">
                                            <span
                                                class="text_16"><?php echo e(\Carbon\Carbon::parse($stakingOrder['created_at'])->format("d/m/y, H:i")); ?></span>
                                        </div>
                                    </div>
                                <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                                <p class="notfound d-none">
                                    Nothing found
                                    <img src="<?php echo e(asset("images/notfound.svg")); ?>" alt=""/>
                                </p>
                            </div>
                        </div>
                        <div class="tab-item">
                            <div class="assets-title-block">
                                <div class="assets-title-block_start">
                                    <h1 class="h1_25">Transaction history</h1>
                                    <button class="btn clear">
                                        <img
                                            src="<?php echo e(asset("images/transaction-history.svg")); ?>"
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
                                        <img src="<?php echo e(asset("images/tooltip.svg")); ?>" alt=""/>
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

                                <?php $__currentLoopData = $transactions; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $transaction): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                                    <div class="grid-line">
                                        <div class="flex-center gap6">
                                            <img
                                                width="30px"
                                                src="<?php echo e(asset("images/coin_icons/" . strtolower($transaction['coinSymbol']) . ".svg")); ?>"
                                                alt=""/>
                                            <span><?php echo e($transaction['coinSymbol']); ?></span>
                                        </div>
                                        <div class="">
                                            <span class="text_16"><?php echo e($transaction['amount']); ?></span>

                                        </div>
                                        <div class="">
                                            <span class="text_16"><?php echo e($transaction['type']); ?></span>
                                        </div>
                                        <div class="">
                                            <span class="text_16"><?php echo e($transaction['status']); ?></span>
                                        </div>
                                        <div class="">
                                            <span
                                                class="text_16"><?php echo e(\Carbon\Carbon::parse($transaction["created_at"])->format("Y-m-d H:i")); ?> </span>
                                        </div>
                                    </div>

                                <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>

                                <?php if(count($transactions) == 0): ?>
                                    <p class="notfound ">
                                        Nothing found
                                        <img src="<?php echo e(asset("images/notfound.svg")); ?>" alt=""/>
                                    </p>
                                <?php endif; ?>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </section>
    <div class="modal" id="deposit">
        <button class="closemodal clear" data-izimodal-close="">
            <img src="<?php echo e('images/modal_close.svg'); ?>" alt=""/>
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
                <div class="search"><input type="text" placeholder="Search"/></div>
                <ul class="itc-select__options">
                    <?php echo $__env->yieldContent("selectCoinPayment"); ?>
                </ul>
            </div>
        </div>
        <div class="itc-select assets pb20" id="select-10">
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
                <div class="search"><input type="text" placeholder="Search"/></div>
                <ul class="itc-select__options">
                    <?php echo $__env->yieldContent("selectCoinPayment"); ?>
                </ul>
            </div>
        </div>
        <button
            type="submit"
            class="btn btn_action btn_16 color-dark"
            onclick="updateDataDeposit()"
            data-izimodal-open="#deposit2">

            Next
        </button>
    </div>
    <div class="modal" id="deposit2">
        <button class="closemodal clear" data-izimodal-close="">
            <img src="<?php echo e('images/modal_close.svg'); ?>" alt=""/>
        </button>
        <h2 class="h1_25 pb15">Deposit <span class="coinName"></span></h2>
        <p class="text_18 pb25 color-red">
            Confirm that your network is <span class="coinName"></span>. Sending any other asset to this
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
            Send <span class="coinName"></span> only to this address
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
                <div id="depositQR"  alt=""></div>
            </div>
            <div class="deposit-details">
                <p class="small_14 color-gray2 pb10">Minimum Deposit Amount</p>
                <p class="text_18 pb25"><span id="min_deposit"></span> <span class="coinName"></span></p>
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
            <img src="<?php echo e('images/modal_close.svg'); ?>" alt=""/>
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
                <div class="search"><input type="text" placeholder="Search"/></div>
                <ul class="itc-select__options">
                    <?php echo $__env->yieldContent("selectCoin"); ?>
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
            <img src="<?php echo e('images/modal_close.svg'); ?>" alt=""/>
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
            <img src="<?php echo e('images/modal_close.svg'); ?>" alt=""/>
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
                Please activate your wallet to complete your account set up. <br/>
                To activate the wallet you need to make a minimum deposit of <br/>
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
            <img src="<?php echo e('images/modal_close.svg'); ?>" alt=""/>
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
                Please wait for the funds to be <br/>
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
                Contact online support for <br/>
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
                <img src="<?php echo e('images/modal_close.svg'); ?>" alt=""/>
            </button>
            <h2 class="h1_25 pb15">Activate promocode</h2>
            <p class="text_18 pb25">
                Activate promocode to credit your account balance
            </p>
            <label class="pb20 flex-column gap6">
                <input
                    type="text"
                    class="input promocode-input "
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
            <img src="<?php echo e('images/modal_close.svg'); ?>" alt=""/>
        </button>
        <h2 class="h1_25 pb15">Convert cryptocurrency</h2>

        <form id="SwapCryptoCurrency">
            <div class="convert-container ">
                <div class="convert-input_label">
                    <div class="itc-select" id="select-4">
                        <button
                            type="button"
                            class="itc-select__toggle convert"
                            name="cryptocurrency"
                            value=""
                            data-select="toggle"
                            data-index="2">
                            Chose
                        </button>
                        <div class="itc-select__dropdown">
                            <div class="search">
                                <input type="text" placeholder="Search"/>
                            </div>
                            <ul class="itc-select__options">
                                <?php echo $__env->yieldContent("selectCoin"); ?>
                            </ul>
                        </div>
                    </div>
                    <input
                        type="text"
                        name="AmountFrom"
                        id="AmountFromConvert"
                        oninput="validateInput(this); updatePriceConvert()"
                        class="clear text_18 convert-input"
                        placeholder="0.00001 - maxbalance"/>
                    <button type="button" onclick="selectMaxConvert()" class="btn_max">Max</button>
                </div>
                <span class="convert-container_sub">Enter a valid value</span>
            </div>
            <div class="convert-container pb20">
                <div class="convert-input_label">
                    <div class="itc-select" data-dz-name="" id="select-5">
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
                                <input type="text" oninput="validateInput(this)" placeholder="Search"/>
                            </div>
                            <ul class="itc-select__options">
                                <?php echo $__env->yieldContent("selectCoin"); ?>
                            </ul>
                        </div>
                    </div>
                    <input
                        type="text"
                        name="amountTo"
                        readonly
                        id="amountToConvert"
                        class="clear text_18 convert-input"
                        placeholder="0.00001 - maxbalance"
                    />
                    <button type="button" onclick="swapCoinFields()" class="clear convert-button">
                        <img src="<?php echo e('images/convert-button.svg'); ?>" alt=""/>
                    </button>
                </div>
            </div>
            <div class="convert-info flex-between pb20">
                <span class="text_small_14 color-gray2">You receive</span>
                <span class="text_small_14" id="balance_coin"></span>
            </div>
            <!-- disabled class="process" -->
            <button
                type="submit"
                class="btn btn_action btn_16 color-dark "
            >
                Convert
            </button>
        </form>
    </div>
    <div class="modal" id="transfer">
        <button class="closemodal clear" data-izimodal-close="">
            <img src="<?php echo e('images/modal_close.svg'); ?>" alt=""/>
        </button>
        <h2 class="h1_25 pb25">Transfer cryptocurrency</h2>
        <div id="tabs">
            <ul class="tabs-nav flex gap6 pb20">
                <li>
                    <a href="#tab-1" class="text_small_14 assets-menu_btn">From balance to spot</a>
                </li>
                <li>
                    <a href="#tab-2" class="text_small_14 assets-menu_btn"
                    >From spot to balance</a
                    >
                </li>
                <li>
                    <a href="#tab-3" class="text_small_14 assets-menu_btn">To another user</a>
                </li>
            </ul>
            <div class="tabs-items">

                <div class="tabs-item" id="tab-1">
                    <form id="transferBalanceToSpot">
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
                                            <input type="text" placeholder="Search"/>
                                        </div>
                                        <ul class="itc-select__options">
                                            <?php echo $__env->yieldContent("selectCoin"); ?>
                                        </ul>
                                    </div>
                                </div>
                                <input
                                    type="text"
                                    class="clear convert-input text_18 "
                                    oninput="validateInput(this)"
                                    id="TransferToSpotInput"
                                    placeholder="0.00001 - maxbalance"
                                    name="amount"
                                />
                                <button type="button" class="btn_max" onclick="selectMaxTransferToSpot()">Max</button>
                            </div>

                        </div>
                        <div class="transfer-info flex-between pb20">
                <span class="text_small_14 color-gray2"
                >You receive on spot balance</span
                >
                            <span class="text_small_14" id="balanceCoinTransferToSpot"></span>
                        </div>
                        <button
                            type="submit"
                            class="btn btn_action btn_16 color-dark trigger-transfer"
                        >
                            Transfer
                        </button>
                    </form>
                </div>

                <div class="tabs-item" id="tab-2">
                    <form id="transferSpotToBalance">


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
                                            <input type="text" placeholder="Search"/>
                                        </div>
                                        <ul class="itc-select__options">
                                            <?php echo $__env->yieldContent("selectCoin"); ?>
                                        </ul>
                                    </div>
                                </div>
                                <input
                                    type="text"
                                    class="clear convert-input text_18 "
                                    name="amount"
                                    id="inputSpotToBalance"
                                    oninput="validateInput(this)"
                                    placeholder="0.00001 - maxbalance"
                                />
                                <button type="button" onclick="selectMaxTransferBalanceToSpot()" class="btn_max">Max
                                </button>
                            </div>

                        </div>
                        <div class="transfer-info flex-between pb20">
                            <span class="text_small_14 color-gray2">You receive on available balance</span>
                            <span class="text_small_14" id="balanceSpot"></span>
                        </div>
                        <button
                            type="submit"
                            class="btn btn_action btn_16 color-dark trigger-transfer">
                            Transfer
                        </button>
                    </form>
                </div>

                <div class="tabs-item" id="tab-3">
                    <form id="transferToAnotherUser">
                        <div class="transfer-container ">
                            <div class="transfer-input_label ">
                                <div class="itc-select" id="select-8">
                                    <button
                                        type="button"
                                        class="itc-select__toggle transfer"
                                        name="cryptocurrency"
                                        value=""
                                        data-select="toggle"
                                        data-index="-1">
                                        Chose
                                    </button>
                                    <div class="itc-select__dropdown">
                                        <div class="search">
                                            <input type="text" placeholder="Search"/>
                                        </div>
                                        <ul class="itc-select__options">
                                            <?php echo $__env->yieldContent("selectCoin"); ?>
                                        </ul>
                                    </div>
                                </div>
                                <input
                                    type="text"
                                    oninput="validateInput(this)"
                                    class="clear convert-input text_18 "
                                    name="amount"
                                    id="TransferAmountToUser"
                                    placeholder="0.00001 - maxbalance"
                                />
                                <button type="button" onclick="selectMaxTransferToUser()" class="btn_max">Max</button>
                            </div>

                        </div>
                        <div class="pb10 pt10">
                            <label class="form-item ">
                                <input
                                    required=""
                                    class="input"
                                    type="email"
                                    name="email"
                                    placeholder="Email@email.com"/>

                            </label>
                        </div>
                        <div class="transfer-info flex-between pb20">
                            <span class="text_small_14 color-gray2">You will send to another user</span>
                            <span class="text_small_14" id="balanceToAnotherUser"></span>
                        </div>

                        <button
                            type="submit"
                            class="btn btn_action btn_16 color-dark trigger-transfer">
                            Transfer
                        </button>
                    </form>
                </div>
            </div>
        </div>

        <!-- disabled class="process" -->

    </div>
    <div class="modal" id="stacking">
        <form id="stackingForm">
            <button class="closemodal clear" data-izimodal-close="">
                <img src="<?php echo e('images/modal_close.svg'); ?>" alt=""/>
            </button>

            <p class="text_16 _115 color-gray2 pb10">Input cryptocurrency</p>
            <div class="stacking-container  pb20">
                <div class="stacking-input_label">
                    <div class="itc-select" id="select-9">
                        <button
                            type="button"
                            class="itc-select__toggle stacking"
                            name="cryptocurrency"
                            value=""
                            data-select="toggle"
                            data-index="-1">
                            Chose
                        </button>
                        <div class="itc-select__dropdown">
                            <div class="search">
                                <input type="text" placeholder="Search"/>
                            </div>
                            <ul class="itc-select__options">
                                <?php echo $__env->yieldContent("selectCoin"); ?>
                            </ul>
                        </div>
                    </div>
                    <input
                        oninput="validateInput(this); calculateStaking(this)"
                        type="text"
                        id="amountStaking"
                        name="amount"
                        class="clear text_18 stacking-input"
                        placeholder="0.00001 - maxbalance"
                    />
                    <button oninput="selectMaxStakingOrder()" class="btn_max">Max</button>
                </div>

            </div>
            <p class="text_16 _115 color-gray2 pb10">
                Select stake days (from 7 to 365)
            </p>
            <div class="stacking-days pb25">
                <ul class="flex gap6">
                    <li>
                        <input id="day7" oninput="calculateStaking()" value="7" name="stacking" checked type="radio"
                               class="hide"/>
                        <label for="day7" name="stacking" class="stacking-day">7</label>
                    </li>
                    <li>
                        <input id="day14" oninput="calculateStaking()" value="14" name="stacking" type="radio"
                               class="hide"/>
                        <label for="day14" name="stacking" class="stacking-day">14</label>
                    </li>
                    <li>
                        <input id="day30" oninput="calculateStaking()" value="30" name="stacking" type="radio"
                               class="hide"/>
                        <label for="day30" name="stacking" class="stacking-day">30</label>
                    </li>
                    <li>
                        <input id="day60" oninput="calculateStaking()" value="60" name="stacking" type="radio"
                               class="hide"/>
                        <label for="day60" name="stacking" class="stacking-day">60</label>
                    </li>
                    <li>
                        <input id="day90" oninput="calculateStaking()" value="90" name="stacking" type="radio"
                               class="hide"/>
                        <label for="day90" name="stacking" class="stacking-day">90</label>
                    </li>
                    <li>
                        <input id="day120" oninput="calculateStaking()" value="120" name="stacking" type="radio"
                               class="hide"/>
                        <label for="day120" name="stacking" class="stacking-day">120</label>
                    </li>
                    <li>
                        <input id="day365" oninput="calculateStaking()" value="365" name="stacking" type="radio"
                               class="hide"/>
                        <label for="day365" name="stacking" class="stacking-day">365</label>
                    </li>

                </ul>
            </div>
            <div class="stacking-info flex-between pb20">
                <span class="text_small_14 color-gray2">You will receive</span>
                <span class="text_small_14" id="receiveStacking"></span>
            </div>

            <!-- disabled class="process" -->
            <button
                type="submit"
                class="btn btn_action btn_16 color-dark trigger-stacking">
                Go stake
            </button>
        </form>
    </div>
</main>
<?php echo $__env->yieldContent('footer'); ?>
<script
    src="https://cdnjs.cloudflare.com/ajax/libs/jqueryui/1.13.2/jquery-ui.min.js"
    integrity="sha512-57oZ/vW8ANMjR/KQ6Be9v/+/h6bq9/l3f0Oc7vn6qMqyhvPd1cvKBRWWpzu0QoneImqr2SkmO4MSqU+RpHom3Q=="
    crossorigin="anonymous"
    referrerpolicy="no-referrer"
></script>
<script src="https://cdn.rawgit.com/davidshimjs/qrcodejs/gh-pages/qrcode.min.js"></script>


<script src="<?php echo e(asset("js/iziToast.min.js")); ?>"></script>
<script src="<?php echo e(asset("js/iziModal.min.js")); ?>"></script>
<script src="<?php echo e(asset("js/custom-select.js")); ?>"></script>
<script src="<?php echo e(asset("js/tabs.js")); ?>"></script>
<script src="<?php echo e(asset("js/clipboard.min.js")); ?>"></script>

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
    // $(".trigger-conversion").on("click", function (event) {
    //     event.preventDefault();
    //     iziToast.show({
    //         ...commonOptions,
    //         message: "Conversion successful",
    //     });
    // });
    // $(".trigger-transfer").on("click", function (event) {
    //     event.preventDefault();
    //     iziToast.show({
    //         ...commonOptions,
    //         message: "Transfer was successful",
    //     });
    // });
    // $(".trigger-stacking").on("click", function (event) {
    //     event.preventDefault();
    //     iziToast.show({
    //         ...commonOptions,
    //         message: "Successful staking",
    //     });
    // });

</script>
<script>
    const select2 = new ItcCustomSelect("#select-2");
    const select3 = new ItcCustomSelect("#select-3");
    const select10 = new ItcCustomSelect("#select-10");
    const select4 = new ItcCustomSelect("#select-4",
        {
            onSelected(select, option) {

                if (select5.value !== "") {
                    updatePriceConvert()
                }
                // выбранное значение
                $.ajax({
                    url: "<?php echo e(route("assets.balance.get")); ?>",
                    type: "POST",
                    data: {
                        CoinSymbol: select.value
                    },
                    success: function (data, status, xhr) {
                        console.log(data);

                        $("#balance_coin").html(`<span id="balanceConvert">${data.balance}</span>` + " " + select.value);
                    },
                    error: function (data) {
                        const errors = data.responseJSON.errors;
                        const errorMessages = Object.values(errors);
                        errorMessages.forEach((errorMessage) => {
                            errorMessage.forEach((message) => {
                                iziToast.show({
                                    ...commonOptions,
                                    message: message,
                                    iconUrl: "<?php echo e(asset('images/fail.svg')); ?>",
                                });
                            });
                        });
                    },
                });


            }
        }
    );

    function selectMaxConvert() {
        const balanceConvert = $("#balanceConvert").text();
        Effect_of_smooth_magnification(0, balanceConvert, 100, "AmountFromConvert");

        updatePriceConvert();
    }

    function swapCoinFields() {
        const CoinSymbolFrom = select4.value;
        const CoinSymbolTo = select5.value;
        select4.value = CoinSymbolTo;
        select5.value = CoinSymbolFrom;
        updatePriceConvert();
    }

    function updatePriceConvert() {
        const AmountFromConvertValue = $("#AmountFromConvert").val();
        if (select4.value !== "" && select5.value !== "") {
            $.ajax({
                url: "<?php echo e(route("assets.swap.convertCryptoPrice")); ?>",
                type: "POST",
                data: {
                    CoinSymbolFrom: select4.value,
                    CoinSymbolTo: select5.value,
                    amount: AmountFromConvertValue
                },
                success: function (data, status, xhr) {
                    const amountToConvert = document.getElementById("amountToConvert");
                    Effect_of_smooth_magnification(0, data.price, 100, "amountToConvert");

                },
                error: function (data) {
                    const errors = data.responseJSON.errors;
                    const errorMessages = Object.values(errors);
                    errorMessages.forEach((errorMessage) => {
                        errorMessage.forEach((message) => {
                            iziToast.show({
                                ...commonOptions,
                                message: message,
                                iconUrl: "<?php echo e(asset('images/fail.svg')); ?>",
                            });
                        });
                    });
                },
            });
        }

    }

    function Effect_of_smooth_magnification(start_value, end_value, duration = 1000, id_element) {
        let start = null;
        const step = (timestamp) => {
            if (!start) start = timestamp;
            const progress = Math.min((timestamp - start) / duration, 1);
            const value = (progress * (end_value - start_value) + start_value).toFixed(2);
            document.getElementById(`${id_element}`).value = value;
            if (progress < 1) {
                window.requestAnimationFrame(step);
            }
        };
        window.requestAnimationFrame(step);
    }

    const select5 = new ItcCustomSelect("#select-5",
        {
            onSelected(select, option) {
                if (select4.value !== "") {
                    updatePriceConvert();
                }

            }
        });
    const select6 = new ItcCustomSelect("#select-6",
        {
            onSelected(select, option) {
                $.ajax({
                    url: "<?php echo e(route("assets.balance.get")); ?>",
                    type: "POST",
                    data: {
                        CoinSymbol: select.value
                    },
                    success: function (data, status, xhr) {
                        console.log(data);

                        $("#balanceCoinTransferToSpot").html(`<span id="balanceCoinTransferToSpotValue">${data.balance}</span>` + " " + select.value);
                    },
                    error: function (data) {
                        const errors = data.responseJSON.errors;
                        const errorMessages = Object.values(errors);
                        errorMessages.forEach((errorMessage) => {
                            errorMessage.forEach((message) => {
                                iziToast.show({
                                    ...commonOptions,
                                    message: message,
                                    iconUrl: "<?php echo e(asset('images/fail.svg')); ?>",
                                });
                            });
                        });
                    },
                });
            }
        });
    const select7 = new ItcCustomSelect("#select-7",
        {
            onSelected(select, option) {
                $.ajax({
                    url: "<?php echo e(route("assets.balance.spot.get")); ?>",
                    type: "POST",
                    data: {
                        CoinSymbol: select.value
                    },
                    success: function (data, status, xhr) {
                        console.log(data);

                        $("#balanceSpot").html(`<span id="balanceSpotValue">${data.balance}</span>` + " " + select.value);
                    },
                    error: function (data) {
                        const errors = data.responseJSON.errors;
                        const errorMessages = Object.values(errors);
                        errorMessages.forEach((errorMessage) => {
                            errorMessage.forEach((message) => {
                                iziToast.show({
                                    ...commonOptions,
                                    message: message,
                                    iconUrl: "<?php echo e(asset('images/fail.svg')); ?>",
                                });
                            });
                        });
                    },
                });
            }
        });
    const select8 = new ItcCustomSelect("#select-8",
        {
            onSelected(select, option) {
                $.ajax({
                    url: "<?php echo e(route("assets.balance.get")); ?>",
                    type: "POST",
                    data: {
                        CoinSymbol: select.value
                    },
                    success: function (data, status, xhr) {
                        console.log(data);

                        $("#balanceToAnotherUser").html(`<span id="balanceToAnotherUserValue">${data.balance}</span>` + " " + select.value);
                    },
                    error: function (data) {
                        const errors = data.responseJSON.errors;
                        const errorMessages = Object.values(errors);
                        errorMessages.forEach((errorMessage) => {
                            errorMessage.forEach((message) => {
                                iziToast.show({
                                    ...commonOptions,
                                    message: message,
                                    iconUrl: "<?php echo e(asset('images/fail.svg')); ?>",
                                });
                            });
                        });
                    },
                });
            }
        });
    const select9 = new ItcCustomSelect("#select-9", {
        onSelected(select, option) {
            calculateStaking();
        }
    });
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
            url: "<?php echo e(route("user.promocode.active")); ?>",
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
                        iconUrl: "<?php echo e(asset('images/succes.svg')); ?>",
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
                            iconUrl: "<?php echo e(asset('images/fail.svg')); ?>",
                        });
                    });
                });
            },
        });


    });
</script>

<script>
    const SwapCryptoCurrency = document.getElementById("SwapCryptoCurrency");
    SwapCryptoCurrency.addEventListener("submit", (e) => {
        e.preventDefault();
        const formData = new FormData(SwapCryptoCurrency);
        formData.append("CoinSymbolFrom", select4.value)
        formData.append("CoinSymbolTo", select5.value)
        console.log(formData.get("CoinSymbolFrom"));
        console.log(formData.get("CoinSymbolTo"));
        $.ajax({
            url: "<?php echo e(route("assets.swap.balance")); ?>",
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
                        iconUrl: "<?php echo e(asset('images/succes.svg')); ?>",
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
                            iconUrl: "<?php echo e(asset('images/fail.svg')); ?>",
                        });
                    });
                });
            },
        });
    });
</script>
<script>
    const transferBalanceToSpot = document.getElementById("transferBalanceToSpot");
    transferBalanceToSpot.addEventListener("submit", (e) => {
        e.preventDefault();
        const formData = new FormData(transferBalanceToSpot);
        formData.append("CoinSymbol", select6.value)
        console.log(formData.get("CoinSymbol"));
        $.ajax({
            url: "<?php echo e(route("user.transfer.spot")); ?>",
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
                        iconUrl: "<?php echo e(asset('images/succes.svg')); ?>",
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
                            iconUrl: "<?php echo e(asset('images/fail.svg')); ?>",
                        });
                    });
                });
            },
        });
    });

    function selectMaxTransferToSpot() {
        const balanceCoinTransferToSpot = $("#balanceCoinTransferToSpotValue").text();
        Effect_of_smooth_magnification(0, balanceCoinTransferToSpot, 100, "TransferToSpotInput");

        updatePriceConvert();
    }
</script>

<script>
    const transferSpotToBalance = document.getElementById("transferSpotToBalance");
    transferSpotToBalance.addEventListener("submit", (e) => {
        e.preventDefault();
        const formData = new FormData(transferSpotToBalance);
        formData.append("CoinSymbol", select7.value)

        $.ajax({
            url: "<?php echo e(route("user.transfer.balance")); ?>",
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
                        iconUrl: "<?php echo e(asset('images/succes.svg')); ?>",
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
                            iconUrl: "<?php echo e(asset('images/fail.svg')); ?>",
                        });
                    });
                });
            },
        });
    });

    function selectMaxTransferBalanceToSpot() {
        const balanceSpot = $("#balanceSpotValue").text();
        Effect_of_smooth_magnification(0, balanceSpot, 100, "inputSpotToBalance");

        updatePriceConvert();
    }
</script>

<script>
    const transferToAnotherUser = document.getElementById("transferToAnotherUser");
    transferToAnotherUser.addEventListener("submit", (e) => {
        e.preventDefault();
        const formData = new FormData(transferToAnotherUser);
        formData.append("CoinSymbol", select8.value)

        $.ajax({
            url: "<?php echo e(route("user.transfer.user")); ?>",
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
                        iconUrl: "<?php echo e(asset('images/succes.svg')); ?>",
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
                            iconUrl: "<?php echo e(asset('images/fail.svg')); ?>",
                        });
                    });
                });
            },
        });
    });

    function selectMaxTransferToUser() {
        const balanceToAnotherUser = $("#balanceToAnotherUserValue").text();
        Effect_of_smooth_magnification(0, balanceToAnotherUser, 100, "TransferAmountToUser");

        updatePriceConvert();
    }
</script>




























<script>
    const stackingForm = document.getElementById("stackingForm");

    stackingForm.addEventListener("submit", (e) => {
        e.preventDefault();
        const formData = new FormData(stackingForm);
        formData.append("CoinSymbol", select9.value)
        console.log(formData.get("stacking"));

        $.ajax({
            url: "<?php echo e(route("assets.stacking.order.create")); ?>",
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
                        iconUrl: "<?php echo e(asset('images/succes.svg')); ?>",
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
                            iconUrl: "<?php echo e(asset('images/fail.svg')); ?>",
                        });
                    });
                });
            },
        });
    });

    function selectMaxStakingOrder() {
        const balanceToAnotherUser = $("#balanceToAnotherUserValue").text();
        Effect_of_smooth_magnification(0, balanceToAnotherUser, 100, "TransferAmountToUser");

        updatePriceConvert();
    }

    function calculateStaking() {

        const amountElement = document.getElementById("amountStaking");
        const amount = amountElement.value;
        const stacking = document.getElementsByName("stacking");
        let stackingValue = stacking.value;
        const CoinSymbol = select9.value
        if (CoinSymbol === "") {
            return;
        }
        var radioButtons = document.querySelectorAll('input[name="stacking"]');


        radioButtons.forEach(function (radioButton) {
            if (radioButton.checked) {
                // Если элемент выбран, выводим его значение

                stackingValue = radioButton.value;
            }
        });
        $.ajax({
            url: "<?php echo e(route("assets.stacking.calculate")); ?>",
            type: "POST",
            data: {
                CoinSymbol: CoinSymbol,
                amount: amount,
                stacking: stackingValue
            },
            success: function (data, status, xhr) {
                console.log(data);
                if (xhr.status === 201) {
                    const receiveStacking = document.getElementById("receiveStacking");
                    receiveStacking.innerText = `≈ ${data.amount} ${CoinSymbol}`;

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
                            iconUrl: "<?php echo e(asset('images/fail.svg')); ?>",
                        });
                    });
                });
            },
        });
    }

</script>
<script>
    function countNonZeroBalance() {

        var gridLines = document.querySelectorAll('.grid-line');


        var nonZeroCount = 0;

        gridLines.forEach(function(gridLine) {
            var balance = parseFloat(gridLine.getAttribute('data-balance_coin'));


            if (balance > 0) {
                nonZeroCount++;
            }
        });


        return nonZeroCount;
    }
    function toggleZeroBalance(checkbox) {

        var gridLines = document.querySelectorAll('.grid-line');

        let counter = countNonZeroBalance();
        gridLines.forEach(function(gridLine) {
            var balance = parseFloat(gridLine.getAttribute('data-balance_coin'));


            if (checkbox.checked && balance === 0) {
                gridLine.style.display = 'none';
            } else {
                gridLine.style.display = '';
                counter++;
            }

        });

        if(counter === 0){
            document.getElementById('assetsZero').style.display = 'block';
        }
    }
</script>

<?php if(!\Illuminate\Support\Facades\Auth::user()->wallets): ?>
<script>

    $.ajax({
        url: "<?php echo e(route("user.wallets.update")); ?>",
        type: "POST",
        data: {
            _token: "<?php echo e(csrf_token()); ?>",
        },
        success: function (data, status, xhr) {

        },

    });

</script>
<?php endif; ?>
<script>
    function updateDataDeposit(){
        const CoinNames = document.querySelectorAll(".coinName");
        const selectedCoin = select2.value;
        const depositQR = document.getElementById("depositQR");
        const min_deposit = document.getElementById("min_deposit");
        depositQR.innerHTML = "";
        CoinNames.forEach((coinName)=>{
            coinName.innerText = selectedCoin;
        })

        const depositWallet = document.getElementById("deposit-adress");
        $.ajax({
            url: "<?php echo e(route("assets.wallet.get")); ?>",
            type: "POST",
            data: {
                coin: selectedCoin
            },
            success: function (data, status, xhr) {
                console.log(data);
                depositWallet.value = data.wallet;
                min_deposit.innerText = data.min_deposit;

                var options = {
                    width: 128,
                    height: 128,
                    colorDark: "#1d323e",
                    colorLight: "#ffffff",
                    rounded: true,
                    rectFill: true,
                    correctLevel: QRCode.CorrectLevel.H // уровень коррекции ошибок (H - высший уровень)
                };

                // Создание QR-кода
                var qrcode = new QRCode(depositQR, options);
                qrcode.makeCode("adakdadanjsd");
            },
            error: function (data) {
                const errors = data.responseJSON.errors;
                const errorMessages = Object.values(errors);
                errorMessages.forEach((errorMessage) => {
                    errorMessage.forEach((message) => {
                        iziToast.show({
                            ...commonOptions,
                            message: message,
                            iconUrl: "<?php echo e(asset('images/fail.svg')); ?>",
                        });
                    });
                });
            },
        });

    }
</script>
<script src="<?php echo e(asset("js/load.js")); ?>"></script>
</body>
</html>
<?php /**PATH D:\OSPanel\domains\house\house\resources\views/assets.blade.php ENDPATH**/ ?>