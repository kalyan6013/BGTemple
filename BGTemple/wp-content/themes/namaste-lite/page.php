<?php
/**
 * The template for displaying all pages.
 *
 * @package WordPress
 * @subpackage Namaste
 * @since Namaste 1.0
 */
  
get_header();
?>
                        
		<?php if ( have_posts() ) while ( have_posts() ) : the_post(); ?>
   
        <div id="post-<?php the_ID(); ?>" <?php post_class(); ?>>
            <?php the_content( __( 'Read More', 'namaste-lite' ) ); ?>
            <?php wp_link_pages( array( 'before' => '<div class="page-link">' . __( 'Pages:', 'namaste-lite' ), 'after' => '</div>' ) ); ?>
            
            <div class="clear"></div>
            
        </div><!-- #post -->

		<?php comments_template( '', true ); ?>

        <?php endwhile; ?>
        
        <div class="clear"></div><!-- clear float --> 
                  	
		<?php get_footer(); ?>