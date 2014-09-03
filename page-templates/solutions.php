<?php
/**
 * Template Name: Solutions
 */

get_header(); ?>

<div id="main-content" class="main-content">

	<div id="primary" class="content-area">
		<div id="content" class="site-content solutions-page" role="main">
		<?php
			// Start the Loop.
			while ( have_posts() ) : the_post();
		?>
			<img class="page-bkg-img" src="<?php bloginfo('template_directory'); ?>/images/bkg-baton-rouge.jpg" alt=""/>
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
			
			<div class="page-action">
				<div class="wrapper">
					<?php the_field('call_to_action_text'); ?>
								<span><?php if(get_field('call_to_action_button_link')): ?></span>
								<a class="btn btn-default" href="<?php the_field('call_to_action_button_link'); ?>?cma_subject=<?php echo get_the_title(); ?>"><?php the_field('call_to_action_button_text'); ?></a>
								<?php endif; ?>
				</div><!-- .wrapper -->
			</div><!-- .page-action -->						
			
			<div class="featured-related-content">
			<?php
        if(get_field('related_blog_post_category') != '') $display_border = true; else $display_border = false; 
			$post_object = get_field('featured_customer_story');
			 
			if( $post_object ): 
			 
				// override $post
				$post = $post_object;
				setup_postdata( $post ); 
			 
				?>
			    <div class="featured-customer-story">
				<div class="wrapper" <?php if($display_border) echo 'style="border-bottom: 1px solid #d8dddd;"'; ?>>
						<div class="fcs-title">
							We work with businesses who care about being the best for their customers.<br>
							This is what they have to say:
						</div><!-- /.fcs-title -->
						
						<div class="row">
							<div class="col-xs-6">
								<?php  echo wp_get_attachment_image( get_field('featured_cs_image'), "meduim" , false, array('class'=>'featured-cs-image')); ?>
							</div><!-- .col-xs-6 -->
							<div class="col-xs-13 featured-cs-quote">
								<?php the_field('featured_cs_quote'); ?>
								<div class="author">
									<?php the_field('featured_cs_author'); ?>
								</div><!-- /.author -->
								<div class="title">
									<?php the_field('featured_cs_author_title'); ?>
								</div><!-- /.title -->
							</div><!-- .col-xs-13 -->
							<div class="col-xs-4 pull-right featured-cs-link">
								<svg version="1.1" id="All_glyphs" xmlns="http://www.w3.org/2000/svg" xmlns:xlink="http://www.w3.org/1999/xlink" x="0px" y="0px"
									  viewBox="0 0 70 96.737" enable-background="new 0 0 70 96.737" xml:space="preserve">
								<path fill="#ffffff" d="M68.243,24.082L23.249,0.89C17.088-2.357,4.936,3.916,1.445,9.436c-1.56,2.466-1.443,4.249-1.443,5.256l0.554,52.373
									c0.037,1.111,1.438,2.612,2.638,3.348c2.496,1.531,40.296,25.131,41.369,25.799c0.576,0.358,1.255,0.525,1.927,0.525
									c0.572,0,1.146-0.127,1.667-0.385C49.292,95.794,50,94.71,50,93.532V38.523c0-1.145-0.669-2.203-1.757-2.775L7.348,12.918
									c0.462-0.899,2.283-2.801,5.626-4.552c3.523-1.845,6.162-1.148,6.768-0.914c0,0,39.248,21.004,40.449,21.629
									c1.195,0.624,1.219,0.718,1.219,1.786c0,1.067,0,52.2,0,52.2c0,2.604,2.646,3.67,4.584,3.67c1.938,0,4.007-1.9,4.007-3.67V26.858
									C70,25.713,69.328,24.654,68.243,24.082z"/>
								</svg>

								<a href="<?php the_permalink(); ?>">Customer Story ></a>
							</div><!-- .col-xs-4 -->
						</div><!-- .row -->
					</div><!-- /.wrapper -->
				</div><!-- /.featured-customer-story -->
			    <?php wp_reset_postdata(); // IMPORTANT - reset the $post object so the rest of the page works correctly ?>
			<?php endif; ?>
			
			<?php $cats = get_field('related_blog_post_category');
			if($cats != ''): ?>
			<div class="related-blog-posts">
				<div class="wrapper">
					<div class="row">
						<div class="col-xs-24 col-sm-5 related-blog-title">
							Related Blog Posts
						</div><!-- .col-xs-24 col-sm-5 -->
						<div class="col-xs-24 col-sm-19">
								<?php
								$cat_list = '';
								if($cats){
									foreach($cats as $cat){
										$cat_list .= $cat . ',';
									}
								}
								$args=array(
								  'post_type' => 'post',
								  'posts_per_page' => get_field('number_of_related_blogs'),
								  'cat' => rtrim($cat_list, ','),
								);
								$i=1;
								$loop = new WP_Query( $args );
								while($loop->have_posts()): $loop->the_post(); ?>
									
									<div class="related-blog-post <?php if( $i%2 == 0) echo 'pull-right'; ?>">
										<a href="<?php the_permalink(); ?>">
										<span class="glyphicon glyphicon-pencil"></span>
										<?php 
										$in = get_the_title();
										echo strlen($in) > 50 ? substr($in,0,50)."..." : $in; ?>
										<br>
										<span class="rdmore">Read More</span></a>
									</div><!-- .col-xs-11 -->

								<?php
									$i++;
									endwhile;
									wp_reset_postdata(); ?>
						</div><!-- .col-xs-24 col-sm-19 -->
					</div><!-- .row -->
				</div><!-- /.wrapper -->
			</div><!-- /.related-blog-posts -->
			<?php endif; //$cats != '' ?>
		</div><!-- /.featured-related-content -->

		<?php endwhile; ?>
		</div><!-- #content -->
	</div><!-- #primary -->
</div><!-- #main-content -->

<?php
get_footer();
