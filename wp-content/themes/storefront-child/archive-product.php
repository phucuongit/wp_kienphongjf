<?php get_header(); ?>
<div class="container row">
    <div class="product-category col-lg-9 col-md-12">
        <div class="panel">
            <h1 class="panel-header">
                <?php
                    $term_object = get_queried_object();
                    echo $term_object->name;
                ?>
            </h1>
            <div class="news-panel-content news-panel-body">
                <div class="search-panel-body">
                    <?php
                    if (have_posts()) { ?>
                    <?php
                    woocommerce_product_loop_start();
                        while (have_posts()) : the_post();
                            wc_get_template_part('content', 'product');
                        endwhile;
                    woocommerce_product_loop_end();
                    } ?>
                </div>
                <?php wp_corenavi_table();?>
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