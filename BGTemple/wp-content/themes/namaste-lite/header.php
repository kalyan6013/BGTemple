<?php
/**
 * The Header for our theme.
 *
 *
 * @package WordPress
 * @subpackage Namaste
 * @since Namaste 1.0
 */
?>

<?php
// Theme Settings
if ( function_exists( 'fw_get_db_customizer_option') ) {
    $namaste_header_style = fw_get_db_customizer_option( 'header_style/header');
	$namaste_allow_search = fw_get_db_customizer_option( 'header_style/default/allow_search');
	$namaste_donate = fw_get_db_customizer_option( 'donate_switch/on_off');
	$namaste_donatelink = fw_get_db_customizer_option( 'donate_switch/on/link');
	$namaste_donatetext = fw_get_db_customizer_option( 'donate_switch/on/text');
	$namaste_social1 = fw_get_db_customizer_option( 'social1');
	$namaste_social_icon1 = fw_get_db_customizer_option( 'social_icon1');
	$namaste_social2 = fw_get_db_customizer_option( 'social2');
	$namaste_social_icon2 = fw_get_db_customizer_option( 'social_icon2');
	$namaste_social3 = fw_get_db_customizer_option( 'social3');
	$namaste_social_icon3 = fw_get_db_customizer_option( 'social_icon3');
	$namaste_social4 = fw_get_db_customizer_option( 'social4');
	$namaste_social_icon4 = fw_get_db_customizer_option( 'social_icon4');
	$namaste_social5 = fw_get_db_customizer_option( 'social5');
	$namaste_social_icon5 = fw_get_db_customizer_option( 'social_icon5');
	$namaste_social6 = fw_get_db_customizer_option( 'social6');
	$namaste_social_icon6 = fw_get_db_customizer_option( 'social_icon6');
	$namaste_social7 = fw_get_db_customizer_option( 'social7');
	$namaste_social_icon7 = fw_get_db_customizer_option( 'social_icon7');
	$namaste_social8 = fw_get_db_customizer_option( 'social8');
	$namaste_social_icon8 = fw_get_db_customizer_option( 'social_icon8');
  }
?>
 
<?php get_template_part( 'site-header'); ?>

<div id="bodychild">
	<div id="outercontainer">
    
        <!-- HEADER -->
        <div id="outerheader">
        	<div id="headercontainer">
				<?php if(isset($namaste_header_style) && ($namaste_header_style == 'default')){ ?>
                    <header>
                        <div id="top" class="row">
                        	<div class="container">
                            <div id="logo" class="col-7"><?php namaste_logo();?></div>
                            
                            <div id="social-section" class="col-5">
                            
                            <?php if(isset($namaste_donate) && ($namaste_donate == 'on')){ ?>
							<div id="donate-button">
                				<a class="btn" href="<?php echo esc_url($namaste_donatelink) ; ?>"><span><?php echo esc_html($namaste_donatetext) ; ?></span></a>
               				</div>
                            <?php } ?>
                            
                            <?php if ( function_exists( 'fw_get_db_customizer_option') ) { ?>
                            <div id="menu-social" class="menu-social">
                    			<ul id="menu-social-items" class="menu-items">
                                 <?php if($namaste_social1 != ''){ ?><li><a href="<?php echo esc_url($namaste_social1) ; ?>"><i class="<?php echo esc_attr($namaste_social_icon1) ; ?>"></i></a></li> <?php } else {} ?>
                                 <?php if($namaste_social2 != ''){ ?><li><a href="<?php echo esc_url($namaste_social2) ; ?>"><i class="<?php echo esc_attr($namaste_social_icon2) ; ?>"></i></a></li> <?php } else {} ?>
                                 <?php if($namaste_social3 != ''){ ?><li><a href="<?php echo esc_url($namaste_social3) ; ?>"><i class="<?php echo esc_attr($namaste_social_icon3) ; ?>"></i></a></li> <?php } else {} ?>
                                 <?php if($namaste_social4 != ''){ ?><li><a href="<?php echo esc_url($namaste_social4) ; ?>"><i class="<?php echo esc_attr($namaste_social_icon4) ; ?>"></i></a></li> <?php } else {} ?>
                                 <?php if($namaste_social5 != ''){ ?><li><a href="<?php echo esc_url($namaste_social5) ; ?>"><i class="<?php echo esc_attr($namaste_social_icon5) ; ?>"></i></a></li> <?php } else {} ?>
                                 <?php if($namaste_social6 != ''){ ?><li><a href="<?php echo esc_url($namaste_social6) ; ?>"><img src="<?php echo esc_url($namaste_social_icon6['url']) ; ?>" class="social-image"/></a></li> <?php } else {} ?>
                                 <?php if($namaste_social7 != ''){ ?><li><a href="<?php echo esc_url($namaste_social7) ; ?>"><img src="<?php echo esc_url($namaste_social_icon7['url']) ; ?>" class="social-image"/></a></li> <?php } else {} ?>
                                 <?php if($namaste_social8 != ''){ ?><li><a href="<?php echo esc_url($namaste_social8) ; ?>"><img src="<?php echo esc_url($namaste_social_icon8['url']) ; ?>" class="social-image"/></a></li> <?php } else {} ?>
                                </ul>
                			</div>
                            <?php } ?>
                            
                            
							</div>
							</div>
							<div class="clearfix"></div>  
                        </div>
                        <div class="clearfix"></div>
                        
                        <div id="headernav" class="row">
                        <div class="container">
                            <div id="navigation"> 
               
								<a class="toggleMenu" href="#">
									<?php echo __( 'Menu', 'namaste-lite' ) ; ?>
                                    <p class="menu-icon"><i class="fa fa-bars"></i></p>
                                </a>
     
                                <nav id="nav-wrap-mobile" class="toggle_container">
                                    <?php wp_nav_menu( array(
                                      'container'       => 'ul', 
                                      'menu_class'      => 'namaste-mobile-menu',
                                      'menu_id'         => 'topnav-mobile', 
                                      'depth'           => 4,
                                      'sort_column'     => 'menu_order',
                                      'fallback_cb'     => 'namaste_nav_page_fallback',
                                      'theme_location'  => 'mainmenu' 
                                      )); 
                                    ?>                                                             
                                </nav>
                                <nav id="nav-wrap">
                                    <?php wp_nav_menu( array(
                                      'container'       => 'ul', 
                                      'menu_class'      => 'namaste-menu',
                                      'menu_id'         => 'topnav', 
                                      'depth'           => 4,
                                      'sort_column'     => 'menu_order',
                                      'fallback_cb'     => 'namaste_nav_page_fallback',
                                      'theme_location'  => 'mainmenu' 
                                      )); 
                                    ?>                                                             
                                </nav><!-- nav -->	
                                <div class="clearfix"></div>
                            </div>
                            
                            <?php if(isset($namaste_allow_search) && ($namaste_allow_search == 'yes')){ ?>
                            <div id="top-search" class="col-4">
                            <?php get_search_form(); ?>
                            </div>
                            <?php } ?>
						</div>                            
                        </div>
                    </header>
				<?php } else { ?>
					<header>
                        <div id="headernav" class="row">
                            <div class="container header-simple">
                                <div id="logo" class="col-4"><?php namaste_logo();?></div>
                                <div id="navigation" class="col-8"> 
                   
                                    <a class="toggleMenu" href="#">
                                        <?php echo __( 'Menu', 'namaste-lite' ) ; ?>
                                        <p class="menu-icon"><i class="fa fa-bars"></i></p>
                                    </a>
         
                                    <nav id="nav-wrap-mobile" class="toggle_container">
                                        <?php wp_nav_menu( array(
                                          'container'       => 'ul', 
                                          'menu_class'      => 'namaste-mobile-menu',
                                          'menu_id'         => 'topnav-mobile', 
                                          'depth'           => 4,
                                          'sort_column'     => 'menu_order',
                                          'fallback_cb'     => 'namaste_nav_page_fallback',
                                          'theme_location'  => 'mainmenu' 
                                          )); 
                                        ?>                                                             
                                    </nav>
                                    <nav id="nav-wrap">
                                        <?php wp_nav_menu( array(
                                          'container'       => 'ul', 
                                          'menu_class'      => 'namaste-menu',
                                          'menu_id'         => 'topnav', 
                                          'depth'           => 4,
                                          'sort_column'     => 'menu_order',
                                          'fallback_cb'     => 'namaste_nav_page_fallback',
                                          'theme_location'  => 'mainmenu' 
                                          )); 
                                        ?>                                                             
                                    </nav><!-- nav -->	
                                    <div class="clearfix"></div>
                                </div>
                            </div>                            
                        </div>
                    </header>
                <?php } ?>
            </div>
		</div>
        <!-- END HEADER -->

<img src="/BGTemple/wp-content/themes/namaste-lite/images/custom_images/warli.jpg" alt="Ganapathi Swamy">
        <?php get_template_part('layout-header'); ?>							