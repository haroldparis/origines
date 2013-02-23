<?php
/**
 * Name: Origines WordPress Theme
 * GitHub URI: https://github.com/haroldparis/origines
 * Description: Origines template for searchbox.
 * Author: Harold Paris
 * Twitter: @haroldparis
 * Author website: http://www.tribeleadr.com/
 */
?>

<form method="get" class="navbar-search pull-right visible-desktop" action="<?php echo home_url( '/' ); ?>">
	<input type="text" name="s" id="search" class="search-query" value="<?php the_search_query(); ?>" placeholder="Search" />
</form>