<?php
/**
 * Name: Origines WordPress Theme
 * GitHub URI: https://github.com/haroldparis/origines
 * Description: Origines template for categories.
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
					<?php printf( __( 'All posts in %s', 'origines' ), single_cat_title('', false) ); ?>
				</h1> <!-- /.o-title -->
			</header> <!-- /.o-title-header -->

			<div id="o-content" itemprop="MainContentofPage">
			
				<?php 
				$category_description = category_description();
				if ( ! empty( $category_description ) ): ?>

					<div id="o-category-info" class="well">
						<h4 id="o-category-info-title" class="media-heading">
							<?php printf( __( 'About the category: %s', 'origines' ), single_cat_title('', false) ); ?>
						</h4> <!-- /#o-category-description-title -->
						<?php echo $category_description; ?>
					</div> <!-- /#o-category-info -->

				<?php
				endif;
				?>

				<?php get_template_part( 'loop' ); ?>

			</div> <!-- /#o-content -->
			
		</div><!-- /#o-main -->

		<?php get_sidebar(); ?>

	</div><!-- /.row -->
	
</div><!-- /#o-wrapper -->

<?php get_footer(); ?>