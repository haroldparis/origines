<?php
/**
 * Name: Origines WordPress Theme
 * GitHub URI: https://github.com/haroldparis/origines
 * Description: Origines functions and definitions.
 * Author: Harold Paris
 * Twitter: @haroldparis
 * Author website: http://www.tribeleadr.com/
 */

require_once( trailingslashit( get_template_directory() ) . 'includes/origines-init.php'); // Style, scripts, lang and custom category init
require_once( trailingslashit( get_template_directory() ) . 'includes/origines-admin.php'); // Origines Panel for admin purpose
require_once( trailingslashit( get_template_directory() ) . 'includes/origines-walker.php'); // Custom walkers and other functions to marry WordPress and Bootstrap 
require_once( trailingslashit( get_template_directory() ) . 'includes/origines-entry-meta.php'); // Custom entry meta inspired by TwentyTen
require_once( trailingslashit( get_template_directory() ) . 'includes/origines-functions.php'); // Origines functions for the home, logo, the magic footer and Google Analytics

?>