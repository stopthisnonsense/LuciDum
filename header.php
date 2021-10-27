<!DOCTYPE html>
<html>
<head>
	<?php if(is_front_page()): ?>
    <title><?php bloginfo('name'); ?> | <?php bloginfo('description'); ?></title>
	<meta name="description" content="<?php bloginfo('name'); ?> | <?php bloginfo('description'); ?>">
    <?php else: ?>
	 <title><?php wp_title(' | ', true, 'right'); ?><?php bloginfo('name'); ?></title>
	<meta name="description" content="<?php bloginfo('name'); ?>">
	<?php endif;?>
	<meta charset="utf-8" name="viewport" content="width=device-width, initial-scale=1.0">
	
    <link rel="icon" type="" href="">
    <link rel="shortcut icon" type="image/png" href="<?php echo get_template_directory_uri()?>/assets/images/favicon.png" />
    <link href="https://stackpath.bootstrapcdn.com/font-awesome/4.7.0/css/font-awesome.min.css" rel="stylesheet">
	<link href="https://fonts.googleapis.com/css2?family=Open+Sans:wght@300;400;600;700;800&display=swap" rel="stylesheet">
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/timepicker@1.11.12/jquery.timepicker.min.css">
    <link rel="stylesheet" href="https://code.jquery.com/ui/1.11.4/themes/smoothness/jquery-ui.css">
    <!-- fancybox -->
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/fancybox/3.5.7/jquery.fancybox.min.css">
	 <script type="text/javascript" src="<?php echo get_template_directory_uri()?>/assets/js/custom.js"></script>
    <link rel="stylesheet" type="text/css" href="<?php echo get_template_directory_uri()?>/assets/css/owl.carousel.min.css">
    <link rel="stylesheet" type="text/css" href="<?php echo get_template_directory_uri()?>/assets/css/bootstrap.min.css">
	  <link href="https://unpkg.com/aos@2.3.1/dist/aos.css" rel="stylesheet">
<!--     <link rel="stylesheet" type="text/css" href="<?php echo get_template_directory_uri()?>/assets/css/all.css"> -->
	<link rel="stylesheet" type="text/css" href="<?php echo get_template_directory_uri()?>/assets/css/stylecp.css">
	<!-- <link rel="stylesheet" type="text/css" href="<?php echo get_template_directory_uri()?>/assets/css/mobilecp.css"> -->
<meta name="google-site-verification" content="oXXgj0CnkI_fGWPbm1-sEyjD5pBgodWfXG-1d7c1gxc" />
</head>
 <?php wp_head(); ?> 
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