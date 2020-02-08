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
                            <?php do_action('[contact-form-7 id="138" title="Contact"]')?>
                            <!-- <div class="row">
                                <div class="large-3 medium-4 columns">
                                    <label class="inline">Name <span class="note">(*)</span></label>
                                </div>
                                <div class="large-9 medium-8 columns">
                                    <div class="form-input">
                                        <i class="fa fa-user fa-lg icon-append"></i>
                                        <input type="text" class="icon-text" name="txt_name" value="">
                                    </div>
                                    <div><b class="error"></b></div>
                                </div>
                            </div>
                            <div class="row">
                                <div class="large-3 medium-4 columns">
                                    <label class="inline">Phone </label>
                                </div>
                                <div class="large-9 medium-8 columns">
                                    <div class="form-input">
                                        <i class="icon-append fa fa-phone fa-lg"></i>
                                        <input type="text" class="icon-text" name="txt_phone" value="">
                                    </div>
                                    <div><b class="error"></b></div>
                                </div>
                            </div>
                            <div class="row">
                                <div class="large-3 medium-4 columns">
                                    <label class="inline">Email <span class="note">(*)</span></label>
                                </div>
                                <div class="large-9 medium-8 columns">
                                    <div class="form-input">
                                        <i class="icon-append fa fa-envelope-o fa-lg"></i>
                                        <input type="text" name="txt_email" class="icon-text" value="">
                                    </div>
                                    <div><b class="error"></b></div>
                                </div>
                            </div>
                            <div class="row">
                                <div class="large-3 medium-4 columns">
                                    <label class="inline">Address</label>
                                </div>
                                <div class="large-9 medium-8 columns">
                                    <textarea name="txta_address"></textarea>
                                    <div><b class="error"></b></div>
                                </div>
                            </div>
                            <div class="row">
                                <div class="large-3 medium-4 columns">
                                    <label class="inline">Title <span class="note">(*)</span></label>
                                </div>
                                <div class="large-9 medium-8 columns">
                                    <div class="form-input">
                                        <i class="icon-append fa fa-header fa-lg"></i>
                                        <input type="text" class="icon-text" name="txt_subject" value="">
                                    </div>
                                    <div><b class="error"></b></div>
                                </div>
                            </div>
                            <div class="row">
                                <div class="large-3 medium-4 columns">
                                    <label class="inline">Content <span class="note">(*)</span></label>
                                </div>
                                <div class="large-9 medium-8 columns">
                                    <textarea name="txta_content"></textarea>
                                    <div><b class="error"></b></div>
                                </div>
                            </div>
                            <div class="row">
                                <div class="large-3 medium-4 columns">
                                    <label class="inline">Captcha <span class="note">(*)</span></label>
                                </div>
                                <div class="large-9 medium-8 columns">
                                    <img src="http://nsvn.vn/index.php?t=ajax&amp;p=gcapt">
                                    <br>
                                    <div class="form-input">
                                        <i class="icon-append fa fa-keyboard-o fa-lg"></i>
                                        <input type="text" name="txt_captcha" class="icon-text">
                                    </div>
                                    <div><b class="error"></b></div>
                                </div>
                            </div>
                            <div class="row">
                                <div class="large-3 medium-4 columns">&nbsp;</div>
                                <div class="large-9 medium-8 columns">
                                    <button class="cms_send" type="submit"><i class="fa fa-paper-plane"></i> Send</button>&nbsp;
                                    <button class="cms_reset" type="reset"><i class="fa fa-refresh"></i> Reset</button>
                                </div>
                            </div> -->
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
