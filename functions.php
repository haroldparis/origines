<?php
/**
 * Origines functions and definitions.
 */

/**
 * Registers our widget areas.
 */
function origines_widgets_init() {
	register_sidebar( array(
		'name' => __( 'Hero', 'origines' ),
		'id' => 'hero',
		'description' => __( 'Appears on the homepage in a Bootstrap Hero Unit. Use text component.', 'origines' ),
		'before_widget' => '',
		'after_widget' => '',
		'before_title' => '',
		'after_title' => '',
	) );

	register_sidebar( array(
		'name' => __( 'Sidebar', 'origines' ),
		'id' => 'sidebar',
		'description' => __( 'Appears on posts and pages except if full-width template is selected.', 'origines' ),
		'before_widget' => '<aside class="widget">',
		'after_widget' => '</aside>',
		'before_title' => '<h3 class="widget-title">',
		'after_title' => '</h3>',
	) );
	
	register_sidebar( array(
		'name' => __( 'Footer 1', 'origines' ),
		'id' => 'footer1',
		'description' => __( 'Appears on posts and pages on the left side of the footer.', 'origines' ),
		'before_widget' => '<div class="widget">',
		'after_widget' => '</div>',
		'before_title' => '<h3 class="widget-title">',
		'after_title' => '</h3>',
	) );
	
	register_sidebar( array(
		'name' => __( 'Footer 2', 'origines' ),
		'id' => 'footer2',
		'class' => 'footer-widget',
		'description' => __( 'Appears on posts and pages on the center of the footer.', 'origines' ),
		'before_widget' => '<div class="widget">',
		'after_widget' => '</div>',
		'before_title' => '<h3 class="widget-title">',
		'after_title' => '</h3>',
	) );
	
	register_sidebar( array(
		'name' => __( 'Footer 3', 'origines' ),
		'id' => 'footer3',
		'description' => __( 'Appears on posts and pages on the right side of the footer.', 'origines' ),
		'before_widget' => '<div class="widget">',
		'after_widget' => '</div>',
		'before_title' => '<h3 class="widget-title">',
		'after_title' => '</h3>',
	) );
	
	register_sidebar( array(
		'name' => __( 'Footer 4', 'origines' ),
		'id' => 'footer4',
		'description' => __( 'Appears on posts and pages on the right side of the footer.', 'origines' ),
		'before_widget' => '<div class="widget">',
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
 * Change the way menus are built so it will be adapted to Bootstrap.
 */
/**
 * Class Name: twitter_bootstrap_nav_walker
 * GitHub URI: https://github.com/twittem/wp-bootstrap-navwalker
 * Description: A custom Wordpress nav walker to implement the Twitter Bootstrap 2 (https://github.com/twitter/bootstrap/) dropdown navigation using the Wordpress built in menu manager.
 * Version: 1.2.2
 * Author: Edward McIntyre - @twittem
 * Licence: WTFPL 2.0 (http://sam.zoy.org/wtfpl/COPYING)
 */

class twitter_bootstrap_nav_walker extends Walker_Nav_Menu {

	/**
	 * @see Walker::start_lvl()
	 * @since 3.0.0
	 *
	 * @param string $output Passed by reference. Used to append additional content.
	 * @param int $depth Depth of page. Used for padding.
	 */
	function start_lvl( &$output, $depth ) {
		$indent = str_repeat( "\t", $depth );
		$output	   .= "\n$indent<ul class=\"dropdown-menu\">\n";		
	}

	/**
	 * @see Walker::start_el()
	 * @since 3.0.0
	 *
	 * @param string $output Passed by reference. Used to append additional content.
	 * @param object $item Menu item data object.
	 * @param int $depth Depth of menu item. Used for padding.
	 * @param int $current_page Menu item ID.
	 * @param object $args
	 */

	function start_el( &$output, $item, $depth = 0, $args = array(), $id = 0 ) {
		global $wp_query;
		$indent = ( $depth ) ? str_repeat( "\t", $depth ) : '';

		if (strcasecmp($item->title, 'divider')) {
			$class_names = $value = '';
			$classes = empty( $item->classes ) ? array() : (array) $item->classes;
			$classes[] = ($item->current) ? 'active' : '';
			$classes[] = 'menu-item-' . $item->ID;
			$class_names = join( ' ', apply_filters( 'nav_menu_css_class', array_filter( $classes ), $item, $args ) );

			if ($args->has_children && $depth > 0) {
				$class_names .= ' dropdown-submenu';
			} else if($args->has_children && $depth === 0) {
				$class_names .= ' dropdown';
			}

			$class_names = $class_names ? ' class="' . esc_attr( $class_names ) . '"' : '';

			$id = apply_filters( 'nav_menu_item_id', 'menu-item-'. $item->ID, $item, $args );
			$id = $id ? ' id="' . esc_attr( $id ) . '"' : '';

			$output .= $indent . '<li' . $id . $value . $class_names .'>';

			$attributes  = ! empty( $item->attr_title ) ? ' title="'  . esc_attr( $item->attr_title ) .'"' : '';
			$attributes .= ! empty( $item->target )     ? ' target="' . esc_attr( $item->target     ) .'"' : '';
			$attributes .= ! empty( $item->xfn )        ? ' rel="'    . esc_attr( $item->xfn        ) .'"' : '';
			$attributes .= ! empty( $item->url )        ? ' href="'   . esc_attr( $item->url        ) .'"' : '';
			$attributes .= ($args->has_children) 	    ? ' data-toggle="dropdown" data-hover="dropdown" data-delay="1000" data-close-others="false" data-target="' . esc_attr( $item->url        ) . '" class="dropdown-toggle"' : '';

			$item_output = $args->before;
			$item_output .= '<a'. $attributes .'>';
			$item_output .= $args->link_before . apply_filters( 'the_title', $item->title, $item->ID ) . $args->link_after;
			$item_output .= ($args->has_children && $depth == 0) ? ' <span class="caret"></span></a>' : '</a>';
			$item_output .= $args->after;

			$output .= apply_filters( 'walker_nav_menu_start_el', $item_output, $item, $depth, $args );
		} else {
			$output .= $indent . '<li class="divider">';
		}
	}


	/**
	 * Traverse elements to create list from elements.
	 *
	 * Display one element if the element doesn't have any children otherwise,
	 * display the element and its children. Will only traverse up to the max
	 * depth and no ignore elements under that depth. 
	 *
	 * This method shouldn't be called directly, use the walk() method instead.
	 *
	 * @see Walker::start_el()
	 * @since 2.5.0
	 *
	 * @param object $element Data object
	 * @param array $children_elements List of elements to continue traversing.
	 * @param int $max_depth Max depth to traverse.
	 * @param int $depth Depth of current element.
	 * @param array $args
	 * @param string $output Passed by reference. Used to append additional content.
	 * @return null Null on failure with no changes to parameters.
	 */

	function display_element( $element, &$children_elements, $max_depth, $depth=0, $args, &$output ) {

		if ( !$element ) {
			return;
		}

		$id_field = $this->db_fields['id'];

		//display this element
		if ( is_array( $args[0] ) ) 
			$args[0]['has_children'] = ! empty( $children_elements[$element->$id_field] );
		else if ( is_object( $args[0] ) ) 
			$args[0]->has_children = ! empty( $children_elements[$element->$id_field] ); 
		$cb_args = array_merge( array(&$output, $element, $depth), $args);
		call_user_func_array(array(&$this, 'start_el'), $cb_args);

		$id = $element->$id_field;

		// descend only when the depth is right and there are childrens for this element
		if ( ($max_depth == 0 || $max_depth > $depth+1 ) && isset( $children_elements[$id]) ) {

			foreach( $children_elements[ $id ] as $child ){

				if ( !isset($newlevel) ) {
					$newlevel = true;
					//start the child delimiter
					$cb_args = array_merge( array(&$output, $depth), $args);
					call_user_func_array(array(&$this, 'start_lvl'), $cb_args);
				}
				$this->display_element( $child, $children_elements, $max_depth, $depth + 1, $args, $output );
			}
				unset( $children_elements[ $id ] );
		}

		if ( isset($newlevel) && $newlevel ){
			//end the child delimiter
			$cb_args = array_merge( array(&$output, $depth), $args);
			call_user_func_array(array(&$this, 'end_lvl'), $cb_args);
		}

		//end this element
		$cb_args = array_merge( array(&$output, $element, $depth), $args);
		call_user_func_array(array(&$this, 'end_el'), $cb_args);
	}
}

/**
 * Prints HTML with meta information for current post: categories, tags, permalink, author, and date.
 */
function origines_entry_meta() {
	// Translators: used between list items, there is a space after the comma.
	$categories_list = get_the_category_list( __( ', ', 'origines' ) );

	// Translators: used between list items, there is a space after the comma.
	$tag_list = get_the_tag_list( '', __( ', ', 'origines' ) );

	$date = sprintf( '%4$s',
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
		$utility_text = __( '<em>This entry was posted on %3$s in %1$s and tagged %2$s by %4$s.</em>', 'origines' );
	} elseif ( $categories_list ) {
		$utility_text = __( '<em>This entry was posted on %3$s in %1$s by %4$s.</em>', 'origines' );
	} else {
		$utility_text = __( '<em>This entry was posted on %3$s by %4$s.</em>', 'origines' );
	}

	printf(
		$utility_text,
		$categories_list,
		$tag_list,
		$date,
		$author
	);
}

/**
 * Check the number of active footer widgets and returns an integer for styling purpose.
 */
function origines_footer_count_for_span() {
	// Count active sidebars.
	if ( is_active_sidebar( 'footer1' ) ) { $footer1_count = 1; } else { $footer1_count = 0; }
	if ( is_active_sidebar( 'footer2' ) ) { $footer2_count = 1; } else { $footer2_count = 0; }
	if ( is_active_sidebar( 'footer3' ) ) { $footer3_count = 1; } else { $footer3_count = 0; }
	if ( is_active_sidebar( 'footer4' ) ) { $footer4_count = 1; } else { $footer4_count = 0; }
	
	$footer_all_count = $footer1_count + $footer2_count + $footer3_count + $footer4_count;
	
	// Send the right span number.
	if ( $footer_all_count == 1 ) { $footer_span = 12; } else { 
		if ( $footer_all_count == 2 ) { $footer_span = 6; } else { 
			if ( $footer_all_count == 3 ) { $footer_span = 4; } else { $footer_span = 3; }
		}
	}
	
	echo ( $footer_span );
	
}

/**
 * Get the gravatar origines style.
 */
function origines_get_avatar($email, $size) {
	$grav_url = "http://www.gravatar.com/avatar/" . 
	md5(strtolower($email)) . "?s=" . $size;
	echo "<img src='$grav_url' class='media-object img-polaroid' />";
}

/**
 * Breadcrumb
 * 
 * Thanks to Daniel Roche for his nice tutorial here : http://www.seomix.fr/fil-dariane-chemin-navigation/
 */

//Récupérer les catégories parentes
function myget_category_parents($id, $link = false, $nicename = false, $visited = array()) {
  	$chain = '';
  	$parent = &get_category($id);
    if (is_wp_error($parent))return $parent;
    if ($nicename)$name = $parent->name;
    else $name = $parent->cat_name;
    if ($parent->parent && ($parent->parent != $parent->term_id ) && !in_array($parent->parent, $visited)) {
        $visited[] = $parent->parent;
        $chain .= myget_category_parents( $parent->parent, $link, $nicename, $visited ); 
    }
    if ($link) $chain .= '<a href="' . get_category_link( $parent->term_id ) . '" title="' . $parent->cat_name . '">' . $name . '</a>';
    else $chain .= $name;
    return $chain;
}

//Le rendu
function mybread() {
	// variables globales
	global $wp_query; 
	$ped=get_query_var('paged'); 
	$rendu = '<div itemprop="breadcrumb"><ul class="breadcrumb">';
	$separator = '<span class="divider">/</span></li>';  
	$debutlien = '<li><a title="' . get_bloginfo('name') . '" href="' . home_url() . '">Home</a>' . $separator;
	$debut = '<li>Home</li>';
  
	// si l'utilisateur a défini une page comme page d'accueil
	if ( is_front_page() ) { $rendu .= $debut; }

	// dans le cas contraire
	else {

		// on teste si une page a été définie comme devant afficher une liste d'article 
		if ( get_option('show_on_front') == 'page') {
			$url = urldecode(substr($_SERVER['REQUEST_URI'], 1));
			$uri = $_SERVER["HTTP_HOST"].$_SERVER["REQUEST_URI"];
			$posts_page_id = get_option( 'page_for_posts');
			$posts_page_url = get_page_uri($posts_page_id);  
			$pos = strpos($uri,$posts_page_url);
			if($pos !== false) {
				$rendu .= $debutlien . $oseparator . 'Articles<li>';
			}
			else { $rendu .= $debutlien; } 
		}

		//Si c'est l'accueil
    	elseif ( is_home() ) { $rendu .= $debut; }

    	//pour tout le reste
    	else { $rendu .= $debutlien; }

    	// les catégories
    	if ( is_category() ) {
			$cat_obj = $wp_query->get_queried_object();
			$thisCat = $cat_obj->term_id;
			$thisCat = get_category($thisCat);
			$parentCat = get_category($thisCat->parent);
			if ( $thisCat->parent != 0 ) $rendu .= '<li>' . myget_category_parents($parentCat, true, true) . $separator;
			if ( $thisCat->parent == 0 ) $rendu .= '';
			if ( $ped <= 1 ) $rendu .= '<li>' . single_cat_title("", false) . '</li>';
			elseif ( $ped > 1 ) {
        		$rendu .= '<li><a href="' . get_category_link( $thisCat ) . '" title="' . single_cat_title("", false).'">' . single_cat_title("", false).'</a>' . $separator;
  	      	}
   		}

    	// les auteurs
    	elseif ( is_author() ) {
    		global $author; 
    		$user_info = get_userdata($author); 
    		$rendu .= '<li>' . $user_info->display_name . '</li>';
    	}  

    	// les mots clés
    	elseif ( is_tag() ) {
    		$tag=single_tag_title("",FALSE);
    		$rendu .= '<li>Tag: ' . $tag . '</li>';
    	}
    
    	elseif ( is_date() ) {
    		if ( is_day() ) {
        		global $wp_locale;
        	    $rendu .= '<li>' . get_the_date() . '</li>';
        	}
      		else if ( is_month() ) {
            	$rendu .= "<li>" . single_month_title(' ',false) . '</li>';
        	}
      		else if ( is_year() ) {
            	$rendu .= "<li>" . get_query_var('year') . '</li>';
        	}
    	}

    	//les archives hors catégories
    	elseif ( is_archive() && !is_category() ) {
    		$posttype = get_post_type();
      		$tata = get_post_type_object( $posttype );
      		$var = '';
      		$the_tax = get_taxonomy( get_query_var( 'taxonomy' ) );
      		$titrearchive = $tata->labels->menu_name;
      		if ( !empty($the_tax) ) { $var = $the_tax->labels->name; }
          	if ( empty($the_tax) ) { $var = $titrearchive; }
      		$rendu .= '<li>Archives: "' . $var . '"</li>';
      	}

    	// La recherche
    	elseif ( is_search()) {
      		$rendu .= '<li>Search for: ' . get_search_query() . '</li>';
    	}

    	// la page 404
    	elseif ( is_404()){
      		$rendu .= '<li>Ooops... 404.</li>';
    	}

    	//Un article
    	elseif ( is_single() ) {
      		$category = get_the_category();
      		$category_id = get_cat_ID( $category[0]->cat_name );
      		if ($category_id != 0) {
        		$rendu .= '<li>' . myget_category_parents($category_id,true) . $separator . '<li>' . the_title('','',FALSE) . '</li>';
        	}
      		elseif ($category_id == 0) {
        		$post_type = get_post_type();
        		$tata = get_post_type_object( $post_type );
        		$titrearchive = $tata->labels->menu_name;
        		$urlarchive = get_post_type_archive_link( $post_type );
        		$rendu .= '<li><a href="' . $urlarchive . '" title="' . $titrearchive . '">' . $titrearchive . $separator . '<li>' . the_title('','',FALSE) . '</li>';
        	}
    	}

    	//Une page
    	elseif ( is_page()) {
      		$post = $wp_query->get_queried_object();
      		if ( $post->post_parent == 0 ) { $rendu .= "<li>" . the_title('','',FALSE) . "</li>"; }
      		elseif ( $post->post_parent != 0 ) {
        		$title = the_title('','',FALSE);
        		$ancestors = array_reverse(get_post_ancestors($post->ID));
        		array_push($ancestors, $post->ID);
        		foreach ( $ancestors as $ancestor ) {
          			if ( $ancestor != end($ancestors) ) { $rendu .= '<li><a href="'. get_permalink($ancestor) . '">' . strip_tags( apply_filters( 'single_post_title', get_the_title( $ancestor ) ) ) . '</a>' . $separator ; }
          			else { $rendu .= '<li>' . strip_tags(apply_filters('single_post_title',get_the_title($ancestor))) . '</li>'; }
          		}
        	}
    	}
	}
	$rendu .= '</ul></div> <!-- breadcrumb -->';
	echo $rendu;
}

?>