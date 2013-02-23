<?php
/**
 * Name: Origines WordPress Theme
 * GitHub URI: https://github.com/haroldparis/origines
 * Description: Origines template for authors.
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
	
		<?php
		/* Queue the first post, that way we know
		 * what author we're dealing with (if that is the case).
		 * We reset this later so we can run the loop
		 * properly with a call to rewind_posts().
		 */
		if ( have_posts() ) :
		the_post();
		?>
			
		<header class="o-title-header page-header">
			<h1 class="o-title">
				<?php printf( __( 'All posts by %s', 'origines' ), get_the_author() ); ?>
			</h1> <!-- /.o-title -->
		</header> <!-- /.o-title-header -->
		
		<div id="o-content" itemprop="MainContentofPage">

			<?php if ( get_the_author_meta( 'description' ) ) : ?>
			
			<div id="o-author-info" class="well media">
				<a href="<?php echo esc_url( get_author_posts_url( get_the_author_meta( 'ID' ) ) ); ?>" alt="<?php the_author(); ?>" id="o-author-avatar-link" class="pull-left">
					<?php origines_get_avatar( get_the_author_meta( 'user_email' ), 96); ?>
				</a>
				<div id="o-author-description" class="media-body">
					<h4 id="o-author-info-title" class="media-heading">
						<?php printf( __( 'About %s', 'origines' ), get_the_author() ); ?>
					</h4> <!-- /#o-author-info-title -->
					<p><?php the_author_meta( 'description' ); ?></p>
				</div> <!-- /#o-author-description -->
			</div> <!-- /#o-author-info -->
			
			<br>
		
		<?php endif; ?>
			
		<?php
		/* Since we called the_post() above, we need to
		 * rewind the loop back to the beginning that way
		 * we can run the loop properly, in full.
		 */
		rewind_posts();
		endif;
		?>

			<?php get_template_part( 'loop' ); ?>

		</div> <!-- /#o-content -->
		
	</div> <!-- /#o-main -->

	<?php get_sidebar(); ?>
	
</div> <!-- /#o-wrapper -->

<?php get_footer(); ?>