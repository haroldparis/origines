<?php
/**
 * Name: Origines WordPress Theme
 * GitHub URI: https://github.com/haroldparis/origines
 * Description: Origines template for categories.
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

		<header id="o-title-header" class="page-header">
			<h1 id="o-title">
				<?php printf( __( 'All posts in %s', 'origines' ), single_cat_title('', false) ); ?>
			</h1> <!-- /#o-title -->
		</header> <!-- /#o-title-header -->

		<div id="o-content" itemprop="MainContentofPage">
		
			<?php 
			$category_description = category_description();
			if ( ! empty( $category_description ) )
			echo '<div id="o-category-description" class="well"><p>' . $category_description . '</p></div><br>';
			?>

			<?php get_template_part( 'loop' ); ?>

		</div> <!-- /#o-content -->
		
	</div><!-- /#o-main -->

	<?php get_sidebar(); ?>
	
</div><!-- /#o-wrapper -->

<?php get_footer(); ?>