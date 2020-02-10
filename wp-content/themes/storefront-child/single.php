<?php
/* Single */
?>
<?php get_header();?>
<div class="container row">
    <div class="single-news-list news-list-content-left col-lg-9 col-md-12">
        <div class="panel">
            <h1 class="news-panel-header">TIN TỨC</h1>
            <div class="news-panel-content news-panel-body">
                <div class="news-panel-body">
                    <h1 class="news-title"><?php the_title(); ?></h1>
                    <div class="single-content-post">
                        <?php if (have_posts()) : ?>
                        <?php while (have_posts()) : the_post(); ?>
                            <?php the_content(); ?>
                        <?php endwhile; ?>
                        <?php endif; ?>  
                    </div>
                    <div id="news_orther">
                        <h3 class="header">Other news</h3>
                        <ul id="list_news_other">
                            <?php 
                                $getposts = new WP_query(); 
                                $getposts->query('post_status=publish&showposts=8&post_type=post&offset=1'); 
                            ?>
                            <?php global $wp_query; $wp_query->in_the_loop = true; ?>
                            <?php if ($getposts->have_posts()) : ?>
                            <?php while ($getposts->have_posts()) : $getposts->the_post(); ?>
                                <li>
                                    <h2>
                                        <a href="<?php the_permalink(); ?>" title="<?php the_title(); ?>">
                                        » <?php the_title(); ?></a>
                                        <span class="get--datetime">&nbsp;(<?php echo get_the_date('d/m'); ?>)</span>
                                    </h2>
                                </li>
                            <?php endwhile; wp_reset_postdata(); else : ?>
                                <li>
                                    <h2>» Chưa có bài viết nào được xem nhiều</h2>
                                </li>
                            <?php endif; ?>
                        </ul>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <div class="single-news-list news-list-content-right col-lg-3 col-md-12">
        <div class="hero-sidebar">
            <?php get_sidebar(); ?>
        </div>
    </div>
</div>
<?php get_footer();?>