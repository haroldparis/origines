<?php get_header(); ?>

<div class="container">

<div class="row">
	<div class="span9">
	
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
		
		<nav class="nav-single clearfix">
			<span class="nav-previous pull-left"><?php previous_post_link( '%link', '<button class="btn meta-nav"><i class="icon-arrow-left"></i> Previous post : <strong>%title</strong></button>' ); ?></span>
			<span class="nav-next pull-right"><?php next_post_link( '%link', '<button class="btn meta-nav">Next post : <strong>%title</strong> <i class="icon-arrow-right"></i></button>' ); ?></span>
		</nav><!-- .nav-single -->
	
		<?php endwhile; // end the Loop. ?>
		
</div><!-- .span8 -->

<?php get_sidebar(); ?>

<?php get_footer(); ?>