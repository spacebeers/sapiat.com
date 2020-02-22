
<article id="post-<?php the_ID(); ?>" <?php post_class("page company-page main-content"); ?>>
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

            <div class="company-content">
                <?php the_content(); ?>
            </div>

            <?php edit_post_link( __( ' Edit', 'sapiat' ), '<footer class="entry-footer"><span class="edit-link">', '</span></footer><!-- .entry-footer -->' ); ?>
        </div>
    </div>


    <?php if( have_rows('grid') ): ?>
        <section class="strip">
            <div class="check-grid">
            <?php
                while( have_rows('grid') ): the_row();

                    // vars
                    $row = get_sub_field('row');
                    $image = $row['image'];
                    $content = $row['content'];

                    ?>
                    <div class="check-item">
                        <div class="check-col image-check-col" style="background-image: url(<?php echo $image['url']; ?>);"></div>
                        <div class="check-col">
                            <div class="content">
                                <?php echo $content; ?>
                            </div>
                        </div>
                    </div>
                <?php endwhile; ?>
            </div>
        </section>
    <?php endif; ?>

    <?php if (get_field('show_staff_section')): ?>
        <section class="strip">
            <div class="container">

                <?php
                    $args = array(
                    'post_type'   => 'staff',
                    'post_status' => 'publish'
                );

                    $testimonials = new WP_Query( $args );
                    if( $testimonials->have_posts() ) :
                    ?>
                    <div class="staff-grid">
                        <?php
                            while( $testimonials->have_posts() ) :
                                $testimonials->the_post();
                                ?>
                                <div class="staff-item">
                                    <div class="staff-image">
                                        <?php the_post_thumbnail(); ?>

                                        <div class="staff-hover">
                                            <?php the_content(); ?>
                                        </div>
                                    </div>
                                    <div class="staff_content">
                                        <h3><?php the_title(); ?></h3>
                                        <p><?php the_field('role'); ?></p>
                                    </div>
                                </div>
                                <?php
                            endwhile;
                        wp_reset_postdata();
                        ?>
                    </div>
                    <?php
                    else :
                    esc_html_e( 'No staff to show here', 'text-domain' );
                    endif;
                    ?>
            </div>
        </section>
    <?php endif; ?>

    <?php get_template_part( 'template-parts/content', 'callout' ); ?>
</article>