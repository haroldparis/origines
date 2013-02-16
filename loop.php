<?php
/**
 * Name: Origines WordPress Theme
 * GitHub URI: https://github.com/haroldparis/origines
 * Description: Origines template for the loop.
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
					
			<header class="entry-header">
				<?php the_post_thumbnail(); ?>
				<?php if ( is_single() ) : ?>
					<h1 class="entry-title"><?php the_title(); ?></h1>
					<?php else : ?>
					<h1 class="entry-title">
						<a href="<?php the_permalink(); ?>" title="<?php echo esc_attr( sprintf( __( 'Permalink to %s', 'twentytwelve' ), the_title_attribute( 'echo=0' ) ) ); ?>" rel="bookmark"><?php the_title(); ?></a>
					</h1>
				<?php endif; ?>
			</header><!-- .entry-header -->

			<?php if ( is_search() ) : ?>
		
			<div class="entry-summary">
				<?php the_excerpt(); ?>
			</div><!-- .entry-summary -->
		
			<?php else : ?>
		
			<div class="entry-content">
				<?php the_content( __( '<p><button class="btn btn-small"><i class="icon-plus-sign"></i> Continue reading...</button></p>', 'origines' ) ); ?>
			</div><!-- .entry-content -->
		
			<?php endif; ?>

			<footer class="entry-meta">
				<p class=""><small><?php origines_entry_meta(); ?></small></p>
			</footer><!-- .entry-meta -->
			
			<div class="clearfix"></div>
		
		<hr />
		
		</article><!-- #post -->
	
	<?php endwhile; ?>
		
	<?php if (  $wp_query->max_num_pages > 1 ) : ?>
		
	<ul class="pager">
  		<li class="previous">
    		<?php next_posts_link( __('<i class="icon-arrow-left"></i> Previous post') ); ?>
  		</li>
  		<li class="next">
    		<?php previous_posts_link( __('Next post <i class="icon-arrow-right"></i>') ); ?>
  		</li>
	</ul>
		
	<?php endif; ?>

<?php else : ?>

	<article id="post-0" class="post no-results not-found">

		<div class="entry-content">
			<p>Apologies, but no results were found.</p>
		</div><!-- .entry-content -->

	</article><!-- #post-0 -->

<?php endif; ?>
