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

      <?php
      $thumb = wp_get_attachment_image_src( get_post_thumbnail_id($post->ID), 'thumbnail' );
      $url = $thumb['0'];
      ?>

  <div class="col-sm-24">

  <div class="community-container" style="background: url(<?=$url?>); background-size: cover;">

  <div class="community-box animated">
	<header class="entry-header community-header">
		<?php

			if ( is_single() ) :
				the_title( '<h1 class="entry-title community-title">', '</h1>' );
			else :
				the_title( '<h1 class="entry-title community-title"><a href="' . esc_url( get_permalink() ) . '" rel="bookmark">', '</a></h1>' );
			endif;
		?>

		<div class="entry-meta time-author">
			<?php
				if ( 'post' == get_post_type() )
					twentyfourteen_posted_on();

				if ( ! post_password_required() && ( comments_open() || get_comments_number() ) ) :
			?>
			<span class="comments-link"><?php comments_popup_link( __( 'Leave a comment', 'twentyfourteen' ), __( '1 Comment', 'twentyfourteen' ), __( '% Comments', 'twentyfourteen' ) ); ?></span>
			<?php
				endif;

				edit_post_link( __( 'Edit', 'twentyfourteen' ), '<span class="edit-link">', '</span>' );
			?>
      <span>By: <?php the_author_link(); ?></span> on <span><?php the_time('F j, Y'); ?></span>
		</div><!-- .entry-meta -->
		<?php if ( in_array( 'category', get_object_taxonomies( get_post_type() ) ) && twentyfourteen_categorized_blog() ) : ?>
		<div class="entry-meta">
			<div class="blog-cat-links"><span><?php echo get_the_category_list( _x( '</span><span>', 'Used between list items, there is a space after the comma.', 'twentyfourteen' ) ); ?></span></div>
		</div>
		<?php
			endif;
			?>
	</header><!-- .entry-header -->
  <div class="community-box-hide animated">
  	<?php if ( is_search() ) : ?>
  	<div class="community-summary">
  		<?php the_excerpt(); ?>
  	</div><!-- .entry-summary -->
  	<?php else : ?>
  	<div class="community-content">
  		<?php
  			//the_content( __( 'Continue reading <span class="meta-nav">&rarr;</span>', 'twentyfourteen' ) );
  			the_excerpt();
  			wp_link_pages( array(
  				'before'      => '<div class="page-links"><span class="page-links-title">' . __( 'Pages:', 'twentyfourteen' ) . '</span>',
  				'after'       => '</div>',
  				'link_before' => '<span>',
  				'link_after'  => '</span>',
  			) );
  		?>
  	</div><!-- .community-content -->
    <a class="btn btn-primary" href="<?php the_permalink(); ?>">Read This Story</a>
  	<?php endif; ?>
  </div><!-- .community-box-hide-->
  </div><!-- .community-box -->
  </div><!-- .community-container-->
	</div><!-- .col-sm-24 -->
  </div><!-- .row -->
</article><!-- #post-## -->
