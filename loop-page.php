<?php
/**
 * Origines template for the loop-page.
 */
?>

<?php if ( have_posts() ) : ?>

	<?php while ( have_posts() ) : the_post(); ?>
			
		<article id="post-<?php the_ID(); ?>" <?php post_class(); ?>>
					
		<header class="entry-header page-header">
			<h1 class="entry-title"><?php the_title(); ?></h1>
		</header><!-- .page-header -->
		
		<div class="entry-content clearfix">
			<?php the_content(); ?>
		</div><!-- .entry-content -->
	
	<?php endwhile; // end the Loop. ?>
		
<?php else : ?>

	<article id="post-0" class="post no-results not-found">

		<div class="entry-content clearfix">
			<p>Apologies, but no results were found.</p>
		</div><!-- .entry-content -->

	</article><!-- #post-0 -->

<?php endif; ?>
