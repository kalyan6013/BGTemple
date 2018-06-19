<?php
/**
 * Namaste Lite About Theme
 *
 * @package namaste-lite
 */

//about theme info
add_action( 'admin_menu', 'namaste_about_theme' );
function namaste_about_theme() {  
	global $namaste_about_theme_page; 	
	$namaste_about_theme_page = add_theme_page( __('About Theme', 'namaste-lite'), __('About Theme', 'namaste-lite'), 'edit_theme_options', 'namaste_guide', 'namaste_guide');   
} 

//guidline for about theme
function namaste_guide() { 
?>

<div class="wrapper-info">
	<div class="col-left">
   		   <div class="about-title">
			  <?php esc_attr_e('About Namaste Theme', 'namaste-lite'); ?>
		   </div>
           <p><?php esc_html_e('Namaste Lite - Buddhist WordPress Theme is a free, responsive WordPress theme in the spirit of Buddhism. Namaste includes page builder, 6 post formats, unique elements, buddha and other buddhist icons, slider and a user friendly options area. With Unyson plugin You can easily customize Your site.', 'namaste-lite'); ?></p>
           <p><?php esc_html_e('If You want to know more about Namaste Lite, please read the', 'namaste-lite'); ?> <a href="<?php echo WEBZAKT_THEME_DOC; ?>" target="_blank"><?php esc_html_e('documentation', 'namaste-lite'); ?></a>.</p>
          <p><?php esc_html_e('Do You want more? Extend Namaste Theme! You can download', 'namaste-lite'); ?> <a href="<?php echo WEBZAKT_THEME_URL; ?>" target="_blank"><?php esc_html_e('Namaste Buddhist WordPress Theme', 'namaste-lite'); ?></a> <?php esc_html_e('pro version from Webzakt. Pro version includes Event and Portfolio modules, more Shortcodes, more Post Carousels, Animations, Namaste Widgets (Popular Posts, Donate, Contact, Quote, Event, Flickr), Woocommerce and Give donate functions, one click install demo content and more...', 'namaste-lite'); ?></p>
          <div class="description free-and-pro"><a href="<?php echo WEBZAKT_THEME_URL; ?>" class="webzakt-button webzakt-button-pro" target="_blank"><?php esc_html_e('More about Pro Version', 'namaste-lite'); ?></a><a href="<?php echo WEBZAKT_AUTHOR_URL; ?>" class="webzakt-button webzakt-button-more" target="_blank"><?php esc_html_e('More about Webzakt', 'namaste-lite'); ?></a></div>
		  <a href="<?php echo WEBZAKT_THEME_URL; ?>"><img src="<?php echo esc_url(get_template_directory_uri()); ?>/images/free-and-pro.png" /></a>
	</div><!-- .col-left -->
	
	<div class="col-right">			
			<div class="about-donate">
				<hr />
				<a href="<?php echo WEBZAKT_LIVE_DEMO; ?>" target="_blank"><?php esc_attr_e('Demo', 'namaste-lite'); ?></a> | 
				<a href="<?php echo WEBZAKT_THEME_URL; ?>"><?php esc_attr_e('Buy Pro', 'namaste-lite'); ?></a> | 
				<a href="<?php echo WEBZAKT_THEME_DOC; ?>" target="_blank"><?php esc_attr_e('Documentation', 'namaste-lite'); ?></a>
                <div class="about-space"></div>
				<hr />
                <p><?php esc_attr_e('Namaste Lite - Buddhist WordPress Theme is free, and I hope that you find it useful. If you would like to support future development and new product features, please make a (non-tax-deductible) donation via PayPal.','namaste-lite'); ?></p>
                <form action="https://www.paypal.com/cgi-bin/webscr" method="post" target="_top">
<input type="hidden" name="cmd" value="_s-xclick">
<input type="hidden" name="encrypted" value="-----BEGIN PKCS7-----MIIHPwYJKoZIhvcNAQcEoIIHMDCCBywCAQExggEwMIIBLAIBADCBlDCBjjELMAkGA1UEBhMCVVMxCzAJBgNVBAgTAkNBMRYwFAYDVQQHEw1Nb3VudGFpbiBWaWV3MRQwEgYDVQQKEwtQYXlQYWwgSW5jLjETMBEGA1UECxQKbGl2ZV9jZXJ0czERMA8GA1UEAxQIbGl2ZV9hcGkxHDAaBgkqhkiG9w0BCQEWDXJlQHBheXBhbC5jb20CAQAwDQYJKoZIhvcNAQEBBQAEgYCVDodpz3RcPxnMQj3Sz6EYbXSG/oIrHWgXHB+9FBHXdnwZCir9Gk17id7D7YciGaEHZHICu/LEHymdPfCyHhLQiHas52UWWHT2azl154xBw61WmxU8XAYV2+cNVxycFDREKaPbbY2l5rXpryMoNLv7uL9ctFBXGtrKP0snLn4JmDELMAkGBSsOAwIaBQAwgbwGCSqGSIb3DQEHATAUBggqhkiG9w0DBwQINUvqsKsPrwuAgZithwnHj1Ttp1fdH8u8RttyDjxRB72D7iS9J8nErw9uXtMT0KypbNY50kjm8k9mIMApNiaEaA35FI97TpxGtwUDK5kKi17s9OhWcd2mi+F2kEkwaQW57khrRt2yu+Gxda2aVu50IRI5ajR+IvpY1SZQImP6zpCrgOnErnYc705Wl54UITeHutRm7z96YmZ0ycwLW/7f0hQPZaCCA4cwggODMIIC7KADAgECAgEAMA0GCSqGSIb3DQEBBQUAMIGOMQswCQYDVQQGEwJVUzELMAkGA1UECBMCQ0ExFjAUBgNVBAcTDU1vdW50YWluIFZpZXcxFDASBgNVBAoTC1BheVBhbCBJbmMuMRMwEQYDVQQLFApsaXZlX2NlcnRzMREwDwYDVQQDFAhsaXZlX2FwaTEcMBoGCSqGSIb3DQEJARYNcmVAcGF5cGFsLmNvbTAeFw0wNDAyMTMxMDEzMTVaFw0zNTAyMTMxMDEzMTVaMIGOMQswCQYDVQQGEwJVUzELMAkGA1UECBMCQ0ExFjAUBgNVBAcTDU1vdW50YWluIFZpZXcxFDASBgNVBAoTC1BheVBhbCBJbmMuMRMwEQYDVQQLFApsaXZlX2NlcnRzMREwDwYDVQQDFAhsaXZlX2FwaTEcMBoGCSqGSIb3DQEJARYNcmVAcGF5cGFsLmNvbTCBnzANBgkqhkiG9w0BAQEFAAOBjQAwgYkCgYEAwUdO3fxEzEtcnI7ZKZL412XvZPugoni7i7D7prCe0AtaHTc97CYgm7NsAtJyxNLixmhLV8pyIEaiHXWAh8fPKW+R017+EmXrr9EaquPmsVvTywAAE1PMNOKqo2kl4Gxiz9zZqIajOm1fZGWcGS0f5JQ2kBqNbvbg2/Za+GJ/qwUCAwEAAaOB7jCB6zAdBgNVHQ4EFgQUlp98u8ZvF71ZP1LXChvsENZklGswgbsGA1UdIwSBszCBsIAUlp98u8ZvF71ZP1LXChvsENZklGuhgZSkgZEwgY4xCzAJBgNVBAYTAlVTMQswCQYDVQQIEwJDQTEWMBQGA1UEBxMNTW91bnRhaW4gVmlldzEUMBIGA1UEChMLUGF5UGFsIEluYy4xEzARBgNVBAsUCmxpdmVfY2VydHMxETAPBgNVBAMUCGxpdmVfYXBpMRwwGgYJKoZIhvcNAQkBFg1yZUBwYXlwYWwuY29tggEAMAwGA1UdEwQFMAMBAf8wDQYJKoZIhvcNAQEFBQADgYEAgV86VpqAWuXvX6Oro4qJ1tYVIT5DgWpE692Ag422H7yRIr/9j/iKG4Thia/Oflx4TdL+IFJBAyPK9v6zZNZtBgPBynXb048hsP16l2vi0k5Q2JKiPDsEfBhGI+HnxLXEaUWAcVfCsQFvd2A1sxRr67ip5y2wwBelUecP3AjJ+YcxggGaMIIBlgIBATCBlDCBjjELMAkGA1UEBhMCVVMxCzAJBgNVBAgTAkNBMRYwFAYDVQQHEw1Nb3VudGFpbiBWaWV3MRQwEgYDVQQKEwtQYXlQYWwgSW5jLjETMBEGA1UECxQKbGl2ZV9jZXJ0czERMA8GA1UEAxQIbGl2ZV9hcGkxHDAaBgkqhkiG9w0BCQEWDXJlQHBheXBhbC5jb20CAQAwCQYFKw4DAhoFAKBdMBgGCSqGSIb3DQEJAzELBgkqhkiG9w0BBwEwHAYJKoZIhvcNAQkFMQ8XDTE1MTAyNzExMTM1N1owIwYJKoZIhvcNAQkEMRYEFI7gvzN9L1y1hQscPZQh56ZWjM1rMA0GCSqGSIb3DQEBAQUABIGASxoeRgZeI2/lti7UIgXLG3MGbJLEHFJoBxlfFPQ9dT7XNUJbvKNcOWIxPv9ojreLUyP+fDqUWiZTMQ7TqTTercrQwThA8ZxWfoOnnvMZRqbQ4zo/saJ6PuW7jHHZTZo2t2ppDJZRYEa4phui+JHIthpYsatRYBKRiOlcEKdAUAo=-----END PKCS7-----
">
<input type="image" src="https://www.paypalobjects.com/en_US/i/btn/btn_donateCC_LG.gif" border="0" name="submit" alt="PayPal - The safer, easier way to pay online!">
<img alt="" border="0" src="https://www.paypalobjects.com/en_US/i/scr/pixel.gif" width="1" height="1">
</form>
			<hr />
            <p><?php esc_attr_e('Do You like Namaste Lite? Please give me a positive rate on the','namaste-lite'); ?> <a href="<?php echo WEBZAKT_WORDPRESS_THEME; ?>" target="_blank"><?php esc_attr_e('theme page, ', 'namaste-lite'); ?></a><?php esc_attr_e('or follow me on','namaste-lite'); ?> <a href="<?php echo WEBZAKT_FACEBOOK; ?>" target="_blank"><?php esc_attr_e('facebook', 'namaste-lite'); ?></a>.</p>
            <hr />
            <div class="about-title">
				<?php esc_attr_e('Credits', 'namaste-lite'); ?>
            </div>
            <p><?php esc_attr_e('I`ve used the following images, icons, fonts or other files as listed.', 'namaste-lite'); ?></p>
                        
            <ul>
                <li><?php esc_attr_e('Bootstrap', 'namaste-lite'); ?></li>
                <li><?php esc_attr_e('jQuery easing', 'namaste-lite'); ?></li>
                <li><?php esc_attr_e('prettyPhoto', 'namaste-lite'); ?></li>
                <li><?php esc_attr_e('Flexslider', 'namaste-lite'); ?></li>
                <li><?php esc_attr_e('Font Awesome', 'namaste-lite'); ?></li>
                <li><?php esc_attr_e('Google Fonts', 'namaste-lite'); ?></li>
                <li><?php esc_attr_e('Unyson', 'namaste-lite'); ?></li>
                <li><?php esc_attr_e('Klasik', 'namaste-lite'); ?></li>
            </ul>
		</div>		
	</div><!-- .col-right -->
</div><!-- .wrapper-info -->
<?php } ?>