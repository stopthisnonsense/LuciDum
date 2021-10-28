<html>
    <head><?php wp_head(); ?></head>

<body>
	<?php if ( is_front_page()) { ?>
         <!-- class="homepagemenu" -->
    <header>

        <div class="container">
            <div class="flex header-row">
                <div class="site-logo">
                    <a href="<?php echo esc_url(home_url()); ?>"><img src="<?php the_field('header_logo', 'Options');?>" alt="logo"></a>
                </div>
                <div class="menu">
                    <nav>
                         <?php
                    wp_nav_menu(array(
                        'theme_location' => 'my-custom-menu',
                        'container' => false
                    ));
                    ?>
                    </nav>
                    <div class="request-demo"><a href="/platform#requestdemoform"><?php the_field('header_button', 'Options');?></a></div>
                    <div class="request-demo1"><a href="/knowledge-base"><?php the_field('header_button1', 'Options');?></a></div>
					<div class="mobile-toggler">
                        <span></span>
                        <span></span>
                        <span></span>
                    </div>
                </div>
            </div>
        </div>
    </header>
	<?php } else { ?>
	<header>
        <div class="container">
            <div class="flex header-row">
                <div class="site-logo">
                    <a href="<?php echo esc_url(home_url()); ?>"><img src="<?php the_field('header_logo', 'Options');?>" alt="logo"></a>
                </div>
                <div class="menu">
                    <nav>
                         <?php
                    wp_nav_menu(array(
                        'theme_location' => 'my-custom-menu',
                        'container' => false
                    ));
                    ?>
                    </nav>
                    <div class="request-demo">
                        <a href="/platform#requestdemoform"><?php the_field('header_button', 'Options');?></a>

                    </div>
							 <div class="request-demo1"><a href="/knowledge-base"><?php the_field('header_button1', 'Options');?></a></div>
                    <div class="mobile-toggler">
                        <span></span>
                        <span></span>
                        <span></span>
                    </div>
                </div>
            </div>
        </div>
    </header>
	<?php } ?>