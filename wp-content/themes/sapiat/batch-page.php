<?php
    if ( !is_user_logged_in() ) :
        wp_redirect( home_url() ); exit;
    endif;
    /**
    * Template Name: Batch Downloads Page
    */
    get_header(); ?>

    <?php
        // Start the loop.
        while ( have_posts() ) : the_post();

            // Include the page content template.
            get_template_part( 'template-parts/content', 'batch' );

        // End the loop.
        endwhile;
    ?>

<?php get_footer(); ?>