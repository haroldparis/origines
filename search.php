<?php
/**
 * Name: Origines WordPress Theme
 * GitHub URI: https://github.com/haroldparis/origines
 * Description: Origines template for search.
 * Author: Harold Paris
 * Twitter: @haroldparis
 * Author website: http://www.tribeleadr.com/
 */
?>

<?php get_header(); ?>

<div id="o-wrapper" class="container">

	<div class="row">

		<div id="o-main" class="span9">

		<?php if ( is_active_sidebar( 'before-content' ) ) : ?>
			<?php dynamic_sidebar( 'before-content' ); ?>
		<?php endif; ?>
		
		<?php if ( function_exists('origines_bread') ) origines_bread(); ?>
			
		<?php if ( have_posts() ) : ?>
		
			<header class="o-title-header page-header">
				<h1 class="o-title">
					<?php printf( __( 'Search Results for: %s', 'origines' ), get_search_query() ); ?>
				</h1> <!-- /.o-title -->
			</header> <!-- /.o-title-header -->

			<div id="o-content" itemprop="MainContentofPage">

				<?php get_template_part( 'loop' ); ?>

			</div> <!-- /#o-content -->
			
		<?php else : ?>
			
			<header id="o-title-header" class="page-header">
				<h1 id="o-title">
					<?php _e( 'Nothing Found', 'origines' ); ?>
				</h1> <!-- /#o-title -->
			</header> <!-- /#o-title-header -->

			<div id="o-content" itemprop="MainContentofPage">
			
				<p><?php _e( 'Sorry, but nothing matched your search criteria. Please try again with some different keywords.', 'origines' ); ?></p>

			</div> <!-- /#o-content -->
			
			<?php endif; ?>

			<?php if ( is_active_sidebar( 'after-content' ) ) : ?>
				<?php dynamic_sidebar( 'after-content' ); ?>
			<?php endif; ?>
			
		</div><!-- /#o-main -->

		<?php get_sidebar(); ?>

	</div><!-- /.row -->
	
</div><!-- /#o-wrapper -->

<?php get_footer(); ?>