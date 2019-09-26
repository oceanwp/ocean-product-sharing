/**
 * Customizer enhancements for a better user experience.
 *
 * Contains handlers to make Theme Customizer preview reload changes asynchronously.
 */

( function( $ ) {
	wp.customize( 'ops_product_sharing_borders_color', function( value ) {
		value.bind( function( to ) {
			$( '.oew-product-share,.oew-product-share ul li' ).css( 'border-color', to );
		} );
	} );
	wp.customize( 'ops_product_sharing_icons_bg', function( value ) {
		value.bind( function( to ) {
			$( '.oew-product-share ul li a .ops-icon-wrap' ).css( 'background-color', to );
		} );
	} );
	wp.customize( 'ops_product_sharing_icons_color', function( value ) {
		value.bind( function( to ) {
			$( '.oew-product-share ul li a .ops-icon-wrap .ops-icon' ).css( 'color', to );
		} );
	} );
} )( jQuery );
