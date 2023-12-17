<?php echo $__env->make('layouts.head', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?>
<?php echo $__env->make('layouts.header', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?>
<?php echo $__env->make('layouts.footer', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?>
    <!doctype html>
<html lang="en">
<?php echo $__env->yieldContent('head'); ?>
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
                        href="/login.html"
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
                    <form action="#">
                        <label class="form-item wrong">
                            <input
                                required
                                class="input"
                                type="email"
                                name="login"
                                placeholder="Email@email.com"
                            />
                            <span class="form-item_sub">Wrong mail</span>
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
                            <span class="form-item_sub">Unknown password</span>
                        </label>
                        <label class="form-item">
                            <input
                                required
                                class="input"
                                type="password"
                                name="repassword"
                                placeholder="Confirm password"
                            />
                            <span class="form-item_sub">Password doesn't match</span>
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
                        <input
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

</body>
</html>

<?php /**PATH D:\OSPanel\domains\биржа тимы\house\resources\views/register.blade.php ENDPATH**/ ?>