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
	'ocean_product_sharing_settings' => [
		'title' => __( 'Product Sharing', 'ocean-product-sharing' ),
		'priority' => 13,
		'options' => [
			'ops_top_quick_links' => [
				'type' => 'ocean-links',
				'label' => 'Quick Menu',
				'section' => 'ocean_product_sharing_settings',
				'transport' => 'postMessage',
				'priority' => 10,
				'class' => 'top-quick-links',
				'linkIcon' => 'link-2',
				'titleIcon' => 'three-dot-menu',
				'active_callback' => 'ocean_is_oe_active',
				'links' => [
					'website_layout' => [
						'label' => esc_html__('Website Layout', 'ocean-product-sharing'),
						'url' => '#'
					],
					'scroll_top' => [
						'label' => esc_html__('Scroll To Top', 'ocean-product-sharing'),
						'url' => '#'
					],
					'pagination' => [
						'label' => esc_html__('Pagination', 'ocean-product-sharing'),
						'url' => '#'
					]
				]
			],

			'ops_divider_after_top_quick_links' => [
				'type' => 'ocean-divider',
				'section' => 'ocean_product_sharing_settings',
				'transport' => 'postMessage',
				'priority' => 10,
				'top' => 10,
				'bottom' => 10
			],

            'ops_product_sharing_sites' => [
				'label' => esc_html__( 'Sharing Buttons', 'ocean-product-sharing' ),
				'type' => 'ocean-sortable',
				'section'  => 'ocean_product_sharing_settings',
				'transport' => 'refresh',
				'priority' => 10,
				'default'  => ['twitter', 'facebook', 'pinterest', 'email'],
				'hideLabel' => false,
				'choices' => [
					'twitter'   => 'Twitter',
                    'facebook'  => 'Facebook',
                    'pinterest' => 'Pinterest',
                    'email'     => 'Mail',
				]
			],

			'ops_divider_after_product_share_sites' => [
				'type' => 'ocean-divider',
				'section' => 'ocean_product_sharing_settings',
				'transport' => 'postMessage',
				'priority' => 10,
				'top' => 1,
				'bottom' => 1
			],

            'ops_product_sharing_borders_color' => [
				'type' => 'ocean-color',
				'label' => esc_html__( 'Borders Color', 'ocean-product-sharing' ),
				'section' => 'ocean_product_sharing_settings',
				'transport' => 'postMessage',
				'priority' => 10,
				'hideLabel' => false,
				'showAlpha' => true,
				'showPalette' => true,
				'setting_args' => [
					'normal' => [
						'id' => 'ops_product_sharing_borders_color',
						'key' => 'normal',
						'label' => esc_html__( 'Select Color', 'ocean-product-sharing' ),
						'selector' => [
							'.oew-product-share,.oew-product-share ul li' => 'border-color'
						],
						'attr' => [
							'transport' => 'postMessage',
                            'default'   => '#e9e9e9',
						],
					]
				]
			],

            'ops_product_sharing_icons_bg' => [
				'type' => 'ocean-color',
				'label' => esc_html__( 'Icons Background Color', 'ocean-product-sharing' ),
				'section' => 'ocean_product_sharing_settings',
				'transport' => 'postMessage',
				'priority' => 10,
				'hideLabel' => false,
				'showAlpha' => true,
				'showPalette' => true,
				'setting_args' => [
					'normal' => [
						'id' => 'ops_product_sharing_icons_bg',
						'key' => 'normal',
						'label' => esc_html__( 'Select Color', 'ocean-product-sharing' ),
						'selector' => [
							'.oew-product-share ul li a .ops-icon-wrap' => 'background-color'
						],
						'attr' => [
							'transport' => 'postMessage',
                            'default'   => '#333333',
						],
					]
				]
			],

            'ops_product_sharing_icons_color' => [
				'type' => 'ocean-color',
				'label' => esc_html__( 'Icons Color', 'ocean-product-sharing' ),
				'section' => 'ocean_product_sharing_settings',
				'transport' => 'postMessage',
				'priority' => 10,
				'hideLabel' => false,
				'showAlpha' => true,
				'showPalette' => true,
				'setting_args' => [
					'normal' => [
						'id' => 'ops_product_sharing_icons_color',
						'key' => 'normal',
						'label' => esc_html__( 'Select Color', 'ocean-product-sharing' ),
						'selector' => [
							'.oew-product-share ul li a .ops-icon-wrap .ops-icon' => 'fill'
						],
						'attr' => [
							'transport' => 'postMessage',
                            'default'   => '#ffffff',
						],
					]
				]
            ],
        ]
    ]
];
