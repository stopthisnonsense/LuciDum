<?php
/*
 Template Name: NEW HOME Template
*/
get_header( 'new' );
?>
<div class="wrap wrap--new-home-background">
    <div class="section section--hero">
        <div class="container">
        <div class="row">
            <div class="col-sm-12 col-lg-6 section__column">
                <h1 class="section__title">No More Unknowns</h1>
                <p class="section__paragraph">Company News: Lucidum Secures New<br> Funding Round from Investors</p>
                <a class="section__button" href="#">See More</a>
            </div>
            <div class="col-sm-12 col-lg-6  section__column">
                <img src="<?php echo get_stylesheet_directory_uri(); ?>/assets/images/laptop-mockup.png" alt="">
            </div>
        </div>
        </div>

    </div>
    <div class="section section--about-new-home">
        <div class="container">
            <div class="row">
                <div class="col-sm-12 col-lg-6  section__column">
                    <div class="ratio ratio-16x9">
                        <img class="section__image" src="<?php echo get_stylesheet_directory_uri(); ?>/assets/images/video-placeholder.png" alt="">
                    </div>

                </div>
                <div class="col-sm-12 col-lg-6  section__column">
                    <div class="card card--signup">
                        <h2 class="card__title">Sign up for Lucidum Company Updates</h2>
                        <!--[if lte IE 8]>
                        <script charset="utf-8" type="text/javascript" src="//js.hsforms.net/forms/v2-legacy.js"></script>
                        <![endif]-->
                        <script charset="utf-8" type="text/javascript" src="//js.hsforms.net/forms/v2.js"></script>
                        <script>
                          hbspt.forms.create({
                                        region: "na1",
                                        portalId: "7260270",
                                        formId: "b35800f3-150c-4e70-88bc-980e86109ac9"
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
