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
		<div class="col-xs-24 col-sm-9">
			<div class="intro-ribbon">
				<h1>Customer Story: <?php the_title(); ?></h1>
				<h3><?php the_field('banner_text')?></h3>
			</div><!-- /.intro-ribbon -->
		</div><!-- .col-xs-24 col-sm-9 -->
		<div class="col-xs-24 col-sm-10 pull-right cs-logo">
			<?php  echo wp_get_attachment_image( get_field('logo'), "large" , false); ?>
		</div><!-- .col-xs-24 col-sm-10 pull-right -->
	</div><!-- .row -->
	<div class="row">
		<div class="col-xs-24 col-sm-14 cs-summary">
			<?php while(has_sub_field("customer_story")): ?>
			 
				<?php if(get_row_layout() == "paragraph"): // layout: Content ?>
			 
					<div>
						<h2><?php the_sub_field("title"); ?></h2>
						<?php the_sub_field('paragraph_text')?>
					</div>
			 
				<?php elseif(get_row_layout() == "quote"): // layout: File ?>
			 
					<div class="cs-quote">
						<?php the_sub_field("quote_text"); ?>
						<span><?php the_sub_field("author"); ?></span>
					</div>
			 
				<?php endif; ?>
			 
			<?php endwhile; ?>
		</div><!-- .col-xs-24 col-sm-14 -->
		<div class="col-xs-24 col-sm-8 col-sm-offset-2 cs-notables">
		<div class="cs-featured-outcome">
			<svg version="1.1" id="Layer_1" xmlns="http://www.w3.org/2000/svg" xmlns:xlink="http://www.w3.org/1999/xlink" x="0px" y="0px"
				 viewBox="24.872 5.533 50.256 83.967" enable-background="new 24.872 5.533 50.256 83.967"
				 xml:space="preserve">
			<polygon fill="#1f95bc" points="50,20.293 53.369,27.118 60.9,28.213 55.451,33.525 56.736,41.028 50,37.485 43.263,41.028 44.55,33.525 
				39.099,28.213 46.631,27.118 "/>
			<path fill="#1f95bc" d="M38.872,57.341V89.5l11.127-7.875l11.13,7.875V57.341c-3.383,1.599-7.146,2.517-11.129,2.517
				C46.018,59.857,42.255,58.938,38.872,57.341z"/>
			<path fill="#1f95bc" d="M50,55.788c-13.855,0-25.128-11.272-25.128-25.127S36.145,5.533,50,5.533c13.855,0,25.128,11.272,25.128,25.128
				S63.855,55.788,50,55.788L50,55.788z M50,10.533c-11.099,0-20.128,9.029-20.128,20.128c0,11.098,9.029,20.127,20.128,20.127
				c11.1,0,20.128-9.029,20.128-20.127C70.128,19.562,61.1,10.533,50,10.533L50,10.533z"/>
			</svg>
			<div class="cs-outcome">
				100 Hours Saved	
				<span>Every Month due to Better Technology</span>
			</div><!-- /.cs-outcome -->		
		</div><!-- /.cs-featured-outcome -->
		<div class="at_glance side-box">
			<div class="box-title ribbon">
				<?php the_title(); ?> <span>at a glance</span>
			</div><!-- /.box-title -->
		</div><!-- /.at_glance side-box -->

		<div class="cs-highlights side-box">
			<div class="box-title ribbon">
				Highlights <span>from this project</span>
			</div><!-- /.box-title -->			 
		</div><!-- /.cs-highlights side-box -->
		</div><!-- .col-xs-24 col-sm-9 col-sm-offset-1 -->
	</div><!-- .row -->
	
	<div class="entry-content">
		<?php
			the_content( __( 'Continue reading <span class="meta-nav">&rarr;</span>', 'twentyfourteen' ) );
			wp_link_pages( array(
				'before'      => '<div class="page-links"><span class="page-links-title">' . __( 'Pages:', 'twentyfourteen' ) . '</span>',
				'after'       => '</div>',
				'link_before' => '<span>',
				'link_after'  => '</span>',
			) );
		?>
	</div><!-- .entry-content -->
	
	<?php the_tags( '<footer class="entry-meta"><span class="tag-links">', '', '</span></footer>' ); ?>
</article><!-- #post-## -->
