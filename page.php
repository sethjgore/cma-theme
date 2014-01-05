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
			<img class="page-bkg-img" src="<?php bloginfo('template_directory'); ?>/images/bkg-page.jpg" alt=""/>
			<div class="wrapper">
				<div class="row">
					<div class="col-sm-24 col-md-16">
						<div class="internal-header">
							<h1><?php the_title(); ?></h1>
							<h2><?php the_field('subtitle')?></h2>
						</div><!-- /.internal-header -->
						<?php
							// Start the Loop.
							while ( have_posts() ) : the_post();

								// Include the page content template.
								get_template_part( 'content', 'page' );

							endwhile;
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
						<br>
						Partners We Work With<br>

					</div><!-- .col-sm-24 col-md-7 -->
				</div><!-- .row -->
			</div><!-- /.wrapper -->
			<div class="featured-customer-story">
				<div class="wrapper">
					<div class="fcs-title">
						We work with businesses who care about being the best for their customers.<br>
						This is what they have to say:
					</div><!-- /.fcs-title -->
					
					<div class="row">
						<div class="col-xs-4">
						</div><!-- .col-xs-4 -->
						<div class="col-xs-16">
							Being able to quickly resolve conflicts within our IT infrastructure has increased productivity and cost savings. The cost associated with Compass Managed Services is a mere fraction of the cost that’s associated with a full-time IT personnel. And we can accomplish the same mission for less.

							Detective Sgt. Nethke
							Gonzales Police Department
						</div><!-- .col-xs-16 -->
						<div class="col-xs-4">
						</div><!-- .col-xs-4 -->
					</div><!-- .row -->
				</div><!-- /.wrapper -->
			</div><!-- /.featured-customer-story -->
		</div><!-- #content -->
	</div><!-- #primary -->
</div><!-- #main-content -->

<?php
get_footer();
