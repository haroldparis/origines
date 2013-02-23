<?php
/**
 * Name: Origines WordPress Theme
 * GitHub URI: https://github.com/haroldparis/origines
 * Description: Origines template for the loop-page.
 * Author: Harold Paris
 * Twitter: @haroldparis
 * Author website: http://www.tribeleadr.com/
 */
?>

<?php if ( have_posts() ) : ?>

	<?php while ( have_posts() ) : the_post(); ?>
			
		<article id="post-<?php the_ID(); ?>" <?php post_class(); ?>>
					
			<header class="o-title-header page-header">
				<h1 class="o-title">
					<?php the_title(); ?>
				</h1> <!-- /.o-title -->
			</header> <!-- /.o-title-header -->
			
			<div id="o-content" class="o-entry-content clearfix" itemprop="MainContentofPage">

				<?php the_content(); ?>

			</div> <!-- /#o-content -->

		</article>
	
	<?php endwhile; // end the Loop. ?>
		
<?php else : ?>

	<article id="post-0" class="post no-results not-found">

		<header class="o-title-header page-header">
			<h1 class="o-title">
				<?php _e( 'Nothing Found', 'origines' ); ?>
			</h1> <!-- /.o-title -->
		</header> <!-- /.o-title-header -->

		<div id="o-content" class="o-entry-content clearfix" itemprop="MainContentofPage">
		
			<p><?php _e( 'Apologies, but no results were found.', 'origines' ); ?></p>

		</div> <!-- /#o-content -->

	</article><!-- /#post-0 -->

<?php endif; ?>
