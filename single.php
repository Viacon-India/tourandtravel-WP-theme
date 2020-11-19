<?php
/**
 * The template for displaying all single posts
 *
 * @link https://developer.wordpress.org/themes/travel/template-hierarchy/#single-post
 *
 * @package WordPress
 * @subpackage Twenty_Seventeen
 * @since 1.0
 * @version 1.0
 */

get_header(); ?>
<?php
/* Start the Loop */
while (have_posts()) : the_post(); ?>
	<?php //$featured_image = get_the_post_thumbnail_url(); ?>
	<div class="hero w-100 text-center">
		<!-- <img data-aod="fade-in" class="w-100" src="<?php //echo $featured_image; ?>" alt="" /> -->
		
		<?php $thumb_id = get_post_thumbnail_id();
        $thumb_url = wp_get_attachment_image_src($thumb_id,'thumbnail-size', true);
        $attachmentid = get_post_thumbnail_id(get_the_ID());
        $featured_image = wp_get_attachment_url( $attachmentid , 'full' );
        $image_alt = get_post_meta( $attachmentid, '_wp_attachment_image_alt', true);
        //$featured_image = $thumb_url[0];
        if(empty($featured_image)) {
    		$featured_image= get_template_directory_uri().'/images/default-image.jpg';
    	} ?>
		<img data-aod="fade-in" class="w-100" src="<?php echo $featured_image; ?>" alt="<?php echo $image_alt; ?>" />
		
		<div data-aos="fade-up" class="text-container mt-3">
			<h1 class="text-capitalize"><?php the_title(); ?></h1>
			<p><i class="fa fa-user"></i> <?php the_author_posts_link(); ?> | <i class="fa fa-calendar"></i> <?php echo get_the_date('F j, Y'); ?> | <i class="fa fa-object-ungroup"></i>
				<?php $category_detail = get_the_category(get_the_ID());
				$i = 1;
				foreach ($category_detail as $cd) {
					if ($i > 1) {
						echo ', ';
					}
					echo '<a href="' . get_category_link($cd->cat_ID) . '">' . $cd->cat_name . '</a>';
					$i++;
				} ?></p>
		</div>
	</div>
	<div class="main container-fluid p-4">
		<div class="row">
			<div class="col-md-9">
				<div class="">
					<div class="card-text"><?php the_content(); ?></div><br />
				</div>
				<?php subh_set_post_view(get_the_ID()); ?>
				<div class="container-fluid p-4 tags">
					<div class="container">
						<?php $tags = get_the_tags(get_the_ID());
						$html = '<div class="post_tags"> <span class="tags-title">Tags</span> ';
						$c = 1;
						foreach ( $tags as $tag ) {
							$tag_link = get_tag_link( $tag->term_id );
							if($c >1) { $html .= " , "; }		
							$html .= "<a href='{$tag_link}' title='{$tag->name} Tag' class='{$tag->slug}'>";
							$html .= "{$tag->name}</a>";							
						$c++; }
						$html .= '</div>';
						echo $html; ?>
					</div>
				</div>
				<div class="container-fluid p-4 author-info">
				    <?php $author_id = get_the_author_ID(); ?>
					<div class="container row">
						<img src="<?php echo esc_url(get_avatar_url($author_id)); ?>" class="col-2 author-gravtar" alt="<?php the_author(); ?>" />
						<div class="col-10">
						    <?php //$author_id = get_the_author_meta('ID'); ?>
    						<a class="author-title" href="<?php echo get_author_posts_url($author_id, get_the_author_meta('user_nicename')); ?>"><?php the_author(); ?></a>
    						<p><?php the_author_meta('description', $author_id); ?></p>
						</div>
					</div>
					<div class="clearfix"></div>
				</div>
			</div>
			<div class="col-md-3 sidebar-section"><?php dynamic_sidebar('single_page_sidebar'); ?></div>
		</div>
	</div>	
	<div class="container-fluid p-4">
		<!-- Related posts -->
		<div class="related-entries">
			<div class="block">
				<?php $cats = get_the_category(get_the_ID());
				if ($cats) {
					echo '<h3>Related Posts</h3>';
					$first_cat = $cats[0]->term_id;
					$args = array('category__in' => array($first_cat), 'post__not_in' => array(get_the_ID()), 'posts_per_page' => 2, 'caller_get_posts' => 1);
					$my_query = new WP_Query($args);
					if ($my_query->have_posts()) { ?>												
						<div class="row">
							<?php while ($my_query->have_posts()) : $my_query->the_post(); ?>
							<?php
							$attachmentid = get_post_thumbnail_id(get_the_ID());
                            $featured_image = wp_get_attachment_url( $attachmentid , 'full' );
                            $image_alt = get_post_meta( $attachmentid, '_wp_attachment_image_alt', true);
                            //$featured_image = get_the_post_thumbnail_url(); ?>
								<div class="col-md-6">
									<div class="card2">
										<?php if(empty($featured_image)) {
                        					$featured_image= get_template_directory_uri().'/images/default-image.jpg'; ?>
                        					<img class="w-100 card-img-top" src="<?php echo $featured_image; ?>" alt="<?php echo $image_alt; ?>" />
                        				<?php } else { ?>
                    					    <?php the_post_thumbnail('thumbnail-size', array( 'class' => 'w-100 card-img-top' )); ?>
                    					<?php } ?>
										<a href="<?php the_permalink() ?>" rel="bookmark" title="Permanent Link to <?php the_title_attribute(); ?>"><?php the_title(); ?></a>
									</div>
								</div>
							<?php
						endwhile; ?>
						</div>
					<?php }
				wp_reset_query();
			} ?>
			</div>
		</div>
	</div>
	<div class="container-fluid p-4">
		<div class="row">
			<div class="col-md-12">
				<?php if ( comments_open() || get_comments_number() ) :
					comments_template();
				endif; ?>
			</div>
		</div>
	</div>

<?php endwhile; ?>

<?php
get_footer();
