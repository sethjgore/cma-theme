<?php
/**
 * The main template file
 *
 * This is the most generic template file in a WordPress theme and one
 * of the two required files for a theme (the other being style.css).
 * It is used to display a page when nothing more specific matches a query,
 * e.g., it puts together the home page when no home.php file exists.
 *
 * @link http://codex.wordpress.org/Template_Hierarchy
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
		        
        <div class="row">
					<div id="blog-wrapper" class="col-sm-24 col-md-16">
						<div class="internal-header">
							<h1>CMA Blog</h1>
							<h2>Thoughts and updates on everything CMA</h2>
						</div><!-- /.internal-header -->
							<?php
                if ( have_posts() ) :
                // Start the Loop.
                while ( have_posts() ) : the_post();

                  // Include the page content template.
                  get_template_part( 'content', 'blog' );
                
                endwhile;
						
      					endif;
      				?>
					</div><!-- .col-sm-24 col-md-16 -->
					<div class="col-sm-24 col-md-7 col-md-offset-1 page-custom-sidebar">
							  
							  
								<div class="sidebar-menu">
								  <div class="parent-page">
								  	Blog Categories<span class="caret"></span>
								  </div><!-- /.parent-page -->
								  <ul class="child-pages">
								  <?php
                  $args = array(
                    'orderby' => 'name',
                    'order' => 'ASC',
                    'hide_empty' => false
                    );
                  $categories = get_categories($args);
                    foreach($categories as $category) { 
                      echo '<li><a href="' . get_category_link( $category->term_id ) . '" title="' . sprintf( __( "View all posts in %s" ), $category->name ) . '" ' . '>' . $category->name.'</a>';
                      //echo ' ('. $category->count . ')';
                      echo '</li>';  } 
                  ?>
								  </ul>
								</div><!-- /.sidebar-menu -->
							
						<div class="email-updates">
						  <?php if ( is_active_sidebar( 'sidebar-3' ) ) : ?>
            		<?php dynamic_sidebar( 'sidebar-3' ); ?>
            	<?php endif; ?>
						</div><!-- /.email-updates -->
						
						<div class="follow-us-sidebar">
							<h3>Follow us</h3>
              Stay up to speed with CMA using social media
							<div class="social-media">
								<a target="_blank" href="https://www.facebook.com/CMATechnologySolutions"><span class="genericon genericon-facebook-alt"></span></a>
  							<a target="_blank" href="https://twitter.com/CMATechSol"><span class="genericon genericon-twitter"></span></a>
  							<a target="_blank" href="https://www.youtube.com/user/CMATechnology"><span class="genericon genericon-youtube"></span></a>
  							<a target="_blank" href="http://www.linkedin.com/company/cma-technology-solutions"><span class="genericon genericon-linkedin"></span></a>
  							<a target="_blank" href="http://www.cmaontheweb.com/blog/"><span class="genericon genericon-feed"></span></a>
							</div><!-- .social-media -->
						</div><!-- .follow-us-sidebar -->
					</div><!-- .col-sm-24 col-md-7 -->
				</div><!-- .row -->

			</div><!-- /.wrapper -->
		</div><!-- #content -->
	</div><!-- #primary -->
</div><!-- #main-content -->

<?php
get_footer();