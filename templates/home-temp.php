<?php /* Template Name: Home */
get_header(); ?>


<div class="hero w-100 text-center">
	<!--<img data-aod="fade-in" class="w-100" src="https://tourandtravelblog.com/public_html/tourandtravelblog/wp-content/uploads/2019/06/tourandtrave.jpg" alt="" />-->
	<video loop="loop" width="100%" height="100%" preload autoplay muted style="object-fit:cover">
      <source src="https://tourandtravelblog.com/wp-content/uploads/2019/06/hero.mp4" type="video/mp4">
      Your browser does not support the video tag.
    </video>
    <h1 class="hero-intro"><?php echo get_post_meta(get_the_ID(), 'banner_heading', true); ?></h1>
	<div data-aos="fade-up" class="text-container mt-3">
		<a href="#subscription-form" id="subscription-btn" class="btn-round pulse" rel="modal:open">Subscribe</a>
	</div>
	<div id="subscription-form" class="modal">
		<h4>Subscribe to Our Newsletter</h4>
		<?php echo do_shortcode('[email-subscribers-form id="1"]'); ?>
		<a href="#" style="float: right;" rel="modal:close">Close</a>
	</div>
</div>
<div class="main container-fluid p-4">
	<!--<section class="post-list-group">
		<h3 class="mt-2 p-1 text-center">Top Stories</h3>
		<div class="card-deck">

			<?php /*$args    = array(
				'numberposts' => 4, 'orderby' => 'meta_value', 'meta_key' => 'post_views_count', 'order' => 'DESC', 'post_type' => 'post', 'post_status' => 'publish'
			);
			$myposts = get_posts($args);
			foreach ($myposts as $post) : setup_postdata($post); ?>
			    <?php $featured_image = get_the_post_thumbnail_url(); ?>
				<div class="card text-center">
					<?php if(empty($featured_image)) {
    					$featured_image= get_template_directory_uri().'/images/default-image.jpg'; ?>
    					<img class="w-100 card-img-top" src="<?php echo $featured_image; ?>" alt="<?php the_title(); ?>" />
    				<?php } else { ?>
					    <?php the_post_thumbnail('homepage-thumb-size', array( 'class' => 'w-100 card-img-top' )); ?>
					<?php } ?>
					<div class="card-body">
						<h5 class="card-title mt-1"><?php the_title(); ?></h5>
						<div class="card-text">
							<p><?php $ltr_to_show = 120;
								$content_strlngth = strlen(get_the_content());
								$content = strip_tags(get_the_content());
										echo substr($content, 0, $ltr_to_show); ?>
								<?php if($content_strlngth > $ltr_to_show) { echo '...'; } ?>
							</p>
						</div>
						<a href="<?php echo get_the_permalink(); ?>" class="card-link text-uppercase">Read more</a><br />
					</div>
				</div>
			<?php endforeach;
		wp_reset_postdata(); */ ?>


		</div>
		<div class="more text-center">
			<a href="<?php //echo get_the_permalink(1441); ?>" class="card-link text-uppercase">View more</a>
		</div>
	</section> -->
	
	
	<!----- Testing top stories----->
	<section class="post-list-group top-posts">
    	<div class="related-entries">
    		<div class="block">
    		    <h3 class="text-center aos-init aos-animate">Top Stories</h3>
    		<?php $args    = array(
            		'numberposts' => 4, 'orderby' => 'meta_value', 'meta_key' => 'post_views_count', 'order' => 'DESC', 'post_type' => 'post', 'post_status' => 'publish'
            	);
            	$myposts = get_posts($args); ?>												
    			<div class="row">
    				<?php foreach ($myposts as $post) : setup_postdata($post); ?>
    				<?php
    				$attachmentid = get_post_thumbnail_id(get_the_ID());
                    //$featured_image = wp_get_attachment_url( $attachmentid , 'full' );
                    $image_alt = get_post_meta( $attachmentid, '_wp_attachment_image_alt', true);
                    //$featured_image = get_the_post_thumbnail_url(); ?>
    					<div class="col-md-6">
    						<div class="card3">
    							<?php if(empty($attachmentid)) {
                					$featured_image= get_template_directory_uri().'/images/default-image.jpg'; ?>
                					<img class="w-100 card-img-top" src="<?php echo $featured_image; ?>" alt="<?php echo $image_alt; ?>" />
                				<?php } else { ?>
            					    <?php the_post_thumbnail('long-width-card', array( 'class' => 'w-100 card-img-top wp-post-image' )); ?>
            					<?php } ?>
            					<?php $author_id=$post->post_author; ?>
            					<span>
                					<a class="author-image" href="<?php echo get_author_posts_url( $author_id ); ?>" rel="bookmark" title="Author Image">
                					    <?php print_r( get_simple_local_avatar( $author_id)); ?>
                					</a>
        							<a class="top-post-title" href="<?php the_permalink() ?>" rel="bookmark" title="Permanent Link to <?php echo get_the_permalink(); ?>"><?php the_title(); ?></a>
        						</span>
    						</div>
    					</div>
    				<?php endforeach;
                    wp_reset_postdata(); ?>
    			</div>
    		</div>
    	</div>
	</section>
	
	<!----------- Adventure posts ----------->
	<?php $adventure_cat = 5;
	$adventure_array = get_posts(array('post_type' => 'post', 'posts_per_page' => 4, 'orderby' => 'DESC', 'category' => $adventure_cat));
	if(is_array($adventure_array) && count($adventure_array>0)) { ?>
	<section class="post-list-group">
		<h3 data-aos="fade-in" data-aos-duration="700" class="text-center">Adventure</h3>
		<div class="card-deck">
			
			<?php foreach ($adventure_array as $post) : setup_postdata($post); ?>
				<?php $attachmentid = get_post_thumbnail_id(get_the_ID());
                    $featured_image = wp_get_attachment_url( $attachmentid , 'full' );
                    $image_alt = get_post_meta( $attachmentid, '_wp_attachment_image_alt', true);
                    //$featured_image = get_the_post_thumbnail_url(); ?>
				<div data-aos="zoom-in-up" data-aos-duration="700" class="card text-center">
					<?php if(empty($featured_image)) {
    					$featured_image= get_template_directory_uri().'/images/default-image.jpg'; ?>
    					<img class="w-100 card-img-top" src="<?php echo $featured_image; ?>" alt="<?php echo $image_alt; ?>" />
    				<?php } else { ?>
					    <?php the_post_thumbnail('homepage-thumb-size', array( 'class' => 'w-100 card-img-top' )); ?>
					<?php } ?>
					<div class="card-body">
						<h5 class="card-title mt-1"><?php the_title(); ?></h5>
						<div class="card-text">
							<p><?php $ltr_to_show = 120;
								$content_strlngth = strlen(get_the_content());
								$content = strip_tags(get_the_content());
										echo substr($content, 0, $ltr_to_show); ?>
								<?php if($content_strlngth > $ltr_to_show) { echo '...'; } ?>
							</p>
						</div>
						<a href="<?php echo get_the_permalink(); ?>" class="card-link text-uppercase">Read more</a><br />
					</div>
				</div>

			<?php endforeach;
		wp_reset_postdata(); ?>

		</div>
		<div class="more text-center">
			<a href="<?php echo get_category_link($adventure_cat); ?>" class="card-link text-uppercase">View more</a>
		</div>
	</section>
	<?php } ?>



	<!----------- Destination posts ----------->
	<?php $destination_cat = 38;
	$destination_array = get_posts(array('post_type' => 'post', 'posts_per_page' => 4, 'orderby' => 'DESC', 'category' => $destination_cat));
	    if(is_array($destination_array) && count($destination_array>0)) { ?>
			
		<section class="post-list-group">
		    <h3 data-aos="fade-in" data-aos-duration="700" class="text-center">Destination</h3>
		    <div class="card-deck">
			
    			<?php foreach ($destination_array as $post) : setup_postdata($post); ?>
    				<?php $attachmentid = get_post_thumbnail_id(get_the_ID());
                    $featured_image = wp_get_attachment_url( $attachmentid , 'full' );
                    $image_alt = get_post_meta( $attachmentid, '_wp_attachment_image_alt', true);
                    //$featured_image = get_the_post_thumbnail_url(); ?>
    				<div data-aos="zoom-in-up" data-aos-duration="700" class="card text-center">
    					<?php if(empty($featured_image)) {
        					$featured_image= get_template_directory_uri().'/images/default-image.jpg'; ?>
        					<img class="w-100 card-img-top" src="<?php echo $featured_image; ?>" alt="<?php echo $image_alt; ?>" />
        				<?php } else { ?>
    					    <?php the_post_thumbnail('homepage-thumb-size', array( 'class' => 'w-100 card-img-top' )); ?>
    					<?php } ?>
    					<div class="card-body">
    						<h5 class="card-title mt-1"><?php the_title(); ?></h5>
    						<div class="card-text">
    							<p><?php $ltr_to_show = 120;
    								$content_strlngth = strlen(get_the_content());
    								$content = strip_tags(get_the_content());
    										echo substr($content, 0, $ltr_to_show); ?>
    								<?php if($content_strlngth > $ltr_to_show) { echo '...'; } ?>
    							</p>
    						</div>
    						<a href="<?php echo get_the_permalink(); ?>" class="card-link text-uppercase">Read more</a><br />
    					</div>
    				</div>
    
    			<?php endforeach;
		wp_reset_postdata(); ?>

		</div>

		<div class="more text-center">
			<a href="<?php echo get_category_link($destination_cat); ?>" class="card-link text-uppercase">View more</a>
		</div>
	</section>
	<?php } ?>

	<!----------- Travel Guides posts ----------->
	<?php $travel_guide_cat = 20;
	$travel_guide_array = get_posts(array('post_type' => 'post', 'posts_per_page' => 4, 'orderby' => 'DESC', 'category' => $travel_guide_cat));
	if(is_array($travel_guide_array) && count($travel_guide_array>0)) { ?>
	<section class="post-list-group">
		<h3 data-aos="fade-in" data-aos-duration="700" class="text-center">Travel Guides</h3>
		<div class="card-deck">
			
			<?php foreach ($travel_guide_array as $post) : setup_postdata($post); ?>
				<?php $attachmentid = get_post_thumbnail_id(get_the_ID());
                    $featured_image = wp_get_attachment_url( $attachmentid , 'full' );
                    $image_alt = get_post_meta( $attachmentid, '_wp_attachment_image_alt', true);
                    //$featured_image = get_the_post_thumbnail_url(); ?>
				<div data-aos="zoom-in-up" data-aos-duration="700" class="card text-center">
					<?php if(empty($featured_image)) {
    					$featured_image= get_template_directory_uri().'/images/default-image.jpg'; ?>
    					<img class="w-100 card-img-top" src="<?php echo $featured_image; ?>" alt="<?php echo $image_alt; ?>" />
    				<?php } else { ?>
					    <?php the_post_thumbnail('homepage-thumb-size', array( 'class' => 'w-100 card-img-top' )); ?>
					<?php } ?>
					<div class="card-body">
						<h5 class="card-title mt-1"><?php the_title(); ?></h5>
						<div class="card-text">
							<p><?php $ltr_to_show = 120;
								$content_strlngth = strlen(get_the_content());
								$content = strip_tags(get_the_content());
										echo substr($content, 0, $ltr_to_show); ?>
								<?php if($content_strlngth > $ltr_to_show) { echo '...'; } ?>
							</p>
						</div>
						<a href="<?php echo get_the_permalink(); ?>" class="card-link text-uppercase">Read more</a><br />
					</div>
				</div>

			<?php endforeach;
		wp_reset_postdata(); ?>

		</div>

		<div class="more text-center">
			<a href="<?php echo get_category_link($travel_guide_cat); ?>" class="card-link text-uppercase">View more</a>
		</div>
	</section>
	<?php } ?>


	<!-------------------- Latest Post ----------------->
	<section class="post-list-group">
		<h3 data-aos="fade-in" data-aos-duration="700" class="text-center">Latest Post</h3>
		<div class="card-deck">

			<?php $top_stories = get_posts(array('post_type' => 'post', 'posts_per_page' => 4, 'orderby' => 'DESC'));
			foreach ($top_stories as $post) : setup_postdata($post); ?>
				<?php $attachmentid = get_post_thumbnail_id(get_the_ID());
                    $featured_image = wp_get_attachment_url( $attachmentid , 'full');
                    $image_alt = get_post_meta( $attachmentid, '_wp_attachment_image_alt', true);
                    //$featured_image = get_the_post_thumbnail_url(); ?>
				<div data-aos="zoom-in-up" data-aos-duration="700" class="card text-center">
				    <?php if(empty($featured_image)) {
    					$featured_image= get_template_directory_uri().'/images/default-image.jpg'; ?>
    					<img class="w-100 card-img-top" src="<?php echo $featured_image; ?>" alt="<?php echo $image_alt; ?>" />
    				<?php } else { ?>
					    <?php the_post_thumbnail('homepage-thumb-size', array( 'class' => 'w-100 card-img-top' )); ?>
					<?php } ?>
					<div class="card-body">
						<h5 class="card-title mt-1"><?php the_title(); ?></h5>
						<div class="card-text">
							<p><?php $ltr_to_show = 120;
								$content_strlngth = strlen(get_the_content());
								$content = strip_tags(get_the_content());
										echo substr($content, 0, $ltr_to_show); ?>
								<?php if($content_strlngth > $ltr_to_show) { echo '...'; } ?>
							</p>
						</div>
						<a href="<?php echo get_the_permalink(); ?>" class="card-link text-uppercase">Read more</a><br />
					</div>
				</div>

			<?php endforeach;
		wp_reset_postdata(); ?>

		</div>

		<div class="more text-center">
			<a href="<?php echo get_the_permalink(1441); ?>" class="card-link text-uppercase">View more</a>
		</div>
	</section>

</div>

<?php get_footer(); ?>