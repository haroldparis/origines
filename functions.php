<?php
/**
 * Origines functions and definitions.
 */

/**
 * Registers our widget areas.
 */
function origines_widgets_init() {
	register_sidebar( array(
		'name' => __( 'Sidebar', 'origines' ),
		'id' => 'sidebar',
		'description' => __( 'Appears on posts and pages except if full-width template is selected.', 'origines' ),
		'before_widget' => '<aside id="sidebar" class="widget">',
		'after_widget' => '</aside>',
		'before_title' => '<h3 class="widget-title">',
		'after_title' => '</h3>',
	) );
	
	register_sidebar( array(
		'name' => __( 'Footer 1', 'origines' ),
		'id' => 'footer1',
		'description' => __( 'Appears on posts and pages on the left side of the footer.', 'origines' ),
		'before_widget' => '<div id="footer1" class="widget">',
		'after_widget' => '</div>',
		'before_title' => '<h3 class="widget-title">',
		'after_title' => '</h3>',
	) );
	
	register_sidebar( array(
		'name' => __( 'Footer 2', 'origines' ),
		'id' => 'footer2',
		'description' => __( 'Appears on posts and pages on the center of the footer.', 'origines' ),
		'before_widget' => '<div id="footer2" class="widget">',
		'after_widget' => '</div>',
		'before_title' => '<h3 class="widget-title">',
		'after_title' => '</h3>',
	) );
	
	register_sidebar( array(
		'name' => __( 'Footer 3', 'origines' ),
		'id' => 'footer3',
		'description' => __( 'Appears on posts and pages on the right side of the footer.', 'origines' ),
		'before_widget' => '<div id="footer3" class="widget">',
		'after_widget' => '</div>',
		'before_title' => '<h3 class="widget-title">',
		'after_title' => '</h3>',
	) );
}
add_action( 'widgets_init', 'origines_widgets_init' );

/**
 * Registers our menus.
 */
function origines_menu_init() {
	register_nav_menus(
		array( 'header-menu' => __( 'Header Menu' ) )
	);
	
	register_nav_menus(
		array( 'footer-menu' => __( 'Footer Menu' ) )
	);
}
add_action( 'init', 'origines_menu_init' );

/**
 * Change current-menu-item to active.
 */
add_filter( 'nav_menu_css_class', 'additional_active_item_classes', 10, 2 );
function additional_active_item_classes($classes = array(), $menu_item = false){
    if(in_array('current-menu-item', $menu_item->classes)){
        $classes[] = 'active';
    }
    return $classes;
}

?>