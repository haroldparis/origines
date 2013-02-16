<?php
/**
 * Name: Origines
 * GitHub URI: https://github.com/haroldparis/origines
 * Description: Origines template for categories.
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

<?php get_header(); ?>

<div class="container">

<div class="row" >

	<div class="span9 content" role="main" itemprop="mainContentOfPage">
	
		<?php if ( function_exists('mybread') ) mybread(); ?>
			
		<header class="entry-header page-header">
			<h1 class="entry-title">
				<?php printf( __( 'Category: %s', 'origines' ), single_cat_title('', false) ); ?>
			</h1>
		</header><!-- .page-header -->
		
		<?php 
		$category_description = category_description();
		if ( ! empty( $category_description ) )
		echo '<div class="category-description well"><p>' . $category_description . '</p></div><br>';
		?>

		<?php get_template_part( 'loop' ); ?>
		
	</div><!-- .span9 -->

	<?php get_sidebar(); ?>
	
</div><!-- .row -->

<?php get_footer(); ?>