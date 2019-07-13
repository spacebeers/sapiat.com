<?php
    $pssword_page = get_theme_mod('sapiat_pages_password_link');
?>

<article id="post-<?php the_ID(); ?>" <?php post_class("page login-page"); ?>>
    <div class="login-form">
        <?php
            $args = array(
                'redirect' => home_url(),
                'id_username' => 'user',
                'id_password' => 'pass',
                'label_username' => __( 'Username' ),
                'label_password' => __( 'Password' ),
                'label_remember' => __( 'Remember Me' ),
                'label_log_in' => __( 'Log In' ),
                'remember' => true
            );
        ?>

        <?php if ($_GET['login'] == 'failed'): ?>
            <div class="alert alert-danger">
                Login failed - please try again
            </div>
        <?php endif; ?>

        <?php if ($_GET['login'] == 'empty'): ?>
            <div class="alert alert-danger">
                Login failed - you must enter a username and password
            </div>
        <?php endif; ?>

        <h1>Log in</h1>
        <?php wp_login_form( $args ); ?>
        <a href="<?php echo esc_url( get_permalink($pssword_page) ); ?>" title="Forgot your password?">Forgot your password?</a>
    </div>
</article>