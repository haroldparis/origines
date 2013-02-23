<?php
/**
 * Name: Origines WordPress Theme
 * GitHub URI: https://github.com/haroldparis/origines
 * Description: Origines template for the loop-page.
 * Author: Harold Paris
 * Twitter: @haroldparis
 * Author website: http://www.tribeleadr.com/
 */
?>

<?php if ( have_posts() ) : ?>

	<?php while ( have_posts() ) : the_post(); ?>
			
		<article id="post-<?php the_ID(); ?>" <?php post_class(); ?>>
					
			<header class="o-title-header page-header">
				<h1 class="o-title">
					<?php the_title(); ?>
				</h1> <!-- /.o-title -->
			</header> <!-- /.o-title-header -->
			
			<div id="o-content" class="o-entry-content clearfix" itemprop="MainContentofPage">

				<?php the_content(); ?>

			</div> <!-- /#o-content -->

			<p class="o-portfolio-element-meta aligncenter">

				<?php 
				$portfolio_url_value = get_post_meta($post->ID, '_portfolio_url', true);
				// check if the custom field has a value
				if( $portfolio_url_value != '' ): ?>
				 	<a class="o-portfolio-element-url-link btn" href="<?php echo $portfolio_url_value; ?>"><i class="icon-plus-sign"></i> <?php _e( 'Review more projects...', 'origines' ); ?></a>
				<?php
				endif;
				?>

				<?php 
				$url_value = get_post_meta($post->ID, '_url', true);
				// check if the custom field has a value
				if( $url_value != '' ): ?>
				 	<a class="o-portfolio-element-url-link btn btn-primary" href="<?php echo $url_value; ?>" target="_blank"><i class="icon-share-alt icon-white"></i> <?php _e( 'Live preview', 'origines' ); ?></a>
				<?php
				endif;
				?>
			</p>

		</article>
	
	<?php endwhile; // end the Loop. ?>
		
<?php else : ?>

	<article id="post-0" class="post no-results not-found">

		<header class="o-title-header page-header">
			<h1 class="o-title">
				<?php _e( 'Nothing Found', 'origines' ); ?>
			</h1> <!-- /.o-title -->
		</header> <!-- /.o-title-header -->

		<div id="o-content" class="o-entry-content clearfix" itemprop="MainContentofPage">
		
			<p><?php _e( 'Apologies, but no results were found.', 'origines' ); ?></p>

		</div> <!-- /#o-content -->

	</article><!-- /#post-0 -->

<?php endif; ?>
