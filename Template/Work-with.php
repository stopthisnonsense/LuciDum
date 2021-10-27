<?php
/*
 Template Name: Work-with Template
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
		    <!-- Work With Great -->
    <div class="wwg-sectioon">
        <div class="container">
            <div class="wwg-content">
                <p><?php the_field('work_with_content'); ?></p>
            </div>
        </div>
    </div>

 
<?php get_footer(); ?>