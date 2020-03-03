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


            <section class="related-content">
                <h2><span> Other products </span></h2>

                <div class="related-grid">
                    <?php
                        $currentID = get_the_ID();
                        query_posts(array('orderby' => 'rand', 'post_type' => array('product'), 'showposts' => 3, 'post__not_in' => array($currentID)));

                        if (have_posts()) :
                            while (have_posts()) : the_post(); ?>

                                <article id="post-<?php the_ID(); ?>" class="related-article">
                                    <div class="post-main">
                                        <?php
                                            if (get_field("icon")):
                                                echo file_get_contents(get_template_directory_uri() . '/assets/' . get_field("icon"), true);
                                            endif;
                                        ?>
                                        <h3>
                                            <a href="<?php the_permalink(); ?>" title="<?php the_title(); ?>">
                                                <?php
                                                    if (get_field('bold_title') && get_field('light_title')):
                                                        the_field('bold_title');
                                                        echo '<span class="light-text">'. get_field('light_title') .'</span>';
                                                    else:
                                                        the_title();
                                                    endif;
                                                ?>
                                            </a>
                                        </h3>

                                        <a href="<?php the_permalink(); ?>" class="btn btn-small">More</a>
                                    </div>
                                </article>

                            <?php endwhile;

                        endif;

                        wp_reset_query();
                    ?>
                </div>
            </section>
        </div>
    </div>
</article>