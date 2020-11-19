<!-- <div data-aos="zoom-in-up" data-aos-duration="700" class="card text-center"> -->

<?php $attachmentid = get_post_thumbnail_id(get_the_ID());
$featured_image = wp_get_attachment_url( $attachmentid , 'full' );
$image_alt = get_post_meta( $attachmentid, '_wp_attachment_image_alt', true);

//$featured_image = get_the_post_thumbnail_url(); ?>
<div class="card">
	<a href="<?php echo get_the_permalink(); ?>">
	    <?php if(empty($featured_image)) {
			$featured_image= get_template_directory_uri().'/images/default-image.jpg'; ?>
			<img class="w-100 card-img-top" src="<?php echo $featured_image; ?>" alt="<?php echo $image_alt; ?>" />
		<?php } else { ?>
		    <?php the_post_thumbnail('homepage-thumb-size', array( 'class' => 'w-100 card-img-top' )); ?>
		<?php } ?>
	</a>
	<div class="card-body">
		<!-- <a href="<?php echo get_the_permalink(); ?>"> -->
			<h5 class="card-title mt-1"><?php the_title(); ?></h5>
		<!-- </a> -->
		<i class="fa fa-user"></i> <?php the_author_posts_link(); ?> | <?php echo get_the_date('F j, Y'); ?>
		<div class="card-text">
			<p><?php $ltr_to_show = 120;
				$content_strlngth = strlen(get_the_content());
				$content = strip_tags(get_the_content());
						echo substr($content, 0, $ltr_to_show); ?>
				<?php if($content_strlngth > $ltr_to_show) { echo '...'; } ?>
			</p>
		</div>
	</div>
</div>