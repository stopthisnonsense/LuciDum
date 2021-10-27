<?php
/*
 Template Name: Term and Condition Template
 */

get_header(); ?>
<?php while (have_posts()) : the_post(); ?>
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
<!-- privacy policy Page -->
    <section class="pps-section">
        <div class="container">
            <div class="pps-content">
				<?php the_content(); ?>

            </div>
        </div>
    </section>
<?php endwhile; ?>
<?php get_footer(); ?>