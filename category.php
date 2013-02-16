<?php get_header(); ?>

<div class="container">

<div class="row" >

	<div class="span9 content" role="main" itemprop="mainContentOfPage">
	
		<?php if ( function_exists('mybread') ) mybread(); ?>
	
		<header class="entry-header page-header">
			<h1 class="entry-title">
				<?php single_cat_title(); ?>
			</h1>
		</header><!-- .page-header -->
		
		<?php 
		$category_description = category_description();
		if ( ! empty( $category_description ) )
		echo '<div class="category-description well"><p>' . $category_description . '</p></div>';
		?>

		<?php get_template_part( 'loop' ); ?>
		
	</div><!-- .span9 -->

	<?php get_sidebar(); ?>
	
</div><!-- .row -->

<?php get_footer(); ?>