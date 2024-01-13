<?php echo $__env->make('layouts.head', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?>
<?php echo $__env->make('layouts.header', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?>
<?php echo $__env->make('layouts.footer', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?>
    <!doctype html>
<html lang="en">
<head>
    <?php echo $__env->yieldContent("head"); ?>
</head>
<body>
<?php echo $__env->yieldContent("header"); ?>
<main class="about">
    <section class="about-us">
        <div class="container">
            <div class="about-us-content">
                <h2 class="h2_40 pb40">About us</h2>
                <div class="about-grid">
                    <div class="about-block">
                        <img
                            class="about_img pb30"
                            src="<?php echo e(asset('images/about-us_1.png')); ?>"
                            alt=""
                        />
                        <p class="text_18 _140">
                            Our company begins its history from June 2018, when it was
                            developed. Recognizing the importance of Bitcoin from the
                            onset, and understanding that the exchange is the most
                            critical part of the cryptocurrency ecosystem, Jayson Raymond
                            founded Cryptohouse to give people the means to quickly and
                            securely invest in the space. Since then, the company has
                            grown by leaps and bounds with hundreds of employees spanning
                            the globe.
                        </p>
                    </div>
                    <div class="about-block">
                        <p class="text_18 _140 pb30">
                            We’re a diverse group of thinkers and doers that are dedicated
                            to making cryptocurrency available and accessible to the world
                            and enabling people from all walks of life to invest in their
                            independence. We believe that everyone should have the freedom
                            to earn, hold, spend, share and give their money - no matter
                            who you are or where you come from.
                        </p>
                        <img
                            class="about_img"
                            src="<?php echo e(asset('images/about-us_2.png')); ?>"
                            alt=""
                        />
                    </div>
                </div>
            </div>
        </div>
    </section>
    <section class="whatwedo">
        <div class="container">
            <div class="whatwedo-content">
                <h2 class="h2_40">What we do</h2>
                <div class="whatwedo-block">
                    <h2 class="h2_20 pb20">Empowering investors</h2>
                    <p class="text_18 _140 color-gray2">
                        Whether you’re an advanced trader or a crypto-beginner,
                        Cryptohouse gives you the power to chart your own financial
                        course. Our exchange has an ever-growing number of
                        cryptocurrency pairs for you to invest in and a slew of tools
                        and features for you to leverage as you grow your portfolio.
                    </p>
                </div>
                <div class="whatwedo-block">
                    <h2 class="h2_20 pb20">Supporting institutions</h2>
                    <p class="text_18 _140 color-gray2">
                        From over-the-counter trading to personalized white-glove
                        account management, Bitexwave is the premier cryptocurrency
                        investing solution for institutions of all sizes. We offer
                        exceptional liquidity and competitive pricing for all our
                        markets so you can achieve your investment goals quickly and
                        confidently.
                    </p>
                </div>
            </div>
        </div>
    </section>
    <section class="roadmap">
        <div class="container">
            <div class="roadmap-content">
                <h2 class="h2_40">Roadmap</h2>
                <div class="roadmap-grid">
                    <div class="roadmap-grid-block">
                        <div class="roadmap-block">
                            <h2 class="h2_20 color-gray2">2018 June</h2>
                            <div class="steps">
                                <span class="text_17">The Crypto Ark sets sail</span>
                                <span class="text_17">New UI and UX</span>
                            </div>
                        </div>
                        <div class="roadmap-block">
                            <h2 class="h2_20 color-gray2">2019 March</h2>
                            <div class="steps">
                    <span class="text_17"
                    >Achieved 15% of global BTC volume</span
                    >
                                <span class="text_17"
                                >Rated TOP 15 Top Crypto Exchange in the World</span
                                >
                                <span class="text_17"
                                >4,000 participants joined our global trading
                      competition</span
                                >
                            </div>
                        </div>
                        <div class="roadmap-block">
                            <h2 class="h2_20 color-gray2">2020 February</h2>
                            <div class="steps">
                    <span class="text_17"
                    >Daily trading volume surpasses $2 billion</span
                    >
                                <span class="text_17"
                                >USDT has been added to the platform</span
                                >
                            </div>
                        </div>
                    </div>
                    <div class="roadmap-grid-block">
                        <div class="roadmap-block">
                            <h2 class="h2_20 color-gray2">2021 May</h2>
                            <div class="steps">
                                <span class="text_17">Launched Spot trading platform</span>
                                <span class="text_17">Added BEP20 network</span>
                                <span class="text_17">Added TRC20 network</span>
                                <span class="text_17"
                                >Hit an ATH trading volume of $35 billion</span
                                >
                            </div>
                        </div>
                        <div class="roadmap-block">
                            <h2 class="h2_20 color-gray2">2022 August</h2>
                            <div class="steps">
                    <span class="text_17"
                    >Became the Principal Team Partner of Oracle Red Bull
                      Racing</span
                    >
                                <span class="text_17">Enhanced account security</span>
                                <span class="text_17">Simplified login process</span>
                                <span class="text_17">Scalable trading engine</span>
                                <span class="text_17">Faster and automated withdrawals</span>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </section>
</main>
<?php echo $__env->yieldContent("footer"); ?>
</body>
</html>
<?php /**PATH /Users/nikita/PhpstormProjects/house/resources/views/about.blade.php ENDPATH**/ ?>