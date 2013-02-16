<?php
/**
 * Origines template for the loop.
 */
?>

<?php if ( have_posts() ) : ?>

	<?php while ( have_posts() ) : the_post(); ?>
	
		<article id="post-<?php the_ID(); ?>" <?php post_class(); ?>>
					
			<header class="entry-header">
				<?php the_post_thumbnail(); ?>
				<?php if ( is_single() ) : ?>
					<h1 class="entry-title"><?php the_title(); ?></h1>
					<?php else : ?>
					<h1 class="entry-title">
						<a href="<?php the_permalink(); ?>" title="<?php echo esc_attr( sprintf( __( 'Permalink to %s', 'twentytwelve' ), the_title_attribute( 'echo=0' ) ) ); ?>" rel="bookmark"><?php the_title(); ?></a>
					</h1>
				<?php endif; ?>
			</header><!-- .entry-header -->

			<?php if ( is_search() ) : ?>
		
			<div class="entry-summary">
				<?php the_excerpt(); ?>
			</div><!-- .entry-summary -->
		
			<?php else : ?>
		
			<div class="entry-content clearfix">
				<?php the_content( __( '<p><button class="btn"><i class="icon-plus-sign"></i> Continue reading...</button></p>', 'origines' ) ); ?>
			</div><!-- .entry-content -->
		
			<?php endif; ?>

			<footer class="entry-meta">
			
				<p><small><?php origines_entry_meta(); ?></small></p>
			
			</footer><!-- .entry-meta -->
		
		<hr />
		
		</article><!-- #post -->
	
	<?php endwhile; ?>
		
	<?php if (  $wp_query->max_num_pages > 1 ) : ?>
		
	<ul class="pager">
  		<li class="previous">
    		<?php next_posts_link( __('<i class="icon-arrow-left"></i> Previous post') ); ?>
  		</li>
  		<li class="next">
    		<?php previous_posts_link( __('Next post <i class="icon-arrow-right"></i>') ); ?>
  		</li>
	</ul>
		
	<?php endif; ?>

<?php else : ?>

	<article id="post-0" class="post no-results not-found">

		<div class="entry-content">
			<p>Apologies, but no results were found.</p>
		</div><!-- .entry-content -->

	</article><!-- #post-0 -->

<?php endif; ?>
