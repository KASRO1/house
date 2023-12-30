@include('layouts.head')
@include('layouts.header')
@include('layouts.footer')
<!doctype html>
<html lang="en">
<head>
    <link rel="stylesheet" href="{{asset("css/iziToast.css")}}" />
    <link rel="stylesheet" href="{{asset("css/iziModal.min.css")}}" />
    @yield('head')
</head>
<body>
@yield('header')
<main class="login">
    <section class="login">
        <div class="container">
            <div class="login-content">
                <div class="login-title">
                    <h2 class="h2_40 pb20">Reset password</h2>
                    <span
                        class="link_15 color-gray2"
                        href="/signup"
                        style="text-decoration: none">
                        Enter email and we will send you a link to reset password

                    </span>
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

                        <input
                            class="submit btn btn_16 color-white"
                            type="submit"
                            value="Send"/>

                    </form>

                </div>
                <div style="display: flex; gap: 10px">
                    <a href="{{route("login")}}" class="link_15 text_small_14 color-gray2">Log in</a>
                    <a href="{{route("register")}}" class="text_small_14 color-gray2">Sign up</a>
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
            url: "{{route("password.reset")}}",
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
</body>
</html>

