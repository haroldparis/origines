<?php
/**
 * Name: Origines WordPress Theme
 * GitHub URI: https://github.com/haroldparis/origines
 * Description: Origines template for the loop.
 * Author: Harold Paris
 * Twitter: @haroldparis
 * Author website: http://www.tribeleadr.com/
 */
?>

<?php if ( have_posts() ) : ?>

	<?php while ( have_posts() ) : the_post(); ?>
	
		<article id="post-<?php the_ID(); ?>" <?php post_class(); ?>>

			<header class="o-title-header">
				<h2 class="o-title">
					<a class="o-title-link" href="<?php the_permalink(); ?>" title="<?php echo esc_attr( sprintf( __( 'Permalink to %s', 'twentytwelve' ), the_title_attribute( 'echo=0' ) ) ); ?>">
						<?php the_title(); ?>
					</a>
				</h2> <!-- /.o-title -->
			</header> <!-- /.o-title-header -->

			<?php if ( is_search() ) : ?>
		
			<div class="o-entry-summary">
				<?php the_excerpt(); ?>
			</div><!-- .entry-summary -->
		
			<?php else : ?>
		
			<div class="o-entry-content">

				<a class="o-thumbnail-link" href="<?php the_permalink(); ?>" title="<?php echo esc_attr( sprintf( __( 'Permalink to %s', 'twentytwelve' ), the_title_attribute( 'echo=0' ) ) ); ?>">
					<?php the_post_thumbnail('thumbnail', array('class' => 'o-thumbnail')); ?>
				</a>

				<?php the_content( __( '<p><button class="btn btn-small"><i class="icon-plus-sign"></i> Read more...</button></p>', 'origines' ) ); ?>
			
			</div><!-- /.o-entry-content -->
		
			<?php endif; ?>

			<footer class="o-entry-meta">
				<p class="o-entry-meta-text"><small><?php origines_entry_meta(); ?></small></p>
			</footer><!-- .entry-meta -->
			
			<div class="clearfix"></div>
		
		<hr />
		
		</article><!-- #post -->
	
	<?php endwhile; ?>
		
	<?php if (  $wp_query->max_num_pages > 1 ) : ?>

		<nav class="o-page-nav">
			
			<ul class="pager">
		  		<li class="previous">
		    		<?php next_posts_link( __('<i class="icon-arrow-left"></i> Previous posts') ); ?>
		  		</li>
		  		<li class="next">
		    		<?php previous_posts_link( __('Next posts <i class="icon-arrow-right"></i>') ); ?>
		  		</li>
			</ul>

		</nav><!-- /.o-page-nav -->
		
	<?php endif; ?>

<?php else : ?>

	<article id="post-0" class="post no-results not-found">

		<header class="o-title-header" class="page-header">
			<h1 class="o-title">
				<?php _e( 'Nothing Found', 'origines' ); ?>
			</h1> <!-- /.o-title -->
		</header> <!-- /.o-title-header -->

		<div id="o-content" class="o-entry-content clearfix" itemprop="MainContentofPage">
		
			<p><?php _e( 'Apologies, but no results were found.', 'origines' ); ?></p>

		</div> <!-- /#o-content -->

	</article><!-- #post-0 -->

<?php endif; ?>
