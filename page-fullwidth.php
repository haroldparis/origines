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

			<?php if ( is_active_sidebar( 'before-content' ) ) : ?>
				<?php dynamic_sidebar( 'before-content' ); ?>
			<?php endif; ?>
		
			<?php if ( function_exists('origines_bread') ) origines_bread(); ?>
		
			<?php get_template_part( 'loop', 'page' ); ?>

			<?php if ( is_active_sidebar( 'after-content' ) ) : ?>
				<?php dynamic_sidebar( 'after-content' ); ?>
			<?php endif; ?>
			
		</div><!-- /#o-main -->

	</div><!-- /.row -->

</div><!-- /#o-wrapper -->

<?php get_footer(); ?>