<?php
/**
 * The Template for displaying all single posts.
 *
 * @package WordPress
 * @subpackage Namaste
 * @since Namaste 1.0
 */

get_header(); ?>
            
    <div id="singlepost">
    	
		  <?php if ( have_posts() ) while ( have_posts() ) : the_post(); ?>
      
      <div class="single-article-wrapper">
          <article id="post-<?php the_ID(); ?>" <?php post_class(); ?>>
          
          <?php $post_id = get_the_ID();
		  // Post Option
          if ( function_exists( 'fw_get_db_post_option') ) {  
            $namaste_gallery_format = fw_get_db_post_option( $post_id, 'gallery_format' ) ;
            $namaste_video_format = fw_get_db_post_option( $post_id, 'video_format' ) ;
            $namaste_audio_format = fw_get_db_post_option( $post_id, 'audio_format' ) ;	
            $namaste_quote_format = fw_get_db_post_option( $post_id, 'quote_format' ) ;
            $namaste_quote_format_author = fw_get_db_post_option( $post_id, 'quote_format_author' ) ;
            $namaste_link_format = fw_get_db_post_option( $post_id, 'link_format' ) ;	
            $post_nav = fw_get_db_post_option( $post_id, 'post_nav' ) ;	
          }
		  // Theme Settings
		  if ( function_exists( 'fw_get_db_customizer_option') ) {
			$allow_infos_for = fw_get_db_customizer_option( 'allow_post_info/on/allow_infos_for');
		  }
		  
          ?>

          <?php
          /* POST FORMATS HEADER
          ----------------------------------------------- */
		
          $post_format = get_post_format();
        
          if ($post_format == 'gallery') { 
          if( !empty ($namaste_gallery_format)){ 
          ?>	
		 
		        <div class="postimg">
              <div id="postgallery-<?php echo get_the_ID() ; ?>" class="flexslider">
                <ul class="slides">

                  <?php foreach ( $namaste_gallery_format as $attachment):  ?>
                  <li class="slide">
                    <div class="single-post-image-holder">
                      <div class="single-post-image" style="background-image: url(<?php echo esc_url( $attachment['url'] );?>)"></div>
                    </div>
                  </li>
                  <?php endforeach; ?> 
                                            
                </ul>
              </div>
            </div>
          <?php } ?>

		      <?php } elseif ($post_format == 'video') { 
		      if( !empty ($namaste_video_format)){ 
          ?>	
		 
		        <div class="iframe-holder"><?php echo $namaste_video_format; ?></div>
		 
		      <?php } ?>

          <?php } elseif ($post_format == 'audio') { 
		      if( !empty ($namaste_audio_format)){ 
          ?>	
		 
		        <div class="iframe-holder"><?php echo $namaste_audio_format; ?></div>
		 
          <?php } ?>

          <?php } else {

		        if (has_post_thumbnail()) {
            $image = wp_get_attachment_url( get_post_thumbnail_id()) ;        
            ?>

            <div class="single-post-image-holder">
              <div class="single-post-image" style="background-image: url(<?php echo esc_url($image) ; ?>)"></div>
            </div>
            <?php } ?>

          <?php } ?>

            <div class="post-single-title-holder">
              <h2 class="post-single-title"><?php echo the_title(); ?></h2>
              <p class="post-single-categories"><?php the_category(' '); ?></p>
            </div>
                

            <div class="entry-content">

              <?php
        			/* Content
              ----------------------------------------------- */ 
              the_content();
     
              if ($post_format == 'quote') { ?>
		 
              <div class="blockquote-2-holder">
                <div class="blockquote-2">
                  <?php if( !empty ($namaste_quote_format)){ ?><div class="blockquote-2-content"><?php echo wp_kses_post($namaste_quote_format); ?></div><?php } ?>
                  <?php if( !empty ($namaste_quote_format_author)){ ?><div class="blockquote-2-author"><?php echo esc_html($namaste_quote_format_author); ?></div><?php } ?>
                  <div class="clear"></div>
                </div>
              </div>		
              <?php } ?>

              <?php if ($post_format == 'link') { 
              if( !empty ($namaste_link_format)){ 
              ?>

              <div class="button read-more">
                <a href="<?php echo esc_url($namaste_link_format); ?>" class="btn"><?php _e('Read More', 'namaste-lite'); ?></a>
              </div>
              <?php } ?>
              <?php } ?>

            </div> 
    
            <div class="clearfix"></div><!-- clear float --> 
            <?php
            wp_link_pages( array(
                    'before' => '<div class="page-links">' . __( 'Pages:', 'namaste-lite' ),
                    'after'  => '</div>',
            ) );
            ?> 
        </article>

        <div class="entry-utility">
        	<?php if(isset($allow_infos_for['post'])){ ?>
				<?php namaste_post_infos(); ?>
            <?php } ?>
        </div>
             
        <?php namaste_post_tags(); ?>
        
      </div><!-- single-article-wrapper --> 
          
      <?php if (isset($post_nav) && ($post_nav != 'no')) {
		  the_post_navigation(array(
			'prev_text'          => '<div class="nav-indicator">' . __( 'Previous Post:', 'namaste-lite' ) . '</div><p>%title</p>',
        	'next_text'          => '<div class="nav-indicator">' . __( 'Next Post:', 'namaste-lite' ) . '</div><p>%title</p>',
        	'screen_reader_text' => __( 'Post navigation', 'namaste-lite' ),
		  )); 
	  }
	  ?>

      <?php comments_template(); ?>
        
      <?php endwhile; ?>
    
    </div><!-- singlepost --> 
    <div class="clearfix"></div><!-- clear float --> 

<?php get_footer(); ?>