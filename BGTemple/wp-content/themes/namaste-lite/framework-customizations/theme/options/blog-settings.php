<?php if ( ! defined( 'FW' ) ) {
	die( 'Forbidden' );
}

$options = array(
	'blog' => array(
		'title' => __('Blog', 'namaste-lite'),
		'type' => 'tab',
		'options' => array(
			'blog_basic_layer_select' => array(
				'label' => __('Default Blog Layout', 'namaste-lite'),
				'type' => 'image-picker',
				'value' => '',
				'desc' => __('Select the layout for your blog loops.', 'namaste-lite'),
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
			'allow_post_info' => array(
				'type' => 'multi-picker',
				'label' => false,
				'desc' => false,
				'picker' => array(
					'on_off' => array(
						'label' => __('Post Infos', 'namaste-lite'),
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
						'desc' => __('Display infos about the posts.', 'namaste-lite'),
					)
				),
				'choices' => array(
					'on' => array(
						'allow_infos_for' => array(
							'type'  => 'checkboxes',
							'value' => array(
								'blog' => true,
								'post' => true,
							),
							'label' => __('Allow for post types', 'namaste-lite'),
							'desc'  => __('Uncheck to disable for any type', 'namaste-lite'),
							'choices' => array(
								'blog' => __('Blog', 'namaste-lite'),
								'post' => __('Post', 'namaste-lite'),
							),
							'inline' => false,
						),
						'infos' => array(
							'type'  => 'checkboxes',
							'value' => array(
								'date' => true,
								'author' => true,
								'categories' => true,
								'comments' => true,
								'tags' => true,
							),
							'label' => __('Info Types', 'namaste-lite'),
							'desc'  => __('Select the info types for Single Posts.', 'namaste-lite'),
							'choices' => array(
								'date' => __('Date', 'namaste-lite'),
								'author' => __('Author', 'namaste-lite'),
								'categories' => __('Categories', 'namaste-lite'),
								'comments' => __('Comments', 'namaste-lite'),
								'tags' => __('Tags', 'namaste-lite'),
							),
							'inline' => true,
						),
					),

				),
				'show_borders' => false,
			),
		)
	)
);