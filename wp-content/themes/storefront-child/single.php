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