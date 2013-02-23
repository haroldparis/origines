<?php
/**
 * Template Name: Full width
 *
 * Name: Origines WordPress Theme
 * GitHub URI: https://github.com/haroldparis/origines
 * Description: Origines page template without sidebar.
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
	
		<?php get_template_part( 'loop', 'page' ); ?>
		
	</div><!-- /#o-main -->
	
</div><!-- /#o-wrapper -->

<?php get_footer(); ?>
