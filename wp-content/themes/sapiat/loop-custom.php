
<?php if (have_posts()): while (have_posts()) : the_post(); ?>
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
    <!-- /article -->
<?php endwhile; ?>
<?php else: ?>

	<!-- article -->
	<article>
		<h2><?php _e( 'Sorry, nothing to display.', 'sapiat' ); ?></h2>
	</article>
	<!-- /article -->

<?php endif; ?>
