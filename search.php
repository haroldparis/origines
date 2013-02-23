<?php
/**
 * Name: Origines WordPress Theme
 * GitHub URI: https://github.com/haroldparis/origines
 * Description: Origines template for search.
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

<?php get_header(); ?>

<div id="o-wrapper" class="container">

<div class="row">

	<div id="o-main" class="span9">
	
		<?php if ( function_exists('origines_bread') ) origines_bread(); ?>
		
		<?php if ( have_posts() ) : ?>
	
		<header class="entry-header page-header">
			<h1 class="entry-title">
				<?php printf( __( 'Search Results for: %s', 'origines' ), get_search_query() ); ?>
			</h1>
		</header><!-- .page-header -->

		<?php get_template_part( 'loop' ); ?>
		
		<?php else : ?>
		
		<div id="post-0" class="post no-results not-found">
		
		<header class="entry-header page-header">
			<h1 class="entry-title">
				<?php _e( 'Nothing Found', 'origines' ); ?>
			</h1>
		</header><!-- .page-header -->
		
		<div class="entry-content">
			<p><?php _e( 'Sorry, but nothing matched your search criteria. Please try again with some different keywords.', 'origines' ); ?></p>
		</div><!-- .entry-content -->
		
		</div><!-- #post-0 -->
		
		<?php endif; ?>
		
	</div><!-- /#o-main -->

	<?php get_sidebar(); ?>
	
</div><!-- /#o-wrapper -->

<?php get_footer(); ?>