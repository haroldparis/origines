<?php get_header(); ?>

<div class="container">

<div class="row" >
	<div class="span9 content" role="main" itemprop="mainContentOfPage">
	
		<?php if ( function_exists('mybread') ) mybread(); ?>
	
		<?php get_template_part( 'loop', 'page' ); ?>
		
	</div><!-- .span9 -->

	<?php get_sidebar(); ?>
	
</div><!-- .row -->

<?php get_footer(); ?>