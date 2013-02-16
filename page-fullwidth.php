<?php
/**
 * Template Name: Full width
 *
 * Name: Origines WordPress Theme
 * GitHub URI: https://github.com/haroldparis/origines
 * Description: Origines page template without sidebar.
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

<div class="container">

<div class="row" >
	<div class="span12 content" role="main" itemprop="mainContentOfPage">
	
		<?php if ( function_exists('mybread') ) mybread(); ?>
	
		<?php get_template_part( 'loop', 'page' ); ?>
		
	</div><!-- .span12 -->
	
</div><!-- .row -->

<?php get_footer(); ?>
