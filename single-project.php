<?php 
/**
 * Name: Origines WordPress Theme
 * GitHub URI: https://github.com/haroldparis/origines
 * Description: Origines template for pages.
 * Author: Harold Paris
 * Twitter: @haroldparis
 * Author website: http://www.tribeleadr.com/
 */
?>

<?php get_header(); ?>

<div id="o-wrapper" class="container">

	<div class="row">
		
		<div id="o-main" class="span12">
		
			<?php get_template_part( 'loop', 'project' ); ?>
		
		</div><!-- /#o-main -->

	</div><!-- /.row -->

</div><!-- /#o-wrapper -->

<?php get_footer(); ?>