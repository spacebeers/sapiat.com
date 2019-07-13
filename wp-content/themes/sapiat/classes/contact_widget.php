<?php
    // Creating the widget
    class wpb_contact_widget extends WP_Widget {

        function __construct() {
            parent::__construct(

            // Base ID of your widget
            'wpb_contact_widget',

            // Widget name will appear in UI
            __('Site Contact Details', 'wpb_widget_domain'),

            // Widget description
            array( 'description' => __( 'Contact details widget', 'wpb_widget_domain' ), ));
        }

        // Creating widget front-end
        public function widget( $args, $instance ) {
            $title = apply_filters( 'widget_title', $instance['title'] );

            // before and after widget arguments are defined by themes
            echo $args['before_widget'];
            $before_title = "<div class='widget-title'>";
            $after_title = "</div>";
            echo $before_title . $title . $after_title; ?>
                <ul class="contact-list">
                    <li class="email">
                        <a href="mailto:<?php echo get_theme_mod( 'sapiat_email'); ?>"><?php echo get_theme_mod( 'sapiat_email', 'No email has been saved yet. Please add it in the theme configuration' ); ?></a>
                    </li>
                    <li class="phone">
                        <a href="tel:<?php echo get_theme_mod( 'sapiat_phone'); ?>"><?php echo get_theme_mod( 'sapiat_phone', 'No phone number has been saved yet. Please add it in the theme configuration' ); ?></a>
                    </li>
                    <li class="address">
                        <?php //echo get_theme_mod( 'sapiat_address', 'No address has been saved yet. Please add it in the theme configuration' ); ?>
                    </li>
                </ul>
            <?php
            echo $args['after_widget'];
        }

        // Widget Backend
        public function form( $instance ) {
            if ( isset( $instance[ 'title' ] ) ) {
                $title = $instance[ 'title' ];
            } else {
                $title = __( 'New title', 'wpb_widget_domain' );
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