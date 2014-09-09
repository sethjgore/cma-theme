<?php
/**
 * The default template for displaying content
 *
 * Used for both single and index/archive/search.
 *
 * @package WordPress
 * @subpackage Twenty_Fourteen
 * @since Twenty Fourteen 1.0
 */
?>

<article id="post-<?php the_ID(); ?>" <?php post_class(); ?>>

  <div class="row">
  	<div class="col-xs-24">

	<section class="news-box thumbnail">

    <div class="events-box-header p1 row">
    <div class="col-sm-9">
        <div class="events-box-button btn btn-primary">EVENT</div>
        <div class="events-box-calendar">
        <span class="events-box-calendar-month text-blue">
          SEPT
        </span>
        <span class="events-box-calendar-day text-blue">
          23
        </span>
        </div>
    </div>
    <div class="col-sm-15">
      <?php

        if ( is_single() ) :
          the_title( '<h2 class="events-box-title entry-title mb1">', '</h2>' );
        else :
          the_title( '<h2 class="events-box-title entry-title mb1"><a href="' . esc_url( get_permalink() ) . '" rel="bookmark">', '</a></h2>' );
        endif;
      ?>
    </div>
   </div>

    <div class="news-box-text p1">

	    <div class="mb1 news-box-author">by <span class="text-blue"><?php the_author_link(); ?></span> on <span class="text-blue"><?php the_time('F j, Y'); ?></span></div>
			<?php if ( in_array( 'category', get_object_taxonomies( get_post_type() ) ) && twentyfourteen_categorized_blog() ) : ?>
			<div class="entry-meta">
				<div class="blog-cat-links"><span><?php echo get_the_category_list( _x( '</span><span>', 'Used between list items, there is a space after the comma.', 'twentyfourteen' ) ); ?></span></div>
			</div>
			<?php
				endif;
				?>

		<?php if ( is_search() ) : ?>
		<div class="entry-summary">
			<?php the_content(); ?>
		</div><!-- .entry-summary -->
		<?php else : ?>
		<div class="entry-content">
			<?php
				//the_content( __( 'Continue reading <span class="meta-nav">&rarr;</span>', 'twentyfourteen' ) );
				the_content();
				wp_link_pages( array(
					'before'      => '<div class="page-links"><span class="page-links-title">' . __( 'Pages:', 'twentyfourteen' ) . '</span>',
					'after'       => '</div>',
					'link_before' => '<span>',
					'link_after'  => '</span>',
				) );
			?>
		</div><!-- .entry-content -->
		<?php endif; ?>

	</div><!-- .news-box-text -->
	</section><!-- .news-box -->
	</div><!-- .col-sm-19 -->
  </div><!-- .row -->
</article><!-- #post-## -->
