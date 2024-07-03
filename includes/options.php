<?php
/**
 * OceanWP Customizer Class
 *
 * @package OceanWP WordPress theme
 */

if ( ! defined( 'ABSPATH' ) ) {
	exit;
}

/**
 * Customizer Options
 */
function ops_customizer_options() {

	$options = [
		'title' => __( 'Product Sharing', 'ocean-product-sharing' ),
		'priority' => 16,
		'options' => [
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
				'sanitize_callback' => 'wp_kses_post',
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
				'sanitize_callback' => 'wp_kses_post',
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
				'sanitize_callback' => 'wp_kses_post',
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

			'ops_divider_for_need_help_link' => [
				'type' => 'ocean-divider',
				'section' => 'ocean_product_sharing_settings',
				'transport' => 'postMessage',
				'priority' => 10,
			],

			'ops_need_help_link' => [
				'type' => 'ocean-content',
				'isContent' => sprintf( esc_html__( '%1$s Need Help? %2$s', 'oceanwp' ), '<a href="http://docs.oceanwp.org/category/369-shortcodes" target="_blank">', '</a>' ),
				'class' => 'need-help',
				'section' => 'ocean_product_sharing_settings',
				'transport' => 'postMessage',
				'priority' => 10,
			]
		]
	];

	return apply_filters( 'ops_customizer_options', $options );

}
