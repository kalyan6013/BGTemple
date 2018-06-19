<?php
/*********Namaste Sidebars**************/
if ( ! function_exists( 'namaste_sidebars_widgets_init' ) ) {
function namaste_sidebars_widgets_init() {
    register_sidebar( array(
        'name' => esc_attr__( 'Main Sidebar', 'namaste-lite'),
        'id' => 'namaste_main_sidebar',
        'description' => esc_attr__( 'Main Sidebar Widget Area', 'namaste-lite' ),
        'before_widget' 	=> '<ul><li id="%1$s" class="widget-container %2$s"><div class="box">',
		'after_widget' 		=> '<div class="clear"></div></div></li></ul>',
		'before_title' 		=> '<h3 class="widget-title">',
		'after_title' 			=> '</h3>',
    ));
	
	register_sidebar(array(
		'name'          => __('Footer Sidebar', 'namaste-lite' ),
		'id'         	=> 'footer',
		'description'   => __( 'Located at the footer column.', 'namaste-lite' ),
		'before_widget' => '<div class="namaste-footer-column"><div class="widget-footer"><ul><li id="%1$s" class="widget-container %2$s">',
		'after_widget' 	=> '<div class="clear"></div></li></ul><div class="clear"></div></div></div>',
		'before_title' 	=> '<h3 class="widget-title">',
		'after_title' 	=> '</h3>',
	));
}
add_action( 'widgets_init', 'namaste_sidebars_widgets_init' );
}