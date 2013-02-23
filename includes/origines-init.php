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
 * Description: Adding theme support for thumbnails.
 */
add_theme_support( 'post-thumbnails' );
update_option('thumbnail_size_w', 870);
update_option('thumbnail_size_h', 200);
update_option('thumbnail_crop', 1);
update_option('large_size_w', 870);
update_option('medium_size_w', 500);

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
	
/**
 * Function Name: project_custom_init
 * Description: Creating a custom project post type for portfolio.
 */
function project_custom_init()
{

	// The following is all the names, in our tutorial, we use "Project"
	$labels = array(
		'name' => _x('Projects', 'post type general name'),
		'singular_name' => _x('Project', 'post type singular name'),
		'add_new' => _x('Add New', 'project'),
		'add_new_item' => __('Add New Project'),
		'edit_item' => __('Edit Project'),
		'new_item' => __('New Project'),
		'view_item' => __('View Project'),
		'search_items' => __('Search Projects'),
		'not_found' =>  __('No projects found'),
		'not_found_in_trash' => __('No projects found in Trash'),
		'parent_item_colon' => '',
		'menu_name' => 'Portfolio'
	);
	  
	// Some arguments and in the last line 'supports', we say to WordPress what features are supported on the Project post type
	$args = array(
		'labels' => $labels,
		'public' => true,
		'publicly_queryable' => true,
		'show_ui' => true,
		'show_in_menu' => true,
		'query_var' => true,
		'rewrite' => true,
		'capability_type' => 'post',
		'has_archive' => true,
		'hierarchical' => false,
		'menu_position' => null,
		'supports' => array('title','editor','author','thumbnail','excerpt','comments')
	);
	  
	// We call this function to register the custom post type
	register_post_type('project',$args);

}
add_action('init', 'project_custom_init');  

/**
 * Function Name: project_updated_messages
 * Description: Custom Messages
 */
function project_updated_messages( $messages ) {
  global $post, $post_ID;

  $messages['project'] = array(
	0 => '', // Unused. Messages start at index 1.
	1 => sprintf( __('Project updated. <a href="%s">View project</a>'), esc_url( get_permalink($post_ID) ) ),
	2 => __('Custom field updated.'),
	3 => __('Custom field deleted.'),
	4 => __('Project updated.'),
	/* translators: %s: date and time of the revision */
	5 => isset($_GET['revision']) ? sprintf( __('Project restored to revision from %s'), wp_post_revision_title( (int) $_GET['revision'], false ) ) : false,
	6 => sprintf( __('Project published. <a href="%s">View project</a>'), esc_url( get_permalink($post_ID) ) ),
	7 => __('Project saved.'),
	8 => sprintf( __('Project submitted. <a target="_blank" href="%s">Preview project</a>'), esc_url( add_query_arg( 'preview', 'true', get_permalink($post_ID) ) ) ),
	9 => sprintf( __('Project scheduled for: <strong>%1$s</strong>. <a target="_blank" href="%2$s">Preview project</a>'),
	  // translators: Publish box date format, see http://php.net/date
	  date_i18n( __( 'M j, Y @ G:i' ), strtotime( $post->post_date ) ), esc_url( get_permalink($post_ID) ) ),
	10 => sprintf( __('Project draft updated. <a target="_blank" href="%s">Preview project</a>'), esc_url( add_query_arg( 'preview', 'true', get_permalink($post_ID) ) ) ),
  );

  return $messages;
} 
add_filter('post_updated_messages', 'project_updated_messages');

/**
 * Description: Adding a Demo URL Meta Box
 */
add_action('admin_init','portfolio_meta_init');

function portfolio_meta_init()
{
	// add a meta box for WordPress 'project' type
	add_meta_box('portfolio_meta', 'Project Infos', 'portfolio_meta_setup', 'project', 'side', 'low');
 
	// add a callback function to save any data a user enters in
	add_action('save_post','portfolio_meta_save');
}

function portfolio_meta_setup()
{
	global $post;
 	 
	?>
		<div class="portfolio_meta_control">
			<label>URL</label>
			<p>
				<input type="text" name="_url" value="<?php echo get_post_meta($post->ID,'_url',TRUE); ?>" style="width: 100%;" />
			</p>
		</div>
	<?php

	// create for validation
	echo '<input type="hidden" name="meta_noncename" value="' . wp_create_nonce(__FILE__) . '" />';
}

function portfolio_meta_save($post_id) 
{
	// check nonce
	if (!isset($_POST['meta_noncename']) || !wp_verify_nonce($_POST['meta_noncename'], __FILE__)) {
	return $post_id;
	}

	// check capabilities
	if ('post' == $_POST['post_type']) {
	if (!current_user_can('edit_post', $post_id)) {
	return $post_id;
	}
	} elseif (!current_user_can('edit_page', $post_id)) {
	return $post_id;
	}

	// exit on autosave
	if (defined('DOING_AUTOSAVE') == DOING_AUTOSAVE) {
	return $post_id;
	}

	if(isset($_POST['_url'])) 
	{
		update_post_meta($post_id, '_url', $_POST['_url']);
	} else 
	{
		delete_post_meta($post_id, '_url');
	}
}

?>