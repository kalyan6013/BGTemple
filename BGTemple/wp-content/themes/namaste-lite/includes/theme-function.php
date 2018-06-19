<?php

/*********For Localization**************/
add_action('after_setup_theme', 'namaste_load_textdomain');
function namaste_load_textdomain(){
	load_theme_textdomain( 'namaste-lite', get_template_directory().'/languages' );
}

/*********Template for comments and pingbacks**************/
if ( ! function_exists( 'namaste_comment' ) ) :
function namaste_comment( $comment, $args, $depth ) {
	$GLOBALS['comment'] = $comment;
	switch ( $comment->comment_type ) :
		case '' :
	?>
	<li <?php comment_class(); ?> id="li-comment-<?php comment_ID(); ?>">
		<div id="comment-<?php comment_ID(); ?>" class="con-comment">
		<div class="comment-author vcard">
			<?php if ( $args['avatar_size'] != 0 ) echo get_avatar( $comment, $args['avatar_size'] ); ?>
		</div><!-- .comment-author .vcard -->


		<div class="comment-body">
			<?php  printf( __( '%s ', 'namaste-lite' ), sprintf( '<cite class="fn">%s</cite>', get_comment_author_link() ) ); ?>
            <span class="time">
               <?php
                /* translators: 1: date, 2: time */
                printf( __( '%1$s %2$s', 'namaste-lite' ), get_comment_date(),  get_comment_time() ); ?>
            </span>
			<div class="commenttext">
			<?php comment_text(); ?>
			<?php if ( $comment->comment_approved == '0' ) : ?>
				<em><?php _e( 'Your comment is awaiting moderation.', 'namaste-lite' ); ?></em>
			<?php endif; ?>
            <?php edit_comment_link( __( 'Edit', 'namaste-lite' ), '<div class="com-link">', '</div>' );?>
			<?php comment_reply_link( 
                array_merge( 
                    $args, array(
                    'before' => '<div class="com-reply">', 
                    'depth' => $depth, 
                    'max_depth' => $args['max_depth'],
                    'after'      => '</div>' 
                    ) 
                ) 
            ); ?>
            
			</div>
            <div class="arrow"></div>
			<div class="clear"></div>
		</div>
		<div class="clear"></div>
	</div><!-- #comment-##  -->

	<?php
			break;
		case 'pingback'  :
		case 'trackback' :
	?>
	<li class="post pingback">
		<p><?php _e( 'Pingback:', 'namaste-lite' ); ?> <?php comment_author_link(); ?><?php edit_comment_link( __('(Edit)', 'namaste-lite'), ' ' ); ?></p>
	<?php
			break;
	endswitch;
}
endif;

/*********For top menu**************/
function namaste_nav_page_fallback() {
if(is_front_page()){$class="current_page_item";}else{$class="";}
print '<ul id="topnav" class="namaste-menu"><li class="'.$class.'"><a href=" '.esc_url(home_url( '/')) .' " title=" '.__('Click for Home', 'namaste-lite').' ">'.__('Home', 'namaste-lite').'</a></li>';
    wp_list_pages( 'title_li=&sort_column=menu_order' );
print '</ul>';
}

/*********For clean shortcodes**************/
function namaste_clean_shortcodes($content){   
$array = array (
    '<p>[' => '[', 
    ']</p>' => ']', 
    ']<br />' => ']'
);
$content = strtr($content, $array);
return $content;
}
add_filter('the_content', 'namaste_clean_shortcodes');


/*********Make all future posts visible in single post**************/
add_filter('the_posts', 'namaste_show_future_posts');
function namaste_show_future_posts($posts){ 
   global $wp_query, $wpdb;
   if(is_single() && $wp_query->post_count ==0){ 
      $posts = $wpdb->get_results($wp_query->request);
   } 
   return $posts;
};

/*********Display navigation to next/previous comments**************/
if ( ! function_exists( 'namaste_comment_nav' ) ) {
function namaste_comment_nav() {
	// Are there comments to navigate through?
	if ( get_comment_pages_count() > 1 && get_option( 'page_comments' ) ) :
	?>
	<nav class="navigation comment-navigation">
		<h2 class="screen-reader-text"><?php _e( 'Comment navigation', 'namaste-lite' ); ?></h2>
		<div class="nav-links">
			<?php
				if ( $prev_link = get_previous_comments_link( __( 'Older Comments', 'namaste-lite' ) ) ) :
					printf( '<div class="nav-previous">%s</div>', $prev_link );
				endif;

				if ( $next_link = get_next_comments_link( __( 'Newer Comments', 'namaste-lite' ) ) ) :
					printf( '<div class="nav-next">%s</div>', $next_link );
				endif;
			?>
		</div><!-- .nav-links -->
	</nav><!-- .comment-navigation -->
	<?php
	endif;
}
}

/*********Post Thumbnails**************/
if(!function_exists('namaste_post_thumbnails')){
function namaste_post_thumbnails(){		
?>
	<?php if (has_post_thumbnail()) { ?>
        <div class="single-post-image-holder">
                <?php the_post_thumbnail( 'namaste-entry-image' ) ; ?>
        </div>
    <?php } ?>
<?php                    
}
}

/*********Layout functions**************/
// Layout classes for maincontent
if ( ! function_exists( 'namaste_maincontent_with_sidebar' ) ) :
function namaste_maincontent_with_sidebar() {

	// Theme Settings
	$post_id = get_the_ID();  
	if ( function_exists( 'fw_get_db_post_option') ) {
		$basic_post_layer_select = fw_get_db_post_option( $post_id, 'basic_post_layer_select' ) ;
	}
	if ( function_exists( 'fw_get_db_customizer_option') ) {
		$basic_layer_select = fw_get_db_customizer_option( 'basic_layer_select');
		$blog_basic_layer_select = fw_get_db_customizer_option( 'blog_basic_layer_select');
	}
	
	if ( function_exists( 'fw_get_db_customizer_option') ) { 
		if (is_home() || is_tax() || is_archive() || is_search() || is_404()) {
			if ($blog_basic_layer_select == '2-col-l') { echo 'contentcol columns positionleft';
			} elseif ($blog_basic_layer_select == '2-col-r') { echo 'contentcol columns positionright';
			} elseif ($blog_basic_layer_select == '1-col') { echo 'blogcontent columns';
			} else {
				if ($basic_layer_select == '2-col-l') { echo 'contentcol columns positionleft';
				} elseif ($basic_layer_select == '2-col-r') { echo 'contentcol columns positionright';
				} else { echo 'blogcontent columns';
				}
			}
		} elseif ($basic_post_layer_select == '2-col-l') { echo 'contentcol columns positionleft';
		} elseif ($basic_post_layer_select == '2-col-r') { echo 'contentcol columns positionright';
		} elseif ($basic_post_layer_select == '1-col') { echo 'content';
		} else {
			if ($basic_layer_select == '2-col-l') { echo 'contentcol columns positionleft';
			} elseif ($basic_layer_select == '2-col-r') { echo 'contentcol columns positionright';
			}
		}   
	}
}
endif;

// Layout classes for sidebar
if ( ! function_exists( 'namaste_sidebar_layout' ) ) :
function namaste_sidebar_layout() {

	$post_id = get_the_ID(); 
	if ( function_exists( 'fw_get_db_post_option') ) {  
	$basic_post_layer_select = fw_get_db_post_option( $post_id, 'basic_post_layer_select' ) ;
	}
	
	if ( function_exists( 'fw_get_db_customizer_option') ) {
	$basic_layer_select = fw_get_db_customizer_option( 'basic_layer_select');
	$blog_basic_layer_select = fw_get_db_customizer_option( 'blog_basic_layer_select');
	$shop_basic_layer_select = fw_get_db_customizer_option( 'shop_basic_layer_select');
	
	if (is_home() || is_tax() || is_archive() || is_search() || is_404()) { ?>
		<?php if ($blog_basic_layer_select == '2-col-l') { ?>                                         
			<aside id="sidebar" class="sidebarcol columns positionright sidebar-right">
				<?php get_sidebar(); ?>
			</aside><!-- sidebar -->
		<?php } elseif ($blog_basic_layer_select == '2-col-r') { ?>
			<aside id="sidebar" class="sidebarcol columns positionleft sidebar-left">
				<?php get_sidebar(); ?>
			</aside>                       
		<?php } elseif ($blog_basic_layer_select == '1-col') { ?>
		<?php } else { ?>
			<?php if ($basic_layer_select == '2-col-l') { ?>                                         
				<aside id="sidebar" class="sidebarcol columns positionright sidebar-right">
					<?php get_sidebar(); ?>
				</aside><!-- sidebar -->
			<?php } elseif ($basic_layer_select == '2-col-r') { ?>
				<aside id="sidebar" class="sidebarcol columns positionleft sidebar-left">
					<?php get_sidebar(); ?>
				</aside>                        
			<?php } elseif ($basic_layer_select == '1-col') { ?>
			<?php }?>
		<?php } ?>
	<?php } elseif ($basic_post_layer_select == '2-col-l') { ?>                                         
		<aside id="sidebar" class="sidebarcol columns positionright sidebar-right">
		<?php get_sidebar(); ?>  
		</aside><!-- sidebar -->
	<?php } elseif ($basic_post_layer_select == '2-col-r') { ?>
		<aside id="sidebar" class="sidebarcol columns positionleft sidebar-left">
		<?php get_sidebar(); ?> 
		</aside>                       
	<?php } elseif ($basic_post_layer_select == '1-col') { ?>
	<?php } else {  ?> 
		<?php if ($basic_layer_select == '2-col-l') { ?>                                         
			<aside id="sidebar" class="sidebarcol columns positionright sidebar-right">
				<?php  get_sidebar(); ?> 
			</aside><!-- sidebar -->
		<?php } elseif ($basic_layer_select == '2-col-r') { ?>
			<aside id="sidebar" class="sidebarcol columns positionleft sidebar-left">
				<?php get_sidebar(); ?>  
			</aside>                        
		<?php } elseif ($basic_layer_select == '1-col') { ?>
		<?php }?>
	<?php } ?>
	<?php } 

}
endif;

 /*********Post Infos**************/
if(!function_exists('namaste_post_infos')){
function namaste_post_infos(){

if ( function_exists( 'fw_get_db_customizer_option') ) {
    $allow_post_info = fw_get_db_customizer_option( 'allow_post_info/on_off');
	$infos = fw_get_db_customizer_option( 'allow_post_info/on/infos');
}

$posttype = get_post_type(get_the_ID());

if(isset($allow_post_info) && ($allow_post_info == 'on')){
?>

	<div class="post-infos">
        <?php if(isset($infos['date'])){ ?>
        <div class="date"><i class="fa fa-calendar"></i> <?php the_time(get_option('date_format')); ?></div>
        <?php } ?>
        <?php if(isset($infos['author'])){ ?>
        <div class="user"> <i class="fa fa-user"></i> <a href="<?php echo get_author_posts_url( get_the_author_meta( 'ID' ) );?>"><?php the_author();?></a></div>
        <?php } ?>
        <?php if ($posttype == 'post'){ ?>
        <?php if(isset($infos['categories'])){ ?>
        <div class="category"> <i class="fa fa-folder"></i> <?php the_category(', '); ?></div>
        <?php } ?>
        <?php } ?>
        <?php if(isset($infos['comments'])){ ?>
        <div class="comment"> <i class="fa fa-comment"></i> 
            <?php 
              comments_popup_link( 
              __( 'No Comments', 'namaste-lite' ), 
              __( '1 Comment', 'namaste-lite' ), 
              __( '% Comments', 'namaste-lite' ),
              __( 'Comments Closed', 'namaste-lite' )
              );
            ?>
        </div>
        <?php } ?>
    </div>      
<?php
}
}
}

/*********Post Tags**************/
if(!function_exists('namaste_post_tags')){
function namaste_post_tags(){

if ( function_exists( 'fw_get_db_customizer_option') ) {
    $allow_post_info = fw_get_db_customizer_option( 'allow_post_info/on_off');
	$infos = fw_get_db_customizer_option( 'allow_post_info/on/infos');
}

if(isset($allow_post_info) && ($allow_post_info == 'on')){ ?>	

	<?php if(isset($infos['tags'])){ ?>
        <div class="entry-tag">
            <?php
            $posttags = get_the_tags();
            if($posttags){
            ?>
            <span class="tag-text"><?php _e('Tags :', 'namaste-lite'); ?></span>
            <?php 
            the_tags('<div class="tag-items"><span>','</span><span>','</span></div>'); 
            } 
            ?>
        </div>
    <?php } ?>   
<?php } elseif(isset($allow_post_info) && ($allow_post_info == 'off')){ } else { ?>
<div class="entry-tag">
	<?php
    $posttags = get_the_tags();
    if($posttags){
    ?>
    <span class="tag-text"><?php _e('Tags :', 'namaste-lite'); ?></span>
    <?php 
    the_tags('<div class="tag-items"><span>','</span><span>','</span></div>'); 
    } 
    ?>
</div>
<?php
}
}
}

/*********Entry Infos**************/
if(!function_exists('namaste_entry_infos')){
function namaste_entry_infos(){

if ( function_exists( 'fw_get_db_customizer_option') ) {
$allow_infos_for = fw_get_db_customizer_option( 'allow_post_info/on/allow_infos_for');
}
?>

<div class="entry-infos">
	<div class="entry-utility">
		<?php if(isset($allow_infos_for['blog'])){ ?>
			<?php namaste_post_infos(); ?>
        <?php } ?>
	</div>
	<?php if(isset($allow_infos_for['blog'])){ ?>
		<?php namaste_post_tags(); ?>
    <?php } ?> 
</div>	

<?php
}
}

/*********Unyson Icons**************/
function namaste_filter_theme_new_icon_set($sets) {
    $sets['namaste'] = array(
        'font-style-src' => get_template_directory_uri().'/css/font-awesome.css',
        'container-class' => 'fa-lg', // some fonts need special wrapper class to display properly
        'groups' => array(
            'namaste' 		  => __('Namaste Icons', 'namaste-lite'),
			'web-application' => __('Web Application Icons', 'namaste-lite'),
			'hand'            => __('Hand Icons', 'namaste-lite'),
			'transportation'  => __('Transportation Icons', 'namaste-lite'),
			'gender'          => __('Gender Icons', 'namaste-lite'),
			'file-type'       => __('File Type Icons', 'namaste-lite'),
			'payment'         => __('Payment Icons', 'namaste-lite'),
			'currency'        => __('Currency Icons', 'namaste-lite'),
			'text-editor'     => __('Text Editor Icons', 'namaste-lite'),
			'directional'     => __('Directional Icons', 'namaste-lite'),
			'video-player'    => __('Video Player Icons', 'namaste-lite'),
			'brand'           => __('Brand Icons', 'namaste-lite'),
			'medical'         => __('Medical Icons', 'namaste-lite'),
        ),
        'icons' => array(
            // Web Application Icons
            'fa fa-1-no-icon'			   => array('group' => 'brand'),
			'fa fa-namaste-buddha' 		   => array('group' => 'namaste'),
			'fa fa-namaste-hand' 		   => array('group' => 'namaste'),
            'fa fa-namaste-lotus' 		   => array('group' => 'namaste'),
            'fa fa-namaste-om' 		       => array('group' => 'namaste'),
            'fa fa-namaste-palm' 		   => array('group' => 'namaste'),
			'fa fa-namaste-yoga' 		   => array('group' => 'namaste'),
			'fa fa-adjust'                 => array( 'group' => 'web-application' ),
			'fa fa-anchor'                 => array( 'group' => 'web-application' ),
			'fa fa-archive'                => array( 'group' => 'web-application' ),
			'fa fa-area-chart'             => array( 'group' => 'web-application' ),
			'fa fa-arrows'                 => array( 'group' => 'web-application' ),
			'fa fa-arrows-h'               => array( 'group' => 'web-application' ),
			'fa fa-arrows-v'               => array( 'group' => 'web-application' ),
			'fa fa-asterisk'               => array( 'group' => 'web-application' ),
			'fa fa-at'                     => array( 'group' => 'web-application' ),
			'fa fa-automobile'             => array( 'group' => 'web-application' ),
			'fa fa-balance-scale'          => array( 'group' => 'web-application' ),
			'fa fa-ban'                    => array( 'group' => 'web-application' ),
			'fa fa-bank'                   => array( 'group' => 'web-application' ),
			'fa fa-bar-chart'              => array( 'group' => 'web-application' ),
			'fa fa-bar-chart-o'            => array( 'group' => 'web-application' ),
			'fa fa-barcode'                => array( 'group' => 'web-application' ),
			'fa fa-bars'                   => array( 'group' => 'web-application' ),
			'fa fa-battery-0'              => array( 'group' => 'web-application' ),
			'fa fa-battery-1'              => array( 'group' => 'web-application' ),
			'fa fa-battery-2'              => array( 'group' => 'web-application' ),
			'fa fa-battery-3'              => array( 'group' => 'web-application' ),
			'fa fa-battery-4'              => array( 'group' => 'web-application' ),
			'fa fa-battery-empty'          => array( 'group' => 'web-application' ),
			'fa fa-battery-full'           => array( 'group' => 'web-application' ),
			'fa fa-battery-half'           => array( 'group' => 'web-application' ),
			'fa fa-battery-quarter'        => array( 'group' => 'web-application' ),
			'fa fa-battery-three-quarters' => array( 'group' => 'web-application' ),
			'fa fa-bed'                    => array( 'group' => 'web-application' ),
			'fa fa-beer'                   => array( 'group' => 'web-application' ),
			'fa fa-bell'                   => array( 'group' => 'web-application' ),
			'fa fa-bell-o'                 => array( 'group' => 'web-application' ),
			'fa fa-bell-slash'             => array( 'group' => 'web-application' ),
			'fa fa-bell-slash-o'           => array( 'group' => 'web-application' ),
			'fa fa-bicycle'                => array( 'group' => 'web-application' ),
			'fa fa-binoculars'             => array( 'group' => 'web-application' ),
			'fa fa-birthday-cake'          => array( 'group' => 'web-application' ),
			'fa fa-bolt'                   => array( 'group' => 'web-application' ),
			'fa fa-bomb'                   => array( 'group' => 'web-application' ),
			'fa fa-book'                   => array( 'group' => 'web-application' ),
			'fa fa-bookmark'               => array( 'group' => 'web-application' ),
			'fa fa-bookmark-o'             => array( 'group' => 'web-application' ),
			'fa fa-briefcase'              => array( 'group' => 'web-application' ),
			'fa fa-bug'                    => array( 'group' => 'web-application' ),
			'fa fa-building'               => array( 'group' => 'web-application' ),
			'fa fa-building-o'             => array( 'group' => 'web-application' ),
			'fa fa-bullhorn'               => array( 'group' => 'web-application' ),
			'fa fa-bullseye'               => array( 'group' => 'web-application' ),
			'fa fa-bus'                    => array( 'group' => 'web-application' ),
			'fa fa-cab'                    => array( 'group' => 'web-application' ),
			'fa fa-calculator'             => array( 'group' => 'web-application' ),
			'fa fa-calendar'               => array( 'group' => 'web-application' ),
			'fa fa-calendar-check-o'       => array( 'group' => 'web-application' ),
			'fa fa-calendar-minus-o'       => array( 'group' => 'web-application' ),
			'fa fa-calendar-o'             => array( 'group' => 'web-application' ),
			'fa fa-calendar-plus-o'        => array( 'group' => 'web-application' ),
			'fa fa-calendar-times-o'       => array( 'group' => 'web-application' ),
			'fa fa-camera'                 => array( 'group' => 'web-application' ),
			'fa fa-camera-retro'           => array( 'group' => 'web-application' ),
			'fa fa-car'                    => array( 'group' => 'web-application' ),
			'fa fa-caret-square-o-down'    => array( 'group' => 'web-application' ),
			'fa fa-caret-square-o-left'    => array( 'group' => 'web-application' ),
			'fa fa-caret-square-o-right'   => array( 'group' => 'web-application' ),
			'fa fa-caret-square-o-up'      => array( 'group' => 'web-application' ),
			'fa fa-cart-arrow-down'        => array( 'group' => 'web-application' ),
			'fa fa-cart-plus'              => array( 'group' => 'web-application' ),
			'fa fa-cc'                     => array( 'group' => 'web-application' ),
			'fa fa-certificate'            => array( 'group' => 'web-application' ),
			'fa fa-check'                  => array( 'group' => 'web-application' ),
			'fa fa-check-circle'           => array( 'group' => 'web-application' ),
			'fa fa-check-circle-o'         => array( 'group' => 'web-application' ),
			'fa fa-check-square'           => array( 'group' => 'web-application' ),
			'fa fa-check-square-o'         => array( 'group' => 'web-application' ),
			'fa fa-child'                  => array( 'group' => 'web-application' ),
			'fa fa-circle'                 => array( 'group' => 'web-application' ),
			'fa fa-circle-o'               => array( 'group' => 'web-application' ),
			'fa fa-circle-o-notch'         => array( 'group' => 'web-application' ),
			'fa fa-circle-thin'            => array( 'group' => 'web-application' ),
			'fa fa-clock-o'                => array( 'group' => 'web-application' ),
			'fa fa-clone'                  => array( 'group' => 'web-application' ),
			'fa fa-close'                  => array( 'group' => 'web-application' ),
			'fa fa-cloud'                  => array( 'group' => 'web-application' ),
			'fa fa-cloud-download'         => array( 'group' => 'web-application' ),
			'fa fa-cloud-upload'           => array( 'group' => 'web-application' ),
			'fa fa-code'                   => array( 'group' => 'web-application' ),
			'fa fa-code-fork'              => array( 'group' => 'web-application' ),
			'fa fa-coffee'                 => array( 'group' => 'web-application' ),
			'fa fa-cog'                    => array( 'group' => 'web-application' ),
			'fa fa-cogs'                   => array( 'group' => 'web-application' ),
			'fa fa-comment'                => array( 'group' => 'web-application' ),
			'fa fa-comment-o'              => array( 'group' => 'web-application' ),
			'fa fa-commenting'             => array( 'group' => 'web-application' ),
			'fa fa-commenting-o'           => array( 'group' => 'web-application' ),
			'fa fa-comments'               => array( 'group' => 'web-application' ),
			'fa fa-comments-o'             => array( 'group' => 'web-application' ),
			'fa fa-compass'                => array( 'group' => 'web-application' ),
			'fa fa-copyright'              => array( 'group' => 'web-application' ),
			'fa fa-creative-commons'       => array( 'group' => 'web-application' ),
			'fa fa-credit-card'            => array( 'group' => 'web-application' ),
			'fa fa-crop'                   => array( 'group' => 'web-application' ),
			'fa fa-crosshairs'             => array( 'group' => 'web-application' ),
			'fa fa-cube'                   => array( 'group' => 'web-application' ),
			'fa fa-cubes'                  => array( 'group' => 'web-application' ),
			'fa fa-cutlery'                => array( 'group' => 'web-application' ),
			'fa fa-dashboard'              => array( 'group' => 'web-application' ),
			'fa fa-database'               => array( 'group' => 'web-application' ),
			'fa fa-desktop'                => array( 'group' => 'web-application' ),
			'fa fa-diamond'                => array( 'group' => 'web-application' ),
			'fa fa-dot-circle-o'           => array( 'group' => 'web-application' ),
			'fa fa-download'               => array( 'group' => 'web-application' ),
			'fa fa-edit'                   => array( 'group' => 'web-application' ),
			'fa fa-ellipsis-h'             => array( 'group' => 'web-application' ),
			'fa fa-ellipsis-v'             => array( 'group' => 'web-application' ),
			'fa fa-envelope'               => array( 'group' => 'web-application' ),
			'fa fa-envelope-o'             => array( 'group' => 'web-application' ),
			'fa fa-envelope-square'        => array( 'group' => 'web-application' ),
			'fa fa-eraser'                 => array( 'group' => 'web-application' ),
			'fa fa-exchange'               => array( 'group' => 'web-application' ),
			'fa fa-exclamation'            => array( 'group' => 'web-application' ),
			'fa fa-exclamation-circle'     => array( 'group' => 'web-application' ),
			'fa fa-exclamation-triangle'   => array( 'group' => 'web-application' ),
			'fa fa-external-link'          => array( 'group' => 'web-application' ),
			'fa fa-external-link-square'   => array( 'group' => 'web-application' ),
			'fa fa-eye'                    => array( 'group' => 'web-application' ),
			'fa fa-eye-slash'              => array( 'group' => 'web-application' ),
			'fa fa-eyedropper'             => array( 'group' => 'web-application' ),
			'fa fa-fax'                    => array( 'group' => 'web-application' ),
			'fa fa-feed'                   => array( 'group' => 'web-application' ),
			'fa fa-female'                 => array( 'group' => 'web-application' ),
			'fa fa-fighter-jet'            => array( 'group' => 'web-application' ),
			'fa fa-file-archive-o'         => array( 'group' => 'web-application' ),
			'fa fa-file-audio-o'           => array( 'group' => 'web-application' ),
			'fa fa-file-code-o'            => array( 'group' => 'web-application' ),
			'fa fa-file-excel-o'           => array( 'group' => 'web-application' ),
			'fa fa-file-image-o'           => array( 'group' => 'web-application' ),
			'fa fa-file-movie-o'           => array( 'group' => 'web-application' ),
			'fa fa-file-pdf-o'             => array( 'group' => 'web-application' ),
			'fa fa-file-photo-o'           => array( 'group' => 'web-application' ),
			'fa fa-file-picture-o'         => array( 'group' => 'web-application' ),
			'fa fa-file-powerpoint-o'      => array( 'group' => 'web-application' ),
			'fa fa-file-sound-o'           => array( 'group' => 'web-application' ),
			'fa fa-file-video-o'           => array( 'group' => 'web-application' ),
			'fa fa-file-word-o'            => array( 'group' => 'web-application' ),
			'fa fa-file-zip-o'             => array( 'group' => 'web-application' ),
			'fa fa-film'                   => array( 'group' => 'web-application' ),
			'fa fa-filter'                 => array( 'group' => 'web-application' ),
			'fa fa-fire'                   => array( 'group' => 'web-application' ),
			'fa fa-fire-extinguisher'      => array( 'group' => 'web-application' ),
			'fa fa-flag'                   => array( 'group' => 'web-application' ),
			'fa fa-flag-checkered'         => array( 'group' => 'web-application' ),
			'fa fa-flag-o'                 => array( 'group' => 'web-application' ),
			'fa fa-flash'                  => array( 'group' => 'web-application' ),
			'fa fa-flask'                  => array( 'group' => 'web-application' ),
			'fa fa-folder'                 => array( 'group' => 'web-application' ),
			'fa fa-folder-o'               => array( 'group' => 'web-application' ),
			'fa fa-folder-open'            => array( 'group' => 'web-application' ),
			'fa fa-folder-open-o'          => array( 'group' => 'web-application' ),
			'fa fa-frown-o'                => array( 'group' => 'web-application' ),
			'fa fa-futbol-o'               => array( 'group' => 'web-application' ),
			'fa fa-gamepad'                => array( 'group' => 'web-application' ),
			'fa fa-gavel'                  => array( 'group' => 'web-application' ),
			'fa fa-gear'                   => array( 'group' => 'web-application' ),
			'fa fa-gears'                  => array( 'group' => 'web-application' ),
			'fa fa-gift'                   => array( 'group' => 'web-application' ),
			'fa fa-glass'                  => array( 'group' => 'web-application' ),
			'fa fa-globe'                  => array( 'group' => 'web-application' ),
			'fa fa-graduation-cap'         => array( 'group' => 'web-application' ),
			'fa fa-group'                  => array( 'group' => 'web-application' ),
			'fa fa-hand-grab-o'            => array( 'group' => 'web-application' ),
			'fa fa-hand-lizard-o'          => array( 'group' => 'web-application' ),
			'fa fa-hand-paper-o'           => array( 'group' => 'web-application' ),
			'fa fa-hand-peace-o'           => array( 'group' => 'web-application' ),
			'fa fa-hand-pointer-o'         => array( 'group' => 'web-application' ),
			'fa fa-hand-rock-o'            => array( 'group' => 'web-application' ),
			'fa fa-hand-scissors-o'        => array( 'group' => 'web-application' ),
			'fa fa-hand-spock-o'           => array( 'group' => 'web-application' ),
			'fa fa-hand-stop-o'            => array( 'group' => 'web-application' ),
			'fa fa-hdd-o'                  => array( 'group' => 'web-application' ),
			'fa fa-headphones'             => array( 'group' => 'web-application' ),
			'fa fa-heart'                  => array( 'group' => 'web-application' ),
			'fa fa-heart-o'                => array( 'group' => 'web-application' ),
			'fa fa-heartbeat'              => array( 'group' => 'web-application' ),
			'fa fa-history'                => array( 'group' => 'web-application' ),
			'fa fa-home'                   => array( 'group' => 'web-application' ),
			'fa fa-hotel'                  => array( 'group' => 'web-application' ),
			'fa fa-hourglass'              => array( 'group' => 'web-application' ),
			'fa fa-hourglass-1'            => array( 'group' => 'web-application' ),
			'fa fa-hourglass-2'            => array( 'group' => 'web-application' ),
			'fa fa-hourglass-3'            => array( 'group' => 'web-application' ),
			'fa fa-hourglass-end'          => array( 'group' => 'web-application' ),
			'fa fa-hourglass-half'         => array( 'group' => 'web-application' ),
			'fa fa-hourglass-o'            => array( 'group' => 'web-application' ),
			'fa fa-hourglass-start'        => array( 'group' => 'web-application' ),
			'fa fa-i-cursor'               => array( 'group' => 'web-application' ),
			'fa fa-image'                  => array( 'group' => 'web-application' ),
			'fa fa-inbox'                  => array( 'group' => 'web-application' ),
			'fa fa-industry'               => array( 'group' => 'web-application' ),
			'fa fa-info'                   => array( 'group' => 'web-application' ),
			'fa fa-info-circle'            => array( 'group' => 'web-application' ),
			'fa fa-institution'            => array( 'group' => 'web-application' ),
			'fa fa-key'                    => array( 'group' => 'web-application' ),
			'fa fa-keyboard-o'             => array( 'group' => 'web-application' ),
			'fa fa-language'               => array( 'group' => 'web-application' ),
			'fa fa-laptop'                 => array( 'group' => 'web-application' ),
			'fa fa-leaf'                   => array( 'group' => 'web-application' ),
			'fa fa-legal'                  => array( 'group' => 'web-application' ),
			'fa fa-lemon-o'                => array( 'group' => 'web-application' ),
			'fa fa-level-down'             => array( 'group' => 'web-application' ),
			'fa fa-level-up'               => array( 'group' => 'web-application' ),
			'fa fa-life-bouy'              => array( 'group' => 'web-application' ),
			'fa fa-life-buoy'              => array( 'group' => 'web-application' ),
			'fa fa-life-ring'              => array( 'group' => 'web-application' ),
			'fa fa-life-saver'             => array( 'group' => 'web-application' ),
			'fa fa-lightbulb-o'            => array( 'group' => 'web-application' ),
			'fa fa-line-chart'             => array( 'group' => 'web-application' ),
			'fa fa-location-arrow'         => array( 'group' => 'web-application' ),
			'fa fa-lock'                   => array( 'group' => 'web-application' ),
			'fa fa-magic'                  => array( 'group' => 'web-application' ),
			'fa fa-magnet'                 => array( 'group' => 'web-application' ),
			'fa fa-mail-forward'           => array( 'group' => 'web-application' ),
			'fa fa-mail-reply'             => array( 'group' => 'web-application' ),
			'fa fa-mail-reply-all'         => array( 'group' => 'web-application' ),
			'fa fa-male'                   => array( 'group' => 'web-application' ),
			'fa fa-map'                    => array( 'group' => 'web-application' ),
			'fa fa-map-marker'             => array( 'group' => 'web-application' ),
			'fa fa-map-o'                  => array( 'group' => 'web-application' ),
			'fa fa-map-pin'                => array( 'group' => 'web-application' ),
			'fa fa-map-signs'              => array( 'group' => 'web-application' ),
			'fa fa-meh-o'                  => array( 'group' => 'web-application' ),
			'fa fa-microphone'             => array( 'group' => 'web-application' ),
			'fa fa-microphone-slash'       => array( 'group' => 'web-application' ),
			'fa fa-minus'                  => array( 'group' => 'web-application' ),
			'fa fa-minus-circle'           => array( 'group' => 'web-application' ),
			'fa fa-minus-square'           => array( 'group' => 'web-application' ),
			'fa fa-minus-square-o'         => array( 'group' => 'web-application' ),
			'fa fa-mobile'                 => array( 'group' => 'web-application' ),
			'fa fa-mobile-phone'           => array( 'group' => 'web-application' ),
			'fa fa-money'                  => array( 'group' => 'web-application' ),
			'fa fa-moon-o'                 => array( 'group' => 'web-application' ),
			'fa fa-mortar-board'           => array( 'group' => 'web-application' ),
			'fa fa-motorcycle'             => array( 'group' => 'web-application' ),
			'fa fa-mouse-pointer'          => array( 'group' => 'web-application' ),
			'fa fa-music'                  => array( 'group' => 'web-application' ),
			'fa fa-navicon'                => array( 'group' => 'web-application' ),
			'fa fa-newspaper-o'            => array( 'group' => 'web-application' ),
			'fa fa-object-group'           => array( 'group' => 'web-application' ),
			'fa fa-object-ungroup'         => array( 'group' => 'web-application' ),
			'fa fa-paint-brush'            => array( 'group' => 'web-application' ),
			'fa fa-paper-plane'            => array( 'group' => 'web-application' ),
			'fa fa-paper-plane-o'          => array( 'group' => 'web-application' ),
			'fa fa-paw'                    => array( 'group' => 'web-application' ),
			'fa fa-pencil'                 => array( 'group' => 'web-application' ),
			'fa fa-pencil-square'          => array( 'group' => 'web-application' ),
			'fa fa-pencil-square-o'        => array( 'group' => 'web-application' ),
			'fa fa-phone'                  => array( 'group' => 'web-application' ),
			'fa fa-phone-square'           => array( 'group' => 'web-application' ),
			'fa fa-photo'                  => array( 'group' => 'web-application' ),
			'fa fa-picture-o'              => array( 'group' => 'web-application' ),
			'fa fa-pie-chart'              => array( 'group' => 'web-application' ),
			'fa fa-plane'                  => array( 'group' => 'web-application' ),
			'fa fa-plug'                   => array( 'group' => 'web-application' ),
			'fa fa-plus'                   => array( 'group' => 'web-application' ),
			'fa fa-plus-circle'            => array( 'group' => 'web-application' ),
			'fa fa-plus-square'            => array( 'group' => 'web-application' ),
			'fa fa-plus-square-o'          => array( 'group' => 'web-application' ),
			'fa fa-power-off'              => array( 'group' => 'web-application' ),
			'fa fa-print'                  => array( 'group' => 'web-application' ),
			'fa fa-puzzle-piece'           => array( 'group' => 'web-application' ),
			'fa fa-qrcode'                 => array( 'group' => 'web-application' ),
			'fa fa-question'               => array( 'group' => 'web-application' ),
			'fa fa-question-circle'        => array( 'group' => 'web-application' ),
			'fa fa-quote-left'             => array( 'group' => 'web-application' ),
			'fa fa-quote-right'            => array( 'group' => 'web-application' ),
			'fa fa-random'                 => array( 'group' => 'web-application' ),
			'fa fa-recycle'                => array( 'group' => 'web-application' ),
			'fa fa-refresh'                => array( 'group' => 'web-application' ),
			'fa fa-registered'             => array( 'group' => 'web-application' ),
			'fa fa-remove'                 => array( 'group' => 'web-application' ),
			'fa fa-reorder'                => array( 'group' => 'web-application' ),
			'fa fa-reply'                  => array( 'group' => 'web-application' ),
			'fa fa-reply-all'              => array( 'group' => 'web-application' ),
			'fa fa-retweet'                => array( 'group' => 'web-application' ),
			'fa fa-road'                   => array( 'group' => 'web-application' ),
			'fa fa-rocket'                 => array( 'group' => 'web-application' ),
			'fa fa-rss'                    => array( 'group' => 'web-application' ),
			'fa fa-rss-square'             => array( 'group' => 'web-application' ),
			'fa fa-search'                 => array( 'group' => 'web-application' ),
			'fa fa-search-minus'           => array( 'group' => 'web-application' ),
			'fa fa-search-plus'            => array( 'group' => 'web-application' ),
			'fa fa-send'                   => array( 'group' => 'web-application' ),
			'fa fa-send-o'                 => array( 'group' => 'web-application' ),
			'fa fa-server'                 => array( 'group' => 'web-application' ),
			'fa fa-share'                  => array( 'group' => 'web-application' ),
			'fa fa-share-alt'              => array( 'group' => 'web-application' ),
			'fa fa-share-alt-square'       => array( 'group' => 'web-application' ),
			'fa fa-share-square'           => array( 'group' => 'web-application' ),
			'fa fa-share-square-o'         => array( 'group' => 'web-application' ),
			'fa fa-shield'                 => array( 'group' => 'web-application' ),
			'fa fa-ship'                   => array( 'group' => 'web-application' ),
			'fa fa-shopping-cart'          => array( 'group' => 'web-application' ),
			'fa fa-sign-in'                => array( 'group' => 'web-application' ),
			'fa fa-sign-out'               => array( 'group' => 'web-application' ),
			'fa fa-signal'                 => array( 'group' => 'web-application' ),
			'fa fa-sitemap'                => array( 'group' => 'web-application' ),
			'fa fa-sliders'                => array( 'group' => 'web-application' ),
			'fa fa-smile-o'                => array( 'group' => 'web-application' ),
			'fa fa-soccer-ball-o'          => array( 'group' => 'web-application' ),
			'fa fa-sort'                   => array( 'group' => 'web-application' ),
			'fa fa-sort-alpha-asc'         => array( 'group' => 'web-application' ),
			'fa fa-sort-alpha-desc'        => array( 'group' => 'web-application' ),
			'fa fa-sort-amount-asc'        => array( 'group' => 'web-application' ),
			'fa fa-sort-amount-desc'       => array( 'group' => 'web-application' ),
			'fa fa-sort-asc'               => array( 'group' => 'web-application' ),
			'fa fa-sort-desc'              => array( 'group' => 'web-application' ),
			'fa fa-sort-down'              => array( 'group' => 'web-application' ),
			'fa fa-sort-numeric-asc'       => array( 'group' => 'web-application' ),
			'fa fa-sort-numeric-desc'      => array( 'group' => 'web-application' ),
			'fa fa-sort-up'                => array( 'group' => 'web-application' ),
			'fa fa-space-shuttle'          => array( 'group' => 'web-application' ),
			//'fa fa-spinner'                => array( 'group' => 'web-application' ),
			'fa fa-spoon'                  => array( 'group' => 'web-application' ),
			'fa fa-square'                 => array( 'group' => 'web-application' ),
			'fa fa-square-o'               => array( 'group' => 'web-application' ),
			'fa fa-star'                   => array( 'group' => 'web-application' ),
			'fa fa-star-half'              => array( 'group' => 'web-application' ),
			'fa fa-star-half-empty'        => array( 'group' => 'web-application' ),
			'fa fa-star-half-full'         => array( 'group' => 'web-application' ),
			'fa fa-star-half-o'            => array( 'group' => 'web-application' ),
			'fa fa-star-o'                 => array( 'group' => 'web-application' ),
			'fa fa-sticky-note'            => array( 'group' => 'web-application' ),
			'fa fa-sticky-note-o'          => array( 'group' => 'web-application' ),
			'fa fa-street-view'            => array( 'group' => 'web-application' ),
			'fa fa-suitcase'               => array( 'group' => 'web-application' ),
			'fa fa-sun-o'                  => array( 'group' => 'web-application' ),
			'fa fa-support'                => array( 'group' => 'web-application' ),
			'fa fa-tablet'                 => array( 'group' => 'web-application' ),
			'fa fa-tachometer'             => array( 'group' => 'web-application' ),
			'fa fa-tag'                    => array( 'group' => 'web-application' ),
			'fa fa-tags'                   => array( 'group' => 'web-application' ),
			'fa fa-tasks'                  => array( 'group' => 'web-application' ),
			'fa fa-taxi'                   => array( 'group' => 'web-application' ),
			'fa fa-television'             => array( 'group' => 'web-application' ),
			'fa fa-terminal'               => array( 'group' => 'web-application' ),
			'fa fa-thumb-tack'             => array( 'group' => 'web-application' ),
			'fa fa-thumbs-down'            => array( 'group' => 'web-application' ),
			'fa fa-thumbs-o-down'          => array( 'group' => 'web-application' ),
			'fa fa-thumbs-o-up'            => array( 'group' => 'web-application' ),
			'fa fa-thumbs-up'              => array( 'group' => 'web-application' ),
			'fa fa-ticket'                 => array( 'group' => 'web-application' ),
			'fa fa-times'                  => array( 'group' => 'web-application' ),
			'fa fa-times-circle'           => array( 'group' => 'web-application' ),
			'fa fa-times-circle-o'         => array( 'group' => 'web-application' ),
			'fa fa-tint'                   => array( 'group' => 'web-application' ),
			'fa fa-toggle-down'            => array( 'group' => 'web-application' ),
			'fa fa-toggle-left'            => array( 'group' => 'web-application' ),
			'fa fa-toggle-off'             => array( 'group' => 'web-application' ),
			'fa fa-toggle-on'              => array( 'group' => 'web-application' ),
			'fa fa-toggle-right'           => array( 'group' => 'web-application' ),
			'fa fa-toggle-up'              => array( 'group' => 'web-application' ),
			'fa fa-trademark'              => array( 'group' => 'web-application' ),
			'fa fa-trash'                  => array( 'group' => 'web-application' ),
			'fa fa-trash-o'                => array( 'group' => 'web-application' ),
			'fa fa-tree'                   => array( 'group' => 'web-application' ),
			'fa fa-trophy'                 => array( 'group' => 'web-application' ),
			'fa fa-truck'                  => array( 'group' => 'web-application' ),
			'fa fa-tty'                    => array( 'group' => 'web-application' ),
			'fa fa-tv'                     => array( 'group' => 'web-application' ),
			'fa fa-umbrella'               => array( 'group' => 'web-application' ),
			'fa fa-university'             => array( 'group' => 'web-application' ),
			'fa fa-unlock'                 => array( 'group' => 'web-application' ),
			'fa fa-unlock-alt'             => array( 'group' => 'web-application' ),
			'fa fa-unsorted'               => array( 'group' => 'web-application' ),
			'fa fa-upload'                 => array( 'group' => 'web-application' ),
			'fa fa-user'                   => array( 'group' => 'web-application' ),
			'fa fa-user-plus'              => array( 'group' => 'web-application' ),
			'fa fa-user-secret'            => array( 'group' => 'web-application' ),
			'fa fa-user-times'             => array( 'group' => 'web-application' ),
			'fa fa-users'                  => array( 'group' => 'web-application' ),
			'fa fa-video-camera'           => array( 'group' => 'web-application' ),
			'fa fa-volume-down'            => array( 'group' => 'web-application' ),
			'fa fa-volume-off'             => array( 'group' => 'web-application' ),
			'fa fa-volume-up'              => array( 'group' => 'web-application' ),
			'fa fa-warning'                => array( 'group' => 'web-application' ),
			'fa fa-wheelchair'             => array( 'group' => 'web-application' ),
			'fa fa-wifi'                   => array( 'group' => 'web-application' ),
			'fa fa-wrench'                 => array( 'group' => 'web-application' ),
			'fa fa-hand-o-down'            => array( 'group' => 'hand' ),
			'fa fa-hand-o-left'            => array( 'group' => 'hand' ),
			'fa fa-hand-o-right'           => array( 'group' => 'hand' ),
			'fa fa-hand-o-up'              => array( 'group' => 'hand' ),
			'fa fa-ambulance'              => array( 'group' => 'transportation' ),
			'fa fa-subway'                 => array( 'group' => 'transportation' ),
			'fa fa-train'                  => array( 'group' => 'transportation' ),
			'fa fa-genderless'             => array( 'group' => 'gender' ),
			'fa fa-intersex'               => array( 'group' => 'gender' ),
			'fa fa-mars'                   => array( 'group' => 'gender' ),
			'fa fa-mars-double'            => array( 'group' => 'gender' ),
			'fa fa-mars-stroke'            => array( 'group' => 'gender' ),
			'fa fa-mars-stroke-h'          => array( 'group' => 'gender' ),
			'fa fa-mars-stroke-v'          => array( 'group' => 'gender' ),
			'fa fa-mercury'                => array( 'group' => 'gender' ),
			'fa fa-neuter'                 => array( 'group' => 'gender' ),
			'fa fa-transgender'            => array( 'group' => 'gender' ),
			'fa fa-transgender-alt'        => array( 'group' => 'gender' ),
			'fa fa-venus'                  => array( 'group' => 'gender' ),
			'fa fa-venus-double'           => array( 'group' => 'gender' ),
			'fa fa-venus-mars'             => array( 'group' => 'gender' ),
			'fa fa-file'                   => array( 'group' => 'file-type' ),
			'fa fa-file-o'                 => array( 'group' => 'file-type' ),
			'fa fa-file-text'              => array( 'group' => 'file-type' ),
			'fa fa-file-text-o'            => array( 'group' => 'file-type' ),
			'fa fa-cc-amex'                => array( 'group' => 'payment' ),
			'fa fa-cc-diners-club'         => array( 'group' => 'payment' ),
			'fa fa-cc-discover'            => array( 'group' => 'payment' ),
			'fa fa-cc-jcb'                 => array( 'group' => 'payment' ),
			'fa fa-cc-mastercard'          => array( 'group' => 'payment' ),
			'fa fa-cc-paypal'              => array( 'group' => 'payment' ),
			'fa fa-cc-stripe'              => array( 'group' => 'payment' ),
			'fa fa-cc-visa'                => array( 'group' => 'payment' ),
			'fa fa-google-wallet'          => array( 'group' => 'payment' ),
			'fa fa-paypal'                 => array( 'group' => 'payment' ),
			'fa fa-bitcoin'                => array( 'group' => 'currency' ),
			'fa fa-btc'                    => array( 'group' => 'currency' ),
			'fa fa-cny'                    => array( 'group' => 'currency' ),
			'fa fa-dollar'                 => array( 'group' => 'currency' ),
			'fa fa-eur'                    => array( 'group' => 'currency' ),
			'fa fa-euro'                   => array( 'group' => 'currency' ),
			'fa fa-gbp'                    => array( 'group' => 'currency' ),
			'fa fa-gg'                     => array( 'group' => 'currency' ),
			'fa fa-gg-circle'              => array( 'group' => 'currency' ),
			'fa fa-ils'                    => array( 'group' => 'currency' ),
			'fa fa-inr'                    => array( 'group' => 'currency' ),
			'fa fa-jpy'                    => array( 'group' => 'currency' ),
			'fa fa-krw'                    => array( 'group' => 'currency' ),
			'fa fa-rmb'                    => array( 'group' => 'currency' ),
			'fa fa-rouble'                 => array( 'group' => 'currency' ),
			'fa fa-rub'                    => array( 'group' => 'currency' ),
			'fa fa-ruble'                  => array( 'group' => 'currency' ),
			'fa fa-rupee'                  => array( 'group' => 'currency' ),
			'fa fa-shekel'                 => array( 'group' => 'currency' ),
			'fa fa-sheqel'                 => array( 'group' => 'currency' ),
			'fa fa-try'                    => array( 'group' => 'currency' ),
			'fa fa-turkish-lira'           => array( 'group' => 'currency' ),
			'fa fa-usd'                    => array( 'group' => 'currency' ),
			'fa fa-won'                    => array( 'group' => 'currency' ),
			'fa fa-yen'                    => array( 'group' => 'currency' ),
			'fa fa-align-center'           => array( 'group' => 'text-editor' ),
			'fa fa-align-justify'          => array( 'group' => 'text-editor' ),
			'fa fa-align-left'             => array( 'group' => 'text-editor' ),
			'fa fa-align-right'            => array( 'group' => 'text-editor' ),
			'fa fa-bold'                   => array( 'group' => 'text-editor' ),
			'fa fa-chain'                  => array( 'group' => 'text-editor' ),
			'fa fa-chain-broken'           => array( 'group' => 'text-editor' ),
			'fa fa-clipboard'              => array( 'group' => 'text-editor' ),
			'fa fa-columns'                => array( 'group' => 'text-editor' ),
			'fa fa-copy'                   => array( 'group' => 'text-editor' ),
			'fa fa-cut'                    => array( 'group' => 'text-editor' ),
			'fa fa-dedent'                 => array( 'group' => 'text-editor' ),
			'fa fa-files-o'                => array( 'group' => 'text-editor' ),
			'fa fa-floppy-o'               => array( 'group' => 'text-editor' ),
			'fa fa-font'                   => array( 'group' => 'text-editor' ),
			'fa fa-header'                 => array( 'group' => 'text-editor' ),
			'fa fa-indent'                 => array( 'group' => 'text-editor' ),
			'fa fa-italic'                 => array( 'group' => 'text-editor' ),
			'fa fa-link'                   => array( 'group' => 'text-editor' ),
			'fa fa-list'                   => array( 'group' => 'text-editor' ),
			'fa fa-list-alt'               => array( 'group' => 'text-editor' ),
			'fa fa-list-ol'                => array( 'group' => 'text-editor' ),
			'fa fa-list-ul'                => array( 'group' => 'text-editor' ),
			'fa fa-outdent'                => array( 'group' => 'text-editor' ),
			'fa fa-paperclip'              => array( 'group' => 'text-editor' ),
			'fa fa-paragraph'              => array( 'group' => 'text-editor' ),
			'fa fa-paste'                  => array( 'group' => 'text-editor' ),
			'fa fa-repeat'                 => array( 'group' => 'text-editor' ),
			'fa fa-rotate-left'            => array( 'group' => 'text-editor' ),
			'fa fa-rotate-right'           => array( 'group' => 'text-editor' ),
			'fa fa-save'                   => array( 'group' => 'text-editor' ),
			'fa fa-scissors'               => array( 'group' => 'text-editor' ),
			'fa fa-strikethrough'          => array( 'group' => 'text-editor' ),
			'fa fa-subscript'              => array( 'group' => 'text-editor' ),
			'fa fa-superscript'            => array( 'group' => 'text-editor' ),
			'fa fa-table'                  => array( 'group' => 'text-editor' ),
			'fa fa-text-height'            => array( 'group' => 'text-editor' ),
			'fa fa-text-width'             => array( 'group' => 'text-editor' ),
			'fa fa-th'                     => array( 'group' => 'text-editor' ),
			'fa fa-th-large'               => array( 'group' => 'text-editor' ),
			'fa fa-th-list'                => array( 'group' => 'text-editor' ),
			'fa fa-underline'              => array( 'group' => 'text-editor' ),
			'fa fa-undo'                   => array( 'group' => 'text-editor' ),
			'fa fa-unlink'                 => array( 'group' => 'text-editor' ),
			'fa fa-angle-double-down'      => array( 'group' => 'directional' ),
			'fa fa-angle-double-left'      => array( 'group' => 'directional' ),
			'fa fa-angle-double-right'     => array( 'group' => 'directional' ),
			'fa fa-angle-double-up'        => array( 'group' => 'directional' ),
			'fa fa-angle-down'             => array( 'group' => 'directional' ),
			'fa fa-angle-left'             => array( 'group' => 'directional' ),
			'fa fa-angle-right'            => array( 'group' => 'directional' ),
			'fa fa-angle-up'               => array( 'group' => 'directional' ),
			'fa fa-arrow-circle-down'      => array( 'group' => 'directional' ),
			'fa fa-arrow-circle-left'      => array( 'group' => 'directional' ),
			'fa fa-arrow-circle-o-down'    => array( 'group' => 'directional' ),
			'fa fa-arrow-circle-o-left'    => array( 'group' => 'directional' ),
			'fa fa-arrow-circle-o-right'   => array( 'group' => 'directional' ),
			'fa fa-arrow-circle-o-up'      => array( 'group' => 'directional' ),
			'fa fa-arrow-circle-right'     => array( 'group' => 'directional' ),
			'fa fa-arrow-circle-up'        => array( 'group' => 'directional' ),
			'fa fa-arrow-down'             => array( 'group' => 'directional' ),
			'fa fa-arrow-left'             => array( 'group' => 'directional' ),
			'fa fa-arrow-right'            => array( 'group' => 'directional' ),
			'fa fa-arrow-up'               => array( 'group' => 'directional' ),
			'fa fa-arrows-alt'             => array( 'group' => 'directional' ),
			'fa fa-caret-down'             => array( 'group' => 'directional' ),
			'fa fa-caret-left'             => array( 'group' => 'directional' ),
			'fa fa-caret-right'            => array( 'group' => 'directional' ),
			'fa fa-caret-up'               => array( 'group' => 'directional' ),
			'fa fa-chevron-circle-down'    => array( 'group' => 'directional' ),
			'fa fa-chevron-circle-left'    => array( 'group' => 'directional' ),
			'fa fa-chevron-circle-right'   => array( 'group' => 'directional' ),
			'fa fa-chevron-circle-up'      => array( 'group' => 'directional' ),
			'fa fa-chevron-down'           => array( 'group' => 'directional' ),
			'fa fa-chevron-left'           => array( 'group' => 'directional' ),
			'fa fa-chevron-right'          => array( 'group' => 'directional' ),
			'fa fa-chevron-up'             => array( 'group' => 'directional' ),
			'fa fa-long-arrow-down'        => array( 'group' => 'directional' ),
			'fa fa-long-arrow-left'        => array( 'group' => 'directional' ),
			'fa fa-long-arrow-right'       => array( 'group' => 'directional' ),
			'fa fa-long-arrow-up'          => array( 'group' => 'directional' ),
			'fa fa-backward'               => array( 'group' => 'video-player' ),
			'fa fa-compress'               => array( 'group' => 'video-player' ),
			'fa fa-eject'                  => array( 'group' => 'video-player' ),
			'fa fa-expand'                 => array( 'group' => 'video-player' ),
			'fa fa-fast-backward'          => array( 'group' => 'video-player' ),
			'fa fa-fast-forward'           => array( 'group' => 'video-player' ),
			'fa fa-forward'                => array( 'group' => 'video-player' ),
			'fa fa-pause'                  => array( 'group' => 'video-player' ),
			'fa fa-play'                   => array( 'group' => 'video-player' ),
			'fa fa-play-circle'            => array( 'group' => 'video-player' ),
			'fa fa-play-circle-o'          => array( 'group' => 'video-player' ),
			'fa fa-step-backward'          => array( 'group' => 'video-player' ),
			'fa fa-step-forward'           => array( 'group' => 'video-player' ),
			'fa fa-stop'                   => array( 'group' => 'video-player' ),
			'fa fa-youtube-play'           => array( 'group' => 'video-player' ),
			'fa fa-500px'                  => array( 'group' => 'brand' ),
			'fa fa-adn'                    => array( 'group' => 'brand' ),
			'fa fa-amazon'                 => array( 'group' => 'brand' ),
			'fa fa-android'                => array( 'group' => 'brand' ),
			'fa fa-angellist'              => array( 'group' => 'brand' ),
			'fa fa-apple'                  => array( 'group' => 'brand' ),
			'fa fa-behance'                => array( 'group' => 'brand' ),
			'fa fa-behance-square'         => array( 'group' => 'brand' ),
			'fa fa-bitbucket'              => array( 'group' => 'brand' ),
			'fa fa-bitbucket-square'       => array( 'group' => 'brand' ),
			'fa fa-black-tie'              => array( 'group' => 'brand' ),
			'fa fa-buysellads'             => array( 'group' => 'brand' ),
			'fa fa-chrome'                 => array( 'group' => 'brand' ),
			'fa fa-codepen'                => array( 'group' => 'brand' ),
			'fa fa-connectdevelop'         => array( 'group' => 'brand' ),
			'fa fa-contao'                 => array( 'group' => 'brand' ),
			'fa fa-css3'                   => array( 'group' => 'brand' ),
			'fa fa-dashcube'               => array( 'group' => 'brand' ),
			'fa fa-delicious'              => array( 'group' => 'brand' ),
			'fa fa-deviantart'             => array( 'group' => 'brand' ),
			'fa fa-digg'                   => array( 'group' => 'brand' ),
			'fa fa-dribbble'               => array( 'group' => 'brand' ),
			'fa fa-dropbox'                => array( 'group' => 'brand' ),
			'fa fa-drupal'                 => array( 'group' => 'brand' ),
			'fa fa-empire'                 => array( 'group' => 'brand' ),
			'fa fa-expeditedssl'           => array( 'group' => 'brand' ),
			'fa fa-facebook'               => array( 'group' => 'brand' ),
			'fa fa-facebook-f'             => array( 'group' => 'brand' ),
			'fa fa-facebook-official'      => array( 'group' => 'brand' ),
			'fa fa-facebook-square'        => array( 'group' => 'brand' ),
			'fa fa-firefox'                => array( 'group' => 'brand' ),
			'fa fa-flickr'                 => array( 'group' => 'brand' ),
			'fa fa-fonticons'              => array( 'group' => 'brand' ),
			'fa fa-forumbee'               => array( 'group' => 'brand' ),
			'fa fa-foursquare'             => array( 'group' => 'brand' ),
			'fa fa-ge'                     => array( 'group' => 'brand' ),
			'fa fa-get-pocket'             => array( 'group' => 'brand' ),
			'fa fa-git'                    => array( 'group' => 'brand' ),
			'fa fa-git-square'             => array( 'group' => 'brand' ),
			'fa fa-github'                 => array( 'group' => 'brand' ),
			'fa fa-github-alt'             => array( 'group' => 'brand' ),
			'fa fa-github-square'          => array( 'group' => 'brand' ),
			'fa fa-gittip'                 => array( 'group' => 'brand' ),
			'fa fa-google'                 => array( 'group' => 'brand' ),
			'fa fa-google-plus'            => array( 'group' => 'brand' ),
			'fa fa-google-plus-square'     => array( 'group' => 'brand' ),
			'fa fa-gratipay'               => array( 'group' => 'brand' ),
			'fa fa-hacker-news'            => array( 'group' => 'brand' ),
			'fa fa-houzz'                  => array( 'group' => 'brand' ),
			'fa fa-html5'                  => array( 'group' => 'brand' ),
			'fa fa-instagram'              => array( 'group' => 'brand' ),
			'fa fa-internet-explorer'      => array( 'group' => 'brand' ),
			'fa fa-ioxhost'                => array( 'group' => 'brand' ),
			'fa fa-joomla'                 => array( 'group' => 'brand' ),
			'fa fa-jsfiddle'               => array( 'group' => 'brand' ),
			'fa fa-lastfm'                 => array( 'group' => 'brand' ),
			'fa fa-lastfm-square'          => array( 'group' => 'brand' ),
			'fa fa-leanpub'                => array( 'group' => 'brand' ),
			'fa fa-linkedin'               => array( 'group' => 'brand' ),
			'fa fa-linkedin-square'        => array( 'group' => 'brand' ),
			'fa fa-linux'                  => array( 'group' => 'brand' ),
			'fa fa-maxcdn'                 => array( 'group' => 'brand' ),
			'fa fa-meanpath'               => array( 'group' => 'brand' ),
			'fa fa-medium'                 => array( 'group' => 'brand' ),
			'fa fa-odnoklassniki'          => array( 'group' => 'brand' ),
			'fa fa-odnoklassniki-square'   => array( 'group' => 'brand' ),
			'fa fa-opencart'               => array( 'group' => 'brand' ),
			'fa fa-openid'                 => array( 'group' => 'brand' ),
			'fa fa-opera'                  => array( 'group' => 'brand' ),
			'fa fa-optin-monster'          => array( 'group' => 'brand' ),
			'fa fa-pagelines'              => array( 'group' => 'brand' ),
			'fa fa-pied-piper'             => array( 'group' => 'brand' ),
			'fa fa-pied-piper-alt'         => array( 'group' => 'brand' ),
			'fa fa-pinterest'              => array( 'group' => 'brand' ),
			'fa fa-pinterest-p'            => array( 'group' => 'brand' ),
			'fa fa-pinterest-square'       => array( 'group' => 'brand' ),
			'fa fa-qq'                     => array( 'group' => 'brand' ),
			'fa fa-ra'                     => array( 'group' => 'brand' ),
			'fa fa-rebel'                  => array( 'group' => 'brand' ),
			'fa fa-reddit'                 => array( 'group' => 'brand' ),
			'fa fa-reddit-square'          => array( 'group' => 'brand' ),
			'fa fa-renren'                 => array( 'group' => 'brand' ),
			'fa fa-safari'                 => array( 'group' => 'brand' ),
			'fa fa-sellsy'                 => array( 'group' => 'brand' ),
			'fa fa-shirtsinbulk'           => array( 'group' => 'brand' ),
			'fa fa-simplybuilt'            => array( 'group' => 'brand' ),
			'fa fa-skyatlas'               => array( 'group' => 'brand' ),
			'fa fa-skype'                  => array( 'group' => 'brand' ),
			'fa fa-slack'                  => array( 'group' => 'brand' ),
			'fa fa-slideshare'             => array( 'group' => 'brand' ),
			'fa fa-soundcloud'             => array( 'group' => 'brand' ),
			'fa fa-spotify'                => array( 'group' => 'brand' ),
			'fa fa-stack-exchange'         => array( 'group' => 'brand' ),
			'fa fa-stack-overflow'         => array( 'group' => 'brand' ),
			'fa fa-steam'                  => array( 'group' => 'brand' ),
			'fa fa-steam-square'           => array( 'group' => 'brand' ),
			'fa fa-stumbleupon'            => array( 'group' => 'brand' ),
			'fa fa-stumbleupon-circle'     => array( 'group' => 'brand' ),
			'fa fa-tencent-weibo'          => array( 'group' => 'brand' ),
			'fa fa-trello'                 => array( 'group' => 'brand' ),
			'fa fa-tripadvisor'            => array( 'group' => 'brand' ),
			'fa fa-tumblr'                 => array( 'group' => 'brand' ),
			'fa fa-tumblr-square'          => array( 'group' => 'brand' ),
			'fa fa-twitch'                 => array( 'group' => 'brand' ),
			'fa fa-twitter'                => array( 'group' => 'brand' ),
			'fa fa-twitter-square'         => array( 'group' => 'brand' ),
			'fa fa-viacoin'                => array( 'group' => 'brand' ),
			'fa fa-vimeo'                  => array( 'group' => 'brand' ),
			'fa fa-vimeo-square'           => array( 'group' => 'brand' ),
			'fa fa-vine'                   => array( 'group' => 'brand' ),
			'fa fa-vk'                     => array( 'group' => 'brand' ),
			'fa fa-wechat'                 => array( 'group' => 'brand' ),
			'fa fa-weibo'                  => array( 'group' => 'brand' ),
			'fa fa-weixin'                 => array( 'group' => 'brand' ),
			'fa fa-whatsapp'               => array( 'group' => 'brand' ),
			'fa fa-wikipedia-w'            => array( 'group' => 'brand' ),
			'fa fa-windows'                => array( 'group' => 'brand' ),
			'fa fa-wordpress'              => array( 'group' => 'brand' ),
			'fa fa-xing'                   => array( 'group' => 'brand' ),
			'fa fa-xing-square'            => array( 'group' => 'brand' ),
			'fa fa-y-combinator'           => array( 'group' => 'brand' ),
			'fa fa-y-combinator-square'    => array( 'group' => 'brand' ),
			'fa fa-yahoo'                  => array( 'group' => 'brand' ),
			'fa fa-yc'                     => array( 'group' => 'brand' ),
			'fa fa-yc-square'              => array( 'group' => 'brand' ),
			'fa fa-yelp'                   => array( 'group' => 'brand' ),
			'fa fa-youtube'                => array( 'group' => 'brand' ),
			'fa fa-youtube-square'         => array( 'group' => 'brand' ),
			'fa fa-h-square'               => array( 'group' => 'medical' ),
			'fa fa-hospital-o'             => array( 'group' => 'medical' ),
			'fa fa-medkit'                 => array( 'group' => 'medical' ),
			'fa fa-stethoscope'            => array( 'group' => 'medical' ),
			'fa fa-user-md'                => array( 'group' => 'medical' ),
        ),
    );

    return $sets;
}
add_filter('fw_option_type_icon_sets', 'namaste_filter_theme_new_icon_set');

/*********Unyson Slider**************/
if ( ! function_exists( 'fw_theme_namaste_slider_population_method_custom_options' ) ) :
	/**
	 * Filter for disable standard slider fields for easy slider
	 *
	 * @param array $arr - array of slider options
	 */
	function fw_theme_namaste_slider_population_method_custom_options( $arr ) {
		unset(
			$arr['wrapper-population-method-custom']['options']['custom-slides']['slides_options']['desc']
		);

		return $arr;
	}

	add_filter( 'fw_ext_namaste_slider_population_method_custom_options', 'fw_theme_namaste_slider_population_method_custom_options' );
endif;

if ( ! function_exists( 'namaste_filter_active_slider' ) ) :
	/**
	 * Filter for disable default framework sliders
	 *
	 * @param array $sliders - array of available sliders
	 */
	function namaste_filter_active_slider( $sliders ) {
		$sliders = array_diff( $sliders, array( 'bx-slider', 'nivo-slider', 'owl-carousel' ) );

		return $sliders;
	}

	add_filter( 'fw_ext_slider_activated', 'namaste_filter_active_slider' );
endif;