<?php if ( ! defined( 'FW' ) ) {
	die( 'Forbidden' );
}

$options = array(
	'footer' => array(
		'title' => __('Footer', 'namaste-lite'),
		'type' => 'tab',
		'options' => array(
			'footer_column' => array(
				'label' => __('Footer Columns', 'namaste-lite'),
				'type' => 'short-select',
				'value' => '4',
				'desc' => __('The value is column for display in footer column.', 'namaste-lite'),
				'choices' => array(
					'1' => '1',
					'2' => '2',
					'3' => '3',
					'4' => '4',
					'5' => '5',
					'6' => '6',
				),
			),
			'footer_background_image' => array(
				'label' => __('Footer Background Image', 'namaste-lite'),
				'desc' => __('Upload an image.', 'namaste-lite'),
				'type' => 'upload'
			),
			'background_layer' => array(
				'label' => __('Background Layer', 'namaste-lite'),
				'type' => 'slider',
				'value' => 90,
				'desc' => __('Opacity of the layer, above the image.', 'namaste-lite'),
			),
			'social_switch' => array(
				'type' => 'multi-picker',
				'label' => false,
				'desc' => false,
				'picker' => array(
					'on_off' => array(
						'label' => __('Social Icons', 'namaste-lite'),
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
						'desc' => __('Display social icons on the footer.', 'namaste-lite'),
					)
				)
			),
			'bottom_background_color' => array(
				'label' => __('Bottom Footer Background Color', 'namaste-lite'),
				'type' => 'rgba-color-picker',
				'value' => '#222222',
				'desc' => __('Pick a color for bottom footer background.', 'namaste-lite'),
			),
			'copyright_1' => array(
				'label' => __('Copyright 1', 'namaste-lite'),
				'type' => 'text',
				'value' => '',
				'desc' => __('If you dont need to add a copyright message to your website, leave this field blank.', 'namaste-lite'),
			),
			'copyright_2' => array(
				'label' => __('Copyright 2', 'namaste-lite'),
				'type' => 'text',
				'value' => '',
				'desc' => __('If you dont need to add a copyright message to your website, leave this field blank.', 'namaste-lite'),
			),
		)
	)
);