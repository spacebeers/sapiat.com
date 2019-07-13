<?php
    $downloads_page = get_theme_mod('sapiat_pages_resourses_link');
    $account_page = get_theme_mod('sapiat_pages_account_link');
?>

<!DOCTYPE html>
<html <?php language_attributes(); ?> class="no-js">
<head>
    <meta charset="<?php bloginfo( 'charset' ); ?>">
    <title><?php wp_title(); ?></title>
    <meta name="viewport" content="width=device-width, initial-scale=1.0, maximum-scale=1.0, user-scalable=no" />
	<link rel="pingback" href="<?php bloginfo( 'pingback_url' ); ?>">
	<link rel="stylesheet" type="text/css" href="<?php bloginfo('template_directory'); ?>/style.css">
	<?php wp_head(); ?>
</head>

<body <?php body_class(); ?>>
    <header class="site-header" id="header">
        <div class="header-menu">
            <div class="container">
                <div class="sub-block">
                    <?php wp_nav_menu( array(
                        'theme_location' => 'secondary_menu',
                        'menu_class'     => 'sub-menu',
                    ) ); ?>
                    <div class="menu-sub-menu-container">
                        <ul class="sub-menu">
                            <li>
                                <?php if (is_user_logged_in()): ?>
                                    <a href="<?php echo get_permalink($downloads_page); ?>" title="Downloads">Downloads</a>
                                    <a href="<?php echo get_permalink($account_page); ?>" title="Your account">Account</a>
                                    <a href="<?php echo wp_logout_url(); ?>" title="Log out">Log out</a>
                                <?php else: ?>
                                    <a href="<?php echo wp_login_url( home_url() ); ?>" title="Login">Log in</a>
                                    <a href="<?php echo wp_login_url( home_url() ); ?>" title="Downloads">Downloads</a>
                                <?php endif; ?>
                            </li>
                        </ul>
                    </div>
                    <?php get_search_form(); ?>
                </div>
            </div>
        </div>
        <div class="navbar navbar-default">
            <div class="container">
                <div class="navbar-header">
                    <button type="button" class="navbar-toggle collapsed" id="nav-toogle">
                        <span class="sr-only">Toggle navigation</span>
                        <span class="icon-bar hidey"></span>
                        <span class="icon-bar cross"></span>
                        <span class="icon-bar cross"></span>
                        <span class="icon-bar hidey"></span>
                    </button>
                    <a class="navbar-brand" href='<?php echo esc_url( home_url( '/' ) ); ?>' class="navbar-brand" title='<?php echo esc_attr( get_bloginfo( 'name', 'display' ) ); ?>' rel='home'>
                        <img src='<?php echo esc_url( get_theme_mod( 'sapiat_logo' ) ); ?>' alt='<?php echo esc_attr( get_bloginfo( 'name', 'display' ) ); ?>'>
                    </a>
                </div>

                <div class="navbar-collapse">
                    <?php
                        wp_nav_menu( array(
                            'menu'              => 'main_menu',
                            'theme_location'    => 'main_menu',
                            'depth'             => 2,
                            'container'         => 'div',
                            'container_id'      => 'main-navigation',
                            'menu_class'        => 'nav navbar-nav navbar-right',
                            'fallback_cb'       => 'WP_Bootstrap_Navwalker::fallback',
                            'walker'            => new BootstrapNavMenuWalker())
                        );
                    ?>
                    <div class="sub-menu-mobile">
                        <?php wp_nav_menu( array(
                            'theme_location' => 'secondary_menu',
                            'menu_class'     => 'sub-menu',
                        ) ); ?>
                        <div class="menu-sub-menu-container">
                            <ul class="sub-menu">
                                <li class="menu-item">
                                    <?php if (is_user_logged_in()): ?>
                                        <a href="<?php echo get_permalink($downloads_page); ?>" title="Account">Account</a>
                                        <a href="<?php echo wp_logout_url(); ?>" title="Log out">Log out</a>
                                    <?php else: ?>
                                        <a href="<?php echo wp_login_url( home_url() ); ?>" title="Login">Log in</a>
                                    <?php endif; ?>
                                </li>
                            </ul>
                        </div>
                        <?php get_search_form(); ?>
                    </div>
                </div>
            </div>
        </div>
        <?php get_template_part( 'template-parts/nav' ); ?>
    </header>

    <div id="clone">
        <li class="clone">
            <a href="#" class="btn btn-default" data-toggle="modal" data-target="#requestDemo">Request a demo</a>
        </li>
    </div>

    <div class="side-button">
        <a href="#" data-toggle="modal" data-target="#requestDemo">Request a demo</a>
    </div>

    <section class="content">
        <main id="main" class="site-main" role="main">