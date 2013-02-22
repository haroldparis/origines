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
					
			<header class="o-header page-header">
				<h1 class="o-title"><?php the_title(); ?></h1>
			</header><!-- /.o-header -->
		
			<div class="entry-content clearfix">
				<?php the_content(); ?>
			</div><!-- .entry-content -->

			<footer class="entry-meta">
				<p><small><?php origines_entry_meta(); ?></small></p>
				
				<?php if ( get_the_author_meta( 'description' ) ) : ?>
			
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
		
		<?php comments_template( '', true ); ?>
	
	<?php endwhile; ?>
		
<?php else : ?>

	<article id="post-0" class="post no-results not-found">

		<div class="entry-content">
			<p>Apologies, but no results were found.</p>
		</div><!-- .entry-content -->

	</article><!-- #post-0 -->

<?php endif; ?>
