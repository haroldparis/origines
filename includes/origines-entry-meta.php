<?php
/**
 * Name: Origines WordPress Theme
 * GitHub URI: https://github.com/haroldparis/origines
 * Description: Origines entry meta.
 * Author: Harold Paris
 * Twitter: @haroldparis
 * Author website: http://www.tribeleadr.com/
 */

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

?>