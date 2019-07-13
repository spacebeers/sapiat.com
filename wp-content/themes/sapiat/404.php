<?php get_header(); ?>
	<article id="post-<?php the_ID(); ?>" <?php post_class("page login-page"); ?>>
		<div class="login-form">
			<h1 class="page-title"><?php _e( 'Page not found', 'sapiat' ); ?></h1>
			<p><?php _e( 'It looks like nothing was found at this location. Maybe try a search?', 'sapiat' ); ?></p>
		</div>
	</article>
<?php get_footer(); ?>