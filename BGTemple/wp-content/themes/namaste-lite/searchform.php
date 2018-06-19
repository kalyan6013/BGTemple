<?php
/**
 * The template for displaying search forms in Innova
 *
 * @package WordPress
 * @subpackage Namaste
 * @since Namaste 1.0
 */
?>
<form method="get" class="searchform" action="<?php echo esc_url( home_url( '/' ) ); ?>">
<div class="searcharea">
    <input type="text" name="s" class="s" value="" placeholder="<?php _e('Search...', 'namaste-lite');?>" >
    <button type="submit"><i class="fa fa-search search-submit"></i></button>
</div>
</form>