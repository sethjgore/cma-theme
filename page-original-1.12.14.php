<?php
/**
 * The template for displaying all pages
 *
 * This is the template that displays all pages by default.
 * Please note that this is the WordPress construct of pages and that
 * other 'pages' on your WordPress site will use a different template.
 *
 * @package WordPress
 * @subpackage Twenty_Fourteen
 * @since Twenty Fourteen 1.0
 */

get_header(); ?>

<div id="main-content" class="main-content">

	<div id="primary" class="content-area">
		<div id="content" class="site-content" role="main">
		<?php
			// Start the Loop.
			while ( have_posts() ) : the_post();
		?>
			<img class="page-bkg-img" src="<?php bloginfo('template_directory'); ?>/images/bkg-page.jpg" alt=""/>
			<div class="wrapper">
				<div class="row">
					<div class="col-sm-24 col-md-16">
						<div class="internal-header">
							<h1><?php $title = get_the_title(); if(strlen($title)>29) echo '<span style="font-size:35px;">' . $title . '</span>'; else echo $title; ?></h1>
							<h2><?php the_field('subtitle')?></h2>
						</div><!-- /.internal-header -->
						<?php

							// Include the page content template.
							get_template_part( 'content', 'page' );


						?>
					</div><!-- .col-sm-24 col-md-16 -->
					<div class="col-sm-24 col-md-7 col-md-offset-1 page-custom-sidebar">
					  <!-- Start Sidebar -->
							<?php 
 
              /*
              *  Loop through a Flexible Content field and display it's content with different views for different sidebar layouts
              */
               
              while(has_sub_field("page_sidebar")): ?>
               
              	<?php if(get_row_layout() == "cma_partners"): // layout: Partners ?>
               
              		<div class="work_with_partners sidebar_element">
      							<?php if(get_sub_field('partner_companies')): ?>
      
      								<div class="partner_title">
      									Partners We Work With<br>
      								</div><!-- /.partner_title -->
      							    <ul>
      								<?php $count=1;
      								while(has_sub_field('partner_companies')): 
      									$post_object = get_sub_field('partners');
      										if( $post_object ): 
      										 
      											// override $post
      											$post = $post_object;
      											setup_postdata( $post ); 
      											?>
      
      										    <li><?php  echo wp_get_attachment_image( get_field('partner_logo'), "medium" , false, array('class'=>'partner_logo')); ?>
      
      											</li>
      										    <?php
      										    if($count%3 == 0) echo '</ul><ul>'; 
      										    $count++;
      										    wp_reset_postdata(); // IMPORTANT - reset the $post object so the rest of the page works correctly ?>
      										<?php endif; ?>
      								
      								<?php endwhile; ?>
      								<?php $count--; while($count%3 != 0){
      									echo '<li class="no-border"></li>';
      									$count++;
      									} ?>
      							 	</ul>
      							<?php endif; ?>
      						</div><!-- /.work_with_partners -->
               
              	<?php elseif(get_row_layout() == "file"): // layout: File ?>
               
              		<div class="sidebar_element">
              			<a href="<?php the_sub_field("upload_file"); ?>" ><span class="genericon genericon-document"></span> <?php the_sub_field("link_text"); ?></a>
              		</div>
               
              	<?php elseif(get_row_layout() == "subpage_navigation"): // layout: Subnavigation ?>
            				  
            				  <div class="sidebar-menu sidebar_element">
      								  <div class="parent-page">
      								  	<?php echo the_sub_field('title'); ?><span class="caret"></span>
      								  </div><!-- /.parent-page -->
      								 
      								  <?php
      							  $defaults = array(
                      	'theme_location'  => '',
                      	'menu'            => get_sub_field('subpage_menu'),
                      	'container'       => 'div',
                      	'menu_class'      => 'child-pages',
                      	'echo'            => true,
                      	'fallback_cb'     => 'wp_page_menu',
                      	'items_wrap'      => '<ul id="%1$s" class="%2$s">%3$s</ul>',
                      	'depth'           => 0,
                      	'walker'          => ''
                      );
                      
                      wp_nav_menu( $defaults ); ?>
                      
                      </div><!-- /.sidebar-menu -->
                      
                      <!-- <div class="sidebar-menu-empty sidebar_element"></div> -->
               	<?php elseif(get_row_layout() == "testimonial"): // layout: Testimonial ?>
               
              		 <div class="sidebar_element">
              		 	
                    <?php
                       
                      $post_object = get_sub_field('the_testimonial');
                       
                      if( $post_object ): 
                       
                      	// override $post
                      	$post = $post_object;
                      	setup_postdata( $post ); 
                       
                      	?>
                          <div>
                          	<?php the_content(); ?><br><span class="test_author"><?php the_field('testimonial_author'); ?></span>
                          </div>
                          <?php wp_reset_postdata(); // IMPORTANT - reset the $post object so the rest of the page works correctly ?>
                      <?php endif; ?>
              		 </div><!-- .sidebar_element -->
               
                <?php elseif(get_row_layout() == "image_icon"): // layout: Image / Logo ?>
               
              		 <div class="sidebar_element image_file">
              		 	 <?php 
              		 	 $attachment_id = get_sub_field('image_file');
              		 	 $size = "medium"; // (thumbnail, medium, large, full or custom size)
              		 	  
              		 	 echo wp_get_attachment_image( $attachment_id, $size , false, array('class'=>'sidebar-icon'));
              		 	  ?>
              		 </div><!-- .sidebar_element -->
              		 
              	<?php elseif(get_row_layout() == "form"): // layout: Form ?>
               
              		 <div class="sidebar_element form_element">
              		 	   <?php 
                            $form = get_sub_field('selected_form');
                            gravity_form_enqueue_scripts($form->id, true);
                            gravity_form($form->id, false, false, true, '', true, 1); 
                        ?>
              		 </div><!-- .sidebar_element -->	 
              		 
                <?php elseif(get_row_layout() == "video"): // layout: Video ?>
               
              		 <div class="sidebar_element video_element">
              		 	 <?php if(get_sub_field('video_link')): ?>
                			<div class="video-box">
                				<a target="_blank" href="<?php the_sub_field('video_link'); ?>">
                					<img class="play_video_btn" src="<?php bloginfo('template_directory'); ?>/images/video_play.png" alt="Play Video"/>
                					<?php 
                						 echo wp_get_attachment_image( get_sub_field('video_image'), "large" , false, array('class'=>'video_image'));
                					?>
                				</a>
                				<br>
                				<p><?php the_sub_field('video_description'); ?></p>
                			</div><!-- /.video-box -->
                		<?php endif; ?>

              		 </div><!-- .sidebar_element -->
              		 
              		<?php elseif(get_row_layout() == "empty_block"): // layout: Empty Block ?>
              		 <div class="sidebar-menu-empty"></div>
              	<?php endif; ?>
               
              <?php endwhile; ?>
							
						
						<!-- End Sidebar -->
						
						
						<?php
							  
							  $has_children = wp_list_pages("title_li=&child_of=".$post->ID."&echo=0");
							  if($has_children){
							  	$children = wp_list_pages("title_li=&child_of=".$post->ID."&echo=0");
							  	$titlenamer = get_the_title($post->ID);
							  	$parent = $post->ID;
							  } else {
							  	if($post->post_parent && $post->post_parent != 7) {
								  $children = wp_list_pages("title_li=&child_of=".$post->post_parent."&echo=0");
								  $titlenamer = get_the_title($post->post_parent);
								  $parent = $post->post_parent;
							  	}		
							  }
							  
							 
							  if ($children) { ?>
								<div class="sidebar-menu">
								  <div class="parent-page">
								  	<a href="<?php echo get_page_link($parent); ?>"><?php echo $titlenamer; ?></a><span class="caret"></span>
								  </div><!-- /.parent-page -->
								  <ul class="child-pages">
								  <?php echo $children; ?>
								  </ul>
								</div><!-- /.sidebar-menu -->
							<?php } else { ?>
								<div class="sidebar-menu-empty"></div>
							<?php } ?>
						
						<div class="work_with_partners">
							<?php if(get_field('partner_companies')): ?>

								<div class="partner_title">
									Partners We Work With<br>
								</div><!-- /.partner_title -->
							    <ul>
								<?php $count=1;
								while(has_sub_field('partner_companies')): 
									$post_object = get_sub_field('partners');
										if( $post_object ): 
										 
											// override $post
											$post = $post_object;
											setup_postdata( $post ); 
											?>

										    <li><?php  echo wp_get_attachment_image( get_field('partner_logo'), "medium" , false, array('class'=>'partner_logo')); ?>

											</li>
										    <?php
										    if($count%3 == 0) echo '</ul><ul>'; 
										    $count++;
										    wp_reset_postdata(); // IMPORTANT - reset the $post object so the rest of the page works correctly ?>
										<?php endif; ?>
								
								<?php endwhile; ?>
								<?php $count--; while($count%3 != 0){
									echo '<li class="no-border"></li>';
									$count++;
									} ?>
							 	</ul>
							<?php endif; ?>
						</div><!-- /.work_with_partners -->





					</div><!-- .col-sm-24 col-md-7 -->
				</div><!-- .row -->
			</div><!-- /.wrapper -->
			
			<div class="page-action">
				<div class="wrapper">
					<?php the_field('call_to_action_text'); ?>
								<?php if(get_field('call_to_action_button_link')): ?>
								<a class="btn btn-default" href="<?php the_field('call_to_action_button_link'); ?>?cma_subject=<?php echo get_the_title(); ?>"><?php the_field('call_to_action_button_text'); ?></a>
								<?php endif; ?>
				</div><!-- .wrapper -->
			</div><!-- .page-action -->						
			
			<div class="featured-related-content">
			<?php
 
			$post_object = get_field('featured_customer_story');
			 
			if( $post_object ): 
			 
				// override $post
				$post = $post_object;
				setup_postdata( $post ); 
			 
				?>
			    <div class="featured-customer-story">
				<div class="wrapper">
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
			
			<div class="related-blog-posts">
				<div class="wrapper">
					<div class="row">
						<div class="col-xs-24 col-sm-5 related-blog-title">
							Related Blog Posts
						</div><!-- .col-xs-24 col-sm-5 -->
						<div class="col-xs-24 col-sm-19">
								<?php
								$cats = get_field('related_blog_post_category');
								$cat_list = '';
								if($cats){
									foreach($cats as $cat){
										$cat_list .= $cat . ',';
									}
								}
								$args=array(
								  'post_type' => 'post',
								  'posts_per_page' => get_field('number_of_related_blogs'),
								  'cat' => rtrim('$cat_list', ','),
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
		</div><!-- /.featured-related-content -->

		<?php endwhile; ?>
		</div><!-- #content -->
	</div><!-- #primary -->
</div><!-- #main-content -->

<?php
get_footer();
