<?php get_header(); ?>

<div class="container" role="main" itemprop="mainContentOfPage">

<?php origines_home_head(); ?>

<div class="row" >
	<div class="span9 content">
	
		<?php if ( function_exists('mybread') ) mybread(); ?>

		<?php get_template_part( 'loop' ); ?>
		
	</div><!-- .span9 -->

	<?php get_sidebar(); ?>
	
</div><!-- .row -->

<?php get_footer(); ?>