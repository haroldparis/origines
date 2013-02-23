<?php
/**
 * Name: Origines WordPress Theme
 * GitHub URI: https://github.com/haroldparis/origines
 * Description: Origines functions and definitions.
 * Author: Harold Paris
 * Twitter: @haroldparis
 * Author website: http://www.tribeleadr.com/
 */

require_once('includes/origines-init.php');
require_once('includes/origines-walker.php');
require_once('includes/origines-entry-meta.php');

/**
 * Function Name: origines_home_head
 * Description: Origines home head.
 */
function origines_home_head() {
	// check if hero unit is active and display it
	if ( is_active_sidebar( 'hero' ) ) : dynamic_sidebar( 'hero' ); 
	// or display the homepage header
	else : ?>
	<header class="o-title-header page-header">
		<h1 class="o-title">
			<?php bloginfo( 'name' ); ?> <span class="o-title-span"><small><?php bloginfo( 'description' ); ?></small></span>
		</h1> <!-- /.o-title -->
	</header> <!-- /.o-title-header --> <?php
	endif;
}

/**
 * Function Name: origines_logo
 * Description: Check if a logo is defined and present it.
 */
function origines_logo($logofile){
	if ( $logofile == "yourfilename.png" ) {
	?>
		<a class="brand" href="<?php bloginfo( 'url' ); ?>" title="<?php bloginfo( 'description' ); ?>"><?php bloginfo( 'name' ); ?></a>
	<?php
	} else {
	?>
		<a class="brand" style="padding: 5px 20px 5px;" href="<?php bloginfo( 'url' ); ?>" title="<?php bloginfo( 'description' ); ?>"><img src="<?php bloginfo( 'template_directory' ); ?>/img/<?php echo $logofile; ?>" alt="<?php bloginfo( 'name' ); ?>" /></a>
	<?php
	}
}

/**
 * Function Name: origines_get_avatar
 * Description: Get the gravatar Origines style.
 */
function origines_get_avatar($email, $size) {
	$grav_url = "http://www.gravatar.com/avatar/" . 
	md5(strtolower($email)) . "?s=" . $size;
	echo "<img src='$grav_url' class='o-author-avatar img-polaroid' />";
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
 * Function Name: google_analytics_tracking_code
 * Description: Add Google Analytics Tracking Code to the head or the footer of your blog.
 */
function origines_ga_tracking(){
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
add_action('wp_footer', 'origines_ga_tracking');

?>