<?php $banner = get_field('banner'); ?>

<section class="banner" id="banner" style="background-image: url(<?php echo $banner['url']; ?>);">
    <div class="container">
        <h1>
            <?php
                if (get_field('overwrite_title')):
                    the_field('fancy_title');
                else:
                    the_title();
                endif;
            ?>
        </h1>
    </div>
</section>
