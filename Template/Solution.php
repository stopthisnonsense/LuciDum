<?php
/*
 Template Name: Solution
 */

get_header(); ?>
<script type="text/javascript">
	var current_index = 0;
	var max_testi = 4;
	function setMaxTesti( v ){
		max_testi = v;	
	}
	
	function nextTesti( delta ){
		if (max_testi <= 0) return;
		current_index += delta;
		if (current_index <= 0){
			current_index = 0;
			$('#prevArrow').attr("fill","#97BCE3");	
			$('#nextArrow').attr("fill","#366F9F");
		}else if (current_index >= max_testi - 1){
			current_index = max_testi - 1;
			$('#nextArrow').attr("fill","#97BCE3");	
			$('#prevArrow').attr("fill","#366F9F");
		}else {
			$('#nextArrow').attr("fill","#366F9F");	
			$('#prevArrow').attr("fill","#366F9F");
		}
		
		// loop
		//current_index = (current_index + max_testi) % max_testi;
		for(var i=0;i<max_testi;i++){
			if (current_index == i){
				$('#testimonial_id_' + i).show();
			}else{
				$('#testimonial_id_' + i).hide();	
			}
		}
	}
</script>
			<section class="section section-title">
				<div class="container">
					<div class="div-flex-center">
						<div class="solution-title">
							<h1><?php the_field('solution_heading')?></h1>
							<p><?php the_field('solution_description')?></p>
						</div>
					</div>
				</div>
			</section>
			
			<section class="section">
						<div class="container">
							<div class="div-flex-justify">
								<?php global $wp_query ;
								$paged = (get_query_var('paged')) ? get_query_var('paged') : 1; 
								$args = array('post_type' => 'articles','posts_per_page' => 8, 'order' => 'ASC', 'paged' => $paged, 'Articles_category'=>'solution');
								$wp_query = new WP_Query($args) ; // overriding default global of WordPress
								$index = 0;
								?> 
								<?php if(have_posts()) : while (have_posts()) : the_post(); ?>
								<?php $index++ ?>
								<?php $rowClass = (($index % 2 ==0) ? 'evenRow' : 'oddRow'); ?>
								<div class="solution-blog <?php echo $rowClass; ?>">
									<?php if ($index % 2 ==0): ?>
									<div class="solution-blog-img">
										<?php if (!empty(get_field('article_image'))): ?>
										<img width="100%" height="100%" src="<?php the_field('article_image')?>" alt="<?php the_title();?>">
										<?php else: ?>
							
											<?php echo do_shortcode( "[evp_embed_video poster='" . get_field('video_poster') . "' url='" . get_field("article_video_link") . "']" ); ?>
										<?php endif; ?>
									</div>
									<?php endif; ?>
									<div class="solution-blog-text">
										<div style="width: 100%;">
											<h3 style="font-family: Helvetica;font-style: normal;font-weight: bold;">
												<?php the_title(); ?>
											</h3>
											<div class="solution-blog-text-p">
											<p><?php the_excerpt()?></p>
											</div>
										</div>
										
									</div>
									<?php if ($index % 2 ==1): ?>
									<div class="solution-blog-img">
										<?php if (!empty(get_field('article_image'))): ?>
										<img width="100%" height="100%" src="<?php the_field('article_image')?>" alt="<?php the_title();?>">
										<?php else: ?>
										
										<?php echo do_shortcode( "[evp_embed_video poster='" . get_field('video_poster') . "' url='" . get_field("article_video_link") . "']" ); ?>
										<?php endif; ?>
									</div>
									<?php endif; ?>

								</div>
								<?php endwhile; ?>
								<?php endif; ?>			
								<?php wp_reset_query(); ?>
							</div>
						</div>
					</section>
					<section style="width: 100%;">
						<div class="container">
							<div class="founder">
								
								<?php global $wp_query ;
								  $paged = (get_query_var('paged')) ? get_query_var('paged') : 1; 
								  $args = array('post_type' => 'testimonial','posts_per_page' => 9999, 'order' => 'ASC', 'paged' => $paged);
								  $wp_query = new WP_Query($args);
								  $index = 0;
								?> 
								<?php if(have_posts()) : while (have_posts()) : the_post(); ?>
								<?php $div_block = ($index == 0 ? 'display:block  ！ important；': 'display:none'); ?>
								<div class="founder_content" id="testimonial_id_<?php echo $index;?>" style="<?php echo $div_block?>">
								<div class="member" >
									<img  src="<?php the_field('customer_image');?>" alt="<?php the_field('customer_name');?>">
								</div>
								<div  class="solutions-critic">
									<span style="font-family: Helvetica;
									font-style: normal;
									font-weight: normal;
									font-size: 30px;"><?php the_field('customer_name');?></span>
									<h5><?php the_field('customer_job');?></h5>
									<h4 style="padding-top: 32px;"><?php the_field('customer_message');?></h4>
									<p style="padding-top: 32px;">
									<image id="image0"  src="<?php the_field('customer_company_logo');?>"/>
									</p>
									<p style="padding-top: 20px;">
										<a class="read-them" href='/testimonials/'>Read Them All&nbsp<svg width="14" height="9" viewBox="0 0 24 18" fill="none" xmlns="http://www.w3.org/2000/svg">
														<path d="M15 0L24 9L15 18L12.8789 15.8789L18.2578 10.5H0V7.5H18.2578L12.8789 2.12109L15 0Z" fill="#366F9F"/>
											</svg></a>
									</p>
								</div>
								</div>
								<?php $index++; ?>
								<?php endwhile; ?>
								<?php endif; ?> 
            			  <?php wp_reset_query();?>
								<?php echo "<script type='text/javascript'>setMaxTesti($index);</script>" ?>
								<div style="width: 278px;height: 278px;display: flex;justify-content: space-between;margin-left: 75px;">
									<a style="padding-top: 110px;padding-left: 40px;" onclick="nextTesti(-1);">
									<svg width="15" height="24" viewBox="0 0 21 32" fill="none" xmlns="http://www.w3.org/2000/svg">
									<path id="prevArrow" d="M20.0935 3.76L7.88017 16L20.0935 28.24L16.3335 32L0.333507 16L16.3335 -3.2871e-07L20.0935 3.76Z" fill="#97BCE3"/>
									</svg></a>
									<a style="padding-top: 110px;padding-right: 160px;" onclick="nextTesti(1);"><svg width="15" height="24" viewBox="0 0 21 32" fill="none" xmlns="http://www.w3.org/2000/svg">
									<path id="nextArrow" d="M0.906616 28.24L13.1199 16L0.906616 3.76L4.66662 0L20.6666 16L4.66662 32L0.906616 28.24Z" fill="#366F9F"/>
									</svg>
									</a>
								</div>
							</div>
						</div>
					</section>

<?php get_footer(); ?>
