<?php
    get_header();
    $term = get_term_by( 'slug', get_query_var( 'term' ), get_query_var( 'taxonomy' ) );
?>
    <div class="container">
        <section class="contents product-page">
            <h1 class="underline-header"><?php echo apply_filters( 'the_title', $term->name ); ?></h1>
            <?php
                $case_study_cat_slug = get_queried_object()->slug;
                $case_study_cat_name = get_queried_object()->name;
            ?>
            <?php
                $al_tax_post_args = array(
                    'post_type' => 'product', // Your Post type Name that You Registered
                    'posts_per_page' => 999,
                    'order' => 'ASC',
                    'tax_query' => array(
                        array(
                            'taxonomy' => 'product_category',
                            'field' => 'slug',
                            'terms' => $case_study_cat_slug
                        )
                    )
                );
                $al_tax_post_qry = new WP_Query($al_tax_post_args);

                if($al_tax_post_qry->have_posts()) :
                   while($al_tax_post_qry->have_posts()) :
                        $al_tax_post_qry->the_post();
            ?>
                        <!-- article -->
                        <article id="post-<?php the_ID(); ?>" <?php post_class('solutions-list-item'); ?>>
                            <header>
                                <?php
                                    if (get_field("icon")):
                                        echo file_get_contents(get_template_directory_uri() . '/assets/' . get_field("icon"), true);
                                    endif;
                                ?>
                                <h2>
                                <?php
                                        if (get_field('bold_title') && get_field('light_title')):
                                            the_field('bold_title');
                                            echo ' <span class="light-text">'. get_field('light_title') .'</span>';
                                        else:
                                            the_title();
                                        endif;
                                    ?>
                                </h2>
                            </header>

                            <div class="list-item-content">
                                <?php the_excerpt(); ?>

                                <a href="<?php the_permalink(); ?>" title="<?php the_title(); ?>" class="btn btn-small btn-white">More</a>
                            </div>
                        </article>
            <?php
                    endwhile;
                    endif;

            ?>

        </section>
    </div>
<?php
    wp_reset_query();
    get_footer();
?>