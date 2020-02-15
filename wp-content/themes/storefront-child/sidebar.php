<?php
if (!is_active_sidebar('sidebar_left')) {
    return false;
}
?>
<div id="search-panel">
    <div class="panel-body">
        <form role="search" method="get" action="<?php echo esc_url(home_url('/')); ?>">
            <?php 
                $result = changeTextContentLanguagePolyLang('Enter keyword...', 'Nhập từ khóa tìm kiếm...');
            ?>
            <input type="text" name="s" value="" placeholder="<?php echo $result; ?>">
            <button type="submit" title="Tìm sản phẩm"><i class="fa fa-search" aria-hidden="true"></i></button>
        </form>
    </div>
</div>
<?php dynamic_sidebar('sidebar_left'); ?>
<div class="hero-panel">
    <h3 class="panel-header"><i class="fa fa-barcode"></i>
        <?php 
            $result = changeTextContentLanguagePolyLang('Featured products', 'Sản phẩm đặc trưng');
            echo $result;
        ?>
    </h3>
    <div class="panel-body padding5">
        <?php
            $args = array(
                'post_type' => 'product',
                'posts_per_page' => 8,
                'tax_query' => array(
                    array(
                        'taxonomy' => 'product_visibility',
                        'field'    => 'name',
                        'terms'    => 'featured',
                    ),
                ),
            );
            $loop = new WP_Query($args);
            if ($loop->have_posts()) {
                woocommerce_product_loop_start();
                while ($loop->have_posts()) : $loop->the_post(); 
                    wc_get_template_part('content', 'product');
                endwhile;
                woocommerce_product_loop_end();
            } else {
                $result = changeTextContentLanguagePolyLang('No products found', 'Không tìm thấy sản phẩm');
                echo $result;
            }
            wp_reset_postdata();
        ?>
    </div>
</div>