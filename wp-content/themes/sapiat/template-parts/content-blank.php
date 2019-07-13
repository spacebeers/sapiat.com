<?php
    /**
    * Template Name: Landing Page
    */
?>

<article id="post-<?php the_ID(); ?>" <?php post_class("page"); ?> style="background-color: <?php the_field("background_colour"); ?>">
    <header class="header-page">
        <div class="container">
            <?php the_title('<h1>', '</h1>'); ?>
        </div>
    </header>

    <div class="container">
        <div class="content-main">
            <div class="content-view full" style="background-color: <?php the_field("background_colour"); ?>">
                <?php edit_post_link( __( ' Edit', 'sapiat' ), '<footer class="entry-footer"><span class="edit-link">', '</span></footer><!-- .entry-footer -->' ); ?>

                <?php the_content(); ?>
            </div>
        </div>
    </div>
</article>