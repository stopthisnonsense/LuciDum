<?php
		/*
		 Template Name: Webinar List Template
		 */
		
		get_header(); ?>
		
		
		    
				<section class="section section-title">
					<div class="container">
						<div class="RE-title">
							Resources
						</div>
					</div>
				</section>
				<section class="section">
					<div class="container">
						<div  class="resource-title-box">
							<div class="resource-title current">
								<a  href="/our-news">News</a>
							</div>
							<div class="resource-title">
								<a   href="/blogs/">Blogs</a>
							</div>
							<div class="resource-title">
								<a  href="/videos">Videos</a>
							</div>
							<div class="resource-title current">
								<a  href="#">Webinar </a>
							</div>
						</div>
					</div>
				</section>
				
				
				<section style="width: 100%;">
					<div class="container" style="padding-top: 64px;">
						<div class="new-main-box">
							
							 <?php global $wp_query ;
		                 $paged = (get_query_var('paged')) ? get_query_var('paged') : 1; 
		                 $args = array('post_type' => 'webinar','posts_per_page' =>10, 'order' => 'DESC', 'paged' => $paged);
		                 $wp_query = new WP_Query($args) ; // overriding default global of WordPress
								 $index = 0;
		               ?> 
							<?php if(have_posts()) : while (have_posts()) : the_post(); ?>
							<?php $postlink = (empty(get_field('external_read_more_link')) ? get_permalink() : get_field('external_read_more_link'))?>
							<?php $index++; ?>
							<div class="webinar-main">
								<h4 ><?php the_title();?></h4>
								<div class="new-main-data">
									<div>
										<span style="font-family: Helvetica 35 Thin;
		font-style: italic;
		font-weight: 100;
		font-size: 18px;"><?php echo get_the_date(); ?></span>	
									</div>
									<div  style="background: #E1C860;border-radius: 15px;width: 57px;height: 26px;margin-left: 10px;display: flex;align-items: center;justify-content: center;">
										<span style="font-family: Helvetica 35 Thin;font-style: normal;font-weight: 100;font-size: 14px;display: flex;align-items: center;">News</span>
									</div>
								</div>
								<div style="borde: 1px solid #000;;">
									<p style="font-style: normal;
		font-weight: 100;
		font-size: 18px;"><?php the_excerpt(); ?></p>
								</div>
								<div class="new-main-footer">
									<div class="new-main-read">
										<p><a 
											href="<?php echo $postlink; ?>">Register Now&nbsp<svg width="14" height="9" viewBox="0 0 24 18" fill="none" xmlns="http://www.w3.org/2000/svg">
																<path d="M15 0L24 9L15 18L12.8789 15.8789L18.2578 10.5H0V7.5H18.2578L12.8789 2.12109L15 0Z" fill="#366F9F"/>
											</svg></a></p>
											
											
											
									</div>
									
								</div>
							</div>
							<?php endwhile; ?>
							<?php if ($index % 2 == 1): ?>
							<div style="width: 48%;padding: 18px;margin-top: 24px;">
								
							</div>
							<?php endif ?>
							
							<div style="padding: 15px 0px">
							<?php
							the_posts_pagination( array(
								'mid_size'  => 4,
								'prev_text' => __( 'Prev', 'textdomain' ),
								'next_text' => __( 'Next', 'textdomain' ),
							) );
							?>
							</div>
							<?php endif; ?> 
							</div>
		              <?php wp_reset_postdata(); ?>
						</div>
					
				</section>
		
		
		<?php get_footer(); ?>
