<?php
/**
 * Single Product tabs
 *
 * This template can be overridden by copying it to yourtheme/woocommerce/single-product/tabs/tabs.php.
 *
 * HOWEVER, on occasion WooCommerce will need to update template files and you
 * (the theme developer) will need to copy the new files to your theme to
 * maintain compatibility. We try to do this as little as possible, but it does
 * happen. When this occurs the version of the template file will be bumped and
 * the readme will list any important changes.
 *
 * @see     https://docs.woocommerce.com/document/template-structure/
 * @package WooCommerce/Templates
 * @version 3.8.0
 */

if ( ! defined( 'ABSPATH' ) ) {
	exit;
}

/**
 * Filter tabs and allow third parties to add their own.
 *
 * Each tab is an array containing title, callback and priority.
 *
 * @see woocommerce_default_product_tabs()
 */
$product_tabs = apply_filters( 'woocommerce_product_tabs', array() );
global $wp;
if ( ! empty( $product_tabs ) ) : ?>
	<session class="product-description">
		<h3 class="product-description__headline">Information product</h3>
		<div class="product-description__desciption">
			<?php foreach($product_tabs as $key => $product_tab):
						call_user_func( $product_tab['callback'], $key, $product_tab );
				endforeach;
				?>
				<div class="fb-comments" data-href="<?php echo home_url( $wp->request )?>" data-width="100%" data-numposts="5"></div>
		</div>
	</session>
	<div id="fb-root"></div>
	<script async defer crossorigin="anonymous" src="https://connect.facebook.net/vi_VN/sdk.js#xfbml=1&version=v6.0&appId=2498173957125589&autoLogAppEvents=1"></script>
<?php endif; ?>
