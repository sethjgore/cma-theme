<?php
/**
 * The Header for our theme
 *
 * Displays all of the <head> section and everything up till <div id="main">
 *
 * @package WordPress
 * @subpackage Twenty_Fourteen
 * @since Twenty Fourteen 1.0
 */
?><!DOCTYPE html>
<!--[if IE 7]>
<html class="ie ie7" <?php language_attributes(); ?>>
<![endif]-->
<!--[if IE 8]>
<html class="ie ie8" <?php language_attributes(); ?>>
<![endif]-->
<!--[if IE 9]>
<html class="ie ie9" <?php language_attributes(); ?>>
<![endif]-->
<!--[if !(IE 7) | !(IE 8) | !(IE 9) ]><!-->
<html <?php language_attributes(); ?>>
<!--<![endif]-->
<head>
	<meta charset="<?php bloginfo( 'charset' ); ?>">
	<meta name="viewport" content="width=device-width, initial-scale=1">
	<title><?php wp_title( '|', true, 'right' ); ?></title>
	<link rel="profile" href="http://gmpg.org/xfn/11">
	<link rel="pingback" href="<?php bloginfo( 'pingback_url' ); ?>">
	<link rel="shortcut icon" href="<?php bloginfo('template_directory'); ?>/favicon.ico" />

	<!--[if gte IE 9]>
  <style type="text/css">
    .gradient {
       filter: none;
    }
  </style>
<![endif]-->
	<?php wp_head(); ?>
		<!--[if lt IE 9]>
  	<script src="<?php echo get_template_directory_uri(); ?>/js/html5.js"></script>
    <script src="<?php echo get_template_directory_uri(); ?>/js/respond.js"></script>
	<![endif]-->
</head>

<body <?php body_class(); ?>>
<div id="page" class="hfeed site">
	<?php if ( get_header_image() ) : ?>
	<div id="site-header">
		<a href="<?php echo esc_url( home_url( '/' ) ); ?>" rel="home">
			<img src="<?php header_image(); ?>" width="<?php echo get_custom_header()->width; ?>" height="<?php echo get_custom_header()->height; ?>" alt="">
		</a>
	</div>
	<?php endif; ?>

	<header id="masthead" class="site-header" role="banner">
		<div class="header-main">
			<div class="wrapper">
				<div class="row">
					<div class="col-xs-6 col-sm-4 col-md-8 col-cma-logo">
						<a class="main-logo" href="<?php echo esc_url( home_url( '/' ) ); ?>" rel="home">
							<svg class="hide-IE" version="1.1" id="Layer_1" xmlns="http://www.w3.org/2000/svg" xmlns:xlink="http://www.w3.org/1999/xlink" x="0px" y="0px"
								 viewBox="0 0 337.235 201.253" enable-background="new 0 0 337.235 201.253"
								 xml:space="preserve">
								 <title>CMA Technology Solutions Baton Rouge</title>
							<g>
								<g>
									<path fill="#00476C" d="M57.139,113.912c-31.524-9.523-49.981-40.784-41.196-69.818c8.77-29.03,41.442-44.838,72.979-35.312
										c4.187,1.264,8.125,2.927,11.818,4.901C94.837,8.885,87.922,5.138,80.195,2.799C48.463-6.793,14.992,11.022,5.458,42.593
										c-9.55,31.579,8.442,64.952,40.18,74.542c12.841,3.887,25.96,3.277,37.672-0.904C74.854,117.256,65.952,116.572,57.139,113.912z"
										/>
									<path fill="#00476C" d="M165.271,142.123c71.727,0,134.774,7.385,170.978,18.537c-31.177-15.652-95.5-26.406-169.844-26.406
										C94.709,134.254,32.312,144.248,0,159C36.91,148.777,97.184,142.123,165.271,142.123z"/>
									<g>
										<polygon fill="#00476C" points="283.341,0 280.233,8.087 283.35,16.841 307.041,78.412 260.563,78.412 257.996,85.001 
											309.779,85.001 323.03,119.67 329.732,119.648 			"/>
										<polygon fill="#AFA754" points="282.759,17.896 279.643,9.376 237.067,119.623 243.42,119.58 			"/>
									</g>
									<g>
										<polygon fill="#AFA754" points="194.678,46.109 195.734,43.382 203.3,23.383 200.511,12.208 166.482,101.764 170.081,110.727 
											194.684,46.125 			"/>
										<polygon fill="#AFA754" points="127.132,23.628 123.104,13.057 96.122,119.387 102.754,119.387 126.823,24.741 			"/>
									</g>
									<g>
										<polygon fill="#00476C" points="165.834,103.613 126.334,0.104 123.524,11.244 127.603,21.991 165.737,122.396 169.398,112.73 
														"/>
										<polygon fill="#00476C" points="205.16,0.223 201.128,10.812 203.906,22.09 228.54,119.521 235.338,119.521 			"/>
									</g>
									<g>
										<text transform="matrix(1 0 0 1 2.6123 189.1055)" fill="#00476C" font-family="'Helvetica-Bold'" font-size="32.2673">T</text>
										<text transform="matrix(1 0 0 1 19.9404 189.1055)" fill="#00476C" font-family="'Helvetica-Bold'" font-size="32.2673">echnology Solutions</text>
									</g>
								</g>
							</g>
							</svg>

							<img class="IE-icon show-IE" src="<?php bloginfo('template_directory'); ?>/images/CMA-Technology-Solutions-Baton-Rouge-LA-cherbonnier-mayer-associates.png" alt="CMA Technology Souitions Baton Rouge" width="120">
						</a>
					</div><!-- /.col-xs-8 -->
					<div class="col-xs-18 col-sm-15 col-md-12 pull-right header-contact">
						<div class="row">
							<div class="col-xs-8 col-sm-8 col-md-8 header-email">
								<a target="_blank" href="mailto:info@cmaontheweb.com">info@cmaontheweb.com</a>
							</div><!-- .col-xs-24 col-md-8 -->
							<div class="col-xs-8 col-sm-8 col-md-8 header-phone">
								800-349-9200
							</div><!-- .col-xs-24 col-md-7 -->
							<div class="col-xs-8 col-sm-8 col-md-8 header-search">
								<?php get_search_form(); ?>
							</div><!-- /.col-xs-24 col-md-8 -->
						</div><!-- .row -->
					</div><!-- /.col-xs-16 -->
				</div><!-- /.row -->
			</div><!-- /.wrapper -->
			<div class="menu-bar">
			    <div class="wrapper">
			    	<div class="row">
				    	<div class="col-sm-24 col-xs-24">
							<nav id="primary-navigation" class="site-navigation primary-navigation" role="navigation">
								<h1 class="menu-toggle"><?php _e( 'Menu', 'twentyfourteen' ); ?></h1>
								<a class="screen-reader-text skip-link" href="#content"><?php _e( 'Skip to content', 'twentyfourteen' ); ?></a>
								<?php wp_nav_menu( array( 'theme_location' => 'primary', 'menu_class' => 'nav-menu','walker'=> new cma_walker_nav_menu() ) ); ?>
							</nav>
						</div><!-- /.col-md-24 col-sm-20 -->
						<!--
              <div class="visible-xs col-xs-4">
							<div class="search-toggle ">
								<a href="#search-container" class="screen-reader-text"><?php _e( 'Search', 'twentyfourteen' ); ?></a>
							</div>
						</div> -->
				    </div><!-- /.row -->
			    </div><!-- /.wrapper -->
			</div><!--  /.menu-bar -->
			
		</div>

		<div id="search-container" class="search-box-wrapper hide">
			<div class="search-box">
				<?php get_search_form(); ?>
			</div>
		</div>
	</header><!-- #masthead -->

	<div id="main" class="site-main">
