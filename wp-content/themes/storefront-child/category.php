<?php
/* Page News */
?>
<?php get_header();?>
<div class="container row">

    <div class="news-list-content-left news-list col-lg-9 col-md-12">

        <div class="panel">
            <h1 class="news-panel-header">TIN TỨC</h1>
            <div class="news-panel-content news-panel-body">
                <div class="news-panel-body">
					<?php if (have_posts()) : ?>
						<?php while (have_posts()) : the_post(); ?>
							<div class="news-item">
		                        <div class="news-image">
		                            <a href="<?php the_permalink(); ?>">
		                            	<?php echo showThumnail('200', '150'); ?>                               
		                            </a>
		                        </div>
		                        <div class="news-info">
		                            <a href="<?php the_permalink(); ?>" title="<?php the_title(); ?>">
		                                <h2 class="news-name"><?php the_title(); ?></h2>
		                            </a>
		                            <div class="news-descrip"><?php echo teaser(80); ?>
		                            </div>
		                        </div>
		                    </div>
						<?php endwhile; else : ?>
							<li><p>Không có bài viết nào trong chuyên mục!</p></li>
						<?php endif; ?>
                </div>
            </div>
        </div>
    </div>
    <div class="news-list-content-right col-lg-3 col-md-12">
        <div class="hero-sidebar">
            <?php get_sidebar(); ?>
        </div>
    </div>
</div>
<?php get_footer();?>