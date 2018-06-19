<?php

/********** NAMASTE DEFINITION *************/
if ( ! isset( $content_width ) ) $content_width = 1170;
$namaste_includes_path 		= get_template_directory() . '/includes/';

/********** END NAMASTE DEFINITION *************/

//Theme init
require_once $namaste_includes_path . 'theme-init.php';

//Sidebar
require_once $namaste_includes_path . 'theme-sidebar.php';

//Additional function
require_once $namaste_includes_path . 'theme-function.php';

//Header function
require_once $namaste_includes_path . 'header-function.php';

//Footer function
require_once $namaste_includes_path . 'footer-function.php';

//Loading jQuery
require_once $namaste_includes_path . 'theme-scripts.php';

//Loading Style Css
require_once $namaste_includes_path . 'theme-styles.php';

//About Theme
require_once $namaste_includes_path . 'about-theme.php';

// Plugin Activation 
if(file_exists($namaste_includes_path . 'child-plugins.php')){
	require_once $namaste_includes_path . 'child-plugins.php';
}

define('WEBZAKT_THEME_URL','http://webzakt.com/product/namaste-buddhist-wordpress-theme/','namaste-lite');
define('WEBZAKT_AUTHOR_URL','http://webzakt.com/','namaste-lite');
define('WEBZAKT_THEME_DOC','http://namaste-lite.webzakt.com/documentation/','namaste-lite');
define('WEBZAKT_LIVE_DEMO','http://namaste-lite.webzakt.com/','namaste-lite');
define('WEBZAKT_WORDPRESS_THEME','https://wordpress.org/themes/namaste-lite/','namaste-lite');
define('WEBZAKT_TT_IMAGE','http://www.transparenttextures.com/patterns/dotnoise-light-grey.png','namaste-lite');
define('WEBZAKT_TT_SITE','http://www.transparenttextures.com/','namaste-lite');
define('WEBZAKT_FACEBOOK','https://www.facebook.com/webzakt.hu/','namaste-lite');