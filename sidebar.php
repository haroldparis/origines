<?php
/**
 * Name: Origines WordPress Theme
 * GitHub URI: https://github.com/haroldparis/origines
 * Description: Origines template for the sidebar.
 * Author: Harold Paris
 * Twitter: @haroldparis
 * Author website: http://www.tribeleadr.com/
 */
?>

<?php if ( is_active_sidebar( 'sidebar' ) ) : ?>
<aside id="o-sidebar">
	<div class="o-sidebar-widget-area o-widget-area span3">
		<?php dynamic_sidebar( 'sidebar' ); ?>
	</div>
</aside> <!-- /#o-sidebar -->
<?php endif; ?>