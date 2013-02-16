<?php get_header(); ?>

<div class="container">

<div class="row" >

	<div class="span9 content" role="main" itemprop="mainContentOfPage">
	
		<?php if ( function_exists('mybread') ) mybread(); ?>
		
		<?php if ( have_posts() ) : ?>
	
		<header class="entry-header page-header">
			<h1 class="entry-title">
				<?php printf( __( 'Search Results for: %s', 'origines' ), get_search_query() ); ?>
			</h1>
		</header><!-- .page-header -->

		<?php get_template_part( 'loop' ); ?>
		
		<?php else : ?>
		
		<div id="post-0" class="post no-results not-found">
		
		<header class="entry-header page-header">
			<h1 class="entry-title">
				<?php _e( 'Nothing Found', 'origines' ); ?>
			</h1>
		</header><!-- .page-header -->
		
		<div class="entry-content">
			<p><?php _e( 'Sorry, but nothing matched your search criteria. Please try again with some different keywords.', 'origines' ); ?></p>
		</div><!-- .entry-content -->
		
		</div><!-- #post-0 -->
		
		<?php endif; ?>
		
	</div><!-- .span9 -->

	<?php get_sidebar(); ?>
	
</div><!-- .row -->

<?php get_footer(); ?>