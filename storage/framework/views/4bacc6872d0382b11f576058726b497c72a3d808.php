<?php echo $__env->make('layouts.head', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?>
<?php echo $__env->make('layouts.header', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?>
<?php echo $__env->make('layouts.footer', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?>
    <!doctype html>
<html lang="en">
<head>
    <link rel="stylesheet" href="<?php echo e(asset("css/iziToast.css")); ?>" />
    <link rel="stylesheet" href="<?php echo e(asset("css/iziModal.min.css")); ?>" />
    <?php echo $__env->yieldContent('head'); ?>
</head>
<body>
<?php echo $__env->yieldContent('header'); ?>
<main class="login">
    <section class="login">
        <div class="container">
            <div class="login-content">
                <div class="login-title">
                    <h2 class="h2_40 pb20">Create an account</h2>
                    <a
                        class="link_15"
                        href="/login"
                        style="text-decoration: none"
                    >
                        Already have an account?
                        <button
                            class="btn btn_sign"
                            style="background: var(--Blue, #c4e9fc)"
                        >
                            Log in
                        </button>
                    </a>
                </div>
                <div class="login-block">
                    <form action="#" novalidate method="post" id="register_form">
                        <?php echo csrf_field(); ?>
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
                                pattern="\w{8,30}"
                                class="input"
                                type="password"
                                name="password"
                                placeholder="Password"
                                title="8 to 30 lowercase letters"
                            />

                        </label>
                        <label class="form-item">
                            <input
                                required
                                class="input"
                                type="password"
                                name="password_confirmation"
                                placeholder="Confirm password"
                            />

                        </label>
                        <div class="form-check">
                            <input
                                required
                                type="checkbox"
                                id="terms"
                                name="terms"
                                class="checkbox"
                            />
                            <label for="terms" class="text_small_12 color-gray2"
                            >I agree to
                                <a
                                    href="#"
                                    style="
                        color: inherit;
                        text-decoration: underline;
                        margin-left: 3px;
                      "
                                >terms of use</a
                                >
                            </label>
                        </div>
                        <input id="btn_submit"
                            class="submit btn btn_16 color-white"
                            type="submit"
                            value="Sign up"
                        />
                    </form>
                </div>
            </div>
            <div class="confirm-content d-none">
                <h2 class="h2_40">You need to confirm registration</h2>
                <p class="link_15">
                    We sent a link to your email, follow the link to confirm your
                    account registration
                </p>
            </div>
            <div class="access-content d-none">
                <h2 class="h2_40">Thank you for registering</h2>
                <p class="link_15">
                    Now you can enjoy all the features of cryptocurrency management
                </p>
                <a href="#" class="btn access btn">To assets</a>
            </div>
        </div>
    </section>
</main>
<script src="<?php echo e(asset("js/jquery-3.7.1.min.js")); ?>"></script>
<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/js/bootstrap.bundle.min.js"></script>
<script src="<?php echo e(asset("js/app.js")); ?>"></script>
<script src="<?php echo e(asset("js/iziModal.min.js")); ?>"></script>
<script src="<?php echo e(asset("js/iziToast.min.js")); ?>"></script>
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

    const register_form = document.getElementById("register_form");
    register_form.addEventListener("submit", (e) => {
        e.preventDefault();
        const formData = new FormData(register_form);
        $.ajax({
            url: "/signup",
            type: "POST",
            data: formData,
            processData: false,
            contentType: false,
            success: function (data, status,xhr) {

                if(xhr.status === 201){
                    iziToast.show({
                        ...commonOptions,
                        message: "Register success",
                        iconUrl: "<?php echo e(asset('images/succes.svg')); ?>",
                    });

                    setTimeout(() => {
                        window.location.href = "/login";
                    }, 1000);
                }
                else{
                    const errors = data.errors;
                    Object.keys(errors).forEach((fieldName) => {
                        const errorMessages = errors[fieldName];
                        errorMessages.forEach((errorMessage) => {

                            iziToast.show({
                                ...commonOptions,
                                message: errorMessage,
                                iconUrl: "<?php echo e(asset('images/fail.svg')); ?>",
                            });

                        });
                    });
                }

            },
            error: function (data) {
                iziToast.show({
                    ...commonOptions,
                    message: "Server Error",
                    iconUrl: "<?php echo e(asset('images/fail.svg')); ?>",
                });

            },
        });
    })

</script>
</body>
</html>

<?php /**PATH D:\OSPanel\domains\house\house\resources\views/register.blade.php ENDPATH**/ ?>