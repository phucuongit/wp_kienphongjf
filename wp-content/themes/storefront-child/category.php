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
		                            	<?php 
		                            		if (wp_get_attachment_url(get_post_thumbnail_id(get_the_ID()))) { ?>
		                            			<img width="200" height="150" src="<?php echo wp_get_attachment_url(get_post_thumbnail_id(get_the_ID())); ?>" alt="<?php the_title(); ?>">
		                            		<?php } else { ?>
		                            			<img width="200" height="150" src="<?php echo get_stylesheet_directory_uri(); ?>/images/no-thumb.jpg" alt="<?php the_title(); ?>">
		                            		<?php }
		                            	?>		                               
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