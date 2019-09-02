<?php get_header(); ?>
    <article id="post-<?php the_ID(); ?>" <?php post_class("page"); ?>>
        <div class="post-article">
            <?php if (have_posts()): while (have_posts()) : the_post(); ?>
                <!-- article -->
                <article id="post-<?php the_ID(); ?>" <?php post_class(); ?>>
                    <?php if ( has_post_thumbnail()) : // Check if thumbnail exists ?>
                        <div class="post-image">
                            <?php the_post_thumbnail("full"); ?>
                        </div>
                    <?php endif; ?>

                    <div class="container">
                        <a href="<?php echo get_permalink( get_option( 'page_for_posts' ) ); ?>" class="icon-link">
                            <?php echo file_get_contents(get_template_directory_uri() . '/assets/arrow-left.svg', true); ?>
                            Back to blog / news
                        </a>

                       <header class="post-header">
                            <h1>
                                <?php the_title(); ?>
                            </h1>

                            <div class="date">
                                <?php the_date(); ?>
                            </div>
                        </header>

                        <?php the_content(); // Dynamic Content ?>

                        <?php edit_post_link(); // Always handy to have Edit Post Links available ?>
                    </div>

                </article>
                <!-- /article -->

            <?php endwhile; ?>

            <?php else: ?>

                <!-- article -->
                <article>

                    <h1><?php _e( 'Sorry, nothing to display.', 'sapiat' ); ?></h1>

                </article>
                <!-- /article -->

            <?php endif; ?>
        </div>
    </article>

<?php get_footer(); ?>
