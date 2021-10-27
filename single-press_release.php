<?php
get_header(); 
?>
<?php while (have_posts()) : the_post(); ?>
    <section class="mini-banner">
        <div class="container">
            <div class="page-title press-detail">
                <h2><?php the_title(); ?></h2>
<!--                 <div class="breadcrumbs">
                    <ul>
                        <li><a href="<?php echo esc_url(home_url()); ?>">HOME</a><span class="farward-arrow">/</span></li>
                        <li><?php the_title(); ?></li>
                    </ul>
                </div> -->
            </div>
        </div>
    </section>

    <section class="blog-gallery details">
        <div class="container">
            <div class="flex">
                <div class="col-60">
                    <div class="blog-detail">
<!--                         <div class="blog-image">
                            <?php the_post_thumbnail('large'); ?>
                        </div> -->
                        <div class="flex blog-info">
                            <div class="flex blog-times">
                                <div class="flex blog-time">
                                    <img src="<?php echo get_template_directory_uri()?>/assets/images/calender.png" alt="icon">
                                    <span><?php echo get_the_date(); ?></span>
                                </div>
                                <div class="flex blog-writer">
                                    <?php $avatar = get_avatar(get_the_author_meta('ID')) ?>
                            <?php echo $avatar; ?>
                                    <span><?php the_author(); ?></span>
                                </div>
                            </div>
                            <div class="flex share-post">
                                <span>Share:</span>
                                <div class="share-media">
                                   <a href="http://www.facebook.com/sharer.php?u=<?php the_permalink(); ?>&text=<?php the_title(); ?>"><i class="fa fa-facebook"></i></a>
                                    <a href="http://twitter.com/share?url=<?php the_permalink(); ?>&text=<?php the_title(); ?>"><i class="fa fa-twitter"></i></a>
                                    <a href="https://www.linkedin.com/cws/share?url=<?php the_permalink(); ?>&text=<?php the_title(); ?>"><i class="fa fa-linkedin"></i></a>
                                </div>
                            </div>
                        </div>
                        <div class="about-blog">
                            <h2><?php the_title(); ?></h2>
                            <?php the_content(); ?>
                        </div>
                        <div class="blog-switches flex">
                            <?php previous_post_link( '%link', 'Previous', true ); ?>
                        <?php next_post_link( '%link', 'Next', true ); ?>
                        </div>
                    </div>
                </div>
                <?php endwhile; ?> 
<!--                 <div class="col-40">
                    <div class="related-posts">
                        <h2>Related Posts</h2>
                        <?php global $wp_query ;
                    $args = array('post_type' => 'news','posts_per_page' => 5, 'order' => 'DESC' , 'post__not_in' => array( $post->ID ));
                    $wp_query = new WP_Query($args) ; // overriding default global of WordPress
                        ?> 
                        <?php if(have_posts()) : ?>
                               <?php while (have_posts()) : the_post(); ?>
                        <div class="flex">
                            <div class="rel-bg">
                                <?php the_post_thumbnail(); ?>
                            </div>
                            <div class="rel-post">
                                <h5><?php the_title(); ?></h5>
                                <div class="blog-detail">
                                    <a href="<?php the_permalink() ?>">Read More <img src="<?php echo get_template_directory_uri()?>/assets/images/right.png" alt=""></a>
                                </div>
                            </div>
                        </div>
                        <?php endwhile; ?>    
	                    <?php endif; ?> 
	                    <?php wp_reset_query();
	                    ?>
                    </div>
                </div> -->
            </div>
        </div>
    </section>
    

<?php get_footer(); ?>

