<?php
/**
 * The template for displaying posts in the Link post format
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
						<?php namaste_post_thumbnails(); ?>
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
                        <?php
                        $post_id = get_the_ID(); 
                        if ( function_exists( 'fw_get_db_post_option') ) {  
                        $namaste_link_format = fw_get_db_post_option( $post_id, 'link_format' ) ;	
                        
                        if( !empty ($namaste_link_format)){ 
                        ?>	
                        
                        <div class="button read-more">
                            <a href="<?php echo esc_url($namaste_link_format); ?>" class="btn"><?php echo esc_html($namaste_read_more_text); ?></a>
                        </div>
                        <?php } } else {
						$content = get_the_content();
						$content = preg_match_all( '/href\s*=\s*[\"\']([^\"\']+)/', $content, $namaste_links );
						$content = $namaste_links[1][0];
						$namaste_link_format = $content; ?>
                        <div class="button read-more">
                            <a href="<?php echo esc_url($namaste_link_format); ?>" class="btn"><?php echo esc_html($namaste_read_more_text); ?></a>
                        </div>
						<?php } ?>
                    </div> 
                    
					<?php namaste_entry_infos(); ?>
                    
                </div>
                <!-- entry texts end  -->
            </div>
            <!-- blog-entry end  -->
            <div class="clear"></div>
        </div>
	</article>
    <!-- #post end -->