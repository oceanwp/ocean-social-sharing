<?php
/**
 * OceanWP Customizer Class
 *
 * @package OceanWP WordPress theme
 */

if ( ! defined( 'ABSPATH' ) ) {
	exit;
}

$options = [
	'ocean_social_sharing_settings' => [
		'title' => __( 'Social Sharing', 'ocean-social-sharing' ),
		'priority' => 13,
		'options' => [
			'oss_top_quick_links' => [
				'type' => 'ocean-links',
				'label' => esc_html__( 'Quick Menu', 'ocean-social-sharing' ),
				'section' => 'ocean_social_sharing_settings',
				'transport' => 'postMessage',
				'priority' => 10,
				'class' => 'top-quick-links',
				'linkIcon' => 'link-2',
				'titleIcon' => 'three-dot-menu',
				'active_callback' => 'ocean_is_oe_active',
				'links' => [
					'website_layout' => [
						'label' => esc_html__('Website Layout', 'ocean-social-sharing'),
						'url' => '#'
					],
					'scroll_top' => [
						'label' => esc_html__('Scroll To Top', 'ocean-social-sharing'),
						'url' => '#'
					],
					'pagination' => [
						'label' => esc_html__('Pagination', 'ocean-social-sharing'),
						'url' => '#'
					]
				]
			],

			'oss_divider_after_top_quick_links' => [
				'type' => 'ocean-divider',
				'section' => 'ocean_social_sharing_settings',
				'transport' => 'postMessage',
				'priority' => 10,
				'top' => 10,
				'bottom' => 10
			],

			'oss_social_share_sites' => [
				'label' => esc_html__( 'Sharing Buttons', 'ocean-social-sharing' ),
				'type' => 'ocean-sortable',
				'section'  => 'ocean_social_sharing_settings',
				'transport' => 'refresh',
				'priority' => 10,
				'default'  => ['twitter', 'facebook', 'pinterest', 'linkedin', 'viber', 'vk', 'reddit', 'tumblr', 'viadeo', 'whatsapp'],
				'hideLabel' => false,
				'choices' => [
					'twitter'     => 'Twitter',
					'facebook'    => 'Facebook',
					'pinterest'   => 'Pinterest',
					'linkedin'    => 'LinkedIn',
					'viber'       => 'Viber',
					'vk'          => 'VK',
					'reddit'      => 'Reddit',
					'tumblr'      => 'Tumblr',
					'viadeo'      => 'Viadeo',
					'whatsapp'    => 'WhatsApp',
				]
			],

			'oss_divider_after_social_share_sites' => [
				'type' => 'ocean-divider',
				'section' => 'ocean_social_sharing_settings',
				'transport' => 'postMessage',
				'priority' => 10,
				'top' => 1,
				'bottom' => 1
			],

			'oss_social_share_position' => [
				'type' => 'ocean-select',
				'label' => esc_html__('Position', 'ocean-social-sharing' ),
				'section' => 'ocean_social_sharing_settings',
				'transport' => 'refresh',
				'default' => 'after',
				'priority' => 10,
				'hideLabel' => false,
				'multiple' => false,
				'choices' => [
					'before' => esc_html__('Before the Content', 'ocean-social-sharing'),
					'after'  => esc_html__('After the Content', 'ocean-social-sharing'),
					'both'   => esc_html__('Before & After the Content', 'ocean-social-sharing'),
					'none'   => esc_html__('No Buttons in the Content', 'ocean-social-sharing'),
				]
			],

			'oss_social_share_name' => [
				'type' => 'ocean-switch',
				'label' => esc_html__('Add Social Name', 'ocean-social-sharing'),
				'section' => 'ocean_social_sharing_settings',
				'default'  => false,
				'transport' => 'postMessage',
				'priority' => 10,
				'hideLabel' => false,
			],

			'oss_social_share_heading' => [
				'label'    => esc_html__( 'Sharing Heading', 'ocean-social-sharing' ),
				'type'     => 'ocean-text',
				'section'  => 'ocean_social_sharing_settings',
				'transport' => 'postMessage',
				'default'   => esc_html__('Please Share This', 'ocean-social-sharing'),
				'priority' => 10,
				'hideLabel' => false,
				'sanitize_callback' => 'wp_kses_post'
			],

			'oss_social_share_heading_position' => [
				'id' => 'oss_social_share_heading_position',
				'type' => 'ocean-buttons',
				'label' => esc_html__('Heading Position', 'ocean-social-sharing'),
				'section' => 'ocean_social_sharing_settings',
				'default'  => 'side',
				'transport' => 'postMessage',
				'priority' => 10,
				'hideLabel' => false,
				'wrap'    => false,
				'choices' => [
					'side'  => [
						'id'     => 'side',
						'label'   => esc_html__('Side', 'ocean-social-sharing'),
						'content' => esc_html__('Side', 'ocean-social-sharing'),
					],
					'top'  => [
						'id'     => 'top',
						'label'   => esc_html__('Top', 'ocean-social-sharing'),
						'content' => esc_html__('Top', 'ocean-social-sharing'),
					]
				]
			],

			'oss_social_share_twitter_handle' => [
				'label'    => esc_html__( 'Twitter Username', 'ocean-social-sharing' ),
				'type'     => 'ocean-text',
				'section'  => 'ocean_social_sharing_settings',
				'transport' => 'postMessage',
				'default'   => '',
				'priority' => 10,
				'hideLabel' => false,
				'sanitize_callback' => 'wp_filter_nohtml_kses'
			],

			'oss_social_share_style' => [
				'type' => 'ocean-select',
				'label' => esc_html__('Style', 'ocean-social-sharing' ),
				'section' => 'ocean_social_sharing_settings',
				'transport' => 'postMessage',
				'default' => 'minimal',
				'priority' => 10,
				'hideLabel' => false,
				'multiple' => false,
				'choices' => [
					'minimal' => esc_html__('Minimal', 'ocean-social-sharing'),
					'colored' => esc_html__('Colored', 'ocean-social-sharing'),
					'dark'    => esc_html__('Dark', 'ocean-social-sharing'),
				]
			],

			'oss_divider_after_social_share_style_setting' => [
				'type' => 'ocean-divider',
				'section' => 'ocean_social_sharing_settings',
				'transport' => 'postMessage',
				'priority' => 10,
				'top' => 10,
				'bottom' => 10
			],

			'oss_social_share_style_border_radius' => [
				'id'      => 'oss_social_share_style_border_radius',
				'label'    => esc_html__( 'Border Radius', 'ocean-social-sharing' ),
				'type'     => 'ocean-range-slider',
				'section'  => 'ocean_social_sharing_settings',
				'transport' => 'postMessage',
				'priority' => 10,
				'hideLabel'    => false,
				'isUnit'       => true,
				'isResponsive' => false,
				'min'          => 1,
				'max'          => 100,
				'step'         => 1,
				'setting_args' => [
					'desktop' => [
						'id' => 'oss_social_share_style_border_radius',
						'label' => esc_html__( 'Desktop', 'ocean-social-sharing' ),
						'attr' => [
							'transport' => 'postMessage',
						],
					],
					'unit' => [
						'id' => 'oss_social_share_style_border_radius_unit',
						'label' => esc_html__( 'Unit', 'ocean-social-sharing' ),
						'attr' => [
							'transport' => 'postMessage',
							'default' => 'px',
						],
					],
				],
				'preview' => 'queryWithType',
				'css' => [
					'.entry-share ul li a' => ['border-radius']
				]
			],

			'oss_divider_after_style_border_radius_setting' => [
				'type' => 'ocean-divider',
				'section' => 'ocean_social_sharing_settings',
				'transport' => 'postMessage',
				'priority' => 10,
				'top' => 1,
				'bottom' => 10
			],

			'oss_sharing_borders_color' => [
				'type' => 'ocean-color',
				'label' => esc_html__( 'Minimal Style Borders', 'ocean-social-sharing' ),
				'section' => 'ocean_social_sharing_settings',
				'transport' => 'postMessage',
				'priority' => 10,
				'hideLabel' => false,
				'showAlpha' => true,
				'showPalette' => true,
				'setting_args' => [
					'normal' => [
						'id' => 'oss_sharing_borders_color',
						'key' => 'normal',
						'label' => esc_html__( 'Select Color', 'ocean-social-sharing' ),
						'selector' => [
							'.entry-share.minimal ul li a' => 'border-color'
						],
						'attr' => [
							'transport' => 'postMessage',
						],
					]
				]
			],

			'oss_sharing_icons_bg' => [
				'type' => 'ocean-color',
				'label' => esc_html__( 'Minimal Style Background', 'ocean-social-sharing' ),
				'section' => 'ocean_social_sharing_settings',
				'transport' => 'postMessage',
				'priority' => 10,
				'hideLabel' => false,
				'showAlpha' => true,
				'showPalette' => true,
				'setting_args' => [
					'normal' => [
						'id' => 'oss_sharing_icons_bg',
						'key' => 'normal',
						'label' => esc_html__( 'Select Color', 'ocean-social-sharing' ),
						'selector' => [
							'.entry-share.minimal ul li a' => 'background-color'
						],
						'attr' => [
							'transport' => 'postMessage',
						],
					]
				]
			],

			'oss_sharing_icons_color' => [
				'type' => 'ocean-color',
				'label' => esc_html__( 'Minimal Style Color', 'ocean-social-sharing' ),
				'section' => 'ocean_social_sharing_settings',
				'transport' => 'postMessage',
				'priority' => 10,
				'hideLabel' => false,
				'showAlpha' => true,
				'showPalette' => true,
				'setting_args' => [
					'normal' => [
						'id' => 'oss_sharing_icons_color',
						'key' => 'normal',
						'label' => esc_html__( 'Select Color', 'ocean-social-sharing' ),
						'selector' => [
							'.entry-share.minimal ul li a' => 'color',
							'.entry-share.minimal ul li a .oss-icon' => 'fill'
						],
						'attr' => [
							'transport' => 'postMessage',
						],
					]
				]
			],
		]
	]
];
