<?php
if(!defined('TRAVEL_DIR')) define('TRAVEL_DIR',get_template_directory());
if(!defined('TRAVEL_URI')) define('TRAVEL_URI',get_template_directory_uri());

/* if ( file_exists( TRAVEL_DIR.'/includes/config.php') ) {
	require_once(TRAVEL_DIR.'/includes/config.php');
} */

add_action( 'after_setup_theme', 'travel_setup' );
if(!function_exists('travel_setup'))
{
	function travel_setup()
	{
		load_theme_textdomain( 'travel' );
		add_theme_support( 'automatic-feed-links' );		
		add_theme_support( 'title-tag' );		
		add_theme_support( 'custom-logo');		
		add_theme_support( 'post-thumbnails' );	
		add_image_size( 'homepage-thumb-size', 320, 280 );
		add_image_size( 'related-thumb-size', 320, 280 );
		add_image_size( 'long-width-card', 560, 280 );

				
		$GLOBALS['content_width'] = 900;
		
		register_nav_menus( array(
			'top'    => __( 'Primary Menu', 'travel' ),
			'useful_links' => __( 'Useful Links', 'travel' ),
			'categories_menu' => __( 'Categories', 'travel' ),
			//'social_media_links' => __( 'Social Media Links', 'travel' ),
		) );
		
		add_theme_support( 'html5', array(
			'comment-form',
			'comment-list',
		) );		
				
		//disable admin bar for all user other than administrator
		if (!current_user_can('administrator') && !is_admin()) {
		  show_admin_bar(false);
		}		

	}
}

add_action( 'wp_enqueue_scripts', 'travel_front_scripts' );
if(!function_exists('travel_front_scripts')) {
	function travel_front_scripts(){
		global $travel;
                
		wp_enqueue_style('bootstrap-css', TRAVEL_URI. '/css/bootstrap.min.css',array(), false,'all');                
		wp_enqueue_style('jquery-modal-css', TRAVEL_URI. '/css/jquery.modal.min.css',array(), false,'all');    
		wp_enqueue_style('travel-default-css',TRAVEL_URI.'/style.css',array(), false,'all' );		
		wp_enqueue_style('travel-custom-css',TRAVEL_URI.'/css/custom.css',array(), false,'all' );
		if(is_single()) {
			wp_enqueue_style('blog-page-custom-css',TRAVEL_URI.'/css/blog-page.css',array(), false,'all' );
		}
		
		wp_enqueue_style('sidebar-custom-css',TRAVEL_URI.'/css/sidebar.css',array(), false,'all' );
		wp_enqueue_style('aos-css', 'https://unpkg.com/aos@2.3.1/dist/aos.css',array(), false,'all' );
		
		//wp_enqueue_style('font-awesome', get_stylesheet_directory_uri() . '/css/font-awesome.min.css');
		
		wp_enqueue_script('jquery');
		wp_enqueue_script('jquery-js','https://ajax.googleapis.com/ajax/libs/jquery/3.4.0/jquery.min.js',array('jquery'),false, false );
		wp_enqueue_script('bootstrap-js',TRAVEL_URI.'/js/bootstrap.min.js',array('jquery'),false, false );
		wp_enqueue_script('jquery-modal-min-js',TRAVEL_URI.'/js/jquery.modal.min.js',array('jquery'),false, false );
		wp_enqueue_script('aos-js','https://unpkg.com/aos@2.3.1/dist/aos.js',array('jquery'),false, false );
		wp_enqueue_script('custom-js',TRAVEL_URI.'/js/custom.js',array('jquery'),false, false );
		
		//wp_enqueue_script('child-theme_js', get_stylesheet_directory_uri(). '/js/child-custom.js');
		$jsData = [
			'ajaxurl' => admin_url('admin-ajax.php'),
			'test' => '123',
			'test1' => 'world',
		];

		wp_localize_script('custom-js', 'Front', $jsData);
								 
		/* wp_localize_script('custom-js', 'Front', array(
				'ajaxurl' =>admin_url('admin-ajax.php'),
		)); */                
    }
}


add_action( 'widgets_init', 'travel_widgets_init' );
if(!function_exists('travel_widgets_init'))
{
	function travel_widgets_init(){
		register_sidebar( array(
			'name'          => __( 'General Sidebar', 'travel' ),
			'id'            => 'general_sidebar',
			'description'   => __( 'Add widgets here to appear in your sidebar.', 'travel' ),
			'before_widget' => '<section id="%1$s" class="widget %2$s">',
			'after_widget'  => '</section>',
			'before_title'  => '<h2 class="widget-title">',
			'after_title'   => '</h2>',
		) );
		register_sidebar( array(
			'name'          => __( 'Single page Sidebar', 'travel' ),
			'id'            => 'single_page_sidebar',
			'description'   => __( 'Add widgets here to appear in your sidebar.', 'travel' ),
			'before_widget' => '<section id="%1$s" class="widget %2$s">',
			'after_widget'  => '</section>',
			'before_title'  => '<h2 class="widget-title">',
			'after_title'   => '</h2>',
		) );
		register_sidebar( array(
			'name'          => __( 'Footer Social Sidebar', 'travel' ),
			'id'            => 'social_sidebar',
			'description'   => __( 'Add widgets here to appear in your sidebar.', 'travel' ),
			'before_widget' => '<section id="%1$s" class="widget %2$s">',
			'after_widget'  => '</section>',
			'before_title'  => '<h2 class="widget-title">',
			'after_title'   => '</h2>',
		) );
		register_sidebar( array(
			'name'          => __( 'Category Sidebar', 'travel' ),
			'id'            => 'category_sidebar',
			'description'   => __( 'Add widgets here to appear in your sidebar.', 'travel' ),
			'before_widget' => '<section id="%1$s" class="widget %2$s">',
			'after_widget'  => '</section>',
			'before_title'  => '<h2 class="widget-title">',
			'after_title'   => '</h2>',
		) );
		
	}
}
/********************************************************/
function subh_get_post_view( $postID ) {
 $count_key = 'post_views_count';
 $count     = get_post_meta( $postID, $count_key, true );
 if ( $count == '' ) {
 delete_post_meta( $postID, $count_key );
 add_post_meta( $postID, $count_key, '0' );
 
 return '0 View';
 }
 
 return $count . ' Views';
}
function subh_set_post_view( $postID ) {	
 $count_key = 'post_views_count';
 $count     = (int) get_post_meta( $postID, $count_key, true );
 if ( $count < 1 ) {
 delete_post_meta( $postID, $count_key );
 add_post_meta( $postID, $count_key, '1' );
 } else {
 $count++;
 update_post_meta( $postID, $count_key, (string) $count );
 }
}
function subh_posts_column_views( $defaults ) {
 $defaults['post_views'] = __( 'Views' );
 
 return $defaults;
}
function subh_posts_custom_column_views( $column_name, $id ) {
 if ( $column_name === 'post_views' ) {
 echo subh_get_post_view( get_the_ID() );
 }
}
 
add_filter( 'manage_posts_columns', 'subh_posts_column_views' );
add_action( 'manage_posts_custom_column', 'subh_posts_custom_column_views', 5, 2 );


/*********************************************************************************/

add_shortcode('recent_posts', 'recent_posts_func');
if(!function_exists('recent_posts_func')) {
	function recent_posts_func() { ?>
	
		<div class="sidebar-recent-posts">
			<h2>Recent Posts</h2>
			<ul>
			<?php global $post;
			$top_stories = get_posts(array('post_type' => 'post', 'posts_per_page' => 4, 'orderby' => 'DESC' ));
			foreach ($top_stories as $post): setup_postdata($post); ?>
				<?php $featured_image = get_the_post_thumbnail_url(); ?>
				
				<li>
					<?php if(empty($featured_image)) {
						$featured_image= get_template_directory_uri().'/images/default-image.jpg'; ?>
						<img src="<?php echo $featured_image; ?>" alt="<?php the_title(); ?>" />
					<?php } else { ?>
						<img src="<?php the_post_thumbnail_url('thumbnail'); ?>" alt="<?php the_title(); ?>" />
					<?php } ?>
					
					<div class="">
					  <a href="<?php echo get_the_permalink(); ?>">
						<?php $title = strip_tags(get_the_title());
						echo substr($title,0,40 ); ?>...
					  </a>
					</div>
				</li>
			  
			<?php endforeach;
			wp_reset_postdata(); ?>
			</ul>
		</div>
	<?php }
}
/************************ search of 404 *****************************/
if(!function_exists('pnf_search_form')) {
	function pnf_search_form() { ?>
	
		<link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.2/css/bootstrap.min.css">
		<form role="search" method="get" class="search-form" action="<?php echo esc_url( home_url( '/' ) ); ?>">
			<div class="input-group add-on">
			  <input type="search" class="form-control" placeholder="<?php echo esc_attr_x( 'Search &hellip;', 'placeholder', 'travel' ); ?>" value="<?php echo get_search_query(); ?>" name="s" />
			  <div class="input-group-btn">
				<button class="btn btn-default" type="submit"><i class="glyphicon glyphicon-search"></i></button>
			  </div>
			</div>
		</form>
	
<?php }
}


/*********************** Contact Form *******************************/
function vc_remove_wp_ver_css_js( $src ) {
    if ( strpos( $src, 'ver=' ) )
        $src = remove_query_arg( 'ver', $src );
    return $src;
}
add_filter( 'style_loader_src', 'vc_remove_wp_ver_css_js', 9999 );
add_filter( 'script_loader_src', 'vc_remove_wp_ver_css_js', 9999 );

add_filter( 'wp_mail_from_name', 'my_mail_from_name' );
function my_mail_from_name( $name ) {
    return "TourandTravel Blog";
}

add_shortcode('tech_contact_form', 'tech_contact_func');
function tech_contact_func() {
    $output = '';
    ob_start();
    ?>
    <div class="contactpage-form">
        <form name="tech_contact_form" method="post" id="tech_contact_form" action="">
            <input type="hidden" name="action" value="tech_contact_process" />
            <div class="form-group col-xs-12">
                <input class="form-control" type="text" name="u_name" value="" placeholder="Name" required/>
            </div>                    
            <div class="form-group col-xs-12">
                <input class="form-control" type="email" name="u_email" value="" placeholder="Email" required  />
            </div>
            <div class="form-group col-xs-12">
                <input class="form-control" type="text" name="u_subject" placeholder="Subject" value="" required/>
            </div>
            <div class="form-group col-xs-12">
                <textarea class="form-control" name="u_message" placeholder="Message" required></textarea>
            </div>
            <div class="form-group col-xs-12">
                <button type="submit" name="conatct_us_btn" class="sub-btn">Submit</button>
            </div>
        </form>
		<div class="contact-loader" style="display:none;">
			<img src="https://cdn.lowgif.com/full/d9675675623d5f27-loading-gif-transparent-background-loading-gif.gif" alt="loader">
		</div>
        <div class="success-msg"></div>
        <div class="error-msg"></div>
        <div class="clear"></div>
    </div>
    <?php
    $output = ob_get_contents();
    ob_end_clean();
    return $output;
}

add_action('wp_ajax_tech_contact_process', 'ajax_tech_contact_process');
add_action('wp_ajax_nopriv_tech_contact_process', 'ajax_tech_contact_process');
function ajax_tech_contact_process() {
    $response_arr = ['flag' => FALSE, 'msg' => NULL];
    
    $user_name = $_POST['u_name'];
    $user_email = $_POST['u_email'];
    $subject = $_POST['u_subject'];
    $u_mnessage = $_POST['u_message'];
    
    if(empty($user_name)) {
        $response_arr['msg'] = 'Enter your name.';
    } elseif(empty($user_email)) {
        $response_arr['msg'] = 'Enter your email address.';
    } elseif(empty($subject)) {
        $response_arr['msg'] = 'Enter subject.';
    } elseif(empty($u_mnessage)) {
        $response_arr['msg'] = 'Enter your message.';
    } else {
        
        $to = 'mashum.webmaster@gmail.com';
        //$to = 'viacon.sharmita@gmail.com';
        $body = '<table class="mail-table" style="border: 1px solid #0a9e01; padding:20px; width: 100%;">
                    <h4 style="border-bottom: 2px solid #ccc; padding-bottom: 10px; width: 50%;">This e-mail was sent from a contact form on TourandTravelBlog.</h4>
                    <tr>
                        <td>Name: ' .$user_name .'</td>
                    </tr>
                    <tr>
                        <td>Email: '. $user_email .'</td>
                    </tr>
                    <tr>
                        <td>Subject: ' . $subject. '</td>
                    </tr>
                    <tr>
                        <td>Message: ' . $u_mnessage .'</td>
                    </tr>
                </table>';
        $headers = array('Content-Type: text/html; charset=UTF-8', 'Reply-To: ' .$user_name .' <' . $user_email. '>');
        wp_mail( $to, 'TourandTravel Blog Conatct Form' , $body, $headers );
        
        $response_arr['msg'] = 'Thank you for your message. It has been sent.';
        $response_arr['flag'] = true;
    }
    
    
    echo json_encode($response_arr);
    exit;
}


