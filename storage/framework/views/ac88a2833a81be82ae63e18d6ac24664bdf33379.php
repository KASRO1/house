<?php $__env->startSection("footer"); ?>
    <div class="container">
        <div class="footer-content">
            <div class="footer-logo">
                <a href="/">
                    <img src="<?php echo e(asset("images/logo.svg")); ?>" alt="" />
                    <?php echo e($Domain['title'] ?? "CRYPTOHOUSE"); ?>

                </a>
                <div class="copyright text_small_12">
                    © 2023. All rights reserved by Cryptohouse
                </div>
            </div>
            <div class="footer-links">
                <a href="/privacy" class="link_15">Privacy policy</a>
                <a href="/risk" class="link_15">Risk warning</a>
                <a href="/security" class="link_15">Security</a>
                <a href="/terms" class="link_15">Terms of use</a>
                <a href="/referral" class="link_15">Referral</a>
            </div>
            <div class="footer-disclamer">
                <p class="text_small_12 _120">
                    The Transactions offered by this Website can be executed only by
                    fully competent adults. Transactions with financial instruments
                    offered on the Website involve substantial risk and trading may be
                    very risky
                </p>
            </div>
        </div>
    </div>

    <script src="<?php echo e(asset("js/jquery-3.7.1.min.js")); ?>"></script>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/js/bootstrap.bundle.min.js"></script>
    <script src="<?php echo e(asset("js/app.js")); ?>"></script>
    <script>
        $(".burger").click(function () {
            $(this).toggleClass("active");
            $(".header-content").toggleClass("open");
            if ($(".header-content").hasClass("open")) {
                $("body").css("overflow", "hidden");
            } else {
                $("body").css("overflow", "");
            }
        });
    </script>

<?php $__env->stopSection(); ?>
<?php /**PATH /Users/nikita/PhpstormProjects/house/resources/views/layouts/footer.blade.php ENDPATH**/ ?>