<?php
$attachmentid = get_post_thumbnail_id(get_the_ID());
$featured_image = wp_get_attachment_url( $attachmentid , 'full' );
$image_alt = get_post_meta( $attachmentid, '_wp_attachment_image_alt', true);

//$featured_image = get_the_post_thumbnail_url(); ?>
<div class="col-md-12 blog-listing">
	<a href="<?php echo get_the_permalink(); ?>">
	    <?php if(empty($featured_image)) {
			$featured_image= get_template_directory_uri().'/images/default-image.jpg'; ?>
			<img class="w-100 card-img-top" src="<?php echo $featured_image; ?>" alt="<?php echo $image_alt; ?>" />
		<?php } else { ?>
		    <?php the_post_thumbnail('homepage-thumb-size', array( 'class' => 'w-100 card-img-top' )); ?>
		<?php } ?>
	</a>	
	<div class="blog-cont">
		<a href="<?php echo get_the_permalink(); ?>"><h5 class="card-title mt-1"><?php the_title(); ?></h5></a>
		<div class="card-text">
			<p><?php $content = strip_tags(get_the_content());
			echo substr($content,0,240 ); ?>...</p>
		</div>
	</div>
</div>