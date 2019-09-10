<?php get_header(); ?>
    <div class="container">
        <section class="contents product-page">
            <h1 class="underline-header"><?php _e( 'Solutions', 'sapiat' ); ?></h1>

            <?php get_template_part('loop-custom'); ?>
        </section>
    </div>
<?php get_footer(); ?>
