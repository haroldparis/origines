<?php
/**
 * Template Name: Front page
 *
 * Name: Origines WordPress Theme
 * GitHub URI: https://github.com/haroldparis/origines
 * Description: Origines page template for front page. No sidebar, no title, you can put anything you want.
 * Author: Harold Paris
 * Twitter: @haroldparis
 * Author website: http://www.tribeleadr.com/
 */
?>

<?php get_header(); ?>

<div id="o-wrapper" class="container">

	<div class="row">
		
		<div id="o-main" class="span12">

			<?php if ( have_posts() ) : ?>

				<?php while ( have_posts() ) : the_post(); ?>

					<div id="o-content" class="o-front-page-content o-entry-content clearfix" itemprop="MainContentofPage">

						<?php the_content(); ?>

					</div> <!-- /#o-content -->

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
			
		</div><!-- /#o-main -->

	</div><!-- /.row -->

</div><!-- /#o-wrapper -->

<?php get_footer(); ?>