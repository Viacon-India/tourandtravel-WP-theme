<?php
get_header(); ?>

	<div class="container-fluid header-gap">
		<div class="row">
			<div class="col-md-9" style="padding-left: 35px;">

				<?php if ( have_posts() ) : ?>

					<div class="row">
						<div class="col-md-12">
							<header class="page-header">
							    <?php $author_id = get_the_author_ID(); ?>
								<?php the_archive_title( '<h1 class="page-title">', '</h1>' ); ?>
								
								<a class="author-image" href="<?php echo get_author_posts_url( $author_id ); ?>" rel="bookmark" title="Author Image">
            					    <?php print_r( get_simple_local_avatar( $author_id)); ?>
            					</a>
                					
								<?php //print_r( get_simple_local_avatar( $author_id)); ?>
								<!-- <img src="<?php //echo esc_url( get_avatar_url(get_avatar( $author_id )) ); ?>" class="author-gravtar"/> -->
								<?php the_archive_description( '<div class="taxonomy-description">', '</div>' ); ?>
							</header>
						</div>
					</div>
					<div class="clearfix"></div>
					<div class="row">
						<div class="col-md-12">
							<div class="card-deck">
								<?php while ( have_posts() ) : the_post();
									get_template_part( 'template-parts/content', 'loop');
								endwhile; ?>
							</div>
						</div>
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
				<?php else :
					get_template_part( 'template-parts/content', 'none' );

				endif;
				?>
			</div>
			<div class="col-md-3 sidebar-section"><?php dynamic_sidebar('category_sidebar'); ?></div>
		</div><!-- .site-main -->
	</div><!-- .content-area -->
<?php get_footer(); ?>
