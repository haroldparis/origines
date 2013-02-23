<?php
/**
 *Template Name: Portfolio 3 Columns
 *
 * Name: Origines WordPress Theme
 * GitHub URI: https://github.com/haroldparis/origines
 * Description: Origines template for pages with left-sidebar.
 * Author: Harold Paris
 * Twitter: @haroldparis
 * Author website: http://www.tribeleadr.com/
 */
?>

<?php get_header(); ?>

<div id="o-wrapper" class="container">

	<div class="row">
		
		<div id="o-main" class="span12">

			<?php if ( function_exists('origines_bread') ) origines_bread(); ?>

			<header class="o-title-header page-header">
				<h1 class="o-title">
					<?php echo get_the_title(); ?>
				</h1> <!-- /.o-title -->
			</header> <!-- /.o-title-header -->
	
		<?php get_template_part( 'loop', 'portfolio' ); ?>
		
		</div><!-- /#o-main -->

	</div><!-- /.row -->

</div><!-- /#o-wrapper -->

<?php get_footer(); ?>