<?php
/**
 * Name: Origines WordPress Theme
 * GitHub URI: https://github.com/haroldparis/origines
 * Description: Origines template for footer.
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

<?php if ( is_active_sidebar( 'footer1' ) or is_active_sidebar( 'footer2' ) or is_active_sidebar( 'footer3' ) or is_active_sidebar( 'footer4' ) ) : ?>

<aside id="o-footer-top">
	
	<hr />
	
	<div id="o-footer-widget-wrapper" class="row">

		<?php if ( is_active_sidebar( 'footer1' ) ) : ?>
		<div class="o-footer-widget-area o-widget-area span<?php origines_footer_count_for_span(); ?>">
			<?php dynamic_sidebar( 'footer1' ); ?>
		</div>
		<?php endif; ?>

		<?php if ( is_active_sidebar( 'footer2' ) ) : ?>
		<div class="o-footer-widget-area o-widget-area span<?php origines_footer_count_for_span(); ?>">
			<?php dynamic_sidebar( 'footer2' ); ?>
		</div>
		<?php endif; ?>

		<?php if ( is_active_sidebar( 'footer3' ) ) : ?>
		<div class="o-footer-widget-area o-widget-area span<?php origines_footer_count_for_span(); ?>">
			<?php dynamic_sidebar( 'footer3' ); ?>
		</div>
		<?php endif; ?>

		<?php if ( is_active_sidebar( 'footer4' ) ) : ?>
		<div class="o-footer-widget-area o-widget-area span<?php origines_footer_count_for_span(); ?>">
			<?php dynamic_sidebar( 'footer4' ); ?>
		</div>
		<?php endif; ?>

	</div> <!-- /#footer-widget-wrapper -->

</aside> <!-- /#o-footer-top -->

<?php endif; ?>

<footer id="o-footer-bottom">
	<hr />
	<div id="o-copyright" class="pull-left">
		<p><small><?php _e('Copyright &copy;', 'origines') ?> <?php $the_year = date("Y"); echo $the_year; ?> <a href="<?php bloginfo('url');?>"><?php bloginfo('name'); ?></a> <?php _e('All Rights Reserved.', 'origines') ?></small></p>
	</div>
	<div id="o-links" class="pull-right">
		<p><small><?php _e('Proudly Powered by', 'origines') ?> <a href="http://wordpress.org/" title="WordPress">WordPress</a>, <a href="http://twitter.github.com/bootstrap/" title="Bootstrap">Bootstrap</a> <?php _e('and', 'origines') ?> <a href="https://github.com/haroldparis/origines/" title="Themes WordPress">Origines</a> - <?php _e('Design by', 'origines') ?> <a href="http://www.tribeleadr.com/" title="Agence Social Media et Web à Orléans">TRIBELEADR</a></small></p>
	</div>
</footer> <!-- /#o-footer-bottom -->

</div> <!-- /.container -->

<!-- le Bootstrap javascript -->
<script src="http://code.jquery.com/jquery-1.9.1.min.js"></script>
<script src="<?php echo get_template_directory_uri(); ?>/js/bootstrap.min.js"></script>
<script src="<?php echo get_template_directory_uri(); ?>/js/twitter-bootstrap-hover-dropdown.min.js"></script>

<!-- le WordPress footer functions -->
<?php wp_footer(); ?>

</body>
</html>
