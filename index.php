<?php
/**
 * Name: Origines WordPress Theme
 * GitHub URI: https://github.com/haroldparis/origines
 * Description: Origines template for index.
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

<?php origines_home_head(); ?>

<div class="row">

	<div id="o-main" class="span9">

		<div id="o-content" itemprop="MainContentofPage">

			<?php get_template_part( 'loop' ); ?>

		</div> <!-- /#o-content -->
		
	</div><!-- .span9 -->

	<?php get_sidebar(); ?>
	
</div><!-- .row -->

<?php get_footer(); ?>