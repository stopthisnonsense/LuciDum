<?php
/*
 Template Name: Our blog Template
 */

get_header(); ?>
			
			
		<section class="section section-title">
			<div class="container">
				<div class="RE-title">
					Resources
				</div>
			</div>
		</section>
		<section style="width: 100%;">
			<div class="container">
				<div class="resource-title-box">
					<div class="resource-title">
						<a  href="/our-news">News</a>
					</div>
					<div class="resource-title current">
						<a  href="#">Blogs</a>
					</div>
					
					<div class="resource-title">
							<a href="/videos">Videos</a>
					</div>
				</div>
			</div>
		</section>
		<section style="width: 100%;">
			<div class="container" style="padding-bottom: 100px;">
				
				<?php global $wp_query ;
                 $paged = (get_query_var('paged')) ? get_query_var('paged') : 1; 
                    $args = array('post_type' => 'blog','posts_per_page' => 4, 'order' => 'DESC', 'paged' => $paged);
                    $wp_query = new WP_Query($args) ; // overriding default global of WordPress 
				?>
				<?php if ( have_posts() ) : while ( have_posts() ) :the_post(); ?>
				<?php $postlink = (empty(get_field('external_read_more_link')) ? get_permalink() : get_field('external_read_more_link'))?>
				<div class="blog-box">
					<div  class="blog-img">
						<img src="<?php the_field('blog_image'); ?>" alt="<?php the_title();?>">
					</div>
					<div class="blog-text">
						<div style="width: 100%;">
						<div class="blog-text-title">
							<h3><?php the_title(); ?></h3>
						</div>			
						<div style="padding-top: 34px;display: flex;">
							<div>
								<p class="blog-text-data"><?php echo get_the_date()?></p>	
							</div>
							<div  style="background: #E1C860;
										border-radius: 15px;
										width: 57px;
										height: 26px;
										margin-left: 10px;
										display: flex;
										justify-content: center;
										">
								<span style="display: flex;align-items: center;color: #000000;font-family: Helvetica 35 Thin;
								font-style: normal;
								font-weight: 100;
								font-size: 14px;">Blog</span>	
							</div>
						</div>
						<div class="blog-text-span">
							<p ><?php the_field('blog_subject'); ?></p>
						</div>
						<div class="blog-main-footer">
							<div  style="padding-top: 32px;display: flex;">
								<a class="read-more"  target="_blank" href="<?php echo $postlink?>">Read More&nbsp<svg width="14" height="9" viewBox="0 0 24 18" fill="none" xmlns="http://www.w3.org/2000/svg">
														<path d="M15 0L24 9L15 18L12.8789 15.8789L18.2578 10.5H0V7.5H18.2578L12.8789 2.12109L15 0Z" fill="#366F9F"/>
									</svg></a>
							</div>
							<div style="display: flex;justify-content: space-between;padding-top: 32px;">
								<a href="<?php the_field('linkedin_share','option')?><?php echo urlencode($postlink); ?>&title=<?php the_title(); ?>" target="_blank">
									<svg width="30" height="30" viewBox="0 0 30 30" fill="none" xmlns="http://www.w3.org/2000/svg">
									<path d="M27.7734 0C28.0762 0 28.3594 0.0585938 28.623 0.175781C28.8965 0.283203 29.1357 0.43457 29.3408 0.629883C29.5459 0.825195 29.707 1.05469 29.8242 1.31836C29.9414 1.58203 30 1.86523 30 2.16797V27.832C30 28.1348 29.9414 28.418 29.8242 28.6816C29.707 28.9453 29.5459 29.1748 29.3408 29.3701C29.1357 29.5654 28.8965 29.7217 28.623 29.8389C28.3594 29.9463 28.0762 30 27.7734 30H2.21191C1.90918 30 1.62109 29.9463 1.34766 29.8389C1.08398 29.7217 0.849609 29.5654 0.644531 29.3701C0.449219 29.1748 0.292969 28.9453 0.175781 28.6816C0.0585938 28.418 0 28.1348 0 27.832V2.16797C0 1.86523 0.0585938 1.58203 0.175781 1.31836C0.292969 1.05469 0.449219 0.825195 0.644531 0.629883C0.849609 0.43457 1.08398 0.283203 1.34766 0.175781C1.62109 0.0585938 1.90918 0 2.21191 0H27.7734ZM8.8916 25.3125V11.25H4.43848V25.3125H8.8916ZM6.66504 9.28711C7.0166 9.28711 7.34863 9.22363 7.66113 9.09668C7.9834 8.95996 8.26172 8.77441 8.49609 8.54004C8.73047 8.30566 8.91602 8.03223 9.05273 7.71973C9.18945 7.40723 9.25781 7.07031 9.25781 6.70898C9.25781 6.34766 9.18945 6.01074 9.05273 5.69824C8.91602 5.38574 8.73047 5.1123 8.49609 4.87793C8.26172 4.64355 7.9834 4.46289 7.66113 4.33594C7.34863 4.19922 7.0166 4.13086 6.66504 4.13086C6.31348 4.13086 5.98145 4.19922 5.66895 4.33594C5.35645 4.47266 5.08301 4.6582 4.84863 4.89258C4.61426 5.12695 4.42871 5.40039 4.29199 5.71289C4.15527 6.02539 4.08691 6.35742 4.08691 6.70898C4.08691 7.06055 4.15527 7.39258 4.29199 7.70508C4.42871 8.01758 4.61426 8.29102 4.84863 8.52539C5.08301 8.75977 5.35645 8.94531 5.66895 9.08203C5.98145 9.21875 6.31348 9.28711 6.66504 9.28711ZM25.5615 25.3125V17.71C25.5615 16.7432 25.4932 15.8447 25.3564 15.0146C25.2197 14.1846 24.9561 13.4668 24.5654 12.8613C24.1846 12.2461 23.6475 11.7676 22.9541 11.4258C22.2607 11.0742 21.3525 10.8984 20.2295 10.8984C19.8096 10.8984 19.3896 10.9473 18.9697 11.0449C18.5596 11.1426 18.1689 11.2891 17.7979 11.4844C17.4268 11.6797 17.085 11.9189 16.7725 12.2021C16.4697 12.4854 16.2158 12.8174 16.0107 13.1982H15.9521V11.25H11.6895V25.3125H16.1279V18.4863C16.1279 18.0176 16.1572 17.5635 16.2158 17.124C16.2842 16.6748 16.4111 16.2793 16.5967 15.9375C16.792 15.5957 17.0605 15.3223 17.4023 15.1172C17.7539 14.9121 18.2178 14.8096 18.7939 14.8096C19.3604 14.8096 19.7998 14.9268 20.1123 15.1611C20.4248 15.3955 20.6543 15.6982 20.8008 16.0693C20.9473 16.4307 21.0352 16.8359 21.0645 17.2852C21.0938 17.7344 21.1084 18.1738 21.1084 18.6035V25.3125H25.5615Z" fill="#4E93CE"/>
									</svg>
								</a>
								<a href="<?php the_field('facebook_share','option')?><?php echo urlencode($postlink); ?>&text=<?php the_title(); ?>" style="margin-left: 18px;" target="_blank">
									<svg width="30" height="30" viewBox="0 0 30 30" fill="none" xmlns="http://www.w3.org/2000/svg">
									<path d="M15 0C16.377 0 17.7051 0.180664 18.9844 0.541992C20.2637 0.893555 21.4551 1.39648 22.5586 2.05078C23.6719 2.70508 24.6826 3.49121 25.5908 4.40918C26.5088 5.31738 27.2949 6.32812 27.9492 7.44141C28.6035 8.54492 29.1064 9.73633 29.458 11.0156C29.8193 12.2949 30 13.623 30 15C30 16.2305 29.8535 17.4268 29.5605 18.5889C29.2773 19.7412 28.8672 20.835 28.3301 21.8701C27.8027 22.9053 27.1582 23.8672 26.3965 24.7559C25.6445 25.6348 24.7998 26.4209 23.8623 27.1143C22.9248 27.7979 21.9043 28.374 20.8008 28.8428C19.707 29.3018 18.5547 29.6289 17.3438 29.8242V19.3359H20.8447L21.5039 15H17.3438V12.1875C17.3438 11.6504 17.4316 11.2256 17.6074 10.9131C17.7832 10.6006 18.0176 10.3662 18.3105 10.21C18.6035 10.0439 18.9355 9.94141 19.3066 9.90234C19.6875 9.85352 20.0732 9.8291 20.4639 9.8291C20.6689 9.8291 20.874 9.83398 21.0791 9.84375C21.2842 9.84375 21.4844 9.84375 21.6797 9.84375V6.15234C21.1328 6.05469 20.5762 5.98145 20.0098 5.93262C19.4434 5.88379 18.8818 5.85938 18.3252 5.85938C17.417 5.85938 16.6113 5.99609 15.9082 6.26953C15.2051 6.54297 14.6094 6.93359 14.1211 7.44141C13.6426 7.94922 13.2764 8.56445 13.0225 9.28711C12.7783 10 12.6562 10.8008 12.6562 11.6895V15H8.84766V19.3359H12.6562V29.8242C11.4355 29.6387 10.2783 29.3115 9.18457 28.8428C8.09082 28.374 7.0752 27.7979 6.1377 27.1143C5.2002 26.4209 4.35059 25.6348 3.58887 24.7559C2.83691 23.8672 2.19238 22.9053 1.65527 21.8701C1.12793 20.835 0.717773 19.7412 0.424805 18.5889C0.141602 17.4268 0 16.2305 0 15C0 13.623 0.175781 12.2949 0.527344 11.0156C0.888672 9.73633 1.39648 8.54492 2.05078 7.44141C2.70508 6.32812 3.48633 5.31738 4.39453 4.40918C5.3125 3.49121 6.32324 2.70508 7.42676 2.05078C8.54004 1.39648 9.73633 0.893555 11.0156 0.541992C12.2949 0.180664 13.623 0 15 0Z" fill="#4E93CE"/>
									</svg>
								</a>
								<a href="<?php the_field('twitter_share','option')?><?php echo urlencode($postlink); ?>" style="margin-left: 18px;" target="_blank">
									<svg width="30" height="26" viewBox="0 0 30 26" fill="none" xmlns="http://www.w3.org/2000/svg">
									<path d="M30 3.69824C29.5898 4.31348 29.126 4.88965 28.6084 5.42676C28.0908 5.9541 27.5293 6.4375 26.9238 6.87695C26.9336 7.01367 26.9385 7.15039 26.9385 7.28711C26.9482 7.41406 26.9531 7.5459 26.9531 7.68262C26.9531 8.91309 26.8213 10.1289 26.5576 11.3301C26.2939 12.5312 25.9131 13.6934 25.415 14.8164C24.6924 16.4473 23.7891 17.9072 22.7051 19.1963C21.6211 20.4756 20.3906 21.5596 19.0137 22.4482C17.6465 23.3369 16.1523 24.0156 14.5312 24.4844C12.9102 24.9531 11.2109 25.1875 9.43359 25.1875C7.75391 25.1875 6.11328 24.958 4.51172 24.499C2.91992 24.0303 1.41602 23.3369 0 22.4189C0.478516 22.4775 0.966797 22.5068 1.46484 22.5068C2.86133 22.5068 4.20898 22.2822 5.50781 21.833C6.81641 21.3838 8.01758 20.7295 9.11133 19.8701C8.45703 19.8604 7.82715 19.7529 7.22168 19.5479C6.61621 19.333 6.05957 19.04 5.55176 18.6689C5.05371 18.2881 4.61426 17.8389 4.2334 17.3213C3.8623 16.8037 3.57422 16.2324 3.36914 15.6074C3.56445 15.6367 3.75488 15.6611 3.94043 15.6807C4.13574 15.7002 4.33105 15.71 4.52637 15.71C5.07324 15.71 5.61035 15.6367 6.1377 15.4902C5.41504 15.3438 4.75098 15.085 4.14551 14.7139C3.5498 14.3428 3.03223 13.8936 2.59277 13.3662C2.15332 12.8291 1.81152 12.2285 1.56738 11.5645C1.32324 10.8906 1.20117 10.1875 1.20117 9.45508V9.38184C2.06055 9.87012 2.99316 10.1289 3.99902 10.1582C3.56934 9.86523 3.18359 9.5332 2.8418 9.16211C2.50977 8.78125 2.22656 8.37109 1.99219 7.93164C1.75781 7.49219 1.57715 7.02832 1.4502 6.54004C1.32324 6.05176 1.25977 5.54883 1.25977 5.03125C1.25977 4.48438 1.32812 3.95215 1.46484 3.43457C1.60156 2.90723 1.81152 2.40918 2.09473 1.94043C2.87598 2.90723 3.74512 3.77637 4.70215 4.54785C5.65918 5.30957 6.6748 5.96387 7.74902 6.51074C8.83301 7.05762 9.96582 7.49219 11.1475 7.81445C12.3291 8.12695 13.54 8.3125 14.7803 8.37109C14.7217 8.14648 14.6777 7.91699 14.6484 7.68262C14.6289 7.43848 14.6191 7.19922 14.6191 6.96484C14.6191 6.11523 14.7803 5.31934 15.1025 4.57715C15.4248 3.8252 15.8643 3.1709 16.4209 2.61426C16.9775 2.05762 17.627 1.61816 18.3691 1.2959C19.1211 0.973633 19.9219 0.8125 20.7715 0.8125C21.6309 0.8125 22.4463 0.983398 23.2178 1.3252C23.999 1.65723 24.6826 2.13574 25.2686 2.76074C25.9619 2.62402 26.6309 2.43359 27.2754 2.18945C27.9297 1.93555 28.5596 1.62793 29.165 1.2666C28.9404 1.97949 28.5938 2.62891 28.125 3.21484C27.666 3.80078 27.1143 4.28418 26.4697 4.66504C27.7002 4.51855 28.877 4.19629 30 3.69824Z" fill="#4E93CE"/>
									</svg>
								</a>
								
							</div>
						</div>
						</div>
						</div>
					</div>
				<?php endwhile; ?>
				<div style="padding: 15px 0px;">
					<?php
					the_posts_pagination( array(
						'mid_size'  => 1,
						'prev_text' => __( 'Prev', 'textdomain' ),
						'next_text' => __( 'Next', 'textdomain' ),
					) );
					?>
				</div>			
							<?php endif; ?> 
				
							<?php wp_reset_postdata(); ?>
				
			</div>
		</section>
<?php get_footer(); ?>			