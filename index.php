<?php
/**
 * Name: Origines WordPress Theme
 * GitHub URI: https://github.com/haroldparis/origines
 * Description: Origines template for index.
 * Author: Harold Paris
 * Twitter: @haroldparis
 * Author website: http://www.tribeleadr.com/
 */
?>

<?php get_header(); ?>

<div id="o-wrapper" class="container">

	<?php origines_home_head(); ?>

	<div class="row">

		<div id="o-main" class="span9">

			<div id="o-content" itemprop="MainContentofPage">

				<?php get_template_part( 'loop' ); ?>

			</div> <!-- /#o-content -->
			
		</div><!-- .span9 -->

		<?php get_sidebar(); ?>

	</div><!-- /.row -->

</div><!-- /#o-wrapper -->

<?php get_footer(); ?>