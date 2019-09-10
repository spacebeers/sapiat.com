    </section>

    <footer class="site-footer">
        <div class="footer-main">
            <div class="container">
                <div class="footer-columns">
                    <div class="col">
                        <?php dynamic_sidebar('footer-one-sidebar'); ?>
                    </div>
                    <div class="col">
                        <?php dynamic_sidebar('footer-two-sidebar'); ?>
                    </div>
                    <div class="col">
                        <?php dynamic_sidebar('footer-three-sidebar'); ?>
                    </div>
                    <div class="col">
                        <?php dynamic_sidebar('footer-four-sidebar'); ?>
                    </div>
                    <div class="col">
                        <?php dynamic_sidebar('footer-five-sidebar'); ?>
                    </div>
                    <div class="col">
                        <?php dynamic_sidebar('footer-six-sidebar'); ?>
                    </div>
                </div>
            </div>
        </div>
        <div class="footer-sub">
            <div class="container">
                <div class="footer-menu">
                    <?php dynamic_sidebar('footer-information-sidebar'); ?>
                </div>
            </div>
        </div>
    </footer>
    <div id="loader">
        <?php echo file_get_contents(get_template_directory() . "/assets/spinner.svg"); ?>
    </div>
    <?php wp_footer(); ?>
</body>
</html>