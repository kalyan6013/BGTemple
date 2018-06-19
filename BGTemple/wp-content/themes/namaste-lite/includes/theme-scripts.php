<?php
/*********Namaste Scripts**************/
function namaste_custom_admin_script($hook) {
	if( $hook != 'post.php' && $hook != 'post-new.php' ) { 
		return;
	}
	wp_enqueue_script('namaste-lite-post-format-options', get_template_directory_uri().'/js/post-format-options.js', array('jquery'), true);
}
add_action( 'admin_enqueue_scripts', 'namaste_custom_admin_script' );

function namaste_script() {
	wp_enqueue_script('flexslider', get_template_directory_uri().'/js/jquery.flexslider-min.js', array('jquery'), '2.1', true);
	wp_enqueue_script('owl-carousel', get_stylesheet_directory_uri().'/js/owl.carousel.min.js', true, '1.0', true);
	wp_enqueue_script('bootstrap', get_template_directory_uri().'/js/bootstrap.min.js', array(), '1.0', true);
	wp_enqueue_script('namaste-lite-jcustom', get_stylesheet_directory_uri().'/js/custom.js', array('jquery'), '1.0', true);
	wp_enqueue_script('prettyphoto', get_template_directory_uri().'/js/jquery.prettyPhoto-min.js', array('jquery'), '3.1.6', true);
	
	if ( is_singular() && comments_open() && get_option( 'thread_comments' ) ) {
		wp_enqueue_script( 'comment-reply' );
	}
}
add_action('wp_enqueue_scripts', 'namaste_script');