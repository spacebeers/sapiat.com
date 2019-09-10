<?php
    if (get_field('show_callout_box', $post)):
?>
    <div class="container">
        <div class="constrainer">
            <div class="callout-box">
                <div class="callout-content">
                    <div class="callout-title">
                        <h3><?php the_field("callout_title", $post); ?></h3>
                    </div>
                    <div class="callout-contents">
                        <?php the_field("callout_content", $post); ?>
                    </div>
                </div>
                <footer class="callout-footer">
                    <?php
                        $post_object = get_field('callout_link');

                        if( $post_object ):

                            // override $post
                            $post = $post_object;
                            setup_postdata( $post );

                            ?>

                            <a href="<?php the_permalink(); ?>" class="icon-link">
                                <?php the_title(); ?>
                                <?php echo file_get_contents(get_template_directory_uri() . '/assets/arrow-right.svg', true); ?>
                            </a>

                            <?php wp_reset_postdata(); // IMPORTANT - reset the $post object so the rest of the page works correctly ?>
                        <?php endif; ?>
                </footer>
            </div>
        </div>
    </div>
<?php
    endif;
?>