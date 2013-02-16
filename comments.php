<?php
/**
 * Name: Origines WordPress Theme
 * GitHub URI: https://github.com/haroldparis/origines
 * Description: Origines template for comments.
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

<div id="comments">

	<?php if ( post_password_required() ) : ?>

	<p class="nopassword"><?php _e( 'This post is password protected. Enter the password to view any comments.', 'origines' ); ?></p>		

</div><!-- #comments -->

<?php
return;
endif;
?>

<?php if ( have_comments() ) : ?>

	<h3 id="comments-title"><?php
		printf( _n( 'One Response to %2$s', '%1$s Responses to %2$s', get_comments_number(), 'origines' ),
		number_format_i18n( get_comments_number() ), '<em>' . get_the_title() . '</em>' );
	?></h3>

	<?php if ( get_comment_pages_count() > 1 && get_option( 'page_comments' ) ) : // Are there comments to navigate through? ?>
			
	<ul class="pager">
  		<li class="previous">
    		<?php previous_comments_link( __( '<span class="meta-nav">&larr;</span> Older Comments', 'origines' ) ); ?>
  		</li>
  		<li class="next">
    		<?php next_comments_link( __( 'Newer Comments <span class="meta-nav">&rarr;</span>', 'origines' ) ); ?>
  		</li>
	</ul>

	<?php endif; ?>

	<?php wp_list_comments( array(
    	'walker' => new origines_walker_comment,
        'style' => '',
        'callback' => null,
        'end-callback' => null,
        'type' => 'all',
        'page' => null,
        'avatar_size' => 67
    ) ); ?>

	<?php if ( get_comment_pages_count() > 1 && get_option( 'page_comments' ) ) : // Are there comments to navigate through? ?>
			
	<ul class="pager">
  		<li class="previous">
    		<?php previous_comments_link( __( '<span class="meta-nav">&larr;</span> Older Comments', 'origines' ) ); ?>
  		</li>
  		<li class="next">
    		<?php next_comments_link( __( 'Newer Comments <span class="meta-nav">&rarr;</span>', 'origines' ) ); ?>
  		</li>
	</ul>

	<?php endif; ?>

	<?php if ( ! comments_open() && get_comments_number() ) : ?>

	<p class="nocomments"><?php _e( 'Comments are closed.' , 'origines' ); ?></p>

	<?php endif;  ?>

<?php endif; // end have_comments() ?>

<?php origines_comment_form(); ?>

</div><!-- #comments -->
