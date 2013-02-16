<?php get_header(); ?>

<div class="container">

<div class="row" >

	<div class="span9 content" role="main" itemprop="mainContentOfPage">
	
		<?php if ( function_exists('mybread') ) mybread(); ?>
			
		<header class="entry-header page-header">
			<h1 class="entry-title">
				<?php printf( __( 'Tag: %s', 'origines' ), single_tag_title('', false) ); ?>
			</h1>
		</header><!-- .page-header -->
		
		<?php 
		$tag_description = tag_description();
		if ( ! empty( $tag_description ) )
		echo '<div class="tag-description well"><p>' . $tag_description . '</p></div>';
		?>

		<?php get_template_part( 'loop' ); ?>
		
	</div><!-- .span9 -->

	<?php get_sidebar(); ?>
	
</div><!-- .row -->

<?php get_footer(); ?>