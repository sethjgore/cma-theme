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
							<h1><?php the_title(); ?></h1>
							<h2><?php the_field('subtitle')?></h2>
						</div><!-- /.internal-header -->
						<?php

							// Include the page content template.
							get_template_part( 'content', 'page' );


						?>
					</div><!-- .col-sm-24 col-md-16 -->
					<div class="col-sm-24 col-md-7 col-md-offset-1">
						<div class="sidebar-menu">
							<?php
							  if($post->post_parent) {
							  $children = wp_list_pages("title_li=&child_of=".$post->post_parent."&echo=0");
							  $titlenamer = get_the_title($post->post_parent);
							  }

							  else {
							  $children = wp_list_pages("title_li=&child_of=".$post->ID."&echo=0");
							  $titlenamer = get_the_title($post->ID);
							  }
							  if ($children) { ?>

							  <?php echo $titlenamer; ?>
							  <ul>
							  <?php echo $children; ?>
							  </ul>

							<?php } ?>
						</div><!-- /.sidebar-menu -->
						
						<div class="work_with_partners">
							<?php if(get_field('partner_companies')): ?>

								<div class="partner_title">
									Partners We Work With<br>
								</div><!-- /.partner_title -->
							    <ul>
								<?php while(has_sub_field('partner_companies')): 
									$post_object = get_sub_field('partners');
										if( $post_object ): 
										 
											// override $post
											$post = $post_object;
											setup_postdata( $post ); 
											?>

										    <li><?php  echo wp_get_attachment_image( get_field('partner_logo'), "medium" , false, array('class'=>'partner_logo')); ?>
											</li>
										    <?php wp_reset_postdata(); // IMPORTANT - reset the $post object so the rest of the page works correctly ?>
										<?php endif; ?>
								
								<?php endwhile; ?>
							 	</ul>
							<?php endif; ?>
						</div><!-- /.work_with_partners -->
					</div><!-- .col-sm-24 col-md-7 -->
				</div><!-- .row -->
			</div><!-- /.wrapper -->
			
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
							<div class="row">
								<?php
								$cats = get_field('related_blog_post_category');
								foreach($cats as $cat){
									$cat_list .= $cat . ',';
								} 
								$args=array(
								  'post_type' => 'post',
								  'posts_per_page' => get_field('number_of_related_blogs'),
								  'cat' => rtrim('$cat_list', ','),
								);
								$i=1;
								$loop = new WP_Query( $args );
								while($loop->have_posts()): $loop->the_post(); ?>
									
									<div class="col-xs-11 related-blog-post <?php if( $i%2 == 0) echo 'pull-right'; ?>">
										<a href="<?php the_permalink(); ?>"><?php the_title(); ?></a>
									</div><!-- .col-xs-11 -->
								<?php
									$i++;
									endwhile;
									wp_reset_postdata(); ?>
							</div><!-- .row -->
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
