@include('layouts.head')
@include('layouts.header')
@include('layouts.footer')
    <!doctype html>
<html lang="en">
<head>
    <link rel="stylesheet" href="{{asset("css/jquery-ui.min.css")}}"/>
    <link rel="stylesheet" href="{{asset("css/iziToast.css")}}"/>
    <link rel="stylesheet" href="{{asset("css/iziModal.min.css")}}"/>
    <link rel="stylesheet" href="{{asset("css/iziModal.min.css")}}"/>
    <link rel="stylesheet" href="{{asset("css/custom-select.css")}}"/>
    @yield("head")
</head>
<body>
@yield("header")
<main class="referral h100">
    <section class="referral">
        <div class="container">
            <div class="referral-content">
                <h1 class="h2_40 mb40 pt20">Referral system</h1>
                <h2>Referral system</h2>
                <p>
                    The referral system on our exchange is divided into three stages:
                    A: a group of people who registered directly with your link; B:
                    friends of your referrals, who, in turn, were invited by category
                    “A” referrals and registered by their referral code; C: registered
                    users on a referral link of a referral from category “B”
                </p>
                <h2>Who are referrals and why are they needed?</h2>
                <p>
                    A referral is a partner program participant who has registered on
                    the recommendation of another participant. A referral is also a
                    full-fledged user of the Cryptohouse Exchange, without any
                    restrictions. The person who brought the new member to the project
                    will receive a commission (referral). Accordingly, the more people
                    click on the link, the more passive earnings the referrer will
                    have
                </p>
                <h2>What kind of reward awaits you?</h2>
                <p>
                    As we mentioned above, the updated referral system includes as
                    many as three stages of referrals, respectively, the rewards will
                    also vary for you depending on your category. For category A
                    referrals you get 50% of the commission, category B referrals will
                    bring you 10%, and for category C you will get 2.5% of the
                    commission. <br /><br />For each referral you will receive your
                    percentage, but this percentage will depend on the referral
                    category: A, B or C. <br /><br />
                    At the moment, the referral system and the ability to create an
                    unlimited number of referral codes are only available to premium
                    users. <br /><br />Cryptohouse referral program packs these key
                    features: <br /> <b style="color: var(--Dark)"> No referral limits - You can refer as many friends
                        as possible; you and your friends will each get refferal bonus in
                        BTC equivalent after they complete their verification. <br />
                        Anyone can participate - Available for all eligible Trading users,
                        no BTC/ETH/BCH staking required to refer friends. <br />Bonus
                        credited instantly - Your friends can use their sign-up bonus
                        immediately after they passing verification. <br />Get rewards for
                        your friends deposit - For each new friend you will receive 0.01%
                        (in BTC) of the sum of all his deposits.</b>
                </p>
            </div>
        </div>
    </section>
</main>
@yield("footer")
</body>
</html>
