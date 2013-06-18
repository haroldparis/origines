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

			<?php if ( is_active_sidebar( 'before-content' ) ) : ?>
				<?php dynamic_sidebar( 'before-content' ); ?>
			<?php endif; ?>
		
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

						<?php if ( get_the_author_meta( 'twitter' ) ) { ?>
                    		<a class="btn btn-small" href="https://twitter.com/<?php the_author_meta( 'twitter' ); ?>"><i class="icon-user"></i> <?php printf( __( 'Follow %s on Twitter', 'origines' ), get_the_author() ); ?></a>
                		<?php } ?>

 						<?php if ( get_the_author_meta( 'googleplus' ) ) { ?>
              				<a class="btn btn-small" href="<?php the_author_meta( 'googleplus' ); ?>?rel=author"><i class="icon-ok-circle"></i> <?php printf( __( 'Circle %s on Google+', 'origines' ), get_the_author() ); ?></a> 
              			<?php } ?>

                		<?php if ( get_the_author_meta( 'user_url' ) ) { ?>
							<a class="btn btn-small btn-primary" href="<?php the_author_meta( 'user_url' ); ?>"><i class="icon-bookmark icon-white"></i> <?php printf( __( "Visit %s's website", 'origines' ), get_the_author() ); ?></a>
						<?php } ?>

					</div> <!-- /#o-author-description -->
				</div> <!-- /#o-author-info -->

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

			<?php if ( is_active_sidebar( 'after-content' ) ) : ?>
				<?php dynamic_sidebar( 'after-content' ); ?>
			<?php endif; ?>
			
		</div> <!-- /#o-main -->

		<?php get_sidebar(); ?>

	</div><!-- /.row -->
	
</div> <!-- /#o-wrapper -->

<?php get_footer(); ?>