<div id="post-<?php the_ID(); ?>" <?php post_class(); ?>>
    <!--<div class="container">
        <div class="row">
           <h2 class="title col-md-12"><a href="<?php //the_permalink();?>"><?php //the_title();?></a></h2>
            <div class="col-md-9 col-sm-9 col-xs-12 col-md-offset-1">
                <?php //the_content();?>
            </div> 
        </div>
    </div> -->
		<div class="fl-post-content clearfix">
			<div class="fl-builder-content fl-builder-content-43 fl-builder-content-primary fl-builder-global-templates-locked" data-id="<?php the_ID(); ?>">
			<?php the_content();?>
			
			</div>
		
		</div>
</div>