<?php

/**
 * Template Name: Contact Template Page
 */


get_header(); ?>

<div id="primary" class="content-area">
    <div class="container row">
        <div class="col-lg-9 col-md-12">
            <main id="main" class="site-main" role="main">
                <div class="panel">
                    <div class="panel_header">
                        <h1>Contact</h1>
                    </div>

                    <div class="panel_content panel_body">
                        <div id="contact_content">Content of Contact</div>

                        <form method="post" action="" id="frm-contact">
                            <div class="row">
                                    <div class="note text-center">Fields marked with (*) are required</div>
        
                            </div>
                            <?php echo do_shortcode('[contact-form-7 id="138" title="Contact"]')?>
                            
                            <input type="hidden" name="template_function" value="sendContact">
                        </form>
                    </div>
                    <!-- panel_content -->
                </div>
            </main><!-- #main -->
        </div>
        <div class="col-lg-3 col-md-12">
            <?php get_sidebar() ?>
        </div>

    </div>
</div><!-- #primary -->

<?php
get_footer();
