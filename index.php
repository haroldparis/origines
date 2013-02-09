<?php get_header(); ?>

<div class="container">

<?php if ( is_active_sidebar( 'hero' ) ) : ?>
	<div id="hero" class="widget-area hero-unit">
		<?php dynamic_sidebar( 'hero' ); ?>
	</div><!-- #hero -->
<?php endif; ?>

<div class="row">
	<div class="span9">

		<?php if ( have_posts() ) : ?>

			<?php while ( have_posts() ) : the_post(); // Start the Loop. ?>
					<article id="post-<?php the_ID(); ?>" <?php post_class(); ?>>
					
		<header class="entry-header">
			<?php the_post_thumbnail(); ?>
			<?php if ( is_single() ) : ?>
			<h1 class="entry-title"><?php the_title(); ?></h1>
			<?php else : ?>
			<h1 class="entry-title">
				<a href="<?php the_permalink(); ?>" title="<?php echo esc_attr( sprintf( __( 'Permalink to %s', 'twentytwelve' ), the_title_attribute( 'echo=0' ) ) ); ?>" rel="bookmark"><?php the_title(); ?></a>
			</h1>
			<?php endif; // is_single() ?>
		</header><!-- .entry-header -->

		<?php if ( is_search() ) : // Only display Excerpts for Search. ?>
		
		<div class="entry-summary">
			<?php the_excerpt(); ?>
		</div><!-- .entry-summary -->
		
		<?php else : ?>
		
		<div class="entry-content clearfix">
			<?php the_content( __( '<p>Continue reading <span class="meta-nav">&rarr;</span></p>', 'origines' ) ); ?>
		</div><!-- .entry-content -->
		
		<?php endif; ?>

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
							<a href="<?php echo esc_url( get_author_posts_url( get_the_author_meta( 'ID' ) ) ); ?>" rel="author">
								<?php printf( __( 'View all posts by %s <span class="meta-nav">&rarr;</span>', 'origines' ), get_the_author() ); ?>
							</a>
						</div><!-- .author-link	-->
					</div><!-- .author-description -->
				</div><!-- .author-info -->
			<?php endif; ?>
			<hr />
		</footer><!-- .entry-meta -->
	</article><!-- #post -->
	
			<?php endwhile; // end the Loop. ?>

		<?php else : ?>

			<article id="post-0" class="post no-results not-found">

				<div class="entry-content">
					<p>Apologies, but no results were found.</p>
				</div><!-- .entry-content -->

			</article><!-- #post-0 -->

		<?php endif; // end have_posts() check. ?>
		
</div><!-- .span8 -->

<?php get_sidebar(); ?>

<?php get_footer(); ?>