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
<main class="security h100">
    <section class="security">
        <div class="container">
            <div class="security-content">
                <h1 class="h2_40 mb40 pt20">Security</h1>
                <h2>2FA and backup code</h2>
                <p>
                    Enabling two-factor authentication (2FA) increases the security of
                    your Cryptohouse Account, as well as coins/tokens stored on It.
                    This method of account protection is called two-factor protection,
                    because it is the second security barrier after the password to
                    log in to the account. This really increases your security,
                    because in addition to the username and password, the attacker
                    will need to enter a 2FA-code. In the event of a hacking attempt,
                    an attacker can reset your password through your e-mail address
                    that you specified during registration, if it was hacked. However,
                    even if the attacker has a username and password from your
                    Cryptohouse account.
                </p>
                <h2>Password</h2>
                <p>
                    The password has never been used before <br /><br />Use upper and
                    lower case <br /><br />Use special characters and numbers
                    <br /><br />The minimum length is 8 characters <br /><br />The
                    maximum length is 30 characters
                </p>
                <h2>HTTP(S)</h2>
                <p>
                    Check the "S" after "http" in the browser's address bar. If there
                    is no "S", the connection is not secure. It can lead to loss of
                    access to the account and loss of funds. A green lock near the
                    address informs the user about the security of the visited page.
                    If there is no lock, you should pay special attention to the site
                    name in the address bar or do not use it at all, because the http
                    Protocol is not secure. It is safe to use websites with https
                    Protocol only.
                </p>
                <h2>Checking the SSL certificate</h2>
                <p>
                    To check the SSL certificate, follow the instructions. Click on
                    the certificate details and make sure that you are on the official
                    website.
                </p>
            </div>
        </div>
    </section>
</main>
<?php echo $__env->yieldContent("footer"); ?>
</body>
</html>
<?php /**PATH D:\OSPanel\domains\house\house\resources\views/security.blade.php ENDPATH**/ ?>