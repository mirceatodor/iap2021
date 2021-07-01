
<footer class="footer">
    <div class="container">
        <div class="row">
            <?php if (is_active_sidebar('footer-1')): ?>
                <div class="col-xs-12 col-md-5 col-lg-4 footer-about">
                    <?php dynamic_sidebar('footer-1'); ?>
                </div>
            <?php endif ?>

            <?php if (is_active_sidebar('footer-2')): ?>
                <div class="footer-links col-xs-12 col-sm-4 col-md-2 col-md-offset-1 col-lg-offset-2">
                    <?php dynamic_sidebar('footer-2'); ?>
                </div>
            <?php endif ?>

            <?php if (is_active_sidebar('footer-3')): ?>
                <div class="footer-links col-xs-12 col-sm-4 col-md-2">
                    <?php dynamic_sidebar('footer-3'); ?>
                </div>
            <?php endif ?>

            <?php if (is_active_sidebar('footer-4')): ?>
                <div class="footer-links col-xs-12 col-sm-4 col-md-2">
                    <?php dynamic_sidebar('footer-4'); ?>
                </div>
            <?php endif ?>
        </div>
    </div>
</footer>

<?php wp_footer(); ?>

</body>
</html>