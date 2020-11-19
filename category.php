<?php
get_header(); ?>

	<div class="container-fluid header-gap">
		<div class="row">
			<div class="col-md-9" style="padding-left: 35px;">				
				<?php if ( have_posts() ) : ?>		
						<div class="row">
							<div class="col-md-12">
								<header class="page-header">
									<?php
									    $category = get_queried_object();
                                        $term_id = $category->term_id;
                                        if (function_exists('get_wp_term_image'))
                                        {
                                            $meta_image = get_wp_term_image($term_id);
                                            if(empty($meta_image)) {
                                                $meta_image = get_template_directory_uri().'/images/default-image.jpg';
                                            } ?>
                                                 <!--<img src="<?php //echo $meta_image; ?>" class="category-image" alt=""> -->
                                        <?php } ?>
                                        <div class="taxonomy-details" style="background: linear-gradient(rgba(255, 255, 255, 0.7), rgba(255, 255, 255, 0.5)),url(<?php echo $meta_image; ?>);">
                                            <?php the_archive_title( '<h1 class="page-title">', '</h1>' );
        									the_archive_description( '<div class="taxonomy-description">', '</div>' ); ?>
                                        </div>
                                        
										
								</header>
							</div>
						</div>
						<div class="row">
							<div class="col-md-12">
								<h2 class="text-center">Latest Posts</h2>
								<div class="card-deck">							
									<?php while ( have_posts() ) : the_post();
										get_template_part( 'template-parts/content', 'loop');
									endwhile; ?>
								</div>
								<div class="clearfix"></div>
								<div class="row">
									<div class="cat-pagi">
									<?php the_posts_pagination( array(
										'prev_text'          => __( '<< Previous', 'travel' ),
										'next_text'          => __( 'Next >>', 'impackd' ),
										'before_page_number' => '<span class="meta-nav screen-reader-text">' . __( '', 'travel' ) . ' </span>',
									) ); ?>
									</div>
								</div>
							</div>
						</div>	
						<div class="popular-post-section row">
							<div class="col-md-12">
								<!---- popular posts ----->
								<h2 class="listing-post-title text-center">Popular Posts</h2>
								<div class="card-deck">							
									<?php $category = get_the_category(); 
									$cat_id = $category[0]->cat_ID;
									$popular = new WP_Query(array( 
												'cat' => $cat_id,
												'post_type' => 'post',
												'posts_per_page'=> 3,
												'orderby' => 'meta_value',
												'meta_key' => 'post_views_count',
												'order' => 'DESC'
									));
									while ($popular->have_posts()) : $popular->the_post(); ?>
    									<?php get_template_part( 'template-parts/content', 'loop'); ?>
    								<?php endwhile; wp_reset_postdata();
    								?>
								</div>
							</div>
						</div>
		
						<!----- Popular posts end -------->
						<?php
				else :
					?>
					    <h1 class="page-title"><?php _e( 'Nothing Found', 'travel' ); ?></h1>
						<div><?php _e( 'Sorry, but nothing found.', 'travel' ); ?></div>
					<?php

				endif;
				?>
			</div>
			<div class="col-md-3 sidebar-section"><?php dynamic_sidebar('category_sidebar'); ?></div>
		</div>
	</div>
	
	
<?php get_footer(); ?>