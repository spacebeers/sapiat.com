
<article id="post-<?php the_ID(); ?>" <?php post_class("page home-page main-content"); ?>>
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

    <section class="strip strip-dark">
        <div class="container">
            <div class="constrainer">
                <h2>Clients</h2>
                <section class="related-content related-solutions">
                    <div class="related-grid grid-quarters">
                        <?php
                            $currentID = get_the_ID();
                            query_posts(array('orderby' => 'rand', 'post_type' => array('solution'), 'showposts' => 3, 'post__not_in' => array($currentID)));

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
    </section>
    <section class="strip">
        <div class="container">
            <div class="constrainer">
                <h2>Discover our Solutions</h2>
                <section class="related-content related-products">
                    <div class="related-grid grid-quarters">
                        <?php
                            $post_type = 'product';
                            // Get all the taxonomies for this post type
                            $taxonomies = get_object_taxonomies( (object) array( 'post_type' => $post_type ) );
                            foreach( $taxonomies as $taxonomy ):
                                // Gets every "category" (term) in this taxonomy to get the respective posts
                                $terms = get_terms( $taxonomy );
                                foreach( $terms as $term ):
                                    $term_link = get_term_link( $term );
                                ?>
                                    <article id="post-<?php the_ID(); ?>" class="related-article">
                                        <div class="post-main">
                                            <?php
                                                if (get_field("icon", $term)):
                                                    echo file_get_contents(get_template_directory_uri() . '/assets/' . get_field("icon", $term), true);
                                                endif;
                                            ?>
                                            <h3>
                                                <a href="<?php echo esc_url( $term_link ); ?>" title="">
                                                    <?php
                                                        if (get_field('bold_title', $term) && get_field('light_title', $term)):
                                                            the_field('bold_title', $term);
                                                            echo '<span class="light-text">'. get_field('light_title', $term) .'</span>';
                                                        else:
                                                            echo $term->name;
                                                        endif;
                                                    ?>
                                                </a>
                                            </h3>

                                            <p><?php echo $term->description; ?></p>

                                            <a href="<?php echo esc_url( $term_link ); ?>" class="btn btn-small">More</a>
                                        </div>
                                    </article>
                                <?php endforeach;
                            endforeach;
                            wp_reset_query();
                        ?>
                    </div>
                </section>
            </div>
        </div>
    </section>
</article>