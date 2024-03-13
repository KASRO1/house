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
<main class="mainfaq">
    <section class="faq">
        <div class="container">
            @if($Domain['faq'])
            <div class="faq-content">
                <h2 class="h2_40 pb40">FREQUENTLY ASKED QUESTIONS</h2>
                <div class="faq-container">
                    <div class="accordion">
                        @foreach(json_decode($Domain['faq'], 1) as $el)
                        <div class="accordion-item">
                            <button id="accordion-button-1" aria-expanded="false">
                                <div class="accordion-start">
                      <span class="accordion-title">
                        {{$el['vopros']}}
                      </span>
                                </div>
                                <img
                                    class="icon active"
                                    src="{{asset('images/faqarrow.svg')}}"
                                    alt=""
                                />
                            </button>
                            <div class="accordion-content">
                                <p>{{$el['otvet']}}</p>
                            </div>
                        </div>
                        @endforeach
                    </div>
                </div>
                @else
                <div class="faq-container">
                    <div class="accordion">
                        <div class="accordion-item">
                            <button id="accordion-button-1" aria-expanded="false">
                                <div class="accordion-start">
                      <span class="accordion-title">
                        What is cryptocurrency?
                      </span>
                                </div>
                                <img
                                    class="icon active"
                                    src="{{asset('images/faqarrow.svg')}}"
                                    alt=""
                                />
                            </button>
                            <div class="accordion-content">
                                <p>
                                    Cryptocurrency is a type of virtual currency that uses
                                    cryptography to secure transactions that are digitally
                                    recorded on a distributed ledger, such as a blockchain. A
                                    transaction involving cryptocurrency that is recorded on a
                                    distributed ledger is referred to as an “on-chain”
                                    transaction; a transaction that is not recorded on the
                                    distributed ledger is referred to as an “off-chain”
                                    transaction.
                                </p>
                            </div>
                        </div>
                        <div class="accordion-item">
                            <button id="accordion-button-1" aria-expanded="false">
                                <div class="accordion-start">
                      <span class="accordion-title">
                        Is it safe to use {{$Domain ? $Domain['title'] :  "CRYPTOHOUSE"}} exchange?
                      </span>
                                </div>
                                <img
                                    class="icon active"
                                    src="{{asset('images/faqarrow.svg')}}"
                                    alt=""
                                />
                            </button>
                            <div class="accordion-content">
                                <p>
                                    Yes! The main priority in our work is the security of our
                                    clients personal data and safety. We use advanced methods
                                    and technologies in the field of security. We implemented
                                    two-factor authentication technology to protect your
                                    accounts, as well as Anti Phishing, which helps to ensure
                                    the reliability of our exchange. More than 95% of all
                                    currency is stored on cold wallets. WAF (Web Application
                                    Firewall) - a protective screen of a Web application that
                                    detects and blocks hacker attacks.
                                </p>
                            </div>
                        </div>
                        <div class="accordion-item">
                            <button id="accordion-button-1" aria-expanded="false">
                                <div class="accordion-start">
                      <span class="accordion-title">
                        How to log in to my account?
                      </span>
                                </div>
                                <img
                                    class="icon active"
                                    src="{{asset('images/faqarrow.svg')}}"
                                    alt=""
                                />
                            </button>
                            <div class="accordion-content">
                                <p>
                                    Click login. In this window enter your email address,
                                    password and captcha. Click the Login button. You are
                                    logged into your account. Now you can deposit or start
                                    trading. We also recommend that you log into your personal
                                    account and enable two-factor authentication.
                                </p>
                            </div>
                        </div>
                        <div class="accordion-item">
                            <button id="accordion-button-1" aria-expanded="false">
                                <div class="accordion-start">
                      <span class="accordion-title">
                        How to register an account?
                      </span>
                                </div>
                                <img
                                    class="icon active"
                                    src="{{asset('images/faqarrow.svg')}}"
                                    alt=""
                                />
                            </button>
                            <div class="accordion-content">
                                <p>
                                    Click register. In this window, enter your email address,
                                    password, password confirmation, captcha and agree to the
                                    Terms of Use. Click the "Register" button. Welcome to the
                                    Exchange!
                                </p>
                            </div>
                        </div>
                        <div class="accordion-item">
                            <button id="accordion-button-1" aria-expanded="false">
                                <div class="accordion-start">
                      <span class="accordion-title">
                        Can I delete my account?
                      </span>
                                </div>
                                <img
                                    class="icon active"
                                    src="{{asset('images/faqarrow.svg')}}"
                                    alt=""
                                />
                            </button>
                            <div class="accordion-content">
                                <p>
                                    This option is not available. You can block the account.
                                    To do this, you can create a corresponding ticket in the
                                    technical support, where you need to specify a valid
                                    e-mail as well as the KYC data.
                                </p>
                            </div>
                        </div>
                        <div class="accordion-item">
                            <button id="accordion-button-1" aria-expanded="false">
                                <div class="accordion-start">
                      <span class="accordion-title">
                        What is KYC and why is it needed?
                      </span>
                                </div>
                                <img
                                    class="icon active"
                                    src="{{asset('images/faqarrow.svg')}}"
                                    alt=""
                                />
                            </button>
                            <div class="accordion-content">
                                <p>
                                    Know your customer (abbreviated KYC) is the term of
                                    banking and exchange regulation for financial institutions
                                    and bookmakers, as well as other companies working with
                                    private money, meaning that they must identify and
                                    establish the identity of the counterparty before
                                    conducting a financial transaction.This requirement
                                    extends to obtaining reasonably complete information about
                                    counterparties-legal entities, the nature of their
                                    business and certain business transactions for which a
                                    financial transaction is being conducted.
                                </p>
                            </div>
                        </div>
                        <div class="accordion-item">
                            <button id="accordion-button-1" aria-expanded="false">
                                <div class="accordion-start">
                      <span class="accordion-title">
                        How can I deposit cryptocurrency?
                      </span>
                                </div>
                                <img
                                    class="icon active"
                                    src="{{asset('images/faqarrow.svg')}}"
                                    alt=""
                                />
                            </button>
                            <div class="accordion-content">
                                <p>
                                    Go to the Assets page. To replenish your balance, click
                                    "Deposit".
                                </p>
                            </div>
                        </div>
                        <div class="accordion-item">
                            <button id="accordion-button-1" aria-expanded="false">
                                <div class="accordion-start">
                      <span class="accordion-title">
                        I did a deposit several days ago, but it still hasn't
                        been received. What do I do?
                      </span>
                                </div>
                                <img
                                    class="icon active"
                                    src="{{asset('images/faqarrow.svg')}}"
                                    alt=""
                                />
                            </button>
                            <div class="accordion-content">
                                <p>
                                    Please send us a hash of your transaction and we will
                                    check all the information.
                                </p>
                            </div>
                        </div>
                        <div class="accordion-item">
                            <button id="accordion-button-1" aria-expanded="false">
                                <div class="accordion-start">
                      <span class="accordion-title">
                        How do I cancel a withdrawal request?
                      </span>
                                </div>
                                <img
                                    class="icon active"
                                    src="{{asset('images/faqarrow.svg')}}"
                                    alt=""
                                />
                            </button>
                            <div class="accordion-content">
                                <p>
                                    This option is not available. You can still contact our
                                    support, we will do everything possible to help you solve
                                    the issue.
                                </p>
                            </div>
                        </div>
                        <div class="accordion-item">
                            <button id="accordion-button-1" aria-expanded="false">
                                <div class="accordion-start">
                      <span class="accordion-title">
                        Can I connect a bank account to my account?
                      </span>
                                </div>
                                <img
                                    class="icon active"
                                    src="{{asset('images/faqarrow.svg')}}"
                                    alt=""
                                />
                            </button>
                            <div class="accordion-content">
                                <p>
                                    Unfortunately, this option is currently unavailable on our
                                    exchange.
                                </p>
                            </div>
                        </div>
                        <div class="accordion-item">
                            <button id="accordion-button-1" aria-expanded="false">
                                <div class="accordion-start">
                      <span class="accordion-title">
                        How to enable the two-factor authentication?
                      </span>
                                </div>
                                <img
                                    class="icon active"
                                    src="{{asset('images/faqarrow.svg')}}"
                                    alt=""
                                />
                            </button>
                            <div class="accordion-content">
                                <p>
                                    Download the Google Authenticator app from Play Market or
                                    AppStore. Go to your account and select the 2FA section.
                                    Scan the QR code in the downloaded app or enter the number
                                    manually. After the “{{$Domain ? $Domain['title'] :  "CRYPTOHOUSE"}}” tab appears in the
                                    application, enter the authentication code in a special
                                    field. You're all set, you've enabled two-factor
                                    authentication!
                                </p>
                            </div>
                        </div>
                        <div class="accordion-item">
                            <button id="accordion-button-1" aria-expanded="false">
                                <div class="accordion-start">
                      <span class="accordion-title">
                        What if I lost the code / key to two-factor
                        authentication?
                      </span>
                                </div>
                                <img
                                    class="icon active"
                                    src="{{asset('images/faqarrow.svg')}}"
                                    alt=""
                                />
                            </button>
                            <div class="accordion-content">
                                <p>
                                    You need to provide KYC data, account login, as well as
                                    data of the latest currency deposits and withdrawals and
                                    send this information to support.
                                </p>
                            </div>
                        </div>
                        <div class="accordion-item">
                            <button id="accordion-button-1" aria-expanded="false">
                                <div class="accordion-start">
                      <span class="accordion-title">
                        How long does it take to receive a response from the
                        support team?
                      </span>
                                </div>
                                <img
                                    class="icon active"
                                    src="{{asset('images/faqarrow.svg')}}"
                                    alt=""
                                />
                            </button>
                            <div class="accordion-content">
                                <p>
                                    For the convenience of our users, we have a customer
                                    support service that works 7 days a week and 24 hours a
                                    day without breaks and holidays. If you have any
                                    questions, wishes or suggestions, our specialists are
                                    always ready to help you with any problem, and also to
                                    hear your suggestions for improving the service. We will
                                    do our best to reply ASAP.
                                </p>
                            </div>
                        </div>
                        <div class="accordion-item">
                            <button id="accordion-button-1" aria-expanded="false">
                                <div class="accordion-start">
                      <span class="accordion-title">
                        Can I cancel an trade order?
                      </span>
                                </div>
                                <img
                                    class="icon active"
                                    src="{{asset('images/faqarrow.svg')}}"
                                    alt=""
                                />
                            </button>
                            <div class="accordion-content">
                                <p>
                                    Yes, to cancel an order, please go to the Trade page.
                                    Please note that you can only cancel those orders that
                                    have not yet been accepted, since once the order is
                                    executed, such transaction is irreversible and can not be
                                    canceled.
                                </p>
                            </div>
                        </div>
                        <div class="accordion-item">
                            <button id="accordion-button-1" aria-expanded="false">
                                <div class="accordion-start">
                      <span class="accordion-title">
                        Where can I see the history of my orders?
                      </span>
                                </div>
                                <img
                                    class="icon active"
                                    src="{{asset('images/faqarrow.svg')}}"
                                    alt=""
                                />
                            </button>
                            <div class="accordion-content">
                                <p>
                                    You can see the history of your transactions on the
                                    Trading page.
                                </p>
                            </div>
                        </div>
                        <div class="accordion-item">
                            <button id="accordion-button-1" aria-expanded="false">
                                <div class="accordion-start">
                      <span class="accordion-title">
                        I issued a Buy Order for 100 coins, with only 20 coins
                        credited to me. Why?
                      </span>
                                </div>
                                <img
                                    class="icon active"
                                    src="{{asset('images/faqarrow.svg')}}"
                                    alt=""
                                />
                            </button>
                            <div class="accordion-content">
                                <p>
                                    A partial completion of the Order took place. Please wait
                                    till the Order for the rest of the coins is accepted.
                                </p>
                            </div>
                        </div>
                        <div class="accordion-item">
                            <button id="accordion-button-1" aria-expanded="false">
                                <div class="accordion-start">
                      <span class="accordion-title">
                        When will my Order be processed?
                      </span>
                                </div>
                                <img
                                    class="icon active"
                                    src="{{asset('images/faqarrow.svg')}}"
                                    alt=""
                                />
                            </button>
                            <div class="accordion-content">
                                <p>
                                    Please pay attention that the administration of the site
                                    does not accept, control or interfere with trading on the
                                    exchange. Please wait until another user accepts your
                                    Order. Alternatively, you can cancel an open order and
                                    submit a new order with a more competitive price.
                                </p>
                            </div>
                        </div>
                    </div>
                </div>
                @endif
            </div>
        </div>
    </section>
</main>
@yield("footer")
<script>
    const items = document.querySelectorAll(".accordion button");

    function toggleAccordion() {
        const itemToggle = this.getAttribute("aria-expanded");
        for (i = 0; i < items.length; i++) {
            items[i].setAttribute("aria-expanded", "false");
        }
        if (itemToggle == "false") {
            this.setAttribute("aria-expanded", "true");
        }
    }

    items.forEach((item) => item.addEventListener("click", toggleAccordion));
</script>
</body>
</html>
