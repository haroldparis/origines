<?php
/**
 * Name: Origines WordPress Theme
 * GitHub URI: https://github.com/haroldparis/origines
 * Description: Origines template for the loop-page.
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
					
			<header class="o-title-header page-header">
				<h1 class="o-title">
					<?php the_title(); ?>
				</h1> <!-- /.o-title -->
			</header> <!-- /.o-title-header -->
			
			<div id="o-content" class="o-entry-content clearfix" itemprop="MainContentofPage">

				<?php the_content(); ?>

			</div> <!-- /#o-content -->

		</article>
	
	<?php endwhile; // end the Loop. ?>
		
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

	</article><!-- /#post-0 -->

<?php endif; ?>
