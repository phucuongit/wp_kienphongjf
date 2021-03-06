<?php
/**
 * The template for displaying the homepage.
 *
 * This page template will display any functions hooked into the `homepage` action.
 * By default this includes a variety of product displays and the page content itself. To change the order or toggle these components
 * use the Homepage Control plugin.
 * https://wordpress.org/plugins/homepage-control/
 *
 * Template name: Homepage
 *
 * @package storefront
 */

get_header(); ?>
<div class="container row">
	<section class="col-12 banner--slide">
		
		<?php 
		/**
		 * @include inc/slideBanner.php
		 * @hook create_slider 10
		 */
		do_action('homeSlide') ?>
	</section>

	<div class="col-lg-9 col-md-12">
		
		<div id="primary" class="content-area">
			<main id="main" class="site-main" role="main">

				<?php
				/**
				 * Functions hooked in to homepage action
				 *
				 * @hooked storefront_homepage_content      - 10
				 * @hooked storefront_product_categories    - 20
				 * @hooked storefront_recent_products       - 30
				 * @hooked storefront_featured_products     - 40
				 * @hooked storefront_popular_products      - 50
				 * @hooked storefront_on_sale_products      - 60
				 * @hooked storefront_best_selling_products - 70
				 */
				do_action( 'homepage' );
				?>
			</main><!-- #main -->
		</div><!-- #primary -->
	</div>
	<div class="col-lg-3 col-md-12">
		<?php get_sidebar(); ?>
	</div>
</div>
<?php
get_footer();
