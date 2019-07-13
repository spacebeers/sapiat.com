<?php get_header(); ?>
	<article id="post-<?php the_ID(); ?>" <?php post_class("page login-page"); ?>>
		<div class="login-form">
			<h1 class="page-title"><?php _e( 'Access denied', 'sapiat' ); ?></h1>
			<p><?php _e( 'You must be logged in to see this page', 'sapiat' ); ?></p>
		</div>
	</article>
<?php get_footer(); ?>