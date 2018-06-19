<?php
/**
 * The template for displaying the footer.
 *
 * @package WordPress
 * @subpackage Namaste
 * @since Namaste 1.0
 */
 
?>

<?php
// Theme Settings
if ( function_exists( 'fw_get_db_customizer_option') ) {
	$namaste_footer_background_image = fw_get_db_customizer_option( 'footer_background_image');
	$namaste_background_layer = fw_get_db_customizer_option( 'background_layer');
    $namaste_copyright_1 = fw_get_db_customizer_option( 'copyright_1');
	$namaste_copyright_2 = fw_get_db_customizer_option( 'copyright_2');
	$namaste_social = fw_get_db_customizer_option( 'social_switch/on_off');
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
	$footcolumn = fw_get_db_customizer_option( 'footer_column');
  }else {
  	$footcolumn = '3' ;
  }
?> 
			
		<?php get_template_part('layout-footer'); ?>

		<?php if(is_active_sidebar('footer')){ ?>
        
        <!-- FOOTER SIDEBAR -->
        <div id="outerfootersidebar"<?php if($namaste_footer_background_image != ''){ ?> style="background-image:url('<?php echo esc_url($namaste_footer_background_image['url']) ; ?>');"<?php } ?>>
        	
            <?php if($namaste_background_layer == '100'){ ?>
            <div id="footersidebarcontainer" class="namaste-footer-column-<?php echo esc_attr($footcolumn) ; ?>" style="background-color: rgba(34, 34, 34, 1.0);">
			<?php } elseif($namaste_background_layer != ''){ ?>
            <div id="footersidebarcontainer" class="namaste-footer-column-<?php echo esc_attr($footcolumn) ; ?>" style="background-color: rgba(34, 34, 34, 0.<?php echo esc_attr($namaste_background_layer) ; ?>);">  
			<?php } else { ?>
            <div id="footersidebarcontainer" class="namaste-footer-column-<?php echo esc_attr($footcolumn) ; ?>">
            <?php } ?>
                <div class="container">
                    <div class="row"> 
                    
                        <footer id="footersidebar">
                            <?php 
							if ( ! dynamic_sidebar( 'footer' ) )
							?>
                            <div class="clear"></div>
                        </footer>
    
                    </div>
                </div>
            </div>
        </div>
        <!-- END FOOTER SIDEBAR -->
        <?php } ?>
        
        <!-- FOOTER -->
        <div id="outerfooter">
        	<div id="footercontainer">
                <div class="container">

                    <div class="row">

			<!-- footerholder -->
                        <div id="footerholder">
<p style="color:white;margin-left:200px">Powered By<img src="http://localhost/BGTemple/wp-content/themes/namaste-lite/images/custom_images/tekvity.jpg" style="width:100px;height:20px;" /></p>
                        <?php if ( function_exists( 'fw_get_db_customizer_option') ) { ?>
                        <?php if($namaste_social == 'on'){ ?>
                            
                        <div id="menu-social-footer" class="menu-social">
                    			<ul id="menu-social-items-footer" class="menu-items">
                                 <?php if($namaste_social1 != ''){ ?><li><a href="<?php echo esc_url($namaste_social1) ; ?>"><i class="<?php echo esc_attr($namaste_social_icon1) ; ?>"></i></a></li> <?php } else {} ?>
                                 <?php if($namaste_social2 != ''){ ?><li><a href="<?php echo esc_url($namaste_social2) ; ?>"><i class="<?php echo esc_attr($namaste_social_icon2) ; ?>"></i></a></li> <?php } else {} ?>
                                 <?php if($namaste_social3 != ''){ ?><li><a href="<?php echo esc_url($namaste_social3) ; ?>"><i class="<?php echo esc_attr($namaste_social_icon3) ; ?>"></i></a></li> <?php } else {} ?>
                                 <?php if($namaste_social4 != ''){ ?><li><a href="<?php echo esc_url($namaste_social4) ; ?>"><i class="<?php echo esc_attr($namaste_social_icon4) ; ?>"></i></a></li> <?php } else {} ?>
                                 <?php if($namaste_social5 != ''){ ?><li><a href="<?php echo esc_url($namaste_social5) ; ?>"><i class="<?php echo esc_attr($namaste_social_icon5) ; ?>"></i></a></li> <?php } else {} ?>
                                 <?php if($namaste_social6 != ''){ ?><li><a href="<?php echo esc_url($namaste_social6) ; ?>"><img src="<?php echo esc_url($namaste_social_icon6['url']) ; ?>" class="social-image"/></a></li> <?php } else {} ?>
                                 <?php if($namaste_social7 != ''){ ?><li><a href="<?php echo esc_url($namaste_social7) ; ?>"><img src="<?php echo esc_url($namaste_social_icon7['url']) ; ?>" class="social-image"/></a></li> <?php } else {} ?>
                                 <?php if($namaste_social8 != ''){ ?><li><a href="<?php echo esc_url($namaste_social8) ; ?>"><img src="<?php echo esc_url($namaste_social_icon8['url']) ; ?>" class="social-image"/></a></li> <?php } else {} ?>
                                </ul>
                                <div class="clear"></div>
                		</div>
                        <?php } ?>
						<?php } ?>
                        
						<footer id="footer">
							<div class="col-7">
								<div class="copyrighttext">
								<?php if ( function_exists( 'fw_get_db_customizer_option') ) { ?>
								<?php if($namaste_copyright_1 != ''){ ?><p><?php echo wp_kses_post($namaste_copyright_1);?></p><?php }?>  
                                <?php if($namaste_copyright_2 != ''){ ?><p><?php echo wp_kses_post($namaste_copyright_2);?></p><?php }?>  
								<?php } ?>
                                </div>
                            </div>
                            
                            <div class="col-5">
                                <div class="copyrighttext">
									<?php wp_nav_menu( array(
                                      'container'       => 'ul', 
                                      'menu_class'      => 'namaste-menu',
                                      'menu_id'         => 'footernav', 
                                      'depth'           => 0,
                                      'sort_column'    => 'menu_order',
                                      'fallback_cb'     => 'namaste_nav_page_fallback',
                                      'theme_location' => 'footermenu' 
                                      )); 
                                    ?>
                                </div>
                            </div>
                         	<div class="clearfix"></div>
                        </footer> 
                    </div><!-- footerholder end -->
                </div><!-- row end -->
            </div><!-- container end -->
        </div><!-- footercontainer end -->
        </div><!-- outerfooter end --> 
	</div><!-- outercontainer end --> 
</div><!-- bodychild end --> 


<?php get_template_part('site-footer'); ?>
