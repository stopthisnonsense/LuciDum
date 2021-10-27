<?php
/*
 Template Name: Careers Template
 */

get_header(); ?>

    
		
	<section class="section section-title" style=" background-image: url(<?php the_field('working_bk_image'); ?>);background-size: cover;">
	   <div class="container">
			<div class="caress-title-box" style="">
				<div style="width: 40%;"></div>
				<div class="caress-title-text">
					<h3>Working at Lucidum</h3>
					<p style="padding-top: 32px;"><?php the_field('working_subject')?>
			 	</p>
			 </div>
			</div>
	   </div>
   </section>
		<section class="wpt-section">
			<div class="container">
				<div class="wpt-content caress-text-box"  >
					<div class="wpt-content-left">
						<p>
							<?php the_field('working_desc_left')?>
						</p>
					</div>
					<div class="wpt-content-right">
						<p>
							<?php the_field('working_desc_right')?>
						</p>
					</div>
				</div>
			</div>
		</section>
    <!-- Working At Lucidum -->
    <section class="wal-section">
        <div class="container">
          	 <h3 style="padding-top: 96px;"><?php the_field('working_heading'); ?></h3>
            <div class="wal-content caress-employment-box">
								<div class="wal-btn">
									<ul>
												<?php $args = array( 'post_type' => 'job', 'order' => 'DESC', 'posts_per_page' => -1); 
												$the_query = new WP_Query( $args ); ?>
												<?php if ( $the_query->have_posts() ) : while ( $the_query->have_posts() ) : $the_query->the_post(); ?>
												<?php $slug = get_post_field( 'post_name', get_the_ID() ); ?>
												<li><a href="#box-<?php echo $slug ?>"><?php the_title(); ?></a></li>
												<?php wp_reset_query(); endwhile; endif;  ?>
									</ul>
								</div>
				
								 <!-- Working At Info -->		
								<div class="wki-content">
									<?php $var= 0; ?>
									<?php $args = array( 'post_type' => 'job', 'order' => 'DESC', 'posts_per_page' => -1); 
													$the_query = new WP_Query( $args ); ?>
													<?php if ( $the_query->have_posts() ) : while ( $the_query->have_posts() ) : $the_query->the_post(); ?>
									<?php $slug = get_post_field( 'post_name', get_the_ID() ); ?>
									<?php
										 if ($var) {
											$class = "";
											} else {
											$class = "active-box";
											}
											?>
									<div class="wki-box <?php echo "$class"; ?>" id="box-<?php echo $slug ?>">
										<h2><?php the_title(); ?></h2>
										<div class="caress-employment-message">
											<div>
												<h5 class="job-location">Job Location: <span><?php the_field('job_location'); ?></span></h5>
												<h5 class="job-location">Job Timings: <span><?php the_field('job_time'); ?></span></h5>
											</div>
											<div class="caress-employment-apply">
												<a href="mailto: <?php the_field('job_receiver_email'); ?>" class="apply-btn">Apply Now</a>
											</div>
										</div>

										<?php the_content(); ?>

										

									</div>
									<?php $var++; ?>
									<?php wp_reset_query();  endwhile; endif;  ?>

								</div>
            </div>
        </div>
    </section>
	
 

<?php get_footer(); ?>
