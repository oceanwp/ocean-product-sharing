<?php
/**
 * Helper functions.
 *
 * @package Ocean WordPress theme
 */

/**
 * Returns social sharing template part
 */
if ( ! function_exists( 'ops_social_share_sites' ) ) {

	function ops_social_share_sites() {

		// Default socials
		$socials = array( 'twitter', 'facebook', 'pinterest', 'email' );

		// Get socials from Customizer
		$socials = get_theme_mod( 'ops_product_sharing_sites', $socials );

		// Turn into array if string
		if ( $socials && ! is_array( $socials ) ) {
			$socials = explode( ',', $socials );
		}

		// Apply filters for easy modification
		$socials = apply_filters( 'ops_product_sharing_sites_filter', $socials );

		// Return socials
		return $socials;

	}

}