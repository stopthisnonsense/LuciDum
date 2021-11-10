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
                    <h1 class="section__title"><?php if(!is_page('series-a-funding')){ the_title(); } ?></h1>
                </div>
            </div>
        </div>
    </div>
    <?php if(have_posts()) { ?>
        <div class="section section--content">
            <div class="container section__container">
                <div class="row section__row">

                    <?php while(have_posts()) {
                    $content_classes = 'col-sm-12 col-lg-8 section__column section__column--content';
                    $form_fields = get_field('form');
                    if( $form_fields['exists'] ) {
                        $content_classes = 'col-sm-12 col-lg-4 section__column';
                    }
                    the_post(); ?>
                    <div class="col-sm-12 col-lg-2 section__column">
					</div>
                    <div class="<?= $content_classes; ?>">
						<?php the_content(); ?>
                    </div>
                    <?php if( $form_fields['exists'] ) { ?>
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
                        <div class="<?= $content_classes; ?>">
                        <div class="card card--signup" id="form">
                            <?php if( !empty($form_fields['title'] ) ) { ?>
                                <h2 class="card__title"><?= sanitize_text_field($form_fields['title']); ?></h2>
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

                    <div class="col-sm-12 col-lg-2 section__column">
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
