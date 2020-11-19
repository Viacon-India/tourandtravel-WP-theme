<?php
/**
 * The header for our theme
 *
 * This is the template that displays all of the <head> section and everything up until <div id="content">
 *
 * @link https://developer.wordpress.org/themes/travel/template-files/#template-partials
 *
 * @package WordPress
 * @subpackage Travel
 * @since 1.0
 * @version 1.0
 */

?><!DOCTYPE html>
<html <?php language_attributes(); ?> class="no-js no-svg">

<?php $front_pageID = get_option('page_on_front');
$seo_title = get_post_meta(get_the_ID(), '_yoast_wpseo_title', true); ?>

<head>
	<meta charset="<?php bloginfo( 'charset' ); ?>">
	<meta name="viewport" content="width=device-width, initial-scale=1">
	<link rel="profile" href="http://gmpg.org/xfn/11">
	<link rel="SHORTCUT ICON" href="<?php echo wp_get_attachment_url(get_post_meta($front_pageID, 'favicon', true)); ?>">
    
    <?php wp_head(); ?>
	
	
    <!-- Global site tag (gtag.js) - Google Analytics -->
    <script async src="https://www.googletagmanager.com/gtag/js?id=G-D50BB7ZH4B"></script>
    <script>
      window.dataLayer = window.dataLayer || [];
      function gtag(){dataLayer.push(arguments);}
      gtag('js', new Date());
    
      gtag('config', 'G-D50BB7ZH4B');
    </script>
    
    <!--<meta property="og:image" content="<?php //echo get_template_directory_uri().'/images/og-image.png'; ?>" />-->
    <meta name="twitter:image" content="<?php echo get_template_directory_uri().'/images/og-image.png'; ?>" />

</head>

<body <?php body_class(); ?>>

	  <div id="container-main" class="d-flex w-100 h-100 mx-auto flex-column">
		<nav data-aos="fade-down" class="navbar navbar-expand-lg navbar-dark">
		    
		  <a class="navbar-brand" href="<?php echo home_url(); ?>"><img src="<?php echo wp_get_attachment_url(get_post_meta($front_pageID, 'logo', true)); ?>" class="site-logo" alt="Traveller"></a>
		  <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarNav"
			aria-controls="navbarNav" aria-expanded="false" aria-label="Toggle navigation">
			<span class="navbar-toggler-icon"></span>
		  </button>
		  <!-- <div class="collapse navbar-collapse" id="navbarNav"> -->
		  
		  <?php wp_nav_menu( array(
			  'menu' => 'Header Menu', 'theme_location' => 'top', 'menu_class' =>'navbar-nav ml-md-auto' , 'container_class' => 'collapse navbar-collapse', 'container_id' => 'navbarNav'
		  ) ); ?>
		  <!-- </div> -->
		  
		  <?php if(is_front_page()) { ?>
		    <div class="travel-search">
		        <i class="fa fa-search" aria-hidden="true"></i>
		    </div>
		  <?php } ?>
		  
    		<div class="top-search">
        		  <form role="search" method="get" class="search-form" action="<?php echo esc_url( home_url( '/' ) ); ?>">
                		<input type="search" class="form-control search-field" placeholder="<?php echo esc_attr_x( 'Search &hellip;', 'placeholder', 'travel' ); ?>" value="<?php echo get_search_query(); ?>" name="s" />
                  </form>
            </div>
            
        </nav>
		
		
