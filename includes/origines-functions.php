<?php
/**
 * Name: Origines WordPress Theme
 * GitHub URI: https://github.com/haroldparis/origines
 * Description: Origines functions.
 * Author: Harold Paris
 * Twitter: @haroldparis
 * Author website: http://www.tribeleadr.com/
 */

/**
 * Origines home head.
 */
function origines_home_head() {
	// check if hero unit is active and display it
	if ( is_active_sidebar( 'hero' ) ) : dynamic_sidebar( 'hero' ); 
	// or display the homepage header
	else : ?>
	<header class="o-title-header page-header">
		<h1 class="o-title">
			<?php bloginfo( 'name' ); ?> 
			<small><?php bloginfo( 'description' ); ?></small>
		</h1> <!-- /.o-title -->
	</header> <!-- /.o-title-header --> <?php
	endif;
}

/**
 * Check if a logo is defined and present it.
 */
function origines_logo(){
	$logofile = get_option('origines_logo');
	if ( $logofile == "" ) {
	?>
		<a class="brand" href="<?php bloginfo( 'url' ); ?>" title="<?php bloginfo( 'description' ); ?>"><?php bloginfo( 'name' ); ?></a>
	<?php
	} else {
	?>
		<a class="brand" style="padding: 5px 20px 5px;" href="<?php bloginfo( 'url' ); ?>" title="<?php bloginfo( 'description' ); ?>"><img src="<?php echo get_option('origines_logo'); ?>" alt="<?php bloginfo( 'name' ); ?>" /></a>
	<?php
	}
}

/**
 * Get the gravatar Origines style.
 */
function origines_get_avatar($email, $size) {
	$grav_url = "http://www.gravatar.com/avatar/" . 
	md5(strtolower($email)) . "?s=" . $size;
	echo "<img src='$grav_url' alt='" . get_the_author() . "' class='o-author-avatar img-polaroid' />";
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
 * Add Google Analytics Tracking Code to the head or the footer of your blog.
 */
function origines_ga_tracking(){
	$propertyID = get_option('origines_gaid'); 
	if ($propertyID != "") {
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
add_action('wp_footer', 'origines_ga_tracking');

/**
 * Remove the #more in the more button link.
 */
function origines_remove_more_jump( $link ) { 
	return preg_replace( '/#more\-\d+/', '', $link );
}
add_filter( 'the_content_more_link', 'origines_remove_more_jump' );

/**
 * Modifying the rel in category links for W3C check.
 */
function origines_remove_category_rel( $link ) {
    return str_replace( 'rel="category tag"', '', $link );
}
add_filter( 'the_category', 'origines_remove_category_rel' );

?>