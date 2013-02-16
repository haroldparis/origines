<?php
/**
 * Origines template for displaying comments.
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
