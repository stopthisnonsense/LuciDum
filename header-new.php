<html>
    <head>
		<?php wp_head(); ?>
		<script>
			(function(h,o,t,j,a,r){
				h.hj=h.hj||function(){(h.hj.q=h.hj.q||[]).push(arguments)};
				h._hjSettings={hjid:2693471,hjsv:6};
				a=o.getElementsByTagName('head')[0];
				r=o.createElement('script');r.async=1;
				r.src=t+h._hjSettings.hjid+j+h._hjSettings.hjsv;
				a.appendChild(r);
			})(window,document,'https://static.hotjar.com/c/hotjar-','.js?sv=');
		</script>
		<style>
			.request-demo.request-demo--new.temporaryFont a:hover {
				background-color: #3772ff;
				border-color: #3772ff;
			}
		</style>
	
	</head>

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
				<div class="request-demo request-demo--new temporaryFont"><a href="https://lucidum.io/request-a-demo/" style="font-size: 20px;"><?php the_field('header_button', 'Options');?></a></div>
				<div class="mobile-toggler">
					<span></span>
					<span></span>
					<span></span>
				</div>
			</div>
			</div>

		</div>
	</div>
