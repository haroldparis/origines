<?php get_header(); ?>

<div class="container">

<div class="row">
	<div class="span9">
		<?php while ( have_posts() ) : the_post(); // Start the Loop. ?>
			
		<article id="post-<?php the_ID(); ?>" <?php post_class(); ?>>
					
		<header class="entry-header page-header">
			<h1 class="entry-title"><?php the_title(); ?></h1>
		</header><!-- .page-header -->
		
		<div class="entry-content clearfix">
			<?php the_content(); ?>
		</div><!-- .entry-content -->
	
		<?php endwhile; // end the Loop. ?>
		
	</div><!-- .span9 -->

<?php get_sidebar(); ?>

<?php get_footer(); ?>