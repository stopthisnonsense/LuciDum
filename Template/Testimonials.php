<?php
/*
 Template Name: Testimonials
 */

get_header(); ?>
		
			
			
			<section class="section-title" style="width: 100%;">
				<div class="container">
					<div class="RE-title">
						About Lucidum
					</div>
				</div>
			</section>
			
			<section style="width: 100%;">
				<div class="container">
					<div class="fondstory-title-box">
						
						<div class="fondstory-title">
							<a href="/founderstory">Founder Story</a>
						</div>
						<div class="fondstory-title current">
							<a  href="#">Testimonials</a>
						</div>
					</div>
				</div>
			</section>
			
			<section style="width: 100%;">
				<div class="container">
					<div class="testimonials-title">
						<h2><?php the_field('testimonial_heading') ?></h2>
					</div>
				</div>
			</section>
			<section style="width: 100%;background-color: #164163;">
				<div class="container">
					<div class="testimonials-vido-box">
						
						<?php global $wp_query ;
								$paged = (get_query_var('paged')) ? get_query_var('paged') : 1; 
								$args = array('post_type' => 'video','posts_per_page' => 3, 'order' => 'DESC', 'paged' => $paged, 'video_category'=>'testimonials');
								$wp_query = new WP_Query($args) ; // overriding default global of WordPress
						?> 
						<?php if(have_posts()) : while (have_posts()) : the_post(); ?>
						<div class="testimonials-vido" >
							<?php echo do_shortcode( "[evp_embed_video poster='" . get_field('video_poster') . "' url='" . get_field("video_link") . "' width='100%']" ); ?>
									<h3><?php the_title()?></h3>
									<p><?php the_content()?></p>
						</div>
						<?php endwhile; ?>          
						<?php endif; ?> 
						<?php wp_reset_query(); ?>
						
					</div>
				</div>
			</section>
			<section style="width: 100%;">
				<div  class="container">
					
					<div class="testimonials-main-box">
						<?php global $wp_query ;
						$paged = (get_query_var('paged')) ? get_query_var('paged') : 1; 
						$args = array('post_type' => 'testimonial','posts_per_page' => 8, 'order' => 'DESC', 'paged' => $paged);
						$wp_query = new WP_Query($args);
						?> 
						<?php if(have_posts()) : while (have_posts()) : the_post(); ?>
						
						<div class="testimonials-main-title">
							<div class="testimonials-main-heard">
								<div class="testimonials_member" >
									<img src="<?php the_field('customer_image');?>" alt="<?php the_field('customer_name');?>"/>
								</div>
								
								<div class="testimonials-head">
									<div style="width: 100%;">
										<h3 class="testimonials-head-name"><?php the_field('customer_name');?></h3>
										<p class="testimonials-head-position"><?php the_field('customer_job');?></p>
									</div>
									
								</div>
							</div>
							<p class="testimonials-head-letter" >
								<?php the_field('customer_message');?>
							</p>
							<div class="testimonials-main-img">
								<image id="image0"  src="<?php the_field('customer_company_logo');?>"/>
							</div>
							
						</div>
						<?php endwhile; ?>
						<?php endif; ?> 
						<?php wp_reset_query(); ?>	
					</div>
								
								
					
				</div>
			</section>
	
<?php get_footer(); ?>
