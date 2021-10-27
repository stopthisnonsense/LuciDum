<?php
/*
 Template Name: News archive Template
 */

get_header(); ?>

    <section class="mini-banner">
        <div class="container">
            <div class="page-title">
                <h2><?php the_title(); ?></h2>
                <div class="breadcrumbs">
                    <ul>
                        <li><a href="<?php echo esc_url(home_url()); ?>">HOME</a><span class="farward-arrow">/</span></li>
						<li><a>insights</a><span class="farward-arrow">/</span></li>
                        <li>News</li>
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
                        <?php $url = site_url('/our-news/'); ?>
                        <a href="<?php echo $url; ?>">All</a>
                    </li>
                    <?php $termchildren = get_terms('News_category');?>
                    <?php foreach($termchildren as $category) { 
                    $term_link = get_term_link( $category );
                               ?>
                    <li>
                    <a href="<?php echo $term_link; ?>"><?php echo $category->name; ?></a>
                    </li>
                <?php } ?>
                </ul>
            </div>
            <div class="flex"> 
                <?php if(have_posts()) : ?>
                       <?php while (have_posts()) : the_post(); ?>
                <div class="blog">
                    <div class="blog-image">
                        <?php the_post_thumbnail('medium'); ?>
                    </div>
                    <div class="blog-detail">
						<span class="cus-date"><?php echo get_the_date(); ?></span>
                        <h4><?php the_title();?></h4>
                        <?php the_excerpt(); ?> 
                        <a href="<?php the_permalink(); ?>">Read More <img src="<?php echo get_template_directory_uri()?>/assets/images/right.png" alt="arrow-icon"></a>
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
