<?php
    // Creating the widget
    class wpb_social_widget extends WP_Widget {

        function __construct() {
            parent::__construct(

            // Base ID of your widget
            'wpb_soical_widget',

            // Widget name will appear in UI
            __('Site Social Links', 'wpb_widget_domain'),

            // Widget description
            array( 'description' => __( 'Social links widget', 'wpb_widget_domain' ), ));
        }

        // Creating widget front-end
        public function widget( $args, $instance ) {
            $title = apply_filters( 'widget_title', $instance['title'] );

            // before and after widget arguments are defined by themes
            echo $args['before_widget'];
            echo $before_widget;
            $before_title = "<div class='widget-title'>";
            $after_title = "</div>";
            echo $before_title . $title . $after_title; ?>
                <ul class="social-list">
                    <?php if (get_theme_mod( 'sapiat_twitter')): ?>
                        <li class="twitter">
                            <a href="<?php echo get_theme_mod( 'sapiat_twitter'); ?>" target="_blank">
                                <img src="<?php bloginfo('template_directory'); ?>/assets/twitter.png" />
                            </a>
                        </li>
                    <?php endif; ?>
                </ul>
            <?php
            echo $after_widget;
        }

        // Widget Backend
        public function form( $instance ) {
            if ( isset( $instance[ 'title' ] ) ) {
                $title = $instance[ 'title' ];
            } else {
                $title = __( '', 'wpb_widget_domain' );
            }
            // Widget admin form
        ?>
        <p>
            <label for="<?php echo $this->get_field_id( 'title' ); ?>"><?php _e( 'Title:' ); ?></label>
            <input class="widefat" id="<?php echo $this->get_field_id( 'title' ); ?>" name="<?php echo $this->get_field_name( 'title' ); ?>" type="text" value="<?php echo esc_attr( $title ); ?>" />
        </p>
        <?php
        }

        // Updating widget replacing old instances with new
        public function update( $new_instance, $old_instance ) {
            $instance = array();
            $instance['title'] = ( ! empty( $new_instance['title'] ) ) ? strip_tags( $new_instance['title'] ) : '';
            return $instance;
        }
    } // Class wpb_widget ends here
?>