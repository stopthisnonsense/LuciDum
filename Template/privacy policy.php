<?php
/*
 Template Name: Privacy policy Template
 */

get_header(); ?>
<?php while (have_posts()) : the_post(); ?>
   
<!-- privacy policy Page -->
    <section class="pps-section" style="padding-top:114px">
        <div class="container">
            <div class="pps-content">
				<?php the_content(); ?>
                
                <!-- table content -->
                 <div class="custome-table">
            <h4>1. What Information We Collect, Why We Collect It, And How It Is Used</h4>
            <div class="table-data">

                <div class="table-title">
					<?php if( have_rows('privacy_table_title') ):
                               while ( have_rows('privacy_table_title') ) : the_row();
					?>
                    <div class="title-content"><h6><?php the_sub_field('privacy_title'); ?></h6></div>
					<?php
                   endwhile;
                    else :
                    // no rows found
                     echo " No Data found";
                      endif;
                 ?>
                </div>
                <div class="table-body">
                    <?php $i = 1; 
					if( have_rows('privacy_table') ):
                               while ( have_rows('privacy_table') ) : the_row();
					if($i%2===0){
                         $class = "row-full-content";
                     } else {
                        $class ="row-half-content";
                     }
                         ?>
                    <div class="table-row">
						<?php
                         if( have_rows('privacy_row') ):
                               while ( have_rows('privacy_row') ) : the_row();
                     ?>
                        <div class="<?php echo "$class"; ?>"><p><?php the_sub_field('privacy_content'); ?></p></div>
                                    <?php
                               endwhile;
                                else :
                                // no rows found
                                 echo " No Data found";
                                  endif;
                             ?>
                    </div>
                    <?php
					
						$i++;
                   endwhile;
                    else :
                    // no rows found
                     echo " No Data found";
                      endif;
                 ?>
                    
                </div>

            
            
        </div>
					 <p><span>Nota Bene:</span> some of the abovementioned Personal Data will be used for fraud detection and prevention, and for security purposes.</p>
    </div>

<?php the_field('privacy_content'); ?>
                

            </div>
        </div>
    </section>
<?php endwhile; ?>
<?php get_footer(); ?>