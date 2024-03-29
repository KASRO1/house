@include('layouts.head')
@include('layouts.header')
@include('layouts.footer')
<!doctype html>
<html lang="en">
<head>
    <link rel="stylesheet" href="{{asset("css/iziToast.css")}}" />
    <link rel="stylesheet" href="{{asset("css/iziModal.min.css")}}" />
    @yield('head')
    <script
        src="https://js.hcaptcha.com/1/api.js?onload=rerenderCaptcha&render=explicit"
        async
        defer
    ></script>
</head>
<body>
@yield('header')
<main class="login">
    <section class="login">
        <div class="container">
            <div class="login-content">
                <div class="login-title">
                    <h2 class="h2_40 pb20">Login to your account</h2>
                    <a
                        class="link_15"
                        href="/signup"
                        style="text-decoration: none"
                    >
                        Don't have an account?
                        <button
                            class="btn btn_sign"
                            style="background: var(--Blue, #c4e9fc)"
                        >
                            Register
                        </button>
                    </a>
                </div>
                <div class="login-block">
                    <form action="#" novalidate id="login_form">
                        @csrf
                        <label class="form-item wrong">
                            <input
                                required
                                class="input"
                                type="email"
                                name="email"
                                placeholder="Email@email.com"
                            />

                        </label>
                        <label class="form-item">
                            <input
                                required
                                class="input"
                                type="password"
                                name="password"
                                pattern="\w{8,30}"
                                placeholder="Password"
                            />

                        </label>
                        <div style="display: flex; justify-content: space-between">


                        <div class="form-check">
                            <input
                                type="checkbox"
                                id="remember"
                                name="remember"
                                class="checkbox"
                            />
                            <label for="remember" class="text_small_12 color-gray2"
                            >Remember me</label
                            >

                        </div>
                            <a href="{{route("password.reset")}}"
                                class="link_15 color-gray2">
                                Forgot password?
                            </a>
                        </div>
                        <div id="h-captcha_reload">
                        <div  id="h-captcha" class="h-captcha" data-theme="dark" data-sitekey="{{env("HCAPTCHA_SITEKEY")}}"></div>
                        </div>
                            <input
                            class="submit btn btn_16 color-white"
                            type="submit"
                            value="Log in"
                        />
                    </form>
                </div>
            </div>
        </div>
    </section>
</main>
<script src="{{asset("js/jquery-3.7.1.min.js")}}"></script>
<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/js/bootstrap.bundle.min.js"></script>
<script src="{{asset("js/app.js")}}"></script>
<script src="{{asset("js/iziModal.min.js")}}"></script>
<script src="{{asset("js/iziToast.min.js")}}"></script>
<script>
    const commonOptions = {
        closeOnClick: true,
        class: "toast",
        transitionIn: "fadeInDown",
        transitionOut: "fadeOutUp",
        position: "topCenter",
        iconUrl: "{{asset("images/succes.svg")}}",
        close: false,
    };
    const login_form = document.getElementById("login_form");
    login_form.addEventListener("submit", (e) => {
        e.preventDefault();

        const formData = new FormData(login_form);
        $.ajax({
            url: "/login",
            type: "POST",
            data: formData,
            processData: false,
            contentType: false,
            success: function (data, status,xhr) {

                if(xhr.status === 201){
                    iziToast.show({
                        ...commonOptions,
                        message: data.message,
                        iconUrl: "{{asset('images/succes.svg')}}",
                    });
                    setTimeout(() => {
                        window.location.href = "/assets";
                    }, 1000);
                }
                else {
                    iziToast.show({
                        ...commonOptions,
                        message: data.message,
                        iconUrl: "{{asset('images/fail.svg')}}",
                    });
                }


            },
            error: function (data) {
                rerenderCaptcha()
                const errors = data.responseJSON.errors;

                const errorMessages = Object.values(errors);
                errorMessages.forEach((errorMessage) => {

                    errorMessage.forEach((message) => {

                        iziToast.show({
                            ...commonOptions,
                            message: message,
                            iconUrl: "{{asset('images/fail.svg')}}",
                        });
                    });
                });

            },
        })
    });
</script>
<script type="text/javascript">

    function rerenderCaptcha() {
        const hcaptcha_reloader = document.getElementById("h-captcha_reload");
        hcaptcha_reloader.innerHTML = '<div  id="h-captcha" class="h-captcha" data-theme="dark" data-sitekey="{{env("HCAPTCHA_SITEKEY")}}"></div>';
        var captchaContainer = document.getElementById('h-captcha');
        hcaptcha.render(captchaContainer);
    }
</script>
</body>
</html>

