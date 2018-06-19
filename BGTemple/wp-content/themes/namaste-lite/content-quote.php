<?php
/**
 * The template for displaying posts in the Quote post format
 *
 * @package WordPress
 * @subpackage Namaste
 * @since Namaste 1.0
 */
?>
	
    <!-- #post start -->
	<article id="post-<?php the_ID(); ?>" <?php post_class(); ?>>
    	<div class="articlecontainer">
                      
                <div class="entry-content">
                    <?php 
					$post_id = get_the_ID(); 
					if ( function_exists( 'fw_get_db_post_option') ) {  
					$namaste_quote_format = fw_get_db_post_option( $post_id, 'quote_format' ) ;
					$namaste_quote_format_author = fw_get_db_post_option( $post_id, 'quote_format_author' ) ;		
					?>
                    
					<div class="blockquote-2-holder">
                    	<div class="blockquote-2">
							<?php if( !empty ($namaste_quote_format)){ ?>
                            <div class="blockquote-2-content"><?php echo $namaste_quote_format; ?></div>
							<?php } ?>
							<?php if( !empty ($namaste_quote_format_author)){ ?>
                            <h2 class="blockquote-2-author"><?php echo $namaste_quote_format_author; ?></h2>
							<?php } ?>
                            <div class="clear"></div>
						</div>
					</div>	
                    
                    <?php } ?>			       
                </div>  
				<div class="clear"></div>
        </div>
	</article>
    <!-- #post end -->