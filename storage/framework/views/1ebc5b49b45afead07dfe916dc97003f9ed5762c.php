<?php echo $__env->make('layouts.head', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?>
<?php echo $__env->make('layouts.header', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?>
<?php echo $__env->make('layouts.footer', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?>
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
<body>
<?php echo $__env->yieldContent("header"); ?>
<main class="landing">
    <section class="main">
        <div class="container">
            <div class="main-content">
                <div class="main-content_text">
                    <h1 class="h1_70 mb40">
                        Discover new opportunities in the world of crypto trading
                    </h1>
                    <p class="text_descriptor mb50">
                        The world’s most trusted and most secure platform to buy, sell
                        and manage crypto
                    </p>
                    <a href="<?php echo e(route('assets')); ?>" class="btn btn_start btn_18">Start trading</a>
                </div>
            </div>
        </div>
    </section>
    <section class="details">
        <div class="container">
            <div class="details-content">
                <div class="card">
                    <img
                        class="card-icon"
                        src="<?php echo e(asset('images/card-icon_1.svg')); ?>"
                        alt=""
                    />
                    <p class="text_18">
                        150+ countries of the world trust and trade with us.
                    </p>
                </div>
                <div class="card">
                    <img
                        class="card-icon"
                        src="<?php echo e(asset('images/card-icon_2.svg')); ?>"
                        alt=""
                    />
                    <p class="text_18">
                        Fast transactions, minimal commission, easy and intuitive
                        functionality
                    </p>
                </div>
                <div class="card">
                    <img
                        class="card-icon"
                        src="<?php echo e(asset('images/card-icon_3.svg')); ?>"
                        alt=""
                    />
                    <p class="text_18">
                        Secure Asset Fund for users with a capital of more than $400
                        million
                    </p>
                </div>
                <div class="card">
                    <img
                        class="card-icon"
                        src="<?php echo e(asset('images/card-icon_4.svg')); ?>"
                        alt=""
                    />
                    <p class="text_18">Quarterly trading volume is $137 billion</p>
                </div>
            </div>
        </div>
    </section>
    <section class="trending">
        <div class="container">
            <div class="trending-content">
                <h2 class="h2_40 mb30">Trending assets</h2>
                <div class="assets-grid">
                    <div class="grid-head">
                        <div>Assets</div>
                        <div>Last trade</div>
                        <div>24h change %</div>
                        <div>24h chart</div>
                        <div></div>
                    </div>
                    <div class="grid-line">
                        <div class="line-item asset">
                            <img
                                src="<?php echo e(asset('images/trending_asset/btc-usdt.svg')); ?>"
                                alt="bitcoin and usdt picture"
                            />
                            <span class="text_18"
                            >BTC<b class="color-dark">/USDT</b></span
                            >
                        </div>
                        <div class="line-item last">
                            <span class="text_18">$<?php echo e($coins_prices['BTC']['price']); ?></span>
                        </div>
                        <div class="line-item change">
                            <span class="text_18 color-green"><?php echo e($coins_prices['BTC']['percent']); ?>%</span>
                        </div>
                        <div class="line-item chart">
                            <img
                                src="<?php echo e(asset('images/trending_asset/Chart.svg')); ?>"
                                alt="Chart"
                            />
                        </div>
                        <div class="line-item gotrade">
                            <a href="<?php echo e(route("trade:pair", "BTC_USDT")); ?>" class="small_btn_trade assets-btn btn_16"
                            >Trade now</a
                            >
                        </div>
                    </div>
                    <div class="grid-line">
                        <div class="line-item asset">
                            <img
                                src="<?php echo e(asset('images/trending_asset/eth-usdt.svg')); ?>"
                                alt="ethereum and usdt picture"
                            />
                            <span class="text_18"
                            >ETH<b class="color-dark">/USDT</b></span
                            >
                        </div>
                        <div class="line-item last">
                            <span class="text_18">$<?php echo e($coins_prices['ETH']['price']); ?></span>
                        </div>
                        <div class="line-item change">
                            <span class="text_18"><?php echo e($coins_prices['ETH']['percent']); ?>%</span>
                        </div>
                        <div class="line-item chart">
                            <img
                                src="<?php echo e(asset('images/trending_asset/Chart.svg')); ?>"
                                alt="Chart"
                            />
                        </div>
                        <div class="line-item gotrade">
                            <a href="<?php echo e(route("trade:pair", "ETH_USDT")); ?>" class="small_btn_trade assets-btn btn_16"
                            >Trade now</a
                            >
                        </div>
                    </div>
                    <div class="grid-line">
                        <div class="line-item asset">
                            <img
                                src="<?php echo e(asset('images/trending_asset/bch-usdt.svg')); ?>"
                                alt="Bitcoin Cash and usdt picture"
                            />
                            <span class="text_18"
                            >BCH<b class="color-dark">/USDT</b></span
                            >
                        </div>
                        <div class="line-item last">
                            <span class="text_18">$<?php echo e($coins_prices['BCH']['price']); ?></span>
                        </div>
                        <div class="line-item change">
                            <span class="text_18 "><?php echo e($coins_prices['BCH']['percent']); ?>%</span>
                        </div>
                        <div class="line-item chart">
                            <img
                                src="<?php echo e(asset('images/trending_asset/Chart.svg')); ?>"
                                alt="Chart"
                            />
                        </div>
                        <div class="line-item gotrade">
                            <a href="<?php echo e(route("trade:pair", "BCH_USDT")); ?>" class="small_btn_trade assets-btn btn_16"
                            >Trade now</a
                            >
                        </div>
                    </div>
                    <div class="grid-line">
                        <div class="line-item asset">
                            <img
                                src="<?php echo e(asset('images/trending_asset/ltc-usdt.svg')); ?>"
                                alt="lite coin and usdt picture"
                            />
                            <span class="text_18"
                            >LTC<b class="color-dark">/USDT</b></span
                            >
                        </div>
                        <div class="line-item last">
                            <span class="text_18">$<?php echo e($coins_prices['LTC']['price']); ?></span>
                        </div>
                        <div class="line-item change">
                            <span class="text_18 "><?php echo e($coins_prices['LTC']['percent']); ?>%</span>
                        </div>
                        <div class="line-item chart">
                            <img
                                src="<?php echo e(asset('images/trending_asset/Chart.svg')); ?>"
                                alt="Chart"
                            />
                        </div>
                        <div class="line-item gotrade">
                            <a href="<?php echo e(route("trade:pair", "LTC_USDT")); ?>" class="small_btn_trade assets-btn btn_16"
                            >Trade now</a
                            >
                        </div>
                    </div>
                    <div class="grid-line">
                        <div class="line-item asset">
                            <img
                                src="<?php echo e(asset('images/trending_asset/ada-usdt.svg')); ?>"
                                alt="ada and usdt picture"
                            />
                            <span class="text_18"
                            >ADA<b class="color-dark">/USDT</b></span
                            >
                        </div>
                        <div class="line-item last">
                            <span class="text_18">$<?php echo e($coins_prices['ADA']['price']); ?></span>
                        </div>
                        <div class="line-item change">
                            <span class="text_18 "><?php echo e($coins_prices['ADA']['percent']); ?>%</span>
                        </div>
                        <div class="line-item chart">
                            <img
                                src="<?php echo e(asset('images/trending_asset/Chart.svg')); ?>"
                                alt="Chart"
                            />
                        </div>
                        <div class="line-item gotrade">
                            <a href="<?php echo e(route("trade:pair", "ADA_USDT")); ?>" class="small_btn_trade assets-btn btn_16"
                            >Trade now</a
                            >
                        </div>
                    </div>
                    <div class="grid-line">
                        <div class="line-item asset">
                            <img
                                src="<?php echo e(asset('images/trending_asset/dash-usdt.svg')); ?>"
                                alt="DASH and usdt picture"
                            />
                            <span class="text_18"
                            >DASH<b class="color-dark">/USDT</b></span
                            >
                        </div>
                        <div class="line-item last">
                            <span class="text_18">$<?php echo e($coins_prices['DASH']['price']); ?></span>
                        </div>
                        <div class="line-item change">
                            <span class="text_18 "><?php echo e($coins_prices['DASH']['percent']); ?>%</span>
                        </div>
                        <div class="line-item chart">
                            <img
                                src="<?php echo e(asset('images/trending_asset/Chart.svg')); ?>"
                                alt="Chart"
                            />
                        </div>
                        <div class="line-item gotrade">
                            <a href="<?php echo e(route("trade:pair", "DASH_USDT")); ?>" class="small_btn_trade assets-btn btn_16"
                            >Trade now</a
                            >
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </section>
    <section class="earn">
        <div class="container">
            <div class="earn-content">
                <div class="row">
                    <div class="earn-text mb30">
                        <h2 class="h2_40">Earn crypto rewards</h2>
                        <p class="text_18 _120">
                            Earn up to 20% in rewards annually by staking your assets, it
                            only takes a few clicks to stake
                        </p>
                    </div>
                    <div class="earn-buttons">
                        <span class="text_18">11 assets for staking</span>
                        <span class="text_18">$80M+ in reward searned by clients</span>
                        <span class="text_18">Up to 20% in yearly rewards</span>
                        <a href="<?php echo e(route("assets")); ?>" class="btn btn_start_2 btn_18">Start earning</a>
                    </div>
                    <img class="earn-image" src="<?php echo e(asset("images/earn.svg")); ?>" alt="" />
                </div>
            </div>
        </div>
    </section>
    <section class="trade-preview">
        <div class="container">
            <div class="trade-preview-content">
                <div class="trade-preview-text">
                    <h2 class="h2_40 text_center">
                        Trade freely from anywhere in the world
                    </h2>
                    <p class="text_18 _110 text_center">
                        <?php echo e($Domain ? $Domain['title'] :  "CRYPTOHOUSE"); ?> makes it easy to get started. Sign up today to buy
                        and sell 100+ cryptocurrencies
                    </p>
                    <div class="pathway">
                        <span class="text_18 _110" datanumber="1">Register</span>
                        <span class="text_18 _110" datanumber="2">Top up balance</span>
                        <span class="text_18 _110" datanumber="3">Use promocode</span>
                        <span class="text_18 _110" datanumber="4">Start trading</span>
                        <span class="text_18 _110" datanumber="5">Earn</span>
                    </div>
                </div>
                <div class="trade-preview-image">
                    <a class="btn btn_start btn_18" href="<?php echo e(route("assets")); ?>">Get started</a>
                    <img
                        class="trade-preview_img"
                        src="<?php echo e(asset("images/trade-preview_img.png")); ?>"
                        alt=""
                    />
                </div>
            </div>
        </div>
    </section>
    <div class="sponsors">
        <img
            class="sponsor_img"
            src="<?php echo e(asset("images/sponsors/techinasia.svg")); ?>"
            alt="TECHINASIA"
        />
        <img
            class="sponsor_img"
            src="<?php echo e(asset("images/sponsors/the-economic-times.svg")); ?>"
            alt="THE ECONOMIC TIMES"
        />
        <img
            class="sponsor_img"
            src="<?php echo e(asset("images/sponsors/coin-edition.svg")); ?>"
            alt="COIN EDITION"
        />
        <img
            class="sponsor_img"
            src="<?php echo e(asset("images/sponsors/cointelegraph.svg")); ?>"
            alt="COINTELEGRAPH"
        />
        <img
            class="sponsor_img"
            src="<?php echo e(asset("images/sponsors/crypto-daily.svg")); ?>"
            alt="CryptoDaily"
        />
        <img
            class="sponsor_img"
            src="<?php echo e(asset("images/sponsors/coindesk.svg")); ?>"
            alt="coindesk"
        />
        <img
            class="sponsor_img"
            src="<?php echo e(asset("images/sponsors/japan-cryptoclub.svg")); ?>"
            alt="JAPAN CRYPTOCLUB"
        />
        <img
            class="sponsor_img"
            src="<?php echo e(asset("images/sponsors/finance-magnates.svg")); ?>"
            alt="FINANCE MAGNATES"
        />
        <img
            class="sponsor_img"
            src="<?php echo e(asset("images/sponsors/bitcoin.svg")); ?>"
            alt="BITCOIN.COM"
        />
        <img
            class="sponsor_img"
            src="<?php echo e(asset("images/sponsors/investing.svg")); ?>"
            alt="INVESTING.COM"
        />
        <img
            class="sponsor_img"
            src="<?php echo e(asset("images/sponsors/business-insider.svg")); ?>"
            alt="BUSINESS INSIDER"
        />
    </div>
</main>
<?php echo $__env->yieldContent("footer"); ?>

<script src="<?php echo e(asset("js/landing.js")); ?>"></script>
<script src="<?php echo e(asset("js/load.js")); ?>"></script>
<script>
    document.addEventListener('DOMContentLoaded', function () {
        var elements = document.querySelectorAll('.change');

        elements.forEach(function (element) {
            var span = element.querySelector('span');

            if (span) {
                var percentage = parseFloat(span.textContent);

                if (!isNaN(percentage)) {
                    if (percentage < 0) {
                        const content = span.innerText;
                        span.innerHTML = " - " + content;
                        span.classList.add('color-red');
                    } else if (percentage > 0) {
                        const content = span.innerText;
                        span.innerHTML = " + " + content;
                        span.classList.add('color-green');
                    }
                }
            }
        });
    });
</script>
</body>
</html>
<?php /**PATH /Users/nikita/PhpstormProjects/house/resources/views/main.blade.php ENDPATH**/ ?>