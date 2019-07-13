<?php if( have_rows('tabs') ): ?>
    <div id="cycle-tabs">
        <!-- Nav tabs -->
        <div class="tabs-top">
            <div class="container">
                <ul class="nav nav-tabs" role="tablist">
                    <?php if( have_rows('tabs') ):
                        $count = 0;
                    ?>
                        <?php while( have_rows('tabs') ): the_row();
                            $id = '#tab' . $count;
                            $tab = get_sub_field('tab');
                            $tab_title = $tab['tab_title'];?>
                            <li role="presentation" class="<?php echo $count == 0 ? ' active' : ''; ?>"><a href="<?php echo $id; ?>" class="tab-control" aria-controls="<?php echo $tab_title; ?>" role="tab" data-toggle="tab"><?php echo $tab_title; ?></a></li>
                        <?php
                            $count++;
                        endwhile; ?>
                    <?php endif; ?>
                </ul>
            </div>
        </div>

        <!-- Tab panes -->
        <div class="tabs-bottom">
            <div class="container">
                <div class="tab-content">
                    <?php if( have_rows('tabs') ):
                        $count = 0;
                    ?>
                        <?php while( have_rows('tabs') ): the_row();
                            $id = 'tab' . $count;
                            $tab = get_sub_field('tab');
                            $heading = $tab['heading'];
                            $content = $tab['content'];

                        ?>
                            <div role="tabpanel" class="tab-pane fade <?php echo $count == 0 ? ' active in' : ''; ?>" id="<?php echo $id; ?>">
                                <h2><?php echo $heading; ?></h2>
                                <?php echo $content; ?>
                            </div>
                        <?php
                            $count++;
                        endwhile; ?>
                    <?php endif; ?>
                </div>
            </div>
        </div>
    </div>
<?php endif; ?>