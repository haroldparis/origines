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
 * Function Name: origines_styles_setup
 * Description: Adding styles the right way.
 */
function origines_styles(){ 
 	wp_enqueue_style( 'bootstrap', get_template_directory_uri() . '/css/bootstrap.min.css', false, false, 'all' );
 	wp_enqueue_style( 'origines', get_template_directory_uri() . '/css/origines.css', array('bootstrap'), false, 'all' );
 	wp_enqueue_style( 'bootstrap-responsive', get_template_directory_uri() . '/css/bootstrap-responsive.min.css', array('origines', 'bootstrap'), false, 'all' );
}
add_action('wp_enqueue_scripts', 'origines_styles');

/**
 * Function Name: origines_scripts_setup
 * Description: Adding scripts the right way.
 */
function origines_scripts_setup(){
	if (!is_admin()){
		wp_register_script('html5shiv', get_template_directory_uri() . '/js/html5shiv.js', false, null, false);
		wp_deregister_script('jquery'); 
		wp_enqueue_script('jquery', 'http://code.jquery.com/jquery-1.9.1.min.js', false, '1.9.1', false);
		wp_enqueue_script('bootstrap', get_template_directory_uri() . '/js/bootstrap.min.js', array('jquery'), '2.3.0', true);
		wp_enqueue_script('bootstrap-hover', get_template_directory_uri() . '/js/twitter-bootstrap-hover-dropdown.min.js', array('bootstrap'), null, true);
	}
}
add_action('wp_enqueue_scripts', 'origines_scripts_setup');

/**
 * Function Name: origines_theme_setup
 * Description: Adding theme support for translation. Translation files in /lang/
 */
function origines_lang_setup(){
    load_theme_textdomain('origines', get_template_directory() . '/lang');
}
add_action('after_setup_theme', 'origines_lang_setup');

/**
 * Description: Adding theme support for thumbnails.
 */
add_theme_support( 'post-thumbnails' );
update_option('large_size_w', 870);
update_option('medium_size_w', 500);
update_option('medium_size_h', 400);
add_image_size( 'origines-thumb', 870, 200, 1 );

/**
 * Function Name: origines_widgets_init
 * Description: Registers our widget areas.
 */
function origines_widgets_init() {
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
		'name' => __( 'Hero', 'origines' ),
		'id' => 'hero',
		'description' => __( 'Appears on the homepage in a Bootstrap Hero Unit. Use text component.', 'origines' ),
		'before_widget' => '<div class="o-widget o-hero-widget" itemprop="MainContentofPage">',
		'after_widget' => '</div>',
		'before_title' => '<header class="o-widget-title o-hero-widget-title entry-header page-header"><h1 class="entry-title">',
		'after_title' => '</h1></header>',
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

	register_sidebar( array(
		'name' => __( 'Before Content', 'origines' ),
		'id' => 'before-content',
		'description' => __( 'Appears on posts and pages before the content.', 'origines' ),
		'before_widget' => '<div class="o-widget o-bc-widget">',
		'after_widget' => '</div>',
		'before_title' => '<h3 class="o-widget-title o-bc-widget-title">',
		'after_title' => '</h3>',
	) );

	register_sidebar( array(
		'name' => __( 'After Content', 'origines' ),
		'id' => 'after-content',
		'description' => __( 'Appears on posts and pages after the content.', 'origines' ),
		'before_widget' => '<div class="o-widget o-ac-widget">',
		'after_widget' => '</div>',
		'before_title' => '<h3 class="o-widget-title o-ac-widget-title">',
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