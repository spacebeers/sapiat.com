<?php wp_get_post_parent_id( $post_ID ); ?>
<?php
    if ($post->post_parent) $parent = $post->post_parent;
    else $parent = $post->ID;
?>

<article id="post-<?php the_ID(); ?>" <?php post_class("page"); ?>>
    <header class="header-page">
        <div class="container">
            <?php the_title('<h1>', '</h1>'); ?>
        </div>
    </header>

    <div class="container">
        <div class="content-main">
            <div class="content-view">
                <?php edit_post_link( __( ' Edit', 'sapiat' ), '<footer class="entry-footer"><span class="edit-link">', '</span></footer><!-- .entry-footer -->' ); ?>

                <div class="dropdown-box visible-xs">
                    <form action="<?php bloginfo('url'); ?>" method="get">
                            <?php
                            $select = wp_dropdown_pages(
                                array(
                                    'child_of'    => $parent,
                                    'echo'        => 0,
                                    'name'        => 'page_id',
                                    'id'          => 'pageNav',
                                    'sort_column' => 'menu_order',
                                    'selected'    => $post->ID,
                                    'class'       => "form-control"
                                )
                            );

                            echo str_replace('<select ', '<select onchange="this.form.submit()" ', $select);
                            ?>
                        </form>
                </div>

                <?php the_content(); ?>
            </div>
            <div class="content-side">
                <h2><a href="<?php echo get_the_permalink($parent); ?>"><?php echo get_the_title($parent); ?></a></h2>

                <ul class="page-button-nav">
                    <?php
                        wp_list_pages(array(
                            'child_of'    => $parent,
                            'sort_column' => 'menu_order',
                            'title_li'    => '',
                        ));
                    ?>
                </ul>

                <?php dynamic_sidebar('content-sidebar'); ?>
            </div>
        </div>
    </div>
</article>