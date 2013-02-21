<?php
/**
 * Name: Origines WordPress Theme
 * GitHub URI: https://github.com/haroldparis/origines
 * Description: Origines functions and definitions.
 * Version: 0.2
 * Author: Harold Paris
 * Twitter: @haroldparis
 * Author website: http://www.tribeleadr.com/
 * Licence:
 * Copyright 2013 TRIBELEADR
 * This file is part of Origines.
 * Origines is free software: you can redistribute it and/or modify
 * it under the terms of the GNU General Public License as published by
 * the Free Software Foundation, either version 3 of the License, or
 * (at your option) any later version.
 * Origines is distributed in the hope that it will be useful,
 * but WITHOUT ANY WARRANTY; without even the implied warranty of
 * MERCHANTABILITY or FITNESS FOR A PARTICULAR PURPOSE.  See the
 * GNU General Public License for more details.
 * You should have received a copy of the GNU General Public License
 * along with Origines.  If not, see <http://www.gnu.org/licenses/>.
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
 * Function Name: origines_menu_init
 * Description: Registers our menus.
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
 * Class Name: origines_nav_walker
 * Description: Change the way menus are built so it will be adapted to Bootstrap.
 * Credits: Thanks to Edward McIntyre - @twittem
 */
class origines_nav_walker extends Walker_Nav_Menu {
	function start_lvl( &$output, $depth ) {
		$indent = str_repeat( "\t", $depth );
		$output	   .= "\n$indent<ul class=\"dropdown-menu\">\n";		
	}

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
 * Function Name: origines_entry_meta
 * Description: Prints HTML with meta information for current post: categories, tags, permalink, author, and date.
 * Credits: TwentyTen WordPress Theme
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
 * Function Name: origines_footer_count_for_span
 * Description: Check the number of active footer widgets and returns an integer for styling purpose.
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
 * Function Name: origines_get_avatar
 * Description: Get the gravatar Origines style.
 */
function origines_get_avatar($email, $size) {
	$grav_url = "http://www.gravatar.com/avatar/" . 
	md5(strtolower($email)) . "?s=" . $size;
	echo "<img src='$grav_url' class='media-object img-polaroid' />";
}

/**
 * Name: origines_breadcrumbs
 * Description: Get the breadcrumbs Origines style.
 * Credits: Thanks to Daniel Roche for his nice tutorial here : http://www.seomix.fr/fil-dariane-chemin-navigation/
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
    if ($link) $chain .= '<li><a href="' . get_category_link( $parent->term_id ) . '" title="' . $parent->cat_name . '">' . $name . '</a><span class="divider">/</span></li>';
    else $chain .= $name;
    return $chain;
}

//Le rendu
function mybread() {
	// variables globales
	global $wp_query; 
	$ped=get_query_var('paged'); 
	$rendu = '<div id="breadcrumbs" itemprop="breadcrumb"><ul class="breadcrumb">';
	$separator = '<span class="divider">/</span></li>';  
	$debutlien = '<li><a rel="home" title="' . get_bloginfo('name') . '" href="' . home_url() . '">Home</a>' . $separator;
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
			if ( $thisCat->parent != 0 ) $rendu .= myget_category_parents($parentCat, true, true);
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
        		$rendu .= myget_category_parents($category_id,true) . '<li>' . the_title('','',FALSE) . '</li>';
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

/**
 * Class Name: origines_walker_comment
 * Description: Change the way comments are built so it will be adapted to Bootstrap.
 * Credits: Thanks to bitacre and his nice tutorial here : http://shinraholdings.com/621/custom-walker-to-extend-the-walker_comment-class/
 */
class origines_walker_comment extends Walker_Comment {
     
    // init classwide variables
    var $tree_type = 'comment';
    var $db_fields = array( 'parent' => 'comment_parent', 'id' => 'comment_ID' );
    
    /** CONSTRUCTOR
     * You'll have to use this if you plan to get to the top of the comments list, as
     * start_lvl() only goes as high as 1 deep nested comments */
    function __construct() { ?>
         
        <div id="comment-list" class="media">
         
    <?php }
     
    /** START_LVL 
     * Starts the list before the CHILD elements are added. */
    function start_lvl( &$output, $depth = 0, $args = array() ) {       
        $GLOBALS['comment_depth'] = $depth + 1; ?>
 
    
        
    <?php }
 
    /** END_LVL 
     * Ends the children list of after the elements are added. */
    function end_lvl( &$output, $depth = 0, $args = array() ) {
        $GLOBALS['comment_depth'] = $depth + 1; ?>
 
  
         
    <?php }
     
    /** START_EL */
    function start_el( &$output, $comment, $depth, $args, $id = 0 ) {
        $depth++;
        $GLOBALS['comment_depth'] = $depth;
        $GLOBALS['comment'] = $comment;
        $ocommentmail = get_comment_author_email(); ?>
        
    <div class="media well">
        
        <a class="pull-left" href="<?php comment_author_url(); ?>" target="_blank">
			<?php echo origines_get_avatar( $ocommentmail, $args['avatar_size'] ); ?>
		</a>
		
		<div class="media-body">
		
			<?php if ( $comment->comment_approved == '0' ) : ?>
				<em class="comment-awaiting-moderation"><?php _e( 'Your comment is awaiting moderation.', 'origines' ); ?></em>
				<br />
			<?php endif; ?>
			
			<h4 class="comment-heading media-heading pull-left"><?php comment_author_link(); ?></h4>
			
			<div class="comment-meta commentmetadata pull-right">
				<small><em><?php
				/* translators: 1: date, 2: time */
				printf( __( '%1$s at %2$s', 'origines' ), get_comment_date(),  get_comment_time() ); ?></a><?php edit_comment_link( __( '(Edit)', 'origines' ), ' ' );
				?></em></small>
			</div><!-- .comment-meta .commentmetadata -->
			
			<div class="clearfix"></div>
		
			<div class="comment-body"><?php comment_text(); ?></div>
			
			<div class="reply">
				<?php comment_reply_link( array_merge( $args, array( 'depth' => $depth, 'max_depth' => $args['max_depth'] ) ) ); ?>
			</div><!-- .reply -->
 			
    <?php }
 
    function end_el( &$output, $comment, $depth, $args, $id = 0 ) { ?>
        
		</div><!-- .media-body -->
		
	</div><!-- .media -->
         
    <?php }
    
    /** DESTRUCTOR
     * I'm just using this since we needed to use the constructor to reach the top 
     * of the comments list, just seems to balance out nicely:) */
    function __destruct() { ?>
     
    </div><!-- #comment-list -->
 
    <?php }
    
}

/**
 * Function Name: origine_reply_link
 * Description: Add the button class from Bootstrap to comment replies.
 */
function origine_reply_link($link, $args, $comment, $post){
  return str_replace("class='comment-reply-link'", "class='comment-reply-link btn btn-mini'", $link);
}
add_filter('comment_reply_link', 'origine_reply_link', 420, 4);

/**
 * Function Name: origines_comment_form
 * Description: Custom comment form for bootstrap.
 */
function origines_comment_form( $args = array(), $post_id = null ) {
	global $id;

	if ( null === $post_id )
		$post_id = $id;
	else
		$id = $post_id;

	$commenter = wp_get_current_commenter();
	$user = wp_get_current_user();
	$user_identity = $user->exists() ? $user->display_name : '';

	$req = get_option( 'require_name_email' );
	$aria_req = ( $req ? " aria-required='true'" : '' );
	$fields =  array(
		'author' => '<label for="author">' . __( 'Name' ) . ( $req ? ' <span class="required">*</span>' : '' ) . '</label> ' .
		            '<input id="author" name="author" type="text" value="' . esc_attr( $commenter['comment_author'] ) . '" size="30"' . $aria_req . ' />',
		'email'  => '<label for="email">' . __( 'Email' ) . ( $req ? ' <span class="required">*</span>' : '' ) . '</label> ' .
		            '<input id="email" name="email" type="text" value="' . esc_attr(  $commenter['comment_author_email'] ) . '" size="30"' . $aria_req . ' />',
		'url'    => '<label for="url">' . __( 'Website' ) . '</label>' .
		            '<input id="url" name="url" type="text" value="' . esc_attr( $commenter['comment_author_url'] ) . '" size="30" />',
	);

	$required_text = sprintf( ' ' . __('Required fields are marked %s'), '<span class="required">*</span>' );
	$defaults = array(
		'fields'               => apply_filters( 'comment_form_default_fields', $fields ),
		'comment_field'        => '<label for="comment">' . _x( 'Comment', 'noun' ) . '</label><textarea id="comment" name="comment" cols="45" rows="4" aria-required="true" class="span9"></textarea>',
		'must_log_in'          => '<span class="help-block must-log-in">' . sprintf( __( 'You must be <a href="%s">logged in</a> to post a comment.' ), wp_login_url( apply_filters( 'the_permalink', get_permalink( $post_id ) ) ) ) . '</span>',
		'logged_in_as'         => '<span class="help-block logged-in-as">' . sprintf( __( 'Logged in as <a href="%1$s">%2$s</a>. <a href="%3$s" title="Log out of this account">Log out?</a>' ), get_edit_user_link(), $user_identity, wp_logout_url( apply_filters( 'the_permalink', get_permalink( $post_id ) ) ) ) . '</span>',
		'comment_notes_before' => '<span class="help-block comment-notes">' . __( 'Your email address will not be published.' ) . ( $req ? $required_text : '' ) . '</span>',
		'comment_notes_after'  => '<span class="help-block form-allowed-tags">' . sprintf( __( 'You may use these <abbr title="HyperText Markup Language">HTML</abbr> tags and attributes: %s' ), ' <code>' . allowed_tags() . '</code>' ) . '</span>',
		'id_form'              => 'commentform',
		'id_submit'            => 'submit',
		'title_reply'          => __( 'Leave a Reply' ),
		'title_reply_to'       => __( 'Leave a Reply to %s' ),
		'cancel_reply_link'    => __( 'Cancel reply' ),
		'label_submit'         => __( 'Post Comment' ),
	);

	$args = wp_parse_args( $args, apply_filters( 'comment_form_defaults', $defaults ) );

	?>
		<?php if ( comments_open( $post_id ) ) : ?>
			<?php do_action( 'comment_form_before' ); ?>
			<div id="respond" class="row">
			<form action="<?php echo site_url( '/wp-comments-post.php' ); ?>" method="post" id="<?php echo esc_attr( $args['id_form'] ); ?>"">
  			<fieldset class="span9">
  			<legend><?php comment_form_title( $args['title_reply'], $args['title_reply_to'] ); ?> <small><?php cancel_comment_reply_link( $args['cancel_reply_link'] ); ?></small></legend>
  			<?php if ( get_option( 'comment_registration' ) && !is_user_logged_in() ) : ?>
				<?php echo $args['must_log_in']; ?>
				<?php do_action( 'comment_form_must_log_in_after' ); ?>
			<?php else : ?>
					<?php do_action( 'comment_form_top' ); ?>
						<?php if ( is_user_logged_in() ) : ?>
							<?php echo apply_filters( 'comment_form_logged_in', $args['logged_in_as'], $commenter, $user_identity ); ?>
							<?php do_action( 'comment_form_logged_in_after', $commenter, $user_identity ); ?>
						<?php else : ?>
							<?php echo $args['comment_notes_before']; ?>
							<?php
							do_action( 'comment_form_before_fields' );
							foreach ( (array) $args['fields'] as $name => $field ) {
								echo apply_filters( "comment_form_field_{$name}", $field ) . "\n";
							}
							do_action( 'comment_form_after_fields' );
							?>
						<?php endif; ?>
						<?php echo apply_filters( 'comment_form_field_comment', $args['comment_field'] ); ?>
						<?php /* echo $args['comment_notes_after']; */ ?>
						<div class="form-actions">
							<button type="submit" class="btn btn-primary" id="<?php echo esc_attr( $args['id_submit'] ); ?>"><?php echo esc_attr( $args['label_submit'] ); ?></button>
							<?php comment_id_fields( $post_id ); ?>
						</div>
						<?php do_action( 'comment_form', $post_id ); ?>
			<?php endif; ?>
			</fieldset>
			</form>
			</div> <!-- #respond -->
			<?php do_action( 'comment_form_after' ); ?>
		<?php else : ?>
			<?php do_action( 'comment_form_comments_closed' ); ?>
		<?php endif; ?>
	<?php
}


/**
 * Function Name: origines_home_head
 * Description: Origines home head.
 */
function origines_home_head() {
	// check if hero unit is active and display it
	if ( is_active_sidebar( 'hero' ) ) : dynamic_sidebar( 'hero' ); 
	// or display the homepage header
	else : ?>
	<div class="page-header">
		<h1 id="title"><?php bloginfo( 'name' ); ?> <span id="description"><small><?php bloginfo( 'description' ); ?></small></span></h1>
	</div> <?php
	endif;
}

/**
 * Function Name: google_analytics_tracking_code
 * Description: Add Google Analytics Tracking Code to the head or the footer of your blog.
 */
function google_analytics_tracking_code(){
	$propertyID = 'UA-XXX'; // Replace 'UA-XXX' with GA Property ID
	if ($propertyID != 'UA-XXX') {
		?>

		<script type="text/javascript">

  		var _gaq = _gaq || [];
  		_gaq.push(['_setAccount', '<?php echo $propertyID; ?>']);
  		_gaq.push(['_trackPageview']);

  		(function() {
    	var ga = document.createElement('script'); ga.type = 'text/javascript'; ga.async = true;
    	ga.src = ('https:' == document.location.protocol ? 'https://ssl' : 'http://www') + '.google-analytics.com/ga.js';
    	var s = document.getElementsByTagName('script')[0]; s.parentNode.insertBefore(ga, s);
  		})();

		</script>
		
		<?php
	}
}

// include GA tracking code before the closing body tag
add_action('wp_footer', 'google_analytics_tracking_code');

function origines_logo(){
	$logofile = "origines-30.png"; // Replace "" with "nameofthelogo.png" which must be in the theme img directory - max 30px height
	if ( $logofile == "" ) {
	?>
		<a class="brand" href="<?php bloginfo( 'url' ); ?>" title="<?php bloginfo( 'description' ); ?>"><?php bloginfo( 'name' ); ?></a>
	<?php
	} else {
	?>
		<a class="brand" style="padding: 5px 20px 5px;" href="<?php bloginfo( 'url' ); ?>" title="<?php bloginfo( 'description' ); ?>"><img src="<?php bloginfo( 'template_directory' ); ?>/img/<?php echo $logofile; ?>" alt="<?php bloginfo( 'name' ); ?>" /></a>
	<?php
	}
}

?>