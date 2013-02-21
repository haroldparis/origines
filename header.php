<!DOCTYPE html>
<?php
/**
 * Name: Origines WordPress Theme
 * GitHub URI: https://github.com/haroldparis/origines
 * Description: Origines template for header.
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
?>
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
<link rel="apple-touch-icon" href="<?php bloginfo( 'template_directory' ); ?>/img/apple-icon-touch.png">
<link rel="icon" href="<?php bloginfo( 'template_directory' ); ?>/img/favicon.png">
<!--[if IE]>
<link rel="shortcut icon" href="<?php bloginfo( 'template_directory' ); ?>/img/favicon.ico">
<![endif]-->
<meta name="msapplication-TileColor" content="#EEEEEE">
<meta name="msapplication-TileImage" content="<?php bloginfo( 'template_directory' ); ?>/img/win8-tile-icon.png">

<!-- le CSS -->
<link rel="stylesheet" type="text/css" media="all" href="<?php bloginfo( 'stylesheet_url' ); ?>" />
<!--[if lt IE 9]>
<script src="<?php bloginfo( 'template_directory' ); ?>/js/html5shiv.js" type="text/javascript"></script>
<![endif]-->

<link rel="pingback" href="<?php bloginfo( 'pingback_url' ); ?>" />

<!-- le WordPress head functions -->
<?php wp_head(); ?>
<!-- /le WordPress head functions -->
</head>

<body <?php body_class(); ?> itemscope itemtype="http://schema.org/WebPage">

<div class="navbar navbar-fixed-top">
	<div class="navbar-inner">
    	<div class="container">
        	<button type="button" class="btn btn-navbar" data-toggle="collapse" data-target=".nav-collapse">
        	<span class="icon-bar"></span>
        	<span class="icon-bar"></span>
        	<span class="icon-bar"></span>
        	</button>
        	<?php origines_logo(); ?>
        	<?php wp_nav_menu( array( 'menu' => 'Header Menu', 'container' => div, 'container_class' => 'nav-collapse collapse', 'menu_class' => 'nav', 'walker' => new origines_nav_walker() )); ?>
        	<?php get_search_form(); ?>
    	</div>
    </div>
</div>