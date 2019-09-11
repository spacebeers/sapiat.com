<?php
    //require_once('includes/custom-login.php');
    include('classes/Shortcodes.php');
    include('classes/social_widget.php');
    include('classes/contact_widget.php');


    // Menus
	register_nav_menus( array(
		'main_menu' => 'Main menu',
		'resources_menu' => 'User menu'
	) );

    add_filter('nav_menu_css_class' , 'special_nav_class' , 10 , 2);

    function special_nav_class ($classes, $item) {
        if (in_array('current-menu-item', $classes) ){
            $classes[] = 'active ';
        }
        return $classes;
    }

    // Menus ends

    // Theme assets
    function sapiat_theme_assets() {
        wp_register_style( 'wpb-google-fonts', 'https://fonts.googleapis.com/css?family=Nunito:300,400,700&display=swap', false );
        wp_enqueue_style( 'wpb-google-fonts' );
        wp_register_script( 'sapiat-download', get_template_directory_uri() . '/vendor/multi-download/browser.js', array ( 'jquery' ), NULL, true);
        wp_enqueue_script( 'sapiat-download' );
        wp_register_script( 'sapiat-base', get_template_directory_uri() . '/scripts/theme.js', array( 'jquery' ), NULL, false );
        wp_enqueue_script( 'sapiat-base' );
        wp_register_script( 'sapiat-featherlight', get_template_directory_uri() . '/vendor/featherlight/release/featherlight.min.js', array( 'jquery' ), NULL, false );
        wp_enqueue_script( 'sapiat-featherlight' );
        wp_register_style( 'sapiat-featherlight-css', get_template_directory_uri() . '/vendor/featherlight/release/featherlight.min.css', false );
        wp_enqueue_style( 'sapiat-featherlight-css' );
        wp_register_style( 'sapiat-featherlight-gallery-css', get_template_directory_uri() . '/vendor/featherlight/release/featherlight.gallery.min.css', false );
        wp_enqueue_style( 'sapiat-featherlight-gallery-css' );
    }

    add_action( 'wp_enqueue_scripts', 'sapiat_theme_assets' );
    // Assets


    // Custom post types
   function create_posttype() {
        register_post_type('Download',
            array(
                'labels' => array(
                    'name' => __( 'Downloads' ),
                    'singular_name' => __( 'Download' )
                ),
                'public' => true,
                'has_archive' => false,
                'rewrite' => array('slug' => 'downloads'),
                'supports' => array('title'),
                'public' => true,
                'exclude_from_search' => true,
                'show_in_nav_menus'   => false,
                'publicly_queryable'  => false
            )
        );
        register_post_type('Product',
            array(
                'labels' => array(
                    'name' => __( 'Products' ),
                    'singular_name' => __( 'Product' )
                ),
                'hierarchical' => true,
                'public' => true,
                'has_archive' => true,
                'rewrite' => array('slug' => 'products'),
                'supports' => array('title', 'editor', 'excerpt'),
                'public' => true,
                'exclude_from_search' => true
            )
        );
        register_post_type('Solution',
            array(
                'labels' => array(
                    'name' => __( 'Solutions' ),
                    'singular_name' => __( 'Solution' )
                ),
                'public' => true,
                'has_archive' => true,
                'rewrite' => array('slug' => 'solutions'),
                'supports' => array('title', 'editor', 'excerpt'),
                'public' => true,
                'exclude_from_search' => true
            )
        );
        register_post_type('Staff',
            array(
                'labels' => array(
                    'name' => __( 'Staff' ),
                    'singular_name' => __( 'Staff' )
                ),
                'public' => true,
                'has_archive' => false,
                'rewrite' => array('slug' => 'staff'),
                'supports' => array('title', 'editor', 'thumbnail'),
                'exclude_from_search' => true
            )
        );
    }

    flush_rewrite_rules();

    add_action( 'init', 'create_posttype' );

    add_action( 'init', 'update_my_custom_type', 99 );

    function update_my_custom_type() {
        global $wp_post_types;

        if ( post_type_exists( 'download' ) ) {

            // exclude from search results
            $wp_post_types['download']->exclude_from_search = true;
        }
    }

    // Custom post types ends

    // Custom taxonomies
    function source_init() {
	    // create a new taxonomy
	    register_taxonomy(
            'download_category',
            'download',
            array(
                'label' => __( 'Download Category' ),
                'rewrite' => array( 'slug' => 'download_category' )
            )
        );
	    register_taxonomy(
            'product_category',
            'product',
            array(
                'label' => __( 'Product Category' ),
                'rewrite' => array( 'slug' => 'product_category' )
            )
        );
    }
    add_action( 'init', 'source_init' );

    // Custom taxonomy



    // Custom taxonomy ends


	// Theme customisers

	function sapiat_theme_customizer( $wp_customize ) {
		// logo
        $wp_customize->add_section( 'sapiat_logo_section' , array(
			'title'       => __( 'Logo', 'sapiat' ),
			'priority'    => 30,
			'description' => 'Upload a logo to replace the default site name and description in the header',
		));

		$wp_customize->add_setting( 'sapiat_logo' );

		$wp_customize->add_control( new WP_Customize_Image_Control( $wp_customize, 'sapiat_logo', array(
		    'label'    => __( 'Logo', 'sapiat' ),
		    'section'  => 'sapiat_logo_section',
		    'settings' => 'sapiat_logo',
        )));

        $wp_customize->remove_control("header_image");

        // contact
        $wp_customize->add_section( 'sapiat_contact_section' , array(
			'title'       => __( 'Contact', 'sapiat' ),
			'priority'    => 30,
			'description' => 'Add the company contact details in here',
		));

		$wp_customize->add_setting( 'sapiat_phone' );
		$wp_customize->add_control( new WP_Customize_Control( $wp_customize, 'sapiat_phone', array(
		    'label'    => __( 'Phone', 'sapiat' ),
		    'section'  => 'sapiat_contact_section',
		    'settings' => 'sapiat_phone',
            'type'			 => 'text'
		)));

		$wp_customize->add_setting( 'sapiat_email' );
		$wp_customize->add_control( new WP_Customize_Control( $wp_customize, 'sapiat_email', array(
		    'label'    => __( 'Email', 'sapiat' ),
		    'section'  => 'sapiat_contact_section',
		    'settings' => 'sapiat_email',
            'type'			 => 'text'
		)));

        $wp_customize->add_setting( 'sapiat_address' );
		$wp_customize->add_control( new WP_Customize_Control( $wp_customize, 'sapiat_address', array(
		    'label'    => __( 'Address', 'sapiat' ),
		    'section'  => 'sapiat_contact_section',
		    'settings' => 'sapiat_address',
            'type'			 => 'textarea'
		)));

		$wp_customize->add_setting( 'sapiat_twitter' );
		$wp_customize->add_control( new WP_Customize_Control( $wp_customize, 'sapiat_twitter', array(
		    'label'    => __( 'Twitter', 'sapiat' ),
		    'section'  => 'sapiat_contact_section',
		    'settings' => 'sapiat_twitter',
            'type'			 => 'text'
		)));

        $wp_customize->add_section( 'sapiat_pages_section' , array(
			'title'       => __( 'Page links', 'sapiat' ),
			'priority'    => 30,
			'description' => 'Set links to pages here',
		));

        $wp_customize->add_setting( 'sapiat_pages_contact_link', array(
            'capability' => 'edit_theme_options',
            'sanitize_callback' => 'sapiat_sanitize_dropdown_pages',
        ) );

        $wp_customize->add_control( 'sapiat_pages_contact_link', array(
            'type' => 'dropdown-pages',
            'section' => 'sapiat_pages_section',
            'label' => __( 'Link Contact page' ),
            'description' => __( 'Select a page to use as the contacts link.' ),
        ) );

        $wp_customize->add_setting( 'sapiat_pages_resourses_link', array(
            'capability' => 'edit_theme_options',
            'sanitize_callback' => 'sapiat_sanitize_dropdown_pages',
        ) );

        $wp_customize->add_control( 'sapiat_pages_resourses_link', array(
            'type' => 'dropdown-pages',
            'section' => 'sapiat_pages_section',
            'label' => __( 'Link Resourses page' ),
            'description' => __( 'Select a page to use as the resourses link.' ),
        ) );

         $wp_customize->add_setting( 'sapiat_pages_account_link', array(
            'capability' => 'edit_theme_options',
            'sanitize_callback' => 'sapiat_sanitize_dropdown_pages',
        ) );

        $wp_customize->add_control( 'sapiat_pages_account_link', array(
            'type' => 'dropdown-pages',
            'section' => 'sapiat_pages_section',
            'label' => __( 'Link Account page' ),
            'description' => __( 'Select a page to use as the account link.' ),
        ) );

        $wp_customize->add_setting( 'sapiat_pages_password_link', array(
            'capability' => 'edit_theme_options',
            'sanitize_callback' => 'sapiat_sanitize_dropdown_pages',
        ) );

        $wp_customize->add_control( 'sapiat_pages_password_link', array(
            'type' => 'dropdown-pages',
            'section' => 'sapiat_pages_section',
            'label' => __( 'Reset password page' ),
            'description' => __( 'Select a page to use as the custom password reset page.' ),
        ) );

        function sapiat_sanitize_dropdown_pages( $page_id, $setting ) {
            // Ensure $input is an absolute integer.
            $page_id = absint( $page_id );

            // If $page_id is an ID of a published page, return it; otherwise, return the default.
            return ( 'publish' == get_post_status( $page_id ) ? $page_id : $setting->default );
        }
	}

    add_action( 'customize_register', 'sapiat_theme_customizer' );

    // Theme customisers ends

    /*// Add metabox below editing pane
    function sapiat_metabox_after_title() {
        add_meta_box( 'after-title-help', 'Shortcodes', 'sapiat_after_title_help_metabox_content', 'page', 'advanced', 'high' );
    }
    add_action( 'add_meta_boxes', 'sapiat_metabox_after_title' );

    // callback function to populate metabox
    function sapiat_after_title_help_metabox_content() {
        echo "<p>There are shortcodes for this theme available:</p>";
        echo "<ul>";
        echo "<li><strong>Emded a chart:</strong> [embed-chart id=\"7176\" type=\"volatility\"]</li>";
        echo "<li><strong>Emded theme phone number:</strong> [contact_phone]</li>";
        echo "<li><strong>Emded theme email address:</strong> [contact_email]</li>";
        echo "</ul>";
        echo "<p>Paste the code including the square brackets in to the text editor to use.</p>";
    }*/


    // Sidebars

    function sapiat_widgets_init() {
        register_sidebar( array(
            'name' => __( 'Footer one', 'sapiat' ),
            'id' => 'footer-one-sidebar',
            'before_widget' => '<aside id="%1$s" class="widget %2$s">',
            'after_widget' => "</aside>",
            'before_title' => '<div class="widget-title">',
            'after_title' => '</div>',
        ));

        register_sidebar( array(
            'name' => __( 'Footer two', 'sapiat' ),
            'id' => 'footer-two-sidebar',
            'before_widget' => '<aside id="%1$s" class="widget %2$s">',
            'after_widget' => "</aside>",
            'before_title' => '<div class="widget-title">',
            'after_title' => '</div>',
        ));
        register_sidebar( array(
            'name' => __( 'Footer three', 'sapiat' ),
            'id' => 'footer-three-sidebar',
            'before_widget' => '<aside id="%1$s" class="widget %2$s">',
            'after_widget' => "</aside>",
            'before_title' => '<div class="widget-title">',
            'after_title' => '</div>',
        ));
        register_sidebar( array(
            'name' => __( 'Footer four', 'sapiat' ),
            'id' => 'footer-four-sidebar',
            'before_widget' => '<aside id="%1$s" class="widget %2$s">',
            'after_widget' => "</aside>",
            'before_title' => '<div class="widget-title">',
            'after_title' => '</div>',
        ));
        register_sidebar( array(
            'name' => __( 'Footer five', 'sapiat' ),
            'id' => 'footer-five-sidebar',
            'before_widget' => '<aside id="%1$s" class="widget %2$s">',
            'after_widget' => "</aside>",
            'before_title' => '<div class="widget-title">',
            'after_title' => '</div>',
        ));
        register_sidebar( array(
            'name' => __( 'Footer six', 'sapiat' ),
            'id' => 'footer-six-sidebar',
            'before_widget' => '<aside id="%1$s" class="widget %2$s">',
            'after_widget' => "</aside>",
            'before_title' => '<div class="widget-title">',
            'after_title' => '</div>',
        ));

        register_sidebar( array(
            'name' => __( 'Footer information area', 'sapiat' ),
            'id' => 'footer-information-sidebar',
            'before_widget' => '<aside id="%1$s" class="widget %2$s">',
            'after_widget' => "</aside>",
            'before_title' => '<div class="widget-title">',
            'after_title' => '</div>',
        ));

        register_sidebar( array(
            'name' => __( 'Resources sidebar area', 'sapiat' ),
            'id' => 'resources-sidebar',
            'before_widget' => '<aside id="%1$s" class="widget %2$s">',
            'after_widget' => "</aside>",
            'before_title' => '<div class="widget-title">',
            'after_title' => '</div>',
        ));
    }


    // Sidebars ends

    /*
     * Resister widgets from our classes
    */
    add_action( 'widgets_init', 'sapiat_widgets_init' );
    function wpb_load_widget() {
        register_widget( 'wpb_contact_widget' );
        register_widget( 'wpb_social_widget' );
    }
    add_action( 'widgets_init', 'wpb_load_widget' );


    // Widgets ends

    // WYSIWYG

    function my_mce_buttons_2( $buttons ) {
        /**
         * Add in a core button that's disabled by default
         */
        $buttons[] = 'superscript';
        $buttons[] = 'subscript';
        $buttons[] = 'tablecontrols';

        return $buttons;
    }
    add_filter( 'mce_buttons_2', 'my_mce_buttons_2' );

    // WYSIWYG ends



    // User roles
    // Add a custom user role
    add_action('after_setup_theme', 'remove_admin_bar');

    function remove_admin_bar() {
        if (!current_user_can('administrator') && !is_admin()) {
            show_admin_bar(false);
        }
    }

    $result = add_role( 'levelone', __('Level One' ),
        array(
            'read' => true, // true allows this capability
            'edit_posts' => false, // Allows user to edit their own posts
            'edit_pages' => false, // Allows user to edit pages
            'edit_others_posts' => false, // Allows user to edit others posts not just their own
            'create_posts' => false, // Allows user to create new posts
            'manage_categories' => false, // Allows user to manage post categories
            'publish_posts' => false, // Allows the user to publish, otherwise posts stays in draft mode
            'edit_themes' => false, // false denies this capability. User can’t edit your theme
            'install_plugins' => false, // User cant add new plugins
            'update_plugin' => false, // User can’t update any plugins
            'update_core' => false // user cant perform core updates
        ));
    $result = add_role( 'leveltwo', __('Level Two' ),
        array(
            'read' => true, // true allows this capability
            'edit_posts' => false, // Allows user to edit their own posts
            'edit_pages' => false, // Allows user to edit pages
            'edit_others_posts' => false, // Allows user to edit others posts not just their own
            'create_posts' => false, // Allows user to create new posts
            'manage_categories' => false, // Allows user to manage post categories
            'publish_posts' => false, // Allows the user to publish, otherwise posts stays in draft mode
            'edit_themes' => false, // false denies this capability. User can’t edit your theme
            'install_plugins' => false, // User cant add new plugins
            'update_plugin' => false, // User can’t update any plugins
            'update_core' => false // user cant perform core updates
        ));
    $result = add_role( 'levelthree', __('Level Three' ),
        array(
            'read' => true, // true allows this capability
            'edit_posts' => false, // Allows user to edit their own posts
            'edit_pages' => false, // Allows user to edit pages
            'edit_others_posts' => false, // Allows user to edit others posts not just their own
            'create_posts' => false, // Allows user to create new posts
            'manage_categories' => false, // Allows user to manage post categories
            'publish_posts' => false, // Allows the user to publish, otherwise posts stays in draft mode
            'edit_themes' => false, // false denies this capability. User can’t edit your theme
            'install_plugins' => false, // User cant add new plugins
            'update_plugin' => false, // User can’t update any plugins
            'update_core' => false // user cant perform core updates
        ));
    $result = add_role( 'levelfour', __('Level Four' ),
        array(
            'read' => true, // true allows this capability
            'edit_posts' => false, // Allows user to edit their own posts
            'edit_pages' => false, // Allows user to edit pages
            'edit_others_posts' => false, // Allows user to edit others posts not just their own
            'create_posts' => false, // Allows user to create new posts
            'manage_categories' => false, // Allows user to manage post categories
            'publish_posts' => false, // Allows the user to publish, otherwise posts stays in draft mode
            'edit_themes' => false, // false denies this capability. User can’t edit your theme
            'install_plugins' => false, // User cant add new plugins
            'update_plugin' => false, // User can’t update any plugins
            'update_core' => false // user cant perform core updates
        ));

    // Removes from admin menu
    add_action( 'admin_menu', 'my_remove_admin_menus' );
    function my_remove_admin_menus() {
        remove_menu_page( 'edit-comments.php' );
        //remove_menu_page('edit.php');
    }
    // Removes from post and pages
    add_action('init', 'remove_comment_support', 100);

    function remove_comment_support() {
        remove_post_type_support( 'post', 'comments' );
        remove_post_type_support( 'page', 'comments' );
    }
    // Removes from admin bar
    function mytheme_admin_bar_render() {
        global $wp_admin_bar;
        $wp_admin_bar->remove_menu('comments');
    }
    add_action( 'wp_before_admin_bar_render', 'mytheme_admin_bar_render' );

    // Add logout to menu
    add_filter( 'wp_nav_menu_items', 'sapiat_loginout_menu_link', 10, 2 );

    function sapiat_loginout_menu_link( $items, $args ) {
        if ($args->menu->slug == 'user-menu') {
            $items .= '<li><a href="'. wp_logout_url() .'">'. __("Log Out") .'</a></li>';
        }
        return $items;
    }

    // Post support
	add_theme_support( 'post-thumbnails' );
	set_post_thumbnail_size( 825, 510, true );

    // Create the Custom Excerpts callback
    function sapiat_excerpt($length_callback = '', $more_callback = '') {
        global $post;
        if (function_exists($length_callback)) {
            add_filter('excerpt_length', $length_callback);
        }
        if (function_exists($more_callback)) {
            add_filter('excerpt_more', $more_callback);
        }
        $output = get_the_excerpt();
        $output = apply_filters('wptexturize', $output);
        $output = apply_filters('convert_chars', $output);
        $output = '<p>' . $output . '</p>';
        echo $output;
    }

    // Pagination for paged posts, Page 1, Page 2, Page 3, with Next and Previous Links, No plugin
    function sapiat_pagination()
    {
        global $wp_query;
        $big = 999999999;
        echo paginate_links(array(
            'base' => str_replace($big, '%#%', get_pagenum_link($big)),
            'format' => '?paged=%#%',
            'current' => max(1, get_query_var('paged')),
            'total' => $wp_query->max_num_pages
        ));
    }
?>