<?php
/**
 * Name: Origines WordPress Theme
 * GitHub URI: https://github.com/haroldparis/origines
 * Description: Origines template for archives.
 * Author: Harold Paris
 * Twitter: @haroldparis
 * Author website: http://www.tribeleadr.com/
 */
?>

<?php get_header(); ?>

<div id="o-wrapper" class="container">

	<div class="row">

		<div id="o-main" class="span9">
		
			<?php if ( function_exists('origines_bread') ) origines_bread(); ?>

			<header class="o-title-header page-header">
				<h1 class="o-title">
					<?php _e( 'Archives from: ', 'origines' ); the_time('F Y'); ?>
				</h1> <!-- /.o-title -->
			</header> <!-- /.o-title-header -->

			<div id="o-content" itemprop="MainContentofPage">

				<?php get_template_part( 'loop' ); ?>

			</div> <!-- /#o-content -->
			
		</div><!-- /#o-main -->

		<?php get_sidebar(); ?>

	</div><!-- /.row -->
	
</div><!-- /#o-wrapper -->

<?php get_footer(); ?>