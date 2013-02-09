<?php
/**
 * The sidebar containing the main widget area.
 *
 * If no active widgets in sidebar, let's hide it completely.
 *
 */
?>

<?php if ( is_active_sidebar( 'sidebar' ) ) : ?>
	<div id="sidebar" class="widget-area span3" role="complementary">
		<?php dynamic_sidebar( 'sidebar' ); ?>
	</div><!-- #secondary -->
<?php endif; ?>

</div><!-- .row -->