<?php if ( ! defined( 'FW' ) ) {
	die( 'Forbidden' );
}

$options = array(
	'header' => array(
		'title' => __('Header', 'namaste-lite'),
		'type' => 'tab',
		'options' => array(
			'logo_type' => array(
				'type' => 'multi-picker',
				'label' => false,
				'desc' => false,
				'picker' => array(
					'logo' => array(
						'label' => __('Logo Type', 'namaste-lite'),
						'type' => 'radio',
						'choices' => array(
							'text' => __('Text-based Logo', 'namaste-lite'),
							'image' => __('Image Logo', 'namaste-lite')
						),
						'desc' => __('Select one from the logo types and add the content.', 'namaste-lite'),
					)
				),
				'choices' => array(
					'text' => array(
						'logo_text' => array(
							'label' => __('Logo Text', 'namaste-lite'),
							'desc' => __('Add a site title.', 'namaste-lite'),
							'type' => 'text',
							'value' => get_bloginfo('name')
						),
					),
					'image' => array(
						'logo_image' => array(
							'label' => __('Logo Image', 'namaste-lite'),
							'desc' => __('Upload the logo image.', 'namaste-lite'),
							'type' => 'upload',
						),
						'retina_logo_image' => array(
							'label' => __('Retina Logo Image', 'namaste-lite'),
							'desc' => __('Upload the retina logo image.', 'namaste-lite'),
							'type' => 'upload',
						),
						'retina_width' => array(
							'label' => __('Logo Width for Retina Logo', 'namaste-lite'),
							'desc' => __('Add the standard logo (1x) version width. (Widthout px)', 'namaste-lite'),
							'type' => 'text',
						),
						'retina_height' => array(
							'label' => __('Logo Height for Retina Logo', 'namaste-lite'),
							'desc' => __('Add the standard logo (1x) version height. (Widthout px)', 'namaste-lite'),
							'type' => 'text',
						),
					),
				),
				'show_borders' => false,
			),
			'header_style' => array(
				'type' => 'multi-picker',
				'label' => false,
				'desc' => false,
				'value' => array(
					'header' => 'default', ),
				'picker' => array(
					'header' => array(
						'label' => __('Header Style', 'namaste-lite'),
						'type' => 'radio',
						'choices' => array(
							'default' => __('Default Header', 'namaste-lite'),
							'simple' => __('Simple Header', 'namaste-lite')
						),
						'desc' => __('Select Simple Header for smaller style.', 'namaste-lite'),
					)
				),
				'choices' => array(
					'default' => array(
						'header_text' => array(
							'label' => __('Header Text', 'namaste-lite'),
							'desc' => __('Add some text next to your logo.', 'namaste-lite'),
							'type' => 'textarea',
							'value' => ''
						),
						'allow_search'                    => array(
							'label'        => __( 'Search Field', 'namaste-lite' ),
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
							'desc'         => __( 'Allow search field on header.', 'namaste-lite' ),
						),
					),
				),
				'show_borders' => false,
			),
			'donate_switch' => array(
				'type' => 'multi-picker',
				'label' => false,
				'desc' => false,
				'picker' => array(
					'on_off' => array(
						'label' => __('Donate Button', 'namaste-lite'),
						'type' => 'switch',
						'right-choice' => array(
							'value' => 'off',
							'label' => __('Off', 'namaste-lite')
						),
						'left-choice' => array(
							'value' => 'on',
							'label' => __('On', 'namaste-lite')
						),
						'value' => 'on',
						'desc' => __('Turn on or off.', 'namaste-lite'),
					)
				),
				'choices' => array(
					'on' => array(
						'link' => array(
							'type' => 'text',
							'label' => __('Donate Link', 'namaste-lite'),
							'desc' => __('Add the link of Donate Page.', 'namaste-lite'),
						),
						'text' => array(
							'type' => 'text',
							'label' => __('Donate Text', 'namaste-lite'),
							'value' => 'Donate',
							'desc' => __('Add the text of the button.', 'namaste-lite'),
						),

					),

				),
				'show_borders' => false,
			),
			'top_background_color' => array(
				'label' => __('Header Background Color', 'namaste-lite'),
				'type' => 'rgba-color-picker',
				'value' => '#222222',
				'desc' => __('Pick a color for header background.', 'namaste-lite'),
			),
			'submenu_width' => array(
				'label' => __('Submenu width', 'namaste-lite'),
				'type' => 'slider',
				'value' => 15,
				'desc' => __('Add the width of the submenu.', 'namaste-lite'),
			),
		)
	)
);