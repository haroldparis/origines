<?php
/**
 * Name: Origines WordPress Theme
 * GitHub URI: https://github.com/haroldparis/origines
 * Description: Origines template for the loop-single.
 * Version: 0.2
 * Author: Harold Paris
 * Twitter: @haroldparis
 * Author website: http://www.tribeleadr.com/
 * Licence:
 * Copyright 2013 TRIBELEADR
 * This file is part of Origines.
 * Origines is free software: you can redistribute it and/or modify
 * it under the terms of the GNU General Public License as published by
 * the Free Software Foundation, either version 3 of the License, or
 * (at your option) any later version.
 * Origines is distributed in the hope that it will be useful,
 * but WITHOUT ANY WARRANTY; without even the implied warranty of
 * MERCHANTABILITY or FITNESS FOR A PARTICULAR PURPOSE.  See the
 * GNU General Public License for more details.
 * You should have received a copy of the GNU General Public License
 * along with Origines.  If not, see <http://www.gnu.org/licenses/>.
 */
?>

<?php if ( have_posts() ) : ?>

	<?php while ( have_posts() ) : the_post(); ?>
			
		<article id="post-<?php the_ID(); ?>" <?php post_class(); ?>>
					
			<header class="o-title-header" class="page-header">
				<h1 class="o-title">
					<?php the_title(); ?>
				</h1> <!-- /.o-title -->
			</header> <!-- /.o-title-header -->
		
			<div id="o-content" class="o-entry-content clearfix" itemprop="MainContentofPage">

				<?php the_content(); ?>

			</div> <!-- /#o-content -->

			<footer class="o-entry-meta">

				<p class="o-entry-meta-text"><small><?php origines_entry_meta(); ?></small></p>
				
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
						<div id="o-author-link">
							<a href="<?php echo esc_url( get_author_posts_url( get_the_author_meta( 'ID' ) ) ); ?>" rel="author" class="btn btn-mini btn-info">
								<?php printf( __( '<i class="icon-user"></i> View all posts by %s', 'origines' ), get_the_author() ); ?>
							</a>
						</div><!-- /#o-author-link	-->
					</div><!-- /#o-author-description -->
				</div><!-- /#o-author-info -->
		
				<?php endif; ?>
		
			</footer><!-- /.o-entry-meta -->

		</article><!-- #post -->

		<nav class="o-page-nav">
		
			<ul class="pager">
	  			<li class="previous">
	    			<?php previous_post_link( '%link', '<i class="icon-arrow-left"></i> '. __( 'Previous post:' ) . ' <strong>%title</strong>' ); ?>
	  			</li>
	  			<li class="next">
	    			<?php next_post_link( '%link', __( 'Next post:' ) . ' <strong>%title</strong> <i class="icon-arrow-right"></i>' ); ?>
	  			</li>
			</ul>

		</nav><!-- /.o-page-nav -->
		
		<?php comments_template( '', true ); ?>
	
	<?php endwhile; ?>
		
<?php else : ?>

	<article id="post-0" class="post no-results not-found">

		<header class="o-title-header page-header">
			<h1 class="o-title">
				<?php _e( 'Nothing Found', 'origines' ); ?>
			</h1> <!-- /.o-title -->
		</header> <!-- /.o-title-header -->

		<div id="o-content" class="o-entry-content clearfix" itemprop="MainContentofPage">
		
			<p><?php _e( 'Apologies, but no results were found.', 'origines' ); ?></p>

		</div> <!-- /#o-content -->

	</article><!-- #post-0 -->

<?php endif; ?>
