<?php
/**
 * Template Name: News and Events
 */

get_header(); ?>

<div id="main-content" class="main-content">

	<div id="primary" class="content-area">
		<div id="content" class="site-content" role="main">
		<?php
			// Start the Loop.
			while ( have_posts() ) : the_post();
		?>
			<img class="page-bkg-img" src="<?php bloginfo('template_directory'); ?>/images/bkg-news.jpg" alt=""/>
			<div class="wrapper">
				<div class="row">
					<div class="col-sm-24">
						<div class="internal-header">
							<h1><?php $title = get_the_title(); if(strlen($title)>29) echo '<span style="font-size:35px;">' . $title . '</span>'; else echo $title; ?></h1>
							<h2><?php the_field('subtitle')?></h2>
						</div><!-- /.internal-header -->

              <div class="customer_stories_content">

							<?php
			$post_object = get_field('featured_story');

			if( $post_object ):
			  $featured_id = $post_object->ID;
				// override $post
				$post = $post_object;
				setup_postdata( $post );

				?>
			    <div class="featured-customer-story">
      						<h3>Featured Customer</h3>
      						<div class="row">
      							<div class="col-xs-24 col-sm-11">
      							  <div class="fcs_wrapper">
      							  	<a href="<?php the_permalink(); ?>"><?php  echo wp_get_attachment_image( get_field('featured_cs_image'), "medium" , false, array('class'=>'fcs-image')); ?>
      							  	</a>
      							  </div><!-- .fcs_wrapper -->

      							</div><!-- .col-xs-6 -->
      							<div class="col-xs-24 col-sm-12 col-sm-offset-1">
      							  <h4><?php the_title(); ?></h4>
      								<?php the_field('featured_cs_quote'); ?>
      								<div class="author">
      									<?php the_field('featured_cs_author'); ?>
      								</div><!-- /.author -->
      								<div class="title">
      									<?php the_field('featured_cs_author_title'); ?>
      								</div><!-- /.title --><br>
      								<a class="btn btn-primary" href="<?php the_permalink(); ?>">Read Full Customer Story</a>
      							</div><!-- .col-xs-13 -->
      							</div><!-- .row -->
      				</div><!-- /.featured-customer-story -->
      			    <?php wp_reset_postdata(); // IMPORTANT - reset the $post object so the rest of the page works correctly ?>
      			<?php endif; ?>


              </div><!-- .customer_stories_content -->

					</div><!-- .col-sm-24 col-md-16 -->
				</div><!-- .row -->
			</div><!-- /.wrapper -->
			<div class="all-customer-stories">
				<div class="wrapper">
					<div class="row">
					<div class="col-xs-24 col-sm-6 pull-right">
						<span class="filter_by_solution">Filter By Solution </span>
						<?php
              $taxonomies=get_terms('solution');
              if(count($taxonomies)>0){
                echo '<ul id="filter_handles">';
                echo '<li rel="all-stories">All</li>';
                foreach ($taxonomies as $taxonomy ) {
                  echo '<li rel="'.$taxonomy->slug.'">'. $taxonomy->name. '</li>';
                }
                echo '</ul>';
              }

              ?>
					</div><!-- .col-xs-6 -->
					<div class="col-xs-24 col-sm-18 pull-left">
						<div class="row">
							<?php
						$args=array(
						  'post_type' => 'customer_stories',
						  'posts_per_page' => -1,
						  'post__not_in' => array( $featured_id )
						);

						$loop = new WP_Query( $args );
						echo '<ul id="filter_stories_result">';
						while($loop->have_posts()): $loop->the_post();

						    $solutions = "";
						    $terms = get_the_terms($post->ID, 'solution');
                  if ($terms && ! is_wp_error($terms)) :
              		foreach ($terms as $term){
              		    $solutions .= $term->slug . ' ';
              		}
                  endif;
              ?>


  							<li class="col-xs-24 col-sm-12 col-md-8 all-stories <?php echo $solutions; ?>"  data-id="story_<?php echo $post->ID; ?>">
  							    <?php $permlink = get_permalink(); ?>
  							    <div class="each-story">
  							    	<div class="cs-img-bkg"><a href="<?php echo $permlink; ?>"><?php  echo wp_get_attachment_image( get_field('featured_cs_image'), "meduim" , false, array('class'=>'cs-image-all')); ?></a></div>
                      <div class="cs-short-desc">
                      <a href="<?php echo $permlink; ?>"><?php the_title(); ?></a>
                      </div>
  							    </div><!-- .each-story -->

  							</li><!-- .col-xs-13 -->

						<?php endwhile; echo '</ul>';
						echo '<ul id="filter_stories_all" style="display:none;">';
						while($loop->have_posts()): $loop->the_post();

						    $solutions = "";
						    $terms = get_the_terms($post->ID, 'solution');
                  if ($terms && ! is_wp_error($terms)) :
              		foreach ($terms as $term){
              		    $solutions .= $term->slug . ' ';
              		}
                  endif;
              ?>


  							<li class="col-xs-24 col-sm-12 col-md-8 all-stories <?php echo $solutions; ?>" data-id="story_<?php echo $post->ID; ?>">
  							    <?php $permlink = get_permalink(); ?>
  							    <div class="each-story">
  							    	<div class="cs-img-bkg"><a href="<?php echo $permlink; ?>"><?php  echo wp_get_attachment_image( get_field('featured_cs_image'), "meduim" , false, array('class'=>'cs-image-all')); ?></a></div>
                      <div class="cs-short-desc">
                      <a href="<?php echo $permlink; ?>"><?php the_title(); ?></a>
                      </div>
  							    </div><!-- .each-story -->

  							</li><!-- .col-xs-13 -->

						<?php endwhile; echo '</ul>';

						wp_reset_postdata(); ?>
						</div><!-- .row -->
					</div><!-- .col-xs-18 -->
					</div><!-- .row -->
				</div><!-- .wrapper -->
			</div><!-- .all-customer-stories -->
			<div class="page-action">
				<div class="wrapper">
					<?php the_field('call_to_action_text'); ?>
								<span><?php if(get_field('call_to_action_button_link')): ?></span>
								<a class="btn btn-default" href="<?php the_field('call_to_action_button_link'); ?>?cma_subject=<?php echo get_the_title(); ?>"><?php the_field('call_to_action_button_text'); ?></a>
								<?php endif; ?>
				</div><!-- .wrapper -->
			</div><!-- .page-action -->



		<?php endwhile; ?>
		</div><!-- #content -->
	</div><!-- #primary -->
</div><!-- #main-content -->

<?php
get_footer();
