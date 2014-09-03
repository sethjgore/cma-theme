<?php
/**
 * The template for displaying 404 pages (Not Found)
 *
 * @package WordPress
 * @subpackage Twenty_Fourteen
 * @since Twenty Fourteen 1.0
 */

get_header(); ?>

<div id="main-content" class="main-content">


	<div id="primary" class="content-area">
		<div id="content" class="site-content" role="main">
		<img class="page-bkg-img" src="<?php bloginfo('template_directory'); ?>/images/bkg-blog.jpg" alt=""/>

			<div class="wrapper">

			<div class="internal-header" style="position:relative;z-index:5;">
					<h1>Sorry,</h1>
					<h2>the page you were looking for could not be found</h2>
				</div><!-- /.internal-header -->

			<div class="page-content">
			<br><br><br>
			  <div class="row">
			  	<div class="col-xs-24 col-sm-11">
              <?php _e( "The URL may be misspelled or the page you're looking for is no longer available. Please try searching our website", 'twentyfourteen' ); ?></p>

      				<?php get_search_form(); ?>
      				<br><br>
			  	</div><!-- .col-xs-24 -->
			  	<div class="col-xs-24 col-sm-10 pull-right">
			  		<?php if(get_field('locations','options')): ?>
								<?php while(has_sub_field('locations','options')): ?>
							 
									<h3><?php the_sub_field('location'); ?></h3>
									<?php  if(get_sub_field('phone_1')): ?>
										<span class="glyphicon glyphicon-phone"></span> <?php the_sub_field('phone_1'); ?><br>
									<?php endif; ?>
									<?php  if(get_sub_field('phone_2')): ?>
										<span class="glyphicon glyphicon-phone"></span> <?php the_sub_field('phone_2'); ?><br>
									<?php endif; ?>
									<?php  if(get_sub_field('email')): ?>
										<span class="glyphicon glyphicon-envelope"></span> <a class="footer-email" href="mailto:<?php the_sub_field('email'); ?>"><?php the_sub_field('email'); ?></a><br>
									<?php endif; ?>
									<br>
								<?php endwhile; ?>
							 
							<?php endif; ?>
			  	</div><!-- .col-xs-24 -->
			  </div><!-- .row -->
			</div><!-- .page-content -->

		</div><!-- /.wrapper -->
		</div><!-- #content -->
	</div><!-- #primary -->
</div><!-- #main-content -->

<?php
get_footer();