<?php
/**
 * The main template file
 *
 * This is the most generic template file in a WordPress theme
 * and one of the two required files for a theme (the other being style.css).
 * It is used to display a page when nothing more specific matches a query.
 * E.g., it puts together the home page when no home.php file exists.
 *
 * @link https://codex.wordpress.org/Template_Hierarchy
 *
 * @package WordPress
 * @subpackage Impackd
 * @since Impackd 1.0
 */

get_header(); ?>

	<div class="container-fluid header-gap">
		<div class="row">
			<div class="col-md-9">
				<?php if ( have_posts() ) :
    				while ( have_posts() ) : the_post(); ?>
    					<div class="row">
    						<div class="col-md-12 content-div">
    						    <h1 style="display:none"><?php the_title(); ?></h1>
    							<h2 class="page-heading"><?php the_title(); ?></h2>
    						    <div class="content-details"><?php the_content(); ?></div>
    						</div>
    					</div>
    					<div class="clearfix"></div>
    				<?php endwhile;
				endif; ?>
			</div>
			<div class="col-md-3 sidebar-section"><?php dynamic_sidebar('category_sidebar'); ?></div>
		</div>
	</div>
<?php get_footer(); ?>
