<?php

/**
 * The template for displaying search results pages.
 *
 * @package storefront
 */
?>
<?php get_header(); ?>
<div class="container row">
	<div class="search-product col-lg-9 col-md-12">
		<div class="panel">
			<h1 class="panel-header">
				<?php
				$current_lang = pll_current_language('locale');
				if ($current_lang == 'vi') {
					echo 'Tìm kiếm sản phẩm';
				} else {
					echo 'Search Product';
				}
				?>

			</h1>
			<div class="news-panel-content news-panel-body">
				<div class="search-panel-body">


					<?php
					$countProduct = $GLOBALS['wp_query']->found_posts;

					if (have_posts()) {
						if ($current_lang == 'vi') {
							echo '<div class="success">Tìm thấy <b>' . $countProduct . '</b> sản phẩm</div>';
						} else {
							echo '<div class="success">Having <b>' . $countProduct . '</b> Product(s) matched</div>';
						}
					?>



						<?php
						woocommerce_product_loop_start();
						while (have_posts()) : the_post();
							wc_get_template_part('content', 'product');
						endwhile;
						woocommerce_product_loop_end();
					} else { ?>
						<div class="notice errors">
							<?php if ($current_lang == 'vi') {
								echo 'Không tìm thấy sản phẩm';
							} else {
								echo 'No Product(s) matched';
							}
							?></div>

					<?php }

					?>
					<?php wp_corenavi_table(); ?>
				</div>
			</div>
		</div>
	</div>
	<div class="col-lg-3 col-md-12">
		<div class="hero-sidebar">
			<?php do_action('storefront_sidebar'); ?>
		</div>
	</div>
</div>
<?php get_footer(); ?>