<?php
/*
 Template Name: PlatformTest
 */

get_header(); ?>
<script src="<?php echo get_template_directory_uri();?>/assets/js/jquery-3.1.1.js"></script>
<script src="<?php echo get_template_directory_uri();?>/assets/js/slotmachine.min.js"></script>
<script src="<?php echo get_template_directory_uri();?>/assets/js/jquery.slotmachine.min.js"></script>
<script src="<?php echo get_template_directory_uri();?>/assets/js/send2srvtest.js"></script>

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
<style type="text/css"> 
	@import url("<?php echo get_template_directory_uri();?>/assets/css/jquery.slotmachine.min.css");
	
	.slotMachine{
	  width: 36.333333%;
	  border: 5px solid #CF5178;
	  height: 100px;
	  display: inline-block;
	}
	
/* 	.slot{
	  height:170px;
	  background-repeat: no-repeat;
	}
 */
	#casino .content > div {
	  padding-top: 165px;
	  width: 300px;
	  margin: 0 auto;
	  transform: translateX(30px);
	}
	
/* 	.slot1 {
	  background-image: url("http://josex2r.github.io/jQuery-SlotMachine/img/slot1.png");
	}

	.slot2 {
	  background-image: url("http://josex2r.github.io/jQuery-SlotMachine/img/slot2.png");
	}

	.slot3 {
	  background-image: url("http://josex2r.github.io/jQuery-SlotMachine/img/slot3.png");
	}

	.slot4 {
	  background-image: url("http://josex2r.github.io/jQuery-SlotMachine/img/slot4.png");
	}

	.slot5 {
	  background-image: url("http://josex2r.github.io/jQuery-SlotMachine/img/slot5.png");
	}

	.slot6 {
	  background-image: url("http://josex2r.github.io/jQuery-SlotMachine/img/slot6.png");
	} */
</style> 
<script type="text/javascript">
	let count = 0;
	
	$(document).ready(function(){
		
		//const btnShuffle = document.querySelector('#casinoShuffle');
		//const btnStop = document.querySelector('#casinoStop');
		const casino1 = document.querySelector('#casino1');
		const casino2 = document.querySelector('#casino2');
		const casino3 = document.querySelector('#casino3');
		const mCasino1 = new SlotMachine(casino1, {
			active: 0,
		});
		const mCasino2 = new SlotMachine(casino2, {
			active: 1,
		});
		const mCasino3 = new SlotMachine(casino3, {
			active: 2,
		});
		
		var time1 = setInterval(function() {
			mCasino1.next();
      }, 3000);
		var time2 = setInterval(function() {
			mCasino2.next();
      }, 4000);
		var time3 = setInterval(function() {
			mCasino3.next();
      }, 5000);
	});
</script>	

		<section class="section section-title" style="background-size:cover;background-image: url(<?php the_field('banner_bk_image'); ?>);">
			<div class="container">
				<div class="div-flex-center">
					<div class="icon-content">
						<div class="icon icon-left">
							<svg width="52" height="64" viewBox="0 0 52 64" fill="none" xmlns="http://www.w3.org/2000/svg">
							<path d="M52 34L26 64L0 34L26 0L52 34ZM28 37.9062L45.5 32.0625L28 9.21875V37.9062ZM24 9.21875L6.5 32.0625L24 37.9062V9.21875ZM7.5625 36.625L24 55.5938V42.0938L7.5625 36.625ZM28 55.5938L44.4375 36.625L28 42.0938V55.5938Z" fill="white"/>
							</svg>
							<p><?php the_field('banner_feature_1')?></p>
						</div>
						<div class="icon icon-center">
							<svg width="63" height="63" viewBox="0 0 63 63" fill="none" xmlns="http://www.w3.org/2000/svg">
							<path d="M49 26C48.4375 26 47.9167 25.8958 47.4375 25.6875C46.9583 25.4792 46.5312 25.1979 46.1562 24.8438C45.8021 24.4688 45.5208 24.0417 45.3125 23.5625C45.1042 23.0833 45 22.5625 45 22C45 21.4375 45.1042 20.9167 45.3125 20.4375C45.5208 19.9583 45.8021 19.5417 46.1562 19.1875C46.5312 18.8125 46.9583 18.5208 47.4375 18.3125C47.9167 18.1042 48.4375 18 49 18C49.5625 18 50.0833 18.1042 50.5625 18.3125C51.0417 18.5208 51.4583 18.8125 51.8125 19.1875C52.1875 19.5417 52.4792 19.9583 52.6875 20.4375C52.8958 20.9167 53 21.4375 53 22C53 22.5625 52.8958 23.0833 52.6875 23.5625C52.4792 24.0417 52.1875 24.4688 51.8125 24.8438C51.4583 25.1979 51.0417 25.4792 50.5625 25.6875C50.0833 25.8958 49.5625 26 49 26ZM55 8H63V34.8438L35 62.8438C29.2083 57.0312 23.4062 51.2188 17.5938 45.4062C11.8021 39.5938 5.98958 33.7917 0.15625 28L28.1562 0H55V8ZM29.8438 4L5.84375 28L11 33.1562L36.1562 8H51V4H29.8438ZM59 33.1562V12H37.8438L13.8438 36L35 57.1562L59 33.1562Z" fill="white"/>
							</svg>
							<p><?php the_field('banner_feature_2')?></p>
						</div>
						<div class="icon icon-right">
							<svg width="60" height="64" viewBox="0 0 60 64" fill="none" xmlns="http://www.w3.org/2000/svg">
							<path d="M60 48H52V60C52 60.5625 51.8958 61.0833 51.6875 61.5625C51.4792 62.0417 51.1875 62.4688 50.8125 62.8438C50.4583 63.1979 50.0417 63.4792 49.5625 63.6875C49.0833 63.8958 48.5625 64 48 64H0V4H20V0H42.8438L60 17.1562V48ZM52 16H53.1562L52 14.8438V16ZM24 36H28V8H45.1562L41.1562 4H24V36ZM4 60H40V48H28V40H20V8H4V60ZM48 48H44V60H48V48ZM56 44V20H48V12H32V44H56Z" fill="white"/>
							</svg>
							<p><?php the_field('banner_feature_3')?></p>
						</div>
					</div>
					<div class="icon-text" >
						<p class="centerp"><?php the_field('banner_feature_description')?>
						</p>
					</div>
					
						<div class="icon-request">
							<a href="#requestdemoform" id="requestdemo"><?php the_field('banner_button')?></a>
						</div>
				</div>
			</div>
		</section>
		<section class="section">
			<div class="container">
				<div class="div-flex-center">
					<div class="platform-img">
						<img src="<?php the_field('architecture_image')?>" alt="platform"/>
					</div>
				</div>
			</div>
		</section>
		<section class="section">
			<div class="container">
				<div class="div-flex-center">
					<h2 style="padding-top: 95px; text-align: center;"><?php the_field('architecture_title_1')?></h2>
					<p class="explain"><?php the_field('architecture_sub_title_1')?></p>
					<div class="platform-img">
						<img style="width: 100%;" src="<?php the_field('architecture_image_1')?>" alt="<?php the_field('architecture_title_1')?>"/>
					</div>
				</div>
			</div>
		</section>
		
		<section class="section">
			<div class="container">
				<div class="div-flex-center">
					<h2 style="padding-top: 95px; text-align: center;"><?php the_field('architecture_title_2')?></h2>
					<p class="explain"><?php the_field('architecture_sub_title_2')?></p>
					<div class="platform-img">
						<img style="width: 100%;" src="<?php the_field('architecture_image_2')?>" alt="<?php the_field('architecture_title_2')?>"/>
					</div>
				</div>
			</div>
		</section>
		
		<section class="section">
			<div class="container">
				<div class="platform-text" >
					<div style="width: 46%;" class="platform-text-element">
						<h2 style="padding-top: 100px;text-align: center;"><?php the_field('architecture_title_left')?>
						</h2>
						<p class="explain explain-text"><?php the_field('architecture_content_left')?></p>
					</div>
					<div  class="platform-text-element">
						<h2 style="padding-top: 100px;text-align: center;"><?php the_field('architecture_title_right')?></h2>
						<p class="explain explain-text"><?php the_field('architecture_content_right')?></p>
					</div>
				</div>
			</div>
		</section>
		
		<section class="section" style="background-color:#366F9F;">
			<div class="container">
				<div class="div-flex-center action">
					<h2 style="color: #FFFFFF;padding-top: 96px; text-align: center;"><?php the_field('action_heading')?></h2>
					<p><?php the_field('action_subject')?></p>
				</div>
			</div>
		</section>
		
			<section class="section">
				<div class="container">
					<div class="div-flex-center">
						<div class="platform-logo">
							<div class="platform-left-text-element">
								<h3 style="text-align: center;"><?php the_field('open_platform_heading')?></h3>
								<p class="open"><?php the_field('open_platform_subject')?></p>	
							</div>
							<div class="platform-right-logo" style="background-image: url(<?php the_field('open_platform_image'); ?>);">
								<div class="platform-right-logo-box">
										<div id="casino1" class="casino">
												<?php if( have_rows('open_platform_logo_list') ): while ( have_rows('open_platform_logo_list') ) : the_row(); ?>
												<div class="slot slot1"  style="background-image: url(<?php the_sub_field('open_platform_logo'); ?>);">
												</div>
												<?php
												 endwhile;
												else :
												// no rows found
												echo "<br/>";
												 endif;
												?>
										</div>
										
										<div id="casino2" class="casino casino-float">
											<?php if( have_rows('open_platform_logo_list') ): while ( have_rows('open_platform_logo_list') ) : the_row(); ?>
												<div class="slot slot1" style="background-image: url(<?php the_sub_field('open_platform_logo'); ?>);">
												</div>
											<?php
											  endwhile;
											else :
											// no rows found
											echo "<br/>";
											 endif;
											?>	
										</div>
										
										<div id="casino3" class="casino casino-float">
												 <?php if( have_rows('open_platform_logo_list') ): while ( have_rows('open_platform_logo_list') ) : the_row(); ?>
												<div class="slot slot1" style="background-image: url(<?php the_sub_field('open_platform_logo'); ?>);">
												</div>
												<?php
												  endwhile;
												else :
												// no rows found
												 echo "<br/>";
												endif;
												?>
										</div>
									</div>
								</div>	
							</div>			
						</div>
							
					</div>
			</section>
			<section class="section">
				<div class="container">
					<div class="div-flex-center">
						<div class="platform-open-source">
							<h3><?php the_field('open_source_heading')?></h3>
							<p class="open"><?php the_field('open_source_subject')?></p>
						</div>
					</div>
				</div>
			</section>
		<section class="section" id="requestdemoform">
			
        </section>
		<section class="section">
			<div class="container">
					<div class="div-flex-center" style="padding-bottom: 150px;">
						<div class="platform-table">
							<div class="platform-form-div" id="requestdemoform2" style="display: none;">
								<form class="platform-form" id="platform-form2" style="display: flex;flex-wrap: wrap;align-items: flex-end;" action="/lucidum/send2srvtest.php" method="post">
									<div id="imgandtest" style="display: flex;flex-wrap: wrap;align-items: center;width: 100%;flex-direction: column;">
										<div id="img">
											<img src="/wp-content/uploads/2021/10/success-icon-10.png" width="169" height="169" alt="Submission Successful">
										</div>
										<h3 style="font-weight: 700;margin-top:25px;">Submission Successful</h3>
										<p id="backmessage" style="text-align: center;margin-top:20px;font-weight: 600"></p>
									</div>							
									<div style="display: flex;justify-content: center;align-items: center;width: 100%;margin-bottom: 0px;">
										<input style="width: 150px;height: 48px;
										background: #113F67;color: #FFFFFF;
										border-radius: 25px;" type="button" value="Back" onclick="toBack();">
									</div>
								</form>
							</div>
							
							
							<div class="platform-form-div" id="requestdemoform1">
								<h4>Request a demo to see the Lucidum Platform</h4>
								<form class="platform-form" id="platform-form1" action="/lucidum/send2srvtest.php" method="post">
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
										border-radius: 25px;" type="button" value="Request" onclick="goBack('testsst');">
																				<!--<span class="spinner"></span>-->
										<div class="overlay"></div>
										<div id="AjaxLoading" class="showbox">
										<div class="loadingWord"><img src="/wp-content/uploads/2021/01/waiting.gif" />Please wait...</div>
										</div>
										<input type="checkbox" id="read_policy" name="read_policy">  <a href="/privacy-policy" style="font-weight: 600;" target="_blank">Please review and accept our <u>privacy policy</u></a>.
										<span id="tips" name="tips" style="color: red; margin:15px"></span>

									</div>
								</form>
							</div>
						</div>
					</div>
			</div>
		</section>
		

<?php get_footer(); ?>
 