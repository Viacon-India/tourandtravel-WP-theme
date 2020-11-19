<?php /* Template Name: Blog */
get_header(); ?>


    
    <div class="main container-fluid p-4">
	  
	  <h1 style="display:none">Blog</h1>
	  <!----------- Adventure posts ----------->
      <section class="post-list-group">
        <h3 data-aos="fade-in" data-aos-duration="700" class="mt-4 p-1 text-center"><?php the_title(); ?></h3>
        <div class="card-deck">
		
			<?php $paged = ( get_query_var( 'paged' ) ) ? absint( get_query_var( 'paged' ) ) : 1;
			$args = array( 'post_type' => 'post', 'post_status'=>'publish', 'posts_per_page' => 12, 'paged' => $paged, ); 
			$the_query = new WP_Query($args);
			?> 
			<?php if ( $the_query->have_posts() ) :
			$i = 1;
			while ( $the_query->have_posts() ) : $the_query->the_post(); /* ?>
		
				  <div class="col-md-3">
					<img class="w-100 card-img-top" src="<?php the_post_thumbnail_url(); ?>" alt="" />
					<div class="card-body">
					  <h5 class="card-title mt-1"><?php the_title(); ?></h5>
					  <div class="card-text">
						<p><?php $content = get_the_content();
						echo substr($content,0,120 ); ?></p>
					  </div>
					  <a href="<?php echo get_the_permalink(); ?>" class="card-link text-uppercase">Read more</a><br />
					</div>
				  </div>
				  
			<?php */ 
			get_template_part( 'template-parts/content', 'blogloop');
			
			$i++;
			endwhile; ?>
          
        </div>
		<div class="cat-pagi">
		    <div class="nav-links">
    			<?php
    			echo paginate_links( array(
    				'format'  => 'page/%#%',
    				'current' => $paged,
    				'total'   => $the_query->max_num_pages,
    				'mid_size'        => 2,
    				'prev_text'       => __('&laquo; Previous'),
    				'next_text'       => __('Next &raquo;')
    			) ); ?>
			</div>
		</div>
		 
	<?php endif; ?>
      </section>	  
	  
	  
    </div>
    
<?php get_footer(); ?>
