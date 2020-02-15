<?php
/**
 * The template for displaying search results pages.
 *
 * @package storefront
 */
?>
<?php get_header();?>
<div class="container row">
    <div class="search-product col-lg-9 col-md-12">
        <div class="panel">
            <h1 class="panel-header">
				<?php 
					$result = changeTextContentLanguagePolyLang('Search Product', 'Tìm kiếm sản phẩm');
					echo $result;
				?>	
			</h1>
            <div class="news-panel-content news-panel-body">
                <div class="search-panel-body">
					<?php
						$countProduct = $GLOBALS['wp_query']->found_posts;
						if (have_posts() ) { 
							$contentFirst = 'Having <b>'. $countProduct. '</b> Product(s) matched';
							$contentLast = 'Tìm thấy <b>'. $countProduct. '</b> sản phẩm';
							$success = changeTextContentLanguagePolyLang($contentFirst, $contentLast);
						?>
						<div class="success"><?php echo $success; ?></div>
						<?php
							woocommerce_product_loop_start();
								while (have_posts()) : the_post();
								wc_get_template_part('content', 'product');
							endwhile;
							woocommerce_product_loop_end();
						} else { ?>
						<?php $errors = changeTextContentLanguagePolyLang('No Product(s) matched', 'Không tìm thấy sản phẩm'); ?>
						<div class="notice errors"><?php echo $errors; ?></div>
					<?php } ?>
					<?php wp_corenavi_table();?>
                </div>
            </div>
        </div>
    </div>
    <div class="col-lg-3 col-md-12">
        <div class="hero-sidebar">
            <?php do_action('storefront_sidebar');?>
        </div>
    </div>
</div>
<?php get_footer();?>