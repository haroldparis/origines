<?php get_header(); ?>

<div class="container">

<div class="row">
	<div class="span9" itemprop="mainContentOfPage">
	
		<?php if ( function_exists('mybread') ) mybread(); ?>
	
		<?php while ( have_posts() ) : the_post(); // Start the Loop. ?>
			
		<article id="post-<?php the_ID(); ?>" <?php post_class(); ?>>
					
		<header class="entry-header page-header">
			<h1 class="entry-title"><?php the_title(); ?></h1>
		</header><!-- .page-header -->
		
		<div class="entry-content clearfix">
			<?php the_content(); ?>
		</div><!-- .entry-content -->

		<footer class="entry-meta">
			<p><small><?php origines_entry_meta(); ?></small></p>
			<?php if ( is_singular() && get_the_author_meta( 'description' ) ) : // If a user has filled out their description, show a bio on their entries. ?>
				<div class="author-info well media">
					<a href="<?php echo esc_url( get_author_posts_url( get_the_author_meta( 'ID' ) ) ); ?>" alt="<?php the_author(); ?>" id="author-avatar" class="pull-left">
						<?php origines_get_avatar( get_the_author_meta( 'user_email' ), 96); ?>
					</a>
					<div class="author-description media-body">
						<h4 class="media-heading"><?php printf( __( 'About %s', 'origines' ), get_the_author() ); ?></h4>
						<p><?php the_author_meta( 'description' ); ?></p>
						<div class="author-link">
							<a href="<?php echo esc_url( get_author_posts_url( get_the_author_meta( 'ID' ) ) ); ?>" rel="author" class="btn btn-mini btn-info">
								<?php printf( __( '<i class="icon-user"></i> View all posts by %s', 'origines' ), get_the_author() ); ?>
							</a>
						</div><!-- .author-link	-->
					</div><!-- .author-description -->
				</div><!-- .author-info -->
			<?php endif; ?>
		</footer><!-- .entry-meta -->
		</article><!-- #post -->
		
		<ul class="pager">
  			<li class="previous">
    			<?php previous_post_link( '%link', '<i class="icon-arrow-left"></i> Previous post: <strong>%title</strong>' ); ?>
  			</li>
  			<li class="next">
    			<?php next_post_link( '%link', 'Next post: <strong>%title</strong> <i class="icon-arrow-right"></i>' ); ?>
  			</li>
		</ul>
	
		<?php endwhile; // end the Loop. ?>
		
</div><!-- .span8 -->

<?php get_sidebar(); ?>

<?php get_footer(); ?>