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

<?php 
	$loop = new WP_Query( array('post_type' => 'project', 'posts_per_page' => 999) );
?>

<?php if ( $loop ) : ?>

	<div class="row">

	<?php while ( $loop->have_posts() ) : $loop->the_post(); ?>
	
		<article id="project-<?php the_ID(); ?>" class="o-portfolio-element span4" itemprop="MainContentofPage">

			<a class="o-thumbnail-link" href="<?php the_permalink(); ?>" title="<?php the_title(); ?>">
				<?php the_post_thumbnail('', array('class' => 'o-thumbnail')); ?>
			</a>

			<h4 class="o-portfolio-element-title aligncenter"><a class="o-portfolio-element-title-link" href="<?php the_permalink() ?>"><?php the_title(); ?></a></h3>

			<div class="o-portfolio-element-summary aligncenter">
				<?php the_excerpt(); ?>
			</div><!-- .entry-summary -->

			<p class="aligncenter">

				<a class="o-portfolio-element-more-link btn btn-mini" href="<?php the_permalink() ?>"><i class="icon-plus-sign"></i> <?php _e( 'Read more...', 'origines' ); ?></a>

				<?php 
				$url_value = get_post_meta($post->ID, '_url', true);
				// check if the custom field has a value
				if( $url_value != '' ): ?>
				 	<a class="o-portfolio-element-url-link btn btn-mini btn-primary" href="<?php echo $url_value; ?>" target="_blank"><i class="icon-share-alt icon-white"></i> <?php _e( 'Live Preview', 'origines' ); ?></a>
				<?php
				endif;
				?>

			</p>
		
		</article><!-- #project -->
	
	<?php endwhile; ?>

	</div><!-- .row -->

<?php else : ?>

	<article id="project-0" class="o-portfolio-element no-results not-found">

		<div id="o-content" class="o-entry-content clearfix" itemprop="MainContentofPage">
		
			<p><?php _e( 'Apologies, but no results were found.', 'origines' ); ?></p>

		</div> <!-- /#o-content -->
	
	</article><!-- #project -->

<?php endif; ?>
