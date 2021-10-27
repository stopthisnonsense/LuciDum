<?php
get_header(); ?>
<?php while (have_posts()) : the_post(); ?>

<!-- here you add html -->
<section class="mini-banner">
        <div class="container">
            <div class="page-title">
                <h2><?php the_title(); ?></h2>
                <div class="breadcrumbs">
                    <ul>
                        <li><a href="<?php echo esc_url(home_url()); ?>">HOME</a><span class="farward-arrow">/</span></li>
                        <li><?php the_title(); ?></li>
                    </ul>
                </div>
            </div>
        </div>
    </section>
<section class="careers-detail-page">
	<div class="container">
		<div class="row">
			<div class="col-md-7">
				<h2>
					<?php the_title(); ?>
				</h2>
				<div class="sale-eng-timing">
					<h5>
						Job Location:<span><?php the_field('job_location'); ?></span>
					</h5>
					<h5>
						Job Timings:<span><?php the_field('job_time'); ?></span>
					</h5>
					<h5>
						Responsibilities:
					</h5>
					<?php the_content(); ?>
					<div class="apply-now-btn">
						<a href="mailto: <?php the_field('job_receiver_email'); ?>">Apply Now</a>
					</div>				</div>
			</div>
			<div class="col-md-5">
				<?php $args = array( 'post_type' => 'job', 'order' => 'DESC', 'posts_per_page' => 3, 'post__not_in' => array( get_the_ID() ) ); 
                                $the_query = new WP_Query( $args ); ?>
                                <?php if ( $the_query->have_posts() ) : while ( $the_query->have_posts() ) : $the_query->the_post(); ?>

            		<div class="job-box">
						<h4><a href="<?php the_permalink(); ?>"><?php the_title(); ?></a></h4>
                        <div class="flex">
                            <img src="<?php echo get_template_directory_uri()?>/assets/images/map-blue.png" alt="map-icon">
                            <span><?php the_field('job_location'); ?></span>
                        </div>
                        <div class="flex">
                            <img src="<?php echo get_template_directory_uri()?>/assets/images/clock.png" alt="">
                            <span><?php the_field('job_time'); ?></span>
                        </div>
                    </div>

            	<?php wp_reset_postdata(); endwhile; endif;  ?>
			</div>
		</div>
	</div>
</section>

<?php endwhile; ?> 
<?php get_footer(); ?>
