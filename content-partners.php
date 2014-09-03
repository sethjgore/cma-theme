<?php
/**
 * The template used for displaying page content
 *
 * @package WordPress
 * @subpackage Twenty_Fourteen
 * @since Twenty Fourteen 1.0
 */
?>

<article id="post-<?php the_ID(); ?>" <?php post_class(); ?>>
	
	<div class="entry-content">
		
    <?php if(get_field('featured_partners')): 
          
    	      while(has_sub_field('featured_partners')): 
 
          $post_object = get_sub_field('partner_featured');
           
          if( $post_object ): 
           
          	// override $post
          	$post = $post_object;
          	setup_postdata( $post ); 
           
          	?>
              <div class="cma_partner row">
                <div class="part_logo col-xs-24 col-sm-6">
                	<?php if(get_field('syndication_page')){ ?> 
                	<a href="<?php echo get_field('syndication_page'); ?>">
                	<?php } ?>
                	<?php echo wp_get_attachment_image( get_field('partner_logo'), "medium" , false, array('class'=>'cma_partner_logo')); ?>
                	<?php if(get_field('syndication_page')){ ?> 
                	</a>
                	<?php } ?>
                </div><!-- .part_logo -->
                <div class="part_desc col-xs-24 col-sm-17 col-sm-offset-1">
                    	<?php the_field('partner_description'); ?>
                    	<?php if(get_field('syndication_page')){ ?> 
                    	<a href="<?php echo get_field('syndication_page'); ?>">Click here for more information on <?php the_title(); ?></a><br><br>
                    	<?php } ?>
                </div><!-- .part_desc -->
                
              </div>
              <?php wp_reset_postdata(); // IMPORTANT - reset the $post object so the rest of the page works correctly 
           endif; 
     
         endwhile;
    	     
         endif; ?> 
         
         <br><br><br>
         
         <h3>Other CMA Vendor Relationships</h3>
         <div class="cma_partner_other row">
    		<?php if(get_field('other_partners')): 
          
    	      while(has_sub_field('other_partners')): 
 
          $post_object = get_sub_field('partner_other');
           
          if( $post_object ): 
           
          	// override $post
          	$post = $post_object;
          	setup_postdata( $post ); 
           
          	?>
              
                <div class="other_logo col-xs-12 col-sm-6">
                	<?php if(get_field('syndication_page')){ ?> 
                	<a href="<?php echo get_field('syndication_page'); ?>">
                	<?php } ?>
                	<?php echo wp_get_attachment_image( get_field('partner_logo'), "medium" , false, array('class'=>'cma_partner_logo')); ?>
                	<?php if(get_field('syndication_page')){ ?> 
                	</a>
                	<?php } ?>
                </div><!-- .part_logo -->
              
              <?php wp_reset_postdata(); // IMPORTANT - reset the $post object so the rest of the page works correctly 
           endif; 
     
         endwhile;
    	     
         endif; ?> 
         </div>
	</div><!-- .entry-content -->
</article><!-- #post-## -->
