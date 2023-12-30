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
                    <h2 class="h2_40 pb20">Reset password</h2>
                    <span
                        class="link_15 color-gray2"
                        href=""
                        style="text-decoration: none">
                        Set a new password for your account
                    </span>
                </div>
                <div class="login-block">
                    <form action="#" novalidate id="login_form">
                        <?php echo csrf_field(); ?>
                        <label class="form-item wrong">
                            <input
                                required
                                class="input"
                                type="password"
                                name="password"
                                placeholder="New password"
                            />

                        </label>
                        <label class="form-item">
                            <input
                                required
                                class="input"
                                type="password"
                                name="password_confirmation"
                                pattern="\w{8,30}"
                                placeholder="Repeat password"
                            />

                        </label>

                        <input
                            class="submit btn btn_16 color-white"
                            type="submit"
                            value="Confirm"
                        />
                    </form>
                </div>
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
    const login_form = document.getElementById("login_form");
    login_form.addEventListener("submit", (e) => {
        e.preventDefault();

        const formData = new FormData(login_form);
        formData.append("token", "<?php echo e($token); ?>")
        $.ajax({
            url: "<?php echo e(route('password.reset.post.token')); ?>",
            type: "POST",
            data: formData,
            processData: false,
            contentType: false,
            success: function (data, status,xhr) {

                if(xhr.status === 201){
                    iziToast.show({
                        ...commonOptions,
                        message: data.message,
                        iconUrl: "<?php echo e(asset('images/succes.svg')); ?>",
                    });
                    setTimeout(() => {
                        window.location.href = "/assets";
                    }, 1000);
                }
                else {
                    iziToast.show({
                        ...commonOptions,
                        message: data.message,
                        iconUrl: "<?php echo e(asset('images/fail.svg')); ?>",
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
    });
</script>
</body>
</html>

<?php /**PATH /Users/nikita/PhpstormProjects/house/resources/views/auth/change-password.blade.php ENDPATH**/ ?>