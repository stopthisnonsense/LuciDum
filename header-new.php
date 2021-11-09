<html>
    <head><?php wp_head(); ?></head>

<body <?php post_class( 'new-home-landing' ); ?>>
<div class="container container--header">
    <div class="header header--new">
        <div class="flex header-row header-row--new">
            <div class="site-logo site-logo--new">
                <a href="<?php echo esc_url(home_url()); ?>"><img src="<?php echo get_stylesheet_directory_uri(); ?>/assets/images/new-logo.png" alt="logo"></a>
            </div>
            <div class="menu menu--new-home">
            <nav>
                <?php wp_nav_menu( [
                    'theme_location' => 'menu-new-home',
                    'container' => false,
                ] ); ?>
            </nav>
            <div class="request-demo request-demo--new"><a href="https://lucidum.io/request-a-demo/"><?php the_field('header_button', 'Options');?></a></div>
            <div class="mobile-toggler">
                <span></span>
                <span></span>
                <span></span>
            </div>
        </div>
        </div>

    </div>
</div>
