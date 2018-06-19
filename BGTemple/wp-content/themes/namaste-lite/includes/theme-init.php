<?php
/*********Namaste Setup**************/
add_action( 'after_setup_theme', 'namaste_setup' );
if ( ! function_exists( 'namaste_setup' ) ):
function namaste_setup() {

	// This theme uses post thumbnails
	add_theme_support( 'post-thumbnails' );
	
	add_theme_support( 'title-tag' );
	
	// Add default posts and comments RSS feed links to head
	add_theme_support( 'automatic-feed-links' );
		
	// This theme supports a variety of post formats.
	if (defined('FW')) {
		add_theme_support( 'post-formats', array( 'gallery', 'link', 'quote', 'video', 'audio' ) );
	}
	
	//Add Custom Image Size
	add_image_size( 'namaste-entry-image', '890', '420', true );
	
	// This theme uses wp_nav_menu() in one location.
	register_nav_menus( array(
		'mainmenu' => __( 'Main Menu', 'namaste-lite' )

	) );
	register_nav_menus( array(
		'footermenu' => __( 'Footer Menu', 'namaste-lite' )

	) );
	
	function namaste_add_editor_styles() {
		add_editor_style( 'css/custom-editor-style.css' );
		$font_url = str_replace( ',', '%2C', '//fonts.googleapis.com/css?family=Josefin+Sans:400,300,600,700|Fondamento:400,400italic|Playfair+Display:400,700&subset=latin,latin-ext' );
    	add_editor_style( $font_url );
	}
	add_action( 'init', 'namaste_add_editor_styles' );
}
endif;

function namaste_custom_setup() {
	add_theme_support(
		'custom-background',
		array(
			'default-color' => 'eeebd5',
			'default-image' => '',
			'default-repeat'     => 'repeat',
			'default-position-x' => 'center',
			'default-attachment' => 'scroll',

		)
	);
	
	add_theme_support(
		'custom-header',
		array(
			'default-image'          => '',
			'flex-height'            => false,
			'flex-width'             => false,
			'uploads'                => true,
			'random-default'         => false,
			'wp-head-callback'       => '',
			'admin-head-callback'    => '',
			'admin-preview-callback' => '',
		)
	);
	
	define( 'NO_HEADER_TEXT', true );
}
add_action( 'after_setup_theme', 'namaste_custom_setup' );
