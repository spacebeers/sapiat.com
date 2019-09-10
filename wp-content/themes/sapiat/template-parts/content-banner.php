<?php $banner = get_field('banner'); ?>

<section class="banner" id="banner" style="background-image: url(<?php echo $banner['url']; ?>);">
    <div class="container">
        <h1>
            <?php
                if (get_field('bold_title') && get_field('light_title')):
                    the_field('bold_title');
                    echo '<span class="light-text">'. get_field('light_title') .'</span>';
                else:
                    the_title();
                endif;
            ?>
        </h1>

        <?php
            if (get_field('banner_text')): ?>
                <div class="constrainer">
                    <?php the_field('banner_text'); ?>
                </div>
        <?php
            endif;
        ?>

    </div>
</section>
