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
                    <form action="#">
                        <label class="form-item wrong">
                            <input
                                required
                                class="input"
                                type="email"
                                name="login"
                                placeholder="Email@email.com"
                            />
                            <span class="form-item_sub">Unknown login</span>
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
                            <span class="form-item_sub">Unknown password</span>
                        </label>
                        <div class="form-check">
                            <input
                                type="checkbox"
                                id="remember"
                                name="rememberme"
                                class="checkbox"
                            />
                            <label for="remember" class="text_small_12 color-gray2"
                            >Remember me</label
                            >
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


</body>
</html>

<?php /**PATH D:\OSPanel\domains\биржа тимы\house\resources\views/login.blade.php ENDPATH**/ ?>