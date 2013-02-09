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

/**
 * Prints HTML with meta information for current post: categories, tags, permalink, author, and date.
 */
function origines_entry_meta() {
	// Translators: used between list items, there is a space after the comma.
	$categories_list = get_the_category_list( __( ', ', 'origines' ) );

	// Translators: used between list items, there is a space after the comma.
	$tag_list = get_the_tag_list( '', __( ', ', 'origines' ) );

	$date = sprintf( '<a href="%1$s" title="%2$s"><time class="entry-date" datetime="%3$s">%4$s</time></a>',
		esc_url( get_permalink() ),
		esc_attr( get_the_time() ),
		esc_attr( get_the_date( 'c' ) ),
		esc_html( get_the_date() )
	);

	$author = sprintf( '<span class="author vcard"><a class="url fn n" href="%1$s" title="%2$s" rel="author">%3$s</a></span>',
		esc_url( get_author_posts_url( get_the_author_meta( 'ID' ) ) ),
		esc_attr( sprintf( __( 'View all posts by %s', 'origines' ), get_the_author() ) ),
		get_the_author()
	);

	// Translators: 1 is category, 2 is tag, 3 is the date and 4 is the author's name.
	if ( $tag_list ) {
		$utility_text = __( 'This entry was posted in %1$s and tagged %2$s on %3$s<span class="by-author"> by %4$s</span>.', 'origines' );
	} elseif ( $categories_list ) {
		$utility_text = __( 'This entry was posted in %1$s on %3$s<span class="by-author"> by %4$s</span>.', 'origines' );
	} else {
		$utility_text = __( 'This entry was posted on %3$s<span class="by-author"> by %4$s</span>.', 'origines' );
	}

	printf(
		$utility_text,
		$categories_list,
		$tag_list,
		$date,
		$author
	);
}

?>