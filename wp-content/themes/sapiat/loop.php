<div class="post-list">
    <?php if (have_posts()): while (have_posts()) : the_post(); ?>
        <!-- article -->
        <article id="post-<?php the_ID(); ?>" <?php post_class('post-list-item'); ?>>
            <!-- post thumbnail -->
            <?php if ( has_post_thumbnail()) : // Check if thumbnail exists ?>
                <div class="post-image">
                    <a href="<?php the_permalink(); ?>" title="<?php the_title(); ?>" style="background-image: url(<?php echo the_post_thumbnail_url('full'); ?>);"></a>
                </div>
            <?php endif; ?>
            <!-- /post thumbnail -->
            <div class="post-main">
                <header class="post-header">
                    <h2>
                        <a href="<?php the_permalink(); ?>" title="<?php the_title(); ?>"><?php the_title(); ?></a>
                    </h2>

                    <div class="date">
                        <?php the_date(); ?>
                    </div>
                </header>

                <?php the_excerpt(); ?>

                <footer>
                    <a href="<?php the_permalink(); ?>" class="btn" aria-label="Read <?php the_title(); ?>">More</a>
                </footer>
            </div>
        </article>
        <!-- /article -->
    <?php endwhile; ?>
</div>
<?php else: ?>

	<!-- article -->
	<article>
		<h2><?php _e( 'Sorry, nothing to display.', 'sapiat' ); ?></h2>
	</article>
	<!-- /article -->

<?php endif; ?>
