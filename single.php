<?php
/**
 * Name: Origines WordPress Theme
 * GitHub URI: https://github.com/haroldparis/origines
 * Description: Origines template for single.
 * Author: Harold Paris
 * Twitter: @haroldparis
 * Author website: http://www.tribeleadr.com/
 */
?>

<?php get_header(); ?>

<div id="o-wrapper" class="container">

<div class="row" >
	<div id="o-main" class="span9">
	
		<?php if ( function_exists('origines_bread') ) origines_bread(); ?>
		
		<?php get_template_part( 'loop', 'single' ); ?>
			
	</div><!-- /#o-main -->

	<?php get_sidebar(); ?>
	
</div><!-- /#o-wrapper -->

<?php get_footer(); ?>