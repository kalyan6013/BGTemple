<?php if ( ! defined( 'FW' ) ) {
	die( 'Forbidden' );
}

$options = array(
	'general' => array(
		'title'   => __( 'Post Options', 'namaste-lite' ),
		'type'    => 'box',
		'options' => array(	
			'gallery_format'	=> array(
				'label' => __( 'Gallery Images (Gallery Format Only)', 'namaste-lite' ),
				'type'  => 'multi-upload',
				'images_only' => true,		
			),
			'quote_format'	=> array(
				'label' => __( 'Quote (Quote Format Only)', 'namaste-lite' ),
				'type'  => 'textarea',
				'value' => '',
			),	
			'quote_format_author'	=> array(
				'label' => __( 'Quote Author (Quote Format Only)', 'namaste-lite' ),
				'type'  => 'text',
				'value' => '',
			),	
			'link_format'	=> array(
				'label' => __( 'Link (Link  Format Only)', 'namaste-lite' ),
				'type'  => 'text',
				'value' => '',
				'desc'  => __( 'Add Your link', 'namaste-lite' ),
			),	
			'video_format'	=> array(
				'label' => __( 'Video (Video Format Only)', 'namaste-lite' ),
				'type'  => 'textarea',
				'value' => '',
				'desc'  => __( 'Add Your videos iframe code.', 'namaste-lite' ),
			),
			'audio_format'	=> array(
				'label' => __( 'Audio (Audio Format Only)', 'namaste-lite' ),
				'type'  => 'textarea',
				'value' => '',
				'desc'  => __( 'Add Your audios iframe code.', 'namaste-lite' ),
			),
			'post_nav'	=> array(
				'label'        => __( 'Post Navigation', 'namaste-lite' ),
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
				'desc'         => __( 'Yes or no.', 'namaste-lite' ),				
			),
			'basic_post_layer_select'	=> array(
				'label'   => __( 'Layout', 'namaste-lite' ),
				'type'    => 'image-picker',
				'value'   => '',
				'desc'    => __( 'Select the layout for the post.', 'namaste-lite' ),
				'choices' => array(
					'default' => array(
						'small' => array(
							'height' => 70,
							'src'    => get_template_directory_uri() . '/images/mb-default.png'
						),
						'large' => array(
							'height' => 214,
							'src'    => get_template_directory_uri() . '/images/mb-default.png'
						),
					),
					'1-col' => array(
						'small' => array(
							'height' => 70,
							'src'    => get_template_directory_uri() . '/images/mb-1c.png'
						),
						'large' => array(
							'height' => 214,
							'src'    => get_template_directory_uri() . '/images/mb-1c.png'
						),
					),
					'2-col-l' => array(
						'small' => array(
							'height' => 70,
							'src'    => get_template_directory_uri() . '/images/mb-2cl.png'
						),
						'large' => array(
							'height' => 214,
							'src'    => get_template_directory_uri() . '/images/mb-2cl.png'
						),
					),
					'2-col-r' => array(
						'small' => array(
							'height' => 70,
							'src'    => get_template_directory_uri() . '/images/mb-2cr.png'
						),
						'large' => array(
							'height' => 214,
							'src'    => get_template_directory_uri() . '/images/mb-2cr.png'
						),
					),
				),
			),	
		),
	),		
);