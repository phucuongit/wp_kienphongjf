<?php

include dirname(__FILE__) . '/inc/components/slideBanner.php';
include dirname(__FILE__) . '/inc/WPDocs_Walker_Nav_Menu.php';
include dirname(__FILE__) . '/inc/widgets/hotlineWidget.php';
add_action( 'wp_enqueue_scripts', 'enqueue_parent_styles' );

function enqueue_parent_styles() {
    $parent_style = 'parent-style';

    wp_enqueue_style( $parent_style, get_template_directory_uri() . '/style.css' );
    wp_enqueue_style( 'child-style', get_stylesheet_directory_uri() . '/style.css', array( $parent_style ), wp_get_theme()->get('Version'));
    wp_enqueue_style('boostrap-css', get_stylesheet_directory_uri() . '/dist/css/bootstrap.css', array($parent_style), wp_get_theme()->get('Version'));
	wp_enqueue_style('owl-css', get_stylesheet_directory_uri() . '/dist/css/owl.carousel.min.css', array($parent_style), wp_get_theme()->get('Version'));
	wp_enqueue_style('owl-theme-default', get_stylesheet_directory_uri() . '/dist/css/owl.theme.default.min.css', array($parent_style), wp_get_theme()->get('Version'));
	
    wp_enqueue_style('app-css', get_stylesheet_directory_uri() . '/dist/css/app.css', array($parent_style), wp_get_theme()->get('Version'));
	
	wp_enqueue_script( 'boostrap-js', get_stylesheet_directory_uri() . '/dist/js/bootstrap.min.js', array('jquery'), wp_get_theme()->get('Version'));
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
	remove_action( 'woocommerce_single_product_summary', 'woocommerce_template_single_title', 5 );
	remove_action( 'woocommerce_single_product_summary', 'woocommerce_template_single_add_to_cart', 30 );
	remove_action('woocommerce_after_shop_loop_item', 'woocommerce_template_loop_add_to_cart', 10);
	
	// change priority of hook woocommerce_template_single_price
	// remove_action('woocommerce_single_product_summary', 'woocommerce_template_single_price', 10);
	// add_action('woocommerce_single_product_summary', 'woocommerce_template_single_price', 60);

}
add_action( 'init',  'remove_action_storeFront', 10);

// Disable product review (tab)
function woo_remove_product_tabs($tabs) {
unset($tabs['reviews']); 					// Remove Reviews tab
	echo 'test';
	return $tabs;
}

add_filter( 'woocommerce_product_tabs', 'woo_remove_product_tabs', 98 );

function add_inquiry_link_instead_price( $price, $product ) {
	// var_dump($product);
    if ( '' === $product->get_price() || 0 == $product->get_price() || $product->get_price()) :
		$output = '<a class="woocommerce-LoopProduct-link" href="'.site_url().'/lien-he/"><span class="price--button">Call</span></a>';
		if(!is_product()) $output .= '<a href="product/'.$product->get_slug().'" class="view-more" title="">Details</a>';
		return $output;
    endif;
}
add_filter( 'woocommerce_get_price_html', 'add_inquiry_link_instead_price', 100, 2 );

function teaser($limit) {
	$excerpt = explode(' ', get_the_excerpt(), $limit);
	if (count($excerpt)>=$limit) {
		array_pop($excerpt);
		$excerpt = implode(" ",$excerpt).'[...]';
	} else {
		$excerpt = implode(" ",$excerpt);
	}
	$excerpt = preg_replace('`\[[^\]]*\]`','',$excerpt);
	if ($limit > 200) {
		$excerpt.= '...';
	}
	return $excerpt;
}

//Code phan trang
function devvn_wp_corenavi($custom_query = null, $paged = null) {
    global $wp_query;
    if($custom_query) $main_query = $custom_query;
    else $main_query = $wp_query;
    $paged = ($paged) ? $paged : get_query_var('paged');
    $big = 999999999;
    $total = isset($main_query->max_num_pages)?$main_query->max_num_pages:'';
    if($total > 1) echo '<div class="pagenavi">';
    echo paginate_links( array(
        'base' => str_replace( $big, '%#%', esc_url( get_pagenum_link( $big ) ) ),
        'format' => '?paged=%#%',
        'current' => max( 1, $paged ),
        'total' => $total,
        'mid_size' => '10', // Số trang hiển thị khi có nhiều trang trước khi hiển thị ...
        'prev_text'    => __('Prev','devvn'),
        'next_text'    => __('Next','devvn'),
    ) );
    if($total > 1) echo '</div>';
}


/*Lấy thumbnail category*/
add_action( 'woocommerce_archive_description', 'woocommerce_category_image', 2 );
function woocommerce_category_image() {
    if ( is_product_category() ){
      global $wp_query;
      $cat = $wp_query->get_queried_object();
      $thumbnail_id = get_woocommerce_term_meta( $cat->term_id, 'thumbnail_id', true );
      $image = wp_get_attachment_url( $thumbnail_id );
      if ( $image ) {
        echo '<img src="' . $image . '" alt="' . $cat->name . '" width="900" />';
    }
  }
}
/** REGISTER SIDEBAR */
add_action( 'widgets_init', 'registerSidebar' );
function registerSidebar(){
	register_sidebar(
		array(
		'id'	=> 'sidebar_left',
		'name'	=> __('Left Sidebar'),
		'description'   => __( 'A short description of the left sidebar.' ),
		'before_widget' => '<div id="%1$s" class="widget %2$s">',
		'after_widget'  => '</div>',
		'before_title'  => '<h3 class="widget-title panel-header">',
		'after_title'   => '</h3>',
	));
}

/* THUMNAIL CATGORY */
function showThumnail($width, $height) { 
	$result = '';
	$thumbnail = wp_get_attachment_url(get_post_thumbnail_id(get_the_ID()));
	if ($thumbnail) {
		$result.= '<img width="'.$width.'" height="'.$height.'" src="'.$thumbnail.'" alt="'.get_the_title().'">';
	} else {
		$result.= '<img width="'.$width.'" height="'.$height.'"src="'.get_stylesheet_directory_uri().'/images/no-thumb.jpg" alt="'.get_the_title().'">';
	}
	return $result;
		                            		
}