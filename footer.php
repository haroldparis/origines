<?php if ( is_active_sidebar( 'footer1' ) or is_active_sidebar( 'footer2' ) or is_active_sidebar( 'footer3' ) or is_active_sidebar( 'footer4' ) ) : ?>

<hr />

<div class="row footer-widget-area">

<?php if ( is_active_sidebar( 'footer1' ) ) : ?>
	<div class="footer-widget-element span<?php origines_footer_count_for_span(); ?>">
		<?php dynamic_sidebar( 'footer1' ); ?>
	</div>
<?php endif; ?>

<?php if ( is_active_sidebar( 'footer2' ) ) : ?>
	<div class="footer-widget-element span<?php origines_footer_count_for_span(); ?>">
		<?php dynamic_sidebar( 'footer2' ); ?>
	</div>
<?php endif; ?>

<?php if ( is_active_sidebar( 'footer3' ) ) : ?>
	<div class="footer-widget-element span<?php origines_footer_count_for_span(); ?>">
		<?php dynamic_sidebar( 'footer3' ); ?>
	</div>
<?php endif; ?>

<?php if ( is_active_sidebar( 'footer4' ) ) : ?>
	<div class="footer-widget-element span<?php origines_footer_count_for_span(); ?>">
		<?php dynamic_sidebar( 'footer4' ); ?>
	</div>
<?php endif; ?>

</div> <!-- .row -->

<?php endif; ?>

<hr />

<footer role="contentinfo">
	<div id="copyright" class="pull-left">
		<p><small>Copyright &copy; <?php $the_year = date("Y"); echo $the_year; ?> <a href="<?php bloginfo('url');?>"><?php bloginfo('name'); ?></a> All Rights Reserved.</small></p>
	</div>
	<div id="Links" class="pull-right">
		<p><small>Proudly Powered by <a href="http://wordpress.org/" title="WordPress">WordPress</a> and <a href="#" title="Themes WordPress">Origines</a> - Design by <a href="http://www.tribeleadr.com/" title="Agence Social Media et Web à Orléans">TRIBELEADR</a></small></p>
	</div>
</footer>

</div><!-- .container -->

<!-- Le javascript -->
<script src="http://code.jquery.com/jquery-1.9.1.min.js"></script>
<script src="<?php echo get_template_directory_uri(); ?>/js/bootstrap.min.js"></script>
<script src="<?php echo get_template_directory_uri(); ?>/js/twitter-bootstrap-hover-dropdown.min.js"></script>

</body>
</html>