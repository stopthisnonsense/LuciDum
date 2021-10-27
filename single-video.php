<?php
get_header(); 
?>
<?php while (have_posts()) : the_post(); ?>
<?php $postlink = (empty(get_field('external_read_more_link')) ? get_permalink() : get_field('external_read_more_link'))?>
		<section class="section section-title">
			<div class="container">
				<a style="margin-top: 90px;margin-right: 21px;display: flex;align-items: center;" href="/videos"><svg width="20" height="20" viewBox="0 0 20 20" fill="none" xmlns="http://www.w3.org/2000/svg">
<path d="M20 8.75H4.7875L11.775 1.7625L10 0L0 10L10 20L11.7625 18.2375L4.7875 11.25H20V8.75Z" fill="#45969B"/>
</svg> &nbsp &nbsp  Back to Videos
</a>
			</div>
		</section>
		<section class="section">
			<div class="container">
				<h5 style="padding-top: 64px;font-size:32px;"><?php the_title(); ?>
</h5>
			</div>
		</section>
		<section class="section">
			<div class="container">
				<div style="height: 30px;width: 45%;display: flex;justify-content: space-between;flex-wrap: wrap;margin-top: 24px;">
					<div style="display: flex;width: 30%;align-items: center;height: 30px;">
						<img style="width: 30px;height: 30px;margin-right: 12px;" src="/wp-content/uploads/2021/01/Vector.png" ><?php echo get_the_date(); ?>
					</div>
					<div style="display: flex;width: 30%;align-items: center;">
						<img style="width: 30px;height: 30px;margin-right: 12px;" src="/wp-content/uploads/2020/10/cropped-LUCIDUM_Bug_w-whitespace-01.png" >
						<span><?php the_author(); ?></span>
					</div>
					<div style="display: flex;width: 30%;align-items: center;">
						<a href="<?php the_field('linkedin_share','option')?><?php echo urlencode($postlink); ?>&title=<?php the_title(); ?>"><img style="width: 30px;height: 30px;margin-right: 12px;" src="/wp-content/uploads/2021/01/LinkedInLogo.png" ></a>
						<a href="<?php the_field('facebook_share','option')?><?php echo urlencode($postlink); ?>&text=<?php the_title(); ?>"><img style="width: 30px;height: 30px;margin-right: 12px;" src="/wp-content/uploads/2021/01/FacebookLogo.png" ></a>
						<a href="<?php the_field('twitter_share','option')?><?php echo urlencode($postlink); ?>&text=<?php the_title(); ?>"><img style="width: 30px;height: 30px;" src="/wp-content/uploads/2021/01/TwitterLogo.png" > </a>
					</div>
				</div>
			</div>
		</section>
		<section class="section">
			<div class="container">
				<div style="padding-top: 15px;
							width: 50%;
							order: 1;">
					<?php echo do_shortcode( "[evp_embed_video poster='" . get_field('video_poster') . "' url='" . get_field("video_link") . "' width='100%']" ); ?>
				</div>
				<div class="particulars-text" style="padding-top: 48px;padding-bottom: 64px;">
					<?php the_content(); ?> 
				</div>
			</div>
		</section>
		<?php endwhile; ?> 

<?php get_footer(); ?>

