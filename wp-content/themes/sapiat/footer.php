    </section>

    <footer class="site-footer">
        <div class="footer-light">
            <div class="container">
                <div class="grid">
                    <div class="col-8">
                        <?php dynamic_sidebar('footer-form-one-sidebar'); ?>
                    </div>
                    <div class="col-4">
                        <?php dynamic_sidebar('footer-form-two-sidebar'); ?>
                    </div>
                </div>
            </div>
        </div>
        <div class="footer-dark">
            <div class="container">
                <div class="footer-header">
                    <?php dynamic_sidebar('footer-social-sidebar'); ?>
                </div>
                <div class="footer-menu">
                    <?php dynamic_sidebar('footer-menu-sidebar'); ?>
                </div>
            </div>
        </div>
    </footer>
    <div class="modal fade" tabindex="-1" role="dialog" id="requestDemo">
        <div class="modal-dialog" role="document">
            <div class="modal-content">
                <div class="modal-body">
                    <h2>Request a demo</h2>
                    <?php echo do_shortcode('[wpforms id="289" title="false" description="false"]'); ?>
                </div>
            </div>
        </div>
    </div>
    <div id="loader">
        <?php echo file_get_contents(get_template_directory() . "/assets/spinner.svg"); ?>
    </div>
    <?php wp_footer(); ?>
    <!--Start of Tawk.to Script-->
    <script type="text/javascript">
    var Tawk_API=Tawk_API||{}, Tawk_LoadStart=new Date();
    (function(){
    var s1=document.createElement("script"),s0=document.getElementsByTagName("script")[0];
    s1.async=true;
    s1.src='https://embed.tawk.to/5a71d30bd7591465c70740e8/default';
    s1.charset='UTF-8';
    s1.setAttribute('crossorigin','*');
    s0.parentNode.insertBefore(s1,s0);
    })();
    </script>
    <!--End of Tawk.to Script-->
    <?php if ( is_front_page() ): ?>
        <script type="text/javascript">
        var capterra_vkey = 'e164aead81801351ed42fd1f1738d350',
        capterra_vid = '2009101',
        capterra_prefix = (('https:' == document.location.protocol) ? 'https://ct.capterra.com' : 'http://ct.capterra.com');

        (function() {
            var ct = document.createElement('script'); ct.type = 'text/javascript'; ct.async = true;
            ct.src = capterra_prefix + '/capterra_tracker.js?vid=' + capterra_vid + '&vkey=' + capterra_vkey;
            var s = document.getElementsByTagName('script')[0]; s.parentNode.insertBefore(ct, s);
        })();
        </script>
    <?php endif; ?>
</body>
</html>