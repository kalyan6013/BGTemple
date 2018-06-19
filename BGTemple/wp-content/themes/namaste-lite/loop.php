<?php
/**
 * The loop that displays posts.
 *
 * @package WordPress
 * @subpackage Namaste
 * @since Namaste 1.0
 */

// Theme Settings
?>
	
<?php if ( ! have_posts() ) : ?>
	<article id="post-0" class="post error404 not-found">
		<h1 class="posttitle"><?php _e( 'Not Found', 'namaste-lite' ); ?></h1>
		<div class="entry">
			<p><?php _e( 'Apologies, but no results were found for the requested archive. Perhaps searching will help find a related post.', 'namaste-lite' ); ?></p>
			<?php get_search_form(); ?>
		</div>
	</article>
<?php endif; ?>

<div id="blog-normal-content">
<?php while ( have_posts() ) : the_post(); ?>

	<?php /* How to display all posts. */ 
	get_template_part( 'content', get_post_format() ); 
	?>
	
	<?php comments_template( '', true ); ?>

<?php endwhile; // End the loop. Whew. ?>


<?php /* Display navigation to next/previous pages when applicable */ ?>
<?php
the_posts_pagination( array(
	'mid_size' => 2,
	'prev_text' => '<i class="fa fa-angle-double-left"></i>',
	'next_text' => '<i class="fa fa-angle-double-right"></i>',
) ); 
?>
</div>