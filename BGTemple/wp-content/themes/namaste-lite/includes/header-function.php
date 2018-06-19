<?php 

/*********Head action hook**************/
if(!function_exists("namaste_head")){
	function namaste_head(){
		do_action("namaste_head");
	}
	add_action('wp_head', 'namaste_head', 20);
}

/*********Print the logo html**************/
if(!function_exists("namaste_logo")){
	function namaste_logo(){
		
	if ( function_exists( 'fw_get_db_customizer_option') ) {
		$logotype = fw_get_db_customizer_option( 'logo_type/logo');
		$logoimage = fw_get_db_customizer_option( 'logo_type/image/logo_image');
		$retina_logo_image = fw_get_db_customizer_option( 'logo_type/image/retina_logo_image');
		$retina_width = fw_get_db_customizer_option( 'logo_type/image/retina_width');
		$retina_height = fw_get_db_customizer_option( 'logo_type/image/retina_height'); 
		$sitename =  fw_get_db_customizer_option( 'logo_type/text/logo_text');
		$namaste_header_style = fw_get_db_customizer_option( 'header_style/header');
		$header_text = fw_get_db_customizer_option( 'header_style/default/header_text');
	}
	
	$blog_title = get_bloginfo();
	
	if(isset($logotype) && ($logotype == 'image')){ ?>
		<div id="logoimg">
        	<a href="<?php echo esc_url(home_url( '/' )); ?>" title="<?php echo esc_attr( get_bloginfo( 'name', 'namaste-lite' ) ); ?>" >
                <img src="<?php echo esc_url($logoimage['url']);?>" class="default-logo" alt="<?php echo esc_attr( get_bloginfo( 'name', 'namaste-lite' ) ); ?>" />
                <?php if ( $retina_logo_image != '' ) { ?>
                <img src="<?php echo esc_url($retina_logo_image['url']);?>" class="retina-logo" alt="<?php echo esc_attr( get_bloginfo( 'name', 'namaste-lite' ) ); ?>" width="<?php echo esc_attr($retina_width) ;?>" height="<?php echo esc_attr($retina_height) ;?>" />
                <?php } else { ?>
                <img src="<?php echo esc_url($logoimage['url']);?>" class="retina-logo" alt="<?php echo esc_attr( get_bloginfo( 'name', 'namaste-lite' ) ); ?>" width="<?php echo esc_attr($retina_width) ;?>" height="<?php echo esc_attr($retina_height) ;?>" />
                <?php } ?>
            </a>
        </div>
        <?php if(isset($namaste_header_style) && ($namaste_header_style == 'default')){ ?>
		<div class="logo-subtitle"><?php echo wp_kses_post($header_text); ?></div>
        <?php } ?>
        
	<?php } elseif(isset($logotype) && ($logotype == 'text')) { ?>
        	
	<div id="logotext">
    	<h1 class="site-title"><a href="<?php echo esc_url(home_url( '/' )); ?>" title="<?php esc_attr_e('Click for Home', 'namaste-lite'); ?>"><?php echo esc_html($sitename); ?></a></h1>
    </div>
    <?php if(isset($namaste_header_style) && ($namaste_header_style == 'default')){ ?>
	<div class="logo-subtitle"><?php echo wp_kses_post($header_text); ?></div>
    <?php } ?>
    
	<?php }  else { ?>
        	
	<div id="logotext">
    	<h1 class="site-title"><a href="<?php echo esc_url(home_url( '/' )); ?>" title="<?php esc_attr_e('Click for Home', 'namaste-lite'); ?>"><?php echo esc_html($blog_title); ?></a></h1>
    </div>
    
	<?php }
}
}


/*********Dynamic Styles**************/
function namaste_dynamic_styles() { ?>
<style type="text/css">
<?php 
// Theme Settings
if ( function_exists( 'fw_get_db_customizer_option') ) {
  $top_background_color = fw_get_db_customizer_option( 'top_background_color');
  $bottom_background_color = fw_get_db_customizer_option( 'bottom_background_color');
  $submenu_width = fw_get_db_customizer_option( 'submenu_width'); 
  $body_background_color = get_theme_mod( 'background_color', get_theme_support( 'custom-background', 'default-color' ) );
?>

<?php if ($body_background_color != ('')){ ?>
body {
	background-color: #<?php echo esc_attr($body_background_color); ?> !important;
}
<?php } ?>

header #top {
	background-image: url('<?php header_image(); ?>');
}

<?php if ($top_background_color != ('')){ ?>
#top {
    background-color: <?php echo esc_attr($top_background_color); ?> !important;
}
<?php } ?>

<?php if ($bottom_background_color != ('')){ ?>
#outerfooter, #footerholder .menu-social ul li {
    background-color: <?php echo esc_attr($bottom_background_color); ?> !important;
}
<?php } ?>

<?php if ($submenu_width != ('')){ ?>
#headernav ul ul a, #headernav .mega-menu ul li {
	width: <?php echo $submenu_width ; ?>em;
}
<?php } ?>
<?php } ?>
</style>
<?php
}
add_action( 'wp_head', 'namaste_dynamic_styles', 998 );

function namaste_page_padding() {
$post_id = get_the_ID();  
if ( function_exists( 'fw_get_db_post_option') ) {
    $top_padding = fw_get_db_post_option( $post_id, 'top_padding');
	$bottom_padding = fw_get_db_post_option( $post_id, 'bottom_padding');
?> 
<style>
#maincontent {
	padding-top: <?php echo esc_attr($top_padding) ; ?>px;
	padding-bottom: <?php echo esc_attr($bottom_padding) ; ?>px;
}
</style>
<?php }
}
add_action( 'wp_head', 'namaste_page_padding', 999 );