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
                        if (have_posts() ) { ?>
                    <?php
                        while (have_posts() ) : the_post(); ?>
                    <div class="col-md-3 search-col-padding10">
                        <div class="product_item">
                            <div class="product_image">
                                <a href="<?php echo get_permalink(); ?>" title="<?php the_title();?>">
                                	<?php the_post_thumbnail('full')?>             	
                                </a>
                            </div>
                            <a href="<?php echo get_permalink(); ?>" title="<?php the_title();?>">
                                <h2 class="product_name"><?php the_title();?></h2>
                            </a>
                            <p class="product-des"><?php echo teaser(30); ?></p>
                            <p class="product_price">Call</p>
                            <a href="<?php echo get_permalink(); ?>" class="view-more" title="<?php the_title();?>">Details</a>
                        </div>
                    </div>
                    <?php endwhile; } ?>
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
<?php get_footer(); ?>