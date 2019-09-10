<?php
    $form_id = get_field('form');
?>

<article id="post-<?php the_ID(); ?>" <?php post_class("page main-content"); ?>>
    <div class="contents form-page">
        <div class="container">
            <header>
                <h1 class="underline-header">
                    <?php the_title(); ?>
                </h1>
            </header>

            <div class="contact-grid">
                <aside>
                    <?php the_content(); ?>

                    <?php edit_post_link( __( ' Edit', 'sapiat' ), '<footer class="entry-footer"><span class="edit-link">', '</span></footer><!-- .entry-footer -->' ); ?>
                </aside>

                <div class="form-contents">
                    <?php echo do_shortcode('[wpforms id="'.$form_id.'" title="true"]'); ?>
                </div>
            </div>
        </div>
    </div>
</article>