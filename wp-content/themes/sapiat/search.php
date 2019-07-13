<?php get_header();
	$contact_page = get_theme_mod('sapiat_pages_contact_link');
?>

<article id="post-<?php the_ID(); ?>" <?php post_class("page"); ?>>
    <header class="header-page">
        <div class="container">
            <h1><?php printf( __( 'Search Results for: %s', 'twentyfourteen' ), get_search_query() ); ?></h1>
        </div>
    </header>
	<div class="container">
		<div class="content-main">
			<div class="content-view">
				<?php if ( have_posts() ) : ?>
					<?php
					// Start the Loop.
					echo "<ul class='search-list'>";
					while ( have_posts() ) : the_post(); ?>
						<li>
							<h3><a href="<?php the_permalink() ?>"><?php the_title(); ?></a></h3>
							<?php the_post_thumbnail('medium') ?>
							<?php echo substr(get_the_excerpt(), 0, 200); ?>
							<div class="h-readmore">
								<a href="<?php the_permalink(); ?>">Read More</a>
							</div>
						</li>
					<?php
					endwhile;
					echo "</ul>";
				else :
					echo "<h1>Sorry we couldn't find any results</h1>";
					echo "<p>Please try again.</p>";
				endif;
				?>
			</div>
			<div class="content-side">
				<h2>Search again</h2>
				<?php get_search_form(); ?>


				<ul>
					<li>
						<a href="<?php echo get_permalink($contact_page); ?>">Contact us</a>
					</li>
				</ul>
			</div>
		</div>
	</div>
</article>

<?php get_footer();?>