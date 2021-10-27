<?php
/*
 Template Name: Team Template
 */

get_header(); ?>
	
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
	<section class="ot-details">
    <div class="container">
        <div class="ot-content">
            <p><?php the_field('team_content'); ?></p>
        </div>
    </div>
	</section>
    <section class="team-gallery">
        <div class="container">
            <div class="flex">
                <?php $args = array( 'post_type' => 'team', 'order' => 'ASC', 'posts_per_page' => -1); 
                                $the_query = new WP_Query( $args ); ?>
                                <?php if ( $the_query->have_posts() ) : while ( $the_query->have_posts() ) : $the_query->the_post(); ?>
                <div class="col-md-4">
                    <div class="team">
                        <div class="team-image">
                            <?php the_post_thumbnail(); ?>
                            <div class="team-social">
                                 <ul>
<!--                                     <li><a href="<?php the_field('member_facebook_link'); ?>"><i class="fa fa-facebook"></i></a></li> -->
<!--                                     <li><a href="<?php the_field('member_twitter_link'); ?>"><i class="fa fa-twitter"></i></a></li> --> 
                                    <li><a href="<?php the_field('member_linkedin_link'); ?>"><i class="fa fa-linkedin"></i></a></li>
                                </ul>
                            </div>
                        </div>
                        <div class="team-designation">
                            <h3><?php the_title(); ?></h3>
                            <span><?php the_field('designation'); ?></span>
                        </div>
                    </div>
                </div>
                <?php wp_reset_postdata(); endwhile; endif;  ?>
            </div>
        </div>
    </section>
	<section class="wh-section">
    <div class="container">
        <div class="wh-content">
            <div class="wh-text">
                <h3><?php the_field('hiring_heading'); ?></h3>
                <p><?php the_field('hiring_content'); ?></p>
            </div>
            <div class="wh-btn">
                <a href="<?php the_field('hiring_button_link'); ?>"><?php the_field('hiring_button_text'); ?></a>
            </div>
        </div>
    </div>
</section>
<?php get_footer(); ?>
