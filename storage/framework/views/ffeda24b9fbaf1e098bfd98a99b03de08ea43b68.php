<?php echo $__env->make('layouts.head', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?>
<?php echo $__env->make('layouts.header', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?>
<?php echo $__env->make('layouts.footer', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?>
    <!doctype html>
<html lang="en">
<head>
    <link rel="stylesheet" href="<?php echo e(asset("css/custom-select.css")); ?>"/>
    <?php echo $__env->yieldContent('head'); ?>
</head>

<body>
<?php echo $__env->yieldContent('header'); ?>'
<style>
    .tradingview-widget-container iframe{
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
                                    data-index="-1"
                                >
                                    Chose pair
                                </button>
                                <div class="itc-select__dropdown">
                                    <div class="search">
                                        <input type="text" placeholder="Search"/>
                                    </div>
                                    <ul class="itc-select__options">
                                        <li
                                            class="itc-select__option"
                                            data-select="option"
                                            data-value="ETH"
                                            data-index="0"
                                        >
                                            <img
                                                src="<?php echo e(asset('images/coins/pair_coin-eth.svg')); ?>"
                                                alt=""
                                            />
                                            <span>ETH<b class="color-dark">/USDT</b></span>
                                        </li>
                                        <li
                                            class="itc-select__option"
                                            data-select="option"
                                            data-value="BTC"
                                            data-index="1"
                                        >
                                            <img
                                                src="<?php echo e(asset('images/coins/pair_coin-btc.svg')); ?>"
                                                alt=""
                                            />
                                            <span>BTC<b class="color-dark">/USDT</b></span>
                                        </li>
                                        <li
                                            class="itc-select__option"
                                            data-select="option"
                                            data-value="USDC"
                                            data-index="2"
                                        >
                                            <img
                                                src="<?php echo e(asset('images/coins/pair_coin-usdc.svg')); ?>"
                                                alt=""
                                            /><span>USDC<b class="color-dark">/USDT</b></span>
                                            <div class="pair-select_info">
                            <span class="text_small_12 color-green2"
                            >31,113.04
                              <img src="<?php echo e(asset('images/priceUp.svg')); ?>" alt=""
                              /></span>
                                                <span class="text_small_12 color-green2">+2,24%</span>
                                            </div>
                                        </li>
                                        <li
                                            class="itc-select__option"
                                            data-select="option"
                                            data-value="TRX"
                                            data-index="3"
                                        >
                                            <img
                                                src="<?php echo e(asset('images/coins/pair_coin-trx.svg')); ?>"
                                                alt=""
                                            /><span>TRX<b class="color-dark">/USDT</b></span>
                                        </li>
                                    </ul>
                                </div>
                            </div>
                            <div class="pair-price">
                                <span class="title text_small_14 color-gray2">Price</span>
                                <span class="text_17 color-green" id="valueInfo_price"
                                >31,113.04
                      <img
                          class="price-img"
                          src="<?php echo e(asset('images/priceUp.svg')); ?>"
                          alt=""
                      /></span>
                            </div>
                        </div>
                        <div class="right">
                            <div class="pair-info">
                                <div class="pair-change">
                      <span class="title text_small_14 color-gray2"
                      >24h change</span
                      >
                                    <span class="text_17 color-green" id="valueInfo_change"
                                    >+2.24%</span
                                    >
                                </div>
                                <div class="pair-high">
                      <span class="title text_small_14 color-gray2"
                      >24h high</span
                      >
                                    <span class="text_17 color-black" id="valueInfo_change"
                                    >31,113.04</span
                                    >
                                </div>
                                <div class="pair-low">
                      <span class="title text_small_14 color-gray2"
                      >24h low</span
                      >
                                    <span class="text_17 color-black" id="valueInfo_change"
                                    >28,585.21</span
                                    >
                                </div>
                                <div class="pair-volume">
                      <span class="title text_small_14 color-gray2"
                      >24h volume (BTC)</span
                      >
                                    <span class="text_17 color-black" id="valueInfo_change"
                                    >52,254.82532</span
                                    >
                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="chart-wrapper">
                        <!-- TradingView Widget BEGIN -->
                        <div class="tradingview-widget-container" style="height:100%;width:100%; border-radius: 10px">
                            <div class="tradingview-widget-container__widget" style="height:100%;width:100%; "></div>

                            <script type="text/javascript"
                                    src="https://s3.tradingview.com/external-embedding/embed-widget-advanced-chart.js"
                                    async>
                                {
                                    "autosize"
                                :
                                    true,
                                        "symbol"
                                :
                                    "NASDAQ:AAPL",
                                        "interval"
                                :
                                    "D",
                                        "timezone"
                                :
                                    "Etc/UTC",
                                        "theme"
                                :
                                    "dark",
                                        "style"
                                :
                                    "1",
                                        "locale"
                                :
                                    "en",
                                        "enable_publishing"
                                :
                                    false,
                                        "allow_symbol_change"
                                :
                                    true,
                                        "support_host"
                                :
                                    "https://www.tradingview.com"
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
                                <div class="tabs__content-item tabs__content-item-3">
                                    <div class="flex-center">
                                        <div class="way-select">
                                            <button class="btn way text_small_14">Limit</button>
                                            <button class="btn way text_small_14 active">
                                                Market
                                            </button>
                                        </div>
                                        <div class="balance">
                          <span class="text_small_12 color-gray2"
                          >Available balance</span
                          >
                                            <span class="text_16 color-blue"
                                            >312,423.56 USDT</span
                                            >
                                        </div>
                                    </div>
                                    <label class="order-label">
                        <span class="text_small_12 color-dark"
                        >Market price</span
                        >
                                        <input
                                            type="text"
                                            disabled
                                            class="order-input text_17"
                                            value="≈ 31,113.04"
                                        />
                                        <span class="сurrency text_17 color-gray2">USDT</span>
                                    </label>
                                    <label class="order-label">
                                        <span class="text_small_12 color-dark">Quantity</span>
                                        <input
                                            type="text"
                                            class="order-input text_17"
                                            placeholder="0"
                                            value="3.421"
                                        />
                                        <span class="сurrency text_17 color-gray2">BTC</span>
                                    </label>
                                    <label class="order-label">
                                        <span class="text_small_12 color-dark">Total</span>
                                        <input
                                            type="text"
                                            class="order-input text_17"
                                            placeholder="0"
                                            value="106,437.70"
                                        />
                                        <span class="сurrency text_17 color-gray2">USDT</span>
                                    </label>
                                    <!-- <button class="btn btn-buy btn_16 notauth">Buy</button> -->
                                    <button class="btn btn-buy btn_16">Buy</button>
                                </div>
                                <div class="tabs__content-item tabs__content-item-3">
                                    <div class="flex-center">
                                        <div class="way-select">
                                            <button class="btn way text_small_14 active">
                                                Limit
                                            </button>
                                            <button class="btn way text_small_14">Market</button>
                                        </div>
                                        <div class="balance">
                          <span class="text_small_12 color-gray2"
                          >Available balance</span
                          >
                                            <span class="text_16 color-blue"
                                            >312,423.56 USDT</span
                                            >
                                        </div>
                                    </div>
                                    <label class="order-label">
                        <span class="text_small_12 color-dark"
                        >Limit price</span
                        >
                                        <input
                                            type="text"
                                            disabled
                                            class="order-input text_17"
                                            value="29,062.2"
                                        />
                                        <span class="сurrency text_17 color-gray2">USDT</span>
                                    </label>
                                    <label class="order-label">
                                        <span class="text_small_12 color-dark">Quantity</span>
                                        <input
                                            type="text"
                                            class="order-input text_17"
                                            placeholder="0"
                                            value="3.421"
                                        />
                                        <span class="сurrency text_17 color-gray2">BTC</span>
                                    </label>
                                    <label class="order-label">
                                        <span class="text_small_12 color-dark">Total</span>
                                        <input
                                            type="text"
                                            class="order-input text_17"
                                            placeholder="0"
                                            value="106,437.70"
                                        />
                                        <span class="сurrency text_17 color-gray2">USDT</span>
                                    </label>
                                    <!-- <button class="btn btn-sell btn_16 notauth">Sell</button> -->
                                    <button class="btn btn-sell btn_16">Sell</button>
                                </div>
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
<script>
    const select1 = new ItcCustomSelect("#select-1");
</script>


</body>
</html>

<?php /**PATH D:\OSPanel\domains\house\house\resources\views/trade.blade.php ENDPATH**/ ?>