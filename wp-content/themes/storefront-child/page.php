<?php
/**
 * The template for displaying all pages.
 *
 * This is the template that displays all pages by default.
 * Please note that this is the WordPress construct of pages
 * and that other 'pages' on your WordPress site will use a
 * different template.
 *
 * @package storefront
 */
get_header();?>

<div class="container row">

    <div class="news-list-content-left news-list col-lg-9 col-md-12">

        <div class="panel">
            <h1 class="news-panel-header"><?php the_title() ?></h1>
            <div class="news-panel-content news-panel-body">
                <?php    
                     while ( have_posts() ) : the_post();
 
                    // Include the page content template.
                    get_template_part( 'content', 'page' );

                    // End of the loop.
                    endwhile; ?>
            </div>
            <!-- news-panel-content -->
        </div>
        <!-- panel -->

    </div>

    <div class="news-list-content-right col-lg-3 col-md-12">
        <div class="hero-sidebar">
            <?php get_sidebar(); ?>
        </div>
    </div>
</div>
<?php get_footer();?>