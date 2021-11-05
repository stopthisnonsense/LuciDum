<?php
/*
 Template Name: NEW PAGE Template

 When this is live, move to front-page.php
*/
get_header( 'new' );
?>
<div class="wrap wrap--new-home-background">
    <div class="section section--hero section--hero-page">
        <div class="container section__container">
            <div class="row align-items-center">
                <div class="col-sm-12 section__column">
                    <h1 class="section__title"><?php the_title(); ?></h1>
                </div>
            </div>
        </div>
    </div>
    <?php if(have_posts()) { ?>
        <div class="section section--content">
            <div class="container section__container">
                <div class="row section__row">
                    <?php while(have_posts()) {
                    $content_classes = 'col-sm-12 section__column';
                    $form_fields = get_field('form');
                    if( isset($form_fields) ) {
                        $content_classes = 'col-sm-12 col-lg-6 section__column';
                    }
                    the_post(); ?>
                    <div class="<?= $content_classes; ?>">
                        <?php
                        the_content(); ?>
                    </div>
                    <?php if( isset($form_fields) ) { ?>
                        <?php
                            $form_maker = '';
                            if( !empty($form_fields['region']) ) {
                                $form_maker .= "region: '" . sanitize_text_field($form_fields['region']) . "',";
                            }
                            if( !empty($form_fields['portal']) ) {
                                $form_maker .= "portalId: '" . sanitize_text_field($form_fields['portal']) . "',";
                            }
                            if( !empty($form_fields['form_id']) ) {
                                $form_maker .= "formId: '" . sanitize_text_field($form_fields['form_id']) . "',";
                            }
                            if( !empty($form_fields['campaign']) ) {
                                $form_maker .= "sfdcCampaignId: '". sanitize_text_field($form_fields['campaign']) . "',";
                            }
                        ?>
                        <div class="col-sm-12 col-lg-6 section__column">
                        <div class="card card--signup" id="form">
                            <?php if( !empty($form_fields['title'] ) ) { ?>
                                <h2 class="card__title"><?= $form_fields['title']; ?></h2>
                            <?php
                            }?>
                            <?php if( !empty($form_maker) ) { ?>
                                <!--[if lte IE 8]>
                            <script charset="utf-8" type="text/javascript" src="//js.hsforms.net/forms/v2-legacy.js"></script>
                            <![endif]-->
                            <script charset="utf-8" type="text/javascript" src="//js.hsforms.net/forms/v2.js"></script>
                            <script>
                              hbspt.forms.create({<?= $form_maker; ?>});
                            </script>
                            <?php
                            } ?>

                        </div>

                    </div>
                    <?php
                    } ?>

                <?php
                } ?>
                </div>

            </div>
        </div>
    <?php
    } ?>

    <?php if(have_posts()) {

    } ?>

    <?php get_footer( 'new' ); ?>
</div>
