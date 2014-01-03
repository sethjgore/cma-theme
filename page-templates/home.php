<?php 
/* 
 * Template Name: Home Page
 */

get_header(); ?>

<div id="main-content" class="main-content">

	<div id="primary" class="content-area">
		<div id="content" class="site-content" role="main">

			<?php
				// Start the Loop.
				while ( have_posts() ) : the_post(); ?>

					<div class="hp_slider cycle-slideshow" 
					data-cycle-pause-on-hover="true" 
    				data-cycle-speed="1500" 
    				data-cycle-delay="5000" 
    				data-cycle-prev="#slide_prev" 
    				data-cycle-next="#slide_next" 
    				data-cycle-slides="> div" 
    				data-cycle-swipe=true 
    				data-cycle-log=false>
    				
						<a href=# id="slide_prev">
							<svg version="1.1" id="All_glyphs" xmlns="http://www.w3.org/2000/svg" xmlns:xlink="http://www.w3.org/1999/xlink" x="0px" y="0px"
								 width="100.831px" height="100.83px" viewBox="0 0 100.831 100.83" enable-background="new 0 0 100.831 100.83"
								 xml:space="preserve">
							<path class="slider_arrow" d="M52.941,30.246c-1.521,1.484-16.393,17.097-16.393,17.097c-0.811,0.793-1.217,1.83-1.217,2.869
								c0,1.04,0.407,2.078,1.217,2.869c0,0,14.872,15.613,16.393,17.098c1.521,1.484,4.258,1.584,5.883,0
								c1.622-1.583,1.752-3.795-0.001-5.736L45.18,50.212l13.643-14.229c1.753-1.942,1.623-4.152,0.001-5.736
								C57.199,28.661,54.461,28.763,52.941,30.246z"/>
							<circle class="slider_circle" fill="none" stroke-width="10" cx="50.415" cy="50.415" r="44.915"/>
							</svg>
						</a> 
    					<a href=# id="slide_next">
							<svg version="1.1" id="All_glyphs" xmlns="http://www.w3.org/2000/svg" xmlns:xlink="http://www.w3.org/1999/xlink" x="0px" y="0px"
								 width="100.831px" height="100.83px" viewBox="0 0 100.831 100.83" enable-background="new 0 0 100.831 100.83"
								 xml:space="preserve">
							<path class="slider_arrow" d="M47.479,70.179C49,68.694,63.872,53.082,63.872,53.082c0.811-0.793,1.217-1.83,1.217-2.869c0-1.04-0.407-2.078-1.217-2.869
								c0,0-14.872-15.613-16.393-17.098c-1.521-1.484-4.258-1.584-5.883,0c-1.622,1.583-1.752,3.795,0.001,5.736l13.643,14.23
								L41.597,64.442c-1.753,1.942-1.623,4.152-0.001,5.736C43.221,71.764,45.958,71.662,47.479,70.179z"/>
							<circle class="slider_circle" fill="none" stroke-width="10" cx="50.415" cy="50.415" r="44.915"/>
							</svg>
    					</a>
						<?php
						$i = 1;
						while(has_sub_field("hp_sliders")): ?>

							<?php if(get_row_layout() == "regular_slider"): // layout: Regular Slider ?>
						 	
						 		<?php  
					 			$bkg_img_full = wp_get_attachment_image_src( get_sub_field('bkg_image'), "full"); 
					 			$bkg_img_md = wp_get_attachment_image_src( get_sub_field('bkg_image'), "medium"); 
					 		?>
					 		<style scoped>  
					      		/* Small devices (tablets, 768px and up) */
								@media (max-width: 768px) { 
									.slide_<?php echo $i; ?>{
										background: url(<?php echo $bkg_img_md[0]; ?>) no-repeat center center;
										background-size: cover;
									}
								}
								@media (min-width: 767px) { 
									.slide_<?php echo $i; ?>{
										background: url(<?php echo $bkg_img_full[0]; ?>) no-repeat center center;
										background-size: cover;
									}
								}
				    		</style>

								<div class="slide slide_<?php echo $i; ?>" <?php if($i>1) echo ' style="display:none;"'; ?>>
									<h3><?php the_sub_field("title"); ?></h3>
									<h4><?php the_sub_field("quote"); ?></h4><br>
									<div class="author_name">
										<?php the_sub_field("author_name"); ?>
									</div><!-- /.author_name --> 
									<div class="author_title">
										<?php the_sub_field("author_title"); ?>
									</div><!-- /.author_title -->
									
									<a class="btn btn-1 btn-primary" href="<?php the_sub_field('button_1_link'); ?>"><?php the_sub_field("button_1_text"); ?></a>
									<a class="btn btn-2 btn-success" href="<?php the_sub_field('button_2_link'); ?>"><?php the_sub_field("button_2_text"); ?></a>
								</div>
						 
							<?php elseif(get_row_layout() == "custom_slider"): // layout: Custom Slider ?>
						 		
						 		<div class="slide slide_<?php echo $i; ?>" <?php if($i>1) echo ' style="display:none;"'; ?>>
									<?php the_sub_field("slider_html"); ?>
								</div>
						 
							<?php endif; ?>
						 	<?php $i++; ?>
						<?php endwhile; ?>
					
					</div><!-- /.slider -->

					<div class="wrapper mission-statement">
						<h1><?php the_field('headline_1')?></h1>
						<h2><?php the_field('headline_2')?></h2>	
					</div><!-- /.wrapper -->
					
					<div class="wrapper section_links">
						<div class="row">
							
								<?php if(get_field('section_links')): ?>
								  
									<?php while(has_sub_field('section_links')): ?>
								 	
									 	<div class="col-xs-24 col-sm-8 section_link">	
											<h3><a href="<?php the_sub_field('page_link')?>"><?php the_sub_field('title')?></a></h3>
											<a class="sec_image" href="<?php the_sub_field('page_link')?>"><?php echo wp_get_attachment_image( get_sub_field('image'), "large" , false, array('class'=>'section_links_img')); ?></a><br>
											<h4><?php the_sub_field('text')?></h4>
									 	</div><!-- .col-sm-24 col-md-8 -->

									<?php endwhile; ?>
	 
								<?php endif; ?>
							
						</div><!-- .row -->
					</div><!-- /.wrapper -->
					
					<div class="latest_news">
						<div class="wrapper">
							<div class="row">
								<div class="col-xs-24">
									<img class="news_arc" src="<?php bloginfo('template_directory'); ?>/images/bkg_news.png" alt="">
									<h3>News</h3>
									<svg enable-background="new 0 0 40 40" viewBox="0 0 40 40" x="0px" xml:space="preserve" xmlns="http://www.w3.org/2000/svg" xmlns:cc="http://creativecommons.org/ns#" xmlns:dc="http://purl.org/dc/elements/1.1/"><g id="background"><rect fill="none" height="32" width="32"/></g><g id="news_1_"><path fill="#bdc3c7" d="M4,14h20v-2H4V14z M15,26h7v-2h-7V26z M15,22h9v-2h-9V22z M15,18h9v-2h-9V18z M4,26h9V16H4V26z M28,10V6H0v22c0,0,0,4,4,4   h25c0,0,3-0.062,3-4V10H28z M4,30c-2,0-2-2-2-2V8h24v20c0,0.921,0.284,1.558,0.676,2H4z"/></g></svg>
									<?php
									$args=array(
									  'post_type' => 'post',
									  'posts_per_page' => 1,
									);
									
									$loop = new WP_Query( $args );
									while($loop->have_posts()): $loop->the_post(); ?>
										
											<a class="latest_title" href="<?php the_permalink(); ?>"><?php the_title(); ?></a>
											<a class="read_more" href="<?php the_permalink(); ?>">Read More</a>
									
									<?php endwhile; wp_reset_postdata(); ?>
								</div><!-- .col-xs-24 -->
							</div><!-- .row -->
						</div><!-- /.wrapper -->
					</div><!-- /.lastest_news -->
					

					<div class="awards">
						<div class="wrapper">
							<?php if(get_field('awards')): ?>
							  	<?php $i=1; ?>
							  	<div class="award_slider cycle-slideshow" 
									data-cycle-pause-on-hover="true" 
				    				data-cycle-speed="500" 
				    				data-cycle-timeout="4000" 
				    				data-cycle-prev="#awrad_prev" 
				    				data-cycle-next="#awardslide_next" 
				    				data-cycle-slides="> div" 
				    				data-cycle-swipe=true 
				    				data-cycle-log=false>
								<?php while(has_sub_field('awards')): ?>
							 
									<div class="row" <?php if($i>1) echo 'style="display:none;"' ?>>
										<div class="col-xs-12 col-sm-10">
											<h3>Awards</h3>
											<h4><?php the_sub_field('name')?></h4>
										</div><!-- .col-xs-12 col-sm-9 -->
										<div class="award-icon col-xs-12 col-sm-4">
											<table>
											<tr>
											<td>
											<?php  echo wp_get_attachment_image( get_sub_field('image'), "medium" , false, array('class'=>'award_image')); ?>
											</td>
											</tr>
											</table>
										</div><!-- .col-xs-12 col-sm-5 -->
										<div class="award-desc col-xs-24 col-sm-10">
											<?php the_sub_field('description')?>
										</div><!-- .col-xs-24 col-sm-10 -->
									</div><!-- .row -->
							 		<?php $i++; ?>
								<?php endwhile; ?>
							 </div><!-- /.award_slider -->
							<?php endif; ?>

						</div><!-- /.wrapper -->
					</div><!-- /.awards -->
						

					<div class="our-clients">
						<div class="wrapper">
							<h3>We work with great brands to improve their business technology</h3>
							<div class="sub-title">
								Here are a few of the incredible brands that we have partnered with to support their business.
							</div><!-- /.sub-title -->
						</div><!-- /.wrapper -->
						<?php if(get_field('client_logos')): ?>
							  	
						  	<ul id="logo-scroller">
							<?php while(has_sub_field('client_logos')): ?>
						 
								<li><a href="<?php if(get_sub_field('link') !=='') echo get_sub_field('link'); else echo '#'; ?>" <?php if(get_sub_field('link') !=='') echo ' target="_blank"'; else echo 'class="no-link"'; ?>>
									<?php  echo wp_get_attachment_image( get_sub_field('logo'), "medium" , false, array('class'=>'logo_image')); ?>
								</a></li>
						 
							<?php endwhile; ?>
						 	</ul><!-- /.logo-scroller -->
						<?php endif; ?>
							
						<div class="wrapper">
							Want to join the team? <a href="">Contact us today!</a>
						</div><!-- /.wrapper -->
					</div><!-- /.our-clients -->
				<?php
			
				endwhile;

			?>

		</div><!-- #content -->
	</div><!-- #primary -->
</div><!-- #main-content -->

<?php
get_footer();
