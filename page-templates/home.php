<?php 
/* 
 * Template Name: Home Page
 */

get_header(); ?>

<div id="main-content" class="main-content">
<div class="slider">
	<div class="slide">
		
	</div><!-- /.slide -->
	<div class="slide">
		
	</div><!-- /.slide -->
</div><!-- /.slider -->
<img src="<?php bloginfo('template_directory'); ?>/images/CMA-Distaster-Recovery.jpg" alt="">
<?php
	if ( is_front_page() && twentyfourteen_has_featured_posts() ) {
		// Include the featured content template.
		get_template_part( 'featured-content' );
	}
?>
	<div id="primary" class="content-area">
		<div id="content" class="site-content" role="main">

			<?php
				// Start the Loop.
				while ( have_posts() ) : the_post();

					// Include the page content template.
					get_template_part( 'content', 'page' );

				endwhile;
			?>

		</div><!-- #content -->
	</div><!-- #primary -->
</div><!-- #main-content -->

<?php
get_footer();
