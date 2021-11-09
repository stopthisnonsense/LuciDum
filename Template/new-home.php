<?php
/*
 Template Name: NEW HOME Template

 When this is live, move to front-page.php
*/
get_header( 'new' );
?>
<div class="wrap wrap--new-home-background">
    <div class="section section--hero">
        <div class="container section__container">
        <div class="row align-items-center">
            <div class="col-sm-12 col-lg-6 section__column">
                <h1 class="section__title">No More Unknowns</h1>
                <p class="section__paragraph"><a href="<?php echo site_url(); ?>">Lucidum.io</a> Raises $15M in Series A Funding | Leading IT asset discovery platform partners with Point72 Ventures and GGV Capital to fuel business expansion</p>
                <a class="section__button" href="<?php the_permalink(3600); ?>">See More</a>
            </div>
            <div class="col-sm-12 col-lg-6  section__column">
                <img class="section__image" src="<?php echo get_stylesheet_directory_uri(); ?>/assets/images/laptop-mockup.png" alt="">
            </div>
        </div>
        </div>

    </div>
    <div class="section section--images">
        <div class="container container-fluid">
            <?php if(get_field( 'n_h_banner' )) {
            $n_h_banner = get_field( 'n_h_banner'); ?>
            <div class="row align-items-center justify-content-center">
            <?php
            if( $n_h_banner['images'] ) {
                $images = $n_h_banner['images'];
                foreach( $images as $image ) { ?>
                <div class="col-4 col-md-3 col-xl">
                    <?php echo wp_get_attachment_image($image['image'], 'thumbnail', false, ['class' => 'my-1 img-fluid ban-image aligncenter' ]); ?>
                </div>
                <?php
                }
            } ?>
            </div>
            <?php

        } ?>
        </div>
    </div>


    <div class="section section--about-new-home">
        <div class="container section__container">
            <div class="row">
                <div class="col-sm-12 col-lg-6  section__column">
                    <div class="ratio ratio-16x9">
                        <img class="section__image" src="<?php echo get_stylesheet_directory_uri(); ?>/assets/images/video-placeholder.png" alt="">
                    </div>

                </div>
                <div class="col-sm-12 col-lg-6  section__column">
                    <div class="card card--signup" id="form">
                        <h2 class="card__title">Request A Demo</h2>
                        <!--[if lte IE 8]>
                        <script charset="utf-8" type="text/javascript" src="//js.hsforms.net/forms/v2-legacy.js"></script>
                        <![endif]-->
                        <script charset="utf-8" type="text/javascript" src="//js.hsforms.net/forms/v2.js"></script>
                        <script>
                          hbspt.forms.create({
                                        region: "na1",
                                        portalId: "7260270",
                                        formId: "52f6866f-c1c9-4195-b6f3-92703864d636",
                                        sfdcCampaignId: "7015e000000AaO3AAK"
                        });
                        </script>
                    </div>

                </div>
            </div>
        </div>
    </div>

    <?php if(have_posts()) {
        while(have_posts()) {
            the_post();
        }
    } ?>

    <?php get_footer( 'new' ); ?>
</div>
