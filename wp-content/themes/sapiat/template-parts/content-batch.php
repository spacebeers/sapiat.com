<?php
  $data_group = get_field('data_content');
  $application_group = get_field('application_content');
  $documents_group = get_field('documents_content');
  $applications_group = get_field('applications_content');
  $databook_group = get_field('databook_content');
  $user = wp_get_current_user();
  $roles = $user->roles;
  foreach($roles as $role):
    $meta[] = array(
        'key'		=> 'user_roles',
        'value'		=> $role,
        'compare'	=> 'LIKE'
    );
  endforeach;
?>

<article id="post-<?php the_ID(); ?>" <?php post_class("page"); ?>>
  <div class="container">
    <div class="constrainer">
      <h1 class="underline-header"><?php the_title(); ?></h1>

      <div class="downloads-summary">
        <?php the_content(); ?>

        <?php edit_post_link( __( ' Edit', 'sapiat' ), '<footer class="entry-footer"><span class="edit-link">', '</span></footer><!-- .entry-footer -->' ); ?>
      </div>

      <div class="downloads-layout">
        <div class="downloads-list">
          <h2>Downloads</h2>
          <div class="downloads">
              <div class="download-container">
                <?php
                  if (current_user_can('administrator')):
                    $args = array(
                      'post_type' => 'download',
                      'posts_per_page' => 1000,
                      'tax_query' => array(
                        array(
                          'taxonomy' => 'download_category',
                          'field'    => 'slug',
                          'terms'    => 'data',
                        )
                      )
                    );
                  else:
                    $args = array(
                      'post_type' => 'download',
                      'posts_per_page' => 1000,
                      'tax_query' => array(
                        array(
                          'taxonomy' => 'download_category',
                          'field'    => 'slug',
                          'terms'    => 'data',
                        )
                      ),
                      'meta_query'	=> array(
                        'relation'		=> 'OR',
                        $meta
                      )
                    );
                  endif;

                  $the_query = new WP_Query( $args );
                ?>
                <div class="flexy">
                  <div class="info">
                    <h3><?php echo $data_group['title'];?></h3>
                    <?php echo $data_group['content'];?>
                  </div>
                  <div class="controls">
                    <?php
                      if ( $the_query->have_posts() ) { ?>
                        <div class="batch-form">
                          <div class="dropdown-box light">
                            <select multiple="true" name="download-select" class="form-control">
                              <?php while ( $the_query->have_posts() ): $the_query->the_post(); ?>
                                  <option value="<?php echo get_field('file');?>"><?php the_title(); ?></option>
                              <?php endwhile;
                                wp_reset_postdata();
                              ?>
                            </select>
                          </div>
                          <button class="btn btn-secondary btn-block" download disabled>Download</button>

                          <small>Hold ctrl or cmd to select multiple files</small>
                        </div>
                      <?php } else {  ?>
                        <div class="no-downloads">No downloads available</div>
                      <?php }   ?>
                    </div>
                </div>
              </div>

              <div class="download-container">
                <?php
                  if (current_user_can('administrator')):
                    $args = array(
                      'post_type' => 'download',
                      'posts_per_page' => 1000,
                      'tax_query' => array(
                        array(
                          'taxonomy' => 'download_category',
                          'field'    => 'slug',
                          'terms'    => 'document',
                        )
                      )
                    );
                  else:
                    $args = array(
                      'post_type' => 'download',
                      'posts_per_page' => 1000,
                      'tax_query' => array(
                        array(
                          'taxonomy' => 'download_category',
                          'field'    => 'slug',
                          'terms'    => 'document',
                        )
                      ),
                      'meta_query'	=> array(
                        'relation'		=> 'OR',
                        $meta
                      )
                    );
                  endif;
                  $the_query = new WP_Query( $args );
                ?>
                <div class="flexy">
                  <div class="info">
                    <h3><?php echo $documents_group['title'];?></h3>
                    <?php echo $documents_group['content'];?>
                  </div>
                  <div class="controls">
                    <?php
                      if ( $the_query->have_posts() ) { ?>
                        <div class="batch-form">
                          <div class="dropdown-box light">
                            <select multiple="true" name="download-select" class="form-control">
                              <?php while ( $the_query->have_posts() ): $the_query->the_post(); ?>
                                  <option value="<?php echo get_field('file');?>"><?php the_title(); ?></option>
                              <?php endwhile;
                                wp_reset_postdata();
                              ?>
                            </select>
                          </div>
                          <button class="btn btn-secondary btn-block" download disabled>Download</button>

                          <small>Hold ctrl or cmd to select multiple files</small>
                        </div>
                      <?php } else {  ?>
                        <div class="no-downloads">No downloads available</div>
                      <?php }   ?>
                    </div>
                </div>
              </div>

              <div class="download-container">
                <?php
                  if (current_user_can('administrator')):
                    $args = array(
                      'post_type' => 'download',
                      'posts_per_page' => 1000,
                      'tax_query' => array(
                        array(
                          'taxonomy' => 'download_category',
                          'field'    => 'slug',
                          'terms'    => 'applications',
                        )
                      )
                    );
                  else:
                    $args = array(
                      'post_type' => 'download',
                      'posts_per_page' => 1000,
                      'tax_query' => array(
                        array(
                          'taxonomy' => 'download_category',
                          'field'    => 'slug',
                          'terms'    => 'applications',
                        )
                      ),
                      'meta_query'	=> array(
                        'relation'		=> 'OR',
                        $meta
                      )
                    );
                  endif;

                  $the_query = new WP_Query( $args );
                ?>
                <div class="flexy">
                  <div class="info">
                    <h3><?php echo $applications_group['title'];?></h3>
                    <?php echo $applications_group['content'];?>
                  </div>
                  <div class="controls">
                    <?php
                      if ( $the_query->have_posts() ) { ?>
                        <div class="batch-form">
                          <div class="dropdown-box light">
                            <select multiple="true" name="download-select" class="form-control">
                              <?php while ( $the_query->have_posts() ): $the_query->the_post(); ?>
                                  <option value="<?php echo get_field('file');?>"><?php the_title(); ?></option>
                              <?php endwhile;
                                wp_reset_postdata();
                              ?>
                            </select>
                          </div>
                          <button class="btn btn-secondary btn-block" download disabled>Download</button>

                          <small>Hold ctrl or cmd to select multiple files</small>
                        </div>
                      <?php } else {  ?>
                        No applications available
                      <?php }   ?>
                    </div>
                </div>
              </div>

              <div class="download-container">
                <?php
                  if (current_user_can('administrator')):
                    $args = array(
                      'post_type' => 'download',
                      'posts_per_page' => 1000,
                      'tax_query' => array(
                        array(
                          'taxonomy' => 'download_category',
                          'field'    => 'slug',
                          'terms'    => 'databook',
                        )
                      )
                    );
                  else:
                    $args = array(
                      'post_type' => 'download',
                      'posts_per_page' => 1000,
                      'tax_query' => array(
                        array(
                          'taxonomy' => 'download_category',
                          'field'    => 'slug',
                          'terms'    => 'databook',
                        )
                      ),
                      'meta_query'	=> array(
                        'relation'		=> 'OR',
                        $meta
                      )
                    );
                  endif;

                  $the_query = new WP_Query( $args );
                ?>
                <div class="flexy">
                  <div class="info">
                    <h3><?php echo $databook_group['title'];?></h3>
                    <?php echo $databook_group['content'];?>
                  </div>
                  <div class="controls">
                    <?php
                      if ( $the_query->have_posts() ) { ?>
                        <div class="batch-form">
                          <div class="dropdown-box light">
                            <select multiple="true" name="download-select" class="form-control">
                              <?php while ( $the_query->have_posts() ): $the_query->the_post(); ?>
                                  <option value="<?php echo get_field('file');?>"><?php the_title(); ?></option>
                              <?php endwhile;
                                wp_reset_postdata();
                              ?>
                            </select>
                          </div>
                          <button class="btn btn-secondary btn-block" download disabled>Download</button>

                          <small>Hold ctrl or cmd to select multiple files</small>
                        </div>
                      <?php } else {  ?>
                        <div class="no-downloads">No downloads available</div>
                      <?php }   ?>
                    </div>
                </div>
              </div>
            </div>
        </div>
        <aside class="downloads-account">
          <h2>Your account</h2>

          <?php dynamic_sidebar('resources-sidebar'); ?>
        </aside>
      </div>
    </div>
  </div>
</article>