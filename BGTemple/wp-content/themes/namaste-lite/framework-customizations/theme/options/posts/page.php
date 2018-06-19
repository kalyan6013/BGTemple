<?php if ( ! defined( 'FW' ) ) {
	die( 'Forbidden' );
}

$options = array(
	'general' => array(
		'title' => __('Page Options', 'namaste-lite'),
		'type' => 'box',
		'options' => array(
			'basic_post_layer_select' => array(
				'label' => __('Layout', 'namaste-lite'),
				'type' => 'image-picker',
				'value' => '',
				'desc' => __('Select the layout for the page.', 'namaste-lite'),
				'choices' => array(
					'default' => array(
						'small' => array(
							'height' => 70,
							'src' => get_template_directory_uri().
							'/images/mb-default.png'
						),
						'large' => array(
							'height' => 214,
							'src' => get_template_directory_uri().
							'/images/mb-default.png'
						),
					),
					'1-col' => array(
						'small' => array(
							'height' => 70,
							'src' => get_template_directory_uri().
							'/images/mb-1c.png'
						),
						'large' => array(
							'height' => 214,
							'src' => get_template_directory_uri().
							'/images/mb-1c.png'
						),
					),
					'2-col-l' => array(
						'small' => array(
							'height' => 70,
							'src' => get_template_directory_uri().
							'/images/mb-2cl.png'
						),
						'large' => array(
							'height' => 214,
							'src' => get_template_directory_uri().
							'/images/mb-2cl.png'
						),
					),
					'2-col-r' => array(
						'small' => array(
							'height' => 70,
							'src' => get_template_directory_uri().
							'/images/mb-2cr.png'
						),
						'large' => array(
							'height' => 214,
							'src' => get_template_directory_uri().
							'/images/mb-2cr.png'
						),
					),
				),
			),
			'top_padding' => array(
				'label' => __('Top Padding', 'namaste-lite'),
				'type' => 'slider',
				'value' => 50,
				'desc' => __('Add padding in px. Default is 50.', 'namaste-lite'),

			),
			'bottom_padding' => array(
				'label' => __('Bottom Padding', 'namaste-lite'),
				'type' => 'slider',
				'value' => 40,
				'desc' => __('Add padding in px. Default is 40.', 'namaste-lite'),

			),
		)
	)
);