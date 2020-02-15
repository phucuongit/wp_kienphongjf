<?php

/**
 * The template for displaying the footer.
 *
 * Contains the closing of the #content div and all content after
 *
 * @package storefront
 */

?>
<?php do_action('storefront_before_footer'); ?>
<footer id="footer">
    <div class="container">
        <?php
        $current_lang = pll_current_language('locale');
        if ($current_lang) : ?>
            <p class="mb-0 mt-2"><?php echo createACCompany($current_lang); ?></p>
            <p class="pb-5"><?php echo changeTextContentLanguagePolyLang('Address:', 'Địa chỉ:'); ?> <?php echo createACAddress($current_lang); ?></p>
        <?php endif; ?>
    </div>
</footer>
<?php do_action('storefront_after_footer'); ?>
</div><!-- #page -->
<?php wp_footer(); ?>
</body>
</html>