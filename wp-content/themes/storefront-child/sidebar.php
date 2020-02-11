
<?php 
    if(!is_active_sidebar('sidebar_left')){
        return false;
    }
?>
<div id="search-panel">
    <div class="panel-body">
        <form role="search" method="get" action="<?php echo esc_url( home_url( '/' ) ); ?>">
            <input type="text" name="s" value="" placeholder="Nhập từ khóa tìm kiếm...">
            <button type="submit" title="Tìm sản phẩm"><i class="fa fa-search" aria-hidden="true"></i></button>
            <!-- <input type="hidden" name="post_type" value="product"> -->
        </form>
    </div>
</div>
<?php 
dynamic_sidebar( 'sidebar_left' );
?>

<div class="hero-panel">
    <h3 class="panel-header"><i class="fa fa-barcode"></i>Featured products</h3>
    <div class="panel-body padding5">
        <div class="vert simply-scroll-container">
            <div class="simply-scroll-clip">
                <div class="simply-scroll-list">
                    <!-- <div class="owl-carousel owl-theme sidebar-product"> -->
                        <ul id="list-product-hot" class="simply-scroll-list">
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
                            $loop = new WP_Query( $args );
                            if ( $loop->have_posts() ) {
                                while ( $loop->have_posts() ) : $loop->the_post(); ?>
                                    <li>
                                        <div class="item">
                                            <div class="item-scroll">
                                                <div class="product-item">
                                                    <div class="product-image">
                                                        <a href="<?php echo get_permalink(); ?>" title="<?php the_title();?>">
                                                            <img width="450" height="380" src="<?php echo wp_get_attachment_url(get_post_thumbnail_id(get_the_ID())); ?>" alt="<?php the_title(); ?>">
                                                        </a>
                                                    </div>
                                                    <a href="<?php echo get_permalink(); ?>" title="<?php the_title();?>">
                                                        <h2 class="product_name"><?php the_title();?></h2>
                                                    </a>
                                                    <p class="product-des"><?php echo teaser(30); ?></p>
                                                    <a href="<?php echo BASE_URL_CONTACT; ?>">
                                                        <p class="product-price">Call</p>
                                                    </a>
                                                    <a href="<?php echo get_permalink(); ?>" class="view-more" title="<?php the_title();?>">Details</a>
                                                </div>
                                            </div>
                                        </div>
                                    </li>
                            <?php
                                endwhile;
                            } else {
                                echo __( 'No products found' );
                            }
                            wp_reset_postdata();
                            ?>
                        </ul>
                    <!-- </div> -->
                </div>
            </div>
        </div>
    </div>
</div>

