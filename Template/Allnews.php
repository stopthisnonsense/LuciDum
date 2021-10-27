<?php
/*
 Template Name: Allnews Template
 */

get_header(); ?>

    <section class="mini-banner">
        <div class="container">
            <div class="page-title">
                <h2>News</h2>
                <div class="breadcrumbs">
                    <ul>
                        <li><a href="<?php echo esc_url(home_url()); ?>">HOME</a><span class="farward-arrow">/</span></li>
						<li><a>Resources</a><span class="farward-arrow">/</span></li>
						<li><a>News</a><span class="farward-arrow">/</span></li>
                        <li><?php the_title(); ?></li>
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
                        <?php $url = site_url('/all-news/'); ?>
                        <a href="<?php echo $url; ?>">All</a>
                    </li>
                    <li>
                        <?php $url = site_url('/our-news/'); ?>
                        <a href="<?php echo $url; ?>">News</a>
                    </li>
					<li>
                        <?php $url = site_url('/press/'); ?>
                        <a href="<?php echo $url; ?>">Press Release</a>
                    </li>
<!--                     <?php $termchildren = get_terms('News_category');?>
                    <?php foreach($termchildren as $category) { 
                    $term_link = get_term_link( $category );
                               ?>
                    <li>
                    <a href="<?php echo $term_link; ?>"><?php echo $category->name; ?></a>
                    </li>
                <?php } ?> -->
                </ul>
            </div>
            <div class="flex">
                <?php global $wp_query ;
                 $paged = (get_query_var('paged')) ? get_query_var('paged') : 1; 
                    $args = array('post_type' => 'news','posts_per_page' => 3, 'order' => 'ASC', 'paged' => $paged);
                    $wp_query = new WP_Query($args) ; // overriding default global of WordPress
                ?> 
                <?php if(have_posts()) : ?>
                       <?php while (have_posts()) : the_post(); ?>
                 <div class="blog">
<!--                     <div class="blog-image">
                        <?php the_post_thumbnail('medium'); ?>
                    </div> -->
                    <div class="blog-detail">
						<span class="cus-date"><?php echo get_the_date(); ?></span>
                        <h4><?php the_title();?></h4>
                        <?php the_excerpt(); ?> 
						<a target="_blank" href="<?php empty(get_field('external_read_more_link')) ? the_permalink() : the_field('external_read_more_link')?>">Read More <img src="<?php echo get_template_directory_uri()?>/assets/images/right.png" alt="arrow-icon"></a>
                    </div>
                </div>
                <?php endwhile; ?>  
				<?php endif; ?> 
                    <?php wp_reset_query(); 
                    ?> 
				<?php global $wp_query ;
                 $paged = (get_query_var('paged')) ? get_query_var('paged') : 1; 
                    $args = array('post_type' => 'press_release','posts_per_page' => 1, 'order' => 'ASC', 'paged' => $paged);
                    $wp_query = new WP_Query($args) ; // overriding default global of WordPress
                ?> 
                <?php if(have_posts()) : ?>
                       <?php while (have_posts()) : the_post(); ?>
                <div class="blog">

<!--                     <div class="blog-image">

						<?php $backgroundImg = wp_get_attachment_image_src( get_post_thumbnail_id($post->ID), 'full' );?>
						
						<img src="<?php echo $backgroundImg[0]; ?>" alt="" />
                </div> -->
					<div class="blog-detail">
						<span class="cus-date"><?php echo get_the_date(); ?></span>
                        <h4><?php the_title();?></h4>
                        <?php the_excerpt(); ?> 
						<a target="_blank" href="<?php empty(get_field('external_read_more_link')) ? the_permalink() : the_field('external_read_more_link')?>">Read More <img src="<?php echo get_template_directory_uri()?>/assets/images/right.png" alt="arrow-icon"></a>
                    </div>
                </div>
                <?php endwhile; ?>    
                    <?php endif; ?> 
                    <?php wp_reset_query(); 
                    ?>
            </div>
        </div>
    </section>

<!--       <section class="blog-gallery video-gellery">
        <div class="container">
            <div class="flex">
                <?php global $wp_query ;
                 $paged = (get_query_var('paged')) ? get_query_var('paged') : 1; 
                    $args = array('post_type' => 'press_release','posts_per_page' => 1, 'order' => 'ASC', 'paged' => $paged);
                    $wp_query = new WP_Query($args) ; // overriding default global of WordPress
                ?> 
                <?php if(have_posts()) : ?>
                       <?php while (have_posts()) : the_post(); ?>
                <div class="blog">


					<div class="blog-detail">
						<span class="cus-date"><?php echo get_the_date(); ?></span>
                        <h4><?php the_title();?></h4>
                        <?php the_excerpt(); ?> 
						<a href="<?php the_permalink(); ?>">Read More <img src="<?php echo get_template_directory_uri()?>/assets/images/right.png" alt="arrow-icon"></a>
                    </div>
                </div>
                <?php endwhile; ?>    
                    <?php endif; ?> 
                    <?php wp_reset_query(); 
                    ?>
            </div>
            
        </div> 
    </section>  -->


<?php get_footer(); ?>
