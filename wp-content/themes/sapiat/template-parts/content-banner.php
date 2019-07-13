<?php
    $gallery = get_field('gallery');
    $count = 0;
    if( have_rows('gallery') ):
        $gallery_counter = get_field_object('gallery');
        $count = (count($gallery_counter));
    endif;

    $show_gallery = $count > 0 ? true : false;
?>

<section class="banner" id="banner">
    <div class="loader" id="loader"></div>
    <?php if ($show_gallery): ?>
        <div class="gallery" id="gallery">
    <?php endif; ?>
        <?php if( have_rows('gallery') ): ?>
            <?php while( have_rows('gallery') ): the_row();
                $image = get_sub_field('gallery_image');
                $video = get_sub_field('gallery_video');
                $sub_image = get_sub_field('sub_image');

                if (get_sub_field('media_type') == 'image'): ?>
                    <div class="wrapper">
                        <div class="container">
                            <div class="banner-content">
                                <div class="banner-left">
                                    <div class="aligner">
                                        <h1><?php the_sub_field('heading'); ?></h1>
                                        <p><?php the_sub_field('text'); ?></p>
                                    </div>
                                </div>
                                <div class="banner-right">
                                    <div class="aligner">
                                        <img src="<?php echo $sub_image['url']; ?>" alt="<?php echo $sub_image['alt']; ?>" class="img-responsive" />
                                    </div>
                                </div>
                            </div>
                        </div>
                        <div class="gallery-image" style="background-image: url(<?php echo $image['url']; ?>);"></div>
                    </div>
                <?php else: ?>
                    <div class="embed-container">
                        <?php the_sub_field('gallery_video'); ?>
                    </div>
                <?php endif; ?>
            <?php endwhile; ?>
        <?php endif; ?>
    <?php if ($show_gallery): ?>
        </div>
    <?php endif; ?>
</section>
