<?php
if (!is_active_sidebar('sidebar_left')) {
    return false;
}
?>
<div id="search-panel">
    <div class="panel-body">
        <form role="search" method="get" action="<?php echo esc_url(home_url('/')); ?>">
            <input type="text" name="s" value="" placeholder="Nhập từ khóa tìm kiếm...">
            <button type="submit" title="Tìm sản phẩm"><i class="fa fa-search" aria-hidden="true"></i></button>
            <!-- <input type="hidden" name="post_type" value="product"> -->
        </form>
    </div>
</div>
<?php
dynamic_sidebar('sidebar_left');
?>

<div class="hero-panel">
    <h3 class="panel-header"><i class="fa fa-barcode"></i>
    <?php $current_lang = pll_current_language('locale');
	if($current_lang == 'en_US'){
       echo 'Featured products';
    }else{
        echo 'Sản phẩm đặc trưng';
    }
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
                echo __('No products found');
            }
            wp_reset_postdata();
            ?>

    </div>
</div>