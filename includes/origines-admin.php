<?php
/**
 * Name: Origines WordPress Theme
 * GitHub URI: https://github.com/haroldparis/origines
 * Description: Origines admin panel.
 * Author: Harold Paris
 * Twitter: @haroldparis
 * Author website: http://www.tribeleadr.com/
 */

$themename = "Origines";
$shortname = "origines";

/**
 * Description : register settings
 */
function theme_settings_init() {
	register_setting( 'theme_settings', 'theme_settings' );
	wp_enqueue_style( "admin_style", get_template_directory_uri() . "/css/origines-admin.css", false, "1.0", "all" );
}
add_action( 'admin_init', 'theme_settings_init' );

/**
 * Description : add settings page to menu
 */
function add_settings_page() {
	add_menu_page( __( 'Origines Panel' ), __( 'Origines Panel' ), 'manage_options', 'settings', 'theme_settings_page');
}
add_action( 'admin_menu', 'add_settings_page' );

$theme_options = array(
 
	array( 
		"name" => $themename . " Options",
		"type" => "title"
		),
	 
	array( 
		"name" => "Logo and Favicons",
		"type" => "section"
		),
	
	array( "type" => "open" ),
	 
	array( 
		"name" => "Logo URL",
		"desc" => "Enter the link to your logo image; the Origines original template supports logo max 30px height.",
		"id" => $shortname."_logo",
		"type" => "text",
		"std" => ""
		),
	 
	array( 
		"name" => "Custom Favicon URL",
		"desc" => "A favicon is a 32x32px png image that represents your site; paste the URL to a .png image that you want to use.",
		"id" => $shortname."_favicon",
		"type" => "text",
		"std" => get_stylesheet_directory_uri() ."/img/favicon.png"
		),

	array( 
		"name" => "Custom Apple Icon Touch URL",
		"desc" => "An Apple Icon Touch is a min 114x114px png image that represents your site and will be displayed on Apple devices such as the iPad or the iPhone; paste the URL to a .png image that you want to use.",
		"id" => $shortname."_appleicon",
		"type" => "text",
		"std" => get_stylesheet_directory_uri() ."/img/apple-icon-touch.png"
		),

	array( 
		"name" => "Custom Windows 8 Tile Icon URL",
		"desc" => "A Windows 8 Tile Icon is a 256x256px png image that represents your site and will be displayed on the Metro interface in Windows8; paste the URL to a .png image that you want to use.",
		"id" => $shortname."_win8icon",
		"type" => "text",
		"std" => get_stylesheet_directory_uri() ."/img/win8-tile-icon.png"
		),
	 
	array( "type" => "close"),

	array( 
		"name" => "Google Analytics",
		"type" => "section"
		),
	
	array( "type" => "open" ),
	 
	array( 
		"name" => "Property ID",
		"desc" => "Enter your Google Analytics Property ID. Should be something like : UA-XXX-XXX",
		"id" => $shortname."_gaid",
		"type" => "text",
		"std" => ""
		),
	 
	array( "type" => "close"),
 
);

/**
 * Description : theme panel
 */
function theme_settings_page() {
	global $themename, $theme_options;
    $i=0;
    $message=''; 
    if ( 'save' == $_REQUEST['action'] ) {
      
        foreach ($theme_options as $value) {
            update_option( $value['id'], $_REQUEST[ $value['id'] ] ); 
        }
      
        foreach ($theme_options as $value) {
            if ( isset( $_REQUEST[ $value['id'] ] ) ) { 
            	update_option( $value['id'], $_REQUEST[ $value['id'] ]  ); 
            } else { 
            	delete_option( $value['id'] ); 
            } 
        }

        $message='saved';

    } else if ( 'reset' == $_REQUEST['action'] ) { 

        foreach ($theme_options as $value) {
            delete_option( $value['id'] ); 
        }

        $message='reset'; 

    } 
    ?>

    <div class="wrap">
        <div id="icon-options-general"></div>
        <h2><?php _e( 'Origines Options' ) ?></h2>
        <?php
	        if ( $message=='saved' ) echo '<div class="updated settings-error" id="setting-error-settings_updated"> 
	        <p>' . $themename . ' settings saved.</strong></p></div>';
	        if ( $message=='reset' ) echo '<div class="updated settings-error" id="setting-error-settings_updated"> 
	        <p>' . $themename . ' settings reset.</strong></p></div>';
        ?>
		<p>
			<a href="http://www.tribeleadr.com/solutions/origines-theme-wordpress-bootstrap/">View the Project on TRIBELEADR (FR)</a> - 
			<a href="https://github.com/haroldparis/origines">View the Project on GitHub (EN)</a> - 
			<a href="https://github.com/haroldparis/origines/issues">Issues</a>
		</p>
		<div class="content_options">
			<form method="post">

			<?php foreach ($theme_options as $value) {

				switch ( $value['type'] ) {

					case "open": ?>
					<?php break;

					case "close": ?>
							</div><!-- all_options -->
						</div><!-- input_section -->
						<br />
					<?php break;

					case "title": ?>
						<div class="message">
							<p><strong>Howdy ! Thanks for using Origines ! You definitely rock !</strong></p>
							<p>Feel free to use the options below.</p>
						</div>
					<?php break;

					case 'text': ?>
						<div class="option_input option_text">
							<label for="<?php echo $value['id']; ?>"><?php echo $value['name']; ?></label>
							<input id="" type="<?php echo $value['type']; ?>" name="<?php echo $value['id']; ?>" value="<?php if ( get_settings( $value['id'] ) != "" ) { echo stripslashes(get_settings( $value['id'])  ); } else { echo $value['std']; } ?>" />
							<small><?php echo $value['desc']; ?></small>
							<div class="clearfix"></div>
						</div>
					<?php break;

					case 'textarea': ?>
						<div class="option_input option_textarea">
							<label for="<?php echo $value['id']; ?>"><?php echo $value['name']; ?></label>
							<textarea name="<?php echo $value['id']; ?>" rows="" cols=""><?php if ( get_settings( $value['id'] ) != "") { echo stripslashes(get_settings( $value['id']) ); } else { echo $value['std']; } ?></textarea>
							<small><?php echo $value['desc']; ?></small>
							<div class="clearfix"></div>
						</div>
					<?php break;

					case 'select': ?>
						<div class="option_input option_select">
							<label for="<?php echo $value['id']; ?>"><?php echo $value['name']; ?></label>
							<select name="<?php echo $value['id']; ?>" id="<?php echo $value['id']; ?>">
							<?php foreach ($value['options'] as $option) { ?>
							    <option <?php if (get_settings( $value['id'] ) == $option) { echo 'selected="selected"'; } ?>><?php echo $option; ?></option>
							<?php } ?>
							</select>
							<small><?php echo $value['desc']; ?></small>
							<div class="clearfix"></div>
						</div>
					<?php break;

					case "checkbox": ?>
						<div class="option_input option_checkbox">
							<label for="<?php echo $value['id']; ?>"><?php echo $value['name']; ?></label>
							<?php if(get_option($value['id'])){ $checked = "checked=\"checked\""; }else{ $checked = "";} ?>
							<input id="<?php echo $value['id']; ?>" type="checkbox" name="<?php echo $value['id']; ?>" value="true" <?php echo $checked; ?> /> 
							<small><?php echo $value['desc']; ?></small>
							<div class="clearfix"></div>
						</div>
					<?php break;

					case "section": 
					$i++; ?>
						<div class="input_section">
							<div class="input_title">
								<h3><img src="<?php echo get_template_directory_uri();?>/img/cog.png" alt="">&nbsp;<?php echo $value['name']; ?></h3>
								<span class="submit"><input name="save<?php echo $i; ?>" type="submit" class="button-primary" value="Save changes" /></span>
								<div class="clearfix"></div>
							</div>
							<div class="all_options">
					<?php break;

				}
			}
			?>

			<input type="hidden" name="action" value="save" />
			</form>
			<form method="post">
			<span class="submit">
			<input name="reset" type="submit" class="button" value="Reset" />
			<input type="hidden" name="action" value="reset" />
			</span>
			</form>
        </div>
		<div class="footer-credit">
			<p><?php _e('Origines is Proudly Powered by', 'origines') ?> <a href="http://twitter.github.com/bootstrap/" title="Bootstrap">Bootstrap</a> - <?php _e('Design by', 'origines') ?> <a href="http://www.tribeleadr.com/" title="Agence Social Media et Web à Orléans">TRIBELEADR</a></p>
		</div>
    </div>

    <?php
}
?>