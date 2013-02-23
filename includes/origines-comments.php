<?php 
/**
 * Name: Origines WordPress Theme
 * GitHub URI: https://github.com/haroldparis/origines
 * Description: Origines theme walkers.
 * Author: Harold Paris
 * Twitter: @haroldparis
 * Author website: http://www.tribeleadr.com/
 */

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

?>