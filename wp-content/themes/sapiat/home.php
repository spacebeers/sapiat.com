<?php
    $page_title = get_the_title( get_option('page_for_posts', true) );
?>

<?php get_header(); ?>
    <div class="container">
        <section class="contents blog-page">
            <h1 class="underline-header"><?php echo $page_title; ?></h1>

            <?php get_template_part('loop'); ?>

            <footer class="posts-footer" style="display: none;">
                <div>1</div>
                <div>2</div>
            </footer>
        </section>
    </div>
<?php get_footer(); ?>
