<?php
/*
 Template Name: EULA Template
 */

get_header(); ?>
<?php while (have_posts()) : the_post(); ?>
   
<!-- privacy policy Page -->
    <section class="pps-section" style="padding-top:114px">
        <div class="container">
            <div class="pps-content">
				<?php the_content(); ?>
                
                <!-- table content -->
                 
                

            </div>
        </div>
    </section>
<?php endwhile; ?>
<?php get_footer(); ?>