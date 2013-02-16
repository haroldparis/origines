<?php
/**
 * Name: Origines WordPress Theme
 * GitHub URI: https://github.com/haroldparis/origines
 * Description: Origines template for authors.
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

<?php get_header(); ?>

<div class="container">

<div class="row" >

	<div class="span9 content" role="main" itemprop="mainContentOfPage">
	
		<?php if ( function_exists('mybread') ) mybread(); ?>
	
		<?php
		/* Queue the first post, that way we know
		 * what author we're dealing with (if that is the case).
		 *
		 * We reset this later so we can run the loop
		 * properly with a call to rewind_posts().
		 */
		if ( have_posts() ) :
		the_post();
		?>
			
		<header class="entry-header page-header">
			<h1 class="entry-title">
				<?php printf( __( 'Author: %s', 'origines' ), '<span class="vcard"><a class="url fn n" href="' . esc_url( get_author_posts_url( get_the_author_meta( "ID" ) ) ) . '" title="' . esc_attr( get_the_author() ) . '" rel="me">' . get_the_author() . '</a></span>' ); ?>
			</h1>
		</header><!-- .page-header -->
		
		<?php if ( get_the_author_meta( 'description' ) ) : ?>
			
			<div class="author-info well media">
				<a href="<?php echo esc_url( get_author_posts_url( get_the_author_meta( 'ID' ) ) ); ?>" alt="<?php the_author(); ?>" id="author-avatar" class="pull-left">
					<?php origines_get_avatar( get_the_author_meta( 'user_email' ), 96); ?>
				</a>
				<div class="author-description media-body">
					<h4 class="media-heading"><?php printf( __( 'About %s', 'origines' ), get_the_author() ); ?></h4>
					<p><?php the_author_meta( 'description' ); ?></p>
				</div><!-- .author-description -->
			</div><!-- .author-info -->
			
			<br>
		
		<?php endif; ?>
		
		<?php
		/* Since we called the_post() above, we need to
		 * rewind the loop back to the beginning that way
		 * we can run the loop properly, in full.
		 */
		rewind_posts();
		endif;
		?>

		<?php get_template_part( 'loop' ); ?>
		
	</div><!-- .span9 -->

	<?php get_sidebar(); ?>
	
</div><!-- .row -->

<?php get_footer(); ?>