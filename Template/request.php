<?php
/*
 Template Name: Webinar 
 */

get_header(); ?>
<script src="<?php echo get_template_directory_uri();?>/assets/js/jquery-3.1.1.js"></script>
<script src="<?php echo get_template_directory_uri();?>/assets/js/slotmachine.min.js"></script>
<script src="<?php echo get_template_directory_uri();?>/assets/js/jquery.slotmachine.min.js"></script>
<script src="<?php echo get_template_directory_uri();?>/assets/js/send2srv.js"></script>
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
							<div class="platform-form-div" id="requestdemoform1">
								<h4>Request a demo to see the Lucidum Platform</h4>
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
										border-radius: 25px;" type="button" value="Request" onclick="send2srv('requestDemo');">
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
