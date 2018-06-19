/**
 * Flexslider
 *
*/

jQuery(document).ready(function($){
	jQuery('.flexslider').flexslider({
		animation: "fade",
		touch:true,
		animationDuration: 6000,
		directionNav: true,
		controlNav: false
	});	
});

	
/**
 * Toggle
 *
*/
(function($) {
jQuery(".toggle_container:not('.active')").hide();
jQuery(".toggleMenu").click(function(){
jQuery(this).toggleClass("active").next().slideToggle("normal");
return false;
});	
})(jQuery);


/**
 * Pretty Photo Script
 *
*/

jQuery(document).ready(function(){
	runprettyPhoto();
});

function runprettyPhoto(){
	//=================================== PRETTYPHOTO ===================================//
	jQuery('a[data-gal]').each(function() {jQuery(this).attr('data-gal', jQuery(this).data('data-gal'));});
	jQuery("a[data-gal^='prettyPhoto']").prettyPhoto({
		animationSpeed:'slow',
		theme:'pp_default', /* light_rounded / dark_rounded / light_square / dark_square / facebook */
		gallery_markup:'',
		social_tools: false,
		slideshow:2000
	});
}