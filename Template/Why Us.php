<?php
/*
 Template Name: Why US Template
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
	

<section style="width: 100%;">
			<div class="container">
					<div style="width: 100%;display: flex;justify-content: center;align-items: center;">
						<div style="width: 49%;padding-top: 100px;display: flex;justify-content: space-between;flex-wrap: wrap;">
							<form style="width: 100%;padding-top: 100px;display: flex;justify-content: space-between;flex-wrap: wrap;"  action="/lucidum/send2srv.php" method="post">
								<div style="width: 48%;margin-bottom: 30px;">
									 <p>First Name*</p>
									<input style="width: 100%;
									padding: 14px;
									border: 1px solid #245077;
									border-radius: 7px;
									font-size: 14px;
									color: rgba(0,0,0,0.6);"  name="firstName" type="text">
								</div>
								<div style="width: 48%;margin-bottom: 30px;">
									 <p>Last Name*</p>
									<input style="    width: 100%;
									padding: 14px;
									border: 1px solid #245077;
									border-radius: 7px;
									font-size: 14px;
									color: rgba(0,0,0,0.6);"  name="lastName" type="text">
								</div>								
													
								<div style="width: 100%;margin-bottom: 30px;">
									 <p>Company *</p>
									<input style="    width: 100%;
									padding: 14px;
									border: 1px solid #245077;
									border-radius: 7px;
									font-size: 14px;
									color: rgba(0,0,0,0.6);"  name="company" type="text">
								</div>
																
																
								<div style="width: 100%;margin-bottom: 30px;">
									 <p>Job Title *</p>
									<input style="    width: 100%;
									padding: 14px;
									border: 1px solid #245077;
									border-radius: 7px;
									font-size: 14px;
									color: rgba(0,0,0,0.6);"  name="jobTitle" type="text">
								</div>								
								<div style="width: 100%;margin-bottom: 30px;">
									 <p>Business Email *</p>
									<input style="    width: 100%;
									padding: 14px;
									border: 1px solid #245077;
									border-radius: 7px;
									font-size: 14px;
									color: rgba(0,0,0,0.6);"  name="businessEmail" type="text">
								</div>								
								<div style="width: 100%;margin-bottom: 30px;">
									 <p>Phone No *</p>
									<input style="    width: 100%;
									padding: 14px;
									border: 1px solid #245077;
									border-radius: 7px;
									font-size: 14px;
									color: rgba(0,0,0,0.6);"  name="phoneNumber" type="text">
								</div>								
								<div>
									<input style="width: 150px;height: 48px;
									background: #113F67;color: #FFFFFF;
									border-radius: 25px;" type="submit" value="Request" onclick="send2srv();>
								</div>								
																
							</form>
							
						</div>
						
					</div>
				
				
				
					
			</div>
		</section>

    
    <section class="lucidum-section">
        <div class="container">
            <div class="why-lucidum flex">
                <div class="lucidum-text">
                    <h2><?php the_field('why_heading'); ?></h2>
<!--                     <?php the_field('why_content'); ?> -->
                </div>

            </div>
			<div class="platform-content">
				<div class="platform-content-detail">
					<h4>
						<?php the_field('platform_heading'); ?>
					</h4>
						<?php the_field('platform_content_list'); ?>
					
				</div>
				<div class="platform-content-video">
                <video width="600" height="450" muted="" loop="true" autoplay="autoplay" id="cus-video">
                    <source src="<?php the_field('why_us_video'); ?>" type="video/mp4">
                </video>
                
                
            </div>
			</div>
			<p>
						<?php the_field('platform_content'); ?>
					</p>
			
            
<!-- 			<section  id="logos" style="min-height:50px;"></section> -->
			   <!-- Find Your Solution -->

        </div>
    </section>
    <div class="fys-section" id="logos">
        <div class="container">
            <div class="fys-content">
                <?php 
                                $termchildren = get_terms('work_category');
                                ?>
                <div class="fys-header">
                    <h2><?php the_field('logo_heading'); ?></h2>
                    <div class="filter-search">
                        <select class="form-control filter_by_type">
                            <option value="">Filter By Type</option>
                            <?php foreach($termchildren as $category) { 
                                ?>
                            <option value="<?php echo $category->slug; ?>"><?php echo $category->name; ?></option>
                            <?php } ?>
                        </select>
                        <div class="form-group has-search">
                            <span class="fa fa-search form-control-feedback"></span>
                            <input type="text" id="catsearch" class="form-control" placeholder="Search for an integration">
                        </div>
                    </div>
                </div>
            
                <div class="fys-images" >
                    <?php $args = array( 'post_type' => 'work_logo', 'order' => 'ASC', 'posts_per_page' => -1 ); 
                        $the_query = new WP_Query( $args ); ?>
                        <?php if ( $the_query->have_posts() ) : while ( $the_query->have_posts() ) : $the_query->the_post(); 

                            $categories = get_the_terms( $post->ID, 'work_category' );
                           
                            ?>
                    <div data-title="<?php echo strtolower(str_replace(' ', '', the_title('', false))); ?>" class="fys-box <?php  foreach($categories as $wrok_term) {  echo $wrok_term->slug.' '; } ?>" data-category="<?php  foreach($categories as $wrok_term) {  echo 'cat_'.$wrok_term->slug.''; } ?>" >
                        <?php the_post_thumbnail(); ?>
                        <div class="img-overlay"></div>
                    </div>
                    <?php wp_reset_postdata(); endwhile; endif;  ?>
                    
                </div>
            </div>
        </div>
    </div>
<?php $work_section = get_field('what_we_offer_checkbox');
if( $work_section ): ?>
    <section class="offer-section">
        <div class="container">
            <div class="offer-content">
                <h2>What We Offer</h2>
                <?php if( have_rows('offer_tab') ): ?>
                <nav class="offer-tabs">
                    <div class="nav nav-tabs nav-fill" id="nav-tab" role="tablist">
                        <?php $var1 = 0; ?>
                            <?php while ( have_rows('offer_tab') ) : the_row(); ?>
                            <?php
                     if ($var1) {
                        $class1 = " ";
                        } else {
                        $class1 = "active show";
                        }
                        ?>
                        <a class="nav-item nav-link <?php echo "$class1"; ?>" data-toggle="tab" href="#user-<?php echo get_row_index(); ?>"><?php the_sub_field('offer_tab_heading'); ?></a>
                        <?php $var1++; ?>
                                <?php endwhile;  ?>
                    </div>
                </nav>
                <div class="tab-content px-sm-0" id="nav-tabContent">
                <!-- Tab1 Content -->
                <?php $var = 0; ?>
                            <?php while ( have_rows('offer_tab') ) : the_row(); ?>
                            <?php
                     if ($var) {
                        $class = " ";
                        } else {
                        $class = "active show";
                        } ?>
                    <div class="tab-pane fade <?php echo "$class"; ?>" id="user-<?php echo get_row_index(); ?>" role="tabpanel" aria-labelledby="nav-home-tab">
                        <div class="flex feature-row">
                                <?php if( have_rows('what_offers') ):
                                   while ( have_rows('what_offers') ) : the_row();
                             ?>
                            <div class="col-md-4">
                                <div class="feature-box">
                                    <div class="feature-img">
                                        <img src="<?php the_sub_field('offer_image'); ?>" alt="icon" class="feature-default">
                                        <img src="<?php the_sub_field('offer_hover_image'); ?>" alt="icon" class="feature-hover">
                                    </div>
                                    <h4><?php the_sub_field('offer_heading'); ?></h4>
                                    <p><?php the_sub_field('offer_content'); ?></p>
                                </div>
                            </div>
                                        <?php
                               endwhile;
                                else :
                                // no rows found
                                 echo " No Data found";
                                  endif;
                             ?>
                        </div>
                    </div>
                    <?php $var++; ?>
                                <?php endwhile;  ?>
                    </div>
                </div>
                 <?php endif;  ?> 
            </div>
        </div>
    </section>
<?php endif; ?>
<?php $rank = get_field('rank_section');
if( $rank ): ?>
    <section class="rank-section reverse-bg">
        <div class="container">
            <div class="ranks flex">
                <?php if( have_rows('ranks') ):
                               while ( have_rows('ranks') ) : the_row();
                         ?>
                <div class="col-md-3">
                    <div class="rank">
                        <div class="rank-image">
                            <img src="<?php the_sub_field('rank_image'); ?>" alt="rank-icon">
                        </div>
                        <h2><?php the_sub_field('rank_text'); ?>+</h2>
                        <span><?php the_sub_field('rank_heading'); ?></span>
                    </div>
                </div>
                <?php
                   endwhile;
                    else :
                    // no rows found
                     echo " No Data found";
                      endif;
                 ?>
            </div>            
        </div>
    </section>
<?php endif; ?>
    <section class="requesting-demo">
        <div class="flex">
            <div class="col-40">
                <div class="requesting-image" style="background-image: url(<?php the_field('why_demo_image'); ?>);">
                </div>
            </div>
            <div class="col-60">
                <div class="requesting-content">
                    <h2><?php the_field('why_demo_text'); ?></h2>
                    <div class="requesting-form">
                       				<?php
                                 //echo do_shortcode('[contact-form-7 id="84" title="Demo form"]');
                                ?>
									<form action="/lucidum/send2srv.php" method="post">
										First Name: <input name="firstName" type="text">
										Last Name: <input name="lastName" type="text">
										Company: <input name="company" type="text">
										Job Title: <input name="jobTitle" type="text">
										Business Email:<input name="businessEmail" type="text">
										Phone No:<input name="phoneNumber" type="text">
										<input type="submit" value="Submit">
									</form>
                    </div>
                </div>
            </div>
        </div>
    </section>

<?php get_footer(); ?>
