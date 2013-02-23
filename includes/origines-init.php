<?php
/**
 * Name: Origines WordPress Theme
 * GitHub URI: https://github.com/haroldparis/origines
 * Description: Origines theme init.
 * Author: Harold Paris
 * Twitter: @haroldparis
 * Author website: http://www.tribeleadr.com/
 */

/**
 * Function Name: origines_widgets_init
 * Description: Registers our widget areas.
 */
function origines_widgets_init() {
	register_sidebar( array(
		'name' => __( 'Hero', 'origines' ),
		'id' => 'hero',
		'description' => __( 'Appears on the homepage in a Bootstrap Hero Unit. Use text component.', 'origines' ),
		'before_widget' => '<div class="o-widget o-hero-widget" itemprop="MainContentofPage">',
		'after_widget' => '</div>',
		'before_title' => '<header class="o-widget-title o-hero-widget-title entry-header page-header"><h1 class="entry-title">',
		'after_title' => '</h1></header>',
	) );

	register_sidebar( array(
		'name' => __( 'Sidebar', 'origines' ),
		'id' => 'sidebar',
		'description' => __( 'Appears on posts and pages except if full-width template is selected.', 'origines' ),
		'before_widget' => '<div class="o-widget o-sidebar-widget">',
		'after_widget' => '</div>',
		'before_title' => '<h3 class="o-widget-title o-sidebar-widget-title">',
		'after_title' => '</h3>',
	) );
	
	register_sidebar( array(
		'name' => __( 'Footer 1', 'origines' ),
		'id' => 'footer1',
		'description' => __( 'Appears on posts and pages on the left side of the footer.', 'origines' ),
		'before_widget' => '<div class="o-widget o-footer-widget">',
		'after_widget' => '</div>',
		'before_title' => '<h3 class="o-widget-title o-footer-widget-title">',
		'after_title' => '</h3>',
	) );
	
	register_sidebar( array(
		'name' => __( 'Footer 2', 'origines' ),
		'id' => 'footer2',
		'class' => 'footer-widget',
		'description' => __( 'Appears on posts and pages on the center of the footer.', 'origines' ),
		'before_widget' => '<div class="o-widget o-footer-widget">',
		'after_widget' => '</div>',
		'before_title' => '<h3 class="o-widget-title o-footer-widget-title">',
		'after_title' => '</h3>',
	) );
	
	register_sidebar( array(
		'name' => __( 'Footer 3', 'origines' ),
		'id' => 'footer3',
		'description' => __( 'Appears on posts and pages on the right side of the footer.', 'origines' ),
		'before_widget' => '<div class="o-widget o-footer-widget">',
		'after_widget' => '</div>',
		'before_title' => '<h3 class="o-widget-title o-footer-widget-title">',
		'after_title' => '</h3>',
	) );
	
	register_sidebar( array(
		'name' => __( 'Footer 4', 'origines' ),
		'id' => 'footer4',
		'description' => __( 'Appears on posts and pages on the right side of the footer.', 'origines' ),
		'before_widget' => '<div class="o-widget o-footer-widget">',
		'after_widget' => '</div>',
		'before_title' => '<h3 class="o-widget-title o-footer-widget-title">',
		'after_title' => '</h3>',
	) );
}
add_action( 'widgets_init', 'origines_widgets_init' );

/**
 * Function Name: origines_menu_init
 * Description: Registers our menus.
 */
function origines_menus_init() {
	register_nav_menus( array(
		'header-menu' => __( 'Header Menu', 'origines' ),
		'footer-menu' => __( 'Footer Menu', 'origines' )
	) );
}
add_action( 'init', 'origines_menus_init' );

?>