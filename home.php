<?php
/*
 Template Name: Home Template
 */

get_header(); ?>
<script type="text/javascript">
	var current_index = 0;
	var max_testi = 4;
	function setMaxTesti( v ){
		max_testi = v;	
	}
	
	function nextTesti( delta ){
		if (max_testi <= 0) return;
		current_index += delta;
		if (current_index <= 0){
			current_index = 0;
			$('#prevArrow').attr("fill","#97BCE3");	
			$('#nextArrow').attr("fill","#366F9F");
		}else if (current_index >= max_testi - 1){
			current_index = max_testi - 1;
			$('#nextArrow').attr("fill","#97BCE3");	
			$('#prevArrow').attr("fill","#366F9F");
		}else {
			$('#nextArrow').attr("fill","#366F9F");	
			$('#prevArrow').attr("fill","#366F9F");
		}
		
		// loop
		//current_index = (current_index + max_testi) % max_testi;
		for(var i=0;i<max_testi;i++){
			if (current_index == i){
				$('#testimonial_id_' + i).show();
			}else{
				$('#testimonial_id_' + i).hide();	
			}
		}
	}
</script>
		<section class="main-banner section-title" style="background-size:cover;background-image: url(<?php the_field('home_banner_image'); ?>);">
			<div class="container">
				<div class="banner-content-flex">
					<div class="banner-content">					
							<h1><?php the_field('home_banner_heading'); ?></h1>
							<span><?php the_field('banner_heading_content'); ?></span>
							<div class="banner-links-content">
								
								<div class="request-link">
									<a class="link" href="<?php the_field('banner_button_1_link'); ?>"><?php the_field('banner_button_1'); ?></a>
								 </div>				
							</div>
							
					</div>
				</div>
			</div>
		</section>
		
		<section class="home-why-us" style="background-size:cover;background-image: url(<?php the_field('why_us_image'); ?>);">
			<div class="container">
				<div class="div-flex-center">
					<h1 class="home-why-us-title">
						<?php the_field('why_us_heading'); ?>
					</h1>
					<div class="why-us-content">
						<div class="why-us side">
							<h3>
							<?php the_field('why_us_question_1'); ?>
							</h3>
						</div>
						<div class="why-us center">
							<h3>
							<?php the_field('why_us_question_2'); ?>
							</h3>
						</div>
						<div class="why-us side">
							<h3>
							<?php the_field('why_us_question_3'); ?>
							</h3>
						</div>
					</div>
					<h3 class="home-why-us-footer">
						<?php the_field('why_us_question_bottom'); ?>
					</h3>
						
				</div>
			</div>
		</section>
		
		<section class="home-vido-section" style="background-size:cover; background-image: url(<?php the_field('video_bk_image'); ?>);">
			<div class="container">
				<div class="home-vido-content" id="home-video-content">		
						<h6>
							<?php the_field('video_heading'); ?>
						</h6>
						<div class="home-vido">
						<?php echo do_shortcode( "[evp_embed_video poster='" . get_field('video_poster') . "' url='" . get_field("video_url") . "']" ); ?>
						
						</div>
				</div>
			</div>
		</section>
		
	
		<section class="home-flowchart-section">
			<div class="container">
				<h2 style="padding-top: 64px;text-align: center;align-items: center;"><?php the_field('feature_heading'); ?></h2>
				<div class="home-flowchart">
					<img src="<?php the_field('feature_flow_chart_img'); ?>" />
				</div>
			</div>
		</section>
		
		
		
		<section class="section">
						<div class="container">
							<div class="div-flex-justify">
								<div class="home-img">
									<img src="<?php the_field('feature_arch_img'); ?>" />    
								</div>
								<div class="home-img"  style="width: 40%;padding-top: 92px;padding-bottom: 92px;display: flex;flex-direction: column;align-self: stretch;">
										 <?php if( have_rows('features') ): while ( have_rows('features') ) : the_row(); ?>
										<h3 style="padding-top: 40px;width: 100%;">
										<svg width="15" height="15" viewBox="0 0 30 30" fill="none" xmlns="http://www.w3.org/2000/svg">
										<path d="M15 0.833252C7.16587 0.833252 0.833374 7.16575 0.833374 14.9999C0.833374 22.8341 7.16587 29.1666 15 29.1666C22.8342 29.1666 29.1667 22.8341 29.1667 14.9999C29.1667 7.16575 22.8342 0.833252 15 0.833252ZM22.0834 20.0858L20.0859 22.0833L15 16.9974L9.91421 22.0833L7.91671 20.0858L13.0025 14.9999L7.91671 9.91409L9.91421 7.91659L15 13.0024L20.0859 7.91659L22.0834 9.91409L16.9975 14.9999L22.0834 20.0858Z" fill="#CF0000"/>
										</svg>
										 <?php the_sub_field('feature_heading'); ?>
										 </h3>
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
					</section>
					<section style="width: 100%;">
						<div class="container">
							<div class="founder">
								<?php global $wp_query ;
								  $index = 0;
								  $paged = (get_query_var('paged')) ? get_query_var('paged') : 1; 
								  $args = array('post_type' => 'testimonial','posts_per_page' => 9999, 'order' => 'ASC', 'paged' => $paged);
								  $wp_query = new WP_Query($args);
								?> 
								<?php if(have_posts()) : while (have_posts()) : the_post(); ?>
								<?php $div_block = ($index == 0 ? 'display:block ！ important；': 'display:none '); ?>
								<div class="founder_content" id="testimonial_id_<?php echo $index;?>" style="<?php echo $div_block?>">
								<div class="member" >
									<img  src="<?php the_field('customer_image');?>" >
								</div>
								<div  class="home-critic">
									<span style="font-family: Helvetica;
font-style: normal;
font-weight: normal;
font-size: 30px;"><?php the_field('customer_name');?></span>
									<h5><?php the_field('customer_job');?></h5>
									<h4 style="padding-top: 32px;"><?php the_field('customer_message');?></h4>
									<p style="padding-top: 32px;">
									<image id="image0"  src="<?php the_field('customer_company_logo');?>"/>
									
									</p>
									<p style="padding-top: 64px;">
										<a style="width: 217px;height: 48px;border: 2px solid #4E93CE;border-radius: 30px;display: flex;align-items: center;font-size: 18px !important;justify-content: center" href='/testimonials/'>Read Them All  <svg width="14" height="9" viewBox="0 0 24 18" fill="none" xmlns="http://www.w3.org/2000/svg">
											<path d="M15 0L24 9L15 18L12.8789 15.8789L18.2578 10.5H0V7.5H18.2578L12.8789 2.12109L15 0Z" fill="#366F9F"/>
										</svg></a>
									</p>
								</div>
								</div>
								<?php $index++; ?>
								<?php endwhile; ?>
								<?php endif; ?> 
            				<?php wp_reset_query();?>
								<?php echo "<script type='text/javascript'>setMaxTesti($index);</script>" ?>
								<div style="width: 278px;height: 278px;display: flex;justify-content: space-between;margin-left: 75px;">
									<a style="padding-top: 110px;padding-left: 40px;" onclick="nextTesti(-1);">
									<svg width="15" height="24" viewBox="0 0 21 32" fill="none" xmlns="http://www.w3.org/2000/svg">
									<path id="prevArrow" d="M20.0935 3.76L7.88017 16L20.0935 28.24L16.3335 32L0.333507 16L16.3335 -3.2871e-07L20.0935 3.76Z" fill="#97BCE3"/>
									</svg></a>
									<a style="padding-top: 110px;padding-right: 160px;" onclick="nextTesti(1);"><svg width="15" height="24" viewBox="0 0 21 32" fill="none" xmlns="http://www.w3.org/2000/svg">
									<path id="nextArrow" d="M0.906616 28.24L13.1199 16L0.906616 3.76L4.66662 0L20.6666 16L4.66662 32L0.906616 28.24Z" fill="#366F9F"/>
									</svg>
									</a>
								</div>
							</div>
						</div>
					</section>
					<section class="section" style="background-color: #164163;">
						<div class="container">
							<div class="div-flex-center">
								<div class="div-honor">
									    <a target="_blank" href="https://www.crn.com/slide-shows/security/the-10-hottest-cloud-security-startups-of-2020/7?utm_campaign=Social%20-%20Launch&utm_content=147073456&utm_medium=social&utm_source=linkedin&hss_channel=lcp-65400768">
										<svg width="150" height="90" viewBox="0 0 150 90" fill="none" xmlns="http://www.w3.org/2000/svg">
										<g clip-path="url(#clip0)">
										<path d="M0.00732422 64.8441V64.7071C0.00732422 50.5353 10.912 39.4214 25.6392 39.4214C35.5703 39.4214 41.9674 43.59 46.2731 49.5616L36.1256 57.4156C33.3489 53.9394 30.154 51.718 25.5022 51.718C18.6939 51.718 13.8979 57.4877 13.8979 64.57V64.7071C13.8979 72.0057 18.6939 77.6889 25.5022 77.6889C30.5506 77.6889 33.5581 75.3233 36.479 71.7821L46.6192 78.9943C42.0323 85.3121 35.8515 89.9711 25.0839 89.9711C11.1861 90 0.00732422 79.3693 0.00732422 64.8441Z" fill="#EC1C24"/>
										<path d="M49.1221 40.3877H72.1287C79.5644 40.3877 84.6994 42.335 87.9954 45.6742C90.8802 48.4508 92.3226 52.1651 92.3226 56.9972V57.1342C92.3226 64.5699 88.356 69.503 82.3122 72.0705L93.866 89.0478H78.3023L68.5227 74.2991H62.6159V89.0478H49.1221V40.3877ZM71.4796 63.7333C76.0665 63.7333 78.6917 61.512 78.6917 57.9636V57.8194C78.6917 54.0042 75.9151 52.0497 71.4003 52.0497H62.6015V63.7333H71.4796Z" fill="#EC1C24"/>
										<path d="M95.813 40.395H108.391L128.397 66.099V40.395H141.74V89.0263H129.926L109.148 62.3487V89.0263H95.813V40.395Z" fill="#EC1C24"/>
										<path d="M144.351 86.8842C144.384 86.2672 144.653 85.6866 145.102 85.2617C145.551 84.8369 146.145 84.6001 146.763 84.6001C147.381 84.6001 147.975 84.8369 148.424 85.2617C148.873 85.6866 149.142 86.2672 149.176 86.8842C149.175 87.2015 149.111 87.5155 148.989 87.8082C148.867 88.101 148.688 88.3668 148.463 88.5905C148.238 88.8142 147.971 88.9913 147.677 89.1119C147.384 89.2324 147.07 89.294 146.752 89.293C146.436 89.294 146.123 89.2323 145.83 89.1115C145.538 88.9907 145.273 88.8132 145.049 88.5892C144.826 88.3652 144.649 88.0993 144.529 87.8066C144.409 87.514 144.349 87.2005 144.351 86.8842ZM148.952 86.8842C148.952 86.3027 148.721 85.7451 148.31 85.3339C147.899 84.9227 147.341 84.6917 146.759 84.6917C146.178 84.6917 145.62 84.9227 145.209 85.3339C144.798 85.7451 144.567 86.3027 144.567 86.8842C144.567 87.4657 144.798 88.0233 145.209 88.4345C145.62 88.8457 146.178 89.0767 146.759 89.0767C147.341 89.0767 147.899 88.8457 148.31 88.4345C148.721 88.0233 148.952 87.4657 148.952 86.8842ZM145.815 85.5788H146.925C147.057 85.5723 147.188 85.5918 147.312 85.6364C147.436 85.681 147.549 85.7496 147.647 85.8384C147.712 85.8986 147.765 85.9722 147.799 86.0544C147.834 86.1365 147.851 86.2253 147.848 86.3144C147.85 86.4927 147.785 86.6651 147.666 86.7983C147.548 86.9315 147.384 87.016 147.207 87.0357L147.971 88.0237H147.524L146.803 87.0933H146.168V88.0237H145.8L145.815 85.5788ZM146.889 86.7904C147.235 86.7904 147.473 86.6318 147.473 86.3505C147.473 86.0909 147.264 85.925 146.911 85.925H146.19V86.8049L146.889 86.7904Z" fill="#EC1E27"/>
										<path d="M0.46875 9.05134H4.32723V21.4201H5.33693V9.05134H9.21705V8.11377H0.46875V9.05134Z" fill="white"/>
										<path d="M19.6674 14.2585H12.5995V8.11377H11.5898V21.4201H12.5995V15.1961H19.6674V21.4201H20.6771V8.11377H19.6674V14.2585Z" fill="white"/>
										<path d="M24.9902 20.4826V15.1816H31.2719V14.2441H24.9902V9.05134H31.9715V8.11377H23.9805V21.4201H32.0653V20.4826H24.9902Z" fill="white"/>
										<path d="M34.2432 14.857V14.6911C34.2432 10.6812 36.7458 7.95502 40.2436 7.95502C41.0374 7.92742 41.8279 8.0702 42.5619 8.37374C43.2959 8.67729 43.9564 9.13456 44.4988 9.71478L42.8544 11.8351C42.5222 11.4363 42.1097 11.1119 41.6436 10.8833C41.1776 10.6546 40.6686 10.5268 40.1499 10.5081C38.3685 10.5081 37.0631 12.1525 37.0631 14.7272V14.7633C37.0631 17.3957 38.4262 19.004 40.1859 19.004C40.7101 18.9821 41.2237 18.85 41.6934 18.6164C42.1631 18.3828 42.5784 18.0528 42.9121 17.6481L44.5565 19.5954C44.0011 20.2365 43.3111 20.7473 42.5357 21.0914C41.7603 21.4354 40.9186 21.6043 40.0706 21.5859C36.5943 21.5859 34.2432 18.9174 34.2432 14.8642" fill="white"/>
										<path d="M46.4243 8.14258H49.1721V13.4579H53.521V8.14258H56.2616V21.384H53.521V15.9966H49.1721V21.384H46.4243V8.14258Z" fill="white"/>
										<path d="M62.659 8.07031H65.2698L70.0154 21.3839H67.181L66.193 18.499H61.6349L60.6685 21.3839H57.9062L62.659 8.07031ZM65.3636 16.0902L63.9212 11.7629L62.4787 16.0902H65.3636Z" fill="white"/>
										<path d="M71.6597 8.14258H74.1767L79.2468 15.8668V8.14258H81.9369V21.384H79.5858L74.3498 13.3858V21.384H71.6597V8.14258Z" fill="white"/>
										<path d="M84.9585 8.14258H87.4755L92.5456 15.8668V8.14258H95.2285V21.384H92.8846L87.6414 13.3858V21.384H84.9585V8.14258Z" fill="white"/>
										<path d="M98.2363 8.14258H106.768V10.6235H100.963V13.4795H106.069V15.9605H100.963V18.9103H106.848V21.384H98.2363V8.14258Z" fill="white"/>
										<path d="M109.4 8.14258H112.141V18.8742H117.492V21.384H109.4V8.14258Z" fill="white"/>
										<path d="M128.087 19.1338C127.649 19.6165 127.114 20.0025 126.518 20.267C125.922 20.5315 125.277 20.6688 124.625 20.6699C123.981 20.6682 123.345 20.5198 122.767 20.2362C122.188 19.9526 121.682 19.541 121.286 19.0328C120.362 17.8052 119.883 16.2992 119.93 14.7632V14.6839C119.89 13.1666 120.369 11.6811 121.286 10.472C121.683 9.96495 122.19 9.55428 122.768 9.27077C123.346 8.98725 123.981 8.83823 124.625 8.83486C125.254 8.83574 125.876 8.96401 126.453 9.21193C127.031 9.45984 127.552 9.82226 127.986 10.2773L128.614 9.55607C128.091 9.03523 127.469 8.62355 126.786 8.34497C126.102 8.06639 125.37 7.92647 124.632 7.93335C121.293 7.93335 118.863 10.8182 118.863 14.7416V14.8353C118.799 16.6173 119.377 18.3629 120.493 19.754C120.991 20.3438 121.613 20.8168 122.315 21.1395C123.017 21.4623 123.781 21.627 124.553 21.6219C125.334 21.6235 126.107 21.4636 126.823 21.152C127.539 20.8405 128.183 20.3841 128.714 19.8117L128.087 19.0905V19.1338Z" fill="white"/>
										<path d="M139.8 9.84451C139.316 9.23424 138.7 8.74231 137.997 8.40612C137.295 8.06994 136.525 7.89837 135.747 7.90445C134.964 7.9002 134.192 8.0732 133.486 8.41046C132.78 8.74771 132.16 9.24047 131.672 9.85172C130.618 11.2465 130.068 12.9578 130.114 14.7055V14.8425C130.068 16.5869 130.615 18.2953 131.665 19.6891C132.153 20.2969 132.772 20.7874 133.475 21.1244C134.179 21.4615 134.949 21.6364 135.729 21.6364C136.509 21.6364 137.279 21.4615 137.982 21.1244C138.685 20.7874 139.304 20.2969 139.793 19.6891C140.858 18.2937 141.412 16.5756 141.365 14.8209V14.6911C141.409 12.9446 140.857 11.2353 139.8 9.84451ZM140.312 14.7055V14.8425C140.312 18.2322 138.394 20.6915 135.747 20.6915C135.108 20.6865 134.479 20.5343 133.908 20.2466C133.338 19.9589 132.842 19.5435 132.458 19.0327C131.567 17.8124 131.105 16.3313 131.145 14.8209V14.6911C131.145 11.3014 133.071 8.84203 135.732 8.84203C136.369 8.8465 136.996 8.99862 137.564 9.28645C138.133 9.57427 138.626 9.98996 139.007 10.5008C139.895 11.7191 140.354 13.198 140.312 14.7055Z" fill="white"/>
										<path d="M117.521 26.6846H34.2144V29.5406H117.521V26.6846Z" fill="#EC1C24"/>
										<path d="M117.529 0H34.1855V2.856H117.529V0Z" fill="#EC1C24"/>
										<path d="M141.898 20.3382C141.9 19.8842 142.082 19.4495 142.404 19.1291C142.725 18.8088 143.161 18.6289 143.615 18.6289C143.839 18.628 144.06 18.6713 144.267 18.7565C144.474 18.8417 144.662 18.9671 144.821 19.1253C144.979 19.2836 145.104 19.4716 145.189 19.6785C145.275 19.8854 145.318 20.1072 145.317 20.331C145.315 20.785 145.133 21.2197 144.812 21.5401C144.49 21.8604 144.055 22.0403 143.601 22.0403C143.377 22.0412 143.155 21.9978 142.948 21.9126C142.741 21.8274 142.553 21.7021 142.395 21.5439C142.237 21.3856 142.111 21.1976 142.026 20.9907C141.941 20.7837 141.897 20.562 141.898 20.3382ZM145.158 20.3382C145.161 20.134 145.123 19.9314 145.047 19.742C144.971 19.5526 144.857 19.3804 144.714 19.2354C144.57 19.0903 144.399 18.9754 144.21 18.8973C144.021 18.8191 143.819 18.7794 143.615 18.7804C143.208 18.7879 142.82 18.9544 142.535 19.2441C142.249 19.5339 142.088 19.924 142.086 20.331C142.071 20.544 142.101 20.7577 142.172 20.9589C142.244 21.16 142.356 21.3443 142.502 21.5003C142.648 21.6564 142.824 21.7808 143.02 21.8658C143.215 21.9508 143.427 21.9947 143.64 21.9947C143.854 21.9947 144.065 21.9508 144.261 21.8658C144.457 21.7808 144.633 21.6564 144.779 21.5003C144.924 21.3443 145.036 21.16 145.108 20.9589C145.179 20.7577 145.209 20.544 145.194 20.331L145.158 20.3382ZM142.937 19.415H143.723C143.913 19.4087 144.098 19.4729 144.242 19.5953C144.287 19.6393 144.323 19.6921 144.347 19.7504C144.37 19.8088 144.381 19.8714 144.379 19.9343C144.38 20.0596 144.335 20.1809 144.253 20.2753C144.171 20.3696 144.057 20.4305 143.932 20.4464L144.473 21.1676H144.149L143.644 20.5041H143.197V21.1676H142.937V19.415ZM143.658 20.2733C143.903 20.2733 144.077 20.1579 144.077 19.9632C144.077 19.7829 143.925 19.6603 143.673 19.6603H143.161V20.2877L143.658 20.2733Z" fill="white"/>
										</g>
										<defs>
										<clipPath id="clip0">
										<rect width="149.175" height="90" fill="white"/>
										</clipPath>
										</defs>
										</svg>
									</a>
								</div>
								<div class="div-honor-text">
									The 10 Hottest Cloud Security Startups Of 2020
								</div>
							</div>
						</div>
					</section>
					<section class="section" style="background-color: #97BCE3;">
						<div class="container">
							<div class="div-flex-center">
								<div class="cooperation">
									<p >Powered by</p>
									<div style="width: 34%;margin-top: 25px;"><a href="<?php the_field('investor_link_1');?>" target="_blank"><img src="<?php the_field('investor_img_1');?>" /></a></div>
									<p>&</p>
									<div style="width: 36%;margin-top: -10px;"><a href="<?php the_field('investor_link_2');?>" target="_blank"><img src="<?php the_field('investor_img_2');?>" /></a></div>
								</div>
							</div>
						</div>
					</section>
					<section class="section">
						<div class="container">
								<div class="div-flex-justify">
									<div class="link_man">
										<span><?php the_field('contact_heading');?></span>
										<h4 style="margin-bottom: 0;margin-top: 24px;"><?php the_field('contact_message_1');?></h4>
										<h4><?php the_field('contact_message_2');?></h4>
									</div>
									
								</div>
						</div>
					</section>

<?php get_footer(); ?>
