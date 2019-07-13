<?php
    class Shortcodes {
        function __construct() {
            add_shortcode('contact_email',  array($this, 'contact_email_shortcode'));
            add_shortcode('contact_phone',  array($this, 'contact_phone_shortcode'));
            add_shortcode('embed-chart',  array($this, 'em_embed_chart_shortcode'));
        }

        function contact_email_shortcode($atts, $content = null) {
            return get_theme_mod( 'sapiat_email', '' );
        }

        function contact_phone_shortcode($atts, $content = null) {
            return get_theme_mod( 'sapiat_phone', '' );
        }

        function em_embed_chart_shortcode( $atts, $content = null ) {
            $a = shortcode_atts( array(
                'id' => '7176',
                'type' => 'volatility',
            ), $atts );

            return '<div data-embed-chart="' . esc_attr($a['id']) . '" data-chart-type="' . esc_attr($a['type']) . '">'. file_get_contents(get_template_directory() . "/assets/spinner.svg") .'</div>';
        }
    }

    $shortcodes = new Shortcodes();
?>
