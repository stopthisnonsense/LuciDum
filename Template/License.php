<?php
/*
 Template Name: License Template
 */

get_header(); ?>
<style type="text/css">
    .overlay{position:fixed;top:0;right:0;bottom:0;left:0;z-index:998;width:100%;height:100%;padding:0 20px 0 0;background:#f6f4f5;display:none;}
    .showbox{position:fixed;top:0;left:50%;z-index:9999;opacity:0;filter:alpha(opacity=0);margin-left:-80px;}
    *html .showbox,*html .overlay{position:absolute;top:expression(eval(document.documentElement.scrollTop));}
    #AjaxLoading{border:0px solid #8CBEDA;color:#37a;font-size:12px;font-weight:bold;}
    #AjaxLoading div.loadingWord{width:180px;height:50px;line-height:50px;border:2px solid #D6E7F2;background:#fff;}
    #AjaxLoading img{margin:10px 15px;float:left;display:inline;}
	.spinner {
		background: url(/wp-content/uploads/2021/01/waiting.gif) no-repeat;
		background-size: 20px 20px;
		display: inline-block;
		visibility: hidden;
		float: none;
		vertical-align: middle;
		opacity: .7;
		width: 20px;
		height: 20px;
		margin: 4px 10px 0;
	}
	.spinner.is-active{
		visibility: visible;
	}
</style>
<script src="<?php echo get_template_directory_uri();?>/assets/js/send2srv.js"></script>
<script type="text/javascript">
	
	//window.onload=function(){
	//	ShowLoading();
	//}	
</script>	
	<section class="section section-title">
				<div class="container ">
					<h2 class="RE-title"><?php the_field('license_heading')?></h2>
				</div>
			</section>
			<section class="section License-section" style="background-size:cover;background-image: url(<?php the_field('license_heading_bk_image'); ?>);">
				<div class="container">
					<div class="div-flex-center" style="padding-top: 24px;">
						<div class="license-table-content" >
							<div style="width: 100%">
								<?php if( have_rows('license_features') ): while ( have_rows('license_features') ) : the_row(); ?>
								<p class="license-table-p"><?php the_sub_field('feature_description'); ?></p>
								 <?php
									endwhile;
									else :
									// no rows found
									echo "<br/>";
									endif;
								?>
							</div>
							<div class="license-request">
								<a href="#requestcommunityform"><?php the_field('request_community_license_button_text')?></a>
							</div>
						</div>
						
					</div>
				</div>
			</section>
			<section class="section">
				<div class="container">
					<div class="div-flex-center" style="padding-bottom: 100px;">
						<h2 class="license-logo-box-title"><?php the_field('use_case_heading')?></h2>
						<div class="license-logo-box">
							<div class="license-logo" >
								<div style="width: 100%;display:flex;justify-content: center;">	
								<div class="license-logo-picture">
									<div style="display:flex;flex-direction: column;align-items: center">
										<img src="<?php the_field('use_case_image_1')?>" alt="use case image">
										<p class="license-logo-p" ><?php the_field('use_case_title_1')?></p>
									</div>
								</div>
								</div>
								<div  style="width: 100%;padding-top: 48px;">
									<p class="license-logo-text"><?php the_field('use_case_desc_1')?></p>
								</div>
							</div>
							<div class="license-logo">
								<div style="width: 100%;display:flex;justify-content: center;">	
									<div class="license-logo-picture">
								
										<div style="display:flex;flex-direction: column;align-items: center">
											<img src="<?php the_field('use_case_image_2')?>" alt="use case image">
											<p class="license-logo-p" ><?php the_field('use_case_title_2')?></p>
										</div>
									</div>
								</div>
								<div class="" style="width: 100%;padding-top: 48px;">
									<p class="license-logo-text"><?php the_field('use_case_desc_2')?></p>
								</div>
							</div>
							<div class="license-logo" >
								<div style="width: 100%;display:flex;justify-content: center;">	
								<div class="license-logo-picture">
									<div style="display:flex;flex-direction: column;align-items: center">
										<img src="<?php the_field('use_case_image_3')?>" alt="use case image">
										<p class="license-logo-p" ><?php the_field('use_case_title_3')?></p>
									</div>
								</div>
								</div>
								<div class="" style="width: 100%;padding-top: 48px;">
									<p class="license-logo-text"><?php the_field('use_case_desc_3')?></p>
								</div>
							</div>
						</div>
					</div>
				</div>
			</section>
			<section class="section" style="background-color: rgba(151, 188, 227, 0.2);">
					<div class="container">
						<div class="license-vido-content" id="community_video">		
							<h2>
							    <?php the_field('tutorial_heading')?>
							</h2>
							<div class="license-vido">
								<?php echo do_shortcode( "[evp_embed_video poster='" . get_field('tutorial_video_poster') . "' url='" . get_field("tutorial_video_link") . "']" ); ?>
							</div>
							<div class="license-vido-text" >
								<p><?php the_field('tutorial_sub_title')?></p>
							</div>
						</div>	
					</div>
			</section>
			<section class="section">
				<div class="container">
					<div class="div-flex-justify" style="padding-bottom: 100px;padding-top: 100px;">
						<div class="license-bottom">
							<h4><?php the_field('enterprise_license_heading')?></h4>
							<div style="height: 840px;">
							<?php if( have_rows('enterprise_license_features') ): while ( have_rows('enterprise_license_features') ) : the_row(); ?>
<?php if (get_sub_field('font_color') == 'Gray'):?>
							<div class="license-bottom-gray">
								<p><?php the_sub_field('feature_description'); ?></p>
							</div>
						
							<?php else: ?>
								<div class="license-bottom-p">
									<p><?php the_sub_field('feature_description'); ?></p>
								</div>
								<?php endif; ?>
								<?php
								endwhile;
								else :
								// no rows found
								echo "<br/>";
								endif;
								?>
							</div>
							<div class="license-bottom-request">
								<a href="/platform/#requestdemoform"><?php the_field('enterprise_license_button_text')?></a>
							</div>
						</div>
						<div class="license-bottom">
							<h4><?php the_field('community_license_heading')?></h4>
							<div style="height:840px;">
							<?php if( have_rows('community_license_features') ): while ( have_rows('community_license_features') ) : the_row(); ?>
							<?php if (get_sub_field('font_color') == 'Gray'):?>
							<div class="license-bottom-gray">
								<p><?php the_sub_field('feature_description'); ?></p>
							</div>
							<?php else: ?>
														<div class="license-bottom-p">
								<p><?php the_sub_field('feature_description'); ?></p>
							</div>
							<?php endif; ?>
							<?php
							endwhile;
							else :
							// no rows found
							echo "<br/>";
							endif;
							?>
							</div>
							<div class="license-bottom-request">
								<a href="#requestcommunityform"><?php the_field('community_license_button_text')?></a>
							</div>
						</div>
					</div>
				</div>
			</section>
			<section class="section" id="requestcommunityform">
				<br/>
			</section>
			<section class="section">
				<div class="container">
					<div class="div-flex-center" style="padding-bottom: 150px;">
					<div class="platform-table" >
						<div class="platform-form-div" id="requestcommunityform1">
							<h4><?php the_field('request_form_heading')?></h4>
							<form class="platform-form"  action="/lucidum/send2srv.php" method="post">
								<div class="firstName">
									 <p class="input-name-p">First Name*</p>
									<input class="input-name"  id="firstName" name="firstName" type="text">
								</div>
								<div class="lastName">
									 <p class="input-name-p">Last Name*</p>
									<input class="input-name" id="lastName" name="lastName" type="text">
								</div>								
								<div class="platform-input-div">
									 <p class="input-name-p">Company *</p>
									<input class="platform-input"   id="company" name="company" type="text">
								</div>
								<div class="platform-input-div">
									 <p class="input-name-p">Job Title *</p>
									<input  class="platform-input" id="jobTitle" name="jobTitle" type="textpadding-left: 48px;padding-right: 48px;">
								</div>								
								<div class="platform-input-div">
									 <p class="input-name-p">Business Email *</p>
									<input class="platform-input"  id="businessEmail" name="businessEmail" type="text">
								</div>								
								<div class="platform-input-div">
									 <p class="input-name-p">Phone Number *</p>
									<input class="platform-input"  id="phoneNumber" name="phoneNumber" type="text">
								</div>								
								<div> 
									<input style="width: 150px;height: 48px;
									background: #113F67;color: #FFFFFF;
									border-radius: 25px;" type="button" value="Request" id="requestBtn" onclick="send2srv('requestLicense');">
									<!--<span class="spinner"></span>-->
									<div class="overlay"></div>
									<div id="AjaxLoading" class="showbox">
									 <div class="loadingWord"><img src="/wp-content/uploads/2021/01/waiting.gif" />Please wait...</div>
									</div>
									
									
									<input type="checkbox" id="read_policy" name="read_policy">  <a href="/privacy-policy" style="font-weight: 600;font-size: 14px;" target="_blank">Please review and accept our <u>privacy policy</u></a> & <a style="font-weight: 600;font-size: 14px;" href="/end-user-license-agreement"> <u>end-user license agreement</u></a>.
									<span id="tips" name="tips" style="color: red; margin:15px"></span>
								</div>
							</form>
						</div>
					</div>
					</div>
				</div>
			</section>
<?php get_footer(); ?>
