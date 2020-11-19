<?php
/**
 * The template for displaying search results pages
 *
 * @link https://developer.wordpress.org/themes/basics/template-hierarchy/#search-result
 *
 * @package WordPress
 * @subpackage Twenty_Seventeen
 * @since 1.0
 * @version 1.0
 */

get_header(); ?>

<div class="container-fluid header-gap">
		<div class="row">
		<?php if ( have_posts() ) : ?>

			<div class="col-md-9">
				<div class="row" style="margin-left: 5px; margin-right: -30px;">
					<div class="col-md-12">
						<header class="page-header">
							<?php if ( have_posts() ) : ?>
								<h1 class="page-title"><?php printf( __( 'Search Results for: %s', 'travel' ), '<span>' . get_search_query() . '</span>' ); ?></h1>
							<?php endif; ?>
						</header>
					</div>
				</div>
				<div class="clearfix"></div>
				<div class="row" style="margin-left: 20px;">
					<?php while ( have_posts() ) : the_post();
						get_template_part( 'template-parts/content', 'search-loop');
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
			<div class="col-md-3 sidebar-section"><?php dynamic_sidebar('category_sidebar'); ?></div>
			
			<?php else :
					?>
					<div class="col-md-12 not-found-sec">
						<h1 class="page-title"><?php _e( 'Nothing Found', 'travel' ); ?></h1>
						<div class="not-found-cont"><?php _e( 'Sorry, but nothing matched your search terms. Please try again with some different keywords.', 'travel' ); ?></div>
						<div class="not-found-search"><?php pnf_search_form(); ?></div>						
					</div>
			<?php endif; ?>
		</div><!-- .site-main -->
	</div><!-- .content-area -->

<?php
get_footer();
