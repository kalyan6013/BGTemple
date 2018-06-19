<?php
/**
 * The template for displaying 404 pages (Not Found).
 *
 * @package WordPress
 * @subpackage Namaste
 * @since Namaste 1.0
 */

if ( function_exists( 'fw_get_db_customizer_option') ) {
$namaste_image_404 = fw_get_db_customizer_option( 'image_404');
$namaste_text_404 = fw_get_db_customizer_option( 'text_404');
}

get_header(); ?>
	
    <!-- 404 content -->
	<div class="content-404">
		<?php if(isset($namaste_image_404) && ($namaste_image_404 != '')){ ?>
    		<?php echo wp_get_attachment_image( $namaste_image_404['attachment_id'] , 'full' );?>
        <?php } else { ?>
        <img src="<?php echo get_stylesheet_directory_uri(); ?>/images/404.png" width="650" height="350" alt="namaste-404" />
		<?php } ?>
		<?php if(isset($namaste_text_404) && ($namaste_text_404 != '')){ ?>
        <?php echo wp_kses_post($namaste_text_404);?>
        <?php } else { ?>
		<p><?php echo  __( 'Apologies, but the page you requested could not be found. Perhaps searching will help.', 'namaste-lite' ); ?></p>
        <?php } ?>
        <?php get_template_part('searchform'); ?>
    </div>
    <!-- END 404 content -->
    <div class="clear"></div><!-- clear float --> 
                
<?php get_footer(); ?>