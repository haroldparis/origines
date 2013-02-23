<?php
/**
 * Name: Origines WordPress Theme
 * GitHub URI: https://github.com/haroldparis/origines
 * Description: Origines template for tags.
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
				<?php printf( __( 'All posts tagged with: %s', 'origines' ), single_tag_title('', false) ); ?>
			</h1> <!-- /.o-title -->
		</header> <!-- /.o-title-header -->

		<div id="o-content" itemprop="MainContentofPage">
		
			<?php 
			$tag_description = tag_description();
			if ( ! empty( $tag_description ) ): ?>

				<div id="o-tag-info" class="well">
					<h4 id="o-tag-info-title" class="media-heading">
						<?php printf( __( 'About the tag: %s', 'origines' ), single_tag_title('', false) ); ?>
					</h4> <!-- /#o-tag-description-title -->
					<?php echo $tag_description; ?>
				</div> <!-- /#o-tag-info -->

				<br>

			<?php
			endif;
			?>

			<?php get_template_part( 'loop' ); ?>

		</div> <!-- /#o-content -->
		
	</div><!-- /#o-main -->

	<?php get_sidebar(); ?>
	
</div><!-- /#o-wrapper -->

<?php get_footer(); ?>