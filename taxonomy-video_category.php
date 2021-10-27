<?php
/*
 Template Name: Video archive Template
 */

get_header(); ?>

    <section class="mini-banner">
        <div class="container">
            <div class="page-title">
                <h2>Videos</h2>
                <div class="breadcrumbs">
                    <ul>
                        <li><a href="<?php echo esc_url(home_url()); ?>">HOME</a><span class="farward-arrow">/</span></li>
						<li><a>insights</a><span class="farward-arrow">/</span></li>
                        <li>Videos</li>
                    </ul>
                </div>
            </div>
        </div>
    </section>
       <section class="blog-gallery video-gellery">
        <div class="container">
			<div class="cat-blog">
                <ul>
                    <li>
                        <?php $url = site_url('/videos/'); ?>
                        <a href="<?php echo $url; ?>">All</a>
                    </li>
                    <?php $termchildren = get_terms('video_category');?>
                    <?php foreach($termchildren as $category) { 
                    $term_link = get_term_link( $category );
                               ?>
                    <li class="active">
                    <a href="<?php echo $term_link; ?>"><?php echo $category->name; ?></a>
                    </li>
                <?php } ?>
                </ul>
            </div>
            <div class="flex"> 
                <?php if(have_posts()) : ?>
                       <?php while (have_posts()) : the_post(); ?>
                <div class="blog">
					<?php $backgroundImg = wp_get_attachment_image_src( get_post_thumbnail_id($post->ID), 'full' );?>
<!-- 					style="background-image: url(<?php echo $backgroundImg[0]; ?>);" -->
                    <div class="blog-image">
						<?php the_post_thumbnail('medium'); ?>
                    <a class="video-overlay"data-fancybox="" href="<?php the_field('video_link'); ?>"><img src="http://wp.jaidenshannon.com/lucidum/wp-content/uploads/2020/09/Group-920.png" alt="" /></a>
                </div>
					<div class="blog-detail">
                        <h4><?php the_title();?></h4>
                        <?php the_excerpt(); ?> 
                    </div>
                </div>
                <?php endwhile; ?>    
                    
            </div>
<!--             <div class="blog-pagination">
                <div class="blog-pagination-content">
                                <?php wpbeginner_numeric_posts_nav(); ?>
                </div>
            </div> -->
            <?php endif; ?> 
                    <?php wp_reset_postdata();  // Don't forget to add this
                    ?>
        </div>
    </section>


<?php get_footer(); ?>
