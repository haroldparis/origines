<?php if ( is_active_sidebar( 'footer1' ) or is_active_sidebar( 'footer2' ) or is_active_sidebar( 'footer3' ) ) : ?>

<div class="row">

<?php if ( is_active_sidebar( 'footer1' ) ) : ?>
	<div class="footer-widget-area span<?php origines_footer_count_for_span(); ?>">
		<?php dynamic_sidebar( 'footer1' ); ?>
	</div>
<?php endif; ?>

<?php if ( is_active_sidebar( 'footer2' ) ) : ?>
	<div class="footer-widget-area span<?php origines_footer_count_for_span(); ?>">
		<?php dynamic_sidebar( 'footer2' ); ?>
	</div>
<?php endif; ?>

<?php if ( is_active_sidebar( 'footer3' ) ) : ?>
	<div class="footer-widget-area span<?php origines_footer_count_for_span(); ?>">
		<?php dynamic_sidebar( 'footer3' ); ?>
	</div>
<?php endif; ?>

</div> <!-- .row -->

<?php endif; ?>

<hr />
<footer role="contentinfo">
	<p>Lorem ipsum de Copyright</p>
</footer>

</div><!-- .container -->

<!-- Le javascript -->
<script src="http://code.jquery.com/jquery-1.9.1.min.js"></script>
<script src="<?php echo get_template_directory_uri(); ?>/js/bootstrap.min.js"></script>

</body>
</html>