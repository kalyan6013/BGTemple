<?php
/*********Namaste Styles**************/
function namaste_custom_admin_style($hook) {
	if( $hook != 'edit.php' && $hook != 'post.php' && $hook != 'post-new.php' ) { 
		return;
	}
	wp_enqueue_style('namaste-lite-unyson-admin-css', get_template_directory_uri().'/css/unyson-admin.css');
}
add_action( 'admin_enqueue_scripts', 'namaste_custom_admin_style' );

function namaste_about_theme_style($hook) {
	global $namaste_about_theme_page;
	if( $hook != $namaste_about_theme_page ) { 
		return;
	}
	wp_enqueue_style('namaste-lite-about-theme-style-css', get_template_directory_uri().'/css/about-theme.css');
}
add_action( 'admin_enqueue_scripts', 'namaste_about_theme_style' );

function namaste_customize_style() {
	global $wp_customize;
	if ( isset( $wp_customize ) ) {
		wp_enqueue_style('namaste-lite-customize-css', get_template_directory_uri().'/css/customize.css');
	}
}
add_action( 'admin_enqueue_scripts', 'namaste_customize_style' );

function namaste_styles() {

	wp_enqueue_style('bootstrap', get_template_directory_uri().'/css/bootstrap.min.css', '', '', 'screen, all');
	wp_enqueue_style('flexslider', get_template_directory_uri().'/css/flexslider.css', '', '', 'screen, all');
	wp_enqueue_style('owl-carousel', get_template_directory_uri().'/css/owl-carousel.css', '', '', 'screen, all');
	wp_enqueue_style('prettyphoto', get_template_directory_uri().'/css/prettyPhoto.css', '', '', 'screen, all');
	wp_enqueue_style('fontawesome', get_template_directory_uri() . '/css/font-awesome.min.css' , array(), '4.4.0', 'all' );
	wp_enqueue_style('namaste-google-fonts', '//fonts.googleapis.com/css?family=Josefin+Sans:400,300,600,700|Fondamento:400,400italic|Playfair+Display:400,700&subset=latin,latin-ext');
	wp_enqueue_style('namaste-lite-main-css', get_bloginfo( 'stylesheet_url' ), '', '', 'all');
}
add_action('wp_enqueue_scripts', 'namaste_styles');

function namaste_font_and_color_styles() {
	wp_enqueue_style('namaste-lite-fonts', get_template_directory_uri() . '/css/fonts.css' );
	wp_enqueue_style('namaste-lite-colors', get_template_directory_uri() . '/css/colors.css' );
}
add_action('wp_enqueue_scripts', 'namaste_font_and_color_styles', 999);