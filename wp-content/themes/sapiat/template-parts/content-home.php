<article id="post-<?php the_ID(); ?>" <?php post_class("page"); ?>>
    <?php get_template_part( 'template-parts/content', 'banner' ); ?>
    <?php get_template_part( 'template-parts/content', 'tabs' ); ?>

    <div class="container">
        <div class="blocks">
            <!--<div class="block">
                <?php
                    $section_one = get_field('section_one');
                    echo $section_one['content'];
                ?>
            </div>
            <div class="block">
                <?php
                    $section_two = get_field('section_two');
                    $shortcode = '[embed-chart id="'.$section_two['chart_id'].'" type="'.$section_two['type'].'"]';
                ?>
                <h2><?php echo $section_two['title']; ?></h2>
                <?php echo do_shortcode($shortcode); ?>
                <?php if ($section_two['link']): ?>
                    <a href="<?php echo $section_two['link']; ?>" class="btn btn-primary"><?php echo $section_two['link_text']; ?></a>
                <?php endif; ?>
            </div>-->
            <div class="block">
                <?php
                    $section_three = get_field('section_three');
                    echo $section_three['content'];
                ?>
            </div>
            <div class="block twitter-feed">
                <h2>Twitter feed</h2>
                <a class="twitter-timeline" data-chrome="noheader" data-height="500" data-link-color="#0D2B4C" href="https://twitter.com/sapiat?ref_src=twsrc%5Etfw">Tweets by sapiat</a> <script async src="https://platform.twitter.com/widgets.js" charset="utf-8"></script>
                <?php dynamic_sidebar('twitter-sidebar'); ?>
            </div>
        </div>
    </div>
</article>