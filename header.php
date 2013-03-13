<?php
/**
 * Name: Origines WordPress Theme
 * GitHub URI: https://github.com/haroldparis/origines
 * Description: Origines template for header.
 * Author: Harold Paris
 * Twitter: @haroldparis
 * Author website: http://www.tribeleadr.com/
 */
?>
<!DOCTYPE html>
<html lang="<?php bloginfo( 'language' ); ?>">
<head>
	<meta charset="<?php bloginfo( 'charset' ); ?>">

	<title><?php wp_title(''); ?></title>

	<!-- le Google Chrome frame for IE -->
	<meta http-equiv="X-UA-Compatible" content="IE=edge,chrome=1">

	<!-- le Mobile meta -->
	<meta name="HandheldFriendly" content="True">
	<meta name="MobileOptimized" content="320">
	<meta name="viewport" content="width=device-width, initial-scale=1.0">

	<!-- le Favicon & mobile icons -->
	<link rel="apple-touch-icon" href="<?php echo get_option('origines_appleicon'); ?>">
	<link rel="icon" href="<?php echo get_option('origines_favicon'); ?>">

	<meta name="msapplication-TileColor" content="#EEEEEE">
	<meta name="msapplication-TileImage" content="<?php echo get_option('origines_win8icon'); ?>">

	<!--[if lt IE 9]>
	<?php wp_print_scripts(array('html5shiv')); ?>
	<![endif]-->

	<link rel="pingback" href="<?php bloginfo( 'pingback_url' ); ?>" />

	<!-- le WordPress head functions -->
	<?php wp_head(); ?>
</head>

<body <?php body_class(); ?> itemscope itemtype="http://schema.org/WebPage">

<header id="o-nav-top">
	<div class="navbar navbar-fixed-top">
		<div class="navbar-inner">
			<div class="container">
				<button type="button" class="btn btn-navbar" data-toggle="collapse" data-target=".nav-collapse">
				<span class="icon-bar"></span>
				<span class="icon-bar"></span>
				<span class="icon-bar"></span>
				</button>
				<?php if (function_exists('origines_logo')) origines_logo(); ?>
                <!-- to display the header-menu, you must create one and assign it to the header-menu location in your wp-admin Appearance/Menus options -->
				<?php wp_nav_menu( array( 'theme_location' => 'header-menu', 'container' => 'nav', 'container_class' => 'nav-collapse collapse', 'menu_class' => 'nav', 'fallback_cb' => false, 'walker' => new origines_nav_walker() )); ?>
				<?php get_search_form(); ?>
			</div> <!-- /.container -->
		</div> <!-- /.navbar-inner -->
	</div> <!-- /.navbar -->
</header> <!-- /#o-nav-top -->