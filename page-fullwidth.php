<?php
/**
 * Template Name: Full width
 *
 * A custom page template without sidebar.
 */
?>

<?php get_header(); ?>

<div class="container">

<div class="row" >
	<div class="span12 content" role="main" itemprop="mainContentOfPage">
	
		<?php if ( function_exists('mybread') ) mybread(); ?>
	
		<?php get_template_part( 'loop', 'page' ); ?>
		
	</div><!-- .span12 -->
	
</div><!-- .row -->

<?php get_footer(); ?>
