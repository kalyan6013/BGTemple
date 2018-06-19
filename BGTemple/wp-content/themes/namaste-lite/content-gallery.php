<?php
/**
 * The template for displaying posts in the Gallery post format
 *
 * @package WordPress
 * @subpackage Namaste
 * @since Namaste 1.0
 */
 
// Theme Settings
if ( function_exists( 'fw_get_db_customizer_option') ) {
$namaste_read_more_text = fw_get_db_customizer_option( 'read_more_text');
if ( $namaste_read_more_text =='') {  $namaste_read_more_text = __( 'Read more', 'namaste-lite' ) ; }
}	
else {  $namaste_read_more_text = __( 'Read more', 'namaste-lite' ) ;}
?>

	<!-- #post start -->
    <article id="post-<?php the_ID(); ?>" <?php post_class(); ?>>
    	<div class="articlecontainer">
            <!-- blog-entry  -->
            <div class="blog-entry">
                
                <!-- entry image  -->
                <div class="entry-image">
					<?php
                    $post_id = get_the_ID(); 
                    if ( function_exists( 'fw_get_db_post_option') ) {  
                      $namaste_gallery_format = fw_get_db_post_option( $post_id, 'gallery_format' ) ;	
                    }
                    if( !empty ($namaste_gallery_format)){ 
                    ?>	
             
                    <div class="postimg">
                        <div id="postgallery-<?php echo get_the_ID() ; ?>" class="flexslider">
                            <ul class="slides">
                                <?php foreach ( $namaste_gallery_format as $attachment):  ?>
                                <li class="slide">
                                    <div class="single-post-image-holder">
                                        <div class="single-post-image" style="background-image: url(<?php echo esc_url ( $attachment['url'] );?>)"></div>
                                    </div>
                                </li>
                                <?php endforeach; ?> 
                            </ul>
                        </div>
                    </div>
             
                    <?php } else { ?>
                    	<?php namaste_post_thumbnails(); ?>
					<?php } ?>
                </div>
                <!-- entry image end -->
                
                <!-- entry texts -->
                <div class="entry-texts">
                    <div class="post-single-title-holder">
                    <a href="<?php the_permalink(); ?>" title="<?php printf(esc_attr_e('Permalink to ', 'namaste-lite'), the_title_attribute()); ?>"><h2 class="post-single-title"><?php echo the_title(); ?></h2></a>
                    <p class="post-single-categories"><?php the_category(' '); ?></p>
                    </div>
    
                    <div class="entry-content">
                        	<?php $namaste_excerpt = get_the_excerpt(); ?>
                            <p class="entry-excerpt"><?php echo wp_kses_post($namaste_excerpt); ?></p>
                        <div class="button read-more">
                        <a href="<?php the_permalink(); ?>" class="btn"><?php echo esc_html($namaste_read_more_text); ?></a>
                        </div>
                    </div>
                    
					<?php namaste_entry_infos(); ?>
                    
                </div>
                <!-- entry texts end  -->
            </div>
            <!-- blog-entry end  -->
            
            <script type="text/javascript">
            jQuery(document).ready(function(){
                jQuery('#postgallery-<?php the_ID(); ?>').flexslider({
                    animation: "fade",
                    touch:true,
                    animationDuration: 6000,
                    directionNav: true,
                    controlNav: false
                });
                
            });
            </script>
            <div class="clear"></div>
        </div>
	</article>
    <!-- #post end -->