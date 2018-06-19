<?php if ( ! defined( 'FW' ) ) {
	die( 'Forbidden' );
}

$options = array(
	'general' => array(
		'title' => __('General', 'namaste-lite'),
		'type' => 'tab',
		'options' => array(
			'image_advice' => array(
				'type'  => 'html',
				'value' => 'default hidden value',
				'attr'  => array( 'class' => 'custom-class', 'data-foo' => 'bar' ),
				'html'  => '<p>'. __('Suggested background image: ', 'namaste-lite') . '<a href="'.WEBZAKT_TT_IMAGE.'" target="_blank">'. __('Dotnoise Light Grey', 'namaste-lite') . '</a>'. __(' from ', 'namaste-lite') . '<a href="'.WEBZAKT_TT_SITE.'" target="_blank">'. __('Transparent Textures.', 'namaste-lite') . '</a><br>'. __('You can add it in the Background Image section.', 'namaste-lite') . '</p>',
			),
			'basic_layer_select' => array(
				'label' => __('Default Layout', 'namaste-lite'),
				'type' => 'image-picker',
				'value' => '',
				'desc' => __('Select the default layout for your theme.', 'namaste-lite'),
				'choices' => array(
					'1-col' => array(
						'small' => array(
							'height' => 70,
							'src' => get_template_directory_uri().
							'/images/1col.png'
						),
						'large' => array(
							'height' => 214,
							'src' => get_template_directory_uri().
							'/images/1col.png'
						),
					),
					'2-col-l' => array(
						'small' => array(
							'height' => 70,
							'src' => get_template_directory_uri().
							'/images/2cl.png'
						),
						'large' => array(
							'height' => 214,
							'src' => get_template_directory_uri().
							'/images/2cl.png'
						),
					),
					'2-col-r' => array(
						'small' => array(
							'height' => 70,
							'src' => get_template_directory_uri().
							'/images/2cr.png'
						),
						'large' => array(
							'height' => 214,
							'src' => get_template_directory_uri().
							'/images/2cr.png'
						),
					),
				),
			),
			'enable_responsive'                    => array(
				'label'        => __( 'Enable Responsive', 'namaste-lite' ),
				'type'         => 'switch',
				'right-choice' => array(
					'value' => 'yes',
					'label' => __( 'Yes', 'namaste-lite' )
				),
				'left-choice'  => array(
					'value' => 'no',
					'label' => __( 'No', 'namaste-lite' )
				),
				'value'        => 'yes',
				'desc'         => __( 'Enable the responsive behaviour of the theme.', 'namaste-lite' ),
			),
			'read_more_text' => array(
				'label' => __('Read More', 'namaste-lite'),
				'desc' => __('Default "Read more" text on buttons.', 'namaste-lite'),
				'type' => 'text',
				'value' => 'Read more'
			),
			'image_404' => array(
				'label' => __('404 Image', 'namaste-lite'),
				'desc' => __('Upload a custom image for 444 page.', 'namaste-lite'),
				'type' => 'upload',
				'images_only' => false,
			),
			'text_404' => array(
				'label' => __('404 Text', 'namaste-lite'),
				'type' => 'textarea',
				'value' => __( 'Apologies, but the page you requested could not be found. Perhaps searching will help.', 'namaste-lite' ),
				'desc' => __('Text for 404 page.', 'namaste-lite'),
			),
		)
	)
);