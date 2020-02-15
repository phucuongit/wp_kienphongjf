<?php

/**
 * The template for displaying 404 pages (not found).
 *
 * @package storefront
 */

get_header(); ?>
<div id="primary" class="content-area">
    <div class="container row">
        <div class="col-lg-9 col-md-12">
            <main id="main" class="site-main" role="main">
                <div class="error-404 not-found">
                    <div class="page-content">
                        <header class="page-header">
                            <h1 class="page-title">
                                <?php echo changeTextContentLanguagePolyLang('The page does not exist', 'Trang không tồn tại'); ?> 
                            </h1>
                        </header><!-- .page-header -->
                        <?php
                            echo '<section aria-label="' . esc_html__('Search', 'storefront') . '">';
                            if (storefront_is_woocommerce_activated()) {
                                the_widget('WC_Widget_Product_Search');
                            } else {
                                get_search_form();
                            }
                            echo '</section>';
                        ?>
                    </div><!-- .page-content -->
                </div><!-- .error-404 -->
            </main><!-- #main -->
        </div>
        <div class="col-lg-3 col-md-12">
            <?php get_sidebar() ?>
        </div>
    </div>
</div><!-- #primary -->
<?php
get_footer();
