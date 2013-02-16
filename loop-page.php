<?php
/**
 * Name: Origines
 * GitHub URI: https://github.com/haroldparis/origines
 * Description: Origines template for the loop-page.
 * Version: 0.2
 * Author: Harold Paris
 * Twitter: @haroldparis
 * Author website: http://www.tribeleadr.com/
 * Licence:
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
