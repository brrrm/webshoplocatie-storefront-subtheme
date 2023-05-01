<?php
/**
 * The template for displaying the footer.
 *
 * Contains the closing of the #content div and all content after
 *
 * @package storefront
 */

?>

		</div><!-- .col-full -->
	</div><!-- #content -->

	<?php do_action( 'storefront_before_footer' ); ?>

	<footer id="colophon" class="site-footer" role="contentinfo">
		<div class="col-full">

            <?php
			/**
			 * Functions hooked in to storefront_footer action
			 *
			 * @hooked storefront_footer_widgets - 10
			 * @hooked storefront_credit         - 20
			 */
			do_action( 'storefront_footer' );
			?>

            <div class="shop-identity">
                <h2><?php echo get_bloginfo('name'); ?></h2>
                <figure>
                    <?php the_custom_logo('site-branding');?>
                </figure>
                <p> <?php echo get_bloginfo('name'); ?> </p>
            </div>
            <div class="about">
                <h3><strong>Over deze winkel</strong> </h3>    
                <?php wp_nav_menu();?>
            </div>    
            <div class="adress">
                <h3><strong>Adres </strong></h3>
                <p>
                <?php echo get_bloginfo('name'); ?> <br>
                <?php echo get_option( 'woocommerce_store_address' ); ?><br>
                <?php echo get_option( 'woocommerce_store_postcode' ); ?>,
                <?php echo get_option( 'woocommerce_store_city' ); ?>  
                <?php 
                $addressEncoded = urlencode(get_option( 'woocommerce_store_address' ) . ' ' . get_option( 'woocommerce_store_postcode' ) . ' ' . get_option( 'woocommerce_store_city' ));
                $mapsUrl = 'https://www.google.com/maps/search/' . $addressEncoded;
                ?>
                </p>
                <p><a href="<?php echo $mapsUrl; ?>" target="_blank">Bekijk op Google Maps</a></p>
            </div>
            <div class="shop-id">
                <h3><strong> <?php echo get_bloginfo('name'); ?></strong></h3>
                <?php webshoplocatie_business_info(); ?>
            </div>
            <div class="social-media">
                <?php social_media_links(); ?>
                <?php webshoplocatie_social_media_links(); ?>
            </div>
        </div><!-- .col-full -->

        <div class="copyright"> 
            <div class="col-full"> 
                <div class="usps">
                    <p class="usp refund">Niet goed geld terug</p>
                    <p class="usp return" >Gratis retour</p>
                    <p class="shipment" >Vlotte verzending</p>
                </div> 
                <div class="contact">
                	<?php $email = get_option('woocommerce_email_from_address'); ?>
                    <a class="icon mail" href="mailto:<?php echo $email; ?>"><?php echo $email; ?></a>
                </div>
            </div>
        </div>
	</footer><!-- #colophon -->

	<?php do_action( 'storefront_after_footer' ); ?>

</div><!-- #page -->

<?php wp_footer(); ?>

</body>
</html>
