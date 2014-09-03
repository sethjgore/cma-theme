<?php
/**
 * The template for displaying the footer
 *
 * Contains footer content and the closing of the #main and #page div elements.
 *
 * @package WordPress
 * @subpackage Twenty_Fourteen
 * @since Twenty Fourteen 1.0
 */
?>

		</div><!-- #main -->

		<footer id="colophon" class="site-footer" role="contentinfo">
			<div class="wrapper">
				<div class="row">
					<div class="cma-locations col-xs-24 col-sm-6  cma-footer-block">
						<div class="footer-wrapper">
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
						</div><!-- /.footer-wrapper -->
						
					</div><!-- .col-xs-24 col-sm 8 -->
					<div class="cma-quick-links col-xs-24 col-sm-6 cma-footer-block">
						<div class="footer-wrapper">
							<h3>CMA Quick Links</h3>
							<?php wp_nav_menu( array( 'theme_location' => 'footer_menu', 'menu_class' => 'footer-menu' ) ); ?>
						</div><!-- /.footer-wrapper -->
					</div><!-- .col-xs-24 col-sm-8 -->
					<div class="social-media col-xs-24 col-sm-6  cma-footer-block">
						<div class="footer-wrapper">
							<h3>Stay Connected</h3>
							<a target="_blank" class="social-icon-footer" href="https://www.facebook.com/CMATechnologySolutions"><span class="genericon genericon-facebook-alt"></span></a>
							<a target="_blank" class="social-icon-footer" href="https://twitter.com/CMATechSol"><span class="genericon genericon-twitter"></span></a>
							<a target="_blank" class="social-icon-footer" href="https://www.youtube.com/user/CMATechnology"><span class="genericon genericon-youtube"></span></a>
							<a target="_blank" class="social-icon-footer" href="http://www.linkedin.com/company/cma-technology-solutions"><span class="genericon genericon-linkedin"></span></a>
							<a target="_blank" class="social-icon-footer" href="http://www.cmaontheweb.com/blog/"><span class="genericon genericon-feed"></span></a>
							<div class="clear"></div>
							<p>Get product updates and other news. We will never sell your email address.</p>
						</div><!-- /.footer-wrapper -->
					</div><!-- .col-xs-24 col-sm-8 -->
					<div class="cma-from-blog col-xs-24 col-sm-6  cma-footer-block">
						<div class="footer-wrapper">
							<h3>From the Blog</h3>
							<?php
							$args=array(
							  'post_type' => 'post',
							  'posts_per_page' => 3,
							);
							
							$loop = new WP_Query( $args );
							while($loop->have_posts()): $loop->the_post(); ?>
								<div class="from-blog-post">
									<?php 
										if ( has_post_thumbnail() ) {
										the_post_thumbnail();
									} else { ?>
										<img src="<?php bloginfo('template_directory'); ?>/images/cma-featured-image.jpg" alt="CMA Technology Solutions"/>
									<?php } ?>
									<a href="<?php the_permalink() ?>"><?php $string = get_the_title(); 
										echo(strlen($string) > 55) ? substr($string,0,55).'...' : $string; ?><br><span>Continue Reading</span></a>									
								</div><!-- /.from-blog-post -->
							<?php endwhile; wp_reset_postdata(); ?>
						</div><!-- /.footer-wrapper -->
					</div><!-- .col-xs-24 col-sm-8 -->
				</div><!-- .row -->
				<br><br>
				<div class="row">
					<div class="col-xs-24 col-sm-20 credits">
						© <?php echo date('Y'); ?> CMA Technology Solutions. All Rights Reserved. | <a href="<?php echo site_url(); ?>/privacy-policy/">Privacy Policy</a>
					</div><!-- .col-xs-20 -->
					<div class="col-xs-24 col-sm-4 cma-footer-svg">
						<svg class="hide-IE" version="1.1" xmlns="http://www.w3.org/2000/svg" xmlns:xlink="http://www.w3.org/1999/xlink" x="0px" y="0px"
								 viewBox="0 0 337.235 201.253" enable-background="new 0 0 337.235 201.253"
								 xml:space="preserve">
								 <title>CMA Technology Solutions Baton Rouge</title>
							<g>
								<g>
									<path fill="#c1caca" d="M57.139,113.912c-31.524-9.523-49.981-40.784-41.196-69.818c8.77-29.03,41.442-44.838,72.979-35.312
										c4.187,1.264,8.125,2.927,11.818,4.901C94.837,8.885,87.922,5.138,80.195,2.799C48.463-6.793,14.992,11.022,5.458,42.593
										c-9.55,31.579,8.442,64.952,40.18,74.542c12.841,3.887,25.96,3.277,37.672-0.904C74.854,117.256,65.952,116.572,57.139,113.912z"
										/>
									<path fill="#c1caca" d="M165.271,142.123c71.727,0,134.774,7.385,170.978,18.537c-31.177-15.652-95.5-26.406-169.844-26.406
										C94.709,134.254,32.312,144.248,0,159C36.91,148.777,97.184,142.123,165.271,142.123z"/>
									<g>
										<polygon fill="#c1caca" points="283.341,0 280.233,8.087 283.35,16.841 307.041,78.412 260.563,78.412 257.996,85.001 
											309.779,85.001 323.03,119.67 329.732,119.648 			"/>
										<polygon fill="#c1caca" points="282.759,17.896 279.643,9.376 237.067,119.623 243.42,119.58 			"/>
									</g>
									<g>
										<polygon fill="#c1caca" points="194.678,46.109 195.734,43.382 203.3,23.383 200.511,12.208 166.482,101.764 170.081,110.727 
											194.684,46.125 			"/>
										<polygon fill="#c1caca" points="127.132,23.628 123.104,13.057 96.122,119.387 102.754,119.387 126.823,24.741 			"/>
									</g>
									<g>
										<polygon fill="#c1caca" points="165.834,103.613 126.334,0.104 123.524,11.244 127.603,21.991 165.737,122.396 169.398,112.73 
														"/>
										<polygon fill="#c1caca" points="205.16,0.223 201.128,10.812 203.906,22.09 228.54,119.521 235.338,119.521 			"/>
									</g>
									<g>
										<text transform="matrix(1 0 0 1 2.6123 189.1055)" fill="#c1caca" font-family="'Helvetica-Bold'" font-size="32.2673">T</text>
										<text transform="matrix(1 0 0 1 19.9404 189.1055)" fill="#c1caca" font-family="'Helvetica-Bold'" font-size="32.2673">echnology Solutions</text>
									</g>
								</g>
							</g>
							</svg>
					</div><!-- .col-xs-4 -->
				</div><!-- .row -->
			</div><!-- /.wrapper -->
			
		</footer><!-- #colophon -->
	</div><!-- #page -->

   <script>
  (function(i,s,o,g,r,a,m){i['GoogleAnalyticsObject']=r;i[r]=i[r]||function(){
  (i[r].q=i[r].q||[]).push(arguments)},i[r].l=1*new Date();a=s.createElement(o),
  m=s.getElementsByTagName(o)[0];a.async=1;a.src=g;m.parentNode.insertBefore(a,m)
  })(window,document,'script','//www.google-analytics.com/analytics.js','ga');

  ga('create', 'UA-40839438-1', 'cmaontheweb.com');
  ga('send', 'pageview');

</script>


	<?php wp_footer(); ?>
</body>
</html>