<?php
/**
 * The Template for displaying all single posts
 *
 * @package WordPress
 * @subpackage Twenty_Fourteen
 * @since Twenty Fourteen 1.0
 */

get_header(); ?>

	<div id="primary" class="content-area">
		<div id="content" class="site-content" role="main">
			<img class="bkg-customer-story" src="<?php bloginfo('template_directory'); ?>/images/bkg-customer-story.jpg" alt=""/>
			
				<?php
					// Start the Loop.
					while ( have_posts() ) : the_post(); ?>

						<div class="wrapper">

						<?php
						/*
						 * Include the post format-specific template for the content. If you want to
						 * use this in a child theme, then include a file called called content-___.php
						 * (where ___ is the post format) and that will be used instead.
						 */
						get_template_part( 'content', 'customerstory' );

						// Previous/next post navigation.
						//twentyfourteen_post_nav();

						// If comments are open or we have at least one comment, load up the comment template.
						//if ( comments_open() || get_comments_number() ) {
						//	comments_template();
						//}
						?>
						</div><!-- /.wrapper -->
						<div class="cs-action">
							<div class="wrapper">
								<?php the_field('call_to_action_text'); ?>
								<?php if(get_field('call_to_action_link')): ?>
								<a class="btn btn-default" href="<?php the_field('call_to_action_link'); ?>"><?php the_field('call_to_action_button_text'); ?></a>
								<?php endif; ?>
							</div><!-- /.wrapper -->
						</div><!-- /.cs-action -->

			<?php

					endwhile;
				?>
		</div><!-- #content -->
	</div><!-- #primary -->

<?php
get_footer();
