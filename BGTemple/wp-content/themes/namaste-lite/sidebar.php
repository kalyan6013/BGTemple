<?php
/**
 * The Sidebar containing the post widget areas.
 *
 * @package WordPress
 * @subpackage Namaste
 * @since Namaste 1.0
 */

?>
<div class="widget-area">
		<?php if ( !dynamic_sidebar( 'namaste_main_sidebar') ) : ?>
		<?php endif; ?>
    <div class="clear"></div>
</div>