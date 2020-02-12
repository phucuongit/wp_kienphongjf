<?php

include dirname(__FILE__) . '/inc/components/slideBanner.php';
include dirname(__FILE__) . '/inc/WPDocs_Walker_Nav_Menu.php';
include dirname(__FILE__) . '/inc/widgets/hotlineWidget.php';
add_action( 'wp_enqueue_scripts', 'enqueue_parent_styles' );

define('BASE_URL_CONTACT', site_url().'/lien-he', TRUE);

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
		$term = get_queried_object();
		$array_category = get_field('category', $term);
		if(isset($array_category)){
			foreach($array_category as $key => $cat_id){
				$term = get_term_by( 'id', $cat_id, 'product_cat' );
				$args = array(
					'post_type'	=> 'product',
					'posts_per_page'	=> 4,
					'order'	=> 'DESC',
					'orderby'	=> 'date', 
					'product_cat' => $term->slug,
					// 'tax_query' => array(
					// 	'taxonomy'      => 'product_cat',
					// 	'field' => 'term_id', //This is optional, as it defaults to 'term_id'
					// 	'terms'         =>  $cat_id,
					// 	// 'operator'      => 'IN' // Possible values are 'IN', 'NOT IN', 'AND'.
					// ),
				);
			
				$products = new WP_Query($args);
				
				// echo '<pre>';
				// var_dump($products);
	
					/**
					 * Only display the section if the shortcode returns products
					 */
					
					echo '<section class="storefront-product-section storefront-products-bycategory" aria-label="' . esc_attr__( 'Custome Products', 'storefront' ) . '">';
	
					do_action( 'storefront_homepage_before_featured_products' );
					if( $term ){
						echo '<h2 class="panel-header-pagehome">' . $term->name . '</h2>';
					}
					
					echo '<div class="list-products">';
					do_action( 'storefront_homepage_after_featured_products_title' );
					
					if($products->have_posts()){
						 woocommerce_product_loop_start(); 
						while($products->have_posts()) : $products->the_post();
							wc_get_template_part( 'content', 'product' );
						endwhile;
						woocommerce_product_loop_end();
					}else{
						echo __('No products found');
					}
					
	
					do_action( 'storefront_homepage_after_featured_products' );
					echo '</div>';
					echo '</section>';
					wp_reset_postdata();
			}
		}
		
    }
    add_action('homepage', 'storefront_product_by_cateogry', 20);
}
function remove_action_storeFront(){
	remove_action('homepage', 'storefront_homepage_content', 10);
	remove_action('homepage', 'storefront_product_categories', 20);
	remove_action('homepage', 'storefront_recent_products', 30);
	remove_action('homepage', 'storefront_featured_products', 40);
	remove_action('homepage', 'storefront_popular_products', 50);
	remove_action('homepage', 'storefront_on_sale_products', 60);
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
	return $tabs;
}

add_filter( 'woocommerce_product_tabs', 'woo_remove_product_tabs', 98 );

function add_inquiry_link_instead_price( $price, $product ) {
	// var_dump($product);
    if ( '' === $product->get_price() || 0 == $product->get_price() || $product->get_price()) :
		$output = '<a class="woocommerce-LoopProduct-link cta-contact" href="'.site_url().'/lien-he/"><p class="product-price">Call</p></a>';
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
function wp_corenavi_table($custom_query = null) {
      global $wp_query;
      if($custom_query) $main_query = $custom_query;
      else $main_query = $wp_query;
      $big = 999999999;
      $total = isset($main_query->max_num_pages)?$main_query->max_num_pages:'';
      if($total > 1);
      $resultPagi = '';
      $resultPagi.= '<ul class="pagination">
      					<li>';
      $resultPagi.= paginate_links( array(
				         'base'        => str_replace( $big, '%#%', esc_url( get_pagenum_link( $big ) ) ),
				         'format'   => '?paged=%#%',
				         'current'  => max( 1, get_query_var('paged') ),
				         'total'    => $total,
				         'mid_size' => '10',
				         'prev_text'    => __('«','devvn'),
				         'next_text'    => __('»','devvn'),
			        ));			    
      if($total > 1);
      $resultPagi.= '<li></ul>';
      echo $resultPagi;
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

/* REMOVE PAGE SEARCH PRODUCT */

function remove_pages_from_search() {
    global $wp_post_types;
    $wp_post_types['page']->exclude_from_search = true;
}
add_action('init', 'remove_pages_from_search');


/* REMOVE ADD TO CART SCROLL PAGE */
add_filter( 'theme_mod_storefront_product_pagination', '__return_false');
//turn off sticky add to cart
add_filter( 'theme_mod_storefront_sticky_add_to_cart', '__return_false',9999);

/**
 * Change number of related products output
 */ 
add_filter( 'woocommerce_output_related_products_args', 'jk_related_products_args', 20 );
  function jk_related_products_args( $args ) {
	$args['posts_per_page'] = 8; // 4 related products
	$args['columns'] = 4; // arranged in 2 columns
	return $args;
}

/* THIẾT LẬP THEME OPTIONS */

if( function_exists('acf_add_options_page') ) {
	acf_add_options_page(array(
		'page_title' 	=> 'Thiết lập giao diện', 
		'menu_title'	=> 'Thiết lập giao diện', 
		'menu_slug' 	=> 'theme-settings', 
		'capability'	=> 'edit_posts',
		'redirect'	=> false
	));
}

/* SỬ DỤNG STMP GMAIL */
add_action( 'phpmailer_init', function( $phpmailer ) {
    $contentText = get_field('kp_from_name_text_gmail','option');
    $userName = get_field('kp_username_gmail','option');
    $passWord = get_field('kp_password_app_gmail','option');
    if ( !is_object( $phpmailer ) )
    $phpmailer = (object) $phpmailer;
    $phpmailer->Mailer     = 'smtp';
    $phpmailer->Host       = 'smtp.gmail.com';
    $phpmailer->SMTPAuth   = 1;
    $phpmailer->Port       = 587;
    $phpmailer->Username   = ''.$userName.'';
    $phpmailer->Password   = ''.$passWord.'';
    $phpmailer->SMTPSecure = 'TLS';
    $phpmailer->From       = ''.$userName.'';
    $phpmailer->FromName   = ''.$contentText.'';
});

/* THÊM HÌNH ẢNH SẢN PHẨM VÀO FORM GỬI MAIL */
add_filter( 'woocommerce_email_order_items_args', 'iconic_email_order_items_args', 10, 1 );
function iconic_email_order_items_args( $args ) {
    $args['show_image'] = true;
    return $args;
}

/* THEME OPTIONS INFOMATION COMPANMY - ADDRESS ...*/
function createACCompany() {
	$company = get_field('kp_company','option');
	return $company;
}

function createACAddress() {
	$address = get_field('kp_address','option');
	return $address;
}

function createACEmail() {
	$email = get_field('kp_email','option');
	return $email;
}

function createACPhone() {
	$phone = get_field('kp_phone','option');
	return $phone;
}