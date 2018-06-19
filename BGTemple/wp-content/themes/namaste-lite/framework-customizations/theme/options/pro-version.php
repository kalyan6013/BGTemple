<?php if ( ! defined( 'FW' ) ) {
	die( 'Forbidden' );
}


$options = array(
	'pro_version' => array(
		'title' => __('Pro and Documentation', 'namaste-lite'),
		'type' => 'tab',
		'options' => array(
			'buy_pro' => array(
				'type'  => 'html',
				'value' => 'default hidden value',
				'attr'  => array( 'class' => 'custom-class', 'data-foo' => 'bar' ),
				'label' => __('Download Pro Version', 'namaste-lite'),
				'html'  => '<div class="description">'. __('Do You want more? Extend Namaste Theme! You can download ', 'namaste-lite') . '<a href="'.WEBZAKT_THEME_URL.'" target="_blank" title="'. __('NAMASTE Buddhist WordPress Theme', 'namaste-lite') . '">'. __('Namaste Buddhist WordPress Theme', 'namaste-lite') . '</a>'. __(' pro version from Webzakt. Pro version includes Event and Portfolio modules, more Shortcodes, more Post Carousels, Animations, Namaste Widgets (Popular Posts, Donate, Contact, Event, Flickr), Woocommerce and Give donate functions, one click install demo content and more...', 'namaste-lite') . '</div><div class="description"><a href="'.WEBZAKT_THEME_URL.'" class="webzakt-button webzakt-button-pro" target="_blank">'. __('More about Pro Version', 'namaste-lite') . '</a><a href="'.WEBZAKT_AUTHOR_URL.'" class="webzakt-button webzakt-button-more" target="_blank">'. __('More about Webzakt', 'namaste-lite') . '</a></div>',
			),
			'documentation_webzakt' => array(
				'type'  => 'html',
				'value' => 'default hidden value',
				'attr'  => array( 'class' => 'custom-class', 'data-foo' => 'bar' ),
				'label' => __('Documentation', 'namaste-lite'),
				'html'  => '<div class="description">'. __('Namaste Lite Responsive Buddhist WordPress Theme is free, and I hope that you find it useful. You can read more about the usage in the ', 'namaste-lite') . '<a href="'.WEBZAKT_THEME_DOC.'"  target="_blank">'. __('documentation', 'namaste-lite') . '</a>.</div>
			',
			)
		)
	)
);