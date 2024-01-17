<?php echo $__env->make('layouts.head', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?>
<?php echo $__env->make('layouts.header', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?>
<?php echo $__env->make('layouts.footer', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?>
<!doctype html>
<html lang="en">

<head>
    <link rel="stylesheet" href="<?php echo e(asset('css/custom-select.css')); ?>" />
    <link rel="stylesheet" href="<?php echo e(asset('css/iziToast.css')); ?>" />
    <link rel="stylesheet" href="<?php echo e(asset('css/iziModal.min.css')); ?>" />
    <?php echo $__env->yieldContent('head'); ?>

<body>
    <?php echo $__env->yieldContent('header'); ?>'
    <style>
        .tradingview-widget-container iframe {
            border-radius: 10px;

        }

        .grid-line {
            opacity: 0;
            transform: translateY(-20px);
            transition: opacity 0.5s ease, transform 0.5s ease;
        }

        .grid-line.active {
            opacity: 1;
            transform: translateY(0);
        }

        .grid-line.create {
            opacity: 1;
            transform: translateY(0);
        }
    </style>
    <main class="trade h100">
        <section class="trade">
            <div class="container trade-container">
                <div class="trade-content">
                    <div class="trade-left">
                        <div class="pair-head">
                            <div class="left">
                                <div class="itc-select" id="select-1">

                                </div>
                                <div class="pair-price">
                                    <span class="title text_small_14 color-gray2">Price</span>
                                    <span class="text_17 color-green transition_trade" id="valueInfo_price">
                                        <span class="loader"></span>
                                    </span>
                                </div>
                            </div>
                            <div class="right">
                                <div class="pair-info">
                                    <div class="pair-change">
                                        <span class="title text_small_14 color-gray2">24h change</span>
                                        <span class="text_17 color-green transition_trade" id="valueInfo_change">
                                            <span class="loader"></span>
                                        </span>
                                    </div>
                                    <div class="pair-high">
                                        <span class="title text_small_14 color-gray2">24h high</span>
                                        <span class="text_17 color-black transition_trade" id="valueInfo_high">
                                            <span class="loader"></span>
                                        </span>
                                    </div>
                                    <div class="pair-low">
                                        <span class="title text_small_14 color-gray2">24h low</span>
                                        <span class="text_17 color-black transition_trade" id="valueInfo_low"><span
                                                class="loader"></span></span>
                                    </div>
                                    <div class="pair-volume">
                                        <span class="title text_small_14 color-gray2">24h volume (BTC)</span>
                                        <span class="text_17 color-black transition_trade" id="valueInfo_volume"><span
                                                class="loader"></span></span>
                                    </div>
                                </div>
                            </div>
                        </div>
                        <div class="chart-wrapper">
                            <!-- TradingView Widget BEGIN -->
                            <div class="tradingview-widget-container"
                                style="height:100%;width:100%; border-radius: 10px">
                                <div class="tradingview-widget-container__widget" style="height:100%;width:100%; ">
                                </div>

                                <script type="text/javascript" src="https://s3.tradingview.com/external-embedding/embed-widget-advanced-chart.js" async>
                                    {
                                        "autosize": true,
                                        "symbol": "<?php echo e(str_replace('_', '', $pair)); ?>",
                                        "interval": "D",
                                        "timezone": "Etc/UTC",
                                        "theme": "dark",
                                        "style": "1",
                                        "locale": "en",
                                        "enable_publishing": false,
                                        "allow_symbol_change": true,
                                        "support_host": "https://www.tradingview.com"
                                    }
                                </script>

                            </div>
                            <!-- TradingView Widget END -->
                        </div>
                        <div class="trade-history">
                            <div class="tabs tabs-1">
                                <div class="tabs__header tabs__header-1">
                                    <div class="tabs__header-item tabs__header-item-1 active">
                                        Open orders
                                    </div>
                                    <div class="tabs__header-item tabs__header-item-1">
                                        Trade history
                                    </div>
                                </div>
                                <div class="tabs__content tabs__content-1">
                                    <div class="tabs__content-item tabs__content-item-1 openOrders">
                                        <div class="grid-head">
                                            <div>Date, time</div>
                                            <div>Pair</div>
                                            <div>Type</div>
                                            <div>Side</div>
                                            <div>Price</div>
                                            <div>Quantity (BTC)</div>
                                            <div>Total (USDT)</div>
                                            <div>Cancel</div>
                                        </div>
                                        <div class="overflow" id="openOrders">

                                            <div class="grid-line ">
                                                <div>05/21/23, 13:43:57</div>
                                                <div>BTC/USDT</div>
                                                <div>Limit</div>
                                                <div>Buy</div>
                                                <div>26,481.13</div>
                                                <div>0.685630</div>
                                                <div>18,156.16</div>

                                            </div>
                                            <div class="grid-line">
                                                <div>05/21/23, 13:43:57</div>
                                                <div>BTC/USDT</div>
                                                <div>Limit</div>
                                                <div>Buy</div>
                                                <div>26,481.13</div>
                                                <div>0.685630</div>
                                                <div>18,156.16</div>
                                                <div>
                                                    <button class="clear cancel-btn">
                                                        <img src="<?php echo e(asset('images/cancel-icon.svg')); ?>"
                                                            alt="x" />
                                                    </button>
                                                </div>
                                            </div>
                                            <div class="grid-line">
                                                <div>05/21/23, 13:43:57</div>
                                                <div>BTC/USDT</div>
                                                <div>Limit</div>
                                                <div>Buy</div>
                                                <div>26,481.13</div>
                                                <div>0.685630</div>
                                                <div>200,6808624</div>
                                                <div>
                                                    <button class="clear cancel-btn">
                                                        <img src="<?php echo e(asset('images/cancel-icon.svg')); ?>"
                                                            alt="x" />
                                                    </button>
                                                </div>
                                            </div>
                                            <div class="grid-line">
                                                <div>05/21/23, 13:43:57</div>
                                                <div>BTC/USDT</div>
                                                <div>Limit</div>
                                                <div>Buy</div>
                                                <div>26,481.13</div>
                                                <div>0.685630</div>
                                                <div>200,6808624</div>
                                                <div>
                                                    <button class="clear cancel-btn">
                                                        <img src="<?php echo e(asset('images/cancel-icon.svg')); ?>"
                                                            alt="x" />
                                                    </button>
                                                </div>
                                            </div>
                                            <div class="grid-line">
                                                <div>05/21/23, 13:43:57</div>
                                                <div>BTC/USDT</div>
                                                <div>Limit</div>
                                                <div>Buy</div>
                                                <div>26,481.13</div>
                                                <div>0.685630</div>
                                                <div>200,6808624</div>
                                                <div>
                                                    <button class="clear cancel-btn">
                                                        <img src="<?php echo e(asset('images/cancel-icon.svg')); ?>"
                                                            alt="x" />
                                                    </button>
                                                </div>
                                            </div>
                                            <div class="grid-line">
                                                <div>05/21/23, 13:43:57</div>
                                                <div>BTC/USDT</div>
                                                <div>Limit</div>
                                                <div>Buy</div>
                                                <div>26,481.13</div>
                                                <div>0.685630</div>
                                                <div>200,6808624</div>
                                                <div>
                                                    <button class="clear cancel-btn">
                                                        <img src="<?php echo e(asset('images/cancel-icon.svg')); ?>"
                                                            alt="x" />
                                                    </button>
                                                </div>
                                            </div>
                                            <div class="grid-line">
                                                <div>05/21/23, 13:43:57</div>
                                                <div>BTC/USDT</div>
                                                <div>Limit</div>
                                                <div>Buy</div>
                                                <div>26,481.13</div>
                                                <div>0.685630</div>
                                                <div>200,6808624</div>
                                                <div>
                                                    <button class="clear cancel-btn">
                                                        <img src="<?php echo e(asset('images/cancel-icon.svg')); ?>"
                                                            alt="x" />
                                                    </button>
                                                </div>
                                            </div>
                                            <div class="grid-line">
                                                <div>05/21/23, 13:43:57</div>
                                                <div>BTC/USDT</div>
                                                <div>Limit</div>
                                                <div>Buy</div>
                                                <div>26,481.13</div>
                                                <div>0.685630</div>
                                                <div>200,6808624</div>
                                                <div>
                                                    <button class="clear cancel-btn">
                                                        <img src="<?php echo e(asset('images/cancel-icon.svg')); ?>"
                                                            alt="x" />
                                                    </button>
                                                </div>
                                            </div>
                                            <div class="grid-line">
                                                <div>05/21/23, 13:43:57</div>
                                                <div>BTC/USDT</div>
                                                <div>Limit</div>
                                                <div>Buy</div>
                                                <div>26,481.13</div>
                                                <div>0.685630</div>
                                                <div>200,6808624</div>
                                                <div>
                                                    <button class="clear cancel-btn">
                                                        <img src="<?php echo e(asset('images/cancel-icon.svg')); ?>"
                                                            alt="x" />
                                                    </button>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                    <div class="tabs__content-item tabs__content-item-1">
                                        <div class="grid-head">
                                            <div>Date, time</div>
                                            <div>Pair</div>
                                            <div>Type</div>
                                            <div>Side</div>
                                            <div>Price</div>
                                            <div>Quantity (BTC)</div>
                                            <div>Total (USDT)</div>
                                            <div>Status</div>
                                        </div>
                                        <div class="overflow" id="closedOrders">
                                            <div class="grid-line">
                                                <div>05/21/23, 13:43:57</div>
                                                <div>BTC/USDT</div>
                                                <div>Limit</div>
                                                <div>Buy</div>
                                                <div>26,481.13</div>
                                                <div>0.685630</div>
                                                <div>18,156.16</div>
                                                <div>Completed</div>
                                            </div>
                                            <div class="grid-line">
                                                <div>05/21/23, 13:43:57</div>
                                                <div>BTC/USDT</div>
                                                <div>Limit</div>
                                                <div>Buy</div>
                                                <div>26,481.13</div>
                                                <div>0.685630</div>
                                                <div>18,156.16</div>
                                                <div>Closed</div>
                                            </div>
                                            <div class="grid-line">
                                                <div>05/21/23, 13:43:57</div>
                                                <div>BTC/USDT</div>
                                                <div>Limit</div>
                                                <div>Buy</div>
                                                <div>26,481.13</div>
                                                <div>0.685630</div>
                                                <div>200,6808624</div>
                                                <div>Closed</div>
                                            </div>
                                            <div class="grid-line">
                                                <div>05/21/23, 13:43:57</div>
                                                <div>BTC/USDT</div>
                                                <div>Limit</div>
                                                <div>Buy</div>
                                                <div>26,481.13</div>
                                                <div>0.685630</div>
                                                <div>200,6808624</div>
                                                <div>Closed</div>
                                            </div>
                                            <div class="grid-line">
                                                <div>05/21/23, 13:43:57</div>
                                                <div>BTC/USDT</div>
                                                <div>Limit</div>
                                                <div>Buy</div>
                                                <div>26,481.13</div>
                                                <div>0.685630</div>
                                                <div>200,6808624</div>
                                                <div>Closed</div>
                                            </div>
                                            <div class="grid-line">
                                                <div>05/21/23, 13:43:57</div>
                                                <div>BTC/USDT</div>
                                                <div>Limit</div>
                                                <div>Buy</div>
                                                <div>26,481.13</div>
                                                <div>0.685630</div>
                                                <div>200,6808624</div>
                                                <div>Closed</div>
                                            </div>
                                            <div class="grid-line">
                                                <div>05/21/23, 13:43:57</div>
                                                <div>BTC/USDT</div>
                                                <div>Limit</div>
                                                <div>Buy</div>
                                                <div>26,481.13</div>
                                                <div>0.685630</div>
                                                <div>200,6808624</div>
                                                <div>Closed</div>
                                            </div>
                                            <div class="grid-line">
                                                <div>05/21/23, 13:43:57</div>
                                                <div>BTC/USDT</div>
                                                <div>Limit</div>
                                                <div>Buy</div>
                                                <div>26,481.13</div>
                                                <div>0.685630</div>
                                                <div>200,6808624</div>
                                                <div>Closed</div>
                                            </div>
                                            <div class="grid-line">
                                                <div>05/21/23, 13:43:57</div>
                                                <div>BTC/USDT</div>
                                                <div>Limit</div>
                                                <div>Buy</div>
                                                <div>26,481.13</div>
                                                <div>0.685630</div>
                                                <div>200,6808624</div>
                                                <div>Closed</div>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="trade-right">
                        <div class="trade-table">
                            <div class="tabs tabs-2">
                                <div class="tabs__header tabs__header-2">
                                    <div class="tabs__header-item tabs__header-item-2 active">
                                        Recent trades
                                    </div>
                                    <div class="tabs__header-item tabs__header-item-2">
                                        Order book
                                    </div>
                                </div>
                                <div class="tabs__content tabs__content-2">
                                    <div class="tabs__content-item tabs__content-item-2">
                                        <div class="grid-head">
                                            <div>Price (USDT)</div>
                                            <div>Quantity (BTC)</div>
                                            <div>Time</div>
                                        </div>
                                        <div id="recentTrade">

                                        </div>
                                    </div>
                                    <div class="tabs__content-item tabs__content-item-2 orderBook">
                                        <div class="grid-head">
                                            <div>Price (USDT)</div>
                                            <div>Quantity (BTC)</div>
                                            <div>Total (USDT)</div>
                                        </div>
                                        <div id="OrderBookBuy">



                                            <div class="grid-line green create">
                                                <div class="bg" style="width: 80%"></div>
                                                <div class="color-green2">31,113.04</div>
                                                <div class="color-white">0.229460</div>
                                                <div class="color-gray2">15:23:57</div>
                                            </div>
                                            <div class="grid-line green create">
                                                <div class="bg" style="width: 80%"></div>
                                                <div class="color-green2">31,113.04</div>
                                                <div class="color-white">0.229460</div>
                                                <div class="color-gray2">15:23:57</div>
                                            </div>
                                            <div class="grid-line green create">
                                                <div class="bg" style="width: 80%"></div>
                                                <div class="color-green2">31,113.04</div>
                                                <div class="color-white">0.229460</div>
                                                <div class="color-gray2">15:23:57</div>
                                            </div>
                                            <div class="grid-line green create">
                                                <div class="bg" style="width: 80%"></div>
                                                <div class="color-green2">31,113.04</div>
                                                <div class="color-white">0.229460</div>
                                                <div class="color-gray2">15:23:57</div>
                                            </div>
                                            <div class="grid-line gree create">
                                                <div class="bg" style="width: 80%"></div>
                                                <div class="color-green2">31,113.04</div>
                                                <div class="color-white">0.229460</div>
                                                <div class="color-gray2">15:23:57</div>
                                            </div>
                                        </div>
                                        <div class="grid-separator">
                                            <span class="text_17 color-green flex-center" id="valueInfo_price1">


                                            </span>

                                        </div>
                                        <div id="OrderBookSell">
                                            <div class="grid-line create red">
                                             
                                            </div>
                                            <div class="grid-line red">
                                                <div class="bg" style="width: 80%"></div>
                                                <div class="color-red">31,113.04</div>
                                                <div class="color-white">0.229460</div>
                                                <div class="color-gray2">15:23:57</div>
                                            </div>
                                            <div class="grid-line red">
                                                <div class="bg" style="width: 80%"></div>
                                                <div class="color-red">31,113.04</div>
                                                <div class="color-white">0.229460</div>
                                                <div class="color-gray2">15:23:57</div>
                                            </div>
                                            <div class="grid-line red">
                                                <div class="bg" style="width: 80%"></div>
                                                <div class="color-red">31,113.04</div>
                                                <div class="color-white">0.229460</div>
                                                <div class="color-gray2">15:23:57</div>
                                            </div>
                                            <div class="grid-line red">
                                                <div class="bg" style="width: 80%"></div>
                                                <div class="color-red">31,113.04</div>
                                                <div class="color-white">0.229460</div>
                                                <div class="color-gray2">15:23:57</div>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                        <div class="order-form">
                            <div class="tabs tabs-3">
                                <div class="tabs__header tabs__header-3">
                                    <div class="tabs__header-item tabs__header-item-3 active text_16 buy">
                                        Buy
                                    </div>
                                    <div class="tabs__header-item tabs__header-item-3 text_16 sell">
                                        Sell
                                    </div>
                                </div>
                                <div class="tabs__content tabs__content-3">
                                    <form id="CreateOrderBuy">
                                        <div class="tabs__content-item tabs__content-item-3">

                                            <div class="flex-center">
                                                <div class="way-select">
                                                    
                                                    <button class="btn way text_small_14 active">
                                                        Market
                                                    </button>
                                                </div>
                                                <div class="balance">
                                                    <span class="text_small_12 color-gray2">Available balance</span>
                                                    <span class="text_16 color-blue"><?php echo e($balanceUsdt); ?> USDT</span>
                                                </div>
                                            </div>

                                            <label class="order-label">
                                                <span class="text_small_12 color-dark">Market price</span>
                                                <input type="text" disabled id="quantityPriceBuy"
                                                    class="order-input text_17" value="≈ ?" />


                                                <span
                                                    class="сurrency text_17 color-gray2"><?php echo e($coin['simple_name']); ?></span>
                                            </label>
                                            <label class="order-label">
                                                <span class="text_small_12 color-dark">Quantity</span>
                                                <input type="text" id="quantityBuy" name="amount"
                                                    oninput="delayedCalculateBuy()" class="order-input  text_17"
                                                    placeholder="0" />
                                                <span class="сurrency text_17 color-gray2">USDT</span>
                                            </label>
                                            
                                            
                                            
                                            
                                            
                                            
                                            
                                            
                                            
                                            
                                            <!-- <button class="btn btn-buy btn_16 notauth">Buy</button> -->
                                            <button type="submit" class="btn btn-buy btn_16">Buy</button>

                                        </div>
                                    </form>
                                    <form id="CreateOrderSell">
                                        <div class="tabs__content-item tabs__content-item-3">
                                            <div class="flex-center">
                                                <div class="way-select">
                                                    
                                                    <button class="btn way text_small_14 active">Market</button>
                                                </div>
                                                <div class="balance">
                                                    <span class="text_small_12 color-gray2">Available balance</span>
                                                    <span
                                                        class="text_16 color-blue"><?php echo e($balanceCoin . ' ' . $coin['simple_name']); ?></span>
                                                </div>
                                            </div>
                                            <label class="order-label">
                                                <span class="text_small_12 color-dark">Market price</span>
                                                <input type="text" disabled id="quantityPriceSell"
                                                    class="order-input text_17" value="≈ ?" />
                                                <span class="сurrency text_17 color-gray2">USDT</span>
                                            </label>
                                            <label class="order-label">
                                                <span class="text_small_12 color-dark">Quantity</span>
                                                <input type="text" id="quantitySell" name="amount"
                                                    oninput="delayedCalculateSell()" class="order-input text_17"
                                                    placeholder="0" value="" />
                                                <span
                                                    class="сurrency text_17 color-gray2"><?php echo e($coin['simple_name']); ?></span>
                                            </label>
                                            
                                            
                                            
                                            
                                            
                                            
                                            
                                            
                                            
                                            
                                            <!-- <button class="btn btn-sell btn_16 notauth">Sell</button> -->
                                            <button class="btn btn-sell btn_16">Sell</button>
                                        </div>
                                    </form>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </section>
    </main>


    <?php echo $__env->yieldContent('footer'); ?>
    <script src="<?php echo e(asset('js/tabs.js')); ?>"></script>
    <script src="<?php echo e(asset('js/load.js')); ?>"></script>
    <script src="<?php echo e(asset('js/iziModal.min.js')); ?>"></script>
    <script src="<?php echo e(asset('js/iziToast.min.js')); ?>"></script>
    <script>
        const select1 = new ItcCustomSelect('#select-1', {
            name: 'selectPair',
            targetValue: '<?php echo e($pair); ?>',
            options: [
                <?php $__currentLoopData = $coins; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $Coin): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                    ['<?php echo e($Coin['simple_name']); ?>_USDT',
                        `<img
                                                    width="30px"
                                                    src="<?php echo e(asset('images/coin_icons/' . $Coin['simple_name'] . '.svg')); ?>"
                                                    alt=""
                                                />
                                                <span><?php echo e($Coin['simple_name']); ?><b class="color-dark">/USDT</b></span>`
                    ],
                <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
            ],
            onSelected(select, option) {
                window.location.href = "/trade/" + select.value;
            }
        });
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
        let lastPrice = 0;
        let change = 0;

        function updateAsset() {
            const valueInfo_price = document.getElementById('valueInfo_price');
            const valueInfo_price1 = document.getElementById('valueInfo_price1');
            const valueInfo_change = document.getElementById('valueInfo_change');
            const valueInfo_high = document.getElementById('valueInfo_high');
            const valueInfo_low = document.getElementById('valueInfo_low');
            const valueInfo_volume = document.getElementById('valueInfo_volume');

            const pair = "<?php echo e(str_replace('_', '', $pair)); ?>";
            $.ajax({
                url: "<?php echo e(route('trade.assets')); ?>",
                type: "POST",
                data: {
                    pair: pair,
                    _token: "<?php echo e(csrf_token()); ?>",
                },
                success: function(data) {
                    if (lastPrice < data.lastPrice) {
                        valueInfo_price.classList.remove('color-red');
                        valueInfo_price.classList.add('color-green');
                        valueInfo_price.innerHTML = data.lastPrice +
                            '<img class="price-img" src="/images/priceUp.svg" alt="">';

                        valueInfo_price1.classList.remove('color-red');
                        valueInfo_price1.classList.add('color-green');
                        valueInfo_price1.innerHTML = data.lastPrice +
                            '<img class="price-img" src="/images/priceUp.svg" alt="">';
                    } else {
                        valueInfo_price.classList.remove('color-green');
                        valueInfo_price.classList.add('color-red');
                        valueInfo_price.innerHTML = data.lastPrice +
                            '<img class="price-img" src="/images/priceDown.svg" alt="">';

                        valueInfo_price1.classList.remove('color-green');
                        valueInfo_price1.classList.add('color-red');
                        valueInfo_price1.innerHTML = data.lastPrice +
                            '<img class="price-img" src="/images/priceDown.svg" alt="">';
                    }

                    if (change < data.priceChangePercent) {
                        valueInfo_change.classList.remove('color-red');
                        valueInfo_change.classList.add('color-green');
                        valueInfo_change.innerHTML = data.priceChangePercent +
                            '<img class="price-img" src="/images/priceUp.svg" alt="">';
                    } else {
                        valueInfo_change.classList.remove('color-green');
                        valueInfo_change.classList.add('color-red');
                        valueInfo_change.innerHTML = data.priceChangePercent +
                            '<img class="price-img" src="/images/priceDown.svg" alt="">';
                    }
                    valueInfo_high.innerHTML = data.highPrice;
                    valueInfo_low.innerHTML = data.lowPrice;
                    valueInfo_volume.innerHTML = data.volume;
                    lastPrice = data.lastPrice;
                    change = data.priceChangePercent;
                },
                error: function(msg) {
                    console.log(msg);
                },
            })
        }

        updateAsset();
        setInterval(updateAsset, 1000);

        function Effect_of_smooth_magnification(start_value, end_value, duration = 1000, id_element) {
            let start = null;
            const step = (timestamp) => {
                if (!start) start = timestamp;
                const progress = Math.min((timestamp - start) / duration, 1);
                const value = (progress * (end_value - start_value) + start_value).toFixed(4);
                document.getElementById(`${id_element}`).value = value;
                if (progress < 1) {
                    window.requestAnimationFrame(step);
                }
            };
            window.requestAnimationFrame(step);
        }

        let buyTimeout;
        let sellTimeout;

        function calculateBuy() {
            const quantityBuy = document.getElementById('quantityBuy');
            const quantityPriceBuy = document.getElementById('quantityPriceBuy');
            const amount = quantityBuy.value;
            const coin = "<?php echo e(explode('_', $pair)[0]); ?>";
            if (isNaN(amount)) {
                return;
            }
            $.ajax({
                url: "<?php echo e(route('assets.swap.convertCryptoPrice')); ?>",
                type: "POST",
                data: {
                    CoinSymbolFrom: "USDT TRC-20",
                    CoinSymbolTo: coin,
                    amount: amount
                },
                success: function(data, status, xhr) {

                    Effect_of_smooth_magnification(0, data.price, 100, "quantityPriceBuy");

                },
                error: function(data) {
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

        function calculateSell() {

            const quantitySell = document.getElementById('quantitySell');
            const quantityPriceSell = document.getElementById('quantityPriceSell');
            const amount = quantitySell.value;
            const coin = "<?php echo e(explode('_', $pair)[0]); ?>";
            if (isNaN(amount)) {
                return;
            }
            $.ajax({
                url: "<?php echo e(route('assets.swap.convertCryptoPrice')); ?>",
                type: "POST",
                data: {
                    CoinSymbolFrom: coin,
                    CoinSymbolTo: "USDT",
                    amount: amount
                },
                success: function(data, status, xhr) {

                    Effect_of_smooth_magnification(0, data.price, 100, "quantityPriceSell");

                },
                error: function(data) {
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

        function addLoaderClass(elementId) {
            // Добавить класс loader к элементу
            $("#" + elementId).addClass("loader");
        }

        function removeLoaderClass(elementId) {
            // Убрать класс loader из элемента
            $("#" + elementId).removeClass("loader");
        }

        function delayedCalculateBuy() {
            clearTimeout(buyTimeout);
            addLoaderClass("quantityPriceBuy");
            buyTimeout = setTimeout(function() {
                calculateBuy();
                setTimeout(function() {
                    removeLoaderClass("quantityPriceBuy");
                }, 400);


            }, 500);
        }

        function delayedCalculateSell() {
            clearTimeout(sellTimeout);
            addLoaderClass("quantityPriceSell");
            sellTimeout = setTimeout(function() {
                calculateSell();
                setTimeout(function() {
                    removeLoaderClass("quantityPriceSell");
                }, 400);

            }, 500);
        }
    </script>

    <script>
        function formatDateString(inputDate) {
            const date = new Date(inputDate);

            const day = date.getDay();
            const month = date.getMonth() + 1;
            const year = date.getFullYear() % 100;

            // Получаем часы, минуты и секунды
            const hours = date.getHours();
            const minutes = date.getMinutes();
            const seconds = date.getSeconds();


            const formattedDate =
                `${(month < 10 ? '0' : '') + month}/${(day < 10 ? '0' : '') + day}/${year}, ${hours}:${(minutes < 10 ? '0' : '') + minutes}:${(seconds < 10 ? '0' : '') + seconds}`;

            return formattedDate;
        }

        function formatDateStringHMS(inputDate) {
            const date = new Date(inputDate);

            const day = date.getDay();
            const month = date.getMonth() + 1;
            const year = date.getFullYear() % 100;

            // Получаем часы, минуты и секунды
            const hours = date.getHours();
            const minutes = date.getMinutes();
            const seconds = date.getSeconds();


            const formattedDate = `${hours}:${(minutes < 10 ? '0' : '') + minutes}:${(seconds < 10 ? '0' : '') + seconds}`;

            return formattedDate;
        }

        function renderTable(data, containerId) {
            const container = document.getElementById(containerId);
            container.innerHTML = "";

            // Получаем значение цены из элемента
            const price = parseFloat(document.getElementById('valueInfo_price').textContent);

            data.forEach(order => {
                const gridLine = document.createElement("div");
                gridLine.classList.add("grid-line");

                const calculatedAmount = parseFloat(order.amount) * price;

                gridLine.innerHTML = `
            <div>${formatDateString(order.created_at)}</div>
            <div>${order.symbol}/USDT</div>
            <div>${order.type_order}</div>
            <div>${order.type_trade}</div>
            <div>${order.open_order_price.toFixed(2)}</div>
            <div>${order.amount.toFixed(2)}</div>
            <div>${isNaN(calculatedAmount) ? '<div class="loader"></div>' : calculatedAmount.toFixed(2)}</div>`;

                if (containerId === "openOrders") {
                    const cancelButton = document.createElement("div");
                    cancelButton.innerHTML = `
                <button onclick="closeOrder(${order.id})" class="clear cancel-btn">
                    <img src="<?php echo e(asset('images/cancel-icon.svg')); ?>" alt="x"/>
                </button>`;
                    gridLine.appendChild(cancelButton);
                } else {
                    const statusColumn = document.createElement("div");
                    statusColumn.textContent = order.status;
                    gridLine.appendChild(statusColumn);
                }

                container.appendChild(gridLine);

                // Добавляем класс для анимации
                setTimeout(() => {
                    gridLine.classList.add("active");
                }, 100); // Измените это значение по необходимости
            });
        }


        // Отрисовываем таблицы при загрузке страницы
        // renderTable(openOrdersData, "openOrders");
        // renderTable(closedOrdersData, "closedOrders");


        function getHistory() {
            const pair = "<?php echo e(str_replace('_', '', $pair)); ?>";
            $.ajax({
                url: "<?php echo e(route('trade.history')); ?>",
                type: "POST",
                data: {
                    pair: pair,
                    _token: "<?php echo e(csrf_token()); ?>",
                },
                success: function(data) {
                    console.log(data)
                    renderTable(data.OpenOrder, "openOrders");
                    renderTable(data.CloseOrder, "closedOrders");
                },
                error: function(msg) {
                    console.log(msg);
                },
            })
        }

        setInterval(getHistory, 15000)
        setTimeout(getHistory, 1000);

        function closeOrder(id) {
            $.ajax({
                url: "<?php echo e(route('trade.order.close')); ?>",
                type: "POST",
                data: {
                    id: id,
                    _token: "<?php echo e(csrf_token()); ?>",
                },
                success: function(data) {
                    console.log(data)
                    getHistory()
                    iziToast.show({
                        ...commonOptions,
                        message: data.message,
                        iconUrl: "<?php echo e(asset('images/succes.svg')); ?>",
                    });
                },
                error: function(msg) {
                    console.log(msg);
                },
            })
        }
    </script>
    <script>
        const CreateOrderBuy = document.getElementById('CreateOrderBuy');
        const CreateOrderSell = document.getElementById('CreateOrderSell');

        CreateOrderBuy.addEventListener("submit", (e) => {
            e.preventDefault();
            const coin = "USDT";
            const type_order = "market";
            const type_trade = "buy";
            const formData = new FormData(CreateOrderBuy);
            formData.append("coin_symbol", coin);
            formData.append("type_order", type_order);
            formData.append("type_trade", type_trade);

            $.ajax({
                url: "<?php echo e(route('trade.create.order')); ?>",
                type: "POST",
                data: formData,
                contentType: false,
                processData: false,
                success: function(data, status, xhr) {
                    console.log(data);
                    getHistory();
                    if (xhr.status === 201) {
                        iziToast.show({
                            ...commonOptions,
                            message: data.message,
                            iconUrl: "<?php echo e(asset('images/succes.svg')); ?>",
                        });

                    }
                },
                error: function(data) {

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

        CreateOrderSell.addEventListener("submit", (e) => {
            e.preventDefault();
            const coin = "<?php echo e($coin['simple_name']); ?>";
            const type_order = "market";
            const type_trade = "sell";
            const formData = new FormData(CreateOrderSell);
            formData.append("coin_symbol", coin);
            formData.append("type_order", type_order);
            formData.append("type_trade", type_trade);

            $.ajax({
                url: "<?php echo e(route('trade.create.order')); ?>",
                type: "POST",
                data: formData,
                contentType: false,
                processData: false,
                success: function(data, status, xhr) {
                    console.log(data);
                    getHistory();
                    if (xhr.status === 201) {
                        iziToast.show({
                            ...commonOptions,
                            message: data.message,
                            iconUrl: "<?php echo e(asset('images/succes.svg')); ?>",
                        });

                    }
                },
                error: function(data) {

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
        function renderRecentTrades(arr) {
            const container = document.getElementById("recentTrade");
            if (arr.length === 1) {
                var lastChild = container.lastChild;
                container.removeChild(lastChild);
            } else {
                container.innerHTML = "";
            }

            arr.forEach(trade => {
                const gridLine = document.createElement("div");
                gridLine.classList.add("grid-line");
                if (trade.type_trade === "buy") {
                    gridLine.classList.add("color-green2");
                } else {
                    gridLine.classList.add("color-red");
                }
                gridLine.innerHTML = `

                                            <div class="${trade.type_trade === 'buy' ? 'color-green2' : 'color-red'}">${trade.price}</div>
                                            <div class="color-white">${trade.amount}</div>
                                            <div class="color-gray2">${trade.time}</div>
                                      `;
                // container.appendChild(gridLine);
                var firstChild = container.firstChild;
                container.insertBefore(gridLine, firstChild);
                setTimeout(() => {
                    gridLine.classList.add("create");
                }, 100);
            })

        }

        function recentTrades(renderFull) {
            const block = document.getElementById("recentTrade");
            const actualPrice = document.getElementById("valueInfo_price").textContent;
            trades = [];
            let i = 0;
            const time = new Date().getTime();
            const format_date = formatDateStringHMS(time);
            if (renderFull) {
                while (i != 11) {
                    trades.push({
                        price: actualPrice,
                        amount: (Math.random() * 0.5).toFixed(4),
                        time: format_date,
                        type_trade: Math.random() > 0.5 ? "buy" : "sell"
                    })
                    i++
                }
            } else {
                trades.push({
                    price: actualPrice,
                    amount: (Math.random() * 0.5).toFixed(4),
                    time: format_date,
                    type_trade: Math.random() > 0.5 ? "buy" : "sell"
                })
            }
            renderRecentTrades(trades);
        }
        setTimeout(function() {
            recentTrades(true)
            setInterval(function() {
                recentTrades(false)
            }, getRandomNumber(100, 7000))
        }, 1000)

        function getRandomNumber(num1, num2) {
            return Math.floor(Math.random() * (num2 - num1 + 1)) + num1;
        }
    </script>
    <script>
        function renderOrderBook(arr, id_container) {
            const container = document.getElementById(id_container);
            if (arr.length === 1) {
                var lastChild = container.lastChild;
                container.removeChild(lastChild);
            } else {
                container.innerHTML = "";
            }

            arr.forEach(trade => {
                const gridLine = document.createElement("div");
                gridLine.classList.add("grid-line");
                if (trade.type_trade === "buy") {
                    gridLine.classList.add("color-green2");
                } else {
                    gridLine.classList.add("color-red");
                }
                gridLine.innerHTML = `
                                            <div class="bg" style="width: 80%"></div>
                                            <div class="${trade.type_trade === 'buy' ? 'color-green2' : 'color-red'}">${trade.price}</div>
                                            <div class="color-white">${trade.amount}</div>
                                            <div class="color-gray2">${trade.time}</div>
                                            
                                      `;
                // container.appendChild(gridLine);
                var firstChild = container.firstChild;
                container.insertBefore(gridLine, firstChild);
                setTimeout(() => {
                    gridLine.classList.add("create");
                }, 100);
            })

        }
       
        function orderBook(renderFull, type) {
            const actualPrice = document.getElementById("valueInfo_price").textContent;
            trades = [];
            let i = 0;
            const time = new Date().getTime();
            const format_date = formatDateStringHMS(time);
            if (renderFull) {
                while (i != 5) {
                    trades.push({
                        price: actualPrice,
                        amount: (Math.random() * 0.5).toFixed(4),
                        time: format_date,
                        type_trade: type
                    })
                    i++
                }
            } else {
                trades.push({
                    price: actualPrice,
                    amount: (Math.random() * 0.5).toFixed(4),
                    time: format_date,
                    type_trade: type
                })
            }
            return trades;
        }

        setTimeout(function() {
            renderOrderBook(orderBook(true, "buy"), "OrderBookBuy")
            setInterval(function() {
                renderOrderBook(orderBook(false, "buy"), "OrderBookBuy")
            }, getRandomNumber(100, 7000))
        }, 1000)
        setTimeout(function() {
            renderOrderBook(orderBook(true, "sell"), "OrderBookSell")
            setInterval(function() {
                renderOrderBook(orderBook(false, "sell"), "OrderBookSell")
            }, getRandomNumber(100, 7000))
        }, 1000)
        function getRandomNumber(num1, num2) {
            return Math.floor(Math.random() * (num2 - num1 + 1)) + num1;
        }
    </script>

</body>

</html>
<?php /**PATH /Users/nikita/PhpstormProjects/house/resources/views/trade.blade.php ENDPATH**/ ?>