<?php
/**
 * Template Name: About
 */

get_header(); ?>

<div id="main-content" class="main-content">

	<div id="primary" class="content-area">
		<div id="content" class="site-content about-page" role="main">
		<?php
			// Start the Loop.
			while ( have_posts() ) : the_post();
		?>
			<img class="page-bkg-img" src="<?php bloginfo('template_directory'); ?>/images/bkg-about-CMA-Technologies.jpg " alt=""/>
			<div class="wrapper">
				<div class="row">
					<div class="col-sm-24">
						<div class="internal-header">
							<h1><?php $title = get_the_title(); if(strlen($title)>29) echo '<span style="font-size:35px;">' . $title . '</span>'; else echo $title; ?></h1>
							<h2><?php the_field('subtitle')?></h2>
							
							<?php if(get_field('solutions')): ?>
							 
							 <div class="row all-sol-row">
							 								 
								<?php $i=1; while(has_sub_field('solutions')): ?>
                  
                  <?php
                  $post_object = get_sub_field('solution_main_page');
                  $children = get_pages('child_of='.$post_object->ID); 
                  //if( count( $children ) != 0 ) { show list as normal }
                  //else { show "no offers" text }
                  ?>

                  <div class="col-xs-24 col-sm-8 solution-block gradient <?php if($i==1) echo ' first-block'; if($i>3) echo ' border-top-block'; if($i%3==0) echo ' border-right-block'; if( count( $children ) != 0 ) echo ' yes-children'; else echo ' no-children';?>">
                  	
                  	<?php if( count( $children ) == 0 ): ?>
                  	<a class="no-child-link" href="<?php echo site_url(); ?>/<?php echo $post_object->post_name; ?>">
                  	<?php endif; ?>
                  	<div class="icon-wrapper">
                  		<?php echo wp_get_attachment_image( get_sub_field('solution_icon'), "full" , false, array('class'=>'class_name')); ?>
                  	</div><!-- .icon-wrapper -->
                  	
                    <?php echo $post_object->post_title;  ?>
                    <?php if( count( $children ) != 0 ): ?>
  									<div class="mask">
  									  <div class="sol-title">
  									  	<?php echo wp_get_attachment_image( get_sub_field('solution_icon'), "full" , false, array('class'=>'mask_img')); echo ' '.$post_object->post_title; ?>
  									  </div><!-- .sol-title --> 
  									  <div class="sol-links">
  									  	<ul>
  									  	<?php foreach($children as $child): ?>
    										<li><a href="<?php echo get_page_link( $child->ID ); ?>"><?php echo $child->post_title; ?></a></li>
  										<?php endforeach; ?>
  									  	</ul>
  									  </div><!-- .sol-links -->
  									</div><!-- .mask -->
  									<?php endif; ?>
  									<?php if( count( $children ) == 0 ): ?>
                  	</a>
                  	<?php endif; ?>
                  </div><!-- .col-xs-24 col-sm-8 -->
							 
								<?php $i++; endwhile; ?>
							 
							  </div><!-- .row -->
							
							<?php endif; ?>
							
						</div><!-- /.internal-header -->
						<?php

							// Include the page content template.
							get_template_part( 'content', 'page' );


						?>
				</div><!-- .col-sm-24 col-md-16 -->
				</div><!-- .row -->
			</div><!-- /.wrapper -->
					
		<div class="our-founders">
			<div class="wrapper">
				  <h3><?php the_field('our_founders_title'); ?></h3>
				    <?php the_field('our_founders_content'); ?>
				    <br>
				    
				    
				  <?php if(get_field('founders')): ?>
				   
				  	<div class="row">
				   
				  	<?php $i=1; while(has_sub_field('founders')): ?>
				   
				  		<div class="col-xs-12 col-sm-6 <?php if($i%2==0) echo ' pull-right'; ?>">
				  		
				  		<div class="founder">
				  						
				  			<?php $attachment_id = get_sub_field('picture');
				  			$size = "large"; // (thumbnail, medium, large, full or custom size)
				  			 
				  			echo wp_get_attachment_image( $attachment_id, $size , false, array('class'=>'founder_photo')); ?>
				  			<div class="founder_info">
					  			<?php the_sub_field('name'); ?><span><?php the_sub_field('title'); ?></span>
				  			</div>
				  			<br>
				  			<div class="founder-desc">
				  				<?php the_sub_field('quote_description'); ?>
				  			</div><!-- .founder-desc -->
				  			
				  			</div><!-- .founder -->
				  			<br>
				  			<span class="founder-border"></span>
				  		</div><!-- .col-xs-24 -->
              <?php if($i%2==0) echo '<div class="clear"></div>'; ?>
				  	<?php $i++; endwhile; ?>
				   
				  	</div><!-- .row -->
				   
				  <?php endif; ?>
				  
			</div><!-- .wrapper -->
		</div><!-- .our-founders -->
					
			
			<div class="page-action">
				<div class="wrapper">
					<?php the_field('call_to_action_text'); ?>
								<span><?php if(get_field('call_to_action_button_link')): ?></span>
								<a class="btn btn-default animated" href="<?php the_field('call_to_action_button_link'); ?>?cma_subject=<?php echo get_the_title(); ?>"><?php the_field('call_to_action_button_text'); ?></a>
								<?php endif; ?>
				</div><!-- .wrapper -->
			</div><!-- .page-action -->						
			

		<?php endwhile; ?>
		</div><!-- #content -->
	</div><!-- #primary -->
</div><!-- #main-content -->

<?php
get_footer();
