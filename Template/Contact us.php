<?php
/*
 Template Name: Contact Template
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
    <section class="contact-section">
        <div class="container">
            <div class="flex">
<!--                 <div class="col-md-4">
                    <div class="contact-detail flex">
                        <div class="contact-bg">
                            <img src="<?php echo get_template_directory_uri()?>/assets/images/phone-cell.png" alt="icon">
                        </div>
                        <div class="contact-info">
                            <h4>Phone Number</h4>
                            <span><?php the_field('contact_phone_number'); ?></span>
                        </div>
                    </div>
                </div> -->
                <div class="col-md-6">
                    <div class="contact-detail flex">
                        <div class="contact-bg">
                            <img src="<?php echo get_template_directory_uri()?>/assets/images/big-email.png" alt="icon">
                        </div>
                        <div class="contact-info">
                            <h4>Email Address</h4>
                            <span><?php the_field('contact_email'); ?></span>
                        </div>
                    </div>
                </div>
                <div class="col-md-6">
                    <div class="contact-detail flex">
                        <div class="contact-bg">
                            <img src="<?php echo get_template_directory_uri()?>/assets/images/big-map.png" alt="icon">
                        </div>
                        <div class="contact-info">
                            <h4>Our Location</h4>
                            <span><?php the_field('contact_location'); ?></span>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </section>
    <section class="contact-area">
        <div class="container">
            <div class="flex contact-area-content">
                <div class="col-50">
                    <div class="map-area">
                        <iframe src="<?php the_field('map_location'); ?>" width="100%" height="100%" frameborder="0" style="border:0;" allowfullscreen="" aria-hidden="false" tabindex="0"></iframe>
                    </div>
                </div>
                <div class="col-50">
                    <div class="contact-form-area">
                        <h2><?php the_field('contact_form_heading'); ?></h2>
                        
                            <?php
                                 echo do_shortcode('[contact-form-7 id="5" title="Contact form"]');
                                ?>
                       
                    </div>
                </div>
            </div>
        </div>
    </section>

<?php get_footer(); ?>
