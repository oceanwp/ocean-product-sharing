<?php
/**
 * Social Share Buttons Output
 *
 * @package Ocean WordPress theme
 */

// Exit if accessed directly
if ( ! defined( 'ABSPATH' ) ) {
	exit;
}

// Get sharing sites
$sites = ops_social_share_sites();

// Return if there aren't any sites enabled
if ( empty( $sites ) ) {
	return;
}

// Vars
$product_title = get_the_title();
$product_url   = get_permalink();
$product_img   = wp_get_attachment_url( get_post_thumbnail_id() ); ?>

<div class="oew-product-share clr">

	<ul class="ocean-social-share clr" aria-label="<?php echo esc_attr__( 'Share this product on social media', 'ocean-product-sharing' ); ?>">

		<?php
		// Loop through sites
		foreach ( $sites as $site ) :

			// Twitter
			if ( 'twitter' == $site ) {
				?>

				<li class="twitter">
					<a aria-label="<?php esc_attr_e( 'Share this product on X', 'ocean-product-sharing' ); ?>" class="twitter-share-button" href="https://twitter.com/intent/tweet?text=<?php echo html_entity_decode( wp_strip_all_tags( $product_title ) ); ?>+<?php echo esc_url( $product_url ); ?>" onclick="ops_onClick( this.href );return false;">
						<span class="screen-reader-text"><?php echo esc_attr__( 'Opens in a new window', 'ocean-product-sharing' ); ?></span>
						<span class="ops-icon-wrap">
							<svg class="ops-icon" role="img" viewBox="0 0 512 512" xmlns="http://www.w3.org/2000/svg" aria-hidden="true" focusable="false">
								<path d="M389.2 48h70.6L305.6 224.2 487 464H345L233.7 318.6 106.5 464H35.8L200.7 275.5 26.8 48H172.4L272.9 180.9 389.2 48zM364.4 421.8h39.1L151.1 88h-42L364.4 421.8z"/>
							</svg>
						</span>
						<div class="product-share-text" aria-hidden="true"><?php esc_html_e( 'Tweet This Product', 'ocean-product-sharing' ); ?></div>
					</a>
				</li>

				<?php
			}
			// Facebook
			if ( 'facebook' == $site ) {
				?>

				<li class="facebook">
					<a href="https://www.facebook.com/sharer.php?u=<?php echo rawurlencode( esc_url( $product_url ) ); ?>" target="_blank" aria-label="<?php esc_attr_e( 'Share on Facebook', 'ocean-product-sharing' ); ?>" onclick="ops_onClick( this.href );return false;">
						<span class="screen-reader-text"><?php echo esc_attr__( 'Opens in a new window', 'ocean-product-sharing' ); ?></span>
						<span class="ops-icon-wrap">
							<svg class="ops-icon" role="img" viewBox="0 0 512 512" xmlns="http://www.w3.org/2000/svg" aria-hidden="true" focusable="false">
								<path d="M504 256C504 119 393 8 256 8S8 119 8 256c0 123.78 90.69 226.38 209.25 245V327.69h-63V256h63v-54.64c0-62.15
								37-96.48 93.67-96.48 27.14 0 55.52 4.84 55.52 4.84v61h-31.28c-30.8 0-40.41 19.12-40.41 38.73V256h68.78l-11
								71.69h-57.78V501C413.31 482.38 504 379.78 504 256z"/>
							</svg>
						</span>
						<div class="product-share-text" aria-hidden="true"><?php esc_html_e( 'Share on Facebook', 'ocean-product-sharing' ); ?></div>
					</a>
				</li>

				<?php
			}
			// Pinterest
			if ( 'pinterest' == $site ) {
				?>

				<li class="pinterest">
					<a href="https://www.pinterest.com/pin/create/button/?url=<?php echo rawurlencode( esc_url( $product_url ) ); ?>&amp;media=<?php echo wp_get_attachment_url( get_post_thumbnail_id() ); ?>&amp;description=<?php echo rawurlencode( wp_strip_all_tags( $product_title ) ); ?>" target="_blank" aria-label="<?php esc_attr_e( 'Share on Pinterest', 'ocean-product-sharing' ); ?>" onclick="ops_onClick( this.href );return false;">
						<span class="screen-reader-text"><?php echo esc_attr__( 'Opens in a new window', 'ocean-product-sharing' ); ?></span>
						<span class="ops-icon-wrap">
							<svg class="ops-icon" role="img" viewBox="0 0 496 512" xmlns="http://www.w3.org/2000/svg" aria-hidden="true" focusable="false">
								<path d="M496 256c0 137-111 248-248 248-25.6 0-50.2-3.9-73.4-11.1 10.1-16.5 25.2-43.5 30.8-65 3-11.6 15.4-59 15.4-59
								8.1 15.4 31.7 28.5 56.8 28.5 74.8 0 128.7-68.8 128.7-154.3 0-81.9-66.9-143.2-152.9-143.2-107 0-163.9 71.8-163.9
								150.1 0 36.4 19.4 81.7 50.3 96.1 4.7 2.2 7.2 1.2 8.3-3.3.8-3.4 5-20.3 6.9-28.1.6-2.5.3-4.7-1.7-7.1-10.1-12.5-18.3-35.3-18.3-56.6
								0-54.7 41.4-107.6 112-107.6 60.9 0 103.6 41.5 103.6 100.9 0 67.1-33.9 113.6-78 113.6-24.3 0-42.6-20.1-36.7-44.8
								7-29.5 20.5-61.3 20.5-82.6 0-19-10.2-34.9-31.4-34.9-24.9 0-44.9 25.7-44.9 60.2 0 22 7.4 36.8 7.4 36.8s-24.5 103.8-29
								123.2c-5 21.4-3 51.6-.9 71.2C65.4 450.9 0 361.1 0 256 0 119 111 8 248 8s248 111 248 248z"/>
							</svg>
						</span>
						<div class="product-share-text" aria-hidden="true"><?php esc_html_e( 'Pin This Product', 'ocean-product-sharing' ); ?></div>
					</a>
				</li>

				<?php
			}
			// Mail
			if ( 'email' == $site ) {
				?>

				<li class="email">
					<a href="mailto:?subject=<?php echo html_entity_decode( wp_strip_all_tags( $product_title ) ); ?>&amp;body=<?php echo esc_url( $product_url ); ?>" target="_blank" aria-label="<?php esc_attr_e( 'Share via email', 'ocean-product-sharing' ); ?>" onclick="ops_onClick( this.href );return false;">
						<span class="screen-reader-text"><?php echo esc_attr__( 'Opens in a new window', 'ocean-product-sharing' ); ?></span>
						<span class="ops-icon-wrap">
							<svg class="ops-icon" role="img" viewBox="0 0 512 512" xmlns="http://www.w3.org/2000/svg" aria-hidden="true" focusable="false">
								<path d="M48 64C21.5 64 0 85.5 0 112c0 15.1 7.1 29.3 19.2 38.4L236.8 313.6c11.4 8.5 27 8.5 38.4 0L492.8 150.4c12.1-9.1 19.2-23.3
								19.2-38.4c0-26.5-21.5-48-48-48H48zM0 176V384c0 35.3 28.7 64 64 64H448c35.3 0 64-28.7 64-64V176L294.4 339.2c-22.8 17.1-54 17.1-76.8 0L0 176z"/>
							</svg>
						</span>
						<div class="product-share-text" aria-hidden="true"><?php esc_html_e( 'Mail This Product', 'ocean-product-sharing' ); ?></div>
					</a>
				</li>

			<?php } ?>

		<?php endforeach; ?>

	</ul>

</div><!-- .entry-share -->
