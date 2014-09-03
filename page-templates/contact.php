<?php 
/* 
 * Template Name: Contact Us
 */
 
get_header(); ?>

<div id="main-content" class="main-content">

	<div id="primary" class="content-area">
		<div id="content" class="site-content contact-page" role="main">
		<?php
			// Start the Loop.
			while ( have_posts() ) : the_post();
		?>
			<img class="page-bkg-img" src="<?php bloginfo('template_directory'); ?>/images/bkg-page.jpg" alt=""/>
			<div class="wrapper">
				<div class="internal-header">
					<div class="row">
					  <div class="col-sm-24 col-md-16">
							<h1><?php $title = get_the_title(); if(strlen($title)>29) echo '<span style="font-size:35px;">' . $title . '</span>'; else echo $title; ?></h1>
							<h2><?php the_field('subtitle')?></h2>
						</div><!-- .col-sm-24 col-md-16 -->
            <div class="col-sm-24 col-md-7 col-md-offset-1 toll-free">
              <svg version="1.1" id="Layer_1" xmlns="http://www.w3.org/2000/svg" xmlns:xlink="http://www.w3.org/1999/xlink" x="0px" y="0px"
              	 viewBox="0 0 21.277 36.071" enable-background="new 0 0 21.277 36.071" xml:space="preserve">
              <g>
              	<defs>
              		<rect id="SVGID_1_" width="21.277" height="36.071"/>
              	</defs>
              	
              	<path clip-path="url(#SVGID_2_)" fill="none" stroke="#fff" stroke-miterlimit="10" d="M20.777,32.571c0,1.65-1.351,3-3,3H3.5
              		c-1.65,0-3-1.35-3-3V3.5c0-1.65,1.35-3,3-3h14.277c1.649,0,3,1.35,3,3V32.571z"/>
              	
              		<rect x="2.905" y="6.635" clip-path="url(#SVGID_2_)" fill="none" stroke="#fff" stroke-miterlimit="10" width="15.417" height="20.555"/>
              	<path clip-path="url(#SVGID_2_)" fill="#FFFFFF" d="M11.124,3.726c0,0.219-0.179,0.396-0.397,0.396S10.33,3.945,10.33,3.726
              		c0-0.219,0.178-0.397,0.396-0.397S11.124,3.507,11.124,3.726"/>
              	<circle clip-path="url(#SVGID_2_)" fill="none" stroke="#fff" stroke-miterlimit="10" cx="10.727" cy="3.726" r="0.397"/>
              	<circle clip-path="url(#SVGID_2_)" fill="none" stroke="#fff" stroke-miterlimit="10" cx="10.784" cy="31.472" r="1.984"/>
              	
              		<rect x="14.189" y="7.477" transform="matrix(0.707 0.7072 -0.7072 0.707 10.1136 -8.7957)" clip-path="url(#SVGID_2_)" fill="#fff" width="2.967" height="0.664"/>
              	
              		<rect x="11.486" y="8.726" transform="matrix(0.7071 0.7071 -0.7071 0.7071 10.666 -7.6338)" clip-path="url(#SVGID_2_)" fill="#fff" width="6.124" height="0.664"/>
              	
              		<rect x="8.421" y="9.811" transform="matrix(0.7071 0.7071 -0.7071 0.7071 11.0921 -6.4922)" clip-path="url(#SVGID_2_)" fill="#fff" width="9.924" height="0.665"/>
              </g>
              </svg>

              <div class="toll-free-text">
              	  CMA Toll Free Support<br>
                  <span>(800) 349-9200 </span>

              </div><!-- .toll-free-text -->            
              </div><!-- .col-sm-24 col-md-7 -->
          </div><!-- .row -->
				</div><!-- /.internal-header -->
						
				<div class="row contact-content">
					<div class="col-xs-24 col-sm-11 pull-right">
				      <?php if(get_field('locations')): ?>
				       				       
				      	<?php while(has_sub_field('locations')): ?>
				       
				      		<div class="cma-location">
				      			<h3><?php the_sub_field('location'); ?></h3>
				      			<?php the_sub_field('street_address'); ?>
				      			<br>
				      			<?php the_sub_field('city_state_zip');
				      			
				      			if(get_sub_field('phone') || get_sub_field('fax')): ?>
				      			  <br><br>
				      			  <?php if(get_sub_field('phone')){ ?>
				      			  <span class="glyphicon glyphicon-phone"></span> <strong>PHONE</strong> <?php the_sub_field('phone'); ?>
				      			  <?php } if(get_sub_field('fax')){ ?>
				      			  <div class="contact-fax">
				      			  <span class="glyphicon glyphicon-print"></span> <strong>FAX</strong> <?php the_sub_field('fax'); ?>
				      			  </div><!-- .contact-fax -->
				      			  <?php } endif; ?>
				      			<br><br>
				      			<?php the_sub_field('google_map'); ?>
				      		</div><!-- .cma-location -->
				       
				      	<?php endwhile; ?>
				       
				      <?php endif; ?>
					</div><!-- .col-xs-24 -->
					<div class="col-xs-24 col-sm-11 pull-left">
						  <?php the_content(); ?>
					</div><!-- .col-xs-24 -->
				</div><!-- .row -->
					
			</div><!-- /.wrapper -->
			
		<?php endwhile; ?>
		</div><!-- #content -->
	</div><!-- #primary -->
</div><!-- #main-content -->

<?php
get_footer();
