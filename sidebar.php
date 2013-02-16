<?php
/**
 * The sidebar.
 */
?>

<?php if ( is_active_sidebar( 'sidebar' ) ) : ?>
	<div id="sidebar" class="widget-area span3" role="complementary">
		<?php dynamic_sidebar( 'sidebar' ); ?>
	</div><!-- #sidebar -->
<?php endif; ?>