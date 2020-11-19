<?php
/**
 * The template for displaying the footer
 *
 * Contains the closing of the #content div and all content after.
 *
 * @link https://developer.wordpress.org/themes/travel/template-files/#template-partials
 *
 * @package WordPress
 * @subpackage Travl
 * @since 1.0
 * @version 1.2
 */

?>

<footer class="pt-2 pb-2 pt-md-3 pb-md-3 text-center">
  <div class="container mt-4">
    <div class="row text-center text-xs-center text-sm-left text-md-left">
      <div class="col-xs-12 col-sm-3 col-md-3">
        <h5>Useful Links</h5>
        <?php wp_nav_menu(array(
          'menu' => 'Useful Links', 'theme_location' => 'useful_links', 'menu_class' => 'list-unstyled quick-links'
        )); ?>
      </div>
      <div class="col-xs-12 col-sm-3 col-md-3">
        <h5>Categories</h5>
        <?php wp_nav_menu(array(
          'menu' => 'Categories', 'theme_location' => 'categories_menu', 'menu_class' => 'list-unstyled quick-links'
        )); ?>
      </div>
      <div class="col-xs-12 col-sm-3 col-md-3">
        <h5>Social Media Links</h5>
        <?php /* wp_nav_menu(array(
          'menu' => 'Travel Resources', 'theme_location' => 'travel_resources', 'menu_class' => 'list-unstyled quick-links'
        )); */ ?>
        <?php dynamic_sidebar('social_sidebar'); ?>

      </div>
      <div class="col-xs-12 col-sm-3 col-md-3 footer-newsletter">
        <h5>Subscribe to Our Newsletter</h5>
        <?php echo do_shortcode('[email-subscribers-form id="1"]'); ?>
      </div>
    </div>
    <!-- <div class="row">
      <div class="col-xs-12 col-sm-12 col-md-12 mt-2 mt-sm-5">
        <?php //dynamic_sidebar('social_sidebar'); ?>
      </div>
    </div> -->
    <div class="row credits">
      <div class="col-xs-12 col-sm-12 col-md-12 mt-2 mt-sm-2 text-center">
        <small>Designed And Developed By 
          <a href="https://www.viacon.in" target="_blank">Viacon.</a></small>&nbsp; <small>Copyright <?php echo date('Y'); ?>. All Rights Reversed.</small>
        
      </div>
    </div>
  </div>
</footer>
</div>
<?php wp_footer(); ?>


</body>

</html>