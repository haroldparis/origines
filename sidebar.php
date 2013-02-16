<?php
/**
 * Name: Origines
 * GitHub URI: https://github.com/haroldparis/origines
 * Description: Origines template for the sidebar.
 * Version: 0.2
 * Author: Harold Paris
 * Twitter: @haroldparis
 * Author website: http://www.tribeleadr.com/
 * Licence:
 * This file is part of Origines.
 * Origines is free software: you can redistribute it and/or modify
 * it under the terms of the GNU General Public License as published by
 * the Free Software Foundation, either version 3 of the License, or
 * any later version.
 * Origines is distributed in the hope that it will be useful,
 * but WITHOUT ANY WARRANTY; without even the implied warranty of
 * MERCHANTABILITY or FITNESS FOR A PARTICULAR PURPOSE.  See the
 * GNU General Public License for more details.
 * You should have received a copy of the GNU General Public License
 * along with Origines.  If not, see <http://www.gnu.org/licenses/>.
 */
?>

<?php if ( is_active_sidebar( 'sidebar' ) ) : ?>
	<div id="sidebar" class="widget-area span3" role="complementary">
		<?php dynamic_sidebar( 'sidebar' ); ?>
	</div><!-- #sidebar -->
<?php endif; ?>