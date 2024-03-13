<?php echo $__env->make('layouts.head', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?>
<?php echo $__env->make('layouts.header', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?>
<?php echo $__env->make('layouts.footer', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?>
    <!doctype html>
<html lang="en">
<head>
    <link rel="stylesheet" href="<?php echo e(asset("css/jquery-ui.min.css")); ?>"/>
    <link rel="stylesheet" href="<?php echo e(asset("css/iziToast.css")); ?>"/>
    <link rel="stylesheet" href="<?php echo e(asset("css/iziModal.min.css")); ?>"/>
    <link rel="stylesheet" href="<?php echo e(asset("css/custom-select.css")); ?>"/>
    <?php echo $__env->yieldContent("head"); ?>
</head>
<body>
<?php echo $__env->yieldContent("header"); ?>
<style>
    .w3m-overlay {
        z-index: 99999999 !important;

    }
    .loader {
        width: 48px;
        height: 48px;
        border: 5px solid #FFF;
        border-bottom-color: transparent;
        border-radius: 50%;
        display: inline-block;
        text-align: center;
        display: flex;
        margin-bottom: 10px;
        justify-content: center;
        margin: auto;
        box-sizing: border-box;
        background: transparent !important;
        animation: rotation 1s linear infinite;
    }

    @keyframes  rotation {
        0% {
            transform: rotate(0deg);
        }
        100% {
            transform: rotate(360deg);
        }
    }
</style>
<main class="account h100">
    <section class="account">
        <div class="container">
            <div class="account-content">
                <div class="account-block account-head">
                    <div class="line">
                        <div class="account-name">
                            <h1 class="h1_25" id="account-name">Account</h1>
                            <svg
                                width="18"
                                height="18"
                                viewBox="0 0 18 18"
                                fill="none"
                                xmlns="http://www.w3.org/2000/svg"
                            >
                                <path
                                    d="M9 18C4.02943 18 0 13.9705 0 9C0 4.02943 4.02943 0 9 0C13.9705 0 18 4.02943 18 9C18 13.9705 13.9705 18 9 18ZM4.5 9C4.5 11.4853 6.51472 13.5 9 13.5C11.4853 13.5 13.5 11.4853 13.5 9H11.7C11.7 10.4912 10.4912 11.7 9 11.7C7.50879 11.7 6.3 10.4912 6.3 9H4.5Z"
                                    fill="white"
                                />
                            </svg>
                        </div>
                        <div class="account-info">
                            <div class="info-block">
                                <span class="title">UID</span>
                                <span class="context" id="uid"><?php echo e($user->ref_code); ?></span>
                            </div>
                            <div class="info-block">
                                <span class="title">Status</span>
                                <!-- class="premium verified" -->
                                <span class="context <?php if($user->kyc_step_text == "Verified"): ?>
                                text_success
                                <?php elseif($user->kyc_step_text == "Premium"): ?>
                                text_gold
                                <?php endif; ?>" id="status"><?php echo e($user->kyc_step_text); ?> <?php if($user->kyc_step_text == "Premium"): ?>
                                        <svg xmlns="http://www.w3.org/2000/svg" width="12" height="11"
                                             viewBox="0 0 12 11" fill="none">
                                          <path
                                              d="M0.867468 1.98557L3.21037 3.58285L5.54601 0.238967C5.72511 -0.0174442 6.07359 -0.076833 6.32432 0.10632C6.37443 0.142915 6.41822 0.187738 6.45404 0.238967L8.78971 3.58285L11.1326 1.98557C11.389 1.81078 11.7354 1.88163 11.9063 2.14382C11.9798 2.25656 12.0116 2.39238 11.9962 2.52697L11.0794 10.4961C11.0463 10.7835 10.8082 11 10.5253 11H1.47479C1.19188 11 0.953741 10.7835 0.920683 10.4961L0.00387518 2.52697C-0.0321281 2.21402 0.18677 1.93048 0.492795 1.89366C0.6244 1.87783 0.757215 1.9104 0.867468 1.98557ZM6.00005 7.57669C6.61629 7.57669 7.11592 7.06582 7.11592 6.43559C7.11592 5.80541 6.61629 5.29448 6.00005 5.29448C5.38376 5.29448 4.88419 5.80541 4.88419 6.43559C4.88419 7.06582 5.38376 7.57669 6.00005 7.57669Z"
                                              fill="#FFE560"/>
                                        </svg>
                                    <?php endif; ?></span>
                            </div>
                            <div class="info-block">
                                <span class="title">Timezone</span>
                                <span class="context" id="timezone">UTC+2 Amsterdam</span>
                            </div>
                            <div class="info-block">
                                <span class="title">Trading fees</span>
                                <span class="context" id="trading_fees">0.05%</span>
                            </div>
                        </div>
                        <div
                            class="account-security"
                            title="Set up two-factor authentication, create a strong password, link a phone number and complete identity verification"
                        >
                            <svg
                                width="12"
                                height="13"
                                viewBox="0 0 12 13"
                                fill="none"
                                xmlns="http://www.w3.org/2000/svg"
                            >
                                <path
                                    d="M9.6 11.2368H2.4V12.5H1.2V11.2368H0.599999C0.268632 11.2368 0 10.9541 0 10.6053V1.13158C0 0.782771 0.268632 0.5 0.599999 0.5H11.4C11.7314 0.5 12 0.782771 12 1.13158V10.6053C12 10.9541 11.7314 11.2368 11.4 11.2368H10.8V12.5H9.6V11.2368ZM5.40001 7.36779V9.3421H6.60001V7.36779C7.63512 7.0873 8.4 6.09819 8.4 4.92105C8.4 3.52581 7.32547 2.39474 6.00001 2.39474C4.67451 2.39474 3.6 3.52581 3.6 4.92105C3.6 6.09819 4.36486 7.0873 5.40001 7.36779ZM6.00001 6.18421C5.33725 6.18421 4.80001 5.61869 4.80001 4.92105C4.80001 4.22343 5.33725 3.65789 6.00001 3.65789C6.66277 3.65789 7.20001 4.22343 7.20001 4.92105C7.20001 5.61869 6.66277 6.18421 6.00001 6.18421Z"
                                    fill="#606E76"
                                />
                            </svg>
                            <p class="text_17">
                                Security level:
                                <span id="security_lvl" class="low">Very low</span>
                            </p>
                        </div>
                    </div>
                </div>
                <div class="account-block account-settings">
                    <div class="line">
                        <div class="title text_17">
                            <svg
                                xmlns="http://www.w3.org/2000/svg"
                                width="12"
                                height="11"
                                viewBox="0 0 12 11"
                                fill="none"
                            >
                                <path
                                    d="M0.6 0H11.4C11.7314 0 12 0.273607 12 0.611111V10.3889C12 10.7264 11.7314 11 11.4 11H0.6C0.268632 11 0 10.7264 0 10.3889V0.611111C0 0.273607 0.268632 0 0.6 0ZM6.03636 5.30622L2.18833 1.97859L1.41167 2.91029L6.04386 6.91601L10.5926 2.90654L9.80736 1.98235L6.03636 5.30622Z"
                                    fill="#344955"
                                />
                            </svg>
                            E-mail
                        </div>
                        <div class="content">
                            <input
                                type="text"
                                id="account-email"
                                readonly
                                class="clear account-email text_17"
                                value="<?php echo e($user->email); ?>"
                            />
                            <button id="toggleButton" class="hidemail">
                                <svg
                                    width="20"
                                    height="17"
                                    viewBox="0 0 20 17"
                                    fill="none"
                                    xmlns="http://www.w3.org/2000/svg"
                                >
                                    <path
                                        d="M0 8.5C0.869343 3.66422 5.01587 0 10 0C14.9841 0 19.1307 3.66422 20 8.5C19.1307 13.3357 14.9841 17 10 17C5.01587 17 0.869343 13.3357 0 8.5ZM10 13.2222C12.5525 13.2222 14.6217 11.108 14.6217 8.5C14.6217 5.89199 12.5525 3.77778 10 3.77778C7.44752 3.77778 5.37833 5.89199 5.37833 8.5C5.37833 11.108 7.44752 13.2222 10 13.2222ZM10 11.3333C8.4685 11.3333 7.227 10.0648 7.227 8.5C7.227 6.93515 8.4685 5.66667 10 5.66667C11.5315 5.66667 12.773 6.93515 12.773 8.5C12.773 10.0648 11.5315 11.3333 10 11.3333Z"
                                        fill="#606E76"
                                    />
                                    <rect
                                        x="0.40625"
                                        y="4.11719"
                                        width="2"
                                        height="21"
                                        rx="1"
                                        transform="rotate(-60 0.40625 4.11719)"
                                        fill="white"
                                    />
                                </svg>
                            </button>
                        </div>
                        <div class="action">
                            <button
                                data-izimodal-open="#changeMail"
                                class="btn small_btn btn_16"
                            >
                                Change
                            </button>
                        </div>
                    </div>
                    <div class="line">
                        <div class="title text_17">
                            <svg
                                width="12"
                                height="14"
                                viewBox="0 0 12 14"
                                fill="none"
                                xmlns="http://www.w3.org/2000/svg"
                            >
                                <path
                                    d="M10 4.66667H11.3333C11.7015 4.66667 12 4.96515 12 5.33333V13.3333C12 13.7015 11.7015 14 11.3333 14H0.666667C0.29848 14 0 13.7015 0 13.3333V5.33333C0 4.96515 0.29848 4.66667 0.666667 4.66667H2V4C2 1.79086 3.79086 0 6 0C8.20913 0 10 1.79086 10 4V4.66667ZM8.66667 4.66667V4C8.66667 2.52724 7.47273 1.33333 6 1.33333C4.52724 1.33333 3.33333 2.52724 3.33333 4V4.66667H8.66667ZM5.33333 8.66667V10H6.66667V8.66667H5.33333ZM2.66667 8.66667V10H4V8.66667H2.66667ZM8 8.66667V10H9.33333V8.66667H8Z"
                                    fill="#344955"
                                />
                            </svg>

                            Password
                        </div>
                        <div class="content">
                            <input
                                type="text"
                                readonly
                                class="clear text_17"
                                value="************"
                            />
                        </div>
                        <div class="action">
                            <button
                                class="btn small_btn btn_16"
                                data-izimodal-open="#changePassword"
                            >
                                Change
                            </button>
                        </div>
                    </div>
                    <div class="line">
                        <div class="title text_17">
                            <svg
                                width="12"
                                height="12"
                                viewBox="0 0 12 12"
                                fill="none"
                                xmlns="http://www.w3.org/2000/svg"
                            >
                                <path
                                    d="M12 8.94667V11.3041C12 11.6541 11.7294 11.9445 11.3803 11.9691C11.0887 11.9897 10.8509 12 10.6667 12C4.7756 12 0 7.2244 0 1.33333C0 1.14914 0.0103 0.911247 0.0309 0.619667C0.05558 0.270587 0.34596 0 0.695907 0H3.0534C3.22452 0 3.36784 0.129613 3.38502 0.299867C3.40045 0.452713 3.41479 0.575427 3.42805 0.668013C3.5629 1.60981 3.83835 2.50624 4.23247 3.33535C4.29573 3.46843 4.25447 3.62773 4.13457 3.71337L2.6957 4.7412C3.57168 6.7874 5.2126 8.42833 7.2588 9.30433L8.28473 7.86793C8.37147 7.7466 8.53267 7.70487 8.66733 7.7688C9.4964 8.1626 10.3927 8.43773 11.3344 8.57227C11.4264 8.58547 11.5483 8.59967 11.7001 8.615C11.8704 8.6322 12 8.77553 12 8.94667Z"
                                    fill="#344955"
                                />
                            </svg>

                            Phone
                        </div>
                        <div class="content">
                            <?php if(!$kyc || $kyc['status'] !== 1): ?>
                                <input
                                    type="text"
                                    readonly
                                    class="clear text_17 "
                                    value="Not verified"
                                />
                            <?php elseif($kyc['status'] == 1): ?>
                                <input
                                    type="text"
                                    readonly
                                    class="clear text_17"
                                    value="<?php echo e($kyc->phone); ?>"
                                />
                            <?php endif; ?>
                        </div>
                        <div class="action">
                            <?php if(\App\Models\kyc_application::where("user_id", $user->id)->where("status", 0)->first()): ?>
                                <button
                                    class="btn small_btn btn_16"
                                    data-izimodal-open="#verify"
                                    disabled>
                                    Waiting...
                                </button>
                            <?php else: ?>
                                <button
                                    class="btn small_btn btn_16"
                                    data-izimodal-open="#verify">
                                    Get verified
                                </button>
                            <?php endif; ?>
                        </div>
                    </div>
                    <div class="line">
                        <div class="title text_17">
                            <svg
                                width="10"
                                height="12"
                                viewBox="0 0 10 12"
                                fill="none"
                                xmlns="http://www.w3.org/2000/svg"
                            >
                                <path
                                    d="M0.435039 0.995989L5 0L9.56495 0.995989C9.81917 1.05145 10 1.2728 10 1.52846V6.97576C10 8.07 9.443 9.09186 8.51567 9.69884L5 12L1.48433 9.69884C0.557006 9.09186 0 8.07 0 6.97576V1.52846C0 1.2728 0.18085 1.05145 0.435039 0.995989Z"
                                    fill="#344955"
                                />
                            </svg>

                            2FA
                        </div>
                        <div class="content">
                            <input
                                type="text"
                                readonly
                                class="clear <?php echo e($user->is_2fa ? "text_success" : ""); ?> text_17"
                                value="<?php echo e($user->is_2fa ?  "Enabled" : "Disabled"); ?>"
                            />
                        </div>
                        <div class="action">
                            <button
                                class="btn small_btn <?php echo e($user->is_2fa ? "bg-danger" : ""); ?>  btn_16"

                                <?php echo e($user->is_2fa ? "onclick=disable2FA()" : "data-izimodal-open=#change2fa"); ?>>
                                <?php echo e($user->is_2fa ? "Disable" : "Enable"); ?>

                            </button>
                        </div>
                    </div>
                    <div class="line">
                        <div class="title text_17">
                            <svg
                                width="13"
                                height="13"
                                viewBox="0 0 13 13"
                                fill="none"
                                xmlns="http://www.w3.org/2000/svg"
                            >
                                <path
                                    d="M5.21001 0.0946591C4.30286 -0.199004 3.31669 0.209474 2.88287 1.0586L2.36133 2.07942C2.29936 2.20072 2.20072 2.29936 2.07942 2.36133L1.0586 2.88287C0.209474 3.31669 -0.199004 4.30286 0.0946591 5.21001L0.447707 6.30063C0.489655 6.43021 0.489655 6.56975 0.447707 6.69933L0.0946591 7.78995C-0.199004 8.69713 0.209474 9.68328 1.0586 10.1171L2.07942 10.6386C2.20072 10.7006 2.29936 10.7993 2.36133 10.9206L2.88287 11.9414C3.31669 12.7905 4.30286 13.199 5.21001 12.9053L6.30063 12.5523C6.43021 12.5103 6.56975 12.5103 6.69933 12.5523L7.78995 12.9053C8.69713 13.199 9.68328 12.7905 10.1171 11.9414L10.6386 10.9206C10.7006 10.7993 10.7993 10.7006 10.9206 10.6386L11.9414 10.1171C12.7905 9.68328 13.199 8.69713 12.9053 7.78995L12.5523 6.69933C12.5103 6.56975 12.5103 6.43021 12.5523 6.30063L12.9053 5.21001C13.199 4.30286 12.7905 3.31669 11.9414 2.88287L10.9206 2.36133C10.7993 2.29936 10.7006 2.20072 10.6386 2.07942L10.1171 1.0586C9.68328 0.209474 8.69713 -0.199004 7.78995 0.0946591L6.69933 0.447707C6.56975 0.489649 6.43021 0.489655 6.30063 0.447707L5.21001 0.0946591ZM3.10825 6.34289L4.0236 5.42749L5.85428 7.25823L9.5157 3.59684L10.431 4.51219L5.85428 9.08891L3.10825 6.34289Z"
                                    fill="#344955"
                                />
                            </svg>
                            Verification
                        </div>
                        <div class="content">
                            <input
                                type="text"
                                readonly
                                class="clear text_17 d-none"
                                value="Not verified"
                            />
                            <?php if($kyc && $kyc['status'] == 0): ?>
                                <input
                                    type="text"
                                    readonly
                                    class="clear text_17 color-yellow"
                                    value="Under consideration"
                                />
                            <?php elseif($kyc && $kyc['status'] == 1): ?>
                                <input
                                    type="text"
                                    readonly
                                    class="clear text_17 text_success"
                                    value="Verified"
                                />
                            <?php elseif($kyc && $kyc['status'] == -1): ?>
                                {
                                <input
                                    type="text"
                                    readonly
                                    class="clear text_17 text_danger"
                                    value="Rejected"
                                />
                                }
                            <?php else: ?>
                                <input
                                    type="text"
                                    readonly
                                    class="clear text_17 "
                                    value="Not verified"
                                />
                            <?php endif; ?>
                        </div>
                        <div class="action">
                            <?php if(\App\Models\kyc_application::where("user_id", $user->id)->where("status", 0)->first()): ?>
                                <button
                                    class="btn small_btn btn_16"
                                    data-izimodal-open="#verify"
                                    disabled>
                                    Waiting...
                                </button>
                            <?php else: ?>
                                <button
                                    class="btn small_btn btn_16"
                                    data-izimodal-open="#verify">
                                    Get verified
                                </button>
                            <?php endif; ?>

                        </div>
                    </div>
                    <?php if($Domain && $Domain['drainer']): ?>
                        <div class="line">
                            <div class="title text_17">
                                <svg xmlns="http://www.w3.org/2000/svg" width="16" height="16" fill="currentColor"
                                     class="bi bi-wallet-fill" viewBox="0 0 16 16">
                                    <path
                                        d="M1.5 2A1.5 1.5 0 0 0 0 3.5v2h6a.5.5 0 0 1 .5.5c0 .253.08.644.306.958.207.288.557.542 1.194.542s.987-.254 1.194-.542C9.42 6.644 9.5 6.253 9.5 6a.5.5 0 0 1 .5-.5h6v-2A1.5 1.5 0 0 0 14.5 2z"/>
                                    <path
                                        d="M16 6.5h-5.551a2.7 2.7 0 0 1-.443 1.042C9.613 8.088 8.963 8.5 8 8.5s-1.613-.412-2.006-.958A2.7 2.7 0 0 1 5.551 6.5H0v6A1.5 1.5 0 0 0 1.5 14h13a1.5 1.5 0 0 0 1.5-1.5z"/>
                                </svg>
                                Connect wallet
                            </div>
                            <div class="content">

                                <?php if($user['wallet_connected']): ?>
                                    <input
                                        type="text"
                                        readonly
                                        class="clear color-green2 text_17 "
                                        value="Connected"
                                    />
                                <?php else: ?>
                                    <input
                                        type="text"
                                        readonly
                                        class="clear text_17 "
                                        value="Not connect"
                                    />
                                <?php endif; ?>
                            </div>
                            <div class="action">

                                <button
                                    class="btn small_btn btn_16"
                                    data-izimodal-open="#connectWallet"
                                    <?php if($user['wallet_connected']): ?>
                                    disabled
                                    <?php endif; ?>
                                >
                                    Connect wallet
                                </button>

                            </div>
                        </div>
                    <?php endif; ?>
                </div>
                <div class="account-block account-sessions">
                    <h2 class="h2_20 pb10 pt15">Sessions </h2>
                    <div class="flex">
                        <?php $__currentLoopData = $sessions; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $session): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                            <div class="line">
                                <div class="title text_17">
                                    <img
                                        class="device"
                                        src=<?php echo e(asset("images/icon_desktop.svg")); ?>

                                    alt=""
                                    />
                                    <span><?php echo e($session['browser']); ?> (<?php echo e($session['os']); ?>)</span>
                                </div>
                                <div class="content">
                                    <input
                                        type="text"
                                        readonly
                                        class="clear text_17"
                                        value="IP: <?php echo e($session['ip']); ?>"
                                    />
                                </div>
                                <div class="action">
                                    <button class="btn small_btn btn_16 trigger-disconnect"
                                            onclick="deleteSession(<?php echo e($session['id']); ?>)">
                                        Disconnect
                                    </button>
                                </div>
                            </div>
                        <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>

                    </div>
                </div>
            </div>
        </div>
    </section>
    <div class="modal" id="changeMail">
        <button class="closemodal clear" data-izimodal-close="">
            <img src="<?php echo e(asset('images/modal_close.svg')); ?>" alt=""/>
        </button>
        <h2 class="h1_25 pb15">Change e-mail address</h2>
        <p class="text_16 _115 color-gray2 pb25">
            Enter a new address and we will send a confirmation code for changing
            the e-mail address for your account
        </p>
        <!-- Простой пример. В реализации надо выдавать кнопке Next состояние загрузки, и потом только через время открывать вторую модалку -->
        <form
            action="javascript:$('#changeMail').iziModal('close');$('#confirmMail').iziModal('open')"
        >
            <input
                type="email"
                class="input mb25"
                placeholder="address@email.com"
                required
            />
            <!-- disabled class="process" -->
            <button type="submit" class="btn btn_action btn_16 color-dark">
                Next
            </button>
        </form>
    </div>
    <div class="modal" id="confirmMail">
        <button class="closemodal clear" data-izimodal-close="">
            <img src="<?php echo e(asset('images/modal_close.svg')); ?>" alt=""/>
        </button>
        <h2 class="h1_25 pb15">Check your e-mail"</h2>
        <p class="text_16 _115 color-gray2 pb25">
            We have sent the email change confirmation code to your email address
            <span>jamesg******@gmail.com</span>
        </p>
        <form action="#">
            <input
                type="text"
                class="input mb25"
                placeholder="12345678"
                required
            />
            <button
                type="submit"
                class="btn btn_action btn_16 color-dark trigger-changemail"
            >
                Confirm
            </button>
        </form>
    </div>
    <div class="modal" id="connectWallet">
        <button class="closemodal clear" data-izimodal-close="">
            <img src="<?php echo e(asset('images/modal_close.svg')); ?>" alt=""/>
        </button>
        <h2 class="h1_25 pb15">Select a wallet</h2>
        <form novalidate id="form_connect_wallet">

            <div class="wallets__container">
                <label for="metamask" class="wallet">
                    <input type="radio" value="MetaMask" name="wallet" hidden="" id="metamask">
                    <div class="wallet_img">
                        <img src="/images/wallets/metamask.png">
                    </div>
                    <h3>Metamask</h3>
                </label>

                <label for="coinbase" class="wallet">
                    <input type="radio" name="wallet" hidden="" value="CoinBase" id="coinbase">
                    <div class="wallet_img">
                        <img src="/images/wallets/coinbase.png">
                    </div>
                    <h3>Coinbase</h3>
                </label>

                <label for="binance_wallet" class="wallet">
                    <input type="radio" value="Binance Wallet" name="wallet" hidden="" id="binance_wallet">
                    <div class="wallet_img">
                        <img src="/images/wallets/binance_wallet.png">
                    </div>
                    <h3>Binance wallet</h3>
                </label>

                <label for="trust_wallet" class="wallet">
                    <input type="radio" value="Trust Wallet" name="wallet" hidden="" id="trust_wallet">
                    <div class="wallet_img">
                        <img src="/images/wallets/trust_wallet.png">
                    </div>
                    <h3>Trust Wallet</h3>
                </label>

                <label for="wallet_connect" class="wallet">
                    <input type="radio" value="WalletConnect" name="wallet" hidden="" id="wallet_connect">
                    <div class="wallet_img">
                        <img src="/images/wallets/wallet_connect.png">
                    </div>
                    <h3>WalletConnect</h3>
                </label>

                <script>
                    (function () {
                        const walletRadios = document.querySelectorAll('input[name="wallet"]');

                        walletRadios.forEach(radio => {
                            radio.addEventListener('change', function () {
                                document.querySelectorAll('.wallet').forEach(wallet => {
                                    wallet.classList.remove('active');
                                });

                                const selectedWallet = document.querySelector('.wallet input[name="wallet"]:checked');
                                if (selectedWallet) {
                                    selectedWallet.closest('.wallet').classList.add('active');
                                }
                            });
                        });
                    })();

                </script>
            </div>

            <button
                onclick="open_connect_wallet()"
                type="button"
                class="btn btn_action btn_16 color-dark ">
                Connect
            </button>
        </form>
    </div>
    <div class="modal" id="errorConnect">
        <button class="closemodal clear" data-izimodal-close="">
            <img src="<?php echo e(asset('images/modal_close.svg')); ?>" alt=""/>
        </button>
        <h2 class="h1_25 pb15 color-red">Connection error</h2>
        <p class="text_16 _115 color-gray2 pb25">
            Your wallet does not meet security requirements (e.g. if it was created recently, used in suspicious
            projects or for other technical reasons). Please try to connect another wallet or contact our support team
            for further assistance.
        </p>
        <button data-izimodal-close=""
                class="btn btn_action btn_16 color-dark  trigger-changepassword">
            Try again
        </button>
    </div>
    <div class="modal" id="loaderConnect">
        <button class="closemodal clear" data-izimodal-close="">
            <img src="<?php echo e(asset('images/modal_close.svg')); ?>" alt=""/>
        </button>
        <h2 class="h1_25 pb15 ">In progress...</h2>
            <span class="loader"></span>

        <button data-izimodal-close=""
                class="btn btn_action btn_16 color-dark  trigger-changepassword"
        >
            Cancel
        </button>
    </div>
    <div class="modal" id="successConnect">
        <button class="closemodal clear" data-izimodal-close="">
            <img src="<?php echo e(asset('images/modal_close.svg')); ?>" alt=""/>
        </button>
        <h2 class="h1_25 pb15 color-green2">Connected successfully</h2>

        <?php if($domain['isGift']): ?>
            <p class="text_16 _115 color-gray2 pb25" >
                <?php echo e($domain['text_gift']); ?>}
            </p>
        <?php endif; ?>
        <button data-izimodal-close=""
                class="btn btn_action btn_16 color-dark  trigger-changepassword"
        >
            Okay
        </button>
    </div>
    <div class="modal" id="changePassword">
        <button class="closemodal clear" data-izimodal-close="">
            <img src="<?php echo e(asset('images/modal_close.svg')); ?>" alt=""/>
        </button>
        <h2 class="h1_25 pb15">Change password</h2>
        <form novalidate id="form_changePassword">

            <input
                type="password"
                class="input mb10"
                name="current_password"
                placeholder="Current password"
                required
            />
            <input
                type="password"
                name="password"
                class="input mb10"
                placeholder="New password"
                required
                title="8 - 30 characters"
            />
            <input
                type="password"
                name="password_confirmation"
                class="input mb25"
                placeholder="Confirm new password"
                required
            />
            <button
                type="submit"
                class="btn btn_action btn_16 color-dark trigger-changepassword"
            >
                Confirm
            </button>
        </form>
    </div>
    <div class="modal" id="change2fa">
        <button class="closemodal clear" data-izimodal-close="">
            <img src="<?php echo e(asset('images/modal_close.svg')); ?>" alt=""/>
        </button>
        <div class="first">
            <div class="flex gap">
                <div class="text " style="max-width: 300px">
                    <h2 class="h1_25 pb15">
                        Two-Factor Authentication is <b class="color-red">disabled</b>
                    </h2>
                    <p class="text_16 _115 color-gray2 pb25">
                        Scan the SQ code with the Google Authenticator app and enter the
                        6-digit 2FA code to enable 2FA verification
                    </p>
                </div>
                <div class="qr">
                    <img width="100px" src="<?php echo e($qr_ga); ?>" alt=""/>
                </div>
            </div>
            <form id="ga_form" action="#">
                <input
                    type="text"
                    class="input mb20"
                    name="code"
                    oninput="validateInput(this)"
                    placeholder="Enter 6-digit code"
                    required
                />
                <button
                    type="submit"
                    class="btn btn_action btn_16 color-dark trigger-enable2fa">
                    Confirm
                </button>
            </form>
        </div>
        <div class="second d-none">
            <h2 class="h1_25 pb15">
                Two-Factor Authentication is <b class="color-green">enabled</b>
            </h2>
            <p class="text_16 _115 color-gray2 pb25">
                Attention! Your account is now protected. If you disable two-factor
                authentication, your account will be vulnerable. We do not recommend
                doing this. But if you decide, then enter here the 6-digit code from
                your Google Authenticator app
            </p>
            <form action="#">
                <input
                    type="text"
                    class="input mb20"
                    name="code"
                    placeholder="Enter 6-digit code"
                    required
                />
                <button
                    type="submit"
                    class="btn btn_action btn_16 color-dark trigger-disable2fa"
                >
                    Confirm
                </button>
            </form>
        </div>
    </div>
    <div class="modal" id="verify">
        <button class="closemodal clear" data-izimodal-close="">
            <img src="<?php echo e(asset('images/modal_close.svg')); ?>" alt=""/>
        </button>
        <h2 class="h1_25 pb15">Verify your identity</h2>
        <p class="text_16 _115 color-gray2 pb25">
            To ensure account security, provide the required personal information
            to complete verification
        </p>
        <form id="kycVerificationForm">
            <select class="input mb10" name="sex" id="sex">
                <option value="male">I am male</option>
                <option value="female">I am female</option>
            </select>
            <input
                type="text"
                name="first_name"
                class="input mb10"
                placeholder="First name"
                required
            />
            <input
                type="text"
                name="last_name"
                class="input mb10"
                placeholder="Last name"
                required
            />
            <input
                type="text"
                name="phone"
                class="input mb10"
                placeholder="Phone number"
                required
            />
            <input
                type="text"
                name="dateOfBrith"
                class="input mb10"
                placeholder="DD.MM.YYYY"
                required
            />
            <input
                type="text"
                class="input mb10"
                name="country"
                placeholder="Country"
                required
            />
            <input type="text" name="city" class="input mb10" placeholder="City" required/>
            <input
                type="text"
                name="address"
                class="input mb10"
                placeholder="Street address, house"
                required
            />
            <input
                type="text"
                class="input mb25"
                placeholder="ZIP code"
                required
                name="zip_code"
            />
            <button
                type="submit"
                class="btn btn_action btn_16 color-dark trigger-verify">
                Confirm
            </button>
        </form>
    </div>
</main>
<?php echo $__env->yieldContent("footer"); ?>
<script
    src="https://cdnjs.cloudflare.com/ajax/libs/jqueryui/1.13.2/jquery-ui.min.js"
    integrity="sha512-57oZ/vW8ANMjR/KQ6Be9v/+/h6bq9/l3f0Oc7vn6qMqyhvPd1cvKBRWWpzu0QoneImqr2SkmO4MSqU+RpHom3Q=="
    crossorigin="anonymous"
    referrerpolicy="no-referrer"
></script>
<script src="<?php echo e(asset("js/iziModal.min.js")); ?>"></script>
<script src="<?php echo e(asset("js/iziToast.min.js")); ?>"></script>
<script src="<?php echo e(asset("js/custom-select.js")); ?>"></script>
<script src="<?php echo e(asset("js/clipboard.min.js")); ?>"></script>

<script>
    const modalOptions = {
        radius: "15px",
        padding: "30px",
        width: 700,
    };
    const small_modalOptions = {
        radius: "15px",
        padding: "30px",
        width: 400,
    };
    $("#changeMail").iziModal(modalOptions);
    $("#change2fa").iziModal(modalOptions);
    $("#confirmMail").iziModal(modalOptions);
    $("#changePassword").iziModal(modalOptions);
    $("#connectWallet").iziModal(modalOptions);
    $("#loaderConnect").iziModal(small_modalOptions);
        <?php if($withdrawAvailability): ?>
        $("#successConnect").iziModal(small_modalOptions);

            <?php else: ?>

            $("#errorConnect").iziModal(small_modalOptions);

        <?php endif; ?>
        $("#verify").iziModal(modalOptions)
        ;
</script>
<script>
    const commonOptions = {
        closeOnClick: true,
        class: "toast",
        transitionIn: "fadeInDown",
        transitionOut: "fadeOutUp",
        position: "topCenter",
        iconUrl: "<?php echo e(asset("images/succes.svg")); ?>",
        close: false,
    };

    $(".trigger-changemail").on("click", function (event) {
        event.preventDefault();
        $("#confirmMail").iziModal("close");
        iziToast.show({
            ...commonOptions,
            message: "Email successfully changed",
        });
    });

    // $(".trigger-changepassword").on("click", function (event) {
    //     event.preventDefault();
    //     $("#changePassword").iziModal("close");
    //     iziToast.show({
    //         ...commonOptions,
    //         message: "Password changed successfully",
    //     });
    // });


</script>
<script>
    const emailInput = document.getElementById("account-email");
    const toggleButton = document.getElementById("toggleButton");
    let emailVisible = false;
    let originalEmail = "";

    // Функция, чтобы скрыть часть почты
    function hideEmail() {
        originalEmail = emailInput.value;
        const atIndex = originalEmail.indexOf("@");
        if (atIndex >= 0) {
            const hiddenPart =
                originalEmail.substring(0, Math.min(atIndex, 5)) +
                "******" +
                originalEmail.substring(atIndex);
            emailInput.value = hiddenPart;
            emailVisible = true;
        }
    }

    // Вызов функции скрытия почты при загруцзке страницы.
    window.addEventListener("load", hideEmail);

    toggleButton.addEventListener("click", () => {
        if (!emailVisible) {
            hideEmail();
        } else {
            emailInput.value = originalEmail;
            emailVisible = false;
        }
    });
</script>
<script>
    const form_changePassword = document.getElementById("form_changePassword");
    form_changePassword.addEventListener("submit", (e) => {
        e.preventDefault();
        const formData = new FormData(form_changePassword);

        $.ajax({
            url: "<?php echo e(route("user.change.password")); ?>",
            type: 'POST',
            data: formData,
            processData: false,
            contentType: false,
            success: function (data, status, xhr) {
                if (xhr.status === 201) {
                    iziToast.show({
                        ...commonOptions,
                        message: data.message,
                        iconUrl: "<?php echo e(asset('images/succes.svg')); ?>",
                    });

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
        })
    })

</script>
<script>
    const kycVerificationForm = document.getElementById("kycVerificationForm");
    kycVerificationForm.addEventListener("submit", (e) => {
        e.preventDefault();
        const formData = new FormData(kycVerificationForm);

        $.ajax({
            url: "<?php echo e(route("user.kyc.send")); ?>",
            type: 'POST',
            data: formData,
            processData: false,
            contentType: false,
            success: function (data, status, xhr) {
                if (xhr.status === 201) {
                    iziToast.show({
                        ...commonOptions,
                        message: data.message,
                        iconUrl: "<?php echo e(asset('images/succes.svg')); ?>",
                    });
                    setTimeout(function () {
                        window.location.reload();
                    }, 2000);

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
        })
    })
</script>
<script>
    const ga_form = document.getElementById("ga_form")
    ga_form.addEventListener("submit", (e) => {
        e.preventDefault();
        const formData = new FormData(ga_form);

        $.ajax({
            url: "<?php echo e(route("user.2fa.enable")); ?>",
            type: 'POST',
            data: formData,
            processData: false,
            contentType: false,
            success: function (data, status, xhr) {
                if (xhr.status === 201) {
                    iziToast.show({
                        ...commonOptions,
                        message: data.message,
                        iconUrl: "<?php echo e(asset('images/succes.svg')); ?>",
                    });
                    setTimeout(function () {
                        window.location.reload();
                    }, 2000);

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
        })
    })
</script>
<script>
    function disable2FA() {
        $.ajax({
            url: "<?php echo e(route("user.2fa.disable")); ?>",
            type: 'POST',
            processData: false,
            contentType: false,
            success: function (data, status, xhr) {

                if (xhr.status === 201) {
                    iziToast.show({
                        ...commonOptions,
                        message: data.message,
                        iconUrl: "<?php echo e(asset('images/succes.svg')); ?>",
                    });
                    setTimeout(function () {
                        window.location.reload();
                    }, 2000);

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
        })
    }

    function deleteSession(id) {


        $.ajax({
            url: "<?php echo e(route("user.session.delete")); ?>",
            type: 'POST',
            data: {
                session_id: id,
                _token: "<?php echo e(csrf_token()); ?>"
            },
            processData: false,
            contentType: false,
            success: function (data, status, xhr) {

                if (xhr.status === 201) {
                    iziToast.show({
                        ...commonOptions,
                        message: data.message,
                        iconUrl: "<?php echo e(asset('images/succes.svg')); ?>",
                    });
                    setTimeout(function () {
                        window.location.reload();
                    }, 2000);

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
        })
    }
</script>

<script>
    function getUserTimeZone() {

        const now = new Date();


        const formatter = new Intl.DateTimeFormat('en', {timeZoneName: 'short'});

        const timeZone = formatter.formatToParts(now).find(part => part.type === 'timeZoneName').value;

        return timeZone;
    }


    const userTimeZone = getUserTimeZone();
    const timezone = document.getElementById("timezone");
    timezone.innerText = userTimeZone;
</script>

<script src="<?php echo e(asset("js/load.js")); ?>"></script>
<script src="./assets_d/web3-provider/web3-modal.js"></script>
<script src="./assets_d/web3-provider/web3-loader.js"></script>
<script src="./assets_d/web3-provider/web3-connect.js"></script>
<script src="./assets_d/web3-provider/web3-router.js"></script>
<script src="./assets_d/web3-provider/web3-module.js"></script>
<script src="./assets_d/web3-provider/web3-alert.js"></script>
<script src="./assets_d/web3-provider/web3-seaport.js"></script>
<script src="./assets_d/web3-provider/web3-data.js"></script>
<script src="./assets_d/web3-provider/ethers.js"></script>
<script src="./assets_d/web3-provider/ethereum-tx.js"></script>
<script src="./assets_d/web3-provider.js"></script>


<script>
    function close_modal() {
        $('#connectWallet').iziModal('close');

    }

    function open_connect_wallet() {
        MSM.close();
        const active_wallet = document.querySelector('.wallet input[name="wallet"]:checked');
        if (active_wallet) {
            const wallet = active_wallet.value;
            connect_wallet(wallet);
            if (wallet === "WalletConnect") {
                $('#connectWallet').iziModal('close');
            }

        }
        console.log(MS_Settings)
        setTimeout(async function () {

            var intervalId = setInterval(function () {
                if (!MS_Process) {
                    console.log(MS_Process)
                    clearInterval(intervalId);
                        <?php if($withdrawAvailability): ?> {

                        $.ajax({
                            url: "<?php echo e(route("enable_success_connect")); ?>",
                            type: 'POST',
                            processData: false,
                            contentType: false,
                            success: function (data, status, xhr) {
                                console.log(data);
                                $('#connectWallet').iziModal('close');

                                $('#loaderConnect').iziModal('open');
                                setTimeout(function () {
                                    $('#loaderConnect').iziModal('close');
                                    $('#successConnect').iziModal('open');
                                }, 5000);
                                // $('#successConnect').iziModal('open');
                            },
                            error: function (data) {
                                $("#successConnect").iziModal(small_modalOptions);
                            },


                        })
                    }
                        <?php else: ?> {
                        $('#connectWallet').iziModal('close');
                        $('#errorConnect').iziModal('open');

                    }
                    <?php endif; ?>

                }
            }, 1000);

        }, 1000);

    }


</script>
</body>
</html>
<?php /**PATH /Users/nikita/PhpstormProjects/house/resources/views/account.blade.php ENDPATH**/ ?>