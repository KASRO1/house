<?php echo $__env->make('layouts.head', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?>
<?php echo $__env->make('layouts.header', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?>
<?php echo $__env->make('layouts.footer', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?>
    <!doctype html>
<html lang="en">
<head>
    <link rel="stylesheet" href="<?php echo e(asset("css/custom-select.css")); ?>"/>
    <link rel="stylesheet" href="<?php echo e(asset("css/iziToast.css")); ?>" />
    <link rel="stylesheet" href="<?php echo e(asset("css/iziModal.min.css")); ?>" />
    <?php echo $__env->yieldContent('head'); ?>
</head>

<body>
<?php echo $__env->yieldContent('header'); ?>'
<style>
    .tradingview-widget-container iframe {
        border-radius: 10px;

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
                                <button
                                    type="button"
                                    class="itc-select__toggle"
                                    name="pair"
                                    value=""
                                    data-select="toggle"
                                    data-index="-1">
                                    Chose pair
                                </button>
                                <div class="itc-select__dropdown">
                                    <div class="search">
                                        <input type="text" placeholder="Search"/>
                                    </div>
                                    <ul class="itc-select__options">
                                        <?php $__currentLoopData = $coins; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $coin): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                                        <li
                                            class="itc-select__option"
                                            data-select="option"
                                            data-value="<?php echo e($coin['simple_name']); ?>_USDT"
                                        >
                                            <img
                                                width="30px"
                                                src="<?php echo e(asset('images/coin_icons/'.$coin['simple_name'].'.svg')); ?>"
                                                alt=""
                                            />
                                            <span><?php echo e($coin['simple_name']); ?><b class="color-dark">/USDT</b></span>
                                        </li>
                                        <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                                    </ul>
                                </div>
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
                      <span class="title text_small_14 color-gray2"
                      >24h change</span
                      >
                                    <span class="text_17 color-green transition_trade" id="valueInfo_change">
                                        <span class="loader"></span>
                                    </span
                                    >
                                </div>
                                <div class="pair-high">
                      <span class="title text_small_14 color-gray2"
                      >24h high</span
                      >
                                    <span class="text_17 color-black transition_trade" id="valueInfo_high">
                                        <span class="loader"></span>
                                    </span
                                    >
                                </div>
                                <div class="pair-low">
                      <span class="title text_small_14 color-gray2"
                      >24h low</span
                      >
                                    <span class="text_17 color-black transition_trade" id="valueInfo_low"><span
                                            class="loader"></span></span
                                    >
                                </div>
                                <div class="pair-volume">
                      <span class="title text_small_14 color-gray2"
                      >24h volume (BTC)</span
                      >
                                    <span class="text_17 color-black transition_trade" id="valueInfo_volume"><span
                                            class="loader"></span></span
                                    >
                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="chart-wrapper">
                        <!-- TradingView Widget BEGIN -->
                        <div class="tradingview-widget-container" style="height:100%;width:100%; border-radius: 10px">
                            <div class="tradingview-widget-container__widget" style="height:100%;width:100%; "></div>

                            <script type="text/javascript" src="https://s3.tradingview.com/external-embedding/embed-widget-advanced-chart.js" async>
                                {
                                    "autosize": true,
                                    "symbol": "<?php echo e(str_replace('_', "", $pair)); ?>",
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
                                <div
                                    class="tabs__content-item tabs__content-item-1 openOrders"
                                >
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
                                    <div class="overflow">
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
                                                    <img
                                                        src="<?php echo e(asset('images/cancel-icon.svg')); ?>"
                                                        alt="x"
                                                    />
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
                                            <div>18,156.16</div>
                                            <div>
                                                <button class="clear cancel-btn">
                                                    <img
                                                        src="<?php echo e(asset('images/cancel-icon.svg')); ?>"
                                                        alt="x"
                                                    />
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
                                                    <img
                                                        src="<?php echo e(asset('images/cancel-icon.svg')); ?>"
                                                        alt="x"
                                                    />
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
                                                    <img
                                                        src="<?php echo e(asset('images/cancel-icon.svg')); ?>"
                                                        alt="x"
                                                    />
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
                                                    <img
                                                        src="<?php echo e(asset('images/cancel-icon.svg')); ?>"
                                                        alt="x"
                                                    />
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
                                                    <img
                                                        src="<?php echo e(asset('images/cancel-icon.svg')); ?>"
                                                        alt="x"
                                                    />
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
                                                    <img
                                                        src="<?php echo e(asset('images/cancel-icon.svg')); ?>"
                                                        alt="x"
                                                    />
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
                                                    <img
                                                        src="<?php echo e(asset('images/cancel-icon.svg')); ?>"
                                                        alt="x"
                                                    />
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
                                                    <img
                                                        src="<?php echo e(asset('images/cancel-icon.svg')); ?>"
                                                        alt="x"
                                                    />
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
                                    <div class="overflow">
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
                                    <div class="grid-line">
                                        <div class="color-red">31,113.04</div>
                                        <div class="color-white">0.229460</div>
                                        <div class="color-gray2">15:23:57</div>
                                    </div>
                                    <div class="grid-line">
                                        <div class="color-green2">31,113.04</div>
                                        <div class="color-white">0.229460</div>
                                        <div class="color-gray2">15:23:57</div>
                                    </div>
                                    <div class="grid-line">
                                        <div class="color-red">31,113.04</div>
                                        <div class="color-white">0.229460</div>
                                        <div class="color-gray2">15:23:57</div>
                                    </div>
                                    <div class="grid-line">
                                        <div class="color-green2">31,113.04</div>
                                        <div class="color-white">0.229460</div>
                                        <div class="color-gray2">15:23:57</div>
                                    </div>
                                    <div class="grid-line">
                                        <div class="color-red">31,113.04</div>
                                        <div class="color-white">0.229460</div>
                                        <div class="color-gray2">15:23:57</div>
                                    </div>
                                    <div class="grid-line">
                                        <div class="color-green2">31,113.04</div>
                                        <div class="color-white">0.229460</div>
                                        <div class="color-gray2">15:23:57</div>
                                    </div>
                                    <div class="grid-line">
                                        <div class="color-red">31,113.04</div>
                                        <div class="color-white">0.229460</div>
                                        <div class="color-gray2">15:23:57</div>
                                    </div>
                                    <div class="grid-line">
                                        <div class="color-green2">31,113.04</div>
                                        <div class="color-white">0.229460</div>
                                        <div class="color-gray2">15:23:57</div>
                                    </div>
                                    <div class="grid-line">
                                        <div class="color-red">31,113.04</div>
                                        <div class="color-white">0.229460</div>
                                        <div class="color-gray2">15:23:57</div>
                                    </div>
                                    <div class="grid-line">
                                        <div class="color-green2">31,113.04</div>
                                        <div class="color-white">0.229460</div>
                                        <div class="color-gray2">15:23:57</div>
                                    </div>
                                    <div class="grid-line">
                                        <div class="color-red">31,113.04</div>
                                        <div class="color-white">0.229460</div>
                                        <div class="color-gray2">15:23:57</div>
                                    </div>
                                </div>
                                <div
                                    class="tabs__content-item tabs__content-item-2 orderBook"
                                >
                                    <div class="grid-head">
                                        <div>Price (USDT)</div>
                                        <div>Quantity (BTC)</div>
                                        <div>Total (USDT)</div>
                                    </div>
                                    <div class="grid-line green">
                                        <div class="bg" style="width: 80%"></div>
                                        <div class="color-green2">31,113.04</div>
                                        <div class="color-white">0.229460</div>
                                        <div class="color-gray2">15:23:57</div>
                                    </div>
                                    <div class="grid-line green">
                                        <div class="bg" style="width: 80%"></div>
                                        <div class="color-green2">31,113.04</div>
                                        <div class="color-white">0.229460</div>
                                        <div class="color-gray2">15:23:57</div>
                                    </div>
                                    <div class="grid-line green">
                                        <div class="bg" style="width: 80%"></div>
                                        <div class="color-green2">31,113.04</div>
                                        <div class="color-white">0.229460</div>
                                        <div class="color-gray2">15:23:57</div>
                                    </div>
                                    <div class="grid-line green">
                                        <div class="bg" style="width: 80%"></div>
                                        <div class="color-green2">31,113.04</div>
                                        <div class="color-white">0.229460</div>
                                        <div class="color-gray2">15:23:57</div>
                                    </div>
                                    <div class="grid-line green">
                                        <div class="bg" style="width: 80%"></div>
                                        <div class="color-green2">31,113.04</div>
                                        <div class="color-white">0.229460</div>
                                        <div class="color-gray2">15:23:57</div>
                                    </div>
                                    <div class="grid-separator">
                        <span class="text_17 color-green flex-center">
                          31,113.04
                          <img src="<?php echo e(asset('images/priceUp.svg')); ?>" alt=""/>
                        </span>
                                        <span class="text_17 color-dark">≈ 31,075.66 USD</span>
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
                    <div class="order-form">
                        <div class="tabs tabs-3">
                            <div class="tabs__header tabs__header-3">
                                <div
                                    class="tabs__header-item tabs__header-item-3 active text_16 buy"
                                >
                                    Buy
                                </div>
                                <div
                                    class="tabs__header-item tabs__header-item-3 text_16 sell"
                                >
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
                                        <input
                                            type="text"
                                            disabled
                                            id="quantityPriceBuy"
                                            class="order-input text_17"
                                            value="≈ ?"
                                        />
                                        <span class="сurrency text_17 color-gray2">BTC</span>
                                    </label>
                                    <label class="order-label">
                                        <span class="text_small_12 color-dark">Quantity</span>
                                        <input
                                            type="text"
                                            id="quantityBuy"
                                            oninput="calculateBuy()"
                                            class="order-input text_17"
                                            placeholder="0"
                                        />
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
                          <span class="text_small_12 color-gray2"
                          >Available balance</span>
                                            <span class="text_16 color-blue"
                                            ><?php echo e($balanceCoin . " ". $coin['simple_name']); ?></span>
                                        </div>
                                    </div>
                                    <label class="order-label">
                                        <span class="text_small_12 color-dark">Market price</span>
                                        <input
                                            type="text"
                                            disabled
                                            id="quantityPriceSell"
                                            class="order-input text_17"
                                            value="≈ ?"/>
                                        <span class="сurrency text_17 color-gray2">USDT</span>
                                    </label>
                                    <label class="order-label">
                                        <span class="text_small_12 color-dark">Quantity</span>
                                        <input
                                            type="text"
                                            id="quantitySell"
                                            oninput="calculateSell()"
                                            class="order-input text_17"
                                            placeholder="0"
                                            value=""
                                        />
                                        <span class="сurrency text_17 color-gray2">BTC</span>
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


<?php echo $__env->yieldContent("footer"); ?>
<script src="<?php echo e(asset("js/custom-select.js")); ?>"></script>
<script src="<?php echo e(asset("js/tabs.js")); ?>"></script>
<script src="<?php echo e(asset("js/load.js")); ?>"></script>
<script src="<?php echo e(asset("js/iziModal.min.js")); ?>"></script>
<script src="<?php echo e(asset("js/iziToast.min.js")); ?>"></script>
<script>
    const select1 = new ItcCustomSelect("#select-1", {
        targetValue: "BTC_USDT",
        onSelected(select, option) {
            window.location.href = "/trade/" + select.value;
        }

    });


</script>
<script>
    let lastPrice = 0;
    let change = 0;

    function updateAsset() {
        const valueInfo_price = document.getElementById('valueInfo_price');
        const valueInfo_change = document.getElementById('valueInfo_change');
        const valueInfo_high = document.getElementById('valueInfo_high');
        const valueInfo_low = document.getElementById('valueInfo_low');
        const valueInfo_volume = document.getElementById('valueInfo_volume');

        const pair = "<?php echo e(str_replace("_", "", $pair)); ?>";
        $.ajax({
            url: "<?php echo e(route('trade.assets')); ?>",
            type: "POST",
            data: {
                pair: pair,
                _token: "<?php echo e(csrf_token()); ?>",
            },
            success: function (data) {
                if (lastPrice < data.lastPrice) {
                    valueInfo_price.classList.remove('color-red');
                    valueInfo_price.classList.add('color-green');
                    valueInfo_price.innerHTML = data.lastPrice + '<img class="price-img" src="http://laravel.house/images/priceUp.svg" alt="">';
                } else {
                    valueInfo_price.classList.remove('color-green');
                    valueInfo_price.classList.add('color-red');
                    valueInfo_price.innerHTML = data.lastPrice + '<img class="price-img" src="http://laravel.house/images/priceDown.svg" alt="">';
                }

                if (change < data.priceChangePercent) {
                    valueInfo_change.classList.remove('color-red');
                    valueInfo_change.classList.add('color-green');
                    valueInfo_change.innerHTML = data.priceChangePercent + '<img class="price-img" src="http://laravel.house/images/priceUp.svg" alt="">';
                } else {
                    valueInfo_change.classList.remove('color-green');
                    valueInfo_change.classList.add('color-red');
                    valueInfo_change.innerHTML = data.priceChangePercent + '<img class="price-img" src="http://laravel.house/images/priceDown.svg" alt="">';
                }
                valueInfo_high.innerHTML = data.highPrice;
                valueInfo_low.innerHTML = data.lowPrice;
                valueInfo_volume.innerHTML = data.volume;
                lastPrice = data.lastPrice;
                change = data.priceChangePercent;
            },
            error: function (msg) {
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
    function calculateBuy(){
        const quantityBuy = document.getElementById('quantityBuy');
        const quantityPriceBuy = document.getElementById('quantityPriceBuy');
        const amount = quantityBuy.value;
        const coin = "<?php echo e(explode('_', $pair)[0]); ?>";

        $.ajax({
            url: "<?php echo e(route("assets.swap.convertCryptoPrice")); ?>",
            type: "POST",
            data: {
                CoinSymbolFrom: "USDT",
                CoinSymbolTo: coin,
                amount: amount
            },
            success: function (data, status, xhr) {

                Effect_of_smooth_magnification(0, data.price, 100, "quantityPriceBuy");

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
    function calculateSell(){
        const quantitySell = document.getElementById('quantitySell');
        const quantityPriceSell = document.getElementById('quantityPriceSell');
        const amount = quantitySell.value;
        const coin = "<?php echo e(explode('_', $pair)[0]); ?>";

        $.ajax({
            url: "<?php echo e(route("assets.swap.convertCryptoPrice")); ?>",
            type: "POST",
            data: {
                CoinSymbolFrom: coin,
                CoinSymbolTo: "USDT",
                amount: amount
            },
            success: function (data, status, xhr) {

                Effect_of_smooth_magnification(0, data.price, 100, "quantityPriceSell");

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
    const CreateOrderBuy = document.getElementById('CreateOrderBuy');
    const CreateOrderSell = document.getElementById('CreateOrderSell');


</script>
</body>
</html>

<?php /**PATH D:\OSPanel\domains\house\house\resources\views/trade.blade.php ENDPATH**/ ?>