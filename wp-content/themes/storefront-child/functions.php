<?php

include dirname(__FILE__) . '/inc/components/slideBanner.php';

add_action( 'wp_enqueue_scripts', 'enqueue_parent_styles' );

function enqueue_parent_styles() {
    $parent_style = 'parent-style';

    wp_enqueue_style( $parent_style, get_template_directory_uri() . '/style.css' );
    wp_enqueue_style( 'child-style', get_stylesheet_directory_uri() . '/style.css', array( $parent_style ), wp_get_theme()->get('Version'));
    wp_enqueue_style('boostrap-css', get_stylesheet_directory_uri() . '/dist/css/bootstrap.css', array($parent_style), wp_get_theme()->get('Version'));
	wp_enqueue_style('owl-css', get_stylesheet_directory_uri() . '/dist/css/owl.carousel.min.css', array($parent_style), wp_get_theme()->get('Version'));
	wp_enqueue_style('owl-theme-default', get_stylesheet_directory_uri() . '/dist/css/owl.theme.default.min.css', array($parent_style), wp_get_theme()->get('Version'));
	
    wp_enqueue_style('app-css', get_stylesheet_directory_uri() . '/dist/css/app.css', array($parent_style), wp_get_theme()->get('Version'));
	
	wp_enqueue_script( 'owl-carousel-js', get_stylesheet_directory_uri() . '/dist/js/owl.carousel.min.js', array('jquery'), wp_get_theme()->get('Version'));
	
	wp_enqueue_script( 'main-js', get_stylesheet_directory_uri() . '/dist/js/main.js', array('jquery'), wp_get_theme()->get('Version'));

}
if(!function_exists('storefront_product_by_cateogry')){
    function storefront_product_by_cateogry(){
        $args = apply_filters(
			'storefront_featured_products_args', array(
				'limit'      => 4,
				'columns'    => 4,
				'orderby'    => 'date',
				'order'      => 'desc',
				'visibility' => 'featured',
				'title'      => __( 'Custome Recommend', 'storefront' ),
			)
		);

		$shortcode_content = storefront_do_shortcode(
			'products', apply_filters(
				'storefront_featured_products_shortcode_args', array(
					'per_page'   => intval( $args['limit'] ),
					'columns'    => intval( $args['columns'] ),
					'orderby'    => esc_attr( $args['orderby'] ),
					'order'      => esc_attr( $args['order'] ),
					'visibility' => esc_attr( $args['visibility'] ),
				)
			)
		);

		/**
		 * Only display the section if the shortcode returns products
		 */
		if ( false !== strpos( $shortcode_content, 'product' ) ) {
			echo '<section class="storefront-product-section storefront-products-bycategory" aria-label="' . esc_attr__( 'Custome Products', 'storefront' ) . '">';

			do_action( 'storefront_homepage_before_featured_products' );

			echo '<h2 class="panel-header-pagehome">' . wp_kses_post( $args['title'] ) . '</h2>';

			do_action( 'storefront_homepage_after_featured_products_title' );

			echo $shortcode_content; // WPCS: XSS ok.

			do_action( 'storefront_homepage_after_featured_products' );

			echo '</section>';
		}
    }
    add_action('homepage', 'storefront_product_by_cateogry', 20);
}
function remove_action_storeFront(){
	remove_action('homepage', 'storefront_homepage_content', 10);
	remove_action('homepage', 'storefront_product_categories', 20);
    remove_action('homepage', 'storefront_best_selling_products', 70);
    
}
add_action( 'init',  'remove_action_storeFront', 10);

