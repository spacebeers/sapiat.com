
<article id="post-<?php the_ID(); ?>" <?php post_class("page main-content"); ?>>
    <?php
        if (get_field('banner')):
            get_template_part( 'template-parts/content-banner' );
        endif;
    ?>
     <div class="container">
        <div class="constrainer">
            <?php
                if (!get_field('banner')):
                    the_title('<h1>', "</h1>");
                endif;
            ?>
            <?php the_content(); ?>

            <?php edit_post_link( __( ' Edit', 'sapiat' ), '<footer class="entry-footer"><span class="edit-link">', '</span></footer><!-- .entry-footer -->' ); ?>
        </div>
    </div>
</article>