<?php
/**
 * The template for displaying the footer.
 *
 * Contains the closing of the #content div and all content after
 *
 * @package storefront
 */

?>

            <!-- </div> -->
            <!-- .col-full -->
            <!-- <div class="col-lg-4 col-md-12">

                    hello
            </div> -->
        <!-- </div> -->
        <!-- .col-container -->
	<!-- </div> -->
    <!-- #content -->

	<?php do_action( 'storefront_before_footer' ); ?>

    <footer id="footer">
        <div class="container">
            <?php 
                $current_lang = pll_current_language('locale');
                if($current_lang == 'vi'): ?>
                    <p class="mb-0 mt-2"><?php echo createACCompanyVN(); ?></p>
                    <p class="pb-5">Địa chỉ: <?php echo createACAddressVN(); ?></p>
                <?php else: ?>
                    <p class="mb-0 mt-2"><?php echo createACCompanyEN(); ?></p>
                    <p class="pb-5">Address : <?php echo createACAddressEN(); ?></p>
                <?php endif; ?>
    
        </div>
    </footer>

	<?php do_action( 'storefront_after_footer' ); ?>

</div><!-- #page -->
<?php wp_footer(); ?>

</body>
</html>
